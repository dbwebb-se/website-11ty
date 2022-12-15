---
author: mos
category: artikel
revision:
  "2012-08-10": (B, mos) Flyttad från WP till Lydia.
  "2012-04-26": (A, rgi) Första utgåvan.
updated: "2012-08-09 14:40:57"
created: "2012-08-09 14:40:29"
...
Kom igång med LESS
==================================

Vi kikar på {less}, ett av många sätt att underlätta användandet av CSS. Det finns många olika projekt med samma syfte, vissa med olika syntax, vissa med inbyggda funktioner för att ta hand om äldre webbläsare och de flesta finns tillgängliga med olika sätt att rendera slutprodukten (CSS-koden).

<!--more-->




{LESS} med JavaScript {#less}
--------------------------------------------------------------------

{less} finns tillgängligt med kompilering på server-sidan med hjälp av JavaScript men här använder vi ett JavaScript på klient-sidan för enkelhetens skull. Det finns även ett projekt som kompilerar på server-sidan med hjälp av PHP. Skulle man använda något liknande i produktion så är någonting som renderar på server-sidan klart att rekommendera i kombination med någon form av cachning.

Att komma igång med {less} är enkelt, allt vi behöver göra är att inkludera att JavaScript efter vi inkluderar vår {less}-kod:

```html
<script type="text/javascript" src="less.js"></script>
```

JavaScriptet hittar vi på [lesscss.org](http://lesscss.org/), det är bara att ladda ner och inkludera på sidan vi vill använda det på. {less}-koden skriver vi i en egen fil som vi inkluderar innan JavaScriptet.



###Variabler, matematiska uttryck och inbyggda funktioner {#variabler}

Vi börjar att leka med variabler, en möjlighet att extrahera till exempel färg, höjd och bredd från alla olika ställen i CSS:en och ha allt på ett och samma ställe.

```css
@boxwidth: 100;
@boxheight: 100;
@color: #ffa;

#box{
  width: @boxwidth + 0px;
  height: @boxheight + 0px;
  background-color: @color;
  color: darken(spin(@color, 120), 50%);
}

#box2{
  width: @boxwidth /3%;
  margin-left: @boxwidth /3%;
  height: @boxheight /2px;
  background-color: darken(@color, 50%);
  color: lighten(@color, 50%);
}
```

I koden ovan skapar vi tre variabler för att sedan använda dem på olika element längre ner i CSS:en. I `#box` använder vi inbyggda funktioner för att manipulera färger vilket ger möjligheten att ha en och samma kod med ett oändligt antal färg-teman med väldigt få variabler. Sätt en bas-färg och använd de inbyggda funktionerna för att bygga upp resten av färgerna i egna variabler kanske? I `#box2` använder vi även matematiska uttryck för att ändra bredd och position. 

[Exempel #1](exercises/less/example1.php).



###Mixins {mixins}

Alla som har använt CSS har någon gång behövt definiera samma egenskaper på flera olika element och behövt kopiera samma kod till flera olika ställen. En lösning är att definiera alla gemensamma egenskaper på alla olika element samtidigt och definiera de individuella egenskaperna för sig men även det är onödigt krångligt när man istället kan använda mixins för att sätta ihopa ett antal egenskaper i en klass och tillämpa den klassen på olika ställen. Lägg sen även till möjligheten att definiera parametrar på klassen så har vi mixins:

```css
.pop{
  @pop: #f00;
  background-color: @pop;
  color: white;
  font-size: 2em;
  text-decoration: underline;
  &:hover{
    background-color: darken(@pop, 25%);
    .bordered(.5em, dotted, lighten(@pop, 25%));
  }
}

.bordered (@thickness: 1px, @style: ridge, @color: cyan){
  border: @arguments;
  margin: 2em;
}

.rotate(@degrees: 20){
  @deg: @degrees + 0deg;
  -ms-transform:rotate(@deg); /* IE 9 */
  -moz-transform:rotate(@deg); /* Firefox */
  -webkit-transform:rotate(@deg); /* Safari and Chrome */
  -o-transform:rotate(@deg); /* Opera */
  transform:rotate(@deg);
}

#errormsg{
  @width: 20%;
  width: @width;
  position: absolute;
  top: 1em;
  right: @width;
  .pop;
  .rotate;
}

#ad{
  width: 100px;
  height: 300px;
  float: right;
  .pop;
  background-color: hotpink;
  .bordered(1em);
}

footer{
  .rotate(180);
  .bordered(1em, double, #faa);
}
```

Överst har vi en mixin med namnet pop där vi definierar en del olika egenskaper. Kikar vi längst ner bland definitionerna så ser vi `&:hover`, en nästlad egenskap som gäller för `pop:hover` (`&` refererar till föräldern (parent) som i detta fall är `pop`).

Nästa mixin som är definierad användes i den första under :hover och tar tre argument där även standardparametrar är definierade ut ifall de inte är satta.

Den tredje är en mixin som tar hand om rotation för flera olika webbläsare vilket hade varit väldigt mycket kod om det använts på mer än ett ställe. Hur mycket det ska roteras är även parameteriserat vilket bara det är anledning nog att använda en mixin.

Resten är endast fler egenskaper på de olika element och tillämpning av definierade mixins. Slutresultatet är inte någon vacker sida direkt men vi har i alla fall lärt oss använda mixins.

[Exempel #2](exercises/less/example2.php).



Läs mer {#mer}
--------------------------------------------------------------------

Detta är bara en liten del av allt man kan använda just {less} till, läs mer på [lesscss.org](http://lesscss.org/).

Några minuter på google kan ge mycket intressant information om {less} och andra metoder för att använda en mer dynamisk version av stylesheets. Vill man kompilera {less} med php så finns det att läsa här.

Twitters css-ramverk Bootstrap använder sig av less för att dynamiskt kunna generera koden, i projektet finns mycket exempelkod om man är intresserad.

Någonting annat som kan vara intressant att läsa är semantic gs, grid layout med less, ett utmärkt exempel på stylesheet där man vanligtvis har mängder med onödig kod och variabler.
