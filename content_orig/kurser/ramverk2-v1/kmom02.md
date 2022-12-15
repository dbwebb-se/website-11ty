---
author:
    - mos
revision:
    "2017-10-20": "(A, mos) Första utgåvan."
...
Kmom02: Docker
==================================

Vi installerar Docker och gör det till en integrerad del av vårt repo och testmiljö. Det handlar om att använda virtualisering för att köra flera versioner av ett målsystem och använda för att testa koden i ditt repo.

<!--more-->

[FIGURE src=image/snapht17/cimage-php56.png?w=w2 caption="Tre flikar mot tre olika installationer och versioner av PHP, samtidigt."]

[ASCIINEMA src=143344 caption="Starta och stoppa flera kontainrar samtidigt med docker-compose."]

Tänk dig in i rollen som systemarkitekt på ett företag där du är den som gör teknikvalen till nästa projekt. Du skall göra teknikval som hela ditt utvecklargäng sedan skall använda. Tänk så, det blir en bra attityd inför kursmomentet. Tänk att kursmomentetn går ut på att du skall utvärdera och introducera en helt ny teknik till ditt utvecklingsteam. Är tekniken bra och värdefull? Var kritisk och utvärdera.



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*



###Material {#material}

Kika igenom följande material.

1. [Webbplatsen för Docker](https://www.docker.com/) ger dig en översikt och där hittar du dokumentationen som du vill läsa igenom samt instruktioner till hur du installerar verktyget.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-14 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Kom igång med Docker som utvecklingsmiljö](kunskap/kom-igang-med-docker-som-utvecklingsmiljo)" för att komma igång och installera Docker och dess verktyg. Spara din exempelkod i `me/kmom02/docker`.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften "[Integrera docker-compose med Express](uppgift/integrera-docker-compose-med-express)". Det handlar om lägga till stöd för att testköra din Express-applikation under Docker i flera versioner av Node.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i detta inledande momentet då redovisningstexten är mer omfattande än du är van vid.

Se till att följande frågor besvaras i texten:

* Har du jobbat med Docker eller andra virtualiseringstekniker innan?
* Hur ser du på möjligheterna att använda dig av Docker för att jobba med tester av ditt repo?
* Gick allt smidigt eller stötte du på problem?
* Skapade du din egen image, berätta om den?

Har du frågor eller funderingar så ställer du dem i forumet.
