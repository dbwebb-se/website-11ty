---
author: efo
revision:
    "2021-12-07": (A, efo) Första utgåvan för kursen.
...
kmom02: En applikation i molnet
==================================

Vi har nu fått en känsla för virtualisering och hur en applikationsserver fungerar. Vi skapar först en Python och Flask applikation, som vi i slutet av kursmomentet driftsätter i Azures Cloud.



<!--more-->



Läsanvisningar  {#lasanvisningar}
---------------------------------

### Artiklar {#articles}

Läs igenom [Introduktion till molnet](kunskap/introduktion-till-molnet).



### Lästips {#lastips}

I detta kursmomentet kommer vi använda micro-ramverket `flask` och python modulen `requests`. När vi skriver kod är dokumentation och referensmanualer A och O. Ta därför en översiktlig blick på dokumentationen för de två modulerna.

* [Flask](https://flask.palletsprojects.com/en/2.0.x/)

* [Requests](https://docs.python-requests.org/en/latest/)



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

### Övningar {#ovningar}

Gör följande övningar för att träna inför uppgifterna.

1. Jobba igenom övningen "[En Flask App i molnet](kunskap/en-flask-app-i-molnet)" för att skapa grunden till kursmomentets uppgifter.



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och lämnas in. Uppgifterna får utföras tillsammans i par. Skriv en kommentar i Canvas med namn på eventuell samarbetsstudent.

1. Gör uppgiften "[Ett Python och Flask API driftsatt i molnet](uppgift/ett-python-och-flask-api-driftsatt-i-molnet)".



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

1. Ta reda på vilken cloud service provider som tre av de tjänster du konsumerar använder. Oscar beskriver sina tre tjänster i [Introduktion till molnet](kunskap/introduktion-till-molnet).

1. Vilka för- och nackdelar finns med att använda ett JSON-API för att överföra data jämfört med till exempel en webbplats eller en databas?

1. Vad är skillnaden på IAAS och PAAS tjänster? Ge exempel på scenarion då det är fördelaktigt att välja den ena över den andre.

1. Vad är fördelar med Serverless arkitekturen?

1. Ditt API gör succé! Särskilt vid årsskiftet märks en avsevärt högre mängd anrop. På vilka sätt skulle man kunna hantera dessa trafik- och belastningsförändringar?

1. Ditt API har blivit en grundläggande del i många bolags basbehov och kravet på hög tillgänglighet ökar. På vilka sätt skulle man kunna förstärka den tillgänglighet som din tjänst har idag?

1. Vilken är din TIL för detta kmom?
