---
author: efo
category:
    - moln
revision:
    "2021-12-14": (A, efo) Första utgåvan i samband med kursen moln.
...
Ett Python och Flask API driftsatt i molnet
==================================

Lager-företaget Infinity Warehouses har under de senaste åren tagit kliv in i den digitala världen med hjälp av deras unika Lager-API. Dock verkar det som att något har blivit tokigt då systemet innehåller många dubbletter. Infinity Warehouses har hört från säkra källor att artificiell intelligens, maskininlärning och data science ska vara det nya heta och behöver därför er hjälp med att rensa ut dubbletterna i lagret. Använd [API-dokumentationen](kunskap/en-flask-app-i-molnet#anotherapi) som hjälp för att utveckla ditt eget API.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------
Du har jobbat igenom övningen "[En Flask App i molnet](kunskap/en-flask-app-i-molnet)".



Krav {#krav}
-----------------------


1. Skapa ett Python API som rensar ut i alla dubbletter som finns i Infinity Warehouses API.

2. En dubblett är definierat som produkter som har likadana namn.

3. För varje unik produkt ska lagersaldot summeras.

3. Ditt API ska returnera ett JSON-svar med unika produkter och deras summerade lagersaldo enligt exemplet nedan. (Lagersaldot (stock) är påhittade värden i exemplet nedan).

```json
{ "data": [
{
"name": "Skruv M14",
"stock": 1414
},
{
"name": "Skruv M12",
"stock": 1212
}
]}
```

5. Ditt API ska innehålla två endpoints `/unique` och `/search/<query>`

6. `/unique` ska skriva ut alla unika produkter som ett JSON svar enligt ovanstående format.

7. `/search/<query>` ska skriva ut alla unika produkter som matcher `<query>` strängen, som ett JSON svar enligt ovanstående format.

8. Driftsätt ditt API i Azures moln enligt instruktionerna i [En Flask App i molnet](kunskap/en-flask-app-i-molnet#cloud). Lämna in den driftsatta url (*.azurewebsites.net) som en del av din inlämning i Canvas.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i chatten om du behöver hjälp!
