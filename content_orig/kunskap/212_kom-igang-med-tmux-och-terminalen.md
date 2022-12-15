---
author: mos
category: unix
revision:
    "2019-04-01": (B, lew) Tog bort mos configfil.
    "2015-07-01": (A, mos) Första utgåvan.
updated: "2019-03-01 11:44:02"
created: "2015-06-29 12:00:34"
...
Kom igång med tmux och terminalen
==================================

[FIGURE src=/image/snapht15/tmux-create-windows.png?w=c5 class="right" caption="Tmux i en terminal."]

När man börjar använda terminalen så märker man snabbt begränsningen i ett terminalfönster, man börjar då ha flera terminalfönster uppe samtidigt, eller flera tabbar i ett terminalfönster. Efter ett tag så kommer man i kontakt med terminal *multiplexer*, program som gör terminalen till ett än mer kraftfullt verktyg. Två kända sådana program är screen och tmux. Denna guide handlar om tmux.

<!--more-->



Om tmux {#om}
-------------------------------------------

Du kan läsa om [tmux på deras webbplats](http://tmux.github.io/). Du kan läsa om vad en terminal multiplexer innebär, och du kan se exempel på skärmdumpar.

Du hittar den [kompletta manualen i man-sidan](http://www.openbsd.org/cgi-bin/man.cgi/OpenBSD-current/man1/tmux.1?query=tmux&sec=1).



Fördelen med tmux {#fordel}
-------------------------------------------

För den som är van att jobba i terminalen så erbjuder tmux en möjlighet att skapa många fönster och hoppa mellan dem, varje fönster kan köra sina egna program.

Tmux startar en session som man kan *detacha* från och *attacha* till. Det gör att man kan starta igång ett antal program på en server och nästa gång man loggar in på servern så kan man koppla sig till den sessionen och ha hela arbetsmiljön färdig.



Installera tmux {#install}
-------------------------------------------

Du kan installera tmux i Debian/Linux med `apt-get`.

```bash
sudo apt-get install tmux
```

Om du har en Mac så använder du Brew.

```bash
brew install tmux
```

Om du använder Windows/Cygwin så installerar du med `apt-cyg`.

```bash
apt-cyg install tmux
```

Tmux är bra att köra både på klient och server. Så fort du är i terminalen så vill du troligen ha tillgång till tmux.

Kontrollera vilken version du har av tmux.

```bash
tmux -V
```

Kika snabbt på manualsidan för tmux.

```bash
man tmux
```

*Innan* vi startar tmux så skall vi hämta hem en konfigurationsfil.



En konfigurationsfil för tmux {#config}
-------------------------------------------

Det första vi vill ha är en konfigurationsfil för tmux. Låt oss utgå från en som jag själv använder. Du kan kika på [konfigurationsfilen `.tmux.conf`](https://github.com/mosbth/env/blob/master/.tmux.conf), den ligger på GitHub.

Hämta den så här.

```bash
wget -O $HOME/.tmux.conf https://raw.githubusercontent.com/mosbth/env/master/.tmux.conf
```

Kontrollera att den ligger på rätt plats.

```bash
more $HOME/.tmux.conf
```

När man skickar kommandon till tmux så används ett prefix som normalt är `ctrl b`, men jag har valt att ändra det till `ctrl a`. Om du tittar i konfigfilen så är det de första raderna som löser det. Det är helt enkelt enklare att klicka `ctrl a` än `ctrl b`.

De första raderna i filen `$HOME/.tmux.conf` ändrar prefix för kommandon i tmux.

```text
# Bind C-a
set-option -g prefix C-a
unbind-key C-b
bind-key C-a send-prefix
```

Du måste alltid trycka prefixet innan tmux svarar. Det är prefixet som gör att tmux lyssnar på dig.



Starta, detacha och attacha till en session {#session}
-------------------------------------------

Starta tmux för första gången, du får då en ny tmux-session.

```bash
tmux
```

Du är nu i en tmux-session. Du kan koppla bort dig från sessionen, *detacha*, via kommandot prefix + `d`. Det betyder i vårt fall kommandosekvensen `ctrl-a d`. Tryck ned ctrl-tangenten tillsammans med `a`. Släpp ctrl och a tangenterna och tryck `d`.

Du är nu tillbaka vid terminalens prompt och du kan lista de sessioner som är aktiva.

```bash
tmux ls
```

Du kan starta en ny tmux-session, detacha dig från den och lista de aktiva sessionerna igen. Du har nu två sessioner när du kör `tmux ls`. Det kan se ut så här.

```text
$ tmux ls
0: 1 windows (created Wed Jul  1 09:52:52 2015) [196x58]
1: 1 windows (created Wed Jul  1 09:59:44 2015) [196x58]
```

Du har nu två sessioner som du kan göra *attach* till. Den första siffran är sessionens nummer och du kan attacha till den med `tmux a` eller `tmux attach`, så här.

```bash
tmux attach -t 0
tmux a -t 0
```

Du har nu två sessioner som du kan växla mellan. Det som är riktigt bra med detta är att du kan ha en session på en server, oavsett från vilken klient du loggar in, så kan du koppla dig till samma session. Det blir som att koppla upp sig till en helt färdig miljö. Detta är en av styrkorna med terminal multiplexer, att kunna spara en session som man jobbar med och ha tillgång till den från en annan klient.



Namngivna sessioner {#namnsession}
-------------------------------------------

Jag brukar ibland namnge mina sessioner för att det skall vara lättare att återkoppla till dem vid ett senare tillfälle.

Starta en namngiven session. Sessionen får namnen "basic".

```bash
tmux new -s basic
```

Detacha från sessionen och du kan nu åtekoppla dig till sessionen via dess namn.

```bash
tmux attach -t basic
```

Om du listar dina sessioner så ser du namnet på de sessioner som är namngivna, istället för det id som visas för de icke-namngivna sessionerna.

```bash
$ tmux ls
1: 1 windows (created Tue Jun 30 13:18:04 2015) [196x58] (attached)
2: 1 windows (created Tue Jun 30 16:41:07 2015) [80x23]
basic: 4 windows (created Tue Jun 30 13:15:35 2015) [239x68] (attached)
```

För min egen del så använder jag detta så ofta så jag har skapat två alias för att starta an namngiven session och för att återkoppla till den. Aliasen ser ut så här.

```bash
alias tbs='tmux new -s basic'
alias tb='tmux attach -t basic'
```

Varje gång jag loggar in på en maskin för första gången så startar jag en tmux session med `tbs`. Nästa gång jag loggar in, kanske från en annan maskin, så återkopplar jag till samma session med `tb`. Enkelt och smidigt. Ett kraftfullt arbetsverktyg.



Ta bort en session {#kill}
-------------------------------------------

Du kan ta bort en session som du inte behöver på följande sätt.

Först visa vilka sessioner som finns.

```bash
tmux ls
```

Radera vald session, via dess id, eller namn.

```bash
tmux kill-session -t 0
tmux kill-session -t basic
```

Du kan ta bort samtliga sessioner, inklusive tmux servern, via följande kommando.

```bash
tmux kill-server
```

Gör du sedan `tmux ls` så får du ett felmeddelande som säger att det inte finns en server igång.

```bash
$ tmux ls
failed to connect to server: Connection refused
```



Jobba med panes {#panes}
-------------------------------------------

När du startar tmux så får du upp en svart skärm, det är ett fönster, ett *window*. Du kan nu dela in detta fönster i olika delar, *panes*. Du navigerar mellan dessa panes med prefix följt av piltangenterna för upp, ned, höger, vänster.

[FIGURE src=/image/snapht15/tmux-ny-session.png caption="Ny session med ett fönster som innehåller en pane."]

Följande kommando är till för att jobba med panes.

| Kommando    | Vad  |
|-------------|------|
| `prefix %`  | Dela upp nuvarande pane i två delar, splitta vertikalt. |
| `prefix "`  | Dela upp nuvarande pane i två delar, splitta horisontellt. |
| `prefix x`  | Ta bort den pane du står i. |

[FIGURE src=/image/snapht15/tmux-split-panes.png caption="Dela upp panes och hoppa mellan dem via piltangenter."]

Du kan förstora och förminska en pane genom att trycka prefix + `ctrl <piltangent>`.



Jobba med windows {#windows}
-------------------------------------------

Du kan skapa nya fönster, *windows*, och hoppa mellan dem. Följande kommando hjälper dig att jobba med fönster.

| Kommando      | Vad  |
|---------------|------|
| `prefix c`    | Skapa ett nytt fönster som får ett id som visas i statuspanelen i botten. |
| `prefix ,`    | Byt namn på fönstret, namnet visas i statuspanelen. |
| `prefix <id>` | Flytta till ett visst fönster som har ett id, prefix + `1` flyttar till det fönster som har id 1. |
| `prefix &`    | Ta bort det fönster du står i. |

[FIGURE src=/image/snapht15/tmux-create-windows.png caption="Skapa flera fönster och namnge dem. Här finns fyra fönster som heter su, irc, dbwebb och linux."]



Ändra konfigurationsfilen för tmux {#econfig}
-------------------------------------------

När du blir varm i kläderna så vill du säkert uppdatera konfigfilen så den passar till dig och dina behov. Eller kanske vill du bara snygga till statusraden.

Du kan testa dina ändringar på en gång genom att starta tmux och öppna konfigfilen i en texteditor. Gör en ändring i till exempel statusraden.

Leta reda på följande rader.

```text
# Set status bar
set -g status-bg black
set -g status-fg green
```

Byt plats på bakgrundsfärg och förgrundsfärg så här.

```text
# Set status bar
set -g status-bg green
set -g status-fg black
```

Gå sedan till ditt tmux-fönster och tryck prefix följt av `r` så laddas konfigfilen om automatiskt och du kan direkt se dina ändringar.

Letar du i konfigfilen så kan du hitta att `r` är kopplat till att läsa om konfigfilen. Det ser ut så här.

```text
# reload tmux conf
bind-key r source-file ~/.tmux.conf
```



Avslutningsvis {#avslutning}
--------------------------------------

Att lära sig tmux, eller annat motsvarande terminal multiplexer, är väl investerad tid för den som likt en webbprogrammerare spenderar mycket tid vid dator och terminal.

Om du stöter på problem så kan du alltid [fråga i forumet om Unix och Linux](forum/viewforum.php?f=49).
