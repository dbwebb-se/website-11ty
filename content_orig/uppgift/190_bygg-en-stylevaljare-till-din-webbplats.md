---
author: mos
category: php
revision:
  "2016-01-13": (B, mos) Slog ihop krav 1 och 2.
  "2015-06-03": (A, mos) Första utgåvan i samband med kursen htmlphp v2.
updated: "2016-01-13 15:35:46"
created: "2015-05-20 14:52:06"
...
Bygg en styleväljare till din webbplats
==================================

Uppgiften bygger på ett exempelprogram av en multisida och en styleväljare. Du skall bygga ut styleväljaren med fler funktioner och en ytterligare stylesheet.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Att bygga en styleväljare till sin webbplats](kunskap/att-bygga-en-stylevaljare-till-sin-webbplats)" samt "[Vanliga CSS-konstruktioner som är bra att kunna](kunskap/vanliga-css-konstruktioner-som-ar-bra-att-kunna)".



Introduktion {#intro}
-----------------------

Du skall bygga ut den multisida som visas i artikeln ovan. Du skall lägga till fler funktioner.

Börja med att ta en kopia från exempelkoden som följer med artikeln.

```bash
# Ställ dig i rooten av kursrepot
cp -ri example/stylechooser/* me/kmom04/stylechooser/
```

Nu har du din bas du kan utgå ifrån. Spara alla dina filer i katalogen `me/kmom04/stylechooser`.

[INFO]
**Tips.**

Att visa aktivt val i en select/option-lista, lägg till attributet `selected` på den option som skall visas som vald när sidan laddas.

```html
<select name="style">
    <option value="default">Default style</option>
    <option value="second" selected>Second style</option>
</select>
```
[/INFO]



Krav {#krav}
-----------------------

1. Lägg till en ny undersida som enbart visar en dropdown med knapp för att välja stylesheet (ingen text runtomkring). Använd POST och en processingsida. Dropdownen skall visa den aktiva stylesheeten som vald.

1. Lägg till ytterligare en stylesheet.

1. Den nya stylesheeten skall vara färgglad.

1. Den nya stylesheeten skall använda sig av nedladdningsbara fonter.

1. Den nya stylesheeten skall använda sig av en bakgrundsbild/textur.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i roten av kurskatalogen
dbwebb publish stylechooser
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

* Byt ut knappen för att submitta formuläret mot ett JavaScript som submittar formuläret varje gång du byter till ett annat värde.

```html
<select onchange="form.submit();">
```



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




