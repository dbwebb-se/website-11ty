---
author:
    - mos
category:
    - texteditor
    - felsökning
revision:
    "2019-02-01": "(A, mos) Första versionen"
...
Spara fil med rätt teckenkodning, radslut och soft spaces
==================================

I dbwebb-kurser används normalt en och samma texteditor till alla kurser och när den installeras för första gången så visas ett antal viktiga inställningar som måste göras.

Det handlar främst om följande inställningar:

* UTF-8 NOBOM
* Radslut Unix style
* Soft tabs, tab längd 4 mellanslag

Låt oss gå igenom dem och ge en kort förklaring till dessa.

<!--more-->

Om du vill gå vidare och göra dessa inställningar i [texteditorn Atom så går du till installationsartikeln och Grundinställningar](kunskap/installera-texteditorn-atom#grund).

Här tänker jag mest förklara hur de olika inställningarna påverkar din fil och hur den tolkas, samt länkar till installationsguiden för Atom hur du gör för att sätta inställningen.



Teckenkodning och UTF-8 NOBOM {#utf8bom}
------------------------------------

När en texteditor sparar en fil, eller öppnar en fil, eller skapar en ny fil, så har den inställningar som säger vilket format den skall använda för teckenkodningen.

Vi skall använda teckenkodningen UTF-8 NO BOM (byte order mark). Låt se vad det innebär.



### Om teckenkodning {#teckenkodning}

Teckenkodning handlar om hur man sparar tecken som "Aa" och "Öö" på fil. Det finns en ASCII tabell som översätter ett tecken till en siffra som kan lagras i en fil på disk.

Här ser du en tabell för hur bokstäverna översätts till siffror, beroende av vilken teckenkodning som används.

Följande gäller en utökad ASCII tabell, till exempel för ISO-8859-1 som är en teckenkodning som inkluderar svenska tecken.

| Tecken | Siffra | Hex | Förklaring |
|:-----:-|-------:|----:|------------|
| `\t`   |   9    | 09  | Tab        |
| `\n`   |  10    | 0a  | NL radbrytning |
| A      |  65    | 41  |            |
| a      |  97    | 61  |            |
| Ö      | 214    | d6  |            |
| ö      | 246    | f6  |            |

Den teckenkodning vi väljer är UTF-8 NO BOM (byte order mark). Dess tabell ser ut så här.

| Tecken |  Hex   | Förklaring |
|:-----:-|-------:|------------|
| `\t`   |     09 | Tab        |
| `\n`   |     0a | NL radbrytning |
| A      |     41 |            |
| a      |     61 |            |
| Ö      |  c3 96 |            |
| ö      |  c3 b6 |            |

Den stora skillnaden är att teckenkodning enligt UTF-8 kan använda två eller fler hexadecimala värden till att spara ett tecken på fil. Det är för att UTF-8 omfattar fler tecken än det är möjligt att representera med värdet 00-FF, 256 tecken.

Vi kan bäst se skillnaden om vi gör en fil och lagrar den på disk och sedan ser hur den ligger lagrad på disk, tecken för tecken.



### Exempel med teckenkodning {#exteckenkodning}

Vi tar följande data som en fil, tre rader med text.

```text
HEJ
Aa
Öö
```

Vi skapar filen i Atom och döper den till `test_utf8-nobom.txt`. Det ser ut så här.

[FIGURE src=img/snapvt19/atom-test-utf-8-no-bom.png caption="Texten ser ut som den ska, inuti texteditorn och vi ser att texteditorn använder UTF-8 som teckenkodning."]

Med kommandot `hexdump` kan vi se filens innehåll, som den sparas på disken, representerat i hexadecimala värden.

```text
$ hexdump -C test_utf8_nobom.txt 
00000000  48 45 4a 0a 41 61 0a c3  96 c3 b6 0a              |HEJ.Aa......|
0000000c
```

Vänstra kolumnen är positionen i filen, sedan kommer hexadecimala värden som representerar varje tecken och till höger är det en utskrift av tecknet, enligt en standard ASCII-tabell. Sista raden i filen är antalet tecken som filen innehåller, 0c vilket är 12 tecken.

Försök mappa tecken mot tecken enligt den ASCII tabell som gäller för UTF-8 och du kommer se att alla tecken finns på plats i filen.

Om vi nu gör samma sak, men sparar filen enligt teckenkodning ISO 8859-1 så ser innehållet i texteditorn ut så här.

[FIGURE src=img/snapvt19/atom-test-iso8859-1.png caption="Texten ser ut som den ska, inuti texteditorn och vi ser att texteditorn använder ISO 8859-1 som teckenkodning."]

Vi tittar på filens innehåll på disk, vi ser att denna filen innehåller 0a (10) tecken, två färre.

```text
$ hexdump -C test_iso8859-1.txt 
00000000  48 45 4a 0a 41 61 0a d6  f6 0a                    |HEJ.Aa....|
0000000a
```

Jämför ovan hex-koder med teckentabellen för ISO 8859-1 så ser du att alla tecken finns i filen.

Den stora skillnaden mellan de olika exemplen är alltså hur tecknet Öö lagras i filen.

Detta är inget problem när man sitter själv på sin dator, men när man flyttar filen till ett annat system, en annan dator eller ett annat program, eller till en annan användare, då måste man vara överens om vilken teckenkodning som gäller, annars kommer mottagaren att riskera att tolka filens innehåll på ett felaktigt sätt.



### Ställ in texteditorn till UTF-8 NO BOM {#stallinutf8}

Man skall ställa in sin texteditor till att använda ett visst format för teckenkodning.

Här kan du se hur man ställer in [Atom till att bli UTF-8 NO BOM som standardinställning](https://dbwebb.se/kunskap/installera-texteditorn-atom#utf8).



FUNDERA PÅ ATT GÖRA FLERA ARTIKLAR, EN FÖR VARJE.



Har du frågor eller funderingar, eller vill bidra med tips, så finns en [forumtråd för detta tips](t/7185).
