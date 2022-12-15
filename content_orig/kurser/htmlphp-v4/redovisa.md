---
author:
    - mos
revision:
    "2020-08-28": (E, mos) Ny video som visar inlämningen.
    "2018-08-16": (D, mos) Bort redovisning i forum samt bytte ITs mot Canvas.
    "2017-06-15": (C, mos) Nytt stycke om feedback.
    "2015-08-06": (B, mos) Var man sparar redovisningstexter i kursrepot.
    "2015-03-17": (A, mos) Första utgåvan för htmlphp kursen.
...
Resultat och redovisning
==================================

Som ett sista steg i varje kursmoment skall du redovisa. Gör så här.

<!--more-->



Skriv redovisningstext {#text}
---------------------------------------

Skriv en redovisningstext och [redovisa dina reflektioner](kunskap/att-skriva-en-bra-redovisningstext) från kursmomentet.

Besvara de specifika frågor som finns för varje kursmoment.

Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

Kan du koppla och jämföra (reflektera) dina lärdomar från nuvarande kursmoment mot andra kursmoment, kurser eller andra lärdomar du har sedan tidigare?

Skriv ett stycke om 15-30 meningar, försök väva in frågorna i löpande text.

Spara redovisningstexten enligt följande.

| Kursmoment | Fil för redovisningstext   |
|------------|----------------------------|
| kmom01     | `me/kmom01/me1/report.php` |
| kmom02     | `me/kmom02/me2/report.php` |
| kmom03     | `me/kmom03/me3/report.php` |
| kmom04     | `me/kmom04/me4/report.php` |
| kmom05     | `me/kmom05/me5/report.php` |
| kmom06     | `me/kmom06/me6/report.php` |
| kmom10     | `me/kmom06/me6/report.php` |

När du är klar innehåller filen `me/kmom06/me6/report.php` samtliga redovisningstexter från alla kursmoment.



Ladda upp och publicera din kurskatalog {#repo}
---------------------------------------

Ladda upp din kurskatalog med alla dina övningar genom att göra följande kommandon i terminalen.

```bash
# Gå till din kurskatalog
dbwebb publish me
```

Den länken som visas i utskriften av kommandot, är länken till din me-sida. Där kan du se ditt publicerade resultat.

Rätta eventuella fel som dyker upp. Det som du laddar upp måste vara felfritt.



<!--
Kopiera redovisningstexten till forumet {#forum}
---------------------------------------

Visa upp vad du gjort och berätta att du är klar genom att ta en kopia av redovisningstexten och göra ett inlägg i [kursforumet](forum/utbildning/htmlphp). Bifoga länken till din me-sida.
-->



Kopiera redovisningstexten till Canvas {#canvas}
---------------------------------------

Kopiera redovisningstexten och lämna in den på redovisningen i Canvas tillsammans med en länk till din me-sida.

Läraren kommer snabbt kolla igenom din redovisningstext och uppgifterna. Betyg är G (godkänd) eller U/komplettera (komplettera → gör om → gör bättre). Bedömningen baseras på din redovisningstext samt att din me-sida fungerar tillsammans med kursmomentets övningar.



Feedback och frågor {#feedback}
---------------------------------------

[Vilken feedback kan jag förvänta mig](kurser/faq/vilken-feedback-far-man-pa-inlamningarna)?

Ställ dina frågor och funderingar i forumet. Se till att du får dina frågor besvarade. Fråga igen om något är oklart. Se till att alltid skapa en tråd i forumet om du funderar på något.



Hur testas mitt resultat? {#inspect}
---------------------------------------

Den som rättar och kontrollerar din inlämning utgår från följande kommando.

```bash
dbwebb inspect kmom01
```

Byt ut kmom01 mot det kursmoment du vill inspektera.

Du kan själv provköra och se samma resultat som läraren ser. Det är en mycket god idé att alltid testköra sin inlämning på samma sätt som rättaren gör. Du sparar tid genom att själv upptäcka eventuella slarvfel.



Klart! {#klar}
---------------------------------------

Kika gärna på Andreas video när han rättar valideringsfel, kör inspect och lämnar in kmom01 genom att publicera till studentservern och lämna in på Canvas. Videon är för python-kursen men samma handhavande gäller i htmlphp, det är bara andra programmeringsspråk.

[YOUTUBE src=-7Wzi_IkpEU width=630 caption="Andreas visar hur man lämnar in kmom01 i python-kursen."]

Ta en kort mental paus innan du ger dig på nästa kursmoment.
