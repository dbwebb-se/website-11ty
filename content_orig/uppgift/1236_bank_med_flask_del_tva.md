---
author: moc
revision:
    "2020-01-21": (A, moc) Skapad inför VT21.
category:
    - oopython
...
Bygg en bank med flask - Del 2
===================================

Du skall jobba vidareutveckla det du gjorde i förra kursmomentet och lägga till en ny klass. 

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

1. Du har gjort klart "[Bygg en bank med flask - Del 1](uppgift/bank_med_flask)".  

2. Du kar läst artikeln "[Att skriva unittester](kunskap/unittest-i-python)".



Introduktion {#intro}
-----------------------

Kunden blev riktigt nöjd med din insats och har nu bett dig att vidareutveckla bank applikationen. De har gett dig i uppdrag att uppdatera gränssnittet och lägga till nya routes. Du kommer till att behöva ändra i den existerande kodbasen och lägga till ny funktionalitet som att skapa nya konton och koppla dem till en ny person klass.


[YOUTUBE src=ykMoCALYLtA width=630 caption="Så här kan uppgiften se ut när det är färdigt."]

Denna gången har kunden inte gett dig ett diagram eller någon färdig python kod. Deras tidigare utvecklare har däremot gjort klart de nya vyerna som kopplar användare till konton och skapar nya personer/konton. Det ligger också lite ofärdig kod i `app.py` som visar hur man kan lägga till personer och konton under samma route. Koden kan hittas under [example/flask/bank2](https://github.com/dbwebb-se/oopython/tree/master/example/flask/bank2).

Krav {#krav}
-----------------------

1. Kolla på youtube-klippen ovanför för att få en överblick på hur appen kan se ut när den är klar.

1. Skapa en ny klass `Person`, lägg den i filen `person.py`. Varje person skall ha attributen `name` och `_id` som skall vara en **unik** sträng. Resterande attribut och metoder avgör du själv.  

1. Lägg till möjligheten att skapa en ny person. I vyn skall man kunna skriva in ett namn och ett id på personen man vill skapa.  
Man skall ej kunna skapa en person vars id redan existerar, gör man det skall ett felmeddelande visas.  
Spara den nya personens information till **samma** json fil som håller alla konto-objekt.

1. Lägg till möjligheten att skapa ett nytt konto. I vyn skall det finnas en dropdown med alla konto typerna och ett fält där man kan skriva in kontots balans.

1. Utöka koden och gör det möjligt att koppla personer till konton. Ett Konto skall kunna klara av att hålla flera användare. I vyn lägger du till två dropdowns, en med personernas id och en med kontonas id.  
Man skall inte kunna koppla samma person till ett konto mer än en gång, gör man det skall ett felmeddelande visas.

1. Uppdatera *index.html*, lägg till en ny kolumn i tabellen som visar namnen på alla som är kopplade till kontot. Namnen skall vara komma separerat utan `,` på stulet.

1. Uppdatera *account.html*, lägg till en lista med både namnet och id:t för varje person som är kopplad till kontot.

1. Skapa filen `tests.py` och skriv enhetstester för följande:
    1. Transaktioner för båda konto typerna.
    1. Testa uträkning av räntor mellan två dagar.
    1. Kolla om skapandet av personer och konton fungerar som du har tänkt samt funktionaliteten som kopplar dem tillsammans.

1. När du skriver enhetstester för att skapa personer och när man kopplar dem till ett konto, se till att skriva testfall som täcker både positiva och negativa fall.  
Det negativa fallen skall vara följande, se till att en person vars *id* redan existerar inte skapas och att du inte kan koppla samma person till ett konto två gånger.


```bash
# Ställ dig i kurskatalogen
dbwebb validate bank2
dbwebb publish bank2
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

1. Uppdatera klassdiagrammet så att den matchar din nuvarande kod, lägg den i `static/img/uml.png`.

2. Gör flera enhetstester och testfall som du känner är viktiga att täcka.


Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i discord om du behöver hjälp!
