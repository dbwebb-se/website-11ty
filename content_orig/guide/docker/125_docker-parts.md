---
author: lew
revision:
    "2019-05-09": "(A, lew) Första versionen."
...
Delarna som utgör Docker
=======================

För att förstå hur Docker fungerar, kan det vara bra att känna till de olika delarna som Docker består av. Bilden nedan beskriver hur de olika delarna hänger ihop:

[FIGURE src=image/vlinux/docker-architecture.png caption="Arkitekturen i Docker."]



### Docker Client

Det är med klienten som vi kommunicerar med Docker. När vi skriver kommandon skickas de till Docker daemon (dockerd) som tar hand om dem via ett API.



### Docker daemon {#docker-daemon}

Docker daemon är en service som hanterar objekt såsom images, containrar, nätverk och volymer. Vad de delarna är tar vi strax. Det är som sagt med API:et som andra delar kan prata med Docker daemon för att hantera objekten.
