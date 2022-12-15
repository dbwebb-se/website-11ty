---
author: mos
revision:
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

Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

Besvara även de specifika frågor som finns för varje kursmoment.

Skriv minst 15 meningar.



Tagga ny version {#tag}
---------------------------------------

Se till att du har taggat en ny version på ditt Anax lite, så att dina senaste ändringar finns med i taggen och är pushade till GitHub. Versionen ger en historik över dina ändringar enligt följande.

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

Rätta eventuella fel som dyker upp. Det som du laddar upp måste vara felfritt.

Den länken som dyker upp längst ned är länken till din me-sida. Där kan du se ditt publicerade resultat.



Kopiera redovisningstexten till forumet {#forum}
---------------------------------------

Visa upp vad du gjort och berätta att du är klar genom att ta en kopia av redovisningstexten och göra ett inlägg i [kursforumet](forum/utbildning/oophp). Bifoga länken till din me-sida.



Kopiera redovisningstexten till ITs {#its}
---------------------------------------

Kopiera redovisningstexten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida.

Läraren kommer snabbt kolla igenom din redovisningstext och uppgifterna. Betyg är G (godkänd) eller U/komplettera (komplettera → gör om → gör bättre). Bedömningen baseras på din redovisningstext samt att din me-sida fungerar tillsammans med kursmomentets övningar.



Testa din kurskatalog {#test}
---------------------------------------

Du kan göra ett självtest med [`dbwebb inspect`](https://dbwebb.se/dbwebb-cli/inspect) som berättar för dig om du har med alla delar i ett kursmoment. Det är samma test som den som rättar ditt kursmoment kommer att köra.

```bash
# Ställ dig i kursrepot och ange kursmomentet du vill inspektera
dbwebb inspect kmom01
```

Gör alltid ett självtest så kan du slippa onödiga kompletteringar.



Klart! {#klar}
---------------------------------------

Läs gärna dina med-studenters inlämningar och ställ dina frågor och funderingar i forumet. Se till att du får dina frågor besvarade. Fråga igen om något är oklart. Se till att alltid skapa en tråd i forumet om du funderar på något.

Ta en kort mental paus innan du ger dig på nästa kursmoment.
