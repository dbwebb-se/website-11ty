---
author: mos
category: webbprogrammering
revision:
  "2015-11-23": (A, mos) Första utgåvan i samband med kursen webapp.
updated: "2015-11-23 15:14:55"
created: "2015-09-24 15:03:47"
...
Meapp med dynamiska sidor via jQueryMobile, Ajax och JSON
==================================

Du jobber med jQueryMobile och bygger ut din meapp med en del som använder Ajax för att hämta JSON-data och dynamiskt bygger upp sidans innehåll.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Mobil webapp och RESTful server](kunskap/mobil-webapp-och-restful-server)" samt utfört uppgiften "[Sökverktyg för JSON filer](uppgift/sokverktyg-for-json-filer)".



Introduktion {#intro}
-----------------------

Börja med att ta en kopia av din egen kod från föregående uppgift.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -ri kmom02/me2/* kmom03/me3/
```

Nu har du din bas du kan utgå ifrån, spara alla dina filer i katalogen `me/kmom03/me3`.

Bygg nu vidare på din meapp och lägg till funktionalitet enligt kraven nedan.



Krav {#krav}
-----------------------

1. Skapa en ny undermeny för dina Ajax-baserade testprogram.

1. Skapa en undersida som gör det som Marvin utför i artikeln. Du får gärna göra din egna variant och använda andra citat och annan bild/koncept.

1. Skapa en Instagram-liknande undersida som visar en listvy med innehållet från `example/instagram/tag-dbwebb.json`.

1. Skapa en undersida till ditt Instagramflöde. Klickar man på en bild så visas en undersida som presenterar bilden samt detaljer om varje bild inklusive eventuella kommentarer.

1. Använd eventet *swipeleft* för att navigera bakåt.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate me3
dbwebb publish me3
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Lägg lite extra tid på att göra följande extrauppgifter.

* Lägg till undersidor som visar detaljer från Arbetsförmedlingens JSON om lediga jobb, ungefär så som det löstes i övningen.

* Kanske är inte en listvy bäst för Instagram-flödet, kan du göra en variant som är rent HTML/CSS som inte använder jQueryMobiles listvy och få det att se så likt ut som möjligt den verkliga appen för Instagram.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




