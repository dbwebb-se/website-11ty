---
author: aar
revision:
  "2019-05-13": (A, aar) Första revisionen.
...

Vad är DevOps? För varje definition du kollar kommer du troligen få ett nytt svar. För många handlar DevOps om automation och olika verktyg men DevOps är större än så. I denna artikeln ska vi försöka gå igenom vad DevOps faktiskt innebär för dig som utvecklare och din organisation.



Vad är DevOps?
==========================

DevOps är ett tankesätt, många tänker att det är att använda verktyg som Ansible, Docker och Jenkins för att automatisera och sätta upp kontinuerliga flöden. Men det är inta att använda verktygen som är DevOps utan det är hur man använder verktygen och att ha en arbetskultur där individer och organisationer tillåts att utveckla och underhålla en hållbara arbetspraxis.

Enligt boken The DevOps Handbook är målet med DevOps är att skapa en arbetsmiljö där alla inom organisationen samarbetar, genom att skapa *cross-functional teams*, för att uppnå organisationens mål och ge värde åt kunderna. Utvecklare, produkt ägare, QA, IT och säkerhet ska jobba tillsammans för att skapa ett snabbt flöde mellan planerat arbete och produktion. Flödet möjliggörs av QA, IT och säkerhets arbete för att skapa automatiserade verktyg och plattformar som utvecklarna kan använda för att snabbt och självständigt utveckla, testa och driftsätta sin kod. Samtidigt som de uppnår stability, reliability, availability och security. Allt detta är det tänkt ska göra att utvecklare öka produktivitet, möjliggöra organisatorisk lärande, skapa hög anställningsnöjdhet och gör att företaget vinner marknadsdelar.

The DevOps Handbook är skriver av fyra personer som var med och mynta DevOps och hjälpt det växa till vad det är idag. De beskriver DevOps som "a manifestation of creating a dynamic, learning organisation that continually reinforce high-trust cultural norms.". Detta uppnås genom att skapa koalitioner mellan alla inblandade i ett företag/projekt, Utvecklare, IT-operationer, produkt ägare, arkitekter och säkerhet.

Den rådande arbetssituationen hos de flesta företag beskrivs som att utvecklare och IT är motståndare och testning och säkerhet aktiviteter händer bara i slutet av projekt när det är för sent att ändra något. Dessutom tar kritiska aktiviteter kräver för mycket manuellt arbete och många överlämningar vilket leder till långa väntetider. Som i sin tur påverkar projektet negativt och leder till ett negativare värde för kunden och i slutändan organisationens mål.



Varför DevOps?
==========================

I bilden nedanför kan vi se hur mängden tid och krav som krävs för att driftsätta ny funktionalitet har minskat över de senaste fyra årtionden.

[FIGURE src=/img/devops/table.png caption="Trender inom software delivery. Källa: The DevOps Handbook"]

Branschen har gått från att företag behöver flera år och riskera att gå i konkurs när en ny funktionalitet ska introduceras till att företag kan göra det på ett par veckor. Men tack vare utvecklingen av molnet och virtuella maskiner och introduktionen av DevOps kan företag idag driftsätta ny funktionalitet fler hundra gånger om dagen. Företag kan snabbt och lätt sätta upp nya miljöer för att testa idéer och se vad som ger kunder och organisationen mest nytta. 

Dagens marknad är full av konkurrenter, det dyker upp nya startups varje dag som försöker utmana varandra med liknande tjänster. För att ha en chans att överleva denna marknaden krävs det av företag att de är snabba på att få ut och experimentera med ny funktionalitet. Företag som inte klarar av det löper stor risk att snabbt förlora marknadsvärde åt de snabba konkurrenterna.


Anledningen till att många företag inte klarar av de snabba driftsättningarna, hög kvalitet och experimenterandet är att de har ett "core, chronic conflict" inom sin organisation. 




The Core, Chronic Conflict
============================

