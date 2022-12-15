---
author:
    - lew
category:
    - php
    - kurs oophp
revision:
    "2017-04-07": "(B, mos) Justerad för att passa med resten av uppgiftern i kmomet."
    "2017-03-14": "(A, lew) First version."
...
Inloggning till Anax Lite
==================================

Du ska integrera ett inloggningssystem i ditt Anax Lite. Det löser det med hjälp av klasser för sessionen, användaren och databasuppkopplingen. 

<!--more-->

[FIGURE src=/image/oophp/v3/loginexercise.png?w=w2 caption="Exempel på hur man kan skapa användare."]



Förkunskaper {#forkunskaper}
-----------------------

Du har gått igenom artiklarna "[Logga in med sessioner och cookies](kunskap/sessioner-cookies-login)" och "[Kom igång med PHP PDO och MySQL (v2)](kunskap/kom-igang-med-php-pdo-och-mysql-v2)".  



Introduktion {#intro}
-----------------------------------------

Du vet hur du kan integrera ny kod in i ramverket Anax Lite och nu har du möjligheten att visa, och testa olika tekniker för att göra detta.



Krav {#krav}
-----------------------

1. Bygg funktionalitet så att användaren kan logga in, se sin profil, redigera delar av profilen och logga ut.

1. Skapa den/de tabeller som behövs i MySQL. Spara all SQL-kod i ett eget skript `anax-lite/sql/setup-user.sql`.

1. Lösenorden ska aldrig hanteras i klartext. Lagra enbart en krypterat version.

1. Man ska kunna skapa en ny användare genom att registrera sig via webbplatsen.

1. Användaren ska kunna byta sitt lösenord.

1. Profilsida ska enbart kunna nås om användaren är inloggad. Man ska inte kunna nå sidan genom att bara skriva in filnamnet i adressfältet, om man inte är inloggad.

1. Det ska synas vem som är inloggad.

1. Skapa de klasser/kod du anser dig behöva och bygg dem som du anser rätt.

1. Spara en cookie. Vad du sparar väljer du själv, så länge det inte är känslig information, tex lösenordet. Den sparade cookien ska synas på profilsidan.



Extrauppgift {#extra}
-----------------------

1. Lägg till så att användaren kan ha vissa behörigheter, någon är vanlig användare och någon kan vara administratör. Skapa en route som bara kan nås om man är administratör. Du kan hårdkoda rollerna i databasen, du behöver inte ett gränssnitt för det.

1. Gör så man kan logga in, registrera sig, via en annan leverantör, till exempel Facebook, Google, Twitter eller GitHub.



Tips från coachen {#tips}
-----------------------

För profilbilder kan du använda länkar från Gravatar, så slipper du hantera bildfiler.

Skapa din egna klass för all databashantering, din egen `Database`.

Se till så din kod ligger på rätt plats. Städa bort kod från vyerna.

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

**Lycka till och hojta till i forumet om du behöver hjälp!**
