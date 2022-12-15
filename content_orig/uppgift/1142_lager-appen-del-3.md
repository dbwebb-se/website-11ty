---
author: efo
category: javascript
revision:
  "2019-03-04": (B, efo) Uppdaterade uppgiften för att passa API v2.
  "2018-01-17": (A, efo) Första utgåvan i samband med kursen webapp v3.
...
Lager appen del 3
==================================
[FIGURE src=image/webapp/truck.jpg?w=c5 class="right"]

I detta kursmoment skapar vi ett formulär för inleverans med hjälp av kunskapen från övningarna. Vi skriver appen i mithril och använder vår kunskap om att skapa lättanvända formulär för att snabbt kunna göra inleveranser på produkter.



<!--more-->



Förkunskaper {#forkunskaper}
-----------------------
Du har gjort övningarna [Kom igång med ramverket Mithril](kunskap/kom-igang-med-mithril-v2) och [Ett mobilanpassad formulär](kunskap/ett-mobilanpassad-formular).


Introduktion {#intro}
-----------------------
En inleverans är när lagret får varor levererade och vi ska underlätta för lagerarbetarna att snabbt ta emot varor. I lager [API:t](https://lager.emilfolino.se/v2) finns en datatyp `deliveries` där alla inleveranser ska lagras och dessutom ska du uppdatera lagersaldot för den levererade produkten.

[INFO]
Du behöver inte återskapa funktionaliteten från kmom01 och kmom02 i detta kmom'et. Du byggar alltså en ny app från grunden, som efter kmom03 innehåller inleveranser.
[/INFO]



Krav {#krav}
-----------------------
1. Din app ska använda sig av JavaScript ramverket mithril.

1. Lista alla tidigare inleveranser, om det inte finns inleveranser visa upp ett meddelande om detta.

1. Gör en knapp för 'Ny inleverans' i list-vyn denna ska ta användaren till ett formulär.

1. Använd dina kunskapar i att göra ett lättanvänd formulär där man kan göra inleverans av en produkt.

1. Formuläret ska innehålla alla attribut för en inleverans förutom Leverans ID (id) dvs.:

* Produkt (product_id)
* Antal (amount)
* Leveransdatum (delivery_date)
* Kommentar (comment)

7. När formuläret skickas ska det skapas en inleverans i API:t.

8. Lagersaldot för produkten ska ökas med den levererade mängden.

9. Använd ett `select`-element för att välja produkten som har levererats. Designa `select`-elementet så det passar in i resten av stilen för formuläret.

10. Använd ett `textarea`-element för kommentaren. Designa `textarea`-elementet så det passar in i resten av stilen för formuläret. Använd ett lämpligt standard-värde (default) för textarean.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate lager3
dbwebb publish lager3
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------
* Gör det möjligt att skapa en ny produkt i inleverans formuläret.

* Gör ett autocomplete-formulärfält, som fyller i befintliga produkter under tiden användaren skriver.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
