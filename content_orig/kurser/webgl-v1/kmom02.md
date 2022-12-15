---
author: mos
revision:
    "2017-10-17": (B, mos) Uppdaterad inför ht17.
    "2015-11-13": (A, mos) Första utgåvan för kursen.
...
Kmom02: Animering och trianglar
==================================

Vi fördjupar oss i programmering med JavaScript genom att läsa på om dess grundstrukturer samt testar dem via laborationer. Därefter ser vi kan förbättra vår sandbox med animeringar och helskärmsläge. Du fortsätter studera WebGL och ritar trianglar som du styr med musen och du skapar enklare animationer.

<!--more-->



Det kan se ut så här när vi är klara.

<!--
[FIGURE src=/image/snapht15/js-boulder-dash.png?w=w2 caption="Arrayer kan användas till mycket, här för att skapa en spelplan för spelet Boulder Dash, dock inte gjord i webgl."]
-->

[FIGURE src=/image/snapht15/animate-many.png?w=w2 caption="Animera många trianglar i en uppdaterad sandbox för WebGL."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*


### Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [WebGL Programming Guide](kunskap/boken-webgl-programming-guide).
    * Ch 3: Drawing and transforming triangles
    * Ch 4: More transformations and basic animation

I kapitlen finns en del exempelprogram som du kan testa direkt i ditt kursrepo `example/webgl/theBook`, eller via [dbwebb's kopia av kursrepot](webgl/repo/example/webgl/theBook).

1. Läs i boken [Speaking JavaScript: An In-Depth Guide for Programmers](kunskap/boken-speaking-javascript) om villkor och loopar.
    * [Ch1 Basic JavaScript](http://speakingjs.com/es5/ch01.html#_statements) (läs endast om conditionals och loops)
    * [Ch13 Statements](http://speakingjs.com/es5/ch13.html) (hoppa över `with`)
    * [Ch15 Functions](http://speakingjs.com/es5/ch15.html)



### MDN {#mdn}

Läs igenom följande.

1. I dokumentet "[MDN JavaScript Guide](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide)" läs om konstruktioner för villkor och loopar samt funktioner.
    * Control flow and error handling
    * Loops and iteration
    * [Functions](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Functions)

1. Bekanta dig med referensmanualen [JavaScript reference](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference). Som en introduktion kan du kika på konstruktioner för villkor och loopar samt funktioner.
    * [Statements and declarations](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements)
    * [if...else](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/if...else)
    * [for](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/for)
    * [Functions](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions)



### Artiklar {#artiklar}

Läs följande artiklar.

1. På MDN finns en längre artikel om grunderna i JavaScript, som en översiktlig introduktion till grundläggande begrepp i JavaScript. Du kan kika i artikeln "[A re-introduction to JavaScript (JS tutorial)](https://developer.mozilla.org/en-US/docs/Web/JavaScript/A_re-introduction_to_JavaScript)" och läsa översiktligt. Kanske vill du komma tillbaka till artikeln i senare kursmoment. Artikeln ger en bra översikt till den som redan kan andra programmeringsspråk.



### Video  {#video}

Titta på följande:

1. Videoserien [Lär dig JavaScript](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_YXUQlr5aAzJ406vSsmeMT) är tätt kopplat till kursmaterialet. Kika igenom serien under kursens gång.

1. The Khronos Group har en [videoserie om WebGL](https://www.youtube.com/playlist?list=PL63EB8C8CE576ED2F). Kika igenom vad den innehåller och se om du kan finna inspiration.



### Lästips {#lastips}

Läs gärna följande för att förkovra dig.

1. Kika på de artiklar som [WebGL Fundamentals](http://webglfundamentals.org/) presenterar inom det område som kursmomentet omspänner.

1. Kika på de lektioner som [Learning WebGL](http://learningwebgl.com/blog/?page_id=1217) erbjuder inom kursmomentets område.

1. Se video med JavaScript-gurun Douglas Crockford i en historisk bakgrund om programmeringsspråk och en introduktion till JavaScript: "[Crockford on JavaScript - Volume 1: The Early Years](https://www.youtube.com/watch?v=JxAXlJEmNMg)".




Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*

### Övningar {#ovningar}

1. Arbete igenom övningen [Strukturera JavaScript med klasser](kunskap/strukturera-javascript-med-klasser) för att träna på några av de nyare JavaScript konstruktionerna som tillkommit senaste åren.

<!--

1. **Gammal måste uppdateras** Läs igenom artiklen "[Programmering med grunderna i JavaScript](kunskap/programmering-med-grunderna-i-javascript)". Om du gör exempelprogrammen så kan du spara dem i kursrepot under `me/kmom02/core`.
-->

<!--
1. **EJ KLAR** Förbättra din testmiljö för WebGL genom att uppgrader din sandbox till sandbox version 2 med stöd för "[WebGL med animering i fullskärmsläge](kunskap1/webgl-med-animering-i-fullskarmslage)".
-->



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör laborationen "[JavaScript med funktioner](uppgift/javascript-med-funktioner)". Spara resultatet i `me/kmom02/lab3`.

1. Gör uppgiften "[JavaScript och arrayer](uppgift/javascript-och-arrayer)". Spara resultatet i `me/kmom02/lab4`.

1. Gör uppgiften "[Rita trianglar med WebGL och animera dem](uppgift/rita-trianglar-med-webgl-och-animera-dem)". Ditt resultat sparar du delvis i `me/kmom02/sandbox3` och delvis i `me/kmom02/tri`.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur är din syn på programmeringsspråket JavaScript så här långt? Jämför med andra programmeringsspråk som du känner till.
* Hur känner du inför WebGL kontra de 3D-tekniker du är van vid?
* Gjorde du något speciellt med kodstrukturen i din sandbox?
* Gjorde du något speciellt med triangel-uppgiften?
* Vilka resurser i kursmaterialet finner du mest nyttiga för att lösa uppgifterna? Eller hittar du egna resurser på nätet, isåfall vilka och vad tycker du om dem?
