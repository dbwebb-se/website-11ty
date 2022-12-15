---
author: mos
category:
    - kursen design
    - less
    - css
    - ramverk
    - anax
    - anax-flat
revision:
    "2017-10-27": (D, mos) Genomgång inför ht17, nu npm och inte wget.
    "2016-10-26": (C, mos) Bytte namn på videoserien.
    "2016-10-21": (B, mos) Tog bort echo i makefilerna, cp av regions.less.
    "2016-10-06": (A, mos) Testad och släppt.
...
Bygg ett tema till Anax Flat
===================================

[FIGURE src=/image/snapvt16/favicon_128x128.png class="right"]

Du har kommit igång med ramverket Anax Flat och du kan skapa ditt eget innehåll på webbplatsen. Nu är det dags att börja styla webbplatsen med CSS, eller rättare sagt med LESS.

Vi bygger upp ett tema från grunden, steg för steg. Temat får en grundstruktur som gör det utbyggbart och modulärt.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du har jobbat igenom artikeln "[Bygg en me-sida med Anax Flat](kunskap/bygg-me-sida-med-anax-flat)".

Du har installerat [`node` och `npm`](labbmiljo/node-och-npm).



Videoserie {#video}
-------------------------------

Det finns en videoserie som visar hur jag jobbar igenom denna artikeln. Kika gärna på den samtidigt som du själv jobbar genom denna artikeln.

De videor som är relaterade till denna artikel börjar på "[210 Anax Flat tema*](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)".



Börja med en fork {#fork}
-------------------------------

På GitHub finns `canax/anax-flat-theme` som är ett embryo till ett tema för Anax Flat. Där finns bland annat en makefile som hjälper dig att jobba med LESS på kommandoraden.

Allt eftersom kommer vi bygga ut vårt tema genom att återanvända befintliga moduler tillsammans med de egna moduler vi skapar. Att samla allt i ett eget Git-repo känns som en god idé.

Grundtemat finns alltså på [`canax/anax-flat-theme`](https://github.com/canax/anax-flat-theme). Forka den och klona den sedan till din installation av Anax Flat.

Forka gör du via GitHub, klicka på knappen "Fork".

Nu skapas en kopia av `canax/anax-flat-theme` och det hamnar på ditt eget konto. Det är bra för att du skall kunna skapa dina egna ändringar som du kommer göra.

Nu kan du clona din kopia av `anax-flat-theme`. Gör det i rooten av din Anax Flat-katalog.

```text
# Flytta till rooten av din Anax Flat, ändra XXX till din egen användare
$ git clone https://github.com/XXX/anax-flat-theme.git theme
$ cd theme
$ ls -l
```

När jag klonade valde jag att spara till ett katalognamn `theme`.

Kika nu runt bland filerna och öppna dem i din texteditor. Bekanta dig med dem, de innehåller inte så mycket för tillfället, bara ett skal.



Verktyg för att kompilera och linta LESS {#less}
-------------------------------

Innan vi kan börja bygga vårt tema behöver vi en lokal utvecklingsmiljö för att kompilera LESS till CSS. Jag tänker installera en LESS-kompilator i form av NPM-paket. NPM är en pakethanterare för JavaScript och Node.



###Installera verktygen med npm {#install-npm}

Installationen blir lokal till detta repo, alla verktyg installeras i samma katalog som repot. Att installera en utvecklingsmiljö lokalt tillsammans med ett repo gör att man kan ha specifika versioner som inte krockar med andra verktyg som är installerade på din dator.

Du kan använda makefilen för att installera det som behövs samt kontrollera vilka versioner du har installerade.

```text
$ make help         # För att visa vilka kommandon som stöds
$ make npm-install  # Installera paket via npm install
$ make npm-version  # Visa versionen på installerade paket
```

Kika gärna i filen `Makefile` vad som händer när du kör `npm-install` samt `npm-version`.

I ditt repo finns en fil `package.json`, det är den som kommandot `npm` läser sin information ifrån när det tar reda på vad som skall installeras.

För att hämta hem senaste versionerna av verktygen kan du göra en `npm update` med hjälp av makefilen.

```text
$ make npm-update   # Uppdatera de installerade paketen.
```

Visst hade vi kunnat skriva in kommandona direkt via kommandoraden, men makefilen erbjuder oss en enklare väg och mindre text att skriva vid kommandoraden.



###Testa att verktygen fungerar {#test-npm}

Nu har du två verktyg för att kompilera LESS till CSS. Du har kommandot `lessc` som lintar, kompilerar och minifierar din stylesheet. Du har även kommandona `csslint` och `stylelint` som lintar din slutliga CSS-kod.

Du kan testa att köra dem direkt via kommandoraden för att se att de fungerar.

```bash
$ node_modules/.bin/lessc --version
$ node_modules/.bin/csslint --version
$ node_modules/.bin/stylelint --version
```

Du kan även använda makefilen för att kontrollera vilka versioner som finns installerade. Test att köra `make check` så ser du ungefär motsvarande.

Vi kommer låta makefilen sköta en del av arbetet kring kompilering och lintning. Det blir mindre att skriva för oss och vi sparar tid.



En första stylesheet med LESS {#steg1}
-------------------------------

Då så, låt oss kompilera med `make less` en första gång och se vad som händer.

```text
$ make less
$ ls -l build/css/
total 8.0K
-rw-r--r-- 1 mos mos 551 May 11 18:13 style.css
-rw-r--r-- 1 mos mos  94 May 11 18:13 style.min.css
```

Källkoden för stylen ligger i `style.less`. Kompilatorn kompilerar LESS-koden till CSS. Öppna gärna de båda filerna för att se hur den kompilerade stylen ser ut.

Den resulterande stylesheeten hamnar i katalogen `build/css`. Stylesheeten kopieras också till `htdocs/css/` så du kan testa den lokalt, om du skulle vilja göra det. Efter varje kompilering har du alltså den senaste versionen av din (miniferade) stylesheet i `htdocs/css`.



Använd stylesheeten i ditt Anax Flat {#copy}
-------------------------------

I makefilen finns ett *target* `less-install` som kompilerar less *och* kopierar till katalogen `../htdocs/css` i din Anax Flat. Det är för att göra saker smidiga att jobba med. Det temat vi nu jobbar i förutsätter alltså att det kan finnas på en viss plats i en installation av Anax Flat.

Vill du ha superkoll på kikar du i din makefil för att se vad som händer.

Gör så här för att kompilera och uppdatera stylesheeten i ditt Anax Flat.

```text
# Du står i din katalog theme/
$ make less-install
```

Du behöver konfigurera ditt Anax Flat att använda denna nya stylesheet. Det gör du via filen `config/theme.php` genom att ändra följande.

```php
//"stylesheets" => ["css/default.min.css"],
"stylesheets" => ["css/style.min.css"],
```

Du kan nu ladda om ditt Anax Flat i din webbläsare och använda din nya stil, om än någon knapphändig än så länge.

[FIGURE src=/image/kurs/design/anax-flat-no-theme.png?w=w2 caption="Anax Flat utan style."]

Då kan vi börja att bygga upp stilen från början. Du kan notera att även om det inte finns någon style så går det ändock att läsa innehållet i webbplatsen. Det är viktigt att man kan göra det, ur användbarhetssynpunkt. Ibland kanske stylesheeten inte hinner laddas och då skall användaren ändå kunna använda webbplatsen.

Du kan även stå i ditt Anax Flat och kompilera stylen, det är ett target i makefilen som löser det genom att använda `theme/Makefile`. 

```text
# Du står i din katalog för Anax Flat
$ make theme
```

Då börjar vi lägga till LESS moduler för att bygga upp stylen i ditt Anax Flat.



Normalisera stylen {#normalisera}
-------------------------------

Det första vi gör är att nollställa stylen. Eller, egentligen så normaliserar vi stylen. Vi vill att vår grundstyle är lika i alla webbläsare, oavsett om vissa webbläsare lägger på sin egen personliga style. Detta kan modulen  [normalize.css](http://necolas.github.io/normalize.css/) hjälpa oss med.

Låt oss ladda ned stylen för normalisering och integrera i vårt tema.



###Hämta Normalize {#downnorm}

Jag vill hämta filen för `normalize.css` och spara undan bland mina egna moduler i katalogen `modules/`. Jag gör detta med kommandot `npm`.

```bash
# Du står i katalogen theme/
npm install normalize.css --save-dev
ls -l ls node_modules/normalize.css/
```

Pakethanteraren npm installerar modulen under `node_modules/normalize.css` samt sparar en referens till modulen i `package.json`. Jag kan nu kopiera stylesheeten till min `modules/`.  Jag döper filen till `normalize.less` för att LESS kompilatorn skall betrakta filen som en LESS fil.

```bash
cp node_modules/normalize.css/normalize.css modules/normalize.less
```

Öppna filen `modules/normalize.less` i din editor och kika snabbt på dess innehåll.



###Gör Normalize till en modul {#normmod}

Jag uppdaterar `modules.less` så att den importerar min modul.

```css
// Reset, or normalize the browser style
@import url(normalize.less);
```

Jag behöver inte ange katalogen eftersom jag har angivit i makefilen att katalogen `modules` skall vara en del av *include pathen*. Det innebär att kompilatorn först letar i nuvarande katalog och därefter i katalogen `modules`. Den fil som först hittas används.

Nu kan jag kompilera stylen och testa den. Det bör inte bli någon förändring rent utseendemässigt. Så vill du vara säker på att normalize.less är inkluderad så kan du titta i den genererade källkoden `build/css/style.css` som nu bör vara lite större än tidigare.

Dubbelkolla även att du har samma variant i ditt Anax Flat under `htdocs/css`. Utseendemässigt är det nästan ingen förändring, men det kan bero på vilken webbläsare du använder.



###Nedladdning av Normalize som del i Makefile {#nednorm}

Vad händer när det kommer uppdateringar till `normalize.css`? Ja, förr eller senare behöver du uppdatera. Tänk nu att vi kommer ha flera moduler så blir det rätt jobbigt att hålla koll på uppdateringar. Men tänk om vi fyllar på i makefilen med ett target som hjälper oss att vara uppdaterade?

Vad sägs om ett make *target* som gör `make upgrade` genom att hämta hem senaste versionerna av alla moduler? Jag tycker det låter som en bra idè. Så här kan det se ut i makefilen.

```text
# target: upgrade-normalize       - Upgrade LESS module - Normalize.
.PHONY: upgrade-normalize
upgrade-normalize:
	@$(call HELPTEXT,$@)
	npm update normalize.css
	cp node_modules/normalize.css/normalize.css modules/normalize.less
```

[INFO]
**Tips** När du redigerar en Makefile så används hårda tabbar och inte soft tabs (tabbar ersätts med mellanslag). Använder du mellanslag får du följande fel.

```text
$ make upgrade-normalize
Makefile:173: *** missing separator.  Stop.
```

Du fixar genom att använda hårda tabbar istället.
[/INFO]

Så här kan det se ut när du kör det.

```text
$ make upgrade-normalize
---> Upgrade LESS module - Normalize. 
npm update normalize.css
cp node_modules/normalize.css/normalize.css modules/normalize.less
```

Det var vår första LESS modul, på vår långa resa där vi försöker skapa en god bas av LESS moduler för att bygga egna stylesheets och teman.

Vi fick dessutom en effektiv hantering av att hålla vårt tema uppdaterat med eventuella uppdateringar av modulen. Det är en god start.



Regioner för att placera ut innehållet {#regioner}
-------------------------------

Hur HTML-koden genereras påverkar vilka möjligheter vi har att styla webbplatsen. När man har kontroll över både style och HTML-kod så kan man anpassa de båda för att få ren och snygg HTML-kod och enkel stylning av den.

Men, nu har vi redan färdigskapad HTML. Hur löser vi det? Som tur är så har jag koll på strukturen av HTML-koden.

Jag tänkte att vi skulle ta ett steg fram och se vilka olika *regioner* som HTML-koden består av.

Jag tänkte försöka skapa  en `regions.less` för att uppnå så att webbplatsen ser ut ungefär så här.

[FIGURE src=/image/kurs/design/anax-flat-regions.png?w=w2 caption="Anax Flat stylad in i regioner."]

Till min hjälp har jag kunskapen om den templatefil som används när HTML-koden genereras. Du kan själv studera `index.tpl.php` i katalogen `vendor/mos/anax/view/default/`, eller via GitHub i repot mos/anax där [alla template-filerna  finns](https://github.com/mosbth/anax/blob/master/view/default/), specifikt är det [`index.tpl.php`](https://github.com/mosbth/anax/blob/master/view/default/index.tpl.php) som skapar grunden för HTML sidan.

**För att komma framåt**, så kan du låna den färdiga `regions.less` som du hittar i kursrepot under `example/anax-flat/theme/regions.less`. Glöm inte kika på videorna där jag visar hur jag gör.



###Kopiera regions.less {#regions.less}

Så här kopierar du filen `regions.less`.

```text
# Du står i katalogen me/anax-flat/theme
cp ../../../example/anax-flat/theme/regions.less modules
ls -l modules
```

Lägg till så filen inkluderas i `modules.less`.

```css
// Basic region structure
@import url(regions.less);
```

Bygg om temat och ladda om sidan. Du borde nu se en liknande bild jag visar i föregående stycke.

I videoserien går jag igenom innehållet i filen `regions.less` i en lugnare takt.



En responsiv hamburger-navbar {#navbar}
-------------------------------

Navbaren på Anax Flat är automatgenererad utifrån den information som finns i `config/navbar.php`. Den har en struktur som är förberedd för att stylas på ett responsivt sätt, har stöd för undermenyer och en _hamburger-meny_. Att göra en liknande navbar, på egen hand, från grunden, kan ta sin lilla tid så jag tänkte att vi lånar en LESS modul som ger oss en grund att stå på.

Kanske kan det vara bra att ha några LESS-moduler att kika på, innan vi börjar skriva våra egna.

Den modulen jag tänkte låna finns på GitHub under namnet [desinax/responsive-menu](https://github.com/desinax/responsive-menu) och den är tillgänglig via pakethanteraren npm på [`desinax-responsive-menu`](https://www.npmjs.com/package/desinax-responsive-menu).



###Bekanta dig med responsive-menu {#downresp}

Innan vi integrerar modulen så vill vi testa den. Vi installerar den med `npm install desinax-responsive-menu`.

```text
# Ställ dig i katalogen theme/
npm install desinax-responsive-menu --save-dev
ls node_modules/desinax-responsive-menu
```

Det ligger en testbar version som visar hur menyn fungerar i `htdocs/index.php` i repot, öppna den i webbläsaren för att testa och se hur menyn fungerar.

Bekanta dig någorlunda översiktligt med källkoden som ligger i repot.

| Fil                     | Syfte   |
|-------------------------|---------|
| `htdocs/`               | Inkluderar samtliga filer som behövs för att få ett körbart exempel. |
| `src/less/responsive-menu.less` | LESS-kod för att styla och skapa menyn. |
| `src/js/responsive-menu.js`     | JavaScript-kod som används av menyn. |

Det är alltså detta som behövs för att få ett körbart exempel, en kombination av HTML, CSS och JavaScript. PHP förenklar för att exemplet skall fungera smidigare.



###Använd modulen responsive-menu {#useresp}

Då försöker vi integrera den responsiva menyn in i Anax Flat såsom en av våra egna LESS moduler. Vill vill göra den till "vår egen modul" i vårt tema, så att vi har full kontroll över den.

Det handlar om två filer som vi behöver. Eftersom vi har installerat modulen med npm så kan vi kopiera filerna.

```text
# Du står i roten av katalogen theme/
cp node_modules/desinax-responsive-menu/src/less/responsive-menu.less modules/
cp node_modules/desinax-responsive-menu/src/js/responsive-menu.js js/
ls js/ modules/
```

Fortsätt nu och lägg in så att LESS-modulen importeras via `modules.less`.

```css
// Responsive menu
@import url(responsive-menu.less);
```

Vi kan nu testa att kompilera stylen och ladda om webbsidan. Dock, innan allt fungerar så behöver vi aktivera JavaScript-filen också. Den sparade jag i katalogen `js` och nu vill jag säga till Anax Flat att använda den. Makefilen har redan inbyggt i sig att den kopierar katalogen `js` till rätt plats i Anax Flat under `htdocs/js`.

Vi bygger om temat och kollar att filen ligger på rätt plats.

```text
# Du står i me/anax-flat
$ make theme
$ ls htdocs/js/resp*
responsive-menu.js 
```

Du behöver nu ordna så att Anax Flat är inställt på att ladda js-filen. Det är en inställning Anax Flat i `config/theme.php` som skall se ut så här.

```php
//"javascripts" => [],
"javascripts" => ["js/responsive-menu.js"],
```

Nu kan du testa menyn genom att ladda om din webbläsare. Den bör se ut precis som tidigare. Vi är inte färdiga än. Vill du vara säker på att något händer kan du öppna devtools i webbläsaren för att se vilka resurser som laddas, du bör se att din JavaScript-fil laddas. Vill du se vilken CSS-kod som används så är det nog enklast att titta i den icke-minifierade som generats under `theme/build/css/style.css`. Kommentarerna ligger kvar i den filen så vet du vilken kommentar som finns i din LESS-modul så skall du kunna hitta motsvarande i den kompilerade `style.css`.



###Beroende av Font Awesome {#berofa}

Den responsiva menyn vi använder är beroende av en extern modul som heter [Font Awesome](http://fontawesome.io/), ett style- och font-bibliotek med en stor mängd bra-att-ha ikoner.

Vi kommer att integrera Font Awesome i vårt tema i ett senare stadie. Men för tillfället vill vi ha snabbaste vägen fram och det får vi genom att inkludera en färdig stylesheet som vi når via en [CDN som stödjer Font Awesome](https://www.bootstrapcdn.com/fontawesome/).

Uppdatera ditt Anax Flat i filen `config/theme.php` så att följande stylesheet inkluderas.

```php
//"stylesheets" => ["css/default.min.css"],
"stylesheets" => [
    "css/style.min.css",
    "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
],
```

Notera att länken ovan troligen har ett annat versionsnummer av Font Awesome. Du bör använda senaste möjliga versionen.

Testa att ladda om din sida och tittar du i devtools -> network så bör du se att resursen `font-awesome.min.css` laddas som en resurs.



###Lägg till hamburger-menyn {#expmenu}

I exemplet för responsive-menu fanns det en hamburger-meny som expanderade om man klickade på den. Låt oss använda den i vår webbplats.

[FIGURE src=image/snapht17/responsive-menu-closed.png?w=w2 caption="Hamburgermenyn som är klickbar."]

[FIGURE src=image/snapht17/responsive-menu-open.png?w=w2 caption="När man klickar på hamburgermenyn så öppnas en ny navbar/meny."]



####Aktivera hamburger-meny {#menu2}

Det vi behöver göra är att aktivera ytterligare en navbar i `config/navbar.php`. Det finns ett kodstycke som redan ligger i filen som går att kommentera bort. Det blir som en helt ny meny med sina egna menyval.

Kodstycket inleds med följande.

```php
// Used as menu together with responsive menu
// Name of this menu
"navbarMax" => [
```

Ta bort kommentaren runt detta kodstycke för att aktivera menyn med dess menyalternativ.



####Rendera hamburger-menyn {#menu2}

Sedan behöver vi lägga till så att den nya menyn renderas i en vy och placeras ut i en region, det gör vi i `config/theme.php`. Det finns ett kodstycke som nu är bortkommenterat.

Kodstycket består av följande.

```php
[
    "region" => "profile",
    "template" => "default/navbar-max",
    "data" => [],
    "sort" => -1
],
```

Ta bort kommentaren runt detta kodstycke för att rendera menyn i regionen `profile` med hjälp av templaten `default/navbar-max`.



####Resultatet {#navbarres}

Ladda nu om sidan och om allt fungerar bör du se en meny som visas upp under knappen med tre horisontella streck i.

[FIGURE src=/image/snapht16/anax-flat-responsive-menu.png?w=w2 caption="Två menyer aktiva, grundstyle på plats."]

Om du kan se motsvarande bilden ovan, på din webbplats, då gick allt bra. Nu har du två menyer på plats och kan börja använda dem och styla dem. En bra start.



###Förbered för uppdateringar i makefilen {#respupgr}

Jag förbereder för uppdateringar genom att lägga in en target i makefilen så den kan uppdatera "sig själv".

```text
# target: upgrade-responsive-menu - Upgrade LESS module - Responsive menu
.PHONY: upgrade-responsive-menu
upgrade-responsive-menu:
	@$(call HELPTEXT,$@)
	npm update desinax-responsive-menu
	cp node_modules/desinax-responsive-menu/src/less/responsive-menu.less modules/
	cp node_modules/desinax-responsive-menu/src/js/responsive-menu.js js/
```

Bra. Då har vi integrerat en responsiv meny i vårt tema, tillsammans med en hamburger-meny.



Styla header och menyn {#header}
-------------------------------

Låt oss styla till headern av webbplatsen, bara lite enkelt så vi kommer igång.

Det skulle kunna se ut så här när vi är klara. Nåja, klara och klara. Men ändå.

[FIGURE src=/image/snapht16/anax-flat-style-header.png?w=w2 caption="En måttligt stylad header."]

En start är det iallafall.

Ovan style kan man uppnå med den stylen som ligger i kursrepots exempel-katalog `example/anax-flat/theme/header.less`. Du kan utgå från den stylen om du vill se hur det kan se ut. Eller så bygger du din egen style.

Bör man lägga denna stylen som en egen återanvändbar modul eller bör man anse att den inte är generell utan kan samlas i `style.less`. Ja, det är en bedömning man får göra, båda varianterna fungerar men jag föredrar nog en egen LESS-modul.



Responsivitet {#resp}
-------------------------------

Responsiv design innebär att man stylar webbplatsen så att den anpassar sig efter skärmens storlek. En responsiv webbplats fungerar både på små och stora skärmar, och alla varianter därimellan.

Ibland väljer man att designa webbplatsen till små enheter i första hand, så kallat *Mobile First*. Man väljer en layout som fungerar för små enheter och sedan skalar man upp den när skärmens bredd ökar.

Vi har redan en webbplats som fungerar för större skärmar så i vårt fall handlar det om att få innehållet att fungera även på små enheter.

Vår lösning blir att använda *media queries* vid de brytpunkter som vi anser behövs. Vi har inte fasta brytpunkter kopplade till existerande läsplattor/telefoner. Vi väljer istället de brytpunkter som passar vår design. Fasta brytpunkter skulle kunna vara skärmstorlek på en iPad2 eller iPhone 7 eller Samsung Galaxy. I porträttläge och/eller landskap. Men vi väljer alltså inte att hålla oss fast till dessa enheter utan väljer brytpunkter mer fritt.

Så här kan en media query se ut när skärmens bredd blir mindre än 900 pixlar.

```less
@media screen and (max-width: 900px) {
    .site-logo-text {
        width: 40%;
    }

    .navbar2 {
        width: 50%;
    }

    .profile {
        width: 10%;
    }
}
```

Pröva att styla din webbplats responsivt med media queries. Försök få menyn att flyta och fungera på mindre enheter och när bredden blir alltför smal så visar du enbar hamburger-meny. Testa hur webbplatsen dbwebb.se fungerar när bredden blir mindre och mindre, så får du ett exempel på hur det kan fungera.

Jag har gjort en enkel variant och min exempelkod finns i kursrepot under `example/anax-flat/theme/media-queries.less`. Kika gärna där för tips.

Var noga med att lägga dina mediaqueries i slutet av LESS-koden, ordningen är viktig för hur CSS-reglerna tolkas. Öppna devtools om du är osäker på vilken ordning som reglerna tolkas i.



Make upgrade {#upgrade}
-------------------------------

Låt oss förbered makefilen för att uppgradera alla externa LESS moduler via en `make upgrade`.

```text
# target: upgrade                 - Upgrade external LESS modules.
.PHONY: upgrade
upgrade: upgrade-normalize upgrade-responsive-menu
	@$(call HELPTEXT,$@)
```

Jag hoppas du ser hur en makefil kan vara till hjälp att hålla ditt projekt uppdaterat samtidigt som det kan spara din värdefulla tid.



Testa ditt repo {#maketest}
-------------------------------

Du kan använda `make test` för att testa, *linta*, alla CSS- och LESS-filer i ditt repo. Det är bra så det inte slipper med några fel.

```text
$ make test
```

Om du får fel så försöker du rätta till dem.

Du kan ignorera CSS-felen som kommer från externa moduler. Så som vi jobbar för tillfället innebär det att vi får ignorera alla CSS-felen eftersom vår makefile inte kan skilja på vår egen kod och kod från externa moduler i lint-fasen. Kanske skulle man vilja att den gjorde det. Man kan ju rätta sina egna CSS-valideringsfel, inom rimliga gränser, men externa moduler får man nog ignorera oavsett vad.



Commita alla ändringar till GitHub {#commit}
-------------------------------

Du behöver nu lägga till alla filer som skall finnas i ditt tema-repo. Börja med att kolla vilka filer som inte är inkluderade i repot via kommandot `git status`.

```text
$ git status
```

Lägg nu till de filerna som skall finnas i repot med `git add`.

```text
$ git add <filename to add>
```

När du är klar kan du committa ändringarna och pusha upp dem till GitHub.

```text
$ git commit -a -m "Added LESS modules"
$ git push
```



Tagga ditt repo {#tag}
-------------------------------

Tagga nu ditt repo med en version så vi kan gå tillbaka till den kodbasen du hade vid detta tillfället.

```text
$ git tag -a 1.0.0 -m "First version"
$ git push --tags
```

Du kan lista vilka taggar du har med `git tag`.

Vill du göra fler uppdateringar och tagga dem så inkrementerar du tredje siffran. Så här: 1.0.1, 1.0.2 och så vidare.



Avslutningsvis {#avslutning}
------------------------------

Du har sedan tidigare kommit igång med Anax Flat och du kan anpassa webbplatsen med ditt eget innehåll. Nu har du även kunskap om hur du kan anpassa stylen och göra den till "din egen", grunden till ditt eget tema baserat på LESS moduler.

Artikeln har en [egen tråd i forumet](t/6978) där du kan ställa frågor eller bidra med tips och trix. 
