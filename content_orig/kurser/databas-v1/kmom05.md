---
views:
    flash:
        region: flash
        template: default/image
        data:
            src: "image/snapvt18/bank2-account-actions.png?w=1100&h=300&cf&c=600,270,5,0&f=grayscale&f1=pixelate,3,1"
author: mos
revision:
    "2019-02-18": "(D, mos) Uppdaterat och ny uppgift inför vt19."
    "2018-12-19": "(C, mos) Uppdaterat läsanvisning utgåva 2 av kursbok."
    "2018-02-13": "(B, mos) Ny uppgift, skapa grunden till eshop, flyttad från kmom04."
    "2018-01-11": "(A, mos) Första utgåvan."
...
Kmom05: Procedur och trigger
====================================

Vi går vidare och nu handlar det om att programmera en databas med <!--inbyggda integritetsregler, -->lagrade procedurer och triggers. Dessa konstruktioner ger oss ökade möjligheter att formulera vår SQL-kod i mer avancerade programmeringskonstruktioner och automatiserande hantering av datat i databasen.

Det ger oss också möjligheten till inkapsling av SQL-koden och publicera ett API som kan användas av de klienter som vill åt databasen. Detta gör att databaskoden och dess interna representation kan skyddas från klienterna som enbart jobbar mot databasen via ett API bestående av lagrade procedurer.

Vi ser hur man bygger upp en CRUD-baserad webbklient med HTML-formulär som ger användaren möjlighet att skapa nya rader i databasen, ta bort dem, redigera dem och visa dem. CRUD står för Create, Read, Update, Delete.

Avslutningsvis så påbörjar du implementationen av din Eshop genom att skapa databasen och påbörja byggandet av en webbklient och en terminalklient.

<!--more-->

[FIGURE src=image/snapvt18/bank2-account-actions.png?w=w3 caption="Nu förberedd med ikoner för att göra edit och delete."]

[FIGURE src=image/snapvt18/bank2-edit-account-details.png?w=w3 caption="Nu kan jag uppdatera detaljer om kontot."]


<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs &amp; Studera  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*



### Föreläsningar {#flas}

Titta på följande inspelade föreläsningar.

1. [Tidstämplar i databastabell](./../forelasning/tidstamplar) visar hur tidstämplar kan fungera i en databastabell och hur de kan få sitt värde per automatik.

1. [Lagrade procedurer och programmera i databasen](./../forelasning/lagrade-procedurer) introducerar framförallt hur man jobbar med lagrade procedurer i databasen för att kombinera variabel, SQL och mer sedvanliga programmeringskonstruktioner.

1. [Trigger i databasen](./../forelasning/trigger) om konceptet "programmera i databasen" och hur triggers passar in i den möjligheten.

<!--

Föreläsning om JS hur koppla lagrad procedur.

Föreläsning om normalisering? (flytta läsanvisningen från kmom04)

menyklienten command "product" to show all products.

Förtydliga mer hur invadd skall fungera.

Förtydliga om invdel skall fungera, eventuellt byt till invremove och plocka bort item tills 0, eller minus kanske. Jobba med softdelete och inte delete.

Gör det jättetydligt vad som skall fungera.
-->



### Kurslitteratur {#kurslitteratur}

Läs följande:

1. [Databasteknik](kunskap/boken-databasteknik)
    * Kap 13. Integritetsvillkor
    * Kap 15: Lagrade procedurer
    * Kap 16: Aktiva databaser och triggers

Vissa av kapitlen finns i [bokens webbkurs](http://www.databasteknik.se/webbkursen/), del 2.



### MySQL dokumentation {#mysqldoc}

Bekanta dig med följande:

1. I manualen för MySQL kan du läsa om lagrade procedurer (stored procedures) och triggers, det är främst följande kapitel som är relevanta, bekanta dig med dem, du kommer att träna på begreppen i kommande övningar.
    * [24.1 Defining Stored Programs](https://dev.mysql.com/doc/refman/8.0/en/stored-programs-defining.html)
    * [24.2 Using Stored Routines (Procedures and Functions)](https://dev.mysql.com/doc/refman/8.0/en/stored-routines.html)
    * [24.3 Using Triggers](https://dev.mysql.com/doc/refman/8.0/en/triggers.html)



### Modellering {#artiklar}

Läs följande.

1. Läs igenom foruminlägget om "[Vad välja som primärnyckel till en databastabell](t/6439)?", det ger en snabb orientering i hur man kan tänka när man väljer primärnyckel i en tabell.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



### Övningar {#ovningar}

Genomför följande övning för att förbereda inför uppgifterna.

1. Jobba igenom "[Lagrade procedurer i databas](kunskap/lagrade-procedurer-i-databas)" för att lära dig om lagrade procedurer och vad du kan göra med dem. Spara dina exempelprogram i `me/kmom05/prog`.

1. Jobba igenom "[Triggers i databas](kunskap/triggers-i-databas)" för att lära dig om vad du kan göra med triggers och hur de fungerar. Spara dina exempelprogram i `me/kmom05/prog`.

1. Jobba igenom "[CRUD med Express, MySQL och lagrade procedurer](kunskap/crud-med-express-mysql-och-lagrade-procedurer)" som visar hur ett webbgränssnitt kan se ut där du kan lägga till, uppdatera och ta bort rader i en tabell. Spara de exempelprogram du gör i `me/kmom05/crud`.


<!--
* Loop i compound statement
* Sp anropa annan Sp.
* Hantera SP med INOUT/OUT variabler i JS
* Hantera SQL variabler in till JS
* Hantera SP med flera resultsets
-->



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Bygg databasen till en Eshop (del 1)](uppgift/bygg-databasen-till-en-eshop-del-1)" som låter dig implementera din ER-modell och skapa databasen tillsammans med en terminalklient och en webbklient. Spara all kod under `me/kmom05/eshop1`.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Gick det bra att komma igång med lagrade procedurer och triggers?
* Hur är din syn på att "programmera" på detta viset i databasen, jämför med traditionell SQL som exponeras i klienten?
* Skriv ett kort stycke (2-5 meningar) om lagrade procedurer och om triggers där du förklarar begreppen (fördel, nackdel, användningsområde) för en som inte är insatt.
* Något att kommentera kring arbetet med att komma igång och implementera CRUD i webbklienten?
* Berätta om hur det gick att utföra uppgiften med din Eshop, berätta även vem du jobbade i grupp med, om någon?
* Vilken är din TIL för detta kmom?

<!--
* Ser du fördelar med inbyggda integritetsregler, ser du även nackdelar?
-->
