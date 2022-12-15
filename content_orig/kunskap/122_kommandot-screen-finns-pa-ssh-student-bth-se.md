---
author: mos
category: artikel
revision:
    2012-09-04: (C, mos) Flyttad från WordPress till Lydia.  
    2012-03-28: (B, mos) Flyttad från blogspot till WordPress.  
    2009-10-14: (A, mos) Första utgåvan.  
updated: "2012-09-04 11:56:40"
created: "2012-09-04 11:56:36"
...
Kommandot screen finns på ssh.student.bth.se
==================================

Screen är en textbaserad fönsterhanterare. Ett oumbärligt verktyg för en Unix-hacker som ofta jobbar i xterm eller PuTTy. Screen finns installerat på ssh.student.bth.se.

<!--more-->




Om Screen {#om}
--------------------------------------------------------------------

Screen låter dig ha flera shell/program öppna samtidigt i en tab-liknande anordning. Du kan detacha dig från screenen, logga ut för att senare logga in igen och re-attacha dig till screen-sessionen som då fortfarande är aktiv. Alla program som du startar i din screen-session finns kvar och du slipper starta upp dem igen.

Så här kan en screen-session se ut när du kör den.

[FIGURE src=/img/kunskap/screen.jpeg caption="En screen-session."]

Längst ned är en tab-liknande toolbar som du kan åstakomma via filen `~/.screenrc`. Så här ser min startup-fil ut.

```html
# .screenrc
#
# Starta: screen -U -S basic
# Detacha: Ctrl-A -D
# Re-attacha: screen -U -d -r basic
#
caption always ‘%{= kG}[ %{G}%H %{g}][%{g}%= %{=kw}%?%-Lw%?%{g}(%{W}%n*%f %t%?(%u)%?%{g})%{g}%?%+Lw%?%?%= %{g}][%{g} %c %{g}]‘
vbell off
defutf8 on
screen -t csh 1
screen -t www 2 
screen -t mysql 3 mysql -p -h blu-ray.student.bth.se
screen -t svn 4
```



Kombinera screen och irssi {#irssi}
--------------------------------------------------------------------

Bland de som gillar att jobba i terminalen så är det ofta en populär kombination att köra irc-klienten [irssi](http://www.irssi.org/) i en flik i screen. Det gör att man kan logga in på unix-maskinen, ofta via `ssh` och hela tiden ha en screen-session igång som kör irc. Man missar inget och har hela tiden tillgång till det som sagts i irc-kanalen.



Läs mer {#lasmer}
--------------------------------------------------------------------

Vill du testa programmet så rekommenderas att du börjar läsa någon av de guider som finns på nätet. Följande guider innehåller goda exempel på kommandon och hantering av screen.

* [Guider, tutorial, kommando-sekvenser och FAQ](http://aperiodic.net/screen/quick_reference).

* [Hemsidan](http://www.gnu.org/software/screen/), [manual](http://www.gnu.org/software/screen/manual/screen.html) & [Wikipedia](http://en.wikipedia.org/wiki/GNU_Screen).
