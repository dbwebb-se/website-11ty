---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
Uppdatera filer
==================================

Vi uppdatera vår README så den innehåller lite information om repot. Vi passar även på att lägga till en länk till vårt repo i `github.txt`.

Vår README är skriven i Markdown, ett vanligt språk som används vid dokumentation men även i en del CMS-ramverk (Wordpress som exempel). Det är inget superavancerat och vi kan kolla på GitHub's tolkning av Markdown [här](https://guides.github.com/features/mastering-markdown/).

Det vi letar efter är rubrik, sen nöjer vi oss med ren text under. Men vill ni testa på mer så är det bara köra på. Jag lägger till följande i min `README.md`:

```markdown
# Example Repository

This repository is mainly for teaching purposes, as a way to show of Git and GitHub.
```

Jag uppdaterar även min `github.txt` med en länk till repot, vilket för mig är `https://github.com/AuroraBTH/example-repo`.

Om ni öppnade eran editor i root-mappen för repot kan ni även se att de flesta editors har integration med Git. Det lyser gult på båda våra filer ute till vänster, tillsammans med ett `M`. Det innebär att filerna är modifierade och inte commit:ade till vårt repo. Det fixar vi i nästa del.

[FIGURE src=image/git-guide/git-integration.png]
