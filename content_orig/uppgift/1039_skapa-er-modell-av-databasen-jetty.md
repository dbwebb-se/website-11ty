---
author: mos
category:
    - databas
    - ER-modellering
    - kursen dbjs
revision:
    "2017-02-17": (B, mos) Förtydligade om logisk modell och beskriv hur fakturor skapas.
    "2017-01-16": (A, mos) Första utgåvan.
...
Skapa ER-modell av databasen Jetty
==================================

Du skall rita en ER-modell av en databas som du tidigare jobbat med i andra övningar. Det är en enkel modell som kan fungera som din första ER-modell.

Du kan lösa uppgiften genom att jobba i grupp, men var och en gör sin egen inlämning.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Denna uppgift ingår i kursen [dbjs](kurser/dbjs).

Du har jobbat igenom artikeln "[Kokbok för databasmodellering](kunskap/kokbok-for-databasmodellering)".

Du har gjort uppgiften [SQL lab, introduktion till SQL](uppgift/sql-lab-introduktion-till-sql-dbjs).



Introduktion {#intro}
-----------------------

Du skall skapa en modell av databasen Jetty, så som den ser ut i laborationen du gjort, tillsamman med någon utökningar.

Vill du kopiera text från labben så går det bra.

Du skall jobba enligt grundtankarna i de stegen som visas i artikeln "Kokbok för databasmodellering".
 
Du skall presentera resultatet i din me-sida.



Krav {#krav}
-----------------------

1. Skapa en ny fil `me/redovisa/jetty.html`. Titeln och rubrik för webbsidan blir "Databasen Jetty för båtklubben XXX". Byt ut XXX mot namnet på din påhittade båtklubb. Dokumentera nu i den filen allt du här gör.

1. Skapa en rubrik "Konceptuell modell" och inled med ett textstycke om databasen. Se konceptuell modellering steg 1.

1. I din beskrivning, utöka så det blir tydligt att båtklubben skall skicka fakturor till medlemmarna och behöver spara undan medlemmarnas fulla namn och adress.

1. Dra ett streck under varje entitet (i texten) och skapa en lista över alla entiteter. Se konceptuell modellering steg 2.

1. Skriv ned alla relationer i en lista (du behöver inte skapa en matris). Se konceptuell modellering steg 3.

1. Förbättra din lista med relationer och lägg till en kardinalitet i listan. Se konceptuell modellering steg 5.

1. Ta din lista med entiteter och utöka med attribut samt notera vilka attribut som är kandidatnycklar.

1. Gör en ny rubrik "Logisk modellering" och inled med en lista som visar tabellerna, kolumnerna samt primära och främmande nycklar. Se logisk modellering steg 7 och 8.

1. Rita en bild (på papper eller med ritprogram) som visar din logiska ER-modell med tabeller, relationer med kardinalitet samt kolumner, primära och främmande nycklar. Se logisk modellering steg 7 och 8.

1. Infoga bilden i din webbsida.

1. Se till att din sida ser snygg och strukturerad ut.

1. Skriv ett stycke som förklarar vilka tabeller som är inblandade när du skapar fakturan. Hur har du tänkt att lösa fakturagenereringen? Skriv text och eventuell SQL-psuedokod.

1. Avsluta med att skriva namnet på alla som jobbade i din grupp, eller notera om du jobbade ensam.

1. Avslutningsvis, validera och publicera.

```bash
# Ställ dig i kurskatalogen
dbwebb publish redovisa
```

Rätta de felen som dyker upp. Sen är du klar.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Lycka till och ställ frågor i forumet om du behöver hjälp!
