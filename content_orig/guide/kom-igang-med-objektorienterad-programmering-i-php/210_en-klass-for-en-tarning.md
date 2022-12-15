---
author: mos
revision:
    "2018-03-27": "(A, mos) Första versionen, uppdelad av större dokument och uppdaterad."
...
En klass för en tärning
==================================

Vi tar ett nytt exempelprogram i form av en tärning. Vi skall bygga flera klasser som samverkar i en struktur där vi använder arv och/eller komposition.

Spara koden du skriver i denna övningen i `index_dice.php` och `src/Dice/Dice.php`.



Ett exempelprogram för en tärning {#dicepage}
----------------------------------

Tanken är att du bygger ett exempelprogram i `index_dice.php` som visar hur du kastar en tärning 6 gånger, ungefär som följande sida som skiver ut tärningens värde i en `ol/li` lista.

[FIGURE src=image/snapvt18/dice-roll-six.png?w=w3 caption="Kasta en tärning sex gånger."]

Du skapar en klass för tärningen och lägger i `src/Dice/Dice.php`. Gör ditt eget namespace baserat på ditt egen vendor-namn.

När du laddar om sidan så kastas tärningen på nytt sex gånger och en ny tärningsserie visas upp.



Utöka med summa och snitt {#sum}
----------------------------------

Utöka nu ditt testprogram så att du kan räkna ut snittvärdet och summan av de tärningsslagen som kastats.

Vi börjar enklaste möjliga och lägger denna hanteringen utanför klassen och sköter summeringen och beräkningarna i sidkontrollern.

När du är klar kan sidan se ut så här.

[FIGURE src=image/snapvt18/dice-average.png?w=w3 caption="Tärning med beräkning av summa och snittvärde."]

Det räcker till att börja med.
