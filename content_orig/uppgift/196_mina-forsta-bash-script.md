---
author: lew
category: unix
revision:
  "2015-08-05": (A, lew, mos) Första utgåvan i samband med kursen linux.
updated: "2015-07-03 14:41:00"
created: "2015-07-03 14:38:33"
...
Mina första Bash-script
==================================

Du skall skapa ett antal skript i Bash som utför bestämda saker.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har kunskaper motsvarande kapitel 24 "Writing Your First Script" i [boken The Linux Command Line](kunskap/boken-the-linux-command-line) eller motsvarande ["Writing Shell Scripts"](http://linuxcommand.org/lc3_wss0010.php).



Introduktion {#intro}
-----------------------

De filer du skapar och använder i denna uppgiften skall du spara i ditt kursrepo i katalogen `me/kmom03/script`. De används för att redovisa uppgiften.

Samtliga skript skall vara körbara, så se till att sätta rättigheterna på skripten så de blir körbara.



Krav {#krav}
-----------------------

1. Skapa ett skript `hello.bash` som skriver ut texten "Hello World\n".

1. Skapa ett script `argument.bash` som skriver ut det inskickade argumentet. Ex: "./argument.bash testa mig" ska skriva ut "testa mig".

1. Skapa ett skript `if_1.bash` som hanterar ett argument, en siffra, som kollar om argumentet är större än 5 med hjälp av en if-sats. Ex: `./if_1.bash 7` ska returnera "7 is greater than 5" och `./if_1.bash 3` ska returnera "3 is NOT greater than 5".

1. Skapa ett skript `if_2.bash` som hanterar ett argument, en siffra, och skriver ut "Higher!" om argumentet är högre än 5, "Lower!" om det är lägre och "Same!" om det är samma.

1. Skapa ett script `argument_2.bash` som hanterar olika argument.

    1. Om argumentet är "d" så ska "date" skrivas ut, dvs dagens datum
    1. Om argumentet är "n" ska scriptet skriva ut alla siffror från 1 till 20, tips: {1..20}.
    1. Om argumentet är "a" ska nästa argument skrivas ut, om man skickar in två argument. Om man inte skickat in två argument skall följande skrivas ut "Missing argument".

1. Skapa ett script `forloop.bash` som skriver ut talen 10 till 20 med hjälp av en forloop.

1. Skapa ett script `myFunction.bash` som innehåller en funktion, `greet()`. Kalla på funktionen som ska skriva ut "Hello $USER".

1. Publicera dina svar enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb publish script
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




