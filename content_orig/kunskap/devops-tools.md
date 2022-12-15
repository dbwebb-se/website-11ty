---
author: aar
category: devops
revision:
  "2019-06-13": (A, aar) Första utgåvan inför kursen devops.
...

Verktyg för lyckad Devops
==================================

Software development tools hjälper till med programmering, dokumentering, testing och bug fixing i applikationer och services.

(s. 177 framåt)

<!--more-->

# Lokal utvecklings miljö {#locale}

Det är viktigt med en konsekvent lokalt utvecklingsmiljö för att snabbt få utvecklare att bidra till produkten. Det betyder att utvecklare behöver ha verktyg för att få sitt jobb gjort effektivt, inte att utvecklare ska vara tvingade att använda en specifik texteditor.



# Versions hantering (VCS) {#vcs}

Möjligheten att commita, jämföra, merga och återställa till tidigare versioner ger grunder för bättre samarbete inom om mellan teams. Varje organisation bör använda VCS, det underlättar för att lösa konflikter som uppstår när flera jobbar mot samma filer eller projekt. VCS gör att man kan göra ändringar och återställningar på ett säkert sätt. När man ska välja ett VCS, välj ett som uppmuntrar samarbete. Följande egenskaper gör detta:

- Skapa och forka repo.
- Att alla kan bidra till repot.
- Kunna säkra bidragen till repot.
- kunna definiera processer för bidrag och
- dela commit rättigheter.



# Artefakt förvaltning {#artifacts}

En artefakt är resultatet av något steg i software development processen. Ett artifact repository gör att dependencies kan hanteras statiskt. Man kan förvara en version av ett vanligt bibliotek separat från VCS, vilket gör att olika teams kan använda samma delade dependency. Man bygger ett paket en gång och sen används det i hela arbetsflödet, testning och byggning. Större organisationer behöver ofta kontrollera och godkänna 3:e hands bibliotek innan de kan användas, godkända bibliotek brukar spara i artefakt förvaltning systemet. Samma artefakt system ska användas lokalt som vid byggning och driftsättning för att förhindra "it works on my machine".



# Infrastruktur automation (IaC) {#iac}

Är anskaffningen av element i infrastrukturen via kod, koden ska behandlas som resten av ens mjukvara. Koden utvecklas lokalt med en gemensam lokal utvecklingsmiljö, är versionshanterad, testad och verifierad innan det sätts i produktion. IaC leder till repeterbar, konsekvent, dokumenterad, kontrollerbar och hållbara processer. Det ökar också förtroendet för att servrar har konsekvent likadan konfiguration vid setup och deploy faser.

Automationen ska hjälpa oss med:
- Hantera drift konfiguration
    Förhindra att konfigurationen ändras under drift och ha möjlighet att ändra tillbaka till önskat tillstånd.
- Eliminera snowflake servrar
    En snowflake server uppstår när en server uppdateras manuellt. Detta förhindras genom att all uppdatering sker via kod.
- Versionshantering av infrastruktur koden
- Minimera komplexitet



# Bygg automation {#build-automation}

Automationsverktyg för att bygga software specificerar både hur (vilka steag och i vilken ordning) och vilka dependencies som krävs. Det finns tre vanliga kategorier:

- On-demand Automationen  
    Körs av manuellt av användaren. Ex. köra ett make skript lokalt. 
- Scheduled automation  
    Körs på förutbestämda tider, oftast på natten. *Nightly builds* körs varje natt, när ingen jobbar så att inga nya ändringar införs när det byggs. 
- Triggered automation  
    Körs när event händer, oftast inom continous integration när en ny commit görs.



# Olika typer av testning {#testing}

*Smoke testing*  
  snabbt och grundläggande test är att försäkra att output är möjligt och rimligt.

*Regression testing*  
  verifierar att ändring till software inte introducerar några buggar eller fel.

*Usability testing*  
  mäter ett systems förmåga att möta dess avsedda ändamål genom att testa på användare.

*A/B testing*  
  experimentell tillvägagångssätt där två olika versioner av ett system jämförs för att se vilken som presterar bäst.

*Blue-green deployment*  
  Det finns två likadana produktionsmiljöer där den ena används för all trafik. I sista testfasen driftsätts den nya versionen i den andra miljön. När testerna godkänns leds all trafik om till den nya miljön. Fördelen med denna typen av driftsättning är att om något går fel kan man snabbt återgå till den tidigare versionen.

*Canary process*  
  Ny funktionalitet/kod körs först mot en delmängd av användare för att se hur prestandan av den nya koden förhåller sig till den gamla.



# Monitoring {#monitoring}

Ett stort ämne som går att dela upp i *events* och *analys*. Vanliga saker som samlas in/mäts är loggar, CPU/RAM användning, disk space, requests, om system är tillgängliga och load time. 

