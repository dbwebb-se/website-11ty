---
author:
    - mos
category:
    - test
    - php
    - phpunit
    - kursen oophp
revision:
  "2018-04-04": (A, mos) Första utgåvan inför kursen oophp v4, delvis skriven med underlag från artikel i ramverk 2.
...
Enhetstestningens roll i test av mjukvara
==================================

[FIGURE src=image/snapvt18/phpunit-terminal.png?w=c5&a=0,64,70,0&cf class="right"]

Artikeln är språkagnostisk och hanterar generell testning av programvara, oavsett vilket språk man använder för utvecklingen.

Fokus är på att introducera enhetstestning i form av dess syfte och de begrepp som finns när vi pratar om enhetstestning. Samtidigt vill vi placera enhetstestning som en av flera olika varianter av testning som görs av mjukvara.

<!--more-->

[FIGURE src=image/snapvt18/phpunit-terminal.png?w=w3 caption="Enhetstestning i PHP med PHPUnit via en Makefile."]

<!--
CRAP-index.
Relation till validering, statisk kodanalys
-->



Förutsättning {#pre}
--------------------------------------

Du bör ha en god grund i allmän programmering och i objektorienterade programeringstekniker.

<!--
Vill du jobba med enhetstestning i PHP så finns det instruktioner om hur du kan installera [PHPUnit](labbmiljo/phpunit) och [Xdebug](labbmiljo/xdebug).
-->


En översikt av testning {#oversikt}
--------------------------------------

Låt oss först prata om olika typer av testning. Testning, i vårt fall testning av mjukvara, handlar om att ge information om en mjukvaras kvalitet. När man testar en mjukvara så exekverar men den för att finna felaktigheter eller för att påvisa att den fungerar som tänkt.

När man testar en mjukvara vill vanligen göra något av följande.

* Kontrollera att mjukvaran följer de specificerade kraven.
* Fungerar korrekt oavsett vad som skickas som input.
* Är användbar och stabil med rimliga svarstider.
* Fungerar i en tänkt omgivning.
* Producerar önskvärda resultat.

Området "Software Testing" är ett kunskapsområde inom Programvaruteknik (Software Engineering som är definierat av [SWEBOK](https://en.wikipedia.org/wiki/Software_Engineering_Body_of_Knowledge). För den som vill fördjupa sig i området erbjuder [Wikipedia om Software Testing](https://en.wikipedia.org/wiki/Software_testing) en bra ingång.

Låt oss se på ett par av de vanliga förekommande typerna av testning och relaterade utvecklingsmetoder.



### Enhetstestning {#unit}

På engelska blir det _unit testing_ ([Wikipedia om Unit Testing](https://en.wikipedia.org/wiki/Unit_testing)) och det handlar om att testa varje enhet av kod för sig själv. Det är _white box testing_ ([Wikipedia om White box testing](https://en.wikipedia.org/wiki/White-box_testing)) eftersom vi har full insyn i koden vi testar. Vi kan se källkoden och vi kan se att våra testfall verkligen exekverar alla delar av koden, förutsatt att vi använder oss av verktyg för kodtäckning, code coverage ([Wikipedia om Code Coverage](https://en.wikipedia.org/wiki/Code_coverage)). 

Att se kodtäckningen är viktigt i enhetstesterna, annars gör vi det onödigt svårt för oss. Kodtäckning är också ett sätt att visa för utomstående hur mycket av kodbasen som är testad via enhetstester. Att nå 100% i kodtäckning är bra, men man nöjer sig ofta med 70%.

Hur mycket kodtäckning man kan få är också beroende av hur testbar koden är. Är koden inte skriven för att vara testbar så kan man ge sig på att det är svårt att skriva testfall i enhetstester och uppnå hög kodtäckning. Att skriva kod som är testbar kan kräva erfarna utvecklare och/eller utvecklingsmetoder som gör att man fokuserar på att få testbar kod.



### Testdriven utveckling {#tdd}

TDD är förkortningen av testdriven utveckling ([Wikipedia om Test-driven development](https://en.wikipedia.org/wiki/Test-driven_development)) som är en utvecklingsprocess som säger att man börjar skriva ett eller flera testfall och därefter skriver man koden för att lösa testfallen.

Vi kan förklara utvecklingsmodellen med följande steg.

1. Skriv ett testfall.
2. Exekvera testsuiten och se testfallet misslyckas.
3. Skriv koden.
4. Kör testerna (alla passerar).
5. Refactor, skriv om, organisera om, kodbasen efterhand som den växer.
6. Repetera.

I TDD pratar vi i termer om testfall och utvecklingen, koden vi skriver, drivs fram av de testfall vi lägger till och inte tvärtom. Det är alltså inte koden i sig som driver fram testfallen.

Som en bonus blir all vår kod (troligen) testbar, utvecklingsmetodiken i sig driver fram kod som är testbar.

TDD får oss att skriva koden som löser testfallen, möjligen får det oss att fokusera på det som är viktigt i koden och möjligen ökar fokusen på att hålla kodmodulerna små.



### Behaviour driven utveckling {#bdd}

BDD är en vidareutveckling av TDD och står för Beteende-driven utveckling ([Wikipedia om Behavior-driven development](https://en.wikipedia.org/wiki/Behavior-driven_development))
BDD. En intressant del i BDD är att man diskuterar systemet i features som skrivs ned i ett textdokument. Dessa features dokumenteras på ett sätt så att både programmerare och systemets slutanvändare och ledning kan förstå dem. Det blir ett material där verksamhetens olika roller kan diskutera hur systemet skall fungera. Man får ett egen språk att samtala om systemet.

Dessa features, berättelser om hur systemet skall fungera, kan sedan automatgenerera testfall som kan köras av programmeraren. Dessa kan sedan styra utvecklingen och koden som skrivs för att lösa feature för feature. Jämför med TDD där testfallen driver utvecklingen. Här är det features, och dess testfall, som driver utvecklingen.

Så här kan en feature vara skriven, exemplet är taget från [`mosbth/cimage`](https://github.com/mosbth/cimage/tree/resize/features).

```text
Feature: src
    Display an image by selecting its source.

    Scenario: Source is not a valid image name
        Given Set src "NO_IMAGE"
        When Get headers for image
        Then Returns status code "404"

    Scenario: Get only source image
        Given Set src "test_100x100.png"
        When Get image
        Then Returns status code "200"
        And Compares to image "test_100x100.png"
```

I fallet ovan används programvaran [Behat](http://behat.org/) för att parsa featuren och generera testbar kod och för att exekvera alla testfall. Den som jobbar med testsuiten behöver skriva en del kod för att hanteringen kring `Given`, `When`, `Then` och `And` skall fungera. Du kan se det som att termerna motsvaras av metoder som exekverar själva testfallen.

BDD kan vara en bra utvecklingmetodik som driven utvecklingen via testbar kod och erbjuder ett språk som både programmerare och icke-programmerare kan prata och därmed samtala om mjukvarans krav och features.



### Funktionstester {#functiontest}

Låt oss benämna funktionstester ([Wikipedia om Functional testing](https://en.wikipedia.org/wiki/Functional_testing)) som tester på en feature, en systemfunktion.

Ta ett exempel att "registrera en ny användare". Ett sådant test innebär att man utför de steg som krävs för att registrera en användare. Det kan vara genom att använda ett grafiskt användargränssnitt (GUI), eller genom ett CLI-interface (Commandline interface) eller via ett API i koden eller ett publikt API via REST.

Funktionstester är i allmänhet _black-box tester_ ([Wikipedia om Black-box testing](https://en.wikipedia.org/wiki/Black-box_testing)) där man inte nödvändigtvis behöver ha koll på den underliggande koden. Man vill testa en systemfunktion och man bryr sig inte om vilka underliggande moduler som används.

Det kan finnas ett gränsområde där enhetstester övergår i funktionstester, gränsen går troligen någonstans där man slutar mocka och istället använder systemets riktiga moduler för att utföra en systemfunktion, med eller utan ett gränssnitt (GUI/CLI/API).

I webbsammanhang behöver man ofta utföra funktionstester i formen av en webbläsare, man vill simulera en webbläsare för att utföra hela åtgärden "registrera en ny användare". I sådana fall finns det programvara som hjälper testaren att simulera knapptryck och analysera webbsidan som kommer tillbaka som svar. Programvaran benämns ofta _headless browser_ ([Wikipedia om Headless browser](https://en.wikipedia.org/wiki/Headless_browser)) och det kan vara ett viktigt verktyg i testning.

Det är alltmer vanligt att en webbtjänst både erbjuder ett (REST) API och ett traditionellt webb-GUI. Det kan göra webbtjänsten enklare att testa då ett (REST) API ger en tydlig bild av vad man kan göra med systemet. Ett traditionellt webb-GUI är inte nödvändigtvis lika tydligt om vad man kan göra och vilket resultat man får tillbaka vilket kan göra det svårare att testa, jämfört med ett REST API.



### Övriga tester {#ovriga}

Det finns många fler typer av tester som man kan vilja genomföra och kategorisera som egna typer av tester. Låt oss nämna några.

Integrationstester ([Wikipedia om Integration testing](https://en.wikipedia.org/wiki/Integration_testing)) fokuserar på att testa att flera moduler kan samverka på ett tänkt sätt. Man ser det som ett steg i en CI pipeline (Continuous integration) att alla moduler, eller en delmängd av dem, behöver integreras i något steg och då vill man verifiera med en testsuite att integrationen gick bra. Likt alla testfaser behöver man bestämma kriteria för vad som skall testas, hur det skall testas och vad som bestämmer att testerna går bra.

I systemtestfasen ([Wikipedia om System testing](https://en.wikipedia.org/wiki/System_testing)) utförs en serie av tester mot systemet som helhet. Alla moduler är på plats och systemet snurrar i en miljö som är relevant och motsvarar systemets verkliga driftsmiljö. Man kan utföra säkerhetstester, usabilitytester, konfigurationstester, prestandatester och stresstester eller tester av dokumentationen. Man tänker på systemet som helhet och testar de aspekter som är viktiga och relevanta på det sättet som hela systemet används och fungerar i drift. Systemtestet är en plats för att verifiera systemets icke-funktionella krav via icke-funktionella tester ([Wikipedia om Non-functional testing](https://en.wikipedia.org/wiki/Non-functional_testing)).

Ett annat test som kan vara av vikt är acceptanstester ([Wikipedia om Acceptance testing](https://en.wikipedia.org/wiki/Acceptance_testing)). Det är tester som utförs inför, tillsammans med, eller av kunden, när de tar emot leveransen. Där är ett viktigt dokument/fas som du och kunden gemensamt tagit fram som en del av beställningen och där testerna syftar till att verifiera att kunden verkligen fått leverans enligt beställning. Ur beställarens synpunkt kan acceptanstestet vara nästan lika viktigt som kravspecen då ett godkänt acceptanstest innebär att fakturan kan skickas och kunden har accepterat att systemet möter de kriteria som var viktigt.



Om enhetstestning {#om}
--------------------------------------

Låt oss prata mer om enhetstestning.



### Enhet och testobjekt {#enhet}

En enhet är här den minsta modulen av en mjukvara. När vi pratar om objektorienterad utveckling så är klassen den enheten vi främst tänker på. Men, rent generellt kan man se på begreppet _enhet_ lite mer flexibelt och det kan vara den enhet av mjukvaran som vi så väljer, det behöver inte nödvändigtvis vara en klass.

Låt oss kalla den testbara enheten för testobjektet, det är det objektet som är fokus för våra tester.



### Testfall och testsuite {testfall}

Ett testfall är ett specifikt test som utför ett visst testfall mot mjukvaran. Det kan till exempel vara att "skapa och initiera ett objekt med default argument". För att testa ett testobjekt behövs flera testfall som utför tester mot testobjektet, på alla tänkbara sätt som testobjektet kan användas, och icke tänkbara sätt.

En testsuite är en samling testfall som exekveras mot ett eller flera testobjekt. Vi kan ha en testsuite som riktar sig mot att testa en klass och vi kan ha en större testsuite som riktar sig mot att testa en samling av klasser, kanske en större modul som består av flera samverkande klasser.

Om man har en flexibel syn på vad som är vad så kan testobjektet vara en klass, eller en samling av klasser som formar en kodmodul av sammanhängande klasser.



### Testfall och assertion {#assert} 

Varje testfall i enhetstestet innebär att man anropar en eller flera metoder/funktioner i sitt testobjekt. Man sätter testobjektet i ett önskvärt läge via en eller en serie av metodanrop.

Efter gjorda anrop så verifierar man att ett förväntat utfall är uppfyllt. Man har alltså vissa förväntningar på vad som skall hända när koden körs och det skall man verifiera efter att koden körts. Vi kallar detta _assertions_ ([Wikipedia om Assertion](https://en.wikipedia.org/wiki/Assertion_(software_development))) som är villkor som skall vara uppfyllda.

> _"If there is no assertion, then there is no test."_

Varje testfall bör alltså följas av en eller flera assertions som påvisar att förväntningarna är uppfyllda.



### Testbar kod {#testbar}

När man tänker på test och utveckling av kod i samklang så tenderar man att skriva kod som också är testbar och enkel att testa. Det blir till en erfarenhet som sitter i ryggraden om att koden jag skriver måste gå att testa i enhetstester. Man tänkar att skriva sin kod som testbar med ett tydligt publikt API och resten skyddat och inkapslat.

Det kan vara en klar skillnad mellan att skriva helt ny kod som man vill skall vara testbar, jämfört med att införa enhetstester för existerande kod. Man kan inte räkna med att den existerande koden är testbar ur alla aspekter. Som utvecklare måste man tänka på att skriva kod som är testbar, om man vill uppnå det. All kod som skrivs är inte testbar eller enkel att testa.



### Isolerade testfall {#isolerade}

Varje testfall skall kunna köras isolerat från alla andra testfall. Man behöver alltså tänka på att varje test man skriver skall kunna köras oberoende av de andra testerna och oberoende av testernas inbördes ordning. Det brukar finnas stöd för att sätta upp en miljö för varje testfall och/eller suite av testfall. 

En bonus, när man lyckas med detta, är att alla tester kan köras parallellt. Det är en fördel när alla tester börjar ta längre tid, att köra tester parallellt snabbar upp och effektiviserar utvecklingsitden.

> _"If the tests can not run independently, then they are not unit tests."_



### Test runner {#runner}

Den som exekverar testuiten med alla testfall kallas ibland för test runner. Det är upp till test runnern om den har möjligheten att exekvera testfallen parallellt.



### Att jobba via CLI {#cli}

När man börjar fokusera på enhetstester så händer det att man delvis skiftar fokus på hur man ser på sin utveckling. Tänk en nybörjar webbutvecklare som skriver sin kod och laddar om sidan för att se om det fungerar. Om det inte fungerar så debuggar hen eventuellt sidan, kanske med utskrifter.

När samma utvecklare går över till att fokusera på enhetstester tillsammans med koden, så skiftar delvis fokus till att utveckla mjukvaran och debugga den via testmjukvaran och CLI, istället för att vara fokuserad på utveckling via webbläsaren. Det kan vara ett viktigt skifte i en utvecklares utveckling, att se andra möjligheter för att driva sin utveckling och debugging framåt.

> _"Se möjligheterna med att driva din utveckling från testfall och CLI-fokuserad programmering."_



### Mock objekt {#mock}

När en modul är beroende av andra för att fungera så växer komplexiteten av ens enhetstest. Mockning är ett sätt att undvika att en större mängd klasser måste fungera för att testa en ny enhet. När man _mockar ett objekt_ så kodar man en skal-klass, en klass utan implementation, eller med en implementation som enbart finns till för att kunna göra enhetstester utan att integrera med den externa klassen.

När man börjar få allt för många mock objekt så blir det alltmer komplex testsituation. Ibland är det så det är. Ibland vill man försöka undvika det läget och hålla testerna enkla och få beroendena. Ibland är det en avvägning och en prioritering om hur man väljer att göra, hur man väljer att se på saken.
 
Du kan läsa mer på ([Wikipedia om Mock objekt](https://en.wikipedia.org/wiki/Mock_object)). Mockning kan även kallas _stubs_ och [_test doubles_](https://en.wikipedia.org/wiki/Test_double).



### Refaktoring {#refact}

Ibland är koden inte testbar. Då finns möjligheten att skriva om koden, att göra refaktoring på koden för att få mer testbar kod. Att utföra refaktoring innebär en investeringskostnad som kan löna sig i längden, men här måste man fundera på om det är värt arbetet på kort sikt. Alltid dessa saker som man måste väga på guldvåg, sammanhanget bestämmer vilken väg som är mest rätt att gå.



### Positiva och negativa tester {#posneg}

Det finns positiva tester som syftar att påvisa att mjukvaran fungerar som tänkt och utför de funktioner som man förväntar sig.

De negativa testerna syftar till att framkalla felfall där mjukvaran till exempel får felaktig indata men förväntas att hantera det på ett korrekt sätt, kanske kastas ett exception eller programmet avslutas med en viss felkod.

Man bör skriva enhetstester som utför både positiva och negativa tester.



### Vad testar vi inte med enhetstester? {#testasej}

Ett webbsystem består av mer kod än bara källkod som är organiserad i klasser och funktioner. Det kan finnas front- och pagekotrollers, template-filer för vyer, konfigurationsfiler och andra delar som är svårtestade med enhetstester. Här får man överlämna ansvaret till andra typer av test. Till exempel funktionstester eller integrationstester.



Regressionstester {#regression}
--------------------------------------

Regressionstester är tester som verifierar att en mjukvara fortfarande fungerar, även efter att någon programmerare varit inne och ändrat kod, lagat en bugg och eller lagt till en ny feature.

När man har en större kodbas är det en stor trygghet och säkerhet att ha en stor testsuite för regressionstester. 

Enhetstesterna är en viktig del i regressionstester.

Det är också viktigt att varje ny del av kod som tillkommer även har testfall som sin följeslagare.

Läs mer på [Wikipedia om Regressionstester](https://en.wikipedia.org/wiki/Regression_testing).



Automatiserade tester {#automat}
--------------------------------------

När man automatiserar sin testsuite så kan den köras som en kvalitetskontroll så fort någon kodbit ändrats eller när förutsättningarna och miljön för mjukvaran förändrats.

Ett sätt att förenkla för automatiserade tester är att skapa skript eller byggsystem likt `make test` som gör det enkelt för programmeraren att utföra testsuiten.

Se mer på [Wikipedia om automatisering av tester](https://en.wikipedia.org/wiki/Test_automation).



CI-flöde {#ci}
--------------------------------------

CI betyder Continous integration och kan även vara continous delivery. Det handlar om att hela tiden integrera och leverera mjukvaran man jobbar med. En förutsättning för att det skall fungera är att automatiserade tester finns.

Normalt integrerar man ett CI-flöde i sitt versionssystem och när man checkar in ny kod så exekveras  de automatiska testerna och om de passeras så kan man gå vidare med att integrera mjukvaran och utföra en leverans av den.

Tanken är att allt sker i bakgrunden och per automatik. Det handlar om att skapa en kedja av händelser som både kvalitetssäkrar och utför leveransen av mjukvaran.

Men, grunden är att man har en gedigen testsuite, och där börjar vi med enhetstesterna.



Avslutningsvis {#avslutning}
--------------------------------------

Detta var en översikt och introduktion till testning av mjukvara och fokus var att visa den roll som enhetstestning har i det större sammanhanget.

Om du har frågor eller tips så finns det en särskild [tråd i forumet](t/7387) om denna artikeln.
