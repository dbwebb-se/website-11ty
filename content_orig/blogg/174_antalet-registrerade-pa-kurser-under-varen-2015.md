---
author: mos
category: kursnyheter
published: "2015-02-09 13:26:31"
updated: "2015-02-09 14:50:43"
created: "2015-02-09 13:26:31"
...
Antalet registrerade på kurser under våren 2015
==================================

Eftersom jag gillar statistik så kommer här en översikt av hur många studenter som är registrerade på de olika kurserna. Siffrorna presenteras för vårterminen 2015.

<!--more-->


Till [våren 2015 så erbjöds](blogg/sok-kurser-och-kurspaket-till-varen-2015) 6 fristående kurser, 1 kurspaket om tre hastigheter och ett kurspaket om 2 hastigheter. Vi erbjöd 695 nya studieplatser.

Sifforna nedan togs fram per 2015-02-09.

<script type="text/javascript" src="https://www.google.com/jsapi"></script>



Antal registrerade vårterminen 2015 {#vt15}
-------------------------------------------

Låt oss ta det enkelt och se hur många studenter som har registrerat sig på vårens kurser och vilka kurser de går. Det ger oss en översyn av hur många studenter som är aktiva så här i början av terminen.

<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Kurs', 'Registrerade'],
        ['htmlphp',     287],
        ['oophp',       186],
        ['phpmvc',      134],
        ['javascript',  100],
        ['python',      264],
        ['javascript1', 166]
    ]);

    var options = {
        title: 'Antal studenter som registrerat sig VT15',
        hAxis: {
            title: 'Kurs'
        },
        vAxis: {
            title: 'Registrerade', 
            minValue: 0
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>
<div id="chart_div" style="width: 630px; height: 500px;"></div>

Totalt pratar vi alltså om 1137 registrerade studenter (kursregistreringar). Av dessa är 950 nya kursregistreringar  och 187 är omregistreringar. 

Om vi omvandlar dessa 1137 registreringar så blir det 915 individer. Några läser alltså flera kurser.

Ovanstående siffror rör endast de kurser som startar i läsperiod 3. Det tillkommer kurser som startar senare under terminen och det rör sig om ytterligare ett par hundra kursregistreringar innan vårterminen är slut. Troligen blir alltså VT15 större än HT14 (se data längre ned) i antalet kursregistreringar, *all-time-high*, så att säga.

Så här fördelar sig kursregistreringar över ålder och kön. Av 915 enskilda individer så är 25% tjejer och majoriteten av studenterna är i åldersgruppen 20-29 år.

<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Lön', 'Antal'],
      ['Tjejer',  286],
      ['Killar',  851]
    ]);

    var options = {
      title: 'Fördelning i registreringar mellan killar och tjejer VT15',
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
      [' 0-19',   29],
      ['20-29',  626],
      ['30-39',  284],
      ['40-49',  145],
      ['50-59',   47],
      ['60-69',    3],
      ['70-  ',    3]
    ]);

    var options = {
      title: 'Åldersfördelning av registrerade studenter VT15',
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




Antal registrerade höstterminen 2014 {#ht14}
-------------------------------------------

För att ha något att jämföra med så visar jag även siffror för hösten 2014 som var den hösten då vi dittills hade det största utbudet och gjorde den största antagningen.

<script type="text/javascript">
  //google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Kurs', 'Antal'],
        ['htmlphp',     488 + 6],
        ['oophp',       262 + 6],
        ['phpmvc',      165],
        ['javascript',  158],
        ['python',      113],
        ['javascript1', 111]
    ]);

    var options = {
        title: 'Antal studenter som registrerat sig HT15',
        hAxis: {
            title: 'Kurs'
        },
        vAxis: {
            title: 'Registrerade', 
            minValue: 0
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }
</script>
<div id="chart_div1" style="width: 630px; height: 500px;"></div>

För hösten hade vi totalt 1309 studenter registrerade (kursregistreringar). Av dessa är 1221 nya kursregistreringar  och 88 är omregistreringar. 

Siffrorna gäller för hela höstterminen och samtliga läsperioder.

För den som är mer intresserad av siffror så gjordes en [motsvarande avstämning för hösten i ett tidigare inlägg](blogg/statistik-hosten-2014-over-antagna-och-registrerade-studenter).




Att se fram emot {#fram}
-------------------------------------------

Det finns saker att se fram emot -- bortsett från CSN, rättade inlämningar, poäng i ladok och sommarlov då, alltså...

Den tidigare universitetskanslern, tillika tidigare BTH-rektorn, jobbar nu med en [utredning som regeringen tillsatt om högskolans utbildningsutbud](http://www.regeringen.se/sb/d/18276/a/238290). Resultatet från utredningen är inte att vänta förrän till hösten 2015, men det skall bli spännande att läsa slutsatserna. 

Utredningen förväntas svara på frågor som är relevanta för dbwebb-kurser och kurspaket:

> "I uppdraget ingår att särskilt se över sommarkurser och distansutbildning, möjligheterna till ökat svenskt användande av MOOC (Massive Open Online Courses) - en ny form av nätbaserad utbildning, examensfrågor och hur lärosätena använder ersättningsbeloppen för utbildning."

Men innan dess har vi nog svaret på om BTH går vidare med att sjösätta ett [två-årigt utbildningsprogram på distans inom Webbutveckling, Webbprogrammering, Programmering](t/905). Drivkraften till detta är till stor del att erbjuda möjlighet till examen för den som studerat på BTHs dbwebb-kurser.

Så, det finns saker att se fram emot.

