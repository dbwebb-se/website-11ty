---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2018-11-06": "(A, mos) Första utgåvan."
...
En webbtjänst för att geotagga ip-adresser
===================================

Du skall bygga en webbtjänst som letar fram den geografiska positionen för en ip-adress, inklusive ortsnamn. Du använder dig av ett externt API för att göra uppslagningen av ip-adressen.

Innan du gör uppslaget så validerar du ip-adressen så att den är korrekt.

Du skall bygga dels en traditionell webbtjänst där användaren kan mata in ip-adressen i ett formulär som postas och en resultatsida visar upp resultatet. Du skall också bygga ett REST API med samma funktionalitet där frågor och svar sker via JSON.

Du lägger extra kraft på att organisera din kod i kontroller och modell-klasser och du skapar enhetstester som som når hög kodtäckning, kanske 100%?

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har löst uppgiften "[En kontroller för att validera ip-adresser](uppgift/en-kontroller-for-att-validera-ip-adresser)".



Introduktion och förberedelse {#intro}
-----------------------

Följande steg hjälper dig att komma igång med uppgiften.



### Gör en plan {#plan}

Innan du startar så fundera igenom uppgiften och skissa på vilka kontroller-klasser och modell-klasser du tror dig behöva.

Skissa på ett papper med penna. När du är klar med uppgiften, gå tillbaka till din skiss och fundera på hur duktig du var på att skissa den slutliga formen för kodlösningen.



### MVC {#mvc}

Koda enligt MVC.

Tänk tunna kontrollers.

Tänk dumma vyer,

Tänk återanvändbara modell-klasser, i rimlig nivå till uppgiftens omfattning.



### Enhetstesta {#test}

Se till att alla dina klasser omfattas av enhetstester. Försök nå komplett kodtäckning men välj ambitionsnivå kontra tiden du har att tillgå.



### Extern tjänst för geotagga ip-adresser {#ip}

Du skall använda en extern tjänst för att koppla en ip-adress mot en geografisk position. Följande är föreslagna men du kan välja annat alternativ om du vill.

* [ipstack](https://ipstack.com/)

Som en extra och optionell funktinalitet kan du använda en karta för att komplettera ditt resultat. Du kan till exempel använda följande karttjänst.

* [OpenStreetMap](https://www.openstreetmap.org/)



Krav {#krav}
-----------------------

1. Skapa en sida där du kan mata in en ip-adress. Man kan posta formuläret och få ett svar på ip-adressens geografiska position, förutsatt att ip-adressen är giltig.

1. Se till att användarens ip-adress är ifylld i formuläret från start, som default-värde.

1. Resultatet skall (minst) visas med ip-adressen, om den är av typen ip4 eller ip6, dess geografiska position och ort/land som ligger närmast.

1. Ovan sida lägger du till i navbaren.

1. Skapa ett REST API som erbjuder samma funktionalitet. Man kan posta en ip-adress och svaret blir en JSON-struktur med samma innehåll och resultat som ovan.

1. Bygg ut din sida så att du förklarar hur man jobbar med ditt JSON API och lägg till så det finns testroutes man kan klicka på för att se att JSON API:et fungerar.

1. Lägg till enhetstester för din kod. Försök nå 100% kodtäckning, men det är inte ett absolut krav.

1. Kör `make test` för att kolla att du inte har några valideringsfel och att testfallen går igenom.

1. Gör en `dbwebb publish redovisa` och kontrollera att det fungerar på studentservern.

1. Committa alla filer och lägg till en tagg (2.0.\*).

1. Pusha upp repot till GitHub, inklusive taggarna.



Extrauppgifter {#extra}
-----------------------

Om du har tid och lust så gör du följande extrauppgifter.

* Presentera mer detaljer om själva positionen, adressen. Du får mycket information från tjänsten, men vad kan du göra med den?
* Lägg till en karta på webbplatsens svar och i REST API:et lägger du till en länk som leder till en karta.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
