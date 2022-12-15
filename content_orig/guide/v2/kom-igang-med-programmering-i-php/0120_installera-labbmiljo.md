---
author: mos
revision:
    "2020-08-06": "(C, mos) Ny struktur, uppdelad i fler dokument."
    "2018-08-20": "(B, mos) Rätt länk till forumet."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Installera en labbmiljö
==================================

För att jobba med guiden så underlättar det om du har installerat en labbmiljö på din lokala dator.

<!--more-->



Labbmiljöns delar {#labbmiljo}
-----------------------------------

PHP fungerar på olika **operativsystem** så välj det operativsystem som du vill jobba i. När man driftar en PHP-baserad webblösning så är det ofta på Linux-maskiner. Men när du utvecklar så går det bra att sitta på vilket operativsystem som helst.

Du behöver en **texteditor** där du kan skriva din kod. Vissa använder en enklare texteditor och andra använder ett mer komplett IDE (Integrated Development Environment), pröva dig fram och se vilket som passar dig bäst.

Du behöver **webbläsare**, ju fler desto bättre. Anledningen är att du vill testa din webbplats i olika webbläsare för att se att det fungerar. Det finns standarder som de flesta webbläsare följer, men stödet kan skilja mellan webbläsare och ibland lägger en webbläsare till egna konstruktioner.

Det är bra om du har en **terminal** där du kan jobba och installera program. Som utvecklare kommer du förr eller senare i kontakt med en terminal och det är bra att lära sig hantera den, det kan vara ett kraftfullt verktyg.

Ett populärt versionshanteringssystem för programmerare är **Git**. Det hjälper dig hantera olika versioner av din kod och du kan dela din kod med andra utvecklare eller inom ditt utvecklingsteam.

Avslutningsvis så har vi då PHP. PHP kan fungera enskilt och man kan då köra det via terminalen eller via dess inbyggda webbserver. Vi föreslår dock att du istället använder **webbservern Apache, PHP** (och databasen MySQL/MariaDB). Ett sätt att installera allt det är via programpaketet XAMPP.

Här kan du få hjälp att installera din labbmiljö och mer information om respektive del.

* [Operativsystem](labbmiljo/operativsystem)
* [Texteditor](labbmiljo/texteditor)
* [Webbläsare](labbmiljo/webblasare)
* [Terminal](labbmiljo/terminal)
* [Git](labbmiljo/git)
* [Webbserver, PHP och databaser](labbmiljo/webbserver)



Labbmiljö extra {#extra}
-----------------------------------

Här följer extra saker som är bra att ha som programmerare, men inte direkt nödvändiga för att jobba i guiden.

För att köra PHP i terminalen så behöver du lägga till dess sökväg i din path. Detta är bra att använda vi felsökning, pröva små korta konstruktioner och när man kör enhetstester.

* [Lägg PHP i din path](labbmiljo/php-i-pathen)
