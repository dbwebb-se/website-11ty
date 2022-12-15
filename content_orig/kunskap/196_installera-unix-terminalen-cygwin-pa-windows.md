---
author: mos
category:
    - labbmiljö
    - terminal
    - windows
revision:
    "2017-06-09": (E, mos) Förtydliga lynx vid installationen.
    "2017-05-29": (D, mos) Genomgång inför ht17.
    "2016-02-03": (C, mos) Ändrade länk för att installera apt-cyg.
    "2015-08-24": (B, mos) Om kommandot `chere` går fel första gången.
    "2015-04-10": (A, mos) Första utgåvan.
...
Installera Unix-terminalen Cygwin på Windows
==================================

[FIGURE src=/image/cygwin/logo.png?w=100 class="right"]

Cygwin är en Unix-terminal för Windows-användaren. Med Cygwin får du tillgång till en Unix-terminal som fungerar tillsammans med ditt Windowssystem. Du kan köra dina bash-skript och använda de Unix-kommandon du är van vid.

Det finns även en pakethanterare i form av `apt-cyg` som hjälper dig att installera de program du behöver.

Här är en guide till hur du installerar Cygwin och pakethanteraren `apt-cyg` och hur du bäst integrerar terminalen i din Windows-miljö.

<!--more-->



Förutsättningar {#forutsattning}
--------------------------------------

Du har Windows installerat.

Behöver du mer information så går du till [Cygwins hemsida](https://www.cygwin.com/).



Kontrollera vilken version jag har {#msinfo}
--------------------------------------

Du kan kontrollera vilken version av Windows du har installerat med hjälp av kommandot `msinfo32`. Via menyn kan du välja att köra kommandot.

[FIGURE src=image/snapvt17/msinfo32.png caption="Kör igång programmet msinfo32."]

Leta reda på "System Type" som berättar om du har ett 64 bitars eller 32 bitars system.



Installera Cygwin {#install-cygwin}
--------------------------------------

Det finns två varianter att installera, 32 bitars eller 64 bitars. Kolla upp vad din dator har för system och välj motsvarande installationsprogram för Cygwin.

Gå till [Cygwins hemsida](https://www.cygwin.com/) och ladda ned installationsprogrammet och starta det.

Du kan använda standardinställningar men du behöver se till att programmet `lynx` installeras som en del i installationen.

Så här gör jag när jag installerar Cygwin.

[YOUTUBE src=QC-m5jJ5CME width=630 caption="En snabb översikt av stegen för att installera Cygwin."]

Du kan nu dubbelkolla att `lynx` är installerat. Gå till terminalen Cygwin och se till att ett meddelande med versionsnumret för lynx skrivs ut.

```bash
$ lynx --version
```

Om du får ett felmeddelande om att "Kommandot lynx finns inte" så behöver du köra om installationsprogrammet och installera lynx på det sättet som jag gör i videon ovan.

Om du senare behöver uppdatera din installation så behöver du bara köra installationsprogrammet igen.



Installera pakethanteraren apt-cyg {#install-apt-cyg}
--------------------------------------

Vi skall i Cygwin använda en pakethanterare [`apt-cyg`](https://github.com/transcode-open/apt-cyg) för att göra det enkelt att installera olika program.

Stegen för att installera pakethanteraren är så här.

Starta en cygwin-terminal och kör följande kommandon, först det ena och sedan det andra.

```text
lynx -source dbwebb.se/apt-cyg > apt-cyg
install apt-cyg /bin
```

Klart. Nu kan du testa att installera kommandot `wget` med `apt-cyg`.

```text
apt-cyg install wget
```

Du kommer också behöva kommandon för `ssh` och `rsync` så installera dem också. Om de redan är installerade så säger `apt-cyg` det.

```text
apt-cyg install openssh rsync
```

Du kan också skriva in kommandot utan några argument, då får du en översikt av vad kommandot kan göra.

```text
apt-cyg
```

Så här ser det ut när jag installerar `apt-cyg`.

[YOUTUBE src=d2KqaqCUfGk width=630 caption="Så här kommer man igång med pakethanteraren apt-cyg."]



Lägg till Cygwin i Windows-menyn {#install-menu}
--------------------------------------

Det är bra att kunna starta en Cygwin-terminal i nuvarande katalog, till exempel om man är i filväljaren och vill starta en terminal i just den katalogen. Det kan vi lösa genom att lägga till ett menyval i context-menyn (högerklick-menyn).

Starta Cygwin och installera programmet `chere`.

```text
apt-cyg install chere
```

Starta nu **Cygwin som Administratör** (högerklicka på Cygwin ikonen och välj "Run as Administrator") och kör programmet `chere` för att installera shell-extensions i Windows-registret.

```text
chere -i -c -t mintty
```

Om du glömde starta som Admin och fick felmeddelande, starta då om cygwin som administratör och kör följande kommando istället.

```text
chere -i -f -c -t mintty
```

Klart. Stäng ned det Cygwin som kör som administratör.

Nu kan du högerklicka på desktopen och välja menyvalet "Bash Prompt Here" och en Cygwin-terminal startar i nuvarande katalog.

Om du vill lära dig mer om vad programmet `chere` nyss gjorde så skriver du följande kommandon.

```text
chere
man chere
```

[YOUTUBE src=w_TBWeb5drI width=630 caption="Så här kommer man igång med Cygwin på Windows context meny."]

Det finns en forumtråd för [Cygwin och `chere`](t/4030), kika där om du får bekymmer.



Avslutningsvis {#avslutning}
--------------------------------------

Nu har du kommit igång med Cygwin. Det är ett ypperligt arbetsverktyg, du har nu tillgång till många av de vanliga Unix-kommandon som finns på terminalen. Det är bara att installera och köra på.

Har du tips, förslag eller frågor om Cygwin så finns det ett [subforum om Windows för Webbprogrammerare](forum/viewforum.php?f=55).

Vill du lära dig mer om grunderna i Unix så finns artikeln ["20 steg för att komma i gång med Unix och terminalen"](kunskap/20-steg-for-att-komma-i-gang-med-unix-och-terminalen).
