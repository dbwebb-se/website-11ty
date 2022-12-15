---
author: mos
category:
    - php
    - anax
    - kursen oophp
revision:
    "2019-04-29": "(D, mos) lade till stycke om kodstruktur och ."
    "2018-10-01": "(C, mos) Uppdaterade anax/database till v2.0.0."
    "2018-04-27": "(B, mos) Lade till videoserie som komplement."
    "2018-04-23": "(A, mos) Första utgåvan i samband med oophp version 4."
...
Bygg CRUD filmdatabas med MySQL
==================================

[FIGURE src=image/snapvt17/movie-paginate-1.png?w=c5&a=25,50,32,0&cf class="right"]

Du har ett färdigt exempel att utgå ifrån, exemplet innehåller kod som löser CRUD, sökning och presentation kring en filmdatabas. Din uppgift är att föra över den koden, refaktorera den, så att den passar in i ramverket kring din redovisa-sida.

Du skall lägga in koden som en del i din redovisa-sida och visa upp filmer, eller någon annan typ av produktliknande information, välj själv fokus för vad du vill visa upp.

<!--more-->

Så här ser exemplet ut som du har att utgå ifrån.

[FIGURE src=image/snapvt17/movie-paginate-1.png?w=w3 caption="Första sidan visas med två träffar av filmer."]

Så här kan det se ut när du är ett steg på vägen och har lyckats med första steget att integrera i din redovisa-sida.

[FIGURE src=image/snapvt18/movie-i-redovisa.png?w=w3 caption="Filmdatabasen visas inuti min redovisa-sida."]



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom Jobba igenom guiden "[Kom igång med PHP PDO och MySQL (v2)](kunskap/kom-igang-med-php-pdo-och-mysql-v2)". 

Du har en redovisa-sida.



