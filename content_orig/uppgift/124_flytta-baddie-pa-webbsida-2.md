---
author: sylvanas
category: webbprogrammering
revision:
  "2015-08-27": (E, mos) Uppgraderad till dbwebb-cli version 2.
  "2015-02-12": (D, mos) Om att skriva fritt efter eget huvud.
  "2014-08-19": (C, Sylvanas) Instruktion för kopiering av material tillagt.
  "2014-08-12": (B, mos) Genomgången, mindre redaktionella ändringar.
  "2014-06-16": (A, Sylvanas) Första utgåvan i samband med kursen javascript1.
updated: "2015-08-27 08:46:17"
created: "2014-06-18 09:28:18"
...
Flytta Baddie på webbsida (#2)
==================================

En enklare uppgift för att öva på att använda funktioner JavaScript.

Uppgiften går ut på att få baddie att röra sig med hjälp av piltagenterna, där koden ska använda funktioner som grund. Till förfogande finns ofullständig kod där vissa delar saknas och dessa ska fyllas i för att få baddie att röra sig. 

<!--more-->

Baddie2 finns i kursrepot och du kan se och testa den ofullständiga baddie2 [här](javascript1/repo/example/baddie/baddie2/).




Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften [Baddie1](uppgift/flytta-runt-en-baddie-pa-webbsidan).

Du har gjort [lab2](uppgift/javascript-med-funktioner).



Introduktion {#intro}
-----------------------

För att lyckas med uppgiften behöver du kunna hur du deklarerar och använder funktioner.

Använd dina kunskaper från tidigare övningar och exempel för att fullfölja uppgiften.

Läs instruktionerna överst i filen innan du börjar för att sätta dig in i hur uppgiften fungerar.
När du gör uppgiften, tänk på att testa ofta och läs i javascript-konsollen för att se om du har gjort rätt. I konsoll-utskrifterna finns också många hjälputskrifter för att du ska kunna testa dig fram till rätt resultat.

Använd samma baddie-bild du hittade i förra kursmomentet.

*Om du känner dig begränsad av uppgiftens utformning och hellre vill skriva din egen kod fritt och efter eget huvud, så går det bra. Skriv i så fall en kommentar om det i redovisningstexten och berätta hur du gjorde.*


[YOUTUBE src=U1HZXfJgmFA width=700 caption="Andreas går igenom baddie2 koden."]



Krav {#krav}
-----------------------

Uppgiften ska bygga på filerna som finns i `example/baddie/baddie2`. Såhär kopierar du dem över till katalogen `me/kmom03/baddie2`:
```bash
# Ställ dig i kurskatalogen
cp -ri example/baddie/baddie2 me/kmom03/
cd me/kmom03/baddie2
ls
```

2. Filer som ska redigeras är: `js/main.js` samt `style/style.css`.
3. Baddie ska kunna röra sig upp, ner, höger och vänster med hjälp av piltangenterna på tangentbordet.
4. Baddie ska vända sig till höger respektive vänster när han går åt dessa håll.
5. Baddie ska inte kunna gå utanför sin ruta.
6. En egen baddie-bild ska användas.
7. Baddie2 ska valideras och publiceras enligt följande:

```bash
# Ställ dig i kurskatalogen
dbwebb validate baddie2
dbwebb publish baddie2
```


Extrauppgift {#extra}
-----------------------

1. Baddie ska kunna hoppa.



Tips från coachen {#tips}
-----------------------

Glöm inte att kontinuerligt testa det du gör, så att du snabbt hittar fel i koden.

**Lycka till och ställ frågor i forumet om du behöver hjälp!**
