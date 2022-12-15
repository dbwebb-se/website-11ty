---
author: mos
category: kursnyheter
published: "2015-02-10 14:47:12"
updated: "2015-02-10 15:36:37"
created: "2015-02-10 14:47:12"
...
Kursutvärderingar för hösten 2014 och kursutveckling framåt
==================================

Höstens kursutvärderingar är slutförda och här följer en sammanställning tillsammans med lite tankar om hur kurserna kommer att utvecklas framöver.

<!--more-->

Under hösten körde vi 6 kurser varav två var helt nya. Fyra av kurserna går på ett kurspaket och ingår även i det treåriga campus-programmet Webbprogrammering.

<script type="text/javascript" src="https://www.google.com/jsapi"></script>



Allmänt om kursutveckling {#allmant}
------------------------------------

Vi är ett team som driver utvecklingen av dessa kurser så jag sammanställer allihop på detta dokumentet. När vi väljer de kurser som blir föremål för kursutveckling så gör vi en prioritering och vi ser hur våra åtgärder passar in i kurserna som fristående, som en del av kurspaket och som en del i campus-programmet.

Så smått har vi även börjat förbereda oss för ett [eventuellt två-årigt distansprogram i Webbprogrammering, webbutveckling och programmering](http://dbwebb.se/t/905). Så det är också en styrande faktor för våra prioriteringar.

Om vi sammanställer studenternas nöjdhet för de olika kurserna så får vi följande staplar (max 4 och min 1).

<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Kurs', 'Poäng'],
        ['htmlphp',     3.52],
        ['oophp',       3.24],
        ['phpmvc',      3.00],
        ['javascript',  3.45],
        ['python',      2.83],
        ['javascript1', 3.06]
    ]);

    var options = {
        title: 'Överlag är jag nöjd med kvaliteten på denna kurs',
        hAxis: {
            title: 'Kurs'
        },
        vAxis: {
            title: 'Poäng', 
            minValue: 0
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>
<div id="chart_div" style="width: 630px; height: 500px;"></div>

Ett godkänt värde är över 3,0. Om kursen hamnar under så får vi prioritera utveckling på den, förutsatt att det går att påverka resultatet med utvecklingsåtgärder. Ett önskvärt värde är 3,4 eller bättre. Men allt över 3 är bra. Det är ungefär så som jag ser på siffrorna.

Så här utföll det per kurs.



Kursen htmlphp {#htmlphp}
------------------------------------

Så här ser översikten ut för kursen htmlphp.

[FIGURE src=/img/snapvt15/kutv-ht14-htmlphp.jpg caption="Utfall på kursutvärderingen."]

Kursen htmlphp ligger rätt högt på vår prioriteringsordning för kursutveckling. Detta trots att den har bästa betyget av alla våra kurser. Troligen gör vi nu under våren en större genomgång av kursen. Den skall få en större generell genomgång och de stora förändringarna är ett annat fokus på hur vi lär ut programmeringen med PHP. Några av kursmomenten kommer att uppdateras och ändra inriktning, men vi behåller kärnan i kursen. Ett fokus är att lära ut mer PHP så att det blir enklare att komma in efterföljande kurs, oophp.

Men, med ett sådant här betyg från studenterna så får vi vara nöjda med kursen.



Kursen oophp {#oophp}
------------------------------------

Så här ser översikten ut för kursen oophp, det är fördelat på två bilder.

[FIGURE src=/img/snapvt15/kutv-ht14-oophp-1.jpg caption="Utfall på kursutvärderingen."]

[FIGURE src=/img/snapvt15/kutv-ht14-oophp-2.jpg caption="Utfall på kursutvärderingen."]

Utvärderingen ger ett gott betyg åt kursen som nyligen fick ett helt nytt innehåll. Det finns ett par saker som vi vill utveckla till kommande rundor. Dels skall projektspecen förtydligas lite, kanske skall de optionella delarna förändras lite, men i stort är projektet bra. Detta skedde delvis i december men det kommer ytterligare en uppdatering nu under våren.

Vissa av kursmomenten kan upplevas lite väl kodningsintensiva och det försöker vi avhjälpa. Vi har förändrat delar av kursmomenten och infört ett par ändrade övningar. Vi behöver göra ytterligare ett par sådana ändringar. Men det känns ändå som kursen ligger på en hyfsat bra nivå.

Eftersom kursen nyligen fick en genomgång så planerar vi inga större förändringar för kursen under det kommande året. Men vi håller ett öga på den, det är en viktig kurs i PHP-spåret och kan vi förbättra kursen så gör vi det. Kursen måste passa bra ihop med htmlphp-kursen och med phpmvc-kursen.



Kursen phpmvc {#phpmvc}
------------------------------------

Så här ser översikten ut för kursen phpmvc.

[FIGURE src=/img/snapvt15/kutv-ht14-phpmvc.jpg caption="Utfall på kursutvärderingen."]

Kursen är ny sedan våren 2014 och har fått ett gott mottagande och ett helt okey betyg från studenterna. Det är en svår kurs men den innehåller såna saker som jag vill lära ut. Kursen verkar upplevas lite enklare nu när oophp-kursen, på ett bättre sätt, förbereder studenten för det som kommer i phpmvc-kursen.

Det görs hela tiden justeringar i kursens kodbas och övningar, men vi har inte planerat någon större förändring av kursen. Det känns rätt bra som det är så vi kör på ett par rundor till innan det blir dags för en uppdatering.



Kursen javascript {#javascript}
------------------------------------

Så här ser översikten ut för kursen javascript.

[FIGURE src=/img/snapvt15/kutv-ht14-javascript.jpg caption="Utfall på kursutvärderingen."]

I samband med utvecklingen av kursen javascript1 så lade jag på ritbordet en kurs som jag döpte till javascript2. Tanken är att denna kursen, javascript, skall inom kort få en rejäl översyn och utvecklas till en javascript2-kurs. Men vi har inte kommit så långt så att vi bestämt hur kursen javascript skall utvecklas till kursen javascript2. Det är ett arbete som vi skall göra men det är ännu inte högt prioriterat. Troligen sker det arbetet under 2016.

Studenterna verkar uppskatta kursen och ger den ett bra betyg. Det är bra. Jag tror att det är en svår kurs, eller i alla fall en någorlunda omfattande kurs. Jag är dock inte helt nöjd med utformningen på några av uppgifterna som erbjuder för enkla vägar genom kursen, men det skall fixas till javascript2.



Kursen python {#python}
------------------------------------

Så här ser översikten ut för kursen python.

[FIGURE src=/img/snapvt15/kutv-ht14-python.jpg caption="Utfall på kursutvärderingen."]

Detta är en ny kurs för hösten 2014. Utfallet på utvärderingen ger oss den enda kursen som hamnade under 3.0 och det kräver en extra insats som till största delen redan är utförd och presenterad i forumet.

När vi läser studentkommentarer så är det tydligt att kursen kommer att upplevas bättre om vi tar bort fokus på Curses samt väljer att balansera de sista kursmomenten lite bättre, några av dem är lite väl arbetstyngda. Men, för övrigt verkar kursen vara uppskattad av de som kommer igenom den. Så det känns som vi har ett bra råmaterial till kurs här. Vi skall bara finslipa den.

Jag räknar kallt med att de gula blir gröna till vårens kursutvärdering.

Vi prövade en hel del nya upplägg på denna kursen (och på javascript1), men det ser ut som det har fungerat tillräckligt bra.



Kursen javascript1 {#javascript1}
------------------------------------

Så här ser översikten ut för kursen javascript1.

[FIGURE src=/img/snapvt15/kutv-ht14-javascript1.jpg caption="Utfall på kursutvärderingen."]

Denna kursen var också ny inför hösten 2014 och studenterna bedömer det som en bra kurs och ger ett någorlunda högt betyg. Det är bra det, det är alltid ovisst med nya kurser och när man prövar nya upplägg. 

Vi har fått en del feedback och kommer att ge vissa delar av kursen en uppfräschning, det kommer att ske under vårterminen och det är inte direkt bestämt vad vi kommer att göra än. Men med ett par mindre justeringar så kan detta bli en än mer uppskattad kurs. Det känns bra det. 

Flera studenter säger att de vill ha mer feedback på hur man skriver sin kod. Vi har ett par idéer om hur vi kan åstadkomma det på ett effektivt sätt. Men vi måste fundera på det under vårterminen.



Kursutveckling under 2015 {#kutv}
------------------------------------

Under närmaste året så har vi två nya kursera att utveckla, linux och webbapp-kurserna. Samtidigt ger vi htmlphp en rejäl översyn. Det är egentligen mer än vi kan hantera men det kommer ändå ske under våren och troligen även en del under hösten.

Det blir mindre saker som kan ske i python, javascript1, oophp och phpmvc. Men kursen javascript kommer vi fortsätta fundera på hur vi bäst tar den till en javascript2. Men det får vi avvakta med. Först måste vi utveckla linux och webbapp som till stor del kommer att styra vad vi sedan tar upp i javascript2.

Så, allt hänger ihop. Kurserna och hur de erbjuds i form av campus-program, distans-program, kurspaket och fristående kurser. Ofta gör vi prioriteringar så det är hela tiden en utmaning att välja hur vi utvecklar dbwebb-kurserna. Men, det är en trevlig utmaning.

Här är en grov översikt av hur kursutvecklingen fördelar sig under de två kommande åren.

<script type="text/javascript">
  //google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Period',    'htmlphp', 'oophp', 'phpmvc', 'javascript', 'python', 'javascript1', 'linux', 'webapp'],
        ['2015 vår',       100,       10,       0,             0,       30,            20,     100,       80],
        ['2015 höst',       30,        0,       0,             0,        0,             0,      30,       50],
        ['2016 vår',         0,        0,       0,            50,        0,             0,       0,        0],
        ['2016 höst',        0,        0,       0,            50,        0,             0,       0,        0]
    ]);

    var options = {
        title: 'Planerad kursutveckling',
        legend: { position: 'right' }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }
</script>
<div id="chart_div1" style="width: 630px; height: 500px;"></div>



Avslutningsvis {#avslutning}
------------------------------------

Allmänt så gäller att flera studenter uppfattar dwebbb-kurser som välfyllda och ibland krävs arbete som uppfattas övergå 7.5hp. Det är nog så det är, jag gör gärna välfyllda kurser och stoppar gärna in mycket saker. Ibland krävs det ett par rundor av kursutveckling för att "slipa av de kantiga hörnen" på kurserna. Men i slutändan blir det rätt så bra, och förhoppningsvis krävande -- på ett rättvist sätt.

Vi hämtar mycket av feedbacken till kursutvecklingen från redovisningstexterna. De är viktiga för vår feedback, tillsammans med det som varje dag händer i forum och chatt. 

Med det sagt så återgår vi till arbetet.

Det finns en generell tråd i forumet för [kursutvärderingar och feedback](t/594). Där finns fler diskussioner likt denna.



