---
author: mos
revision:
  "2014-12-19": (N, mos) Minskade antalet subjektiva bedömningar i poängsättningen.
  "2013-12-17": (M, mos) Smärre redaktionella justeringar.
  "2013-01-11": (L, mos) Förtydligade att redovisningen ska innehålla ett textstycke
    om varje implementerat krav.
  "2012-12-13": (K, mos) Justerad med projektspec för javascript för hösten 2012.
  "2012-07-02": (J, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-09-22": (I) Förtydligade krav på inlämning, nytt stycke om betygssättning.
  "2011-03-16": (H) Slog ihop projekt och examination till ett.
  "2010-12-04": (G) Tog bort dubblerad och felaktig mening som syftade på spel.
  "2010-08-26": (F) Tog bort stycke om att betygsättning ej sker på projektet.
  "2010-04-30": (E) Nu samma dokument för htmlphp, oophp och för dbwebb/dbwebb2. Redaktionella
    ändringar.
  "2010-01-07": (D) Uppdaterade med info om redovisning och examination, hur inlämning
    sker.
  "2009-12-09": (C) Flyttade text mellan examinationsdokumentet och detta. Förtydligade
    inlämningen.
  "2009-12-08": (B) Smärre justeringar inför oohph hösten 2009.
  "2009-09-07": (A) Första utgåvan
updated: "2014-12-19 08:39:15"
created: "2012-06-12 08:22:00"
...
Kmom07/10: Projekt och Examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Du skall implementera ett projekt för att visa upp dina kunskaper i det som kursen hanterar. Du väljer själv projektidé. Följande är exempel på möjliga projektidéer.

* **Spel**

  * HTML5 Canvas.

  * HTML, DOM och CSS3.

  * Multiplayer med Websocket.

* **jQuery plugin**

  * En lightbox, galleri eller slider eller kanske en plugin som löser alla tre på en och samma gång.

* **Bygg ut ditt phpmvc-ramverk**
  
  * Administrativt gränssnitt till ditt ramverk du gjorde i phpmvc-kursen.

  * En avancerad editor med en mix av WYSIWYG, fullskärmsläge, autospar och gui för att editera kategorier och taggar.

* **Ett bibliotek i JavaScript som löser en specifik uppgift**

  * Godtyckligt, välj fokus.

Oavsett vilken projektidé du väljer så skall du följa de generella kraven enligt nedan och det är där du samlar poäng.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. De optionella kraven är markerade med *optionellt*, de andra kraven är obligatoriska. 

Du måste implementera samtliga obligatoriska krav och du måste nå minst 25 poäng totalt för att vara godkänd på projektet.

Varje krav är värt 10 poäng, En komplett implementation av kravet ger full pott. En komplett implementation innebär att kravets alla delar är implementerade enligt specen. Missar man något i kravet så riskerar man avdrag.



###Krav k1: Paketera, presentera och produktifiera {#k1}

Ditt projektresultat skall paketeras och presenteras på ett fördelaktigt sätt. Vi kallar detta att produktifiera ditt resultat. <del>Gör detta bra så höjer du ditt resultat från ett "vanligt studentjobb" till ett "proffsjobb".</del>

Detta innebär en me-sida för produkten:

* En presentation av vad din "produkt" gör, vilket problem den löser.
* Instruktioner hur man installerar, konfigurerar och använder "produkten".
* Källkoden skall finnas på GitHub.

På denna del kan du maximalt få 10 poäng. <del>Ett "vanligt studentjobb" ger 5 poäng, ett "proffsjobb" kan ge upp till 10 poäng.</del>



###Krav k2: Ha koll på konkurrenterna och lär av dem {#k2}

Ta reda på vilka konkurrenter du har till din produkt. Analysera dem och jämför dem med din produkt. Gör analysen tillgänglig för dina kunder, som en del av din produktpresentation. 

Gör du detta bra kan du få som resultat en utvecklingsplan för din produkt, presentera vilka krav och features din produkt stödjer i dagsläget och vilka som kommer i nästa version.

Försök besvara frågan varför just din produkt är -- eller kommer att bli -- *bättre*, *enklare*, *flexiblare*, *enklare att använda/integrera/anpassa* än konkurrenterna.

På denna del kan du maximalt få 10 poäng.



###Krav k3: Kvalitet och omfattning {#k3}

Din produkt har en omfattning som motsvarar mellan 20h till 80h, delvis ställt i relation till det vi gått igenom i kursen och om möjligt kopplat till din egen kunskapsnivå du hade inför kursen.

Vi bedömer hur stor omfattning vi anser produkten har samt gör en bedömning av produktens kvalitet. Detta ger underlaget för poängbedömningen. Ju större omfattning och desto bättre kvalitet desto högre poäng.

Ett *enklare projekt* får 5 poäng och ett *mer omfattande och krävande projekt* för 10 poäng.

Ett *enklare projekt* kan innebära att du tagit något från kursmomentet och gjort viss vidareutveckling.

Ett *mer omfattande och krävande projekt* innebär att du väsentligt skiljt dig från den koden som finns i kursmomenten. 

På denna del kan du maximalt få 10 poäng.



###Krav k4, k5, k6: Valbart krav (optionellt) {#k4}

Om du verkligen anser att du är värd ett högre betyg så måste du visa framfötterna. I detta fallet innebär det att du formulerar de optionella kraven på egen hand eller i samspråk med läraren.

Det handlar främst om den nivå du har på din produkt och vissa "features" kan betraktas omfatta ett eller flera optionella krav.

Det är också möjligt att du har lagt en hel del extra kraft på de vanliga kursmomenten och gjort utöver det som står under rubriken "Extra". Om du gjort det och kan visa upp dessa på din me-sida så kan de motsvara ett optionellt krav.

Vill du vara säker så måste du ha en dialog med läraren. Fråga i forumet så får du svar där, sedan har du det på svart-och-vitt vad som gäller, så gott det går.

Tänk på att även ett *enklare* projekt kan ha features som kan lyftas upp som valbara krav. 

Alltså, lyft upp det som du anser borde lyftas upp. Beskriv vad du gjort, varför och hur. Var tydlig -- bedömning utgår från din beskrivning och därefter tittar vi på din lösning. 

På denna del kan du få totalt 30 poäng (10 + 10 + 10),



Redovisning {#redovisning}
--------------------------------------------------------------------

1. På din redovisningssida, skriv följande:

1.1. Länka till din produkt, se krav k1.

1.2. För varje krav du implementerat, dvs k1-k6, skriver du ett textstycke om ca 15 meningar där du beskriver vad du gjort och hur du tänkt.

1.3. Ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

1.4. Avsluta med ett nytt stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2\. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida och projektet. 

3\. Ta en kopia av texten från din redovisningssida och gör ett inlägg i [kursforumet](forum/utbildning/javascript) och berätta att du är klar.




