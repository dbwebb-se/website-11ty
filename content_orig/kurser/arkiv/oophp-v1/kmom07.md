---
author: mos
revision:
  "2012-09-11": (B, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2009-11-02": (A, mos) Första utgåvan.
published: "2012-09-11"
updated: "2013-08-13 10:33:05"
created: "2012-08-30 08:18:25"
...
Kmom07: Äventyrsspel med PHP och databas
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




Äventyrsspel med PHP och databas {#inledning}
--------------------------------------------------------------------

*alternativt "Min egen spelmotor för Äventyrsspel"* 

Vi bygger ett Äventyrsspel enligt en strukturerad plan. Planen innefattar spelidé, skiss över rummen, rummens struktur, databasmodell, PHP-spelmotor och avancerade funktioner.

Vi startar med att lägga grunden för spelet för att sedan, steg för steg, utveckla en fungerande spelprototyp. Övningen avslutas med en lite mer fristående programmeringsövning där prototypen skall vidarutvecklas med ett par avancerade funktioner.

I övningen använder vi de PHP-kunskaper vi lärt oss så här långt och vi utökar våra kunskaper i databaser och hur databaser används från PHP. Vi använder även ett par nya konstruktioner i PHP.

Du kan följa övningen till punkt och pricka eller ta lite egna svängar och definera din egen spelidé.

Övningens upplägg är enligt följande:

* Läsanvisningar (0h)
* Övningar (10-20h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.

Glöm inte att läsa litteraturen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Det finns inga nya läsanvisningar inför detta kursmomentet. Vi har tidigare hanterat följande kapitel (i olika omfattning).

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics
* Ch 4: Functions
* Ch 5: Arrays
* Ch 6: Object-Oriented PHP
* Ch 7: Advanced OOP Features (läs översiktligt)
* Ch 8: Error and Exception Handling (läs endast översiktligt)
* Ch 9: Strings and regular expressions (hoppa över reguljära uttryck)
* Ch 13: Forms
* Ch 18: Session Handlers
* Ch 25: Introducing MySQL (läs översiktligt)
* Ch 27: The Many MySQL Clients
* Ch 28: MySQL Storage Engines and Datatypes (läs översiktligt)
* Ch 30: Using PHP with MySQL
* Ch 34: MySQL Views (för referens)
* Ch 35: Practical Database Queries (för referens)


###Beginning Web Programming with HTML, XHTML, and CSS {#beginning-web}

*(2nd edition)*

Detta kursmoment hanterar till en mindre del följande kapitel.

* Ch 7: Cascading Style Sheets

Sedan tidigare har vi hanterat följande kapitel, gå gärna tillbaka till det vid behov:

* Ch 1: Creating Structured Documents
* Ch 2: Links and Navigation
* Ch 3: Images and Objects
* Ch 5: Forms


###Databasteknik {#Databasteknik}

*(Första utgåvan)*

Det finns inga nya läsanvisningar till detta kursmomentet. Följande kapitel har du sedan tidigare studerat (i olika omfattning).

* Kapitel 1: Databaser och databashanterare
* Kapitel 7: Introduktion till frågespråket SQL
* Kapitel 8: Mer om SQL: Aggregatfunktioner, null-värden, yttre join (vid intresse)
* Kapitel 9: Sammanfattning av SQL kommandon (som referens)
* Kapitel 18: Databasbaserade webbplatser (endast översiktligt)
* Kapitel 28: Introduktion till MySQL


###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

Referensmanual för MySQL är en viktig källa till SQL-kunskap.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/'>http://dev.mysql.com/doc/refman/5.1/en/</a>

W3Schools.com är bra att ha tillhanda. Underlättar de första stapplande stegen av SQL. Använd som referens vid behov.

* <a href='http://www.w3schools.com/sql/'>http://www.w3schools.com/sql/</a>

Wikipedia kan ge oss en hel del information för den informationstörstige.

* <a href='http://en.wikipedia.org/wiki/MySQL'>http://en.wikipedia.org/wiki/MySQL</a>
* <a href='http://en.wikipedia.org/wiki/SQL'>http://en.wikipedia.org/wiki/SQL</a>

PHP's referensmanual om mysqli databas extension. Här står det som du behöver veta om PHP's databaskoppling mot MySQL.

* <a href='http://php.net/manual/en/book.mysqli.php'>http://php.net/manual/en/book.mysqli.php</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.

	
1. Äventyrsspel {#mysql}
--------------------------------------------------------------------


###Allmänt {#allmant}

Äventyrsspel är en spel-genre av interaktiva spel där spelaren ofta tar sig fram genom olika "rum" och försöker lösa mysterium eller liknande. Spelaren kan få ledtrådar genom att prata med folk han möter. Spelaren kan plocka upp olika saker som hittas och dessa saker bli ofta användbara senare i spelet.

Börja med att läsa snabbt om äventyrsspel på Wikipedia så att du vet vad det här handlar om.

* <a href='http://en.wikipedia.org/wiki/Adventure_game'>http://en.wikipedia.org/wiki/Adventure_game</a>
* <a href='http://en.wikipedia.org/wiki/Leisure_Suit_Larry_(series)'>http://en.wikipedia.org/wiki/Leisure_Suit_Larry_(series)</a>


###En Plan {#en-plan}

För att vi skall lyckas med dagens övning så behöver vi en plan, en tanke bakom vårt spel. Låt oss skissa upp dessa tankar.

1. **En spelidé**  

  Vi måste ha en idé, en tanke om spelet. Det får bli det första som vi bestämmer.

2. **Skiss över rummen**  

  Ett äventyrsspel byggs upp av dess rum, varje rum är länkat till andra rum. När en spelare står i ett visst rum så kan hon välja åt vilket håll hon skall gå för att hamna i ett nytt rum. För att få en översikt över rummen och spelets struktur så vore det nog på sin plats med en liten skiss över hur de befintliga rummen är sammanlänkade.

3. **Rummens struktur**
  Varje rum har en viss grundstruktur, denna struktur sätter ramarna för vad spelaren kan göra/utföra i rummen. I vårt fall skall följande gälla:

  Varje rum har:    
  * en grafisk representation.
  * en beskrivande välkomsttext.
  * ett antal utgångar som leder till andra rum.
  
  Det får räcka till att börja med.
  
4. **Databasmodell**  
  Det första som måste modelleras är rummens grundstruktur och hur rummen är kopplade till varandra. Det låter som om en tabell Rum och en tabell RumKoppling kan vara en bra idé.

5. **PHP-spelmotor**  
  Vi behöver kod i PHP som kan rita upp och visa ett rum. Därefter så skall spelaren kunna välja åt vilket håll som han vill gå. Allt detta måste vi hantera i PHP-kod.

6. **Mer avancerade funktioner**  
  Kanske kan spelaren prata med folk den möter och kanske kan hon plocka upp saker som går att använda och kanske kan hon interagera med saker i de olika rummen. Mmmm många ideér finns det. Men vi får nog avvakta lite tills vi har en grund att stå på.

Bra, då så, för att summera så har vi följande steg i vår plan.

1. En spelidé
2. Skiss över rummen
3. Rummens struktur
4. Databasmodell
5. PHP-spelmotor
6. Mer avancerade funktioner

Lika bra att sätta igång!


2. En spelidé {#ide}
--------------------------------------------------------------------

Vi kör enligt planen.

1. **En spelidé**
2. Skiss över rummen
3. Rummens struktur
4. Databasmodell
5. PHP-spelmotor
6. Mer avancerade funktioner

Ok, vi håller det enkelt. Ett antal sammanlänkade rum där spelaren skall passera genom för att hitta en skatt. På vägen till skatten så stöter spelaren på olika utmaningar (mer avancerade funktioner). I sin enklaste form så skall spelaren bara navigera genom rummen för att komma fram till skattkammaren.

Kanske inte världens bästa spelidé men någonstans måste man ju börja. Det kanske blir bättre innan vi är klara...


3. Skiss över rummen {#skiss}
--------------------------------------------------------------------

Vi fortsätter enligt planen.

1. <strike>En spelidé</strike>
2. **Skiss över rummen**
3. Rummens struktur
4. Databasmodell
5. PHP-spelmotor
6. Mer avancerade funktioner

Vi sätter ihop 10 rum, det blir en bra början. Låt oss namnge rummen och rita en skiss över hur de skall vara sammanlänkade.

[FIGURE src=/img/oophp/kmom07/image10.png caption="En skiss över de olika rummen och dess rumskopplingar."]

Vi tar också och namnger varje rumskoppling. På det viset kan vi ge ledtrådar till spelare. Rumskopplingarna i rummet Skogsglänta kan vara "följ stigen in i skogen", "följ stigen utmed bäcken" samt "gå in i skogen".

Vi väntar med resten av tills det är dags att mata in värden i databasen.


4. Rummens struktur {#struktur}
--------------------------------------------------------------------

Enligt planen...

1. <strike>En spelidé</strike>
2. <strike>Skiss över rummen</strike>
3. **Rummens struktur**
4. Databasmodell
5. PHP-spelmotor
6. Mer avancerade funktioner

Ett rum har alltid ett namn och en beskrivande välkomsttext.

> Skogsglänta

> "Du står i en skogsglänta, till vänster om dig leder en bred stig in i skogen. Det ser ut som den är väl använd. Till höger om dig rinner sakta en porlande bäck med sitt lite mörkt dunkla vatten. Bäcken ser levande ut. Det går en  liten stig utmed bäcken.

> Skogen ser mörkt grön ut, den är tät så det går inte se så långt in. Den känns lite kuslig men samtidigt spännande och lockande."

Varje rum har en grafisk representation, en bild som representerar det som spelaren ser när han står i rummet. Denna bild skapar vi med html-kod vilket innebär att den kan vara ett foto, en ritad jpeg, en textbaserad css (som korten) eller en svg-bild.

I varje rum kan spelaren välja i vilken riktning han vill gå för att komma till nästa rum.

Detta får räcka som grundstruktur för rummen.


5. Databasmodell {#modell}
--------------------------------------------------------------------

Enligt planen...

1. <strike>En spelidé</strike>
2. <strike>Skiss över rummen</strike>
3. <strike>Rummens struktur</strike>
4. **Databasmodell**
5. PHP-spelmotor
6. Mer avancerade funktioner

###Modellen {#modellen}

Så här långt så ser databasmodellen inte särskilt avancerad ut. Det handlar om tabellerna `Rum` och `Rumkoppling`. Genom att läsa texten ovan så får vi fram följade struktur för tabellerna.

```sql
Rum (#id, namn, beskrivning, grafik)
Rumkoppling (#id, id_Rum1, id_Rum2, namn) 
```

Varje Rum kan ha en eller flera Rumkopplingar. Varje Rumkoppling är länkat till 2 rum.

Vi lägger till id som är primärnycklar som autmatgenereras. I tabellen Rumkoppling är `id_Rum1` det rum som man står i och `id_Rum2` är det rum som man går till.

Låt oss rita en ER-diagram (Entity-Relationship) för att representera databasmodellen.

[FIGURE src=/img/oophp/kmom07/image11.png caption="En databasmodell i form av ett ER-diagram."]


###Skapa tabellerna {#skapa}

Använd ny PHPMyAdmin för att skapa tabellerna och lägga in rader som motsvarar de rum vi skall jobba med. Du får själv välja vilka rum du vill skapa, hur de skall vara kopplade och vilken beskrivning de skall ha. Avvakta med fältet grafik, låt det vara NULL tills vidare. Är du osäker så bör du skapa rummen efter mina skisser. Välj själv.

För min del resulterade tabellernas skapande i följande SQL-kod.

```sql
CREATE TABLE `mos`.`Rum` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`namn` VARCHAR( 100 ) NOT NULL ,
`beskrivning` TEXT NOT NULL ,
`grafik` TEXT NULL
) ENGINE = MYISAM;

CREATE TABLE `mos`.`Rumkoppling` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`id_Rum1` INT NOT NULL ,
`id_Rum2` INT NOT NULL ,
`namn` VARCHAR( 100 ) NOT NULL
) ENGINE = MYISAM
```


###Lägg in rum i tabellerna {#rum-tabell}

Fortsätt att lägga in rummen med dess beskrivning, låt den dock vara minimal tills vidare. Vi kan lägga mer kraft på den senare. Just nu vill vi bara komma igång.

[FIGURE src=/img/oophp/kmom07/image06.png caption="Innehållet i tabellen Rum när samtliga rum är inlagda."]

Bra, det var rummen det.


###Lägg in rumskopplingar i tabellerna {#rumskoppling}

Vi börjar med att lägga in rumkopplingarna för rummen Skogsglänta, Stig i skogen samt grottöppning. Resten tar vi sedan. Just nu vill vi bara komma igång med en prototyp.

För varje rum måste vi lägga in vilka rumkopplingar som finns från det rummet. Det är så som databasmodellen är gjord. Vi kan alltså inte återanvända en rumkoppling. Det betyder att rumkopplingarna är enkelriktade. Jag skriver ned kopplingarna i klartext tillsammans med deras förklarande text.

* Skogsglänta (1) - Stig i skogen (2), (Följ stigen in i skogen)
* Stig i skogen (2) - Skogsglänta (1), (Gå ut i gläntan)
* Stig i skogen (2) - Grottöppning (3), (Fortsätt stigen fram)
* Grottöppning (3) - Grotta (4), (Gå in i grottan)

Lägg nu in dessa som rader i tabellen Rumkoppling. Så här blev innehållet i tabellen Rumkoppling hos mig.

[FIGURE src=/img/oophp/kmom07/image07.jpg caption="Innehållet i tabellen Rumkoppling när samtliga rum är inlagda."]

Följande SQL-kod blev resultatet när jag lade in rummens kopplingar. Det gäller att ha koll på siffrorna så att rummen länkas rätt.

```sql
INSERT INTO `mos`.`Rumkoppling` (
`id` ,
`id_Rum1` ,
`id_Rum2` ,
`namn`
)
VALUES (
NULL , '1', '2', 'Följ stigen in i skogen'
), (
NULL , '2', '1', 'Gå ut i gläntan'
), (
NULL , '2', '3', 'Fortsätt stigen fram'
), (
NULL , '3', '4', 'Gå in i grottan'
);
```


6. PHP-spelmotor {#spelmotor}
--------------------------------------------------------------------

Planen...

1. <strike>En spelidé</strike>
2. <strike>Skiss över rummen</strike>
3. <strike>Rummens struktur</strike>
4. <strike>Databasmodell</strike>
5. **PHP-spelmotor**
6. Mer avancerade funktioner


###Funderingar och Trial-and-Error {#fundering}

En spelmotor i PHP. Ok. Låt oss fundera och skissa lite. Vilka PHP-sidor vill vi ha och vad skall de göra, hur ska de vara länkade.

PHP-sidor i form av filer är en sak. Dessutom så behöver vi ha en mental bild av vilka klasser och funktioner som vi kan behöva.

Det rimligt att dels utveckla en skiss över flödet i webbapplikationen, en skiss som visar vilka sidor som anropas och i vilken ordning de anropas. Det är också rimligt att utveckla en skiss över de klasser och funktioner som skall finnas tillgängliga och hur de hänger ihop. 2 stycken skisser alltså.

Ibland är det dock svårt att få ett helhetsgrepp på ett större problem. Då kan vi istället attackera problemet med trial-and-error. Trial-and-error kan innebära att vi gör en enkel prototyp som innehåller det viktigaste. Blir det bra bygger vi vidare, annars kastar vi det och börjar om. Hela tiden lär vi oss mer om problemdomänen. Handfast utvecklande. Detta angreppsätt funkar mycket bra för problemdomäner där man är lite osäker och oerfaren.

Vi skall även bygga in databaskod och hur gör vi det på bästa sätt? Det känns lite svårt att skissa på flödet om detta är första gången vi gör en liknande applikation.

Jag tror att vi kör på prototyp-stuket. Om du känner att du kan detta så är det nu fritt fram att börja koda. Men, ta och tjuvkika på resten av detta kapitel innan du kör igång. Kanske kan du spara lite tid på det viset.

Vill du välja en alternativ struktur på din spelmotor så gör du det.


###Prototyp 0.1, `room.php`, utan databaskoppling {#proto01}

Vad är mest centralt? Det måste ju vara att visa ett rum. Det känns som en lagom start. Jag väljer att skapa en fil, `room.php`, den får till uppgift att presentera rummet i form av HTML. Jag nöjer mig med att börja med ett skal för layouten. Detta för att bestämma hur  informationen om rummen skall presenteras.

Gör din en egen variant av `room.php`, enligt nedan. Kopiera gärna min och utgå från den om du vill. Du kan använda grunderna men ändra iallafall färgschemat.

Så här blev resultatet när jag blev klar.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure01/room.php'>http://www.student.bth.se/~mos/oophp/mom07/adventure01/room.php</a>

[FIGURE src=/img/oophp/kmom07/image08.jpg caption="En första prototyp av layouten av spelet, stylad med CSS och en SVG-bild."]

Det var första steget. Studera källkoden så ser du att det bara handlar om HTML och CSS (stylesheet) samt en extern bild i SVG. Än så länge har vi ingen databaskoppling.


###Kommentar om stylesheeten {#stylesheet}

Stylesheeten är inkluderad i HTML-sidan. I kommande exempel så kommer jag dock att lyfta ut den till en egen fil, `stylesheet.css`. Det är oftast ett bättre sätt att hantera stylesheets.


###Kommentarer om färger och färgval {#farger}

Om man inte är begåvad med ett färgsinne så finns det många webbtjänster som kan underlätta vid färgsättning av webbsidor. Googla på "HTML color scheme" och bekanta dig med några av verktygen som dyker upp.

* <a href='http://www.google.se/search?q=HTML+Color+scheme'>http://www.google.se/search?q=HTML+Color+scheme</a>

Här är en lista på 10 verktyg som verkar ok.

* <a href='http://webdesignledger.com/tools/10-super-useful-tools-for-choosing-the-right-color-palette'>http://webdesignledger.com/tools/10-super-useful-tools-for-choosing-the-right-color-palette</a>

Här är två verktyg som jag använt.

* <a href='http://colors.napcsweb.com/colorschemer/'>http://colors.napcsweb.com/colorschemer/</a>
* <a href='http://colorschemedesigner.com/'>http://colorschemedesigner.com/</a>

I denna övning så valde jag följande färgschema för HTML-sidorna.

* <a href='http://colorschemedesigner.com/#2E11Tw0--w0w0'>http://colorschemedesigner.com/#2E11Tw0--w0w0</a>


###Kommentarer om SVG, Inkscape och SVG clipart {#svgclipart}

Ett riktigt äventyrsspel måste ha en grafisk representation av rummen så jag plockade fram SVG igen. Jag använde Inkscape för att rita bakgrundsbilden (gräs, himmel, sol). Jag tog Betty från en site med SVG-clipart (http://openclipart.org/). Jag importerade Betty till Inkscape och lade till henne i ett eget lager i bilden. Jag väljer att låta SVG-bilden ligga externt och jag väljer `<embed>` taggen för att inkludera bilden i min HTML-sida.

* Inkscape, SVG-ritvertyg (opensource):  
  <a href='http://www.inkscape.org/'>http://www.inkscape.org/</a>
  
* SVG-clipart (opensource)  
  <a href='http://openclipart.org/'>http://openclipart.org/</a>

* Betty:  
  <a href='http://openclipart.org/detail/21876/'>http://openclipart.org/detail/21876/</a>
  
* Min bakgrundsbild, klar att spara och importera i Inkscape.  
  <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure01/img/bakgrund.svg'>http://www.student.bth.se/~mos/oophp/mom07/adventure01/img/bakgrund.svg</a>

* W3Schools om olika sätt att inkludera externa SVG-bilder.
<a href='http://w3schools.com/svg/svg_inhtml.asp'>http://w3schools.com/svg/svg_inhtml.asp</a>

Så här ser bilden ut när jag jobbar med den i Inkscape.

[FIGURE src=/img/oophp/kmom07/image09.jpg caption="Betty från openclipart.org, importerad i Inkscape i ett eget lager "Betty"."]


###Prototyp 0.2, visa titel och beskrivning {#proto02}

Ska vi se om vi kan läsa in information från databasen och visa tillsammans med rummet? Vi tar och skickar in rummets id som en `$_GET` parameter. Följande skulle isåfall visa rummet "Skogsglänta" som har id 1 i databasen.

* room.php?id=1

Implementera nu databaskopplingarna för att visa rummets titel och beskrivning, avvakta med rumskopplingarna.

Så här blev det hos mig.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure02/room.php?id=1'>http://www.student.bth.se/~mos/oophp/mom07/adventure02/room.php?id=1</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure02/room.php?id=2'>http://www.student.bth.se/~mos/oophp/mom07/adventure02/room.php?id=2</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure02/room.php?id=3'>http://www.student.bth.se/~mos/oophp/mom07/adventure02/room.php?id=3</a>

[FIGURE src=/img/oophp/kmom07/image01.jpg caption="`room.php`, nu med titel och beskrivning från databasen."]

Bra, det gick använda samma kod som vi använde i förra övningen med kompis-sök. Återanvändning är ett bra koncept.


###Prototyp 0.3, visa rumkopplingar {#proto03}

Då vidarutvecklar vi prototypen till att även visa rumkopplingarna. Den SQL-fråga vi behöver ställa är "Visa alla rumkopplingar som utgår från rummet med id = 1". I ren SQL kan de se ut så här.

```sql
SELECT * 
FROM `Rumkoppling` 
WHERE id_Rum1 = 1
```

Öppna upp PHPMyAdmin och pröva att ställa frågan. Så här ser det ut hos mig.

* <a href='https://www.student.bth.se/phpmyadmin'>https://www.student.bth.se/phpmyadmin</a>

[FIGURE src=/img/oophp/kmom07/image00.jpg caption="PHPMyAdmin visar alla rumkopplingar som utgår från rummet ned id = 1."]

Pröva nu att vidarutveckla din prototyp med att visa rummets kopplingar.

Så här blev det hos mig.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure03/room.php?id=1'>http://www.student.bth.se/~mos/oophp/mom07/adventure03/room.php?id=1</a>

[FIGURE src=/img/oophp/kmom07/image03.jpg caption="Prototypen nu med rumkopplingar. Nu kan du klicka dig runt i spelet."]

Fint, nu kan man till och med klicka sig runt i spelet. Känns som om saker börjar falla på plats. Att utveckla med trial-and-error och via en prototyp verkade funka bra i detta fallet.

Som du ser så uppdaterade jag även min stylesheet för att ändra stilen på länkarna. Du hittar mina ändringar längst ned i stylesheeten.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure03/source.php?dir=&file=stylesheet.css'>http://www.student.bth.se/~mos/oophp/mom07/adventure03/source.php?dir=&file=stylesheet.css</a>


###Prototyp 0.4, multi_query {#proto04}

Det finns en mysqli-funktion som heter `multi_query()`. Den låter oss att ställa flera SQL-frågor i samma databasanrop. Om vi använder den så kan vi få lite renare kod och vi kan klumpa samman SQL-koden på ett bra sätt. Jag uppgraderar min prototyp med att använda `multi_query()` istället.

* <a href='http://php.net/manual/en/mysqli.multi-query.php'>http://php.net/manual/en/mysqli.multi-query.php</a>

Så här blev min uppdaterade kod.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure04/room.php?id=1'>http://www.student.bth.se/~mos/oophp/mom07/adventure04/room.php?id=1</a>

Funktionen är likadan, bara koden är lite annorlunda strukturerad. Ju fler databasanrop, desto större anledning att använda denna funktion.

Se till att du också använder `multi_query()` i din kod.


###Prototyp 0.5, klass för databaskoden, `CRoom.php` {#proto05}

Filen `room.php` växer, det finns en bra möjlighet att flytta den databas-relaterade koden till en egen klass. En klass som läser in all info från databasen för ett rum. Denna klass går sedan att använda från `room.php`. Detta ger en bättre överblick över spelmotorn och en bättre avgränsning av de olika kod-delarna.

Skapa klassen `CRoom.php` och lägg databaskoden i den. Använd sedan klassen från filen `room.php`.

Så här blev det för mig.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure05/room.php?id=1'>http://www.student.bth.se/~mos/oophp/mom07/adventure05/room.php?id=1</a>

Samma funktionalitet, bara annorlunda kod-struktur.

Blev det bra? Ja, bättre kod-struktur än innan. Däremot går det fortfarande dela upp klassen i två delar, en mer databasspecifik del och en del som är mer renodlad rum-hanterare. Men, vi låter det vara så länge. Ibland så måste man sluta strukturera för att istället komma framåt. Det är alltid en avvägning av vad som är rätt eller fel.


###Prototyp 0.6, grafisk representation i databasen {#proto06}

När vi skapade tabellen Rum så gjorde vi ett fält Grafik. Låt oss nu använda det fältet för att bestämma grafiken till spelet. Detta är ju än så länge hårdkodat in i filen `room.php` via följande kodrad.

```html
<embed type="image/svg+xml" src="img/bakgrund.svg" width="720" height="480" />
```

Om vi istället sparar hela denna textrad i databasen så kan vi där bestämma vilken grafik som skall representera rummet. Låt oss pröva detta.

Börja med att lägga in ovanstående rad i de tre första rummen. Uppdatera din kod i `CRoom.php` och `room.php`. Testa om det fungerar.

Lägg in en default-bakgrund i de andra rummen. Du kan använda följande bild om du vill.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure06/img/no-where.svg'>http://www.student.bth.se/~mos/oophp/mom07/adventure06/img/no-where.svg</a>

```html
<embed type="image/svg+xml" src="img/no-where.svg" width="720" height="480" />
```


###Kommentar om att använda alternativ grafik {#alt-grafik}

Om du inte gillar SVG så är det fritt fram att använda alternativ grafik. Du kan rita i photoshop eller paint och skapa en vanlig jpeg- eller png-fil. För att inkludera den uppdaterar du fältet grafik.

Jag testade med en bild målad i Paint och den blev jättefin. Testa den här.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure06/img/paint.jpg'>http://www.student.bth.se/~mos/oophp/mom07/adventure06/img/paint.jpg</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure06/room.php?id=6'>http://www.student.bth.se/~mos/oophp/mom07/adventure06/room.php?id=6</a>

Jag uppdaterade fältet grafik enligt följande.

```html
<img src="img/paint.jpg" />
```

På samma sätt kan du använda egna foton som du tagit eller bilder som du hittat på nätet. Jag letade reda på en bild av en grotta, bara för att testa. Eftersom storleken på bilden är mindre än 720x480 så blir det lite konstigt. Jag använder en div med style för att försöka undvika problem med storleken.  Så här blev det.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure06/img/cave.jpg'>http://www.student.bth.se/~mos/oophp/mom07/adventure06/img/cave.jpg</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure06/room.php?id=4'>http://www.student.bth.se/~mos/oophp/mom07/adventure06/room.php?id=4</a>

Så här skrev jag i fältet grafik.

```html
<div style="background: url('img/cave.jpg') center center no-repeat; width: 720px; height: 480px;"> </div>
```

Bilden är opensource enligt Wikimedia Commons.

* <a href='http://en.wikipedia.org/wiki/File:Burger_OtokKriznaJama.jpg'>http://en.wikipedia.org/wiki/File:Burger_OtokKriznaJama.jpg</a>

Som du ser så har du nu flera möjligheter att byta grafisk representation för rummen.

 
7. Färdigställ rum och rumkopplingar {#fardigstall}
--------------------------------------------------------------------

Enligt planen skulle vi nu börja med mer avancerade funktioner. Men, först måste vi sätta ihop spelet så att det är komplett. Vi lägger till en punkt i vår plan, "Färdigställ rum och rumkopplingar".

1. <strike>En spelidé</strike>
2. <strike>Skiss över rummen</strike>
3. <strike>Rummens struktur</strike>
4. <strike>Databasmodell</strike>
5. <strike>PHP-spelmotor</strike>
6. **Färdigställ rum och rumkopplingar**
7. Mer avancerade funktioner

Lägg in så att alla rum har beskrivningar och att alla rum är kopplade enligt rums-skissen. Lägg till så att alla rum har en grafisk representation. Välj själv typ av grafik, du kan kopiera mina bilder om du vill.

Om du tycker att "alla" är för mycket så gör du minst 6 rum. Se dock till att rummen hänger ihop i ett logiskt mönster.

Gör det gärna snyggt, roligt, med känsla och glimten i ögat. Oavsett vad vi programmerar, så gäller det ofta att ögat bedömmer kvaliteten efter vad det ser. Och första ögonkastet säger en del om det engegemang som lagts ned på programmet. Det säger inte allt, men en del. Rättvist eller inte, men så är det. Lägg en liten del av din själ i det du gör, det lönar sig i längden. Ha roligt.

Du får gärna göra dina egna rum och koppla dem som du vill. Du behöver inte följa min rumsskiss. Se dock till att du har ungefärligt lika många rum och rumkopplingar.
Så här blev min variant. Snygg eller inte, jag hade iallafall skoj :). Kan du hitta fram till "Den magiska offerplatsen"?

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure07/room.php?id=1'>http://www.student.bth.se/~mos/oophp/mom07/adventure07/room.php?id=1</a>

[FIGURE src=/img/oophp/kmom07/image02.jpg caption="Den magiska offerplatsen är målet."]

Som du ser så lade jag till några extra rum eftersom de behövdes för "spelkänslan". Jag ändrade också lite rumkopplingar och detaljer från utgångsskissen.


8. Startsida med översikt {#startsida}
--------------------------------------------------------------------

Skapa en startsida till spelet, `adventure.php`. Startsidan skall innehålla en länk till första rummet (för att starta spelet). Startsidan skall även innehålla en länk till en sida, `allrooms.php`, som visar samtliga rum på en och samma sida. Det blir lite som en "cheat" till spelet.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure07/adventure.php'>http://www.student.bth.se/~mos/oophp/mom07/adventure07/adventure.php</a>

[FIGURE src=/img/oophp/kmom07/image04.jpg caption="Min förstasida med länk till starta spelet och till översikt över spelets alla rum."]


9. Mer avancerade funktioner {#avancerad}
--------------------------------------------------------------------

Planen är snart verkställd...

1. <strike>En spelidé</strike>
2. <strike>Skiss över rummen</strike>
3. <strike>Rummens struktur</strike>
4. <strike>Databasmodell</strike>
5. <strike>PHP-spelmotor</strike>
6. <strike>Färdigställ rum och rumkopplingar</strike>
7. **Mer avancerade funktioner**

För att göra spelet till en utmaning att spela så behövs det extra funktioner som kan bli till en utmaning för spelaren. Låt oss utveckla två "avancerade funktioner".


1. Hälsomätare, händelser som påverkar hälsan.

2. Spel som rum, en utmaning för att komma vidare.


###Hälsomätare {#halsa}

För varje steg (varje klick) så minskar Bettys hälsa. När det nått botten så vägrar Betty ta ett steg till (game over). Om du låter Betty dricka vatten så stiger hälsan. Se till att Betty mår bra.


###Spel som rum {#spelrum}

Använd ett spel som rum, Betty måste vinna i spelet för att komma vidare. När Betty vunnit så visas en länk till nästa rum. Använd ditt spel HighLow som testspel.


10. Implementation av hälsomätaren {#impl-halsa}
--------------------------------------------------------------------

Läs först anvisningarn, välj därefter om du följer dem eller om du vill pröva på en egen implementation.

Skapa en ny klass, `CPlayer`, som innehåller Bettys hälsomätare. Objekt av klassen kan lagras i sessionen. På startsidan, `adventure.php`, ges möjlighet att förstöra sessionen så att man kan spela om spelet från början. Startsidan tar även hand om initiering av sessionen när spelet börjar.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/adventure.php?game=start'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/adventure.php?game=start</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/adventure.php?game=initsession'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/adventure.php?game=initsession</a>

Uppdatera `room.php` så att Bettys hälsomätare minskas med 1 varje gång Betty går till ett nytt rum. Använd sessionen och `CPlayer` för att kontrollera när Betty kommer till ett nytt rum. När hälsomätaren når noll, visa en sida, `gameover.php`, med ett "Game Over"-meddelande.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/gameover.php?reason=Ingen%20anledning%20alls'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/gameover.php?reason=Ingen%20anledning%20alls</a>

För att låta Betty göra saker så inför ett begrepp Händelser (eller Actions). Exempel på händelser är "Drick från bäcken" eller "Drick från sjön". Skapa en ny tabell i databasen, `Actions`, som lagrar de händelser som finns. Skapa även en tabell `RumActions` som innehåller de händelser som kan ske i ett visst rum. Uppdatera `room.php` och `CRooms.php` så att de visar de händelser som kan ske i ett visst rum.

Här kan du se den SQL-kod som jag använt för att skapa tabellerna och stoppa in rader.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/source.php?dir=&file=SAction.sql'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/source.php?dir=&file=SAction.sql</a>

Uppdatera `CPlayer.php` så att den tar hand om varje action när den sker, tex "increaseHealthBy5". Använd en vanlig länk för att låta en action hända, studera följande länk och klura ut vad den gör. Titta i källkoden för `room.php` och `CPlayer.php` för facit.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=7&event=increaseHealthBy5'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=7&event=increaseHealthBy5</a>

Pröva följande två sidor i spelet och testa de händelser som finns där. Studera hur händelse-länken (Drick vatten i sjön) är uppbyggd.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=7'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=7</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=4'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=4</a>

[FIGURE src=/img/oophp/kmom07/image12.jpg caption="Äventyrsspel nu med möjlighet till händelser."]

Glöm inte bort att du hela tiden måste ha en fungerande session för att spela äventyrsspelet. Du intitierar den sessionen via följande sida.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/adventure.php'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/adventure.php</a>

Utveckla så att ditt äventyrsspel har stöd för samma händelser som ovan. Följ min implementation eller gör din egen variant.


11. Implementation av spel som rum {#impl-spel}
--------------------------------------------------------------------

Läs först anvisningarn, välj därefter om du följer dem eller om du vill pröva på en egen implementation.

Tanken är att en utmaning skall ske via en händelse (action). Se följande exempel, klicka på händelsen Ta upp och blanda kortleken, och se vad som händer.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=10'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=10</a>

[FIGURE src=/img/oophp/kmom07/image13.jpg caption="Äventyrsspel nu med möjlighet till utmaningar via existerande spel."]

Jag kopierade hela spelet HighLowCard från föregående kursmoment. Jag uppdaterade endast filen highlow.php så att den använde min stylesheet och ett antal mindre justeringar.

Direktlänk till spelet följer.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/highlow/highlow.php?game=init'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/highlow/highlow.php?game=init</a>

Jag gjorde en ny Action i databasen och jag hanterade dess ActionEvent i `CPlayer.php`.

Glöm inte bort att du hela tiden måste ha en fungerande session för att spela äventyrsspelet. Du intitierar den sessionen via följande sida.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/adventure.php'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/adventure.php</a>

Utveckla så att ditt äventyrsspel kan använda sig av ditt spel HighLowCard. Följ min implementation eller gör din egen variant.


12. Avslutningssida {#avslutning}
--------------------------------------------------------------------

Avsluta med att göra en sida där spelet avslutas och segraren koras.

* <a href='http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=13'>http://www.student.bth.se/~mos/oophp/mom07/adventure08/room.php?id=13</a>

[FIGURE src=/img/oophp/kmom07/image14.jpg caption="Äventyrsspelet avklarat, Betty har vunnit!"]


13. Backup {#backup}
--------------------------------------------------------------------

Glöm nu inte att ta en backup av din databas. Gör som vi gjorde i föregående kursmoment.


14. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Har du extra kraft kvar så är det lika bra att du ger dig på projekt-uppgiften. Den är en ren vidareutveckling av det som du gjort i detta kursmomentet (och tidigare kursmoment). Nu gäller det att knyta samman allt.

Bra kämpat!


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.

2. Genomför momentets alla steg.

3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Besvara gärna följande:
  * Följde du anvisningarna eller kodade du själv? 
  * Känner du att du har lärt dig något om databaser och objektorienterad PHP-programmering? 
  * Saknar du något? 
  * Är detta något du kommer ha nytta av framöver?

4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
