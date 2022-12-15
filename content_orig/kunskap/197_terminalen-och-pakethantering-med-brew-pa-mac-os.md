---
author:
    - mos
category:
    - mac os
    - labbmiljö
revision:
    "2021-09-07": (B, aar) La till coreutils.
    "2015-04-10": (A, mos) Första utgåvan.
...
Terminalen och pakethantering med Brew på Mac OS
==================================

[FIGURE src=/image/macos/terminal.png class="right"]

Kom i gång och använd terminalen som en del av din verktygslåda som utvecklare. I Mac OS finns terminalen med som en applikation, men för att det skall bli smidigt att installera fler program så vill du kanske även installera pakethanteraren Brew.

Här är en guide till hur du hittar till terminalen på din Mac, samt hur du installerar pakethanteraren Brew.

<!--more-->



Terminalen {#terminalen}
--------------------------------------

På en Mac finns terminalen redan installerad. Du hittar den genom att söka efter “terminal”.

1. Klicka på förstoringsglaset.
2. Skriv “terminal”.
3. Klicka på första träffen som kommer upp.

[FIGURE src=/image/snap/macos-starta-terminalen.jpg capture="Så här startar du ett terminalfönster på din Mac."]

Du kan också trycka på `cmd ⌘` + `space` tangenterna för att få upp en ruta där du kan skriva in "terminal".

Applikationen ligger i katalogen `/Applications/Utilities/Terminal`.

Så här ser fönstret ut när du öppnat applikationen Terminal.

[FIGURE src=/image/snap/macos-terminalen.jpg capture="Ett terminalfönster på din Mac."]

OS X är baserat på Unix och liksom i Unix kan man göra det mesta från terminalen. 



Pakethantering med Brew {#brew}
--------------------------------------

Ett Unix-system har normalt en pakethanterare som gör det enkelt att installera program på kommandoraden. Mac OS saknar dock detta och vill man ha det så behöver man installera det separat. Ett av alternativen för pakethantering är [Homebrew](http://brew.sh/).

Följ instruktionerna på deras hemsida för att installera Homebrew som pakethanterare på din Mac.

När du väl installerat Homebrew så kan du testa att installera wget och coreutils. Det är ett kommandon som du kommer att behöva.


```text
brew install wget
brew install coreutils
```

<!--
Så här kan det se ut.

[ASCIINEMA src=18598]
-->

Att lära sig jobba med pakethantering, att installera och avinstallera program, är en bra sak att kunna för varje utvecklare. Det finns många små program som kan underlätta ens vardag.



Avslutningsvis {#avslutning}
--------------------------------------

Har du tips, förslag eller frågor om terminalen på Mac OS så finns det ett [subforum om Unix och Linux](forum/viewforum.php?f=49).

Vill du lära dig mer om grunderna i Unix så finns artikeln ["20 steg för att komma i gång med Unix och terminalen"](kunskap/20-steg-for-att-komma-i-gang-med-unix-och-terminalen).
