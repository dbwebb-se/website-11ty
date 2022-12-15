---
author: mos
category:
    - kurs oophp
    - anax
    - me-sida
revision:
    "2019-03-26": "(E, mos) Länk till GitHub i textfil samt ny videoserie."
    "2019-03-19": "(D, mos) Uppdaterad inför vt19, ny bas för redovisa/."
    "2018-08-28": "(C, mos) Gör cache/cimage skrivbar."
    "2018-08-16": "(B, mos) Genomgången inför ht18, bytt bas för redovisa/."
    "2018-03-19": "(A, mos) Första utgåvan."
...
Bygg en me-sida för oophp med ramverket Anax
===================================

Du skall skapa en me-sida för kursen oophp. Du får en mall, baserat på ramverket Anax. Mallen ska du använda för att skapa din me-sida (redovisa-sida) och du skall sedan gå in och redigera sidorna så att de passar dig i kursen.

Du skall göra ett Git-repo av din me-sida. När du är klar så publicerar du och taggar ditt repo på GitHub.

Allt eftersom kursen går så kommer du att fylla på innehåll och kodkonstruktioner i din me-sida.

Inledningsvis finns inga krav på att du behöver bemästra katalogstrukturen i Anax. Du kommer steg för steg att introduceras i strukturen som används. 

<!--more-->

Så här kan det se ut när det du har koll på mallen för me-sidan.

[FIGURE src=image/snapvt19/oophp-me.png?w=w3 caption="Mallen för me-sidan i oophp."]



Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i Git och GitHub.

Du har PHP i din path och du har installerat composer.

Om du är bekant med ramverk sedan tidigare (design-kursen, databas-kursen) så kommer du att känna igen katalogstruktur och koncept som används i det ramverk (Anax) som används för att bygga din me-sida.



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.

Du kan se hur jag jobbar igenom stegen i videoserien "[Bygg en me-sida för oophp med ramverket Anax](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_4u0EI25nYia3yESJwMQVV)".

[YOUTUBE src="lfJAYnIrN-E&t" list="PLKtP9l5q3ce_4u0EI25nYia3yESJwMQVV" width=700 caption="Videoserie som ger dig en introduktion till de olika delarna i redovisa-sidan."]



### Kopiera från example/redovisa {#kopiera}

Det finns en installation av Anax som är specifik för oophp-kursen och dess redovisningssida. Kopiera den och installera det som behövs med composer (exklusive utvecklingsverktygen).

```text
# Stå i rooten av kursrepot
rsync -av example/redovisa me
cd me/redovisa
composer install --no-dev
chmod 777 cache/*
```

När du är klar så kan du se vilka moduler som installerades av composer.

```text
composer show
```

Du har nu kopierat din redovisa-sida och installerat dess beroenden med composer samt förberett så att katalogen cache är skrivbar för cimage och anax.

Nu kan du öppna en webbläsare och peka mot katalogen `redovisa/htdocs`.



### Publicera studentservern {#publicera}

Du kan nu publicera till studentservern.

Innan du gör det så behöver du ändra sökvägarna i `htdocs/.htaccess`, annars får du 404 på länkar och 500 på bilderna. Läs kommentaren överst i filen och gör som det står där.

Publicera sedan till studentservern för att se att allt fungerar.

Första gången kan du publicera hela me-katalogen.

```text
dbwebb publish me
```

Sedan räcker det att enbart publicera redovisa-katalogen.

```text
dbwebb publish redovisa
```

Kom ihåg att du kan publicera snabba ändringar och frågå validering och minifiering med `publishpure`.

```text
dbwebb publishpure redovisa
```



### Make {#make}

Dubbelkolla att du har Make installerat och att det fungerar.

Börja med att få en översikt över de kommandon du kan köra med make.

```text
make
```

Installera sedan en lokal utvecklingsmiljö i repot.

```text
make install
```

Du kan nu testa vilka verktyg som finns installerade via följande kommando.

```text
make check
```

Du kan testköra testsviten som finns, om det nu finns några tester att köra.

```text
make test
```

Du kommer använda kommandot make för att jobba med dina enhetstester, längre fram i kursen.



### Git {#git}

Gör ett git-repo av katalogen.

```text
git init
git add .
git commit -m "First commit"
```

Du har nu ett git-repo av din redovisa sida.

Här är ett par vanliga git-kommandon som är bra att minnas.

```text
git status
git commit
git tag
git push
```



### GitHub {#github}


Gå till GitHub och skapa ett nytt repository dit du kan ladda upp git-repot.

Ladda upp ditt git-repo till GitHub. Använd SSH-nycklar för att identifiera dig, det blir så mycket enklare att slippa skriva lösenord varje gång man laddar upp repot.

Det ser ut ungefär så här.

```text
git remote add origin <länken till ditt github repo>
git push -u origin master
```

Nu har du publicerat din me-sida på GitHub.

Som en sista åtgärd lägger du http-länken till ditt GitHub i filen `github.txt`, det underlättar för rättaren.




### Bekanta dig {#bekanta}

Bekanta dig med katalogstrukturen och de filer som ligger i det ramverk som bygger din redovisa-sida.

Kolla in videoserien för en guidning i hur du kommer igång och löser denna uppgift samt en guidning i ramverkets struktur och filer.

Glöm inte att det kan finnas viktig information under din redovisa-sida och länken "Docs" som leder till dokumentation som är relevant för varje kursmoment.



Krav {#krav}
-----------------------

1. Uppdatera första sidan där du ger en presentation av dig tillsammans med en bild.

1. Uppdatera om-sidan där du skriver en rad om denna kursen samt uppdaterar de länkar som finns, så att de går till rätt ställen. Komplettera med en bild som du själv väljer.

1. Uppdatera redovisningssidan så att den blir som du vill, här samlas dina redovisningstexter för kursen.

1. Håll din navbar uppdaterad så man kan navigera mellan sidorna, du kan uppdatera och strukturera den som du vill.

1. Uppdatera header och footer så de passar din personliga me-sida.

1. Styla sidan så som du finner bäst. Använd LESS/SASS/CSS, återanvänd kunskaper från design-kursen, uppdatera det befintliga temat eller använd något ramverk liknande Bootstrap, välj själv.

1. Lägg http-länken till ditt GitHub i filen `github.txt` (rättaren behöver den).

1. Lägg till en README.md till ditt repo och skriv något kort i den.

1. När du är klar, kör `make test` för att köra alla testerna mot ditt repo. När man kör `make test` så bör det passera utan allvarliga felmeddelanden.

1. Gör en `dbwebb publish redovisa` för att kolla att allt validerar och fungerar på studentservern.

1. Committa alla filer och lägg till en ny tagg (1.0.\*).

1. Pusha upp repot till GitHub, inklusive taggarna.



Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

1. Snygga till din me-sida lite extra med style. Det är alltid trevliga om det ser snyggt och ordningsamt ut.

1. Skapa egna testsidor för att leka runt med olika konstruktioner. Det kan vara bra att ha.



Tips från coachen {#tips}
-----------------------

Gör små commits och committa ofta, när du väl har din bas. Använd tydliga committ-meddelanden så att historiken ser bra ut.

Var försiktig att använda stora bilder, de tar mycket quota (begränsning av lagringsutrymme) från ditt konto på studentservern. Beskär bilderna till en största standardstorlek, innan du lägger dem i repot.

Lycka till och hojta till i forumet om du behöver hjälp!
