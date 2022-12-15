---
author: mos
category: php
revision:
  "2014-10-31": (B, mos) La till krav 5.
  "2013-09-09": (A, mos) Första utgåvan i samband med oophp version 2.
updated: "2014-10-31 15:19:24"
created: "2013-09-09 15:33:32"
...
Skapa en klass för användarhantering, CUser
==================================

I guiden ["Kom igång med PHP PDO och MySQL"](kunskap/kom-igang-med-php-pdo-och-mysql) så skapar vi en [hantering av inloggade användare](kunskap/kom-igang-med-php-pdo-och-mysql#login) som går mot databasen. Du skall nu samla den koden i en klass CUser som du kan återanvända i andra webbapplikationer du gör. Har du jobbat igenom guiden så har du redan halva lösningen till denna uppgiften.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["Kom igång med PHP PDO och MySQL"](kunskap/kom-igang-med-php-pdo-och-mysql). 

Du behöver ha kunskap om [Anax och Anax moduler](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).



Krav {#krav}
-----------------------

1. Skapa klassen CUser som en modul i Anax. 

2. Klassen skall hantera om det finns en inloggad användare eller ej. Principen är att samla koden i klassen så att det blir så lite kod som möjligt i sidkontrollern. Se tipset nedan om en möjlig struktur av metoder.

3. Skapa en sidkontroller `login.php` som visar att inloggningen fungerar.

4. Skapa en sidkontroller `logout.php` som visar att det går att logga ut.

5. Skapa en sidkontroller `status.php` som visar information om en inloggad användare, eller säger att man inte är inloggad.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

Dölj all hantering av sessionen inuti klassen.

Dölj all hantering mot databasen inuti klassen.

Hantera post-variabler i sidkontrollern.

I klassens konstruktor kan du kontrollera om det finns en inloggad användare eller ej och därefter initiera objektet.

Möjliga metoder kan vara:

* `CUser::Login($user, $password)` loggar in användaren om användare och lösenord stämmer.
* `CUser::Logout()` loggar ut användaren.
* `CUser::IsAuthenticated()` returnerar `true` om användaren är inloggad, annars `false`.
* `CUser::GetAcronym()` returnera användarens akronym.
* `CUser::GetName()` returnera användarens namn.

**Lycka till och hojta till i forumet om du behöver hjälp!**




