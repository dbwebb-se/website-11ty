---
author:
    - mos
revision:
    "2017-12-21": "(B, mos) Kommentar om alternativ för krav 5."
    "2017-12-11": "(A, mos) Första utgåvan."
...
Kmom07/10: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.

<!--
Krav på implementationen, inte bara dokumentation.
Svårrättat.
-->



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Du jobbar som teknisk arkitekt och teamledare och du skall nu visa vägen för ditt team till nya tekniker som ni kan komma att använda i ert nästa högprofil projekt som är kritiskt för ert företags överlevnad.

Du har valt att bygga ihop en väl fungerande applikation som påvisar alla de tekniker du tror på.

När du är klar så är tanken att du presenterar projektet och teknikerna för dina medlemmar i teamet och din applikation fungerar som utvärderings- och utbildningsmaterial för ditt team.

Tänk på att ditt team är kritiska mot nya tekniker, du behöver göra ett gott jobb för att imponera på dem. Annars är risken att de sågar dina nya idéer.



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas info i specen så kan du själv välja väg, dokumentera dina val i redovisningstexten.

De tre första kraven är obligatoriska och måste lösas för att få godkänt på uppgiften. De tre sista kraven är optionella krav. Lös optionella kraven för att samla poäng och nå högre betyg.

För allra högsta betyg krävs en allmänt god applikation. Den skall vara snygg, tilltalande, lättanvänd, väl dokumenterad och felfri.

Varje krav ger max 10 poäng, totalt är det 60 poäng.



### Krav 1, 2, 3: Grunden {#k1}



#### Repon på GitHub {#r1}
  
Skapa ett/flera repon för projektet, eller återanvänd det du redan gjort i kursen, spara resultatet i `me/kmom10`.

När du är klar, committa, tagga, pusha till GitHub samt gör `dbwebb upload` till studentservern.



#### Applikationen och teknikval {#r2}

Du bygger en väl fungerande och komplett klient/server-applikation med JavaScript och de ramverk du väljer att använda. Utgångsläget är att använda de tekniker som presenterats i kursen, eller de tekniker som du själv valt utifrån kursens fokus och diskussioner i forumet.

I din README skriver du ett stycke om din kravbild för applikationen. Det skall vara tydligt för läsaren vilka krav/features du inkluderar och vilka du medvetet exkluderar. Du skriver vilka bastekniker och ramverk du valt att använda tillsammans med korta argument om dina val samt en kort utvärdering av hur väl du anser dina val har fungerat i sammanhanget.



#### Installation {#r7}

I din README beskriver du kort hur man installerar och startar upp din applikation. Du satsar på att allt går att installera med `npm install` och starta lokalt med `npm start` (eventuellt `npm stop`).

Du visar hur man startar igång servern i en (samling av) Docker-kontainers via `npm run start-docker` och de kan stoppas med `npm run stop-docker`.

Normalt fungerar en installation utan övriga inställningar. Men, dokumentera de möjligheter som eventuellt finns i form av `DBWEBB_PORT`, `DBWEBB_DSN` och liknande.

Var tydlig och kortfattad i din README om hur installationsfasen ser ut.



#### Testning {#r3}

Du har god kodtäckning i enhetstesterna, sträva efter 70% där det är rimligt, men se det som en riktlinje och inte ett hårt krav.

I din README skriver du ett stycke om vilka verktyg du använt för din testsuite och om det är delar av applikationen som inte täcks av tester. Du reflekterar kort över hur dina teknikval fungerat för dig. Du reflekterar också över hur lätt/svårt det är att få kodtäckning på din applikation.

Man kan köra hela din testsuite lokalt via `npm test`.

I README visar du hur man kan se kodtäckningen lokalt i webbläsaren.

Du kan köra testerna i tre olika versioner av Node via Docker och du kör dessa tester via `npm run test-docker`, `npm run test-docker1` samt `npm run test-docker2`. 



#### Kedja för Continuous integration {#r4}

Dina repon har en CI-kedja och automatiserade tester med tillhörande badges för byggtjänst, kodtäckning och tjänst för kodkvalitet.

I din README skriver du ett stycke om CI-kedjan, vilka tjänster du valt och varför samt eventuella begränsningar i hur CI-kedjan kan hantera din applikation. Du gör en kort reflektion över din syn på den hjälpen liknande verktyg ger dig.

Berätta om du är nöjd eller inte med de betyg som tjänsten för kodkvalitet ger dig.



#### Realtid {#r5}

I din README beskriver du i ett eget stycke om hur realtidsaspekten fungerar i din applikation. Du skriver också om vilken teknik/verktyg du valt för din implementation samt en kort reflektion av hur du tycker tekniken fungerar.



#### Databas {#r6}

Du har valt en icke-SQL baserad databas i din applikation. I din README beskriver du vilken du valde och du reflekterar över hur databasen har fungerat i sammanhanget.

Du gör även en kortare utvikning om hur du tror att traditionella relationsdatabaser hör hemma i dina framtida projekt.



#### Egen modul på npm {#r8}

Du har gjort en (eller flera) egna moduler som du använder i ditt projekt. Du skriver ett eget stycke i din README om dessa moduler och hur du ser på NPM som paketverktyg. Glöm inte att länka till modulernas sida på npm.



###Krav 4: README (optionell) {#k4}

Din dokumentation och reflektion i README är bättre än bra, välskriven och tydlig. Ditt utvecklingsteam har sällan sett en så välskriven README.



###Krav 5: Docker (optionell) {#k5}

Du har skapat en egen image som du publicerat på Docker store och återanvänder i projektet. Länka till din image på Docker store. Basen för din image finns i ett GitHub repo som du länkar till.

Du skriver ett eget stycke om detta i din README och reflekterar över för- och nackdelar i att jobba med Docker.

Det finns variationer i hur du kan uppfylla detta kravet. Se föreläsningen som innehåll en intro till projejektet då detta kravet diskuterades.



###Krav 6: Teknik, arbetssätt, verkyg, ramverk (optionell) {#k6}

Du väljer en eller ett par av de teknikerna/arbetssätten/verktygen/ramverken du använt i ditt projekt och tar på dig rollen som evangelist och försöker aktivt sälja in och argumentera för teknikerna genom att skriva ihop en "A4" i form av ett foruminlägg (eller motsvarande).

Du behöver inte nödvändigtvis vara säljande, du kan vara utbildande och/eller förhålla dig mer nyanserat till teknikerna men samtidigt förklara dess för- och nackdelar i ett sammanhang. Ett balanserat inlägg ger troligen bättre effekt i ditt arbetsteam. Utvecklare kan delvis vara skeptiska om du upplevs alltför insäljande.

Följande är ett exempel på en artikel som kan ge 10p.

* "[GraphQL istället för REST API](t/7082)"

I din README gör du ett eget stycke om din artikel där du kort länkar till artikeln och berättar på en rad om artikelns syfte.



Redovisning {#redovisning}
--------------------------------------------------------------------

1. På din [redovisningssida](./../redovisa), skriv följande:

    1. Länka till ditt GitHub repo och berätta om/vilka optionella krav du gjort. Berätta också om du byggde vidare på applikationen från kursmomenten eller om du gjorde nya vägval rörande tekniker och applikation inför projektet.

    1. Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

    1. Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida med projektet. 

3. Ta en kopia av texten från din redovisningssida och gör ett inlägg i [kursforumet](forum/utbildning/ramverk2) och berätta att du är klar.
