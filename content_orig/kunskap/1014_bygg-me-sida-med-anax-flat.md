---
author: mos
category:
    - kurs-design
    - ramverk
    - anax
    - anax-flat
revision:
    "2017-11-02": (G, mos) Ignore theme/.
    "2017-10-31": (F, mos) Infotext om HTTPS/SSH.
    "2017-10-19": (E, mos) Genomgången inför ht17, mindre uppdateringar.
    "2016-11-01": (D, mos) Bort med referenser till YAML.
    "2016-10-26": (C, mos) Bort med referenser till att ändra temat.
    "2016-09-22": (B, mos) Testad inför kursstart.
    "2016-06-03": (A, mos) Första versionen.
...
Bygg en me-sida med Anax Flat
===================================

[FIGURE src=/image/snapvt16/favicon_128x128.png class="right"]

Vi skall använda ramverket Anax för att bygga en me-sida. Eller, närmare bestämt en variant av Anax som heter *Anax Flat*.

Vi börjar med en tom katalog och hämtar hem alla komponenter vi behöver, till slut har vi en webbplats skapad med ramverket Anax Flat.

<!--more-->

Syftet är att bygga en webbplats som skapas med Markdown dokument tillsamman med YAML som *frontmatter*. Frontmattern, tillsammans med en väl definierad katalog och filstruktur fungerar som en ersättare till databasen.

När vi byggt grunden till vår webbplats kan vi spara allt som ett eget repo på GitHub.



