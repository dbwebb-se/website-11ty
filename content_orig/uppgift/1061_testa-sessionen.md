---
author: lew
category:
    - kurs oophp
    - php
revision:
  "2017-03-17": (A, lew) First version.
...
Integrera klassen Session i Anax-lite
==================================

Nu har du gått igenom olika delar som tillsammans gör det möjligt att integrera egna moduler och klasser in i ditt Anax-lite. I den här uppgiften ska du bygga in klassen Session, från övningen [sessioner och cookies i php](kunskap/session-cookie-klasser). Du ska även skapa en rote för en test-sida där du använder sessionen.

<!--more-->

En variant i Anax kan se ut så här.

[FIGURE src=/image/oophp/v3/test-session.png?w=w1&q=70 caption="En testsida för sessionen i Anax."]

Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["Kom igång med objektorienterad PHP-programmering på 20 steg"](kunskap/kom-i-gang-med-oophp-pa-20-steg).  
Du bör ha gått igenom artikeln [Klasser för sessionen och cookies](kunskap/session-cookie-klasser).  



Introduktion {#intro}
-----------------------

Du ska skapa sex stycken routes för att testa sessionen. Den första routen, `session`, visar länkar eller knappar till dina routes.


Tips lägg dina routes i config/route/session.php och inkludera filen i config/route.php.



Krav {#krav}
-----------------------

1. Integrera klassen Session med Anax. (`src/Session/Session.php`).

1. `session/increment` ska öka en siffra i sessionen med 1. Gör en redirect till `session`.

1. `session/decrement` ska minska siffran i sessionen med 1. Gör en redirect till `session`.

1. `session/status` ska returnera ett json-response. Informationen som ska visas är minst 3 av de inbyggda funktionerna som du hittar [här](http://php.net/manual/en/ref.session.php).

1. `session/dump` ska använda klassens `dump()`-metod på sidan.

1. `session/destroy` ska använda klassens `destroy()`-metod och göra en redirect till routen `session/dump`.

1. `session` visar länkarna till de testroutes som du har gjort. Här visar du även värdet på sessionens siffra. Se till så du når den via navbaren.



Extrauppgift {#extra}
-----------------------

1. Gör ett formulär där man kan lägga till egna värden i sessionen.

1. Gör ett formulär där man kan redigera värden i sessionen.



Testa, lek och öva - det kommer man långt med.

**Lycka till och hojta till i forumet om du behöver hjälp!**
