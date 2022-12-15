---
author: aar
revision:
    "2021-06-22": (A, aar) Första versionen.
...
Rättningsverktyget Umbridge
==================================

Umbridge är ett verktyg för att automaträtta inlämningar i programmeringskurser.

<!--more-->

Källkoden för verktyget kan ni hitta på [GitHub](https://github.com/dbwebb-se/umbridge/).



## Hur det funkar {#how}

Det finns enhetstester kopplade till varje inlämning. Enhetstesterna är skrivna så att de täcker upp alla kraven. På så sätt är vi 99% säkra på att studenten har utfört uppgifterna på lämpligt sätt för att uppnå godkänt om alla tester passerar.

[FIGURE src=/image/wall-e.png caption="Översikt av Umbridge"]

Processen består av fyra steg, där egentligen det bara är steg två och tre som är en del av Umbridge.

1. Förberedelse fasen. Studenten laddar upp sin kod så den finns tillgänglig för Umbridge och lämnar in på Canvas.

2. Var 5:e minut kopplar Umbridge upp sig mot Canvas och samlar in alla inlämningar som inte är rättade.

3. För varje inlämning laddar Umbridge ner studentens kod och kör testerna. Om testerna passerar sätts betyget PG (preliminärt godkänt) annars sätts Ux (komplettering). När betyget sätts skickar Umbridge också med en loggfil med utskriften av testerna och en länk som kan användas för att titta på studentens kod.

4. Sista steget i processen är att en rättare kollar igenom alla inlämningar som har betyg PG. Rättaren dubbelkollar innehållet i loggfilen, läser igenom redovisningstexten och kollar på studentens kod.

Det sista steget är viktigt för att säkerställa att studenterna inte skriver kod för att lura testerna och för att inspektera hur bra koden är skriven. Då kan rättaren ge feedback på hur koden är skriven, om den bör förbättras.



## Syfte {#why}

Varför valde vi att börja med automaträttning och varför utvecklade vi systemet själva istället för att köpa in en färdig tjänst?

Det finns främst två anledningar till att vi började med automaträttning, tid och snabb återkoppling. Studenter behöver inte vänta i några dagar på att en rättare ska få tid att kolla på deras inlämningar. Istället kan studenten själv köra testerna som finns innan inlämning för att vet om de är klara eller inte. Samtidigt kan de se vad som är fel, som de behöver fixa. Studenterna kan också jobba iterativt och nästa lite [TDD](https://en.wikipedia.org/wiki/Test-driven_development). Forskningen visar också på att det är bra för studenter när de kan få återkoppling direkt om de är klara eller inte. I sektionen [Forskning](#research) kommer vi, en vacker dag när vi har tid över, sammanfatta hur forskningsläget ser ut för automaträttning. Rättningen går väldigt mycket snabbare när rättarna bara behöver kolla på inlämningar som de vet har uppnått kraven för inlämningen, de slipper laddar ner kod och köra kod som inte alltid funkar. Det är tid vi kan lägga på att vara aktiva i chatten eller utveckla kursen istället.

Vi valde att utveckla ett eget system för att existerande tjänster kostar väldigt mycket pengar och vi anser inte att tjänsten är komplex nog att förtjäna sin prislapp. Sen är vi också väldigt förtjusta i konceptet "kan själv", [budord 3](http://bth1.dbwebb.se/forum/viewtopic.php?t=8241). Vi behöver också öva och lära oss nya saker, som vi kan använda i våra kurser. Därför var detta ett ypperligt tillfälle att utveckla ett eget verktyg.



## Forskning {#research}

Vad säger forskningen om automaträttade uppgifter?

TO-DO

<!--
https://www.lth.se/fileadmin/lth/genombrottet/konferens2018/A1_Wikstro__m.pdf - kolla dess referenser
https://www.skolverket.se/download/18.6bfaca41169863e6a658d9a/1553962384309/pdf2430.pdf - något från skolverket om undersöka datorbaserade prov och automaträttning
 -->
