---
author: mos
category: webbprogrammering
updated: "2015-10-21 00:20:53"
created: "2014-03-13 15:57:21"
...
Bygg ett tema med LESS till Anax-MVC
==================================

Ett tema är webbplatsens utseende, det sätter stylen, färgen, typsnittet och hur informationen layoutas på sidan. Ett tema kan vara utbytbart, genom att byta ut temat kan webbplatsen, med samma innehåll, få ett helt annat utseende, via några enkla rader i en konfigurationsfil.

Så, låt oss bygga ett tema från grunden och se vilka byggstenar det innehåller. Vi bygger ett responsivt tema på LESS, med hjälp av "The Semantic Grid", "Font Awesome", typografi från Lydia och vi lånar lite kunskap från Bootstrap. Det färdiga temat skall användas i Anax-MVC.

<!--more-->


Förkunskaper {#forkunskaper}
------------------------------

LESS är ett högnivå språk för CSS, du skriver CSS-kod plus ett antal nya funktioner likt variabler och funktioner. Din LESS-fil kompileras via en kompilator till en CSS-fil. I denna övningen förutsätts att du installerar och använder ["A style.php to autocompile LESS with lessphp"](opensource/stylephp). Du behöver inte kunna LESS, se denna övningen som en möjlighet att komma in i LESS och få en första möjlighet att se dess uppbyggnad och möjligheter.

Det är bra om du är bekant med [ramverket Anax MVC](kunskap/anax-som-mvc-ramverk). Vill du följa de kodexempel som visas så behöver du en egen installation av Anax MVC.



Vad är ett tema? {#vad-tema}
------------------------------

I renodlade ramverk brukar det inte finnas med teman. I ramverk förutsätts att man bygger det delen själv. Men, tittar vi på "Content Management Systems" (CMS) så är temat en central del som är oerhört viktig. De tre stora -- WordPress, Drupal och Joomla, har alla tre ett stort antal teman som är skräddarsydda till respektive ramverk. Behöver du inspiration till ett tema så kan du kika in på deras tema-kataloger. 

Joomla har ett [*extension directory*](http://extensions.joomla.org/) där man kan hitta tema-relaterade delar, söker man på *Joomla themes* så får man upp ett stort antal webbplatser som marknadsför Joomla teman, men utanför den officiella webbplatsen.

Drupal har en [tema-katalog](https://drupal.org/project/project_theme) och likaså har [WordPress](http://wordpress.org/themes/). Kika gärna på WordPress teman, de ger en bra översikt över olika varianter av teman. Där finns mycket inspiration att hämta, och kunskap, för att etablera en kravbild om vad ett tema egentligen är.

Det finns också mer renodlade teman för enbart HTML och CSS, teman som inte är kopplade till ett ramverk. Webbplatsen [ThemeForest](http://themeforest.net/) har tusentals teman och templates skrivna för vanliga webbplatser i HTML och CSS. Sök också på *HTML CSS theme* eller *HTML CSS templates* så hittar du ännu mer.

När du bygger egna teman kan du också utgå från något av de CSS-ramverk som finns. Till exempel så är [Twitters Bootstrap](http://getbootstrap.com/) ett populärt ramverk att bygga sitt tema på. 

Ett CSS-ramverk innehåller en grundstruktur att bygga vidare på. Det kan användas direkt, men ofta vill man förändra grunden till att bli mer personlig. Men CSS-ramverk är bra att studera, de innehåller ofta väl strukturerad kod.

Vill vi skriva teman, eller låna teman, så finns det alltså en hel del att hitta. Men nu ska vi bygga ett eget, från grunden.



Vad innehåller ett tema? {#vad-tema}
------------------------------

Ett enkelt tema innehåller en template, en fil som definierar HTML-strukturen. Till denna kopplas en stylesheet och ibland även JavaScript. Det handlar om webbplatsens utseende och layout och tanken är att kunna byta ut temat utan att ändra webbplatsen inre struktur och innehåll.

Temat är en mall som används för att presentera innehållet.

Det finns ingen standard för hur teman skall struktureras i koden. Ett tema i Drupal och ett tema i WordPress har två skilda upplägg som båda kan kräva en hel del insats för att lära sig. Men, grundtanken handlar alltså om att visa upp webbplatsens innehåll i en passande stil och layout.

Låt oss skapa ett tema i Anax-MVC för att se hur det kan fungera.



Skapa ett nytt tema i Anax-MVC {#tema}
------------------------------

Gå till din installation av Anax-MV och skapa ett nytta tema, gör så här.

1. Skapa en ny tema-katalog, jag döper mitt tema till `anax-grid`.

```bash
cd Anax-MVC
mkdir theme/anax-grid
```

2\. Jag kopierar templaten `index.tpl.php` från temat `anax-base`, så att jag har något att utgå ifrån.

```bash
cp theme/anax-base/index.tpl.php theme/anax-grid
```

3\. Kopiera den befintliga config-filen för temat.

```bash
cp app/config/theme.php app/config/theme-grid.php
```

4\. Editera din nya config-fil så att den pekar på ditt nyskapade temat.

`app/config/theme-grid.php`

```php
/**
 * Settings for Which theme to use, theme directory is found by path and name.
 */
'settings' => [
    'path' => ANAX_INSTALL_PATH . 'theme/',
    'name' => 'anax-grid',
],
```

Mitt namn på temat, och katalogen, är `anax-grid`.

5\. Skapa en frontkontroller som använder det nya temat. Jag döper min frontcontroller till `webroot/theme.php`
. Du kan välja din egen config-fil så här.

`webroot/theme.php`

```php
$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');
```

Så här kan det se ut om du lägger till en default route i din frontkoontroller.

[FIGURE src=/image/snap/tema-nytt-tema.png?w=w2&sa=jpg caption="En sida i det nya temat, något att bygga vidare på."]

Sådär, nu har du ett nytt tema som du kan börja bygga vidare på.



Tema med LESS {#less}
------------------------------

Det första jag vill göra är att använda LESS i mitt nya tema. Jag skapar katalogen `webroot/css/anax-grid` och klonar [`style.php`](opensource/stylephp) dit.

```bash
cd Anax-MVC/webroot/css
git clone https://github.com/mosbth/stylephp.git anax-grid
chmod 777 anax-grid
cd anax-grid
```

Jag tömmer filen `style.less` och lägger in följande rader i den.

`webroot/css/anax-grid/style.less`

```css
@import "../style.css";
@import "../navbar.css";
```

Det går bra att importera befintliga CSS-filer och blanda CSS-kod med LESS-kod. Det är en sak som gör det enklare att komma igång med LESS.

I temats config-fil ändrar jag så att `style.php` används som stylesheet.

`app/config/theme-grid.php`

```php
// Stylesheets
//'stylesheets' => ['css/style.css', 'css/navbar_me.css'],
'stylesheets' => ['css/anax-grid/style.php'],
```

Sådär, nu har vi ett tema med LESS, vi har ännu inte skrivit någon LESS-specifik kod, men strukturen finns på plats. Nu är det upp till oss hur mycket LESS vi vill skriva, som du ser så går det bra att använda vanlig CSS-kod, även när man använder en LESS kompilator.

Kontrollera att ditt tema fungerar, det bör det göra.



Flytta CSS-kod till att bli till LESS {#less}
------------------------------

När jag bygger upp en stylesheet med LESS brukar jag dela upp koden i olika filer och jag vill helst inte blanda CSS-filer och LESS-filer. I exemplet ovan laddas varje CSS-fil ned som en egen resurs, det kan du se om du använder Firebug (Net) och ser vilka resurser som sidan laddar. Jag vill hellre låta LESS-kompilatorn slå ihop alla filerna till en stor fil, det blir effektivare så. I längden behöver jag göra så här för att automatiskt komprimera den resulterande CSS-filen.

Det jag behöver göra är att kopiera de befintliga CSS-filerna och döpa om dem med filändelsen `.less`, det är allt som behövs. 

```bash
cd webroot/css/anax-grid
cp ../style.css structure.less
cp ../figure.css figure.less
cp ../navbar.css navbar.less
```

Jag kopierar helt enkelt ned alla CSS-filer som jag tidigare importerat, och döper om dem med filändelsen `.less`. Jag får gå igenom alla filer jag kopierat och dubbelkolla att de inte importerar några filer i sig. Det visade sig att `style.css` importerade `figure.css` så den filen får jag också kopiera. Jag vill ha alla `@import` i min översiktliga `style.less`. 

Jag ser att jag har både strukurell information och typografisk information i min nya `structure.less`. Jag väljer att flytta den typografiska delen till en egen `typografy.less`.

Det uppdaterade `style.less` ser ut så här för mig.

```css
@import "structure.less";
@import "typography.less";
@import "navbar.less";
@import "figure.less";
```

När du har flyttat runt koden i olika filer så får du ett mer renodlat upplägg för LESS-filerna. Dubbelkolla i Firebug Net -- du bör se att numer laddas enbart en resurs för stylen, `style.php`.

Ditt tema skall fungera precis som tidigare, du har bara gjort lite omflyttningar.



En grundstyle för alla webbläsare med Normalize {#normalize}
------------------------------

Olika webbläsare har olika grundstyle. Jag behöver hjälp att nollställa denna grundstyle, eller egentligen, jag vill bara se till att grundstylen är konsistent mellan olika webbläsare. Detta kan [normalize.css](http://necolas.github.io/normalize.css/) hjälpa mig med.

Jag hämtar normalize.css från GitHub. Kan du inte använda kommandot `wget` så hämtar du den med din webbläsare och sparar filen som `normalize.less`.

```bash
wget http://necolas.github.io/normalize.css/3.0.0/normalize.css -O normalize.less
```

Importera normalize överst i din `style.less` så är du klar. Du har använt din första *LESS-modul* i ditt tema. Det finns inget som direkt heter *LESS-modul*, men visst kan man se att man återanvänder normalize som en modul? 

Kontrollera att du har normalize med genom att titta på CSS-koden som genereras. Du bör se att de nya HTML5-elementen är med.



Regioner för att placera innehållet {#regioner}
------------------------------

Jag vill ha ett tema med flera regioner. En region är en del av temat som kan husera innehåll, där vyer kan renderas. För vissa regioner skall gälla att om det finns innehåll i regionen, så skall det visas, annars visas inte regionen.

I Drupal finns ett standardtema Bartik som har ett antal regioner, det ser ut så här.

[FIGURE src=/image/skitch/20120419-bartik-drupal-default-installation.jpg?w=w2 caption="Drupals Bartik-tema med ett antal regioner."]

Jag vill göra en variant av det temat, ett tema med regioner som ser ut så här.

[FIGURE src=/image/snap/tema-regioner.png?w=w2 caption="Så här tänkte jag att det skulle se ut när vi är klara med regionerna i temat."]

Tanken är att placera ut regionerna enligt ett tänkt rutnät, ett *grid*.

Allt som allt handlar det om följande regioner.

| Region            | Förklaring och möjligt innehåll |
|-------------------|---------------------------------|
| header            | Sidans titel, slogan och logo |
| flash             | Att "flasha" viktig information eller visa bild eller bildspel. |
| featured 1-3      | Att visa upp extra viktigt innehåll. |
| main              | Sidans huvudsaklinga innehåll. |
| sidebar           | Sidebar med relaterat innehåll och länkar. |
| triptych 1-3      | Att visa upp viktigt innehåll. |
| footer column 1-4 | Bra att ha länkar och innehåll i footern. |
| footer            | Copyright och länkar. |

Dessutom behöver navbaren ha sin egen region, precis som den redan har.

För att lägga till alla regioner så uppdaterar vi temats `index.tpl.php`. För varje region lägger vi till motsvarande kod.

`index.tpl.php`

```html
<?php if ($this->views->hasContent('flash')) : ?>
<div id='flash'><?php $this->views->render('flash')?></div>
<?php endif; ?>
```

Jag vill bara rendera regionen om det finns innehåll i den, därav if-satsen.

När det gäller regioner som är delade, som till exempel triptych, så skapar jag de regionerna med en wrapper. Det behövs när regionernas höjd blir olika, annars blir flödet i den tänkta *raden*, inte som planerat.

`index.tpl.php`

```html
<?php if ($this->views->hasContent('triptych-1', 'triptych-2', 'triptych-3')) : ?>
<div id='wrap-triptych'>
    <div id='triptych-1'><?php $this->views->render('triptych-1')?></div>
    <div id='triptych-2'><?php $this->views->render('triptych-2')?></div>
    <div id='triptych-3'><?php $this->views->render('triptych-3')?></div>
</div>
<?php endif; ?>
```

Det vi har skapat nu är en HTML-struktur med regioner där innehåll kan renderas.

Nu skall vi styla regionerna och placera ut dem på tänkt plats på webbsidan.



Gridlayout med The Sematic Grid {#semanticgr}
------------------------------

Nu gäller det att styla regionerna, så att de hamnar på rätt plats med rätt storlek. För att göra det tänker jag använda mig av ett LESS-baserat grid-ramverk som heter [The Semantic Grid System](http://tylertate.github.io/semantic.gs/). 

Ett snabbt sätt att få tillgång till stylesheeten som ger mig rutnätet, är att klona hela projektet och sedan kopiera `grid.less` till min temakatalog.

```bash
git clone https://github.com/tylertate/semantic.gs.git
cp semantic.gs/stylesheets/less/grid.less .
```

Nu kan jag importera `grid.less` i min `style.less` som numer ser ut så här.

`style.less`

```css
// Make all browser style look the same
@import "normalize.less";

// Gridlayout
@import "grid.less";

// Variables to customize
@import "variables.less";

// Add layout and structure
@import "structure.less";

// The rest of the files follows...
```

Nu är `grid.less` på plats. Kika i filen, den innehåller inte så mycket. Men den är mycket hjälpsam och låter mig styra regionernas utseende enbart via stylesheeten. Det behövs inga styrkoder eller klasser i HTML-koden.

Jag *flyttade* ned variablerna som bestämmer rutnätets storlek, från `grid.less` till en egen `variables.less`. Tanken är att ha en egen fil med variabler som kan ändras för att anpassa temats utseende. 

**`variables.less`**

```css
/**
 * Variables to customize theme
 */
@column-width: 30;
@gutter-width: 20;
@columns: 12;
//@total-width: 100%;
```

Denna filen kan vi bygga på med mer detaljer, eller vad sägs om en plats för att ändra bakgrundsfärgen, eller typsnittet? Variabler är en enkel men kraftfull konstruktion i LESS.



Ett tänkt rutnätet {#visa-grid}
------------------------------

Om vi ser på inställningarna i rutnätet, så är det antal kolumner, en kolumnbredd och ett tomrum mellan kolumnerna. Det kan vi visa upp i en bild.

[FIGURE src=/image/tema/grid_12_60_20.png?w=w2 caption="Bild som representerar det tänkta rutnätet."]

Sedan tar vi den bilden och upprepar den som bakgrundsbild och vi kan få en känsla för hur rutnätet ser ut.

[FIGURE src=/image/snap/tema-visa-grid.png?w=w2 caption="Visa rutnätet i bakgrunden."]

Jag har en `div#wrapper` som omsluter alla mina regioner, det är på den som jag lägger rutnätet som en bakgrundsbild, så här.

```css
#wrapper {
    background-image: url(grid_12_60_20.png);
}
```

Som en extra bra att ha-feature kan du lägga till att visa rutnätet varje gång du lägger till `?show-grid` på en länk. Det kan vara en bra sak att ha vid felsökningar, när du vill se att allt är placerat korrekt i rutnätet.



Styla regionerna med Semantic Grid {#reg-style}
------------------------------

Då gäller det att börja styla, för varje region bestämmer vi hur många kolumner den skall sträcka sig över. Vi använder `.column()` som är en LESS mixin och som parameter skickar vi in antalet kolumner.

`webroot/css/anax-grid/structure.less`

```css
#header,
#navbar,
#flash,
#footer {
    .column(@columns);
}

#main {
    .column(@columns / 3 * 2);
}

#sidebar {
    .column(@columns / 3);
}

#featured-1,
#featured-2,
#featured-3,
#triptych-1,
#triptych-2,
#triptych-3 {
    .column(@columns / 3);
}

#footer-col-1,
#footer-col-2,
#footer-col-3, 
#footer-col-4 {
    .column(@columns / 4);
}
```

Ser du att vi kan använda variabler och räkna med dem i LESS? Ett bra tillskott i vår LESS/CSS verktygslåda.

Det är en bra idé att lägga till en `margin-bottom: 22px;` på alla regionerna också, så det blir lite luft mellan dem. Varför 22px? Vi kan prata mer om det när vi pratar typografi och horisontellt grid, längre ned i denna artikel.

Wrappern stylar jag på följande sätt.

`webroot/css/anax-grid/structure.less`

```css
#wrap-featured,
#wrap-main,
#wrap-triptych,
#wrap-footer-col {
    .clearfix();
}
```

Konstruktionen `.clearfix()` är en mixin som följer med Sematic Grid. Den ser till att wrappern omsluter alla elementen.

Till slut kan jag göra en ny route som fyller innehåll i alla regioner, det kan se ut så här.

`webroot/theme.php`

```php
$app->router->add('regioner', function() use ($app) {

    $app->theme->addStylesheet('css/anax-grid/regions_demo.css');
    $app->theme->setTitle("Regioner");

    $app->views->addString('flash', 'flash')
               ->addString('featured-1', 'featured-1')
               ->addString('featured-2', 'featured-2')
               ->addString('featured-3', 'featured-3')
               ->addString('main', 'main')
               ->addString('sidebar', 'sidebar')
               ->addString('triptych-1', 'triptych-1')
               ->addString('triptych-2', 'triptych-2')
               ->addString('triptych-3', 'triptych-3')
               ->addString('footer-col-1', 'footer-col-1')
               ->addString('footer-col-2', 'footer-col-2')
               ->addString('footer-col-3', 'footer-col-3')
               ->addString('footer-col-4', 'footer-col-4');

});
```

Resultatet av routen ser ut så här för mig.

[FIGURE src=/image/snap/tema-regioner-visa-grid.png?w=w2 caption="Alla regioner strukturerade på rätt plats."]

Nu har vi kommit rätt långt. Vi har ett tema, baserat på ett grid, med ett antal regioner som vi kan visa dynamiskt, beroende på om de har innehåll i sig eller ej. 

Visst låter det bra?

Vi har tidigare pratat om hur man [lägger till vyer till en region](kunskap/anax-som-mvc-ramverk#view-container). Det kan vara bra att titta tillbaka på hur det fungerade.

Tanken är nu att du kan lägga till vyer till regionerna. En region kan innehålla godtyckligt antal vyer och du kan sortera dem i den ordning du vill.



Typografi och horisontellt grid {#typografi}
------------------------------



###Om typografiskt rutnät {#typogrid}

Det vi använt hittills är ett vertikalt rutnät. För att göra det extra vackert ska vi nu använda ett horisontellt rutnät också. Det innebär i korthet att allt som placeras ut, rutor eller innehåll, har en höjd som är en multipel av ett *magiskt tal*. Mitt magiska tal är 22. Alltså skall alla element, rutor som typografi som mellanrum, vara en multipel av 22 så att de alltid hamnar på en tänkt horisontell linje. Dessa linjer blir vårt horisontella rutnät.

För att lyckas med detta måste man definiera fontstorlekar så att radhöjden och mellanrummet mellan paragrafer och rubriker, alltid matchar det magiska talet. Det är lite pyssligt och man måste ha en viss struktur när man gör det. Men det blir vackert.

Vill du läsa om bakgrunden till det som vi gör här, så finns en utmärkt artikel i ["Technical Web Typography: Guidelines and Techniques"](http://coding.smashingmagazine.com/2011/03/14/technical-web-typography-guidelines-and-techniques/).



###Låna LESS-kod av ramverket Lydia {#lana-typo}

Att bygga upp en struktur för ett horisontellt rutnät är alltså en historia för sig, jag tänker göra det enkelt för mig, och dig, genom att låna en stylesheet där jag redan gjort detta. I ramverket Lydia finns en LESS-fil som hanterar typografi på ett sätt som möjliggör ett horisontellt rutnät. Jag lånar den och skriver över min befintliga `typography.less`.

```bash
wget https://raw.github.com/mosbth/lydia/master/themes/base/style/typography.less
```

Hmmm, nu blir det lite jobbigare, `typography.less` är beroende av variabler och mixins från Lydia. Men, jag tar och lånar de filerna också. 

```bash
wget https://raw.github.com/mosbth/lydia/master/themes/base/style/variables.less
wget https://raw.github.com/mosbth/lydia/master/themes/base/style/mixins.less
wget https://raw.githubusercontent.com/mosbth/lydia/master/themes/base/style/css3mixins.less
```

Jag inkluderar alla filerna i min `style.less`.

`style.less`

```css
// Make all browser style look the same
@import "normalize.less";

// Variables to customize
@import "variables.less";

// Mixins
@import "mixins.less";

// CSS3 Mixins
@import "css3mixins.less";

// Gridlayout
@import "grid.less";

// Typography
@import "typography.less";

// Add layout and structure
@import "structure.less";
```

Nu börjar stylesheeten växa, och vi kopierar in lite kod från här och var, det är både bra och dåligt. Framförallt kan vi behöva ha koll på vad vi inkluderar, kanske finns det beroenden som vi inte ser, eller duplicerande av kod? All kod vi tar in måste vi granska och se om den passar eller om det behövs omskrivningar. 

Det är en övning jag överlåter till dig, det vi precis gjorde kan behöva en översyn. Men jag kör på enligt taktiken "ser det ut att funka så gör det nog det".



###Testa det horisontella rutnätet {#testa-hgrid}

Vi lånar en sak till från Lydia, en testfil som innehåller en del typografiska konstruktioner.

```bash
wget https://raw.github.com/mosbth/lydia/master/themes/base/style/typography.html
```

Jag skapar en ny route där jag läser in innehållet och visar upp det i rutnätet. Vilar alla rader mot det horisontella rutnätet?

[FIGURE src=/image/snap/tema-typografi-grid.png?w=w2 caption="Lutar alla rader mot rutnätet, både i main och sidebar?"]

Du kan själv utvärdera hur bra det ser ut, om texten lutar på raderna i rutnätet så är det ett tecken på harmoni. Du kan också se om texten i regionen main är i synk med texten i sidebaren? Även om den inte alltid är i synk, tabeller och listor kräver lite annorlunda rytm, så kanske de hamnar i synk efterhand?

I mitt exempel så hamnade texten ur rutnätet efter `<h3>`, det är ett tecken på att det elementet inte är konfigurerat enligt rutnätet. Det rör sig inte om mycket, men ett tränat öga ser när pixlarna inte ligger i fas. Men det kan också bero på hur de andra elementen är rätt konfigurerade. Det finns alltså möjligheter att förbättra koden som vi lånat av Lydia. 

Vågar du försöka dig på det, att förbättra inställningarna för typografin?

Hur som, nu har du en grund till ett horisontellt rutnät, något som skapar harmoni och rytm i din webbplats.



Font Awesome {#fontawesome}
------------------------------

Att få skalbara vektor-ikoner via ett typsnitt låter spännande, det är precis vad vi får med [Font Awesome](http://fortawesome.github.io/Font-Awesome/) (FA).

Vi kan inkludera FA via en vanlig stylesheet, men, vi vill inkludera allt från FA, in i vår egen LESS-fil i vårt eget ramverk. Här finns alternativen hur du [kommer igång med FA](http://fortawesome.github.io/Font-Awesome/get-started/). 

Jag väljer att ladda ned senaste versionen så här.

```bash
wget https://github.com/FortAwesome/Font-Awesome/archive/v4.0.3.zip
unzip font-awesome-4.0.3.zip
```

Jag behöver gå in och ändra sökvägen till fontfilern i `font-awesome-4.0.3/less/variables.less`.

För min del blev det följande sökväg.

`font-awesome-4.0.3/less/variables.less`

```css
@fa-font-path:        "font-awesome-4.0.3/fonts";
```

Får du problem kan du titta i Firebug vilken sökväg som används till resurserna och om den är korrekt. Laddas resurserna som de ska?  

Sedan inkluderar vi stylesheeten från FA i vår egen `style.less`.

`style.less`

```css
// Font Awesome
@import "font-awesome-4.0.3/less/font-awesome.less";
```

Jag behöver en ny sida, en route som visar upp lite exempel på hur FA används och kan se ut. Du kan säkert skapa en egen testsida utifrån exemplen på FAs sida.

Så här blev min sida.

[FIGURE src=/image/snap/tema-font-awesome.png?w=w2 caption="Testsida med exempel på Font Awesome."]

Smidigt, nu kan vi använda skalbara ikoner från typsnittet istället för att rita bilder i photoshop, och allvarligt talat, photoshop och liknande verktyg har aldrig varit min starka sida så det här gillar jag.



Bootstrap {#bootstrap}
------------------------------

[FIGURE src=/image/snap/bootstrap-web.png&amp;w=c6 caption="Bootstrap -- värt att undersöka." class=right]

[Bootstrap](http://getbootstrap.com/) är ett spännande tema-projekt som man kan använda som grund till sitt eget tema. Det innehåller en stor mängd LESS-filer, bland annat. 

Det vi har gjort så här långt är att handplocka ihop vårt eget Bootstrap. Det är ett bra tillvägagångssätt, speciellt när man vill lära sig, eller när man vill ha full koll på de delar man plockar in.

Nu när du kan lite om hur man bygger upp en LESS-fil, så kan du dra nytta av att studera Bootstraps motsvarighet till `style.less`, det vill säga [`bootstrap.less`](https://github.com/twbs/bootstrap/blob/master/less/bootstrap.less). Att lära av de bästa är alltid en bra taktik. Kika också på vilka LESS-filer som [Bootstrap är uppbyggt av](https://github.com/twbs/bootstrap/tree/master/less), känner du igen något?

En sak som jag gärna lånar av Bootstrap är deras [`mixins/vendor-prefixes.less`](https://github.com/twbs/bootstrap/blob/master/less/mixins/vendor-prefixes.less). Det är en wrapper kring de CSS-konstruktioner som kräver browser-specifika prefix.

Fortsätt kika i katalogen [`mixins`](https://github.com/twbs/bootstrap/tree/master/less/mixins) så kan du hitta fler godbitar som du kan låna och resultatet blir att du skriver bättre LESS-kod. Nu vet du hur du gör för att inkludera andra LESS-filer i din egen. Låna det som ser bra ut.

LESS har givit oss en bättre möjlighet att skriva CSS-kod som är återanvändbar som moduler. Det är bra det.



Mobile first och responsivt tema {#responsivt}
------------------------------

Du läste kanske att Bootstrap är designat ur aspekten *Mobile first*. De har börjat med att designa Bootstrap så att det ser bra ut på små enheter, sedan har de skalat upp och testat att det ser bra ut på större enheter. HTML-strukturen är byggd för att klara av `@media` frågor som ändrar webbplatsens utseende beroende på terminalens bredd.

Vi kan testa att göra vår webbplats responsiv, bara för att känna på konceptet.

Börja med att sätta en max bredd för `#wrapper`, det är största möjliga bredd som vi tänker oss.

`structure.less`

```css
#wrapper {
    max-width: 960px;
}
```

Sedan ändrar vi rutnätet att använda % istället för fasta pixel-bredder.

`variables.less`

```css
// Set @total-width to 100% for a fluid layout
//@total-width: @gridsystem-width;
@total-width: 100%;
```

Nu kan du dra i webbläsaren och se att webbplatsen har en max bredd och ju mindre den är desto mindre blir varje region.

Med `@media` kan vi sätta brytpunkter för när regionerna skall ändra sin storlek.

Jag använder skapar filen `responsive.less` och lägger in ett par brytpunkter i den. Så här ser koden ut när jag stylar `#footer-col-1` till `#footer-col-4`, vid de tre brytpunkterna.

`responsive.less`

```css
/* Extra small devices (phones, less than 768px) */
@media (max-width: 767px) {
    #footer-col-1,
    #footer-col-2,
    #footer-col-3, 
    #footer-col-4  {
        .column(@columns);
        margin-bottom: @magicNumber;
    }
}

/* Small devices (tablets, 768px and up) */
@media (min-width: 768px) {
    #footer-col-1,
    #footer-col-2,
    #footer-col-3, 
    #footer-col-4  {
        .column(@columns / 2);
        margin-bottom: @magicNumber;
    }
}

/* Medium devices (desktops, 992px and up) */
@media (min-width: 992px) {
    #footer-col-1,
    #footer-col-2,
    #footer-col-3, 
    #footer-col-4 {
        .column(@columns / 4);
        margin-bottom: @magicNumber;
    }  
}
```

Kanske vill du inte visa alla regioner vid alla bredder? Då kan du dölja dem med `display: none`. 

Fortsätt och lägg till de andra regionerna så har du grunden till ditt eget responsiva tema.

**Tänk på** att CSS regler och prioriteringar fortfarande gäller när LESS har kompilerat filer till en CSS fil. Därför kan värdena i `responsive.less` ta över värden från `structure.less` (när det gäller `.columns`). Det är därför viktigt att du importerar filerna i "rätt" ordning i `style.less`.

Filen `responsive.less` bör ligga sist i din lista av importerade filer i `style.less`.



Bygg temat för att styla det {#styla}
------------------------------

Ett tema skall vara förberett för att styla. Många kunder vill ha sina webbplatser personliga och det är bra om ditt tema är enkelt att styla, utan att du behöver göra några större ändringar i HTML-strukturen. Här följer ett par taktiker som är bra att använda för att förbereda ditt tema för styling.



###Klasser i html-elementet {#klass-html}

Sätt en klass i html-elementet så ger det dig möjligheten att styla hela webbplatsen baserat på vilka klasser du sätter.

**HTML**

```html
<html class="summer rain">
```

**LESS**

```css
html.summer {
    background-image: url(sun.jpg);
}

html.rain {

    body {
        background-color: blue;
    }
}
```

Vilka klasser du skall sätta kan du ange i temats konfigurationsfil. Det ger dig *en* plats för att ändra temat från vår till sommar till höst och vinter.



###Klasser i body-elementet {#klass-body}

Sätt klasser i body-elementet som anger vilken typ av sida det är. Kanske hanterar du olika typer av information och du vill att alla blogg-sidor skall ha ett visst utseende. Då kan det vara bra att ange i body vad det är för typ av sida. Det blir enkelt att styla alla sidor av en viss typ.

**HTML**

```html
<body class="blog single">
```

**LESS**

```css
body.blog {
    &.single {
        color: pink;
    }
}
```

Tänk om du dessutom lägger till routen som en klass i body-elementet, det ger dig en möjlighet att styla varje sida individuellt genom att ange dess route som klass. Tänk en route som heter `blog/happy`.

**HTML**

```html
<body class="blog single blog-happy">
```

**LESS**

```css
body.blog-happy {
    background-image: url(smiley.jpg);
}
```

Med enkla medel kan du skriva kod som genererar denna typ av klasser i ditt tema. Det kan förenkla dina möjligheter att styla webbplatsen med ren CSS/LESS-kod.



###Lägg till vyer med styling element {#stylel}

Glöm inte att du har möjligheten att fritt lägga till vyer i de olika regionerna. Du kan också lägga till vyer som du sedan placerar ut med absolut positionering, eller relativ positionering och med olika z-index. Det ger dig oanade möjligheter att placera ut bilder och andra design element på sidan, lite var du vill.

Använd denna teknik rätt så kan du lösa de flesta design-utmaningar.



Avslutningsvis {#avslutning}
------------------------------

Nu har du allt du behöver som grund för att sätta ihop ditt eget tema i Anax-MVC. Finslipa det så att du blir nöjd.

Fråga gärna i forumet, det finns en särskild [tråd för tema i Anax-MVC](t/2253).



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2015-10-21 (E, mos) ny länk till Semantic.gs.  
2015-10-06 (D, mos) Not om CSS precedence i samband med responsive.less.  
2015-04-13 (C, mos) Inkludera css3mixins.less i style.less.  
2014-04-10 (B, mos) Förtydliga vyer kontra regioner, inkludera även Lydias css3mixins.less.  
2014-03-28 (A, mos) Första utgåvan som en del av kursen phpmvc version 2.  
</span>
