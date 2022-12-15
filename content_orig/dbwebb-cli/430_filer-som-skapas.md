---
author:
    - mos
category:
    - dbwebb-cli
    - dbwebb exam
revision:
    "2018-05-30": "(A, mos) Första utgåvan."
...
Filer som skapas
==================================

När du använder verktyget så hämtas och skapas filer som krävs för att du skall genomföra din examination. Det kan vara filer i form av en instruktion eller en katalogstruktur med flera filer.

Vilka filer som kommer beroer på själva examinationsmomentet och den som planerat det.

Verktyget i sig skapar även ett antal meta-filer och de lagras i katalogen `.dbwebb_exam`. Dessa filer kan vara väsentliga för att processen skall fungera.

Här är ett par av de filer som genereras.

| Fil                            | Innehåll                                |
|--------------------------------|-----------------------------------------|
| `README_FIRST.md`              | Instruktion om handhavandet för examinationen. |
| `.dbwebb_exam/FILES.txt`       | En lista av alla filer som ligger i katalogen. |
| `.dbwebb_exam/RECEIPT.md`      | Ett kvitto på dina aktiviteter, samma information som du kan hämta med `dbwebb exam receipt <target>`. |
| `.dbwebb_exam/RECEIPT.md.sha1` | En hash på motsvarande fil. | 
