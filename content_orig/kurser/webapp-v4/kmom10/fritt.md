---
author:
    - aar
    - efo
    - mos
revision:
    "2019-04-09": (E, efo) Uppdaterade med proxy och video. Släppte.
    "2019-02-11": (D, efo) En första version inför 2019 LP4.
    "2019-02-11": (prel, efo) Inför 2019 LP4.
    "2018-03-02": (C, efo) Första versionen till webapp-v3.
    "2017-05-05": (B, aar,efo) Första versionen till webapp-v2.
    "2015-12-22": (A, mos) Första versionen till webapp.
...
Kmom10: Fria upplägget
==================================

Du är en engagerad student och funderar på hur du kan nå ut och bidra till en förändring av omvärlden och säkra framtiden. Du känner en pulserande ådra av entreprenörskap i dig. Du bestämmer dig för att "bygga en webapp" som bidrar till förändring.

Det finns en årlig tävling, ["Hack for Sweden"](https://www.digg.se/utveckling-av-digital-forvaltning/hack-for-sweden), där öppen data används för att bygga appar som fokuserar på nytänkande och innovation. I detta projekt kan du använda [en eller flera datakällor som publiceras via tävlingen](https://www.dataportal.se/) som källa till din webapp.

Om du inte hittar ett API via Öppna Data kan detta [public-apis](https://github.com/toddmotto/public-apis) GitHub repo kanske ge inspiration till din app.

I filmen nedan pratar Emil om hur man kan tänka vid val av datakällor och rekommenderar ett antal olika API:er.

[YOUTUBE src="-wAzJgyHlR4" caption="Emil pratar om projektet"]

Om du upplever problem med Cross-Origin Access kan en API-proxy vara lösningen på problemet. I GitHub repot [emilfolino/api-proxy](https://github.com/emilfolino/api-proxy) finns källkod och instruktioner för hur man kan använda sig av en API-proxy på studentservern.

Om du hittar ett XML-API du vill använda kan du göra om XML data till JSON med hjälp av en proxy. Med hjälp av tjänsten [https://xml-proxy.emilfolino.se/](https://xml-proxy.emilfolino.se/) kan du göra om XML till JSON.

Du funderar och väljer en ansats för din webapp, fråga i chatten om du känner dig osäker.



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas information så kan du själv välja väg, dokumentera dina val i redovisningstexten.

De två första kraven är obligatoriska och de fyra sista kraven är optionella krav. De två obligatoriska kraven måste lösas tillsammans med ett (1) valfritt optionellt krav för att få godkänt på uppgiften. Lös valfritt antal av de resterande optionella krav för att samla poäng och därmed nå högre betyg.

Varje krav ger maximalt 10 poäng, totalt är det 60 poäng.

**Se till att läsa igenom alla kraven innan du bestämmer dig för datakällor då de optionella kraven kan påverka val av API.**



### Kataloger för redovisning {#var}

Samla alla dina filer för projektet i ditt kursrepo under `me/kmom10/proj`.

Skapa ditt Expo projekt med följande kommando:

```bash
# stå i me/kmom10/proj
expo init .
```

Redovisningstexten skriver du som en del av din inlämning på Canvas.



### Krav 1: Specifikation, datakällor och arkitektur {#k1}

Din webapp ska använda de teknologier vi har använt under kursens gång.

Välj ut de datakällor du skall använda och vilken data du behöver ur varje datakälla. Berätta om ditt val. Du ska använda minst två API:er. API:erna måste inte vara från Hack for Sweden, det är enbart ett tips.

Din inlämning för krav 1 ska innehålla en beskrivning uppdelat i följande stycken:

* __Specifikation__: En kortfattad beskrivning av din app och vad användaren av din app ska kunna åstadkomma med appen.

* __Datakällor__: Lista från vilka API:er du hämtar data.

* __Arkitektur__: Beskriv i textstycke vilka val av teknik du har gjort för din app. Berätta hur du har organiserad din kod så att en kollega snabbt kan sätta sig in i din app.



### Krav 2: En webapp {#k2}

Bygg en så gott som felfri webapp, i enlighet med din specifikation.

Fick du göra prioriteringar under arbetets gång eller nådde du din fulla ambitionsnivå med din webapp? Berätta.

Kritisera din webapp och framhäv dess brister.

Berätta om någon av de möjligheter som finns för att förbättra din lösning. Tänk att det finns begränsade resurser av tid, så förhåll dig till det och ta bara de möjligheter som kan utföras med begränsad insats av tid och/eller extra kunskap.



### Krav 3: Native design (optionellt) {#k3}

Välj ut en befintlig app på den plattform (iOS eller Android) där du har tillgång till en mobil enhet. Den valda appen ska ha ungefär samma typ av vyer som din app har. Försök att så gott det går matcha designen på din app pixel-för-pixel med den befintliga appen.

Beskriv i ett textstycke om 15-20 meningar designprocessen att efterlikna en befintlig app och vilka verktyg och tekniker du använde. Bifoga tre (3) relevanta skärmdumpar av den befintliga appen.



### Krav 4: Autentisering av användaren (optionellt) {#k4}

Utnyttja autentiseringstjänsten [auth.emilfolino.se](https://auth.emilfolino.se) för att ge möjlighet för att användare av din app kan autentisera sig med hjälp JSON Web Tokens. En autentiserad användare får sedan tillgång till delar av appen, som annars är stängda. Du kan även använda autentiseringstjänsten för att spara data för de inloggade användarna.

Du kan inte räkna autentiseringstjänsten som en av dina två API:er.



### Krav 5: Karta och GPS (optionellt) {#k5}

Använd positionsdata (Koordinater eller adresser) från en av dina valda API:er och visa upp denna data i en karta med hjälp av de tekniker vi använde i kursmoment 5. Använd Expo Location för att visa upp användarens position på kartan.



### Krav 6: Test (optionellt) {#k6}

Använd dina kunskaper om test från kursmoment 6. Skriv fem (5) stycken use-cases för din applikation och testa sedan dessa med hjälp av Jest och React Native Testing Library. Se till att kommandot `npm test` fungerar och att testerna går igenom.

Lämna in dina 5 use-cases som en del av din redovisningstext i Canvas.
