---
author: mos
revision:
  "2014-01-31": (D, mos) Länk till BTHs labbmiljö för node.js.
  "2013-12-18": (C, mos) Lade till föreläsningar från campus.
  "2013-12-10": (B, mos) Formaterade om inledningen.
  "2012-12-13": (A, mos) Första utgåvan.
updated: "2014-01-31 14:12:45"
created: "2012-06-12 08:20:43"
...
Kmom06: HTML5 och Websockets
==================================

Du skall bygga en chatt med HTML5 Websockets och Node.js. Med Node.js tar du ett steg in i världen av JavaScript-programmering på serversidan där du bygger en echo-server och en broadcast-server som du sedan vidarutvecklar till din egen chatt-server. På klientsidan bygger du en enklare klient som pratar HTML5 Websocket och till slut bygger du ut den till en liten snyggare chatt-klient.

[FIGURE src=/image/kunskap/javascript/html5-websocket-client-to-echo-server.jpg?w=w1&q=70 caption="En enkel websocket-klient som kopplar sig till en echo-server."] 

*(Momentet omfattar totalt ca: 20 studietimmar, inklusive läsning, arbete, problemlösning och eftertanke.)*



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Pro HTML5 Programming](kunskap/boken-pro-html5-programming)  
  * Ch 6 Using the HTML5 Websocket API

Boken ger dig grunden till de övningar som du senare skall göra.



###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial användes i samband med campus-kursen höstterminen 2013. Det kan vara av intresse att skumma igen -- även för distansstudenten.

* [Översikt av kursmomentet](https://dl.dropboxusercontent.com/u/24315211/javascript/javascript-kmom06-ht13.pdf).



###Lästips {#lastips}

Här finns mer att läsa.

* Tutorials för att komma igång med HTML5 Websocket finns på MDN:  
  <a href='https://developer.mozilla.org/en-US/docs/WebSockets'>https://developer.mozilla.org/en-US/docs/WebSockets</a>

* Kika runt på webbplatsen websockets.org:  
  <a href='http://www.websocket.org/'>http://www.websocket.org/</a>

* Läs på om Node.js:  
  <a href='http://nodejs.org/'>http://nodejs.org/</a>

* Läs om bakgrund  till websockets tillsammans med kodexempel för hur du kan använda det i "WebSockets: A Guide":  
  <a href='http://buildnewgames.com/websockets/'>http://buildnewgames.com/websockets/</a>



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 14-16 studietimmar)*


###Övningar {#ovningar}

Gör följande övningar, de behövs för att klara uppgifterna. 

* Kolla in hur [BTHs labbmiljö fungerar för node.js](kunskap/bth-s-labbmiljo-for-node-js-och-npm).  

* Häng med när Mikael bygger en [websocket server i Node.js](kunskap/kom-igang-med-html5-websockets-och-node-js), detta blir grunden till din chat-server.
   
Jobba igenom övningen som innehåller kodningsövningar och en del läsanvisningar som du skall göra. Detta är kärnan i kursmomentet och ger dig förutsättningarna för att lyckas med uppgiften.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Bygg en väl fungerande echo-server och en broadcast-server. Bygg en klient som fungerar både mot din egna server och mot Mikaels server. Integrera klienten i din me-sida.

2. Gör en chatt-klient och en chatt-server med HTML5 Websockets och Node.js. Det skall fungera att chatta med flera klienter. Gör så att varje klient får ett eget namn. Visa upp klienten på din me-sida. Kör servern om du har möjlighet, visa upp källkoden till server-koden.



###Extra {#extra}

Bygg ut din chatt med ett eget IRC-liknande protokoll där man kan byta namn och kan göra actions typ `/me är cool`. Om du inte kan IRC så får du helt enkelt bygga ut din chatt med fler funktioner.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Vilka möjligheter ser du med HTML5 Websockets?
  * Vad tycker du om Node.js och hur känns det att programmera i det?
  * Beskriv hur du löste echo-servern och broadcast-servern.
  * Beskriv och berätta om din chatt. Förklara hur du byggde din chatt-server och förklara protokollet.
  * Gjorde du något på extrauppgiften?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/javascript). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.
