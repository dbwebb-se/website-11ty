---
author: sylvanas
category: unix
revision:
  "2015-01-13": (B, mos) Flyttad från textdokument till dbwebb.
  "2014-11-06": (A, jane) Skapad för campus oophp.
updated: "2015-01-13 10:51:42"
created: "2015-01-13 10:24:40"
...
Övningar i Unix och terminalen
==================================

En övning för att komma igång med terminalen och enklare Unix-kommandon. Flytta runt i katalogstrukturen, skapa nya kataloger och filer och lär dig hitta information om grundläggande funktioner.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["20 steg för att komma i gång med Unix och terminalen"](kunskap/20-steg-for-att-komma-i-gang-med-unix-och-terminalen). 



Introduktion {#intro}
-----------------------

Frågorna är markerade beroende på vilka svar som ska ges:

* C - Svara endast med kommandot.
* Q - Teoretisk fråga, svara på frågan. Notera att det kan finnas instruktioner du ska genomföra innan du anger svaret.
* CQ - Svara både med kommandot och svaret på frågan.

Så här kan det se ut.

1. Logga in på studentservern. (C)

```text
ssh akronym@ssh.student.bth.se
```

Logga först in på studentservern som startpunkt för övningarna.



Övningar {#ovning}
-----------------------

1\. Vilken katalog står du i efter inloggning? (CQ)

```text
 
```

2\. Vilka andra kataloger finns i din hemkatalog? (CQ)

```text
 
```

3\. Nämn en dold fil i din hemkatalog. (CQ)

```text
 
```

4\. Vad står `~` för? (Q)

```text
 
```

5\. Gå till katalogen för kmom01 htmlphp (där me.php finns). (C)

```text
 
```

6\. Vilken encoding har filen me.php? (CQ)

```text
 
```

7\. Vilka rättigheter har me.php? (CQ)

```text
 
```

8\. Vad är det numeriska värdet för rättigheterna på me.php? (Q)

```text
 
```

9\. Skapa en ny katalog i www som heter test. (C)

```text
 
```

10\. Gå in i den nya katalogen. (C)

```text
 
```

11\. Vilka filer finns i din nya katalog? (CQ)

```text
 
```

12\. Vad står filen `.` för? (Q)

```text
 
```

13\. Vad står filen `..` för? (Q)

```text
 
```

14\. Skapa en ny fil i katalogen test. (C)

```text
 
```

15\. Öppna filen och skriv "Hello world" och spara filen. Öppna sidan i webbläsaren (www.student.bth.se). Vad är adressen till filen? (Q)

```text
 
```

16\. Ändra filens rättigheter så att den inte är läsbar. (C)

```text
 
```

17\. Vad händer när man visar filen i webbläsaren? (Q)

```text
 
```

18\. Ändra rättigheterna för katalog test så att den inte är exekverbar. (C)

```text
 
```

19\. Kan du fortfarande visa filen i webbläsaren? (Q)

```text
 
```

20\. Kan du visa katalogen test i webbläsaren? (Q)

```text
 
```

21\. Ändra rättigheter på katalogen test så att den är exekverbar men inte läsbar. (C)

```text
 
```

22\. Kan du fortfarande visa filen i webbläsaren? (Q)

```text
 
```

23\. Kan du visa katalogen test i webbläsaren? (Q)

```text
 
```

24\. Lägg till ett alias `ctest` som flyttar dig till katalogen www/test, oavsett var du står. Skapa ytterligare ett alias som heter `chome` som flyttar dig till din hemkatalog. (C)

```text
 
```

25\. Testa dina alias, visa vilken katalog som du hamnar i. (CQ)

```text
 
```

26\. Hur ser koden för din prompt ut? (CQ)

```text
 
```

27\. [Ändra din prompt](http://www.nparikh.org/unix/prompt.php#tcsh). Du lägger till det i filen .tcshrc genom att lägga till `set prompt = 'promtkod här'`. Hur ser koden ut? (Q)

```text
 
```

28\. Ladda om startup-filen. Hur visas prompten i terminalen efter ändringen? (CQ)

```text
 
```



Extrauppgift {#extra}
-----------------------

1. Gå till katalogen test (glöm inte att ändra tillbaka rättigheterna så att katalogen är både läsbar och exekverbar).
Skapa en enkel HTML-sida (index.html) med en separat CSS-fil (style.css) som ligger i en egen katalog (css/). Kontrollera att det fungerar att öppna sidan via webbläsaren. Länka till sidan. (Q)

```text
 
```




Tips från coachen {#tips}
-----------------------

**Lycka till och hojta till i forumet om du behöver hjälp!**




