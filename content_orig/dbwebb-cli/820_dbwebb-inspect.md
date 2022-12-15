---
author: mos
category: labbmiljo
revision:
  "2015-03-23": (A, mos) Arbetskopia för dbwebb-validate version 2.
updated: "2015-03-23 16:46:34"
created: "2015-03-23 11:34:32"
...
Kommandot dbwebb-inspect
==================================

Kommandot `dbwebb-inspect` är en *command line utility* för dbwebb-kurserna. Kommandot används för att inspektera ett inlämnat kursmoment. 

Kommandot är ett grundläggande administrativt verktyg för hur både studenter och lärare jobbar med kurserna.


<!--more-->

Denna artikel är dokumentationen för kommandot `dbwebb-inspect` och förklarar vilket arbete som kommandot utför.



Installera {#install}
-----------------------------------------------

Normalt behöver du inte själv installera kommandot `dbwebb-inspect`. Det finns redan installerat på studentservern och där används det när du kör följande varianter av `dbwebb`.

```text
$ dbwebb inspect kmom01
```

Du kan dock, om du känner för det, installera en egen lokal kopia av kommandot på följande sätt.

```text
$ wget https://raw.githubusercontent.com/mosbth/dbwebb-cli/master/dbwebb2-inspect -O dbwebb-inspect
$ sudo install dbwebb-inspect /usr/local/bin/dbwebb-inspect
```

Pröva om det gick bra genom att kolla vilken version du har.

```text
$ dbwebb-inspect --version
```

Vill du ha hjälp så kan du få fram en lista på vad kommandot kan göra.

```text
$ dbwebb-inspect --help
```



Uppdatera {#selfupdate}
-----------------------------------------------

Du kan alltid uppdatera till senaste versionen av `dbwebb-inspect` genom att köra följande kommando.

```text
$ dbwebb-inspect --selfupdate
```



Avslutningsvis {#avslutning}
-----------------------------------------------

Om du har [frågor kring kommandot `dbwebb-inspect`](/t/4017) så ställer du dem i forumet.
