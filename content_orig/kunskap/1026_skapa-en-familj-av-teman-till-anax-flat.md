---
author: mos
category:
    - kurs/design
    - anax flat
    - theme
    - less
revision:
    "2017-11-17": (C, mos) Genomläst inför ht17.
    "2016-11-14": (B, mos) Genomgången, smärre justeringar i text.
    "2016-10-21": (A, mos) Första versionen.
...
Skapa en familj av teman till Anax Flat
===================================

[FIGURE src=/image/snapht16/theme-variables.png?w=c5&a=0,0,0,0 class="right"]

Vi skall jobba med temat och LESS-koden för att skapa en familj av olika teman. En familj av teman som delar ett bastema som gör det enkelt att styla och anpassa varje tema till en viss layout.

Vilka möjligheter har vi att strukturera vår LESS-kod för att göra modulerna mer återanvändbara?
<!--more-->

Strukturen med LESS-moduler blir en grund i vår tekniska webbdesign som förbereder oss för att styla allt som webbdesignern, eller kunden, ber oss om.



Förutsättning {#pre}
-------------------------------

Du har jobbat igenom de två första kursmomenten i design-kursen. Du har ett tema som fungerar i din variant av Anax Flat.



Struktur med bastema {#base}
-------------------------------

Låt oss utgå från tanken att du har ett tema du är hyfsat nöjd med. Nu skall vi tänka struktur och förbereda det temat för att anpassas.

Det första vi måste vara medvetna om är i vilken ordning reglerna bestäms i stylesheeten. Det som kommer sist i ordningen är den CSS-regel som kommer att gälla. Det gäller också att den CSS-regel som är mest specifik kommer att gälla.

Vi kan alltså styra så att godtycklig regel vinner, antingen lägger vi den sist eller så gör vi den mer specifik.

Vi vill dock undvika att hamna i en skog av specifika regler som gör temat allt svårare att anpassa till önskad layout.

Vi vinner i längden på att ha ett enkelt och rent bastema till vilken man kan lägga till regler som gör temat mer anpassat.

Detta är viktigt, det påverkar hur vi ser på vår LESS-kod och hur vi väljer att strukturera moduler. Det hjälper oss att tänka i termer av rent bastema och anpassade teman.

Tänk en border under en H1:a, skall det vara i bastemat eller i ett anpassat tema? Om jag väljer att lägga bordern i bastemat och senare skall göra ett anpassat tema med en H1:a utan border? Då måste jag skapa en regel för ta bort den bordern. Det känns lite onödigt. 

Där har vi ett läge där jag borde välja att se H1 med border som en anpassning till mitt bastema, och inte som en del av bastemat.

Det är sådana små saker, och beslut vi tar, som gör att vi kan få ett tema som är anpassningsbart och hållbart i längden utan alltför mycket fixar och patch-lösningar i LESS-koden.

Vi vill uppnå en god struktur av LESS-koden. Det är vårt mål.



En temaväljare i Anax Flat {#stylechooser}
-------------------------------

I vår version av Anax Flat finns en temaväljare som är förberedd för att hantera ett antal teman.

[FIGURE src=/image/snapht16/anax-flat-theme-chooser.png?w=w2 capture="En temaväljare finns redan med i ditt Anax Flat."]

Du kan testa din temaväljare under routen `index.php/theme-selector`.

Du kan läsa mer om temaväljaren och hur du konfigurerar den via "[Jobba med temaväljaren](anax/jobba-med-temavaljaren)".



Att använda html-klasser för enklare temaändringar {#htmlclass}
-------------------------------

Om man med enkla medel vill uppnå helt olika teman baserade på ett och samma ursprungstema så kan man använda klass attributet på till exempel `<html>`.

Tanken är att man har ett bastema och sen väljer man en CSS-klass för det anpassade temat.

Titta på följande LESS-kod som exemplifierar hur det fungerar.

```less
// This is part of all themes, the base
@magicNumber: 24px;

h1 {
    margin-bottom: @magicNumber * 2;
}

// Here comes the customized theme
@h1BottomBorderSize:    1px;
@h1BottomBorderStyle:   solid;
@h1BottomBorderColor:   black;

html.custom {
    h1 {
        border-bottom: @h1BottomBorderSize @h1BottomBorderStyle @h1BottomBorderColor;
    }
}
```

Tänk sedan att HTML-koden kan se ut på följande sätt.

```html
<!doctype html>
<html>
```

Eller så ser den ut så här.

```html
<!doctype html>
<html class="custom">
```

Ser du skillnaden och kan du se hur det vi kallar temat kopplas mellan LESS och HTML med klassen på `<html>`-elementet?

Detta är en enkel variant att åstakomma specifika teman utifrån ett bastema.



Ett exempel på tema och bas {#exempel}
-------------------------------

Låt oss kika på ett exempel som jag gjort. Så blir det tydligare hur jag menar. Exemplet är en del av kursrepot design och ligger i katalogen [`example/theme`](https://github.com/dbwebb-se/design/tree/master/example/theme). Du kan [testa det via dbwebb](repo/design/example/theme).



###Bastemat {#basetheme}

Vi har ett bastema som vi utgår ifrån. Det behöver inte vara ett helt tomt tema, det kan innehålla delar som är gemensamma för familjen. Det är ett beslut vi tar. Ett bastema som är helt generellt, eller ett bastema som passar till en viss familj av teman. Vi håller oss till familjetanken i detta exemplet.

Så här ser min exempelsida ut.

[FIGURE src=/image/snapht16/theme-base.png?w=w2 caption="Detta är mitt bastema i exemplet."]

Vi har alltså en sida som enbart utnyttjar ett bastema som ser ut så här i LESS-koden.

```less
// This is part of all themes, the base
body {
    width: 400px;
    margin: 8px auto;
    min-height: 30em;
    border: 1px solid #999;
    padding: 1em;
}

@magicNumber: 24px;

h1,
p {
    margin-bottom: @magicNumber;
}
```

Okey så långt? Vi har alltså ett enkelt bastema som inte direkt är tänkt för en verklig webbplats, det är bara tänkt som en bas för ett anpassat tema i en tema-familj.



###Ett anpassat tema {#custom}

Då bygger jag vidare på bastemat och gör ett anpassat tema som jag kallar för `custom`.

I `<html>`-elementet lägger jag till temats klass.

```html
<html class="custom">
```

Så här ser det ut.

[FIGURE src=/image/snapht16/theme-custom.png?w=w2 caption="Detta är mitt anpassade `custom` tema."]

Låt oss nu titta på LESS-koden.

```less
// Lets import the theme we want to further customize
@import url(base.less);

// Here comes the customized theme
@h1BottomBorderSize:    1px;
@h1BottomBorderStyle:   solid;
@h1BottomBorderColor:   black;

@fontFamily: monospace;

@bgColor:   opaque;
@color:     #333;

html.custom {
    background-color: @bgColor;
    color: @color;

    font-family: @fontFamily;

    h1 {
        border-bottom: @h1BottomBorderSize @h1BottomBorderStyle @h1BottomBorderColor;
    }
}
```

Vi återanvänder bastemat och lägger till saker som vi gör specifika via en klass `html.custom`.

Vi använder variabler i den mån vi anser det behövs. Varför? Jo, låt oss se hur vi vidare kan anpassa ett tema genom att enbart ändra på variablerna.



###Variabler för mer anpassning {#variables}

Nu har jag temat förberett för vidare anpassning via variabler. Jag utnyttjar detta genom att bygga vidare och förändra färgschemat på webbplatsen, men jag återanvänder fortfarande grunden från mitt `custom` tema.

Så här kan det se ut.

[FIGURE src=/image/snapht16/theme-variables.png?w=w2 caption="Nu har jag ytterligare anpassat genom att ändra värden för variabler."]

Om vi kikar på LESS-koden så ser den nu ut så här.

```less
// lets import the theme we want to further customize
@import url(base.less);
@import url(custom.less);

// Here we change variables, another way to make customizations to our themes.
@magicNumber: 22px;

@h1BottomBorderSize:    4px;
@h1BottomBorderStyle:   dotted;
@h1BottomBorderColor:   green;

@fontFamily: sans-serif;

@bgColor:   #222;
@color:     limegreen;
```

Ser du att du kan definiera variabler i LESS-moduler och senare ge dem nya värden? Det tillåter dig att parametrisera dina LESS-moduler på ett kraftfullt sätt.



Hur skall man tänka kring tema familjer  {#fraga}
-------------------------------

Vi har sett ett par varianter av hur man kan anpassa och specialisera ett tema.

En variant var att styra vilken anpassning som verkställs genom att sätta klass-attributet på det övergripande elementet `<html>`. Det ger oss vissa möjligheter.

Här är en variant som applicerar ett Hallowen-inspirerat tema samt ger ljus text på svart bakgrund. Det är små justeringar som kan göras mot vilket tema som helst.

```html
<html class="white-on-black hallowen">
    <link rel="stylesheet/css" href="theme-adaptive.css">
```

Vi kan skriva helt skilda stylesheets som uppfyller samma sak.

```html
<html>
    <link rel="stylesheet/css" href="theme.css">
    <link rel="stylesheet/css" href="theme-white-on-black.css">
    <link rel="stylesheet/css" href="theme-hallowen.css">
```

Eller med enbart ett specifikt tema.

```html
<html>
    <link rel="stylesheet/css" href="theme-white-on-black-hallowen.css">
```

Ovan ser vi varianter av hur vi aktiverar ett tema genom små justeringar i HTML-koden.

Det som kanske är mer viktigt är hur vi väljer att strukturera vår LESS-kod som genererar själva CSS-koden.

Om vi tänker oss en familj av teman. Med små anpassningar skall vi enkelt kunna skapa ett nytt tema baserat på de moduler vi redan har och använder.

Vi vill då ha en gemensam bas som är samma för alla teman. Basen bör vara så enkel som möjligt, kanske till och med utan grid, den kanske bara skall nollställa till en basstil.

Sedan bygger vi på lager med lager, och slutligen ett tema som är det slutliga anpassade temat som används av vår webbplats.

Med LESS blir det enkelt att dela upp koden i moduler som går att återanvända. Vi kan använda variabler för de delar som vi vill anpassa.

Varje tema kan vi skapa i en egen LESS-fil som sammanfogar alla delar till ett eget anpassat tema.

Det viktiga är att vi får upp ögonen för hur vi kan jobba med LESS-kod för att förbereda den för olika stylingalternativ. LESS-koden blir som programmeringskod och kodmoduler som går att återanvända och anpassa.



Avslutningsvis {#avslutning}
------------------------------

Artikeln har givit dig en liten orientering i att tänka kring temafamiljer, hur du kan strukturera kod i LESS och hur du kan aktivera teman i HTML-koden.
