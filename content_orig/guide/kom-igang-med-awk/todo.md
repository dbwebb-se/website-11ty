---
author: lew
revision:
    "2020-02-04": "(A, lew) Första versionen."
...
TODO
=======================

* Grep - search strings
* sed regex on large files
* awk input/output
* time <command>


* intro
    * vad är awk?
    * installera awk
    * hur använder man awk?

* -F delimiter
* FS, OFS etc
* awk 'FS="-" {print $2}' presidents.txt NOTERA BEGIN OCH ANNORLUNDA FÖRSTA RAD

* functions - hur många år har pres suttit?
* split(arr)
* `@include <filename>`
* match()
* utan fil, kommandoraden
* awk från fil - när kommandona blir större
* tillslut skapa json från textfil
* --lint

* variabler
```
Då awk är ett programmeringsspråk kan vi även hantera variabler:

```
$ awk 'BEGIN  {answer=42; print "Meningen med livet är:", answer}'
Meningen med livet är: 42
```
```
