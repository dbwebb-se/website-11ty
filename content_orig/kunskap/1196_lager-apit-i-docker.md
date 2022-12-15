---
author: efo
revision:
    "2021-12-18": (A, efo) Skapad inför VT2022.
...
Deployment av Lager-API:t i en Docker Container
==================================

Vi tittar på hur vi kan driftsätta Lager API:t i en Docker Container.



<!--more-->



Förkunskaper {#pre}
--------------------------

Du har gjort övningen "[Deployment av Python Flask app Container](kunskap/deployment-av-python-flask-container)".



Hämta koden {#download}
--------------------------

Vi har tidigare under kursens gång i artikeln "[Deployment av Python Flask app Container](kunskap/deployment-av-python-flask-container)" skapat ett Docker Hub konto och driftsatt vårt Flask API i en Docker Container. Denna artikeln utgår från att alla stegen i den tidigare artikeln har genomförts.

Vi behöver få tag i koden för Lager-API:t, koden finns på GitHub under [emilfolino/order_api](https://github.com/emilfolino/order_api). Du kan antigen klona ner repot eller ladda ner koden i en Zip-fil. Båda sätten kommer du åt under den gröna Code-knappen på GitHub.

Koden för API:t är nodejs som är JavaScript men som körs på en server istället för i en webbläsare. I botten av Lager-API:t finns en SQLite3 databas som är en textbaserad databas. Det går att ladda ner en version av databasen här i Canvas: [orders.sqlite](https://bth.instructure.com/courses/3951/files/620446?wrap=1). Filen bör läggas i order_api/v2/db katalogen för att API:t ska fungera.

Dessutom behövs en config-fil i en katalog du själv skapar som heter config. Skapa filen `config/config.json` som utgår från roten av det nerladdade repot. Fyll den med innehållet:

```json
{
    "secret": "Ib9SuTftkuGvsWi7wBuvfCvzU6q7oYRF"
}
```

I repot under `order_api/docker` finns Dockerfiles för olika versioner av nodejs. Vi väljer dock att använda den Dockerfile som ligger i roten av repot:

```shell
# Use a base image
FROM node:latest

# Install sqlite3
RUN apt-get update
RUN apt-get install sqlite3

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
# A wildcard is used to ensure both package.json AND package-lock.json are copied
# where available (npm@5+)
COPY package*.json ./

RUN npm install
# If you are building your code for production
# RUN npm ci --only=production

# Bundle app source
COPY . .

EXPOSE 8111
CMD [ "node", "app.js" ]
```

Nu vet Docker om att det är denna fil vi vill använda oss av.

Nedanstående är samma som när ni publicerade Flask WebAppen med hjälp av en Docker container. En av de stora fördelarna med Docker.



När detta är gjort hoppar vi över punkt 1 men följer punkt 2-5 enligt Docker Hub's instruktion [Steg 4](https://docs.docker.com/docker-hub/#step-4-build-and-push-a-container-image-to-docker-hub-from-your-computer) - Bygg och publicera en Docker image till Docker Hub från din dator.

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
