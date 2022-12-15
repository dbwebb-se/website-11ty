---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
Add => Commit => Push
==================================

Nu kommer de tre vanligaste saker du kommer göra och något du kommer göra många gånger till innan pensionen:

* Lägg till filer med `git add`
* Commit:a dom med `git commit`
* Ladda upp med `git push`

Jag tar tillfället i akt och lär ut lite best-practice om `git add .` vs `git add <file>`. Den lättaste och snabbaste vägen är `git add .`, men vi förlorar lite syftet med Git om vi väljer att göra så. Kollar vi på vårt repo på GitHub så ser vi att båda filerna har meddelande/beskrivningen "Initial release". Det fungerar bra i början, men nu har vi gjort två olika ändringar på våra filer, ändringar som inte är relaterade. Då är det mer rätt att istället använda `git add <file>`, vilket vi ska göra nu.

När man använder `git add <file>` så kan vi köra `git commit` på en eller flera filer åt gången. Så vi börjar med att lägga till vår README, commit:ar den med `Updated description`. Sen så lägger jag till `github.txt` och commit:ar den med beskrivningen `Added link to repo`.

[ASCIINEMA src=P5Y34IaN787n6LTSoF6ReAyw3]

## Avslutningsvis {#avslut}

Nu har ni koll på grunderna. Git är en bottenlöst hål när det gäller kunskap och det går alltid att lära sig mer om det. Det finns ett par till sidor i guiden att kolla på, dels "taggar" men även lite smått och gott i slutet.
