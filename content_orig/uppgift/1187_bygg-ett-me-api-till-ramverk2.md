---
author:
    - efo
category:
    - javascript
    - nodejs
    - kurs ramverk2
revision:
    "2017-12-07": "(A, efo) Första utgåvan."
...
Bygg ett me API till ramverk2
===================================

Du skall sätta samman ett me API baserat på ett nodejs baserat backend ramverk, till exempel Express.

Du skall lägga all kod i ett repo på GitHub. När du är klar så publicerar du och taggar ditt repo på GitHub. Du skall även publicera ditt API publikt och länka till det i din redovisningstext.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Node.js API med Express](kunskap/nodejs-api-med-express)".



Introduktion {#intro}
-----------------------

Du ska bygga ett API som skickar ett JSON objekt för varje redovisningstext samt en kort introduktion av dig själv. Du ska välja ett backend ramverk för att skapa ditt API och sedan implementera ett litet API med i första skedet två router: `/` och `/reports/kmom01`.



### Tänk till om kodstrukturen {#strukturen}

Tänk till en extra gång när du nu organiserar ditt repo. Tänk vilken katalogstruktur du vill ha och hur du skall organisera din kod i filer och moduler.

Tänk det som att du vore en systemarkitekt på ett företag, du måste bestämma den struktur som företagets programmerare skall jobba i så det är viktigt att du gör ett bra beslut som fungerar för många individer som jobbar i teamet.

Tänk på att koden skall vara testbar. Du kan lita på att vi kommer införa enhetstester.

Tips. Det kan vara klokt att kika på Express app generator som scaffoldar fram en app till dig. Ibland är det bra att ha kompletta kodexempel framför sig.



### Exempel {#exempel}

Jag fixade ett exempel, bara för att kolla att alla delarna fungerar tillsammans som tänkt. Du kan se mitt exempel på [`emilfolino/ramverk2-me`](https://github.com/emilfolino/ramverk2-me) och det finns live på [me-api.jsramverk.me](https://me-api.jsramverk.me).



Krav {#krav}
-----------------------

1. Använd ditt valda nodejs baserade backend ramverk för att skapa ett me API.

1. Se till att det finns en `package.json` i katalogen. Filen skall innehålla alla beroenden som krävs.

1. Skapa routen `/` där du ger en presentation av dig själv.

1. Skapa routen `/reports/kmom01` där du ger din redovisningstext för kmom01.

1. Committa alla filer och lägg till en tagg (1.0.0) med hjälp av `npm version 1.0.0`. Det skapas automatiskt en motsvarande tagg i ditt GitHub repo. Lägg till fler taggar efterhand som det behövs. Var noga med din committ-historik.

1. Pusha upp repot till GitHub, inklusive taggarna.

1. Publicera ditt API publikt och lägg den publika adressen i din inlämning på Canvas.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Kolla in app-generatorn som finns till Express, den kan ge dig tips till kodstruktur och innehåll i din app.

Lycka till och hojta till i forumet om du behöver hjälp!
