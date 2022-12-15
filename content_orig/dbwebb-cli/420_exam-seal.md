---
author:
    - mos
category:
    - dbwebb-cli
    - dbwebb exam
revision:
    "2018-05-30": "(A, mos) Första utgåvan."
...
Avsluta en examination
==================================

Du kan avsluta, lämna in, en examination med följande kommando.

```text
dbwebb exam seal <target>
```

Kommandot "förseglar" din examination och laddar upp den till studentservern.

Du kan köra kommandot flera gånger om, det är din sista inlämning som räknas.

När du kör kommandot sparas en tidstämpel som anger när du avslutade din examination.

Kommandot `exam stop` är ett alias för `exam seal`.
