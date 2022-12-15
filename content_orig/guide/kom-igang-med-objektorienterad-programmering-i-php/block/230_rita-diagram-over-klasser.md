---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Rita diagram över klasser
==================================

Vårt exempel växer, än så länge är det bara två klasser och ett fåtal metoder, men det växer. I sista övningen så märkte du hur jag valde att hantera histogrammet och hur jag lät det veta hur många sidor tärningen har. Exakt hur man löser en sak kan man fundera på, det finns många alternativ. När man blir mer varm i kläderna så vet man vilka strukturer som är att föredra, men när man är nybörjare så är det viktigare att lösa problemet. När man väl löst problemet så kan man ta ett steg tillbaka och studera lösningen och kritiskt granska den, blev det tillräckligt bra?



###Klassdiagram med UML {#ritauml}

Ett sätt som kan hjälpa dig att få en översikt över dina klasser, är att rita ett diagram över dem. I objektorienterad modellering används ofta Unified Modelling Language (UML) [^11] som en syntax när man ritar diagram. Det finns många typer av diagram i UML. Ett av de vanligare är klassdiagrammet [^12] som visar klasserna med sina medlemsvariabler och metoder samt hur de olika klasserna hänger ihop.

Så här kan ett klassdiagram se ut för vårt exempelprogram, så här långt.

[FIGURE src=image/snapvt17/oophp20-uml-classdiagram.png caption="Ett klassdiagram i UML för Dice och Histogram."]

De båda klasserna är fristående så de har inget sepciellt som förbinder dem. Man kan lägga in klassernas medlemmar i diagrammet men jag nöjer mig med att rita lådorna för att få en översikt över klasserna.

Ett klass-diagram är ett statiskt diagram som visar strukturen över koden.



###Sekvensdiagram {#sekvensdia}

Det finns diagram som visar dynamiken i systemet när det arbetar, ett sådant diagram, sekevensdiagrammet[^13], visar hur ett anrop går genom systemet och vilka delar av systemet som berörs.

Så här kan man definiera flödet i programmet, som är grunden till ett sekvensdiagram.

Följande är flödet i testprogrammet från övning 4.

```text
title A Dice Sequence Diagram

note left of dice.php:      ?roll=12&faces=12
dice.php->config.php:       include
dice.php->autoloader.php:   include
dice.php->Dice:             new Dice($faces)
dice.php->Histogram:        new Cistogram()
dice.php->Dice:             roll($times)
dice.php->Dice:             $rolls=getRollsAsArray()
dice.php->Histogram:        setSerie($rolls)
dice.php->Histogram:        getHistogramIncludeEmpty()
dice.php->Dice:             getTotal()
dice.php->Dice:             getAverage()
note left of dice.php:      now render the page
```

Sedan kan vi använda webbtjänsten [Web sequence diagrams](https://www.websequencediagrams.com/) för att rita upp diagrammet. Så här kan den resulterande bilden se ut när sekvensdiagrammer ritas ut.

[FIGURE src=image/snapvt17/oophp20-sequence-diagram.png?w=w2 caption="Ett sekvensdiagram över övning 4, visar ordningen av flödet mellan komponenterna."]

Klassdiagram och sekvensdiagram är två enkla men kraftfulla verktyg för att få en översyn av vad som händer i ens system.

Kom i håg att skissa enkla diagram på ett papper, för din egen skull, så fort du behöver en överblick över vad som händer.