Monitoring kan sammanfattas som processen att övervaka ett systems nuvarande state och miljö, med målet att kolla om det möter fördefinierade mål som beskriver det önskat state.

Olika saker att övervaka:



## Metrics {#metrics}

Kvalitativa och kvantitativa mätningsvärden som sparas för analytiska och historik ändamål. Det går att se en mängd olika metrics i repot [metrics-catalog](https://github.com/monitoringsucks/metrics-catalog).



## Logging {#logging}

Generering, filtrering, insamling och analys av events som sker i ett system. När man ska leta upp källan till ett software fel, är en av det första sakerna utvecklare gör är att kolla loggarna efter relevanta felmeddelanden.

Ett system kan producera flera tusen rader loggar per dag, speciellt moderna system som köra på flera noder spridda över många servrar. Stora system kan producera flera gigabyte loggning om dagen. Det är inte lätt att samla ihop all loggning från de olika servrarna som körs och sen sammanställa det på ett vettigt sätt.



## Alerting {#alerting}

Målet med alerting är att skapa events från data insamlad via monitoring, med målet att en människa ska ge uppmärksamhet till något.

När man bestämmer vad som ska skapa alert event behöver man tänka på:

*Impact*
  Alla system har inte lika stor inverkan på en produkt. Något som påverkar flera system eller stora grupp/viktiga kunder har större inverkan. Medan vissa system inte påverkar kunder eller påverkar system som har mycket redundans och klarar av att ett system går ner. För att undvika *alert fatigue* är det viktigt att alerting bara sker när en incident har hög impact.

*Urgency*
  Alla incidenter är inte heller lika brådskande. T.ex. är det mer brådskande om ett betalsystem går när än en informations blog.

*Interested party*
  Skicka bara alerts till de som behöver veta och som ansvarar för incidenten. Det kan vara kunder, utvecklare och operations.

*Cost*
  Det kostar att ha bra monitoring och alerting. Det inkluderar övervakningen, lagring av historisk data, att skicka ut ett alert och att någon svara på incidenten och försöker gör något åt det.



# Events {#events}

De flesta system idag förväntas fungera 24/7, men många företag har inte anställda som jobbar dygnet runt. Så när något går fel eller ett event uppstår behövs det hanteras. Därför är det bra med automatisk eventhantering.

Många event alert och monitoring system har inbyggt sätt att automatiskt hantera event. T.ex. starta om ett system som har kraschat eller skapa en ticket i ett support system. Men det går inte att lita helt på de automatiserad event hanterarna och alert systemen, inga system är 100% exakta. Ett *false positiv* är när ett event genereras när det inte är något fel och *false negative* är när det inte genereras ett alert när det borde, vilket kan leda till lång tid innan ett fel upptäcks. Detta gör att det även är viktigt att övervaka och analysera alerts som skickas. Monitoring och förbättring av alerts leder till mer effektiva alert vilket kan leda till nöjdare anställda som slipper bli väckta på helger och nätter.



Missuppfattningar gällande verktyg och Devops {#missuppfattningar}
------------------------------

Text

# De använder X medan vi använder Y, vi måste byta {#xy}

Att kopiera en annan organisations verktyg stack behöver inte leda till succé, det är viktigare att hitta vad som fungera för ens egna organisation.



# Att använda verktyg X innebär att vi kör Devops {#verktyg-inte-devops}

Devops är en kultur och verktygen är en viktig del av den men det är inte allt. Det är viktigt att förstå varför vi använder verktygen, t.ex. infrastruktur automation gör att utvecklare kan göra ändringar på ett mer effektivt och pålitligt sätt samtidigt som det minskar riskerna med att göra ändringar.



# Det går att köpa Devops paket eller Devops-as-a-service {#buy-devops}

Devops snabbar popularitet har lett till att många företag lägger till Devops buzzwords i sin marknadsföring för att haka på trenden och sälja mer. Det kan vara svårt att veta vad som är marknadsföring från verkligheten. Fundera på hur/om företagen marknadsför mer än bara verktyg, handlar det också om samarbete, samhörighet och skalning inom organisationer? 




Avslutningsvis {#avslutning}
-------------------------------

Automatisering, continuous delivery och deployment gör att anställda kan fokusera på det som är viktigt. Korta feedback loopar med automatiska byggen och testning ökar förtroendet och kunskapen om systemen.

De presenterade verktygen är en viktig del i DevOps miljön. Med DevOps tools syftar man både på verktygen i sig och hur de används, inte dess grundläggande egenskaper. Verktygen ska främja "we" över "me", de ska främja teams och organisation att att skapa gemensam förståelse över hur arbete ska blir gjort. När man väljer verktyg är det viktigt att tänka på hur det påverkar hela organisationen och samarbeten med andra organisationer och inte bara lyssna på de med högst röst eller de som är "Rock stars".












