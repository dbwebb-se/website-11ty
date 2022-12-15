---
author: efo
category: javascript
revision:
  "2018-02-07": (A, efo) Första utgåvan inför kursen webapp v3.
...
Login med JWT
==================================

[FIGURE src=/image/webapp/padlock.png?w=c5 class="right"]

I denna övning ska vi titta på ett sätt att autentisera våra klienter mot servern utan sessioner. Detta ger oss vissa fördelar som att vi har inbyggda utlöpstider och att det underlättar om vi vill skala upp vårt API, samtidigt som det ger ett säkert sätt att identifiera klienterna på.

I denna övning tittar vi på hur vi med hjälp av Postman registrerar en användare, loggar in som denna användare och får en JSON Web Token (JWT).

Sist i övningen tittar vi på hur vi med hjälp av React Native kommer åt funktioner i Lager API:t som ligger skyddade. Dessutom tar vi en titt på hur vårt autentiseringsflöde och -hantering kan se ut.



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

Nedan syns ett exempel på hur man kan använda en JWT tillsammans med `fetch`. Exemplet är tagen från [Lager-API:ets dokumentation](https://lager.emilfolino.se/v2#fetch).

```javascript
fetch("https://lager.emilfolino.se/v2/invoices?api_key=[YOUR_API_KEY]", {
    headers: {
      'x-access-token': [TOKEN]
    },
})
.then(function (response) {
    return response.json();
}).then(function(data) {

});
```



Ett flöde för autentisering {#flow}
--------------------------------------

Vi såg i artikeln "[Komponenter och struktur i React](kunskap/komponenter-och-struktur-react)" hur vi kunde lyfta upp `state` till en gemensam förälder för att barn-komponenter kan använda och uppdatera samma `state`. En så viktig del som autentisering väljer vi att lägga i `App`-komponenten, då kan vi välja att skicka med det till alla komponenter i trädet.

Jag väljer att lägga följande i `App`-komponenten.

```javascript
// Del av App.tsx
const [isLoggedIn, setIsLoggedIn] = useState<Boolean>(false);

useEffect(async () => {
  setIsLoggedIn(await authModel.loggedIn() /* Vi kommer tillbaka till denna funktion. */);
}, []);
```

Detta ger oss möjlighet för att se om vi är inloggade på alla platser i applikationen om vi väljer att skicka med `state` ner i appen.

Vi vill beroende på om vi är inloggade visa antigen en "Logga in" knapp eller en "Faktura" knapp längst ner i Tab-navigationen. Vi använder oss av konstruktionen "Ternary-operator" för att lösa detta.

```javascript
// Del av navigationen i App.tsx
{isLoggedIn ?
  <Tab.Screen name="Faktura" component={Invoices} /> :
  <Tab.Screen name="Logga in">
    {() => <Auth setIsLoggedIn={setIsLoggedIn} />}
  </Tab.Screen>
}
```

I ovanstående evalueras först variabeln `isLoggedIn`, om den är sann visas en knapp för Fakturor, om den är falsk en knapp för Logga in. Jag överlåter implementationen av `Invoices`-komponenten till er med den kunskap ni har från kmom02 och kmom03 angående navigering och formulär, samt övningen "[Tabeller i mobila enheter](kunskap/tabeller-i-mobila-enheter-v2)".



### Login och registrera komponent {#login}

Låt oss börja med att skapa Login och Registrera komponenterna. Har börjat bli ganska så många filer i min `components`-katalog så jag väljer att skapa en ny katalog `components/auth` där jag lägger komponenter relaterade till autentisering.

Jag skapar först en `Auth`-komponent där vi har en `Stack` som vi har sett tidigare. Så vi har möjlighet för att växla mellan Logga in och Registrera.

```javascript
// auth/Auth.tsx
import { createNativeStackNavigator } from '@react-navigation/native-stack';

import Login from './Login';
import Register from './Register';

const Stack = createNativeStackNavigator();

export default function Auth(props) {
    return (
        <Stack.Navigator initialRouteName="Login">
            <Stack.Screen name="Login">
                {(screenProps) => <Login {...screenProps} setIsLoggedIn={props.setIsLoggedIn} />}
            </Stack.Screen>
            <Stack.Screen name="Register" component={Register} />
        </Stack.Navigator>
    );
};
```

I både `Login` och `Register` komponenterna har vi ett formulär med två stycken fält. Ett för e-post och ett för lösenord. Då fälten är samma ska vi här se ett exempel på hur vi kan återanvända komponenter och med hjälp av `props` anpassa komponenten för ett specifikt användningsområde.

Vi tar en titt på `Login` komponenten, men samma princip gäller för `Register` komponenten. Vi börjar att skapa en `auth`-variabel i `state`. `auth`-variabeln uppfyller `Auth`-interfacet som innehåller email and password som båda är strängar.

Sedan skapar vi funktionen `doLogin` som vi vill ska anropas när vi har fyllt i formuläret. Från `Login` komponenten returnerar vi en annan komponent `AuthFields` och här fyller vi i de `props` vi vill skicka med vidare till den komponenten.

```javascript
// auth/Login.tsx
import Auth from '../../interfaces/auth';
import { useState } from 'react';
import AuthModel from '../../models/auth';
import AuthFields from './AuthFields';

export default function Login({navigation, setIsLoggedIn}) {
    const [auth, setAuth] = useState<Partial<Auth>>({});

    async function doLogin() {
        if (auth.email && auth.password) {
            // Snart återkommer vi till AuthModel :)
            const result = await AuthModel.login(auth.email, auth.password);

            setIsLoggedIn(true);
        }
    }

    return (
        <AuthFields
            auth={auth}
            setAuth={setAuth}
            submit={doLogin}
            title="Logga in"
            navigation={navigation}
        />
    );
};
```

Vi ser ovan att vi skickar med `state` och funktionen, samt en titel, men även `navigation` objektet så vi kan lägga till en knapp för att gå mellan `Login` och `Register`. Låt oss ta en titt på hur vi utformar en återanvändbar komponent för inloggning och registrering.

```javascript
// auth/AuthFields.tsx
import { View, Text, TextInput, Button } from "react-native";
import { Typography, Forms, Base } from '../../styles';

export default function AuthFields({ auth, setAuth, title, submit, navigation}) {
    return (
        <View style={Base.base}>
            <Text style={Typography.header2}>{title}</Text>
            <Text style={Typography.label}>E-post</Text>
            <TextInput
                style={Forms.input}
                onChangeText={(content: string) => {
                    setAuth({ ...auth, email: content })
                }}
                value={auth?.email}
                keyboardType="email-address"
            />
            <Text style={Typography.label}>Lösenord</Text>
            <TextInput
                style={Forms.input}
                onChangeText={(content: string) => {
                    setAuth({ ...auth, password: content })
                }}
                value={auth?.password}
                secureTextEntry={true}
            />
            <Button
                title={title}
                onPress={() => {
                    submit();
                }}
            />
            {title === "Logga in" &&
                <Button
                    title="Registrera istället"
                    onPress={() => {
                        navigation.navigate("Register");
                    }}
                />
            }
        </View>
    );
};
```

I ovanstående komponent tar vi först emot de `props` vi har skickat in till komponenten. Sedan ritar vi ut en rubrik samt de två fält vi vill ha i vårt formulär. Notera både `keyboardType` för e-postfältet och `secureTextEntry` för lösenordsfältet. Detta är den stora skillnaden på formuläret vi skapade i kmom03. Precis som tidigare fyller vi på `auth` objektet med hjälp av `...`-spread-operatorn.

`submit`-funktions anropet vi gör när vi trycker på knappen anropar den funktion vi skickade med från antingen `Login` eller `Register` komponenten och gör då ett anrop mot en funktion i `AuthModel`.

Notera även att vi i `submit` funktionen som egentligen är `doLogin` från `Login` komponenten anropar `setIsLoggedIn` funktionen för att ändra inloggad status.



### Äntligen AuthModel {#auth-model}

Nu har vi sett den dyka upp i lite olika sammanhang så låt oss ta en titt på modellen.

I modellen har vi fyra funktioner: `isLoggedIn` för att kolla om vi är inloggade, `login` för att logga in, `register` för att registrera en användare och `logout` för att logga ut.

```javascript
// models/auth.ts
import config from "../config/config.json";

import storage from "./storage";

const auth = {
    loggedIn: async function loggedIn() {
        const token = await storage.readToken();
        const twentyFourHours = 1000 * 60 * 60 * 24;
        const notExpired = (new Date().getTime() - token.date) < twentyFourHours;

        return token && notExpired;
    },
    login: async function login(email: string, password: string) {
        const data = {
            api_key: config.api_key,
            email: email,
            password: password,
        };
        const response = await fetch(`${config.base_url}/auth/login`, {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                'content-type': 'application/json'
            },
        });
        const result = await response.json();

        await storage.storeToken(result.data.token);

        return result.data.message;
    },
    register: async function register(email: string, password: string) {
        const data = {
            api_key: config.api_key,
            email: email,
            password: password,
        };
        const response = await fetch(`${config.base_url}/auth/register`, {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                'content-type': 'application/json'
            },
        });

        return await response.json();
    },
    logout: async function logout() {
        await storage.deleteToken();
    }
};

export default auth;
```

Vi ser här ganska omedelbart att vi importerar och använder oss av ytterligare en modell `storage`. Denna modellen sparar vår token i `AsyncStorage` som är ett säkert ställe som bara vår app kommer åt. Modulen istalleras med kommandot `expo install @react-native-async-storage/async-storage`. Vi väljer att spara vår token tillsammans med en tidstämpel som en JSON-sträng. Vi har då möjlighet för att kolla om vår token har gått ut (I Lager-API:t går en token ut efter 24 timmar).

```javascript
// models/storage.ts
import AsyncStorage from '@react-native-async-storage/async-storage';

const storage = {
    storeToken: async function storeToken(token: string) {
        try {
            const tokenAndDate = {
                token: token,
                date: new Date().getTime(),
            };
            const jsonValue = JSON.stringify(tokenAndDate);

            await AsyncStorage.setItem('@token', jsonValue);
        } catch (e) {
            // saving error
        }
    },
    readToken: async function readToken(): Promise<any> {
        try {
            const jsonValue = await AsyncStorage.getItem('@token');
            return jsonValue != null ? JSON.parse(jsonValue) : null;
        } catch (e) {
            // error reading value
        }
    },
    deleteToken: async function deleteToken() {
        await AsyncStorage.removeItem('@token');
    }
};

export default storage;
```

[WARNING]
AsyncStorage fungerar så att en app enbart har tillgång till sin egen storage. Så detta är ett säkert sätt att spara vår token.

Hade man däremot skrivit en React app för webbläsaren, bör man inte spara token i LocalStorage då andra webbplatser kan komma åt denna.
[/WARNING]

I kodexemplet ovan bör en del kunna kännas igen från tidigare där vi har kommunicerat med Lager-API:t. Det som skiljer sig är funktionen `loggedIn`, så låt oss ta en titt på den.

```javascript
loggedIn: async function loggedIn() {
    const token = await storage.readToken();
    const twentyFourHours = 1000 * 60 * 60 * 24;
    const notExpired = (new Date().getTime() - token.date) < twentyFourHours;

    return token && notExpired;
},
```

I funktionen ovan hämtar vi först ut en token om vi har något sparat i `AsyncStorage`. Sedan kollar vi om det är mer än 24 timmar sedan token skapades genom att jämföra tidsstämpeln med tiden just nu. `new Date().getTime()` returnerar en tidsstämpel bestående av antal millisekunder sedan 1:e januari 1970. Om både `token` och `notExpired` evaluearas till sant har vi en token som kan användas för att kommunicera med API:t.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har i denna artikel använd oss av Postman för att registrera en användare och logga in med den användaren. Vi har även tittat på hur man kan använda `headers` som en del av ett anrop med hjälp av `fetch`.

Som avslutning på övningen har vi tittat på hur ett autentiseringsflöde kan se ut i React.
