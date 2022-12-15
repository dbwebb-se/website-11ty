---
author: mos
category:
    - kurs oophp
    - anax
revision:
    "2018-09-10": "(B, mos) Lade till extrauppgift om refaktoring till klasser."
    "2018-03-26": "(A, mos) Första utgåvan."
...
Flytta spelet Gissa mitt nummer till me-sidan
===================================

Du har din me-sida med Anax, i strukturen av ett ramverk. Du har skapat ett fristående spel "Gissa mitt nummer" i olika varianter. Du skall nu integrera ditt fristående spel in i din me-sida, in i ramverkets struktur.

För att lyckas med det behöver du ha koll på begreppet router och vyer. Du behöver också se var du skall lägga koden i ramverkets struktur.


<!--more-->

Så här kan det se ut när du är klar.

[FIGURE src=image/snapvt18/gissa-oversikt.png?w=w3 caption="Spelet Gissa mitt nummer är nu inkluderat i me-sidan."]

[FIGURE src=image/snapvt18/gissa-get.png?w=w3 caption="Så här kan du spela GET-versionen inuti din me-sida."]



Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften "[Bygg en me-sida för oophp med Anax](uppgift/bygg-en-me-sida-for-oophp-med-anax)" och är därmed bekant med den övergripande katalogstrukturen för din me-sida.

Du har löst uppgiften "[Gissa numret med PHP och GET, POST och SESSION](uppgift/gissa-numret)" och du har implementerat spelet.



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för att utföra uppgiften.

Du kan se hur jag jobbar igenom stegen i videoserien "[Flytta spelet Gissa mitt nummer till me-sidan](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-53mPL5PV6Z5IIdoh7RfLM)".

[YOUTUBE src="bvTha71apPo" list="PLKtP9l5q3ce-53mPL5PV6Z5IIdoh7RfLM" width=700 caption="Videoserie som ger dig en stegvis genomgång till hur du kan flytta spelet in i me-sidan."]



### Börja med en kopia {#kopiera}

För att göra det enkelt att stegvis inkludera spelet så kan du börja med att göra en kopia och kpoiera in hela spelet in i htdocs-mappen för me-sidan.

```text
# Stå i rooten av kursrepot
rsync -av me/kmom01/guess me/redovisa/htdocs
```

Nu kan du öppna en webbläsare och peka mot katalogen `redovisa/htdocs/guess` och spela ditt spel som vanligt.



### Flytta klasser till src/ {#src}

Mitt första steg blir att flytta alla klasser i `src/` till ramverkets motsvarighet i `src/Guess`. I samband med det så lägger jag på namespaces på varje klass och jag använder ramverkets autoloader som fungerar med namespaces.

När det är gjort bör du fortfarande kunna testköra spelet via sidkontrollerna i `htdocs/guess`.



### Flytta template-filerna till view/guess {#view}

Näste steg blir att plocka vyerna, template-filerna, och lägga dem i ramverkets motsvarighet `view/`. Jag gör en `view/guess` och samlar vyerna där.

När det är gjort bör du fortfarande kunna testköra spelet via sidkontrollerna i `htdocs/guess`.



### Flytta logiken till routern {#router}

Avslutningsvis flyttar vi spellogiken till routern. När det är klart så kan du spela spelet inuti ramverket. Det är bra om du fortfarande kan testköra ditt spel via filerna i `htdocs/guess`, det kan underlätta din felsökning.

Exakt vilka routes du använder kan du själv bestämma.


<!--

Flytta till kmom03?

### Använda GET, POST, SESSION eller ramverkets variant? {#inbyggd}

Ett ramverk har ofta klasser som gränssnitt mot de publika och globala variablerna GET, POST och SESSION. Det är för att lägga ett kontrollerat lager mellan globala variabler och ramverkets struktur. Man kapslar in de globala variablerna, via en ramverksklass.

Ofta kan koden bli enklare att testa när man som utvecklare använder ramverkets klasser istället för att gå direkt mot `$_SESSION` och `$_GET`/`$_POST`. Testbar kod är något att eftersträva. 

När du gör uppgiften kan du välja väg, använd ramverkets klasser för att nå SESSION/POST/GET eller gå direkt mot de globala variablerna.
-->



Krav {#krav}
-----------------------

1. Kopiera SESSION-varianten av ditt spel "Giss mitt nummer" och integrera det i din me-sida under routen `gissa/`. Använd en landningssida att du kan länka till flera versioner av spelet.

1. Uppdatera din navbar så man kommer åt spelet via den.

1. När du är klar, kör `make test` för att kolla kodstilen med phpcs och phpmd.

1. När du är klar, kör `make doc` för att se vilken dokumentation du genererar för dina klasser.

1. Gör en `dbwebb publish redovisa` för att kolla att allt validerar och fungerar på studentservern.

1. Gör en commit på ditt redovisa-repo. Tipset är att committa ofta och att använda tydliga commit-meddelanden.



Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

1. Ger refaktoring på din kod och bygg upp den med klasser.

1. Integrera alla dina exempelprogram, även versionerna för GET och POST. Se om du kan skriva vyer och klasser som är återanvändbara.

1. Ha en ambition att få så lite kod som möjligt i callbacks för router, låt där bara ligga limmet som fäster spelklasserna mot vyerna.

<!--
1. Integrera med ramverkets klasser så du inte använder `$_SESSION` och `$_GET`/`$_POST` i din egen kod, bara via ramverkets klasser.
-->



Tips från coachen {#tips}
-----------------------

Gör små commits och committa ofta, när du väl har din bas. Använd tydliga commit-meddelanden så att historiken ser bra ut.

Lycka till och hojta till i forumet om du behöver hjälp!
