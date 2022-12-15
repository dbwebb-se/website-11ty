---
author: mos
revision:
  "2014-08-06": (C, mos) Tog bort 42-testet.
  "2014-05-09": (B, mos) Artikel som visar hur man integrerar CForm med Anax MVC.
  "2014-04-21": (A, mos) Första utgåvan för phpmvc version 2.
updated: "2014-08-08 09:26:44"
created: "2013-10-24 15:06:10"
...
Kmom04: Databasdrivna modeller
==================================

Scaffolding innebär att automatiskt generera kod för att snabbt bygga en webbapplikation. Det handlar om att specificera det som skall göras, till exempel via konfigurationsfiler, och sedan generera kod för kontroller, modeller, vyer, formulär och databastabeller.

Att automatiskt generera kod i ramverket har fördelen att det går snabbt att skapa koden, men nackdelen är att den inte blir exakt som man vill och kan behöva modifieras. I detta kursmomentet skall vi titta på de förutsättningar som bör finnas i ramverket för att vi skall kunna automatgenerera kod. Vi tittar på olika databaslager, modeller som är förberedda för CRUD-hantering och effektiv formulärhantering.

Vi försöker belysa frågor om vilka grunder, i form av klasser för formulärhantering, databasfrågor och modeller, som kan hjälpa oss att skriva enkla kodkonstruktioner som leder till snabbare resultat, och bättre kod, i ramverket.

Följande är exempel på kod som vi skall använda för att underlättar kodskrivandet.

*Skapa SQL-frågorna via metodanrop med paketet `mos/cdatabase`.*

```php
$sql = "
CREATE TABLE mos_test
(
    id integer primary key not null,
    age integer,
    text varchar(20)
)
;";
$db->execute($sql);
 
$db->createTable(
    'test',
    [
        'id'    => ['integer', 'auto_increment', 'primary key', 'not null'],
        'age'   => ['integer'],
        'text'  => ['varchar(20)'],
    ]
);
 
$db->execute();
```

*Skapa HTML formulär via arrayer med paketet `mos/cform`.*

```php
$form = $form->create([], [
    'name' => [
      'type'        => 'text',
      'label'       => 'Name of contact person:',
      'required'    => true,
      'validation'  => ['not_empty'],
    ],
    'email' => [
      'type'        => 'text',
      'required'    => true,
      'validation'  => ['not_empty', 'email_adress'],
    ],
    'phone' => [
      'type'        => 'text',
      'required'    => true,
      'validation'  => ['not_empty', 'numeric'],
    ],
    'submit' => [
        'type'      => 'submit',
        'callback'  => function($form) {
            $form->AddOutput("<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>");
            $form->AddOutput("<p><b>Name: " . $form->Value('name') . "</b></p>");
            $form->AddOutput("<p><b>Email: " . $form->Value('email') . "</b></p>");
            $form->AddOutput("<p><b>Phone: " . $form->Value('phone') . "</b></p>");
            $form->saveInSession = true;
            return true;
        }
    ],
]);
```

<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>




Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*


###Artiklar {#artiklar}

Börja med att läsa om ramverket Phalcon och dess hantering av databas och modeller.

