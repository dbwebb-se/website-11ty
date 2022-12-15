---
author: lew
revision:
    2019-04-11: (A, lew) Första utgåvan inför HT19.
...
Ett bash script med options, command och argument
===================================

Du skall skapa ett bash script som tar emot options och argument.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom övningen "[Skapa Bash-skript med options, command och arguments](kunskap/skapa-bash-skript-med-options-command-och-arguments)".

<!-- Du har läst kurslitteraturen och skaffat dig grundläggande kunskaper om bash. Du har gjort uppgifterna "[Lab2](uppgift/linux-lab-2-sok-i-en-logg-fil)". -->



Introduktion {#intro}
-----------------------

Du ska skapa ditt eget `commands.bash` script som tar emot options och arguments. Scriptet kan använda inbyggda bash funktioner.


[INFO]
**TIPS.**
Använd [guiden](guide/kom-igang-med-bash) om du kör fast.
Lär dig använda manualen `man`.
[/INFO]



Krav {#krav}
-----------------------

1. Skapa ett bash-script `script/commands.bash` som kan ta emot options och argument. Anropas ditt script utan options eller argument, skall scriptet skriva ut att man kan få hjälp genom att använda `--help, -h`.

1. Ändra rättigheter för scriptet genom kommandot `chmod 755 script/commands.bash`

1. Ditt script skall avslutas med korrekt exit värde.

1. Använd en main-funktion för att starta programmet.

1. Strukturera koden i olika funktioner.

1. Följande *options* ska fungera:

| Option                | Vad skall hända |
|-----------------------|-----------------|
| `-h, --help`          | Skriv ut en hjälptext om hur programmet används. |
| `-v, --version`       | Visar nuvarande version av programmet. |

7. Följande *argument* ska fungera:

| Argument&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| Vad skall hända |
|-----------------------|-----------------|
| `cal`          | Skriv ut en kalender. |
| `uptime`      | Visa resultatet av systemets inbyggda uptime.|
| `greet`       | Skriv ut en hälsningsfras till den nuvarande användaren.|
| `loop <min> <max>`| Skriv ut siffrorna mellan &lt;min&gt; och &lt;max&gt; med hjälp av en forloop. |
| `lower <n n n...>`| Skriv ut alla siffror som är mindre än 42. Antalet inskickade tal ska inte spela någon roll.|
| `reverse <random sentence>`| Skriv ut argumentet baklänges (ecnetnes modnar).|
| `all`| Kör samtliga funktioner i följd. Värdena väljer du själv. Jobba gärna på att få till en trevlig presentation.|




Validera ditt `commands.bash` script genom att göra följande kommandon i kurskatalogen i terminalen.

```bash
# Flytta till kurskatalogen
$ dbwebb validate script
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.  



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.

<!-- 1. Skapa kommandot `starwars` som i sin tur kör kommandot `telnet towel.blinkenlights.nl`

OBS! Om du har cygwin i Windows kan du behöva installera `telnet` genom att köra kommandot `apt-cyg install inetutils`. -->



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i Discord om du behöver hjälp!
