---
sectionHeader: true
linkable: true
author: lew
revision:
    "2019-04-18": "(A, lew) Första versionen."
...
Docker network
=======================

Docker kan skapa olika typer av nätverk, *bridge*, *host*, *overlay*, *mcvlan* och *none*. Default är bridge, vilket även är den vi kommer använda.Det finns en hel del att lära sig om "Docker networking" så vi håller oss lite i utkanten inom kursen.

För en översikt vad vi kan göra med *network*-kommandot kör vi `$ docker network`:

```
Usage:	docker network COMMAND

Manage networks

Commands:
  connect     Connect a container to a network
  create      Create a network
  disconnect  Disconnect a container from a network
  inspect     Display detailed information on one or more networks
  ls          List networks
  prune       Remove all unused networks
  rm          Remove one or more networks

Run 'docker network COMMAND --help' for more information on a command.
```

Vi kan se att vi här kan ansluta en container till ett nätverk men vi gör det i *run*-steget.
