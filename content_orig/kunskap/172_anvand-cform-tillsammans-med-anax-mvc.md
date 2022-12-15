---
author: mos
category: php
revision:
  "2014-10-17": (B, mos) La till stycke om hur CForm installeras via composer.
  "2014-05-09": (A, mos) Första utgåvan i samband med kursen phpmvc-v2.
updated: "2014-10-17 15:52:26"
created: "2014-05-07 14:41:52"
...
Använd CForm tillsammans med Anax MVC
==================================

I ett ramverk som Anax MVC vill man inkludera andra moduler som till exempel `mos/cform`. Men hur gör man det på bästa sätt?

Här är ett exempel på flera alternativa vägar och dessutom blir det ett par exempel på hur du kan utöka ditt Anax MVC med en egen klass för `$app` som innehåller bra-att-ha metoder.

<!--more-->



Förutsättningar {#forutsatning}
------------------------------

Du har koll på [Anax MVC](kunskap/anax-som-mvc-ramverk) och [CForm](opensource/cform).

Koden som används i exemplet är en del av koden i Anax MVC och kan [studeras på GitHub](https://github.com/mosbth/Anax-MVC).



Installera med composer {#composer}
------------------------------

För att komma igång kan du installera [CForm via composer](opensource/cform#composer).

Så här kan det se ut när jag installerar både Anax MVC och CForm.

[ASCIINEMA src=13030]

Om du redan har använt composer på din installation så behöver du göra en update för att `composer` skall bry sig om ändringar du gjort i filen `composer.json`.

```bash
$ composer update --no-dev
```

Därefter bör du se att `CForm` installeras.



Exempel med CForm som en tjänst i Anax MVC {#di}
------------------------------

För att testa hur man kan integrera CForm med Anax MVC så skapar jag en ny frontcontroller, `webroot/cform.php`.



###Lägg till CForm som en tjänst {#tjanst}

Jag gör det enkelt för mig och lägger till CForm som en tjänst, överst i frontcontrollern.

```php
// Get environment & autoloader.
require __DIR__.'/config.php'; 

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

$di->set('form', '\Mos\HTMLForm\CForm');

$app = new \Anax\Kernel\CAnax($di);
```

Ett annat sätt är ju att utöka klassen `CDIFactoryDefault` och lägga tjänsten där. Ett tredje alternativ är att du skapar din egen `CDIFactory`. Det skulle kunna se ut så här.

```php
class CDIFactory extends CDIFactoryDefault
{
    public function __construct()
    {
        parent::__construct();

        $this->set('form', '\Mos\HTMLForm\CForm');
    }
}
```

På det sista sättet skapar du din egen factory-klass som återanvänder `CDIFactoryDefault`. Det är ett bra sätt att utvidga ramverket.



###Formulär som route {#formroute}

Jag tar och kopierar koden från ett av exemplen CForm och lägger in allt i routen. Det är en del kod som hamnar i routen, men det är också en hel del formulärhantering som skall platsa in.


```php
// Test form route
$app->router->add('test1', function () use ($app) {

    $form = $app->form->create([], [
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
            'callback'  => function ($form) {
                $form->AddOutput("<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>");
                $form->AddOutput("<p><b>Name: " . $form->Value('name') . "</b></p>");
                $form->AddOutput("<p><b>Email: " . $form->Value('email') . "</b></p>");
                $form->AddOutput("<p><b>Phone: " . $form->Value('phone') . "</b></p>");
                $form->saveInSession = true;
                return true;
            }
        ],
        'submit-fail' => [
            'type'      => 'submit',
            'callback'  => function ($form) {
                $form->AddOutput("<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>");
                return false;
            }
        ],
    ]);
```

Det var första delen som skapar själva formuläret och dess callback-funktioner för knapparna i formuläret.

Sedan kommer biten som testar om formuläret är postat eller ej och dirigerar om sidan till rätt plats beroende på formulärets status.

```php
    // Check the status of the form
    $status = $form->check();

    if ($status === true) {

        // What to do if the form was submitted?
        $form->AddOUtput("<p><i>Form was submitted and the callback method returned true.</i></p>");
        header("Location: " . $_SERVER['PHP_SELF']);
    
    } else if ($status === false) {
    
        // What to do when form could not be processed?
        $form->AddOutput("<p><i>Form was submitted and the Check() method returned false.</i></p>");
        header("Location: " . $_SERVER['PHP_SELF']);
    }
```

Till slut kommer sista biten av routen som placerar formulärets HTML-kod och ritar ut den i vyn.

```php
    $app->theme->setTitle("Welcome to Anax");
    $app->views->add('default/page', [
        'title' => "Try out a form using CForm",
        'content' => $form->getHTML()
    ]);

});
```

Som sagt, det blev en del kod. Så här ser det ut när jag kör exemplet och testar att posta det.

[FIGURE src=/image/snap/cform-anax-test1.png?w=w2 caption="Forumläret är self-submitting så det postar sig till samma route som visar det."]



Sätt på sessionen {#sess}
-------------------------------------

CForm använder sig av sessionen för att minnas de värden som skrivs in i formuläret. Det innebär att vi måste vara säkra på att sessionen är startad.

Att starta sessionen kan vi till exempel göra överst i routen, så här.

```php
// Test form route
$app->router->add('test1', function () use ($app) {

    $app->session(); // Will load the session service which also starts the session
```

Om du alltid vill använda sessionen så kan du göra anropet utanför alla routes. Direkt efter att du skapat `$app`. Då används alltid sessionen.

Notera gärna att det är den magiska metoden `__call()` som tar hand om anropet till `$app->session()`. Den finns definierad i [`Anax\DI\TInjectable`](https://github.com/mosbth/Anax-MVC/blob/master/src/DI/TInjectable.php). I detta fallet är alltså `$app->session` likvärdigt med `$app->session()`. Den första hanteras av `__get()` och den andra av `__call()`.

Testa ditt formulär igen så ser du att värdena i formuläret finns kvar när du postat formuläret, de lagras nu i sessionen under själva redirecten.



###Skicka vidare till resultatsidan på ramverkets vis {#vidare}

I koden ovan såg du att ett anrop till `header()` gjordes. Låt oss göra det anropet på ramverkets vis istället.

```php
header("Location: " . $_SERVER['PHP_SELF']);
```

ändrar vi till

```php
$app->redirectTo();
```

Men, egentligen är det inte så enkelt. Så här behöver du göra.

En vanlig redirect i ramverket skulle se ut så här.

```php
$url = $this->di->url->create($route);
$this->response->redirect($url);
```

Det är två rader kod, men vill du redirecta till nuvarande sida så behöver du göra så här istället.

```php
url = $this->di->request->getCurrentUrl();
$this->response->redirect($url);
```

För att lösa det så finns det en trait [`Anax\MVC\TRedirectHelpers`](https://github.com/mosbth/Anax-MVC/blob/master/src/MVC/TRedirectHelpers.php) som implementerar följande metod.

```php
/**
 * Redirect to current or another route.
 *
 * @param string $route the route to redirect to, 
 * null to redirect to current route, "" to redirect to baseurl.
 *
 * @return void
 */
public function redirectTo($route = null)
{
    if (is_null($route)) {
        $url = $this->di->request->getCurrentUrl();
    } else {
        $url = $this->di->url->create($route);
    }
    $this->response->redirect($url);
}
```

Det är alltså ett enklare sätt att göra en redirect, en så kallad *utility*-metod, eller på ren svenska, bra-att-ha-metod.

Vi sparar ett par kodrader för varje redirect nu, det gör så att den intensiva koden i kontroller och route-hanterare blir mindre. Det är bra.

Men, vi behöver en klass som använder traitet, `$app` som nu är `Anax\Kernel\CAnax` gör det inte. Men det finns en annan klass, [`Anax\MVC\CApplicationBasic`](https://github.com/mosbth/Anax-MVC/blob/master/src/MVC/CApplicationBasic.php) som gör det. Så det får bli den som blir min `$app` istället.

```php
$app = new \Anax\MVC\CApplicationBasic($di);
```

Så, nu kan vi köra på och göra `$app->redirectTo()` för att komma till nuvarande route. Smidigt. Samtidigt blev detta en lektion i hur du kan bygga ut ramverket med en egen klass för `$app` som innehåller utility-metoder.

Trait är en bra konstruktion för att skapa sådana här metoder, det gör koden enkel att återanvända i andra klasser. Du kommer se att jag flitigt använder detta trait i resten av artikeln.



Effektivisera koden som kontrollerar resultatet från `check()` {#effekt}
------------------------------

Det vanliga sättet att kontrollera formulärets status, är så här.

```php
// Check the status of the form
$status = $form->check();

if ($status === true) {

    // What to do if the form was submitted?
    $form->AddOUtput("<p><i>Form was submitted and the callback method returned true.</i></p>");
    //header("Location: " . $_SERVER['PHP_SELF']);
    $app->redirectTo();

} else if ($status === false) {

    // What to do when form could not be processed?
    $form->AddOutput("<p><i>Form was submitted and the Check() method returned false.</i></p>");
    //header("Location: " . $_SERVER['PHP_SELF']);
    $app->redirectTo();

}
```

Men, det kan effektiviseras genom att anropa metoden för `$form->check()` med två parametrar som är anropsbara metoder. Det kan se ut så här om man använder closures.

```php
// Check the status of the form
$form->check(
    function ($form) use ($app) {
    
        // What to do if the form was submitted?
        $form->AddOUtput("<p><i>Form was submitted and the callback method returned true.</i></p>");
        $app->redirectTo();

    },
    function ($form) use ($app) {

        // What to do when form could not be processed?
        $form->AddOutput("<p><i>Form was submitted and the Check() method returned false.</i></p>");
        $app->redirectTo();

    }
);
```

Blev det bättre? Tja, det beror på vilken kodstil man föredrar. Men, vi kan definiera två funktioner som kan anropas istället. Då blir det mindre kod i route-hanteraren och vi får två separata funktioner som utför jobbet.

Så här kan det se ut.

```php
$callbackSuccess = function ($form) use ($app) {
    // What to do if the form was submitted?
    $form->AddOUtput("<p><i>Form was submitted and the callback method returned true.</i></p>");
    $app->redirectTo();
};

$callbackFail = function ($form) use ($app) {
        // What to do when form could not be processed?
        $form->AddOutput("<p><i>Form was submitted and the Check() method returned false.</i></p>");
        $app->redirectTo();
};


// Check the status of the form
$form->check($callbackSuccess, $callbackFail);
```

Tanken är att dessa funktioner ligger någon annanstans och resultaten blir att koden i varje route blir mindre och *möjligen* enklare att läsa.

Du kan se all exempel-kod i ett sammanhang av frontkontrollern [`webroot/cform.php`](https://github.com/mosbth/Anax-MVC/blob/master/webroot/cform.php).

Samma princip kan vi använda på de två callbacks som är definierade till submit-knapparna, de behöver inte definieras i arrayen utan kan definieras som en extern funktion, eller en metod i en klass.

En klass sa du? Hur ser detta ut om man skulle göra samma sak i en klass som en kontroller?



En kontroller med ett formulär {#kontroller}
------------------------------

Låt oss testa att flytta över koden till en kontroller-klass och se hur den ser ut i det sammanhanget, kan vi få snygg kod?

Först skapar jag en ny kontroller i `$di`.

```php
$di->set('FormController', function () use ($di) {
    $controller = new \Anax\HTMLForm\FormController();
    $controller->setDI($di);
    return $controller;
});
```

Sedan lägger jag hela formuläret i en klass och använder action `indexAction()` som ingångspunkt. Alla callbacks flyttar jag ut till klassen som metoder. Det blir alltså fyra olika metoder för de olika fall som kan hända i vårt exempel.

| Metod                      | Vad hanterar den | 
|----------------------------|------------------|
|`callbackSubmit($form)`     | Anropas när formulärets submit-knapp tryckts ned. |
|`callbackSubmitFail($form)` | Anropas när formulärets submit-fail-knapp trycks ned. |
|`callbackSuccess($form)`    | Anropas när `check()` returnerar `true`. |
|`callbackFail($form)`       | Anropas när `check()` returnerar `false`. |

Alla callbacks definieras på samma sätt, de blir publika metoder som tar formuläret som argument.

```php
/**
 * Callback What to do if the form was submitted?
 *
 */
public function callbackSuccess($form)
{
    $form->AddOUtput("<p><i>Form was submitted and the callback method returned true.</i></p>");
    $this->redirectTo();
}
```

När du sedan vill lägga in dem som *callable* metoder så görs det i en array, tillsammans med ett objekt som i detta fallet är `$this`.

```php
// Check the status of the form
$form->check([$this, 'callbackSuccess'], [$this, 'callbackFail']);
```

Nu är formuläret en del av kontrollern och själva kontroller-koden. Det innebär att koden i `indexAction()` kan minimeras eftersom formulärets alla callbacks flyttas ut till egna metoder. Du kan studera exempelkoden för [`Anax\HTMLForm\FormController`](https://github.com/mosbth/Anax-MVC/blob/master/src/HTMLForm/FormController.php) för att se hur det kan se ut.



Lägg formuläret som egen klass {#egenklass}
------------------------------

Om du har en kontroller med många formulär så kan det snabbt bli många metoder, eller stora metoder för varje action. Då finns det ytterligare en strategi att ta till. Du kan lägga formuläret i en egen klass.

För att förstå vad jag menar, titta på följande kod som är en uppdaterad variant av kontrollern med formuläret. Nu är metoden `indexAction()` inte så stor längre.

```php
/**
 * Index action using external form.
 *
 */
public function indexAction()
{
    $this->di->session();

    $form = new \Anax\HTMLForm\CFormExample();
    $form->setDI($this->di);
    $form->check();

    $this->di->theme->setTitle("Testing CForm with Anax");
    $this->di->views->add('default/page', [
        'title' => "Try out a form using CForm",
        'content' => $form->getHTML()
    ]);
}
```

Nu är all formulärkod och hantering i callbacks, utflyttad till en egen klass. Du kan studera följande två klasser och se hur koden har fördelat sig.

* [`Anax\HTMLForm\FormSmallController`](https://github.com/mosbth/Anax-MVC/blob/master/src/HTMLForm/FormSmallController.php)
* [`Anax\HTMLForm\CFormExample`](https://github.com/mosbth/Anax-MVC/blob/master/src/HTMLForm/CFormExample.php)

Resultatet blir en renare kontroller och koden för formuläret hamnade i en egen klass.



Avslutningsvis {#avslutning}
------------------------------

Du har nu sett på ett par olika varianter att integrera formulärhantering i Anax MVC genom att använda CForm. Du har också sett på ett par olika varianter på hur man kan göra integreringen och placera koden på olika platser. Du fick också lite insyn i hur du kan utöka Anax MVC med en egen CApplication klass och utökas med utilities i traits.

Se där, din verktygslåda fylls på.

Fråga i forumet om du funderar på något, eller om du har fler varianter på hur du kan integrera. Det finns en egen tråd för [denna artikel](t/2373).




