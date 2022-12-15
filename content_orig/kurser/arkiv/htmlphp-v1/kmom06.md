---
author: mos
revision:
  "2014-01-07": (E, mos) Uppdaterade läsanvisningar till Duchett.
  "2012-07-02": (D, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-09-30": (C, mos) Genomläst, justerade litteratur, annars ok.
  "2011-03-24": (B, mos) Total genomarbetning, i princip ett nytt dokument. Guiden
    sqlite20 är också uppdaterad.
  "2010-10-05": (A, mos) Första versionen (kan läsas här, gäller för studenter på
    HT10).
published: "2012-07-02"
updated: "2015-08-03 12:08:50"
created: "2012-06-29 14:20:01"
...
Kmom 06: PHP och SQLite
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




PHP och SQLite {#php-sqlite}
--------------------------------------------------------------------

*alternativt "Uppdatera din webbplats för annonser med stöd för databas."*

Detta moment handlar om databasen SQLite och hur du kan använda den tillsammans med PHP. Momentet består dels av en guide som hjälper dig att komma igång med SQLite, SQLite Manager och SQL. Guiden visar dig även de vanligaste konstruktionerna i PHP PDO för att skapa tabeller, lägga till värden, uppdatera, ta bort och läsa.

Efter att ha gått igenom guiden så uppdaterar du Blokket till Blokket2, en uppdatering där Blokket2 lagrar alla annonser med databasen SQLite istället för vanliga filer.

* Så här kan din Blokket2 se ut när du är klar med kursmomentet.  
  <a href='http://dbwebb.se/htmlphp/me/kmom06/blokket2.php?p=read-all'>http://dbwebb.se/htmlphp/me/kmom06/blokket2.php?p=read-all</a>
  
[FIGURE src=/img/htmlphp/kmom06/image07.png caption="Blokket2 lagrar alla annonser på databasen SQLite, funktionsmässigt ser den dock lika dan ut som Blokket."]

Förbered dig för en övning med SQL och PHP. Om du är nybörjare på PHP och/eller SQL så kan detta moment vara omfattande. Ta det bara lugnt och gå igenom det steg för steg så ska det lösa sig. Det är helt ok att kopiera kod. Lycka till!

Övningens upplägg är enligt följande:

* Läsanvisningar (1-2h)
* Övningar (15-18h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.

Glöm inte att läsa litteraturen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###HTML & CSS: The Complete Reference {#html-css}

*(fifth edition)* 

Inga nya läsanvisningar till detta kursmoment.


Du har sedan tidigare läst följande kapitel.

* Part I, Ch 1: Traditional HTML and XHTML
* Part I, Ch 2: Introducing HTML5
* Part II, Ch 4: Introduction to CSS

Använd följande kapitel som referens och uppslagsverk.

* Part I, Ch 3: HTML and XHTML Element Reference
* Part II, Ch 5: CSS Syntax and Property Reference



###Beginning HTML, XHTML, CSS and JavaScript {#beginning-web}

*(1st edition)*

Det finns inga nya läsanvisningar till detta kursmomentet.

Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Structuring Documents for the Web
* Ch 2: Links and Navigation
* Ch 3: Images, Audio and Video
* Ch 4: Tables
* Ch 5: Forms  
* Ch 7: Cascading Style Sheets
* Ch 8: More Cascading Style Sheets
* Ch 9: Page Layout
* Ch 10: Design issues



###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Följande läsanvisningar gäller för detta kursmoment.

* Ch 31: Introducing PDO

Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics
* Ch 4: Functions
* Ch 5: Arrays
* Ch 10: Working with the File and Operating System
* Ch 13: Forms
* Ch 18: Session Handlers


###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

* Källkoden till exemplen hittar du via min me-sida.  
  <a href='http://dbwebb.se/htmlphp/me/kmom06/me.php'>http://dbwebb.se/htmlphp/me/kmom06/me.php</a>

* PHP manualen om PHP Data Objects, PDO.  
  <a href='http://php.net/manual/en/book.pdo.php'>http://php.net/manual/en/book.pdo.php</a>

* Databasen SQLite.  
  <a href='http://www.sqlite.org/'>http://www.sqlite.org/</a>
  
Boken Databasteknik (används i systerkurserna) har en webbplats med en webbkurs. Den ger lite text att läsa, exempelkod och bakgrund. Titta framförallt på stycket om SQL.

* Om SQL  
  <a href='http://www.databasteknik.se/webbkursen/sql/index.html'>http://www.databasteknik.se/webbkursen/sql/index.html</a>
* Innehållsförteckningen  
  <a href='http://www.databasteknik.se/webbkursen/'>http://www.databasteknik.se/webbkursen/</a>

W3Schools har ett par bra tutorials över SQL och ger en enklare introduktion till språket.

  * <a href='http://w3schools.com/SQL'>http://w3schools.com/SQL</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.


1. SQLite, PHP och PDO {#sqlite-php-pdo}
--------------------------------------------------------------------

###1.1 Inledning {#inledning-1}

SQLite är en filbaserad databas. Det innebär att hela databasen ryms i en fil på disk. Tillsammans med ett bibliotek med funktioner, ett API för SQLite databasfiler, kan man utföra operationer med frågespråket SQL mot databasfilerna. PHP har integrerat detta API och det har även SQLite Manager som är en fönsterbaserad klient, en Firefox plugin, som låter dig jobba med och administrera SQLite databasfiler.


###1.2 Varför välja SQLite {#varfor-sqlite}

En filbaserad databas är enkel att jobba med, ingen server som behöver användare eller konton. Enkelt och smidigt att kopiera mellan datorer. Enkel hantering. Enkel att supporta, "skicka mig databas-filen så kollar jag!"

Framförallt är det en komplett databas med stöd för de vanliga SQL-konstruktionerna.
I din vertygslåda som webbutvecklare så är SQLite ett utmärkt verktyg. En enkel databas, kraftfull med SQL och enkel att hantera. Lämpar sig bra till små och mindre webbplatser.


###1.3 Varför välja PHP Data Objects (PDO) {#varfor-pdo}

Det finns olika sätt att koppla sig mot en databas från PHP. I detta exemplet kommer vi att jobba med PHP PDO och prepared statements. 

PDO är ett generellt abstraktionslager som gäller för flera databaser. Har man en gång lärt sig att använda PDO så blir det enklare att använda även andra databaser från PHP. Optimalt så får man även kod som är lätt att portera till andra databaser.

PDO och prepared staments är säkert och vi får hjälp med att skydda vår webbapplikation från SQL Injections.

PHP PDO är ytterligare ett bra och relevant verktyg i webbutvecklarens verktygslåda.


###1.4 Guiden "20 steg för att komma igång med SQLite" {#sqlite20}

Låter det krångligt? Ingen fara. Vi börjar med att jobba igenom guiden "20 steg för att komma igång med SQLite". Den leder dig steg för steg in i databasvärlden. Den börjar med att visa hur du jobbar mot databasfilerna med adminverktyget SQLite Manager. Därefter visas hur du integrerar PHP PDO och SQLite databaser.

Därefter är du redo att uppdatera ditt Blokket med stöd för databaser.

Då kör vi.

[UPPGIFT]

Börja att gå igenom guidens 20 steg. Gör dina egna kodexempel, kopiera eller skriv om. Det är viktigt att du får exemplen att fungera i din egna miljö. Du lär dig mer på det.

  * <a href='http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20'>http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20</a>

[FIGURE src=/img/htmlphp/kmom06/image08.png caption="Guiden "20 steg för att komma igång med SQLite"."]


När du är klar med guiden så fortsätter vi med en databasuppgradering av Blokket, resultatet blir Blokket2.


2. Blokket2 med stöd för databaser {#blokket-med-db}
--------------------------------------------------------------------

###2.1 Inledning {#inledning-2}

[UPPGIFT]

Vi skall nu göra Blokket med databasen SQLite istället för filer. Annonserna skall lagras i databasen istället för på fil. Bilderna låter vi dock ligga kvar på disk.

Försök på egen hand och se hur långt vingarna bär, eller följ mina steg.

* Här kan du pröva min färdiga Blokket2.  
  <a href='http://dbwebb.se/htmlphp/me/kmom06/blokket2.php?p=read-all'>http://dbwebb.se/htmlphp/me/kmom06/blokket2.php?p=read-all</a>

[FIGURE src=/img/htmlphp/kmom06/image07.png caption="En färdig Blokket2 där annonser lagras i databasen SQLite."]

Testa gärna min variant och lek runt innan du startar.

Så här gjorde jag, steg för steg.


###2.2 Kom igång {#kom-igang}

1. Jag kopierar hela Blocket exemplet till ett nytt exempel, Blocket2.

2. Jag tar en kopia av filen `blocket.php` och döper den till `blocket2.php`. 

3. Jag kopierar katalogen `incl/blocket` och döper den till `incl/blocket2`.

4. Jag lägger till så att Blokket2 syns i menyn och jag uppdaterar `incl/blocket2/default.php` med en liten välkomsthälsning.

Så här blev det.

[FIGURE src=/img/htmlphp/kmom06/image09.png caption="De första ändringarna är genomförda och grunden till Blokket2 är lagd."]

Det är bra att ha kod att utgå ifrån, det gör saker lättare. Se till att alltid sparar all kod du gör, i denna kursen och i andra projekt. Skapa ditt eget bibliotek med återanvändbar kod. Det är ett bra sätt att utveckla, det sparar tid.


###2.3 Initiera databasen {#initiera}

Nästa steg är att initiera databasen genom att skapa databasfilen (om den inte finns), skapa tabellen (om den inte finns), radera innehållet i tabellen (om det finns) och sedan lägga till ett par annonser som exempel.

Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från det exemplet.

* sqlite20: "16. Skapa en ny tabell och lägg till rader"  
  <a href='http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s16'>http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s16</a>

Jag ändrar skriptet i `incl/blokket2/init.php` som hanterar kontrollerna om allt är uppsatt korrekt och jag lägger till ett extra skript `incl/blokket2/init_database.php` som innehåller koden för att initiera databasen.

När allt är ok ser sidan ut så här.

[FIGURE src=/img/htmlphp/kmom06/image01.png caption="Databasfilen är initierad och allt ser ut att vara ok."]

Allt styrs från filen `incl/blokket2/init.php`. Följ flödet i filen för att se hur den är uppbyggt. 

Jag valde att skapa en tabell, Ads, med 4 kolumner.

```sql
CREATE TABLE IF NOT EXISTS Ads
(
  id INTEGER PRIMARY KEY NOT NULL UNIQUE, 
  title TEXT, 
  description TEXT, 
  image TEXT
 );
```
 
Känns det rimligt? Vi fortsätter så får vi se.


###2.4 Uppdatera annons {#uppdatera}

Nästa steg blir att uppdatera informationen om en annons. Jag utgår från filen `incl/blokket2/update.php`. Tanken är att kunna välja bland alla annonser och uppdatera informationen om dem.

Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från det exemplet.

* sqlite20: "18. Uppdatera värden och rader i tabellen med `UPDATE`".  
  <a href='http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s18'>http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s18</a>

Efter att ha uppdaterat koden så blev resultatet följande.

[FIGURE src=/img/htmlphp/kmom06/image00.png caption="Nu går det att uppdatera informationen om annonserna."]

Alla annonser finns i select-listan, när man valt ett objekt i listan så visas annonsens värden i formuläret. Det går att uppdatera informationen och när man klickar "Spara" så sparas informationen i databasen. 

I formuläret använder jag ett `hidden` fält för att skicka med `id` på den annons som skall sparas. Jag kunde egentligen använt `id` som fanns i select-listan. Men, det fick bli ett exempel på `hidden` fält som är ett vanligt sätt att skicka med dold information i ett formulär.


###2.5 Lägg till annons {#lagg-till}

Jag utgår från filen `incl/blokket2/create.php`. Tanken är att lägga till funktion för att skapa en ny annons.

Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från det exemplet.

* sqlite20: "17. Skapa nya rader i tabellen med `INSERT`"  
  <a href='http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s17'>http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s17</a>

Så här blev resultatet.

[FIGURE src=/img/htmlphp/kmom06/image03.png caption="Nu går det att skapa nya annonser."]

Bra, denna gången blev det inte så mycket kodändringar. Hoppas du börjar förstå principen. Om vi studerar koden så ser vi att det inte blir mer kod för att vi använder en databas, snarare tvärtom, det blir mindre kod med databaser.


###2.6 Ta bort annons {#ta-bort}

Jag tar återigen och utgår från den befintliga filen, denna gången är det `incl/blokket2/delete.php` som gäller. Tanken är att kunna radera en rad, en annons, från databasen.

Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från det exemplet.

* sqlite20: "19. Ta bort rader i tabellen med DELETE"  
  <a href='http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s19'>http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s19</a>

Så här blev det.

[FIGURE src=/img/htmlphp/kmom06/image02.png caption="Nu går det att radera annonser från databasen."]

Bra igen, det var inte så mycket ändringar den här gången heller. Jag kunde återanvända strukturen i `incl/blokket2/delete.php` och den var ju i princip likadan som vid fallet "Skapa ny annons".


###2.7 Visa en annons {#visa}

Då tar jag tag i `incl/blokket2/read.php`. Tanken är att visa innehållet i en annons.

Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från det exemplet.

* sqlite20: "14. Visa innehållet i tabellen med `SELECT`"  
  <a href='http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s14'>http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s14</a>

Så här blev det när det är klart.

[FIGURE src=/img/htmlphp/kmom06/image04.png caption="Visar innehållet i en annons."]

Fint. Det känns som det blir mindre och mindre kod att skriva, det är bra. Ju mer kod vi skrivit desto mer har vi att kopiera av.

Då tar vi den sista delen också.


###2.8 Visa alla annonser {#visa-alla}

Filen som gäller är `incl/blokket2/read_all.php`. Jag vill visa alla annonser i en tabell.

Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från det exemplet.

* sqlite20: "14. Visa innehållet i tabellen med `SELECT`"  
  <a href='http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s14'>http://dbwebb.se/htmlphp/me/kmom06/guide.php?id=sqlite20#s14</a>

Så här ser det ut när det är klart.

[FIGURE src=/img/htmlphp/kmom06/image05.png caption="Alla annonser visas i en tabell."]

Bra kämpat. Där har vi nu ett Blokket2 i en databas. Om jag får säga så tycker jag koden blev bättre med databasen än med filhanteringen. Nu kan vi iallfall hantera både och.



3. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Då hoppas jag att du lärt dig en del om SQLite och hur du kan använde PHP PDO för att jobba mot databasen. Ett par nya verktyg till din verktygslåda som webbutvecklare.

Det finns mycket mer att lära om databaser och SQL men detta får räcka för denna kursen. Det är en liten provsmakning av databasvärlden och du kan faktiskt komma långt med det du lärt dig i denna övningen.

Nu är det bara projektet kvar. Det kommer en specifikation på en webbplats som du kommer att få göra. Kursen examineras med det projektet.

Bra jobbat!


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.
2. Genomför momentets alla steg.
3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Vad tycker du om databaser och SQLite? Hur gick guiden sqlite20 att genomföra? Hur gick det när du gjorde Blokket2? Lyckades du komma in i PHP och SQL-programmeringen? Är det svårt?
4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.
5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
