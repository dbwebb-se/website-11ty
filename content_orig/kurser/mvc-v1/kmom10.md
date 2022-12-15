---
author:
    - mos
revision:
    "2021-05-11": "(A, mos) Första utgåvan."
...
Kmom07/10: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Alla delar i detta kursmoment skall utföras individuellt och självständigt.

Upplägget är enligt följande:

* Projekt/applikation (obligatoriskt med optionella krav)
* Redovisning (obligatoriskt)
* Fristående Rapport (optionell)
* Quiz (optionell)
* Videopresentation (optionell)


Totalt omfattar kursmoment 07/10 i storleksordningen 20--50 studietimmar.

<!--more-->


<!--
(Skippa krav om flowchart & pseudocode)

För svår och komplex att rätta. Förenkla och förtydliga.
Förenkla, förenkla, förenkla.

Alla kan göra quizzen, den behöver inte vara optionell.
Sätt som fristående assignment i Canvas och bedöm bara som G.

Alla gör en fristående rapport som leder till G? Eller ladda upp rapporten separat och gör en bedömning G/VG på rapporten enbart? Med feedback om hur man skriver en rapport bättre? Eller låt rapporten mer vara en del av 01-06 och en bra sådan ger bonus till slutbetyget?
Rapporten borde ha en annan template? Kanske mer som en artikel och skippa kapitelindelningen? Fundera på det. Kan vara lättare att ge feedback på att strukturen följs.
Kanske en rapport mer artikel-lik för redovisningstexten. Sen kan man ha en separat rapport för extra.
Eller en artikel-typ för varje kmom, istället för kapitel-grejen? Nja, troligen inte men bra att fundera på.

Extrarapporten kan fokusera även på Symfony/Laravel och dess features.

Extrarapporten kan ha högre höjd och kräva referenser. Hmm, men såna saker kanske alla borde lära sig...

Redovisningstexten kanske kan vara i kursrapporten och extrarapporten i ett eget dokument?

Ett upplägg på projektet som leder till E-C alt E-D.
Ett upplägg på projektet som leder till C-A eller BA.
Projektet kan rättas av tas?

Friheten kontra Uppstyrdhet i kraven. Kanske ToDo ger en nivå. En blog ger en annan nivå. Helt fritt ger ytterligare en nivå. Vissa gillar tydlighet och andra gillar frihet och kreativitet.

Eventuellt ett skarpt projekt, samma för alla?
Eller ett tydligt projekt som majoriteten gör och ett som är mer valbart?
Ett projekt som har kopplingar till näringslivet eller forskning?

Kanske borde kmom ORM göra en CRUD eller inloggning. Kanske oauth trots allt?

Kanske projekt som blog med inloggning och admin kontra besökare.

Om inloggning, använd doe:doe som default användare.

Lägg in class diagram i inledningen.

Fixa phpdoc generering så vi kan fokusera delvis på dokumentationen.

Fixa phpmetrics så man kan reflektera över kodkvalitet på ett bättre sätt.

Adventurespel som projekt kan tillåta fokus på Ux.

Videon vad ska den ta upp, enbart projektet? Eller infoga även de saker man skrev i rapporten (tips från coachen, egen analys)?

Lös nedladdningstiden.

Ge poäng för den statiska valideringen för att uppmuntra att den biten blir rätt (dbwebb test kmom10).

Jobba i grupp?

Projekt:

* ToDo
* Blog
    * Wordpress
    * Travelblogg
    * Hemnet
    * Blocket
    * Fotoblogg
* CMS
* Cards
* Cards in 5x5 (Poker square)
* Dice 5x5 (Dice square) (inkl highscore och histogram)

* Yatzy var väldigt svårt att få ett bra gränssnitt.

Spel fram till kmom04, sen login & db i valfritt ramverk?
    * Proj mer spel, eller adventure eller blog/ToDo (inkl inlogg)

