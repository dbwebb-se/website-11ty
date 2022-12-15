---
author: efo
revision:
    "2018-10-18": "(A, efo) Första versionen."
...
Ta bort responsivitet
=======================

Vi ser i versionen `simple.css` att använda relativa enheter för att anpassa webbplatsen fungerar till stor del. Men när sidan blir för smal ser vi att designen kollapsar och att delar av menyn blir svåra att läsa. Om sidan blir riktigt liten ser vi även att texten från menyn överlappar artikeln.

Ett sätt att komma runt detta är att helt enkelt gömma vissa delar av webbplatsen. I exempelprogrammet `example/guide/responsivitet` väljer vi att gömma innehållsförteckningen när sidan blir liten. Du kan testa detta genom att trycka på knappen `removing.css`.

Vi ser att detta ger en bra anpassning för artikeln, men nu börjar footer-delen att strula istället.
