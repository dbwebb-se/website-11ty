---
author: mos
category: labbmiljo
revision:
  "2015-01-21": (F, mos) Förenklad installation av pakethanteraren `apt-cyg`.
  "2014-09-15": (E, mos) Lade till kommentarer vid installationen av Cygwin.
  "2014-09-08": (D, mos) Ändrade qawk till gawk.
  "2014-08-25": (C, mos) Cygwin skall ssh heta openssh.
  "2014-08-20": (B, mos) Cygwin installerar nu även ssh, rsync och nano per default,
    brew tar med wget och apt-get tar med wget och rsync.
  "2014-06-13": (A, mos) Första utgåvan.
updated: "2015-01-21 12:41:02"
created: "2014-06-12 09:49:54"
...
Kom i gång med terminalen som verktyg för webbutvecklaren
==================================

Kom i gång och installera en terminal som en del av din verktygslåda som utvecklare. Det finns terminaler oavsett om du sitter på Mac, Windows eller Unix/Linux. Via terminalen och en pakethanterare kan du sedan installera fler bra-att-ha program.

En terminal kan vara ett kraftfullt verktyg när du väl bekantat dig med den. Dessutom kan det vara en första introduktion till Unix för dig. Så, bli kompis med terminalen och lär dig installera extra program med pakethanteraren och ta ett par stapplande steg in i en underbar värld av Unix.

<!--more-->

Så här ser det ut när jag jobbar i terminalen.

[FIGURE src=/image/snapht14/terminal.png?w=w2 caption="Mikael använder terminalen som utvecklingsverktyg."]



