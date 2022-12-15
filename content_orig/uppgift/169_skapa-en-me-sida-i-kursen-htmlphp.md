---
author: mos
category:
    - webbprogrammering
    - html
    - css
    - php
    - kurs htmlphp
revision:
    "2018-06-19": "(D, mos) Genomgången och finjusterad inför ht18."
    "2015-08-24": "(C, mos) Ändrade hur filer flyttas från `me` till `me1`."
    "2015-08-06": "(B, mos) Stycke om validate och publish."
    "2015-04-29": "(A, mos) Första utgåvan i samband med kursen htmlphp v2."
...
Skapa en me-sida i kursen htmlphp
==================================

Bygg en enkel webbplats för kursen htmlphp i form av en me-sida med HTML, CSS och PHP.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Gör en me-sida med HTML, CSS och PHP](kunskap/skapa-en-webbsida-med-html-css-och-php)".



Introduktion {#intro}
-----------------------

Du skall skapa din egen version av en me-sida, på samma sätt som görs i nämnda artikel ovan.

Du skall spara alla filer i ditt kursrepo i katalogen `me/kmom01/me1/`. Du börja med att utgå från de filer du jobbade med i artikeln.

```text
# Ställ dig i rooten av kursrepot
cd me/kmom01
rsync -av me/ me1/
```

Kommandot `rsync` tar en kopia av katalogen `me/` och sparar alla filerna i `me1/`.

Nu har du din bas du kan utgå ifrån. När du är klar skall alla filer finnas i katalogen `me/kmom01/me1/`.



Validera och publicera {#validate}
-----------------------

Koden som du skriver skall laddas upp på studentservern med kommandot `dbwebb`. Det gör du på följande sätt.

```text
# Ställ dig i kurskatalogen
dbwebb validate me1
dbwebb publish me1
```

Kommandot `dbwebb validate` kör igenom ett antal valideringsverktyg som kontrollerar hur din kod ser ut. Om valideringsverktygen anser att du skriver felaktig kod så får du varningar som du behöver rätta till.

Om du inte förstår varningarna så försöker du hitta svar till dem. Eller så frågar du i forumet. Denna typen av verktyg som gör statisk kodvalidering är viktiga verktyg för en professionell utvecklare.

Kommandot `dbwebb publish` gör samma sak som `dbwebb validate` samt att det dessutom publicerar din webbplats på studentservern. När din webbplats publiceras så minifieras också dess innehåll. Minifiering innebär att koden komprimeras och onödiga delar som kommentarer tas bort.

Kör dessa kommandon ofta, så slipper du få en lång lista med varningar, precis när du trodde du var klar. 

Nu kan du köra igång med själva uppgiften. Du hittar kraven nedan.



Krav {#krav}
-----------------------

1. Din webbplats skall innehålla motsvarande innehåll som visas i artikeln.

2. Din webbplats skall ha samma katalogstruktur som den som visas i artikeln.

3. Länka till validatorerna i din footer.

4. Sidan skall validera enligt Unicorn.

5. Din webbplats skall ha en header med en bild, en titel och en slogan.

6. Det skall finnas en favicon.

7. Det skall finnas en navbar.

8. Organisera din kod i `header.php` och `footer.php`.

9. Skapa en egen byline och lägg i botten av varje sida.

10. Du skall skriva en presentation av dig själv på första sidan. Det räcker med 10-15 rader, det behöver inte vara så avancerat. Lägg gärna dit en bild som representerar dig själv.

11. Förbered din redovisningssida så att den innehåller rubriker för samtliga kursmoment. Ha alla redovisningarna på en sida.

12. Validera och publicera din kod enligt följande.

```text
# Ställ dig i kurskatalogen
#dbwebb validate me1
dbwebb publish me1
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

* Lägg lite tid på din text, skriv bra och välformulerat. [*Lorem Ipsum*](https://sv.wikipedia.org/wiki/Lorem_ipsum) text är inte okey.
* Snygga till din style så den blir tilltalande och använd fler bilder.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
