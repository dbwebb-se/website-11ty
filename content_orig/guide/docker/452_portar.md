---
author: lew
revision:
    "2020-03-11": "(A, lew) Första versionen."
...
Välj port för containern
=======================

En port i detta fallet kallas för "virtuell port". Det är inte en USB-port eller Displayport, utan ett tillägg till en ipadress. Kortfattat så har en dator oftast en ipadress men kan köra många applikationer, till exempel via internet. Det är möjligt tack vare portarna. När vi surfar och utför http-requests använder vi vanligtvis port 80. Det är defaultporten även för Apache2. Vi har tidigare använt andra portar, tex 1337 som är en inofficiell standardport för en express-server, eller 5000 för Python och Flask.

Vi kan ofta själva välja port och kan då välja i runda slängar mellan 1100 och 65000.

Ungefär.

När vi kör igång containern kan vi använda ett option `-p` som låter oss mappa en port inuti containern mot en port utanför containern. Om vi kör vår Apache-image med följande run-kommando kan vi välja vilken port vi vill använda lokalt:

```console
$ docker run -p 8080:80 apachetest
```

Formatet är &lt;outside-port:inside-port&gt;. Vi kan nu komma åt containern via webbläsaren och adressen `localhost:8080`. Vi kommer då få se Apaches defaultsida som talar om att allt är ok:

[FIGURE src=/image/vlinux/apache-default.png caption="Apache2 defaultsida."]
