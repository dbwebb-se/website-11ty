---
author: sylvanas
category: webbprogrammering
revision:
  "2014-08-19": (B, Sylvanas) Instruktion för kopiering av material tillagt.
  "2014-06-16": (A, Sylvanas) Första utgåvan i samband med kursen javascript1.
updated: "2014-07-22 11:59:38"
created: "2014-06-18 09:53:25"
...
Flytta Baddie på webbsida (#5)
==================================

En uppgift för att öva på att använda DOM-trädet i JavaScript.

<!--more-->

Denna uppgift går ut på att ge baddie en ny miljö - en sorts karta. Allting på skärmen ska ritas ut med hjälp av DOM-element, och även stylingen kommer att sättas i js-koden för att öva på DOM och style. Till förfogande finns ofullständig kod där vissa delar saknas och dessa ska fyllas i för att rita ut spelplanen. Baddie5 finns i kursrepot och du kan se den ofullständiga baddie5 [här](http://dbwebb.se/javascript1/repo/me/default/kmom06/baddie5/).


Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften [Baddie4](/uppgift/flytta-baddie-pa-webbsida-4).

Du har gjort [lab5](uppgift/javascript-dom-och-events).



Introduktion {#intro}
-----------------------

För att lyckas med uppgiften behöver du kunna hur du lägger till och manipulerar element i DOM-trädet.

Använd dina kunskaper från tidigare övningar och exempel för att fullfölja uppgiften.

Läs instruktionerna överst i filen innan du börjar för att sätta dig in i hur uppgiften fungerar.
När du gör uppgiften, tänk på att testa ofta och läs i javascript-konsollen för att se om du har gjort rätt. I konsoll-utskrifterna finns också många hjälputskrifter för att du ska kunna testa dig fram till rätt resultat.

Jag har hittat mina bilder på [openclipart](http://openclipart.org/). Du kan byta ut mina mot andra bilder, eller kanske till och med rita egna?



Krav {#krav}
-----------------------

Uppgiften ska bygga på filerna som finns i `example/baddie/baddie5`. Såhär kopierar du dem över till katalogen `me/kmom06/baddie5`:
```bash
cd ~/dbwebb-kurser/javascript1
cp -ri example/baddie/baddie5 me/kmom06/
cd me/kmom06/baddie5
ls
```

1. Uppgiften ska byggas på filerna i `kmom06/baddie5/`.
2. Filen som ska redigeras är: `js/main.js`.
3. Kartan ska ta upp hela fönstret.
4. Det ska finnas 3 klickbara bilder på kartan: by, torn och fästning, där bara byn är klickbar i början.
5. När man klickar på en bild så ska baddie röra sig till bilden med en konstant hastighet (han ska inte gå snabbare bara för att det är längre).
6. När baddie är framme vid bilden ska en modal-ruta öppnas med en overlay som täcker bakgrunden. Overlayn ska ha opacity och modalrutan ska vara centrerat i fönstret.
7. Varje “plats” ska ha en uppgift att genomföra innan man kan gå vidare till nästa plats. T.ex ska man bara kunna klicka på första bilden tills uppgiften i modal för byn är genomförd, sedan kan man ta sig vidare till bild 2 (tornet).
8. När man har utfört en uppgift så ska modalens innehåll ändras så att man ser att uppgiften är genomförd. Detta ska kvarstå om baddie skulle gå tillbaka dit igen.
9. Byns modal ska innehålla 2 knappar. Den ena ska bara stänga modalfönstret, den andra ska ändra byns status till avslutad, varpå modalens innehåll ändras.
10. Tornets modal ska innehålla “gissa numret”. Numret ska vara ett slumpmässigt tal mellan 1 och 10. Gissningen ska skrivas in i ett input-fält, och när man trycker på enter i detta fält så ska gissningen göras. Gissningen ska sedan skrivas ut i en ruta och om det var rätt ska inputfältet avaktiveras och det ska stå att det var rätt nummer. Annars ska det stå om gissningen var högre eller lägre än det rätta numret.
11. Det ska finnas beskrivande text i varje modal. Bestäm själv vad det ska stå, hitta på en liten storyline.
12. När man visar kartan (ingen modal) så ska man kunna trycka på 1 för att avsluta/klara av byn och få komma vidare till tornet. Trycker man på 2 ska både byn och tornet klaras av och man ska kunna komma vidare till fästningen.
13. Baddie5 ska valideras och publiceras med bin/dbwebb enligt följande:

```bash
cd ~/dbwebb-kurser/javascript1/
bin/dbwebb validate baddie5
bin/dbwebb publish baddie5
```


Extrauppgift {#extra}
-----------------------

För extrauppgiften finns det inga anvisningar i kommentarerna. Du får själv leta i koden och testa dig fram till vad du behöver ändra och lägga till.

Skapa funktioner och innehåll för fästningen.

1. Det ska finnas en funktion för att avsluta/klara av fästningen.
2. Det ska finnas en funktion för att fylla modal med innehåll för när fästningen inte är avslutad. Hitta på någon uppgift att utföra.
3. Det ska finnas en funktion för att fylla modal med innehåll för när fästningen är avklarad. Hitta på något roligt att skriva som “avslutar” spelet.
4. När man klickar på fästningen så ska modal med innehåll visas.
5. Det ska gå att trycka på 3 i kartan som klarar av även fästningen.

För att klara av extrauppgiften behöver du följa samma struktur som för byn och tornet. Kopiera gärna funktionerna som finns och döp om dem så att de går att använda för fästningen. Granska eventListeners för byn och tornet för att se vad du behöver ändra för att visa innehåll i modal när man klickar på fästningen.



Tips från coachen {#tips}
-----------------------

Glöm inte att kontinuerligt testa det du gör, så att du snabbt hittar fel i koden.

Glöm inte att läsa metod- och funktionsbeskrivningar för att se om och vilka parametrar som behöver skickas med och vad de behöver innehålla, samt vad metoden/funktionen ska returnera.

Studera koden och testa gärna runt i koden och se vad som händer när du ändrar saker. Det kan ge dig större förståelse för vad koden gör.

**Lycka till och ställ frågor i forumet om du behöver hjälp!**