Introduktion och förberedelse {#intro}
-----------------------

Gå igenom följande steg för att förbereda dig inför uppgiften.

Du kan se hur jag jobbar igenom stegen i videoserien "[Uppgiften "Bygg CRUD filmdatabas med MySQL" (kursen oophp)](https://www.youtube.com/playlist?list=PLKtP9l5q3ce8dXaJytGWt3usKsqpXT9E-)".

[YOUTUBE src="16Pr9JIM1ko" list="PLKtP9l5q3ce8dXaJytGWt3usKsqpXT9E-" width=700 caption="Mikael visar hur du jobbar igenom vissa steg för att komma igång med uppgiften."]



### Kom igång utifrån exempelkoden {#exempelkoden}

Kopiera in koden in i ramverkets struktur, avvakta att integrera.
Få exemplet att fungera.

```text
# Stå i me/redovisa
rsync -av ../../example/php-pdo-mysql htdocs
```

Kopiera SQL-delarna så att du kan återskapa databasen vid behov. Du kan lägga SQL-koden i `redovisa/sql/movie`.

```text
install -d sql/movie
rsync -av htdocs/php-pdo-mysql/sql/ sql/movie/
```

Återskapa databasen vid behov.

```text
mysql -uuser -ppass oophp < sql/movie/setup.sql
```

När detta är klart så bör du kunna köra exemplet som tidigare.



### Använd `anax\database` {#anaxdatabase}

Vi skall använda en Anax modul för databasen. Den ser ut ungefär som i övningen men innehåller lite mer kod.

Du kan läsa om modulen på [anax/database](https://github.com/canax/database).

Först installerar vi modulen via composer.

```text
# Stå i rooten av din me/redovisa
composer require anax/database
```

Vi behöver en uppsättning av konfigurationsfiler, vi lånar dem från modulen.

```text
rsync -av vendor/anax/database/config/ config/
```

Kika i konfigurationsfilen `config/database.php` och uppdatera den så du kan koppla upp dig mot din lokala databas. Det finns en exempelfil som ligger i `config/database-sample.php`, använd den som bas för att skapa en konfigfil som fungerar i kursens sammanhang, både lokalt och på studentservern.

Databasen är nu en del av `$app` som `$app->db`. I din me/redovisa kan du nu, via länken `dev/di`, kontrollera att `db` är en tjänst som finns i ramverkets tjänstekontainer.



### Hur integrera en route {#introute}

Nu kan du integrera en route som visar filmerna, för att testa att databaskopplingen fungerar.

Skapa en route fil `src/route/movie.php`.

Lägg till följande route.

```php
/**
 * Show all movies.
 */
$app->router->get("movie", function () use ($app) {
    $title = "Movie database | oophp";

    $app->db->connect();
    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);

    $app->page->add("movie/index", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});
```

Nu behöver du en templatefil `view/movie/index.php` som renderar en vy med resultsetet.

Det kan se ut så här när du har fått allt på plats, inklusive bilderna.

[FIGURE src=image/snapvt18/movie-i-redovisa.png?w=w3 caption="Filmdatabasen visas inuti min redovisa-sida."]



### Lokal databas kontra produktionsserver {#server}

Du behöver konfigurera databaskopplingen både för din lokala utvecklingsmiljö och för produktionsservern som är studentservern i ditt fall.

Du behöver sätta upp databastabellerna på studentservern. Du kan göra det genom att logga in på studentservern och köra MySQL CLI. Glöm inte att ladda upp filerna till studentservern med `dbwebb upload` (eller validate/publish).

```text
dbwebb login
cd dbwebb-kurser/oophp/me/redovisa
mysql -hblu-ray.student.bth.se -u[akronym] -p [akronym] < sql/movie/setup.sql
```

Byt ut "[akronym]" mot din egen akronym, min är "mos".

Ovanstående kan du kombinera och köra i ett kommando.

```text
dbwebb run "mysql -hblu-ray.student.bth.se -u[akronym] -p [akronym] < dbwebb-kurser/oophp/me/redovisa/sql/movie/setup.sql"
```

Om du är intresserad av exakt vilket kommando som körs under huven av `dbwebb run` så kör du ovanstående kommando med optionen `-v`, `dbwebb -v run ...`. Det är en ssh-inloggning som sedan kör ett kommando.

Du behöver anpassa din `config/database.php` så att den använder olika konfiguratioer för din lokala maskin och för produktionsservern. Du kan se ett exempel på en sådan konfigurationsfil i foruminlägget "[Olika (databas) konfiguration för utveckling och produktion](https://dbwebb.se/t/7431)" och i kursrepot under `example/redovisa/config/database_sample.php`.

När du är klar såkan du göra en `dbwebb publish` och allt bör fungera att köra på studentservern.



### Att committa lösenord {#pwd}

I din konfigurationsfil `config/database.php` ligger nu din användare och lösenord. Den typen av information vill man inte lägga till i sitt repo. Normalt lägger man en `config/database_sample.php` som en mall som också kan vara en del av repot. Man kopierar sedan den filen och lägger till lösenorden, dock checkar man inte in filen. Man kan via `.gitignore` ignorera filen i repot.

Det kan även finnas andra taktiker för att hantera risken att committa känslig information.

Oavsett vad så vill man aldrig committa den typen av känslig data och oavsiktligt publicera på GitHub eller motsvarande.

Om det skulle hända så är det inte ett större problem i vårt sammanhang. Lösenordet gäller enbart för databasen och det kan genereras om. Så råkar du trots allt checka in filen så är det inget problem i sig.



### Vanliga funktioner {#funktioner}

Om du har behov av vanliga funktioner, för att komplettera dina klasser, så kan du lägga dem i `src/function.php`.

Här är ett exempel.

```php
<?php
/**
 * General functions.
 */

/**
 * Some useful function.
 *
 * @return void
 */
function useful() {
    ;
}
```

När filen är på plats så lägger du in den som en del i autoloadern. Filer kan inte autoloadas som klasser, så composers autoloader ser till att filen alltid inkluderas.

Lägg följande sekvens i din composer.json.

```json
"autoload": {
    "files": ["src/function.php"]
}
```

Det skall vara en del av det som redan finns under `"autoload"`. Min sektion ser ut så här när jag är klar.

```json
"autoload": {
    "psr-4": {
        "Anax\\": "src/",
        "Mos\\": "src/"
    },
    "files": ["src/function.php"]
}
```

Därefter uppdaterar du composers autoloader.

```text
# Stå i me/redovisa
composer dump
```

Nu är funktionerna tillgängliga i din kod, du kan använda dem till exempel i dina klasser eller i template-filerna. 



### Kontroller och klasser {#kontroller}

Det är en sak (A) att lösa uppgiften genom att använda befintlig kod och överföra till route callbacks och återanvända kod med funktioner. Det är tillräckligt för att lösa uppgiften.

Det är en annan sak (B) att lösa uppgiften genom att använda en kontroller använda interna metoder i kontrollern för att lösa det som funktionerna gör.

Det är ytterligare en sak (C) att bygga en tunn kontroller och flytta mycket av koden till klasser som används av kontrollern.

Det är ännu en aspekt att bygga generella klasser som inte är specifika för "Movie"-övningen och kan återanvändas i andra sammanhang för att visa liknande innehåll, från andra databastabeller, och genom att återanvända samma struktur av kontroller och klasser.

Svårigheten ökar med A -> B -> C -> D, välj den vägen som du själv känner är rimlig, baserad på tid du har att tillgå och din ambitionsnivå med uppgiften.

Rekommendationen är att sikta på B eller C. Det lönar sig troligen bäst inför projektet om man jämför "pris/prestanda" på det som krävs.



Krav {#krav}
-----------------------

1. Integrera filmdatabasen i din redovisa så att den fungerar både lokalt och på studentservern.

1. Du kan lägga in vilka filmer du vill, men se till att det är minst 5 filmer i tabellen.

1. Lägg till en länk i navbaren så man når din implementation.

1. Visa upp filmerna i en översikt (notera att sortera och paginera är extrauppgifter).

1. Man skall kunna söka bland filmerna via titel och årtal.

1. Gör stöd för CRUD så man kan lägga till, ta bort och redigera filmer. Tänk till så du får ett bra flöde för användaren.

1. Det är inte ett krav att lägga till enhetstester som berör databasen. Men om du har kod som inte omfattas av databasen så är det relevant att fortsätta bygga på din testsuite.

1. När du är klar så gör du `make test` för att kontrollera att din testsvit fungerar och sedan gör du en `dbwebb publish`.



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter om du har tid och lust.

1. Bygg stöd för att återskapa tabellens innehåll, det är bra att ha om någon till exempel skulle förstöra din ditt databasinnehåll på studentservern.

1. Lägg till så man kan sortera per kolumn när filmerna presenteras.

1. Lägg till paginering.

1. Hade du kunnat göra en flexibel struktur och arrangera din kod i kontroller/routes, klasser och vyer som är återanvändbara i andra sammanhang än filmdatabasen? Fundera kring vad som är möjligt och vad som hade krävts av din kod.

1. Använd Cimage för att bättre skala om bilderna, eller välj någon annan taktik för att undvika CSS-skalning av bilderna.

1. Gör en enkel inloggning, se till att man kan logga in med doe:doe och admin:admin.

1. Fundera på vilka kodbas du nu har och vilka delar av den som kräver tillgång till databasen för att enhetstestas. Hur hade du gjort för att enhetstesta koden som är beroende av databasen?



Tips från coachen {#tips}
-----------------------

**Lycka till och hojta till i forumet om du behöver hjälp!**
