---
author: mos
category:
    - kurs webtec
revision:
    "2021-06-15": "(A, mos) Första utgåvan."
...
Skapa en responsiv webbplats med HTML och CSS
===================================

Du skall bygga en responsiv webbplats med HTML och CSS för att träna på olika koncept och konstruktioner med HTML och CSS.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "Skapa en One-page-website".

Du har grundläggande kunskap om hur man bygger responsiva webbplatser.



<!--
Genomgång {#genom}
------------------------

Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

Du skall göra en responsiv webbplats som består av tre sidor där webbplatsen har en enhetlig stil och layout.

Du kan själv välja vad webbplatsen skall handla om och du behöver själv hitta text och bilder som är representativa för webbplatsen. Det är inte tillräckligt att fylla webbplatsen med [Lorem Ipsum](https://www.lipsum.com/) text.

Låt din webbplats handla om dig själv, din hobby, ett påhittat företag eller verksamhet. Du behöver inte fylla i mycket material med text och bilder, det går bra att vara sparsam.

Om du är osäker på vad webbplatsen skall handla om så kan du låta den handla om dig själv som student i denna kursen och lägga upp sidorna enligt följande.

1. En sida där du presenterar dig själv med bild. Du han hitta på saker och låta sidan vara "påhittad".

1. En rapportsida med redovisningstexterna. Denna kan du göra enligt två kolumn layout och länka internt i dokumentet.

1. En om-sida där du skriver lite text om själva kursen, länkar till kursrepot och din rapportsida samt kompletterar med några bilder. Denna kan du göra som en tre-kolumners sida.



Krav {#krav}
-----------------------

Utför följande krav.

1. Spara alla filerna i ditt kursrepo under `me/htmlcss`.

1. Skapa en webbplats med tre webbsidor. Döp förstasidan till `index.html`.

<!--
1. Skapa en webbplats med tre webbsidor. Döp förstasidan till `home.html`.

1. Sidorna skall validera i Unicorn.
-->

1. Alla sidor skall ha en enhetliga layout och utseende.

1. Sidorna skall ha en favicon.

1. Sidorna skall ha samma eller liknande header. Det skall finnas en titel på webbplatsen, en logo och/eller en bakgrundsbild. Du kan ha olika bakgrundsbilder på olika sidor, eller låta någon sida vara utan bakgrundsbild. Headern har dock en enhetlig stil.

1. Sidorna skall ha en navbar så att man kan klicka och navigera mellan webbplatsens sidor.

1. Sidorna skall ha en gemensam footer. Placera en copyright text i footern tillsammans med länkar till validatorer. Kopiera gärna de footers du gjort i onepage-uppgiften och styla dem så att det ser ut som en footer.

1. Fyll de tre sidorna med innehåll såsom till exempel text och bilder.
    1. En av sidorna skall vara en-kolumn layout.
    1. En av sidorna skall vara två-kolumn layout.
    1. En av sidorna skall vara tre-kolumn layout.

1. Din sida skall inte lida av effekter som kan lösas med clear float eller clearfix.

1. Din sida skall inte lida av effekter av "hoppande" sidor på grund av skrollbaren eller minsta höjd.

1. Footern skall innehålla länkar till validatorer, cheatsheet och manualer.

1. Använd media queries för att bygga din webbplats responsivt. Sidan skall ha flytande brytpunkter där det krävs för att stödja olika bredder på webbläsaren såsom bred skärm, desktop, läsplatta och mobil.

1. Besvara följande frågor i din redovisningstext.

    * Berätta hur det gick att lösa uppgiften, var något extra svårt, lurigt, krångligt eller flöt det på smidigt?
    * Är det något som du är extra nöjd med i ditt resultat från uppgifterna?



Publicera {#publicera}
-----------------------

Avsluta uppgiften så här.

1. När du är klar kan du publicera resultatet med `dbwebb publish htmlcss`.

1. Testa ditt resultat så att det passera de automatiska testerna med `dbwebb test htmlcss`.