Lär dig grunderna i Unix terminalen {#unix20}
--------------------------------------------------------------------

Tanken är att du nu installerar en terminal i Windows, eller börjar använda de som redan finns installerade i Mac eller Linux.

Terminalen i detta fallet är som ett eget litet Unix-system. Nåja, På Mac och Linux är det en del av operativsystemet men på Windows fungerar som ett eget litet Unix-operativsystem. Är du Windows-användare så är det alltså ett bra sätt att komma i gång med Unix.

När du gjort det behöver du lite guidning för att komma i gång och jobba i terminalen. Till din hjälp finns en guide "[20 steg för att komma i gång med Unix och terminalen](kunskap/20-steg-for-att-komma-i-gang-med-unix-och-terminalen)". Så, när du väl kommit igång med terminalen så kan du jobba igenom den guiden för att lära dig grunderna. Sedan är du på väg att bli bekant både med terminalen och med Unix.



Pakethantering i Unix {#paket}
--------------------------------------------------------------------

I Unix-världen installerar man ofta programvaror som paket via terminalen. Man använder en pakethanterare som vet var paketet finns att ladda ned och pakethanteraren löser också beroenden så att om ett paket är beroende av ett annat så installeras även det.

Det finns många olika varianter på pakethanterare men i samband med varje terminal så visar jag en variant av pakethanterare som fungerar för att installera en grundläggande labbmiljö för en webbutvecklare.

De grundpaket som du kommer att behöva (för att jobba med kurserna) är följande:

```bash
git wget nano rsync
```

Bra att ha program är följande:

```bash
lftp curl tmux irssi vim
```

Att lära ut vad varje program är bra för är utanför denna artikel. Låt oss nu komma i gång med terminalen och pakethantering i respektive terminal.



Terminal på Windows med Cygwin {#cygwin}
--------------------------------------------------------------------

[Cygwin](https://www.cygwin.com/) är både en terminal och ett Unix-liknande operativsystem som du kan köra på din Windows-maskin. Det är ett bra sätt att få tillgång till Unix-verktyg på din Windows-maskin.

Du behöver installera både CyGwin och en pakethanterare som heter `apt-cyg`. Pakethanteraren gör det enkelt för dig att installera fler program till ditt CyGwin.



###Installera CyGwin {#cygwin-inst}

[Ladda hem och installera Cygwin](https://www.cygwin.com/install.html) på din maskin och kör igenom installationsprogrammet. Välj installationsprogram som passar din maskin, 32 eller 64 bitar. 

Du behöver inte installera några extra saker. Det gör vi senare med pakethanteringen.

Det finns ett par videotutorials som visar hur jag installerar Cygwin med pakethanterare. Kika på dem om du fastnar i installationsfasen av Cygwin.

Här är första videon i [serien](https://www.youtube.com/playlist?list=PLKtP9l5q3ce9qI5ds_F5DGaz7oAoS7Isw).

[YOUTUBE src=-MQ8jsWkjQA width=630 caption="Mikael installerar Cygwin och pakethanteraren apt-cyg."]



###Pakethantering {#cygwin-paket}

Stegen för att installera pakethanteraren [`apt-cyg`](https://github.com/transcode-open/apt-cyg) är så här.

Starta en cygwin-terminal och kör följande kommandon, först det ena och sedan det andra.

```bash
lynx -source rawgit.com/transcode-open/apt-cyg/master/apt-cyg > apt-cyg
install apt-cyg /bin
```

Klart. Nu kan du testa att installera `git` och `wget` med `apt-cyg`.

```bash
apt-cyg install wget
apt-cyg install git
```

Läs mer om vad du kan göra med [`apt-cyg` på deras GitHub-sida](https://github.com/transcode-open/apt-cyg). 

Du kan också skriva in kommandot utan några argument, då får du en översikt av vad kommandot kan göra.

[INFO]
**Installationsprocessen** för `apt-cyg` är förenklad och jag använder här en nyare version av `apt-cyg` som dessutom är smidigare att installera (ändrad 2015-01-21).

Det innebär att videoserien innehåller delvis äldre information och har ett lite krångligare sätt att installera pakethanteraren (video 3 i serien).
[/INFO]



Terminal på Mac {#mac}
--------------------------------------------------------------------



###Terminalen {#mac-terminal}

På en Mac finns terminalen redan installerad. Du hittar den genom att söka efter "terminal".
 
1.  Klicka på förstoringsglaset.
2.  Skriv "terminal".
3.  Klicka på första träffen som kommer upp.
 
[FIGURE src=/image/snap/macos-starta-terminalen.jpg?q=100 caption="Så här startar du ett terminalfönster på din Mac."]
 
Applikationen ligger i katalogen `/Applications/Utilities/Terminal`.
 
Så här ser fönstret ut när du öppnat applikationen Terminal.
[FIGURE src=/image/snap/macos-terminalen.jpg?q=100 caption="Ett terminalfönster på din Mac."]
 
OS X är baserat på Unix och terminalen fungerar på samma sätt.



###Pakethantering {#mac-paket}

Det saknas pakethanterare till Mac men [Homebrew](http://brew.sh/) är en sådan som du enkelt kan installera. Läs på om vad Homebrew är och installera det på din maskin.

När du väl installerat Homebrew så kan du testa att installera git och wget.

```bash
brew install git
brew install wget
```


Terminal på Unix/Linux {#linux}
--------------------------------------------------------------------



###Terminalen {#nix-terminal}

Om du sitter på ett Unix-system så är du kanske bekant med terminaler sen tidigare. Om inte så borde du kunna hitta ett program som heter något i stil med *term*, *terminal*, *konsol*, *console* eller liknande via ditt operativsystems sökverktyg. Ett vanligt snabb-kommando är även `Ctrl+Alt+T` för att öppna detta.



###Pakethantering {#nix-paket}

Olika *nix-system har olika pakethanterare. Eller inte. När jag sitter på Unix-systemet FreeBSD så finns det en pakethanterare men ibland kompilerar man programmen från dess källkod. 

När jag sitter på min Debian-maskin (Linux) så använder jag pakethanteraren `apt-get`. 

Så här installerar jag paketet git, wget och rsync på Debian.

```bash
sudo apt-get install git wget rsync
```



Avslutningsvis {#avslutning}
--------------------------------------------------------------------

Det finns en särskild [tråd i forumet](t/2451) för denna artikel. Ställ dina frågor där eller tipsa om alternativa tekniker med terminalen, pakethantering och vilka programvaror man bör installera som webbutvecklare.
