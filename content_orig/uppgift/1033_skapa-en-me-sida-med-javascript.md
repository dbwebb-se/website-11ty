---
author: mos
category:
    - webbprogrammering
    - kursen dbjs
revision:
    "2017-01-04": (A, mos) Kopierad från javascript1 till dbjs, omskriven för dbwebb-cli version2 och mer generell.
...
Skapa en me-sida med JavaScript
==================================

Skapa en enkel me-sida med HTML, CSS och JavaScript. Me-sidan är till för dina redovisningstexter och för att samla dina exempelprogram.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Skapa din egen Sandbox för JavaScript testprogram](uppgift/skapa-din-egen-sandbox-for-javascript-testprogram)" och du har initierat ditt kursrepo för kursen.



Krav {#krav}
-----------------------

Det finns en mall för redovisningssidan som du kan utgå ifrån. Börja med att kopiera den på följande sätt.

```text
# Gå till kurskatalogen
cp -ri example/redovisa me
```

Jobba nu vidare i katalogen `me/redovisa`.

1. Uppdatera filen `me.html` så att den innehåller en kort presentation av dig själv, och bifoga en bild, på dig själv eller något annat trevligt. Byt ut bilden som finns nu. Krångla inte till det. Du kan uppdatera sidan under kursens gång, allt eftersom du lär dig mer.

1. Titta igenom filen `redovisning.html` och uppdatera den om du vill. I denna filen skall du skriva dina redovisningstexter efter varje kursmoment.

1. Lägg till en ny fil, `om.html` och lägg in den som en del i din webbplats. Inkludera sidan i navigeringen. I sidan skriver du kort om kursen och varför denna webbplatsen finns och du lägger till en bild i den sidan.

1. Lägg till en footer som syns i alla sidor, i footern skall du ha länkarna till validatorerna.

1. Du kan uppdatera stylesheet och eventuellt JavaScript under `style` och `js`. Det är inte nödvändigt, gör det om du vill och känner att du har tid. Du kan även uppdatera längre fram i kursen.

1. Kontrollera att me-sidan validerar enligt HTML och CSS.

1. Gör en dbwebb publish för att kolla att allt validerar och fungerar.

```text
dbwebb publish me
```



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter om du har tid och lust.

1. Styla till din me-sida och redovisningssida så att de ser "snygga" ut, eller lite galna. Det kan vara trevligt att ha denna sidan som en referenssida när du är klar med kursen.

1. Gör en ny sida som länkar till dina exempelprogram i kursen. Så det blir enkelt att nå dem.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
