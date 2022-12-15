---
author: efo
revision:
    "2021-12-18": (A, efo) Skapad inför VT2022.
...
Deployment av Python Flask app Container
==================================

Vi tar en titt på hur vi kan driftsätta vårt Python/Flask API i en Docker Container.



<!--more-->



Vi ska nu gå igenom en laboration med momenten

    Skapa ett konto på Docker Hub
    Skapa en container med Docker som innehåller en Python app
    Publicera containern på Docker Hub
    Skapa en Azure Web App
    Publicera containern i webappen

En grundförutsättning för laborationen är att Docker installeras, du kan läsa om installationen [här](https://dbwebb.se/kunskap/installera-virtualiseringsmiljon-docker).



Skapa en Python Flask app Docker Container {#docker}
--------------------------------

Steg 1: enligt Docker Hub's instruktion [Steg 1](https://docs.docker.com/docker-hub/#step-1-sign-up-for-a-docker-account) - Skapa ett Docker Id

Steg 2: enligt Docker Hub's instruktion [Steg 2](https://docs.docker.com/docker-hub/#step-2-create-your-first-repository) - Skapa ett repository

Steg 3: enligt Docker Hub's instruktion [Steg 3](https://docs.docker.com/docker-hub/#step-3-download-and-install-docker-desktop) - Installera Docker på din dator

Steg 4: Lägg till en Dockerfile i din katalog där du har ditt Python API. Dockerfile bör innehålla nedanstående.

```shell
# Skapar ett lager/sätter en basimage för Python 3.8 Detta lager är read-only.
FROM python:3.8

# Sätt vilken folder som är working directory i containern
WORKDIR /code
COPY . .
RUN pip install -r requirements.txt

EXPOSE 5000

# Command att köra när containern startar
CMD [ "python", "./app.py" ]
```

I ditt API lägger du även till att vi vill starta igång appen längst ner. Vi gör det med `if __name__ == "__main__":` konstruktionen enligt:

```python
if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
```

När detta är gjort hoppar vi över punkt 1 men följer punkt 2-5 enligt Docker Hub's instruktion [Steg 4](https://docs.docker.com/docker-hub/#step-4-build-and-push-a-container-image-to-docker-hub-from-your-computer) - Bygg och publicera en Docker image till Docker Hub från din dator.

Innan du går vidare försäkrar du dig om att `docker run` fungerar lokalt på din dator. Är svårt att felsöka på Azure så smidigare att göra lokalt. Du kan göra det med följande kommandon.

```shell
$ docker build -t <docker hub användarenamn>/<image namn du väljer själv> .
$ docker run -p 5050:5000 <docker hub användarenamn>/<image namn du väljer själv>
```

Du bör nu kunna komma åt ditt Flask API på url'n `http://localhost:5050`. Konstruktionen `-p 5050:5000` gör så att vi mappar port 5000 inne i docker containern till port 5050 utanför.

Steg 5: Skapa en Azure Web App för Docker image

Gå till [https://portal.azure.com](https://portal.azure.com) och skapa en ny WebApp.

Basics

* Välj denna gången att publicera Docker Container istället för Code.

* Välj Linux som Operating System

* Om du redan har en Linux AppServicePlan så återanvänd den.

* Gå vidare till Next: Docker >

![Docker basics](image/moln/azure_docker_basics.png)



### Docker

* Välj att publicera en Single Container

* Image Source är Docker Hub där din image är publicerad

* Access Type är den access type du valde att ditt repository skulle ha i steg 2, labben säger Private.

* Username och Password är ditt Docker Id och lösenord från steg 1.

* Image and tag följer strukturen {docker id}/{reponamn}:{tag} där taggen latest ger senast publicerade imagen.

* Gå vidare till Review + Create

* Om allt valideras OK så gå vidare med Create

![Docker basics](image/moln/azure_docker_part_2.png)



### Uppstart

Nu skapas webapp-resursen upp och när det är klart kan du gå in på webappen i portal.azure.com och titta i fliken Deployment Center (Preview) för att följa hur din Docker image hämtas från Docker Hub och startas upp.

När din docker image är initialiserad och redo att ta emot requests så kan du surfa till den och kontrollera att allt funkar som förväntat.

![Docker basics](image/moln/azure_docker_start.png)

Skulle det vara att något inte fungerar på grund av någon konfiguration som var fel då du skapade din webapp så går det att ändra under Deployment Center (Preview) -> Settings

![Docker basics](image/moln/azure_docker_settings.png)



### Sammanfattning

Du har nu skapat ett Docker Hub repository, publicerat en Docker image i repot, och använt imagen för att publicera en python app till en Azure Web App.

Genom att skapa en Docker image kan du vara säker på att den Docker image som du skapar och testar lokalt kommer fungera på samma sätt även på andra platser och miljöer.
