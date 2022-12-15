Skapa grunden med scaffolding
==================================

Du kan skapa grunden till en webbplats utifrån en mall. Detta brukar kallas scaffolding som innebär att man gör en grundstruktur för något, en struktur som man kan bygga vidare på.

```text
anax create <new dir> <template name>
```

Vad som händer är att en ny katalog skapas och fylls med innehållet från en mall. När det är gjort körs ett skript som ytterligare kan modifiera innehållet.

Så här kan det se ut när du skapar en ny webbplats i katalogen `me` i kursen ramverk1, det är en specifik mall `ramverk1-me` för just detta syftet.

```text
anax create me ramverk1-me
```

Så här kan det se ut.

[ASCIINEMA src=132473]

Du kan läsa mer om hur scaffoldingen fungerar i [Format vid scaffolding](scaffolding).
