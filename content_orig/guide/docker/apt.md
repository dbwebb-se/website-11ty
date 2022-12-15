---
sectionHeader: true
linkable: true
author: lew
revision:
    "2019-04-27": "(A, lew) Första versionen."
...

APT, apt och pakethantering
=======================

När vi hanterar program i Linux använder vi en pakethanterare. Paketen består av det som behövs för att programmen ska fungera och Debian och Debian-baserade distributioner (tex Ubuntu) använder en uppsättning verktyg som kallas `APT` (Advanced package tool) för att hantera dem.

Du har redan använd pakethanterare i andra kurser, till exempel composer i PHP, npm i JavaScript, pip i Python osv.



### Kommandot apt {#apt}

Vi använder som sagt apt som pakethanterare och innan vi kan börja installera program behöver vi förstå hur det ligger till med paketlistor och de grunläggande "options" till aptkommandot.


### apt update {#update}

update, install, search, upgrade etc
