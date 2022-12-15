---
author:
    - mos
category:
    - kurs oophp-v3
    - kurs oophp
revision:
    "2018-04-30": "(B, mos) Uppdaterad inför oophp v4 och bytte kmom nummer."
    "2017-04-28": "(A, mos) Första utgåvan."
...
Kmom06: Lagra innehåll i databasen
==================================

Att lagra innehåll i databasen för att sedan kunna visa upp det i webbplatsen är en kärnfunktionalitet i många webbplatser. Så här långt har vi en fungerande webbplats om använder sig av databas och objektorienterad programmering. Vi fortsätter att använda de teknikerna för att bygga grunden i en databasdriven webbplats där innehåll lagras i databasen och kan redigeras (CRUD) av användaren. Vi skall sedan visa upp innehållet som vanliga sidor i webbplatsen samt en blogg.

Det vi bygger är egentligen grunden i ett enkelt Content Mangement System (CMS) där användaren kan redigera webbplatsens innehåll via ett webbaserat gränssnitt.

Utmaningen är att hitta en bra lagringsstruktur i databastabellen, en bra och flexibel struktur som låter oss använda innehållet på ett smidigt sätt i webbplatsen och leder till effektiv SQL. Tänker man till när man skapar lagringsstrukturen så kan man spara ett antal kodrader när man sedan skall redigera, och visa upp innehållet i webbplatsen.

Utmaningen ligger även i hur man väljer att konstruera sina klasser, kanske går det att skapa en generell struktur som klarar både det ena och det andra och även är förberedd för att byggas ut.

<!-- more -->

[FIGURE src=image/snapvt17/content-delete-edit.png?w=w3 caption="Ett formulär för att jobba CRUD med innehåll i databasen."]

[FIGURE src=image/snapvt17/content-blog.png?w=w3 caption="En blogglista med alla inlägg med senaste inlägget först."]

[FIGURE src=image/snapvt17/content-textfilter.png?w=w3 caption="Innehållet formatteras och filtreras för att bli HTML."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 1-2 studietimmar)*



###Videor {#videor}

Kika på följande videos.

1. Det finns en [YouTube spellista kopplad till kursen](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_jh6fAj1iwiJSj70DXA2Vn), kika på de videos som börjar med 6. De ger dig en introduktion och översikt till kursmomentet.



###Lästips {#lastips}

Följande tips från coachen används i övningen och uppgiften.

1. "[Gör en läsbar url med slugify()](coachen/gor-en-lasbar-url-med-slugify)"
1. "[Reguljära uttryck i PHP ger BBCode formattering](coachen/reguljara-uttryck-i-php-ger-bbcode-formattering)"
1. "[Låt PHP-funktion make_clickable() automatiskt skapa klickbara länkar](coachen/lat-php-funktion-make-clickable-automatiskt-skapa-klickbara-lankar)"
1. "[Skriv för webben med Markdown och formattera till HTML med PHP (v2)](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php-v2)"



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*


###Övningar {#ovningar}

Gör följande övning, den förbereder dig inför uppgifterna.

1. 1. Jobba igenom guiden ["Lagra innehåll i databas för webbsidor och bloggposter (v2)"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter-v2). Spara dina exempelprogram under `me/kmom06/content`.

<!--
esc() wrapper, e(), eller modulen från Zend

Lägg Textfilter som övning, inte enbart som uppgift.

purify

användare, lösenord
-->



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften "[Skapa en klass för textfiltrering och formattering (v2)](uppgift/skapa-en-klass-for-textfiltrering-och-formattering-v2)". Den färdiga klassen integrerar du i `me/redovisa`. Vill du testa och utveckla i en separat katalog så använder du `me/kmom06/textfilter`.

1. Gör uppgift "[Bygg webbsidor från innehåll i databasen](uppgift/bygg-webbsidor-fran-innehall-i-databasen)" och spara filerna i `me/redovisa`.

1. Pusha och tagga ditt repo `me/redovisa` allt eftersom och sätt en avslutande tagg (6.0.\*) när du är klar med alla uppgifter och redovisningstext i kursmomentet. Gör även en avslutande `make doc` och en `make test` som en sista avstämning, innan du sätter sista taggen.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Hur gick det att jobba med klassen för filtrering och formatting av texten?
* Berätta om din klasstruktur och kodstruktur för din lösning av webbsidor med innehåll i databasen.
* HUr känner du rent allmänt för den koden du skrivit i din me/redovisa, vad är bra och mindre bra? Ser du potential till refactoring av din kod och/eller behov av stöd från ramverket?
* Vilken är din TIL för detta kmom?
