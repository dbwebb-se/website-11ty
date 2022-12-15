---
author: mos
category:
    - kurs mvc
revision:
    "2021-03-29": "(B, mos) Lade till not om composer dump."
    "2021-03-22": "(A, mos) Första utgåvan."
...
Objektorientering med klasser i PHP
===================================

Du skall skapa ett antal klasser i PHP. Dessa klasser skall du sedan använda i ett par webbsidor och visa upp att de fungerar.

Du använder namespace i dina klasser.

Dina webbsidor placerar du bakom en frontcontroller och du lägger till en "snygg ram" med header, footer och navigering på sidorna.

Du använder vyer för att rendera webbsidorna och som vyspråk kan du använda ren PHP eller så använder du ett vy-lib.

Eventuella externa moduler installeras med composer och du använder dig av composers autoloader.

Webbplatsen publiceras på studentservern.

Du samlar allt i ett Git-repo som du publicerar på en tjänst likt GitHub/GitLab.

Ditt repo innehåller en Makefile som kan användas för att linta din kod. Linters installeras med composer.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du kan PHP.

Du vet hur man bygger en webbplats och du har koll på GET, POST och SESSION samt vyer.

Du har PHP i din path i terminalen och du har installerat composer.

Du kan grunderna i Git och webbtjänster likt GitHub/GitLab.

