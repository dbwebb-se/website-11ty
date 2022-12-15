---
author: mos
category:
    - databas
    - ER-modellering
    - nodejs
    - javascript
    - kursen dbjs
revision:
    "2017-02-16": (B, mos, efo) Utskrift av faktura.
    "2017-02-14": (A, mos) Första utgåvan.
...
Bygg en faktureringsmotor för båtklubben (invoice)
==================================

Du har sedan tidigare ritat en ER-modell för din båtklubb, du byggde ER-modellen så att båklubben skulle kunna skicka fakturor till sina medlemmar.

Nu är det dags att implementera din ER-modell som en databas. Samtidigt skall du skriva ett skript i Nodejs/JavaScript som kopplar sig till databasen och visar hur dina fakturor kommer att se ut.

Du kan diskutera med dina studentkollegor, men var och en skriver sin egen kodlösning.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har löst uppgiften "[Skapa ER-modell av databasen Jetty](uppgift/skapa-er-modell-av-databasen-jetty)". Det är den ER-modellen du nu skall implementera.

Du kan skriva kod och program som kopplar sig till SQLite via JavaScript i Nodejs.



Introduktion {#intro}
-----------------------

Här kommer lite grundinformation som hjälper dig att lösa uppgiften.



###Grunden {#grund}

I din båtklubb har du innehåll som motsvarar labben `sql1`.

Du har en ER-modell som lägger till tabeller som behövs för att du skall kunna skapa fakturor till medlemmarna.

När du går från ER-modellen till SQL så behöver du inte slaviskt följa din modell. Du kan välja alternativa vägar i din SQL, trots att du tidigare modellerat på ett visst sätt.

Du behöver fylla din databas med innehåll, så att du kan lösa uppgiften.



###Importera och exporta en databas {#impexp}

I kursrepot finns ett exempelprogram `example/sqlite-import-export` som visar hur du kan exportera ett schema och innehåll från en databas, till en fil med SQL-kommandon.

Exemplet visar även hur du kan jobba med kommentarer och SQL kommandon för att bygga en SQL-fil som du kan använda för att skapa/återskapa en databas.

Kika på det exemplet och försök förstå hur det fungerar och kanske kan du se hur du kan använda de kunskaperna för att delvis lösa denna uppgift.



###Faktura {#faktura}

De fakturor du nu skall skapa är ASCII-fakturor, det är ditt sätt att visa båtklubben att din lösning fungerar.

En faktura kan till exempel se ut så här.

```text
*================================================*
 FAKTURA                        Faktura nr: 1001
                                Datum: 2017-02-16

 Kund:                          Företaget:
 ----------                     ----------
 Adam                           Båtklubben
 Hajvägen 2                     Hamnen
 45753 Fiskebyn
 Kundnr: 34


 -------------------------------------------------
 Buster XXL, A1                              800:-
 Seadoo Spark, A2                            800:-
                                ------------------
                                Summa:      1600:-
                                Moms:        400:-
                                Totalt:     2000:-
```

Fakturorna skall skrivas ut av programmet.

Du behöver inte lagra undan fakturainformation om de genererade fakturorna i databasen, det räcker att du kan skriva ut fakturorna.



Krav {#krav}
-----------------------

1. Skapa en fil `db.sql` som innehåller all SQL DDL som behövs för att skapa schemat för din databas. Använd kommentarer för att göra det tydligt vad varje tabell skall innehålla.

1. I samma fil, lägg till SQL INSERT så att databasen fylls med innehåll. Använd kommentarer för att avgränsa filen så den blir tydlig.

1. Du kan nu skapa (om) din databas `db.sqlite` utifrån filen med SQL-kommandon, genom att använda kommandot `sqlite3` i terminalen.

1. Skapa ett Nodejs/JavaScript-program som läser från din databas och skriver ut ASCII-fakturor för alla klubbens medlemmar. Döp programmet till `index.js`.

1. Avslutningsvis, validera och publicera.

```bash
# Ställ dig i kurskatalogen
dbwebb publish invoice
```

Rätta de felen som dyker upp. Sen är du klar.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Lycka till och ställ frågor i forumet om du behöver hjälp!
