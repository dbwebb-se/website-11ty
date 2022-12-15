---
author: mos
category:
    - bash
    - nodejs
    - javascript
revision:
    "2017-02-13": (A, mos) Första utgåvan i kursen dbjs, omarbetad från linux-kursen.
...
Skicka environment variabler till Node.js 
==================================

[FIGURE src=/image/snapht15/bash-env.png?w=c5&a=7,80,60,0 class="right"]

När man startar en server med Node.js så vill man kunna styra på vilken port servern snurrar. Normalt sätter man portens värde i själva programmet, hårdkodat. Men, säg att man vill att den som startar programmet skall kunna styra vilken port som används, hur löser vi det?

environment variabler, eller miljövariabler, är en variant. Låt oss se hur det kan se ut.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du kör denna artikel i terminalen i Linux, Mac OS eller Cygwin.



Att läsa och sätta en environmentvariabel {#set}
--------------------------------------

Låt kika på de variabler som redan finns satta i miljön och hur man läser av individuella värden samt sätter ett nytt värde, eller ny variabel.



###Vilka variabler finns? {#vilka}

I bash-terminalen kan du se alla de variabler som redan finns. Du kan tänka på dessa som globala variabler och de är tillgängliga för alla program och skript som du kör på din dator.

De variabler som är definerade är kopplade till den terminal-sessionen du är i. Du kan alltså öppna två terminaler och lägga till en variabel i den ena terminalen, men den kommer inte synas i den andra.

Så här kan du se de variabler som är definierade. Skriv följande i terminalen.

```bash
$ env
...
PWD=/home/mos     
EDITOR=vim        
LANG=C.UTF-8      
TMUX_PANE=%11     
XDG_SEAT=seat0    
SHLVL=3           
PYENV_SHELL=bash  
HOME=/home/mos    
LANGUAGE=en_US:en 
LOGNAME=mos       
LC_CTYPE=C.UTF-8  
...
```

Några av de variabler som finns satta, kan du läsa om i manualsidan för environ. Det kan vara en startpunkt om du vill läsa mer om några av de variabler som finns satta från start.

```bash
$ man environ
```

Variablerna kan sättas i de startupfiler som finns i systemet. De läses in när du loggar in i systemet eller när du öppnar en ny terminal. Mer exakt vilka startupfiler som används bestäms av ditt shell (bash). Detta är dock inget vi skall fördjupa oss i just nu. Vill du veta mer om det så ger manualsidan för bash ett facit till hur det fungerar.



###Sätta värde på variabel {#write}

I ovan svar från `env` kan du se värdet på variabeln `EDITOR`. Det bestämmer vilken som är min standard editor. Program kan välja att avläsa den variabeln för att bestämma vilken editor en skall öppnas i.

Om du inte har ett värde på variabeln kan du sätta det så här.

```bash
$ EDITOR="vim"
```

Nu gäller det värdet för den terminalsessionen du befinner dig i.

Du kan kontrollera om värdet är satt.

```bash
$ env | grep EDITOR
EDITOR=vim
```


###Läsa av och ändra variabel {#read}

Vill man läsa av värdet på en variabel så gör man så här.

```bash
$ echo $EDITOR
vim
```

Vill jag ändra värde på den så gör jag en tilldelning.

```bash
$ EDITOR="nano"
$ echo $EDITOR
nano
$ env | grep EDITOR
EDITOR=nano
```



Exportera variabel till andra program {#export}
---------------------------------------------

Låt oss se hur vi kan exportera en variabel så att den går att läsa i ett annat program, till exempel från ett Node.js program.



###Exportera från bash {#export}

Först använder vi `export` för att exportera variabeln och dess värde. Utan det så blir variabeln inte synlig i andra program.

```bash
$ export LINUX_PORT=1338
$ echo $LINUX_PORT
1338
$ env | grep LINUX_PORT
LINUX_PORT=1338
```

Nu finns variabeln satt och är exporterad.

Kommandot `export` är inbyggt i shellet och du kan få mer information om kommandot via dess hjälp.

```bash
$ export --help
```

Om du vill se samtliga variabler som exporteras så kan du bara skriva `export` så får du en lista.

```bash
$ export
# ...
# lång lista med variabler som exporteras till alla program
# som startas från shellet
```



###Läsa variabel i JavaScript {#read-node}

Vi startar node interaktivt och läser av de miljövariabler som är satta. Vi gör det genom att använda [process.env](https://nodejs.org/api/process.html#process_process_env).

```bash
$ node -i
> process.env.LINUX_PORT
'1338'
> console.log(process.env.LINUX_PORT)
1338
> process.env
# ...
# Lista med samma värden som från kommandot env,
# men enbart för de variabler som är exporterade.
```

Nu vet vi att vi kan läsa av environment variabler direkt från JavaScript och Node.js.



JavaScript-kod för att läsa av variabel {#program}
-----------------------------------

Så, om vi nu vill ha kod i vårt JavaScript-program som läser av en eventuell environmentvariabel så skulle det kunna se ut ungefär så här.

```javascript
/**
 * Read environment variable and show its value, if its defined.
 */
"use strict";

console.log(process.env.LINUX_PORT);

if ('LINUX_PORT' in process.env) {
    console.log(`LINUX_PORT is set to '${process.env.LINUX_PORT}'`);
}
else {
    console.log("LINUX_PORT is not set.");
}
```

Gör ett eget litet testprogram och se att det fungerar som tänkt.



Avslutningsvis {#avslutning}
--------------------------------------

Du hittar mina exempelprogram i kursrepot under `example/nodejs/readEnvironmentVariable`.

Nu har du lärt dig hur du kan använda environment variabler och hur de kan läsas av externa program. Det blir som ett sätt att skicka parametrar till ett program, eller som att delvis konfigurera ett program.

Denna artikel har en [egen forumtråd](t/6220) som du kan ställa frågor i, eller ge tips.
