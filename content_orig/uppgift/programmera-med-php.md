---
author:
    - mos
    - Marie
category:
    - kurs webtec
revision:
    "2021-09-10": "(A, mos) Första utgåvan."
...
Programmera med PHP
===================================

Du skall träna dig på grunderna i PHP genom att utföra ett antal mindre programmeringsövningar.

Det handlar om grunder såsom problemlösning och programmering med variabler, if-satser, loopar, arrayer, funktioner och att dela upp koden i olika filer.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har grundläggande kunskap om att programmera med PHP.

Du har PHP i din PATH och kan exekvera kommandot `php` i terminalen.

Du använder PHP 8.0 eller högre.

<!--
example/devtools
Du har installerat en utvecklingsmiljö med validatorer som testkör din kod via statisk kodanalys.
-->



<!--
Genomgång {#genom}
------------------------

Det finns en lektion och genomgång som är tänkt att förbereda dig inför uppgiften.

Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

Uppgifterna löser du genom att skriva kod i filer som du exekverar via terminalen.

Spara alla filerna under `me/php`.

Du skall ha ett main-program och den koden sparar du i filen `main.php`. Main-programmet skriver ut menyn och läser input från användaren och utför sedan en uppgift. När uppgiften är utför återgår menyprogrammet till att vänta på nästa input från användaren.

Lösningen på varje uppgift skall kodas som en funktion med ett bestämt namn. Samtliga funktioner placeras i filen `src/functions.php` som inkluderas i `main.php`. När koden växer blir det troligen fler funktioner som delas upp i olika filer och då är det bra att samla dem i en underkatalog och `src` är ett vanligt namn på en sådan katalog.

Så här kan det se ut när de första menyvalen är implementerade.

[ASCIINEMA src="421936" caption="De första menyvalen är implementerade."]



### Strikta type i PHP {#strict}

Se till att alla dina filer inleds med att använda strikta typer.

```text
<?php

declare(strict_types=1);
```



### Konfigurationsfil och felutskrifter {#error}

Skapa en fil `config.php` och lägg dit följande kod som sätter på felutskrifter. Detta gör att det blir tydligt om något är fel i din kod. När man utvecklar sin kod vill man att dessa felmeddelanden syns. När man har levererat sin kod till "produktionsläge" vill man dock stänga av dem som en säkerhetsåtgärd.

Sätt på felutskrifter i `config.php`.

```php
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", "1");   // Display all errors
```

Se till att denna filen inkluderas som den första filen i din `main.php`. Inkludera denna filen innan du inkluderar `src/functions.php`.



### DocBlock kommentarer {#docblock}

Ovanför varje funktion skall du skriva en DockBlock kommentar och ge en kort introduktion till vad funktionen gör. Dessa kommentarer gör att vi senare kan automatgenerera dokumentation för koden.

Det är mest lämpligt att använda engelska när man skriver kod och kommentarer.

```php
/**
 * Prints details about this program.
 */
function about(): void {
    // some code
}
```

När funktionerna växer kan man även dokumentera inkommande parametrar till funktionen, vad den returnerar och om den kastar exception.



### Utvecklingsmiljö med validatorer {#validate}

Du kan köra statisk kodvalidering för att kontrollera att din PHP-kod stämmer överens med kodstandard och att den inte innehåller någon "skräpig kod".

```text
dbwebb validate php
```

De validatorer som körs är främst för phpcs som är kodstandard och phpmd som upptäcker misstänkt "skräpig kod".

<!--
KRÄVER installationsbeskrivning samt mer tester kring example/devtools.

Du bör sedan tidigare ha installerat en utvecklingsmiljö för PHP under katalogen `me/` där du via composer kan köra verktyg för statisk kodvalidering.

Glöm inte att köra dessa verktyg kontinuerligt.

Denna uppgift skall passera följande verktyg.

* `composer phpcs`
* `composer phpmd`

Du kan köra båda verktygen direkt via `composer test`.

Du måste stå i katalogen `me/` när du kör ovan kommandon.
-->



### Katalogstruktur {#struktur}

Så här ser din katalogstruktur ut i `me/php` när du är redo att börja.

```text
$ tree .
.
├── config.php
├── main.php
└── src
    └── functions.php

1 directory, 3 files
```

Kommandot tree kan du installera med din pakethanterare.

```text
# Cygwin
apt-cyg install tree

# Mac
brew install tree

# Linux, WSL
apt install tree
aptget install tree
```

Du kan dubbelkolla att grundstrukturen är korrekt genom att köra kommandot `dbwebb test php`.



### Mall till main.php {#mall}

Om du har löst kraven enligt ovan så har du en grov mall till din `main.php` som inleds så här.

```text
<?php

declare(strict_types=1);

require "config.php";
require "src/functions.php";

echo "Ready to begin some hard coding...";
```

Provkör ditt main-program så du vet att grundstrukturen är på plats.

```text
php main.php
```



Uppgift 1: Ett menydrivet program i terminalen {#u1}
-----------------------

Skapa grunden för ditt menydrivna program. Följande menyval skall finnas.

```
1) Skriv ut detaljer om programmet
Q) Avsluta
```

Om användaren skriver in `1` så skall programmet skriva ut en kort beskrivning av programmet samt vem som skrivit det. Koden för att utföra utskriften skall skrivas i en funktion `about()`.

Om användaren skriver in `q` eller `Q` så skall programmet avslutas via funktionen `exitProgram()` samt skriva ut ett avslutningsmeddelande.

När programmet startar skall du skriva ut en välkomsttext och en ascii-bild (välj själv motiv på bilden).

Om användaren skriver in ett val som inte finns så anropas en funktion `notValidChoice()` som skriver ut ett meddelande att det var ett felaktigt menyval.

Alla funktioner placeras i filen `src/functions.php`.

När det valda menyvalet är utfört så visas menyn och ascii-bilden igen.

För tips, leta i manualen.

* [`readline()`](https://www.php.net/manual/en/function.readline.php)
* [`require()`](https://www.php.net/manual/en/function.require.php)



Uppgift 2: Detaljer om din PHP installation {#u2}
-----------------------

Om du i uppgift 1 använde if-sats för att anropa rätt funktion för menyvalen `main.php`, så byt ut din if-sats till en switch-sats eller varför inte en match().

Lägg till menyvalet "2) Detaljer om PHP" som gör enligt följande.

* Skriv ut versionen av PHP.
* Skriv ut vilket operativsystem som ligger i botten av PHP-installationen.
* Sökväg till PHP binären.
* Visa värdet för konfigurationen av `display_errors` via `ini_get()`.
* Visa värdet för konfigurationen av `display_startup_errors` via `ini_get()`.

Döp funktionen till `printPhpVersion()`.

För tips, leta i manualen.

* [Predefined Constants](https://www.php.net/manual/en/reserved.constants.php)
* [`ini_get()`](https://www.php.net/manual/en/function.ini-get.php)



Uppgift 3: Tid och datum {#u3}
-----------------------

Företaget "Bäst Reklam" har en reklamkampanj, som startades upp i 1:e mars i år och ska lanseras på lucia den 13:e december samma år (Svensk tid). Företaget har ett litet kontor på Manhattan i New York och huvudkontoret i Karlskrona. Personalen är svensktalande men de ringer till varandra på konstiga tider. För att slippa väcka varandra i onödan, så vill VD:n att de anställda möts av följande välkomstmeddelande när de loggar in.  

Lägg till menyvalet "3) Tid och datum" som ger följande utskrift.

OBS! Aktuell tid ska vara dagens datum, använd date() och glöm inte att sätta tidzonerna innan.

[FIGURE src=/img/webtec/php/uppgift3.png?w=c5]

Döp funktionen till `printTimeAndDate()`. Tips: Antal dagar kvar på kampanjen kommer att variera beroende på dagens datum. Hur många sekunder går det på en dag?

För tips, leta i manualen.

* [DateTime::format (date_format)](https://www.php.net/manual/en/datetime.format.php)
* [strtotime](https://www.php.net/manual/en/function.strtotime)
* [round](https://www.php.net/manual/en/function.round)



Uppgift 4: Stränghantering {#u4}
-----------------------

Prorektor Eva Pettersson hälsade nya studenter välkomna till BTH på introduktionsveckan. Men när webbansvarig skrev in det på webbsidan, så blev det lite fel. Hjälp till att rätta strängen genom att göra ett enkelt rättstavningsprogram!

`$faultyStr = "      ”Varmt välkommen till BTX och till första dagen på dina studier hos oss”. Men dessa ord hälsade prorektor Eva Pettersson alla nya STUDENTER välkomna.";`

Lägg till menyvalet "4. Stränghantering" som ger följande utskrift.

[FIGURE src=/img/webtec/php/uppgift4.png?w=c5]

Döp funktionen till `printString()`. Kopiera ovanstående variabeldeklaration inklusive dubbelfnuttarna och semikolon. Använd de inbyggda funktionerna i php för att ändra i strängen.

Tips: skriv ut strängen för varje rättning du gör när du jobbar med strängen för att se om det blir som du tänkt dig. Dessa kontrollutskrifter tar du bort när du färdig sen. OBS! Det är fyra fel i strängen; bland annat inledande mellanslag. Hur löser du det problemet med kommandona nedan?

För tips, leta i manualen.

* [strlen()](https://www.php.net/manual/en/function.strlen)
* [strpos()](https://www.php.net/manual/en/function.strpos.php)
* [trim()](https://www.php.net/manual/en/function.trim.php)
* [str_replace()](https://www.php.net/manual/en/function.str-replace.php)
* [str_word_count()](https://www.php.net/manual/en/function.str-word-count)



Uppgift 5: Arrayer med siffror {#u5}
-----------------------

Nedskräpningen på tre badstränder i Lomma, Vellinge och Svedala mättes sommaren 2020. Det som skiljer sig mest i mätningarna mot andra miljöer är att nedskräpningen av plast är så hög på stränderna. Skräpmätningen görs på samma yta av stranden varje dag i minst sju veckor.
Se resultatet:

[FIGURE src=/img/webtec/php/chartLitteringBeach.png?w=c5]

Lägg in siffrorna från tabellen i en array som decimaltal med punkt utan procenttecknet.

Lägg till menyvalet "5) Arrayer med siffror" som ger följande utskrift.

[FIGURE src=/img/webtec/php/uppgift5.png?w=c5]

Döp funktionen till `printNumberArrays()`.

För tips, leta i manualen.

* [array_sum()](https://www.php.net/manual/en/function.array-sum.php)
* [round()](https://www.php.net/manual/en/function.round.php)
* [array_shift()](https://www.php.net/manual/en/function.array-shift.php)
* [array_push()](https://www.php.net/manual/en/function.array-push.php)
* [Sorting Arrays](https://www.php.net/manual/en/array.sorting.php)



Uppgift 6: Arrayer med strängar {#u6}
-----------------------

32,6% av nedskräpningen på stränderna var cigarettfimpar medan den är uppmätt till 64.5% i tätort, 49.9% i förort och 43.4% i parkmiljö. Det tar cirka 1-5 år för naturen att sönderdela en cigarettfimp till mikroplast (fimpens filter innehåller plast). Mikroplast kan ta 100 år innan den försvinner, om den ens gör det. Allt enligt "Håll Sverige rent".

Ta reda på vad nedskräpningen på stränderna beror på, till exempel att 32.6% är cigarettfimpar. Återanvänd arrayen med siffrorna från uppgift 5. Kopiera strängen nedan och lägg i en ny array med orsaken. Iterera över en av arrayerna med en for-loop för att skapa första utskriften.

`"Cigarettfimp Snusprilla Annat Glas Metall Organiskt Papper/kartong Plast"`

Skapa sedan en key/value array med orsaken som key och procenten som value med hjälp av dina två arrayer. Kopiera strängen nedan till din funktion och bygg ihop en key/value array. För att se om din key/value array fungerar så kollar vi om key "Cigarettfimp" finns i den. Använd därefter en foreach-sats för att skriva ut innehållet i din sorterade key/value array.

Lägg till menyvalet "6) Arrayer med strängar" som ger följande utskrift.

[FIGURE src=/img/webtec/php/uppgift6.png?w=c5]

Döp funktionen till `printStringArrays()`. Tips: Vad är skillnaden på sort() och asort()? Vad menas med associativ sorting?

För tips, leta i manualen.

* [explode()](https://www.php.net/manual/en/function.explode.php)
* [array_combine()](https://www.php.net/manual/en/function.array-combine)
* [array_key_exists()](https://www.php.net/manual/en/function.array-key-exists)



Extrauppgift: Fibonaccitalföljd {#u11}
-----------------------

Skapa en funktion som använder Fibonaccital. De ser ut så här 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55 etc. Där varje tal är summan av de två föregående talen.

Lägg till menyvalet "A) Fibonacci".

* Skriv ut talföljden upp till och med 55
* Skriv ut summan av alla udda Fibonaccital under 1.000.000 på en ny rad.

Döp funktionen till `fibonacci()`.

Tips: Summan blir 1089154.

Fibonaccitalföljder kan starta antingen på 0 eller 1. Ryktet säger att Fibonacci själv började på 1. Vill du läsa mer om Fibonaccital, se [här](https://sv.wikipedia.org/wiki/Fibonaccital).



Extrauppgift: Password  {#u12}
---------------------

Hitta tre hashade lösenord!

För att komma ihåg sitt lösenord så har hemlige Arne skrivit upp det. Han är dock lurig och har skrivit upp det blandat med falska lösenord. Eftersom han blev hackad av Trazan och Banarne förra året så har han "hashat" lösenordet på tre olika sätt, för att göra det svårare att hacka för dem att hacka honom igen. Du kanske kan hacka lösenordet!

Ett exempel på md5 hash på lösenordet:

```text
# $pwd = md5("Hello2world!");
# echo $pwd;
# 025cfbe826280df9815be962cc272b2c
```

Enligt Myndigheten för samhällskydd och beredskap, så är md5 inte tillräckligt bra för att hasha lösenord. Det beror på att dagens datorer med ett modern grafikkort kan generera 7 miljarder MD5 förslag per sekund.

Hemliga Arnes lösenord och hans lista med hashade lösenord:

```text
$password = "Hello2world!";
$hashArray = ['Uryyb3jbeyq!', 'Uryyb2ibeyq!', 'Uryyb2jbey!', 'Uryyb2jbeyq!', 'Uryyb2jbeyg!',
    '$2y$10$Nl1KcQWR.saeHZryyy4FueawpZqoyx.eXVglabfekJNecrdvULy/K',
    '$2y$1O$Nl1KcQWR.saeHZryyy4FueawpZqoyx.eXVglabfekJNecrdvULy/K',
    '$2y$10$Nl1KcQWR.saeHZryyy4FueawpZqoyx.eXVqlabfekJNecrdvULy/K',
    '$2y$10$.tCflgh5pOcG/HVf.QsXguTUkelucRBg0CGUpRhxtrBW4ZhsK6tKu',
    '$2y$10$.tCflgh5pDcG/HVf.QsXguTUkeluoRBg0CGUpRhxtrBW4ZhsK6tKu',
    '$2y$10$.tCflgh5pDcG/HVf.QsXguTUkelucRBg0CGUpRhxtrBW4ZhsK6tKu'];
```

Försök hitta hans hashade lösenord i listan. Det finns med tre gånger med tre olika hashmetoder.

Lägg till menyvalet "B) Password" som skriver ut summan av de tre positionerna i `$hashArray` ovan.

Döp funktionen till `printPassword()`. Kopiera variablerna ovan till din funktion. Du har rätt svar om svaret är samma som precis myndig och får ta körkort.

För tips, leta i manualen.

* [`password_hash()`](https://www.php.net/manual/en/function.password-hash)
* [`str_rot13()`](https://www.php.net/manual/en/function.str-rot13)

För mer information, besök Myndigheten för samhällskydd och beredskap.

* [`MSB`](https://www.cert.se/2013/03/hasha-losenord-ratt-aterkomsten)



Extrauppgift: Filhantering {#u13}
-----------------------

Det finns två filer under katalogen files; sherlock.txt och serialized.txt.

Kopiera filerna med kommandot `cp`, så här.

```text
# Stå i `me/php`
cp ../../example/php/examples/*.txt .
```

Titta på innehållet i filerna.

<!-- Gör ett nytt program som gör följande.

* Kolla om filen `$file1` finns. Skriv ut "Filen sherlock.txt finns.". Använd print() och $file1 i strängen du skriver ut.
* Läs innehållet i sherlock.txt och lägg i en sträng. Skriv ut strängen.
* Läs innehållet i sherlock.txt från tecken 12 och 20 tecken framåt och lägg informationen i en sträng. Skriv ner strängen på en ny fil `test.txt` och skriv ut innehållet i filen `test.txt`.
* Gör unserialize på filen `$file2` (serialized.txt) och skriv ut innehållet. -->

Lägg till menyvalet "C) Filhantering" som ger följande utskrift.

[FIGURE src=/img/webtec/php/uppgift13.png?w=c5]

Döp funktionen till `printFile())`. Skapa två variabler i din funktion med filnamnen i och kalla dem `$file1` och `$file2`. Tips: Läs innehållet i sherlock.txt från tecken 17 och 15 tecken framåt och skriv ner i en ny fil `test.txt` och skriv ut innehållet i filen `test.txt`.

För tips, leta i manualen.

* [file_get_contents()](https://www.php.net/manual/en/function.file-get-contents)
* [serialize()](https://www.php.net/manual/en/function.serialize.php)



<!-- Extrauppgift: datum och tid  {#u14}
---------------------

Gör ett nytt program som gör följande.

* Skapa ett DateTime objekt med dagens datum och skriv ut det på formatet "år-månad-dag timmar:minuter:sekunder".
* Vilken metod används för att sätta en tidszon? Skriv ut det.
* Skapa ett DateTime objekt med ett gammalt datum "2021-05-12 11:15:17", ta bort 2 månader och lägg till 3 timmar. Skriv ut resultatet.

Döp programmet till `printDateTime()`.

För tips, leta i manualen.

* [`DateTime()`](https://www.php.net/manual/en/class.datetime.php) -->



<!-- Extrauppgift : Riskornen på schackbrädet {#u15}
-----------------------

Känner du till problemet "Riskornen på schackbrädet" (‘chessboard and rice grain problem’ på engelska)?

Tänk dig ett vanligt schackbräde och lägg ett riskorn på den första rutan. Sedan lägger du två riskorn på andra rutan, och därefter en fördubbling på varje ruta, det vill säga, fyra på tredje åtta på fjärde och så vidare. Hur många riskorn ligger det på schackbrädet när samtliga rutor fyllts med riskorn?

Lägg till menyvalet "C. Riskornen på schackbrädet" som gör följande.

* Skriv ut antalet riskorn. Lägg märke till att php inte är bra på att hantera stora tal.

Tips: Tänk 1 + 2*1 + .... etc. -->



Redovisning {#redovisa}
-----------------------

Besvara följande frågor i din redovisningstext.

* Berätta hur det gick att lösa uppgiften, var något extra svårt, lurigt, krångligt eller flöt det på smidigt?
* Är det något som du är extra nöjd med i ditt resultat från uppgifterna?



Publicera {#publicera}
-----------------------

Avsluta uppgiften så här.

<!--
1. Testa att din kod validerar genom att ställa dig i katalogen `me/` och köra dem via `composer test`.
-->

1. Kontrollera att din kod validerar med `dbwebb validate php`.

1. Testa ditt resultat så att det passera de automatiska testerna med `dbwebb test php`.

1. När du är klar kan du publicera resultatet med `dbwebb publish php`.
