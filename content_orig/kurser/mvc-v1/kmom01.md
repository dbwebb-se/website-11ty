---
author:
    - mos
revision:
    "2021-03-29": "(B, mos) Lade till läsresurs om Templating."
    "2021-03-25": "(A, mos) Första versionen släppt för mvc-v1."
...
Kmom01: Objektorientering
==================================

<!--
[INFO]

**Publicerat - men inte komplett**

Detta kmom är publicerat men ännu inte komplett. Om du är en "early user" med relativt höga förkunskaper kan du gärna pröva att genomföra kursmomentet. Annars bör du avvakta tills denna blå ruta försvinner.

[/INFO]
-->

I denna kursen skall vi lära oss programmera webbapplikationer på ett objektorienterat sätt med fokus på det arkitekturella designmönstret MVC.

I kurserna htmlphp och design använde vi oss av begreppet vyer, det är V:et i MVC. Vyer är något vi fortsätter använda i detta kursmomentet.

I nästa kursmoment skall vi introducera C:et i MVC, Controller. Men för att lära oss bygga Controllers så behöver vi någorlunda koll på hur klasser och objektorienterad programmering fungerar i PHP. Det får alltså bli huvudsyftet för detta inledande kursmoment.

Vi prövar därför att komma igång med grunderna i objektorienterad programmering i PHP genom att bygga ett antal enklare klasser som vi använder och visar upp i form av ett enklare tärningsspel via ett par webbsidor.

Vi får även möjlighet att repetera begrepp som GET, POST och SESSION som är bra att ha koll på när vi bygger webbapplikationer.

<small><i>Detta är instruktionen för kursmomentet och omfattar cirka **20 studietimmar**. Fokus ligger på uppgifter som du skall lösa och redovisa. För att lösa uppgifterna behöver du normalt jobba igenom övningar och läsanvisningar för att skaffa dig rätt kunskap och förståelse av uppgiftens alla delar. Läs igenom hela kursmomentet innan du börjar jobba.</i></small>

<!-- more -->



