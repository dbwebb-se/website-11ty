---
title: linux

author: mos
revision:
    "2016-09-09": (C, mos) Bytte till rätt kursnamn.
    "2015-08-03": (B, mos) Klar med texter för kursmomenten.
    "2015-03-02": (A, mos) Första revisionen inför kursstart HT2015.
...
Kursen linux (v1)
==================================

Kursen **Programmera webbtjänster i Linux**, a.k.a. *linux*, lär ut programmering med JavaScript och Node.js på serversidan i en Linux-miljö tillsammans med grunderna i operativsystemet Linux.

<!--more-->

Kursen har två fokus, dels att lära ut grunder och beståndsdelar i operativsystemet Linux och dels att lära ut programmering med JavaScript och Node.js i en Linux-miljö. Kursen är för de som skall jobba med webbprogrammering.

Kursen börjar med att du installerar en egen version av Linux. Därefter lär du dig de grundläggande koncepten i Linux såsom terminalen, filsystemet, process-begreppet och att installera tjänster och programvaror och servrar. Du skriver skript-program i programspråket BASH och via praktiska övningar lär du dig mer om grunderna i Linux.

Samtidigt bygger du upp en utvecklingsmiljö för JavaScript och Node.js. Du utforskar Node.js API och via praktiska övningar programmerar du JavaScript-servrar och tjänster som sedan körs i din Linux-miljö.

I slutet av kursen får du visa dina färdigheter i ett praktiskt programmeringsprojekt.



