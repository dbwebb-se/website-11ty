---
author: mos
category:
    - javascript
    - kursen dbjs
revision:
    "2017-01-16": (A, mos) Kopierad från javascript1 till dbjs.
...
Gör svenska flaggan med JavaScript, HTML och CSS
==================================

En uppgift för att komma igång med JavaScript, HTML och CSS. Jag visar hur du kan skapa en flagga med JavaScript, HTML och CSS och därefter får du i uppgift att skapa ett antal egna flaggor. Uppgiften hanterar även eventhantering i JavaScript.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Denna uppgift ingår i kursen [dbjs](kurser/dbjs).

Du har gjort uppgiften att bygga en [svensk flagga med HTML och CSS](uppgift/gor-svenska-flaggan-i-html-och-css-dbjs).



Introduktion {#intro}
-----------------------

Du har sedan tidigare skapat flaggor i HTML och CSS. Nu skall du göra samma sak men använda JavaScript och funktioner för att skapa flaggorna.

Du kommer också att använda enklare event-hantering i JavaScript för att koppla ett funktionsanrop till ett klick på en länk.

Behöver du hjälp att komma i gång så kan du se hur jag löste första delen av uppgiften.

[YOUTUBE src=6GuJ8SPH_dA width=630 caption="Mikael gör en flagga med JavaScript."]

Mitt exempelprogram från videon finns i [kursrepot dbjs](repo/dbjs/example/flag/flag2/).



Krav {#krav}
-----------------------

1. Ta en kopia av din flag1 och spara den i din kurskatalog under `me/kmom02/flag2`.

```bash
# Ställ dig i kurskatalogen
cd me
cp -ri kmom01/flag1/* kmom02/flag2
```

2\. Skapa samma flaggor som tidigare, men använd JavaScript och organisera din kod i funktioner.

3\. Skapa en meny av länkar, en länk för varje flagga. När du klickar på länken skall flaggan ritas ut. 

4\. När du är klar skall du validera och publicera ditt resultat enligt följande:

```bash
# Ställ dig i kurskatalogen
dbwebb publish flag2
```

Rätta de felen som dyker upp. Sen är du klar. Dubbelkolla att dina flaggor fungerar på studentservern.



Extrauppgift {#extra}
-----------------------

Kan du lägga till eventhanterare så att flaggan försvinner när du klickar på den?

Fundera gärna på hur du organiserar din kod. Kan du minska antalet funktioner genom att använda parametrar?



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

Lycka till och ställ frågor i forumet om du behöver hjälp!
