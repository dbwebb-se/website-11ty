---
author: sylvanas
category: webbprogrammering
revision:
  "2015-08-14": (A, Sylvanas) Första utgåvan i samband med uppdateringen av kursen
    htmlphp
updated: "2015-08-14 06:28:37"
created: "2015-08-14 06:17:39"
...
Kom igång med HTML på 20 steg
==================================

Denna guide visar dig 20 steg (ungefär) för att komma in i HTML. Du får hjälp att skapa din första sida och du går igen om de vanligaste HTML elementen.

<!--more-->



Dokumentet {#dokumentet}
---------------------------------------------------

HTML-dokument skapas vanligast med ändelsen `.html`, men man kan även skriva HTML-kod i t.ex ett php-dokument som då slutar med `.php`. I den här guiden jobbar vi endast med HTML, så ett vanligt dokument räcker.

Börja alltså med att skapa en tom fil som heter `index.html`.

[INFO]
En anledning till att man oftast döper dokumentet till just `index` är för att de flesta servrar som man sedan lägger upp sin sida på kommer att alltid anta att just `index.html` eller `index.php` är startdokumenten. Därför behöver du inte ens ange själva filnamnet när du ska länka till det.

T.ex anta att du på din lokala server har en katalog som heter `me/` i `www`-katalogen (eller motsvarande som hänvisar till *localhost*) och du däri skapar dokumentet `index.html`. Då kommer just den sidan att laddas in om du anger detta:

```text
<a href='http://localhost/me/'>http://localhost/me/</a>
```

Notera alltså att man inte behöver ange `index.html` på länken - det sker automatiskt.
[/INFO]



Taggar {#taggar}
---------------------------------------------------

HTML handlar om att bygga en struktur för sidan där man senare lägger på utseendet för strukturen med CSS. HTML fokuserar alltså på själva grunden, och struntar i färger, former och storlekar (för det mesta).

Strukturen byggs med hjälp av det som kallas **taggar**. Taggar består ofta utav ett *par* eller *självavslutande* taggar. Här är exempel på ett *par*:

```html
<p></p>
```

Här är ett exempel på en *självavslutande* tagg som man kan skriva på olika sätt. Det första är *strikt*, dvs man anger att den avslutar sig själv:

```html
<hr />
```

Man måste inte ange avslutet (`/`) för en självavslutande tagg, utan när koden visas på sidan så kommer det att ske av sig själv. Därför kan man om man vill skriva såhär istället:

```html
<hr>
```

Vilket man väljer är en smaksak. Man kanske gillar att skriva tydligare och striktare kod, eller så gillar man när det är snabbt och enkelt. Vilket som går bra, men tänk på att vara konsekvent och alltid följa samma sätt.

Nu har vi koll på vad taggar är, så nu kan vi börja sätta ihop vårat HTML-dokument. Vi börjar lugnt och bygger upp sturkturen, och i andra halvan så trappar vi upp stegen lite och tar upp flera element per steg och jobbar med kategorier istället för att fylla på med innehåll.



1. doctype {#doctype}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Glossary/Doctype'>https://developer.mozilla.org/en-US/docs/Glossary/Doctype</a>
<a href='https://en.wikipedia.org/wiki/Document_type_declaration'>https://en.wikipedia.org/wiki/Document_type_declaration</a>
<a href='https://en.wikipedia.org/wiki/Document_type_declaration#HTML5_DTD-less_DOCTYPE'>https://en.wikipedia.org/wiki/Document_type_declaration#HTML5_DTD-less_DOCTYPE</a>

Doctype är inte en tagg i sig, utan det är mer en inställning för sidan som talar om kort och gott dokumentets typ. Denna anger alltså i vilken typ av HTML som dokumentet är skrivet.
Med HTML5 så gör det hela ganska lätt, man behöver bara ange `html` som typ.

Så överst i dokumentet så kommer det att börja med denna raden:

```html
<!doctype html>
```



2. html {#html}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html</a>

När man har angett typen så kan man gå vidare med nästa steg, vilket är att ange själva grundstrukturen för dokumentet. Detta börjar med taggen `<html>`, som alltså anger att här är min HTML-kod.

Denna ska alltså omsluta hela HTML-koden, så vi kommer att ha en i början, och en i slutet. Just nu ser det ut såhär:

```html
<!doctype html>
<html>
</html>
```



3. head {#head}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/head'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/head</a>

`<head>` är en tagg som används för att ge sidan olika inställningar som man inte direkt vill ska synas som faktiskt innehåll på sidan, utan ska vara just bakomliggande. Sådan kan vara saker som språk, style, länkar till CSS och javascript. Vi kommer att fylla på `<head>` allteftersom men vi börjar med att lägga till bara den:

```html
<!doctype html>
<html>
	<head>
	</head>
</html>
```



4. body {#body}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/body'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/body</a>

Efter huvudet så kommer kroppen, sidans synliga innehåll. 
Denna taggen kallas `<body>`. Det är här vi kommer lägga till alla texter, länkar, bilder osv.

Den ska alltid ligga efter head, så vi lägger till den därefter:

```html
<!doctype html>
<html>
	<head>
	</head>
	<body>
	</body>
</html>
```



5. title {#title}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/title'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/title</a>

Den absoluta grundstrukturen är nu färdig, så vad sägs om att fylla på lite inställningar i den där head-taggen vi pratade om innan? Vi börjar med det som kallas `title`.

`title` anger som namnet antyder en titel åt sidan, men denna titel kommer inte att synas på själva sidan i sig. Istället så anger den vad som syns i fönstrets namn, det man ser i tabben.

Nu kommer vi alltså in på att ange en start-tagg och en slut-tagg med **innehåll mellan**:

```html
<title>Min me-sida</title>
```

`title` ska alltid ligga inom `head`, och såhär ser då den färdiga koden sen ut:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
	</head>
	<body>
	</body>
</html>
```



6. meta {#meta}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta</a>

Lite andra inställningar kan vara saker som [charset](http://www.w3.org/International/questions/qa-what-is-encoding.en), språk och typ av innehåll. Vi behöver initialt bara ange en sak för att våra svenska tecken ska se ut som de borde, och det är charset.

Även denna ska alltid ligga i `head`-taggen, och kommer se ut såhär:

```html
<meta charset="utf-8">
```

När det är inlagt i koden så ser våran hela kod alltså ut som följer:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
		<meta charset="utf-8">
	</head>
	<body>
	</body>
</html>
```

[INFO]
**Attribut**

I `meta`-taggen så ser vi något vi inte har sett innan i taggar, där vi inte bara anger taggen i sig, men vi lägger även till data inom taggen.

```html
charset="utf-8"
```

Detta kallas **attribut**, och det består av två delar: attributets **namn** (*name*) och attributets **värde** (*value*). I fallet för `meta`-taggen ovan så är alltså `charset` namnet, och `"utf-8"` är vårat värde.

Det är bra att komma ihåg begreppet och hur det ser ut, så att när vi pratar om attribut så vet du vad som menas. Vanliga attribut som används är `class` och `id`, mer om dessa hittar du i slutet.
[/INFO]


Bygga kroppen {#kroppen}
---------------------------------------------------

Kroppen ska byggas, som det anges, i `body`-taggen. Elementen som följer handlar om det synliga innehållet på sidan, och därmed måste det ligga just inom `body`-taggen.

Kroppens helhet består oftast utav 3 stora delar: *header, main, footer*. Dessa tre delar är vad som följer.



7. header {#header}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/header'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/header</a>

Taggen `header` används för att ange just en header med t.ex logga, meny, sökfält osv som man är van vid att se överst på en sida. `header`-taggen kan sedan även användas för att strukturera upp t.ex titel och introduktion till artiklar och liknande så man är inte begränsad till att bara använda det för just sidans header. Man kan även använda det för delar av sidans innehåll som tjänar på en liknande introducerande struktur.

Men vi fokuserar på just sidans header och lägger till den först inom `body`-taggen så att den hamnar överst:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
		<meta charset="utf-8">
	</head>
	<body>
		<header>
		</header>
	</body>
</html>
```



8. main {#main}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/main'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/main</a>

För att ange sidan huvudsakliga innehåll så använder vi taggen `main`. Denna ska, till skillnad från `header`, helst inte användas mer än en gång per dokument. Om man tänker på syftet för taggen så faller sig det också naturligt - man har inte mer än just ett huvudsaklig innehåll, område, på sidan.

Vi lägger det efter headern:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
		<meta charset="utf-8">
	</head>
	<body>
		<header>
		</header>
		<main>
		</main>
	</body>
</html>
```


[INFO]
HTML5 handlar mycket om just det logiska i vilka taggar man använder, så som `main`. Det kallas att skapa en *semantisk struktur* där taggarna på ett bra sätt beskriver just vad de innehåller. Har man det i åtanke så blir det lättare att välja vilka taggar man ska använda.
[/INFO]



9. footer {#footer}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/footer'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/footer</a>

Vi avslutar kroppen med en `footer`. Här brukar man lägga till lite grundläggande info om sidan, t.ex vem som har författat den, copyright, och bra-att-ha-länkar.

Vi lägger den sist i `body`-taggen, efter `main`:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
		<meta charset="utf-8">
	</head>
	<body>
		<header>
		</header>
		<main>
		</main>
		<footer>
		</footer>
	</body>
</html>
```



Innehåll {#innehall}
---------------------------------------------------

Huvudstrukturen för dokumentet och sidan är nu klart. Härifrån och framåt så tar vi upp lite fler taggar per steg.



10. Rubriker {#rubriker}
---------------------------------------------------



###h1-h6 {#h-taggar}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements</a>

Rubriker används precis på samma sätt som när man skriver dokument, och det finns 6 olika storlekar av rubriker. `h1` är störst, och `h6` är minst. 

Testa gärna alla 6 rubrikerna för att se hur de ser ut och skillnaderna mellan dem. I min exempelkod så har jag börjat med att lägga till 2 rubriker, en i headern som namnet på min sida, och en i `main` för att ha en rubrik till det texten ska handla om:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
		<meta charset="utf-8">
	</head>
	<body>
		<header>
			<h1>Min me-sida</h1>
		</header>
		<main>
			<h2>Om mig</h2>
		</main>
		<footer>
		</footer>
	</body>
</html>
```



11. Uppdelning av innehåll {#uppdelning}
---------------------------------------------------



###section {#section}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/section'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/section</a>

`section` används som namnet antyder för att skapa sektioner av innehåll. Det blir ett sätt att dela upp det man lägger inom `main`, t.ex för att gruppera olika artiklar tillsammans. Här kommer alltså åter igen det semantiska in i koden där namnet på taggen ger en stark indikation på vad det ska användas till.

Här har jag i `main` skapa en `section`-tagg för att omsluta det jag sen tänker skriva om mig själv:

```html
<main>
	<section>
		<h2>Om mig</h2>
	</section>
</main>
```



###article {#article}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/article'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/article</a>

`article`-taggen antyder även den med sitt namn vilken typ av innehåll som den är menad för. En artikel är ju trots allt ofta just en rubrik och en sammanhängande text. T.ex kan detta användas runt varje blogginlägg om man gör en bloggsida. I relation med `section` så kan man ha flera articles i samma `section`.

```html
<main>
	<section>
		<article>
			<h2>Om mig</h2>
		</article>
		<article>
			<h2>Varför jag ville plugga webb</h2>
		</article>
	</section>
</main>
```

[INFO]
Hela dokumentet bygger på olika typer av taggar, där man kan ha taggar inom andra taggar, som t.ex `article` inom `section` som i sin tur är inom `main`. När man bygger upp det på ett sådan sätt så skapas ett så kallat *träd*. Du kan se att det börjar *grena* sig neråt i koden.
[/INFO]



12. Text {#text}
---------------------------------------------------



###p {#p}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/p'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/p</a>

En artikel är inte så mycket utan text. Den taggen som du sannolikt kommer använda allra mest för just text är `p`-taggen, vilket står för *paragraf*.

Det är alltså värt att notera att man ska använda `p`-taggen runt *varje paragraf/stycke* text man skriver, inte runt hela texten som helhet. Det jobbet har `article`-taggen redan.

Det kan se ut såhär:

```html
<article>
	<h2>Om mig</h2>
	<p>Detta är lite text om mig. Jag gillar spel och katter.<p>
	<p>Detta är ett nytt stycke text.</p>
</article>
```



###span {#span}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/span'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/span</a>

`span` har inget semantiskt syfte som HTML5 har som mål, men det kan vara ett användbart element som man vill gruppera delar av en text, t.ex för att style'a det annorlunda med CSS senare.

```html
<p>Det här är en text, <span>där en del av den är omsluten i en span</span>.</p>
```

[INFO]
**Inline och block**

*Block* anger om elementet breder ut sig så mycket det kan och *inline* om det bara tar upp så mycket plats det behöver och även kan ligga brevid andra element. Läs på om de olika elementen och prova dig fram själv för att se hur olika element beter sig.

T.ex så är `p` ett *blockelement*, medan `span` är ett *inline*.

I HTML5 kallas block för *flow* och inline för *phrasing*, men det finns även fler kategorier. Dokumentationen anger alltid vilka kategorier ett element har, och det går att läsa om dem här: [Content categories](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/Content_categories)
[/INFO]


###strong {#strong}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/strong'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/strong</a>

`strong` är ett element som används för att lyfta ut delar av en text som extra viktig, och detta brukar indikeras genom att texten blir i fetstil. Detta kan jämföras med elementet `<b>` från tidigare HTML-versioner där `strong` har ett semantiskt syfte medan `b` **inte** har det. Använd alltså hellre `strong` om du sedan innan är bekant med `b`.

```html
<p>Den här delen av texten är <strong>viktig</strong>.</p>
```



###em {#em}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/em'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/em</a>

`em` står för *emphasis*, och är ett element som används för att *betona* en del av en text. Detta visas oftast genom att texten blir kursiv. Tidigare användes `<i>` till detta, men som med `<b>` så hade inte det ett semantiskt syfte och med HTML5 så ersattes det alltså med `<em>`. Så om du sedan tidigare är bekant med `<i>`, försök att använda `<em>` istället.

```html
<p>Elementet em har något som kallas ett <em>semantiskt syfte</em>.</p>
```



13. Bilder {#bilder}
---------------------------------------------------



###img {#img}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img</a>

Taggen `img` används för att visa upp bilder på en sida. Detta görs med hjälp av ett *attribut* där man anger länken till själva bilden. Attributet heter `src`. När man ska ange `src` för en bild så behöver man länka den så att länken utgår från samma katalog som html-dokumentet ligger i. Antag t.ex att din fil `index.html` ligger i en katalog som heter `me/`. I den katalogen har du sedan ytterligare en katalog som heter `images/` vari bilden på dig ligger, och den heter `me.jpg`. Det ser alltså ut ungefär såhär:

```text
me/
----images/
--------me.jpg
----index.html
```

Eftersom att `img`-taggen ligger i dokumentet `index.html` så behöver länken alltså se ut såhär:

```text
images/me.jpg
```

Ett annat attribut för `img`-taggen som ska anges är `alt`. Denna är till för att ange en *alternativ text* om bilden inte skulle laddas. Det är vikigt att den finns med, så att om något går fel så kan den som tittar på sidan ändå förstå vad där skulle ha varit för något.

Slutligen så ser det alltså ut såhär:

```html
<img src="images/me.jpg" alt="En bild på mig" />
```



###figure, figcaption {#fig-caption}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure</a>
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figcaption'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figcaption</a>

`figure` är ett element som används för att omsluta en bild, om man t.ex skulle vilja ha bildtext under bilden med elementet `figcaption`. Detta ger alltså igen det typiska semantiska syftet som HTML5 inriktar sig på, och gör det lättare att placera bilden med en bildtext.

`figcaption` är alltså till för att ange en text och används ihop med `figure`.

Sammantaget så ser bilden ut såhär:

```html
<figure>
	<img src="images/me.jpg" alt="En bild på mig" />
	<figcaption>En bild på mig, tagen förra året.</figcaption>
</figure>
```

Sjävlklart behöver man inte använda `figure` runt alla bilder. Vissa bilder behöver ingen text och motsvarar inte figurer, t.ex om man skulle ha en bild i sin header.



14. Länkar {#lankar}
---------------------------------------------------



### a {#a}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a</a>

Taggen `<a>` står för *ankare* och används för att skapa länkar.

Länkar är en viktig del av en hemsida, det är så du ser till så att den som besöker hemsidan kan ta sig mellan dina olika sidor. Självklart används det också för att länka till externa hemsidor.

Skillnaden mellan lokala och externa länkar är att lokalt behöver man inte ange hela länken utan man behöver bara ange vägen till filen från den katalogen där dokumentet som länken i sig ligger i finns, precis som med bilder.

Jag har skapat ett dokument som heter `report.html` som jag lagt i `me/`-katalogen. När jag vill länka till den i index.html så använder jag attributet `href` på en `a`-tagg:

```html
<a href="report.html">Redovisningar</a>
```

Texten mellan start- och slut-taggen blir det som syns som själva länken, medan `href` i start-taggen alltså anger vart länken går.

Här är en extern länk, där man anger hela sökvägen till sidan, precis som det man anger i webbläsaren:

```html
<a href="http://dbwebb.se/forum/">Dbwebb's forum</a>
```



15. Listor {#listor}
---------------------------------------------------



### ul, ol {#ul-ol}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul</a>
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol</a>

Det finns i grunden 2 typer av listor: *ordnade* och *oordnade*. Taggarn för dessa är `ul` (*unordered list*) och `ol` (*ordered list*). Skillnaden mellan dessa är att `ul` blir en punktlista, medan `ol` blir numrerad.

Raderna i listan anges sedan med `li`.



### li {#li}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/li'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/li</a>

När man skapar en lista så anger man *list element* med taggen `li`. Varje sådant element blir sedan en egen punkt i listan man lägger den i.

Ordnad lista:

```html
<ol>
	<li>Htmlphp</li>
	<li>oophp</li>
	<li>phpmvc</li>
</ol>
```

Punktlista:

```html
<ul>
	<li>HTML</li>
	<li>CSS</li>
	<li>PHP</li>
</ul>
```


16. Meny {#meny}
---------------------------------------------------



### nav {#nav}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/nav'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/nav</a>

`nav` är en tag som används för omsluta en meny, oavsett som det är huvudmeny, en sidomeny eller någon annan typ av meny. Elementet används alltså för att gruppera länkar och semantiskt i koden markera att det här är navigationslänkar.

```html
<nav>
	<a href="index.html">Start</a>
	<a href="report.html">Redovisningar</a>
</nav>
```

Den här navigationen kan man sätta i `header` eller precis efter.



### Använda listor och länkar för en meny {#listor-menyer}

Ett vanligt sätt att skapa en meny på är med hjälp av en lista som man vanligast sedan stylar för att få det att t.ex lägga sig vågrätt istället för lodrätt med hjälp av CSS. Du kan själv prova på vilket du själv föredrar.

```html
<nav>
	<ul>
		<li><a href="index.html">Start</a></li>
		<li><a href="report.html">Redovisningar</a></li>
	</ul>
</nav>
```



17. Citat och exempelkod {#citat-exempel}
---------------------------------------------------



### blockquote {#blockquote}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote</a>

Vill man visa upp ett citat så kan man använda taggen `blockquote`. Texten visas då lite indenterad.

```html
<blockquote>
	<p>I ache, therefore I am.</p>
</blockquote>
```



### pre {#pre}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre</a>

Att visa upp kodexempel i HTML kan vara lite klurigt, hur får man den t.ex att förstå att det är ett exempel och inte faktiskt kod? Till det används `pre` som förstår att det är ett exempel och försöker inte tolka koden, och dessutom visar indenteringar och liknande. Testa själv!

```html
<pre>
&lt;article>
	&lt;h3>Lite exempelkod&lt;/h3>
	&lt;p>Lorem ipsum.&lt;/p>
&lt;/article>
</pre>
```

Notera att jag har skrivit `&lt;` istället för `<` i exempelkod. Detta är för att det på sidan ska visas korrekt. Testa själv vad som händer om du bara skriver `<` i koden, och byt sen ut det mot `&lt;`.

`&lt;` är alltså en speciell kod för HTML och specialtecken som den inte ska tolka som kod eller som man vill visa upp och inte kan skriva vanligt. Dessa kallas *HTML entities*. Copyright-tecknet får du t.ex fram med `&copy;`.



18. Tabeller {#tabeller}
---------------------------------------------------



### table {#table}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/table'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/table</a>

Tabeller används för att visa upp data i rader och kolumner. Om du är bekant med `table` innan så kanske du vet om vissa attribut som `align` och `width`, men dessa ska inte användas. För att bestämma hur tabellen ser ut så använder man sen CSS.

Tabeller ska inte användas för layout, det är en utdaterad metod som har ersatts med att man använder CSS för att placera element på sidan.



### th, tr, td {#th-tr-td}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tr'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tr</a>
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th</a>
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/td'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/td</a>

Tabeller består av *rader* och *celler*. Överst i tabellen har man en första rad med headers. Rader skapas med `tr` (*table row*), och cellerna för dessa headers skapas med `th` (*table header*). Table headers blir alltså titlarna på kolumnerna.

```html
<table>
	<tr>
		<th>Id</th>
		<th>Titel</th>
		<th>År</th>
	</tr>
</table>
```

Efterföljande rader fyller man sedan på med vanliga data-celler, `td`, i samma ordning som titlarna i `th`:

```html
<table>
	<tr>
		<th>Id</th>
		<th>Titel</th>
		<th>År</th>
	</tr>
	<tr>
		<td>1</td>
		<td>Pulp fiction</td>
		<td>1994</td>
	</tr>
	<tr>
		<td>2</td>
		<td>From Dusk Till Dawn</td>
		<td>1996</td>
	</tr>
</table>
```


19. Övrigt: Div och br {#div-br}
---------------------------------------------------



### div {#div}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/div'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/div</a>

Elementet `div` är ett element som var mycket vanligt innan HTML5 och fortfarande används, men inte i lika hög grad. Elementet har inget semantiskt syfte, men kan användas för att omsluta eller gruppera områden där inget annat element passar. Detta används ofta tillsammans med en klass eller `id` för att styla elementet.



### br {#br}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/br'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/br</a>

Används för att skapa radbrytningar. Detta element ska dock endast användas där detta är relevant, som när man skriver en gatuadress eller en dikt. Man ska inte använda detta element för att skapa yta på sidan, detta ska alltid CSS användas till. Detta är viktigt att komma ihåg. Överanvänd inte `br`, använd den bara där det verkligen är lämpligt.



20. Id och class {#id-class}
---------------------------------------------------



### id {#id}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id'>https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id</a>

`id` är ett attribut som används för att *identifera* element på en sida. Det får endast förekomma ett element med det ID't på hela sidan, det behöver alltså vara unikt.
`id` kan användas för att style'a med CSS eller för att identifiera ett element från JavaScript. Det används även i formulär för att koppla en relation mellan `label` och `for`.

Ett exempel på där `id` kan användas är till exempel för att identifera huvudmenyn, så att den går att skilja ut från t.ex sidomenyer och liknande.

```html
<nav id="mainmenu" >
	<a href="index.html">Start</a>
	<a href="report.html">Redovisningar</a>
</nav>
```



### Id och a-taggar {#id-lankar}

`id` går också att använda som ankare för länkar på sidan. Man kan t.ex ge en `article` ett `id`, där man sedan kan skapa en länk som går till det id't. Det som händer när man klickar på länkern är att sidan scrollar ner till där elementet med det id't börjar.

```html
<article id="about">
```
```html
<a href="#about">Om mig</a>
```

Det är också vanligt att använda denna interaktion mellan `id` och länkar för att skapa en länk som går tillbaka till toppen av sidan.

```html
<header id="top">
```
```html
<a href="#top">Tillbaka till toppen</a>
```



### Klass attributet {#class}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class'>https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class</a>

`class` är ett attribut som används för att *klassificera* element. Till skillnad från `id` så kan det finnas flera element med samma klass på en sida. Man kan alltså föreställa sig att man grupperar element med varandra. Klasser används för att kunna applicera CSS på elementen, men även för att kunna hämta element i JavsScript.

```html
<span class="red">där en del av den är omsluten i en span</span>
```

Här t.ex har vi tidigare exempel med `span` där det nu finns en klass. Senare i CSS så kan man alltså lägga till så att texten blir röd.




Gå vidare {#vidare}
---------------------------------------------------

Det finns mycket i HTML5 som det går att läsa vidare om som inte finns med i denna guide. Ett par exempel är [definitonslistor](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dl), [details](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details) och [summary](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/summary), [aside](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/aside), [ljud](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio) och [film](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video), [script](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script), [style](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/style) och [link](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link).

Det naturliga steget efter detta är att applicera CSS på sidan för att placera element och göra det fint visuellt.
