---
author: lew
revision:
    "2020-03-11": "(A, lew) Första versionen."
...

En snyggare konfigfil med variabler {#define}
----------------------------------------------------

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
