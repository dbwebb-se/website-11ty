---
author: mos
category:
    - kurs/design
    - anax flat
    - theme
    - less
    - css grid system
revision:
    "2017-11-03": (F, mos) Översyn inför ht17 och lade till repo i desinax/npm.
    "2016-11-01": (E, mos) Förtydligande om användning av container().
    "2016-11-01": (D, mos) La till avslutande div.
    "2016-10-26": (C, mos) Ändrade upplägg för clearfix och dess användning.
    "2016-10-24": (B, mos) La till en intro till artikeln.
    "2016-06-21": (A, mos) Första utgåvan.
...
Använd ett vertikalt grid med Anax Flat
===================================

[FIGURE src=/image/snapvt16/grid-displayed.png?w=c5&a=30,30,40,40 class="right"]

Vi har sedan tidigare byggt ett responsivt tema till Anax Flat och nu är det dags att bygga ut det baserat på ett vertikalt grid.

Vi skall använda LESS-moduler för att bygga ut vårt tema, delvis med *mixins* som hjälper oss att implementera ett grid, ett rutmönster där vi placerar ut webbsidans olika element.

<!--more-->

Vi är beroende av hur HTML-koden genereras av Anax Flat och det får vi ta hänsyn till när vi bygger vårt tema. Vi har ett mer eller mindre beroende mellan CSS- och HTML-koden. Låt oss hålla det beroendet till ett minimum.

Låt se hur det kan gå.



