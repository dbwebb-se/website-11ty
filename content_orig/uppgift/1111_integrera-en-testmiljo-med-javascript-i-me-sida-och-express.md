---
author:
    - mos
    - efo
category:
    - javascript
    - test
    - kurs ramverk2
revision:
    "2019-01-24": (C, efo) Ändrade från make till npm.
    "2017-11-13": (B, mos) Förtydliga om 0 testfall.
    "2017-11-03": (A, mos) Första utgåvan.
...
Integrera en testmiljö med JavaScript i me-sida och Express
==================================

Du skall bygga upp en testmiljö för ditt JavaScript-projekt. Det handlar om vilka verktyg du använder för enhetstestning, kodtäckning och en kedja av Continuous Integration samt hur du kan använda Docker vid tester.

Du skall integrera och testköra din testmiljö och CI-kedja mot ditt redovisa-repo.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har kunskaper motsvarande artikeln "[Kom igång med en testmiljö i JavaScript](kunskap/kom-igang-med-en-testmiljo-i-javascript)".



Introduktion {#intro}
-----------------------

Du skall skapa grunden för enhetstester och kodtäckning samt integrera dessa i ditt projekt, din redovisa-sida.

Du skall använda dessa grunder för att bygga en CI-kedja med externa tjänster som bygger din kod och visar kodtäckning samt kodkvalitet.

Du skall lägga till Docker images för test. Du skall kunna exekvera enhetstester i flera kontainrarna som kör olika versioner av din mälmiljö.

Det är möjligt att du inte har testfall för enhetstester i ditt redovisa-repo. Det må så vara. Just nu använder vi mest redovisa-repot som ett exempel där infrastrukturen för test och CI kan fungera. Även om det blir 0 testfall så går det fortfarande att integrera hela flödet i din redovisa-sida. Men försök lägga till något testfall, bara för att testa.

Kanske kan man också reflektera över vad som är testbart utifrån en redovisa-sida. Borde det gå att testa något? På vilket sätt? Eller kanske är det inte relevant i detta läget?

Även utan testfall kan vi dock integrera ett CI-flöde och det är vårt fokus.



Krav {#krav}
-----------------------

1. Allt som behövs i ditt repo skall installeras vid `npm install`.

1. Välj och integrera ett verktyg för enhetstester. Verktyget skall exekvera enhetstester vid `npm test` (även om det är 0 testfall).

1. Lägg till så att kodtäckning fungerar vid enhetstester.

1. Docker skall fungera tillsammans med dina tester. Använd egna Dockerfiler som skapar dina anpassade images. Skapa minst tre images för olika versioner av din målmiljö. Starta testerna via `docker-compose run` och genom `npm` mot dina tre images via `npm run test1`, `npm run test2` och `npm run test3`. Dessa tester körs inte i din CI kedja.

1. Bygg en CI-kedja och integrera med en byggtjänst likt Travis eller CircleCI som checkar ut ditt repo och utför `npm install test`. Badga din README.

1. Bygg vidare på din CI-kedja och integrera med minst en tjänst för kodkvalitet och kodtäckning. Du kan välja att integrera mot flera tjänster och/eller en tjänst som löser kodtäckning och en tjänst som löser kodkvalitet. Badga din README.

1. Committa och tagga ditt redovisa-repo med taggen 3.0.0 eller senare, ladda upp till GitHub och till studentservern.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
