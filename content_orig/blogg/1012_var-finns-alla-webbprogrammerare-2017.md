---
author:
    - mos
category:
    - kursnyheter
published: "2017-09-01"
...
Var finns alla webbprogrammerare anno 2017
==================================

[FIGURE src="image/snapht17/var-bor-alla-distansare.png?w=c5&cf&a=50,40,10,30" class="right"]

Vi gör en koll på var alla våra studenter finns och kommer ifrån, oavsett om de går på campus eller deltar via distans.

Kollen baseras på de som påbörjar sina studier hösten 2017 och är registrerad någon av våra webb-utbildningar/kurspaket.

<!--more-->



Var kommer ni ifrån? {#var}
-----------------------------------

Här kan ni se en översikt över var ni blivande webbprogrammerare kommer ifrån. Som ni ser så är ni utspridda över större delen av landet. De som saknar adress eller kommer från utlandet är borttagna ur listan.

<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>

<script type="text/javascript" src="https://www.google.com/jsapi?key=AIzaSyCyVZiZwICmvsDrwe7JNaPaJUZX_QSxRTw"></script>

<script type='text/javascript'>
    google.charts.load('45', { mapsApiKey: "AIzaSyCyVZiZwICmvsDrwe7JNaPaJUZX_QSxRTw", packages: [ 'geochart'] });
    //google.charts.load('current', {'packages': ['geochart']});
    google.charts.setOnLoadCallback(drawMarkersMap);

 
  function drawMarkersMap() {
  var data = google.visualization.arrayToDataTable([
    ['Ort',   'Antal'],
    ["Agnesberg", 2],
    ["Aplared", 1],
    ["Backaryd", 1],
    ["Billesholm", 1],
    ["Bjärred", 1],
    ["Björklinge", 1],
    ["Bollebygd", 1],
    ["Borgholm", 2],
    ["Borlänge", 2],
    ["Borås", 5],
    ["Brastad", 1],
    ["Bromma", 2],
    ["Bromölla", 1],
    ["Bunkeflostrand", 1],
    ["Ellös", 1],
    ["Enköping", 5],
    ["Enskede", 3],
    ["Eskilstuna", 2],
    ["Falkenberg", 1],
    ["Falun", 2],
    ["Farsta", 2],
    ["Floda", 1],
    ["Forshaga", 1],
    ["Färila", 1],
    ["Gimo", 2],
    ["Gislaved", 1],
    ["Gävle", 3],
    ["Göteborg ", 13],
    ["Halmstad", 1],
    ["Handen", 1],
    ["Helsingborg", 7],
    ["Hisings Backa", 1],
    ["Hudiksvall", 3],
    ["Hägersten", 5],
    ["Hälleforsnäs", 1],
    ["Hässelby", 1],
    ["Hässleholm", 1],
    ["Hästveda", 1],
    ["Höör", 1],
    ["Johanneshov", 1],
    ["Jämjö", 3],
    ["Järfälla", 1],
    ["Järna", 1],
    ["Jönköping", 1],
    ["Kalmar", 4],
    ["Karlshamn", 1],
    ["Karlskoga", 1],
    ["Karlskrona", 6],
    ["Karlstad", 1],
    ["Katrineholm", 3],
    ["Kista", 4],
    ["Knislinge", 1],
    ["Kristianstad", 1],
    ["Kullavik", 3],
    ["Kungälv", 1],
    ["Kållekärr", 1],
    ["Kävlinge", 1],
    ["Köping", 1],
    ["Landskrona", 1],
    ["Lidingö", 3],
    ["Lidköping", 1],
    ["Limhamn", 4],
    ["Linderöd", 1],
    ["Linköping", 5],
    ["Ljusdal", 1],
    ["Luleå", 2],
    ["Lund", 3],
    ["Lönneberga", 1],
    ["Malmö", 13],
    ["Mellerud", 1],
    ["Nacka", 1],
    ["Norrköping", 3],
    ["Norsborg", 2],
    ["Nybro", 1],
    ["Nykvarn", 1],
    ["Nynäshamn", 1],
    ["Oxie", 1],
    ["Perstorp", 1],
    ["Piteå", 1],
    ["Rimforsa", 1],
    ["Ronneby", 2],
    ["Rödeby", 1],
    ["Sandviken", 2],
    ["Segeltorp", 1],
    ["Sjuntorp", 1],
    ["Skanör", 2],
    ["Skellefteå", 1],
    ["Skene", 1],
    ["Skärholmen", 2],
    ["Skövde", 2],
    ["Sollentuna", 5],
    ["Solna", 4],
    ["Spånga", 1],
    ["Stavanger", 1],
    ["Stockholm", 18],
    ["Stora Höga", 1],
    ["Strängnäs", 1],
    ["Sundbyberg", 3],
    ["Sundsvall", 2],
    ["Svängsta", 1],
    ["Sävedalen", 1],
    ["Söderbärke", 1],
    ["Södertälje", 1],
    ["Tavelsjö", 1],
    ["Torestorp", 1],
    ["Torslanda", 1],
    ["Trelleborg", 1],
    ["Trensum", 2],
    ["Tungelsta", 2],
    ["Täby", 4],
    ["Tävelsås", 1],
    ["Töreboda", 1],
    ["Uddevalla", 2],
    ["Umeå", 1],
    ["Uppsala", 12],
    ["Vallentuna", 3],
    ["Vasa", 1],
    ["Vällingby", 2],
    ["Vänge", 1],
    ["Västervik", 1],
    ["Västerås", 2],
    ["Västra Frölunda", 2],
    ["Växjö", 2],
    ["Åkersberga", 3],
    ["Årsta", 1],
    ["Ängelholm", 1],
    ["Örebro", 6],
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

Håll musen över kartan så zoomar den in på området.

Om kartan ovan fungerar dynamiskt så borde det se ut så här.

[FIGURE src=image/snapht17/var-bor-alla-distansare.png caption="Skärmdump av kartan som fungerar lokalt hos Mikael..."]



Förra årets koll {#anno2016}
----------------------------------------

Vi gjorde två liknande kollar förra året i artiklarna "[Välkommen till distansprogrammet i Webbprogrammering 2016](blogg/var-finns-alla-programstudenter-pa-distans)" och "[Var finns alla kurspaketare på distans anno 2016?](blogg/var-finns-alla-kurspaketare-pa-distans)".
