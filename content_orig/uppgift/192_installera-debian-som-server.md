---
author: mos
category:
    - unix
revision:
    "2021-12-10": (A, lew) Uppdatering inför ht22
...
Installera Debian som server
==================================

Installera Debian som en server och kom igång och logga in på systemet med SSH.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har installerat en labbmiljö motsvarande "[Installera labbmiljön](vlinux/labbmiljo)".



Introduktion {#intro}
-----------------------

Du skall spara alla filer i ditt kursrepo i katalogen `me/kmom01/install`. De används för att redovisa uppgiften.

Skapa en fil, `log.txt`, och lägg den i katalogen ovan. I kraven nedan kallas denna fil för *loggen*. I filen skall du föra noteringar för din egen del. Det kan vara bra som minnesanteckningar, så går det enklare nästa gång du installerar ett liknande system.

En bra sak är att logga varje kommando du kör, så får du en logg som du kan titta tillbaka på. Det är lätt att glömma alla nya kommandon, så en logg för minnet blir bra.

Det finns ett par saker som du måste skriva i filen `log.txt`, det står isåfall i kraven nedan. Men i övrigt så skriver du anteckningar som du vill.



Krav {#krav}
-----------------------

1. Installera Debian. Notera i loggen vilket namn du ger servern.

2. Logga in på din server. Notera i loggen vilken ip-adress servern har.

3. På servern, kör kommandot `uname -a`, notera svaret i loggen.

4. Öppna en terminal på din arbetsstation. Använd SSH för att logga in på servern. När du är inloggad så kör du kommandot `cowsay` med en trevlig hälsningsfras. Ta en skärmdump av terminalfönstret som visar resultatet. Spara bilden i formatet PNG och lägg filen i samma katalog som loggfilen, döp den till `ssh.png` (använd små bokstäver i filnamnet, inte STORA).

5. Publicera dina svar enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb publish install
```

Dubbelkolla att du kan öppna länken som visas av kommandot publish i en webbläsare, samt lyckas visa bilden i en webbläsare. Loggen är skyddad och kan inte visas via webbläsaren.



Extrauppgift {#extra}
-----------------------

* Spela in en [asciinema](https://asciinema.org/) när du gör kravet 4) ovan. Länka till din asciinema från din loggfil.



Tips från coachen {#tips}
-----------------------

Stressa inte. Kör det ihop sig så är det en bra taktik att börja om från början och göra om. Det går snabbare andra gången, och ännu snabbare tredje gången.

Lycka till och hojta till i forumet om du behöver hjälp!
