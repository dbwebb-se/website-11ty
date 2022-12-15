---
author: mos
category:
    - unix
    - debian
    - virtualbox
    - kurs linux
revision:
    "2018-12-17": (E, lew) Uppdatering för VT19.
    "2018-01-15": (D, mos) Lade till egen tråd i forumet och tips om att installera desktopmiljön.
    "2015-07-05": (C, mos) .
    "2015-06-30": (B, mos) Port forwarding kontra bridged network.
    "2015-06-26": (A, mos) Första utgåvan.
...
Installera Debian (på VirtualBox)
==================================

[FIGURE src=/image/snapht15/linux-what-now.png?w=c5&a=0,60,50,0 class="right" caption="Linux, och nu då?"]

Jag tänker visa hur jag installerar operativsystemet Debian på VirtualBox. Dels är det för att visa hur man installerar ett godtyckligt operativsystem på VirtualBox och dels är det för att visa hur man installerar Debian på en godtycklig hårdvara.

<!--more-->

Om det inte går bra första gången du prövar så kasta allt och börja om från början. Många gånger är det den snabbaste vägen in i mål.



Ladda ned Debian  {#download}
---------------------------------

Du kan läsa om Debian på [hemsidan för projektet](https://www.debian.org/). Där finns också en [sektion för att ladda ned](https://www.debian.org/distrib/) en ISO-image som du kan använda för att installera Debian på VirtualBox (eller annan hårdvara).

Jag väljer att ladda ned deras image som är [anpassad för installation via nätet](https://www.debian.org/distrib/netinst). Det kräver en koppling till internet men den är liten och snabb att ladda ned.

Eftersom jag tänker installera minsta möjliga version av Debian så behöver jag inte en massa paket eller fönsterhanterare. Så detta blir en snabb och smidig väg att komma igång.

Jag väljer bland nedladdningslänkarna under "Small CDs or USB sticks". Jag väljer *amd64* i de fallen jag har en 64 bitars maskin. Om jag har en 32 bitars maskin så väljer jag paketet *i386*.

VirtualBox kommer att visa vilka möjligheter du har. I värsta fall får du ladda ned båda paketen. Börja med amd64 för 64-bitars. Kan du bara installera 32 bitars så laddar du ned i386 istället.

Så här ser det ut när jag gör dessa stegen.

[YOUTUBE src=ZkIbPtDI6LA width=630 caption="Kenneth laddar ned en Debian-image."]



Sätt upp en virtuell maskin i VirtualBox för Debian {#init}
---------------------------------

Nu skapar vi en virtuell maskin i VirtualBox där vi kan installera Debian.

[YOUTUBE src=UgVdcrXVojA width=630 caption="Kenneth skapar en virtuell maskin (VM) i VirtualBox."]

I mitt fall kunde jag installera 64-bitars OS så jag valde den image som hette *amd64*. Om jag bara kunde installera 32-bitars OS så hade jag valt imagen för *i386*.

När man startar den virtuella maskinen så börjar installationsförfarandet för Debian eftersom den bootar från den image som vi lade till.

Var med på att när du klickar i fönstret som kommer upp så låses din mus till det fönstret. För att ta bort låsningen så behöver du klicka på det som kallas *host key* och standard är det den högra `Ctrl`-knappen.

Nu är vi redo att installera Debian.




Installera Debian i en virtuell maskin {#install}
---------------------------------

I följande video så visas proceduren i installationen av Debian. Videon är trimmad så de längsta väntetiderna är bortklippta.

[YOUTUBE src=g4--dWPUubY width=630 caption="Kenneth installerar Debian i en virtuell maskin i VirtualBox."]

Det som du behöver göra är i princip att:

* Välja ditt land, tangentbordslayout och teckenkodning till UTF-8.
* Välj lösenord för root-användaren och skapa en ny användare.
* Välj att bara installera de nödvändiga programvarorna.
* Välj en desktopmiljö

När du är klar kan du logga in på din nya Debian server med antingen root-användaren eller den användaren som du skapade i installationsprocessen. Normalt vill du inte logga in som root-användaren så välj den användare som du skapade. I slutet av videon gör jag en "snapshot" av min installation. Det är som ett bokmärke så skulle något gå sönder kan jag alltid välja att starta Debian i det sparade läget.



<!--
Installera desktopmiljön  {#desktop}
---------------------------------

Om du missade att installera desktopmiljön i installationsfasen så kan du på egen hand installera den i efterhand.
-->



Copy & paste mellan din dator och den virtuella maskinen  {#copy}
---------------------------------

Ibland vill man kopiera text mellan sin vanliga desktop och den virtuella maskinen man kör i VirtualBox. För det så krävs det ett "addon" från Guest Additions CD:n. Följande instruktioner skrivs i terminalen inuti Debian. När man skriver lösenord i terminalen ska det inte synas något. Dollartecknet ska inte skrivas, utan visar bara att det är terminalkommandon. Nu kör vi!
<!-- Det är en inställning och det finns ett foruminlägg som visar "[Virtual Box och copy & paste till hostmaskinen](t/4063)". -->

```bash
# bli root-användaren
$ su
Password: # ange ditt valda root-lösenord
```

Nu kan vi installera program och nödvändiga hjälpmedel. Kör följande kommando för att installera nödvändiga verktyg:

```bash
$ apt-get install build-essential module-assistant dkms
```

Vi förbereder för att bygga en modul:

```bash
$ m-a prepare
```

Nu ska vi montera "Guest Additions CD Image". Det kan bli lite strul här.

```bash
$ ls /media/cdrom
```

Ovan kommando listar vad vi har i cdrom:en. Är det tomt behöver vi sätta i skivan. Det gör du via "Devices->Insert Guest Additions CD Image...". Prova ovan kommando igen och se om det listas filer. Om det gör det är det bara att gå vidare. Finns ingenting där kan du behöva "mounta" cdrom:en först:

```bash
$ mount /media/cdrom
```

När skivan är i och det listas filer kan vi installera Guest Additions:

```bash
# inloggad som root
$ sh /media/cdrom/VBoxLinuxAdditions.run
#
# massa utskrifter och ganska lång väntetid...
#
```

Starta om VM:en:

```bash
$ reboot
```

När det är klart stänger vi av VM:en och går in i VirtualBox "settings". Under "General->Advanced" hittar vi "Shared Clipboard" och "Drag n drop". Sätt båda dem till "Bidirectional" och starta Debian igen.

Här är en video där jag gör stegen ovan:

[YOUTUBE src=PQegEbDBSOU width=630 caption="Kenneth installerar Guest Additions."]

Ibland kan det bli lite krångel. I videon ville inte Desktopen vara med och leka, men det räckte att starta om Debian. Notera att det även går att köra i fullskärm.

Prova att göra den här installationen, det sparar lite tid när du behöver kopiera saker.



Installera SSH-server på Debian med `apt-get`  {#aptget}
---------------------------------

När man installerar program på Debian (Linux) så använder man oftast en pakethanterare. Programmet man installerar finns alltså förpaketerat och man laddar ned och installerar det. På Debian använder vi pakethanteraren `apt-get`.

För att visa hur det fungerar så installerar vi SSH på servern.



###Installera `sudo` utan lösenord {#sudo}

Men, innan vi gör det så behöver vi installera programmet `sudo` som låter oss köra program som root-användaren.

Följande kommando är en så kallad "oneliner". Ett sammanslaget kommando som utför en rad olika saker:

```bash
$ su --command "apt-get install sudo; echo '$USER ALL=NOPASSWD: ALL' > '/etc/sudoers.d/$USER'; cat /etc/sudoers.d/$USER"
```

Kommandot skickas till `su` som vi nu vet är root-användaren. Den aktuella användaren ($USER) läggs till i gruppen `sudo` och kravet på lösenord tas bort. Det möjliggör att du kan installera program med din egna användare.



###Installera SSH {#ssh}

på Debians webbplats hittar du [information om SSH](https://wiki.debian.org/SSH). Kika snabbt igenom den sidan.

Klienten för ssh är redan installerad. Pröva den genom att logga in på en maskin via ssh, till exempel så här. Byt ut *acronym* mot din användare på maskinen du loggar in på.

```bash
ssh acronym@ssh.student.bth.se
```

Skriv `exit` eller `ctrl-d` för att avsluta.

Vi installerar servern för SSH via `apt-get`. Starta en terminal i din VM och kör:

```bash
$ sudo apt-get install openssh-server
```

SSH-servern startar upp och lyssnar på port 22. Du kan se dess status så här.

```bash
$ sudo service ssh status
```

<!-- [FIGURE src=/image/snapht15/service-ssh-status.png?w=w2 caption="Status på SSH-servern som ligger och lyssnar på port 22."] -->

Nu har vi en SSH-server uppe och nu kan vi logga in på maskinen utifrån, förutsatt att VirtualBox är konfigurerat så att den virtuella maskinens nätverksinterface har fått en ip-adress. Låt oss testa det.



Logga in på den virtuella maskinen med ssh  {#ssh}
---------------------------------

Tanken är att du skall kunna logga in på din virtuella maskin från din egen desktop-miljö, via en terminal och ssh. Det finns flera sätt att göra det på och jag skall visa dig två av dem.



### Alternativ 1: Nätverk via port forwarding {#pf}

Detta är det enklaste. Pröva det först. Det handlar om *port forwarding* där du mappar upp en port på din lokala maskin. När den porten får trafik så skickas trafiken vidare till den virtuella maskinen på en viss port. Man *forwardar* trafiken från en port till en annan port (och maskin).

Gör så här. Öppna nätverksinställningarna på din virtuella maskin.

[FIGURE src=/image/linux/portforward.PNG caption="Nätverksinställningar med möjlighet till port forwarding."]

Klicka på knappen "Port Forwarding". Klicka på "+"-knappen och lägg till två regler enligt följande.

| Namn     | Host Port    | Guest Port    |
|----------|:------------:|:-------------:|
| http     | 8080         | 80            |
| ssh      | 2222         | 22            |

[FIGURE src=/image/linux/portforwardrules.PNG caption="Port forwarding för ssh och http."]

Du har nu två regler för port forwarding som säger följande.

1. Trafik till localhost:2222 skickas vidare till den virtuella maskinen port 22.
2. Trafik till localhost:8080 skickas vidare till den virtuella maskinen post 80.

Så här kan det se ut när du använder ssh för att logga in på den virtuella maskinen.

<!-- [ASCIINEMA src=22710] -->

[YOUTUBE src=dQ6Cn8BfHso width=630 caption="Kenneth loggar in via ssh."]

Glöm inte att lösenordet du anger är för den virtuella maskinen.



### Alternativ 2: Nätverk via delat nätverkskort {#bridge}

Du kan dela nätverkskortet med *bridged network*, och den virtuella maskinen hämtar sin ip-adress via DHCP. Detta sätt ger den virtuella maskinen en egen ip-adress och den blir åtkomlig i hela ditt nätverk. Detta sättet är lite krångligare och fungerar det med port forward kan du hoppa över detta.

Jag har sammanställt ett foruminlägg som visar stegen du behöver göra för att initiera nätverket med bridged network på den virtuella maskinen, och för att logga in med ssh.

* [VirtualBox, nätverk och gäst OS som server](t/4332)

Det är flera steg och det kan säkert krångla. Om det inte fungerar första gången så gör du om. Räkna med att få göra om och testa ett par gånger.

Detta sättet kan krångla om du inte har koll på ditt lokala nätverk. Till exempel så misslyckas jag med denna lösning när jag är på skolans miljö då jag inte har full koll på hur DHCP är uppsatt. Så, om du är osäker så använder du lösningen med port forwarding istället.



Roliga kommandon i Unix-terminalen {#rolig}
--------------------------------------

[FIGURE src=/image/snapht15/linux-what-now.png?w=w2 caption="Linux, och nu då?"]

Okey, vi har en terminal och en Linux-server. Vad ska vi göra nu?

Tja, låt oss börja med att [installera ett par roliga program](kunskap/roliga-kommandon-i-unix-terminalen). Bara för att bekanta oss med terminalen.

Glöm inte `apt-get` om du saknar något program. Kom ihåg att alla program har en man-sida. Där står allt du behöver veta.

```bash
man apt-get
```



Avslutningsvis {#avslutning}
--------------------------------------

Nu har du kommit igång och du har den labbmiljö som krävs för att genomföra det första kursmomentet i kursen.

Det finns en [egen tråd i forumet](t/7245) för denna artikel. Ställ frågor eller bidra med tips och trix.
