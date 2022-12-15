---
author: mos
category: webbprogrammering
published: "2014-09-19 07:59:17"
updated: "2016-04-07 22:47:40"
created: "2014-09-19 07:59:17"
...
Turf - historien bakom ett hobby-projekt som blev "på riktigt"
==================================

Turf är min nya fritidssyssla. Tekniken bakom Turf är liknande teknik som vi lär oss här på dbwebb, så därför tänkte jag prata lite med de som ligger bakom Turf -- för att höra hur spelet har växt fram och vilka tekniker de använder.

Så, jag kontaktar företaget Andrimon som nu står bakom spelet och ber att få prata med grundarna till spelet.

<!--more-->


[FIGURE src=/image/snapht14/turf-event-tshirt.jpg?w=w2&a=30,0,20,0 caption="Turf, ett GPS-baserat spel för mobilen som blivit till en fritidssyssla och hobby."]


Själva spelet startade 2010. Det finns en [webbplats](http://turfgame.com/) om spelet och spelar gör man på iPhone eller Android med gratis appar som man laddar ned. Det visade sig att de som grundade spelet faktiskt bodde i Karlskrona en gång i tiden. 


Andreas och Simon, grundarna av Turf {#grund}
----------------------------------------------------

[FIGURE src=/image/snapht14/turf-vante.jpg?w=w2&a=20,0,20,0 caption="Spelet Turf går ut på att ta zoner och samla poäng och medaljer och samtidigt vara fysiskt aktiv - bra träning alltså."]

Så här gick det när jag pratade med Andreas, en av grundarna.

[FIGURE src=/image/vimmel/turf-andreas-pantesjo.jpg?w=c7&a=10,10,10,10 class="right" caption="Andreas med son."]

-- Vilken är historian bakom Turf?

> Idén till turf kom innan det fanns smartphones. Men de tekniska begränsningarna gjorde att vi fick lägga projektet på is till ca 2008 när det började bli möjligt att faktiskt använda gps och mer utvecklade programmeringslösningar i mobiler.

> Vi var två stycken (Simon Sikström och Andreas Pantesjö) som satte igång med utvecklingen och har sedan dess ständigt fått omvärdera lösningar och implementera nya tekniker. I början kunde vi experimentera mera fritt, men nu när allt blivit så stort så blir det mer tid som går åt till felsökningar och rena överväganden om vilken väg som är bäst att ta.

[FIGURE src=/image/vimmel/turf-simon-sikstrom.png?w=c7&a=13,15,0,15 class="right" caption="Simon med svall."]

-- Stämmer det att spelet startade i Karlskrona?

>Nej. Däremot har vi bott i Karlskrona, vilket till viss del bidragit till många fina zoner där.


-- Ni har hållit på i snart fem år, det finns ett företag bakom spelet men det drivs fortfarande med stor hjälp av användarna. Vad har varit de största utmaningarna så här långt? 

> En av de viktigaste delarna är att ha drivet att fortsätta och hålla humöret uppe när man möter motgångar. Om man inte själv tror på sitt koncept så kommer ingen annan heller göra det. Det tror vi är viktigt i ett projekt som bygger på frivillighet och där inte pengar är drivkraften. Men om man ser det rent tekniskt så kan det också vara en utmaning att behöva omvärdera beslut och skriva om enorma mängder kod, både för att förutsättningarna har förändrats i spelet, men också för att lösningar dykt upp som man inte tidigare visste fanns. Efter något år fick vi tipset att starta bolag för att inte blanda ihop verksamheten med våra privata förehavanden. Bolag är något som vi kan rekommendera oavsett om man vill göra något där målet är vinst eller som för oss, ett vansinnigt fritidsprojekt.



Tekniken bakom Turf {#grund}
----------------------------------------------------

[FIGURE src=/image/snapht14/turf-social.jpg?w=w2&a=30,0,40,0 caption="Turf är ett socialt spel med många spelare."]

Det vore spännande att höra vilken teknik som ligger bakom spelets infrastruktur, kanske är det tekniker som vi lär oss här på dbwebb.

-- Vill ni berätta något om tekniken bakom Turf?

> Då projektet även har varit en enorm individuell läroprocess för oss så har även tekniken förändrats med tiden. 

> Vad gäller servrar är vår erfarenhet att man alltid får "betala" för det som är gratis. Vi har slängt bort otroligt mycket tid och energi på servrar som donerats och sedan strulat. Detsamma gäller "billiga" serverhotell som ex. ipeer, där servrar kraschat en fredagskväll och inte gått att få upp förrän när supporttiden öppnat på måndagen. Vårt bästa tips, som vi kör på just nu, är amazons molnservrar som går väldigt bra att skala efter behov men ändå ger god kontroll. Men inget är gratis...

> Angående programmeringsspråk så finns det PHP, Javascript, SQL, Java, C++ och C# vårt projekt. Man kan inte vara rädd för att lära sig och använda olika språk om man är ett litet team.

-- Hur ser ert utvecklingsteam ut, som utvecklar och sköter Turf?

> I grunden var vi två personer, men med tiden har vi utökat till ca 20 frivilliga som hjälper till med olika nyckelfunktioner. Vissa programmerar, andra lägger ut zoner eller svarar på kontofrågor osv. Det svåra med att växa en organisation är att den energi som man tidigare kunde lägga på ex. ren kodning nu måste delas med allt fler administrativa saker. Men en sak är säker, om vi inte hade växt organisationen så hade vi inte varit där vi är idag.

-- Om ni skulle anställa en utvecklare, vad skulle ni vilja att han/hon hade för kvalifikationer?

> Det självklara svaret är att man måste kunna de språk man ska använda, alternativt snabbt kunna lära sig det. Men förutom det måste man kunna arbeta väldigt självständigt och hitta egna kreativa lösningar. Den friheten innebär dock att man måste förstå sina ramar och få veta hela bilden så att inte projektet börjar spreta alltför mycket.


Vad är viktigt, utbildning eller drivkraft? {#driv}
----------------------------------------------------

[FIGURE src=/image/snapht14/turf-event-folk.jpg?w=w2&a=20,0,20,0 caption="På Turf event träffas turfare som spelar och umgås tillsammans."]

Jag funderar lite på vilken typ av utbildning som ligger bakom allt detta. Eller är det så att utbildning är inte ett nödvändigt ont för att lyckas?

-- Vilken typ av utbildning har ni själva? Gymnasie, högskola? 

> Simon, som är huvudansvarig för tekniken i Turf, har gått en tvåårig javautbildning på yrkeshögskola. Vi hade en viss bakgrund med hobbyprojekt innan, men denna utbildning var helt klart en enabler för att kunna få igång projektet. Detta är dock den enda officiella utbildningen vi har i vår duo. Lite omvänt kan man också se att Turf projektet har medfört så mycket egenutbildning att många konsultuppdrag som tagits efteråt har möjliggjorts helt av Turf. Att använda ett eget projekt i sitt CV ska heller inte underskattas.

-- Ser ni att utbildning är ett nödvändigt ont för att göra det ni gjort, eller är det andra saker som krävs för att lyckas?

> Om vi ska lista lite sanningar från vårt perspektiv så krävs det 10% idéer, 20% utbildning samt 70% hårt arbete och driv. Vi har märkt att det finns en enorm mängd personer som har idéer om appar. Det finns även många som har "den rätta utbildningen". Men att offra en stor del av sin fritid under flera års tid, och att fortsätta när det dyker upp jobbiga hinder, det är den största (och roligaste) utmaningen.



Avslutningsvis {#avslutning}
----------------------------------------------------

[FIGURE src=/image/snapht14/turf-ronneby.png?w=w2&a=35,0,40,0 caption="Mikael har tagit över alla zoner i Ronneby, erövrat kronan som ledare i regionen och känner sig därmed extra stolt."]

Du kan läsa mer om [Turf på deras webbplats](http://turfgame.com/info/about).

En spännande historia är det, att se hur något sådant här kan växa fram från en idé som inte ens var tekniskt genomförbar från början.

[Simon Sikström](http://se.linkedin.com/pub/simon-sikström/9/7b/5a) är aktiv inom IT-branschen och finns på LinkedIn, Andreas Pantesjö hälsar att han inte är aktiv inom IT-branschen.

> "Länk för mig kan vi skippa, jag jobbar inte med IT ändå:)"

Vi önskar teamet bakom Turf lycka till i fortsättningen och kanske syns vi i spelet?




