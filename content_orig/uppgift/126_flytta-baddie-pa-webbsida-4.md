---
author: sylvanas
category: webbprogrammering
revision:
  "2015-08-27": (C, Sylvanas) Hela texten uppdaterad för den nya versionen av baddie4.
  "2014-08-19": (B, Sylvanas) Instruktion för kopiering av material tillagt.
  "2014-06-16": (A, Sylvanas) Första utgåvan i samband med kursen javascript1.
updated: "2015-08-27 09:45:12"
created: "2014-06-18 09:53:33"
...
Flytta Baddie på webbsida (#4)
==================================

En uppgift för att öva på att använda object i JavaScript.

<!--more-->

Uppgiften går ut på att rita ut en spelplan som baddie kan interagera med, där alla delar byggs med hjälp av objekt. Till förfogande finns ofullständig kod där vissa delar saknas och dessa ska fyllas i för att rita ut spelplanen och baddie. Baddie4 finns i kursrepot och du kan se den ofullständiga baddie4 [här](javascript1/repo/me/default/kmom05/baddie4/).

[INFO] Glöm inte att fråga i forumet om du sitter fast och behöver hjälp. Det kan handla om att förstå koden, instruktionerna eller hur du ska lösa ett problem. Våga fråga, du behöver inte sitta fast i onödan! [/INFO]



Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften [Baddie3](uppgift/flytta-baddie-pa-webbsida-3).

Du har gjort [lab4](uppgift/javascript-och-objekt).


Introduktion {#intro}
-----------------------

Koden för denna baddie är helt omstrukturerad, och bygger nu på 3 olika objekt: baddie, board och game. Dessa tre objekt finns alltså redan i koden, men vissa funktioner finns som uppgift att skriva klart. Därefter så är det du själv som ska skriva kod för att initera objekten så att alla delar visas på skärmen och fungerar som det är tänkt.

Använd kunskaper från tidigare övningar och exempel.

Läs instruktionerna överst i filen innan du börjar för att sätta dig in i hur uppgiften fungerar.
Det är viktigt att du läser genom koden noga och skapar dig koll på vad objekten innehåller i form av egenskaper (variabler) och metoder (objekt), då det är tänkt att du ska använda dig av flera av dessa själv.

Testa dig fram, och prova ofta. Du har utskrifter i console till hjälp, och det är förstås fritt fram att även lägga till egna utskrifer om du känner att det behövs eller kan hjälpa dig.

[INFO]
Om du känner dig begränsad av uppgiftens utformning och hellre vill skriva din egen kod fritt och efter eget huvud, så går det bra. Skriv i så fall en kommentar om det i redovisningstexten och berätta hur du gjorde. Tänk dock på att det ska uppfylla uppgiftens huvudmål: baddie skriven med objekt.
[/INFO]



Krav {#krav}
-----------------------

Uppgiften ska bygga på filerna som finns i `example/baddie/baddie4`. Såhär kopierar du dem över till katalogen `me/kmom05/baddie4`.

```bash
# Ställ dig i kurskatalogen
cp -ri example/baddie/baddie4 me/kmom05/
cd me/kmom05/baddie4
ls
```

När baddie är färdig så ska följande krav vara uppfyllda.

1. Följande objekt ska vara kompletta: myBaddie, myBoard, myGame.

2. Objekten ska initeras med hjälp av sina respektive init-funktioner.

3. En bana ska ritas ut med väggar och en dörr. Storleken ska vara minst 10x10 rutor.

4. Baddie ska ritas ut och kunna röra sig till höger, vänster, upp och ner med hjälp av piltangenter.

5. Baddie ska kunna vända sig till höger respektive vänster när han byter riktning åt dessa håll.

6. Baddie ska inte kunna gå in i väggar.

7. Koden ska valideras och publiceras enligt följande:

```bash
# Ställ dig i kursrepot
dbwebb validate baddie4
dbwebb publish baddie4
```



Extrauppgift {#extra}
-----------------------

Gör det åter igen möjligt för baddie att flytta på lådor. Kravet är att du måste lösa det genom att lägga till kod i objekten, där du kan behöva lägga till en eller flera nya metoder (funktioner) i valfritt objekt. Motivera sedan hur du har skrivit din kod (vilken/vilka metoder lade du till, vart lade du till dem, varför lade du dem där?).



Tips från coachen {#tips}
-----------------------

Det är bra om du testar för varje liten uppgift i koden du gör, så att om det blir fel så hittar du det direkt. Detta istället för att skriva mycket kod och sen testa först i slutet. Då blir felen svårare att hitta.

Läs noga genom den kod som finns, det finns tips om lösningar eller hur du behöver göra i kommentarerna.

Glöm inte att lägga till en baddie-bild att använda, annars kommer inte baddie att synas.

Våga fråga om du sitter fast, det finns alltid hjälp till hands.




