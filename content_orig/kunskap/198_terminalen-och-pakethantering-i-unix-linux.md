---
author:
    - mos
category:
     - labbmiljö
     - linux
     - terminalen
revision:
  "2015-04-10": (A, mos) Första utgåvan.
...
Terminalen och pakethantering i Unix/Linux
==================================

[FIGURE src=/image/unix/terminal.png?w=200 class="right"]

Kom i gång och använd terminalen som en del av din verktygslåda som utvecklare. I ett Unix/Linux system finns det så gott som allt en terminal. Terminalen är en grundsten i dessa operativsystem. Dessutom finns det kraftfulla pakethanterare som hjälper dig installera bra-att-ha program.

Här är en guide till hur du hittar till terminalen på din unix/Linux-maskin och en introduktion om pakethantering.

<!--more-->

[ASCIINEMA src=18599]



Terminalen {#terminalen}
--------------------------------------

Om du sitter på ett Unix-system så är du kanske bekant med terminaler sen tidigare. Om inte så borde du kunna hitta ett program som heter något i stil med term, terminal, konsol, console eller liknande via ditt operativsystems sökverktyg eller meny. 



Pakethantering {#paket}
--------------------------------------

Olika \*nix-system har olika pakethanterare. Eller inte. När jag sitter på Unix-systemet FreeBSD så finns det en pakethanterare men ibland kompilerar man programmen från dess källkod.

När jag sitter på min Debian-maskin (Linux) så använder jag pakethanteraren apt-get.

Så här installerar jag paketet wget på Debian. Gör du så också, du behöver det kommandot framöver.

```text
apt-get install wget
```



Avslutningsvis {#avslutning}
--------------------------------------

Har du tips, förslag eller frågor om terminalen, unix och Linux, så finns det ett [subforum om Unix och Linux](forum/viewforum.php?f=49).

Vill du lära dig mer om grunderna i Unix så finns artikeln ["20 steg för att komma i gång med Unix och terminalen"](kunskap/20-steg-for-att-komma-i-gang-med-unix-och-terminalen).
