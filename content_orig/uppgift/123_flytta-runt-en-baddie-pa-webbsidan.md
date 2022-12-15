---
author: sylvanas
category: webbprogrammering
revision:
    "2016-09-12": (G, mos) Rätt länk till exempelprogram.
    "2016-04-06": (F, mos) Rätt länk till exempelprogram.
    "2015-08-27": (E, mos) Uppgraderad till dbwebb-cli version 2.
    "2015-02-12": (D, mos) Om att skriva fritt efter eget huvud.
    "2014-08-19": (C, Sylvanas) Instruktion för kopiering av material tillagt.
    "2014-08-11": (B, mos) Genomgången och mindre redigeringar i texten.
    "2014-06-16": (A, Sylvanas) Första utgåvan i samband med kursen javascript1.
updated: "2016-04-06 09:54:55"
created: "2014-06-18 08:47:26"
...
Flytta runt en Baddie på webbsidan
==================================

En enklare uppgift för att öva på att använda variabler och skapa if- eller switch-sats i JavaScript.

<!--more-->

Uppgiften går ut på att få en figur, en baddie, att röra sig på skärmen med hjälp av piltangenterna. Till förfogande finns ofullständig kod där vissa delar saknas och dessa ska fyllas i för att få baddie att röra sig. Baddie1 finns i kursrepot och du kan se den ofullständiga baddie1 [här](repo/javascript1/example/baddie/baddie1).


Förkunskaper {#forkunskaper}
-----------------------

Du kan de enkla grunderna i [HTML](coachen/gor-din-forsta-sida-med-html5), [CSS](coachen/styla-din-sida-med-css-och-en-extern-stylesheet) och [JavaScript](coachen/kom-igang-med-javascript-och-skriv-din-forsta-kod).

Du har satt upp en labbmiljö och har [initierat kursmaterialet](kunskap/labbmiljo-for-javascript-i-webblasaren).

Du har gjort [lab1](uppgift/javascript-med-variabler-loopar-och-inbyggda-funktioner).



Introduktion {#intro}
-----------------------

För att lyckas med uppgiften behöver du kunna hur du sätter och använder variabler i JavaScript, hur du deklarerar en if/switch-sats samt kunna grundläggande aritmetik och villkorsatser i JavaScript.

Använd dina kunskaper från tidigare övningar och exempel för att fullfölja uppgiften.

Läs instruktionerna överst i filen innan du börjar för att sätta dig in i hur uppgiften fungerar.
När du gör uppgiften, tänk på att testa ofta och läs i javascript-konsollen för att se om du har gjort rätt. Du kan med fördel lägga till fler utskrifter i konsollen för att hjälpa till med debuggingen.

En del av uppgiften går ut på att byta ut min baddie mot en egen figur. Du kan hitta baddies som är gratis att använda på [openclipart](http://openclipart.org/tags/baddie).

*Om du känner dig begränsad av uppgiftens utformning och hellre vill skriva din egen kod fritt och efter eget huvud, så går det bra. Skriv i så fall en kommentar om det i redovisningstexten och berätta hur du gjorde.*


[YOUTUBE src=koOttbVOzcU width=700 caption="Andreas går igenom baddie1 koden."]



Krav {#krav}
-----------------------

Uppgiften ska bygga på filerna som finns i `example/baddie/baddie1`. Så här kopierar du dem över till katalogen `me/kmom02/baddie1`:
```bash
# Ställ dig i kurskatalogen
cp -ri example/baddie/baddie1 me/kmom02/
cd me/kmom02/baddie1
ls
```

2. Filer som ska redigeras är: `js/main.js` samt `style/style.css`.
3. Baddie ska kunna röra sig upp, ner, höger och vänster med hjälp av piltangenterna på tangentbordet.
4. Baddies rörelse ska hanteras av en switch-case eller en if/else.
5. En egen baddie-bild ska användas.
6. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate baddie1
dbwebb publish baddie1
```


Extrauppgift {#extra}
-----------------------

1. Hantera så att baddie inte kan flytta sig utanför fönstret.



Tips från coachen {#tips}
-----------------------

Glöm inte att kontinuerligt testa det du gör, så att du snabbt hittar fel i koden.

Det ska vara roligt att koda också, så lägg gärna ner lite tid på att hitta en egen bra baddie/figur så att det verkligen känns som ditt eget.

Om du vill testa hur långt dina vingar bär så försök hitta olika sätt att lösa uppgiften på.

**Lycka till och ställ frågor i forumet om du behöver hjälp!**
