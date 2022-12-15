---
author: sylvanas
category: webbprogrammering
revision:
  "2015-08-27": (D, mos) Uppgraderad till dbwebb-cli version 2.
  "2015-02-12": (C, mos) Om att skriva fritt efter eget huvud.
  "2014-08-19": (B, Sylvanas) Instruktion för kopiering av material tillagt.
  "2014-06-16": (A, Sylvanas) Första utgåvan i samband med kursen javascript1.
updated: "2015-08-27 08:52:39"
created: "2014-06-18 09:53:40"
...
Flytta Baddie på webbsida (#3)
==================================

En enklare uppgift för att öva på att använda arrayer i JavaScript.

<!--more-->

Uppgiften går ut på att rita ut en spelplan som baddie kan interagera med, där spelplanen ska byggas med en array. Till förfogande finns ofullständig kod där vissa delar saknas och dessa ska fyllas i för att rita ut spelplanen. Baddie3 finns i kursrepot och du kan se den ofullständiga baddie3 [här](javascript1/repo/example/baddie/baddie2/).


Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften [Baddie2](uppgift/flytta-baddie-pa-webbsida-2).

Du har gjort [lab3](uppgift/javascript-och-arrayer).


Introduktion {#intro}
-----------------------

För att lyckas med uppgiften behöver du kunna hur du deklarerar och använder arryer.

Använd dina kunskaper från tidigare övningar och exempel för att fullfölja uppgiften.

Läs instruktionerna överst i filen innan du börjar för att sätta dig in i hur uppgiften fungerar.
När du gör uppgiften, tänk på att testa ofta och läs i javascript-konsollen för att se om du har gjort rätt. I konsoll-utskrifterna finns också många hjälputskrifter för att du ska kunna testa dig fram till rätt resultat.

Här har jag minskat storleken på min baddie-bild till 32x32px för att 
passa 
till de rutor jag använder. Dessa rutor, *tiles*, kommer från ett stort tileset som finns på [opengameart](http://opengameart.org/content/dungeon-crawl-32x32-tiles) och du kan ladda ner och byta ut mina tiles mot egna.

*Om du känner dig begränsad av uppgiftens utformning och hellre vill skriva din egen kod fritt och efter eget huvud, så går det bra. Skriv i så fall en kommentar om det i redovisningstexten och berätta hur du gjorde.*



Krav {#krav}
-----------------------

Uppgiften ska bygga på filerna som finns i `example/baddie/baddie3`. Såhär kopierar du dem över till katalogen `me/kmom04/baddie3`:
```bash
# Ställ dig i kurskatalogen
cp -ri example/baddie/baddie3 me/kmom04/
cd me/kmom04/baddie3
ls
```

2. Filer som ska redigeras är: `js/main.js` samt `style/style.css`.
3. En bana ska ritas ut med väggar, en dörr och minst en låda. Storleken ska vara 10x10 rutor.
4. Baddie ska kunna gå up, ner, höger och vänster.
5. Baddie ska vända sig åt höger respektive vänster när han går åt dessa håll.
6. Baddie ska inte kunna gå in i väggar.
7. Baddie ska kunna flytta på lådor så länge det inte är något annat i vägen.
8. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate baddie3
dbwebb publish baddie3
```



Extrauppgift {#extra}
-----------------------

För extrauppgiften finns det denna gången inga anvisningar i kommentarerna. Du får själv leta i koden och testa dig fram till vad du behöver ändra och lägga till.

1. Ändra storleken på banan. Gör den större!
2. Lägg till fler typer av rutor på banan. Välj själv om baddie ska kunna gå på eller flytta dem.



Tips från coachen {#tips}
-----------------------

Glöm inte att kontinuerligt testa det du gör, så att du snabbt hittar fel i koden.

**Lycka till och ställ frågor i forumet om du behöver hjälp!**
