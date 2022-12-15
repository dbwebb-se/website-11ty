---
author: lew
revision:
    "2020-03-11": "(A, lew) Första versionen."
...
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
