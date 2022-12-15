---
author:
    - mos
category:
    - dbwebb-cli
    - dbwebb exam
revision:
    "2018-05-30": "(A, mos) Första utgåvan."
...
Påbörja en examination
==================================

Du kan checka ut, påbörja, en examination med följande kommando.

```text
dbwebb exam checkout <target>
```

Kommandot laddar ned ett antal filer till den katalogen som kan mappas mot delmomentet `<target>`.

Parametern `<target>` är beteckningen för själva examinationsmomentet. Om katalogen du skall spara filerna i heter `me/kmom10/tenta` så är `tenta` benämningen på din `<target>`.

Med hjälp av de nedladdade filerna kan du påbörja examinationen.

När du kör kommandot sparas en tidstämpel som anger när du påbörjade din examination.

Du kan köra kommandot flera gånger, men det är den första tidstämpeln som räknas.

Kommandot `exam start` är ett alias för `exam checkout`.
