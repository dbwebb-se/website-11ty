---
author: mos
category: javascript
revision:
  "2020-11-19": (A, lew) Genomgången inför ht20.
...
Gör svenska flaggan med JavaScript och objekt
==================================

En uppgift för att komma igång med objekt i JavaScript. Du får i uppgift att bygga vidare på din hantering av flaggor och skapa dem via JavaScript objekt.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften att bygga en [svensk flagga med JavaScript, HTML och CSS](uppgift/gor-svenska-flaggan-med-javascript-html-och-css).

Du har löst labbarna med [JavaScript och arrayer](uppgift/javascript-och-arrayer) samt [JavaScript och objekt](uppgift/javascript-och-objekt).



Introduktion {#intro}
-----------------------

Du har sedan tidigare skapat flaggor i JavaScript med funktioner. Du skall nu använda objekt i JavaScript för att samla all information om flaggorna.

Tanken är att du gör ett objekt `flag` som innehåller grunderna för en flagga. Sedan kan du skapa en ny flagga utifrån det objektet. Ungefär så här.

```javascript
let flag = {
    /* properties and methods */
};

let swedishFlag = Object.create(flag);
swedishFlag.init( /* send arguments to init the flag as a swedish flag */);
swedishFlag.draw( /* optional arguments useful when drawing the flag */);
```



Krav {#krav}
-----------------------

1. Ta en kopia av din flag2 (från kmom03) och spara i din kurskatalog under `js/me/kmom04/flag3`.

```bash
# Ställ dig i kurskatalogen
cp -r me/kmom03/flag2/* me/kmom04/flag3
```

2\. Skapa samma flaggor som tidigare, men organisera din kod i objekt.

3\. Visa att det fungerar genom att skapa samtliga flaggor, placera dem i en array och loopa igenom arrayen för att göra vad som krävs för att rita ut flaggorna.

4\. När du är klar skall du validera och publicera ditt resultat enligt följande:

```bash
# Ställ dig i kurskatalogen
dbwebb validate flag3
dbwebb publish flag3
```

Rätta de felen som dyker upp. Sen är du klar. Dubbelkolla att dina flaggor fungerar på studentservern.



Extrauppgift {#extra}
-----------------------

Kan du lägga till en (enda) funktion som eventhanterare (i objektet) så att respektive flagga försvinner när du klickar på den?

Rita ut flaggorna med en "baksida" och använd eventhanterare för att "vända" flaggan så att den syns när man klickar på den. Klickar man igen så syns "baksidan" igen. Lite som [memory-exemplet](js/repo/example/memory) kanske.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

<!-- Kika i kodexemplen från [tutorialen](https://github.com/mosbth/javascript1/blob/master/tutorial/README.md) om du behöver stöd för din JavaScript-kodning, eller gå direkt till MDN om du känner dig lite mer erfaren. -->

**Lycka till och ställ frågor i forumet om du behöver hjälp!**
