---
author: mos
category: utbildning
published: "2014-12-10 09:21:53"
updated: "2014-12-10 09:22:25"
created: "2014-12-10 09:21:53"
...
Statistik hösten 2014 över antagna och registrerade studenter
==================================

Till hösten 2014 gjordes den hittills största antagningen av studenter till dbwebb-kurserna, samtidigt startades vi två nya kurser och förberedde starten av ett nytt kurspaket samtidigt som vi utredde möjligheten till ett distansprogram för att ge möjlighet till examen på distans.

Det är en del som händer, men låt oss för en kort stund fokusera på höstens antagning och översätta den i siffror, hur många studenter antogs och hur många registrerade sig?

<!--more-->


När vi pratar hösten 2014 så erbjöds 6 fristående kurser och 1 kurspaket om tre hastigheter. Vi erbjöd 1150 studieplatser.

Sifforna nedan togs fram per 2014-09-25.


<script type="text/javascript" src="https://www.google.com/jsapi"></script>


Antagna {#antagna}
---------------------------------

Totalt antogs 1707 nya studenter. När man slår ut det per kurs så ser det ut så här.

<script type="text/javascript">
  //google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Kurs', 'Antagna'],
        ['htmlphp',     599],
        ['oophp',       373],
        ['phpmvc',      188],
        ['javascript',  201],
        ['python',      165],
        ['javascript1', 181],
    ]);

    var options = {
        title: 'Antal studenter som antogs',
        hAxis: {
            title: 'Kurs'
        },
        vAxis: {
            title: 'Antagna', 
            minValue: 0
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>
<div id="chart_div" style="width: 630px; height: 500px;"></div>

En student kan ansöka till flera kurser, så om man slår ut ansökningarna per individ så blir det 1046 enskilda individer som sökte och 25% av de sökande var tjejer. Majoriteten av de sökanden var i åldersgruppen 20-29 år.

<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Lön', 'Antal'],
      ['Tjejer',  259],
      ['Killar',  787]
    ]);

    var options = {
      title: 'Fördelning i ansökningar mellan killar och tjejer',
      is3D: true,
      pieSliceText: 'label',
      tooltip: {
        text: 'percentage',
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script>
<div id="piechart_3d" style="width: 630px; height: 400px;"></div>


<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Ålder', 'Antal'],
      [' 0-19',   18],
      ['20-29',  583],
      ['30-39',  270],
      ['40-49',  125],
      ['50-59',   39],
      ['60-69',   11],
      ['70-  ',    0]
    ]);

    var options = {
      title: 'Åldersfördelning av ansökningarna',
      is3D: true,
      pieSliceText: 'label',
      tooltip: {
        text: 'percentage',
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart1_3d'));
    chart.draw(data, options);
  }
</script>
<div id="piechart1_3d" style="width: 630px; height: 400px;"></div>



Registrerade {#reg}
------------------------------------------

Av 1046 individer -- som antogs -- var det 757 som registrerade sig på en eller flera kurser vid terminsstarten. I läsperiod 1 innebar detta totalt 862 kursregistreringar. Till detta kommer *svansen* som är de studenter som antogs till en tidigare termin på kurspaketet på hastighet 25% eller 50%. Om vi sedan lägger till de som omregistrerar sig och summerar samtliga så får vi en siffra på hur många studenter (kursregistreringar) som är aktiva den första dagen på terminen -- 985 kursregistreringar.

Så här ser det ut när man fördelar kursregistreringarna per kurs, för de kurser som startar i läsperiod 1.

<script type="text/javascript">
  //google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Kurs', 'Antal'],
        ['htmlphp',     451 + 3 + 11],
        ['oophp',       88 + 5 + 25],
        ['phpmvc',      84 + 16],
        ['javascript',  62 + 12],
        ['python',      115],
        ['javascript1', 113]
    ]);

    var options = {
        title: 'Antal kursregistreringar per kurs',
        hAxis: {
            title: 'Kurs'
        },
        vAxis: {
            title: 'Kursregistreringar', 
            minValue: 0
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }
</script>
<div id="chart_div1" style="width: 630px; height: 500px;"></div>

En viktig fråga, för den som vill dimensionera en liknande verksamhet, är att ha koll på hur stor svansen är och hur många som omregistrerar sig. Jag brukar ignorera denna biten när jag planerar och säger helt enkelt att den är "försvinnande liten i förhållande till mängden som antas". Det beror ju naturligtvis på hur många nya som antas och det beror på hur många som antogs under tidigare terminer. I detta fallet kan vi sätta en siffra på antalet omregistrerade som var 73 stycken och svansen var 51 stycken. 

Svansen (inklusive omregistrerade), var alltså 124. Med tanke på att vi nu i höst antog tre gånger så många som antogs föregående terminer så får vi anta att svansen ökar. Ökar den proportionerlig? Det skulle innebär en svans om 372 studenter till vårterminen. Jag få överväga att ändra min inställning från "försvinnande liten" till någon mer lämpligt.

Så, enkelt sagt så handlar det om knappt 1000 studenter som registrerat sig när terminen startat.



Hur många av de antagna är verkligen aktiva? {#klara}
------------------------------------------

Normalt gör vi ett 3-veckors upprop för att göra tidigt avbrott på de studenter som inte är aktiva i kurserna. Inför höstens första 3-veckors upprop gjorde jag en avstämning i de två nya kurserna, python och javascript1. Jag ville se och jämföra antalet som antogs, antal registrerade och antalet som klarade 3-veckors uppropet. Det var ungefär samma flöde av avhopp i båda kurserna. Så här såg det ut när jag gjorde avstämningen.

<script type="text/javascript">
  //google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Kurs', 'Antal'],
        ['Antagna',      165],
        ['Platser på kursen',      150],
        ['Registrerada',  115],
        ['Registrerade efter 3v',  55]
    ]);

    var options = {
        title: 'Antal kursregistreringar per kurs',
        hAxis: {
            title: 'Kurs'
        },
        vAxis: {
            title: 'Kursregistreringar', 
            minValue: 0
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
    chart.draw(data, options);
  }
</script>
<div id="chart_div2" style="width: 630px; height: 500px;"></div>

Det betyder, att om jag vill ha 100 studenter aktiva efter 3-veckors uppropet, så behöver det -- ungefär -- finnas 200 studenter som registrerat sig på kursen och för att nå det behöver vi anta 300 studenter.

Vågar man anta 300 om man bara vill ha 100?

Om jag inte använder 3-veckors uppropet aktivt -- så räcker det att anta 150 för nå 100 kursregistreringar. 

Vågar man göra ett överintag av 50%?

Eller ett överintag av 200% när man använder aktivt 3-veckors avbrott?

Vågar man göra ett överintag om antingen 50% eller 200% när man hanterar 1000 studenter?

Det vill till att vara lite flexibel -- både i kursernas struktur, bemanning och administration. Då vågar man ta ut svängarna.

Denna typen av siffror kan ge mig input till planering och allmän kursutveckling. Det finns många aspekter att fundera på när man analyserar flödet genom en kurs. Det finns sällan några enkla svar om man vill påverka detta flöde.



Avslutningsvis {#avslutning}
------------------------------------------

Hur klarar sig studenterna, hur många poäng tar de och hur många klarar av kurserna? Låt mig återkomma i vår för att göra en avstämning för att se hur det går för studenterna.


<!--

2014-09-25


Antagna samtliga:

Antagna 2078


Antagna samtliga per kurs:

DV1462  599
DV1483  382
DV1485  413
DV1486  338
DV1531  165
DV1532  181



Per anmälningskod:

C5403   73
C5404   110
C5405   180
C5406   86
C5411   165
C5412   181

KP401   137
KP402   107
KP616   43
KP617   44
KP619   40
KP801   156
KP815   149
KP816   149
KP819   114
KP820   114
KP821   115
KP822   115


SVANSEN
KP401   javascript kp ant tidigare
KP402   phpmvc kp ant tidigare
KP616   phpmvc ant vt14
KP617   javascript ant 50% vt14?
KP619   oophp ant 25% vt14?


NYA HT14
KP801   htmlphp 25%

KP815   htmlphp 50%
KP816   oophp 50%

KP820   htmlphp 100%
KP819   oophp 100%
KP821   phpmvc 100%
KP822   javascript 100%



NYA ANTAGNA HT14:

TOTALT: 1707

DV1462  599
DV1483  201
DV1485  373
DV1486  188
DV1531  165
DV1532  181


Per registreringar:
Kvinnor: 445
Man: 1262



Antal individer: 1046

Per individ:
Kvinnor: 259
Man: 787

Ålder:

 0-19 18
20-29 583
30-39 270
40-49 125
50-59 39
60-69 11
70-   0


Hur många registrerade?

av 1046 individer är det 757 som är registrerade och dök upp vid terminsstart.


Antagna per kurs (endast nyantagna):

DV1462  599
DV1483  201
DV1485  373
DV1486  188
DV1531  165
DV1532  181


Antagna per kurs (endast nyantagna) som startar lp1:

DV1462  599
DV1483  86
DV1485  110
DV1486  73
DV1531  165
DV1532  181


Registrerade per kurs (nyantagna) som startar i lp1:

DV1462  451
DV1483  53
DV1485  77
DV1486  53
DV1531  115
DV1532  113

Antagna som har kursstarter senare än lp1:

DV1483  115
DV1485  263
DV1486  115



Inklusive svansen, hur många är registrerade på kurser som startar i lp1?

Totalt 913 stycken.

DV1462  451
DV1483  62
DV1485  88
DV1486  84
DV1531  115
DV1532  113


Antal omreggade totalt 73:

DV1127  5
DV1401  3
DV1441  1
DV1462  11
DV1483  12
DV1485  25
DV1486  16


Inklusive svansen, hur många är registrerade och omreg på kurser som startar i lp1?

Totalt 977.

DV1127  5
DV1401  2
DV1441  1
DV1462  460
DV1483  74
DV1485  110
DV1486  97
DV1531  115
DV1532  113


Anmkod    Namn                                                    Prio 1  Totalt
BTH-KP990 Webbutveckling och programmering 30 hp kvartsfart           93     176
BTH-KP991 Webbutveckling och programmering 30 hp halvfart            155     315
BTH-KP992 Databaser, HTML, CSS, JavaScript och PHP 30 hp kvartsfart  141     238
BTH-KP993 Databaser, HTML, CSS, JavaScript och PHP 30 hp halvfart    144     248
BTH-KP994 Databaser, HTML, CSS, JavaScript och PHP 30 hp helfart     173     402
BTH-C5321 Databaser, HTML, CSS och skriptbaserad PHP... 7,5 hp       207     329
BTH-C5337 Databaser och objektorienterad programmeri... 7,5 hp       120     206
BTH-C5320 Databasdrivna webbapplikationer med PHP oc... 7,5 hp        64     124
BTH-C5322 JavaScript, jQuery och AJAX med HTML5 och PHP 7,5 hp       163     274
BTH-C5338 Programmering med JavaScript, HTML och CSS 7,5 hp          278     463
BTH-C5339 Programmering och Problemlösning med Python 7,5 hp         378     537
                                                                    1916    3312

-->