Du kan en del allmänt om problemlösning och programmering och vet grunderna i hur du tar reda på svar. Glöm inte att formulera din fråga, svaret är då lättare att finna. [Fråga ankan](kurser/faq/lararstod-och-handledning#anka), det kan hjälpa.



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.



### Spara filerna i me {#me}

Alla filerna sparar du i ditt kursrepo under `me/game/`.

Alla referenser till filer och kataloger du nu skall skapa förutsätter att de ligger under denna katalogen.



### Gör ett Git repo {#git}

Gör ett git-repo av katalogen.

```text
git init
touch README.md
git add .
git commit -m "First commit"
```

Du har nu ett git-repo. Vill du lära dig mer om Git kan du läsa mer i "[Work with Git](https://dbwebb-se.github.io/mvc/work-with-git)" som ger dig en snabb introduktion till de vanligaste kommandona i Git.



### GitHub/GitLab {#github}

Ladda upp ditt repo till en webbtjänst likt GitHub eller GitLab (eller motsvarande).

Det mest lämpliga är att använda SSH-nycklar för att identifiera dig, det blir så mycket enklare än HTTPS där du behöver skriva lösenord varje gång du laddar upp repot.



### Webbapplikation med frontcontroller {#frontc}

Du skall bygga en webbapplikation som fungerar lokalt och på studentservern.

Skapa en underkatalog `htdocs/` där du placerar de filerna som är din så kallade webb root.

Det finns ett kodexempel i kursrepot under [`example/game/frontcontroller/`](https://github.com/dbwebb-se/mvc/tree/main/example/game/frontcontroller) som du kan/bör utgå ifrån. Det ger din en snabb start in i uppgiften med en enklare bas av en frontcontroller och en `.htaccess` som fungerar både lokalt och på studentservern samt de kodvalideringsverktyg som är nödvändiga.

Du kan komma igång snabbt så här.

```text
# Stå i roten av kursrepot

# Börja kopiera kodbasen
rsync -av example/game/frontcontroller/ me/game/

# Installera en autoloader via composer
cd me/game
composer install --no-dev
```

Nu kan du öppna din webbläsare till katalogen `me/game/htdocs` och du bör se en enklare webbsida.

Det kan vara läge att bekanta sig med kodbasen. Tanken är att du skall stoppa in din egen kod i den.

Här är en kort översikt av katalogstrukturen.

| Katalog   | Beskrivning |
|-----------|-------------|
| `config/` | Här kan du spara alla dina konfigurationsfiler. |
| `htdocs/` | Webbrooten med den publika delen för webbplatsen och frontcontrollern som tar alla requester till webbplatsen. |
| `src/`    | Källkodsfiler för PHP, organiserade i katalogstruktur enligt namespace. |
| `view/`   | Template- och layout-filer för vyer och rendering av webbsidor. |



#### Alternativ för kodbasen {#alt}

Du _kan_ även skriva din kodbas helt från ett tomt blad, eller gå direkt på att använda ett ramverk. Du behöver inte använda alla delar i den föreslagna kodbasen, men...

Men, den breda och rekommenderade vägen är att utgå från mallen och sedan justera den efter ditt eget tycke när du väl har kommit igång. Vi kommer att blanda in ramverk senare i kursen så det blir tid att skriva om denna inledande kod så att den passar in i ett ramverk.

I denna inledande uppgift handlar det mest om att skriva och använda klasser i PHP. I kommande uppgifter så kikar vi mer på den delen som berör ramverket.

Här är ett längre inlägg om [varför man bör utgå från den givna mallen](https://github.com/dbwebb-se/mvc/issues/2), iallafall inledningsvis i kursen.



#### CSS {#css}

Du väljer själv hur du vill jobba med stylesheeten och CSS/LESS/SASS och eventuella ramverk eller ej.



#### Javascript {#js}

Du väljer själv om du vill komplettera med JavaScript eller ej på klientsidan. Det är dock inget som krävs för att lösa uppgifterna i kursen.



### Publicera studentservern {#publicera}

Du kan nu publicera till studentservern.

Innan du gör det så behöver du ändra sökvägarna i `htdocs/.htaccess`, annars får du 404 på länkar. Läs kommentaren överst i filen och gör som det står där.

Publicera sedan till studentservern för att se att allt fungerar.

Första gången kan du publicera hela me-katalogen.

```text
dbwebb publishpure me
```

Sedan räcker det att enbart publicera en specifik katalog.

```text
dbwebb publishpure game
```



### Make {#make}

Dubbelkolla att du har Make installerat och att det fungerar.

```text
which make
make --version
```

Du kan nu köra kommandot överst i din katalog där du har filen `Makefile`. I filen Makefile finns ett antal targets som kan utföras. När du enbart kör kommandot `make` så kommer dess första _target_ att exekveras.

```text
make
```
Ett target är en samling kommandon som exekveras. Man kan kedja så att ett target exekverar ett eller flera targets.

Öppna filen Makefile i en texteditor och studera dess innehåll.

Installera nu en lokal utvecklingsmiljö i repot.

```text
make install
```

Du kan nu testa vilken version av olika verktyg som är installerade lokalt som en utvecklingmiljö för ditt repo.

```text
make check-version
```

Du kan testköra testsviten som finns, om det nu finns några tester att köra.

```text
make test
```

Du kommer använda kommandot make för att jobba med dina enhetstester, längre fram i kursen.



### Linters {#linters}

När du gör `make install` så installeras en lokal utvecklingsmiljö i repot. Det är bra så att du slipper "skräpa ned" din lokala dator med installation av dessa verktyg.

I exemplet `example/game/frontcontroller/` finns ett antal linters inkluderade och de skall användas igenom hela kursen som ett sätt att kvalitetssäkra din kod.

Här är en kort översikt av några av de viktigaste linters som är inkluderade.

| Verktyg   | Make target | Beskrivning |
|-----------|-------------|-------------|
| `phpcs`   | `make phpcs` | Validera kodstilen enligt en kodstandard. |
| `phpcbf`  | `make phpcbf` | Automaträtta de fel som phpcs anger. |
| `phpcpd`  | `make phpcpd` | Copy and paste detector, hittar kod som är duplicerad. |
| `phpmd`   | `make phpmd` | Mess detector för att finna delar i din kod som kan förbättras. |
| `phpstan` | `make phpstan` | Ytterligare en mess detector för att finna delar i din kod som kan förbättras. |
| `phploc`  | `make phploc` | Visa mätvärden och statistik för din kod (metrics). |

Du skall köra `make test` och då körs de linters som är aktuella. De felmeddelanden och varningar som du får är rekommendationer till att förbättra din kod.

Det blir inte underkänt om du har ett stort antal varningar, men du bygger bättre och snyggare kod med högra kvalitet ju färre varningar du visar upp. Så är det.



### Namespace och autoloader {#namespace}

Kodbasen använder composers autoloader för att sköta laddning av klassfiler.

Du skall lägga till ditt eget vendornamn i `composer.json` och sedan använda det som utgångspunkt för din egen kod.

Denna del ser nu ut så här i kodbasen.

```text
"autoload": {
    "psr-4": {
        "Mos\\": "src/"
        "Dbwebb\\": "src/"
    },
    "files": [
        "src/functions.php"
    ]
},
```

Vendornamnet `Mos\` är det som jag använt för exempelkoden. Låt det vara kvar.

Vendornamnet `Dbwebb\` är ytterligare ett exempel på vendornamn. Det kan du byta ut till ditt eget. Ett vendornamn är en koppling till dig själv (eller organisationen/företaget) som skapar koden.

Använd gärna ett namn som inte redan finns i [paketdatabasen Packagist](https://packagist.org/). Om du är osäker kan du tex använda din studentakronym eller ditt användarid på GitHub/GitLab.

När du placerar ett vendornamn i `composer.json` så sker en koppling mellan namnet och var dess källkod placeras.

Du måste generera en ny autoloader varje gång du uppdaterar din `composer.json`, det gör du med följande kommando.

```
# Uppdatera composers generereade autoloader filer
composer dump
```

När du anger ett namespace i en fil så måste små och stora bokstäver i dess namespace matcha exakt den sökväg där filen ligger.

Som ett exempel kan du se följande.

```text
# Namespace för en klass
namespace Mos\Router;
class Router {}
```

Följande stämmer nu.

* Klassens namepace blir alltså `Mos\Router\Router`.
* Vendornamn `Mos\` pekar ut katalogen `src/`.
* Klassens källkod ligger i filen `src/Router/Router.php`.



### Docker {#docker}

Detta stycket är överkurs och utanför kursens omfång. Detta förutsätter att du har kommandon för docker och docker-compose installerade på din dator.

Det finns en fil `docker-compose.yaml` som underlättar om du vill köra webbplatsen i en docker-container.

```text
# Starta php/apache i en kontainer
docker-compose up apache

# Kör bash i en kontainer
docker-compose run php bash
```



Krav {#krav}
-----------------------

Kraven är uppdelade i sektioner.



### Struktur {#ordning}

1. Din källkod placerar du i `src/`.

1. Dina vyer placerar du i `view/`.

1. I den mån du använder konfigurationsfiler så placerar du dem under `config/`.

1. Det finns ingen anledning att lägga till "webbsidor" direkt i `htdocs/`, allt hanteras via din frontcontroller.

1. Om du lägger till andra paket med composer så måste de finnas med i din `composer.json`.

1. Du behöver ha en Makefile som stödjer `make install` och `make test` på det viset som den bifogade Makefilen gör.

1. Lägg till en README.md till ditt repo och skriv något representativt i den. I slutändan bör den innehålla dokumentationen av ditt repo.

1. Du skall skapa och använda ett eget namespace för din kod samt uppdatera så att ditt namespace fungerar i composers autoloader.



### Klasser {#klasser}

Under ditt eget namespace, skapa följande efter bästa förmåga.

1. Skapa en klass `Dice`.

    1. Man skall kunna slå/kasta/rulla tärningen.
    1. Man skall kunna hämta senaste slaget.
    1. Det skall vara konfigurerbart hur många sidor tärningen har.

1. Skapa en klass `GraphicalDice`.

    1. Den kan göra allt som `Dice` kan plus att den även kan ha en grafisk representation som visar upp en tärning.
    1. Denna tärning skall ha 6 sidor.

1. Skapa en klass `DiceHand` som kan innehålla ett antal tärningar.

    1. Man kan konfigurera objektet hur många tärningar det skall innehålla.
    1. Man kan rulla alla tärningar på en gång.
    1. Man kan hämta värdena på de rullade tärningarna.



### Spel {#spel}

1. Använd ovan klasser för att skapa en webbsida där man kan spela 21 mot datorn.

1. Man skall kunna välja om man vill spela med en eller två tärningar.

1. Man kastar tärningarna och får ett resultat. Därefter kan man kasta igen för att få mer poäng. Man skall komma så närma 21 som möjligt.

1. När spelaren är nöjd så kan den "stanna".

1. Om spelaren får 21 skall du notera ett stort "Grattis!".

1. Om spelaren får över 21 så har den förlorat.

1. Därefter är det datorns tur. För att göra det enkelt kan du låta datorn slå tills den vunnit eller tills den får över 21. Datorn vinner vid lika.

1. När datorn slagit sina slag så visar du vem som vann denna rundan.

1. Spara undan ställningen i antal rundor, vem som vunnit, spelaren eller datorn. Det skall finnas en möjlighet att nollställa poängställningen.

1. Se till att man når ditt spel via en länk "Game 21" i navbaren för din webbsida.

1. Som ren överkurs kan du välja att implementera att du kan satsa "bitcoins" i varje spelrunda. Spelaren kan börja med 10 bitcoins och man kan satsa max 50% av sina bitcoins per spel. Banken (datorn) kan ha 100 bitcoins när du börjar. Klarar du av att vinna alla pengarna från banken?



### Publicera {#publicera}

1. När du är klar, kör `make test` för att köra alla testerna mot ditt repo. När man kör `make test` så bör det passera utan allvarliga felmeddelanden.

1. Dubbelkolla att webbplatsen fungerar på studentservern genom att göra en `dbwebb publishpure me` och testköra den.

1. Committa alla filer till ditt repo och lägg till en ny tagg (1.0.\*). Öka versionnumret om du lägger till ändringar (1.0.1, 1.0.2 och så vidare). Rättaren kommer normalt sett att använda din senaste tagg som är >= 1.0.0 och < 2.0.0.

1. Pusha upp repot till GitHub/GitLab, inklusive taggarna.



<!--
Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

1. Snygga till din me-sida lite extra med style. Det är alltid trevliga om det ser snyggt och ordningsamt ut.

1. Skapa egna testsidor för att leka runt med olika konstruktioner. Det kan vara bra att ha.
-->



Tips från coachen {#tips}
-----------------------

Gör små commits och committa ofta, när du väl har din bas. Använd tydliga committ-meddelanden så att historiken ser bra ut.

Lycka till och hojta till i chatt och forum om du behöver hjälp!
