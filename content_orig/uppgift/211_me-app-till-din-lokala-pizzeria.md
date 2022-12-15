---
author: mos
category: webbprogrammering
revision:
  "2015-12-04": (A, mos) Första utgåvan i samband med kursen webapp.
updated: "2015-12-04 10:39:12"
created: "2015-12-04 10:38:40"
...
Me-app till din lokala pizzeria
==================================

Din lokala pizza-leverantör fick nys om att du kunde det där med webb och mobila appar. De ringde upp dig och frågade om du kunde göra en prototyp till deras mobila webapp. Deras tanke är att kunderna kan se menyn och kanske till och med beställa direkt från appen.

De lockar med fri pizza för dig så länge de använder appen. Fixar du det?

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har förkunskaper som motsvarar de fyra första kursmomenten i kursen webapp.



Introduktion {#intro}
-----------------------

Spara din app i katalogen `me/kmom05/pizza`.

Du kan använda ett annat tema än "pizza", välj vad du vill, sushi kanske?

Uppgiften är fri, så när du saknar information så tar du själv ett beslut och dokumenterar det i redovisningstexten.

Prioritera så att du hinner lösa uppgiften inom tidsramarna.

Behöver du inspiration? Bild-googla "pizza appen" så får du en mängd bilder på hur det kan se ut. Eller installera en pizza-app på din mobil, det finns redan ett stort utbud och genom att studera dem kan du skapa en uppfattning om hur du kan lösa uppgiften.



Krav {#krav}
-----------------------

1. Välj mellan jQuery Mobile och Mithril som teknisk grund för din app.

1. Välj hur mycket innehåll som ligger i JSON och hur mycket du kodar in direkt i sidan.

1. Det skall finnas en förstasida med bild och text om din kund.

1. Det skall finnas en sida med kontaktuppgifter och bild på restaurangen.

1. Det skall finnas en meny och varje rätt på menyn skall ha en egen sida med bild, text och pris. Det skall finnas minst 10 rätter på menyn.

1. Det skall finnas en varukorg, beställning. När man tittar på menyn skall man kunna välja att lägga rätten i sin beställning.

1. Det skall finnas en sida som visar nuvarande beställning.

1. Du skall kunna ta bort en rätt från beställningen.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate pizza
dbwebb publish pizza
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Lägg lite extra tid på att göra följande extrauppgifter.

* Gör så man kan lägga till extra saker på varje beställning, till exempel extra kött på kebabpizzan vilket kostar 10 SEK.
* Installera din meapp på hemmaskärmen på din egen mobil och testa hur det fungerar.
* Jobba med stylen så att den motsvarar din kunds profil.
* Lägg till extra funktioner som du själv anser passar in i appen.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




