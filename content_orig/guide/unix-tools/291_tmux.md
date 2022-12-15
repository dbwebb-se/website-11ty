---
sectionHeader: true
linkable: true
author: lew
revision:
    "2020-03-11": "(A, lew) Första versionen."
...
Kom igång med tmux
=======================

[FIGURE src=/image/snapht15/tmux-create-windows.png?w=c5 class="right" caption="Tmux i en terminal."]

När man börjar använda terminalen så märker man snabbt begränsningen i ett terminalfönster, man börjar då ha flera terminalfönster uppe samtidigt, eller flera tabbar i ett terminalfönster. Efter ett tag så kommer man i kontakt med terminal *multiplexer*, program som gör terminalen till ett än mer kraftfullt verktyg. Två kända sådana program är screen och tmux. Denna guide handlar om tmux.



### Om tmux {#om}

Du kan läsa om [tmux på deras webbplats](http://tmux.github.io/). Du kan läsa om vad en terminal multiplexer innebär, och du kan se exempel på skärmdumpar.

Du hittar den [kompletta manualen i man-sidan](http://www.openbsd.org/cgi-bin/man.cgi/OpenBSD-current/man1/tmux.1?query=tmux&sec=1).



### Fördelen med tmux {#fordel}

För den som är van att jobba i terminalen så erbjuder tmux en möjlighet att skapa många fönster och hoppa mellan dem, varje fönster kan köra sina egna program.

Tmux startar en session som man kan *detacha* från och *attacha* till. Det gör att man kan starta igång ett antal program på en server och nästa gång man loggar in på servern så kan man koppla sig till den sessionen och ha hela arbetsmiljön färdig.
