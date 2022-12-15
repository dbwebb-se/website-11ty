---
author: efo
category: javascript
revision:
  "2018-02-07": (A, efo) Första utgåvan inför kursen webapp v3.
...
Login med JWT
==================================

[FIGURE src=/image/webapp/padlock.png?w=c5 class="right"]

Vi har i tidigare kurser och i andra programmeringsspråk hanterat inloggning med hjälp av sessioner. I denna övning ska vi titta på ett sätt att autentisera våra klienter mot servern utan sessioner. Detta ger oss vissa fördelar som att vi har inbyggda utlöpstider och att det underlättar om vi vill skala upp vårt API, samtidigt som det ger ett säkert sätt att identifiera klienterna på.

I denna övning tittar vi på hur vi med hjälp av Postman registrerar en användare, loggar in som denna användare och får en JSON Web Token (JWT). Sist i övningen tittar vi på hur vi med hjälp av JWT och mithril kommer åt funktioner i Lager API:t som ligger skyddade.



<!--more-->



Registrering och inloggning {#login}
--------------------------------------
Vi börjar med att registrera en användare i Lager API:t genom att skicka en `POST` till URL'en `/v2/auth/register` med 3 parametrar i `body`: `api_key`, `email` och `password`. Detta kan till exempel göras med Postman eller som en POST request från JavaScript.

Vi får följande svar från Lager API:t:

```json
{
    "data": {
        "message": "User successfully registered."
    }
}
```

När vi sedan vill logga in som den nyss registrerade användaren gör vi det genom att skicka en `POST` till URL'en `/v2/auth/login` med de samma 3 parametrar i `body`: `api_key`, `email` och `password`.

Vi får följande svar från Lager API:t. `token` i det nedanstående data objektet är den JSON web token vi har fått tillbaka från API:t.

```json
{
    "data": {
        "type": "success",
        "message": "User logged in",
        "user": {
            "api_key": "...",
            "email": "new@example.com"
        },
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhc...NzczfQ.zUUd...KHTkM"
    }
}
```



Använda JSON Web Tokens {#jwt}
--------------------------------------
Vi ser att svaret från Lager API:t innehåller attributet `token` och detta är vår JWT som vi använder varje gång vi vill åt funktioner i API:t som ligger bakom skyddet. Vi skickar med `token` som `x-access-token` i HTTP-headern.


I mithril kan du skicka med headers på följande sätt.

```javascript
let token = "...";

m.request({
    method: "GET",
    url: "/v2/invoices?api_key=[YOUR_API_KEY]",
    headers: {
        "x-access-token": token
    }
}).then(function(result) {
    // Do something with result
});
```

I [mithrils dokumentation](https://mithril.js.org/route.html#authentication) ges ett exempel på hur man kan hantera om en användare är inloggad eller ej och visa olika beroende på status.


### Exempelprogram {#example}

I `example/bakery` exempelprogrammet finns ett exempel på hur man kan använda sig av JWT för att skydda vissa delar av en app.

Jag har i exempelprogrammet skapat en autentiserings-modell `auth`. Modellen håller koll på om användaren är inloggad eller ej beroende på om det finns innehåll i attributet `auth.token`.

```javascript
import m from 'mithril';

const auth = {
    apiKey: "[API_KEY]",
    url: "https://lager.emilfolino.se/v2/auth/login",
    email: "",
    password: "",
    token: "",
    login: function() {
        return m.request({
            method: "POST",
            url: auth.url,
            body: {
                api_key: auth.apiKey,
                email: auth.email,
                password: auth.password
            }
        }).then(function(result) {
            auth.email = "";
            auth.password = "";

            auth.token = result.data.token;

            return m.route.set("/");
        });
    }
};

export { auth };
```

Dessutom finns funktionen `auth.login` som kan användas för att logga in i systemet med. Själva kontrollen av om vi från klienten får gå till routen `/new` för att skapa nya produkter görs i routern i `js/index.js`. Först kollar vi om `token` är satt i `auth`-modellen annars gör vi en redirect till login-sidan. `newForm` som returneras från `onmatch` skickas in till render-funktionen som parametern `vnode` och vi kan sedan använda den för att rita ut formuläret.

```javascript
"/new": {
    onmatch: function() {
        if (auth.token) {
            return newForm;
        } else {
            return m.route.set("/login");
        }
    },
    render: function(vnode) {
        return m(layout, {
            topNav: { route: "#!/", title: "Hem"},
            bottomNav: "#!/new"
        }, vnode);
    }
},
```

För att vi ska kunna logga in behövs ett inloggningsformulär. I filen `js/views/login.js` finns formuläret och för enkelhetens skulle har jag för registrerat en användare om ni vill testa exempelprogrammet.

```javascript
import m from 'mithril';

import { auth } from "../models/auth.js";

let login = {
    view: function() {
        return m("div.container",
            m("h2", "Logga in"),
            m("p", "Finns en registrerad användare: kaka@kaka.se, Lösenord: test1234"),
            m("form", {
                onsubmit: function(event) {
                    event.preventDefault();
                    auth.login();
                } }, [
                m("label.input-label", "E-post"),
                m("input.input[type=email][placeholder=E-post]", {
                    oninput: function (e) {
                        auth.email = e.target.value;
                    },
                    value: auth.email
                }),
                m("label.input-label", "Lösenord"),
                m("input.input[type=password][placeholder=Lösenord]", {
                    oninput: function (e) {
                        auth.password = e.target.value;
                    },
                    value: auth.password
                }),
                m("input.button.green-button[type=submit][value=Logga in].button")
            ]));
    }
};

export { login };
```



Avslutningsvis {#avslutning}
--------------------------------------
Vi har i denna artikel använd oss av Postman för att registrera en användare och logga in med den användaren. Vi har även tittat på hur man kan använda `headers` som en del av ett anrop i mithrils `m.request` funktion. Vi har även tittat på hur man kan implementera en fullständig autentiseringslösning i mithril i exempelprogrammet `example/bakery`.

<!-- Om du har frågor eller tips så finns det en särskild [tråd i forumet](t/7319) om denna artikeln. -->
