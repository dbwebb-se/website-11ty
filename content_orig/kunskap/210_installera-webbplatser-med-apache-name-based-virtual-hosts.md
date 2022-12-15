---
author: mos
category: webbprogrammering
revision:
    "2019-04-05": (B, lew) Uppdatering inför HT19.
    "2015-07-03": (A, mos) Första utgåvan.
updated: "2019-04-05 10:39:25"
created: "2015-06-29 11:55:30"
...
Installera webbplatser med Apache Name-based Virtual Hosts
==================================

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



Installera Apache {#installera}
-------------------------------------------

Vi behöver webbservern Apache. Så här installerar du Apache och testar att det fungerar.

```bash
sudo apt-get install apache2
sudo service apache2 status
```

Du kan testa att webbservern är igång och svarar genom att använda en textbaserad webbläsare `lynx`.

```bash
sudo apt-get install lynx
lynx http://localhost
```

Apache sparar sina loggfiler i `var/log/apache2`. I filen `access.log` loggas varje *request* till webbplatsen. I filen `error.log` loggas felaktigheter, till exempel om något i en konfigurationsfil gör så att servern inte kan startas.

Du kan starta ett kommando `tail -f` som skriver ut saker som hamnar i slutet av en loggfil. Det kan vara ett bra sätt att kolla om något skrivs till loggen. För att titta i loggfilerna så måste man vara root. Så här man kan skriva för att logga innehåll som skrivs till filen `error.log`.

```bash
sudo tail -f /var/log/apache2/error.log
```

Så här kan det se ut när du gör alltihop i en sekvens.

[ASCIINEMA src=22795]

Nu är både Apache och den terminalbaserade webbläsaren lynx på plats.

I standardinstallationen så lägger Apache sina konfigfiler i `/etc/apache2/` och webrooten ligger i `/var/www/html/`. Om du vill testa att lägga till en ny sida så gör du det. Det är alltid bra att känna att man har kontroll på saker och ting.



Skapa en namnbaserad virtuell host {#namn}
-------------------------------------------

Låt oss nu skapa en Apache Name-based Virtual Host. Ponera att vi har en kund och vi skall skapa deras webbplats linux.dbwebb.se. Men, vi vill först testa den i vår egen utvecklingsmiljö, genom att köra samma domän via en namnbaserad virtuell host i Apache.



###Skapa en konfigfil för den virtuella hosten {#config}

Det finns en katalog `/etc/apache2/sites-available` där man lägger konfigfilerna för de virtuella hostar man har. Sedan *enablar* man de virtuella hostar som Apache skall använda. Då länkas filerna i katalogen `sites-enabled`.

I katalogen `sites-available` ligger en konfigfil som man kan utgå ifrån.

Följ dessa steg för att enabla en virtuell namnbaserad host för `linux.dbwebb.se`. Jag använder nano som editor.

```bash
cd /etc/apache2/sites-available
sudo cp 000-default.conf linux.dbwebb.se.conf
sudo nano linux.dbwebb.se.conf
```

Den färdiga filen `linux.dbwebb.se.conf` kan se ut så här för min egen användare mos. Du kan behöva ändra sökvägarna så de passar till din användare.

```html
<VirtualHost *:80>
    ServerAdmin mos@linux.dbwebb.se

    ServerName linux.dbwebb.se
    ServerAlias www.linux.dbwebb.se

    DocumentRoot /home/mos/vhosts/linux.dbwebb.se/htdocs

    ErrorLog  /home/mos/vhosts/linux.dbwebb.se/error.log
    CustomLog /home/mos/vhosts/linux.dbwebb.se/access.log combined

    <Directory />
        Options Indexes FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
        Require all granted
    </Directory>     
</VirtualHost>
```

Jag tänker mig alltså att min virtuella host skall ligga i min hemmakatalog `/home/mos` under en katalogstruktur om `vhosts/linux.dbwebb.se`. I den mappen sätter jag webrooten till `htdocs` och loggfilerna hamnar direkt i katalogen.

Så här fullföljer jag.

```bash
mkdir $HOME/vhosts
mkdir $HOME/vhosts/linux.dbwebb.se
mkdir $HOME/vhosts/linux.dbwebb.se/htdocs
```

Nu är det bara att *enabla* den virtuella hosten och låta Apache ladda om konfigurationen.

```bash
sudo a2ensite linux.dbwebb.se
sudo service apache2 reload
```



###Felsök konfigfilen {#felsok}

Om du får problem med konfigfilen så kan du titta i error-loggen för felutskrifter. Titta både i `var/log/apache2` och i loggilerna för den virtuella hosten.

```bash
sudo tail -f /var/log/apache2/error.log
tail -f $HOME/vhosts/linux.dbwebb.se/error.log
```

Du kan också köra följande kommandon för att se status på apache och dess konfigfil.

```bash
# Check status of apache
sudo service apache2 status

# Check configuration file for errors
apachectl configtest
apachectl -t

# List virtual hosts with settings
apachectl -S

# Stop and start the service
sudo service apache2 start
sudo apachectl start

sudo service apache2 stop
sudo apachectl stop
```



###En snyggare konfigfil med variabler {#define}

En variant av konfigfilen skulle kunna se ut så här, om man väljer att använda en form av alias, variabel, som är tillgänglig i konfigurationsfilen. På [Apache-språk heter det Define](http://httpd.apache.org/docs/2.4/mod/core.html#define).

```html
<VirtualHost *:80>
    Define site linux.dbwebb.se
    Define path /home/mos/vhosts

    ServerAdmin mos@dbwebb.se

    ServerName ${site}
    ServerAlias www.${site}

    DocumentRoot ${path}/${site}/htdocs

    ErrorLog  ${path}/${site}/error.log
    CustomLog ${path}/${site}/access.log combined

    <Directory />
        Options Indexes FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
        Require all granted
    </Directory>     
</VirtualHost>
```

Pröva att använda denna varianten istället. Som du ser så  är den klart enklare att duplicera när du vill skapa nya virtuella hostar. Du behöver bara ändra de två *Define* i början på filen.



Simulera ett hostnamn för servern {#dns}
-------------------------------------------

Du har nu en virtuell host som kommer svara så fort den får ett anrop på namnet *linux.dbwebb.se*. Vad du behöver göra är att peka domännmamnet på serverns ipadress.

Normalt gör vi detta med DNS. Vi lägger så att maskinens namn kopplas mot en ipadress och DNS:en håller koll så vi hamnar på rätt plats. Om du gör detta exemplet och har en server ute på nätet, så använder du DNS:en för att den skall hamna rätt.

Men nu har vi en utvecklingsmiljö med en server i VirtualBox som använder port forwarding för nätverket. Vi behöver alltså sätta upp lokalt, i vårt eget nätverk, att maskinen linux.dbwebb.se känns igen som 127.0.0.1 och hamnar på min server som ligger i VirtualBox.

I mitt fall, så kommer jag åt webbservern, på min server, via adressen `http://localhost:8080`. Jag kan nu lägga till ett entry i min egen fil för datornamn. Filen heter `/etc/hosts`, på min Debian/Linux desktop dator, och jag lägger till ett nytt lokalt datornamn i filen så här.

```text
sudo nano /etc/hosts
```

Följande rad lägger du till i filen.

```text
127.0.0.1   linux.dbwebb.se
```

På en klient med MacOS gör du på samma sätt.

Sitter du på Windows 7 eller 8/8.1 så heter filen följande. Glöm inte att du måste vara administratör för att redigera filen.

```text
C:\Windows\system32\drivers\etc\hosts
```

Nu kan jag komma åt den lokala maskinen via namnet istället. Adressen `http://linux.dbwebb.se:8080` är numer samma som att skriva `http://localhost:8080` eller `http://127.0.0.1:8080`. Det är precis detta som Apache tittar på när den identifierar den namnbaserade virtuella hosten.

När jag nu använder `http://linux.dbwebb.se:8080` så kommer jag till Apache som identifierar namnet som en virtuell host och använder den DocumentRoot som är specificerad.

Klart. Magiskt. Så vida det inte strular förstås. Då får man felsöka och göra om - göra rätt. Det är en hård värld vi lever i.



Avslutningsvis {#avslutning}
--------------------------------------

Namnbaserade virtuall hostar med Apache är ett bra sätt att köra flera webbplatser på en server. Det är också ett bra sätt att köra en utvecklingsserver med många webbplatser.

När man nu, som vi gjort, kombinerar detta med servar i VirtualBox, så får du en möjlighet att köra många webbplatser och att köra dem på många olika servrar som kan vara konfigurerade på olika sätt. Det kan vara ett kraftfullt verktyg för en webbprogrammerare.

Om du stöter på problem så kan du alltid fråga i forumet. Det finns en egen tråd om [Apache Name-based Virtual Hosts](t/4341).
