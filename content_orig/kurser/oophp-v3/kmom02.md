---
author:
    - mos
    - lew
revision:
    "2017-03-31": (A, mos, lew) Första versionen.
...
Kmom02: OO-programmering i PHP
==================================

Vi fortsätter träna på programmering med klasser och objekt, i och utanför ramverket. Det blir en närmare bekantskap med ramverkets delar och hur du kan tänka när du integrerar din egen kod i ramverket. Du bekantar dig med begrepp som interface och traits.

Kursmomentet har fokus på ett par friare programmeringsövningar så du kan träna på objektorienterade konstruktioner och ramverksprogrammering.

[FIGURE src=/image/oophp/v3/test-session.png?w=w1&q=70 caption="Sessionstest är en av övningarna som finns med i detta kursmoment."]

[FIGURE src=/image/oophp/v3/dice100.png?w=w1&q=70 caption="Tärningsspelet 100 är en av övningarna som finns med i detta kursmoment."]

[FIGURE src=/image/oophp/v3/calendar1.png?w=w1&q=70 caption="En månadskalender är en av övningarna som finns med i detta kursmoment."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 0-2 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*



###Kurslitteratur  {#kurslitteratur}

Det finns inga specifika läsanvisningar i kurslitteraturen.

<!--
Läs följande:

1\. [Beginning PHP and MySQL: From Novice to Professional](kunskap/boken-beginning-php-and-mysql-from-novice-to-professional)

* Chapter 6: Object-Oriented PHP
* Chapter 7: Advanced OOP Features
* Chapter 8: Error and Exception Handling
* Chapter 12: Date and Time (Läs så mycket så att du klarar uppgiften längre ned)
-->


###Artiklar {#artiklar}

Läs följande artiklar.

1. I föregående kursmoment läste du artiklarna ["Kom igång med objektorienterad PHP-programmering på 20 steg"](kunskap/kom-i-gang-med-oophp-pa-20-steg) och "[Bygg ett eget PHP-ramverk](kunskap/bygg-ett-eget-php-ramverk)", gå tillbaka till dem om du behöver fräscha upp minnet.



###Lästips {#lastips}

Det finns inga lästips.

<!--
När man pratar om objektorienterad programmering så behöver man också ha en viss bas i objektorienterad modellering, det underlättar. Därför kan du läsa lite om UML, "Unified Modelling Language". En bra start plats är [Wikipedia om UML](http://en.wikipedia.org/wiki/Unified_Modeling_Language).
-->



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 14-20 studietimmar)*


###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Artikeln "[Sessioner och cookies i PHP](kunskap/session-cookie-klasser)" ger dig en sessions-klass och grunden till en cookie-klass. Fyll gärna på cookie-klassens metoder med kod. Spara eventuell kod i `me/kmom02/session`.

1. Jobba igenom artikeln "[Att integrera en klass i ramverket Anax Lite](kunskap/att-integrera-en-klass-i-ramverket-anax-lite)" som visar hur du kan integrera en klass eller tjänst in i ramverket Anax Lite. Spara eventuell testkod i `me/anax-lite`.

1. Jobba igenom artikel "[Att jobba med vyer i Anax Lite](kunskap/jobba-med-vyer-i-anax-lite)" för att se hur vilka möjligheter du har till att koda och strukturera dina vyer. Spara eventuell testkod i `me/anax-lite`.

<!--
(make less)?
-->


###Uppgifter {#uppgifter}

Gör följande uppgifter.

1. Gör uppgiften [Integrera klassen Session](uppgift/testa-sessionen) in i ramverket och skriv en route som testar och visar innehållet i sessionen. Spara din kod i `me/anax-lite`.

1. Gör uppgiften "[En navbar till Anax Lite (steg 2)](uppgift/en-navbar-till-anax-lite-steg-2)" som låter dig integrera kod in i ramverkets struktur. Spara din kod i `me/anax-lite`.

1. Välj mellan följande uppgifter och gör en av dem.
    1. Gör uppgiften "[Tärningsspelet 100](uppgift/tarningsspel)" som modul till ditt Anax och visa upp spelet i din me-sida. Spara din kod under `me/anax-lite`.

    1. Gör uppgiften "[Månadskalender](uppgift/manadskalender)" och inkludera resultatet i ditt Anax. Spara din kod under `me/anax-lite`.

1. Fortsätt att jobba igenom uppgiften "[Kom igång med SQL](uppgift/kom-igang-med-sql)" genom att utföra ytterligare en tredjedel av uppgiften. Fortsätt att spara all SQL-kod i `me/kmom01/skolan/skolan.sql`. Den sista tredjedelen gör du i nästa kursmoment.

1. Pusha och tagga ditt Anax Lite, allt eftersom och sätt en avslutande tagg (2.0.\*) när du är klar med alla uppgifter i kursmomentet.

<!--
Rita klass och sekvensdiagram?
-->



###Extra {#extra}

Gör extrauppgifterna om du har tid, kraft, eller lust.

1. Gör båda uppgifterna om 100-spelet och Månadskalendern.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/oophp-v3/redovisa).

Se till att följande frågor besvaras i texten:

* Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
* Hur väljer du att organisera dina vyer?
* Berätta om hur du löste integreringen av klassen Session.
* Berätta om hur du löste uppgiften med Tärningsspelet 100/Månadskalendern, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
* Några tankar kring SQL så här långt?
