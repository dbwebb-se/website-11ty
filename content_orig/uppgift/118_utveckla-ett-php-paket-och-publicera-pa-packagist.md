---
author: mos
category: php
revision:
  "2014-12-16": (D, mos) Nytt krav 6 om att modulen skall taggas på GitHub.
  "2014-12-08": (C, mos) Text om att välja modul som inte har externa beroenden.
  "2014-10-30": (B, mos) Uppdaterade krav 1 och la till krav 5.
  "2014-04-25": (A, mos) Första utgåvan inför version 2 av phpmvc-kursen.
updated: "2014-12-19 07:53:59"
created: "2014-04-25 14:49:42"
...
Utveckla ett PHP-paket och publicera på Packagist
==================================

Bygg en egen modul till ramverket Anax MVC och publicera det som ett paket via tjänsten Packagist. Dokumentera sedan hur någon annan skall göra för att använda din modul tillsammans med Anax MVC.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du är väl bekant med ramverket [Anax MVC](kunskap/anax-som-mvc-ramverk) och dess beståndsdelar och hur det används.

Du har läst igenom artikeln "[Bygg ut ditt Anax MVC med en egen modul och publicera via Packagist](kunskap/bygg-ut-ditt-anax-mvc-med-en-egen-modul-och-publicera-via-packagist)" för att hämta inspiration till denna uppgift.

Tipset är att du väljer en modul som inte har några externa beroenden. Det gör att din modul blir enklare att testa och hantera. Om du väljer att göra en modul med beroenden så får du en mer utmanande uppgift -- där du kan lära dig mer -- välj väg.



Krav {#krav}
-----------------------

1. Välj en modul som passar uppgiften. Utveckla den och lägg den i ett eget repo på GitHub. Bygg den med fokus på att passa in i Anax MVC.

2. Publicera repot som ett paket på Packagist.

3. Testa att din modul fungerar tillsammans med en standardinstallation av Anax MVC.

4. Dokumentera hur man gör för att använda din modul tillsammans med Anax MVC.

5. Om modulen är beroende av andra moduler eller tjänster så skall du använda dependency injection för att hantera det.

6. När du är klar så skall du tagga din modul på GitHub till version 1.0. Skapa taggen "v1.0" och pusha till GitHub -- på följande vis.

```bash
$ git tag -a v1.0 -m "This is the version for kmom05."
$ git push --tags
```



Extrauppgift {#extra}
-----------------------

Det finns inga extra uppgifter.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis.

Se till att du har tid att jobba med både Packagist, GitHub och composer. Du behöver lite extra tid till dessa nya system, inlärningstid. Det kan ta sin tid att koppla ihop saker.

**Lycka till och hojta till i forumet om du behöver hjälp!**




