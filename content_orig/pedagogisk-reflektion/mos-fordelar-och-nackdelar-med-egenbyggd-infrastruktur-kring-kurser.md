---
author:
    - mos
revision:
    "2017-06-17": "(PA1, mos) Första utgåvan i format av ett utkast."
category:
    - reflektion
    - pedagogik
    - not yet peer reviewed
...
Introduktion
===================================

Berätta om vilken infrastruktur som byggs, hur den fungerar, vilka problem den löser och hur den upplevs av studenter.

Förklara incitamenten till att skapa infrastruktur.

Berätta om problemen som följer när infrastrukturen växer och fler människor blandas in.


<!--more-->


Bakgrund {#bakgrund}
-----------------------

Vid utvecklingen av dbwebb-kurserna har alltid föredragits att automatisera det som automatiseras kan som ett alternativ till att lärarpersonalen utför återkommande uppgifter. (ge exempel)

Ett incitament till att införa infrastruktur som stöd i undevisningen är att underlätta hanteringen som studenten utför. Tanken är att minimera kringjobbet för att underlätta fokusering på det som är viktigt, att tillgodogöra sig kunskapen i kursen.

Ett annat incitament till att bygga ut infrastrukturen är att underlätta handledning, felsökning, uppdateringar av kursmaterial, stöd för inlämning och rättning, samt tidig feedback till studenterna om när de har problem, eller att upptäcka problem på ett tidigt stadie till exempel innan inlämning görs.

Den infrastruktur som skapas för att lösa detta kan vara enklare skript eller valet av teknikplattform för kursernas leverans, det kan styra valet av publiseringsmiljö för kursmaterial och det kan styra studeternas labbmiljö.

Rent generellt så krävs en viss nivå av storlek för att infrastruktur skall löna sig. Den investering man gör i infrastrukturen bör betala tillbaka sig inom rimlig tid. Det kan finnas behov av infrastruktur för att antalet studenter är många, fysiska möten inte är möjliga, olika kunskapsnivåer på de som levererar kurserna, ett krav på kvalitet och stordrift där någon vill säkerställa en viss kontinuitet i kursdriften. Oavsett anledning till investerin i infrastruktur så bör det finnas en tanke om att investeringen skall betala sig.



Upplägg {#upplagg}
-----------------------

I dbwebb-kurserna har vi en infrastruktur som är tätt knyten till kurserna och integrerad i hur kurserna utvecklas, underhålls och levereras. Infrastrukturen består av flera olika tekniska lösningar och teknikval men tanken är att de skall integreras i kurserna så att det känns som en naturlig och stödjande del för lärarteam och studenter.

En central del i dbwebb-kurserna är kommandot `dbwebb`, eller dbwebb-cli [^1] som vi kallar det. Det är ett bash-script som studenterna använder för att ladda hem kursmaterialet och skriptet är sedan en hjälpreda när studenterna jobbar sig igenom kurserna. Främst hjälper skriptet studenterna att validera sina kodlösningar så att koden motsvarar vissa kvalitetskrav. Validering med `dbwebb validate` är en statisk kodgranskning och kommandot dbwebb använder sig av ett tiotal externa verktyg som på olika sätt analyserar studentens kodlösningar.

Om det är webbaserade tekniker så använder studenten publicering med `dbwebb publish` för att ladda upp materialet på en webbserver. Publisering kan ses som att studenten jobbar med sin kod i utvecklarläge och skickar den sedan till en driftserver för att sätta den i live drift. Detta är en arbetsprocess som inte är helt skild från hur en programmerare jobbar. 

När publiseringen sker så kan `dbwebb` även se till att skydda koden så gått det går via rättigheter och minifiering. Detta är tekniker för att försvåra kodkopiering mellan studenters lösningar.

Ett annat användningsområde är när studenten skapar labbar med kommandot `dbwebb create`, då automatgenereras en lab som är personlig för studenten. Labben kan skapas så att olika studenter får olika innehåll i sina laborationer, det är ett sätt att försvåra för studenter att göra råkopiering av lösningar. Vi uppmanar alltid studenter att diskutera och fråga sina studentkompisar om lösningar och hur man skall tänka. Men råkopiering av en hel labblösning vill vi försvåra. Bakom kommandot `dbwebb create` ligger ett separat egenutvecklat verktyg där man kan skapa laborationer i godtycligt programmeringsspråk, i skrivande stund omfattar labbverktyget stöd för labbar i Python, PHP, JavaScript (klient och server), Bash, SQLite.

Labbarna i labbverktyget är självrättande och studenten kan själv provköra sina lösningar för omedelbar feedback på om det blivit rätt. Hamnar studenten i svårigheter så kan de även få en hint, en ledtråd, som i praktiken visar det rätta svaret och låter studenten jämföra det mot sitt svar. 

Om en student behöver lärarhjälp med felsökning så kan en lärare ladda ned studentens kod med `dbwebb download` eller se koden genom att logga in på driftservern. All kod hamnar på driftservern och lärarteamet har utökade rättigheter att se alla studenters kod. Via kommandot `dbwebb download` kan alltså en lärare snabbt få ned en students hela kursmaterial för att felsöka eller studera koden och föra diskussion i forum, chatt eller hangout.

Om det är mindre konddelar som behövs för felsökning, eller bara en enskild labbuppgift så uppmanas istället att studenten gör en codeshare. I ett externt onlineverktyg skapar studenten en kopia av den problematiska koden och visar den tillsammans med uppgiftstexten och de som hjälper till kan sedan redigera och förslå förändringar direkt i codesharen, ändringar som ses av alla direkt. Ibland finns det externa verktyg som är klart bättre att använda än att bygga egen infrastruktur.

När studenterna gjort sin inlämning av ett kursmnoment så tar rättning över och rättaren tittar på studentens inlämning via `dbwebb inspect`. Vid inspekt-fasen valideras studentens kod och testas så att uppgifterna är synligen korrekt utförda. Inspekten underlättar för rättaren att se om någon felaktighet finns. Det är inte ett absolut sätt att bestämma om kursmomentet är korrekt utfört eller ej, men det ger en ingångspunkt till rättningen och ett stöd som gör det enkelt att snabbt rätta godtycklig students inlämning i godtycklig kurs och samtidigt visa vilka uppgifter som var aktuella i just det kursmomentet.

Det är en fördel att studenterna kan självrätta sina inlämningar och testköra dem på samma sätt som rättaren gör. Det bör minimiera risken för inlämningar som har enkla fel där man glömt att utföra en deluppgift eller glömt bifoga en fil eller studenten har enklare valideringsproblem.

Infrastrukturen med kommandot dbwebb kräver bash vilket i sin tur ställer ett krav om att terminalen används som ett centralt verktyg. Detta är ett grundläggande beslut som färgar samtliga dbwebb-kurser.

Under skalet på dbwebb-kommandot finns git och en koppling till GitHub där kursmaterialet finns. Denna koppling gör det enkelt att låta en student alltid hålla sitt kursrepo med kursmaterial och exempelprogram uppdaterat via `dbwebb update`. Det gör det enkelt att pusha ut ändringar genom att låta studenten hämta hem dem.

Under skalet finns också en större användning av rsync över ssh som används för att kopiera filer vid validate och publish till driftservern. Studenten har ett konto på driftservern och lärarteamet har utökade befogenheter på servern som både lagrar kursrepot som är publicerat och har en extra kopia som är publiseringen på webbservern. Driftservern har också installerat de externa verktyg som används vid validering och publisering.

En annan vy av automatiseringen är hur utvecklingen av kurserna sker då flera lärare samverkar för att bidra med kursmaterial. Kursrepot innehåller ett antal konfigurationsfiler som enbart finns för utveckling och test av kursmaterialet. Dels är det filer som styr vilkan filer som laddas upp till driftservern, valideringsverktyg som körs och dels är det filer som styr inspekt-fasen och det är filer som styr vilken version av dbwebb-cli som krävs av kursrepot.

Vid utvecklingen av kursmaterial och kursrepo så används en lokal utvecklingsmiljö där alla utvecklingsverktyg och valideringsverktyg kan installeras lokalt av läraren. Vid utveckling och test av kursrepot kan läraren jobba utan någon koppling till driftservern. Alla kursrepon är samlade under en organisation på GitHub. Byggverktyget för utveckling är `make` och alla viktiga delar samlas under det, främst via `make install test`. Man kan även köra lokal validering, publicering och inspekt, allt för att underlätta och förenkla för den som utvecklar och testar.

Vid `make test` så testas även att kursrepot fungerar tillsammans med de uppgifter som kursmomenten innehåller, det är en separat testprocess för att säkerställa att alla delar av kursrepot verkligen fungerar så som det är tänkt att studenten skall jobba i kursen. Alla dessa tester är automatuserade och varje gång som kursrepot checkas in på GitHub så körs automatiska tester via byggtjänster som Travis och CircleCI.



Resultat {#resultat}
-----------------------

De observationer vi gjort är att studenten uppfattar dbwebb-cli som en naturlig del av kursen som underlättar vid felsökning och allmänt arbete med kursen. Det ses inte som en svårighet. 

Studenten uppfattar valideringen som jobbig inledningsvis men känner förtroende för att det ger ett viktigt stöd och direkt feedback om kodens kvalitet.

Rättningstemaet finner ett stöd i inspektfasen som gör att man kan jobba snabbt och effektivt med rättningar av en större mängd studenter.

Lärarteamet har en utvecklingsplattform för kurserna som stöds av automatiserade tester som ger en trygghet i att larma om något går sönder under resans gång.



Farhågor {#farhagor}
-----------------------

En infrastruktur måste underhållas och vidarutvecklas. Allt eftersom kan investeringen öka och man bygger in sig i sin infrastruktur som kan upplevas hämmande. När den känslan uppträder bör man fråga sig om man är inne på rätt spår. När kostnaden överstiger vinsten så bör man se sig om efter alternativa lösningar. Infrastrukturen bör inte få ett eget liv utan enbart vara ett stöd för det som är viktigt och centralt. Det är inte orimligt att den som ansvarar för infrastrukturen kan finna det givande att fortsätta att investera i den och missa greppet om vad som är viktigt.

När en infrastruktur fungerar väl så kommer andra att intressera sig för den och se dess fördelar och undersöka om inte de kan dra nytta av den infrastruktur som finns. Man är då i ett skifte där infrastrukturen är på väg att hjälpa många istäkket för enbart det egna teamet och dess kurser. Här är en vansklig väg att vandra då nytillkomna supportrar ser det goda men inte är skolade att jobba inom infrastrukturens ramar. När en nytillkommen supporter kommer så måste den, likt det befintliga lärarteamet, inskolas i infrastrukturen och dess begränsningar och dess nytta. Annars är risken överhängande att kravbilden skiftas eller utökas för att stödja en större omfattande kravbild, på gott och ont, eller att den nytillkomna supporten ser de nackdelar och begränsningar som lärartemaet tar för givna som stora problem och showstoppers och lämnar med en negativ attityd till infrastrukturen. 

Att gå från att enbart köra infrastrukturen i sitt stängda lärarteam och utvalda kurser är en sak, att bjuda in andra att delta eller nyttja samma infrastruktur kräver varsamma steg, utbildning och handpåläggning för att lyckas och för att inte hamna i en negativt laddad upplevese.

En infrastruktur som stödjer en mindre kursflora är ofta kopplad till en person. Vad händer när den personen lämnar? Kan någon ta över eller är det dags för en ny infrastruktur? Det beror på hur viktig strukturen är för kurserna. I dbwebb-kurserna är infrastrukturen så central så det är viktigt för kursernas fortlevnda att infrastrukturen görs fri från dess grundare.

En infrastruktur skapas kring en person eller team och det formas av teamets, eller skaparens, förmåga och är där begränsad av dem som skapat det. När man bygger nya struykturer där infrastruktur kan förekomma bör man välja att sätta personer som har förmåga att skapa infrastruktur och förmåga att inse värde och kostad av infrastrukturen. Undvik att ge infrastrukturen ett eget liv.



Sammanfattning {#sammanfattning}
-----------------------

I dbwebb-kurserna finns en större investering gjord i infrastruktur som påverkar hur kurserna utvecklas, levereras och kvalitetssäkras. Infrastrukturen är viktig så länge kuserna finns och så läge de ligger inom de dbwebb-program som finns.

Kärnan i kurserna hade kunnat levereras utan infrastrukturen men det har aldrig varit ett alternativ.

Även om varje investering "vägs på guldvåg" finns risken att vi bygger in oss på ett möjligen begränsande och potentiellt negativt sätt. Den risken finns alltid. Man bör alltis ifrågasätta sin infrastruktur och överväga alternativ. Det är inte ett självändamål att bygga infrastruktur, det kan finnas många alternativa lösningar.

Som grundare till infrastrukturen så är jag mycket nöjd med den och anser att den är ett väldigt viktigt ben som dbwebb-kurserna står på. Men jag inser likväl det vanskliga i att investera i en liknande infrastruktur. Så länge man själv investerar och ansvarar för den så är det en sak, det är en annan sak att bygga ut den till ett lärarteam och det blir ytterligare en sak när fler externa intressenter och supportrar tillkommer. Man bör vara försiktig med att "sälja in" sin infrastruktur för det leder troligen till att tid och energi måste användas för att marknadsföra, förklara, utbilda om infrastrukturen i sig. När man gör det bör man tänka att man nu lämnat sitt centrala fokus om att utbilda i kurserna som infrastrukturen var tänkt för. Infrastrukturen är på väg att få ett större och eget liv, det var inte tanken från början och om man väljer att fortsätta på det spåret blir infrastrukturen till ett större och mer omfattande projekt. Är det värt det och för vem är det värt det?

Tänk igenom om investeringen är lönsam innan du gör den.



Diskussion om artikeln {#diskussion}
-----------------------

I [artikelns forumtråd](t/XXX) kan du ge din feedback till författaren och vidare diskutera ämnet som artikeln hanterar.



Peer reviewed {#peer}
-----------------------
Följande har läst denna artikel, givit sin feedback och samtalat om artikelns innehåll.

| Granskare |
|-----------|
|TBD |
|TBD |
|TBD |
