---
author: mos
revision:
    "2017-10-17": (B, mos) Uppdaterad inför ht17.
    "2015-11-29": (A, mos) Första utgåvan för kursen.
...
Kmom03: Kuber och texturer
==================================

Du fortsätter att öva på programmering med JavaScript. Denna gången är det fokus på arrayer och objekt. Samtidigt fördjupar du dig i WebGL med texturer, MVP-matriser och du ritar kuber i en 3D-värld.

<!--more-->



Det kan se ut så här när du jobbar med övningarna.

[FIGURE src=/image/snapht15/webgl-cube.png?w=w2 caption="En kub i olika färger."]


<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [WebGL Programming Guide](kunskap/boken-webgl-programming-guide).
    * Ch 5: Using Colors and Texture Images
    * Ch 6: The OpenGL ES Shading Language (GLSL ES) (översiktligt, använd som referens)
    * Ch 7: Toward the 3D World

I kapitlen finns en del exempelprogram som du kan testa direkt i ditt kursrepo `example/webgl/theBook`, eller via [dbwebb's kopia av kursrepot](webgl/repo/example/webgl/theBook).

1. Läs i boken [Speaking JavaScript: An In-Depth Guide for Programmers](kunskap/boken-speaking-javascript) om arrayer och grunderna för objekt.
    * [Ch17 Objects and Inheritance](http://speakingjs.com/es5/ch17.html) (läs endast första stycket om "Layer 1: Single Objects")
    * [Ch18 Arrays](http://speakingjs.com/es5/ch18.html)



###MDN {#mdn}

Läs följande:

1. I dokumentet "[MDN JavaScript Guide](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide)" läs om konstruktioner för arrayer och grunderna om objekt.
    * [Indexed collections](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Indexed_collections)
    * [Working with objects](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Working_with_Objects)

1. I referensmanualen [JavaScript reference](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference) läs översiktligt om arrayer.
    * [Array](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array)



###Artiklar {#artiklar}

Läs igenom följande artiklar.

1. Kika igenom [tutorialen om WebGL på MDN](https://developer.mozilla.org/en-US/docs/Web/API/WebGL_API/Tutorial/Getting_started_with_WebGL), där ser du hur en kub kan animeras och renderas med texturer. 



###Video  {#video}

Kika på följande videor.

1. Videoserien [Lär dig JavaScript](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_YXUQlr5aAzJ406vSsmeMT) är tätt kopplat till kursmaterialet. Kika igenom serien under kursens gång.

1. Kika på [Getting started with three.js and WebGL by Jaume Sanchez Elias at JSConf Budapest 2015](https://www.youtube.com/watch?v=HwkGTYRopYg) om du är intresserad av att se hur ramverket Three.js jobbar med 3D för webben ovanpå WebGL.



###Lästips {#lastips}

Läs gärna följande för att förkovra dig.

1. Kika i [specifikationen för WebGL](https://www.khronos.org/registry/webgl/specs/latest/) för att orientera dig om vilka funktioner som finns.

1. Kika på de artiklar som [WebGL Fundamentals](http://webglfundamentals.org/) presenterar inom det område som kursmomentet omspänner.

1. Kika på de lektioner som [Learning WebGL](http://learningwebgl.com/blog/?page_id=1217) erbjuder inom kursmomentets område.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar för att träna inför uppgifterna.

1. För att träna inför uppgiften så bör du skapa dina egna varianter av de exempelprogram som visas i bokens kapitel om texturer och 3D-världen.

1. Studera koden i de exempelprogram som finns i kursrepot och är döpta till `example/sandboxWebGL5*` och `example/sandboxWebGL7*`. De kan hjälpa dig att lösa uppgifterna.

<!-- Fixa övning i animering och 3D-värld som motsvarar uppgiften. -->
<!-- Fixa artikel om JavaScript objekt och prototyper. -->
<!-- Fixa artikel om partikelexplosion. -->
<!-- .... -->



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

2. Gör uppgiften "[JavaScript med objekt](uppgift/javascript-och-objekt)". Spara resultatet i `me/kmom03/lab5`.

1. Gör uppgiften "[Skapa en animerad 3D-värld](uppgift/skapa-en-animerad-3d-varld)". Spara resultatet i `me/kmom03/world`.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Gjorde du några särskilda iakttagelser i bokens kapitel 5, 6 och 7 som du vill nämna?
* Hur gick det att utföra labbarna med arrayer och objekt?
* Berätta kort om hur du löste uppgiften om kuber och texturer?
* Känner du att du har en god bas i WebGL? Vad känner du att du saknar?
* Var det något som var klurigt, utmanande eller tog extra mycket tid?
