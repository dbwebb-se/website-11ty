---
author: efo
category: javascript
revision:
  "2022-03-07": (A, efo) Första utgåvan i samband med kursen webapp v4.
...
Lager appen del 2 (v2)
==================================

[FIGURE src=image/webapp/pick-list.png?w=c4 class="right"]

I kursmoment 1 skapade vi grunden för vår lager app. Vi ska i detta kmom bygga en plocklista vy där lagerarbetarna får en bra översikt över vart produkterna från en order finns. När varorna är plockade ska status ändras för ordern och lagersaldo ska minskas.



<!--more-->



Förkunskaper {#forkunskaper}
-----------------------
Du har gjort uppgiften [Lager appen del 1](uppgift/lager-appen-del-1-v2). Du har jobbat dig igenom övningarna [Knappar för mobilen](kunskap/knappar-for-mobilen) och [Routing i React](kunskap/routing-och-navigation-i-react).



Introduktion {#intro}
-----------------------

Använd lager [API:t](https://lager.emilfolino.se/v2) dokumentationen och speciellt sektionen om order. Här kan du hämta ut ordern och alla orderrader. När du ska uppdatera lagersaldot använder du dig av `PUT` HTTP-metoden för produkterna.

[Kodexemplen](https://lager.emilfolino.se/v2#fetch) i dokumentationen för Lager-API:t kan vara till stor hjälp i detta kmom.



Krav {#krav}
-----------------------

1. Skapa en vy där lagerarbetarna ser alla ordrar redo för att packas, dvs. ordrar med status ny. Från order-vyn kan man ta sig till plocklista vyn.

1. Plocklista vyn visar alla varor i en order, hur många som ska plockas och vart varan finns.

1. Gör en kontroll om det finns tillräckligt många av varan för att den kan packas.

1. Om det finns tillräckligt många produkter ska det finnas en möjlighet att byta status för ordern med en knapp. Byt till status Packad.

1. När status för ordern ändras måste även lagersaldot för de packade varorna minskas.

1. Navigationen ska tydligt visa vilken vy användaren är i.

1. Strukturera din style kod, så vi inte längre har styling direkt i komponenterna, men i egna filer.

1. Se till att det går att testa din app. Lägg till minst en order med en produkt som går att packa.

1. Länka till ditt GitHub-repo som en del av din inlämning på Canvas. Länken ska vara på formen: https://github.com/emilfolino/lager-v4.git
