---
author: mos
revision:
  "2014-12-19": (P, mos) Skrev om specen så att det blir enklare att nå godkänt, justerade hur poängen beräknas till fördel för studenterna.
  "2013-12-17": (O, mos) Gick igenom och förtydligade, inga stora ändringar.
  "2013-10-22": (N, mos) Projektet för oophp version 2, ht13.
  "2013-08-13": (M, mos) Använd som mall för oophp-kursen inför ht13.
  "2013-01-11": (L, mos) Förtydligade att redovisningen ska innehålla ett textstycke om varje implementerat krav.
  "2012-12-13": (K, mos) Justerad med projektspec för javascript för hösten 2012.
  "2012-07-02": (J, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad med markdown.
  "2011-09-22": (I) Förtydligade krav på inlämning, nytt stycke om betygssättning.
  "2011-03-16": (H) Slog ihop projekt och examination till ett.
  "2010-12-04": (G) Tog bort dubblerad och felaktig mening som syftade på spel.
  "2010-08-26": (F) Tog bort stycke om att betygsättning ej sker på projektet.
  "2010-04-30": (E) Nu samma dokument för htmlphp, oophp och för dbwebb/dbwebb2. Redaktionella ändringar.
  "2010-01-07": (D) Uppdaterade med info om redovisning och examination, hur inlämning sker.
  "2009-12-09": (C) Flyttade text mellan examinationsdokumentet och detta. Förtydligade inlämningen.
  "2009-12-08": (B) Smärre justeringar inför oohph hösten 2009.
  "2009-09-07": (A) Första utgåvan
...
Kmom07/10: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Under kursen har du byggt upp din egen version av Anax webbmall och fyllt den med moduler i form av klasser. Förhoppningsvis kör du din me-sida med ditt Anax så din webbmall bör fungera. Det är förutsättningen innan du kan gå in i projektet.

Du skall nu bygga en ny webbplats med hjälp av ditt Anax. Vi ska nu se hur bra din webbmall fungerar för att skapa en webbplats.


Den tänkte kunden heter "RM Rental Movies" och har av dig beställt en webbplats för sin verksamhet som är uthyrning av filmer över nätet.

PS. Du kan byta temat från "Movies" till musik, datorer, husvagnar, hundar, mini-grisar eller något annat tema som du tycker om.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. De optionella kraven är markerade med *optionellt*, de andra kraven är obligatoriska. Lös de obligatoriska kraven för att nå ett godkänt betyg. Lös de optionella kraven för att samla poäng och nå högre betyg.

Varje krav är värt maximalt 10 poäng. Om du inte implementerat hela kravet så får du avdrag. 

Du måste implementera samtliga obligatoriska krav och nå minst 25 poäng totalt, för att betraktas som godkänd.

Är du osäker på kravets formulering? Tolka det, gör ett antagande och dokumentera det i din redovisningstext.



###Krav 1: Struktur och innehåll {#k1}

Följande struktur/innehåll skall (minst) finnas på webbplatsen:

1. Första sidan.
1. Sida - Filmer, lista av tillgängliga filmer.
1. Sida - Nyheter, blogglista med nyheter.
1. Sida - Om företaget, statisk sida med information om företaget, hitta på något kul att skriva.
1. Gemensam Header med logo, titel och en slogan. En navbar med länkar till webbplatsens olika delar.
1. Gemensam Footer, med text om Copyright Företagsnamnet.

Webbsidan skyddas av inloggning och när man är inloggad kan man via ett gränssnitt ändra innehållet på webbplatsen.

<del>På denna del kan du maximalt få 10 poäng om samtliga delar finns med och fungerar. 5 poäng är för innehållet och 5 poäng är en objektiv/subjektiv bedömning om hur väl/bra/snyggt du har implementerat din lösning, en acceptabel lösning ger 0 poäng och en utomordentlig lösning ger 5 poäng.</del>

På denna del kan du maximalt få 10 poäng.



###Krav 2: Sida - Filmer {#k2}

Filmerna skall visas i en lista som kan sorteras, man kan välja hur många rader som visas och det finns stöd för paginering. 

Varje film tillhör en kategori.

Minst 10 filmer skall finnas med och presenteras tillsammans med synopsis (kopiera från imdb eller skriv själv), bild och pris för uthyrning. 

I listan visas begränsad information om filmen, klickar man på en film så ser man en sida om filmen med all information.

Det skall gå att söka bland filmerna, sökfältet skall vara en del av sidans header.

Använd din `img.php` för att visa olika storlekar av bilderna.

Loggar man in kan man uppdatera all information om filmerna samt skapa nya och radera.

<del>(optionell)</del>Visa mer information om filmen genom att länka till filmens hemsida på imdb och till en trailer på youtube. Du kan även visa fler bilder på varje film (låna bilder från nätet, eller klipp egna).

<del>(optionell)</del>Gör så att en film kan tillhöra en eller flera kategorier. Klickar man på en kategori så visas alla filmer av den kategorin. (3 poäng)

<del>På denna del kan du maximalt få 10 poäng om samtliga delar finns med och fungerar. 5 poäng är för grunden och 5 poäng är en objektiv/subjektiv bedömning om hur väl/bra/snyggt du har implementerat din lösning, en acceptabel lösning ger 0 poäng och en utomordentlig lösning ger 5 poäng.</del>

På denna del kan du maximalt få 10 poäng.



###Krav 3: Sida - Nyheter {#k3}

En nyhetsblogg där företaget släpper nyheter om sina produkter, sin verksamhet och erbjudande. Det skall visas minst 7 blogginlägg på första sidan. På bloggrullen kan man klicka på rubriken för att komma till en egen sida där blogginlägget visas. 

Loggar man in kan man uppdatera all information om bloggposterna samt skapa nya och radera.

<del>Ovanstående uppgifter omfattar 5 poäng.</del>

<del>(optionell)</del>Varje blogginlägg visas med en introduktion i översikten, inte hela inlägget. När hela inlägget inte visas så syns en länk till "Läs mer »" som tar läsaren till blogginlägget. (2 poäng)

<del>(optionell)</del>Varje blogginlägg har en kategori. Klickar man på kategorin så får man en lista med de blogginlägg som är gjorda i kategorin.(3 poäng)

På denna del kan du maximalt få 10 poäng.



###Krav 4: Första sidan {#k4}

Visa de tre nyaste filmerna (senast uppdaterade filmerna).

Visa de tre senaste blogginläggen. 

Visa en översikt av de kategorier som finns för filmerna.

Visa bilder på mest populära film och senast hyrda film (okey att hårdkoda).

Lägg till övrig information efter eget tycke för att göra en presentabel första sida.

På denna del kan du maximalt få 10 poäng.



###Krav 5, 6: Extra funktioner (optionell) {#k5}

**En ny sida - Tävling**. Lägg till en egen sida där användaren kan tävla i en tärningstävling och vinna gratis filmer. (3 poäng)

**En ny sida - Filmkalendern**. Lägg till en sida som visar månadens film tillsammans med en kalender. (3 poäng)

**Kund och profilsida**. Låt användaren skapa sin egen användare och profil på webbplatsen. En användare som skapat sin en användare kan se allt som en administratör kan göra, men kan inte ändra något mer än sin egen profil. Det skall finnas en publik sida för som visar användarens profil. (4 poäng)

**Ladda upp bilder** via file upload när du skapar nya filmer. (3 poäng)

Skapa en **breadcrumb navigering** till filmer och blogg. (3 poäng)

**Administration för användare**. En del där administratören kan se en översikt av alla användare samt möjlighet att skapa ny användare, uppdatera, och radera. Listan har stöd för paginering, sortering, och kan bestämma hur många rader som visas. (4 poäng)

**Ditt Anax på GitHub**. Lägg ditt slutliga Anax, dvs den variant du använde till projektet, på GitHub tillsammans med en välskriven README-sida. Lägg enbart mallen där, inte alla specifika sidor som du gjort till din me-sida eller till projektet, bara det som du anser vara mallen. (4 poäng)

**Egen funktion**. Om du gjort en extra funktion som du anser vara värd extra poäng så måste du argumentera för det i din redovisningstext. Skriva vad du gjort, varför och hur. (4 poäng)

På denna del kan du maximalt få 10 + 10 poäng. Var dock uppmärksam på att det finns optionella krav som potentiell omfattar totalt 28 poäng -- det är bara för att ge dig lite ökad valfrihet. 



Redovisning {#redovisning}
--------------------------------------------------------------------

1\. På din redovisningssida, skriv följande:

1.1. Länka till din projektsida för RM.

1.2. För varje krav du implementerat, dvs 1-6, skriver du ett textstycke om ca 5-10 meningar där du beskriver vad du gjort och hur du tänkt. Poängsättningen tar sin start i din text så se till att skriva väl för att undvika poängavdrag. Missar du att skriva/dokumentera din lösning så blir det 0 poäng. Du kan inte komplettera en inlämning.

1.3. Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

1.4. Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2\. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida och projektet. 

3\. Ta en kopia av texten från din redovisningssida och gör ett inlägg i [kursforumet](forum/utbildning/oophp) och berätta att du är klar.
