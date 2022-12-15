---
author: mos
category: javascript
updated: "2013-11-26 17:04:00"
created: "2012-11-28 23:04:43"
...
Kom igång med jQuery och Ajax
==================================

Detta är en grundläggande övning i Ajax så som det används tillsammans med jQuery. Biblioteket jQuery har ett antal inbyggda metoder för att förenkla hanteringen av Ajax. Denna tutorial visar hur du snabbt och enkelt kommer igång med jQuerys funktioner och använder dem för att hämta och spara information via JSON objekt som behandlas med PHP på serversidan.

I övningen förutsätts att du är hemmastadd i den struktur som finns på exempelprogrammen i [javascript/lekplats](javascript/lekplats) och att du kan grunderna i jQuery.

<!--more-->

[FIGURE src=/image/kunskap/javascript/bookshop-for-javascripter.png?w=w2&sa=jpg caption="En bokshop med en kundvagn gjord i Ajax."] 

Kan du inte grunderna i jQuery så bör du nog först jobba igenom den här artikeln [Kom igång med jQuery](kunskap/kom-igang-med-jquery).

Känner du dig osäker på grunderna i JavaScript så finns hjälp via ["JavaScript - Argh! - Måste jag?"](kunskap/javascript-argh-maste-jag) som ger dig en grund att stå på när du utvecklar JavaScript och ["Programmering med grunderna i JavaScript"](kunskap/programmering-med-grunderna-i-javascript) som visar dig hur JavaScript är uppbyggt som programmeringsspråk.

Då kör vi.




