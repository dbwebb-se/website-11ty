---
author:
    - mos

views:
    block-about: null

revision:
    "2018-01-11": (A, mos) Kursen ersätts med kursen databas.
...
Kmom06: Index och prestanda
==================================

I samband med utvecklingen av version 2 av dbjs bestämdes att istället sammanfoga kursen med "[kursen databas](kurser/databas-v1)".

<!--stop-->

[WARNING]
**Kursutveckling pågår inför vt18.**
[/WARNING]

Detta kursmoment erbjuder en introduktion till hur databasen internt jobbar för att optimera de SQL-frågor du skriver och hur du bör använda index för att optimera din databas.

<!--more-->

[FIGURE src=image/snapvt17/mysql-optimize.png?w=w2 caption="Optimering av en databas sker på många olika nivåer."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande i kurslitteraturen.

1. [Databasteknik](kunskap/boken-databasteknik)
    * Kap 9: Sammanfattning av SQL-kommandon
    * Kap 21: Index och prestanda

Vissa av kapitlen finns i [bokens webbkurs](http://www.databasteknik.se/webbkursen/), del 2.

Det finns ytterligare ett kapitel i boken som är relaterat till prestanda, det går utanför kursens ram men läs vid intresse.
    * Kap 22: Fysiska lagringsstrukturer i databaser


<!--
Saker vi inte hanterat:

* Kap 13: Säkerhet i databaser
-->



###Artiklar {#artiklar}

Läs följande.

1. Bekanta dig översiktligt med de olika delarna av manualen i [MySQL om optimering](https://dev.mysql.com/doc/refman/5.7/en/optimization.html). Se vilka delar som kan optimeras och på vilket sätt. Skumma igenom de olika delarna.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Utför följande övningar för att träna inför uppgifter och projektet.

1. Jobba igenom övningen "[Index och prestanda i MySQL](kunskap/index-och-prestanda-i-mysql)" som tränar dig i hur du kan optimera dina databasfrågor med index. Spara dina testprogram i `me/kmom06/index`.

<!--
Artikel om hur man skriver bra SQL frågor på ett optimerat sätt.
-->


###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Fördjupa dig inom något område som rör optimering av (MySQL/MariaDB) databaser och skriv (reflektera) över det. Du kan lyfta upp någon mindre detalj som du finner extra intressant inom denna nischen och förklara, beskriva, exemplifiera, reflektera kring den. Skriv ca 30 meningar och det får bli din redovisningstext för detta kursmoment. Besvara även fråeställningen: Om du hade skrivit en artikel om prestanda i databaser, vad hade den handlat om? Vad hade du valt att dyka ned djupare i?

<!--
Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "Snabba upp en databas". Både index och optimera frågor.

Potentiell som en lab (mot MySQL)?

-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Uppgiften löser själva redovisningstexten, uppgiften är en skrivuppgift.

<!--
Se till att följande frågor besvaras i redovisningstexten.

* Gick det bra att jobba igenom artikeln om index, fick du förståelse för 
-->
