---
author: mos
published: "2016-08-26"
category:
    - kursnyheter
...
Välkommen till distansprogrammet i Webbprogrammering 2016
==================================

[FIGURE src="/image/snapht16/var-bor-programstudenter-distans.png?w=c5&cf" class="right"]

Då var det upprop för distansprogrammet i Webbprogrammering anno 2016.

Man får säga välkommen hit!

Låt oss starta.

<!--more-->

Det finns 60 studieplatser och i dagsläget är 83 studenter antagna. Vi får se hur många som dyker upp till uppropet och hur många som är kvar efter första månaden.

Oavsett vad så är ni alla hjärtligt välkomna hit!



Var kommer ni ifrån? {#var}
-----------------------------------

Här kan ni se en översikt över var ni kommer ifrån. Ni är utspridda över större delen av landet.

<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>

<script type="text/javascript" src="https://www.google.com/jsapi?key=AIzaSyCyVZiZwICmvsDrwe7JNaPaJUZX_QSxRTw"></script>

<script type='text/javascript'>
    google.charts.load('45', { mapsApiKey: "AIzaSyCyVZiZwICmvsDrwe7JNaPaJUZX_QSxRTw", packages: [ 'geochart'] });
    //google.charts.load('current', {'packages': ['geochart']});
    google.charts.setOnLoadCallback(drawMarkersMap);

 
  function drawMarkersMap() {
  var data = google.visualization.arrayToDataTable([
    ['Ort',   'Antal'],
    ["Björna", 1],
    ["Borlänge", 2],
    ["Borås", 1],
    ["Bräkne-Hoby", 1],
    ["Djursholm", 1],
    ["Dyltabruk", 2],
    ["Enskede", 1],
    ["Eskilstuna", 2],
    ["Finspång", 2],
    ["Gävle", 2],
    ["Göteborg", 4],
    ["Helsingborg", 1],
    ["Huddinge", 1],
    ["Hägersten", 1],
    ["Hällefors", 1],
    ["Hässelby", 1],
    ["Hässleholm", 1],
    ["Iggesund", 1],
    ["Järfälla", 2],
    ["Jönköping", 1],
    ["Karlskrona", 1],
    ["Kista", 1],
    ["Kullavik", 1],
    ["Lessebo", 1],
    ["Lidingö", 1],
    ["Linköping", 1],
    ["Malmö", 5],
    ["Nyköping", 1],
    ["Nässjö", 1],
    ["Saltsjö-Boo", 1],
    ["Sandviken", 1],
    ["Skellefteå", 1],
    ["Skogås", 1],
    ["Skutskär", 1],
    ["Skyttorp", 1],
    ["Sollentuna", 2],
    ["Stockholm", 3],
    ["Sundbyberg", 1],
    ["Sundsvall", 1],
    ["Södra Sandby", 1],
    ["Tibro", 1],
    ["Trollhättan", 1],
    ["Tomelilla", 1],
    ["Trångsund", 2],
    ["Umeå", 1],
    ["Upplands Väsby", 1],
    ["Uppsala", 4],
    ["Valla", 1],
    ["Veberöd", 1],
    ["Vendelsö", 1],
    ["Vällingby", 1],
    ["Vänge", 1],
    ["Västra Frölunda", 1],
    ["Växjö", 2],
    ["Älghult", 1],
    ["Älvsjö", 1],
    ["Ånäset", 1],
    ["Örebro", 1],
    ["Östersund", 1]
  ]);

  var options = {
    region: 'SE',
    displayMode: 'markers',
    colorAxis: {colors: ['green', 'blue']}
  };

  var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
  chart.draw(data, options);
};
</script>

<div id="chart_div" style="width: 700px; height: 500px;"></div>

Det tar lite tid att ladda alla orterna i kartan, varje ortsnamn geokodas av Googles API, så de ploppar fram efterhand.

Om jag bara lyckas få min karta ovan att fungera dynamiskt, så borde det se ut så här.

[FIGURE src=/image/snapht16/var-bor-alla-distansare.png caption="Skärmdump av kartan som fungerar lokalt hos Mikael..."]



Uppropet {#uppropet}
-----------------------------------

Det formella uppropet består i att ni [fyller i en enkät](https://goo.gl/forms/a8c78UeoThbWfhtB2) som ni även fått skickad till ert mail.

När ni skickat in den så är ni formellt uppropade på programmet och studieplatsen är er. Förvalta platsen nu väl.


Följande har hänt, och händer nu vidare.



Introveckan {#intro}
-----------------------------------

På [campus hade vi en introvecka](blogg/schema-introveckan-2016) och den avslutades med studentkårsaktiviteter som pågår under helgen och under kommande vecka.

På förmiddagarna träffades vi i labbsalarna och där var målet att alla skulle ha labbmiljön installerad innan veckan var slut.

Distansstudenterna var inbjudna att delta via hangout och nånstans mellan 10-20 blivande studenter dök upp under veckan.

På eftermiddagarna var det diverse info varvat med aktiviteter från lärarteamet.

Om du inte deltog i introveckan så är tipset att du försöker komma igång och installera labbmiljön så fort det bara går.



Presentation kring uppropet {#pres}
-----------------------------------

Mikael har några [videos där han säger hej och välkommen till dig som distansstudent](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_strrmFRWhLnPJzViNcwee).

Kika på dem. De hjälper dig med en första orientering och underlättar att komma igång med kurserna.



Kurserna startar nu {#kursstart}
-----------------------------------

Då kör vi.

[Kom igång med kurserna](https://dbwebb.se/kurser/faq/kom-igang).

Det är basen du behöver för att komma igång med kurserna. Fixa den.



Börja jobba {#jobba}
-----------------------------------

Du har två kurser som inleder terminen. Du har nu tillgång till dem via ITs och därmed tillgång till allt kursmaterial samt information kring kurserna.

Skumma igenom instruktionerna för kmom01 i de båda kurserna.

Gå sen direkt till att installera labbmiljön i respektive kurs. 

* [Labbmiljö htmlphp](kurser/htmlphp/kmom01#labbmiljo).
* [Labbmiljö python](kurser/python/kmom01#labbmiljo).

När det är klart kan du återigen läsa igenom instruktionen för respektive kmom och börja jobba.



Avslutningsvis {#avslut}
-----------------------------------

Du kan säkert tycka det är mycket att sätta dig in i på en gång. Det är det. Ge det den tiden som behövs. 

Hör av dig i hangout, forum, chatt eller mail om du har frågor.

Här är en [egen tråd i forumet om uppropet](t/5527). Fråga gärna där.


/Mikael och resten av lärarteamet
