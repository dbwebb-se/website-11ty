---
author: lew
revision:
    "2019-04-30": "(A, lew) Första versionen."
...
Skapa nätverk
=======================

Först och främst behöver vi ska ett nätverk. Vi vill använda default-nätverket så vi skapar ett genom att köra:

```
$ docker network create dbwebb
e0646a5e7e2d9c6550d1c7c5a3871d7cf90ac3c1ba20baa71c29336111b1ef9c
```

Nätverket får då ett id och vi kan se att det är skapat med:
```
$ docker network ls
NETWORK ID          NAME                DRIVER              SCOPE
ab697b54645c        bridge              bridge              local
e0646a5e7e2d        dbwebb              bridge              local
ebda8a98b757        host                host                local
5c613021151a        none                null                local
```

Det skapas automatiskt några default-nätverk men vi ser även vårt egna *dbwebb* i listan. Vi kör en inspect:

```
$ docker network inspect dbwebb
[
    {
        "Name": "dbwebb",
        "Id": "e0646a5e7e2d9c6550d1c7c5a3871d7cf90ac3c1ba20baa71c29336111b1ef9c",
        "Created": "2019-04-30T10:39:08.877870381+02:00",
        "Scope": "local",
        "Driver": "bridge",
        "EnableIPv6": false,
        "IPAM": {
            "Driver": "default",
            "Options": {},
            "Config": [
                {
                    "Subnet": "172.19.0.0/16",
                    "Gateway": "172.19.0.1"
                }
            ]
        },
        "Internal": false,
        "Attachable": false,
        "Ingress": false,
        "ConfigFrom": {
            "Network": ""
        },
        "ConfigOnly": false,
        "Containers": {},
        "Options": {},
        "Labels": {}
    }
]
```
