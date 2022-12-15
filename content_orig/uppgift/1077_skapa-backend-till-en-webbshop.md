---
author:
    - lew
    - mos
category:
    - php
    - kurs oophp
    - anax-lite
revision:
    "2017-04-21": "(A, lew, mos) Första utgåvan."
...
Skapa backend till en webbshop
==================================

Du ska skapa grunden till en webbshop, backend-delen, den delen som administratören använder för att lägga in och administrera produkter och lagervärde. Du skall även skapa vissa delar i databasen för varukorg och orderhantering, delar som i ett senare skede kan användas av en webbshop frontend för att ge användare möjlighet att shoppa i din webbshop.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du är väl bekant med Anax Lite.

Du har jobbat igenom följande övningar:

* "[Transaktioner i databas](kunskap/transaktioner-i-databas)"
* "[Lagrade procedurer i databas](kunskap/lagrade-procedurer-i-databas)"
* "[Triggers i databas](kunskap/triggers-i-databas)"
* "[Egen-definierade funktioner i databas](kunskap/egen-definierade-funktioner-i-databas)"



Introduktion {#intro}
-----------------------

Du skall bygga ett CRUD-baserat adminsgränssnitt samt träna på att programmera i databasen via lagrade procedurer, funktioner, triggers och transaktioner.



###Webbshop {#webbshop}

[FIGURE src=/image/oophp/v3/webbshop.png?w=w1&q=70 caption="Ett exempel på en webbshop."]

För att få en förståelse för vad som förväntas kan du kika på [devdungeon's webbshop](https://shop.devdungeon.com/). Det du ser är frontenden till en webbshop där användaren kan se produkter, lägga dem i en varukorg och beställa dem genom att checka ut och betala.

Din uppgift är att bygga backenden till en sådan webbshop. Den delen som administratören ser. Det handlar mestadels om ett CRUD-gränssnitt för att hantera produkter, deras lagerstatus, ordrar, fakturor och leveranser. Du skall lösa en delmängd av detta.

Vad som ska säljas i din affär bestämmer du själv. Det kan vara kläder, djur, elektronik m.m. Tänk på upphovsrätten om du lånar material från nätet.



###Databasen {#databasen}

I en föreläsning gick Mikael igenom ett case med en databas för ehandel. Om du tittar på den så får du en databasmodell som du kan återanvända, eller låna ideér från.

[Kika på föreläsningen](https://youtu.be/fqC_VQh_E74?list=PLKtP9l5q3ce8Bhxn22oBYWZZ4-3ms1rMl&t=1425) (det börjar 23:30 in i klippet och håller på till cirka 1:05:00).

SQL-koden som används hittar du bland föreläsningsanteckningarna som [example/sql-eshop.sql](repo/slides/vt17/example/sql-eshop.sql). Du kan använda den som bas om du vill, eller så bygger du din egen, välj ditt fokus.

Hur du väljer att modellera din databas, vilka tabeller du använder, är helt upp till dig själv.



###Programmera i databasen {#progdb}

En viktig del i uppgiften är att träna på att använda lagrade procedurer, inbyggda funktioner, triggers och transaktioner. Försök finna där dessa kan användas på ett "tillräckligt vettigt" sätt.

Du kan även använda dessa konstruktioner på din övriga databaskod i Anax Lite.

Du kan alltså delvis lösa uppgiften genom att skriva om din gamla databaskod. Var tydlig i redovisningstexten om du gör på det viset.



Krav {#krav}
-----------------------

1. Skapa en backend till en webbshop som kan nås av en inloggad administratör. Ha en länk i din navbar till webbshoppen.

1. Du skall använda minst en lagrad procedur, en egendefinierad funktion, en trigger och en transaktion. Skapa en fil `anax-lite/sql/setup-webshop.sql` där du sparar all SQL-kod.

1. Lägg till minst 5 produkter av minst två olika kategorier i databasen. En produkt skall ha en beskrivning, bild, kategori, pris, lagerstatus.

1. Skapa ett gränssnitt i Anax Lite där man kan göra CRUD på produkter och lager.

1. Skapa ren SQL för att implementera en varukorg. Man skall kunna lägga till/ta bort en produkt i en varukorg. Man skall kunna visa varukorgens innehåll.

1. Skapa ren SQL för att göra en order baserat på en varukorg. Man skall kunna visa innehållet i en order och ta bort en order. När en varukorg övergår till en order skall du även "flytta" motsvarande antal produkter från lagret till ordern.

1. Lägg in stöd så att databasen har koll på när du behöver beställa nya produkter. När en produkt har färre än 5 produkter i lagret så lägger du in en rad, tillsammans med en tidsstämpel för när det hände, i en speciell tabell där du kan se vilka produkter som behövs beställas. Skapa SQL för en rapport som visar de produkter du skall beställa.

1. Skriv dokumentation i `anax-lite/sql/setup-webshop.md` som visar hur man använder ditt SQL API mot databasen för att jobba med varukorg, order och rapporten för beställning.

1. Validera och publicera.



Extrauppgift {#extra}
-----------------------

1. Gå igenom din gamla SQL-kod och se om det finns fler möjligheter att programmera i databasen. Fundera sedan över om detta är ett bra sätt eller ej, fördelar och nackdelar.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
