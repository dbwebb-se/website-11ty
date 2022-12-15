---
author:
    - mos
category:
    - kurs oophp
revision:
    "2019-03-25": "(F, mos) Ny videoserie."
    "2019-03-19": "(E, mos) Ny version och nu enbart en klient istället för tre klienter."
    "2018-03-19": "(D, mos) Uppdaterad inför vt18."
    "2017-05-12": "(C, mos) Uppdaterade vilka stycken som gäller i oophp20-guiden."
    "2017-03-14": "(B, mos) La till info samt om objekt i sessionen."
    "2017-03-09": "(A, lew) Första utgåvan i samband med kursen oophp v3."
...
Gissa numret med PHP
==================================

[FIGURE src=image/snapvt18/oophp-guess-my-number-post.png?w=c5&a=22,50,35,0&cf class="right"]

Du skall implementera spelet "Gissa mitt nummer" i PHP genom att använda klasser och sessionen.

Spelet fungerar så att en siffra mellan 1 till 100 slumpas fram och spelaren skall gissa vilket tal det är. Spelet ska svara om spelarens gissning är högre eller lägre än det korrekta talet. Spelaren har 6 gissningar på sig att gissa rätt.

Du skall skriva all kod som har med spelet att göra inuti en klass och du skall skriva en klient så att spelet går att köra i webbläsaren. Du skall använda sessionen för att komma ihåg detaljer som spelets aktuella ställning (antalet gissningar och det slumpade talet).

Uppgiften är en övning i att skriva klasser och att skapa ett API som gör det möjligt att koppla godtycklig klient mot ett spel som är inkapslat i en klass.

<!--more-->

[FIGURE src=image/snapvt18/oophp-guess-my-number-post.png?w=w3 caption="Spela spelet Gissa mitt nummer med PHP."]



Förkunskaper {#forkunskaper}
-----------------------

Du har grundläggande kunskaper i PHP och i objektorienterad PHP.

Du kan skapa klasser i PHP och du vet hur man sparar objekt i sessionen.



Introduktion och förberedelse {#intro}
-----------------------

Gör följande för att förbereda dig för uppgiften.

Det finns en videoserie "[Uppgiften "Gissa mitt nummer" (kursen oophp)](https://www.youtube.com/playlist?list=PLKtP9l5q3ce8eNcmm82QawNWPeDwYVbCu)" som visar hur det kan se ut när du är klar.

[YOUTUBE src="A-45RLZ5Q0k" width=700 list="PLKtP9l5q3ce8eNcmm82QawNWPeDwYVbCu" caption="Mikael visar hur spelet och dess olika klienter kan se ut när de är klara."]



### Spelregler {#regler}

Spelet "Guess the number" är ett enkelt gissningsspel där någon tänker på ett tal mellan 1-100. I detta fallet är det datorn/spelet som tänker på ett tal.

Spelaren har 6 gissningar på sig att gissa rätt tal. Vid varje gissning så får man svaret om gissningen är "för lågt", "för högt" eller "rätt gissat".

När gissningarna är slut kan man inte gissa mer. Då kan man börja om att spela en ny runda.

När man gissat rätt är spelet slut. Då kan man börja om att spela en ny runda.

Man kan alltid börja om och spela en ny runda.

Det skall finnas en möjlighet att fuska och se rätt tal.



### Mall för klass till spelet Gissa mitt nummer {#mallen}

Gå till katalogen där du skall jobba. Börja med att kopiera mallen för själva spel-klassen.

```text
mkdir src
cp ../../../example/guess/src/Guess.php src
```

Lägg även dit filer för `autoload.php` och `config.php`.

Studera klass-filen `Guess.php` och fundera hur du kan implementera spelet i den klasstrukturen som erbjuds.

Du kan välja att implementera klassen annorlunda, om du vill. Du behöver inte slaviskt följa den mallen du fått.

Hela spelet ska hanteras av klassen `Guess`. Dock kan du, och bör, skriva kod som använder sig av klassen och skickar in värden från till exempel formulär eller querysträngen.

Man skall kunna initiera ett objekt av klassen, genom att *injecta* information såsom det hemliga talet och antalet gissningar gjorda. I mall-klassen injectas informationen via konstruktorn.

Klassen **får inte läsa direkt** från $\_GET, $\_POST eller $\_SESSION. Om information behövs från dessa PHP globala variabler så skall de bifogas in till klassen Guess, informationen skall injectas in i klassen från klienten.



### Formulär {#form}

Till formuläret där användaren skickar in sina gissningar skall du använda POST. I princip skall man använda POST för alla händelser som påverkar ett status i webbläsaren (antalet gissningar ökas).

När du använder POST så behöver du göra redirect för att undvika problem med sidomladdning.

För att starta om spelet, vilket ändrar status, så bör du använda POST, men det blir inget fel om du använder GET eller vanlig länk.

När du behöver fuska och se det gissade talet, så går det bra med GET eller vanliga länkar. De läser bara av nuvarande status, de ändrar inget.

Du kan använda [redirect för att undvika problem](guide/kom-igang-med-programmering-i-php/processingsida-och-vidare-dirigering) när ett POST-formulär laddas om.



### Spara i sessionen {#session}

Välj om du vill spara hela objektet, eller bara de viktiga delarna, i sessionen.



Krav {#krav}
-----------------------

1. Använd filer för `config.php` och `autoload.php` som visats i guiden.

1. Skapa webbklienten `index.php` för att spela spelet. Där skriver du koden som använder klassen.

1. Skapa spelet i klassen `src/Guess.php`.

1. Formuläret skall använda POST.

1. Använd sessionen för att spara spelets status. Du kan lagra variabler, eller hela klassen, i sessionen. Välj det som verkar vettigast.

1. Du får endast läsa av POST i `index.php`. Klassen skall inte ha direkt tillgång till `$_POST`, de värden måste isåfall injectas in i klassen.

1. All spellogik skall ligga i klassen, ingen (minimalt) logik får ligga i `index.php`.

1. Separera PHP-koden från HTML-koden och spara dina template-filer i katalogen `view/`.

1. Det skall vara tydligt när man vinner och det skall inte gå att göra fler gissningar när man har slut på gissningar.

1. Om man gissar ett tal som är högre än 100 eller lägre än 1 så skall ett exception av typen `GuessException` kastas. Klassfilen för exception skall ligga i `src/GuessException.php`.

1. Validera och publicera din kod.

```bash
dbwebb publish guess
```



Extrauppgift {#extra}
-----------------------

1. Gör spelet riktigt lättanvänt, fokusera på användarvänligheten och flödet för spelaren.

1. Använd redirect (`header()`) för att undvika problem vid sidomladdning när ett postat formulär laddas om.

1. Lägg på style för att göra det snyggare.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