Labbmiljö  {#labbmiljo}
---------------------------------

*(ca: 2-4 studietimmar)*

Se till att du har kursens labbmiljö installerad.

1. En [översikt av labbmiljön som krävs för att genomföra första kursmomentet](./../installera-labbmiljo).



Uppgifter & Övningar {#uppgifter_ovningar}
-------------------------------------------

*(ca: 8-12 studietimmar)*

Uppgifter skall utföras och redovisas, övningar är träning inför uppgifterna.



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas.

1. Lös uppgiften "[Objektorientering med klasser i PHP](uppgift/objektorientering-med-klasser-i-php)".


<!--
Borde rita ett klassdiagram enligt UML? Ta vidare kunskap från databaskursen i modellering.
-->


### Övningar {#ovningar}

Det finns inga övningar i detta kursmoment.

<!-- Jobba igenom övningarna, de förbereder dig inför uppgifterna. -->



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*

För att lösa uppgifterna och redovisningen bör du studera enligt följande.



### Föreläsning {#flas}

Titta igenom följande föreläsningar.



#### Kursintroduktion {#f1}

Introduktion till kursen mvc med kursformalia, innehåll och labbmiljö ([slides](https://dbwebb-se.github.io/mvc/lecture/L00-kursintro/slide.html)).

[YOUTUBE src="jJZ7pQGeaOI" width=700 caption="Kursintroduktion (med Mikael)."]



#### Klasser och objekt i PHP {#f2}

Introduktion till klasser och objekt i PHP, för att komma igång med grunderna i hur man skapar en klass och instansierar ett objekt. Koncept som objekt i sessioner, namespace och autoloader hanteras ([slides](https://dbwebb-se.github.io/mvc/lecture/L01-klasser-i-php/slide.html)).

[YOUTUBE src="MV4eC2yKgOE" width=700 caption="Klasser och objekt i PHP (med Mikael)."]



### Litteratur  {#litteratur}

1. Bekanta dig snabbt och översiktligt med innehållet i PHP-manualen om de delar som är extra relevant i detta kursmoment.

    * [Classes and Objects](https://www.php.net/manual/en/language.oop5.php)
    * [Namespaces](https://www.php.net/manual/en/language.namespaces.php)

1. Titta i guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)" och se om den kan hjälpa dig med att förstå grunderna till klassbegreppet i PHP. Välj själv om du enbart använder guiden som läsresurs eller om du kodar dess övningsprogram.

    * [Intro till guiden](guide/kom-igang-med-objektorienterad-programmering-i-php/intro-till-guiden)
    * [Objekt och Klass](guide/kom-igang-med-objektorienterad-programmering-i-php/objekt-och-klass)

1. Bekanta dig översiktligt med dokumentet [PHP The Right Way](http://www.phptherightway.com/). Det är skrivet av PHP communityn och ger en översikt över PHP som språk och de verktyg och processer man normalt arbetar med. Vi kommer att återkomma till dokumentet under kursens gång. Du kan se dokumentet som en innehållsförteckning till vad en god PHP-programmerare bör ha koll på.

<!--
1. Läs igenom den korta artikeln "[Martin Fowler: Tell Dont Ask](https://martinfowler.com/bliki/TellDontAsk.html)" som ger en insikt i objektorienterat tänkade och hur man delvis kan tänka när man strukturerar sina objekt och var man väljer att lägga sin kod.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa). Observera att denna kursen skiljer sig från hur du normalt sett lämnar in din redovisningstext.

Se till att följande frågor besvaras i texten i din rapport:

* Berätta kort om dina förkunskaper och tidigare erfarenheter kring objektorientering. Kanske har du redan nu en uppfattning om det är bra eller ej?

* Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå för att kunna komma igång och skapa sina första klasser?

* Reflektera kort över den kodbas som användes till uppgiften, hur uppfattar du den?

* Berätta om ditt spel från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd, vilken förbättringspotential ser du i koden/spelet, var uppgiften svårt/enkelt/utmanande, håller din kod god/hög kvalitet?

* Med tanke på artikeln "PHP The Right Way", vilka delar in den finner du extra intressanta och värdefulla? Är det några särskilda områden som du känner att du vill veta mer om?

* Vilken är din TIL för detta kmom?

TIL är en akronym för "Today I Learned" vilket leksamt anspelar på att det finns alltid nya saker att lära sig, varje dag. Man brukar lyfta upp saker man lärt sig och där man kanske hajade till lite extra över dess nyttighet eller enkelhet, eller så var det bara en ny lärdom för dagen som man vill notera.



Resurser bra-att-ha {#resurser}
---------------------------------

Här anges övriga resurser som kan användas för vidare studier i det som kursmomentet omfattar.



### Videor och spellista {#playlist}

Kursen innehåller genomgångar och föreläsningar som spelas in eller streamas och därefter läggs i en spellista.

Du kan nå spellistan på "[mvc streams v21](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_cbYbdnzKKF8-4igef73u6)".



### Git & GitHub {#git}

Git är ett versionshanteringssystem för kod och GitHub/GitLab är en webbplats där man kan ladda upp sitt Git-repo och använda extra tjänster.

Om Git.

* [Git documentation](https://git-scm.com/doc)

Om GitHub.

* [GitHub](https://github.com/)
* [GitHub Docs](https://docs.github.com/en)

Om GitLab.

* [GitLab](https://gitlab.com/)
* [GitLab Docs](https://docs.gitlab.com/)



### Make {#make}

[Manualen för GNU Make](https://www.gnu.org/software/make/manual/).



### Repetera PHP {#repphp}

Om du känner behov av att repetera PHP så kan följande resurser vara relevant.

1. Guiden från kursen htmlphp, "[Kom igång med programmering i PHP](guide/kom-igang-med-programmering-i-php)".

1. Kursboken som användes i kursen htmlphp, [Webbutveckling med PHP och MySQL](kunskap/boken-webbutveckling-med-php-och-mysql).

1. En relativt ny online-bok "[PHP Apprentice - An online book for learning PHP](https://phpapprentice.com/)" som håller på att utvecklas.



### Kodstandard {#kodstandard}

Vi använder verktyget [`phpcs` (och `phpcbf`)](https://github.com/squizlabs/PHP_CodeSniffer/wiki) för att validera koden enligt kodstandarden [PSR-12: Extended Coding Style](https://www.php-fig.org/psr/psr-12/).

Kodstandarden är överenskommen inom PHP communityn och hanteras av organisationen [PHP-FIG](https://www.php-fig.org/) vars syfte är att standardisera komponenter så att de går att använda mellan olika ramverk.  

PSR-12 har numer ersatt tidigare kodstandarder [PSR-1: Basic Coding Standard](http://www.php-fig.org/psr/psr-1/) och [PSR-2: Coding Style Guide](http://www.php-fig.org/psr/psr-2/).

Verktyget `phpcbf` är en kodstil-fixer som automatiskt kan laga en del av de fel som du får av `phpcs`.



### Linter och validatorer {#validering}

Följande linters och validatorer används i olika omfattning.

* [PHP Mess Detector (phpmd)](https://phpmd.org/), look for several potential problems within the code.
* [PHPStan (phpstan)](https://phpstan.org/), finds bugs in your code without writing tests.
* [PHPLOC (phploc)](https://github.com/sebastianbergmann/phploc), a tool for quickly measuring the size and analyzing the structure of a PHP project.
* [PHP Copy/Paste Detector (phpcpd)](https://github.com/sebastianbergmann/phpcpd), a Copy/Paste Detector (CPD) for PHP code.



### Plugin i Atom/Vscode {#plugin}

Vertyg likt phpcs och phpmd går bra att installera i din texteditor som plugins. Det underlättar att få information om dessa fel medan du skriver din kod.

Första gången man installerar kan det dock vara lite klurigt så vi lägger denna delen på överkurs. Pröva gärna när du får tid och kraft.



### Om templatefiler och vyer, V i MVC {#twig}

I artikeln "[PHP The Right Way](http://www.phptherightway.com/)" finns det ett eget kapitel om vyer och templatefiler som heter "Templating". Det är bra att läsa igenom det för att få en överblick hur termen vyer och templatfiler hör ihop med V:et i MVC.



### Twig med vyer {#twig}

I uppgiften används PHP som vymotor, eller _template engine_. Du kan installera vymotorn Twig och använda den för dina vyer, om du så önskar.

* Läs om [vymotorn Twig](https://twig.symfony.com/).
<!--* Exempel på hur du kommer igång med vymotorn Twig i uppgiften. -->



<!--
### Vyer och templatemotorer i ramverk {#vyer}

Hur vyer implementeras och konfigureras i ramverk kan skilja åt i detaljer men grundprincipen med en controller-klass är densamma.

Här är ett par olika implementationer i PHP ramverk.

* [Symfony Controller](https://symfony.com/doc/current/controller.html)
* [Laravel Controller](https://laravel.com/docs/8.x/controllers)
* [Yii Controller](https://www.yiiframework.com/doc/guide/2.0/en/structure-controllers)

-->
