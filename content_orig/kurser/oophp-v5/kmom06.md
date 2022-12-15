---
views:
    flash:
        region: flash
        template: default/image
        data:
            src: "img/snapvt19/oophp-kmom06-flash.svg"
author:
    - mos
category:
    - kurs oophp
revision:
    "2019-03-13": "(C, mos) Genomgången inför v5."
    "2018-04-30": "(B, mos) Uppdaterad inför oophp v4 och bytte kmom nummer."
    "2017-04-28": "(A, mos) Första utgåvan."
...
Kmom06: Lagra innehåll i databasen
==================================

Detta kursmoment har ett liknande upplägg som föregående och vi fortsätter att jobba med databasen där vi nu fokuserar på att hantera "innehåll" i databasen. Innehåll kan till exempel vara texten till de sidor som bygger upp en webbplats eller innehållet i bloggsidor.

Att lagra innehåll i databasen för att sedan kunna visa upp det i webbplatsen är en kärnfunktionalitet i många webbplatser. Så här långt har vi en fungerande webbplats om använder sig av databas och objektorienterad programmering. Vi fortsätter att använda de teknikerna för att bygga grunden i en databasdriven webbplats där innehåll lagras i databasen och kan redigeras (CRUD) av användaren. Vi skall sedan visa upp innehållet som vanliga sidor i webbplatsen samt en blogg.

Det vi bygger är i grunden ett enkelt Content Mangement System (CMS) där användaren kan redigera webbplatsens innehåll och texter via ett webbaserat gränssnitt.

Utmaningen är att hitta en bra lagringsstruktur i databastabellen, en bra och flexibel struktur som låter oss använda innehållet på ett smidigt sätt i webbplatsen och leder till effektiv SQL. Tänker man till när man skapar lagringsstrukturen så kan man spara ett antal kodrader när man sedan skall redigera, och visa upp innehållet i webbplatsen.

Utmaningen ligger även i hur man väljer att konstruera sina klasser, kanske går det att skapa en generell struktur som klarar både det ena och det andra, när det gäller texter och innehåll i databasen.

<!--more-->

[FIGURE src=image/snapvt17/content-delete-edit.png?w=w3 caption="Ett formulär för att jobba CRUD med innehåll i databasen."]

[FIGURE src=image/snapvt17/content-blog.png?w=w3 caption="En blogglista med alla inlägg med senaste inlägget först."]

[FIGURE src=image/snapvt17/content-textfilter.png?w=w3 caption="Innehållet formatteras och filtreras för att bli HTML."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 1-2 studietimmar)*



<!--
Detta hanteras inte, men borde kanske hanteras tidigare i kursen.

PHP manualen

Overloading https://www.php.net/manual/en/language.oop5.overloading.php
Magic Methods https://www.php.net/manual/en/language.oop5.magic.php
Final Keyword https://www.php.net/manual/en/language.oop5.final.php

Object Cloning https://www.php.net/manual/en/language.oop5.cloning.php
Comparing Objects https://www.php.net/manual/en/language.oop5.object-comparison.php
Objects and references https://www.php.net/manual/en/language.oop5.references.php
Object Serialization https://www.php.net/manual/en/language.oop5.serialization.php

-->



### Repetera {#repetera}

I föregående kmom fanns läsanvisningar om PHP PDO, eventuellt vill du gå tillbaka till dem och göra en kort repetition.

I förra kmomet läste du om "Databaser i ramverk" som referensmaterial och fördjupning. Har du tid över så är det bra att gå tillbaka till det stycket och läsa ytterligare lite mer.



### Hantera innehåll i webb och databas {#content}

Här finns ett antal lästips som visar hur du kan hantera text i databasen ur ett par olika aspekter. Artiklarna används i övningen och uppgiften som du skall genomföra. Läs igenom artiklarna för att förbereda dig och för att få en känsla för hur innehåll kan hanteras.

* "[Gör en läsbar url med slugify()](coachen/gor-en-lasbar-url-med-slugify)"
* "[Reguljära uttryck i PHP ger BBCode formattering](coachen/reguljara-uttryck-i-php-ger-bbcode-formattering)"
* "[Låt PHP-funktion make_clickable() automatiskt skapa klickbara länkar](coachen/lat-php-funktion-make-clickable-automatiskt-skapa-klickbara-lankar)"
* "[Skriv för webben med Markdown och formattera till HTML med PHP (v2)](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php-v2)"