Poängen med Ajax {#exempel}
--------------------------------------------------------------------

Själva poängen med Ajax är möjligheten att göra POST och GET utan att ladda om sidan, att skicka iväg eller hämta information som normalt skulle krävt en omladdning av sidan. Ett bra exempel kan vara en inloggning på en webbplats eller en möjlighet att uppdatera sin profilinformation utan att sidan laddas om. I båda dessa fall är det formulärhantering som använder sig av Ajax för att posta informationen och få ett svar om det gick bra eller ej.

Ett ännu bättre exempel kan vara en "shopping cart", en kundvagn i en webbshop. Varorna man köper hamnar i kundvagnen och där kan man se en sammanställning av de varor man är på väg att köpa. Ytterligare ett vanligt exempel är när man betalar varorna i sin kundvagn med sitt kreditkort, då används Ajax för att kommunicera med betalningsservern så att kunden får en uppdatering på vad som händer.

Ett mindre bra exempel där man kan använda Ajax vore att visa ett citat från Marvin [^1] som uppdateras varje gång man klickar på Marvin. Men, någonstans skall man börja, det är i all fall ett litet exempel som visar hur grunderna fungerar. Låt oss implementera citatmaskinen Marvin med ajax.



jQuerys API för Ajax {#intro}
--------------------------------------------------------------------

jQuery har ett API (Application Programmers Interface) för Ajax-relaterade funktioner. API:et består av tiotalet funktioner som du kan få en översikt av på [jQuery's api-sida](http://api.jquery.com/category/ajax/).

Själva kärnan är metoden [`jQuery.ajax()`](http://api.jquery.com/jQuery.ajax/). Det finns flera metoder som är så kallade wrappers, ["ajax shorthand methods"](http://api.jquery.com/category/ajax/shorthand-methods/), som i sin tur använder sig av `.ajax()`.

Så här kan du hämta en sträng via ett JSON-objekt, från en webbplats, och visa upp den på din webbsida genom att använda short-hand metoden `.getJSON()`.

**jQuery shorthand metod för `.getJSON()`.**

```javascript
$.getJSON('quote.php', function(data){
  $('#quote').fadeOut(function() {
    $('#quote').html(data.quote).fadeIn();
  });
  console.log('.getJSON() request returned successfully.');    
});
```

Det första argumentet är urlen till sidan och andra argumentet är en funktion som anropas när anropet är klart. Som parameter data får funktionen resultatet från Ajax-förfrågan.

Samma hantering kan ske med *arbetshästen* `.ajax()`. Då ser det ut så här.

**jQuery metod `.ajax()`.**

```javascript
$.ajax({
  url: 'quote.php',
  dataType: 'json',

  success: function(data){
    $('#quote').fadeOut(function() {
      $('#quote').html(data.quote).fadeIn();
    });
    console.log('.ajax() request returned successfully.');    
  },

  error: function(jqXHR, textStatus, errorThrown){
    console.log('.ajax() request failed: ' + textStatus + ', ' + errorThrown);    
  },
});
```

Resultatet blir det samma, vilken man använder kan vara ett personligt val. En "shorthand method" kan naturligtvis vara behändiga och enkla att använda, men i denna övning så använder vi oss enbart av `.ajax()`.

Så här kan ovan kod se ut när man gör ett exempel av den.

[FIGURE src=/image/snapshot/Get_going_with_jQuery_Ajax.jpg?w=w2 caption="Samma resultat oavsett om `.ajax()` eller `.getJSON()` används."]

Du kan [testa, och studera, exempelkoden](javascript/lekplats/get-going-with-jquery-ajax/).

Så, låt oss kika lite mer på serversidan av exemplet, och bygga vidare.



Be Marvin om ett citat {#polla}
--------------------------------------------------------------------

[FIGURE src=/image/kunskap/javascript/marvin-quotes.jpg?w=w2 caption="Citat-maskinen Marvin är laddad med citat, redo att hämtas via Ajax."] 

Det vi behöver är ett PHP-skript på serversidan som är själva citatmaskinen. Det kan se ut så här:

**PHP-kod på serversidan med `quote.php`.**

```php
<?php
$quotes = array(
	'I could calculate your chance of survival, but you won\'t like it.', 
	'I\'d give you advice, but you wouldn\'t listen. No one ever does.', 
	'I ache, therefore I am.', 
	'I\'ve seen it. It\'s rubbish. (About a Magrathean sunset that Arthur finds magnificent)', 
	'Not that anyone cares what I say, but the Restaurant is on the other end of the universe.', 
	'I think you ought to know I\'m feeling very depressed.',
	'My capacity for happiness," he added, "you could fit into a matchbox without taking out the matches first.',
	'Arthur: "Marvin, any ideas?" Marvin: "I have a million ideas. They all point to certain death."',
	'"What\'s up?" [asked Ford.] "I don\'t know," said Marvin, "I\'ve never been there."',
	'Marvin: "I am at a rough estimate thirty billion times more intelligent than you. Let me give you an example. Think of a number, any number." Zem: "Er, five." Marvin: "Wrong. You see?"',
	'Zaphod: "Can it Trillian, I\'m trying to die with dignity. Marvin: "I\'m just trying to die."',
);

header('Content-type: application/json');
echo json_encode(array("quote" => $quotes[rand(0, count($quotes)-1)]));
```

Spara koden ovan som ett script `quote.php` och du har din egna lilla citatmaskin som vid varje förfrågan levererar ett JSON objekt innehållande ett citat.

När man skickar ett JSON objekt så är den korrekta HTTP-headern `application/json`, läs [mer om alternativen och bakgrunden](http://stackoverflow.com/questions/477816/what-is-the-correct-json-content-type).

På klientsidan gör vi ett javascript som genom en ajax-request anropar citat-maskinen `quote.php`. Jag använder jQuery's funktion `.ajax()`  och väljer vilken url som skall anropas, vilket typ av resultat som kommer tillbaka, i detta fallet `json` [^2][^3], och slutligen definierar jag en funktion som anropas vid `success` och en som anropas vid `error`.

Så här kan det se ut.

**Anropa `quote.php` via Ajax.**

```javascript
$.ajax({
	url: 'quote.php',
	dataType: 'json',
	success: function(data){
		$('#quote').fadeOut(function() {
			$('#quote').html(data.quote).fadeIn();
		});
		console.log('Ajax request returned successfully.');    
	},
	error: function(jqXHR, textStatus, errorThrown){
		console.log('Ajax request failed: ' + textStatus + ', ' + errorThrown);    
	},
});
```

Där har vi vår citatmaskin i form av Marvin. Pröva min version av [Marvin citatmaskinen](javascript/lekplats/get-marvin-quotes-using-ajax/).

Bra, då har vi kommit igång med jQuery och `.ajax()`.



Felsök och undersök {#felsok}
--------------------------------------------------------------------

Felsökning kan bli utmanande när vi jobbar med Ajax. Som om det inte räckte med den felsökningen vi redan har kontroll över så gäller det nu att hantera även ajax-förfrågningar. Här kommer lite tips på vägen.



###En vanlig länk {#url}

I Marvins fall så är skriptet, som [levererar citatet](javascript/lekplats/get-marvin-quotes-using-ajax/quote.php), tillgängligt som vilken länk som helst. Öppna upp den i webbläsaren för att se vad den visar.

[FIGURE src=/image/snapshot/js-marvin-quote.jpg?w=w2 caption="Öppna länken i en webbläsare för att se vad den visar."]

På detta sätt får du enkelt fram resultatet som skickas till webbläsaren. Detta är det enklaste sättet att felsöka problem på serversidan. Här ser du direkt om ditt skript är felfritt.



###Validera JSON objekt med tredje part {#json}

Om du misstänker problem med själva JSON-objektet så kan du validera det med en tredje part. Till exempel så finns det webbtjänster som kan [validera ett JSON objekt](http://jsonlint.com/).

[FIGURE src=/image/snapshot/jsonlint.jpg?w=w2 caption="Validera ditt JSON objekt hos en tredje part."]



###Felsök i Firebug konsol {#console}

När du vet att en ajax-fråga sker, så kan du undersöka den via Firebugs konsol. Du kan se om den gick bra, vilken förfrågan som skickades och vad svaret blev.

[FIGURE src=/image/snapshot/js-marvin-felsok-console.jpg?w=w2 caption="Felsök ajax-frågan via Firebug konsol."]



###Felsök i Firebug net {#console}

Du kan också felsöka ajax-frågor i Firebugs Net-tab. Där ser du information om frågan och svaret.

[FIGURE src=/image/snapshot/js-marvin-felsok-net.jpg?w=w2 caption="Felsök ajax-frågan via Firebug net."]

Man behöver verkligen veta om vilka felsökningsmöjligheter man har, när man ger sig in i en underbar värld av Ajax. Annars blir man snabbt frustrerad.



Logga in med Ajax och PHP sessioner {#login}
--------------------------------------------------------------------

Låt oss göra ett login-formulär och anropa ett skript `login.php` som verifierar oss. I samband med verifieringen startas en PHP-session som håller koll på vem som är inloggad. Så här kan det se ut.

[FIGURE src=/image/snapshot/js-ajax-login.jpg?w=w2 caption="Logga in med Ajax och låt PHP hålla koll med sessionen."]

På serversidan finns ett PHP-skript som startar en session och svarar på olika frågor enligt följande.

1. **?do=login**: POST, logga in användaren och bifoga *user* och *password*.
2. **?do=logout**: POST, logga ut användaren.
3. **?do=status**: POST, visa vem som är den inloggade användaren.

**Del av kod på serversidan i `login.php`.**

```php
<?php
// Create the session
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();

// Get incoming on what to do
$do = isset($_GET['do']) ? $_GET['do'] : null;

// Do login
if($do == 'login') {
	if(in_array($_POST['user'], array('doe', 'root', 'admin'))) {
		$_SESSION['user'] = $_POST['user'];
		$output = "Successfully login as user: " . $_SESSION['user'];
	}
	else {
		$_SESSION['user'] = 'Unknown user, not authenticated';
		$output = "Failed login, try login as doe, root or admin";
	}
}

// Deliver the response, as a JSON object containing the name of the user.
header('Content-type: application/json');
echo json_encode(array("output" => $output));
```

I samtliga fall skickas tillbaka ett JSON-objekt med en sträng som ger resultatet.

På klientsidan är det ett formulär med ett antal knappar som är kopplade till eventhanterare. Jag valde att göra vanliga knappar och därmed submittas aldrig formuläret, det är vanliga knappar, *buttons*, med en eventhanterare kopplad till respektive knapp.

**Formuläret i `index.php`.**

```php
<form id="form1" method=post>
  <p><label>Login:<br><input type=text name=user></label></p>
  <p><label>Password:<br><input type=password99 name=password></label></p>
  <p>
    <input id="login" type=button name=login value=Login>
    <input id="logout" type=button name=logout value=Logout>
    <input id="status" type=button name=status value=Status>
  </p>
  <p><output id="output"></output></p>
</form>
```

Till varje knapp kopplas en eventhanterare. Så här ser eventhanteraren ut för login.

**Eventhanterare för login.**

```javascript
/**
 * Eventhandler for #login
 */
$('#login').on('click', function(event) {

  $('#output').removeClass().addClass('working').html('<img src="http://dbwebb.se/img/loader.gif"/> Performing login...');

  $.ajax({
    type: 'post',
    url: 'login.php?do=login',
    data: $('#form1').serialize(),
    dataType: 'json',
    success: success
  }); 

  console.log('Form submitted, lets wait for a response.');
});
```

Förutom lite pill med en animerad gif-bild så görs helt enkelt ett ajax-anrop och formulärets data serialiseras och bifogas.

I detta exempel fick du ett litet större exempel på ajax-anrop via POST-metoden istället för GET. Men egentligen är det enbart `?do=login` som verkligen använder POST-metoden. De andra två gör samma sak om man anropar dem via GET, eller via webbläsaren som vanligt. I detta fallet är det okey, det kan till och med vara enklare att felsöka när man använder GET, än om man använder POST. 

Att felsöka ett sådant här exempel göres enklast med Firebug konsol eller net. Där kan man även se eventuella PHP-fel.

[FIGURE src=/image/snapshot/js-ajax-post-felsok.jpg?w=w2 caption="Felsök Ajax POST via Firebugs konsol eller net."]

Se till att du känner dig bekväm med felsökningen, annars blir det svårt att göra lite större exempel. Se till att du känner att du har kontroll över ajax-frågan, innan du går vidare.



En kundvagn {#kundvagn}
--------------------------------------------------------------------

Låt oss då göra ett litet större exempel i form av en enkel kundvagn. Det handlar om att utöka ovanstående exempel och använda en mix av HTML, CSS, JavaScript, jQuery, Ajax och PHP för att skapa en liten variant av en webbshop. En webbshop med en kundvagn som är gjord med Ajax.

[Så här kan det se ut](javascript/lekplats/shopping-cart-using-jquery-ajax/).

[FIGURE src=/image/kunskap/javascript/bookshop-for-javascripter.png?w=w2&sa=jpg caption="En fulladdad kundvagn med JavaScript-böcker."]

Kan du skapa en sådan själv? Även om det är ett väldigt litet exempel så gäller det att tänka till hur man skall göra. Hur ska man strukturera sådan här kod? Var skriver man HTML-koden? Kanske i `index.php` i `main.js` eller i `shop.php`. Eller i alla tre filerna? Det tål att tänka på.

Mitt exempel bygger på ett PHP-skript, `shop.php` som lagrar kundvagnen i sessionen. Varje gång man lägger något i shopping-vagnen så anropas `shop.php`.

I `main.js` görs ett antal Ajax-frågor för att hantera när nya saker läggs till kundvagnen och när den töms. Man kan se det som ett API som erbjuds av `shop.php`.

I detta fallet så använder jag en mix av GET och POST för att skicka parametrar till `shop.php`. Du kan testa att, via en direkt länk, [hämta nuvarande kundvagn](javascript/lekplats/shopping-cart-using-jquery-ajax/shop.php).

Ser du att det är ett JSON-objekt och ser du hur det är uppbyggt? Nåväl, kanske inte så uppenbart men fullt läsbart. Så här ser det ut om man formaterar det lite bättre.

Ett JSON objekt för en tom kundvagn:

```javascript
{
	"sum" : 0,
	"numitems" : 0,
	"items" : [],
	"content" : "<table>\n\t<tr><th>Item<\/th><th>Quantity<\/th><th>Sum<\/th><\/tr>\n\t\n<\/table>\n"
}
```

Ett JSON objekt för en kundvagn som innehåller lite varor:

```javascript
{
	"sum" : 57,
	"numitems" : 3,
	"items" : {
		"book1" : {
			"numitems" : 2,
			"sum" : 34,
			"title" : "JavaScript The Definitive Guide"
		},
		"book3" : {
			"numitems" : 1,
			"sum" : "23",
			"title" : "jQuery Novice To Ninja"
		}
	},
	"content" : "<table>\n\t<tr><th>Item<\/th><th>Quantity<\/th><th>Sum<\/th><\/tr>\n\t<tr><td>JavaScript The Definitive Guide<\/td><td>2<\/td><td>34<\/td><\/tr>\n<tr><td>jQuery Novice To Ninja<\/td><td>1<\/td><td>23<\/td><\/tr>\n\n<\/table>\n"
}
```

Om du analyserar dessa JSON objekt så kan du se vilken information som skickas mellan `shop.php` och `main.js`. Du har ju även tillgång till källkoden om du vill se facit. Men, *kanske är det dags att pröva om dina vingar bär*? Kanske kan du komma på en bra struktur för uppdelningen av koden i ett sådant här program? Kan du göra det så att det blir enkelt att återanvända i ditt nästa projekt kanske? En flexibel och återanvändbar kundvagn? 

Gör så gott du kan, kika på min kod när du är klar eller när du behöver livlinor. Kritisera min kod, visst kan DU göra det mycket bättre? Klart du kan. Försök. *Kan själv*.



Checka ut och betala {#checkout}
--------------------------------------------------------------------

Fint, du gjorde en webbshop och en kundvagn. Nu måste vi kunna ta betalt också. Vi behöver en checkout-sida med betalning med kreditkort. Om du klarade kundvagnen på ett galant sätt så är det nog dags att du mopsar upp dig, tuffar till och och bestämmer att en utcheckningsfunktion, det kan ju inte vara så svårt. Men om du kämpade med kundvagnen, då skall du nog hålla denna uppgiften på ett enklare plan. 

[FIGURE src=/image/kunskap/javascript/utcheckning-med-kreditkort.png?w=w2&sa=jpg caption="Här går det bra att betala med kreditkort."] 

Här får du en resumé om **hur jag gjorde...**

Jag började med ett enkelt formulär, skrivet rakt upp och ned i HTML-koden i `index.php`. Men, ganska snabbt bestämde jag mig för att så ville jag inte göra. Jag tyckte att jag *kunde bättre* än att skriva formulär för hand så jag valde att använda klassen `CForm` som finns som fristående del i ramverket Lydia.

Läs mer om [klassen `CForm` och hur den kan användas](kunskap/cform-en-php-klass-for-att-skapa-presentera-och-validera-html-formular).  

Jag började att göra ett stiligt formulär som [fungerade på vanligt sätt](javascript/lekplats/one-page-checkout-using-ajax/no_ajax.php), alltså inte via Ajax. 

Så långt allt väl. Sedan gäller det då att konvertera formuläret till att skickas via Ajax. Du kan ju redan grunderna. 

Om du använder en traditionell submit-knapp så behöver du hindra default-eventet, så att formuläret inte postas på vanligt sätt. 

**Hindra default-event.**

```javascript
event.preventDefault();
```

Du kan kika på min [slutliga utcheckningssida](javascript/lekplats/one-page-checkout-using-ajax/), nu ajaxifierad.

Om du håller upp sidorna jämte varandra så är det inte mycket som skiljer rent utseendemässigt. Bakom kulisserna så är det delvis två skilda hanteringar av hur man på serversidan hanterar formuläret, och hur man hanterar valideringsfel av formuläret. Det är inte två helt vitt skilda hanteringar men, ändå två olika taktiker. Det är en bra övning att göra båda vägarna, det hjälper dig att förstå hur hanteringen skiljer sig åt.

I grunden är detta en enkel uppgift. Om du tycker det är svårt så bör du hålla din lösning på en enklare nivå. Satsa på grunderna. Om du känner för en utmaning så försöker du att göra som jag och skapar först ett vanligt formulär och sedan en Ajax-baserad variant och dessutom försöker du få dem att dela så mycket kod som möjligt. Om du har en egen klass som motsvarar `CForm` så kan du använda den. En sådan klass är guld värd den dagen du skall skapa mängder av formulär i din webbplats. Du kan tjäna mycket på att lära dig en sådan typ av klass.

Så, detta är en övning där du får välja väg, en svårare och tuffare väg eller så försöker du finna en väldigt enkel väg fram till din kreditkortsbetalning. Kör hårt. Detta är ett lysande tillfälle att öva formulärhantering, validering av formulär, både på klientsidan och på serversidan. På klientsidan kan du använda *HTML5 för validering* eller så letar du reda på en *jQuery-plugin* som kan hjälpa dig. På serversidan gör `CForm` valideringen och väljer du ett annat klassbibliotek så bör det kunna hjälpa dig med valideringen. Välj din väg efter ambitionsnivå och nivå på din kunskap.



Summering {#summering}
--------------------------------------------------------------------

Bra jobbat. Vill du fråga något om denna kunskaps-artikel så går det bra i forumet. Det finns en [tråd dedikerad](f/4638) till denna artikel. 



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2013-11-26 (B, mos) Uppdaterad med felsökning, login-exempel.  
2012-11-28 (A, mos) Första utgåvan.  
</span>

Att göra:

* Rensa upp kundvagns/checkout-exemplet när CForm är uppdaterad. Beskriv hur man gör det, och möjligen lägg till någon extra uppgift i kursmomentet.
* Förklara JSON som datahantering?



Referenser {#referenser}
------------------------

Följande är referenser som använts som fotnötter i texten.

[^1]: [Marvin, en IRC-bot för att hålla koll på forumet](http://dbwebb.se/f/41).
[^2]: [MDN om JSON](https://developer.mozilla.org/en-US/docs/JSON).
[^3]: [PHP om JSON](http://php.net/manual/en/book.json.php).
