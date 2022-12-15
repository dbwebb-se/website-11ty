---
author:
    - efo
category:
    - js
    - ramverk
    - kurs ramverk2
revision:
    "2019-01-24": "(A, efo) Första utgåva."
...
Skriva redovisningstexter i frontend
===================================

Vi ska bygga vidare på me-applikationen från kmom02. Vi lägger till en administrationsdel i vår applikation där inloggade användare kan skapa redovisningstexter i ett formulär. Vi tittar först kort på hur vi hanterar formulär i våra 'Big Three' ramverk och hur vi autentiserar klienterna med JWT mot vårt API.



<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften [Bygg ett me API till ramverk2](uppgift/bygg-ett-me-api-till-ramverk2).



Introduktion {#intro}
-----------------------

I följande stycken går vi igenom tekniker som kan vara användbara för att implementera uppgiften som är specificerad i stycket [Krav](#krav).



Formulär {#forms}
-----------------------

Vi börjar som alltid med nya tekniker att titta i dokumentationen och titta på hur ramverkens skapare och utvecklare vill att vi ska använda tekniken.

* Angular formulär [API](https://angular.io/api/forms) och [Guide](https://angular.io/guide/forms)

* [React formulär](https://reactjs.org/docs/forms.html)

* Vue [formulär](https://vuejs.org/v2/guide/forms.html) och [EventHantering](https://vuejs.org/v2/guide/events.html)

Vi ser att alla tre ramverk hanterar formulär på ett snarlikt sätt. Vi ser att alla hanterar datan i komponentens interna `state`. Och sedan använder vi ett `submit event` för att hantera att formuläret ska skickas. Sedan använder vi `fetch` eller ramverkets motsvarighet för att skicka formulär datan till API:t.



JWT i headern {#jwt}
-----------------------

För att lägga till en header i `fetch` kan vi använda ett konfigurations objekt när vi anropar en URL.

```javascript
fetch('URL', {
    method: 'POST',
    headers: new Headers({
        'x-access-token': 'JWT_TOKEN'
    })
}).then(function(response) {
    return response.json();
}).then(function(data) {
    console.log(data);
});
```

Med hjälp av Angulars HttpClient kan vi göra liknande.

```javascript
this.http.post<Report>("URL", {
   headers: {
       'x-access-token': 'JWT_TOKEN'
   }
});
```



Krav {#krav}
-----------------------

1. Skapa en vy där användaren kan logga in, länka till vyn från första sidan.

1. När användaren är autentiserad ska det finnas nöjlighet att gå till en vy där användaren kan skapa redovisningstexter.

1. Committa alla filer och lägg till en tagg (2.0.\*).

1. Pusha upp repot till GitHub, inklusive taggarna.

1. Publicera din applikation publikt och lägg den publika adressen i din inlämning på Canvas.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
