---
author: efo
category: javascript
revision:
  "2022-03-24": (B, efo) Första utgåvan i samband med kursen webapp v4.
  "2018-02-12": (A, efo) Första utgåvan i samband med kursen webapp v3.
...
Lager appen del 4
==================================

[FIGURE src=image/webapp/money.jpeg?w=c5 class="right"]

Vi ska i denna uppgift skapa delar av appen som är skyddad med hjälp av JWT. I den skyddade delen ska det vara möjligt att se tidigare fakturor och skicka nya.



<!--more-->



Förkunskaper {#forkunskaper}
-----------------------
Du har gjort uppgiften [Lager appen del 3](uppgift/lager-appen-del-3-v2). Du har jobbat dig igenom övningarna [Tabeller i mobila enheter](kunskap/tabeller-i-mobila-enheter-v2) och [Login med JWT](kunskap/login-med-jwt-v2).



Introduktion {#intro}
-----------------------

Använd lager [API:t](https://lager.emilfolino.se/v2) dokumentationen och speciellt sektionen om invoices. Här kan du hämta ut alla invoices och skapa nya.



Krav {#krav}
-----------------------

1. Skapa ett formulär för att registrera en användare i Lager appen.

2. Skapa ett formulär för att logga in i Lager appen med en registrerad användare.

3. Bakom de skyddade delarna ska faktura vyerna ligga.

4. Skapa ett formulär för att göra om en order till en faktura. Ändra orderns status till 'fakturerad' enligt API:t.

5. Det ska inte gå att fakturera en order två gånger.

6. Skapa en tabell med information om befintliga fakturor.
