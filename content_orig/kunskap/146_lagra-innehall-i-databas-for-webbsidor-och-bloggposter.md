---
author: mos
category: webbprogrammering
revision:
      "2014-10-20": "(C, mos) Bytte koden till doFilter(), innehöll fel."
      "2013-12-03": "(B, mos) Smärre justeringar inför campus-kursen."
      "2013-09-30": "(A, mos) Första utgåvan i samband oophp-kursen."
...
Lagra innehåll i databas för webbsidor och bloggposter
==================================

Ofta vill vi hantera webbplatsens innehåll genom att lagra det i databasen. Denna artikel visar hur du bygger upp en tabell som lagringsstruktur för innehåll -- både till webbsidor och bloggposter. Via ett formulär kan du redigera sidans titel och innehåll som sparas undan i databasen. Det blir enkelt att uppdatera din webbsidas innehåll och visa upp den på valfri länk, utan att ha direkt tillgång till databasen eller webbservern. Det räcker med en webbläsare.

När du är klar har du byggt både webbsidor och en blogg från innehåll som du lagrat och redigerat i databasen.

<!--more-->

Så här kan det se ut när man redigerar innehåll i databasen via ett formulär.

[FIGURE src=/image/snapshot/Uppdatera_innehall___Innehall_i_databasen.jpg?w=w2 caption="Formulär för att editera innehåll i databasen."]

Själva [exempelkoden och exemplet hittar du här](kod-exempel/lagra-webbsidans-innehall-i-databasen/view.php). Exempelkoden bygger på [Anax](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer) och artikeln förutsätter att du är bekant med hanteringen från guiden ["Kom igång med PHP PDO och MySQL"](kunskap/kom-igang-med-php-pdo-och-mysql).

Om innehållet verkar trasigt så kan du [återställa det](kod-exempel/lagra-webbsidans-innehall-i-databasen/reset.php) innan du börjar att testa.



