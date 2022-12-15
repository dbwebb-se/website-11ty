---
author: mos
category: utbildning
published: "2013-10-25 13:57:21"
created: "2013-10-25 13:57:21"
...
Kursen oophp nu i version 2, hur gick det till?
==================================

Det tar sin tid att utveckla en ny kurs i dbwebb-paketet. Nu är oophp-kursen ute i sin version 2 och jag kan göra ett bokslut över vad som krävdes för att ta fram den. 

Blev det en bra kurs? Det vet vi nog inte förrän om ett år eller så, men låt oss kika lite på vad som plockades fram.

<!--more-->


Strukturen {#struk}
-------------------------------

Kursen fick en ny struktur där varje kursinstruktion är en framsida, en innehållsförteckning över vad som skall göras i momentet. Det är samma kursstruktur som jag använder på phpmvc och javascript och det känns som en bra uppdelning av materialet i läsanvisningar, övningar, uppgifter och redovisning.

Kursens föregångare -- och alla mina tidigare kurser -- samlade kursmomentet i ett och samma dokument. Det var ett upplägg som inte passade alla. De som ansåg att de redan hade den kunskap som kursmomentet omfattade, hittade ingen genväg genom momentet. De sa *"men vad är uppgiften som skall göras?"* och jag sa, *"gör enligt instruktionen uppifrån och ned"*.

Den nya strukturen försöker hantera det på ett bättre sätt genom att ge studenten olika vägar att ta sig igenom kursmomentet. Antingen gör man övningarna, eller så hoppar man direkt på uppgifterna, välj själv.

Jämför strukturen på [föregående versions kursmoment](oophp-v1/kmom01) och den [senaste varianten på kursmomentet](oophp/kmom01).



Uppgifter ny del i dbwebb {#uppg}
-------------------------------

I samband med utvecklingen av den nya kursen så valde jag att separera uppgifterna så att de blir enkla att ändra och byta ut. De är nu inte så hårt kopplade mot resten av kursmaterialet och det blir enklare att återanvända och uppdatera dem. Kursmaterialet blev helt enkelt lite mer modulärt och innehåller lite mindre beroenden mellan de olika delarna. Modulärt alltså, det kändes bra.

Uppgifter finns nu som en egen del i [Uppgiftsbanken](uppgift).



Sex kursmoment och ett projekt {#kmom}
-------------------------------

Det känns som om sex kursmoment samt projektet blir ett lagom omfång på en kurs. Tidigare har jag prövat med sju kursmoment men det är lite på gränsen. Jag har numer fastnat för sex kmom + projekt, det är en formel jag fortsätter att följa.



Flexibel svårighetsgrad {#svar}
-------------------------------

Jag har märkt att det uppskattas om kurserna har en flexibel svårighetsgrad så att den som kan lite mer får en utmaning och att den som har begränsade förkunskaper får en möjlighet att klara kursen och växa inom dess ram. Det är inte alltid lätt att klara av detta, men med hjälp av extrauppgifter, både inom ramen för kursmomentets instruktion och inbakade i respektive uppgift, så finns det en viss valbarhet och flexibilitet för vilken väg man väljer genom kursen.



Kursmaterial produceras {#prod}
-------------------------------

Ja, här produceras kursmaterial. Inför varje kurs tänker jag -- *"Nu ska jag inte skriva så mycket, jag skall använda litteraturen"*. Och det funkar aldrig. Det slutar alltid med att jag skriver ihop det mesta av materialet själv, på gott och ont. Men så blir det. Bara att gilla läget och jag tror inte att jag kommer ändra arbetssätt.

Så, hur mycket material blev det?

* 6 kursmoment
* 1 projekt
* 9 kunskapsartiklar
* 12 uppgifter
* 8 tips från coachen

Plus en del uppdateringar i Lydia och dbwebb.se som sker löpande.

I campuskursen tillkommer ett antal föreläsningar, så det är något som måste tas fram under de kommande två månaderna.

Så, visst kostar det. Det händer inte automatiskt.



Tidplanen {#tid}
-------------------------------

Kikar jag tillbaka så skrev jag nog de första raderna i början av sommaren, midsommar ungefär. I augusti publicerade jag första kursmomentet och jag var klar med projektet den 22 oktober, en vecka senare än min egen tidplan.

Bakom mig, i mitt rum, är min tavla fullklottrade med idéer och tankar kring kursen, en del fann sin väg in i kursen men en hel del gjorde det inte. Jag tror jag började skissa på tavlan redan förra hösten, ett år tillbaka i tiden alltså.  Så det är en lång väg att gå, först behöver man mentalt processa alla idéer och sedan sätta dem på plats i ordningsföljd och i skrift.

Inget konstigt i sig, man behöver nog en lång kalendertid för att fundera ut hur sitt projekt (min kurs), skall se ut. Det krävs tid för att saker skall falla på plats.

Numer vet jag också, att oavsett hur mycket jag än planerar, så sker allt utvecklingsarbetet när jag väl skriver momenten och övningarna. Det blir som en kedja där de olika delarna måste hänga ihop. Det går bara att sätta de stora dragen på tavlan, när det kommer till detaljerna så får man justera efter hand.



Framtiden {#fram}
-------------------------------

Nu är kursen på plats och till nästa läsperiod går den på campus. Vad jag nu måste göra är att monitorera att kursen verkligen fungerar, och finslipa de saker som så kräver. På det sättet är redovisningstexterna oumbärliga. De ger en utomordentlig bild av hur kursmomenten fungerar, där kan jag direkt hämta återkoppling på hur momentet upplevs och sedan bestämma om de funkar eller ej.

Förhoppningsvis så blev kursen bra. Frågar du mig så är jag nöjd. Det betyder att det blev så bra jag kunde göra det. 

Att kursen nu blev som den blev, utformningen och innehållet, har en historia som går att utläsa i kursutvärderingar och redovisningstexter flera år tillbaka i tiden, från kursens föregångare och dess syskon. Men, i sin enkelhet handlade det om att göra kursen lite svårare för att studenten skulle bli bättre förberedd inför phpmvc-kursen -- så kan man sammanfatta det arbetet som gjorts.

En del av de kursutvärderingar -- och kommentarer på dem -- kan hittas i forumet i tråden ["Kursutvärdering och kursutveckling"](t/594). 



Avslutningsvis {#av}
-------------------------------

Så, detta får bli [mina 15 meningar](kunskap/att-skriva-en-bra-redovisningstext) om kursutvecklingen av oophp-kursen version 2. Det sägs ju att det är **bra att reflektera över sin egen verksamhet**. För att förstå den och för att kunna bli bättre. Lite hälsosam dos av självkritik och analys i försök att finna förbättringspotential i sitt dagliga arbete.