Förutsättning {#pre}
-------------------------------

Du har jobbat igenom materialet i artiklarna "[Bygg en me-sida med Anax Flat](kunskap/bygg-me-sida-med-anax-flat)" och "[Bygg ett tema till Anax Flat](kunskap/bygg-ett-tema-till-anax-flat)".



Exempel i kursrepot {#exempel}
-------------------------------

Informationen i denna artikel bygger på de exempelprogram som återfinns i kursrepot under [`example/grid`](/repo/design/example/grid/).

I [`example/grid/css/css`](/repo/design/example/grid/css) så bygger vi upp en enkel gridbaserad layout med CSS-klasser. Vi kikar på hur en sådan CSS-fil kan genereras med JavaScript. Detta fungerar som en introduktion till konceptet och för att komma igång med tankarna kring hur ett grid fungerar.

Vi går sedan raskt vidare till [`example/grid/less`](/repo/design/example/grid/less) där vi bygger ett liknande grid med LESS-kod som baseras på en modul som heter "The Semantic Grid System". Vi tittar på hur LESS-modulen med mixins löser det som vi tidigare löste med CSS/JavaScript.

Så här långt har vi koncepten om fluid och fixed grid. Nu för vi över det till ett responsivt grid med media queries.

I tredje exemplet [`example/grid/flex`](/repo/design/example/grid/flex) visar vi hur tekniken med CSS FlexBox kan användas i vårt LESS-baserade grid, som ett alternativ till layout med float.

Avslutningsvis finns det sista exemplet [`example/grid/fluid`](/repo/design/example/grid/fluid) som visar hur ett renodlat fluid-grid kan implementeras med antingen float eller flexbox som modell för layouten.

Det kan vara en god idé att du klickar runt bland exemplen innan du fortsätter att läsa. Det kan ju inte skada att få en visuell bild av vart artikeln tänker ta dig. Länkarna ovan leder dig till körbara exempel som du kan testa i din webbläsare.




Kompilera LESS i webbläsaren {#komp}
-------------------------------

Du behöver inte installera LESS i webbläsaren för att följa exemplet i kursrepot. Allt finns redan på plats i exempelkoden. Följande stycke är bara för att förklara hur exempelkoden är uppbyggd med tanke på LESS och kompileringen av LESS.

I de exempel som vi nu kommer att studera så valde jag att kompilera LESS på klientsidan med JavaScript. Det kan vara en bra teknik att jobba med när man utvecklar LESS. Man slipper kompilera om stylen efter varje ändring eftersom det sker automatiskt när man laddar om sidan.

För att använda kompilering av LESS i webbläsaren så använder man följande grund i HTML-koden.

```html
<link rel="stylesheet/less" type="text/css" href="less/layout-responsive-float.less">

<script>
less = {
    env: "development"
};
</script>
<script src="../../js/less.min.js"></script>
```

Man laddar ned scriptet med kompilatorn via [webbplatsen lesscss.org](http://lesscss.org/#download-options). I kursrepot finns detta redan nedladdat och ligger i katalogen [`example/js`](/repo/design/example/js).

Notera att länken till stylesheeten har `rel=stylesheet/less` och att man kan skicka in inställningar till kompilatorn via objektet `less`.

När man har en webbplats i produktion så vill man inte kompilera stylen på detta viset. Men vid utveckling så är det inte alls dumt. Bra att ha, helt enkelt.

Detta var enbart för att visa hur kompileringen av exempelkoden är uppbyggd.



Grid med CSS-klasser {#klass}
-------------------------------

Grunden för ett grid kan skapas på olika sätt. I denna artikeln skall vi använda ett klassiskt sätt som bygger på tekniken med *float*. Vi kommer också att titta på en senare teknik som bygger på *flexbox*.

I vårt grid vill vi undvika hårda kopplingar mellan CSS- och HTML-koden. Vissa grid-system har varianter med grid-klasser som man lägger in i HTML-koden. Så här.

```html
<div class="row">
    <div class="column-3">Column 3</div>
    <div class="column-3">Column 3</div>
    <div class="column-3">Column 3</div>
    <div class="column-3">Column 3</div>
</div>
```

Säg sedan att vi har följande CSS-kod.

```css
.row {
    display: block;
    width: 960px;
    margin: 0;
}

.column-3 {
    display: inline;
    float: left;
    width: 220px;
    margin: 0 10px;
}
```

Nu har vi grunden till ett grid som ger oss en rad som består av kolumner. En kolumn kan ha olika storlekar och en viss marginal till nästa kolumn, en *gutter*.

Ovan har vi ett grid med fast bredd, _fixed width grid_. Om man istället för pixlar låter bredden vara baserad på procent, så får man ett *fluid* grid som ändrar sig efter webbläsarens bredd. Ett fluid grid är grunden för ett *responsivt* grid som kompletterats med media queries.

Det vi har är alltså rader och kolumner där varje kolumn kan fyllas med innehåll. Vi får ett strukturerat sätt att placera ut innehåll på vår webbplats. Innehåll skall placeras i en region, i en ruta, eller kolumn om man så vill.

Det kan se ut så här.

[FIGURE src=/image/snapvt16/grid-fixed.png?w=w2 caption="Ett vanligt grid för en webbplats med rader och kolumner."]

I kursrepot design finns ett exempel som visar hur ett [fixed](/repo/design/example/grid/css/grid-fixed.html) och ett [fluid](/repo/design/example/grid/css/grid-fluid.html) grid kan se ut när man implementerar det med CSS-klasser. Testa det och se hur de båda griden fungerar när du ändrar webbläsarens bredd.



###Generera ett eget grid {#gen}

Gridet är baserat på ett antal CSS-klasser. CSS-klasserna genereras utifrån ett tänkt grid. I detta fallet är det 12 kolumner där varje kolumn är 60px bred och mellanrummet är 20px. När det är procent så omräknas pixlarna till %.

Vad händer då om man vill ha en annan storlek på gridet? Då kan man generera en ny CSS-fil. I exemplet finns med en [grid-generator](/repo/design/example/grid/css/generate-css.html) som via JavaScript skapar CSS-koden.

[FIGURE src=/image/snapvt16/grid-generate.png?w=w2 caption="Generera CSS-kod till ett grid med javaScript."]

Här kan du alltså sätta förutsättningar för det grid du vill ha och generera CSS-klasser som löser ditt grid. Välj `px` eller `%` för vilken typ av grid du vill skapa.

Låt nu se om vi kan förenkla vårt grid med LESS och mixins, för att göra det mer dynamiskt än de hårdkodade CSS-klasserna.



Grid med LESS mixins {#lessmixins}
-------------------------------

LESS har vissa egenskaper som liknar ett traditionellt programmeringsspråk och visst är det möjligt att utföra i LESS --- det som vi nyss utförde i JavaScript.

Vi skall nu kika på ett par enkla mixins som hjälper oss att skapa ett grid. 



###The Semantic Grid System {#semantic.gr}

Basen i vårt grid kommer från "[The Semantic Grid System](http://dbwebb-se.github.io/semantic.gs/webroot/)". Det är ett projekt som numer [inte verkar uppdateras](https://github.com/tylertate/semantic.gs/issues/94) och jag har valt att plocka ur grunden ur det och jobba vidare med den. Jag tycker koden är enkel och ren och på ett enkelt sätt visar hur ett grid kan fungera.

Jag gjorde en exempelsida där jag visar hur jag [använder orginalet](/repo/design/example/grid/less/grid-original.html), bara så jag ser att jag är någorlunda kompatibel. Du kan kika på [orginalets grid.less](/repo/design/example/grid/less/less/grid-original.less) och min aningen [uppdaterade grid.less](/repo/design/example/grid/less/less/grid.less). Det är inga stora skillnader.

Som du ser ryms nästan all kod i LESS-modulen inom en A4-sida. Det är inte mycket kod som behövs för att skapa ett grid.



###Grid med mixins {#mixins}

Låt oss kika på de mixins som finns i mitt aningen förändrade grid.



####Variabler {#grid-var}

I början finns det ett par variabler som anger storleken på gridet.

```less
// Default grid, change to fit your requirements.
@columnWidth:   60;
@gutterWidth:   20;
@columns:       12;

// Utility variable, you should never need to modify this
@gridSystemWidth: @columns * (@columnWidth + @gutterWidth) * 1px;

// Set @totalWidth to 100% for a fluid layout
@totalWidth: @gridSystemWidth; // Fixed layout
//@totalWidth: 100%;           // Fluid layout
```

Du känner igen dem sen tidigare. De sista två raderna bestämmer om det blir ett fix eller fluid grid.



####Mixin `.row()` {#row}

I HTML-koden som är förberedd för att stylas enligt grid kan en _rad_ se ut så här.

```html
<div class="row">
    <div class="flash"><span>flash</span></div>
</div>

<div class="row">
    <div class="info info-1"><span>info 1</span></div>
    <div class="info info-2"><span>info 2</span></div>
    <div class="info info-3"><span>info 3</span></div>
    <div class="info info-4"><span>info 4</span></div>
</div>
```

När det gäller raderna så ser det egentligen ut som tidigare, en CSS-klass pekar ut raderna.

Själva CSS-klassen skapas så här, i LESS-filen.

```less
.row {
    .row();
}
```

Man kan tycka att konstruktionen ovan, där vi skapar en CSS-klass `.row` genom att använda en mixin `.row()`, ser lite udda ut. Men det fungerar ypperligt.

För att förstå vad resultatet kommer att bli i CSS-klassen så kikar vi på mixinen.

```less
/**
 * All columns must be wrapped in a row.
 */
.row(@columns: @columns) {
    display: block;

    width: @totalWidth / @gridSystemWidth * (@gridSystemWidth + @gutterWidth);

    margin-left:  -1 * @totalWidth / @gridSystemWidth * @gutterWidth / 2;
    margin-right: -1 * @totalWidth / @gridSystemWidth * @gutterWidth / 2;

    .clearfix();
}
```

För att få en komplett bild så vill vi även se vad mixinen `.clearfix()` resulterar i.

```less
/**
 * A small clearfix:
 * http://stackoverflow.com/questions/211383/what-methods-of-clearfix-can-i-use
 */
.clearfix() {
    &::after {
        content: "";
        display: block;
        clear:both;
    }
}
```

Det är alltså en traditionell variant av *clearfix* som tvingar en omritning av layouten på webbsidan.

Om vi nu kopierar in ovanstående LESS-kod på webbplatsen [LESS2CSS](http://less2css.org/) så kan vi testa och se vilken CSS_kod som genereras.

[FIGURE src=/image/snapvt16/less2css.png?w=w2 caption="LESS2CSS kan hjälpa dig att utveckla och testa din LESS_kod."]

Du bör verkligen kopiera in koden för att se hur det ser ut i verktyget. Det kan hjälpa dig att förstå hur LESS blir till CSS och vilka konstruktioner som genererar vilken kod.

Rätt kod som genereras bör alltså bli följande.

```less
.row {
  display: block;
  width: 980px;
  margin-left: -10px;
  margin-right: -10px;
}
.row::after {
  content: "";
  display: block;
  clear: both;
}
```

Som du ser så har vi en fast bredd på raden, ett fixed grid. Men om du ändrar variabeln som styr typen av grid så får du ett fluid grid istället.

Får du problem med LESS2CSS kan du testa följande länk som bör [innehålla alla LESS-kod kopierad](http://goo.gl/7kT00b) på rätt sätt.



####Mixin `.column()` {#column}

Låt oss då se hur mixinen för `.column()` ser ut.

Vi har samma HTML-kod som tidigare.

```html
<div class="row">
    <div class="flash"><span>flash</span></div>
</div>

<div class="row">
    <div class="info info-1"><span>info 1</span></div>
    <div class="info info-2"><span>info 2</span></div>
    <div class="info info-3"><span>info 3</span></div>
    <div class="info info-4"><span>info 4</span></div>
</div>
```

Det finns alltså inga CSS-klasser som bestämmer vad som är kolumner. Det finns dock klasser som semantiskt berättar vilken typ av innehåll som finns. Det är det vi vill använda för att ge kolumnerna sin bredd.

Mixinen för `.column()` ser ut så här.

```less
/**
 * Create a column spanning @col columns.
 */
.column(@col, @columns: @columns) {
    display: inline;
    float: left;

    width: @totalWidth / @gridSystemWidth * (((@columnWidth + @gutterWidth) * @col ) - @gutterWidth);

    margin-left:  @totalWidth / @gridSystemWidth * @gutterWidth / 2;
    margin-right: @totalWidth / @gridSystemWidth * @gutterWidth / 2;
}
```

Vi behöver nu koppla ihop koden i mixinen med HTML-koden, det gör vi via layouten som jag valt att lägga i en egen LESS-fil, [`less/layout-fluid.less`](/repo/design/example/grid/less/less/layout-fluid.less).

Den viktiga delen för vårt exempel är följande rader som återfinns i layout-filen.

```less
.flash {
    .column(12);
}

.info {
    .column(3);
}
```

Här använder vi mixinen för `.column()` för att bestämma hur många kolumner i gridet som de olika HTML-elementen skall spänna över.

Ta LESS-koden ovan och lägg till i ditt exempel i LESS2CSS så ser du exakt vilken CSS-kod som genereras. Det är ett bra sätt att testa och felsöka, så ta det gärna som en vana att ha en flik öppen med LESS2CSS. 

Den genererade koden ser ut så här.

```css
.flash {
  display: inline;
  float: left;
  width: 940px;
  margin-left: 10px;
  margin-right: 10px;
}
.info {
  display: inline;
  float: left;
  width: 220px;
  margin-left: 10px;
  margin-right: 10px;
}
```

En fördel med `layout.less` är att vi kan styra all layout i den filen och vi "skräpar" inte ned HTML-koden med specifika grid/layout-klasser.



####En mixin för `.container()` {#container}

Till slut brukar ett grid innehålla en `.container()` mixin som omsluter, *wrappar*, alla rader i gridet.

Det kan se ut så här i HTML-koden.

```html
<div class="wrap">
    <div class="row">
        <div class="header"><span>header</span></div>
    </div>

    <div class="row">
        <div class="flash"><span>flash</span></div>
    </div>
</div> <!-- End of wrap -->
```

Det finns en mixin `.container()` eller `.container-fixed()` som kan användas till CSS-klassen `wrap`.

```less
/**
 * Wrap grid in a container.
 */
.container() {
    margin-right: auto;
    margin-left: auto;
}

.container-fixed() {
    .container();
    width: @gridSystemWidth - @gutterWidth;
}
```

Avslutningsvis så använder vi mixinen i CSS klassen `.wrap`. Jag väljer att använda containern utan en fast bredd, den är alltså fluid. Men jag sätter ändå en `max-width` för jag vill inte att den skall bli större än en viss bredd. Det blir alltså fluid med en max bredd.

```css
.wrap {
    .container();
    max-width: 960px;
}
```

Så här kan det se ut när allt är sammansatt och fungerar.

[FIGURE src=/image/snapvt16/grid-fluid.png?w=w2 caption="Ett fluid exempel av vårt uppdaterade grid baserat på LESS mixins."]

Du kan testa exemplet på [`less/grid-fluid.html`](/repo/design/example/grid/less/grid-fluid.html).



Fluid till responsivt {#resp} 
------------------------------------------

Ett fluid grid, som baseras på procent, skalar väl med webbläsarens bredd. För att göra det till ett responsivt grid så lägger vi till ett par media queries som ändrar storleken på utvalda kolumner vid ett par brytpunkter.

Värre än så är det inte att göra en fluid layout till en responsiv layout. Ett fluid grid skalar hela tiden med webbläsarens bredd. Ett responsivt kan välja att förändra utseendet på innehållet beroende på skärmens bredd.

Låt oss ändra vårt fluid grid till ett responsivt grid.



###Sätt en viewport {#viewport}

Sidor som är optimerade för olika enheter skall sätta en meta-header med `width=device-width` för att matcha skärmens bredd i enhets-oberoende pixlar.

```html
<meta name="viewport" content="width=device-width, initial-scale=1">
```

Vill du läsa mer om bakgrunden, så kika på Google Developers om "[Responsive web design basics](https://developers.google.com/web/fundamentals/design-and-ux/responsive/)".



###Lägg till media queries {#mediaq}

I min [`less/layout-responsive.less`](/repo/design/example/grid/less/less/layout-responsive.less) har jag lagt till ett par media queries som ser ut så här.

```less
// Make it responsive using media queries
@media (max-width: 1150px) {
    .pull-left,
    .pull-right {
        display: none;
    }
}

@media (max-width: 980px) {
    .wrap {
        margin-left: 8px;
        margin-right: 8px;
    }
}

@media (max-width: 800px) {
    .info {
        .column(6);
    }
}

@media (max-width: 700px) {
    .main,
    .triptych {
        .column(12);
    }

    .sidebar,
    .info {
        display: none;
    }
}
```

Det handlar om att när en viss kolumn blir alltför liten så låter jag den ta mer plats. När en kolumn tar mer plats så flyttar den nästa kolumn framför sig och vid behov en rad ned.

[FIGURE src=/image/snapvt16/grid-responsive.png?w=w2 caption="Ett responsivt grid ändrar storleken på kolumnerna med media queries."]

Du kan testa mitt responsiva exempel på [`grid-responsive.html`](/repo/design/example/grid/less/grid-responsive.html).



Ett grid på Anax Flat {#aflat}
-------------------------------

Vårt Anax Flat har en bestämd struktur av HTML-kod. Det är en vy som bestämmer hur HTML-koden genereras. För att applicera ett grid på Anax Flat behöver vi viss vetskap om hur HTML-koden generas.



###Standard vy för HTML i Anax {#defview}

Vill du inspektera den vyn som genererar HTML-koden så finns den i ditt Anax Flat under [`vendor/mos/anax/view/default/index.tpl.php`](https://github.com/mosbth/anax/blob/master/view/default/index.tpl.php).

Om du tittar på vyn så ser du att det finns en meta-header för viewport. Så den biten är klar.

Det som sedan är viktigt är hur grundstrukturen är. Ser den ut att vara förberedd för att stylas enligt ett sådant grid som vi jobbat med?

Grunden i vyn ser ut *ungefär* så här.

```html
<div class="outer-wrap outer-wrap-header">
    <div class="inner-wrap inner-wrap-header">
        <div class="row">
            <div class="header"><span>header</span></div>
        </div>
    </div>
</div>

<div class="outer-wrap outer-wrap-flash">
    <div class="inner-wrap inner-wrap-flash">
        <div class="row">
            <div class="flash"><span>flash</span></div>
        </div>
    </div>
</div>
```

Varje *rad* är omringad av en outer-wrap och en inner-wrap. Det är något vi kan utnyttja till styling, om vi vill.

Det finns två exempel som visar hur du kan styla gridet på HTML-kod likt Anax Flat. Det är [`less/grid-anax-flat.html`](/repo/design/example/grid/less/grid-anax-flat.html) och [`less/grid-anax-flat-rowbased.html`](/repo/design/example/grid/less/grid-anax-flat-rowbased.html).

Studera de två exemplen för att se hur de skiljer sig åt i respektive `layout.less`.



Ett grid med Flexbox {#flexbox}
-------------------------------

Vårt grid är baserad på tekniken med float. En nyare teknik, som kan tyckas vara lite mer vänlig mot CSS-programmeraren, är [Flexbox](https://www.w3.org/TR/css-flexbox-1/). När denna artikeln skrivs är vi fortfarande i ett läge där [Flexbox inte har fullt stöd](http://caniuse.com/#feat=flexbox) i alla webbläsare. Så, vill man ta det säkra före det osäkra så använder man float.

Men, bara för att visa hur ett grid baserat på flexbox kan se ut så finns det ett [exempel på grid med flex](/repo/design/example/grid/flex/). 

Skillnaden ligger i hur mixinen för `.row()` och `.column()` är implementerade. Här kan du se hur de använder `display: flex` som ett alternativ till float.

```less
/**
 * All columns must be wrapped in a row.
 */
.row(@columns: @columns) {
    display: flex;
    flex-flow: row wrap;

    margin-left:  -1 * @totalWidth / @gridSystemWidth * @gutterWidth / 2;
    margin-right: -1 * @totalWidth / @gridSystemWidth * @gutterWidth / 2;

    .clearfix();
}

/**
 * Create a column spanning @col columns.
 */
.column(@col, @columns: @columns) {
    flex: 0 0 auto;

    width: @totalWidth / @gridSystemWidth * (((@columnWidth + @gutterWidth) * @col ) - @gutterWidth);
    margin-left:  @totalWidth / @gridSystemWidth * @gutterWidth / 2;
    margin-right: @totalWidth / @gridSystemWidth * @gutterWidth / 2;
}
```

Läs om respektive konstruktion i artikeln om [flex på MDN](https://developer.mozilla.org/en-US/docs/Web/CSS/flex). Det kan vara en bra start för att lära sig mer om flex.



Ett fluid grid med float och flex {#fluidfloatflex}
-------------------------------

Man kan fråga sig om det numer kommer byggas speciellt många webbplatser som har en fast bredd. Vad tror du? Jag tror inte det. Med så många olika storlekar på läsplattor och mobiler så bör varje webbplats innehålla element av responsivitet. Användarna kräver det.

Så, med det i tanken så förädlar jag koden bakom gridet ytterligare en gång. Nu rensar jag bort koden som fanns för att stödja fast bredd och kvar blir ett grid som enbart är fluid. Men det räcker troligen rätt långt.

Det finns två exempel, ett som är gjort med tekniken [float](/repo/design/example/grid/fluid/grid-responsive-float.html) och ett som är gjort med [flex](/repo/design/example/grid/fluid/grid-responsive-flex.html). Kika på dem och ta fram koden bakom dem. Lägg koden sida vid sida och se vad som skiljer dem åt. Du kommer att märka att det inte är så stor skillnad.

En viktig likhet är att båda implementationerna av gridet har samma interface i form av mixins. Det innebär att du kan bygga en webbplats baserad på gridets mixins och du får möjlighet att byta ut gridets implementation, utan att störa webbplatsens utseende. Ett gemensamt interface, du kan välja float eller flexbox. Det är bra det, planerad kodåteranvändning och god kodstruktur även i LESS/CSS.



Visualisera gridet med en bakgrundsbildläsaren {#visual}
-------------------------------

När man utvecklar mot ett grid så vill man ibland dubbelkolla att man verkligen matchar mot det tänkta rutnätet.

[FIGURE src=/image/snapvt16/grid-displayed.png?w=w2 caption="Placera ut webbsidans innehåll som regioner i ett rutnät (grid)."]

I fallet ovan har jag kompletterat mitt grid med en mixin `.showGrid()` som hjälper mig att visualisera gridet.

```less
/**
 * Show grid.
 */
.showGrid(@maxWidth: 1100px) {
    background: url(/img/grid/grid950x24x30x10-nomargin.png) repeat-y fixed center center;
    background-size: 100% auto;
    margin-left: auto;
    margin-right: auto;
    max-width: @maxWidth;

    @media (min-width: @maxWidth) {
        background-size: @maxWidth auto;
    }
}
```

Nu när vi har ett fluid grid så behöver även det visualiserade gridet vara fluid. Men i mitt fall är det löst i ovan mixin.

Du behöver även en bild som representerar ditt grid. Här är en länk till ett par [varianter av grid-bilder](/img/grid/) som jag själv brukar använda vid behov. Du kan själv se vilken min mixin använder ovan.



Använd `box-sizing: border-box` {#boxsising}
------------------------------

Jag har inte använt det i mina exempel av gridet. Men, en konstruktion som är bra att använda --- och gör att man slipper en del bekymmer --- är `box-sizing: border-box`. Den gör så att ett elements bredd och höjd räknar in eventuell padding och border. Det gör det enklare att kombinera den style som säger `width: 100%` tillsammans med padding och border.

Så, tipset är att lägga in konstruktionen i din mixin `.column()` för kolumnerna. Det gör det enklare att hantera innehållet i respektive kolumn och styla det med padding och border.

```less
.column(@col, @columns: @columns) {
    // resten av koden...
    box-sizing: border-box;
}
```




Avslutningsvis {#avslutning}
------------------------------

Detta var en genomgång av tekniker bakom att implementera gridsystem med CSS och LESS. Vi har pratat om fixed, fluid och responsive varianter och du har sett grid-implementationer med både float och flex.

Du har nu en grund att stå på när det blir dags för dig att implementera ett eget grid i din webbplats.

Koden som utvecklades i samband med denna artikeln ligger (även) i repot [`desinax/vertical-grid`](https://github.com/desinax/vertical-grid) och finns att installera via [`npm install desinax-vertical-grid`](https://www.npmjs.com/package/desinax-vertical-grid).

Det finns en [forumtråd till artikeln](t/7009) där du kan ställa frågor eller bidra med tips och trix.
