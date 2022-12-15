---
author: sylvanas
category: webbprogrammering
updated: "2015-01-19 16:06:33"
created: "2014-04-08 13:19:03"
...
20 steg för att komma i gång med Unix och terminalen
==================================

Om man sen tidigare inte är bekant med hur terminaler fungerar så kan det vara svårt att snabbt komma igång med det. Här följer därför en guide för grundläggande användning av terminalen.

<!--more-->

Förkunskaper {#forkunskaper}
------------

Du har gått genom [SSH-guiden](kunskap/att-koppla-upp-dig-mot-en-server-med-ssh-via-terminalen) och är ansluten till studentservern via en SSH-klient eller terminal.

Eller så har du installerat en egen terminal enligt guiden: [Kom i gång med terminalen som verktyg för webbutvecklaren](kunskap/kom-i-gang-med-terminalen-som-verktyg-for-webbutvecklaren).



1. Vad är kommandon? {#kommando}
--------------------

Ett *kommando* är en instruktion till operativsystemet att utföra en viss uppgift. Det kan vara att starta ett program eller köra ett script, eller bara enkla uppgifter som att ändra rättigheter på filer och traversera filträdet.
Kommandon kan man bara köra rakt av eller så kan man lägga till *flaggor* och *argument*.

Här är ett exempel på ett enkelt kommando:
```bash
ls
```

Här är ett exempel på samma kommando med flaggor, dvs inställningar till kommandot:
```bash
ls -al
```

Här är exempel på ett kommando med ett argument, vilket ofta innefattar vad kommandot ska utföras på:
```bash
ls www
```
```bash
ls -al www
```

Olika kommandon har olika flaggor och olika parametrar man kan skicka in. För att få reda på mer om vilka dessa kan vara så finns dokumentation, vilket vi kommer till senare i guiden.


2. Vart i katalogstrukturen finns jag? {#pwd}
-----------------------------------

Du är inloggad på en främmande server (studentservern) och vet inte vart i själva katalogstrukturen du befinner dig. Att ta reda på det är ett enkelt kommando:
```bash
pwd
```

`pwd` står för *print working directory*. Skriver jag in detta kommando i min *prompt* och trycker på enter så ger det mig detta resultat:
```bash
/home/saxon/students/20101/jast10
```

Här ser vi att att jag står i min användarkatalog, som ligger i en katalog för det år och den termin jag började (första terminen år 2010). Bra, då vet vi vart vi befinner oss!


3. Vad finns i min katalog?  {#ls}
------------------------

Nu när vi vet vart vi är så vill vi ta reda på vad vi har i katalogen vi står i - vår användarkatalog. Till detta använder vi `ls` som står för *list*.
```bash
ls
```

Detta kommando skriver i terminalen ut vilka kataloger och filer som finns i din hem-katalog. Detta kan se lite olika ut, förstås beroende på vad du har där i.


4. Filer och kataloger  {#filer-kataloger}
-------------------

### Skillnad på kataloger och filer  {#fil-katalog-diff}
Det du bör lägga märke till när du använder `ls` är att det skrivs ut `/` efter katalognamn, men inte filnamn:
```bash
enkatalog/  entextfil  entextfil.txt
```

Något som är värt att tänka på är också att alla filer inte har en *filändelse*, och behöver heller inte på Unix-system ha det. Det sparas i själva filen vad den är för *typ*, och då behöver till exempel inte en textfil sluta med just `.txt`.

### Dolda filer och kataloger  {#dolda}
Men de filerna som bara `ls` visar är inte alla filer som finns. Precis som på ett Windows-system så finns dolda filer och kataloger. Låt oss ta en titt på vad vi hittar genom att lägga till en flagga på `ls`, nämligen `a` som står för *all*.
```bash
ls -a
```

Nu borde listan visa på ett par filer och kataloger till. Lägg märke till skillnaden mot det vi redan har sett: där är en punkt framför namnen. Denna punkt är vad som anger att det är en dold fil eller katalog.
```bash
./  ../  .endoldfil  .endoldkatalog/  enfil
```

### Lista med information {#info-list}
Men just nu visas det lite rörigt kan tyckas. Visst vore det trevligt om vi kunde få sen lite mer detaljer information om filerna och katalogerna i trevlig *list*-form? Ja, då finns det en flagga för det också, som vi kan kombinera med den förra. Vi lägger till flaggan `l` som i detta fallet står för *long*.
```bash
ls -al
```

Nu har vi en detaljerad lång lista, där vi bland annat ser *skrivrättigheter* (vilket vi återkommer till senare i guiden), *ägare*, *filstorlek*, och *tiden det senaste skrevs till filen*.
Såhär ser det till exempel ut för mig:
```bash
drwx--S--x   8 jast10 20101   4096 Apr  8 15:12 ./
drwxr-xr-x 219 root   root  184320 Jan 27 16:43 ../
-rw-r--r--   1 jast10 20101     47 Mar 31 11:23 .bashrc
-rw-------   1 jast10 20101    373 Aug 26  1996 .cshrc
drwxr-sr-x   6 jast10 20101   4096 Apr  8  2013 dv1402/
-rw-------   1 jast10 20101  44515 Apr  8 15:22 .history
-rw-------   1 jast10 20101    466 Aug 26  1996 .login
-rw-------   1 jast10 20101    137 Nov 17  2010 .tcshrc
drwx--S---   4 jast10 20101   4096 Sep 28  2012 .Trash-480070/
drwxr-sr-x   2 jast10 20101   4096 Apr  8 14:30 unix/
drwx--x--x  12 jast10 20101   4096 Feb  4 15:11 www/
```


5. `./` och `../` {#punktfiler}
-----------------

Där kanske är två filer som du undrar lite över när vi nu har sett de dolda filerna? `.` och `..` är två filer som är lite speciella. `.` står för denna katalogen och `..` står för katalogen ovanför. Vi kommer att få användning för det här strax!
```bash
drwx--S--x   8 jast10 20101   4096 Apr  8 15:12 ./
drwxr-xr-x 219 root   root  184320 Jan 27 16:43 ../
```


6. `www`-katalogen {#www}
---------------

Den katalogen du främst bör lägga märke till är **www**-katalogen som finns i din hem-katalog. Det är denna katalog som motsvarar den adress som din sida ligger på, dvs `www.student.bth.se/~dittakronym/`. Därför är denna katalogen extra bra att hålla koll på.
```bash
drwx--x--x  12 jast10 20101   4096 Feb  4 15:11 www/
```


7. Byta katalog  {#cd}
------------

Nu vet vi vad vi har i våra kataloger. Då är det dags att börja traversera i vår katalogstruktur. Detta göra vi med kommandot `cd`, change directory.
Vi vill in i **www**-katalogen. Därför skickar vi med det namnet till `cd`-kommandot, såhär:
```bash
cd www/
```

När detta kommandot är kört så ska du nu befinna dig i **www**-katalogen. Du kan se vart du är i din egen katalogstruktur på din prompt:
```bash
sweet~/www:
```

`~` indikerar din hem-katalog och www är alltså den katalog du befinner dig i.
Nu kan du åter igen köra `pwd` för att se vart du är på server och `ls -al` för att se vad du har för filer och kataloger i **www**. Prova!

### Gå runt i strukturen  {#cd-back}
Nu kanske du börjar ana vad `..` kan användas till. `..` stod alltså för katalogen ovanför. Säg nu att vi är inne i katalogen **www** men vill tillbaka till vår hem-katalog, som är katalogen ovanför **www**. Då kan vi bara skriva såhär:
```bash
cd ..
```

Detta traverserar alltså uppåt ett steg i katalogstrukturen. Användbart, eller hur?
Det går även att kombinera detta när man vill röra sig i strukturen. Säg att du befinner dig i katalogen **kmom01** i **htmlphp** (**htmlphp/kmom01**) och vill till katalogen **kmom02** i **htmlphp** (**htmlphp/kmom02**). Istället för att köra `cd ..` och sen `cd kmom02` så kan vi kombinera det såhär:
```bash
cd ../kmom02
```

Om du har jobbat med relativa sökvägar innan så ser det nog lite bekant ut. `..` tar oss först upp en katalog till **www** och sedan från **www** går `cd` vidare till **oophp**. Det går bra att kombinera det i flera steg om man vill också.
Här är ett exempel som tar en från **www/htmlphp/kmom10** till **www/oophp/kmom01**:
```bash
cd ../../oophp/kmom01
```

Här hoppar vi alltså upp i katalogerna 2 gånger innan vi börjar traversera in andra kataloger igen.

### Hoppa direkt till hem-katalogen  {#cd-hem}
Nu har vi sett hur `cd` kan användas till att röra sig i katalogstrukturen, upp och ner i kataloger. Men den kan även ta dig direkt hem till din hem-katalog igen.
Det finns två sätt att göra detta på:
```bash
cd ~
```

Som nämnt längre upp så står `~` (tilde) för ens hem-katalog. Om man skriver ovan kommando så hamnar man direkt i sin hem-katalog, oavsett vart man var i katalogstrukturen innan dess.
Det går även bra att bara skriva:
```bash
cd
```

Även detta tar dig till din hem-katalog (katalogen som har samma namn som ditt akronym).

Att använda `~` kanske inte är direkt uppenbart, men det kan även här kombineras vidare:
```bash
cd ~/www/htmlphp/
```

Här ovan ser vi användning av `~` för att ta oss till **www/htmlphp**. Oavsett vart i katalogstrukturen du är så skulle alltså detta ta dig direkt till **htmlphp**.

Nu har vi väldigt många olika sätt att ta oss runt i våra kataloger. Vilket sätt man använder kan ha att göra med vilket man tycker är enklast, hur djupt man befinner sig i sina kataloger i kombination med vart man ska. Testa dig fram för att se vart du hamnar och vad du kan göra!


8. Använda tab för autocompletion på namn  {#tab}
-----------------------------------------

Vi har nu sett ovan att vi behöver skriva in katalognamnen för att ta oss fram i kataloger, och vi kommer även gå in på hantering av filer. Men som ett mellansteg kommer här ett litet tips som förenklar vår terminalanvändning.
Även om vi inte har långa krångliga namn på våra filer och kataloger så händer det självklart att vi stavar fel. Så istället för att behöva skriva ut fil- och katalognamnen helt själva så finns en smidigt lösning: använd *autocompletion*.
Hur gör du då det? Vi tar ett litet exempel.
Såhär ser det ut i min **js**-katalog:
```bash
jquery.js  kmom02/  kmom04/  kmom06/      me/           node/
kmom01/    kmom03/  kmom05/  less.min.js  modernizr.js  projekt/
```

Om vi först tar ett enkelt exempel: jag vill ta mig till min katalog **projekt**. I terminalen skriver jag `cd p` och när markören står vid `p` så trycker jag på `tab`-knappen. Vad händer?
```bash
cd projekt/
```

Den gör en *autocompletion*, dvs `tab`-knappen letar upp om det finns filer och kataloger som börjar på `p`, och fyller sedan i resten så långt det går. Eftersom det bara finns en så fylls hela namnet i direkt. Smidigt, eller hur?

Men hur blir det om vi har kataloger och filer som har liknande namn då? Vi testar det också genom att se vad som händer när vi skriver `cd k` och trycker på `tab`:
```bash
sweet~/www/js: cd k
kmom01/ kmom02/ kmom03/ kmom04/ kmom05/ kmom06/ 
sweet~/www/js: cd kmom0
```

Här ovan ser vi lite mer av utskriften i min terminal, inklusive prompten. Denna gången hittar terminalen flera alternativ som börjar på `k`. Den fyller i så långt det går och alla mina kursmomentkataloger börjar på `kmom0`, så detta är vad som fylls i. Utöver att den gör detta så skriver den även ut vilka övriga alternativ som finns, i mitt fall alla kursmomentkatalogerna. Nu kan jag enkelt bara fylla i resten:
```bash
cd kmom01
```

9. Tips för namngivning {#namn}
-----------------------

För att ytterligare förenkla vardagen inte bara i terminalen men även i ditt övriga arbete med dina filer och kataloger så är här ett par bra grundregler för namngivning:

1.	Använd inte stora bokstäver

	En inställning som kan skilja sig från server till server är huruvida den är *case-sensitive* eller inte, det vill säga om den ser skillnad på stora och små bokstäver eller inte. Detta kan leda till problem med filnamnen om man t.ex råkar skriva fel. Ta exemplet att du har en bildlänk till enbild.jpg, men bilden faktiskt heter enBild.jpg. Det funkar lokalt, men kommer inte att funka på studentservern. För att undvika dessa och liknande problem så råder jag att man inte ska använda stora bokstäver.
2. 	Använd inte specialtecken eller mellanslag

	Att använda mellanslag i fil- och katalognamn kan leda till knepig länkning. Om du har en katalog som heter `kmom 01` så behöver mellanslaget bytas ut till sitt *ASCII-värde*. Resultatet blir länken `kmom%2001/` där alltså mellanslaget byts ut mot `%20`. Även andra specialtecken behöver denna behandlig, ofta också `åäö`. Det bästa är helt enkelt att undvika sådant.
3.	Vid flera ord i filnamnet, använd `-` eller `_`

	Med hänsyn till föregående punkter så har vi ju ändå en del namngivningar som består av flera ord. Exempelvis kan man skriva **projekt-bmo** eller **projekt_bmo**, vilket man själv tycker ser bäst ut. Tips är att välja en stil och hålla sig till den.
4.	Hitta en balans mellan för kort och för långt

	Filnamnen ska helst vara självförklarande, men inte för långa. Risken med att förkorta för mycket är att olika förkortningar kan ha olika betydelse beroende på vem som läser filen. En förkortning som är självklar för dig behöver inte vara det för t.ex mig, och där kan det bli missförstånd.

	
10. Skapa ny katalog {#mkdir}
-----------------

Att skapa en ny katalog är enkelt. Vi använder kommandot `mkdir` som står för *make directory* och skickar med det namn vi vill att den nya katalogen ska ha:
```bash
mkdir htmlphp
```

Värt att nämna är att detta skapar en katalog där du står just nu. Du kan se att din nya katalog finns genom att använda `ls` och gå in i katalogen med `cd katalognamn`, i detta fallet `cd htmlphp`.


11. Skapa ny fil {#touch}
----------------

Nu när vi kan skapa kataloger så vill vi kanske skapa filer också. Detta gör vi med `touch`:
```bash
touch hello.php
```

Touch skapar en helt tom fil med det namn du anger. Med `ls -al` så ser vi lite information om filen:
```bash
-rw-r--r--   1 jast10 20101      0 Apr  8 19:22 hello.php
```

Vi kan se att storleken är 0 och tiden när den skapades, då vi inte har gjort något med den än.


12. Redigera en fil {#nano}
-------------------

Vare sig du vill skapa en ny fil och redigera den eller redigera befintliga filer så finns det ett textredigeringsverktyg direkt i terminalen. Detta verktyg är väldigt avskalat, men användbart då man direkt redigera filer på en annan server utan att behöva ett gränssnitt för det.
Detta verktyg heter `nano`, och du kör det såhär:
```bash
nano hello.php
```

Något som är bra att veta är att om du skriver ett filnamn som inte finns än, t.ex `nano world.php` så kommer nano att köras och filen **world.php** att skapas.

Såhär ser det ut i terminalen:
[FIGURE src=/image/sylvanas/unixguide/nanoediting.png caption="Nano i terminalen"]

Det du behöver veta med nano är att du inte kan använda vanliga tangentbords-kombinationer så som `Ctrl+c` för att kopiera. Istället finns nano's *kortkommandon* angivna längst ner i fönstret när nano är igång, som du kan se på bilden ovan.
`^` står för `Ctrl` på Windows och Unix. Här är ett par utskriva som är bra att kunna
| Nano	| Knappar	| Beskrivning	|
|-------|-----------|---------------|
| `^O`	| `Ctrl+O`	| Spara fil - när du trycker denna så kommer den fråga vilken fil du vill spara till och nuvarande kommer alltid att vara angiven, se är det bara att trycka på enter. |
| `^X`	| `Ctrl+X`	| Avsluta - om du inte har sparat innan du avslutar så kommer den fråga om du vill spara eller inte. Skriv `y` för att spara och tryck sen enter för att verifiera filnamnet, eller `n` för att avsluta utan att spara. `Ctrl+c` avbryter och låter dig fortsätta jobba i filen. |
| `^K`	| `Ctrl+K`	| Klippt ut rad - klipper ut hela raden där markören befinner sig
| `^U`	| `Ctrl+U`	| Klistra in - klistrar in den rad du senast klippte ut till där markören befinner sig

Som du märker så kan det vara lite begränsande, men det går bra när man ska göra något *quick and dirty* eller bara snabbt ändra i något.
Testa nu själv att öppna filen **hello.php** i `nano`, skriv *Hello world!* i filen, spara den och gå ur programmet.

13. Visa innehållet i en fil {#cat}
----------------------------

Vill man bara snabbt se vad som finns i en fil utan att öppna den i en editor så finns det ett kommando som skriver ut filinnehållet direkt till terminalen. Detta kommandot heter `cat`. Det argument du skickar med ska vara filnamnet på den fil du vill skriva ut. Testa själv att ta en fil du har (eller skapa en ny och editera den i nano enligt stegen ovan) och testa sedan hur det ser vid utskrift:
```bash
cat hello.php
```

Detta kommando fungerar bra när man vill skriva ut innehållet i kortare filer.


14. Kopiera filer och kataloger {#cp}
----------------------------

Vi jobbar ofta med filer som har samma grundstruktur, och då är det bra att veta hur man kopierar filer även i terminalen. Vi gör det med kommandot `cp` som står för *copy*.
Detta kommando tar 2 argument: filen eller katalogen som ska kopieras samt det nya namnet på filen eller katalogen alternativ katalognamn på en befintlig katalog dit filen ska kopieras.

Exempel med fil, där vi kopierar **hello.php** till en fil som heter **world.php**:
```bash
cp hello.php world.php
```
Du kan verifiera att **world.php** innehåller det du skrev i **hello.php** genom att skriva ut filen med `cat world.php`.

Exempel där vi kopierar **hello.php** och placerar den i en underkatalog, **kmom01** (under förutsättningen att katalogen **kmom01** redan existerar, annars kan du skapa en med [mkdir](#mkdir)):
```bash
cp hello.php kmom01/
```
Notera att filen kommer ha samma namn i katalogen **kmom01**, dvs **hello.php**.

Nu ska vi ta ett exempel där vi får användning av filen `.` som står för *nuvarande katalog*! I exemplet nedan så står vi i katalogen **htmlphp** och ska kopiera filen **hello.php** från katalogen **kmom01**. Vi använder `.` för att ange i vilken katalog kopian ska sparas, dvs den katalogen vi står i.
```bash
cp kmom01/hello.php .
```
Detta exempel skapar alltså en kopia av filen **hello.php** i den katalogen du står i vilket alltså anges med `.`.

Man kan också kopiera kataloger. För att se till att alla underkataloger dessutom följer med i kopieringen så behöver vi en flagga på kommandot, `r` som står för *recursive*. Den ser alltså till att alla kataloger och filer rekursivt kopieras till den nya katalogen.
Något vi ofta gör i kursmomenten är ju att kopiera katalogen för ett helt kursmoment för att arbeta vidare med nästa.
Här är ett exempel där jag kopierar **kmom01** och skapar katalogen **kmom02**, som alltså blir en exakt kopia även med innehållet:
```bash
cp -r kmom01 kmom02
```

Nu kan du skriva in `ls kmom02` för att se vad som finns i den nya katalogen kmom02.


15. Flytta filer och kataloger {#mv}
---------------------------

Man kan även flytta på filer och kataloger. Vi använder `mv` för detta, som står för *move*.
Scenariot nedanför är att vi råkade skapa katalogen **kmom01** direkt i **www**-katalogen. Nu vill vi flytta den till **htmlphp** (som finns sen innan):
```bash
mv kmom01/ htmlphp/
```
Detta flyttar katalogen med allt dess innehåll till **htmlphp**-katalogen.

Man kan flytta filer på samma sätt. Nedan så står jag i **htmlphp/kmom01**-katalogen och ska flytta **index.php** från **www** till katalogen jag står i.
```bash
mv ../../index.php .
```
Här ser vi åter igen användning av filen `.`. Först lokaliserar vi filen vi vill flytta: vi behöver ta oss uppåt 2 steg i katalogstrukturen till **www**. Sedan anger vi vart filen ska flyttas vilket är katalogen vi står i, och detta anger vi med `.`.
 

16. Ta bort filer och kataloger {#rm}
----------------------------

Självklart råkar vi ibland skapa filer och kataloger vi inte vill ha, eller av andra anledningar inte ska ha kvar det vi tidigare har skapat. Kommandot för att ta bort heter `rm` och står för *remove*.
Nu står jag i **htmlphp** och i den katalogen har jag:
```bash
hello.php  kmom01  kmom02  world.php
```
Jag vill ta bort filen **world.php**:
```bash
rm hello.php
```
Testa själv och kolla sedan att filen inte finns kvar genom att köra `ls`.

För att ta bort kataloger behöver vi åter igen använda oss av en sedan tidigare bekant flagga: `r` (*recursive*), för att se till att får ta bort alla filer och subkataloger som kan finnas. Här tar jag bort **kmom02**:
```bash
rm -r kmom02/
```


17. Användarrättigheter {#rwx}
-----------------------

I guiden så har rättigheter kommit på tal. Vi ser dessa vid användning av `ls -al` men är man ny i Unix-systemet så är det kanske inte direkt läsbart:
```bash
drwxr-xr-x 1 jast10 20101 4096 Apr 10  2014 .
drwx--x--x 1 jast10 20101 4096 Apr 10 11:08 ..
drwxr-xr-x 1 jast10 20101 4096 Apr 10 11:08 kmom01
-rw-r--r-- 1 jast10 20101   13 Apr 10 11:06 world.php
```

### `rwx` {#rwx-beskrivning}
Det första kolumnen i denna tabell innehåller rättigheterna, exempelvis `drwx--x--x`. Denna rad består i sig av 4 kolumner: 1.`d` 2.`rwx` 3.`--x` 4.`--x`. Den första är enkel, det är här den visar om det är en katalog `d` (*directory*) eller en fil `-`.
Kolumn 2,3 och 4 anger vilka rättigheter som filen har för de tre användargrupperna: **user**, **group** och **others** i respektive ordning.
Varje kolumn har tre bokstäver som står för de rättigheter som kan sättas: `r` för *readable*, `w` för *writable* och `x` för *executable*.

Vi tar ett exempel och kollar på rättigheterna för **world.php** som är `-rw-r--r--`. Första tecknet är `-` så det är en fil. Andra kolumnen är dina rättigheter och då ser vi att det står `rw-` vilket anger att du kan läsa och skriva till filen. De andra två är likadana och den vi behöver tänka på är den sista kolumnen vilket anger de publika rättigheterna, det t.ex besökare på din sida kan göra med dina filer. Här står det `r--` vilket anger att filen endast är läsbar för dessa användare.

Om vi snabbt kollar på en katalog istället, **kmom01** så ser vi en liten skillnad `r-x` för till skillnad från filer så är `x` angiven vilket gör katalogen exekverbar. Men varför behövs detta då? Jo, för att användaren ska ha rättigheter att gå in i, öppna katalogen, så behöver den vara just exekverbar. Annars kan man se och läsa vad som finns i den, men inte gå in i den.

### Rättigheter som siffror {#rwx-till-binary}
Nu har vi lite bättre koll på vad våra tecken står för. Men när vi senare ska ange eller beskriva vilka rättigheter en fil har så är det ganska omständigt att skriva ut allt detta. Därför finns det en sifferförkortning tillgängligt som baserar sig på det binära tal-systemet (bas 2).

När vi ska räkna ut vad en rättighet för en fil blir i detta siffersystem så tar vi de 3 kolumner som anger rättigheterna, dvs `rwx`-kolumnerna. Varje plats i varje kolumn är en plats i det binära systemet:

| Rättighet	| r | w | x |
|---------------|---|---|---|
| Binärt värde	| 4 | 2 | 1 |

Vi tar ett exempel där vi först översätter till binärt och sedan till decimalt (bas 10):

| Rättighet	| r | w | - |
|-----------|---|---|---|
| Binärt	| 1 | 1 | 0 |
| Decimal	| 4 | 2 | 0 |

Vi ser alltså att om rättigheter är "på-slagen" så anges platsen med **1**, och om den är "av" så blir det **0**. Binärt så skrivs det ut **110**. Lägger vi ihop det totala värdet får vi det decimala värdet **4 + 2 + 0 = 6**. Värdet i kolumnen här blir **6**.

Sedan gör vi om samma sak för resterande 2 kolumner: `r--` översätts till **100** binärt och ger **4 + 0 + 0 = 4** decimalt. Värdet blir **4** för båda dessa, då de är samma. Sammantaget blir värdet **644**:
| `rw-`	| `r--`	| `r--`	|
|-------|-------|-------|
| 110	| 100	| 100	|
| 6		| 4		| 4		|

Nu är vi redo att ändra våra rättigheter.


18. Ändra rättigheter {#chmod}
---------------------

Nu har vi förhoppningsvis lite koll på våra rättigheter kan vi går vidare med att ändra rättigheter också. För detta har vi kommandot `chmod`.

Vi kan testa att sätta så att en fil kan redigeras av andra användare:
```bash
chmod 666 world.php
```

Säg att vi har en katalog som vi vill se till att man kan spara filer i från webbplatsen, då vill vi ge katalogen rättigheterna 777:
```bash
chmod 777 kmom01
```

Man kan ange rättigheter med de bokstäver som vi har lärt oss (r,w,x). Vi kan testa att helt ta bort att en katalog är skrivbar (för alla användargrupper):
```bash
chmod -w kmom01
```

På samma sätt kan vi lägga till rättigheter, så vi kan lägga till rättigheter:
```bash
chmod +w kmom01
```

Vill man ändra rättigheter inte bara för själva katalogen men för alla filer i katalogen så använder vi åter igen flaggor. Denna gången är den rekursiva flaggan `-R`.
```bash
chmod -R 755 kmom01
```


19. Manualer {#man}
------------

Det är inte lätt att komma ihåg vilka flaggor som kan användas eller vad de alla betyder, eller i vilken ordning man ska skriva vissa parametrar. Därför finns det så gott som alltid en manual för kommandona som nås av att använda kommandot `man`.
Vill du t.ex veta mer om vad du kan göra med `ls`? Såhär får du upp manualen:
```bash
man ls
```

Du navigerar i manualen med piltangeterna. För att komma ut ur manualen igen (avsluta den) så trycker du bara på tangenten `q`.

20. Gå vidare {#vidare}
-------------

Nu är du redo att tackla nya uppgifter i terminalen, vare sig det handlar om att t.ex ansluta till MySQL, starta upp en node.js-servern eller komma igång med git.


Avslutningsvis {#avslut}
--------------

Det finns ett foruminlägg för [denna artikel](t/2450) om du vill diskutera, kommentera eller ställa frågor.


Revisionshistoria {#rev}
-----------------

<span class='revision-history' markdown='1'>
2015-01-19 (B, mos) Ändrade chmod 666 till 755 i kapitel 18.  
2014-06-04 (A, Sylvanas) Första utgåvan.  
</span>
