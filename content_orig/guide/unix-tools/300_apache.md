---
sectionHeader: true
linkable: true
author: lew
revision:
    "2020-03-11": "(A, lew) Första versionen."
...

Kom igång med Apache
=======================

[FIGURE src=/image/snapht15/vhosts.png?w=c5&a=0,50,50,0 class="right" caption="En virtuell host."]

När man bygger många webbplatser så vill man ha möjligheten att köra dem i en och samma installation av Apache, på en och samma server. En så kallad virtualisering av webbplatser, om begreppet passar.

Apache har en konstruktion som heter Apache Virtual Hosts och en variant av den är Apache Name-based Virtual Hosts. Det är den namn-baserade varianter vi nu skall se hur man använder.

<!--more-->



Förutsättningar {#pre}
-------------------------------------------

Det förutsätts att du gör installationen på en Debian/Linux-maskin.

Det förutsätts också att du kör din [Debian/Linux i VirtualBox med port forwarding](guide/kom-igang-med-ssh/logga-in-med-ssh#pf). Men principen är densamma, oavsett var din server ligger någonstans.



Om Apache Virtual Hosts {#om}
-------------------------------------------

Apache Virtual Hosts innebär att man kan köra många webbplatser på en och samma installation av Apache. Det finns en variant som heter Apache Name-based Virtual Hosts som innebär att samma installation av Apache kan husera två (eller fler) webbplatser med helt olika domännamn.

Du kan kika kort på [Apaches dokumentation av Virtual Host](http://httpd.apache.org/docs/current/vhosts/) och på den [delen som handlar om Name-based Virtual Hosts](http://httpd.apache.org/docs/current/vhosts/name-based.html).

Låt oss nu sätta tänderna i detta och konfigurera upp en namnbaserad virtuell host.