Gör tydligt att repot skall se bra ut, så det kan användas för att länka till.

Repot kan använda GitHub/GitLab Pages visa upp sin dokumentation och kodtäckning samt metrics.

Mer tydligt vad histogram och stats skall innehålla. Kanske även visa hur man kan göra mer grafiskt representativt. Dels med enkla medel och dels med Google diagrams (eller annan tredjepartare).

Inloggning på Game kan erbjuda möjlighet att reinitiera databasen eller andra admin-saker.


-->



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

Läs först igenom [grunderna för bedömning och betygsättning](kurser/faq/bedomning-och-betygsattning-projekt-quiz-rapport-video). Dokumentet berättar för dig hur kraven mappas mot betygsnivåerna.



Krav 1: Projekt/Applikation {#proj}
--------------------------------------------------------------------

Kraven är indelade i ett antal grundkrav samt en del med optionella krav.

Se till att du är uppdaterad innan du påbörjar projektet.

```
dbwebb update
```



### Struktur {#struktur}

* Välj ramverk från de som vi tidigare pratat om i kursen.
* Välj ORM från de som vi tidigare pratat om i kursen.
* Placera koden i `me/proj`.
* Initiera som nytt repo och publicera på GitHub eller GitLab.
* Tagga som v7.0.0 eller högre (men lägre än v8.0.0).
* Applikationen skall fungera på studentservern.
* En lokal utvecklingsmiljö skall finnas på plats med validatorer och enhetstester.
* Integrera mot Travis och Scutinizer med badges i din README.
* Inkludera minst ett flödesschema och ett dokument för pseudokod och placera i katalogen `doc/design` (omfattningen på dokumenten är valfri).
* Se till att `dbwebb test kmom10` passerar grönt. Här kan fler detaljkrav uppenbara sig.



### Projekt/Applikation {#applikation}

Kraven på själva applikationen du bygger är fria och det är upp till din egen bedömning om vad som är rimligt och ej. Tolka kraven och tolka de bedömningskriterier som finns.

* Färdigställ ditt Yatzy alternativt ditt 21-spel inklusive vadslagning.
* Förbättra din highscorelista med fler features.
* Gör en visuell statistik på histogram, tärningar och/eller resultat (sparas i databas)
* Applikationen skall var lätt att använda.
* Webbplatsen skall vara snygg och tilltalande, lägg kraft på stil och utseende.
* Webbplatsen skall ha en tilltalande header, navbar och footer.
* Förklara din applikation projekt i en README.md, dels vad applikationen handlar om, som en liten manual. Dels hur man kan installera den utifrån dess GitHub/GitLab repo. Gör din README snygg och lägg till en representativ bild.



### Optionellt {#projopt}

Gör ett "svårare" och lite mer utmanande projekt med tanke på implementation och arbetsinsats.

Till exempel kan du göra något av följande.

* Gör en applikation som kräver att du jobbar mer med klasser (skapa fler klasser) och objektorienterade konstruktioner som arv, "använder", interface, trait.
* Använd en mer avancerad databasmodell med flera tabeller.
* Börja på nytt och välj ett annat ramverk och ORM.
* Fokusera på kodkvalitet, enhetstester och kodtäckning.
* Gör en ny applikation, tex något av följande:
    * Ett klassiskt äventyrsspel där man går från rum till rum och löser gåtor.
    * En enkel blogg eller en todo applikation.
    * Ett nytt spel, tex ett kortspel eller ett nytt tärningsspel (behåll dina gamla spel eller ta bort dem).

Det är fritt val och du behöver i slutändan argumentera i din redovisning vad det är som gör att ditt projekt kvalificerar sig som "svårare".

Tänk till så att du inte väljer ett alltför stort och komplext projekt som tar allt för mycket tid. Välj ett projekt som du kan slutföra grundkraven på inom 15-30h.



Krav 2: Redovisningstext {#redovisa}
--------------------------------------------------------------------

Kravet är obligatoriskt.

1. I din kursrapport, skapa ett nytt kapitel för "Projekt" och besvara följande frågeställningar.

    1. Beskriv arbetet med ditt projekt/applikation i ett textstycke om ca 7-20 meningar där du beskriver vad du gjort, vilka val du gjorde, hur du tänkte inledningsvis och hur du betraktar ditt resultat. Nämn gärna problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, med mera. Fundera över tidsaspekten, tog projektet mer eller midre tid än vad du först trodde?

    1. Om du valde att göra ett "svårare" projekt, beskriv ett textstycke om ca 7-20 meningar vad som gör just ditt projekt till "svårare".

    1. Avsluta med ett stycke med dina tankar om kursen och dess innehåll, genomförande, upplägg och material (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

Om du väljer att skriva en fristående rapport så lägger du ovan text i den rapporten istället.



Krav 3: Fristående Rapport {#rapport}
--------------------------------------------------------------------

Kravet är optionellt i sin helhet. Om man väljer att utföra kravet finns det obligatoriska och optionella delkrav.



### Obligatoriskt {#rapportobl}

* Gör en helt ny rapport utifrån samma mall du använt för kursen. Dokumentet innehåller nu enbart saker relaterat till ditt projekt.

* Redovisningstext enligt Krav 2 ovan skall finnas som ett eget inledande kapitel döpt till "Projekt".

* Skriv ett nytt kapitel "Tips från coachen" om ca 1-2 sidor där du kort riktar dig till nybörjare på ramverk och du ger dina egna råd om vad som är viktigt att tänka på när man tar sig an ramverk och ORM. Du kan till exempel rikta dig till "ditt gamla jag som du var i kmom01" och ge dig själv tips och råd som hade varit viktiga för att nå dit du är nu.



### Optionellt {#rapportopt}

* Skriv ett nytt kapitel "Analys av [valfritt]" om ca 1-2 sidor där du gör en analys av ditt projekt/applikation ur någon aspekt som du själv väljer. Det kan röra objektorienterad kodstruktur, kodkvalitet, enhetstester med kodtäckning, testbar kod, ramverk/ORM, reflektioner kring manualer och dokumentation eller något annat som känns intressant och relevant för dig inom området som projektet och kursen omfattar.

* Lägg till referenser och använd dem i texten. lista alla referenser som ett eget appendix längst bak i rapporten.



Krav 4: Quiz {#quiz}
--------------------------------------------------------------------

Kravet är optionellt.

Lös och få godkänt på en Quiz (på Canvas) med teori och bakgrundsfrågor. Quizen är tidsbegränsad, automaträttande och du har oändligt med försök att nå godkänt. Frågor slumpas fram vid varje nytt försök.



Krav 5: Inspelad video presentation {#video}
--------------------------------------------------------------------

Kravet är optionellt och kan endast utföras om samtliga krav ovan är utförda.

Baserat på informationen i din rapport, gör en "professionell" presentation med slides och spela in den. Din cam skall synas i bilden tillsammans med dina slides.

Försök göra en så "professionell" presentation du kan. Tänk på inledning,  avslutning och "energinivå".

Håll tiden och försök göra presentationen till "exakt 5 minuter". Ett "proffs" kan alltid avsluta en presentation när tiden är slut.

Det är fritt fram att klippa och redigera din video i efterhand liksom att lägga till intro och outro.



Lämna in {#lamnain}
--------------------------------------------------------------------

1. Lämna in ditt resultat på Canvas med länk till ditt studentrepo, bifoga rapporter som PDF. Länka till optionell redovisningsvideo.

2\. Se till att ditt repo är taggar och klart samt pushat till GitHub/GitLab.

3\. Se till att du testar att din inlämning motsvarar grundkraven för `me/proj`.

```text
dbwebb update
dbwebb test kmom10
```

4\. Ladda upp och publicera på studentservern.

```text
dbwebb publishpure proj
```
