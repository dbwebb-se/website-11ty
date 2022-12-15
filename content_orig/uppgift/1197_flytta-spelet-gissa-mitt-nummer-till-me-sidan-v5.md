---
author: mos
category:
    - kurs oophp
    - anax
revision:
    "2019-04-01": "(C, mos) Genomarbetat och ny videoserie till vt19."
    "2018-09-10": "(B, mos) Lade till extrauppgift om refaktoring till klasser."
    "2018-03-26": "(A, mos) Första utgåvan."
...
Flytta spelet Gissa mitt nummer till me-sidan (v5)
===================================

Du har din me-sida med ramverket Anax och du har skapat ett fristående spel "Gissa mitt nummer" i olika varianter. Du skall nu integrera ditt fristående spel in i din me-sida, in i ramverkets struktur.

För att lyckas med det behöver du ha koll på begreppet router, request, response och vyer. Du behöver också klura ut var du skall lägga koden i ramverkets struktur.


<!--more-->


Så här kan det se ut när du är klar.

[FIGURE src=image/snapvt19/guess-my-number.png?w=w3 caption="Så här kan du spela spelet inuti din me-sida."]



Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften "[Bygg en me-sida för oophp med Anax](uppgift/bygg-en-me-sida-for-oophp-med-anax)" och är därmed bekant med den övergripande katalogstrukturen för din me-sida.

Du har löst uppgiften "[Gissa numret med PHP](uppgift/gissa-numret-med-php)" och du har en implementation av spelet.



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för att utföra uppgiften.

Du kan se hur jag jobbar igenom stegen i videoserien "[Flytta spelet Gissa mitt nummer till me-sidan](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-9i0wedL1K-YUtO70dxV2f)".

[YOUTUBE src="nb5Fwj-yRnA" list="PLKtP9l5q3ce-9i0wedL1K-YUtO70dxV2f" width=700 caption="Videoserie som ger dig en stegvis genomgång till hur du kan flytta spelet in i me-sidan."]



### Börja med en kopia {#kopiera}

För att göra det enkelt att stegvis inkludera spelet så kan du börja med att göra en kopia och kopiera in hela spelet in i htdocs-mappen för me-sidan.

```text
# Stå i rooten av kursrepot
rsync -av me/kmom01/guess me/redovisa/htdocs
```

Nu kan du öppna en webbläsare och peka mot katalogen `redovisa/htdocs/guess` och spela ditt spel som vanligt.



### Skapa routes {#routes}

Börja med att bygga de routes du vill ha, så du får ett flöde i spelet. Gör en route för att initiera spelet, en route för att visa spelplanen och fyll sedan på med routes (både GET och POST) för att få ett bra flöde i ditt spel.



### En landningssida {#landa}

Gör en landningssida i Markdown där du skriver lite inledande text om spelet och länka sedan till spelets första route så att användaren kan börja spela ett nytt spel.

Länka till landningssidan i navbaren.



### Flytta template-filerna till view/guess {#view}

Skapa vyer i katalogen `view/` och flytta dit funktionaliteten du hade i dina egna vyer.



### Flytta klasser till src/ {#src}

Du behöver flytta flytta alla klasser i `src/` till ramverkets motsvarighet i `src/Guess`. I samband med det behöver du lägga på namespaces på varje klass.

Du behöver välja ditt eget vendornamn och uppdatera `composer.json` så att vendornamnet pekar på katalogen `src/`.

Glöm inte uppdatera autoloadern med `composer dump`.



### Bygg små routehanterare {#sma}

Strukturera din kod så att du får små och anpassade routehanterare, skapa gärna fler routhanterare så att de blir specifika och löser en viss uppgift.

Undvik "feta routehanterare" som har mycket kod i sig och löser flera användarfall.

Exakt vilka routes du använder kan du själv bestämma.



Krav {#krav}
-----------------------

1. Kopiera ditt spela "Gissa mitt nummer" och integrera det i din me-sida under valfri route. Spelet skall fungera enligt samma premisser som i kmom01.

1. Använd en landningssida och länka till den från din navbar.

1. All kod skall ligga inuti ramverket i `router/`, `src/` och `view/`.

1. Bygg hellre små och specifika routehanterare än stora som löser flera användarfall. Det underlättar för dig till kommande kursmoment.

1. När du är klar, kör `make test` för att kolla kodstilen med phpcs och phpmd.

1. Gör en `dbwebb publish redovisa` för att kolla att allt validerar och fungerar på studentservern.

1. Gör en commit på ditt redovisa-repo. Tipset är att committa ofta och att använda tydliga commit-meddelanden.



Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

1. Kan du vinna något på att göra fler klasser och organisera koden i dem? Fundera och koda om du hittar en bra lösning.



Tips från coachen {#tips}
-----------------------

Gör små commits och committa ofta, när du väl har din bas. Använd tydliga commit-meddelanden så att historiken ser bra ut.

Lycka till och hojta till i forumet om du behöver hjälp!
