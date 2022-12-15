---
author:
    - mos
revision:
    "2017-05-09": (B, mos) Mindre förtydligande.
    "2017-05-06": (A, mos) Första utgåvan.
...
Kmom07/10: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Ryktet har spritt sig att du är en högst kompetent programutvecklare vilket resulterat i att en välkänd investerare, låt oss kalla henne fru BeckSten, har bett dig utveckla nästa generations webbshop.

Du accepterar uppdraget, väl medveten om att du redan har en god grund till lösningen. 

Du tar din grund `me/anax-lite` och skapar ett helt nytt repo i `me/kmom10`. Om du lägger projektet på GitHub/Bitbucket så behöver det vara privat, eftersom detta är projektet och vi vill undvika att någon hittar och lånar dina affärshemligheter.

Du skall alltså göra en webbshop där användare kan registrera sig och köpa saker, samtidigt skall det finnas en backend för administration av webbplats och produkter. Investeraren vill se din tekniska lösning men låter dig själv bestämma vilken profil webbshopen skall ha och vilka produkter den skall innehålla.



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas info i specen så kan du själv göra en bedömning och välja väg, dokumentera dina val i redovisningstexten.

De tre första kraven är obligatoriska. De tre sista kraven är optionella krav,  lös dem för att samla poäng och därmed nå högre betyg.

Varje krav ger max 10 poäng, totalt är det 60 poäng.



###Krav 1: Struktur och innehåll {#k1}

Följande struktur/innehåll skall (minst) finnas på webbplatsen:

1. Sida - Produkter, visa upp de produkter som kan säljas.
1. Sida - Nyheter, blogglista med nyheter om produkter och ditt företag.
1. Sida - Om företaget, sida med information om företaget, skriv något relevant och trevligt.
1. Gemensam Header med logo och titel. En navbar med länkar till webbplatsens olika delar.
1. Gemensam Footer, med text om Copyright med företagsnamnet.

Webbsidan skyddas av inloggning och när man är inloggad (och har behörighet som "administratör") kan man via ett gränssnitt ändra innehållet på webbplatsen enligt följande.

* Hantera nyhetsbloggen.
* Administrera produkterna.
* Administrera innehållet i "om"-sidan och footern.

I nyhetsblogg släpper företaget nyheter om sina produkter, sin verksamhet och erbjudande. I översikten skall det visas inledningen till minst 7 blogginlägg. Man kan klicka på rubriken för att komma till en egen sida där blogginlägget visas. 

Ditt projekt innehåller en makefil som kan generera dokumentation med phpdoc och köra enhetstester med phpunit och generera kodtäckning. Det räcker om det finns testfall i samma omfång som i kmom06.

Din databaskod skriver du i `me/kmom10/sql/setup.sql` och hela filen kan köras utan problem, för att skapa/återskapa en databas.

Du skapar ett ER-diagram av din färdiga databas och sparar i `me/kmom10/sql/er.png`.

Ditt system fungerar att köra på studentservern.



###Krav 2: Skapa kundkonto {#k2}

En kund kan själv skapa ett nytt konto på webbplatsen. En kund kan redigera detaljer om sitt konto (mailadress, mer efter eget sinne, kanske en avatar från Gravatar?).

En kund har bara behörighet att köpa, hen kan inte redigera andra delar av webbplatsens innehåll.

Det skall finnas förskapade användarkonton, minst ett administratörskonto (admin/admin) och ett kundkonto (doe/doe).

Administratören kan se vilka konton som finns skapade (administratörskonton och kundkonton) och kan redigera detaljer om dem.



###Krav 3: Sida - Produkter {#k3}

Varje produkt tillhör en produktkategori.

Produkterna visas upp med en bild, ett namn och en beskrivande text samt ett pris och antalet produkter som finns i lagret.

När man visar produkterna skall de kunna sorteras efter namn och pris. Man kan välja hur många produkter som visas och det finns stöd för paginering.

Man kan söka efter produkter via produkternas namn och beskrivning.

En användare måste logga in för att köpa. Eventuellt kan man använda varukorgen först och logga in när man gör köpet (välj väg).
 
En användare kan köpa produkter genom att lägga dem i en varukorg och sedan checka ut varukorgen. Användaren får då en visuell rapport över sin order och ordern sparas.

Varukorgen är implementerad i databasen (likt kmom05).

En kund kan se sin orderhistorik och se innehållet i varje order.

Lagret skall uppdateras när en order görs. Innehåll i varukorgen behöver inte påverka lagret.

Det skall finnas minst tio produkter, fördelade över minst tre produktkategorier. Samtliga produkter skall finnas i olika mängd i lagret.



###Krav 4: Förstasidan (optionell) {#k4}

Gör en förstasida som (minst) innehåller:

De tre senaste inläggen från din nyhetsblogg. Visa inledningen och en länk för att läsa hela blogginlägget.

samt:

* Senaste inkomna produkter
* Din mest sålda produkt(er)
* Veckans erbjudande(n)
* Rekommenderad produkt(er)

Den mest sålda produkten och senast inkomna produkter uppdateras automatiskt baserat på databasens innehåll. För de andra kan man justera innehållet om man loggar in som administratör.



###Krav 5: Produktkategorier (optionell) {#k5}

Du förbättrar flexibiliteten och en produkt kan vara kopplad till många produktkategorier.

Uppdatera dina produkter så att de är kopplade till en mix av 1, 2 och 3 produktkategorier.

På din förstasida, lägg till en översikt av dina kategorier, formattera kategorinamnen så att de får ett större typsnitt baserat på antalet produkter som är kopplade till just den kategorin.

När man tittar på produktsidan skall man kunna filtrera per kategori (visa vilka produkter som finns i en kategori).

Kan man välja att se produkter från flera produktkategorier så är det bonus (men inte nödvändigt).



###Krav 6: Extra (optionell) {#k6}

Välj en utbyggnad som du tycker passar in. Det kan vara något i stil med:

* Betalning
* Faktura
* Tävla för att vinna bonuskod (100-spelet) (och använda bonuskoden)

Eller visa mer information på förstasidan/alla sidor likt:

* Lista senaste produkter som användaren tittat på.
* Lista de produkter som är mest populära (antalet användare som tittat på dem).
* Lista senast köpta produkter (oavsett vem som köpt dem).

Eller något som du själv anser är relevant och där du kan argumentera dig fram till några extrapoäng. 70% kodtäckning med enhetstester kanske?

Kanske kan du integrera din kalender för att visa när nya produkter kommer att släppas?

Kanske hämtar du information till dina produkter från ett externt API? Till exempel en affär som säljer DVD-filmer och hämtar information till nya produkter via ett interface från IMDB.

Skriv vad du gjort och skriv även hur många poäng du anser dina utbyggnader vara värda.



Redovisning {#redovisning}
--------------------------------------------------------------------

1. På din [redovisningssida](kurser/oophp-v3/redovisa), skriv följande:

    1. För varje krav du implementerat, dvs 1-6, skriver du ett textstycke om ca 5-10 meningar där du beskriver vad du gjort och hur du tänkt. Poängsättningen tar sin start i din text så se till att skriva väl för att undvika poängavdrag. Missar du att skriva/dokumentera din lösning så blir det 0 poäng. Du kan inte komplettera en inlämning för att få högre betyg.

    1. Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

    1. Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida med projektet. 

3. Ta en kopia av texten från din redovisningssida och gör ett inlägg i [kursforumet](forum/utbildning/oophp) och berätta att du är klar.

4. Se till att samtliga kursmoment validerar.

```bash
# Ställ dig i kursrepot
dbwebb publish me
```
