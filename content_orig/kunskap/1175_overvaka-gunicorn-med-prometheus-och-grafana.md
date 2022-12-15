---
author: moc 
category:
    - devops
    - monitoring
revision:
    "2020-11-17": (A, moc) Skapad inför HT2020.
...
Övervaka Gunicorn med Prometheus och Grafana {#intro}
=====================================================

I denna artikel skall vi gå igenom hur man kan övervaka trafiken från en gunicorn server med hjälp av Prometheus och Grafana.

<!--more-->

Förutsättningar {#forutsattningar}
-------------------------------------
Ni har jobbat igenom installerat [Complete Node Exporter Mastery with Prometheus](https://devconnected.com/complete-node-exporter-mastery-with-prometheus/) och installerat Grafana samt Prometheus.


Konfigurera statsd exporter {#stub_exporter}
---------------------------------------------------------
För att prometheus skall kunna läsa allt som händer i gunicorn behöver vi starta en ny [statsd exportör](https://github.com/prometheus/statsd_exporter) för prometheus, ni får installera den på ett valfritt sätt men jag väljer att använda Docker och börjar med att hämta den senaste versionen:

```
$ docker pull prom/statsd-exporter
```

När imagen har laddats ner måste vi skapa en *metrics map* som gör att prometheus kan sortera HTTP -statuskoderna och låta oss filtrera bort ointressant data. Jag skapar en ny fil `statsd.conf` och lägger till följande:

```yml
mappings:
  - match: helloworld.gunicorn.request.status.*
    help: "http response code"
    name: "http_response_code"
    labels:
      status: "$1"
      job: "helloworld_gunicorn_response_code"
```

När konfigurationsfilen är skapad kan vi starta exportören med följande Docker-kommando:

```
$ docker run -dP --net=host -v ${PWD}/statsd.conf:/statsd/statsd.conf prom/statsd-exporter "--statsd.mapping-config=/statsd/statsd.conf"
```

Kommandot startar containern och använder port 9102 för att skicka data och det är här vi senare kopplar prometheus. Port 9125 för att ta emot data, skickas från gunicorn.

Gunicorn har ett plugin som låter oss använda [statsD](https://docs.gunicorn.org/en/stable/instrumentation.html) protokollen för att exportera den data vi senare vill åt. För att Gunicorn ska kunna komma åt statsD’s portar behöver båda containrar köras i samma Docker-nätverk. Vi två alternativ, antingen skapar vi ett nätverk och köra båda containers i den eller så använder vi `host`. Nätverket `host` är speciellt, man kan inte öppna portar för containern manuellt utan alla portar är tillgängliga automatiskt, vilket betyder att man exempelvis inte behöver `-p 8000:5000` när vi startar en container. Om ni kör på host nätverket glöm inte försäkra er att nginx är kopplad till rätt port och att den också är öppen på Azure.

Jag använder `host`, vill ni använda ert eget får ni inte glömma att uppdatera föregående Docker kommando.

Nu behöver vi uppdatera `boot.sh` (som vi använder för att starta Docker) med en statsD -host och prefix.

```bash
#!/bin/sh
source /home/microblog/venv/bin/activate

while true; do
    flask db upgrade
    if [[ "$?" == "0" ]]; then
        break
    fi
    echo Upgrade command failed, retrying in 5 secs...
    sleep 5
done

exec gunicorn --statsd-host=localhost:9125 --statsd-prefix=helloworld --bind :5000 --access-logfile - --error-logfile - microblog:app
```

Detta kommer säga vart datan skall skickas samt vilken prefix applikationen skall använda sig utav.

[INFO]
Jag använder prefixen "helloworld" för att slippa ändra i den [färdigskrivna grafana kod](#config_graf) som vi skall använda oss utav senare, men vill man ändra den så kan du gärna göra det.
[/INFO]


Konfigurera Prometheus {#config_prom}
---------------------------------------------------------
Nu när mätvärden skickas ut till statsd-exportören kan vi konfigurera prometheus till att fånga upp den. I din konfigurationsfil kan du lägga till följande jobb:

```yml
- job_name: 'helloworld_gunicorn'
  static_configs:
  - targets: ["<appServerIP>:9102"]
```

Vi kan nu starta om prometheus, testa att besöka din *Microblog* några gånger och sedan skall följande dyka upp:

[FIGURE src="https://miro.medium.com/max/333/1*ueDIQL0RBYkOA9VSZo6rQA.png"]


Konfigurera Grafana {#config_graf}
---------------------------------------------------------
Nu när allt är uppsatt kan vi använda oss av [färdig kod](https://gist.github.com/AndreasArne/1aa5856f0dc24b2499c3ae9d14b58d83) som sätter upp en graf liknande bilden under.

[FIGURE src="https://miro.medium.com/max/700/1*qOvSwx8S5DPWUZgmiFR3zw.png"]

För att importera inställningarna så går man in på "Settings", "JSON Model" och klistra in koden.
