---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1
revision:
    "2017-08-08": "(A, mos) Första utgåvan."
...
En REM Server som Kontroller och Modell
==================================

[FIGURE src=image/snapht17/remserver-docs.png?w=c5&cf&a=0,70,70,0 class="right"]

Vi studerar ett exempel av en REM Server som är byggd i Anax. Större delen av koden ligger i samma fil där routerna skapas och vi tittar på hur koden kan struktureras genom att jobba med kontroller och modeller i MVC.

Det blir en övning i refactoring av kod som skrivs om på ett mer strukturerat sätt vilket i längden blir enklare att underhålla, vidareutveckla och enhetstesta.

<!--more-->

Vi kommer utgå från färdiga kodexempel som du kan studera. Ta det lugnt och fundera under övningens gång på vilka filer vi jobbar med och var kritisk och fundera på vilka sätt till kodstruktur som är bra och mindre bra.

När du är klar med artikeln så är du redo att skapa egna kontroller och modeller i Anax.



Förutsättning {#pre}
--------------------------------------

Du har jobbat igenom artikeln "[Bygg ett ramverkslöst ramverk](kunskap/bygg-ett-ramverkslost-ramverk)".

I artikeln förutsätts att du stannar upp med jämna mellanrum, försöker analysera och efter bästa förmåga förstå koden som behandlas och sätter dig in i den refaktorisering som gjordes när koden flyttade från routerna till kontroller och modell.

Det är fritt fram att uppdatera koden som används.



Glöm inte `.htaccess` {#htaccess}
--------------------------------------

Glöm inte att redigera din `.htaccess` när du publicerar till studentservern.



En REM server {#rem}
--------------------------------------

Tanken är att komma igång med kodstruktur enligt kontroller och modell i MVC. Vi gör detta genom att studera och använda kod ifrån en REM server. Vi skall strax se vad en REM server är.

Vi börjar med att installera och testköra en REM server som är byggd i Anax. Därefter lyfter vi ut de koddelar som är kopplade till REM servern och implementerar i vår egen me-sida som vi tidigare byggt med Anax.

Den första koden vi ser kommer att ha störst kodmassa direkt i routerna. Därefter tittar vi på en variant som flyttat kodmassan till en kontroller och en modell. När det är klart kan vi fundera på om det blev bättre.

Låt oss först hämta en REM server och bekanta oss med den. Vi använder servern vi hittar i GitHub repot [`dbwebb-se/remserver`](https://github.com/dbwebb-se/remserver/).

```bash
# Gå till kursrepot
cd me/kmom02
git clone https://github.com/dbwebb-se/remserver.git
cd remserver
make update
```

Nu kan du peka din webbläsare mot `remserver/htdocs` för att läsa manualen för REM servern.

[FIGURE src=image/snapht17/remserver-docs.png?w=w2 caption="Manualen för REM servern som också visar att REM servern är installerad och fungerar."]

Du kan nu pröva att skicka REST förfrågningar till REM servern.

[FIGURE src=image/snapht17/remserver-rest-client.png?w=w2 caption="En REST fråga till REM servern."]

Bra, då har vi en fungerande REM server och en kodbas vi kan utgå ifrån.



Installera en tom Anax {#tom}
--------------------------------------

När jag jobbar i denna artikeln vill jag ha en tom webbplats att leka med så jag använder kommandot `anax` för att scaffolda en sådan.

```bash
# Gå till kursrepot
cd me/kmom02/
anax create anax2/ ramverk1-me
```

Du får troligen fel eftersom katalogen `anax2/` redan finns, men den är ju tom från början så du kan lugnt lägga till flaggan `--force, -f` för att skriva till katalogen. Om det ligger några filer i katalogen så ligger de kvar eller skrivs över.

```bash
anax create anax2/ ramverk1-me --force
```

Öpnna din webbläsare mot `me/kmom02/anax2/htdocs` för att kontrollera att webbplatsen fungerar.

[FIGURE src=image/snapht17/remserver-anax-empty.png?w=w2 caption="Nu fungerar grundstrukturen i den scaffoldade webbplatsen."]

Bra, det ser ut att fungera.



En nedmonterad REM server {#remmont}
--------------------------------------

Låt se om vi kan plocka de centrala delarna från REM servern och integrera i vår egen server, den tomma webbplatsen vi precis skapade. Tanken är att vi skall ha kod att studera och jobba med, kod som kan göras refactoring på.

Här är det bra att öppna en texteditor för att studera koden som finns i REM servern. Låt mig guida dig igenom de centrala delarna.



###Manualsidan {#manualsidan}

Manualsidan ligger som Markdown i `content/index.md`. Den kan vi kopiera till vår egen webbplats och lägga i `content/markdown/index.md`.

```bash
# Gå till kursrepot
cd me/kmom02
install -d anax2/content/remserver/
cp remserver/content/index.md anax2/content/remserver/
```

Dubbelkolla att du i webbläsaren kan komma åt din egen version via länken som slutar med `me/kmom02/anax2/htdocs/remserver`.

Det kan även behövas en stylesheet för att det skall se bra ut. Du kan kopiera den och lägga till den i din klass `App`.

```bash
cp remserver/htdocs/css/style.css anax2/htdocs/css/remserver.css
```

Sedan ändrar du så att App::renderPage() innehåller en rad i stil med följande.

```php
    //$data["stylesheets"] = ["css/style.css"];
    $data["stylesheets"] = [
        "css/style.css",
        "css/remserver.css"
    ];
```

När du är klar för du kunna ladda om sidan och se manualen för REM servern inklusive dess stylesheet.


###Datafil {#datafil}

I katalogen `config/remserver/` ligger en datafil som servern behöver. Vi kopierar över den.

```bash
rsync -av remserver/config/remserver anax2/config/
tree anax2/config/remserver
anax2/config/remserver
├── README.md
└── users.json

0 directories, 2 files
```

JSON-filen innehåller de defaultvärden som servern får vid uppstart.



###Routerna {#routes}

Resten av koden är samlad i route-filen under `config/route/remserver.php`. Kopiera den och uppdatera din `config/route.php` så att filen inkluderas.

```bash
cp remserver/config/route/remserver.php anax2/config/route/
```

När du är klar kan du öppna en REST klient och göra en GET-fråga mot länken `api/users`. Du bör få samma resultat i `remserver` såsom i `anax2`.



###REM servern kopierad {#kopierad}

Det var det. Med ett par enkla steg har du integrerat en REM server in i ditt Anax. Med metoden copy & paste.

Man kan fundera på om det inte finns ett bättre sätt att koppla loss koden för REM servern och integrera i en egen modul som kan installeras med `composer`. Kanske är det en bra väg. Speciellt om man ser att REM servern kan vara en anpassad del av andra servrar och att den inte nödvändigtvis måste vara en egen server.

Låt oss hålla den tanken om att göra REM servern som en modul till packagist.

Innan vi vandrar den vägen så vill jag att vi funderar på om det är rimligt att lägga så mycket kod i routerna som det är nu. Vilka alternativ har vi där?

Att testa kod som ligger i routerna är inte så enkelt, koden i en route-hanterar är ju som ett lim för en förfrågan där hela förfrågan hanteras och ett svar genereras. Det hade varit enklare att testa koden om den var mer uppdelad i funktioner och kanske klasser.

Finns det en möjlighet att dela upp koden i routehanterarna så att den enbart finns i klasser och eventuellt funktioner? Det hade troligen gjort koden mer testbar utifrån aspekten enhetstestning.

Kan MVC i form av kontroller och modell vara en väg att strukturera koden för bättre struktur, enklare underhåll och vidareutveckling och testbarhet?

Låt se, vi testar.

Innan du går vidare så ta en rejäl titt i koden i `config/route/remserver.php`. Det är det som är själva REM servern och det är koden som vi nu skall försöka strukturera till kontroller och modell.



REM server som kontroller och modell {#mc}
--------------------------------------

Min första tanke när jag tittar på koden i `config/route/remserver.php` är att jag vill ha möjligheten att lägga routerna under baslänken `remserver/api`. Det hade gått att lösa med en find-replace men det vill jag inte. Jag skall suga på det, visst hade det varit skönt att bara kunna montera alla router från REM servern på en viss basroute?

Nåja, för övrigt ligger det massa kod som säkert kan delas upp i en kontroller och en modell. Jag tänker att modellklassen skall vara själva datalagringen som REM servern utför. Den skall spara undan data, erbjuda möjlighet att söka och hämta data.

Man kanske inte skall säga "modellklassen". Model i MVC är mer ett lager som innehåller många olika typer av klasser såsom [_domain object_](http://c2.com/cgi/wiki?DomainObject), abstraktionsklasser för lagring eller klasser för tjänster. Model är ett lager där man lägger kod, kod som inte behöver vara i en kontroller. När man bygger sin kontroller kan man ibland se att man får repitetiv kod som kan lyftas ut i modell-lagret. Så, Model får vara ett lager där vi placerar en stor del av vår kod. 

Kontrollern får vara limmet mellan förfrågan och REM serverns datalagringen. Det finns begrepp (googla) som säger "skinny/thin controllers" som vill att kontrollern inte skall vara alltför stor. Låt oss konstatera att det är en bra riktlinje oavsett typ av klass, en klass bör inte vara alltför stor. 

Så, hur skall vi nu överföra koden i routerna till en kontroller och en modell?

Vi gör det enkelt och tar ett kodexempel som redan är gjort. Sen kan vi modifiera det om vi vill.

Repot för REM servern innehåller [en branch `mvc`](https://github.com/dbwebb-se/remserver/tree/mvc) där koden är refactored och strukturerad enligt MVC. Låt oss hämta hem den och utgå från den koden.

```bash
# Gå till kursrepot
cd me/kmom02/remserver
git fetch
git checkout mvc 
git branch
```

Om du vill växla tillbaka koden till den ursprungliga branchen så gör du `git checkout master`. Med `git branch` ser du vilka aktiva brancher du har och stjärnan visar vilken du jobbar i för närvarande.

Nu gäller det att titta i texteditorn igen. Fokus är koden i route-filen `config/route/remserver.php` och klasserna i `src/RemServer`. Studera koden och fundera på vad som hänt. 



###Routerna {#mvcroute}

Filen för routerna har uppdateras så vi kopierar över den nya och tar en kopia på den gamla så vi kan jämföra.

```bash
# Gå till kursrepot
cd me/kmom02
cp anax2/config/route/remserver.php anax2/config/route/remserver_.php
cp remserver/config/route/remserver.php anax2/config/route/
```

Kika på route-filen i din editor och fundera på vad som hänt.



###Konfigurationsfil {#mvcconfig}

Det har tillkommit en konfigurationsfil som pekar ut var defaultdatat kan laddas ifrån. Vi får kopiera in den också.

```bash
cp remserver/config/remserver.php anax2/config/
```

Titta i filen för att se vad den definierar för data. Det ser ut som REM servern använda Anax vanliga hantering av konfigurationsfiler.

Det är ju klokt att lyfta ut saker till konfigurationsfiler, sådant som kan ändras på mer frekvent basis, utan att man vill ändra själva källkoden. I detta fallet rör det sig om vilken defaultdata som REM servern skall läsa upp vid initiering så det verkar flexibelt att ha möjlighet att konfigurera det.



###Klasserna {#mvcsrc}

Källkoden är flyttad från routerna och ligger nu i klasser under `src/RemServer`. Vi tar och kopiera dem.

```bash
rsync -av remserver/src/RemServer anax2/src/
```

Nu kan vi jämföra koden i `anax2` i kontrollerklassen `src/RemServer/RemServerController.php` och den tidigare koden i route-filen `config/route/remserver_.php`.

Den kod som inte finns i kontrollern ligger istället i modellklassen `src/RemServer/RemServer.php`.



###Tjänst i ramverket {#mvcservice}

Nu ligger koden som klasser och de behövs läggas till i ramverket som tjänster. På samma sätt som andra resurser läggs till i ramverkets hög av tjänster.

Tidigare gjordes detta i `htdocs/index.php` och det är även där som REM servern gör detta. Titta i filen och sök på "->rem" så finner du följande rader som berörs.

```php
// Add the REM server
$app->rem           = new \Anax\RemServer\RemServer();
$app->remController = new \Anax\RemServer\RemServerController();

// Init REM Server
$app->rem->configure("remserver.php");
$app->rem->inject(["session" => $app->session]);

// Init controller for the REM Server
$app->remController->setApp($app);
```

Du ser att två nya tjänster läggs till objektet `$app` och de initieras därefter.

Modellklassen `$app->rem` läser in en konfigurationsfil `config/remserver.php` och den injectas med ett beroende till `$app->session` som används för att lagra informationen.

Kontroller-klassen har ett beroende till hela `$app` som injectas till klassen.

Ovan kod behöver du alltså överföra till ditt `anax2` och platsen är `configure/service.php` där vi numer väljer att konfigurera de tjänster som inkluderas i ramverket och `$app`.



###Testa {#mvctesta}

Om du ännu inte testat att ladda webbsidan `anax2/htdocs/api/users` så gör du det nu.

Förhoppningsvis fungerar det på samma sätt som tidigare, om inte så har du felmeddelande att analysera och fixa tills det fungerar.

Får du problem kan du testa och jämföra mellan routsen i `remserver` och i `anax2`. De bör innehålla samma sak och fungera på samma sätt.



###Fundera {#mvcfundera}

När det fungerar så kan du luta dig tillbaka och fundera på om detta är bättre eller sämre än tidigare då all koden var i routefilen?

Helt klart var det fler steg som krävdes för att kopiera koden från mvc-branchen till anax2. Men det är inte det som är poängen, här är tanken att vi i längden vill lägga REM servern som en egen modul på packagist och då ersätts mycket av kopieringen med `composer require`.

Det som du istället behöver fokusera på är att studera koden i den gamla route-filen och den nya koden i de två klasserna. Lägg upp all kod från de tre filerna och analysera vilken kod som hamnade var.

Se till att du bygger upp en känsla för skillnaden på koden när allt låg i routerna och nu när koden ligger i en kontroller och i en modell.

Hade du själv valt att strukturera annorlunda? Koda gärna om det och testa.

Men det räcker om du försöker analysera kodstrukturen efter bästa förmåga och se hur flytten från kod i routerna har överförts till en kontroller och en modell.

Egentligen är det inte så svårt.

Kontrollerklassen har metoder som de flesta matchar direkt mot en route. Några av metoderna i kontrollerklassen är sådana som används i flera router så vi kan kalla dem hjälpmetoder.

Modellklassen är ett lager av datalagring som lagrar informationen i sessionen. Modellklassen erbjuder metoder för att hämta, söka och spara information i sessionen.

Det är modellklassen själv som hanterar var lagringen skall ske. Kontrollern har ingen påverkan på det. Vi hade kunnat uppdatera modellklassen för att lagra informationen i databasen utan att kontrollerklassen hade påverkats.

Vår tjänst innehåller ingen hantering av vyer, men om det hade funnits vyer så hade de troligen använts i kontrollern. Det finns inget som hindrar att klasser i modellagret lägger till information i vyer. Så det kan också vara en giltig lösning, allt beroende på vad man gör.



Avslutningsvis {#avslutning}
--------------------------------------

Du har fått en genomgång i hur kod kan se ut när den flyttas från routerna till kontrolle roch modeller. Samtidigt har du jobbat igenom en REM server som är en potentiell modul i Anax och du har fått möjlighet att fundera på hur man bäst skapar en sådan liknande modul med tanke på hur den kan integreras i en befintlig Anax installation.

Denna artikel har en [egen forumtråd](t/6603) som du kan ställa frågor i, eller bidra med tips och trix.
