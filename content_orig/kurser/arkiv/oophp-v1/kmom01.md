---
author: mos
revision:
  "2012-08-29": (B, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown. Mindre justeringar.
  "2009-07-01": (A) Första utgåvan.
published: "2012-08-29"
updated: "2013-08-13 10:27:22"
created: "2012-08-30 08:13:30"
...
Kmom01: Intro till PHP i webbmiljö
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




Introduktion till PHP i webbmiljö {#kom-igang}
--------------------------------------------------------------------

*alternativt "Hänga Gubben i PHP"*

Övningen går ut på att komma igång med PHP i den labbmiljö som används i kursen. Vi gör detta främst genom att testa och studera ett fungerande exempel-program, "Hänga Gubben". Förhoppningen är att få en liten kickstart med PHP.

I samband med övningen så installerar vi de applikationer som behövs för att genomföra kursen och vi genomför några små enkla programmeringsövningar i labbmiljön.

Övningen avslutas med en liten tankenöt där du får möjlighet att testa din klurighet.

Övningens upplägg är enligt följande:

1. Läsanvisningar (4-10h)
2. Övningar (4-10h)
3. Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 2-3 timmar per gång kan vara bra. Läs gärna igenom hela kursmomentet innan du börjar.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Läs snabbt och översiktligt följande kapitel:

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics


###Beginning Web Programming with HTML, XHTML, and CSS {#beginning-web}

*(2nd edition)*

Du bör ha grundläggande kunskaper i HTML och veta hur en enklare webbsida ser ut. Följande kapitel ger dig en bra grund att stå på. Läs efter behov.

* Ch 1: Creating Structured Documents
* Ch 2: Links and Navigation
* Ch 3: Images and Objects


###Databasteknik {#Databasteknik}

*(Första utgåvan)*

Det finns inga specifika läsanvisningar som är kopplade till detta kursmoment.


###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

Orientera dig snabbt i PHP manualen. Lär dig sökfunktionen. Refmanualen är din bästa vän.

* <a href='http://www.php.net/manual/en/'>http://www.php.net/manual/en/</a>

Wikipedia, översikt av PHP, kolla snabbt igenom sidan.

* <a href='http://en.wikipedia.org/wiki/PHP'>http://en.wikipedia.org/wiki/PHP</a>

W3Schools.com har flera enkla och bra tutorials till PHP, (X)HTML och mer, använd dem gärna.

* <a href='http://www.w3schools.com/php/'>http://www.w3schools.com/php/</a>
* <a href='http://www.w3schools.com/html/'>http://www.w3schools.com/html/</a>
* <a href='http://www.w3schools.com/xhtml/'>http://www.w3schools.com/xhtml/</a>
* <a href='http://www.w3schools.com/svg/'>http://www.w3schools.com/svg/</a>

Om du vill bli en duktig programmerare och kanske tom kallas för "hacker", då bör du börja med att läsa här. Det handlar om tankesätt och lite filosofi. Se till att ha läst texten innan kursen är slut.

* <a href='http://www.catb.org/~esr/faqs/hacker-howto.html'>http://www.catb.org/~esr/faqs/hacker-howto.html</a>



Introduktion {#intro}
--------------------------------------------------------------------

###Att bli en duktig PHP programmerare {#duktig}

PHP kan användas som ett litet skript i en webbsida, väldigt enkelt och kraftfullt. Nästan vem som helst som kan koda en html-sida kan dra nytta av av dess styrka.

Men PHP är också ett kraftfullt och välutbyggt programmeringsspråk, med konstruktioner som vilket annat programmeringsspråk som helst. Det finns vanliga, typer, variabler, konstanter, uttryck och operatorer. Det finns kontrollstrukturer såsom if/else if/else, while, do-while, for, foreach, break, continue, switch. Det går att dela upp koden i olika filer och inkludera med include och require. Arrayer är ett kraftfullt verktyg i PHP. Det finns stöd för funktioner, argument, passing-by-value och passing-by-reference. Det finns stöd för klasser, objekt, metoder, medlemsvariabler samt  objektorientering i form av inkapsling, arv, polymorfism, interfaces och abstrakta klasser.

Dessutom så finns det ett stort stöd av inbyggda funktioner och bibliotek för stränghantering, reguljära uttryck, matematiska funktioner, tid och datum, filhantering och koppling mot databaser.

PHP är kraftfullt, denna kursen går ut på att visa lite av styrkan med PHP.

Svårigheterna med PHP är framförallt den miljön som det lever i. PHP samverkar med en webbserver och html/xhtml/xml-sidor. Ofta finns det en databas som används tillsammans och troligen så är driftmiljön med webbserver, databas samt PHP och html-filerna utspridda över flera olika maskiner. Ofta UNIX-maskiner, inte nödvändigt, men ofta. Många saker kan gå fel och det är en stor utmaning för oss som programmerare att hålla tungan rätt i mun och snabbt leta reda på och avgränsa eventuella fel.

Har man en gång fixat ett problem så är det enkelt nästa gång, då känner man igen symptomen. Det är första gången som är jobbig och tar tid. I denna kursen kommer det vara en hel del "första gången" som tar tid, kraft och frustration. Problemlösning och logiskt tänkande tillsammans med en strukturerad felsökningsstrategi kommer att hjälpa oss att ta oss förbi dessa hinder.

Nog skrivet, sugen på att komma igång?


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.

0. Installera Firefox  {#firefox}
--------------------------------------------------------------------

I kursen använder vi genomgående webbläsaren Firefox. Börja med att ladda ned och installera den. Du kan titta i följande artikel om hur du installerar den:

* <a href='http://dbwebb.se/kunskap/installera-webblasare'>http://dbwebb.se/kunskap/installera-webblasare</a>

Flera av övningarna kommer bara fungera i Firefox så det är viktigt att du använder den webbläsaren i kursen.


1. Hänga gubben i PHP  {#hanga}
--------------------------------------------------------------------

Via nedanstående länk finns ett enkelt PHP-program. Totalt omfattar koden ca 1200 rader, inklusive tomrader och kommentarer. Jag tänkte att detta vore ett litet lagom program att börja med...

Testa programmet i lugn och ro. Kolla runt i dess filer. Titta i källkoden och försök förstå vad som händer.

* <a href='http://www.student.bth.se/~mos/oophp/mom01/hangman/PHangman.php'>http://www.student.bth.se/~mos/oophp/mom01/hangman/PHangman.php</a>

[FIGURE src=/img/oophp/kmom01/image06.png?w=w1 caption="Spela det klassiska spelet Hänga gubben."]

I nästa moment skall vi skriva ett eget Hangaman. Då kan det vara bra att ha ett exempel att utgå ifrån.

Är du klar? Testat och lekt färdigt? Ok, då går vi vidare.

Detta spel går att implementera på flera olika sätt. Låt oss se hur det är implementerat i detta fallet. Vi kan utgå från att studera källkoden av filen PHangman.php. Ett av de bästa sätten att lära sig programmera är att studera andras kod.

* <a href='http://www.student.bth.se/~mos/oophp/mom01/hangman/PListDirectory.php?dir=&file=PHangman.php'>http://www.student.bth.se/~mos/oophp/mom01/hangman/PListDirectory.php?dir=&file=PHangman.php</a>

Låt oss snabbt (10 minuter) gå igenom filen och översiktligt kommentera varje del. Du behöver inte förstå i detalj vad koden gör, vi har hela kursen på oss att lära oss det.

1. Det första vi ser är ett filhuvud med kommentarer. Kommentarer är bra. Använd det för att förklara och dela in filerna i delar.

2. Nästa stycke handlar om felhantering och stöd för debugging.

3. Här hanteras inkommande GET variabler. Med hjälp av dessa så minns programmet vilka gissningar som gjorts och vilket ordet är.

4. Här skapas en ordlista i en array.

5. Här är en for-loop och en if-sats för att kontrollera ordet och byta ut '-' mot den rätt gissade bokstaven.

6. Nästa steg är att räkna antalet misslyckade gissningsförsök.

7. Därefter kollar programmet om alla bokstäver är rätt gissade.

8. Sedan kontrolleras om alla gissningarna är använda.

9. Nu skapas formuläret som används för att gissa en ny bokstav och för att skicka med ordet och de bokstäver som redan gissats.

10. Därefter skapas bilden och ritas beroende på antalet felgissade försök.

11. Det sista som sker är att lägga hela xhtml-sidan i en sträng för att sedan skriva ut den.

Sådärja. Hoppas att du nu har en del frågor och låt oss försöka hantera dessa innan kursmomentet är över.

Innan vi börjar med kodandet så behöver vi ställa iordning en labbmiljö och det gör vi genom att installera ett par program som kommer hjälpa oss.


2. Utvecklings- och driftmiljö {#labbmiljo}
--------------------------------------------------------------------

I denna kurs har vi valt att använda en enhetlig labbmiljö, dels för att veta att ni som studenter skall kunna genomföra labbarna oavsett operativsystem och dels för att det skall vara någorlunda smidigt att handleda er och hjälpa till vid problem.

Vi har valt fria programvaror som fungerar på Windows, Unix/Linux och Mac. Om du har alternativa förslag till programvaror så får du gärna tipsa om dem i forumet.

Se till att du har dessa programvaror installerade, om du vill ha hjälp med felsökning så förutsätter vi att du har dessa installerade. Om du av någon anledning väljer att jobba med alternativa program så skall du ändå installera dessa för att kunna använda dem vid felsökning/handledning.

Du måste använda dig av webbläsaren Firefox i de olika kursmomentet. I kursmomenten så använder vi SVG-grafik och stödet för det är inte fullt utbyggd i de olika webbläsarna. Testa gärna andra läsare men använd Firefox om det strular.

Anledningen till att vi valt SVG-grafik är att det är W3C-standard och att det är en kommande teknik som integrerar bra med xhtml och xml (och html5).

Anledningen till att vi valde att göra vissa kursmoment med grafiska inslag är helt enkelt för att göra det lite roligare och mer tilltalande för ögat. Nog sagt om detta.

Vi börjar med att installera de mest grundläggande programmen. Installera nu en ssh-klient (PuTTy/xterm) och en texteditor med stöd för ssh/sftp (jEdit). Du får hjälp i följande dokument.

* Guide för att installera programvaror och komma igång med BTH's labbmiljö  
  <a href='http://dbwebb.se/oophp/install_lab_environment'>http://dbwebb.se/oophp/install_lab_environment</a>

Som du märker så är det en hel del som behövs för att komma igång. Detta är en av utmaningarna med att komma igång och programmera PHP.

[INFO]
**Tips.**

Installera även en egen miljö på din egen dator så blir du inte beroende av  driftsmiljön.

* Installera webbserver:  
  <a href='http://dbwebb.se/kunskap/installera-en-egen-webbserver-for-utveckling'>http://dbwebb.se/kunskap/installera-en-egen-webbserver-for-utveckling</a>

* Flytta filer från den lokala utvecklingsmiljön till driftsmiljön med sftp.  
  <a href='http://dbwebb.se/_/kunskap/flytta-filer-till-driftsmiljon-med-sftp-och-filezilla'>http://dbwebb.se/_/kunskap/flytta-filer-till-driftsmiljon-med-sftp-och-filezilla</a>
  
[/INFO]


3. Hello world i PHP {#hello}
--------------------------------------------------------------------

Äntligen! Första programmeringsövningen i alla programmeringsspråk är ett "Hello World" program. Självklart så måste vi också göra ett sådant.

Gör på följande sätt:

1. Logga in på ssh.student.bth.se med din ssh-klient.
2. Gå till katalogen www och skapa en ny katalog hello.
3. Gå in i den katalogen och skapa en fil som heter hello.php.
4. Editera filen med din editor och skriv in följande kodsnutt:

```php
<?php
echo "Hello World";
?>
```

Peka webbläsaren på: 

* <a href='http://www.student.bth.se/~användarid/hello/hello.php'>http://www.student.bth.se/~användarid/hello/hello.php</a>

Så här såg det ut för mig när jag skapade katalogen och filen.

[FIGURE src=/img/oophp/kmom01/image07.png?w=w1 caption="Skapa katalogen hello och filen hello.php med ssh-klienten."]

Så här såg det ut när jag editerade filen i texteditorn (via sftp).

[FIGURE src=/img/oophp/kmom01/image08.png?w=w1 caption="Editera filen hello.php med editorn via sftp."]

Bra, så långt så väl. Så här blev det dock när jag försökte öppna min fil i en webbläsare.

* <a href='http://www.student.bth.se/~användarid/hello/hello.php'>http://www.student.bth.se/~användarid/hello/hello.php</a>

[FIGURE src=/img/oophp/kmom01/image09.png?w=w1 caption="Felmeddelande, forbidden, när vi försöker öppna vår hello world."]

Problemet beror på filrättigheterna i Unix. Detta kan vi åtgärda genom att ändra filrättigheterna på de kataloger/filer vi nyss skapade. Kommandot heter chmod och rättigheterna skall vara 644 för filer och 755 för kataloger.

[FIGURE src=/img/oophp/kmom01/image01.png?w=w1 caption="Ändra rättigheterna på katalogen hello och filen hello.php."]

Då gör vi reload i webbläseren och violá. Där satt den!

[FIGURE src=/img/oophp/kmom01/image00.png?w=w1 caption="Hello World fungerar i PHP."]

Som du märker så är det inte bara vår PHP-kod som kan krångla. Vi finns i en omgivning som vi måste ta hänsyn till, hantera, kontrollera och felsöka i. Glöm aldrig att läsa felmeddelandena. De ger de bästa tipsen till var problemet ligger.

I PHP manualen finns en sida om "Your first PHP-enabled page". Ta en titt och se om du känner igen dig.

* <a href='http://www.php.net/manual/en/tutorial.firstpage.php'>http://www.php.net/manual/en/tutorial.firstpage.php</a>

Nu har du nu makt över din webbkatalog och kan skapa PHP-sidor. Bra gjort. Låt oss fortsätta.


4. Bra att ha, felmeddelanden, kommentarer och refmanualen {#bra}
--------------------------------------------------------------------

Låt oss ta ett par enkla saker som är bra att ha koll på.


###Felmeddelanden {#fel}

PHP genererar felmeddelanden om problem inträffar, tex om du skriver felaktig kod. Oftast iallafall. Att visa felmeddelanden är en konfigureringssak som går att ställa in i filen `php.ini` som är PHP's konfigurationsfil, eller kan man stänga av/på felmeddelandena i koden.

För att underlätta så se till att du alltid har felmeddelandena påslagna genom att lägga till följande kodrader.

```php
error_reporting(E_ALL);
```

Uppdatera din fil `hello.php` med nedanstående kod. Kör den och se om du får ett felmeddelande liksom jag. Isåfall har du lyckats.

```php
<?php
error_reporting(E_ALL);
echo "Hello World";
echo $i;
?>
```

Så här blir det hos mig.

[FIGURE src=/img/oophp/kmom01/image03.png?w=w1 caption="Hello World med felmeddelande."]

Felmeddelanden är bra, de är ofta korrekta och hjälper oss att finna felet.


###Kommentarer {#kommentarer}

Lär dig kommentera din kod, både bra för att komma ihåg vad man gjorde och visa för någon annan. Kommentarer är också ett lysande felsökningsverktyg då man enkelt kan kommentera bort stora kodstycken för att finna problem. I PHP skrivs kommentarer på nedanstående två sätt.

```php
// ----------------------------------------------------------------------
//
// Två slashar (//) ger kommentar resten av raden.
//
/*
    Allt blir bortkommenterat mellan dessa två start- och slut-tecken.
*/
```

Se till att alltid ha en kommentar i början på varje fil som anger författare. Det är en bra början. Använd också kommentarer som avdelare i texten så att koden blir enklare att läsa.


###Referensmanualen {#refmanualen}

I PHP manualen finns ett kapitel som beskriver PHP som programmeringsspråk. Stycket heter referensmanualen eller "Language reference". Detta är en av våra viktigaste källor till PHP kunskap. I princip så behöver vi inte komma ihåg exakt hur man skriver en `do-while` loop eftersom vi alltid kan slå upp det i manualen. Vad vi behöver lära oss är dock när man kan använda en `do-while` loop och när man kan lösa uppgiften på ett annat sätt. 

Gå nu titta på refmanualen, se vilka delar som du känner igen från det du läst i boken. Bekanta dig med refmanualen. Det kan bli din bästa vän.

* <a href='http://www.php.net/manual/en/langref.php'>http://www.php.net/manual/en/langref.php</a>

Lär dig att hitta i manualen och lär dig använda sökfunktionen.



5. Variabler, strängar och siffror i PHP {#variabler}
--------------------------------------------------------------------

###Ett programmeringsexempel {#programmering}

Låt oss göra ett litet programmeringsexempel i PHP med variabler, strängar och siffror. Läs gärna på lite först.

* <a href='http://www.php.net/manual/en/language.types.string.php'>http://www.php.net/manual/en/language.types.string.php</a>

**Gör ett program enligt följande:**

1. Skapa en ny fil som heter `strings.php`.

2. Skapa 5 strängar strängar, döp dem till `$s1`, `$s2`, osv. Skriv ut dem.
  * <a href='http://php.net/manual/en/language.operators.assignment.php'>http://php.net/manual/en/language.operators.assignment.php</a>

3. Konkatenera (slå ihop) strängarna, spara till en ny variabel `$s6`. Skriv ut `$s6`.
  * <a href='http://php.net/manual/en/language.operators.string.php'>http://php.net/manual/en/language.operators.string.php</a>

```php
$s6 = $s1 . $s2 . $s3 . $s4 . $s5;
echo "Variabel 's6' innehåller " . $s6;
echo "<br />";   // HTML-tecken för ny rad, ger ny rad
```

Testa så att det går att köra programmet i din webbläsare. Glöm inte att sätta på felmeddelanden.

Leta reda på funktionen `strlen()` i refmanualen. Använd sökfunktionen.

* <a href='http://php.net/manual/en/function.strlen.php'>http://php.net/manual/en/function.strlen.php</a>

Använd `strlen()` för att beräkna hur många tecken som finns i `$s6`. Skapa en ny variabel `$t6` och tilldela värdet till den. Skriv ut `$t6`.

Gör samma sak för `$s1`-`$s5`. Beräkna respektive stränglängd och tilldela värdet för respektive sträng till en ny variabel, `$t1`-`$t5`. Skriv ut innehållet i samtliga variabler.

Summera innehållet i `$t1`-`$t5` och tilldela resultatet till en ny variabel `$t15`.

* <a href='http://php.net/manual/en/language.operators.arithmetic.php'>http://php.net/manual/en/language.operators.arithmetic.php</a>

Skriv en `if`-sats som jämför värdet på `$t15` och `$t6`. Om värdet stämmer så skriv ut "YES", annars skriv ut "Ajdå...".

* <a href='http://php.net/manual/en/control-structures.if.php'>http://php.net/manual/en/control-structures.if.php</a>
* <a href='http://php.net/manual/en/language.operators.comparison.php'>http://php.net/manual/en/language.operators.comparison.php</a>

```php
if($t6 == $t15) {
  echo "YES <br />";
}
else {
  echo "Ajdå...<br />";
}
```

Om du känner att du behärskar detta så kan du som extra övning titta på ett alternativ till `if`-sats. Alternativet är mycket bra att använda ibland.

* <a href='http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary'>http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary</a>

Testa så att det går att köra programmet i din webbläsare.
Så här ser det ut för mig.

[FIGURE src=/img/oophp/kmom01/image02.png?w=w1 caption="Källkoden till programmet strings.php."]

Så här ser det ut när jag kör programmet i webbläsaren.

[FIGURE src=/img/oophp/kmom01/image04.png?w=w1 caption="Testkörning av programmet strings.php."]

Sådärja, nu börjar vi komma igång lite mer. Om du känner dig osäker så ägna mer tid i kurslitteraturen enligt läsaanvisningarna, läs PHP's referensmanual och öva, öva, öva. Fråga alltid i forumet om något är oklart.


6. Att strukturera en webbsida med header och footer {#struktur}
--------------------------------------------------------------------

Ju fler webbsidor och PHP-sidor man gör, desto mer förstår man vikten av att strukturera sin kod och sina sidor. Ett enkelt sätt att börja göra detta är att inkludera en header och en footer i varje sida. I headern kan det finnas en meny som man vill skall finnas på samtliga sidor och i footern så vill man ha ett copyright meddelande.

En annan sak är hur man väljer att skriva sina HTML/PHP sidor. Ibland är huvudelen HTML med inslag av PHP och ibland är det huvudsakligen PHP-kod som skrivs. Det finns inget rätt eller fel här. Men eftersom detta är en programmeringsskurs så kommer vi skriva sidorna utifrån ett rent PHP-perspektiv. Detta är något som fortsättningskurserna, efter denna kursen, kommer att bygga vidare på. PHP-fokus alltså.

Låt oss skapa en enkel sid-template som stödjer ovanstående. 

**Gör enligt följande.**

1. Skapa ny fil, `common.php`.

2. I filen skapar vi två sträng-variabler, `$header` och `$footer`. Skriv något intelligent i respektive variabel. Se följande fil som exempel (från Hangman exemplet):  
  * <a href='http://www.student.bth.se/~mos/oophp/mom01/hangman/PListDirectory.php?dir=&file=common.php'>http://www.student.bth.se/~mos/oophp/mom01/hangman/PListDirectory.php?dir=&file=common.php</a>

3. Skapa en ny fil, `template.php`.

4. Filen skall skriva ut en enkel HTML-sida och den skall inkludera header och footer från `common.php`. Du kan ju alltid tjuvkika i filerna från exemplet med Hangman.  
  * <a href='http://php.net/manual/en/function.require-once.php'>http://php.net/manual/en/function.require-once.php</a>

Så här blev det för mig.

[FIGURE src=/img/oophp/kmom01/image10.png?w=w1 caption="Källkod för `common.php`."]

Som du kan se i koden så väljer jag att jobba med strängar enligt HEREDOC. Det ser mycket bättre ut än alla dessa fnuttar (", '). [Läs om HEREDOC i refmanualen](http://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc).

```php
<?php
$str = <<<EOD
Example of string
spanning multiple lines
using heredoc syntax.
EOD;
?>
```

[INFO]
**Kom ihåg!**

Inget skräp efter HEREDOCs sluttecken. Inga tecken, inga mellanslag och inga tabbar.
Dessutom måste sluttagen vara längst till vänster, den får inte vara intabbad.

```php
   EOD;     // FEL
EOD; //Rätt
```
[/INFO]

[FIGURE src=/img/oophp/kmom01/image11.png?w=w1 caption="Källkod för template.php."]

När jag gjorde `template.php` så kopierade jag en del från slutet i denna filen (Hangman exemplet som vi studerade tidigare):

* <a href='http://www.student.bth.se/~mos/oophp/mom01/hangman/PListDirectory.php?dir=&file=PHangman.php'>http://www.student.bth.se/~mos/oophp/mom01/hangman/PListDirectory.php?dir=&file=PHangman.php</a>

Så här ser det ut när jag kör det i webbläsaren.

[FIGURE src=/img/oophp/kmom01/image12.png?w=w1 caption="Så här ser template.php ut i webbläsaren."]

Ajdå, ett felmeddelande. Det beror på att jag redan skrivit ut någon text, innan jag anropar funktionen `header()`. Detta är ett vanligt förekommande problem och ibland svårt att hitta orsaken till. I detta fallet så beror det på att jag har två tomma rader efter sluttaggen i filen `common.php`. Jag raderar dessa rader och violá så fungerar det.

[INFO]
**Kom ihåg!**

Inga tomma rader innanför eller utanför php-taggarna. `<?php` skall alltid vara överst i filen och `?>` skall alltid vara i slutet, inga tomma rader eller space efter sluttaggen.
[/INFO]

[FIGURE src=/img/oophp/kmom01/image13.png?w=w1 caption="Nu fungerar `template.php` som den ska."]

Såja, nu börjar det likna något. Kolla gärna min källkod, det kan underlätta.

* <a href='http://www.student.bth.se/~mos/hello/template.php'>http://www.student.bth.se/~mos/hello/template.php</a>



7. Stjäl med stolthet, visa källkoden {#source}
--------------------------------------------------------------------

Ibland vill man gärna låna någons källkod, ibland vill lärarna se hur studenterna har löst ett visst problem och ibland så vill man få hjälp med felsökning. I dessa fallen så är det bra att kunna ge en länk till ens egen källkod.

Jag råkar ha en sådan fil som gör precis detta. Du har använt den i samband med att du lekte med Hangman och tittade på dess källkod.

Ta nu din egen kopia av den filen så att det i fortsättningen blir enkelt att studera din och varandras källkod. 

**Gör enligt följande.**

1. Skapa en ny fil, `source.php`.

2. Öppna min variant av `source.php` via följande länk (den heter `PListDirectory.php`):
  * <a href='http://www.student.bth.se/~mos/oophp/mom01/hangman/PListDirectory.php?dir=&file=PListDirectory.php'>http://www.student.bth.se/~mos/oophp/mom01/hangman/PListDirectory.php?dir=&file=PListDirectory.php</a>

3. Kopiera alltihop till den egen source.php. Spara.

4. Uppdatera din header så att den visar ett menyval som pekar till "Visa källkoden".

Sådärja, snyggt va? Återanvändning är bra ibland!

* <a href='http://www.student.bth.se/~mos/hello/template.php'>http://www.student.bth.se/~mos/hello/template.php</a>

[FIGURE src=/img/oophp/kmom01/image16.png?w=w1 caption="`common.php`/`template.php` nu uppdaterad med `source.php`."]

Ajdå, det funkade visst inte när jag klickade på en av filerna i "Visa källkod"... Nåja, det beror på en av inställningarna i filen.

[FIGURE src=/img/oophp/kmom01/image17.png?w=w1 caption="Felmeddelande 404, filen `PListDirectory.php` hittas inte..."]

Ta upp filen och titta på rad 30 (se bilden nedan), där defineras en variabel som heter `$HREF`. Byt ut `PListDirectory.php` mot `source.php`. Pröva igen....

[FIGURE src=/img/oophp/kmom01/image18.png?w=w1 caption="Ändra konfigurationen av `PListDirectory.php`."]

Och så testar vi igen. Yes, där satt den.

[FIGURE src=/img/oophp/kmom01/image19.png?w=w1 caption="Nu funkar det som det ska. Härligt."]

Det skadar inte att vi åker på lite felsökning till och från. Det är av felen som vi lär oss. Felen och referensmanualen.

[INFO]
**Tips.**

Den allra senaste versionen av `source.php` hittar du på github. Använd gärna den.

* <a href='https://github.com/mosbth/Utility/blob/master/source.php'>https://github.com/mosbth/Utility/blob/master/source.php</a>

[/INFO]



8. Egen hemsida för redovisning, me-sidan {#mesida}
--------------------------------------------------------------------

Använd nu din `template.php` till att göra en egen liten hemsida om dig själv, din me-sida. Via denna hemsidan så skall du efterhand lägga upp länkar till alla övningar som du gör. I slutet av kursen så skall samtliga övningar och källkod finns tillgängliga via denna sidan.

**Gör så här.**

1. Skapa en ny katalog, `me`.

2. Kopiera filerna `template.php` och `common.php` till katalogen `me`.

3. Gör en ny sida, baserad på din `template.php`, kalla den `redovisning.php`.

4. I sidan `redovisning.php` så skriver du något vackert om hur det var att genomföra detta kursmomentet. Dessutom lägger du med en länk till alla filerna som du jobbat med i kursmomentet (alla filerna ligger i katalogen `hello` va?).

5. Gör en ny sida baserat på din `template.php`, kalla den `hem.php`. Skriv en kort presentation av dig själv i den sidan.

Så här kan det se ut när du är klar. Du behöver inte skriva lika lång presentation som jag gjort...

* <a href='http://www.student.bth.se/~mos/me/hem.php'>http://www.student.bth.se/~mos/me/hem.php</a>

[FIGURE src=/img/oophp/kmom01/image14.png?w=w1 caption="Min variant av hem-sidan, min me-sida."]

Däremot så bör du skriva desto mer och utförligare om varje kursmoment. Skriv mer än vad jag gjort i nedanstående exempel.

* <a href='http://www.student.bth.se/~mos/me/redovisning.php'>http://www.student.bth.se/~mos/me/redovisning.php</a>

[FIGURE src=/img/oophp/kmom01/image15.png?w=w1 caption="Min variant av redovisningssidan."]

Sådärja, då var vi nästan klara.



9. Tankenöt {#tankenot}
--------------------------------------------------------------------

Vi försöker ha någon extra liten tankenöt i slutet av varje övning. Som en liten utmaning. Testa och se om du kan lösa dem. Skriv på din redovisningssida om du löste dem och isåfall hur du gjorde.

###Tankenöt 1 {#tankenot1}

I spelet Hangman så finns det en, kanske flera, möjligheter till att fuska genom att få så många gissningar som möjligt. Detta kan du uppnå utan att ändra källkoden.

* <a href='http://www.student.bth.se/~mos/oophp/mom01/hangman/PHangman.php'>http://www.student.bth.se/~mos/oophp/mom01/hangman/PHangman.php</a>

Kan du komma på hur du kan fuska och få oändligt antal gissningar?

###Tankenöt 2 {#tankenot2}

Kan du lösa dessa två hangman-ord? Försök först, om det inte går så fuska. Berätta hur du fuskade. Allt fusk är tillåtet.

* <a href='http://www.student.bth.se/~mos/oophp/mom01/hangman/PHangman.php?word=8'>http://www.student.bth.se/~mos/oophp/mom01/hangman/PHangman.php?word=8</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom01/hangman/PHangman.php?word=3'>http://www.student.bth.se/~mos/oophp/mom01/hangman/PHangman.php?word=3</a>

Uppdatera din redovisningssida och beskriv hur du löste/inte löste tankenöten.



10. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Fixa nu till din redovisningssida enligt instruktionen nedan och se till att din me-sida ser respektabel ut. Om du har gått [htmlphp-kursen](/htmlphp) så vet du hur du snyggar till det hela.


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.

2. Genomför momentets alla steg.

3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Besvara gärna följande:
  * Kommentera din syn på PHP och programmering i webbmiljö. 
  * Beskriv din egen erfarenhet av programmering och datorer. 
  * Gjorde du tankenöten? Beskriv hur du gjorde den.

4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