Förutsättning {#pre}
-------------------------------

Du har installerat [`composer`](labbmiljo/composer) och [`make`](labbmiljo/make).



Videoserie {#video}
-------------------------------

Det finns en videoserie som visar hur jag jobbar igenom denna artikeln. Kika gärna på den samtidigt som du själv jobbar genom denna artikeln.

De videor som är relaterade till denna artikel börjar på "[110 Anax Flat me-sida*](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)".



Börja med en tom katalog {#tom}
-------------------------------

Låt oss börja från ingenting. En tom katalog. Om du jobbar i kursrepot så skall du jobba i katalogen `me/anax-flat`. Katalogen bör finnas där.

```bash
# Gå till kursrepot
cd me/anax-flat
```

Anax Flat finns på GitHub och på Packagist. Du kan kika på hur paketet [Anax Flat presenteras på Packagist](https://packagist.org/packages/mos/anax-flat).

Vi tar och installerar Anax Flat med composer.

```bash
# Du står i kursrepot under me/anax-flat
$ composer require mos/anax-flat
$ tree -L 1 . 
.                                               
├── composer.json                               
├── composer.lock                               
└── vendor                                      
                                                
1 directory, 2 files                            
```

Nu har du en fil `composer.json` som visar vad composer har installerat. Lockfilen är en snapshot över det som är installerat, om du ändrar i `composer.json` så matchas den mot lockfilen.

Du har alla moduler för Anax Flat installerade under vendor-mappen. Kika i mappen så kan de se koden för de olika modulerna.

```text
$ tree -L 1 vendor/ 
vendor/                                               
├── autoload.php                                      
├── composer                                          
├── ezyang                                            
├── michelf                                           
├── mos                                               
├── scrivo                                            
└── symfony                                           
                                                      
6 directories, 1 file                                 
```

Filen `autoload.php` har koll på vilka filer som finns och hjälper till att laddar in dem när de behövs i PHP-skripten.

Resten av katalogerna är strukturerade enligt `<vendor>/<modul>`. Vi kan titta i katalogen `vendor/mos` för att se vilka moduler vi använder från vendor "mos".

```text
$ tree -L 1 vendor/mos/ 
vendor/mos/                                               
├── anax                                                  
├── anax-flat                                             
├── cimage                                                
└── ctextfilter                                           
                                                          
4 directories, 0 files                                    
```

Det ligger fyra moduler under vendornamnet "mos". Under varje modulkatalog finner vi källkod och testprogram för respektive modul.

Nåväl, det var lite kuriosa om hur vendor-mappen är strukturerad.

Om du hamnar i trubbel så är det bra att veta att man har senaste versionerna av modulerna. Du kan lista vilka moduler du har installerade och vilka versioner de har med kommandot `composer show`.

När modulerna uppdateras och släpps i ny version, så kan du ladda hem dem med kommandot `composer update`. Kör det kommandot så är du säker på att du har senaste versionerna.

Då kan vi skapa en webbplats med hjälp av filer som ligger i Anax Flat.



Låna en Makefile {#make}
-------------------------------

Anax Flat innehåller en Makefile som vi kan återanvända. Makefilen innehåller vanliga kommandon som vi vill köra när vi bygger en webbplats med Anax Flat.

```bash
$ cp vendor/mos/anax-flat/Makefile .
$ ls -l
$ make
```

Kommandot `make` ger dig en utskrift av de kommandon som Makefilen stödjer. Det är med hjälp av dessa kommandon som vi nu skall bygga en webbplats.

Öppna filen `Makefile` i din texteditor och studera den. Den innehåller kod som är en blandning av make-specifik syntax och Bash-syntax. För att bli duktig på makefiler behöver du lära dig både make och bash, men det är ett sidospår som vi återkommer till i senare kurser. Notera att makefilen är strukturerad med hårda tabbar `\t` och inte soft spaces. Det är viktigt att det är så.

Nu kan vi använda makefilen för att skapa grunden till en webbplats.



Skapa en katalogstruktur {#kataloger}
-------------------------------

Makefilen innehåller ett kommando för att skapa en grundstruktur till din webbplats.

```text
$ make site-build
```

Det som sker, när du kör kommandot, är att instruktioner i makefilen skapar ett antal kataloger samt kopierar filer och katalogstrukturer från de paketen som ligger i `vendor` mappen.

Du kan själv studera [källkoden för makefilen](https://github.com/canax/anax-flat/blob/master/Makefile) och se vad som händer. Leta reda på den action som heter *site-build* så kan du se vilka kommandon som utförs.

Här följer en förteckning av några av de kataloger som skapas. Det räcker att ha en ungefärlig koll på dem. Du behöver inte kunna dem i detalj för att kunna skapa en webbplats.

| Katalog        | Beskrivning                            |
|----------------|----------------------------------------|
| `cache/`       | Temporär lagring av cachade filer.     |
| `config/`      | Konfigurationsfiler för webbplatsen.   |
| `content/`     | Filer som motsvarar innehållet i webbplatsen. Här redigerar vi innehållet i webbplatsen. |
| `htdocs/`      | Rooten till den publika delen av webbplatsen. Här finns bilder, stylesheets och startpunkten `index.php`. |
| `view/`        | View-filer som används för att mappa innehåll till layout i webbsidans regioner. |

Du kan nu öppna katalogen `htdocs` i din webbläsare, via din lokala webbserver, och du bör se en webbsida i stil med denna.

[FIGURE src=image/snapht17/anax-flat-start.png?w=w2 caption="En webbsida redan klar att modifiera."]

Nu har vi grunden till en webbplats.

Låt oss nu anpassa webbplatsen, först genom att modifiera dess innehåll och därefter genom att modifiera dess style.



Byt språk på webbplatsen {#lang}
-------------------------------

Du kan titta i videon hur jag jobbar med grunden i Anax Flat.

[YOUTUBE src="tnJtNrieF0Q" width=630 list="PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET" caption="Mikael jobbar med grunden i Anax Flat."]

Glöm inte att det finns fler videor kopplade till artikeln i spellistan benämda med "[110 Anax Flat me-sida*](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)".

Filerna som nu finns är grunden till en mesida. De är på engelska, men du får gärna skriva på svenska. Om du väljer svenska så kan du ändra grundinställningen i temat så att den säger att detta är en webbplats på svenska.

Denna ändring gör du i konfigurationsfilen `config/theme.php`. Leta reda på raden som säger `lang` och byt den till `sv`. Så här.

```php
//"lang"          => "en",
"lang"          => "sv",
```

Webbplatsen är språkanpassad och de delar som stödjer det kommer nu att ge svenska meddelanden istället för engelska.

[INFO]
**Anax-Flat delvis förberedd**

Spåkstödet i Anax Flat är inte komplett, grunden finns på plats men språkstöd är inte helt implementerar, så ovan stycke är delvis en sanning med modifikation. Än så länge.

[/INFO]



Innehåll som en mesida {#innehall}
-------------------------------

Innehållet i denna webbplats ligger i markdown-filer under katalogen `content`. Öppna upp din texteditor och studera filerna och katalogstrukturen.

Då skall vi ändra filernas innehåll.



###Ändra innehåll i enkla sidor {#sidor}

Två av huvudsidorna som ligger i menyn är `index.md` och `about.md`. Öppna upp dem i din texteditor och uppdatera innehållet. Ladda nu om sidorna i din webbläsare så ser du att innehållet har ändrats.



###Ändra innehåll i block {#block}

Innehållet som ligger i footern, är fördelat i tre kolumner och en footer längst ned. Du hittar deras motsvarande innehåll i katalogen `content/block`. Öppna de olika filerna och redigera dem så de blir personliga för din webbplats.

Ladda om sidan i webbläsaren för att se ändringarna.



###Ändra innehållet i sammansatta sidor {#samsidor}

Sidan för `report/` är en sammansatt sida, den består av flera undersidor. Det som ger sidan dess struktur är konfigurerat i filen `report/.meta`. Du kan kika i den filen för att se dess struktur.

Pröva sedan att ändra i filen `110_kmom01.md`, det är i denna filen du skriver redovisningstexten för kmom01.

Ladda om sidan i webbläsaren för att se den uppdaterade texten.



###YAML för att konfigurera sidornas innehåll {#yaml}

Det du ser överst i sidorna, mellan start taggen `---` och slut taggen `...` är YAML data. YAML är ett textformat som kan läsas in till en PHP datastruktur. 

Vi kallar denna del sidornas *frontmatter*. Det är data om själva sidorna, vi kan kalla det *meta data*, eller *data om data*.

Frontmattern ger oss möjlighet att konfigurera hur sidorna presenteras. Exempel på hur det kan användas ser du i filerna `report/.meta` och i `report/000_index.md`.



Lägg till innehåll och block {#add}
-------------------------------

Anax-Flat ett ramverk som bygger på en större mängd kod i botten. Ett ramverk brukar ha en viss uppfattning om hur vi skall skapa innehåll för webbplatsen. Ramverket styr oss.

Låt oss kika på hur vi lägger till en ny sida och hur vi skapar ett block med separat innehåll samt knyter samman dessa.



###Ny sida {#sida}

För att skapa en ny sida så lägger vi till en fil i katalogen `content`. Du kan börja med en tom fil, eller kopiera filen `about.md`.

För övningens skull så sparar jag den nya filen som `content/test.md`.

Nu finns den på plats och ramverket kommer hitta den under webblänken `index.php/test`, på samma sätt som den tidigare hittade sidan "About" under webblänken `index.php/about` via filen `content/about.md`.

Pröva att lägga till din nya sida.

Om du även vill lägga till sidan i menyn, så behöver du redigera innehållet i filen `config/navbar.php`. Testa gärna det också. Allt för att bekanta oss med det nya ramverkets struktur.



###Nytt block {#block}

Säg vi vill lägga till ett block till en eller flera sidor. Till exempel ett block om oss själva som författare, en så kallad *byline*.

En byline kan vara ett separat innehållsblock som kan förekomma på flera sidor i webbplatsen. Låt oss därför skapa det som ett eget block.

Som mall kan du använda `content/block/footer.md`. Kopiera den till en ny fil `content/block/byline.md`.

Modifiera så den ser ut som en enkel byline, eller bara ändra texten i den så du vet att rätt innehåll laddas.

Men hur laddar man blocket i en sida?



###Ladda block i sida {#laddablock}

Man kan lägga in blocket via frontmattern, antingen direkt i en sida, eller via filen `.meta.md`.

Filen `.meta.md` är speciell fil som ger en mall av frontmatter som påverkar alla sidor i katalogen. Syntaxen är lika, oavsett om du lägger din frontmatter i `.meta.md` eller direkt i filen `test.md`.

Så här ser frontmattern ut för att länka till blocket. Pröva att lägga den direkt i filen `content/test.md`.

```yaml
---
views:
    byline:
        region: after-main
        template: default/content
        sort: 1
        data:
            meta:
                type: content
                route: block/byline
...
```

Ovan är `views:` en behållare, en kontainer, av vyer. Benämningen `byline:` är ett godtyckligt och unikt namn på en specifik vy. Man kan lägga till fler vyer för att ytterligare lägga till innehåll i sidan.

Regionen `after-main` är en av de kända regionerna som finns i den *master template* som används. I ditt fall hittar du master templaten i `vendor/mos/anax/views/default/index.tpl.php`. Det är den filen som styr webbsidans uppbyggnad.

Templaten `default/content` är en av de templates som finns för att rendera vyer i regioner. Standarduppsättningen av vyerna ligger i samma katalog som master templaten `vendor/mos/anax/views/default/`.

Data `data:`är den information som skickas till templaten för att renderas. I detta fallet är det en meta-variant som ramverket stödjer internt så att man kan inkludera innehåll från andra filer/block.

Huh, måste jag lära mig allt detta?

Nej, men lär dig de enkla grunderna (copy och paste och redigera) så du kan skapa de webbsidor du vill. Lyssna på terminologin som används. Resten bokför du på kontot som rör hur ett ramverk kan fungera. I denna kursen så använder vi ett ramverk och bekantar oss med vissa av dess termer. I kommande kurser skall vi själva bygga liknande ramverk. Men det är senare kurser, inte nu, nu är fokus att använda ramverket.



Anpassa stylen {#style}
-------------------------------

Det följer med en grundstyle som ligger i den minifierade stylesheeten `htdocs/css/default.min.css`. Minifierad betyder att stylesheeten är komprimerad och alla kommentarer och mellanslag är borttagna, den är alltså lite svår att läsa om du öppnar den i din texteditor.

Genom att använda webbläsarens devtools kan du dock se vilka CSS-konstruktioner som finns.

Men hur gör man för att bygga en eget style?

Jo, låt oss avvakta med det. Vi tar det i nästa kursmoment.



Bygg webbplatsen i ett Git repo {#git}
-------------------------------

Det vi har gjort nu är att skapa basen till en webbplats. Denna webbplats kan vi spara på GitHub i ett eget Git repo. 



###Skapa ett Git-repo av katalogen {#gitrepo}

Du står i din katalog för anax-flat, till exempel i `me/anax-flat`.

Det vi behöver göra, för att skapa ett Git repo av vår katalogstruktur, är följande.

```text
$ git init      # Initiera katalogen som ett git repo
$ git status    # Visa vilka filer som är (inte) del av repot
```

Vi skall inte committa alla filer, några vill vi inte committa och därför skapar vi en fil `.gitignore` som innehåller följande.

```text
/cache/
/vendor/
/theme/
```

Nu kan vi köra `git status` följt av `git add` för att lägga till de filerna vi vill ha.

```text
$ git status    # Visa vilka filer som är (inte) del av repot
$ git add .     # Lägger till samtliga filer som visas av git status
$ git status
```

Nu kan vi committa de filerna.

```text
$ git commit -m "First commit"  # Verkställer ändringarna
$ git status
```

Bra, du har nu skapat ett Git-repo av dina filer. De är nu under kontroll av versionshanteringssystemet Git.



###Koppla Git till GitHub {#koppla-github}

Nu kan du skapa ett repo på GitHub. Skapa ett konto om du inte redan har det. Skapa sedan ett repo, du kan döpa det till vad du vill, eller bara till "Anax Flat". **OBS!** Klicka inte i att du skall skapa några filer, vi kommer ju att ladda upp de filerna vi redan har.

Utför sedan de instruktioner du  ser på GitHub, under rubriken som säger något i stil med:

> *"…or push an existing repository from the command line"*

[FIGURE src=/image/snapht16/design-create-github-repo.png?w=w2 caption="Instruktioner på GitHub när du skapar nytt tomt repo."]

[INFO]
**Välj SSH eller HTTPS**

Bilden ovan visar SSH som kräver att du har SSH-nycklar kopplade mellan din dator och GitHub. För varje ny dator man använder så behöver man sätta upp SSH-nycklarna. Så här gör man när man jobbar "på riktigt" med Git och GitHub.

Välj HTTPS så authentiserar du dig med ditt login och lösenord. Detta är enklast att komma igång med. Välj HTTPS om du är osäker på vad SSH-nycklar innebär.

Det är väl investerad tid att lägga till SSH-nycklar.
[/INFO]

Ladda om sidan på GitHub så ser du nu ditt repo, om allt gick bra.

[FIGURE src=/image/snapvt16/anax-flat-me-github.png?w=w2 caption="Anax Flat med me-sida på GitHub."]

Innan du är klar så bör du lägga till en `README.md`, `REVISION.md` samt en `LICENSE`. Själv använder jag MIT som licens. Vill du göra samma så kan du kopiera licensfilen från `vendor/mos/anax-flat/LICENSE` (glöm inte byta namnet i filen).

Du kan hitta exempel på en `README.md` och på en `REVISION.md` i katalogen `vendor/mos/anax-flat`. 

Du kan se mitt halvfärdiga repo på [`mosbth/Anax-Flat-Me`](https://github.com/mosbth/Anax-Flat-Me), bara för att se hur det kan se ut.



Tagga ditt repo med en version {#tag}
-------------------------------

När du är klar med uppdateringar av din kod och innehåll så skall du avslutningsvis tagga ditt repo. Du skall ge det en version så du kan komma ihåg vilket läge din kod hade vid just detta tillfället.

Du skall välja version 1.0.0.

Så här taggar du ditt repo med en version.

```text
# Börja med att committa alla ändringar du gjort
$ git commit -a -m "Prepare to tag version"
$ git push

# Nu kan vi tagga koden med en version
$ git tag -a 1.0.0 -m "My first version"
$ git push --tags
$ git tag
```

Om du gör ändringar och vill tagga en ny version så kan du tills vidare använda den tredje siffran och inkrementera den för varje ny version. Så här:

* 1.0.1
* 1.0.2

Om du vill ha riktig ordning och reda så loggar du de ändringar du gör, och de taggar du skapar, i din `REVISION.md`.

Bra, nu har vi ordning på versionerna av koden.



Avslutningsvis {#avslutning}
------------------------------

Nu har du kommit igång med Anax Flat och du kan anpassa webbplatsen med ditt eget innehåll. Det är en god start.

Dessutom blev det en snabb intro till Git och GitHub.