Beskrivs som att inom varje IT organisation finns det in inbyggd conflict mellan IT-ops och utvecklare. Detta skapar en neråtgående spiral av långsammare tid till driftsättning för nya produkter och funktioner, sämre kvalitet och värsta av allt en växande mängd [tekning skuld](https://it-ord.idg.se/ord/teknisk-skuld/). De flesta IT organisationen har två mål som parallellt måste uppfyllas, och delas upp på utvecklarna och IT:

- Agera snabbt för att hänga med på den ständigt förändrade marknaden, (ny funktionalitet).

- Förse kunder med stabil, pålitlig och säker service.

Utvecklare sköter normalt att hänga med på marknaden genom att skapa ny funktionalitet och ändra i produktion så snabbt som möjligt medan IT operations ansvarar för stabilitet, pålitlighet och säkerhet i produktions miljön. Detta försvårar för utvecklare att införa ändringar i produktion som kan äventyra produktions miljön. Detta kallar Dr Goldratt "The core, chronic conflict - when organizational measurements and incentives across different silos prevent the achievement of global, organization goals!".

Spiralen består av tre steg:

#### Steg 1

Det första steget börjar hos IT operations när de ska se till att applikationer och infrastruktur är tillgängligt för kunderna. Problemet är att saker är dåligt dokumenterade, komplicerade och bräckliga. Det beror ofta på den tekniska skulden som uppstår under utveckling. När ändringar införs i systemen och fallerar äventyrar det organisationens mål, så som intäkts mål, tillgänglighet åt kunden och säkerhet för kundens data.



#### Steg 2

När någon behöver kompensera för de problemen som uppstod i steg 1 startar steg 2. Det kan vara en produkt ägare som lovar att leverera en ny häftigt funktion åt kunderna eller en chef som sätter nya högre inkomstmål. Då, oberoende av vad teknologin klarar av, eller vilka faktorer som orsakade de tidigare problemen, förbinder de it organisationen att leverera de nya löftena. Detta i sin tur leder till utvecklare som tar genvägar och bygger på den tekniska skulden som redan finns.



#### Steg 3

Detta tar oss till det tredje och sista steget där alla är lite mer upptagna hela tiden, arbetet tar hela tiden lite mer tid, kommunikationen blir långsammare och arbetsköer blir längre. Arbetet blir met tätt kopplat och mindre ändringar orsakar större fel. Alla de nya problemen som uppstår skapar en situation där folk behöver kommunicera och koordinera arbetet mer och vänta på godkännande. Kvaliteten på arbetet går ner samtidigt som arbete går långsammare och kräver mer ansträngning för att hålla det igång.
 


Scenario: Du jobbar på ett företag som driver en websida, websidan har nyligen blivit väldigt populär och antalet besökare stiger varje dag. Ni var inte beredda så många besökare och sidan börjar bli långsam och producerar fel. De anställda är onöjda med att de behöver jobba övertid för att lösa problemen samtidigt som de ska skapa ny funktionalitet och driftsätta. Vi har utvecklarna som försöker lägga till nya saker medan IT operations jobbar för fullt med att se till att sidan är live. Stressen ökar och folk börjar beskylla varandra för problemen.

När det sista steget i spiralen är uppnått är blir produktleverans cyklerna långsammare och långsammare medans färre projekt startas. Organisationen hinner inte längre med i utvecklingarna på marknaden. När IT misslyckas, misslyckas hela organisationen och kan resultera förlorade marknadsdelar för företaget.



Stoppa spiralen med DevOps
==============================

Organisationen består av små teams som jobbar oberoende av varandra implementerar funktionalitet de har ansvar för, validerar det i en produktionsliknande miljö och driftsätter det till produktion på ett snabbt, säkert och pålitligt sätt. Driftsättning ska vara rutin och förutsägbart, som sker under arbetstid mitt i veckan och inte på fredag eftermiddag. För att lyckas med det krävs det snabba återkopplings loopar vid varje steg i processen, alla ska när som helst kunna se effekten av deras handlingar. Vi kan uppnå det med automatiserade tester som körs i produktionsliknande miljö när kod committas till versionshantering. Detta ger utvecklarna snabb kontinuerlig återkoppling på om deras kod och miljön fungerar som det ska. Istället för att felen upptäcks sex månader senare när integrationstester körs.

Det behövs även återkoppling från produktionsmiljön så problem snabbt kan upptäckas och lösas men även för att försäkra oss om att saker fungerar som det ska och att kunder får ut det värdet som de ska av vår mjukvara. Detta kan vi uppnå med loggning i mjukvaran, mätning av allt som sker i produkten och program som att övervaka programmet och infrastrukturen och kan notificera när något inte är som det ska.

Arbetsplatsen ska ha en kultur av tillit och samarbete istället för fruktan, där man blir belönad för att ta risker. Det ska pratas öppet om problem så de kan lösas snabbt istället för att läggas på backloggen.  Vi måste se problem för att kunna lösa dem. Alla ska äga kvalitén av deras arbete, alla bygger in automatiserad tester i sin dagliga rutin och använder peer reviews för att bygga förtroende att problem upptäcks långt innan det kan påverka en kund. Vi försöker också minska mängden kunder som kan bli påverkade av ny funktionalitet i produktion med "dark launch techniques" eller "Canary release". Man börjar med att driftsätta den nya funktionaliteten till en del av sin infrastruktur som inte användare har tillgång till. När man är nöjd med hur det fungerar ger man en liten del av användarna/kunderna tillgång till den nya funktionaliteten och utvecklar den vidare tills man har löst alla problem och funktionaliteten uppnår alla organisations mål som den ska, först då släpps funktionaliteten till alla användare. Då går det att uppnå kontrollerad, förutsägbar och reversibel. 

När något går fel utförs en obduktion där man inte anklagar eller straffar någon för felet. Istället handlar det om att man tillsammans ska få förståelse för varför felet uppstod, hur man kan förhindra det i framtiden och se det som ett tillfälle för lärande.

Inom DevOps värld har alla äganderätt för arbete som de utför, oavsett vad de har för roll inom organisationen. Anställda ska ha förtroende för att deras arbete är betydelsefullt och bidrar till organisationens mål. Detta ska upp visas genom låg stress på jobbet och organisationens framgång på marknaden.



Affärsvärdet av DevOps
==========================

Författarna av the DevOps Handbook gick igenom resultatet av Puppet labs State of DevOps reports från 2013 till 2016 kom fram till att företag som jobbar med DevOps överträffade deras jämlikar i följande statistik:

-  Genomströmning

- Antal ånger kod driftsätts (30x oftare)

- Tiden det tar från kod commit till driftsättning (200x snabbare)

- Pålitlighet

- 60% högre success rate för driftsättning

- Medeltid för att återställa en tjänst (168x snabbare)

- Produktivitet, marknadsvärde och lönsamhetsmål (2x mer sannolika att lyckas)

- Ökat marknadsvärde (50% högre på tre år)

- Anställningsnöjdhet

Det många teams och organisationer har problem med när de ska börja jobba med DevOps är att de behöver inse att det inte finns ett rätt svar på hur man ska jobba. Varje team behöver anpassa sin DevOps utefter sina behov.

# Myter {myter}

Boken The DevOps handbook skingrar ett antal myter kring DevOps.

- DevOps är bara för Start-up företag.

- DevOps ersätter Agile. Man kan se Agile en möjliggörare för DevOps och att DevOps är en logisk fortsättning på det agila arbetssättet i att uppnå högkvalitativ kod i små teams.

- DevOps är inkompatibel med säkerhet. Traditionellt sätt läggs ett stort fokus på säkerhet i slutet av ett projekt innan det skickas till slutkunden. Inom DevOps finns inte den slutperioden på samma sätt, istället ska säkerhetsaspekter vara inkorporerade i utvecklings cykeln. Precis som utveckling ska säkerhet jobbas med iterativt.

- DevOps eliminerar IT-operationer. Syftet med DevOps är inte att ersätta Ops, men det kan ändra hur man jobbar med Ops. Istället för att eliminera Ops så ska det få IT att samarbeta med utvecklarna och jobba på plattformen på liknande sätt som utvecklare jobbar på en produkt. Då plattformen är Ops produkt, som utvecklarna ska använda för att testa och driftsätta sina projekt på.

- DevOps är bara Infrastructure as Code och automatisering. Även om automatisering är en stor del av DevOps kräver det också en kulturell norm och arkitektur där delade mål kan uppnås från start till slut. Christopher Little skrev "DevOps isnät about automation, just as astronomy isn't about telescopes".



Patrick Debois mynta termen DevOps när han anordnade DevOpsDays första gången.

blue-green deployment