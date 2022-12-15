---
author: mos
category: python
revision:
  "2015-08-25": (C, mos) Uppdaterade till dbwebb v2.
  "2014-08-21": (A, mos) Första utgåvan i samband med kursen python.
updated: "2015-08-25 12:38:06"
created: "2014-07-03 07:35:33"
...
En me-sida i python som cgi-skript
==================================

Gör en me-sida i Python, dels som ett vanligt skript och dels som ett cgi-skript.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Installera en labbmiljö till Python](kunskap/installera-en-labbmiljo-till-python)".



Introduktion {#intro}
-----------------------



###Om me-sidan {#me}

En me-sida är är något vi brukar använda i kurserna för att presentera oss, redovisa våra uppgifter och lämna in de uppgifter som skall redovisas. Allt som ligger i kurskatalogen under `python/me` brukar vi kalla vår me-sida. Du skall nu bekanta dig med följande filer och börja att fylla dem med ditt eget innehåll. Allt för att skapa din egen me-sida till python-kursen.

| Fil              | Innehåll                      |
|------------------|-------------------------------|
| `me.py`          | En presentation av dig själv. |
| `redovisning.py` | Dina redovisningstexter för kursmomenten. | 

Du kan se på mina filer som exempel, de som heter `mos-me.py` och `mos-redovisning.py`. Kör dem och se vad som händer.

Du kan uppdatera innehållet i dessa sidor under kursens gång, allt eftersom du lär dig mer.



###Me-sidan som cgi {#me-cgi}

Det finns även två cgi-skript som du kan studera som exempel, `mos-me.cgi` och `mos-redovisning.cgi`. Du kan publicera dem för att testa dem via webbservern.

```bash
# Gå till roten av kurskatalogen för python
dbwebb publish me
```

Leta reda på dem via länken och klicka på dem i din webbläsare.

Tittar du på dem så ser du att mina filer inte innehåller någon HTML-kod, bara text. När du gör dina egna filer så räcker det bra med text, du behöver inte skriva HTML-kod. Men det går bra om du vill. Välj själv beroende på vad du kan. I denna kursen kanske det är enklare att hålla sig till ren text.



Krav {#krav}
-----------------------

1. Skriv en presentation i din me-sida `me.py`. 

2. Gör en webb-variant av `me.py` och spara den som `me.cgi`.

3. Förbered din redovisningstext för kursmomentet i `redovisning.py`. 

4. Gör en webb-variant av `redovisning.py` och spara den som `redovisning.cgi`.

5. Testa så att det blev rätt. Validera och publicera.

```bash
# Gå till roten av kurskatalogen för python
dbwebb validate me
dbwebb publish me
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Det finns ingen extra uppgift.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




