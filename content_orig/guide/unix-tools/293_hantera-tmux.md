---
author: lew
revision:
    "2020-03-11": "(A, lew) Första versionen."
...
Hantera tmux {#manage}
-------------------------------------------

Det kan vara en liten tröskel att ta sig över innan man kan se nyttan med tmux. Det bästa man kan göra är att träna på det och använda det.



Starta, detacha och attacha till en session {#session}
-------------------------------------------

Starta tmux för första gången, du får då en ny tmux-session.

```bash
$ tmux
```

Du är nu i en tmux-session. Du kan koppla bort dig från sessionen, *detacha*, via kommandot prefix + `d`. Det betyder i vårt fall kommandosekvensen `ctrl-b d`. Tryck ned ctrl-tangenten tillsammans med `b`. Släpp ctrl och b tangenterna och tryck `d`.

Du är nu tillbaka vid terminalens prompt och du kan lista de sessioner som är aktiva.

```bash
$ tmux ls
```

Du kan starta en ny tmux-session, detacha dig från den och lista de aktiva sessionerna igen. Du har nu två sessioner när du kör `tmux ls`. Det kan se ut så här.

```text
$ tmux ls
0: 1 windows (created Wed Jul  1 09:52:52 2015) [196x58]
1: 1 windows (created Wed Jul  1 09:59:44 2015) [196x58]
```

Du har nu två sessioner som du kan göra *attach* till. Den första siffran är sessionens nummer och du kan attacha till den med `tmux a` eller `tmux attach`, så här.

```bash
$ tmux attach -t 0
$ tmux a -t 0
```

Du har nu två sessioner som du kan växla mellan. Det som är riktigt bra med detta är att du kan ha en session på en server, oavsett från vilken klient du loggar in, så kan du koppla dig till samma session. Det blir som att koppla upp sig till en helt färdig miljö. Detta är en av styrkorna med terminal multiplexer, att kunna spara en session som man jobbar med och ha tillgång till den från en annan klient.



Namngivna sessioner {#namnsession}
-------------------------------------------

Jag brukar ibland namnge mina sessioner för att det skall vara lättare att återkoppla till dem vid ett senare tillfälle.

Starta en namngiven session. Sessionen får namnen "basic".

```bash
$ tmux new -s basic
```

Detacha från sessionen och du kan nu åtekoppla dig till sessionen via dess namn.

```bash
$ tmux attach -t basic
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
$ tmux ls
```

Radera vald session, via dess id, eller namn.

```bash
$ tmux kill-session -t 0
$ tmux kill-session -t basic
```

Du kan ta bort samtliga sessioner, inklusive tmux servern, via följande kommando.

```bash
$ tmux kill-server
```

Gör du sedan `tmux ls` så får du ett felmeddelande som säger att det inte finns en server igång.

```bash
$ tmux ls
failed to connect to server: Connection refused
```
