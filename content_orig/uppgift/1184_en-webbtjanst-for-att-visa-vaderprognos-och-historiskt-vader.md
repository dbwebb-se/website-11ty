---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2020-11-16": "(B, mos) Bytte till OpenWeather Weather API."
    "2018-11-14": "(A, mos) Första utgåvan."
...
En webbtjänst för att visa väderprognos och historiskt väder
===================================

Du skall bygga en webbtjänst som hämtar väderprognosen för ett specifikt område. Du skall även hämta historisk väderdata och presentera det.

Du bygger din kod dels för att presentera resultatet i en traditionell webbsida och dels via ett REST API som ger svaren i JSON.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har löst uppgiften "[En webbtjänst för att geotagga ip-adresser](uppgift/en-webbtjanst-for-att-geotagga-ip-adresser)".



Introduktion och förberedelse {#intro}
-----------------------

Följande steg hjälper dig att komma igång med uppgiften.



### Väder API {#vader}

Vi använder [OpenWeather Weather API](https://openweathermap.org/api) för att hämta väderdata.

Du behöver skaffa dig ett konto på OpenWeather.


<!--
#### Alternativa vädertjänster {#altvader}

Kikade lite på vädertjänster och både smhi och yr har var sitt API, kanske kör vi på det nästa vecka.
* https://api.met.no/
* https://opendata.smhi.se/apidocs/

Mer relaterade tjänster:
* https://luftdata.se/data/ (Emil)
* https://weatherstack.com/ (Matilda)
-->



### MVC {#mvc}

Koda enligt MVC.

Tänk tunna kontrollers.

Tänk dumma vyer,

Tänk återanvändbara modell-klasser, i rimlig nivå till uppgiftens omfattning.



### DI {#di}

Du skall lägga in någon del/klass som en tjänst i ramverkets $di. Välj själv vilken/vilka koddelar du lägger i $di. Man kan lägga en klass i $di och den klassen kan i sin tur använda sig av andra klasser.

När du gör detta, fundera på vad som är skillnaden mellan tjänster som ligger i $di och de klasser som instansieras på vanligt sätt.



### Enhetstesta {#test}

Se till att alla dina klasser omfattas av enhetstester. Försök nå komplett kodtäckning men välj ambitionsnivå kontra tiden du har att tillgå.



### Extern tjänst för geotagga ip-adresser {#ip}

Du har sedan tidigare använt en extern tjänst för att översätta en ip-adress till en geografisk position. Du skall fortsätta att använda den i uppgiften.

* [ipstack](https://ipstack.com/)



### Extern tjänst för kartor {#map}

Du skall använda en karttjänst för att visa upp kartor som visar det området som är aktuellt.

* [OpenStreetMap](https://www.openstreetmap.org/)



Krav {#krav}
-----------------------

1. Skapa en sida där du kan mata in en platsangivelse och få tillbaka en rapport för kommande väder eller om föregående väder (föregående 30 dagar).

1. Platsangivelsen kan vara en ip-adress eller en geografisk position. Den geografiska positionen anges på det/de format som du bestämmer. Optionellt löser du så man även kan mata in ett ortsnamn.

1. När du anropar vädertjänsten så skall du kunna skicka flera requester samtidigt (parallellt, inte seriellt).

1. Alla dina API-nycklar sparar du i en konfigurationsfil under katalogen `config/`.

1. Minst en del av din kod, en klass eller kombination av klasser, skall sparas som en tjänst i $di och användas via $di.

1. Visa tydliga felmeddelanden om det som matas in inte kan översättas till en giltig position, eller om väder inte kan ges för positionen.

1. Om allt går bra så visar du vädret, tillsammans med information om platsen/positionen samt en karta över platsen.

1. Ovan sida lägger du till i navbaren.

1. Skapa ett REST API som erbjuder samma funktionalitet. Svaret blir en JSON-struktur med samma/liknande innehåll och resultat som ovan.

1. Bygg en dokumentationssida för ditt REST API där du visar och förklarar hur det fungerar.

1. Lägg till enhetstester för din kod. Försök nå 100% kodtäckning, men det är inte ett absolut krav.

1. Kör `make test` för att kolla att du inte har några valideringsfel och att testfallen går igenom.

1. Gör en `dbwebb publish redovisa` och kontrollera att det fungerar på studentservern.

1. Committa alla filer och lägg till en tagg (3.0.\*).

1. Pusha upp repot till GitHub, inklusive taggarna.



Extrauppgifter {#extra}
-----------------------

Om du har tid och lust så gör du följande extrauppgifter.

* Kan du lösa ortsnamn så att de kan användas för att slå upp vädret?
* Har du behov av att cacha information? Kanske borde du jobba med en lokal cache?
* Du gör en massa requester som kan vara svåra att felsöka på, borde du börja använda en fil-logg där du kan logga information i test och felsökningssyfte?



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
