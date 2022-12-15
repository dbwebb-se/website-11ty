---
author: efo
category: javascript
revision:
  "2022-02-16": (A, efo) Första utgåvan i samband med kursen webapp v4.
...
Lager appen del 1 (v2)
==================================

[FIGURE src=image/webapp/warehouse.jpg?w=c5 class="right"]

I denna uppgift skapar du grunden för en lager-app, du använder dina kunskaper från övningar och kurslitteratur för att skapa en mobil-app. Du hämtar JSON data från ett befintligt REST API och i denna första del ligger fokus på en enkel listning av produkter.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------
Du har jobbat igenom guiden "[Kom igång med Git och GitHub](guide/git)" och övningarna "[En app i Expo och React Native](kunskap/en-app-i-expo-och-react-native)" och "[Typografi i mobila enheter](kunskap/typografi-i-mobila-enheter)".



Introduktion {#intro}
-----------------------
Du har blivit kontaktat av företaget Infinity Warehouses då ryktet går på stan att du har koll på mobila applikationer. Infinity Warehouses vill ta steget in i 2000-talet och automatisera deras gamla omoderna lagerhanteringssystem. Infinity Warehouses har tidigare anställd en backend programmerare, men när hen hörde orden design, användbarhet och tillgänglighet sprang hen skrikande bort. Backend programmeraren hade dock hunnit skapa ett REST API innan hen försvann ner i serverrummet. [Dokumentationen för API:t](https://lager.emilfolino.se/v2) hjälper dig en bit på vägen.

Övningen "[Introduktion till Lager-API:t](kunskap/introduktion-till-lager-api)" visar hur man skapar en API-nyckel och hur man skapar en uppsättning med produkter till ditt lager.



Krav {#krav}
-----------------------

1. Skapa en applikation anpassad för mobilen i Expo och React Native.

1. Appen ska innehålla en lagerförteckningslista där produkterna listas med namn **OCH** lagersaldot för produkten.

1. Appen ska ha en egen stil och anpassas till ditt valda tema för de produkter du har i ditt lager.

1. Säkerställ att du har filen `dbwebb-conf.json` i roten av din lager katalog och att den innehåller länken till din publiserade expo-app och länken till ditt GitHub-repo.

1. Commit:a dina ändringar och lägg till en ny tagg (v1.0.*). Du taggar repot med hjälp av kommandot `git tag -a v1.0.0 -m "lager1 done"`

1. Push:a repot till GitHub, inklusive taggarna. Du pushar taggarna i ett separat kommando `git push origin --tags`.

1. Länka till ditt GitHub-repo som en del av din inlämning på Canvas. Länken ska vara på formen: https://github.com/emilfolino/lager-v4.git
