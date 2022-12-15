---
author: mos
category: python
revision:
  "2015-08-25": (F, mos) Uppgraderade till dbwebb v2.
  "2015-02-05": (E, mos) Tog bort extrauppgift med [Alice som blev en egen uppgift](uppgift/din-egen-chattbot-marvin-steg-analysera-text-och-ord),
    lade till extrauppgift med kodade rader.
  "2015-02-02": (D, mos) Ändrar cd-kommendot så det flyttar till rätt katalog.
  "2014-08-27": (C, mos) Ändrar hur uppgiften kopieras från start och skrev om lite
    text.
  "2014-08-16": (B, Sylvanas) lade till extrauppgifter.
  "2014-07-03": (A, mos) Första utgåvan i samband med kursen python.
updated: "2015-08-25 14:04:29"
created: "2014-07-03 07:57:07"
...
Din egen chattbot - Marvin - kryptera och dekryptera
==================================

Programmering och problemlösning i Python. Lär Marvin lite mer, denna gången om kryptering och dekryptering.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i Python med listor och dictionaries och du har byggt [fjärde delen av Marvin](uppgift/din-egen-chattbot-marvin-steg-analysera-text-och-ord).



Introduktion {#intro}
-----------------------

[ROT13](http://sv.wikipedia.org/wiki/ROT13) är enkelt chiffer som flyttar varje bokstav 13 positioner framåt.

[Caesarchiffer](http://sv.wikipedia.org/wiki/Caesarchiffer) är en variant av ROT13 där man väljer antalet positioner som bokstaven skall flyttas.

Det räcker om du enbart använder det engelska alfabetet i uppgiften, A-Z och a-z.

Boken [Invent your games with Python](kunskap/boken-invent-your-own-computer-games-with-python) har i kapitel 14 en beskrivning av Ceasar Chiper.

Boken "Invent with Python: Learn to program by hacking ciphers" har två kapitel som kan vara bra att kika på:

* [The Caesar Cipher](http://inventwithpython.com/hacking/chapter6.html)
* [Hacking the Caesar Cipher with the Brute-Force Technique](http://inventwithpython.com/hacking/chapter7.html)



Krav {#krav}
-----------------------

Utgå från din kod i katalogen `me/kmom05/marvin4` och bygg vidare där.

```bash
# Ställ dig i roten av kurskatalogen
cd me/kmom05/marvin4
```

2. Lär Marvin koda om en sträng med ROT13.

3. Lär Marvin koda Ceasarchiffer med valbart antal teckens justering.

4. Lär Marvin knäcka ett Ceasarchiffer den hårda vägen genom att visa upp alla alternativ och låta användaren bestämma vilket som är rätt antal teckens justering. Du knäcker ett Ceasarchiffer genom att ta en krypterad sträng och "kryptera baklänges", det vill säga att du shiftar -1, -2, -3 och så vidare med alla möjliga justeringar.

5. Validera Marvin genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb validate marvin4
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar. 




Extrauppgift {#extra}
-----------------------

1. Använd följande rader och lär Marvin att automatiskt dekryptera dem. Använd ordlistor och din kunskap om *letter frequency* för att göra Marvin smartare. 

```text
R UXEN VH TRCCH,
FR DBMMR EHOXL FX,
CXPNCQNA FN'AN BX QJYYH,
OBR OZKOMG QOFSTFSS.
PDKQCD IU DAWZ DWO OQOLEYEKJO,
FTMF U WQQB GZPQD YK TMF,
AR ITMF YUSTF TMBBQZ,
DA D NCMVIF OJ OCZ NDUZ JA V MVO.
ZFBI. J'N QSFUUZ TVSF NZ DBU XPVME FBU NF.
```



Tips från coachen {#tips}
-----------------------

Lär dig felsöka med debuggern, använd den när du får problem. Komplettera med utskrifter av `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!




