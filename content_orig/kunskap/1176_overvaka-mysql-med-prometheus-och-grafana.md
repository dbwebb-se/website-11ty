---
author: aar
category:
    - devops
    - monitoring
revision:
    "2020-11-19": (A, aar) Skapad inför HT2020.
...
Övervaka MySQL med Prometheus och Grafana {#intro}
=====================================================

I denna artikel skall vi gå igenom hur man kan övervaka trafiken till våran MySQL server med hjälp av Prometheus och Grafana.

<!--more-->
real time monitoring on active connections, locks or queries 
You also want to monitor active users, what they are running, as well as average query times.

Vi vill ha koll på vad som händer med databasen och det finns så klart en exporter för MySQL också. Vi kan b.la. se antal aktiva uppkopplingar, queries och snitt tid för queries. Jag sätter upp min exporter som en Docker container, om ni inte vill göra det kan ni följa [Complete mysql daschboard with Grafan and Prometheus](https://devconnected.com/complete-mysql-dashboard-with-grafana-prometheus/).



Förutsättningar {#forutsattningar}
-------------------------------------
Ni har jobbat igenom installerat [Complete Node Exporter Mastery with Prometheus](https://devconnected.com/complete-node-exporter-mastery-with-prometheus/) och installerat Grafana samt Prometheus.



Förbered MySQL {#prep}
---------------------------------------------------------

Börja med att logga in på er databas instans. Sen behöver vi ha root lösenordet till er MySQL instans, om du inte sätter något root lösenord när du starta mysql containern kan vi hitta det i Dockers loggar för containern.

```bash
docker logs <mysql_container> 2>&1 | grep GENERATED
```

Sen kan vi logga in i databasen och skapa en ny användare för mysql_exporter att logga in som. Men vi måste först ändra root lösenordet innan MySQL låter oss skapa nya användare.

```
docker exec -it <container> mysql -uroot -p

mysql> ALTER USER 'root'@'localhost' IDENTIFIED BY '<password>'; # skippa detta steget om du sätter root lösenord när du skapar containern.

mysql> CREATE USER 'exporter'@'%' IDENTIFIED BY '<password>' WITH MAX_USER_CONNECTIONS 3;
mysql> GRANT PROCESS, REPLICATION CLIENT, SELECT ON *.* TO 'exporter'@'%';
mysql> GRANT SELECT ON performance_schema.* TO 'exporter'@'%';
```



Starta mysqld-exporter {#mysqld-exporter}
--------------------------------------------------------

Nu kan vi starta upp en `mysqld-exporter` container och koppla till databasen.

```
docker pull prom/mysqld-exporter

docker run -d \
  -p 9104:9104 \
  --network host \
  -e DATA_SOURCE_NAME="exporter:<password>@(localhost:3306)/" \
  --restart always\
  prom/mysqld-exporter:latest \
  --collect.auto_increment.columns \
  --collect.binlog_size \
  --collect.engine_innodb_status \
  --collect.engine_tokudb_status \
  --collect.global_status
```
--collect... är flaggor för vilken data som exportern ska samla in. Det finns väldigt många fler och ni kan läsa om dem på [MySQL exporters GitHub](https://github.com/prometheus/mysqld_exporter#collector-flags).

Testa så det fungera i terminalen med `wget localhost:9104/metrics`, om ni får ner en fil med data så fungerar det.

När det fungerar ska ni öppna upp porten 9104 på Azure så att Prometheus kommer åt datan. Lägg också till porten i rollen `security_groups`.



Konfigurera Prometheus {#configure_prom}
---------------------------------------------------------

Nu kan ni konfigurera Prometheus att hämta datan, lägg till följande i er Prometheus konfiguration:

```
scrape_configs:
  - job_name: 'mysql'
    static_configs:
            - targets: ['<database_host_ip>:9104']
```

Starta om Prometheus och gå sen in på GUI:ts webbsida och testa hämta datan `mysql_exporter_scrapes_total` för att kolla att kopplingen fungerar.



Konfigurera Grafana {#configure_graf}
---------------------------------------------------------

Vi vill så klart ha fina grafer att titta på också. Företaget [Percona](https://github.com/percona/grafana-dashboards) har en hel drös med färdiga dashboards för MySQL och MongoDB. Vi väljer [MySQL_Overview.json](https://github.com/percona/grafana-dashboards/blob/98924a83e9465228fb8a8b734de71c3613cdd213/dashboards/MySQL_Overview.json), importera den i Grafana.

Nu skall vi en dashboard som ser ut något så här:

[FIGURE src="image/devops/dashboards-mysql-overview.png" caption="MySQL Overview. Source https://devconnected.com/complete-mysql-dashboard-with-grafana-prometheus/"]



Avslutningsvis {#avslutningsvis}
-------------------------------------
Och där var det klart, nu har vi en fin *dashboard* för MySQL.

Glöm inte heller att också öppna portarna i era *security groups*.
