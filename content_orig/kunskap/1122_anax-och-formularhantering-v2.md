---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1 v2
revision:
    "2019-12-09": "(C, mos) Genomgången, mindre justeringar i text."
    "2018-12-10": "(B, mos) Uppdaterad till kursen ravmerk1 v2."
    "2017-08-24": "(A, mos) Första utgåvan."
...
Anax och formulärhantering (v2)
==================================

[FIGURE src=image/snapht17/htmlform-login.png?w=c5&cf&a=0,50,40,0 class="right"]

Vi skall se hur man kan jobba med formulär på ett sätt med klasser och integrerat i ett ramverk. Vi skall använda modulen `anax/htmlform` och se hur man kan integrera och använda den.

Det handlar om hur man kan jobba effektivare med forumlärhantering.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du är väl bekant i hur du jobbar i ramverket Anax motsvarande kursen ramverk1 v2.



Den korta varianten {#kort}
--------------------------------------

Artikeln visar hur man installerar och kommer igång med modulen [`anax/htmlform`](https://github.com/canax/htmlform) som skall hjälpa oss med att automatisera hanteringen av formulär.



Scaffolda en installation av Anax {#initanax}
--------------------------------------

Jag börjar med att scaffolda fram en tom webbplats med kommandot `anax`. Jag behöver en installation av Anax där jag kan integrera modulen.

```text
# Gå till kursrepot
cd me/kmom06/
anax create form ramverk1-me-v2
cd form
```

Öppna din webbläsare mot `htdocs` för att kontrollera att webbplatsen fungerar.



En modul för formulärhantering {#anaxhtmlform}
--------------------------------------

Då kan vi installera installera modulen `anax/htmlform`. 

```bash
# Du står i installationen av Anax du nyss skapade
composer require anax/htmlform
```

För att bekanta oss med modulen så öppnar vi webbläsaren mot modulens katalog `vendor/anax/htmlform/htdocs` och vi testar exemplen i `htdocs/formmodel`.

Innan vi kan köra exemplen så behöver vi installera modulens utvecklingsmiljö.

```bash
# Gå till vendor/anax/htmlform
composer install
```

Så här ser exemplet ut för `htdocs/formmodel/login.php`.

[FIGURE src=image/snapht17/htmlform-login.png?w=w3 caption="Ett login formulär via modulen `anax/htmlform`."]

Modulen `anax/htmlform` hjälper oss att skapa HTMLformulär och hanterar postning av formulär, validering av postad data och ompostning vid valideringsfel. Modulen ger en bestämd struktur i hur man jobbar med formulär. Tanken är att det kan tjäna tid och programmeringsrader samt erbjuda en god kodstruktur, när man väl lärt sig att använda modulen.

Bekanta dig med ett par andra av de exempelprogram som ligger i katalogen `htdocs/formmodel/`.



Kika på hur exemplet är uppbyggt {#htmlformexempel}
--------------------------------------

Låt oss kika på exemplet för login och se hur koden är uppbyggd. Gör följande steg för att kika på koden.



### Rita upp formuläret {#render}

Börja i webbsidan som är `htdocs/formmodel/login.php`. Du ser där en referens till vilken klass som används.

Den viktiga koden är följande.

```php
$form = new FormModelLogin($di);
$form->check();
```

Vi kan ignorera metoden `$form->check()` så länge. När vi öppnar sidan första gången så är det en GET-request och metoden jobbar enbart när ett formulär är postat och requestmetoden är POST.

Vi kan se hur webbsidan renderas, och speciellt formuläret.

Det är följande konstruktion i `login.php` som renderar sidan.

```php
require __DIR__ . "/../incl/renderPage.php";
```

Kikar vi i den template-filen så ser vi att hela formulärhanteringen döljs i följande konstruktion.

```html
<?= $form->getHTML() ?>
```

Det är den metoden som renderar html-koden för formuläret.



### En modell-klass för formulär {#formmodel}

Låt oss studera koden för klassen `FormModelLogin`, eller `\Anax\HTMLForm\FormModelLogin` om vi använder dess hela namespace.

```php
$form = new FormModelLogin($di);
```

Du finner koden i `vendor/anax/htmlform/src/HTMLForm/FormModelLogin.php`.

Du kan se att klassen använder sig av `$di`. Det innebär att du har tillgång till ramverkets tjänster när du jobba med dessa formulär.

Du kan se att konstruktorn skapar ett formulär genom att ange en struktur för formuläret i en array.

```php
class FormModelLogin extends FormModel
{
    /**
     * Constructor injects with DI container and creates the form.
     *
     * @param Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di)
    {
        parent::__construct($di);

        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "User Login"
            ],
            [
                "user" => [
                    "type"        => "text",
                    //"description" => "Here you can place a description.",
                    //"placeholder" => "Here is a placeholder",
                ],
                        
                "password" => [
                    "type"        => "password",
                    //"description" => "Here you can place a description.",
                    //"placeholder" => "Here is a placeholder",
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Login",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }
}
```

Vi jobbar alltså med formulären som en array-struktur. Varje formulärelement kan skapas som ett array-element.

Du kan se att formuläret innehåller en submit-knapp som har en callback `callbackSubmit()` som anropas när formuläret är postat. Den metoden blir ansvarig för att ta hand om det postade formuläret. I den metoden kan du verifiera att det postade formulärets innehåll är korrekt och till exempel spara informationen i en databas.

Metoden `callbackSubmit()` skall returnera `true` om allt gick bra och `false` om du av någon anledningen inte väljer att inte acceptera det postade formulärets data.

```php
/**
 * Callback for submit-button which should return true if it could
 * carry out its work and false if something failed.
 *
 * @return boolean true if okey, false if something went wrong.
 */
public function callbackSubmit()
{
    // Validate incoming form data and do something with it.
    // Return true if okey.
    // Return false when you do not accept the posted form.
}
```

Om du studerar hur klassen `FormModelLogin` skapas så ser du att den ärver från en basklass `extends FormModel`.

```php
namespace Anax\HTMLForm;

use Psr\Container\ContainerInterface;

/**
 * Example of FormModel implementation.
 */
class FormModelLogin extends FormModel
{
    
}
```

Vi kan anta att klassen `FormModel` döljer en basstruktur som vi återanvänder i den specifika klassen `FormModelLogin`.

Basklassen kan vi studera via `vendor/anax/htmlform/src/HTMLForm/FormModel.php`. Kika snabbt på den. Du ser metoderna `check()` som används för att kontrollera om formuläret är postat och `getHTML()` som renderar html-koden för formuläret.

Du ser också två metoder `callbackSuccess()` och `callbackFail()`. Om `callbackSubmit()` returnerar `true` så anropas `callbackSuccess()` och om returvärdet är `false` så anropas `callbackFail()`. I exempelkoden har dessa båda metoder samma implementation som gör en redirect till formulärsidan. I verkligheten kanske du vill att den ena (`false`) skall gå tillbaka till formulärsidan och den andra (`true`) skall skickas vidare till en annan resultatsida.

Vi kan också se att klassen `FormModel` använder sig av klassen `Form`. Det är arbetshästen bakom formulärhanteringen. Men den behöver vi inte bry oss om, den döljs av det API som `FormModel` erbjuder.

Det är mycket kod att greppa och formulärhanteringen verkar vara väldigt specifik för modulen. Modulen styr vårt arbetssätt, den är _opiniated_ och har en bestämd åsikt hur man jobbar med formulär.

Vi går vidare för att få grepp om vad som händer och hur detta fungerar.



Ett eget formulär i Anax {#egetformanax}
--------------------------------------

Vi har sett hur ett formulär fungerade i modulens egna exempel. Men hur kan vi integrera detta i vårt Anax?

Säg att vi vill göra ett login-formulär likt det vi såg i modulens egna exempel. Eller ett formulär för att skapa en användare? Hur kan vi göra det?



### Scaffolda en kontroller {#htmlformkontroller}

Vi behöver en kontroller som hanterar routes för vår blivande modellklass för formuläret.

Vi gör det enkelt för oss och scaffoldar fram en kontroller-klass som vi kan utgå ifrån.

```bash
# Ställ dig i roten av ditt exempel
anax create src/User ramverk1-controller-v2
```

Vi scaffoldar en kontroller-klass i katalogen `src/User` genom att använda mallen `ramverk1-controller-v2`. Du ombedas att skriva in namespace för klassen och klassens namn. Därefter automatgenereras klassen, den _scaffoldas_ fram.

Mitt namespace blev `Mos\User` och klassens namn blev `UserController`. Jag skriver in mitt namespace med dubbla backslash, jag behöver escapa backsalsh-tecknet.
 
Så här kan det se ut.

[ASCIINEMA src=216186]

Filen som skapades ligger i `src/User/UserController.php`. Kika på vad den innehåller.

Gör du fel första gången så kan du göra om det. Du kan lägga till optionen `-f` så skrivs kontrollerfilen över med ny information.

[INFO]

Glöm inte att ditt vendor-namespace måste kännas igen av `composer.json`, annars hittas den inte av autoloadern.

[/INFO]

I katalogen `src/User/` ligger en katalog `.anax`. Det är en rest från scaffoldingprocessen som du kan ta bort.



### Montera kontrollerklassen i routern {#skaparoutes}

Vi behöver lägga till kontrollern i routern. Vi skapar en route-fil i `config/router` och döper den till `100_user-controller.php`.

```php
/**
 * Mount the controller onto a mountpoint.
 */
return [
    "routes" => [
        [
            "info" => "User controller.",
            "mount" => "user",
            "handler" => "\Mos\User\UserController",
        ],
    ]
];
```

Du kan dubbelkolla att du nu kan öppna routen för `htdocs/user`.

Det kan se ut så här.

[FIGURE src=image/snapht18/ramverk1-scaffold-controller.png?w=w3 caption="En scaffoldad kontroller som visar ett kort meddelande så vi ser att det fungerar."]

Nu kompletterar vi med formulärklasserna.



### Scaffolda formulärklassen UserLoginForm {#htmlformscaffold}

För att exemplet skall fungera så behöver vi lägga till en formulärklass, ja, egentligen två stycken. En för login-formuläret och en för user-create-formuläret.

Låt oss scaffolda fram modellklasser för formulären.

Vi börjar med klassen `UserLoginForm` och jag fortsätter med min egen vendor och placerar klassen i namespace `Mos\User\HTMLForm`.

```bash
# Stå i roten av form-katalogen
anax create src/User/HTMLForm ramverk1-form-model-small-v2
```

Så här ser det ut hos mig.

[ASCIINEMA src=216189]

Klassfilen skapas i katalogen `src/User/HTMLForm`. Kika på koden som genereras.

Tanken är nu att din kontroller `UserController` och dess metod `loginAction()` skall använda sig av det nyskapade formuläret `UserLoginForm`.

Du kommer behöva ändra din konstruktion för `use VendorName\...\UserLoginForm`, överst i kontroller-filen, så den matchar ditt valda namespace för formulärklassen.

Nu kan du prova och se om routen `htdocs/user/login` fungerar i din webbläsare.

Det kan se ut så här.

[FIGURE src=image/snapht18/ramver1-form-login.png?w=w3 caption="En kontroller som visar en form modell för login."]



### Scaffolda formulärklassen CreateUserForm {#scaffoldCreateUserForm}

Då kan du göra samma sak igen för att skapa klassen `CreateUserForm`. I detta fallet använder vi en annan template för scaffoldingen, men principen är densamma.

```bash
# Stå i roten av form-katalogen
anax create src/User/HTMLForm ramverk1-form-model-large-v2 -f
```

Du använder samma namespace som till förra formuläraklassen, i mitt fall blir det `Mos\User\HTMLForm`. Klassen döper du till `CreateUserForm`.

Det kan se ut så här.

[ASCIINEMA src=216190]

Tänk på att en scaffoldad klass är en grundstruktur som troligen behöver modifieras. Om du använda andra klassnamn och/eller namespace så kan du behöva ändra i de klasser som scaffoldats fram.

[FIGURE src=image/snapht18/ramverk1-form-create-user.png?w=w3 caption="Så här ser skapa-sidan ut när den fungerar, ett stort antal alternativ för formulärelement att välja bland."]

Det ser inte riktigt ut som en skapa-användare sida. Det är mer en samling av alla varianter av HTML formulärelement som finns. Men med hjälp av dem kan vi säkert skapa ett eget formulär som innehåller exakt det vi vill.

Du bör nu ha ett fullt fungerande exempel, kontrollera via din webbläsare att routerna `user/`, `user/login` och `user/create` fungerar och presenterar var sin webbsida. Pröva att klicka på respektive "Submit" och se att formuläret postas och det postade resultatet visas allra längst ned. 

Fungerare det ej? Följ felmeddelandena och se om du kan lösa det. Det kan du säkert. Annars be om hjälp.



Hur fungerar formulärhanteringen? {#formfunkar}
--------------------------------------

Låt oss följa flödet i de scaffoldade klasserna och se om vi kan bringa klarhet i hur formulärklasserna fungerar tillsammans med kontrollern.

Vi håller oss till formuläret för `user/login` och går igenom det steg för steg.



### Formulärets metoder {#controllcallback}

Vi börjar i kontroller-klassen. Det som är intressant ur formulärets perspektiv är kodraderna där `$form` används.

```php
$form = new UserLoginForm($this->di);
$form->check();

$page->add("anax/v2/article/default", [
    "content" => $form->getHTML(),
]);
```

Det första vi behöver är en klass `$form` som skapas utifrån den formulärklass vi vill använda, i detta fallet `UserLoginForm`.

Sedan anropar vi metoden `$form->check()` som är en arbetshäst som kontrollerar om formuläret var postat. Om det inte var postat så returnerar metoden direkt, utan att göra något.

Avslutningsvis hämtar vi html-koden för formuläret, via `$form->getHTML()`, och vi placerar den i en vy för senare rendering.



### GET user/login {#get-userlogin}

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



### POST user/login {#post-userlogin}

Vid nästa sidladdning säger vi att användaren klickar på login-knappen och formuläret submittas via en POST-request.

Målet är att hamna i callback-metoden för formuläret och där kontrollera om användaren kan logga in.

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



### POST user/login misslyckas {#post-userlogin-fail}

Om användaren har skrivit in fel uppgifter och misslyckas med inloggningen så händer istället följande.

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

Här är det `submitCallback()` som upptäcker att användaren inte kan logga in och returnerar `false` vilket leder till anrop till `callbackFail()` som gör en redirect till `redirectSelf()`.



### POST user/login validering misslyckas {#post-userlogin-valfail}

Det kan också hända att formulärets egna validering misslyckas. Det är en del som utförs innan callbacken `submitCallback()` anropas.

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

En automatisk validering på formulärets element kan göra att man inte behöver skriva lika mycket kod i metoden `submitCallback()`. Man kan till viss del förutsätta att värdena matchar de regler man satt upp. Till exempel kan valideras att en epost-adress har ett format som matchar en verklig epost-adress.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har sett hur modulen `anax/htmlform` fungerar och hur den kan integreras i Anax som en modell-klass för formulärhantering.

Det finns definitivt en viss tröskel innan en programmerare känner sig bekväm och produktiv i strukturen som artikeln behandlar. Grundtanken är att minska antalet kodrader som behövs skrivas och att få en känd och tillförlitlig struktur på koden. I längden kan det underlätta produktion av kod som är av det enklare slaget, till exempel CRUD-baserad formulärhantering.

Finns det alternativa sätt att göra detta, integrera formulärhanteringen in i ett ramverk? Det finns det säkert.

Låt oss nu använda detta sättet och utvärdera efterhand som vi blir klara på dess för- och nackdelar.

Denna artikel har en [egen forumtråd](t/6728) som du kan ställa frågor i, eller bidra med tips och trix.
