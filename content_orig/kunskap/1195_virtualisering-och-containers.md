---
author: efo
revision:
    "2021-12-17": (A, efo) Skapad inför VT2022.
...
Virtualisering, Containers, Docker & Orchestrators
==================================

Vi tar en repetition av virtualisering och tittar på några andra begrepp som är viktiga för att molnet ska fungera.



<!--more-->



### Vad innebär Virtualisering {#virtualisering}

"Med virtualisering skapas en simulerad, eller virtuell, datormiljö till skillnad från en fysisk miljö. Virtualisering innefattar ofta datorgenererade versioner av maskinvara, operativsystem, lagringsenheter och annat. Det gör att organisationer kan dela upp en enskild fysisk dator eller server i flera virtuella datorer. Varje virtuell dator kan sedan interagera var för sig och köra olika operativsystem eller program samtidigt som de delar resurserna på en enskild värddator.

Eftersom flera resurser skapas på en enskild dator eller server ger virtualisering bättre skalbarhet och arbetsbelastningar med färre servrar, lägre energiförbrukning, lägre infrastrukturkostnader och mindre underhåll."

Källa: [Vad är virtualisering?](https://azure.microsoft.com/sv-se/overview/what-is-virtualization/) hos Microsoft.

Virtualisering sker genom mjukvara som kallas Hypervisor. Man kan tänka sig hypervisorn som ett lager som ligger mellan den fysiska datorn eller servern och de virtuella plattformar som den hanterar. Några vanliga hypervisors är VmWare, Hyper-V och VirtualBox.

Titta på [denna videon](https://www.youtube.com/watch?v=FZR0rG3HKIk) från IBM som ger en bra grundbeskrivning.



### Vad är Containers? {#containers}

Containers är en mycket använd teknik för att lösa problemet med hur man får mjukvara att fungera på samma sätt i olika utvecklings- och driftmiljöer.

En container består av en runtime-miljö: dels din applikation, men också de bibliotek, konfiguration och filer som den är beroende av.

Genom att kapsla in din applikation med dess plattform och beroenden i en container så avskärmar du den samtidigt från operativsystem och infrastruktur.

Läs igenom [What is a Container?](https://www.docker.com/resources/what-container) och titta på denna [videon](https://youtu.be/EUitQ8DaZW8).



### Vad är skillnaden mellan containers och virtualisering? {#difference}

Med virtualiseringsteknik blir själva lagret ovanpå hypervisorn en hel server som inkluderar både operativsystem och själva applikationen.

Om du däremot använder dig av containermetoden så skulle en server som kör tre containeriserade applikationer ha ett enda operativsystem, och varje container delar operativsystemkärnan med sina syskoncontainers. Det betyder att containers är mycket lättare och använder mycket färre resurser än virtuella maskiner.



### Vad är Docker? {#docker}

Docker är ett open-source projekt för att automatisera deployment av applikationer som containers.

Med Docker kan man köra flera containers samtidigt på en virtuell eller fysisk maskin.

Läs igenom [What is Docker](https://docs.microsoft.com/en-gb/dotnet/architecture/microservices/container-docker-introduction/docker-defined), [Docker terminology](https://docs.microsoft.com/en-gb/dotnet/architecture/microservices/container-docker-introduction/docker-terminology) och [Docker containers, images, and registries](https://docs.microsoft.com/en-gb/dotnet/architecture/microservices/container-docker-introduction/docker-containers-images-registries).



### Vad är Container Orchestrators? {#orchestrators}

En Container Orchestration plattform automatiserar provisionering och driftssättning av containers, har verktyg för konfiguration och schemaläggning, lastbalansering, monitorering, managering, skalning och kommunikation mellan containers, och mycket mer.

Den troligen mest kända plattformen är Kubernetes, men det finns många alternativ som t.ex. Docker Swarm, Marathon, Amazon ECS, Azure Container Services mm.

Titta på [Container Orchestration Explained](https://www.youtube.com/watch?v=kBF6Bvth0zw).

![Docker orchestrators](https://i1.wp.com/www.docker.com/blog/wp-content/uploads/2019/10/Docker-Kubernetes-together.png?w=1600&ssl=1)
