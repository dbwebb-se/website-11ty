---
author: mos
category:
    - databas
    - er-modellering
    - kursen dbjs
    - kursen databas
revision:
    "2022-02-11": "(D, mos) Ny länk till draw.io."
    "2019-02-14": "(C, mos) Fix brusten länk till draw.io. Mindre justering i text om loggtabellen."
    "2019-01-31": "(B, mos) Genomgång, mindre justeringar i formuleringar."
    "2018-01-05": "(A, mos) Första utgåvan."
...
Skapa ER-modell för en databas (konceptuell)
==================================

Du skall jobba med databasmodellering och skapa en ER-modell av en databas som du själv väljer efter ett par förslag som erbjuds.

Detta är första delen av uppgiften och du skall utföra den konceptuella modelleringsfasen.

Du kan lösa uppgiften genom att jobba enskilt eller i grupp om max 3 deltagare. Var och en gör sin egen inlämning, även om man jobbar i grupp.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Kokbok för databasmodellering](kunskap/kokbok-for-databasmodellering)" som ger dig metoden för hur du skall jobba med modelleringen.



Genomgång {#genomgang}
-----------------------

Det finns en inspelad föreläsning (från en systerkurs) som går igenom vissa aspekter av denna uppgift. Föreläsningen pratar om databasmodellering och visar sedan ett exempel på en e-shop implementerad med SQL och föreläsningen avslutas med att göra reverse engineering på databasen och skapa en komplett ER-modell.

[Titta på föreläsningen om ER-modellering och implementation av en e-shop](https://youtu.be/fqC_VQh_E74?start=886&end=4065) (längd 53 minuter, startar 15 minuter in och avslutas 1:18).

Flera av begreppen som du skall lösa i uppgiften, hanteras i föreläsningen, men lite ur andra vinklar.



Introduktion {#intro}
-----------------------

Du skall jobba igenom de olika faserna enligt den metod som beskrivs i kokboken.

I denna specifika uppgift skall du utföra den konceptuella modelleringsfasen. I kommande uppgift, "[Skapa ER-modell för en databas (logisk/fysisk)](uppgift/skapa-er-modell-for-en-databas-logisk-fysisk)", skall du utföra den logiska och den fysiska modelleringsfasen.

Varje steg du gör (enligt kokbokens steg) skall du dokumentera i ett dokument som du lämnar in som pdf. När du är klar finns samtliga delsteg dokumenterade i ditt dokument.



Ritverktyg {#ritverktyg}
-----------------------

När du ritar dina ER-diagram kan du använda ett godtyckligt ritverktyg som har stöd för någon notation som är relevant i ER-sammanhang.

Ett enkelt ritverktyg du kan använda är [draw.io](https://www.draw.io/). Det har stöd för både ER-variant och UML. Verktyget är webbaserat och går att integrera med Google Docs. Man kan vara flera som jobbar i dokumentet samtidigt och det går att exportera modellerna i flera olika format som går att importera i till exempel Google Docs.

Här är ett [exempel på en konceptuell modell](https://drive.google.com/file/d/0ByJ-Zb8R9RVmb2Y4enlVU2w4SVE/view?usp=sharing&resourcekey=0-wkJnal7qsqDGNbbkzmNbOw) som är ritad i verktyget. Klicka på länken och öppna den med draw.io.

Så här bör bilden se ut när du öppnar den.

<div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile userAgent=\&quot;Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36\&quot; version=\&quot;7.9.5\&quot; editor=\&quot;www.draw.io\&quot; type=\&quot;google\&quot;&gt;&lt;diagram id=\&quot;7a0769ce-8653-7076-0c71-62e9466ba2a8\&quot; name=\&quot;Page-1\&quot;&gt;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&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
<script type="text/javascript" src="https://www.draw.io/js/viewer.min.js"></script>

För den konceptuella modellen fungerar draw.io mer än tillräckligt.

När du jobbar med den logiska modellen och den fysiska modellen så kan det vara en god idé att använda MySQL Workbench som har förmågan att både rita och uppdatera en modell samt generera SQL-kod utifrån modellen.

Ett annat verktyg som är användbart för olika typer av diagram, inklusive UML och ER, är [Dia Diagram Editor](http://dia-installer.de/) som finns till olika plattformar.



Välj bas för din modellering {#valj}
-----------------------

Du kan välja bland en av följande upplägg och göra databasmodelleringen utifrån den. Samtliga baseras på grundtanken om en e-shop och det är samma typ av tabeller som krävs, oavsett vilket fokus du väljer.

Den databasmodell du nu skapar skall du senare använda för att koppla till ett webbinterface och till ett terminalinterface.



### Generellt krav på databasen {#generellt}

Databasen behöver hantera ett kundregister (kunder med kontaktdetaljer), ett produktregister (produkter med produktkod, namn, kort beskrivning och pris) där varje produkt finns i en eller flera produktkategorier.

Databasen behöver också innehålla ett lager där man ser hur många av varje produkt som finns i lagret och en notering om var produkten ligger i lagret (vilken hylla). En och samma produkt kan vara utspridd över olika hyllor i lagret.

När kunden beställer en produkt så skapas en order som innehåller kundens detaljer tillsammans med vilka produkter som beställts och dess beställda antal.

Utifrån ordern skapas en plocklista som kan skickas till lagret för leverans. Plocklistan innehåller samma information som ordern, men med tillägget att varje produktrad mappas mot en lagerhylla så att lagerpersonalen kan se vilken hylla de kan hämta produkten på.

När leveransen är packad så bifogas en faktura som har samma innehåll som ordern men nu med priset per produktrad och det summerade priset.

Det skall finnas en logg där man kan se viktiga händelser i systemet, vad hände, när hände det. Det kan till exempel vara när order/faktura skapades eller raderades.


### Fokus: BuckStar online shopping {#buckstar}

Företaget satsar på onlineförsäljning av kaffe, kaffemuggar och liknande produkter. De har även ett begränsat utbud av te-produkter.



### Fokus: CdOff online shopping {#cdoff}

Företaget ser en nygammal marknad växa fram och tänker sälja CD/DVD och äldre vinyl-skivor och relaterade produkter.



### Fokus: Egen idé {#egen}

Du har ditt eget upplägg och idé. Kör på, se till att de ovanstående generalla kraven på databasen blir uppfyllda av din databasmodell.



Krav {#krav}
-----------------------

1. Skapa en trevlig förstasida till ditt dokument. Skriv titel och namnen på de som utfört modelleringen.

1. Skapa en innehållsförteckning som sida 2.

1. Skapa en ny sida med rubrik "Konceptuell modell" och utför och dokumentera alla delsteg för den konceptuella modelleringsfasen, enligt kokbokens steg.

1. Försäkra dig själv om att din databasmodell kommer att klara av att hantera ordrar och fakturer. Tänk igenom hur man lägger en order och hur fakturan skapas, fundera på om din databas kommer "hålla". Se det som ditt eget sätt att verifiera att din modell fungerar.

1. Generera en PDF-fil `er.pdf` av dokumentet.

1. När du är klar så publicerar du ditt kursrepo.

```text
# Ställ dig i kurskatalogen
dbwebb publish me

dbwebb test er1
```



Tips från coachen {#tips}
-----------------------

Lycka till och ställ frågor i forumet om du behöver hjälp!