1. Läs igenom följande kapitel i manualen om Phalcon. Det visar hur Phalcon har separerat sina lager mellan databasen och modellerna.
  * Phalcon och [Database Abstraction Layer](http://docs.phalconphp.com/en/latest/reference/db.html).
  * Phalcon och [Phalcon Query Language (PHQL)](http://docs.phalconphp.com/en/latest/reference/phql.html).
  * Phalcon och [Working with Models](http://docs.phalconphp.com/en/latest/reference/models.html).


Fortsätt nu att läsa om formulärhantering i ramverk.

1. Läs om [Formulärhantering i Phalcon](http://docs.phalconphp.com/en/latest/reference/forms.html).

1. Läs *översiktligt* om [PHP Form Builder Class](http://www.imavex.com/pfbc3.x-php5/), en fristående PHP-klass för att skapa formulär. Studera de formulärexempel som finns på sidan.  


Avsluta med att läsa om Phalcons developer tools och se hur man kan skapa stubbar till klasser via kommandoraden.

1. Phalcon och [Phalcon Developer Tools](http://docs.phalconphp.com/en/latest/reference/tools.html) för att göra scaffolding och generera kod via kommandoraden.





###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [PHP Objects, Patterns, Practice](kunskap/boken-php-objects-patterns-and-practice) 
  * Ch7 What Are Design Patterns? Why Use Them?
  * Ch9 Generating Objects
  * Ch13 Database Patterns



###Lektionsmaterial  {#lektionsmaterial}

Föreläsningsmaterial för campus kommer i april 2014.



###Lästips {#lastips}

Om du hinner och har ambitionen, eller lägg detta på din måste-bekanta-mig-med-lista.

1. Läs mer om databashantering och dess begrepp. Kärt barn har många namn och varianter, läs *snabbt och översiktligt* igenom följande databasrelaterade begrepp på Wikipedia.
    * [Scaffolding](http://en.wikipedia.org/wiki/Scaffold_(programming))
    * [Active Record Pattern](http://en.wikipedia.org/wiki/Active_record_pattern)
    * [Object-relational mapping](http://en.wikipedia.org/wiki/Object-relational_mapping)
    * [Data mapper pattern](http://en.wikipedia.org/wiki/Data_mapper_pattern)
    * [Data access layer](http://en.wikipedia.org/wiki/Data_access_layer)
    * [Data access object](http://en.wikipedia.org/wiki/Data_Access_Object)

1. Läs *översiktligt* om formulär- och databashantering för ramverket Yii i ["The Definitive Guide To Yii"](http://www.yiiframework.com/doc/guide/). Läs följande delar.
    * [Model-View-Controller (MVC)](http://www.yiiframework.com/doc/guide/1.1/en/basics.mvc)
    * [Model](http://www.yiiframework.com/doc/guide/1.1/en/basics.model)
    * [Working with Form](http://www.yiiframework.com/doc/guide/1.1/en/form.overview) (läs hela kapitlet)
    * [Working with Database](http://www.yiiframework.com/doc/guide/1.1/en/database.overview) (läs hela kapitlet)

1. Läs om databashantering i [ramverket Symfony med Doctrine](http://symfony.com/doc/current/book/doctrine.html).

1. Läs om [Doctrine](http://www.doctrine-project.org/) i guiden ["Getting Started with Doctrine"](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/getting-started.html).

1. Läs om ["Säker hantering av formulär"](http://phpsec.org/projects/guide/2.html).



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*


###Övningar {#ovningar}

Övningarna förbereder dig för uppgifterna.

1. Ladda hem och testa [CForm](opensource/cform) tillsammans med ditt Anax MVC. Gör en route för varje testprogram och bekanta dig med hur det fungerar. Här har du en potentiell tidssparare av stora mått.

  Som en komplement kan du även läsa igenom artikeln ["CForm, en PHP-klass för att skapa, presentera och validera HTML-formulär"](kunskap/cform-en-php-klass-for-att-skapa-presentera-och-validera-html-formular). Det är en artikel som skrevs till en tidigare version av CForm. Men den är fortfarande relevant och innehåller matnyttig information.

2. Jobba igenom övningen "[Använd CForm tillsammans med Anax MVC](kunskap/anvand-cform-tillsammans-med-anax-mvc)" som visar du olika sätt att integrera CForm med Anax MVC.

3. Ladda hem och testa [CDatabase](opensource/cdatabase) tillsammans med ditt Anax MVC. Skapa lite egna testprogram, börja att bygga SQL-kod för dina kommentarer som snart skall flyttas till databasen.

4. Jobba igenom övningen "[Skapa basklasser för databasdrivna modeller i Anax MVC](kunskap/skapa-basklasser-for-databasdrivna-modeller-i-anax-mvc)". Skapa din egen återanvändbara basklass för databasdrivna modeller.



###Uppgifter {#uppgifter}

Utför och redovisa följande uppgifter.

1. Gör uppgiften "[En databasdriven basmodell och hantering av användare](uppgift/en-databasdriven-basmodell-och-hantering-av-anvandare)".

2. Gör uppgiftern "[Skapa och hantera kommentarer i databasen](uppgift/skapa-och-hantera-kommentarer-i-databasen)"



###Extra {#extra}

1. Scaffolding är spännande, kan du göra en kommandoradsklient med PHP som genererar nya klasser för kontroller och modeller? Kika hur de gjorde i ramverket Phalcon.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Vad tycker du om formulärhantering som visas i kursmomentet?
  * Vad tycker du om databashanteringen som visas, föredrar du kanske traditionell SQL?
  * Gjorde du några vägval, eller extra saker, när du utvecklade basklassen för modeller?
  * Beskriv vilka vägval du gjorde och hur du valde att implementera kommentarer i databasen.
  * Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc-v2). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.




