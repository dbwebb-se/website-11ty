---
author:
    - lew
    - mos
category:
    - kurs oophp
revision:
    "2018-03-19": "(D, mos) Uppdaterad inför vt18."
    "2017-05-12": "(C, mos) Uppdaterade vilka stycken som gäller i oophp20-guiden."
    "2017-03-14": "(B, mos) La till info samt om objekt i sessionen."
    "2017-03-09": "(A, lew) Första utgåvan i samband med kursen oophp v3."
...
Gissa numret med PHP och GET, POST och SESSION
==================================

[FIGURE src=image/snapvt18/oophp-guess-my-number-post.png?w=c5&a=22,50,35,0&cf class="right"]

Du skall implementera olika varianter av ett spel, där det gäller att gissa vilket tal som slumpats fram. Spelet ska svara om spelarens gissning är högre eller lägre än det korrekta talet. Spelaren har 6 gissningar på sig. 

Du skall skriva all kod som har med spelet att göra inuti en klass och du skall skriva tre stycken klienter (GET, POST, SESSION) som använder sig av en och samma klass för att implementera spelet.

Uppgiften är en övning i att skriva klasser och att skapa ett API som gör det möjligt att koppla flera klienter mot en och samma klass-kod.

<!--more-->

[FIGURE src=image/snapvt18/oophp-guess-my-number-post.png?w=w3 caption="Spela spelet Gissa mitt nummer med PHP."]



Förkunskaper {#forkunskaper}
-----------------------

Du har goda grundläggande kunskaper i PHP som motsvarar artikeln "[20 steg för att komma igång med PHP (php20)](kunskap/kom-i-gang-med-php-pa-20-steg)".

Du har jobbat igenom guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)" med dess två inledande delar:
    * [Intro till guiden](guide/kom-igang-med-objektorienterad-programmering-i-php/intro-till-guiden)
    * [Objekt och Klass](guide/kom-igang-med-objektorienterad-programmering-i-php/objekt-och-klass)



Introduktion och förberedelse {#intro}
-----------------------

Gör följande för att förbereda dig för uppgiften.

Det finns en videoserie "[Uppgiften "Gissa mitt nummer" (kursen oophp)](https://www.youtube.com/playlist?list=PLKtP9l5q3ce8bxiDqQ8PQwJ6xYbWLYBvw)" som visar hur det kan se ut när du är klar.

[YOUTUBE src="T_zBswY2fjo" width=700 list="PLKtP9l5q3ce8bxiDqQ8PQwJ6xYbWLYBvw" caption="Mikael visar hur spelet och dess olika klienter kan se ut när de är klara."]



### Spelregler {#regler}

Spelet "Guess the number" är ett enkelt gissningsspel där någon tänker på ett tal mellan 1-100. I detta fallet är det datorn som tänker på ett tal.

Man har 6 gissningar på sig att gissa rätt tal. Vid varje gissning så får man svaret om talet "för lågt", "för högt" eller "rätt gissat".

När gissningarna är slut kan man inte gissa mer.



### Mall för klass till spelet Gissa mitt nummer {#mallen}

Gå till katalogen där du skall jobba. Börja med att kopiera mallen för själva spel-klassen.

```text
mkdir src
cp ../../../example/guess/src/Guess.php src
```

Lägg även dit filer för `autoload.php` och `config.php`.

Studera klass-filen `Guess.php` och fundera hur du kan implementera spelet i den klasstrukturen som erbjuds.

Du kan välja att implementera klassen annorlunda, om du vill. Du behöver inte slaviskt följa den mallen du fått.

Spelet ska hanteras av klassen `Guess`. Se till att samma klass återanvänds i alla versionerna av spelet.

Man skall kunna initiera ett objekt av klassen, genom att *injecta* information såsom det hemliga talet och antalet gissningar gjorda. I mall-klassen injectas informationen via konstruktorn.

Klassen **får inte läsa direkt** från $\_GET, $\_POST eller $\_SESSION. Om information behövs från dessa globala variabler så skall de bifogas in till klassen Guess, informationen skall injectas in i klassen från respektive `index_*.php`. 



### GET klienten index_get.php {#get}

Gör en variant där du enbart använder GET gör att spela spelet. Spara koden i `index_get.php`

Gissa numret i ett formulär som postas med GET-metoden.

Minns vilket nummer som är det gissade genom att lagra det i ett hidden fält i formuläret.

Det skall finnas en länk/knapp som möjliggör omstart. Talet ska då slumpas om och antalet gissningar ska nollställas.

Det skall finnas en länk/knapp "Cheat" som skriver ut nuvarande tal, det blir enklare att testa då.



### POST klienten index_post.php {#post}

Gör samma sak igen, men använd nu endast POST istället för GET. Spara koden i `index_post.php`.



### SESSION klienten index_session.php {#session}

Gör samma sak igen, men använd nu SESSION för att minnas spelets ställning. Spara koden i `index_session.php`.

Till formuläret använder du POST.

Välj om du vill spara hela objektet, eller bara de viktiga delarna, i sessionen.



Krav {#krav}
-----------------------

1. Skapa spelet i klassen `src/Guess.php`.

1. Använd filer för `config.php` och `autoload.php` som visats i guiden.

1. Skapa de olika klienterna `index_get.php`, `index_post.php` och `index_session.php` för att spela spelet.

1. Om man gissar ett tal som är högre än 100 eller lägre än 1 så skall ett exception av typen `GuessException` kastas. Klassfilen för exception skall ligga i `src/GuessException.php`.

1. Validera och publicera din kod.

```bash
dbwebb publish guess
```



Extrauppgift {#extra}
-----------------------

1. Lägg på style för att göra det snyggare.

<!--
1. När du använder POST så använd redirect med `header()` för att bli av med varningspopupen vid sidomladdning av postat formulär.

ger implicit behov av flash-message via sessionen.
-->


Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
