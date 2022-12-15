---
author: efo
revision:
    "2018-10-02": "(A, efo) Första versionen."
...
Enheter
=======================

Vi har i CSS ett antal olika möjligheter för att ange storlek på element i vår HTML. När vi ska ange storlek för texten på våra webbplatser använder vi främst tre sätt:

1. Pixlar, skrivs som `px` i CSS.
1. EM, skrivs som `em` i CSS.
1. Root EM, skrivs som `rem` i CSS.

Pixlar anger storleken för våra typsnitt i en fast enhet och användaren har inte möjlighet att påverka det med inställningar i webbläsaren. Fasta storlekar kan vara bra när vi designar våra gränssnitt, men ur ett användbarhetssynpunkt är det bättre att använda `em` eller `rem`.

`1 em` är lika med den typsnittsstorleken som är definierat för förälder elementet. Så skriver vi text i ett element där föräldern har en definierat typsnittsstorlek på `16px` är `1 em = 16 pixlar` för barn elementen.

`1 rem` är lika med den typsnittsstorleken som är definierat för rot-elementet `html`. Så har `html` en storlek på `12px` är `1 rem = 12 px` för alla element på hela sidan.
