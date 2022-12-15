---
author: mos
category: webbprogrammering
revision:
  "2015-11-04": (A, mos) Första utgåvan i samband med kursen webapp.
updated: "2015-11-04 14:47:08"
created: "2015-01-28 15:24:00"
...
Bygg en me-app med Mithril
==================================

Skapa en meapp i javaScript-ramverket Mithril.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Kom igång med ramverket Mithril för JavaScript SPA](kunskap/kom-igang-med-ramverket-mithril-for-javascript-spa)".



Introduktion {#intro}
-----------------------

Du skall ta din befintliga meapp och porta den till Mithril. Du behöver dock inte ta med alla tester utan bara de delar som omnämns i kraven.

Spara alla dina filer i katalogen `me/kmom04/me4`.

Lägg de ramverk du använder i katalogen `me/lib` så undantas de från valideringen.



Krav {#krav}
-----------------------

1. Skapa en meapp, för mobilen, med Mithril och Handlebars templates.

1. Din meapp skall stödja en enkel meny för "Hem", "Report" och "Om" samt "Dagbok".

1. Du skall ha samma text i meappen som du har i `me/kmom03/me3` för sidorna "Hem", "Report" och "Om". Du skall senare fylla "Report" på med redovisningstexten för detta kursmoment.

1. Under menyn "Dagbok" skall du visa din motsvarighet (egna bilder och text) till exemplets. Ditt exempel skall bestå av din egna *listvy* och när man klickar på ett val i listan så skall undersidan visas.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate me4
dbwebb publish me4
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Lägg lite extra tid på att göra följande extrauppgifter.

* Styla med CSS så din meapp liknar den du hade i föregående kmom.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




