---
author: lew
category:
    - javascript
    - kursen javascript1
revision:
    "2018-10-26": (A, lew) Ny uppgift inför HT18.
...
Sandbox steg 3
==================================

Vi ska göra ett tärningsprogram, där en eller flera tärningar kastas, snittvärdet beräknas och visas tillsammans med slagserien. Till vår hjälp ska vi använda funktioner.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Kom i gång med HTML, CSS och JavaScript](kunskap/kom-i-gang-med-html-css-och-javascript)"  
Du har jobbat igenom de relevanta delarna i guiden.



Krav {#krav}
-----------------------

I din kurskatalog (repot) för kursen, skall du ta en kopia av din personliga sandbox `me/kmom01/sandbox` och lägga innehållet i `me/kmom03/sandbox3`.

```bash
# Gå till kurskatalogen
cp -r me/kmom01/sandbox/* me/kmom03/sandbox3/
```

1. Användaren ska kunna mata in antal tärningar och antal sidor på tärningarna. Tips på hur man kan hantera inmatningen: text/inputfält, select box etc.

1. En eventlyssnare ska trigga tärningskastet vid ett knapptryck.

1. Eventlyssnaren ska använda en egendefinierad funktion.

1. Presentera **medelvärdet** och **summan** av kasten i din sandbox. Skriv gärna ut varje tärnings värde i konsolen.

1. Gör en dbwebb publish för att kolla att allt validerar och fungerar.

<!-- 1. Testa din JavaScript kod så att den validerar i onlineverktyget för JSHint. -->

```text
dbwebb publish me
```



Extrauppgift {#extra}
-----------------------

1. Se om du kan ha med bilder som representerar tärningssidorna.



Tips från coachen {#tips}
-----------------------

1. Skapa en funktion `random(max)` som returnerar ett slumptal mellan (förslagsvis) 1 och `max`.

1. Skapa en funktion `rollDice(times)` som kastar tärningen `times` gånger samt beräknar medelvärdet av kasten.

1. Lycka till och hojta till i forumet om du behöver hjälp!
