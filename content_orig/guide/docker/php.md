---
author: lew
revision:
    "2019-04-12": "(A, lew) Första versionen."
...
PHP
=======================

För att vi ska kunna exekvera php-kod på servern behöver vi först installera php.



### Installera php7.3 {#installera-php}

Vi installerar php7.3 och testar om det fungerar.

```
FROM debian:buster-slim

RUN apt-get update && \
    apt-get -y install apache2 \
    php7.3 \
    libapache2-mod-php7.3

RUN a2enmod php7.3

RUN mv /var/www/html/index.html /var/www/html/index.php && \
    echo "<?php phpinfo();" > /var/www/html/index.php

CMD apachectl -D FOREGROUND
```

Först installerar vi php7.3 och lägger till det till "enabled modules".

Det sista `RUN`-kommandot byter filändelse på default-filen och sedan fyller jag på filen med `phpinfo()` som visar php-miljön på servern.



### Bygga och köra {#build-n-run}

Nu har vi allt på plats för att bygga vår image...

`$ docker build -t username/imagename:tag .`

...och köra den:

`$ docker run --rm -p 8080:80 username/imagename:tag`

Nu kan vi peka webbläsaren mot `localhost:8080`.
