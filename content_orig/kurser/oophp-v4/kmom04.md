---
author:
    - mos
revision:
    "2018-09-24": "(C, mos) Mindre genomgång."
    "2018-04-16": "(B, mos) Uppdaterad till oophp v4."
    "2017-04-18": "(A, mos) Första utgåvan."
...
Kmom04: Trait och Interface
==================================

Vi fortsätter med kodande och testande utanför och inuti ramverket. Fokus är följande, klasskonstruktioner som trait och interface, mer enhetstestning samt integrera koden ytterligare med ramverket genom att använda ramverkets klasser i störra omfattning.

Trait och interface är två objektorienterade konstruktioner som kan användas för att strukturera sin kod i klasser. Det ger oss två nya verktyg för att tänka och implementera koden på ett objektorienterat sätt.

Erfarenheterna från trait och interface använder vi sedan för att vidareutveckla vårt 100-spel med lite intelligens när vi spelar mot datorn som spelare. Samtidigt börjar vi mer använda ramverkets klasser för att knyta in vår kod i ramverkets "skydd".

När detta är gjort så börjar vi bygga en testsuite för våra klasser och vi gör `make test` inuti ramverket.

<!-- more -->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*



### Videor {#videor}

Kika på följande videos.

1. Det finns en [YouTube spellista kopplad till kursen](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_jh6fAj1iwiJSj70DXA2Vn), kika på de videos som börjar med 4. De ger dig en introduktion och översikt till kursmomentet.



### Artiklar {#artiklar}

Läs följande.

1. Läs igenom den korta artikeln "[Martin Fowler: Tell Dont Ask](https://martinfowler.com/bliki/TellDontAsk.html)" som ger en insikt i objektorienterat tänkade och hur man delvis kan tänka när man strukturerar sina objekt och var man väljer att lägga sin kod.

1. Titta tillbaka i översikten av dokumentet [PHP The Right Way](http://www.phptherightway.com/). Titta genom vilka sektioner som vi hanterat hittills i kursen och fundera vilka begrepp som du har koll på.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-14 studietimmar)*



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. I guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)" jobbar du igenom följande del. Spara koden i `me/kmom04/oophp3`. Kopiera alla filer från `me/kmom02/oophp2`, du jobbar vidare på de filerna.
    * [Trait och Interface](guide/kom-igang-med-objektorienterad-programmering-i-php/trait-och-interface)

1. Gör uppgift "[Uppdatera 100-spelet med intelligens](uppgift/uppdatera-100-spelet-med-intelligens)" och spara filerna i `me/redovisa`.

1. Pusha och tagga ditt repo `me/redovisa` allt eftersom och sätt en avslutande tagg (4.0.\*) när du är klar med alla uppgifter och redovisningstext i kursmomentet. Gör även en avslutande `make doc` och en `make test` som en sista avstämning, innan du sätter sista taggen.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Vilka är dina tankar och funderingar kring trait och interface?
* Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?
* Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?
* Berätta hur väl du lyckades med `make test` inuti ramverket och hur väl du lyckades att testa din kod med enhetstester och vilken kodtäckning du fick.
* Vilken är din TIL för detta kmom?
