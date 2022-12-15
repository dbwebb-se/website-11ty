---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1
revision:
    "2017-08-24": "(A, mos) Första utgåvan."
...
Anax och formulärhantering
==================================

[FIGURE src=image/snapht17/htmlform-login.png?w=c5&cf&a=0,50,40,0 class="right"]

Vi skall se hur vi kan använda externa klasser för att göra vår ramverkskod mer potent att lösa avancerade saker med mindre rader kod. Troligen blir det inte mindre rader kod som helhet dock, men förhoppningsvis blir det färre rader som vi själva behöver skriva.

Vi skall titta på formulärhantering och hur man kan lösa CRUD formulär i Anax. Kodstrukturen samlar formulärhanteringen i kontroller och modell-klasser med hjälp av modulen `anax/htmlform`.

<!--more-->

Som vanligt funderar vi och utvärderar efter hand samt förbättrar vår befintliga kodstruktur via refactoring.



Förutsättning {#pre}
--------------------------------------

Du har läst artikeln "[Anax med Dependency Injection](kunskap/anax-med-dependency-injection)" och artikeln "[Att konfigurera routern i Anax](kunskap/att-konfigurera-routern-i-anax)".



Glöm inte `.htaccess` {#htaccess}
--------------------------------------

Glöm inte att redigera din `.htaccess` när du publicerar till studentservern.



En tom Anax {#initanax}
--------------------------------------

När jag jobbar i denna artikeln vill jag ha en tom webbplats att leka med så jag använder kommandot `anax` för att scaffolda en grundstruktur som bygger på Anax och DI tillsammans med de uppgraderade router-konfigurationen.

```bash
# Gå till kursrepot
cd me/kmom04/
anax create anax4/ ramverk1-route
cd anax4
```

Öppna din webbläsare mot `htdocs` för att kontrollera att webbplatsen fungerar. Kontrollera att routen `htdocs/debug/info` också fungerar.



###Sessionen startar alltid {#session-always}

I mallen `ramverk1-route` har jag valt att alltid aktivera tjänsten `session`. Det är i sammanhanget av formulär som jag valde att det var bästa platsen att aktivera sessionen på. Sessionen är numer alltid aktiv vid varje sidrequest.

Du kan se uppdateringen i `config/di.php` där sessionen görs till `"active" => true` vilket leder till att tjänsten alltid startas direkt. Just denna tjänst laddas då inte som "lazy-loading".

```php
"session" => [
    "shared" => true,
    "active" => true,
    "callback" => function () {
        $session = new \Anax\Session\SessionConfigurable();
        $session->configure("session.php");
        $session->start();
        return $session;
    }
],
```

Det finns säkert andra vägar att gå här, men för mitt exempel blev detta valet.



###Uppdaterad response-klass {#resp-upgr}

En annan uppdatering som finns i mallen `ramverk1-route` är en ny variant av `response`. Här kan du se hur den tjänsten numer skapas i `config/di.php`.

```php
"response" => [
    "shared" => true,
    //"callback" => "\Anax\Response\Response",
    "callback" => function () {
        $obj = new \Anax\Response\ResponseUtility();
        $obj->setDI($this);
        return $obj;
    }
],
```

Varför blev det så? Varför göra klassen beorende av `$di`?

Jo, det har dels med att jag använder mindre och mindre av `$app` och jag behöver en plats att samla metoder för `redirect($url)` och `redirectSelf()`. Tidigare använde jag `$app` som en bra-att-ha plats för dessa metoder. Metoderna är beroende av flera tjänster (`response`, `url`, `request`) för att kunna fungera. Så var lägger man dem bäst?

Mitt val blev att utöka klassen `Anax\Request\Request` och implementera en subklass `Anax\Request\RequestUtility` som blir beroende av `$di` och erbjuder en enklare väg att göra `redirect($url)` och `redirectSelf()` i min kod. Dessa båda metoder används en hel del i formulärhantering.

Den formulärkod vi nu skall använda är beroende av dessa metoder och `RequestUtility`.

Samma teknik kan du själv använda för att utöka befintliga klasser i ramverket med egna utility metoder.



Ett formulärexempel {#formularex}
--------------------------------------

Vi börjar med att installera modulen `anax/htmlform` som skall hjälpa oss med formulärhanteringen. När det är gjort så detaljstuderar vi deras exempel för att försöka greppa hur det fungerar.



###Installera anax/htmlform {#installhtmlform}

Det första vi behöver är en Anax modul för HTML formulär, `anax/htmlform` och vi installerar den så här.

```bash
# Du står i anax4
composer require anax/htmlform
```

För att bekanta oss med modulen så öppnar vi webbläsaren mot modulens katalog `vendor/anax/htmlform/htdocs` och vi testar exemplen i `htdocs/formmodel`.

Så här ser exemplet ut för `htdocs/formmodel/login.php`.

[FIGURE src=image/snapht17/htmlform-login.png?w=w2 caption="Ett login-formulär via modulen `anax/htmlform`."]

Modulen `anax/htmlform` hjälper oss att skapa HTMLformulär och hanterar postning av formulär, validering av postad data och ompostning vid valideringsfel. Modulen ger en bestämd struktur i hur man jobbar med formulär. Tanken är att det kan tjäna tid och programmeringsrader samt erbjuda en god kodstruktur, när man väl lärt sig att använda modulen.



###Kika på hur exemplet är uppbyggt {#htmlformexempel}

I modulen `anax/htmlform` är det flexibelt hur man väljer att skapa sina formulär, man kan använda arrayer tillsammans med callbacks eller klasser med metoder. Vi skall titta närmare på de exempel som använder klasser för att hantera formulär som skapas utifrån en array-struktur. Vi skall titta specifikt på konstruktionen att ärva från klassen `\Anax\HTMLForm\FormModel`.

För att studera hur exemplet är uppbyggt kan du gå baklänges och kika på koden.

Börja i webbsidan som är `htdocs/formmodel/login.php`. Du ser där en referens till vilken klass som används.

```php
$form = new \Anax\HTMLForm\FormModelLogin($di);
$form->check();
```

Öppna klassen `\Anax\HTMLForm\FormModelLogin` som du finner i `vendor/anax/htmlform/src/HTMLForm/FormModelLogin.php`.

Du kan se att klassen använder sig av `$di`.

Du kan se att konstruktorn skapar ett formulär genom att ange en struktur för formuläret i en array.

Du finner också att formuläret innehåller en submit-knapp som har en callback `callbackSubmit()` som anropas när formuläret är postat. Den metoden blir ansvarig för att ta hand om det postade formuläret och kan göra ytterligare valideringerar. Metoden skall returnera `true` om allt gick bra och `false` om du av någon anledningen inte väljer att inte acceptera det postade formulärets data.

Om du studerar hur klassen `FormModelLogin` skapas så ser du att den ärver från en basklass `extends FormModel`.

```php
namespace Anax\HTMLForm;

use \Anax\DI\DIInterface;

/**
 * Example of FormModel implementation.
 */
class FormModelLogin extends FormModel
```

Vi kan anta att klassen `FormModel` döljer en basstruktur som vi återanvänder i den specifika klassen `FormModelLogin`.

Basklassen kan vi studera via `vendor/anax/htmlform/src/HTMLForm/FormModel.php`. Det du ser är en basklass som ligger som ett skal framför klassen `Form` som är arbetshästen i modulen. Tanken är att modell-klassen skall erbjuda ett enklare sätt att jobba med formulär på ett sätt som passar i en MVC-struktur.

Det är mycket kod att greppa och formulärhanteringen verkar vara specifik för modulen så vi går vidare för att få grepp om vad som händer.



Ett eget formulär i Anax {#egetformanax}
--------------------------------------

Vi har sett hur ett formulär fungerade i modulens egna exempel. Men hur kan vi integrera detta i vårt Anax?

Säg att vi vill göra ett login-formulär likt det vi såg i modulens egna exempel. Eller ett formulär för att skapa en användare? Hur kan vi göra det?



###Scaffolda en kontroller {#htmlformkontroller}

Vi behöver en kontroller som hanterar routes för login/skapa-sidan.

Vi gör det enkelt för oss och scaffoldar fram en kontroller-klass som vi kan utgå ifrån.

```bash
# Ställ dig i anax4
anax create src/User ramverk1-controller
```

Vi vill scaffolda en kontroller-klass i katalogen `src/User` genom att använda mallen `ramverk1-controller`. Du kommer ombedas att skriva in namespace för klassen och klassens namn. Därefter automatgenereras klassen, den _scaffoldas_ fram. Mitt namespace blev `Anax\User` och klassens namn blev `UserController`.

Det kan se ut så här. Gör du fel första gången så kan du göra om det.

[ASCIINEMA src=133724]

FIlen som skapades ligger alltså i `src/User/UserController.php`. Kika på vad den innehåller.



###Lägg till kontrollern som en tjänst i di {#add-as-service}

Nu har vi en struktur på kontroller-klassen att utgå ifrån. Men kom ihåg, det är en scaffoldad struktur som behöver ses över och redigeras.

Nu när vi har kontroller-klassen så behöver vi lägga till den som en tjänst i ramverket och injecta `$di` i den. Tjänsten kan skapas så här i `config/di.php`.

```php
"userController" => [
    "shared" => true,
    "callback" => function () {
        $obj = new \Anax\User\UserController();
        $obj->setDI($this);
        return $obj;
    }
],
```

Nu finns tjänsten `userController` som en del i ramverket.



###Skapa routes till kontrollerklassen {#skaparoutes}

Vi lägger nu till de routes vi vill använda i kontroller-klassen. Vi börjar med att skapa en route-fil i `config/route2/userController.php`.

```php
<?php
/**
 * Routes for user controller.
 */
return [
    "routes" => [
        [
            "info" => "User Controller index.",
            "requestMethod" => "get",
            "path" => "",
            "callable" => ["userController", "getIndex"],
        ],
        [
            "info" => "Login a user.",
            "requestMethod" => "get|post",
            "path" => "login",
            "callable" => ["userController", "getPostLogin"],
        ],
        [
            "info" => "Create a user.",
            "requestMethod" => "get|post",
            "path" => "create",
            "callable" => ["userController", "getPostCreateUser"],
        ],
    ]
];
```

Du ser routes till en index-sida och två sidor med tänkt formulärhantering i form av ett login och ett för att skapa en användare. Notera att route-hanteraren för formulärsidorna svarar på både `get|post`. När formuläret visas första gången så är det en GET-request och när formuläret postas så är det en POST-request. Formuläret postar alltså sig själv till samma route som det utgick ifrån, ett så kallat "self-submitting" formulär.

Avslutningsvis inkluderar vi vår route-fil i routerns generella konfigurationsfil som i sammanhanget är `config/route2.php`.

```php
[
    // Add routes from userController and mount on user/
    "mount" => "user",
    "file" => __DIR__ . "/route2/userController.php",
],
```

Du ser att vi monterar alla routes under `user/` så länken till sidorna blir `user/`, `user/login` och `user/create`.

Kontroller-delen är klar, som en tjänst i ramverket och routes som leder till kontrollerns metoder.

Nu kompletterar vi med formulärklasserna.



###Scaffolda formulärklasser {#htmlformscaffold}

För att exemplet skall fungera så behöver vi lägga till en formulärklass, ja, egentligen två stycken. En för login-formuläret och en för user-create-formuläret.

Låt oss scaffolda fram modell-klasser för formulären.

Vi börjar med klassen `UserLoginForm`.

```bash
# Stå i anax4
anax create src/User/HTMLForm ramverk1-form-model-small
```

Klassfilen kommer att skapas i katalogen `src/User/HTMLForm` och mallen är `ramverk1-form-model`. Jag anger namespace `Anax\User\HTMLForm` och klassens namn `UserLoginForm` när scaffold ber mig om det.

Sen får du göra samma sak en gång till för att skapa klassen `CreateUserForm` men utgå då istället från mallen `ramverk1-form-model-large`, så här.

```bash
# Stå i anax4
anax create src/User/HTMLForm ramverk1-form-model-large -f
```

Du använder samma namespace och klassens namn blir `CreateUserForm`.

Det kan se ut så här.

[ASCIINEMA src=134598]

Tänk på att en scaffoldad klass är en grundstruktur som troligen behöver modifieras. Om du använda andra klassnamn och/eller namespace så kan du behöva ändra i de klasser som scaffoldats fram.

Det är en god tanke att nu öppna de modell-klasser du scaffoldat för formulärhanteringen. Bekanta dig översiktligt med koden och se hur den hänger ihop. Studera hur kontrollern är kopplad till modell-klasserna.

Du bör nu ha ett fullt fungerande exempel, kontrollera via din webbläsare att routerna `user/`, `user/login` och `user/create` fungerar och presenterar var sin webbsida.

Fungerare det ej? Följ felmeddelandena och se om du kan lösa det. Det kan du säkert. Annars be om hjälp.

Så här kan det se ut.

[FIGURE src=image/snapht17/scaffolded-form-index.png?w=w2 caption="Så här ser index-sidan ut när den fungerar."]

Den sidan är rätt tom, du kan uppdatera dess innehåll via kontrollern och metoden `getIndex()`.

[FIGURE src=image/snapht17/scaffolded-form-login.png?w=w2 caption="Så här ser login-sidan ut när den fungerar."]

Vilken tur, det ser ut som en login-sida. Vi kan studera kontrollerns kod i metoden `getPostLogin()`.

[FIGURE src=image/snapht17/scaffolded-form-create.png?w=w2 caption="Så här ser skapa-sidan ut när den fungerar."]

Det ser inte riktigt ut som en skapa-användare sida. Det är mer en samling av alla varianter av HTML formulärelement som finns. Men med hjälp av dem kan vi säkert skapa ett eget formulär som innehåller exakt det vi vill.

Du kan följa koden via kontrollern `getPostCreateUser()` som använder sig av formulärklassen `Anax\User\HTMLForm\CreateUserForm` där formuläret skapas. I den klassen kan du studera callback-metoden som anropas när formuläret submittas. Där kan du se hur värdena på respektive formulärfält hämtas ut.



Hur fungerar formulärhanteringen? {#formfunkar}
--------------------------------------

Låt oss följa flödet i de scaffoldade klasserna och se om vi kan bringa klarhet i hur formulärklasserna fungerar tillsammans med kontrollern.

Vi håller oss till formuläret för `user/login` och går igenom det steg för steg.



###Kontroller-klass och routens hanterare {#controllcallback}

Vi börjar med att titta på kontroller-klassen och metoden `getPostLogin()`.

```php
/**
 * Description.
 *
 * @param datatype $variable Description
 *
 * @throws Exception
 *
 * @return void
 */
public function getPostLogin()
{
    $title      = "A login page";
    $view       = $this->di->get("view");
    $pageRender = $this->di->get("pageRender");
    $form       = new UserLoginForm($this->di);

    $form->check();

    $data = [
        "content" => $form->getHTML(),
    ];

    $view->add("default2/article", $data);

    $pageRender->renderPage(["title" => $title]);
}
```

Det som är specifikt för formulärhanteringen är följande rader.

```php
// Create an object of the form class and supply $di to it
$form       = new UserLoginForm($this->di);

// Check if the form was submitted, check if it validates and if so
// execute the submit-buttons callback-method.
$form->check();

// Add HTML-code to be used by the template file in the view.
$data = [
    "content" => $form->getHTML(),
];
```

Det första vi behöver är en klass `$form` som skapas utifrån den formulärklass vi vill använda, i detta fallet `UserLoginForm`.

Sedan anropar vi metoden `$form->check()` som är en arbetshäst som kontrollerar om formuläret var postat. Om det inte var postat så returnerar metoden direkt.

Avslutningsvis hämtar vi HTML-koden för formuläret som vi placerar i en vy.

Koden i kontrollern är densamma om formuläret visas för första gången eller om formuläret är postat vilket kan leda till en databasfråga.

Låt oss se vad som händer under skalet.



###GET user/login {#get-userlogin}

Första gången man kommer till routen `user/login` och hamnar i kontrollern så är det en GET-request.

Metoden `$form->check()` kommer då att upptäcka att formuläret inte är postat och returnerar omedelbart utan att göra något.

Nästa steg i koden blir att lägga till vyn med HTML-koden för formuläret och sidan renderas.

Ritar man en bild över det flödet kan det se ut så här.

[FIGURE src=img/snapht17/form-flow-not-submitted.svg caption="Första gången sidan och formuläret visas, formuläret är inte postat."]

Bilden visar de huvudsakliga punkterna i flödet.

<!--
msc {
    width="720";

    # The entities
    A, B, C, D; 
         
    # Small gap before
    |||;    
         
    # Boxes with labels
    A note A [ label = "Web browser" ],
    B box B [ label = "UserController" ],
    C box C [ label = "LoginForm" ],
    D box D [ label = "FormModel" ],

    |||;

    # Flow
    A -> B  [ label = "GET user/login" ];
    B => C  [ label = "create $form" ];
    B => D  [ label = "$form->check()" ];
    ---     [ label = "The form was not submitted" ];
    B <<= D [ label = "Returns without any action" ];
    B => D  [ label = "$form->getHTML()" ];
    A <- B  [ label = "Render the page" ];

    |||;
}
-->



###POST user/login {#post-userlogin}

Vid nästa sidladdning säger vi att användaren klickar på login-knappen och formuläret submittas via en POST-request. Målet är att hamna i callback-metoden för formuläret och där kontrollera om användaren kan logga in.

Om användaren kan logga in så gör vi en redirect till en sida, om användaren inte kan logga in så gör vi en redirect till den ursprungliga sidan. Så brukar det fungera.

En bild över flödet kan se ut så här när användaren lyckas logga in.

[FIGURE src=img/snapht17/form-flow-submitted.svg caption="Formuläret är postat och submit-callbacken anropades och användaren kunde logga in."]

<!--
msc {
    width="720";

    # The entities
    A, B, C, D; 
         
    # Small gap before
    |||;    
         
    # Boxes with labels
    A note A [ label = "Web browser" ],
    B box B [ label = "UserController" ],
    C box C [ label = "LoginForm" ],
    D box D [ label = "FormModel" ],

    |||;

    # Flow
    A -> B  [ label = "POST user/login" ];
    B => C  [ label = "create $form" ];
    B => D  [ label = "$form->check()" ];
    ---     [ label = "The form was submitted" ];
    D => D  [ label = "$form->submitCallback()" ];
    D => D  [ label = "$form->callbackSuccess()" ];
    A <= D  [ label = "$response->redirectSelf()" ];

    |||;
}
-->

Nu har `check()` koll på att det är en POST-request och att just detta formuläret är postat.

Vi ser att `submitCallback()` anropas och där kontrolleras att användaren kan logga in och metoden returnerar `true` vilket innebär att metoden `callbackSuccess()` tar över och gör en redirect till den ursprungliga sidan. Vill vi göra en redirect till en annan sida så får vi implementera metoden `callbackSuccess()` i klassen `LoginForm`.



###POST user/login misslyckas {#post-userlogin-fail}

Om vi tänker precis samma sak men att användaren har skrivit in fel uppgifter och kan inte logga in, då händer istället följande.

[FIGURE src=img/snapht17/form-flow-submitted-failed.svg caption="Formuläret är postat och submit-callbacken anropades och användaren kunde inte logga in."]

<!--
msc {
    width="720";

    # The entities
    A, B, C, D; 
         
    # Small gap before
    |||;    
         
    # Boxes with labels
    A note A [ label = "Web browser" ],
    B box B [ label = "UserController" ],
    C box C [ label = "LoginForm" ],
    D box D [ label = "FormModel" ],

    |||;

    # Flow
    A -> B  [ label = "POST user/login" ];
    B => C  [ label = "create $form" ];
    B => D  [ label = "$form->check()" ];
    ---     [ label = "The form was submitted" ];
    D => D  [ label = "$form->submitCallback()" ];
    D => D  [ label = "$form->callbackFail()" ];
    A <= D  [ label = "$response->redirectSelf()" ];

    |||;
}
-->

Här är det `submitCallback()` som upptäcker att användaren inte kan logga in och returnerar `false` vilket leder till anrop till `callbackFail()` som gör en `redirectSelf()`.



###POST user/login validering misslyckas {#post-userlogin-valfail}

Det finns ett specialfall när formulärets egna validering misslyckas. Det är en del som utförs innan callbacken `submitCallback()` anropas.

Valideringsfasen bygger på att formuläret kan innehålla valideringsregler som måste vara uppfyllda, annars kommer `check()` att direkt anropa `callbackFail()` som gör en redirect till formulärets ursprungliga sida. Där ritas formuläret upp tillsammans med de valideringsfel som finns och användaren ombeds att fylla i formuläret igen.

En bild över flödet kan se ut så här.

[FIGURE src=img/snapht17/form-flow-submitted-validate-failed.svg caption="Formuläret är postat men fälten validerar inte enligt de regler som är specificerade."]

<!--
msc {
    width="720";

    # The entities
    A, B, C, D; 
         
    # Small gap before
    |||;    
         
    # Boxes with labels
    A note A [ label = "Web browser" ],
    B box B [ label = "UserController" ],
    C box C [ label = "LoginForm" ],
    D box D [ label = "FormModel" ],

    |||;

    # Flow
    A -> B  [ label = "POST user/login" ];
    B => C  [ label = "create $form" ];
    B => D  [ label = "$form->check()" ];
    ---     [ label = "The form was submitted, validation fails" ];
    D => D  [ label = "$form->callbackFail()" ];
    A <= D  [ label = "$response->redirectSelf()" ];

    |||;
}
-->

En automatisk validering på formulärets element kan göra att man behöver skriva mindre kontrollkod i `submitCallback()` då man kan förutsätta att värdena matchar de regler man satt upp. Till exempel kan valideras att en epost-adress har ett format som matchar en verklig epost-adress.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har sett hur modulen `anax/htmlform` fungerar och hur den kan integreras i Anax som en modell-klass. Vi använder en basklass som styr upp hur vi skall jobba med formulärhanteringen.

Troligen har vi en viss tröskel innan en programmerare känner sig bekväm och produktiv i strukturen. Tanken är ju att vinna i antal kodrader som behövs skrivas, öka produktionshastigheten och kvaliteten på koden genom en struktur som är enkel att jobba i och lika enkel att underhålla och vidareutveckla.

Finns det alternativa sätt att göra detta, integrera formulärhanteringen in i ett ramverk? Det finns det säkert.

Låt oss nu använda detta sättet och utvärdera efterhand som vi blir klara på dess för- och nackdelar.

Denna artikel har en [egen forumtråd](t/6728) som du kan ställa frågor i, eller bidra med tips och trix.
