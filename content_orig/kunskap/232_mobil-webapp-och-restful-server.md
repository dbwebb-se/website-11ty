---
author: mos
category: javascript
revision:
    2016-11-11: (C, mos) Ändrade länk till quote.php.
    2016-10-24: (B, mos) Formattering av bilder.
    2015-11-23: (A, mos) Första utgåvan inför kurs webapp.  
updated: "2015-11-23 14:31:09"
created: "2015-10-27 11:17:32"
...
Mobil webapp och RESTful server
==================================

[FIGURE src=/image/snapht15/ajax-af-lista.png?w=c5&a=15,50,55,0 class="right"]

Hur kan vi använda jQuery Mobile för att bygga en webapp som hämtar sin information från en RESTful server och JSON objekt? Låt oss bygga ut den webapp vi har och införa hantering för att hämta information från en extern server.

För att lyckas med detta behöver vi ha lite koll på hur AJAX fungerar med jQuery, vi behöver ha koll på JSON och RESTful API:er. Låt oss nu sätta samman detta i meappen.

<!--more-->



Introduktion {#intro}
--------------------------------------

I två tidigare artiklar har vi bekantat oss med jQuery Mobile. Det var artiklarna "[Kom igång och skapa en mobil webapp med jQuery Mobile](kunskap/kom-igang-och-skapa-en-mobil-webapp-med-jquery-mobile)" och "[Att göra en mobilapp av en mobil-anpassad webbplats](kunskap/att-gora-en-mobilapp-av-en-mobil-anpassad-webbplats)" där vi byggde upp en [webbplats som ser ut så här](webapp/repo/example/meapp2).

<figure class="wrap">
[FIGURE src=/image/snapht15/webapp-listview-images.png?w=c7 class="left" caption="En listview med alternativ."]

[FIGURE src=/image/snapht15/webapp-listview-image-page.png?w=c7 class="" caption="Ett alternativ i listan valdes och visas upp."]
</figure>

Allt innehåll i webbplatsen fanns i sidan `index.html`. Men, hur fungerar det om vi skall hämta information från en server? Säg att det finns en server som har ett RESTful API som jag vill använda i min webapp? Som ett exempel så kan vi ta arbetsförmedlingen som listar alla lediga jobb per län. Hur funkar det om vi vill ha en listvy med klickbart alternativ för att se detaljer per län?

Låt oss ta reda på det.

Exempelprogrammen i denna artikel kan du [testa via dwebb](webapp/repo/example/ajax).



Hur långt håller jQuery Mobile? {#haller}
--------------------------------------

Som det är nu så bygger vi webappen med jQuery mobile (jQm) och använder oss av den arkitekturen som vi får serverad av jQm. En sådan arkitektur kan förenkla men kan också kännas tvingande om man vill ta sig loss från jQm och använda, eller komplettera med, andra tekniker.

Om nu jQm håller hela vägen så är det inget problem? Kanske inte. Låt oss iallafall undersöka hur vi gör detta i jQm.



Servrar med RESTful data {#data}
--------------------------------------

Många webbtjänster erbjuder gränsnitt via RESTful API:er där de serverar svaren i form av JSON-data. Ett sätt att bygga webbappar är att använda dessa API:er för att konsumera JSON och visa upp informationen i ett trevligt gränssnitt.

I artikeln "[Utvecklingsverktyg för RESTful tjänster](kunskap/utvecklingsverktyg-for-restful-tjanster)" visade jag hur man kom åt [Arbetsfördelingens öppna API](http://www.arbetsformedlingen.se/psidata) och fick svaret om lediga platser via en JSON-fil. Början på den filen såg ut så här.

```javascript
{
    "soklista": {
        "listnamn": "lan",
        "sokdata": [
            {
                "antal_ledigajobb": 740,
                "antal_platsannonser": 423,
                "id": 10,
                "namn": "Blekinge l\u00e4n"
            },
```

På samma sätt kan jag hämta information från Instagram om de senaste bilderna som är taggade med #dbwebb. Det är ett liknande [API för Instagram](https://instagram.com/developer/) och svaret kommer även här i JSON. Här är en del av svaret.

```javascript
"meta": {
  "code": 200
},
"data": [
  {
    "attribution": null,
    "tags": [
      "dbwebb",
      "bthirl"
    ],
```

Frågan är nu hur vi kan komma åt informationen i dessa tjänster och skapa webbappar med jQm.



Hämta information med Ajax {#ajax}
--------------------------------------

Säg att vi vill göra en sida i vår meapp som hämtar citat från en server, och visa upp citatet tillsamman med en bild. Varje gång vi klickar  på en länk, eller bilden, så hämtas ett nytt citat, utan att sidan laddas om.

Det skulle kunna se ut så här.

[FIGURE src=/image/snapht15/ajax-marvin.png?w=w2 caption="Marvin, en figur från en bok, ger oss citat via Ajax."]

Koden i sidan innehåller två exempel. Dels ett med jQuerys kompletta metod `ajax()` och ett med en kortare variant som heter `getJSON()`. Låt se hur koden ser ut.



###HTML-koden {#ajaxhtml}

Först själva HTML-koden.

```html
<div id="marvin" data-role="page">
	<div role="main" class="ui-content">
        <img src="img/marvin.jpg" class="right">
        
        <h1>Ett citat från Marvin</h1>

        <p><a id="ajax" href="#">Hämta ett citat med jQuery <code>.ajax()</code>.</a></p>

        <p><a id="getjson" href="#">Hämta ett citat med jQuery <code>.getJSON()</code>.</a></p>
        
        <div id="quote" class="quote"></div>
	</div>
</div>
```

Det är två länkar som skall ha varsin eventhanterare kopplade till sig. Sedan är det en tom div `#quote` där citatet kan skrivas ut.



###`ajax()` {#ajaxajax}

Låt oss titta på funktionen för `#ajax` länken.

```javascript
/**
 * Get a quote from Marvin using jQuery AJAX.
 *
 * @return void
 */
window.getMarvinQuoteByAjax = function() {

    $.ajax({
        url: 'https://dbwebb.se/repo/javascript/example/lekplats/get-going-with-jquery-ajax/quote.php',
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
};
```

Funktionen `ajax()` består av flera delar. Först sätter vi vilken url som skall anropas och typen för returvärdet. jQuery vill veta returvärdet för att det skall kunna hantera det. Sedan definierar vi två funktioner, en för att uppdatera sidan om allt gick rätt och en funktion för att hantera om det gick fel.

Därefter behöver vi två rader för att lägga till funktionen ovan som en eventhanterare kopplad till `#ajax`.

```javascript
// Add eventlistener for click in a link
var ajax = document.getElementById("ajax");
ajax.addEventListener("click", window.getMarvinQuoteByAjax);
```

Nu har vi kopplat en eventhanterare till klicken på länken och det som händer är att ett Ajax-anrop sker. När Ajax-anropet kommer tillbaka så hanteras det av success-funktionen som uppdaterar innehållet i den div som har id `#quote`. Går något fel anropas istället error-funktionen som skriver ut ett felmeddelande i consolen.



###`getJSON()` {#getJSON}

Funktionen `getJSON()` är en kortvariant av `ajax()`. Det blir mindre kod att skriva helt enkelt. Låt oss se hur samma funktionalitet ser ut med `getJSON`.

```javascript
/**
 * Get a quote from Marvin using jQuery getJSON.
 *
 * @return void
 */
window.getMarvinQuoteByGetJSON = function() {

    var url = "https://dbwebb.se/repo/javascript/example/lekplats/get-going-with-jquery-ajax/quote.php";

    $.getJSON(url, function(data){
      $('#quote').fadeOut(function() {
        $('#quote').html(data.quote).fadeIn();
      });
      console.log('.getJSON() request returned successfully.');
    });
};
```

Här anropar jag funktionen `getJSON(url, callback)` med en url och en callback som anropas om allt gick bra. Det blir mindre kod att läsa och kan bli lite tydligare.

Vi behöver som tidigare en eventhanterare för klick på länken.

```javascript
// Add eventlistener for click in a link
var getjson = document.getElementById("getjson");
getjson.addEventListener("click", window.getMarvinQuoteByGetJSON);
```

Vilken bör man använda, `getJSON` eller `ajax`? Båda fungerar så välj den du känner dig bekväm med, eller den som passar bäst till koden som du jobbar med. Den ena är enklare och tydligare och den andra är kraftfullare och erbjuder fler möjligheter och variationer.



Felsök Ajax {#felajax}
--------------------------------------

Att felsöka Ajax kan till en början vara lite klurigt. Du kan använda webbläsarens devtools och titta vad som händer i consolen så ser du att varje Ajax-request visas i consolen och du kan direkt se om den gick bra eller ej. 

Därefter kan du öppna devtools flik Network som visar dig de requests som gör. Klickar du på en request får du fram dess svar, *response body*, vilket är det svaret du får in i success-funktionen.

[FIGURE src=/image/snapht15/ajax-marvin-devtools.png?w=w2 caption="Debugga Ajax via devtools Console och Network."]

Bra, då har vi bekantat oss med Ajax så som det görs i jQuery.



JSON till en sida {#jsonlistview}
--------------------------------------

I kursrepot finns en exempelfil `example/arbetsformedlingen/soklista_lan.json` från Arbetförmedlingens RESTful API för att se lediga tjänster. Jag tänker nu använda den, hämta den via en AJAX request och visa upp svaret i en sida. jag väljer att använda filen istället för deras riktiga tjänst. I grunden handlar det om vilken url jag använder. Det går det enkelt att skifta från utvecklingsläge med JSON-filen på lokal webbserver och till att använda deras riktiga server.

Tanken är att skapa en sida som bygger upp sitt innehåll från JSON-data. Principen är densamma som i fallet med Marvin.

När sidan är klar kan den se ut så här.

[FIGURE src=/image/snapht15/ajax-af-total.png?w=w2 caption="Sida som visar antalet lediga jobb samt platsannonser."]

Låt nu se hur sidan byggs upp.



###HTML {#afhtml}

Först skapar jag en ny sida `#af-totalt`.

```javascript
<div id="af-totalt" data-role="page">
	<div role="main" class="ui-content">
        <h1>Det finns nu lediga jobb i Sverige</h1>
        <table>
            <tr><th>totalt_antal_ledigajobb</th><td id="totalt_antal_ledigajobb"></td></tr>
            <tr><th>totalt_antal_platsannonser</th><td id="totalt_antal_platsannonser"></td></tr>
        </table>
	</div>
</div>
```

I denna sidan skall jag enbart visa den totala mängden lediga jobb och platsannonser.



###Eventet `pagebeforeshow` {#pagebeforeshow}

I jQm finns det ett event som heter `pagebeforeshow`. Man anger vilken sida som det gäller, i nedanstående fall är det `#af-totalt` som avses. Eventet sker innan den valda sidan visas och det ger oss en möjlighet att uppdatera sidans information innan den visas för användare.

En enkel variant kan se ut så här.

```javascript
$(document).on('pagebeforeshow', '#af-totalt', function(){

    var totalFree = document.getElementById("totalt_antal_ledigajobb");
    var totalAds = document.getElementById("totalt_antal_platsannonser");

    totalFree.innerHTML = 41;
    totalAds.innerHTML = 42;

});
```

Nu är ju tanken att innehållet skall hämtas från en JSON-fil, så vi behöver en Ajax-request som utför arbetet. Det ger att koden skulle kunna se ut så här.

```javascript
$(document).on('pagebeforeshow', '#af-totalt', function(event, data){

    $.ajax({
        url: "../arbetsformedlingen/soklista_lan.json",
        dataType: "json",

        success: function (data) {
            soklistaLan = data;
            
            var totalFree = document.getElementById("totalt_antal_ledigajobb");
            var totalAds = document.getElementById("totalt_antal_platsannonser");

            totalFree.innerHTML = soklistaLan.soklista.totalt_antal_ledigajobb;
            totalAds.innerHTML = soklistaLan.soklista.totalt_antal_platsannonser;
        },

        error: function (/* request, error */) {
            console.log('Network error has occurred please try again!');
        }
    });
});
```

Eventhanteraren utför en Ajax-request och fyller i sidan så fort svaret återvänder.

Okey. Men nu kommer det att ske en Ajax-fråga varje gång vi öppnar denna sidan. Det borde ju räcka men en fråga om vi cachade JSON-svaret, eller hur?



Att cacha JSON {#cachajson}
--------------------------------------

Vi gör det enkelt och lagrar undan JSON-svaret i en variabel. Om variabeln är tom så utförs Ajax-anropet men om variabeln har ett innehåll så används det och Ajax-frågan uteblir.

Vi behöver en liten annan struktur på vår kod. Först så flyttar vi *update*-koden till en egen funktion.

```javascript
/**
 * Update the page showing AF total.
 */
window.updateAFTotal = function() {
    var totalFree = document.getElementById("totalt_antal_ledigajobb");
    var totalAds = document.getElementById("totalt_antal_platsannonser");

    totalFree.innerHTML = soklistaLan.soklista.totalt_antal_ledigajobb;
    totalAds.innerHTML = soklistaLan.soklista.totalt_antal_platsannonser;
};
```

Som du ser så litar funktionen på att informationen redan finns i variabeln `soklistaLan`.

Det är en variabel där vi nu skall lagra JSON-svaret. Det kan se ut så här.

```javascript
/**
 * Cache the JSON objekt.
 */
var soklistaLan = null;
$(document).on('pagebeforeshow', '#af-totalt', function(/* event, data */){

    if (soklistaLan !== null) {
        window.updateAFTotal();
        return;
    }

    $.ajax({
        url: "../arbetsformedlingen/soklista_lan.json",
        dataType: "json",

        success: function (data) {
            soklistaLan = data;
            window.updateAFTotal();
        },

        error: function (/* request, error */) {
            console.log('Network error has occurred please try again!');
        }
    });
});
```

Du kan se variabeln deklareras ovan funktionen. Den sätts till `null` till att börja med.

I inledningen av funktionen så finns följande if-sats.

```javascript
if (soklistaLan !== null) {
    window.updateAFTotal();
    return;
}
```

Den kollar om variabeln `soklistaLan` är satt och isåfall görs uppdateringen av sidan via funktionen, utan att Ajax-anropet behöver ske. Men om `soklistaLan` är null så exekveras ajax-anropet enligt följande.

```javascript
$.ajax({
    url: "../arbetsformedlingen/soklista_lan.json",
    dataType: "json",

    success: function (data) {
        soklistaLan = data;
        window.updateAFTotal();
    },

    error: function (/* request, error */) {
        console.log('Network error has occurred please try again!');
    }
});
```

Studera funktionen som anropas vid success och se hur den uppdaterar cache variabeln och anropar funktionen för att updpatera sidan.

Detta var alltså en enkel cachning av ett JSON-svar. Det minskar belastningen på servern och snabbar upp vår app. För att verifiera att din cachning fungerar så kan du alltid lägga in ett par `console.log` för att följa flödet, eller skapa brytpunkter i devtools, så ser du hur koden exekveras.



JSON till en ListView {#jsonlistview}
--------------------------------------

Nu vill jag visa en översikt av lediga tjänster och platsannonser för Sveriges alla län. Sidan skulle kunna se ut så här.

[FIGURE src=/image/snapht15/ajax-af-lista.png?w=w2 caption="Sida som visar antalet lediga jobb samt platsannonser."]

Informationen finns i samma JSON-fil som jag nyligen cachat. Låt se hur vi kan lösa detta.



###HTML {#listviewhtml}

Först en ny sida `#af-lista` där tanken är att jag skapar en ListView som skall fyllas med innehåll från JSON-filen.

```html
<div id="af-lista" data-role="page">
	<div role="main" class="ui-content">
        <ul id="af-listview" data-role="listview" data-inset="false">
            <li>Nothing here</li>
        </ul>
	</div>
</div>
```

Till att börja med en tom lista. Om något går snett, om sidan inte uppdateras så kommer listan innehålla ett element med texten "Nothing here".



###Eventet `pagebeforeshow` {#listviewbefore}

Då använder vi eventet `pagebeforeshow` för att uppdatera listan.

```javascript
/**
 * Get JSON, if not already available and update AF list,
 * before loading page.
 */
$(document).on('pagebeforeshow', '#af-lista', function(/* event, data */){

    if (soklistaLan !== null) {
      window.updateAFList();
      return;
    }

    $.ajax({
        url: "../arbetsformedlingen/soklista_lan.json",
        dataType: "json",

        success: function (data) {
            soklistaLan = data;
            window.updateAFList();
        },

        error: function (/* request, error */) {
            console.log('Network error has occurred please try again!');
        }
    });
});
```

Som du ser så gör jag det enkelt för mig och återanvänder samma struktur som jag hade i sidan som visade totalen. 

Jag har skapat en funktion `updateAFList()` som uppdaterar listan.

```javascript
/**
 * Update AP list with free jobs for each county.
 */
window.updateAFList = function() {
    var list = document.getElementById("af-listview");
    var html="";

    soklistaLan.soklista.sokdata.forEach(function(row) {
        html += "<li>" + row.namn + " (" + row.antal_ledigajobb + " lediga jobb)</li>";
    });

    list.innerHTML = html;

    $('#af-listview').listview('refresh');
};
```

Jag loopar igenom JSON-datat och skapar en ny rad för varje län och skriver ut antalet lediga jobb. Jag behöver avsluta med att låta jQm uppdatera listvyn med dess nya innehåll.



Visa varje län på egen sida {#subsida}
--------------------------------------

Det har gått rätt bra så här långt. Nu blir det naturligt att nästa steg blir att klicka på en rad i listvyn och visa detaljer om det enskilda länet. Men hur gör man det i jQm?

Resultatet kan se ut så här.

[FIGURE src=/image/snapht15/ajax-af-undersida.png?w=w2 caption="Undersida som visar lediga jobb och antal platsannonser i Blekinge."]

All information finns i JSON-filen men hur kan vi länka till och visa en sådan här undersida?



###En tanke om att bli inbyggd i ett ramverk {#inbyggd}

Jo, jag skall visa hur man gör. Men först några tankar om hur tar man reda på hur man gör detta, om man är nybörjare på jQm? Ja, det är inte helt solklart. Man googlar och försöker läsa referensmanualen. Men denna typen av användande är inte så tydligt förklarat i manualen. Det hjälper heller inte att lösningen på detta förändrats mellan senare versioner av jQm.

Kan det vara så att vi närmar oss en begränsning i jQm? Kanske, kanske inte. Det vi ser är att vissa saker, där man vill göra på ett visst sätt, blir luriga att åstakomma. Man känner en begränsning av ramverket. Man blir inbyggd i ramverket.

I detta fallet vill jag ha en variant av *client-side routing* som inte alls är ovanlig i klientbaserade JavaScript applikationer. Detta är dock inget som jag hittar som väl definierad och strukturerad del i nuvarande version av jQm. En alternativ lösning är att använda ett extern libb som löser just den klientbaserade routingen, men nu vill jag försöka lösa det i jQm, så låt se hur det kan göras.



###Routing på klient sidan i jQm {#klientside}

Vi har alltså en listvy, när vi klickar på ett val skall en undersida visas. All information finns redan i den cachade variabeln.



###HTML för undersida {#undersida}

Vi behöver skapa en undersida `#af-sida` som är mallen som kan fyllas med innehåll.

```html
<div id="af-sida" data-role="page">
    <div id="af-undersida" role="main" class="ui-content">
        Nothing yet.
    </div>
</div>
```

En tom div för `#af-undersida` och tanken är att fylla den med innehåll.



###Event `pagebeforeshow` {#subbefore}

På samma sätt som tidigare så lägger vi till en `pagebeforeshow` där vi kan uppdatera sidans innehåll.

```javascript
/**
 * Display subpage, expect that JSON is already loaded.
 */
var afSubPageId = null;

$(document).on('pagebeforeshow', '#af-sida', function(/*event, data*/){

   window.updateAFSubPage(afSubPageId);

});
```

Här skiljer det sig lite. Du kan se variabeln `afSubPageId` ovan som används som ett argument för att bestämma vilken undersida som skall visas. Variabeln ligger utanför eventhanteraren och kan på det viset kommas åt från andra funktioner. Vi kommer snart att se hur den får sitt värde.



###Uppdatera sidans innehåll {#subupdate}

Det finns, som tidigare, en funktion som uppdaterar sidans innehåll.

```javascript
/**
 * Update subpage with details from specified county.
 */
window.updateAFSubPage = function(pageId) {
    var element = document.getElementById("af-undersida");
    var html="Specified page id not found.";

    soklistaLan.soklista.sokdata.forEach(function(row) {
        if (row.id == pageId) {
            html = "<h1>" + row.namn + "</h1><p>Det finns " + row.antal_ledigajobb + " lediga jobb och " + row.antal_platsannonser + " platsannonser.</p>";
            return;
        }
    });

    element.innerHTML = html;
};
```

Funktionen fyller innehåll till sidan `#af-undersida`. Den loopar igenom innehållet i JSON-filen för att hitta det matchande `pageId`. Om det hittas så avbryts loopen och sidans innehåll uppdateras. Om `pageId` inte hittas så visas strängen "Specified page id not found.".



###En länk för att koppla undersidans id {#lankid}

Så, grunderna finns ovan, men hur skapar vi en länk i listvyn som öppnar undersidan? Jo, först skapar vi helt enkelt en länk i listvyn. I funktionen `updateAFList` uppdaterar vi hur HTML-koden skapas för varje rad i listvyn.

```javascript
//html += "<li>" + row.namn + " (" + row.antal_ledigajobb + " lediga jobb)</li>";
html += "<li><a href='#af-lista-" + row.id + "'>" + row.namn + " (" + row.antal_ledigajobb + " lediga jobb)</a></li>";
```

Länken vi skapar blir alltså `#af-lista-10` för att komma till Blekinge.



###Routing av undersida {#subrouting}

Det vi behöver nu är någon form av routing på klientsidan. Länken blir dynamiskt skapad från innehållet i JSON-filen och jQm har inget sätt att direkt hantera detta. Vi behöver kod för att koppla in oss i flödet, routern, där jQm byter sidor.

Denna möjligheten finns i eventet `pagecontainerbeforechange` och en lösning för routing till undersidan visas i sin helhet här.

```javascript
/**
 * Intercept change of page and implement routing.
 */
$("body").on( "pagecontainerbeforechange", function( event, ui ) {
    var to = ui.toPage;
    var from = ui.options.fromPage;

    // If not a valid pageid
    if (typeof to  === 'string') {
        var url = $.mobile.path.parseUrl(to);
        var toSubPage;

        to = url.hash || '#' + url.pathname.substring(1);

        if (from) {
            from = '#' + from.attr('id');
        }

        var length = "#af-lista-".length;
        toSubPage = to.substring(0, length);

        if (from === '#af-lista' && toSubPage === '#af-lista-') {
            event.preventDefault();
            event.stopPropagation();

            afSubPageId = to.substring(length);
            console.log("Subpageid = " + afSubPageId);
            $(":mobile-pagecontainer").pagecontainer("change", "#af-sida", { foo: "Hello World!" });
        }
    }
});
```

Låt oss se vad som händer steg för steg.

```javascript
$("body").on( "pagecontainerbeforechange", function(event, ui) {
    var to   = ui.toPage;
    var from = ui.options.fromPage;
```

Eventet anropas och andra parametern är `ui` som innehåller detaljer om både föregående sida `from` och nästa sida `to` i flödet. Vi är alltså i läget där vi lämnar föregående sida och är på väg att visa nästa sida.

Variabeln `to` kommer innehålla ett objekt om sidan känns igen av jQm och en sträng om sidan inte är känd av jQm. Det är i det andra läget som vi vill ta över kontrollen av routingen, när sidan inte känns igen av jQm. 

```javascript
// If not a valid pageid
if (typeof to  === 'string') {
    var url = $.mobile.path.parseUrl(to);
    var toSubPage;

    to = url.hash || '#' + url.pathname.substring(1);
```

Sidan är inte känd och vi kan plocka ut den del som vi vill routa till, den delen som är urlens hash. Om vi klickar på undersidan för Blekinge så kommer `to` nu att innehålla värdet `#af-lista-10`.

Vi kan nu göra lite extra kontroller och kanske även kontrollera vilken sida man kommer ifrån.

```javascript
    if (from) {
        from = '#' + from.attr('id');
    }

    var length = "#af-lista-".length;
    toSubPage = to.substring(0, length);

    if (from === '#af-lista' && toSubPage === '#af-lista-') {
```

Koden kontrollerar om `from` har ett värde och plockar isåfall fram dess id. Om man är på sidan som visar listvyn, klickar på en länk i listan, så kommer värdet på `from` nu att innehålla `#af-lista`.

Det som vi vill ha fram, är dels om `from` sidan är rätt och om `to` sidan är korrekt samt även plocka fram delen av id:et för undersidan.

```javascript
    if (from === '#af-lista' && toSubPage === '#af-lista-') {
        event.preventDefault();
        event.stopPropagation();

        afSubPageId = to.substring(length);
        $(":mobile-pagecontainer").pagecontainer("change", "#af-sida");
    }
}
```

Så, om `from` är listvyn och första delen av `to` representerar en undersida, det vill säga att länken börjar med `#af-lista-`, då vill vi ta hand om detta routingfallet.

Det första vi gör är att hindra eventet från att bubbla vidare. Vi väljer här själva att hantera eventet och stoppar dess normala hantering.

```javascript
event.preventDefault();
event.stopPropagation();
```

Sedan plockar vi ut delsträngen som innehåller id:et och placerar i en variabel som är synlig för alla funktioner som jobbar på undersidor. Till slut berättar vi för `pagecontainer` att byta sida till vår undersida.

```javascript
afSubPageId = to.substring(length);
$(":mobile-pagecontainer").pagecontainer("change", "#af-sida");
```

Klart. Nu har vi kopplat in oss på routingen som sker i jQm och hänvisat till den undersida som vi ville ladda. När sidan laddas triggas eventet `pagebeforeshow` som uppdaterar sidan baserat på värdet i `afSubPageId`.

Min kod tar här inte hänsyn till att man skulle kunna direktlänka till en undersida. Det är dock inga större svårigheter att lösa det. Man får bara se till att hantera att JSON-filen laddas och att routingen inte bryr sig om från vilken sida man kommer.



###Tankar om routing i jQm {#tanke}

Så, det blev en variant på routing i klienten med jQm. Men uppriktigt så känns det mer och mer som om jag bygger in mig i ramverket och ramverkets kod. Läser jag manualen så ser jag också att beteendet i jQm kring dessa delar har förändrats sedan tidigare versioner vilket ger mig en känsla av ett ännu icke moget ramverk. 

En sådan här klientbaserad routing till undersidor baserat på dynamiskt laddat innehåll är inte alls ovanligt när man bygger webappar. Jag är inte helt nöjd med jQm hur de hanterar denna biten. Kanske är detta en begränsning i jQm som egentligen behöver justeras, eller kräver att man släpper in ett annat ramverk som bättre hanterar routing till undersidor.

När vi använder ramverk så är det vanligt att man stöter på denna typen av situation, man är egentligen medveten om att det borde finnas bättre lösningar men ramverket begränsar koden man skriver. Vad gör man då? Man gillar läget som jag just gjorde och löser det inom ramarna för ramverket? Eller skall man plocka in ett nytt ramverk som löser just delen med routingen, eller byter man ramverk? Ja, inte direkt några enkla svar på de frågorna. Alla varianter fungerar till en viss gräns.

Oavsett vad, så tycker jag att det var en bra övning att se hur en begränsning i form av klientroutingen kunde lösas i jQm och samtidigt diskutera om det var bra eller ej.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har nu gått igenom en del av Ajax tillsammans med jQuery och jQueryMobile och sett hur vi kan använda JSON-data för att dynamiskt skapa sidornas innehåll och även skapa länkar till, och visa upp, dynamiskt skapade undersidor.

Har du [tips, förslag eller frågor om artikeln](t/4859) så finns det en specifik forumtråd för det.
