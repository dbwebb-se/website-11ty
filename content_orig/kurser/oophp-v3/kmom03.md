---
author:
    - mos
    - lew
revision:
    "2017-04-07": (A, mos) Första utgåvan.
...
Kmom03: PHP PDO och MySQL
==================================

Detta kursmoment fokuserar på PHP PDO och databasen MySQL. Du får en inledande artikel som visar hur det fungerar och därefter får du på egen hand koda motsvarande funktionalitet in i ramverket Anax lite.

Det blir fokus på hur man löser inloggning, konton och administration av dessa. Det blir en hel del formulär, routes och kopplingar mot databasen. Vill man förenkla så handlar det om att lösa CRUD (Create, Read, Update, Read) för en webbapplikation mot en databas.

Dessutom blir övningar i hur man kan lösa såna här saker med hjälp av gränssnitt i sin webbplats. Här kan man behöva tänka till hur man vill att det skall se ut för slutanvändaren och de valen kan påverka vilken kod man behöver bygga för att implementera gränssnitten.

Du får träna PDO och MySQL genom att studera hur en filmdatabas kan byggas upp.

[FIGURE src=image/snapvt17/movie-paginate-sort.png?w=w2 caption="Din egen sökbara filmdatabas kan bli ett resultat av detta kursmoment."]

Du får grunden i hur inloggning fungerar och hur man hanterar och skyddar användarens lösenord.

[FIGURE src=image/oophp/v3/login-top.png?w=w2 caption="En enklare inloggningsruta som döljer en del databaskod."]

Sedan lägger du in allt i ditt Anax Lite och kanske väljer du att snygga till det också.

[FIGURE src=image/oophp/v3/loginexercise.png?w=w2&a=0,29,5,25 caption="En snyggare ruta för att registrera ett konto, bakom döljer sig databaskod."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 1-2 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*



###Kurslitteratur  {#kurslitteratur}

Det finns inga läsanvisningar.



###Lästips {#lastips}

Studera följande lästips.

* I övningen får du jobba med PHP PDO så bekanta dig gärna med [PHP PDO i PHP manualen](http://php.net/manual/en/book.pdo.php). Studera vilka metoder som erbjuds av klasserna PDO och PDOStatement samt kika kort på vilka PDO drivers som finns till olika databaser. 



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 14-18 studietimmar)*


###Övningar {#ovningar}

Gör följande övningar, de förbereder dig inför uppgifterna.

1. Jobba igenom guiden "[Kom igång med PHP PDO och MySQL (v2)](kunskap/kom-igang-med-php-pdo-och-mysql-v2)". Spara eventuella exempelprogram i `me/kmom03/pdo`.

1. Jobba igenom artikeln "[Logga in med sessioner och cookies](kunskap/sessioner-cookies-login)". Spara eventuella exempelprogram i `me/kmom03/login`. Ett bra tips är att göra ditt egna lilla testprogram för att kolla hur inloggningen kan/skall fungera.



###Uppgifter {#uppgifter}

Gör följande uppgifter.

1. Gör uppgiften "[Inloggning till Anax Lite](uppgift/inloggning-till-anax-lite)". Spara dina filer under `me/anax-lite`.

1. Gör uppgiften ["Admin gränssnitt för hantering av användare och konton"](uppgift/admin-granssnitt-for-hantering-av-anvandare-och-konton). Dina filer skall sparas under `me/anax-lite`.

1. Gör sista tredjedelen och avsluta uppgiften "[Kom igång med SQL](uppgift/kom-igang-med-sql)". Fortsätt att spara all SQL-kod i `me/kmom01/skolan/skolan.sql`.

1. Pusha och tagga ditt Anax Lite, allt eftersom och sätt en avslutande tagg (3.0.\*) när du är klar med alla uppgifter i kursmomentet.



###Extra {#extra}

Det finns ingen extra uppgift.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/oophp-v3/redovisa).

Se till att följande frågor besvaras i texten:

* Hur kändes det att jobba med PHP PDO, SQL och MySQL?
* Reflektera kring koden du skrev för att lösa uppgifterna, klasser, formulär, integration Anax Lite?
* Känner du dig hemma i ramverket, dess komponenter och struktur?
* Hur bedömmer du svårighetsgraden på kursens inledande kursmoment, känner du att du lär dig något/bra saker?
