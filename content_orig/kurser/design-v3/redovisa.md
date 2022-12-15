---
author:
    - mos
    - efo
revision:
    "2021-10-01": "(E, efo) Uppdaterad med Quiz."
    "2018-10-15": "(D, mos) Mindre justeringar inför ht18."
    "2018-09-25": "(C, mos) Genomgången inför ht18."
    "2017-10-19": "(B, mos) Uppdaterad inför ht17."
    "2016-10-07": "(A, mos) Första utgåvan."
...
Resultat och redovisning
====================================

Som ett sista steg i varje kursmoment skall du lämna in och redovisa. Gör så här.

<!--more-->

Emil visar hur man gör en inlämning i design:

[YOUTUBE src="bawqieKlPeg" width=700 caption="En inlämning i design"]



<!-- Skriv redovisningstext {#text}
---------------------------------------

Skriv en redovisningstext och [redovisa dina reflektioner](kunskap/att-skriva-en-bra-redovisningstext) från kursmomentet.

Besvara de specifika frågor som finns för varje kursmoment.

Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

Kan du koppla och jämföra (reflektera) dina lärdomar från nuvarande kursmoment mot andra kursmoment, kurser eller andra lärdomar du har sedan tidigare?

Skriv ett stycke om 15-30 meningar, försök väva in frågorna i löpande text. -->



Gör Quiz på Canvas {#quiz}
---------------------------------------

På Canvas finns det en Quiz för varje kursmoment. För att du ska kunna lämna in kursmomentet måste du ha besvarat quizen.

Quizer i denna kurs ersätter redovisningstexten vi har skrivit i andra kurser.

Jag har som kursansvarig och examinator tre mål med quizerna:

1. Ge återkoppling till er som studenter på vilken del av teorin och praktiken som ni har förstått och vilken del som kan behövas reflekteras mera över.

1. Använda återkopplingen från quiz inlämningar för att anpassa undervisningen längre fram i kursen för att täcka upp för kunskap.

1. Underlätta och förenkla för studenter i betygssättning av slutprojektet.

Hur quizerna bidrar till slutbetyget är beskrivit i [grunderna för bedömning och betygsättning](kurser/faq/bedomning-och-betygsattning-quiz).



Tagga ny version {#tag}
---------------------------------------

Se till att du alltid taggar en ny version på ditt redovisa-repo i slutet av kmomet. Versionen du taggar ger en historik över dina ändringar enligt följande.

| Version      | Kmom   |
|--------------|--------|
| 1.0.*        | kmom01 |
| 2.0.*        | kmom02 |
| 3.0.*        | kmom03 |
| 4.0.*        | kmom04 |
| 5.0.*        | kmom05 |
| 6.0.*        | kmom06 |
| 10.0.*       | kmom10 |

Det är viktigt att du taggar dina repon med rätt taggar. Annars tappar du historik och du kan få problem med inlämningarna.

Glöm inte att ladda upp ditt repo till GitHub.



Ladda upp och publicera din kurskatalog {#repo}
---------------------------------------

Ladda upp din kurskatalog med alla dina övningar genom att göra följande kommandon i terminalen.

```bash
# Gå till din kurskatalog
dbwebb publish me
```

Den länken som visas i utskriften av kommandot, är länken till din me-sida. Där kan du se ditt publicerade resultat.

Rätta eventuella fel som dyker upp. Det som du laddar upp skall vara felfritt.



Gör en inlämning i Canvas {#hand-in}
---------------------------------------

Gör en inlämning i Canvas för respektive kursmoment. Länka till din portfölj på studentservern som en del av din inlämning.

<!--
Kopiera redovisningstexten till forumet {#forum}
---------------------------------------

Visa upp vad du gjort och berätta att du är klar genom att ta en kopia av redovisningstexten och göra ett inlägg i [kursforumet](forum/utbildning/design). Bifoga länken till din me-sida.
-->



<!-- Kopiera redovisningstexten till Canvas {#canvas}
---------------------------------------

Kopiera redovisningstexten och lämna in den på redovisningen i Canvas tillsammans med en länk till din me-sida.

Läraren kommer snabbt kolla igenom din redovisningstext och uppgifterna. Betyg är G (godkänd) eller U/komplettera (komplettera → gör om → gör bättre). Bedömningen baseras på din redovisningstext samt att din me-sida fungerar tillsammans med kursmomentets övningar. -->



Feedback och frågor {#feedback}
---------------------------------------

[Vilken feedback kan jag förvänta mig](kurser/faq/vilken-feedback-far-man-pa-inlamningarna)?

Ställ dina frågor och funderingar i forumet. Se till att du får dina frågor besvarade. Fråga igen om något är oklart. Se till att alltid skapa en tråd i forumet om du funderar på något.



Hur testas mitt resultat? {#inspect}
---------------------------------------

Den som rättar och kontrollerar din inlämning utgår från följande kommando.

```bash
dbwebb test kmom01
```

Byt ut kmom01 mot det kursmoment du vill testa.

Du kan själv provköra och se samma resultat som läraren ser. Det är en mycket god idé att alltid testköra sin inlämning på samma sätt som rättaren gör. Du sparar tid genom att upptäcka eventuella slarvfel.



<!-- Klart! {#klar}
---------------------------------------

[YOUTUBE src=d8aotB5X2qk width=630 caption="Andreas visar hur man lämnar in ett kmom."]

Läs gärna dina med-studenters inlämningar och ställ dina frågor och funderingar i forumet.

Ta en kort mental paus innan du ger dig på nästa kursmoment. -->
