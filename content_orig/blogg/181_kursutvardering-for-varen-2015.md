---
author: mos
category: kursnyheter
published: "2015-06-10 07:18:36"
updated: "2015-06-17 08:59:53"
created: "2015-06-10 07:18:36"
...
Kursutvärdering för våren 2015
==================================

BTH har ett visst reglemente till hur kursutvärderingar skall hanteras och för höstens utvärderingar så missade jag en deadline med en dag. Det var inte bra det.

I natt fick jag resultatet från vårens kursutvärderingar och tänkte att det är lika bra att ta och kika på dem med en gång. Man kan ju inte missa en deadline, bara så där. Hualigen.

<!--more-->

Här kommer kurserna och för varje kurs visar jag hur nöjda studenterna är med kursen. Se detta som starten för mitt arbete att gå igenom kursutvärderingarna. Jag kommer att titta på dem mer i detalj de närmaste dagarna och då kommer jag också fylla på med lite fler kommentarer om eventuella åtgärder eller framtida planer för kurserna.

<script type="text/javascript" src="https://www.google.com/jsapi"></script>



Översikt {#oversikt}
------------------------------------------------

Ett snitt över 3 är okey enligt min egen riktlinje. Ett snitt under 3 är inte önskvärt och kräver skyndsam hantering.

BTH har ett riktlinje som säger att snitt, som är 3.3 och mer, är *ett bra värde på en kursutvärdering*. Därmed är snitt om 3.3, eller mer, önskvärt i längden.

BTH snitt på samtliga kursutvärderingar under VT15 ligger på 3.08.

Om vi sammanställer studenternas nöjdhet för de olika kurserna så får vi följande översikt.

<script type="text/javascript">
    google.load("visualization", "1.1", {packages:["bar"]});
    google.setOnLoadCallback(drawChart);
  
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Kurs', 'Poäng'],
            ['htmlphp',     3.50],
            ['oophp',       3.41],
            ['phpmvc',      3.19],
            ['javascript',  3.21],
            ['python',      3.33],
            ['javascript1', 3.06]
        ]);
        
        var options = {
            title: 'Överlag är jag nöjd med kvaliteten på denna kurs',
            bars: 'horizontal',
            chart: { 
                title: 'Överlag är jag nöjd med kvaliteten på denna kurs',
                subtitle: 'Jämförelse mellan kurserna'
            },
            legend: { position: 'none' }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<div id="chart_div" style="width: 630px; height: 500px; margin-bottom: 44px;"></div>

Allt över 3, så långt allt väl. Tre kurser, det vill säga hälften av kurserna, hamnar över 3.3. Det är bra det. Någon gång måste man ju andas och få säga *"det ser tillräckligt bra ut, vi kan vara nöjda"*.

Men, *djävulen ligger i detaljerna*, så ingen vila, ingen ro. Bara för att det ser okey ut i snitt så betyder inte det att allt är så bra som man själv, och studenterna, vill det borde vara. 



htmlphp {#htmlphp}
------------------------------------------------

[FIGURE src=/image/snapvt15/vt15-htmlphp.png caption="Hur nöjda är studenterna med kursen överlag."]

Snittet för kursen blev **3.50** (ht15 3.52). Utskicket omfattade 266 studenter.

Fritextkommentarerna i kursutvärderingen är delade. Någon anser att upplägget är opedagogsikt och några anser att upplägget är väldigt bra.

Flera påpekar utmaningen i att lära ut 4 tekniker inom en kurs. De påtalar hög tröskel in till kursen, det fanns förväntningar om en lättare kurs och någon påtalar att det behövs förkunskaper för att klara hela kursen.

Det finns kommentarer om hur mycket PHP man lär sig. Det blir för mycket kod på en gång och för lite tid till eftertanke och övning i kodandet.

Till hösten 15 kommer en ny version av kursen. Innehållet är till 2/3 detsamma, men upplägget är annorlunda och det finns ett större fokus på hur PHP lärs ut.

Jag kan hålla med om att kursen, trots sina formella förkunskapskrav, kan upplevas som omfattande och utmanande. Kursen vänder sig till de som vill bli webbprogrammerare, och har ett tydligt fokus på programmering i webben. 

Tittar jag på frågan om arbetsbelastning så hamnar den trots allt kring 3.0 i snitt, det känns som arbetsbelastningen upplevs rimlig. 

I samband med att den nya kursen utvecklas så ska jag ta mig en ytterligare funderare på innehåll och upplägg. 

Men, med ett snitt om 3.5 så är denna kursen den som har högst nöjdhet på kursutvärderingen, så jag borde vara delvis försiktig nu när jag tar nästa steg i kursens utveckling. 



oophp {#oophp}
------------------------------------------------

[FIGURE src=/image/snapvt15/vt15-oophp.png caption="Hur nöjda är studenterna med kursen överlag."]

Snittet för kursen blev **3.41** (ht15 3.24). Utskicket omfattade 181 studenter.

I fritextkommentarerna så ser jag att flera nämner fördelar med dbwebb-webbplatsen, dess material, forum och chatt.

Några påpekar att kursen är svår och omfattande och det krävs mer tid än specificerat för att klara kursen.

Kankse är denna fritextkommentaren talande:

> *"Detta är den 7.5hp kurs som jag har lärt mig mest av någonsin (Och jag har tidigare läst 3 år på heltid)"*

Det låter ju väldigt bra. Men det kan också innebära att kursen är "fullmatad". En fullmatad kurs kan också ge en kommentar som denna.

> *"Med tidsbrist upplevdes det bitvis stressande att förstå momenten, trots tydliga beskrivningar, men när poletten väl föll ner tycktes det väldigt logiskt, och övningarna var bra."*

Även denna kommentaren speglar min egen uppfattning om kursen.

> *"Man får lära sig väldigt mycket. Samtidigt är den väldigt intensiv, och mycket att ta in. Det kan kännas lite förvirrande ibland, och rörigt"*

Just den upplevda rörigheten försöker vi jobba bort. Vi gjorde ett par ändringar inför denna kursomgången som jag uppfattar har förbättrat kursen. I lärarteamet diskuterar vi fler möjligheter att förbättra kursen. 

En sak som är tydlig, som jag måste jobba med, är den stegrande nivån när man läser kursen som en del i kurspaketet. 

> *"Kursen är bra överlag, med tydliga beskrivningar och relevanta övningar. Ibland blev det väl mycket teori att hinna med och förstå för någon som inte behöver ha tidigare datakunskaper (för att läsa kurspaketet)"*

Det har inte direkt med kursen att göra, utan är mer en konsekvens av hur kursen ligger i kurspaketet. Det är något jag behöver lösa.

Sammantaget så är det ett mycket bra snittvärde på nöjdheten i kursen så det känns som vi ligger rätt bra.



phpmvc {#phpmvc}
------------------------------------------------

[FIGURE src=/image/snapvt15/vt15-phpmvc.png caption="Hur nöjda är studenterna med kursen överlag."]

Snittet för kursen blev **3.19** (ht15 3.00). Utskicket omfattade 130 studenter.

Likt htmlphp och oophp så ligger kursen på en nivå för webbprogrammerare och kräver egentligen en hel del förkunskaper. Om man har dessa förkunskaper så upplever man troligen kursen så här.

> *"Bra kurs, Blandar moderna projektverktyg med praktiskt skapande."*

Men, om man inte är så van vid programmering så blir troligen upplevelsen mer likt denna.

> *"För ngn som har lite mer datakunskaper till att börja med skulle den vara perfekt, men för ngn utan dessa kunskaper tar momenten helt enkelt för lång tid, då det ständigt är mycket nytt och många länkar som ska läsas och förstås - så fort man fått in en sak i huvudet är det dags att trycka in nästa!"*

Om jag tänker på kursmomenten i kursen så är det ett par av dem som jag vill uppdatera inom närmaste tiden. Vi har kört kursen i ett par omgångar nu och jag börjar se vilka delar i kursen som kan förbättras.

När kursen blir en del av distansprogrammet i Webbprogrammering så kommer jag att jobba igenom kursen och göra ett par justeringar. Men i stort så är jag rätt nöjd med kursen som den är.



javascript {#javascript}
------------------------------------------------

[FIGURE src=/image/snapvt15/vt15-javascript.png caption="Hur nöjda är studenterna med kursen överlag."]

Snittet för kursen blev **3.21** (ht15 3.45). Utskicket omfattade 103 studenter.

Snittet är bra för kursen. Men jag är medveten om att kursen har svagheter som vi i lärarteamet vill förbättra och förändra. Dels gäller det upplägget på uppgifterna och hur de utförs. Det behövs tydliga instruktioner om vilka uppgifter som skall utföras och vad som förväntas. Nu finns risken att man väljer att utgå från den exempelkoden som finns, lite mer än önskvärt.

Med tanke på det så är jag medveten om att jag behöver jobba igenom kursen och uppdatera den till en version 2.

Någon påtalar att när man läser kursen som fristående så finns det ett antal förkunskaper i form av tekniker som inte är tydligt. Det nämns delarna av CSS och LESS som kan kännas lite udda om man inte har gått resten av dbwebb-kurserna.

Jag är också medveten om att några av kursmomenten, och dess övningar, blir lite stora. Det är något jag behöver jobba igenom och förbättra.

Sista kursmomentet om node och websocket kräver egentligen också förståelse för datakommunikation och servrar. Det kan göra det kursmomentet extra utmanande.

Så, kursen behöver en genomgång, det är min egen känsla och jag har börjat fundera på hur kursen skall uppgraderas. Målet är att kursen blir uppgraderad i och med distansprogrammet i Webbprogrammering.



python {#python}
------------------------------------------------

[FIGURE src=/image/snapvt15/vt15-python.png caption="Hur nöjda är studenterna med kursen överlag."]

Snittet för kursen blev **3.33** (ht15 2.83). Utskicket omfattade 259 studenter.

I höstas hamnade kursen under 3 i snitt och vi gjorde en extra insats för att justera vissa kursmoment. Några övningnar togs bort, omarbetades och några nya infördes. Resultatet i nöjdhet talar tydligt att saker blev bättre. Det känns bra det.

En sak som är genomgående för alla dbwebb-kurser är den ibland upplevda svårighetsgraden.

> *"Kan tänka mig att andra kursdeltagare inte uppfattade kursbelastningen som hög men eftersom jag var nybörjare på programmering så känns det som att jag fick lägga betydligt mer tid på uppgifterna. Vilket är ingenting jag ångrar :) ..önskar faktiskt att jag hade mer tid :)"*

> *"Dessa kurser är inte alls anpassade för nybörjare. de verkar mer anpassade för folk som jobbat många år i databranchen och som är ute efter högskole poäng. Så ribban ligger för högt för nybörjare"* 

Jag är väl medveten om att kurserna kan upplevas som omfattande, utmanande och riktade till de som vill bli programmerare. Så är det. Men ibland kan det bli lite väl mycket och då försöker jag skala ned övningar och uppgifter. I lärarteamet har vi diskuterat att skära ned på kursens omfattning (för att matcha förväntningar om nybörjarkurs), främst har vi pratat om huruvida kmom06 ska vara med eller inte.

Under kursens gång har jag fått kommentarer om texter som introducerar kursmoment och att förbättra dem så det blir tydligare vad och varför vi går igenom vissa saker. Det är ett bra förslag.

Följande kommentar berör samma fråga.

> *"Läraren har inte gjort något eget läsmaterial utan enbart länkat till webben och nedladdningsbara böcker. Jag tycker att det är en klar brist då lärarens pedagogiska förmåga inte används. En lärare med ett flertal år av undervisning i ett ämne skall vara bättre på att själv förklara vad som är viktigt och varför."*

Det stämmer att det är så. Det var ett medvetet val när jag utvecklade kursen, det var en prioritering av resurser. Men det är nog en bra sak att börja fylla på med eget material för att komplettera kursens material. Det hade troligen höjt kursen.

Några har tagit kursen som "icke-nybörjarkurs", de har många programemringskurser bakom sig men vill lära sig Python. Kursen har även försökt tillfredsställa dessa studenter. Men nackdelen är då att kursen blir lite för omfattande för nybörjarna. I längden behöver kursens innehåll vara delat, beroende på om man har förkunskaper eller ej. Kanske blir det två kurser i längden. 

Under våren hade vi ett program om civilingenjörer i spel och programvaruteknik som läste kursen tillsammans med distansstudenterna. Om jag bara tittar på deras totala nöjdhet så ger de kursen 3.56 (jämfört med fristående distansstudenter som ger 3.29). Jag kommer fortsätta prata med den som är programansvarig för att se hur denna gruppen upplevde kursen. Men vid första anblicken ser de nöjda ut.
 
Så, kursen python har förbättringspotential men vi är helt klart på rätt väg. Kursen borde delas i två formella kurskoder, om den skall fortsätta att ges till både nybörjare och till de som redan kan programmera.
 
  

javascript1 {#javascript1}
------------------------------------------------

[FIGURE src=/image/snapvt15/vt15-javascript1.png caption="Hur nöjda är studenterna med kursen överlag."]

Snittet för kursen blev **3.06** (ht15 3.06). utskicket omfattade 172 studenter.

Snittmässigt är detta kursen som fick lägst betyg. När jag läser fritextsvaren i kursutvärderingen så märker jag också att i denna kursen finns flera konkreta förslag på hur vi kan förbättra läromaterialet och beskrivningar i kursmoment. Det handlar om läsamaterial, kodexempel och förklaringar. 

Jag känner att jag behöver göra en genomgång av kursen och läsa nogrannt i redovisningstexterna för att förstå hur varje kursmoment uppfattas och hur de kan förbättras. Här har jag alltså en hel del att göra. 

I lärarteamet har vi diskuterat om förändringar av kursmoment 05 och kanske 06. Vi ser också över hur denna kursen hänger ihop men efterföljande kurser. Vissa av förändringarna kommer troligen ske till hösten 15.



Kurserna som fristående kurser {#fri}
------------------------------------------------

Under senaste året har kurserna erbjudits som fristående kurser. Från hösten 15 erbjuds de inte längre som fristående kurser och det gör att vi kan fokusera kursernas utveckling mot en delvis annan målgrupp vilket är de som går antingen kurspaket eller program.



Kurspaket webutv {#webprog}
------------------------------------------------

Kurspaketet [webutv](webutv) är nytt och till hösten är första gången som kurspaketet slutförs. Då får vi utvärdera hur kurspaketet hänger ihop som helhet.

Jag vill se över genomströmningsgraden och känner att risken att avhoppen är stora mellan kurserna. Men jag måste avvakta till hösten för att se hela flödet genom kurspaketet.

I våras gavs kurspaketet på 50% och 25%. Från och med hösten blir det enbart nya antagningar till kurstakt om 50%.



Kurspaket webprog {#webutv}
------------------------------------------------

Kurspaketet [webprog](webprog) är det kurspaket som funnits längst och innehåller de första kurserna i dbwebb. Förkunskaperna är grundläggande och svårighetsgraden i kurspaketet är kraftigt stigande. De som klarar sig igenom kurspaketet är nöjda, de tycker de lär sig mycket. Men det är rätt stora avhopp mellan de olika kurserna. 

Kurspaketets balans behöver ses över och i samband med att kurserna utvecklas är det troligt att kurspaketet behöver få ett annat upplägg. Det behöver klargöras tydligare vilken målgruppen är och eventuellt justera förkunskapskraven.

I våras gavs kurspaketet på 100%, 50% och 25%. Från och med hösten 15 erbjuds studietakt om 50% för nyantagna studenter.



Program Webbprogrammering (distans) {#distans}
------------------------------------------------

Det stora arbetet med att utveckla campusprogrammet Webbprogrammering har resulterat i att ett distansprogram startar hösten 2016. Inför det kommer vi att se över samtliga kurser och se till att de följer en röd tråd som matchar programmets upplägg. Det arbetet kommer påverka innehåll i de enskilda kurserna och de båda kurspaketen.

Det finns en hel del kursutveckling som är planerad att ske de närmaste åren.



Program Webbprogrammering (campus) {#campus}
------------------------------------------------

En utmaning med campusprogrammet är att se över genomströmningsgraden och avhoppen. Hur går det att påverka?

Något som jag vill kika på är hur campusundervisningen kan ske när allt material finns tillgängligt online. Behövs försläsningarna, labbtillfällen och lärarstöd? Räcker det med chatt och forum? Hur engerarar man campusstudenten när allt material är utvecklat för distansundervisning? Det är saker som vi kämpat med de senaste åren och vi vet hur det fungerar, men frågan är hur vi kan och vill förbättra det. 



Avslutningsvis {#avslut}
------------------------------------------------

Det var dagens dos av självkritik och förbättringsförslag. Det finns alltid saker att förbättra. Men i grund och botten så har vi en uppsättning av kurser som till stor del uppskattas av studenterna. Så vi måste vara nöjda med det.

Diskutera och kommentera i forumet, det finns en särskild tråd för [Kursutvärdering och kursutveckling](t/594).

Det skrevs en motsvarande [sammanfattning för kursutvärderingar för hösten 2015](blogg/kursutvarderingar-for-hosten-2014-och-kursutveckling-framat).
