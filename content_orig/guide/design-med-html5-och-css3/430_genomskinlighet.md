---
author: efo
revision:
    "2018-10-10": "(A, efo) Första versionen."
...
Genomskinlighet
=======================

Vi såg i början av denna del i guiden att vi kan ange färg på många olika sätt. Vi har än så länge enbart använt hex som sätt att ange våra färger. Ett annat användbart sätt att ange färg är att använda `rgb()` eller `rgba()`.

RGB står för Röd-Grön-Blå och vi anger färgen som ett heltal mellan 0 och 255. RGBA står för Röd-Grön-Blå-Alpha där Alpha är genomskinlighet, Alpha delen anges som ett flyttal mellan 0.0 och 1.0. 0.0 är full transparens och 1.0 är ingen transparens.

Transparens är bra att använda om vi vill ge en känsla av djup på våra webbplatser. I nedanstående exempel ser vi hur en genomskinlig yta ovanpå en färgat yta ger en bra effekt av djup på hemsidan. Och det blir ännu tydligare om man lägger till en skugga.

[CODEPEN src=gBjdGZ user="dbwebb" tab="result" caption="Transperans"]

Dessutom rekommenderas det starkt att använda transparens om man vill skapa skuggor ovanpå färgade ytor. I nedanstående exempel är det samma skugga på de två lådor till vänster och de två till höger. Den stora skillnaden syns på de nedersta lådorna där färgen i den vänstra skuggan syns på den gröna lådan under, men inte gör det på den högra då vi använder transparens istället.

[CODEPEN src=GYWGYE user="dbwebb" tab="result" caption="Genomskinlighet"]
