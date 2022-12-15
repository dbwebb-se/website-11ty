---
author: mos
category: labbmiljo
revision:
  "2016-01-27": (E, mos) Blå ruta om de dokument som ersätter detta.
  "2014-08-30": (D, mos) Uppdaterad med asciinema exempel.
  "2014-08-25": (C, mos) La till video om bin/dbwebb användning.
  "2014-08-18": (B, mos) Uppdaterad med mer text om användningen.
  "2014-08-11": (A, mos) Första utgåvan.
updated: "2016-01-27 22:05:34"
created: "2014-08-11 08:12:41"
...
Kurskatalogen, ett kursrepo på Github
==================================

Ett kursrepo innehåller kursmaterial för en kurs. Kursrepot finns publicerat på GitHub under en öppen licens.


<!--more-->

Innan du kan jobba med kursrepot behöver du ha en [terminal](kunskap/kom-i-gang-med-terminalen-som-verktyg-for-webbutvecklaren) installerad.

[INFO]
**Nyare information finns**

Här är de två dokument som har ersatt detta dokumentet från och med höstterminen 2015.

* [Kommandot dbwebb](dbwebb-cli)
* [dbwebb clone &lt;course repo&gt;](dbwebb-cli/clone)

[/INFO]


Kurser med kursrepo {#kurser}
-----------------------------------------------

Det finns två kurser med kursrepo:

* [Kursen python](python) ([kursrepo på GitHub](https://github.com/mosbth/python))
* [Kursen javascript1](javascript1) ([kursrepo GitHub](https://github.com/mosbth/javascript1))

Kursrepot finns på GitHub -- en delningstjänst för källkod som använder sig av versionshanteringssystemet Git.

Vill du lära dig med om Git och GitHub kan du läsa artikeln "[Kom igång med Git och GitHub](kunskap/kom-igang-med-git-och-github)". Du behöver inte kunna Git och GitHub för att jobba med kursrepot. Det är bara om du vill veta lite mer om tekniken som kursrepot använder sig av.



Öppen licens {#licens}
-----------------------------------------------

Fördelen med att ha publikt kursmaterial som är släppt enligt en öppen licens är att du själv kan bidra med material till kursen, gör gärna det. Om du kan GitHub så behöver du bara skapa en *pull-request*, men hur du gör det går utanför kursens scoop. Men fråga gärna i forumet så förklarar jag.

Mycket material är fritt när det gäller programutveckling. Så vi lever som vi lär och ger tillbaka lite genom att använda öppna licenser.



Var skall jag spara mitt kursrepo? {#spara}
-----------------------------------------------

Ditt kursrepo ska ligga i katalogen `dbwebb-kurser` som skall ligga direkt under din hemmakatalog. Om du redan har en sådan katalog kan du flytta till den med följande kommando.

```bash
cd ~/dbwebb-kurser
```

Om det är första gången du gör detta så behöver du först skapa katalogen `dbwebb-kurser`. Så här gör du.

Börja med att öppna din terminal och flytta till din hemmakatalog.

```bash
cd
```

Nu kan du skapa katalogen `dbwebb-kurser`.

```bash
mkdir dbwebb-kurser
```

Nu kan du flytta ned i katalogen.

```bash
cd dbwebb-kurser
```

Här skall dina kursrepo finnas. Skriv kommandot `ls` för att se vilka filer som finns i katalogen.

```bash
ls
```

Skriv kommandot `pwd` för att se vilken katalog du står i.

```bash
pwd
```

Så här flyttar du uppåt i katalogstrukturen.

```bash
cd ..
```

Det var en snabbkurs i några [vanliga unix-kommandon på terminalen](kunskap/20-steg-for-att-komma-i-gang-med-unix-och-terminalen).

Nu är du redo att hämta ditt kursrepo.

[ASCIINEMA src=11819]



Ladda hem ett kursrepo {#ladda-hem}
-----------------------------------------------

Följande kursrepon finns.

| Kurs        | Länk till kursrepo på GitHub              |
|-------------|-------------------------------------------|
| javascript1 | [https://github.com/mosbth/javascript1.git](https://github.com/mosbth/javascript1.git) |
| python      | [https://github.com/mosbth/python.git](https://github.com/mosbth/python.git)      |



Så här hämtar du ett kursrepo, se till att du använder rätt länk till kursrepot. I exemplet hämtar jag hem kursrepot för javascript1.

```bash
cd ~/dbwebb-kurser
git clone https://github.com/mosbth/javascript1.git
```

Nu ligger kursrepot som en katalog som du kan flytta in i.

```bash
ls 
cd javascript1
```

[ASCIINEMA src=11820]



Innehållet i ett kursrepo {#innehall}
-----------------------------------------------

I ett kursrepo finns exempelprogram, material till övningar och grunden till din me-sida. Här är de vanliga katalogerna som du kan hitta i ett kursrepo.

| Katalog    | Innehåll             |
|------------|----------------------|
| `bin`        | Det körbara kommandot `bin/dbwebb` som hjälper dig att hantera kursrepot. |
| `example`    | Exempel-program som används under kursens gång, eller bara finns med för att visa hur saker fungerar. |
| `literature` | Kurslitteratur som finns tillgänglig under öppen licens. |
| `me`         | Din me-sida skall ligga här. |
| `me/default` | Filer och kataloger som kopieras till din me-sida när du initierar den genom att köra kommandot `bin/dbwebb init`. |
| `tutorial`   | Enkla kod-exempel som visar hur du använder olika kodkonstruktioner. |


Flytta runt i katalogstrukturen och bekanta dig med innehållet. Här är de kommandon som hjälper dig att flytta runt.

```bash
ls 
cd example
ls
cd ..
```

Och så vidare. Vill du se innehållet i en fil kan du antingen öppna den i editorn `nano filnamn` eller bara visa filens innehåll genom att köra kommandot `less filnamn`.



Me-sida i kursrepot {#me}
-----------------------------------------------

I din me-sida skall du lägga all din kod som du utvecklar under kursens gång. Din me-katalog är allt under katalogen `me`. Där placerar du lösningar på dina laborationer och övningar under en katalog för respektive kursmoment.

Du skall även ha en presentations-sida om dig själv och du skall ha en redovisningssida som innehåller redovisningstexter för respektive kursmoment.

I slutet av varje kursmoment skall du redovisa det du gjort och det gör du genom att publicera din me-sida. Information om hur du gör finns i slutet av varje kursmoment.



Sköt om din kurskatalog med `bin/dbwebb` {#cli}
-----------------------------------------------

I din kurskatalog finns ett program `bin/dbwebb` som hjälper dig att hålla ditt kursrepo uppdaterat och laddar upp ditt kursresultat på studentservern. 



###`bin/dbwebb init` {#init}

Det allra första du måste göra är att initiera ditt kursrepo. Under initieringen görs följande.

* Skriptet loggar in på studentservern och skapar den katalogstruktur som behövs.
* Filer och kataloger från `me/default` kopieras till `me`.
* Dina filer synkas med studentservern och laddas upp där (för backup, handledning och redovisning).

Initiera ditt kursrepo genom att köra följande kommando. Stå alltid i rooten av kursrepot när du kör kommandot `bin/dbwebb`.

```bash
# Flytta till rooten av din kurskatalog 
# till exempel med kommandot:
# cd ~/dbwebb-kurser/javascript1
bin/dbwebb init
```

Om det var allra första gången så skapas det först en konfigurationsfil där du måste ange din studentakronym. Därefter kan du köra kommandot igen för att initiera kursrepot.

Nu är ditt kursrepo initierat och du kan börja använda det.

[ASCIINEMA src=11821]



Kommandot `bin/dbwebb` {#dbwebb}
-----------------------------------------------

Så här ser det ut när Mikael använder de vanligaste kommandona i `bin/dbwebb`.

[YOUTUBE src=zhSdG89VyIw width=630 caption="Mikael använder de vanligaste kommandona i kommandot bin/dbwebb."]

Här följer en förklaring av de vanligaste kommandona. Läs och testa.



###`bin/dbwebb` {#usage}

```bash
bin/dbwebb
```

Om du skriver kommandot `bin/dbwebb` så får du fram exempel på de kommandon du kan köra och hur du kan använda kommandot. 

[ASCIINEMA src=11822]



###`bin/dbwebb update` {#update}

```bash
bin/dbwebb update
```

Ibland tillkommer material till kursrepot och fel rättas. Då behöver du uppdatera ditt kursrepo för att ta del av de ändringarna. När du kör kommandot laddas senaste ändringar ned från GitHub och ersätter de filerna du har. Det är därför viktigt att du inte gör ändringar i existerande filer. Ta alltid en kopia av filerna i kursrepot om du vill ändra i dem.

Ovanstående kommando är samma som att köra kommandot `git pull`.

[ASCIINEMA src=11823]



###`bin/dbwebb login` {#login}

```bash
bin/dbwebb login
```

Logga in på studentservern (ssh.student.bth.se) med ssh. På studentservern finns din studentkatalog med filer. Dina dbwebb-kurser ligger i katalogen `~/dbwebb-kurser` och under katalogen `~/www` lägger du de filer du vill skall synas via studenternas webbserver.

Adressen till din del av studenternas webbserver är `www.student.bth.se/~akronym`.

[ASCIINEMA src=11824]



###`bin/dbwebb sshkey` {#sshkey}

```bash
bin/dbwebb sshkey
```

Skapa ssh-nycklar för att logga in på studentservern, som ett alternativ till att skriva in lösenordet varje gång.

[ASCIINEMA src=11825]



###`bin/dbwebb upload` {#upload}

```bash
bin/dbwebb upload
```

Synka ditt lokala kursrepo med det på studentservern. Kör detta för att ladda upp dina filer på studentservern och få dina filer att omfattas av backupen på studentservern. Det är bra att ha en backup om din hårddisk skulle krascha under kursens gång.

Alla dina kursrepon är samlade på studentservern under katalogen `~/dbwebb-kurser/kursnamn`.

[ASCIINEMA src=11826]



###`bin/dbwebb download` {#download}

```bash
bin/dbwebb download
```

Om du jobbar på flera maskiner kan du ladda ned innehållet i din me-katalog från studentservern till en annan maskin. Skapa och intiera kursrepona som vanligt på varje maskin. jobba på en av dem och gör `upload` när du är klar. Gå sedan till nästa maskin och gör `download` och fortsätt att jobba.

Jobba bara på en maskin åt gången, gör `upload` när du är klar och `download` på nästa maskin innan du börjar jobba.

[ASCIINEMA src=11827]



###`bin/dbwebb validate` {#validate}

```bash
bin/dbwebb validate
```

När du *validerar* ditt kursrepo kopieras först alla filerna över till studentservern. Precis som `bin/dbwebb update`. Sedan körs ett antal valideringsverktyg som kontrollerar att koden uppfyller vissa regler på hur den är skriven.

När du gör dina övningar måste du alltid se till att din kod validerar. Testa ofta att din kod validerar, så lär du dig hur man skriver koden på ett bra sätt, och du slipper städa upp allt i slutet av övningen.

Jobbar du till exempel med lab1 kan du alltid testa att köra kommandot för att se om du får felmeddelanden.

```bash
bin/dbwebb validate kmom01
```

Följande verktyg körs när du gör validate.

| Verktyg                                                | Gör vad?                                |
|--------------------------------------------------------|-----------------------------------------|
| [htmlhint](https://www.npmjs.org/package/htmlhint)     | Statisk kodanalys av HTML- och CSS-kod. |
| [jshint](https://www.npmjs.org/package/jshint)         | Statisk kodanalys av JavaScript-kod.    |
| [pylint](http://www.pylint.org/)                       | Statisk kodanalys av Python-kod.        |

[ASCIINEMA src=11828]



###`bin/dbwebb publish` {#publish}

```bash
bin/dbwebb publish
```

När du *publicerar* ditt kursrepo så görs vissa filer tillgängliga via studenternas webbserver. Dina kursrepon hamnar under länken `www.student.bth.se/~akronym/dbwebb-kurser`. Min studentakronym är `~mosstud` och länken till mitt kursrepo på webben blir alltså `www.student.bth.se/~mosstud/dbwebb-kurser`.

Kursrepot på webben använder du för att visa upp vad du gjort, länka till det i dina redovisningstexter och visa upp det för kompisar när du behöver hjälp att felsöka eller testa. 

Använd länken som visas när du kört kommandot för att se dina publicerade filer via en webbläsare. Länken leder till det som vi kallar din "me-sida".

I slutet av varje kursmoment skall du alltid publicera samtliga filer för ditt kursmoment. Ungefär så här:

```bash
# Ställ dig i rooten av det kursrepo du jobbar med
bin/dbwebb publish kmom01
```

Det körs en del valideringsskript när du publicerar. De kan ge upphov till felmeddelande som du bör rätta för att undvika kompletteringar.

Följande verktyg körs när du gör publish.

| Verktyg                                                      | Gör vad?                             |
|--------------------------------------------------------------|--------------------------------------|
| [html-minifier](https://www.npmjs.org/package/html-minifier) | Minifierar eventuell HTML-kod.       |
| [cleancss](https://www.npmjs.org/package/clean-css)          | Minifierar eventuell CSS-kod.        |
| [uglifyjs](https://www.npmjs.org/package/uglify-js)          | Minifierar eventuell JavaScript-kod. |

[ASCIINEMA src=11829]



Avslutningsvis {#avslutning}
-----------------------------------------------

Om du har frågor kring ett kursrepo så ställer du det i forumet.

Använd dessa trådar för att ställa frågor, eller skapa en ny om det passar bättre.

* [Forumtråd för kursrepo python](t/2545).
* [Forumtråd för kursrepo javascript1](t/2546).
* [Forumtråd för kommandot `bin/dbwebb`](t/2559).