Krav på labbmiljö {#labb}
------------------------

I kursen installerar du en operativsystemet Linux på din egna maskin med virtualiseringssystemet VirtualBox. Du behöver ha en dator med minst 8GB internminne för att det skall fungera bra. Med mindre internminne tar det längre tid att genomföra övningarna och det kan kännas trögt.

Du kan också genomföra installationen på en annan dator, en äldre laptop till exempel. Eller så kan du använda dig av virtuella servrar som du installerar på egen hand.

Kort och gott, du skall installera en linux-server och du behöver ha en tillräckligt bra miljö för att det skall fungera utan bekymmer.



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> Avklarad kurs i Programmering med JavaScript 7.5hp samt ytterligare en avklarad programmeringskurs i godtyckligt programmeringsspråk om 7.5hp. 



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* Installation av Linux och Linux som server. Paket och pakethantering 
* Installation av servrar likt webbserver, databas, PHP, sshd.
* Linux med terminal (bash), ssh, vim, och systemkommandon.
* Operativsystemets olika delar såsom filsystemet, processer och processhantering.
* Skriptprogrammering i bash
* JavaScript och Node.js.
* Programmering i Linux-nära miljö med JavaScript och Node.js - filsystem och processer.
* Felsökning och tekniker att debugga sitt program.
* Utvecklingsmiljö och verktyg för utveckling med JavaScript, Node.js i en Linux-miljö.



Mål {#mal}
------------------------



###Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* påvisa grundläggande förståelse för operativsystemet Linux genom att skriftligen beskriva och sammanfatta erfarenheter och observationer från övningar och projekt.
* påvisa goda kunskaper i att använda JavaScript på serversidan tillsammans med Node.js och Linux genom att tillämpa dessa tekniker i praktiska övningar och projekt.



###Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* självständigt utveckla, dokumentera och presentera ett projekt baserat på programmering med JavaScript, Node.js i en Linux-miljö.
* ha god praktisk förmåga att hantera de verktyg och miljöer som används vid utveckling och felsökning för JavaScript, Node.js i en Linux-miljö.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


###Kmom01: Linux som server. {#kmom01}

Det första kursmomentet går ut på att installera Debian/Linux och logga in på maskinen som en server, via SSH.

För att lyckas med det så behöver du bekanta dig med grunderna i terminalen och lära dig ett par av de viktigaste kommandona som utförs i terminalen.

[Instruktion till kursmoment 01](kurser/linux-v1/kmom01).



###Kmom02: Apache Virtual Hosts. {#kmom02}

Nu har vi en Linux-server. Låt oss installera ett par webbplatser på den. Det låter som en vettig syssla för en webbprogrammerare.

Ett bra sätt att installera många webbplatser på en och samma maskin är Apache Virtual Hosts och det är något vi skall bekanta oss med.

Samtidigt behöver vi bekanta oss med fler Unix-kommandon så vi känner oss hemma i terminalen, SSH och att jobba med Linux som en server.

[Instruktion till kursmoment 02](kurser/linux-v1/kmom02).



###Kmom03: Skript med Bash. {#kmom03}

Mycket handlar om att förenkla vardagen som programmerare genom att automatisera de processer och rutiner man utför. En hel del av det vi gör kan automatiseras via skript, till exempel bash-skript med kommandon. Men för att göra det behöver vi ha koll på hur man skapar skript och hur man programmerar i bash.

[Instruktion till kursmoment 03](kurser/linux-v1/kmom03).



###Kmom04: Server med Node.js. {#kmom04}

Nu har vi en Linux-server, en webbserver och vi kan grunderna i att bygga skript i bash. Låt oss nu kika på en annan sak, hur man bygger egna servrar i Linux med Node.js.

Så, vi behöver starta med att installera Node.js på servern och komma igång med hur Node.js fungerar. Vi kör på med några övningar och sedan ser vi hur man byggger upp en enkel webbserver, eller webbtjänst, med Node.js. Vi närmar oss ett gränsland där webbservern blir till en webbtjänst. Det blir tydligt i hur vi använder Node.js för att skapa kod som både hanterar webbservern som sådan och lägger till tjänster som utförs av javaScript-funktioner.

[Instruktion till kursmoment 04](kurser/linux-v1/kmom04).



###Kmom05: Webbtjänst med RESTful API. {#kmom05}

Nu har vi en Linux-server, en webbserver, vi kan grunderna i att bygga skript i bash och vi kan bygga servrar med Node.js. Låt oss fortsätta titta på serverprogrammering i Node.js och se hur en mer renodlad webbtjänst kan se ut och fungera.

Du kommer få en färdig server och ett RESTful API till servern. Din uppgift är att bygga en klient till servern, enligt en kravspecifikation. Så är upplägget. Låt se hur bra vingarna bär.

[Instruktion till kursmoment 05](kurser/linux-v1/kmom05).



###Kmom06: Klient och server. {#kmom06}

Du bygger vidare på dina kunskaper om webbtjänster och programmerar nu båden en klient och en server och ser hur koden fördelar sig mellan klient och server.

[Instruktion till kursmoment 06](kurser/linux-v1/kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](kurser/linux-v1/kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?

Det finns en [översikt av kurslitteratur per kurs](kunskap/oversikt-av-kurslitteratur-per-kurs).



###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har jag valt följande bok, tillsammans med ett antal artiklar som finns tillgängliga på nätet. 

Det finns läsanvisningar i samband med varje kursmoment.


* **[The Linux Command Line](kunskap/boken-the-linux-command-line)** -- William Shotts  
  En lättläst och trevlig bok med öppen licens som gör att boken finns tillgänglig fritt på bokens webbplats. Boken ger en bra introduktion till nybörjaren i Linux, systemkommandon och terminalen.



###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter.


* **[The Debian Administrator's Handbook, Debian Wheezy from Discovery to Mastery](kunskap/boken-the-debian-administrator-s-handbook)** -- Raphaël Hertzog, Roland Mas  
  En gedigen referensmanual för den som är allvarlig med att lära sig Linux.

* **[JavaScript: The definitive Guide](kunskap/boken-javascript-the-definitive-guide)** -- D. Flanagan  
  En tegelsten, komplett med allt du vill veta om språket JavaScript med dess Core, DOM och eventhantering, inklusive en referens till olika funktioner. Perfekt för dig som verkligen vill JavaScript.

* **[JavaScript: The Good Parts](kunskap/boken-javascript-the-good-parts)** -- D. Crockford  
  En genomgång av JavaScript Core och hur man ska, och inte ska, skriva sin kod.


  


Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment.

| Kursmoment | The Linux Command Line | The Debian Administrator's Handbook |
|------------|------------------------|-------------------------------------|
| Kmom01     |                        |                                     |
| Kmom02     |                        |                                     |
| Kmom03     |                        |                                     | 
| Kmom04     |                        |                                     |
| Kmom05     |                        |                                     | 
| Kmom06     |                        |                                     | 
| Kmom10     |                        |                                     |

Dessutom har varje kursmoment läsanvisningar i artiklar och videos. 



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

<!--
För dig som studerar på distans finns det en [rekommenderad studieplan](kurser/linux/studieplan). Du kan behöva anpassa den rekommenderade planen till dina egna datum och förutsättningar. 
-->

Läser du kursen som en del i ett kurspaket så finns det en [studieplan som är kopplad till kurspaketet](webutv#studieplan).

Går du på campus får du en lektionsplan i samband med kursstart.

Det finns ett särskilt dokument som ger lite [utförligare beskrivning av planeringen av kursen och viktiga hållpunkter](kurser/lektionsplan-och-rekommenderad-studieplan).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning). 



Lärarstöd och handledning {#handledning}
----------------------------------------

I distanskurserna är forum och chatt de viktigaste källorna för handledning. Vi har samlat information om handledning och hjälp-till-självhjälp i ett eget dokument.

Läs om hur [handledning och hjälp-till-självhjälp fungerar på dessa kurser](kurser/lararstod-och-handledning).  



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [jag jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Du hittar [kursplanen genom att söka på kurskoden DV1547 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1547).
