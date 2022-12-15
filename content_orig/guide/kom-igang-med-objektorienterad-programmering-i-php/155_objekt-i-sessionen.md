---
author: mos
revision:
    "2019-03-25": "(B, mos) Genomgången inför vt19."
    "2018-03-19": "(A, mos) Första versionen, uppdelad av större dokument."
...
Objekt i sessionen
==================================

Vi skall se hur man kan lagra ett objekt i sessionen.

Spara koden du skriver i denna övningen i `index_session.php` och `index_session_destroy.php`.



Starta en namngiven session {#start}
----------------------------------

Vi börjar med testprogrammet `index_session.php` och där startar vi en namngiven session. Använd din akronym som sessionens namn.

```php
session_name("mosstud");
session_start();
```

Om du känner att du behöver en mer grundlig genomgång av sessioner så kan du läsa stycket "[Sessioner i guiden Kom igång med programmering i PHP](guide/kom-igang-med-programmering-i-php/sessioner)".



Skapa och placera objekt i sessionen {#add}
----------------------------------

Nu vill jag placera en person i sessionen, förutsatt att det inte redan finns en person lagrad där.

Sedan vill jag räkna upp personens ålder varje gång sidan laddas.

```php
if (!isset($_SESSION["person"])) {
    $_SESSION["person"] = new Person5("MegaMic", 42);
}

$person = $_SESSION["person"];
$age = $person->getAge();
$person->setAge($age + 1);
echo $person->details();
```

Vid varje ny sidladdning så blir personen ett år äldre. Hela objektet lagras i sessionen.

[FIGURE src=image/snapvt18/oophp-session.png?w=w3 caption="Personen närmar sig pensionsåldern efter ett antal sidomladdningar."]



Förstör sessionen {#destroy}
----------------------------------

Som vanligt när man jobbar med sessionen så vill man ha möjligheten att förstöra den och starta om med en ny fräsh session.

För detta syfte skapar vi `index_session_destroy.php` och fyller med koden.

```php
<?php
/**
 * Destroy the session.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

session_name("mosstud");
session_start();

// Unset all of the session variables.
$_SESSION = [];

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
echo "The session is destroyed.";
```

Pröva att förstöra din session och testkör sedan föråldringsprogrammet igen.



Bra att veta {#bra}
----------------------------------

När objektet lagras i sessionen så görs `serialize()` på objektet. När nästa sidomladdning kommer och objektet hämtas från sessionens lagringsplats, så sker en `unserialize()` på objektet.

En förutsättning för att `unserialize()` skall fungera är att objektets klassbeskrivning finns tillgänglig. Nu använder vi autoloadern som sköter om det så det bör fungera per automatik för oss. Men det betyder att autoloadern **måste** vara inkluderad, innan sessionen startas. 

Annars får man ett felmeddelande som kan se ut så här.

> Fatal error: main(): The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Person5&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide an autoloader to load the class definition in /home/dbwebb/oophp-guide/index_session_failure.php on line 17

[FIGURE src=image/snapvt18/oophp-load-before-unserialize.png?w=w3 caption="Ett vanligt fel när man missat att inkludera klassfilen eller autoloadern, innan sessionen startas."]

Vid sådana fel så dubbelkollar du om klassfilen, eller autoloadern, verkligen är inkluderad, innan du startar sessionen.
