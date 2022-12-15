---
author:
    - mos
category:
    - kurs oophp
    - kurs oophp-v3
revision:
    "2017-04-18": (A, mos) Första utgåvan.
...
Kmom04: Lagra innehåll i databasen
==================================

Att lagra innehåll i databasen för att sedan kunna visa upp det i webbplatsen är en kärnfunktionalitet i många webbplatser. Så här långt har vi en fungerande webbplats om använder sig av databas och objektorienterad programmering. Vi fortsätter att använda de teknikerna för att bygga grunden i en databasdriven webbplats där innehåll lagras i databasen och kan redigeras av användaren (CRUD). Vi skall sedan visa upp innehållet som vanliga sidor i webbplatsen samt en blogg.

Utmaningen är att hitta en bra lagringsstruktur i databastabellen, en bra och flexibel struktur som låter oss använda innehållet på ett smidigt sätt i webbplatsen och leder till effektiv SQL. Tänker man till när man skapar lagringsstrukturen så kan man spara ett antal kodrader när man sedan skall redigera, och visa upp innehållet i webbplatsen.

Utmaningen ligger även i hur man väljer att konstruera sina klasser, kanske går det att skapa en generell struktur som klarar både det ena och det andra och även är förberedd för att byggas ut.

[FIGURE src=image/snapvt17/content-delete-edit.png?w=w2 caption="Ett formulär för att jobba CRUD med innehåll i databasen."]

[FIGURE src=image/snapvt17/content-blog.png?w=w2 caption="En blogglista med alla inlägg med senaste inlägget först."]

[FIGURE src=image/snapvt17/content-textfilter.png?w=w2 caption="Innehållet formatteras och filtreras för att bli HTML."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*



###Kurslitteratur  {#kurslitteratur}

Det finns inga specifika lästips i kurslitteraturen.



###Artiklar {#artiklar}

Läs följande artiklar.

1. Läs översiktligt igenom "[Kokbok för databasmodellering](kunskap/kokbok-for-databasmodellering)" som ger dig grundläggande förståelse för hur du kan tänka när du modellerar en databas.



###Lästips {#lastips}

Följande tips från coachen används i övningen och uppgiften.

1. ["Reguljära uttryck i PHP ger BBCode formattering"](coachen/reguljara-uttryck-i-php-ger-bbcode-formattering)
1. ["Låt PHP-funktion make_clickable() automatiskt skapa klickbara länkar"](coachen/lat-php-funktion-make-clickable-automatiskt-skapa-klickbara-lankar)
1. ["Skriv för webben med Markdown och formattera till HTML med PHP (v2)"](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php-v2)



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*


###Övningar {#ovningar}

Gör följande övning, den förbereder dig inför uppgifterna och löser ett par av dem.

1. Jobba igenom guiden ["Lagra innehåll i databas för webbsidor och bloggposter (v2)"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter-v2). Spara dina exempelprogram under `me/kmom04/content`.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften "[Skapa en klass för textfiltrering och formattering](uppgift/skapa-en-klass-for-textfiltrering-och-formattering)". Den färdiga klassen integrerar du i `me/anax-lite`. Vill du testa och utveckla i en separat katalog så använder du `me/kmom04/textfilter`.

1. Gör uppgift "[Bygg webbsidor från innehåll i databasen](uppgift/bygg-webbsidor-fran-innehall-i-databasen)" och spara filerna i `me/anax-lite`.

1. Gör uppgiften "[Dokumentera din ER-modell med Reverse Engineering](uppgift/dokumentera-din-er-modell-med-reverse-engineering)". Spara resultatet i `me/kmom04/er1`.

1. Pusha och tagga ditt Anax Lite, allt eftersom och sätt en avslutande tagg (4.0.\*) när du är klar med alla uppgifter i kursmomentet.



###Extra {#extra}

Det finns inga extrauppgifter.

<!--
Gör följande extrauppgifter om du har tid, lust eller ambition.

1. Anax Flat File.

1. Känner du behov av att träna ytterligare på grunderna i SQL, vilket alltid är en god idé, så gör du laborationen "[SQL lab, introduktion till SQL](uppgift/sql-lab-introduktion-till-sql-dbjs)". Labben är gjord med SQLite. Filerna ligger i `me/kmom04/sql1`.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/oophp-v3/redovisa).

Se till att följande frågor besvaras i texten:

* Finns något att säga kring din klass för texfilter, eller rent allmänt om formattering och filtrering av text som sparas i databasen av användaren?
* Berätta hur du tänkte när du strukturerade klasserna och databasen för webbsidor och bloggposter?
* Förklara vilka routes som används för att demonstrera funktionaliteten för webbsidor och blogg (så att en utomstående kan testa).
* Hur känns det att dokumentera databasen så här i efterhand?
* Om du är självkritisk till koden du skriver i Anax Lite, ser du förbättringspotential och möjligheter till alternativ struktur av din kod?
