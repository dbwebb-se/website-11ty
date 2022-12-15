---
author:
    - mos
revision:
    "2021-04-27": "(B, mos) Förtydliga att övning finns."
    "2021-04-16": "(A, mos) Första utgåvan."
...
Kmom04: Ramverk
==================================

Vi skall nu göra en liten miniundersökning av några av de mest populära ramverken inom PHP. Du skall själv välja ett av dem och installera det och komma igång och använda det samt porta en del av din kod och utvecklingsmiljö till ramverket.

Ramverk inom PHP är numer uppbyggda enligt liknande modulära strukturer. Men varje ramverk kan ha sin egen lilla nish och vinkel. Även om det finns standardiseringsorgan som PHP-FIG så behöver det inte betyda att ramverken inte tar möjligheten att visa upp sina personliga förmågor.

Det kan alltså kräva att du läser på lite om varje ramverk och deras nisch, innan du väljer väg och gör ditt val.

<!-- more -->

<small><i>Detta är instruktionen för kursmomentet och omfattar cirka **20 studietimmar**. Fokus ligger på uppgifter som du skall lösa och redovisa. För att lösa uppgifterna behöver du normalt jobba igenom övningar och läsanvisningar för att skaffa dig rätt kunskap och förståelse av uppgiftens alla delar. Läs igenom hela kursmomentet innan du börjar jobba.</i></small>



Uppgifter & Övningar {#uppgifter_ovningar}
-------------------------------------------

*(ca: 10-14 studietimmar)*

Uppgifter skall utföras och redovisas, övningar är träning inför uppgifterna.



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas.

1. Lös uppgiften "[Analysera PHP ramverk och välj ut ett att använda](uppgift/analysera-php-ramverk-och-valj-ut-ett-att-anvanda)".



### Övningar {#ovningar}

Följande övningar kan förbereda dig inför uppgiften.

1. I kursrepot under [`example/framework`](https://github.com/dbwebb-se/mvc/tree/main/example/framework) ligger exempelkod som visar hur du kommer igång med de olika ramverken och skapar egna vyer, routes och hur du publicerar till studentservern. Jobba igenom valda exempel, när du har valt vilket ramverk du tänker jobba med eller testa ett par olika för att utvärdera.

<!--

Pusha för övningen, exempelkoden som finns, gör den till en mer enhetlig applikation som skall fungera i varje ramverk och inkludera session, post, form, post/get, exception, , views, url, redirect, flash

Spela in video om hur man jobbar igenom övningen.

Lägg till Slim.

-->



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-8 studietimmar)*

<!--
Spela in föreläsning om de olika ramverken och deras ursprung.
Lite historik om ramverk.
Statistik.
Affärsmodeller kontra opensource.
-->

Läsanvisningarna berör följande olika ramverk.

* Symfony
* Laravel
* Yii
* Laminas

Läsresurserna är samlade längst ned i detta dokumentet under rubriken "Resurser bra-att-ha".



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa). Observera att denna kursen skiljer sig från hur du normalt sett lämnar in din redovisningstext.

Se till att följande frågor besvaras i texten i din rapport:

* Berätta hur du tog dig an uppgiften och valde bland ramverken, vad lät du styra dina val och vilka ramverk valde du bland och vad gjorde att du slutligen valde ditt ramverk?

* När du kom in i ramverket och började installerade det, hur gick det? Var dokumentationen stöttande och kändes terminologin bekant sedan tidigare?

* Vilka delar och hur mycket av din föregående kod, utvecklingsmiljö och testfall lyckades du porta till ramverket och fanns det svårigheter i det arbetet?

* Vilka är dina viktigaste lärdomar från det ramverket du valde? Fundera gärna på dokumentationen, hur det gick att installera och komma igång och om det krävdes en högs tröskel innan du kunde skapa din första webbsida.

* Vilken är din TIL för detta kmom?



Resurser bra-att-ha {#resurser}
---------------------------------

Här anges övriga resurser som kan användas för vidare studier i det som kursmomentet omfattar.



### Symfony {#symfony}

Resurser för Symfony.

* [Wikipedia](https://en.wikipedia.org/wiki/Symfony)
* [Webbplats](https://symfony.com/)
* [Dokumentation](https://symfony.com/doc/current/index.html)
* [GitHub organisation](https://github.com/symfony)
* [Git repo](https://github.com/symfony/symfony)
* [Fabien Potencier](http://fabien.potencier.org/about.html)

Symfony utvecklades ursprungligen av Fabian Potencier och det är han som nu leder det franska företaget SensioLabs som står bakom ramverket.

Symfony är ett modulärt ramverk som har funnits länge, är "komplett" med många moduler och tillval.

Detta kan vara standardvalet för uppgiften, om du inte riktigt vet vad du skall välja.



### Laravel {#laravel}

Resurser för Laravel.

* [Wikipedia](https://en.wikipedia.org/wiki/Laravel)
* [Webbplats](https://laravel.com/)
* [Dokumentation](https://laravel.com/docs/)
* [GitHub organisation](https://github.com/laravel)
* [Git repo](https://github.com/laravel/laravel)
* [Taylor Otwell](https://twitter.com/taylorotwell)

Taylor Otwell är skaparen bakom Laravel och hand är bosatt i staten Arkansas i USA.

Laravel bygger på Symfony i botten och lägger till ett ett lager av syntaktsiskt socker som är tänkt att låta programmeraren skriva enklare kod.

Om du vill ha ett ramverk med extra-allt och du gillar ett lager av syntaktiskt socker, då är detta valet för dig.



### Yii framework {#yii}

Resurser för Yii framework.

* [Wikipedia](https://en.wikipedia.org/wiki/Yii)
* [Webbplats](https://www.yiiframework.com/)
* [Dokumentation](https://www.yiiframework.com/doc/guide/2.0/en)
* [GitHub organisation](https://github.com/yiisoft)
* [Git repo](https://github.com/yiisoft/yii2)
* [Alexander Makarov: De tidiga åren](https://en.rmcreative.ru/blog/the-history-of-yii-framework/)

Yii har sitt ursprung i kinesiska och ryska utvecklare och Alexander Makarov är en av ramverkets utvecklare.

Yii är ett komplett ramverk och allt finns inkluderat.

Nuvarande versionen har några år på nacken och kanske ser vi inte uppenbara spår av de senaste PSR standarderna eller modulariteten, även om Yii deltar i PHP-FIG. Men manualen är bra och ramverket ser ut lite "som ramverk såg ut för 5 år sedan".



### Laminas {#laminas}

Resurser för Laminas.

<!--
https://discourse.laminas.dev/
-->

* [Wikipedia](https://en.wikipedia.org/wiki/Laminas)
* [Webbplats](https://getlaminas.org/)
* [Dokumentation](https://docs.laminas.dev/)
* [GitHub organisation](https://github.com/laminas)
* [Git repo](https://github.com/laravel/laravel)
* [Andi Gutmans](https://en.wikipedia.org/wiki/Andi_Gutmans) and [Zeev Suraski](https://en.wikipedia.org/wiki/Zeev_Suraski)

Andi Gutman och Zeev Suraski är två israelier som byggde PHP 3 och PHP 4 och samtidigt startade företaget Zend som varit drivande inom PHP sedan dess.

Inom Lamina projektet finns bland annat [`mezzio`](https://github.com/mezzio/mezzio) som ger en bas till den som gärna vill komponera sitt eget ramverk enligt PSR standarder och välja bland komponenter, även från externa leverantörer.


<!--
### Slim {#slim}

Resurser för Slim.
-->
