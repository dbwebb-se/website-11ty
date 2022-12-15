---
author: mos
category: webbprogrammering
updated: "2013-07-03 10:19:00"
created: "2013-07-03 10:04:31"
...
Komprimera stylesheets och javascript med Apache
==================================

Det handlar om att snabba upp sin webbplats. Att komprimera stylesheets och javascript-filer kan göras automatiskt av apache, det är en inställning som gör att komprimeringen sker *"on-the-fly"*.

<!--more-->

Genom att använda [Googles PageSpeed](https://developers.google.com/speed/pagespeed/) kan man analysera sin egen webbplats och se var problemen ligger. Ett tips jag fått är att komprimera stylesheets (`.css`) och javascript-filer (`.js`).

Som tur är så är det enkelt åtgärdat genom att lägga in följande rader i en filen `.htaccess`.

```bash
# BEGIN GZIP
<ifmodule mod_deflate.c>
AddOutputFilterByType DEFLATE text/text text/html text/plain text/xml text/css application/x-javascript application/javascript
</ifmodule>
# END GZIP
```
Det är alltså en modul i Apache som [sköter om komprimeringen](http://httpd.apache.org/docs/current/mod/mod_deflate.html). 

Testa din webbsida i Google PageSpeed verktyg och se om det ökar din ranking. Min ranking ökade från [59](f/10914) till [61](f/10915), alltid något.
