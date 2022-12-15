---
author: sylvanas
category: webbprogrammering
updated: "2014-04-10 08:53:01"
created: "2014-04-08 14:41:12"
...
Att koppla upp dig mot en server med SSH via terminalen
==================================

Som en webbkodare kommer man i många fall i kontakt med den så kallade *command line*.

Command line interface (CLI) handlar om att via text ge datorn instruktioner, kommandon, om vad den ska utföra för uppgifter. T.ex ansluta till MySQL, klona ett gitrepo eller starta ett js-script. Men för att kunna göra detta på skolans server, via dess command line, behöver du först ansluta till servern via SSH.

<!--more-->

Denna guide går genom hur du ansluter till BTH's servern via SSH i de tre olika miljöerna som finns tillgängliga, samt via Chrome och Firefox.

[FIGURE src=/image/sylvanas/sshguide/puttyloggedin2.png caption="Inloggad på studentservern genom PuTTY"]


Anslut i Windows {#Windows}
--------

### PuTTY - en SSH-klient {#win-putty}
För att kunna ansluta till BTH's servern via SSH i Windows så behövs en klient som kan hantera detta. I denna guide kommer jag att använda mig av klienten [PuTTY](http://www.putty.org/).
Du kan enkelt antingen bara ladda ner **putty.exe** för Windows och köra den direkt, eller använda deras installer för Windows. Dessa hittar du på [PuTTY's download-sida](http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html).

Det finns även andra klienter, så som [KiTTY](http://www.9bis.net/kitty/) som fungerar på liknande sätt.

När man startar PuTTY ser det ut såhär:
[FIGURE src=/image/sylvanas/sshguide/puttystart.png caption="Start-up för PuTTY"]

### Ansluta till servern {#win-anslut}
För att ansluta till servern så behöver du fylla i vart du ska ansluta.
Börja med att fylla i *Host Name* till `dittakronym@ssh.student.bth.se` där du byter ut `ditt-akronym` mot ditt eget användarnamn på BTH.
För att spara inställningarna för denna anslutning så du enkelt kan ansluta igen utan att behöva ange *host name* på nytt, fyll i ett namn, t.ex `BTH`, i *Saved Sessions* och tryck på `Save`-knappen.
När detta är gjort så bör det se ut ungefär såhär:
[FIGURE src=/image/sylvanas/sshguide/puttysettings.png caption="Klara inställningar i PuTTY"]

Nu är du redo att ansluta. Tryck på `Open`-knappen. Nu kommer PuTTY att skapa en anslutning till servern, och öppna ett commandline-fönster. Den kommer att be dig om ditt lösenord, vilket är samma som för övrigt inloggning på BTH. När du har fyllt i detta så bör det se ut ungefär såhär:
[FIGURE src=/image/sylvanas/sshguide/puttyloggedin2.png caption="Inloggad på studentservern genom PuTTY"]

Nu är du ansluten till studentservern via terminal och kan gå vidare.

Anslut i Unix {#unix}
--------

### Terminalen {#unix-terminal}
Om du sitter på ett Unix-system så är du förhoppningsvis lite bekant med terminaler sen innan.
Är du inte det så borde du kunna hitta ett program som heter något i stil med *term*, *terminal*, *konsol*, *console* eller liknande via ditt operativsystems sökvertyg. Ett vanligt snabb-kommando är även `Ctrl+Alt+T` för att öppna detta.

Detta är min *prompt*, och din ser nog ungefär likadan ut (det skiljer sig lite från terminal till terminal) och det är här vi skriver in våra kommandon:

```bash
janeypie@Sapphire:~$
```

Prompten anger i mitt fall mitt användarnamn (`janeypie`), vad datorn heter (`Sapphire`), och vart jag står i mappstrukturen (`~`, hemkatalogen).

### Ansluta med kommandot `ssh` {#unix-ssh}
För att ansluta till skolans server behöver vi använda kommandot ssh med host-parameter. Host är alltså namnet på den dator du vill koppla upp dig mot. För att göra det enklare för oss så lägger vi även till vårat användarnamn, akronym:

```bash
ssh jast10@ssh.student.bth.se
```

När du sedan skickar detta kommando (genom att trycka på enter) så frågar den efter ditt lösenord, vilket är samma som för din vanliga inloggning. När du har fyllt i detta bör du nu vara ansluten till skolans server genom terminalen och prompten visar då att du är på den servern:

```bash
seekers~: 
```

Nu kan du gå vidare.


Anslut i OS X {#mac}
------------

På en Mac finns terminalen för-installerad. Du hittar den genom att söka efter "terminal".
 
1.	Klicka på förstoringsglaset.
2.	Skriv "terminal".
3.	Klicka på första träffen som kommer upp.
 
[FIGURE src=/image/snap/macos-starta-terminalen.jpg?q=100 caption="Så här startar du ett terminalfönster på din Mac."]
 
Applikationen ligger i katalogen `/Applications/Utilities/Terminal`.
 
Så här ser fönstret ut när du öppnat applikationen Terminal.
[FIGURE src=/image/snap/macos-terminalen.jpg?q=100 caption="Ett terminalfönster på din Mac."]
 
Nu kan du öppna en koppling mot studentservern genom att skriva `ssh dittakronym@ssh.student.bth.se` och trycka på enter. Därefter skriver du in ditt lösenord (det vanliga för din BTH-login), varefter du blir inloggad på server.
[FIGURE src=/image/snap/macos-terminalen-ssh.jpg?q=100 caption="Ett terminalfönster på din Mac, på väg att öppna upp en ssh-koppling mot studentservern."]

OS X är baserat på Unix och terminalen fungerar ungefär lika i båda typerna av system. Så om du blir bekant med den i ena miljön kommer du att ha mindre problem även i den andra.

Anslut i webbläsaren {#webb}
--------------------

Vi lever i webbläsarens era och händigt nog för oss så finns det även plugins och addons som underlättar för oss. Med dessa kan du ansluta med SSH och simulera en terminalmiljö oavsett vilket operativsystem du sitter på. Här följer 2 exempel, ett för Chrome och ett för Firefox.

### Anslut i Chrome {#chromessh}
Appen som jag använder för att ansluta i Chrome heter Secure Shell och du kan hitta och installera den via [Chrome Web Store](https://chrome.google.com/webstore/search-apps/secure%20shell). Du hittar den sedan bland dina appar `chrome://apps/`.
Såhär ser det ut för mig när jag fyller i mina uppgifter:
[FIGURE src=/image/sylvanas/sshguide/chromessh.png?w=w2 caption="Inloggning till SSH via Secure Shell addon i Chrome"]


### Anslut i Firefox {#firessh}

Även Firefox har ett addon för att ansluta med SSH. Det heter FireSSH och du hittar den på [Mozilla's Addon-sida](https://addons.mozilla.org/en-us/firefox/addon/firessh/). Lägg till den till Firefox och starta om webbläsaren. Du startar den sedan via `Tools -> Web Developer -> FireSSH` (eller motsvarande på svenska).
Såhär ser det ut för mig:
[FIGURE src=/image/sylvanas/sshguide/firessh.png?w=w2 caption="Inloggning till SSH via FireSSH i Firefox"]

Det här är två exempel på appar och addons som finns. Det är fritt fram för dig att prova på fler när du känner dig redo för det. Självklart går det bra att leta upp liknande till andra webbläsare. Tipsa gärna i forumet om du hittar några bra!


Avslutningsvis {#avslut}
--------------

Nu har du lite olika verktyg för att ansluta med ssh.
Det finns ett foruminlägg för [denna artikel](t/2255) om du vill diskutera, kommentera eller ställa frågor.

Revisionshistoria {#rev}
-----------------
<span class='revision-history' markdown='1'>
2014-04-10 (A, Sylvanas) Första utgåvan.  
</span>
