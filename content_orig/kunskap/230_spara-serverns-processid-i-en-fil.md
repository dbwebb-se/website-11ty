---
author: mos
category:
    - linux
    - javascript
    - nodejs
revision:
    "2017-02-14": (C, mos) Bort med babel.
    "2017-02-06": (B, mos) Uppdaterat exempelprogram och används även i dbjs-kursen, inklusive fånga signaler och Cygwin specifikt.
    "2015-10-16": (A, mos) Första utgåvan i kursen linux.
...
Spara serverns processid i en fil
==================================

[FIGURE src=/image/snapht15/bash-processid.png?w=c5&a=7,80,60,0 class="right"]

När man startar en server så kan det ibland vara behändigt att ha koll på vilket process id som servern får. Låt oss se hur vi kan ta reda på serverns process id i en Node.js server och spara undan detta id i en fil.

Låt oss se hur vi kan skicka signaler till servern för att stänga ned den och låt oss se hur vi kan hitta servrar som vi "tappat bort" i bakgrunden.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Följande artikel förutsätter att du kör på en Unix-maskin, Linux eller Mac OS. Du kan köra vissa delar av artikeln via Cygwin på en Windows-maskin, det finns noterat när du behöver göra annorlunda.

I slutet av artikeln visas en sammanfattning i hur du gör motsvarande ps och kill på Cygwin och Windows.

Artikeln bygger delvis på ett exempel som du återfinner i ditt kursrepo (linux, dbjs) under `example/nodejs/saveProcessId`.