### Referens textfiltrering (överkurs) {#content-ok}

Finner du detta ämne intressant så kan du även läsa följande tips från coachen.

* [Typografiska element för webben med SmartyPants](coachen/typografiska-element-med-smartypants)

Vi arbetar inte med det i uppgiften men det kan vara intressant att veta om filtret HTML Purifier som kan filtrera innehåll och struktur på din HTML-kod som genereras från din webbplats.

* [HTML Purifier](http://htmlpurifier.org/)

Även hanteringen av frontmatter är en sak som hanteras med ett textfilter. Här handlar det mest om en YAML parser som konverterar frontmattern till en PHP array. Här kan du läsa om olika YAML parsers inklusive den modulen som vi använder i Anax vilken är symfony/yaml.

* [PHP YAML Parsers](https://stackoverflow.com/a/3691710/341137)
* [The state of YAML in PHP](http://fabien.potencier.org/the-state-of-yaml-in-php.html)
* [symfony/yaml: The Yaml Component](https://symfony.com/doc/current/components/yaml.html)



### Ramverk Anax {#anax}

Den modulen som berörs i detta kursmoment är `anax/textfilter` men du kommer inte att använda den då du du istället kommer att göra din egen motsvarighet. Men om du har intresse att studera modulens uppbyggnad och kod så kan du som överkurs studera dess README och källkod.

* [anax/textfilter](https://github.com/canax/textfilter)

Modulen används (främst) för att hantera frontmatter och översätta text från markdown till HTML, lösa innehållsförteckningar och revisionshistorik samt sköta länkningen inom ramverket för flatfile content, de filer som ligger i `content/` katalogen. 

Du har sedan tidigare kännedom om följande moduler.

* [anax/commons](https://github.com/canax/commons)
* [anax/controller](https://github.com/canax/controller)
* [anax/database](https://github.com/canax/database)
* [anax/request](https://github.com/canax/request)
* [anax/response](https://github.com/canax/response)
* [anax/router](https://github.com/canax/router)
* [anax/session](https://github.com/canax/session)
* [anax/view](https://github.com/canax/view)



### Video {#video}

Det finns generellt kursmaterial i video form.

* Kursen innehåller genomgångar och föreläsningar som spelas in (streamas) och därefter läggs i en spellista. Du kan nå spellistan på "[oophp streams vt19](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-igucRSQ6tFYg9x8to5HiE)".

1. Uppgifter och övningar kan innehålla extra videomaterial i form av spellistor kopplade till respektive artikel. Ofta syns dessa videor i inledningen av artikeln.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*


### Övningar {#ovningar}

Gör följande övning, den förbereder dig inför uppgifterna.

1. 1. Jobba igenom guiden ["Lagra innehåll i databas för webbsidor och bloggposter (v2)"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter-v2). Spara dina eventuella exempelprogram under `me/kmom06/content`.

<!--
Använd gärna extern modul i varje kmom.
esc() wrapper, e(), eller modulen från Zend

Lägg Textfilter som övning, inte enbart som uppgift.
* Kanske lägga till testfall till klassen så man måste koda klassen så att den klarar vissa testfall?

purify

-->



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften "[Skapa en klass för textfiltrering och formattering (v2)](uppgift/skapa-en-klass-for-textfiltrering-och-formattering-v2)". Den färdiga klassen integrerar du i `me/redovisa`. Vill du testa och utveckla i en separat katalog så använder du `me/kmom06/textfilter`.

1. Gör uppgift "[Bygg webbsidor från innehåll i databasen](uppgift/bygg-webbsidor-fran-innehall-i-databasen)" och spara filerna i `me/redovisa`.

1. Pusha och tagga ditt repo `me/redovisa` allt eftersom och sätt en avslutande tagg (6.0.\*) när du är klar med alla uppgifter och redovisningstext i kursmomentet. Gör även en avslutande `make test` som en sista avstämning, innan du sätter sista taggen.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Hur gick det att jobba med klassen för filtrering och formatting av texten?
* Berätta om din klasstruktur och kodstruktur för din lösning av webbsidor med innehåll i databasen.
* HUr känner du rent allmänt för den koden du skrivit i din me/redovisa, vad är bra och mindre bra?
* Ser du potential till refactoring av din kod och/eller behov av stöd från ramverket?
* Vilken är din TIL för detta kmom?
