---
author: mos
category:
    - kurs/design
    - anax flat
    - theme
    - less
    - css grid system
revision:
    "2017-11-03": (B, mos) Genomgång inför ht17, kod även i desinax/npm.
    "2016-06-23": (A, mos) Första versionen.
...
Skapa ett horisontellt grid för typografi
===================================

[FIGURE src=/image/snapvt16/horisontellt-grid.png?w=c5&a=55,25,20,50 class="right"]

Vi skall skapa ett typografiskt grid. Jag kallar det ett horisontellt grid för att skilja det från det vertikala gridet vi tidigare pratat om. Horisontellt eftersom gridet baseras på rader och fonternas _baseline_. Ett sådant här grid kan även kallas för baseline grid. Dess huvudsakliga syfte är att skapa en rytm i sidan, en rytm som innebär att alla typografiska element delar en och samma multipel av en höjd. En sådan rytm kallas även för _vertikal rytm_.

<!--more-->

När vi har skapat vårt horisontella grid så är vi sedan redo att integrera det tillsammans med det vertikala grid vi tidigare skapat. De båda griden skall samverka.

Dessa båda grid blir basen i vår tekniska webbdesign för att göra vår layout.



Förutsättning {#pre}
-------------------------------

Du har jobbat igenom materialet i artiklarna "[Använd ett vertikalt grid med Anax Flat](kunskap/anvand-vertikalt-grid-med-anax-flat)".



Det magiska numret {#magic}
-------------------------------

I ett horisontellt grid finns det ett magiskt nummer som styr allt. 

Det magiska numret ger radernas höjd i gridet. Ett vanligt magiskt tal är 22. Eller 24. Jag väljer 24 idag.

I bilden nedan finns ljusbruna streck som visualiserar det horisontella gridet. Det är 24 pixlar mellan varje streck. Det är ett magiskt tal --- `@magicNumber: 24px;` --- mellan varje streck.

Allt innehåll, skall luta mot en multipel av det horisontella gridet och matcha en ljusbrun rad.

[FIGURE src=/image/snapvt16/horisontellt-grid.png?w=w2 caption="All typografi lutar mot en rad i det horisontella gridet."]

Det magiska talet är delvis framräknat utifrån basfontens storlek. Normalt är basfonten 16px i en webbläsare.

Den andra delen är basfontens *line-height*, radhöjd. En line-height motsvarande 1 ger 16 pixlar och inget mellanrum mellan raderna. Radernas mellanrum är viktigt för texters läsbarhet. Fontens utseende kan kräva olika radhöjder. Två vanliga radhöjder är 1,375 och 1,5.

Det ger oss två olika magiska tal, 22 eller 24, enligt följande, kodat i LESS.

```less
/**
 * Magic number for vertical rythm
 * @magicNumber = @fontSizeBody * @lineHeight
 */
@magicNumber:   24px;   /* 16px - 100%/1.5 */
//@magicNumber:   22px; /* 16px - 100%/1.375 */
@fontSizeBody:  16px;
@lineHeight:    (unit(@magicNumber) / unit(@fontSizeBody));
```

Som jag sa, jag väljer 24 för mitt exempel idag.



Körbart exempel {#exempel}
------------------------------

Du kan testa hela mitt exempel på typografiskt grid och stylning av typografiska element så att de matchar gridet via [typography.html](repo/design/example/typography-grid/typography.html) och du ser alla filer i exemplet i katalogen [example/typography-grid](repo/design/example/typography-grid/).



Att matcha de typografiska elementens storlek och radhöjd {#magic}
-------------------------------

Så, jag har valt ett magiskt nummer och nu måste jag skapa alla typografiska element så att deras storlek och radhöjd blir en multipel av mitt `@magicNumber`.

Begrunda följande tabell med uträkningar.

```less
/**
 * Size and lineheight calculation for magicNumber 24
 *
 * 3em     * 16px   = 48 => line-height: 48    = 1
 * 2.875em * 16px   = 46 => line-height: 48/44 = 1.0435
 * 2.75em  * 16px   = 44 => line-height: 48/44 = 1.0909
 * 2.625em * 16px   = 42 => line-height: 48/42 = 1.1429
 * 2.5em   * 16px   = 40 => line-height: 48/40 = 1.2
 * 2.375em * 16px   = 38 => line-height: 48/38 = 1.2632
 * 2.25em  * 16px   = 36 => line-height: 48/36 = 1.3333
 * 2.125em * 16px   = 34 => line-height: 48/34 = 1.4118
 * 2em     * 16px   = 32 => line-height: 48/32 = 1.5
 * 1.875em * 16px   = 30 => line-height: 48/30 = 1.6
 * 1.75em  * 16px   = 28 => line-height: 48/28 = 1.7143
 * 1.625em * 16px   = 26 => line-height: 48/26 = 1.8462
 * 1.5em   * 16px   = 24 => line-height: 24    = 1
 * 1.375em * 16px   = 22 => line-height: 24/22 = 1.0909
 * 1.25em  * 16px   = 20 => line-height: 24/20 = 1.2
 * 1.125em * 16px   = 18 => line-height: 24/18 = 1.3333
 * 1em     * 16px   = 16 => line-height: 24/16 = 1.5
 * 0.875em * 16px   = 14 => line-height: 24/14 = 1.7143
 * 0.75em  * 16px   = 12 => line-height: 24/12 = 2
 */
```

Vänstra delen av tabellen rör elementets fontstorlek. Därefter kommer en beräkning med en multipel av `@magicNumber` som ger en radhöjd. Sista siffran är alltså den line-height som tillsammans med vald fontstorlek ger att det typgrafiska elements höjd kommer att matcha det tänkta gridet.

Mycket beräkningar och det finns naturligtvis en liknande tabell för det magiska talet 22.

Till vår räddning är mixins. Med lite läsning i manualen till LESS och lite baskunskaper i matematik så kan vi översätta ovan tabell till en formel som passar in i en mixin. Syftet med mixinen är att hjälpa oss beräkna radhöjden utifrån en godtycklig fontstorlek.

```less
.fontSize(@fontSize) {
    font-size: @fontSize;
    line-height: @lineHeight / unit(@fontSize) * ceil(unit(@fontSize) / @lineHeight);
}
```

Kan du se att formeln för line-height matchar uträkningarna i tabellen ovan?

Du kan nu använda mixinen när du bestämmer fontstorleken på till exempel en `H1`, så här.

```less
h1 {
    .fontSize(2.375em);
}
```

Ta din kod ovan och testkör den i [LESS2CSS](http://less2css.org) för att se vad som genereras.

Om du gjort rätt bör du få en konstruktion som ser ut så här.

```less
h1 {
  font-size: 2.375em;
  line-height: 1.26315789;
}
```

Konstruktioner ser ut att stämma bra med tabellen ovan. Det skadar inte att kontrollera. För att testa om det blev rätt så kan vi multiplicera fontens storlek med radhöjden och multiplicera med basfontens storlek (`@fontSizeBody`). Det bör bli vårt magiska tal, eller iallafall en multipel av vårt magiska tal.

```text
2.375 * 1.2632 * 16 = 48 (en multipel av det magiska talet 24)
```

Detta var den svåra biten. Nu gäller det bara att använda mixinen och säkerställa att samtliga typografiska element håller sig till vårt `@magicNumber`. Men även det kan visa sig utmanande ibland.



Att jobba med det magiska numret {#font}
-------------------------------

Låt oss se hur vi jobbar med det magiska numret för att styla H1.

Som det är nu så matchar H1 det magiska numret. Alla margins, padding och border kommer nu att påverka detta. Det måste jag ta hänsyn till.

Först väljer jag att nollställa alla top- och bottom-marginaler. 

```less
h1, h2, h3, h4, h5, h6 {
    margin-top: @magicNumber;
    margin-bottom: @magicNumber;
}
```

Nu kan jag börja styla H1.

```less
@fontSizeH1: 2.375em;
@colorH1BorderBottom: #666;
@borderSizeH1: 1px;

h1 {
    .fontSize(@fontSizeH1);
    font-weight: normal;

    border-bottom: @borderSizeH1 solid @colorH1BorderBottom;
    margin-bottom: @magicNumber - @borderSizeH1;
}
```

Här väljer jag att lägga till en border, men då måste jag justera storleken på margin-bottom. Glöm inte att alla utrymmen måste matcha det magiska numret.

Det är enklast att styla alla typografiska element med en margin-bottom för att skapa utrymme mellan elementen.

Om du väljer att även jobba med margin-top så måste du vara medveten om konceptet [*margin collapse*](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Box_Model/Mastering_margin_collapsing).

Jag fortsätter att styla H1 och sätter att alla underrubriker skall ha ett litet större utrymme, här använder jag margin-top. 

```less
h1 {
    // If header below h1, then assume larger margin top
    & ~ h1,
    & ~ h2,
    & ~ h3,
    & ~ h4,
    & ~ h5,
    & ~ h6,
     {
        margin-top: @magicNumber * 2;
    }
}
```

Men, om en H2 följer en H1 direkt så vill jag ha lite mindre utrymme.

```less
h1 {
    // Single margin when subheader follows directly
    & + h2 {
        margin-top: @magicNumber;
    }
}
```

Du ser hur jag använder margin-bottom och margin-top för att styra mellanrummen mellan de typografiska elementen. Framförallt så kan du se att jag alltid använder `@magicNumber` för att matcha det typografiska gridet.

Svårare än så är det inte att hålla sig till ett typografiskt grid.



Att välja typsnitt {#typsnitt}
-------------------------------

Vilket typsnitt skall vi ha på vår webbplats? Vilken font skall vi välja? Ja, kanske har någon annan redan gjort beslutet åt oss. Annars får vi bestämma det själva.

Det vi behöver är stabila font-familjer som fungerar över olika plattformar. Något i stil med följande.

```less
/**
 * Typographic font families to choose from. 
 */
// Monospace
@fontFamilyCourier:         "Courier New", Courier, monospace;
@fontFamilyMonospace:       monospace;

// Serif
@fontFamilyCambria:         Cambria, Georgia, Times, 'Times New Roman', serif;
@fontFamilyTimes:           Times, 'Times New Roman', serif;
@fontFamilyGaramond:        Garamond, Baskerville, "Baskerville Old Face", "Hoefler Text", Georgia, "Times New Roman", Times, serif;

// Sans-serif
@fontFamilyHelvetica:       Frutiger, "Frutiger Linotype", Univers, Calibri, "Gill Sans", "Gill Sans MT", "Myriad Pro", Myriad, "DejaVu Sans Condensed", "Liberation Sans", "Nimbus Sans L", Tahoma, Geneva, "Helvetica Neue", Helvetica, Arial, sans-serif;
@fontFamilyCalibri:         Calibri, "Gill Sans", "Gill Sans MT", "Myriad Pro", Myriad, "DejaVu Sans Condensed", "Liberation Sans", "Nimbus Sans L", Tahoma, Geneva, "Helvetica Neue", Helvetica, Arial, sans-serif;
@fontFamilyMyriadPro:       MyriadPro-Regular, 'Myriad Pro Regular', MyriadPro, 'Myriad Pro', Helvetica, Arial, sans-serif;
@fontFamilyHelveticaNeue:   "Helvetica Neue", Helvetica, Arial, sans-serif;
@fontFamilyArial:           Arial, sans-serif;
```

Ovan är en samling fontfamiljer som jag själv letat upp och satt ihop vid något tillfälle. Jag väljer att lägga in dem som variabler i min LESS-fil så de blir enkla att använda vid behov.

Leta gärna reda på andra fontfamiljer som du tycker passar.

Så här sätter jag sedan de fontfamiljer jag tänker använda.

```less
/**
 * Default font-families
 */
@fontFamilyHeadings:  @fontFamilyCambria;
@fontFamilyBody:      @fontFamilyCalibri;
@fontFamilyCode:      @fontFamilyCourier;
```

När man kombinerar typsnitt så kan det vara en god regel att välja en sans-serif till rubrikerna och en serif till body-texten. Eller vice versa. Det ger en trevlig visuell effekt.

Bra, nu kan jag gå vidare och sätta typsnittet på till exempel rubrikerna.

```less
h1, h2, h3, h4, h5, h6 {
    font-family: @fontFamilyHeadings;
}
```

När det gäller basfonten så använder jag en mixin för att sätta den. Det är för att jag vill sätta både storlek, radhöjd och fontfamilj i en och samma inställning.

```less
.font(@fontSize: 100.01%, @fontFamily: @fontFamilyBody) {
    font: @fontSize/@lineHeight @fontFamily;
}
```

Anledningen till att sätta fontstorleken 100.01% är avrundningsfel i tidiga versioner av webbläsare, jag har valt att fortsätta använda det sättet.

Nu kan jag sätta standardfonten.

```less
body {
    .font();
}
```

Om du är osäker på vad resultatet borde bli så kan du dubbelkolla i LESS2CSS. Minns att det är ett riktigt bra verktyg för att dubbelkolla vad en LESS-konstruktion genererar för CSS-kod. Använd det.



Avslutningsvis {#avslutning}
------------------------------

Vi har gått igenom grunderna i ett typografiskt grid. Ett grid som även kan kallas horisontellt grid eller baseline grid. 

Som du ser så är det magiska numret inte så magiskt, enkel matematik. Men, oerhört viktigt att alltid hålla sig till, annars hamnar man utanför gridet.

Koden som utvecklades i samband med denna artikeln ligger (även) i repot [`desinax/typographic-grid`](https://github.com/desinax/typographic-grid) och finns att installera via [`npm install desinax-typographic-grid`](https://www.npmjs.com/package/desinax-typographic-grid).

Det finns en [forumtråd till artikeln](t/7010) där du kan ställa frågor eller bidra med tips och trix.