Processens id {#id}
--------------------------------------

När man startar igång en process (på Unix/Linux/Mac OS) så får den ett process id som man kan använda för att senare kommunicera med processen. Detta är speciellt bra när man skickar processerna till bakgrunden med `&`-tecknet.

Se när jag lägger en process i bakgrunden från terminalen.

```bash
$ sleep 5 && ls &
[1] 30408 
```

Kommandosekvensen sover i fem sekunder och gör sedan en `ls` på katalogen man står i. Det är alltså hela kommandot `sleep 5 && ls` som körs i bakgrunden. Den siffran som skrivs ut är processens id.

Låt oss göra samma test men vi låter den sova lite längre så vi kan se den i processtabellen.

```bash
$ sleep 50 && ls &
[1] 30547
$ ps
PID TTY          TIME CMD
22338 pts/25   00:00:00 bash
30546 pts/25   00:00:00 bash
30547 pts/25   00:00:00 sleep
30548 pts/25   00:00:00 ps
$ ps aux | grep 30547
mos      30547  0.0  0.0   7488  1404 pts/25   S    16:40   0:00 sleep 50
mos      30564  0.0  0.0  14384  1704 pts/25   S+   16:41   0:00 grep --color=auto 30547
```

Med kommandot `ps` kunde jag nu se processen i processtabellen. Du kan använda olika switchar till kommandot ps. Till exempel `ps -H` för att visa en trädstruktur över familjeförhållanden mellan processer. Men kommandot tar olika switchar beroende på vilket system du är, så kolla man-sidan för att se vad just ditt system, stödjer.



Skicka signaler till en process {#kill}
--------------------------------------

När en process körs i bakgrunden så behövs ett sätt att kommunicera med den, och stänga ned den. Ett sådant sätt är kommandot `kill` som kan skicka en signal till en process via processens id.

Det finns många olika signaler och vi skall inte gå in på dem här. Men låt oss ändå kika på en översikt.

```bash
$ kill -l
 1) SIGHUP       2) SIGINT       3) SIGQUIT      4) SIGILL       5) SIGTRAP    
 6) SIGABRT      7) SIGBUS       8) SIGFPE       9) SIGKILL     10) SIGUSR1    
11) SIGSEGV     12) SIGUSR2     13) SIGPIPE     14) SIGALRM     15) SIGTERM    
16) SIGSTKFLT   17) SIGCHLD     18) SIGCONT     19) SIGSTOP     20) SIGTSTP    
21) SIGTTIN     22) SIGTTOU     23) SIGURG      24) SIGXCPU     25) SIGXFSZ    
26) SIGVTALRM   27) SIGPROF     28) SIGWINCH    29) SIGIO       30) SIGPWR     
31) SIGSYS      34) SIGRTMIN    35) SIGRTMIN+1  36) SIGRTMIN+2  37) SIGRTMIN+3 
38) SIGRTMIN+4  39) SIGRTMIN+5  40) SIGRTMIN+6  41) SIGRTMIN+7  42) SIGRTMIN+8 
43) SIGRTMIN+9  44) SIGRTMIN+10 45) SIGRTMIN+11 46) SIGRTMIN+12 47) SIGRTMIN+13
48) SIGRTMIN+14 49) SIGRTMIN+15 50) SIGRTMAX-14 51) SIGRTMAX-13 52) SIGRTMAX-12
53) SIGRTMAX-11 54) SIGRTMAX-10 55) SIGRTMAX-9  56) SIGRTMAX-8  57) SIGRTMAX-7 
58) SIGRTMAX-6  59) SIGRTMAX-5  60) SIGRTMAX-4  61) SIGRTMAX-3  62) SIGRTMAX-2 
63) SIGRTMAX-1  64) SIGRTMAX                                                   
```

Ett vanligt sätt för en server att hantera en signal kan vara att läsa om sin konfigurationsfil eller att stänga ned sig själv. En process kan implementera olika hanterare när den mottar en signal.

Men, vi skall hålla det enkelt. Allt vi vill göra är att ha en möjlighet att döda servern. Så här.

```bash
$ sleep 60 &
[1] 31060
$ kill 31060
[1]+  Terminated              sleep 60 
```

Ibland kan processen vara lite svårare att stänga ned, då kan man skicka signalen SIGKILL, nummer 9, för att vara övertydlig att man verkligen vill stänga ned processen oavsett vad.

```bash
$ kill -9 31060
[1]+  Killed                  sleep 60  
```

Att göra `kill -9 PID` är det mest brutala sättet att stänga ned en process på. Vill du vara snällare så börjar du med `kill PID` där PID är processens id.



Processid för en Node.js server {#pid}
--------------------------------------

Jag tar och gör ett litet exempelprogram `saveProcessId` i Node.js som tar reda på det process id som programmet får. Värdet på processens id finns i variabeln [`process.pid`](https://nodejs.org/api/process.html#process_process_pid).

```bash
$ node index.js
Simple server listen on port 1337 with process id 31410
```

Låt säga att jag nu vill skicka processen till bakgrunden istället. Så här.

```bash
$ node index.js &
[1] 28975
Simple server listen on port 1337 with process id 28981
Wrote process id to file 'pid'
```

Var uppmärksam på att det är två olika processid som visas, det är det som skrivs till filen `pid` som du vill använda, i detta fallet 28981.

Nu kan jag skicka en signal till processen via `kill` (Cygwin: `/bin/kill -f`).

```bash
$ kill 28981
Caught SIGTERM. Removing pid-file and will then exit.
```

Bra, nu kan jag kommunicera med processen, även om jag lägger den i bakgrunden.

Ibland får man inte någon utskrift om att processen har avbrutits. Är man osäker så skickar man signalen en gång till. Om id:et inte finns så får man ett felmeddelande.

```bash
$ kill 31576
-bash: kill: (31576) - No such process 
```

Då vet man att processen är borta. Men vad händer om jag startar upp servern igen?



Min port är upptagen? {#port}
--------------------------------------

Jag startar servern igen (trots att jag redan har en server startad som jag "glömt bort").

```bash
$ node index.js
Simple server listen on port 1337 with process id 32569
events.js:141
      throw er; // Unhandled 'error' event
      ^

Error: listen EADDRINUSE :::1337
```

Det gick ju inte. Krash. Någon lyssnar på porten? Hmm.

Låt mig visa hur det fungerar.

Vi startar från början och låtsas att inget har hänt, porten är ledig.

```bash
$ node index.js &
[1] 29367
Simple server listen on port 1337 with process id 29373
Wrote process id to file 'pid'
```

Låt nu se vilken process som blockar porten 1337. Vi använder kommandot `netstat` (Cygwin: `netstat -a -o | grep 1337`).

```bash
$ netstat -an --tcp --program | grep 1337
tcp6  0   0 :::1337    :::*     LISTEN      29373/nodejs
```

I slutet av raden ser vi namnet på processen och vilket PID den har, 29373 i detta fallet.

Det är samma PID som ligger i filen `pid` och med det kan vi döda processen.

```bash
$ cat saveProcessId/pid
29373
$ kill 29373
Caught SIGTERM. Removing pid-file and will then exit.
[1]+  Done                    node saveProcessId/index.js
```

Bra, då vet vi att vi kan använda `netstat` för att se vilken process som körs på en viss port.



Funkar det på Cygwin? {#cygwin}
--------------------------------------

Jajamensan, det fungerar på Cygwin om du använder de varianter jag visat. Men låt oss ta en snabb repetition för hur det fungerar på Cygwin som är delvis Unix och delvis Windows.

```bash
$ node index.js &
[1] 3348
Simple server listen on port 1337 with process id 6392
Wrote process id to file 'pid'
```

Notera att det är två processid som vanligt. Det som är lite udda här är att det första är från Cygwin och det andra är en process i Windows.

Den första processen hittar du som vanligt med `ps`.

```bash
$ ps | grep 3348
     3348  4924  3348   5544  cons0   197609 17:34:35 /usr/bin/sh
     5760  3348  3348   6460  cons0   197609 17:34:35 /cygdrive/c/Program Files/nodejs/node
```

Den andra processen hittar du som en process i Windows via `ps -W`.

```bash
$ ps -W | grep 6392
     6392   0   0  6392  ?  0 17:34:36 C:\Program Files\nodejs\node.exe
```

Den första processen kan du döda med `kill` som vanligt eftersom den är en process i Cygwin. 

Men, den andra behöver du troligen döda med `/bin/kill -f`. Den varianten av kill kommer att försöka döda processen som en windows process.

```text
$ /bin/kill --help
  -f, --force  force, using win32 interface if necessary
```

För att kontrollera vilken process som kör på en viss port så använder vi `netstat`.

```bash
$ netstat -a -o | grep 1337
  TCP    0.0.0.0:1337           DESKTOP-C3SVUSV:0      LISTENING       6392
  TCP    [::]:1337              DESKTOP-C3SVUSV:0      LISTENING       6392
```

Eftersom Node.js är (troligen) installerat via Windows och inte Cygwin, så är det en process i Windows som vi behöver döda, alltså använder vi `/bin/kill -f`.



Spara processid i en fil {#fil}
--------------------------------------

Låt oss prata lite om exempelprogrammet `saveProcessId` som vi använt för våra tester.

Jag har utökat det med att skriva processens id till en fil. Det är bra om man har ett externt skript eller liknande som skall skicka signaler till servern.

För att ta ett jämförande exempel så sparar webbservern Apache sitt pid i en fil i `/run/apache2/apache2.pid` (på Debian, det skiljer mellan system) för att externa tjänster skall kunna kommunicera med processen via dess pid.

```bash
$ cat /run/apache2/apache2.pid 
1442
```

Jag tar mitt exempelprogram som nu ser ut så här. Att skriva till fil görs med [modulen fs](https://nodejs.org/docs/latest/api/fs.html).

```javascript
import server from "./server.js";

const path = require('path');
const fs = require("fs");

// Start the server to listen on a port
server.listen(1337);

// Write pid to file
var pidFile = path.join(__dirname, "pid");
fs.writeFile(pidFile, process.pid, function(err) {
    if (err) {
        return console.log(err);
    }

    console.log("Wrote process id to file 'pid'");
});

console.log("Simple server listen on port 1337 with process id " + process.pid);
```

Perfekt. Nu sparar vi alltså processens pid till en fil och det gör det enkelt att komma åt den om vi vill skicka en signal till den.



Fånga en signal och radera pid-filen {#sigterm}
--------------------------------------

Nu när jag skapar en pid-fil så vore det ju bra om jag städade bort den när processen stängs ned. Ett sätt att göra det är att hantera signalen som skickas till node-processen.

Med node är det enkelt att fånga en signal. Här ser du hur man lägger till en callback som anropas när en viss signal tas emot av processen.

```javascript
/**
 * Listen on SIGINT, SIGTERM
 */
function controlledShutdown(signal) {
    console.warn(`Caught ${signal}. Removing pid-file and will then exit.`);
    fs.unlinkSync(pidFile);
    process.exit();
}

// Add event handlers for signals
process.on("SIGTERM", () => { controlledShutdown("SIGTERM"); });
process.on("SIGINT", () => { controlledShutdown("SIGINT"); });
```

Detta fungerar som tänkt på en Unix-plattform. Man kan både avbryta processen med `CTRL-C` och genom att skicka en signal till processen med `kill`. Resultatet blir att processen stängs ned och filen plockas bort. 

Defaultsignalen som skickas med kill är `SIGTERM`.

Men på Windows finns ett annat sätt att hantera vissa signaler så här kan det behövas lite mer handpåläggning. Följande löser så att signalen för `CTRL_C` fungerar.

```javascript
// Handle WIN32 signals in a specific mode
if (process.platform === "win32") {
    var rl = require("readline").createInterface({
        input: process.stdin,
        output: process.stdout
    });

    rl.on("SIGINT", function () {
        process.emit("SIGINT");
    });
}
```

Som synes så blir det lite handpåläggning för att få signalhanteringen att fungera med Windows. Men det är ju i grund och botten två helt skilda operativsystem, Windows och Unix, så det är ju inte så konstigt. 

Se det som ett exempel på hur man kan skriva plattformsspecifik kod i Node.



Avslutningsvis {#avslutning}
--------------------------------------

Nu har du lärt dig hur du hittar och kan använda dig av processens pid. Det är bra att ha allmän koll på detta när man jobbar med servrar.

Artikeln har en [egen tråd i forumet](t/6200) där du kan fråga eller ge tips, relaterat till denna artikel.
