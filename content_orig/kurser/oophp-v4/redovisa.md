---
author: mos
revision:
    "2018-08-16": "(D, mos) Bort redovisning i forum samt bytte ITs mot Canvas."
    "2018-03-19": "(C, mos) Uppdaterad inför oophp-v4 vt18."
    "2017-03-24": "(B, mos) Uppdaterad inför oophp-v3 vt17."
    "2015-10-29": "(A, mos) Ny inför oophp ht15."
...
Resultat och redovisning
==================================

Som ett sista steg i varje kursmoment skall du redovisa. Gör så här.

<!--more-->



Skriv redovisningstext {#text}
---------------------------------------

I din me-sida har du en dedikerad plats för dina redovisningstexter. Där skall du [redovisa dina reflektioner](kurser/faq/att-skriva-en-bra-redovisningstext) från varje kursmoment.

Besvara de specifika frågor som finns för varje kursmoment.

Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

Kan du koppla och jämföra (reflektera) dina lärdomar från nuvarande kursmoment mot andra kursmoment, kurser eller andra lärdomar du har sedan tidigare?

Skriv ett stycke om 15-30 meningar, försök väva in frågorna i löpande text.



Tagga ny version {#tag}
---------------------------------------

Se till att du har taggat en ny version på din me-sida, så att dina senaste ändringar finns med i taggen och är pushade till GitHub. Versionen ger en historik över dina ändringar enligt följande.

| Version | Kmom   |
|---------|--------|
| 1.0.*   | kmom01 |
| 2.0.*   | kmom02 |
| 3.0.*   | kmom03 |
| 4.0.*   | kmom04 |
| 5.0.*   | kmom05 |
| 6.0.*   | kmom06 |
| 10.0.*  | kmom10 |

Det är viktigt att du taggar dina repon med rätt taggar. Annars tappar du historik och du kan få problem med inlämningarna.



Ladda upp och publicera din kurskatalog {#repo}
---------------------------------------

Ladda upp ditt kurskatalog med alla dina övningar genom att göra följande kommandon i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb publish me
```

Den länken som visas i utskriften av kommandot, är länken till din me-sida. Där kan du se ditt publicerade resultat.

Rätta eventuella fel som dyker upp. Det som du laddar upp skall vara felfritt.



<!--
Kopiera redovisningstexten till forumet {#forum}
---------------------------------------

Visa upp vad du gjort och berätta att du är klar genom att ta en kopia av redovisningstexten och göra ett inlägg i [kursforumet](forum/utbildning/oophp). Bifoga länken till din me-sida.
-->


Kopiera redovisningstexten till Canvas {#lms}
---------------------------------------

Kopiera redovisningstexten och lämna in den på redovisningen i Canvas tillsammans med en länk till din me-sida.

Läraren kommer snabbt kolla igenom din redovisningstext och uppgifterna. Betyg är G (godkänd) eller U/komplettera (komplettera → gör om → gör bättre). Bedömningen baseras på din redovisningstext samt att dina uppgifter är utförda enligt instruktionerna.



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

Du kan själv provköra och se samma resultat som läraren ser. Det är en mycket god idé att alltid testköra sin inlämning på samma sätt som rättaren gör. Du sparar tid genom att upptäcka eventuella slarvfel.

[YOUTUBE src=mxYJW0whkZ4 width=630 caption="Andreas visar hur man rätta sitt egna kmom."]



Klart! {#klar}
---------------------------------------

[YOUTUBE src=d8aotB5X2qk width=630 caption="Andreas visar hur man lämnar in ett kmom."]

Läs gärna dina med-studenters inlämningar och ställ dina frågor och funderingar i forumet.

Ta en kort mental paus innan du ger dig på nästa kursmoment.
