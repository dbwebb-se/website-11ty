---
author: mos
revision:
  "2016-02-22": (B, mos) Bort med not om kursutveckling och länk till version 1.
  "2015-10-11": (A, mos) Första versionen till htmlphp v2.
...
Kmom10: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Projektet heter Begravningsmuseum Online (BMO). Projektet innebär att du skall utveckla och leverera en webbplats till en kund. Du får tillgång till en databas som innehåller material samt bilder och du skall bygga en webbplats enligt en föreslagen struktur.

Du kan läsa mer om projektets bakgrund och idé i artikeln "[Ronny Holm och Begravningsmuseum Online (BMO)](htmlphp/projekt-appendix-1)".

Fråga i forumet om du känner dig osäker.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas info i specen så kan du själv välja väg, dokumentera dina val i redovisningstexten.

De tre första kraven är obligatoriska och måste lösas för att få godkänt på uppgiften. De tre sista kraven är optionella krav. Lös de optionella kraven för att samla poäng och därmed nå högre betyg.

Varje krav ger max 10 poäng, totalt är det 60 poäng.



###Krav 1, 2, 3: Grunden {#k1}

Gör en webbplats för Begravningsmuseum Online, BMO. Webbplatsen skall presentera innehåll relaterat till begravningsseder och bruk under 1800-talet och tidigt 1900-tal, webbplatsens syfte är att visa upp och vårda ett kulturarv.



####BMO {#bmo}

BMO skall vara en egen webbplats. Spara webbplatsen i ditt kursrepo under `me/kmom10/bmo`.

Webbplatsen *får inte* ha någon koppling eller referens till det fysiska begravningsmuseum som finns i Ljungby. Det du bygger är helt fristående och har ingen relation till Ljungbys fysiska motsvarighet.

BMO skall ha en stil, layout, header och footer som speglar
webbplatsens syfte och idé. Din redovisningstext skall innehålla ett stycke där du förklarar ditt val av style.

Det finns många bilder i `img`-katalogen. Använd dem när du presenterar objekten och för att illustrera artiklarna.



####BMO hem {#bmo-hem}

BMO skall ha en välkomnande förstasida som visar på webbplatsens syfte och innehåll. En trevlig förstasida kan göra en lyckad webbplats.



####BMO innehåll  {#bmo-inne}

Allt innehåll från databasen skall finnas med i webbplatsen och presenteras
på ett trevligt och lättåtkomligt sätt.

Objekten skall finnas på en egen sida, tillgänglig via navbaren.

Artiklarna skall finnas på en egen sida, tillgängliga via navbaren.

Maggy's artikel skall visas på en egen sida, den har ett innehåll som skiljer sig från övriga artiklar och dess innehåll ger en bra överblick av vad BMO handlar om. Använd bilder för att illustrera Maggy's artikel.



####Om BMO  {#bmo-om}

Webbplatsen skall ha en Om-sida, tillgänglig via navbaren.

I ditt BMO skall det finnas en personlig presentation av dig själv, liknande den du har på din me-sida. Du har ju skapat siten, så berätta vem du är.

Om-sidan skall även innehålla ett textstycke om BMO. Du hittar detta textstycke i databasen i tabellen `Article` och det är organiserat i kategorin `about`.

Textstycke skall, tillsammans med din egna presentation, visas i en sida som är tillgänglig från webbplatsen huvudnavigering.



###Validera och kompabilitet {#validera}

Webbplatsen skall validera för HTML5 och CSS3. Extensions specifika för en webbläsare är tillåtna (-moz, -webkit, etc). Webbplatsen skall fungera i Firefox och Google Chrome. Använd de validatorer som du lärt dig om i kursen.



####Väl fungerande webbplats {#fungera}

Webbplatsen skall fungera utan brister, brustna länkar, korrekt skalning av bilder, det skall inte finnas onödiga horisontella skrollbars och webbplatsen skall "hålla ihop". Med andra ord, det skall vara en bra webbplats helt enkelt, och fungera som man förväntar sig utan uppenbara brister.



###Krav 4: Presentera innehåll på alternativa sätt (optionell) {#k4}

Var uppfinningsrik i hur du väljer att presentera objekten och artiklarna. Välj flera varianter på hur du presenterar dem och gör informationen lätt tillgänglig för slutanvändaren.

1. Gör en sökfunktion där man kan söka bland objekt och artiklar.

2. Visa objekten på flera sätt. Visa samtliga objekt eller en viss kategori av objekt på en sida.

3. Gör så att man enkelt kan titta över objekten med en länk till "nästa objekt" och "föregående objekt".

4. Exemplifiera artiklarna med objekten. När en artikel visas så visar du till exempel en aside med ett urval av relaterade objekt. Detta sätter objekten in i ett sammanhang och ger en bättre sammanhållen webbplats. Till exempel kan du illustrera artikeln om gravöl med bilder från objekt av kategorin "Begravningsfest" och från kategorin "Begravningstal". 



###Krav 5: Galleri av bilder (optionell) {#k5}

Skapa ett galleri som visar bilderna som är kopplade till objekten.

Använd inte JavaScript. Det ger ingen bonus. Gör en lösning baserad på PHP.

Visa mindre bilder (thumbnails) på alla bilder. Klickar man på en bild så visas en större version av bilden. Välj att visa ett maximalt antal bilder på en sida (10, 15 eller 20 per sida, välj själv), genom att klicka "Nästa" eller "Föregående" kan användaren se samtliga bilder.

Du kan välja att endast visa de bilder som är kopplade till objekten. Du behöver inte visa samtliga bilder som ligger i img-katalogen.



###Krav 6: Administrativt gränssnitt (optionell) {#k6}

Skapa ett gränssnitt för webbplatsens administratör. Följande delar skall finnas med.

1. Administratören kan logga in på webbplatsen för att komma åt de administrativa funktionerna. Både *admin admin* och *doe doe* skall fungera som användarnamn och lösenord.

2. Det skall gå att editera innehåll för objekten och artiklarna samt uppdatera dess informationen. Det skall gå att lägga till och ta bort objekt/artiklar.

3. Administratören kan editera förstasidans innehåll via administratörens webbgränssnitt.



Redovisning {#redovisning}
--------------------------------------------------------------------

1. På din [redovisningssida](htmlphp/redovisa), skriv följande:

    1. För varje krav du implementerat, dvs 1-6, skriver du ett textstycke om ca 5-10 meningar där du beskriver vad du gjort och hur du tänkt. Poängsättningen tar sin start i din text så se till att skriva väl för att undvika poängavdrag. Missar du att skriva/dokumentera din lösning så blir det 0 poäng. Du kan inte komplettera en inlämning för att få högre betyg.

    1. Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

    3. Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida och projektet. 

3. Ta en kopia av texten från din redovisningssida och gör ett inlägg i [kursforumet](forum/utbildning/htmlphp) och berätta att du är klar.

4. Se till att samtliga kursmoment validerar.

```bash
# Ställ dig i kursrepot
dbwebb publish me
```