Tankar om *innehåll* i databasen {#om}
-------------------------------

Låt oss fundera, varje webbsida har en `<title>` och bör ha en rubrik i form av en `<h1>`. Varje webbsida har en unik länk, en url. Det skall finnas `content`, själva innehållet. 

En sida kan ha olika status, den kan vara publicerad eller inte publicerad. Inte publicerad kan ju innebära en arbetskopia som man inte vill visa upp förrän den är klar. 

En sida kan vara av en speciell typ, en typ som bestämmer hur och var sidan kan visas. Det kan vara bra att vara lite flexibel och visa sidor på olika sätt, baserade på dess typ. Till exempel så visar man innehåll av typen 'post' i bloggen och innehåll av typen 'page' som egna sidor.

Det är bra att ha datumstämplar för när sidan skapades, uppdaterades och raderades. 

Innehållet i sidan skulle kunna filtreras på olika sätt, vill man skriva PHP-kod i sidan, eller HTML, BBCode eller Markdown? Det kan behövas olika filter som bearbetar innehållet innan det presenteras. 

Oj, det blev en hel del. Bäst att börja enkelt. Så här få tabellstrukturen se ut till att börja med.



En databastabell {#table}
-------------------------------

Det första vi behöver är en lagringsstruktur för innehållet. Vi behöver fundera igenom vad vi vill och behöver lagra samt hur lagringen skall ske. Det går ju naturligtvis att justera strukturen efter hand men det är rätt bra att tänka igenom strukturen från början. Det är alltså en databastabell vi behöver, en grundstruktur för vad vi vill lagra.

Så här blev det när jag funderat klart.

**Tabellstruktur för tabellen *Content*.**

```sql
--
-- Create table for Content
--
DROP TABLE IF EXISTS Content;
CREATE TABLE Content
(
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  slug CHAR(80) UNIQUE,
  url CHAR(80) UNIQUE,

  type CHAR(80),
  title VARCHAR(80),
  data TEXT,
  filter CHAR(80),

  published DATETIME,
  created DATETIME,
  updated DATETIME,
  deleted DATETIME

) ENGINE INNODB CHARACTER SET utf8;
```


För att komma i gång så lägger jag in lite rader i tabellen. Radernas innehåll visar lite hur jag har tänkt att det skall fungera.

**Exempel på innehåll.**
```sql
INSERT INTO Content (slug, url, type, title, data, filter, published, created) VALUES
  ('hem', 'hem', 'page', 'Hem', "Detta är min hemsida. Den är skriven i [url=http://en.wikipedia.org/wiki/BBCode]bbcode[/url] vilket innebär att man kan formattera texten till [b]bold[/b] och [i]kursiv stil[/i] samt hantera länkar.\n\nDessutom finns ett filter 'nl2br' som lägger in <br>-element istället för \\n, det är smidigt, man kan skriva texten precis som man tänker sig att den skall visas, med radbrytningar.", 'bbcode,nl2br', NOW(), NOW()),
  ('om', 'om', 'page', 'Om', "Detta är en sida om mig och min webbplats. Den är skriven i [Markdown](http://en.wikipedia.org/wiki/Markdown). Markdown innebär att du får bra kontroll över innehållet i din sida, du kan formattera och sätta rubriker, men du behöver inte bry dig om HTML.\n\nRubrik nivå 2\n-------------\n\nDu skriver enkla styrtecken för att formattera texten som **fetstil** och *kursiv*. Det finns ett speciellt sätt att länka, skapa tabeller och så vidare.\n\n###Rubrik nivå 3\n\nNär man skriver i markdown så blir det läsbart även som textfil och det är lite av tanken med markdown.", 'markdown', NOW(), NOW()),
  ('blogpost-1', null, 'post', 'Välkommen till min blogg!', "Detta är en bloggpost.\n\nNär det finns länkar till andra webbplatser så kommer de länkarna att bli klickbara.\n\nhttp://dbwebb.se är ett exempel på en länk som blir klickbar.", 'link,nl2br', NOW(), NOW()),
  ('blogpost-2', null, 'post', 'Nu har sommaren kommit', "Detta är en bloggpost som berättar att sommaren har kommit, ett budskap som kräver en bloggpost.", 'nl2br', NOW(), NOW()),
  ('blogpost-3', null, 'post', 'Nu har hösten kommit', "Detta är en bloggpost som berättar att sommaren har kommit, ett budskap som kräver en bloggpost", 'nl2br', NOW(), NOW())
;
```


Kommentarer till lagringsstrukturen {#tankt}
-------------------------------



###Två typer `page` och `post` {#tva-typer}

Jag tänker mig två typer av innehåll, `page` och `post`. Jag tänker mig rena webbsidor som bygger på innehållet i databasen, dessa har typen `page`. Sedan tänker jag mig en blogg och det innehållet ger jag typen `post`. Två typer och två tänkta hanteringar av innehållet.



###Innehållet {#innehall}

Själva innehållet är `title` och `data`, det är det som ger sidans innehåll. Det blir bra som en `<h1>` följt av text. Dessutom kan `title` bli en del av sidans `<title>` element.


###Att komma åt innehållet {#id}

Det finns tre olika sätt att komma åt ett specifikt innehåll, dels via `id`, det använder jag när man skall editera en sida och när användaren är inloggad.

`url` är en tänkt länk till innehållet. Det ger möjligheten att matcha en länk direkt till ett innehåll.

`slug` är en översättning av innehållets titel som lämpar sig att använda i länkningen till sidan. En länk med en slug kan se ut så här:

> `http://dbwebb.se/coachen/gor-en-lasbar-url-med-slugify`

Texten *gor-en-lasbar-url-med-slugify* är en slug till en sida som har titeln "Gör en läsbar url med slugify()". Läs mer om en [funktion som gör en slug av en sträng](coachen/gor-en-lasbar-url-med-slugify).

Det är alltså tre olika sätt att peka ut det innehåll som skall hanteras. Det ger viss flexibilitet och det vill vi ha.



###Filter {#filter1}

Tanken är att innehållet skall processas via olika filter innan det visas upp. Detta ger möjligheten att använda olika strategier när man skriver sitt innehåll. Exempel på olika filter kan vara BBCode eller Markdown.



###Tidsstämplar {#tid}

Jag sätter fyra olika tidsstämplar. När innehållet skapas så sätts `created`, varje gång som innehållet uppdateras så sätts `updated`. När innehållet raderas så sätts `deleted`. 

Tanken med `deleted` är att markera innehållet som raderat, utan att fysiskt ta bort det. Kanske vill man återskapa det, eller införa en hantering som liknar en *papperskorg*. Ett dokument som slängs i papperskorgen kan man ta upp (eller kasta bort på riktigt).

Den fjärde tidsstämpel är `published` som sätter en tidpunkt för när innehållet är publicerat. Detta ger möjligheten att sätta ett datum i framtiden för att publicera innehållet vid en bestämd tidpunkt. Vill man inte att innehållet skall visas så nollställer man `published`.



Visa allt innehåll {#visa-allt}
-------------------------------

Nu finns det en lagringsstruktur och några exempel i tabellen. Nu behövs ett gränssnitt till användaren så innehållet kan uppdateras via webben. En bra start är att visa allt innehåll i databasen. Så här kan det se ut.

[FIGURE src=/image/snapshot/Visa_allt_innehall___Innehall_i_databasen.jpg?w=w2 caption="Visa allt innehåll från databasen."]

**SQL-sats för att hämta allt innehåll.**

```sql
SELECT *, (published <= NOW()) AS available
FROM Content;
```

Så länge som datumet på `published` är passerat så anses innehållet vara publicerat.

Det finns två olika typer av innehåll. Jag vill att innehållet av typen `page` skall hanteras av sidkontrollern `page.php` och jag vill att innehåll av typen `post` skall hanteras av sidkontrollern `blog.php`. För att lyckas med det så väljer jag att göra en funktion som kan länka till innehållet genom att titta på dess typ.

**En funktion för att koppla innehållets typ till en webbsida.**

```php
/**
 * Create a link to the content, based on its type.
 *
 * @param object $content to link to.
 * @return string with url to display content.
 */
function getUrlToContent($content) {
  switch($content->type) {
    case 'page': return "page.php?url={$content->url}"; break;
    case 'post': return "blog.php?slug={$content->slug}"; break;
    default: return null; break;
  }
}
```

Man kan se det som att man skapar en permalänk till varje innehåll, men beroende på innehållets typ så skall olika sidkontroller hantera innehållet.



Uppdatera innehållet med formulär {#form}
-------------------------------

Jag skapar ett formulär där jag kan redigera av innehållet.

[FIGURE src=/image/snapshot/Uppdatera_innehall___Innehall_i_databasen.jpg?w=w2 caption="Formulär för att redigera innehåll i databasen."]

Det är ett *self submitting form* som visar innehållet och sparar ned ändringarna. Det är en generell hantering av att lagra saker i databasen och är inget speciellt för detta sammanhanget.

En sak som kan vara på sin plats att nämna är *strategin för att lagra informationen i databasen*. Skall man **sanitera den innan den lagras i databasen** *eller* **innan den används i webbsidan**? Jag väljer främst strategin att lagra innehållet precis som användaren skriver in det och sedan filtrerar och saniterar jag när informationen skall visas i webbsidan. Jag föredrar att användaren kan spara ned precis vad som helst, men det ställer krav på att jag verkligen saniterar informationen och rensar bort skadlig kod, innan informationen skrivs ut. 

Att låta användare skriva in vad som helst, utan att sanitera, har fördelen att användaren alltid känner igen texten som skrivs och det finns ingen *magisk* hantering som säger vilken text som är rätt eller fel. I mitt fall är det helt okey att skriva in både HTML-kod och PHP-kod, det som är viktigt är vilka filter man väljer att sätta på innehållet. Det är kombinationen av filter (och `htmlentities()`) som gör att texten saniteras och skadlig kod rensas bort.

Skillnaden mellan strategierna är *när* och *hur* den skadliga koden rensas bort. 

**Rensa bort skadlig kod innan lagring i databasen.**

```php
$url    = isset($_POST['url'])   ? strip_tags($_POST['url']) : null;
$type   = isset($_POST['type'])  ? strip_tags($_POST['type']) : array();

$title  = isset($_POST['title']) ? $_POST['title'] : null;
$data   = isset($_POST['data'])  ? $_POST['data'] : array();
```

De två variablerna `$url` och `$type` är rensade från php- och html-element och därmed lite mindre "skadliga". Variablerna `$title` och `$data` innehåller data som kan vara skadlig om den skrivs ut i en webbsida.

Det är också bra att kontrollera att inkommande variabler är definierade enligt den värdemängd som gäller.

**Inkommande variabler matchar tänkt värdemängd.**

```php
// Check that incoming parameters are valid
is_numeric($id) or die('Check: Id must be numeric.');
```

När variablera visas upp i webbsidan så måste de saneras. Det sker med funktionen `htmlentities()`. Jag väljer det säkra för det osäkra och sanerar alla variabler. Det känns helt enkelt tryggare så.

**Sanera data från databasen innan presentation i webbsidan.**

```php
$sql = 'SELECT * FROM Content WHERE id = ?';
$res = $db->ExecuteSelectQueryAndFetchAll($sql, array($id));
$c   = $res[0];

$url    = htmlentities($c->url, null, 'UTF-8');
$type   = htmlentities($c->type, null, 'UTF-8');
$title  = htmlentities($c->title, null, 'UTF-8');
$data   = htmlentities($c->data, null, 'UTF-8');
```

En klar fördel med all denna sanering är att när vi använder PHP PDO och prepared statement så kan vi skicka in precis vad som helst till databasen. Vi slipper att fundera på SQL injections. Det sparar tid och gör hanteringen enkel.

**PHP PDO och prepared statements hanterar okänd data säkert.**

```php
$sql = '
  UPDATE Content SET
    title   = ?,
    slug    = ?,
    url     = ?,
    data    = ?,
    type    = ?,
    filter  = ?,
    published = ?,
    updated = NOW()
  WHERE 
    id = ?
';
$params = array($title, $slug, $url, $data, $type, $filter, $published, $id);
$db->ExecuteQuery($sql, $params);
```

Var uppmärksam på att en tom sträng och NULL inte är samma sak i en databaskolumn. Att ha en url som är NULL är okey i databastabellen, även om det finns flera och vi har satt UNIQUE på kolumnen. Men, det är inte okey att ha flera rader som har en url som är tomma strängen. Då får du fel, ungefär så här.

> *Duplicate entry '' for key 'url'.*

När du läser upp innehållet från databasen, lägger det i formuläret och åter sparar det, så är det lätt att ditt ursprungliga NULL görs om till en tom sträng. Detta leder i sin tur till att du får problem med databastabellens restriktioner om att url skall vara UNIQUE. Ett enkelt sätt att gå runt problemet är att kontrollera om url är tom och då sätta den till NULL istället.

**Sätt tomt värde på url till NULL.**

```php
$url = empty($url) ? null : $url;
$params = array($title, $slug, $url, $data, $type, $filter, $published, $id);
$res = $db->ExecuteQuery($sql, $params);
```

Samma hantering gäller alla kolumner som du vill skall innehålla NULL när de är tomma.

Just felhantering mot databasen kräver lite hantering. Vad händer om uppdateringen går fel? När du gör en uppdatering om INSERT, UPDATE, eller DELETE så returnerar `PDOStatement::execute()` true eller false, beroende på om det gick bra eller ej. Sådant kan man behöva kontrollera och det är bäst att du har sådant stöd i din CDatabase-klass.

**Kontrollera om frågan gick bra, annars visa fel.**

```php
$res = $db->ExecuteQuery($sql, $params);
if($res) {
  $output = 'Informationen sparades.';
}
else {
  $output = 'Informationen sparades EJ.<br><pre>' . print_r($db->ErrorInfo(), 1) . '</pre>';
}
```

Om du inte har stöd för felhantering i din CDatabase-klass så behöver du fixa till det. [Tjuvkika på min CDatabase](oophp/me/anax-oophp/webroot/source.php?path=src/CDatabase/CDatabase.php) om du behöver ledtrådar.

Nu har vi ordning på innehållet. Skall vi se hur vi kan visa upp det?



Visa innehållet med `page.php` {#page}
-------------------------------

Allt innehåll av typen `page` kan visas med sidkontrollern `page.php`. En sådan länk kan se ut så här.

> `page.php?url=hem`

[FIGURE src=/image/snapshot/Hem___Innehall_i_databasen.jpg?w=w2 caption="Visa innehåll av typen `page` som en webbsida."]

Låt oss kika lite på hanteringen i `page.php`. 

Först gäller det att välja ut rätt sida och det görs med följande SQL-kod.

**SQL för att välja rätt innehåll för sidan.**

```php
// Get content
$sql = "
SELECT *
FROM Content
WHERE
  type = 'page' AND
  url = ? AND
  published <= NOW();
";
$res = $db->ExecuteSelectQueryAndFetchAll($sql, array($url));
```

Sedan måste innehållet saniteras och filtreras.

**Sanitera innehållet innan det visas.**

```php
// Sanitize content before using it.
$title  = htmlentities($c->title, null, 'UTF-8');
$data   = doFilter(htmlentities($c->data, null, 'UTF-8'), $c->filter);
```

Därefter är det bara att visa upp innehållet tillsammans med HTML-elementen.

**Lägg ut innehållet tillsammans med HTML-element.**

```php
// Prepare content and store it all in variables in the Anax container.
$anax['title'] = $title;
$editLink = $acronym ? "<a href='edit.php?id={$c->id}'>Uppdatera sidan</a>" : null;
$anax['main'] = <<<EOD
<article>
<header>
<h1>{$title}</h1>
</header>

{$data}

<footer>
{$editLink}
</footer
</article>
```

Det var `page.php`, hur ser då `blog.php` ut?



Visa innehållet med `blog.php` {#blog}
-------------------------------

När vi visar innehåll av typen `post` blir det lite mer hantering i sidkontrollern `blog.php`. Tanken är att den skall både kunna visa en enskild bloggpost samt en översikt av alla bloggposter.

Så här kan det se ut när alla bloggposter visas.

> `blog.php`

[FIGURE src=/image/snapshot/Bloggen___Innehall_i_databasen.jpg?w=w2 caption="Alla bloggposter visas efter varandra."]

Vill man bara visa en bloggpost så anropar man sidkontrollern med innehållets slug som parameter, så här.

> `blog.php?slug=blogpost-1`

[FIGURE src=/image/snapshot/Valkommen_till_min_blogg____Bloggen___Innehall_i_databasen.jpg?w=w2 caption="En bloggpost visas ensam på en sida."]

I min kod väljer jag att bygga upp en SQL-sats beroende på om sluggen är närvarande eller ej. 

**En SQL-sats för båda fallen.**

```php
// Get content
$slugSql = $slug ? 'slug = ?' : '1';
$sql = "
SELECT *
FROM Content
WHERE
  type = 'post' AND
  $slugSql AND
  published <= NOW()
ORDER BY updated DESC
;
";
$res = $db->ExecuteSelectQueryAndFetchAll($sql, array($slug));
```

Det gör att jag kan hantera resultatet på samma sätt oavsett om det är en eller flera bloggposter som skall visas. Så här ser den delen ut.

**Samma kodsekvens visar upp blogglistan och enkla bloggposter.**

```php
// Prepare content and store it all in variables in the Anax container.
$anax['title'] = "Bloggen";
$anax['main'] = null;
if(isset($res[0])) {
  foreach($res as $c) {
    $title  = htmlentities($c->title, null, 'UTF-8');
    $data   = doFilter(htmlentities($c->data, null, 'UTF-8'), $c->filter);

    $anax['main'] .= <<<EOD
<section>
  <article>
  <header>
  <h1><a href='blog.php?slug={$c->slug}'>{$title}</a></h1>
  </header>

  {$data}

  <footer>
  </footer
  </article>
</section>
EOD;
  }
}
else if($slug) {
  $anax['main'] = "Det fanns inte en sådan bloggpost.";
}
else {
  $anax['main'] = "Det fanns inga bloggposter.";
}
```

Låt oss nu kika lite på hur filtreringen fungerar.


Filtrering av texten {#filter}
-------------------------------

I mitt exempel har jag fyra olika textfilter.

| Filter     | Funktion         |
|------------|------------------|
| nl2br      | Ersätt varje nyrad med en `<br>` för att ge enkel formattering av texten. PHP funktionen `nl2br()` utför jobbet. |
| bbcode     | Formattering enligt bbcode är vanligt på forum och i kommentarsfält där användaren inte skall kunna skriva HTML-kod. En funktion med reguljära uttryck löser detta. |
| link       | Gör länkar som skrivs i texten klickbara. Ett reguljärt uttryck gör jobbet. |
| markdown   | Formattering enligt Markdown. Ett externt libb hjälper oss med Markdown. |

Coachen har skrivit en del artiklar om filtrering av text, bland annat ["Reguljära uttryck i PHP ger BBCode formattering"](coachen/reguljara-uttryck-i-php-ger-bbcode-formattering), ["Låt PHP-funktion make_clickable() automatiskt skapa klickbara länkar"](coachen/lat-php-funktion-make-clickable-automatiskt-skapa-klickbara-lankar) samt ["Skriv för webben med Markdown och formattera till HTML med PHP"](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php). Dessa hjälper mig att göra en filterhantering till mitt innehåll.

Varje innehåll listar de filter som skall användas för att processa sidan, det är en komma-separerad lista av filter. Till exempel så här.

> `bbcode,nl2br`

Ovanstående innebär att texten först filtreras enligt filtret för *bbcode* och därefter med filtret för *nl2br*.

Varje filter finns i en funktion och det finns en funktion `doFilter()` som har koll på vilka filter som finns och mappar dem mot en funktion som gör själva "filterjobbet". 

**Funktionen `doFilter()`.**

```php
/**
 * Call each filter.
 *
 * @param string $text the text to filter.
 * @param string $filter as comma separated list of filter.
 * @return string the formatted text.
 */
function doFilter($text, $filter) {
  // Define all valid filters with their callback function.
  $valid = array(
    'bbcode'   => 'bbcode2html',
    'link'     => 'make_clickable',
    'markdown' => 'markdown',
    'nl2br'    => 'nl2br',  
  );

  // Make an array of the comma separated string $filter
  $filters = preg_replace('/\s/', '', explode(',', $filter));

  // For each filter, call its function with the $text as parameter.
  foreach($filters as $func) {
    if(isset($valid[$func])) {
      $text = $valid[$func]($text);
    } 
    else {
      throw new Exception("The filter '$filter' is not a valid filter string.");
    }
  }

  return $text;
}
```

Källkoden för samtliga filter finns i [`filter.php`](kod-exempel/lagra-webbsidans-innehall-i-databasen/source.php?path=filter.php#file).



Avslutningsvis {#avslutning}
------------------------------

All [källkod](kod-exempel/lagra-webbsidans-innehall-i-databasen/source.php) och [ett körbart exempel](kod-exempel/lagra-webbsidans-innehall-i-databasen/view.php) finns så att du kan testa hur det fungerar i verkligheten.

Om innehållet verkar trasigt så kan du [återställa det](kod-exempel/lagra-webbsidans-innehall-i-databasen/reset.php) innan du börjar att testa.

Detta är grunderna och visar hur du på ett enkelt sätt kan uppnå en flexibel hantering av innehåll i databasen.
