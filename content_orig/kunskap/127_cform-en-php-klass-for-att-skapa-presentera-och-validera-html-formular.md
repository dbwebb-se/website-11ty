---
author: mos
category: artikel
revision:
    "2013-04-22": (D, mos) Större uppdatering, mer beskrivande text, genomgångna test-program, fler exempel samt eget repository på github.
    "2012-11-26": (C, mos) Lade till testfall för valideringsregler för textfält samt testfall för checkbox och multi-checkbox.
    "2012-10-05": (B, mos) Flyttad från forumet till dbwebb och uppdaterad.
    "2012-04-09": '(A, mos) Första utgåvan, publicerad på forumet: http://dbwebb.se/f/1424'
updated: "2013-04-22 09:13:55"
created: "2012-10-05 09:02:50"
...
CForm, en PHP-klass för att skapa, presentera och validera HTML-formulär
==================================

Effektiv formulärhantering kräver både kod och eftertänksamhet, speciellt om man skall göra många formulär. I [PHP-ramverket Lydia](lydia/tutorial), som vi använder i [phpmvc-kursen](phpmvc), finns en PHP-klass för formulärhantering, `CForm`. Detta är en tutorial som visar hur du kommer igång och använder den klassen, utanför Lydia. PHP-klassen `CForm` hjälper dig att skapa HTML-formulär (HTML5), skriva ut dem till webbsidan, samt hantera validering av de postade HTML-formulären. Klassen `CForm` är helt enkelt en samling PHP-kod som hjälper dig att jobba med formulär på ett säkert, användarvänligt, effektivt och storskaligt sätt.

<!--more-->



Hämta hem `CForm` {#laddahem}
--------------------------------------------------------------------

###`CForm` finns på GitHub {#github}
[Lydia finns på GitHub](https://github.com/mosbth/lydia/) och där hittar vi också klassen [`CForm` tillsammans med en `README.md`](https://github.com/mosbth/lydia/tree/master/src/CForm). För att förenkla för de som vill jobba med klassen utanför Lydia så finns det även ett [eget repository för klassen `CForm` på GitHub](https://github.com/mosbth/cform/), där finns även lite testprogram som visar kodexempel på hur man använder klassen.

Låt oss gå igenom de kodexemplen för att få en idé om hur klassen kan användas. Starta med att clona koden från GitHub.

```bash
git clone git://github.com/mosbth/cform.git
```


###Klasser och klass-hierarki {#hierarki}

Börja med att skumma igenom README-filen. Kika sedan på källkoden till `CForm.php`. Där ser du att filen innehåller flera klasser. Det är `CForm` som är det publika API:et. Sedan finns det en klasshierarki för `CFormElement` där varje fysiskt formulärelement motsvaras av en klass. Till exempel så finns det en klass för `CFormElementText` som motsvarar ett formulärelement av typen `<input type=text />`. 

Följande ger dig en enkel bild av klassernas struktur och de klasser som finns i filen `CForm.php`.

```php
class CForm implements ArrayAccess {

class CFormElement implements ArrayAccess {

class CFormElementText extends CFormElement {
class CFormElementTextarea extends CFormElement {
class CFormElementHidden extends CFormElement {
class CFormElementPassword extends CFormElement {
class CFormElementCheckbox extends CFormElement {
class CFormElementCheckboxMultiple extends CFormElement {
class CFormElementSelect extends CFormElement {
class CFormElementSearch extends CFormElement {
class CFormElementSubmit extends CFormElement {
```

Bra, då har vi senaste versionen av `CForm`. Då går vi vidare och gör ett testprogram från grunden.



Ett testprogram för att använda `CForm` {#test}
--------------------------------------------------------------------

Så, ett testprogram för att visa hur man använder klassen `CForm`, låt oss starta med grunderna.



###Inkludera `CForm.php` {#inkludera}
Jag skapar mitt testprogram i en fil `test.php`, det första jag behöver göra är att inkludera `CForm.php`.

```php
// Include CForm
include('CForm.php');
```

Bra, nu har vi tillgång till all kod för formulärhantering.



###Skapa elementen i formuläret {#skapa-element}

Nästa steg blir att skapa formuläret med dess element. Jag gör ett kontaktformulär som exempel, med namn, mail och telefonnummer. 

Jag skapar en klass `CFormContact` och låter den ärva från `CForm`. Formulärets element skapas i konstruktorn. Jag ger submit-knappen en callback-funktion, `DoSubmit()`, som skall anropas när formuläret har postats.

Så här kan det se ut.

```php
/**
 * Create a class for a contact-form with name, email and phonenumber.
 */
class CFormContact extends CForm {

  /** 
   * Create all form elements and validation rules in the constructor.
   */
  public function __construct() {
    parent::__construct();
    
    $this->AddElement(new CFormElementText('name'))
         ->AddElement(new CFormElementText('email'))
         ->AddElement(new CFormElementText('phone'))
         ->AddElement(new CFormElementSubmit('submit', array('callback'=>array($this, 'DoSubmit'))));
  }

  /**
   * Callback for submitted forms
   */
  protected function DoSubmit() {
    echo "<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>";
    return true;
  }

}
```

Bra, då har vi formuläret och dess element samlade i klassen `CFormContact`. 



###Skapa en instans av formuläret {#instans}

Då tar vi och skapar en instans av klassen `CFormContact` och börjar använda den. Klassen `CForm` använder sig av sessionen för att hantera felmeddelanden och ompostning av formuläret när valideringen går fel. Så, vi måste ha en aktiv session.

```php
// -----------------------------------------------------------------------
//
// Use the form and check its status.
//
session_name('cform_example');
session_start();
$form = new CFormContact();
```


###Skriv ut formuläret i webbsidan {#skriv-ut}

Nu kan vi skriva ut formuläret i en webbsida med ett enkelt anrop till `CForm::GetHTML()`.

```php
<!doctype html>
<meta charset=utf8>
<title>CForm Example: Basic example on how to use CForm</title>
<?=$form->GetHTML()?>
```

Bra, det var första steget för att komma igång. Så här ser det ut för mig.

[FIGURE src=/img/snapshot/cform-example-part1.png?w=w1 caption="Formuläret är skapat och kan skrivas ut i webbsidan."]

[Testa mitt exempel så här långt](kod-exempel/cform/test/test-part1.php).



Kontrollera om formuläret är postat eller ej {#post-eller-ej}
--------------------------------------------------------------------

Som du märker så händer inget om du klickar på "Submit-knappen", det bara laddar om sidan. Det är ett så kallat "self-submitting form" som postar till samma sida som visar formuläret, men än så länge händer det inte så mycket.

Då utökar vi testprogrammet för att kontrollera om formuläret är postat eller ej.


###Kontrollera om formuläret är postat {#post}

De första vi gör är att anropa en metod `CForm::Check()`. Den metoden kontrollerar om formuläret är postat eller ej. Om formuläret är postat så anropas även callback-metoden, i vårt fall `CFormContact::DoSubmit()`.

Om formuläret *inte är postat* så returnerar `CForm::Check()` värdet `null`.

Om formuläret *är postat* så returneras det värde som callback-metoden returnerar. I vårt fall returnerar den alltid värdet `true`.

Så här kan koden se ut för att kontrollera om formuläret är postat eller ej.

```php
// Check the status of the form
$status = $form->Check();

// What to do if the form was submitted?
if($status === true) {
  echo "<p><i>Form was submitted and the callback method returned true. I should redirect to a page to avoid issues with reloading posted form.</i></p>";
}
```

###Skriv ut vad `$_POST` innehåller {#post-innehall}

För att underlätta felsökningen så skriver jag ut vad `$_POST` innehåller. Följande kod hjälper mig med det.

```php
<p><code>$_POST</code> <?php if(empty($_POST)) {echo '<i>is empty.</i>';} else {echo '<i>contains:</i><pre>' . print_r($_POST, 1) . '</pre>';} ?></p>
```

Så här ser det ut för mig.

[FIGURE src=/img/snapshot/cform-example-part2.png caption="Formuläret postas och callbacken returnerar `true`."]

Formuläret postas och debugg-utskrifter skrivs ut. Som du ser så fylls de postade värdena i automatiskt av `CForm`.

[Testa mitt exempel så här långt](kod-exempel/cform/test/test-part2.php).



Vad händer om callback-funktionen inte kan processa formuläret? {#return-false}
--------------------------------------------------------------------

Vad händer om man i callbacken inte kan hantera formuläret? Skrivningen till databasen kanske inte går att göra eller så gör callback-funktionen en validering av datat som misslyckas. Då kan callback-funktionen returnera `false` för att berätta att något gick fel.

För att testa detta så bygger vi ut exemplet med ytterligare en "submit-knapp" som har en egen callback som alltid returnerar "false".



###En callback som alltid misslyckas {#misslyckas}

Först utökar vi formulärklassen med ytterligare ett element tillsammans med en callback.

```php
         ->AddElement(new CFormElementSubmit('submit', array('callback'=>array($this, 'DoSubmit'))))
         ->AddElement(new CFormElementSubmit('submit-fail', array('callback'=>array($this, 'DoSubmitFail'))));
  }

  /**
   * Callback for submitted forms, will always fail
   */
  protected function DoSubmitFail() {
    echo "<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>";
    return false;
  }
```

Sedan lägger vi till en `else if` för att hantera när `$status` blir `false`.

```php
// What to do when form could not be processed?
else if($status === false){
  echo "<p><i>Form was submitted and the callback method returned false. I should redirect to a page to avoid issues with reloading posted form.</i></p>";
}
```

Så här ser det ut för mig när jag klickar på den nya knappen.

[FIGURE src=/img/snapshot/cform-example-part3.png caption="Formuläret är postat men callbackfunktionen returnerar `false`."]

Tanken är ju att ge användaren ytterligare en chans att fylla i formuläret korrekt.

[Testa mitt exempel så här långt](kod-exempel/cform/test/test-part3.php).



Validering av formulärets element {#validering}
--------------------------------------------------------------------

I callback-funktionen kan vi validera inkommande formulärdata. Men, vi kan också överlåta valideringen till `CForm` genom att beskriva vilka regler som gäller för respektive element.

Vi uppdaterar formuläret och lägger till valideringsregler för varje element. Detta görs i konstruktorn av `CFormContact`.

```php
    $this->SetValidation('name', array('not_empty'))
         ->SetValidation('email', array('not_empty', 'email_adress'))
         ->SetValidation('phone', array('not_empty', 'numeric'));
```


Så här ser det ut för mig när jag postar formuläret utan att fyll i några värden i formuläret.

[FIGURE src=/img/snapshot/cform-example-part4.png caption="Formulärets element validerar inte."]

Detta gör det smidigt att validera de postade elementen. Det mesta valideringsjobbet kan alltså göras av klassen `CForm`. 

Om valideringen inte går igenom så returneras `false` av `CForm::Check()`. Nästa gång som formuläret ritas upp så visas de felmeddelanden där valideringen gick fel. Med lite CSS-kod skulle man kunna göra presentationen av felmeddelandena lite mer tilltalande.

[Testa mitt exempel så här långt](kod-exempel/cform/test/test-part4.php).



En korrekt processing av postat formulär {#redirect}
--------------------------------------------------------------------

En korrekt hantering vore att göra så kallade "redirects" till resultatsidor. När formuläret är postat och metoden `CForm::Check()` returnerar `true` eller `false` så bör man skicka vidare till en ny sida. Det gör man för att undvika problem med ompostning av formulär.

Du känner till den här rutan som kommer upp när du försöker ladda om en sida med ett postat formulär?

[FIGURE src=/img/snapshot/cform-example-confirm.png caption="Vill du posta formuläret igen med samma data?"]



### Gör "redirect" och spara meddelanden i sessionen {#redirect-meddelande}

För att undvika detta så kan du göra en "redirect", att skicka vidare till en resultatsida när formuläret är processat. Detta görs på följande sätt.

```php
// Check the status of the form
$status = $form->Check();

// What to do if the form was submitted?
if($status === true) {
  $form->AddOUtput("<p><i>Form was submitted and the callback method returned true.</i></p>");
  header("Location: " . $_SERVER['PHP_SELF']);
}

// What to do when form could not be processed?
else if($status === false){
  $form->AddOutput("<p><i>Form was submitted and the Check() method returned false.</i></p>");
  header("Location: " . $_SERVER['PHP_SELF']);
}
```

För att en "redirect" skall fungera så får man inte skriva ut något till webbläsaren. Det innebär att vi måste ändra även i callback-metoderna.

```php
  /**
   * Callback for submitted forms, will always fail
   */
  protected function DoSubmitFail() {
    $this->AddOutput("<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>");
    return false;
  }


  /**
   * Callback for submitted forms
   */
  protected function DoSubmit() {
    $this->AddOutput("<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>");
    return true;
  }
```

Metoden `CForm::Output()` hjälper oss att spara meddelanden i sessionen. Det är en bra metod om du vill ge användaren feedback på vad som händer.



###En callback som hämtar värden från formuläret {#hamta-varden}

Innan jag är klar så uppdaterar jag callbacken så att den hämtar värden från det postade formuläret. Formulärets värden kan hämtas via metoden `CForm::Value()`.

Så här ser den uppdaterade callback-metoden ut.

```php

  /**
   * Callback for submitted forms
   */
  protected function DoSubmit() {
    $this->AddOutput("<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>");
    $this->AddOutput("<p><b>Name: " . $this->Value('name') . "</b></p>");
    $this->AddOutput("<p><b>Email: " . $this->Value('email') . "</b></p>");
    $this->AddOutput("<p><b>Phone: " . $this->Value('phone') . "</b></p>");
    $this->saveInSession = true;
    return true;
  }
```

Genom att sätta **`$form->saveInSession` till `true`** så sparas innehållet i det postade formuläret i sessionen och kan visas upp på svarssidan. Det är en bra funktion när man testar sina formulär, man slipper skriva in värdena om och om igen. Men, i drift så har du nog ingen nytta av den, då gör du annorlunda resultatsidor eller läser in själva innehållet i formuläret från databasen. 

Så här ser det uppdaterade exemplet ut för mig.

[FIGURE src=/img/snapshot/cform-example-part5.png caption="Formulärets gör nu "redirects" när det är postat."]

[Testa mitt exempel så här långt](kod-exempel/cform/test/test-part5.php).



Snygga till formuläret för användbarhet {#anvandbarhet}
--------------------------------------------------------------------



###Ange egen titel för formulärelementet {#label}

Klassen `CForm` hjälper själv till att namnge fälten i formuläret, men ibland är koden inte tillräckligt smart så då måste du själv ange titel, eller "label", för elementet.

Du gör detta genom att skicka med ett argument när du skapar själva formulärelementet i konstruktorn i `CFormContact`.

```php
$this->AddElement(new CFormElementText('name', array('label' => 'Name of contact person:'))
```


###Visa att fältet måste fyllas i med `required` {#required}

Ibland vill man ge ledtråd till användaren att ett element är nödvändigt att fylla i genom att visuellt visa att elementet måste fyllas i. Detta görs med `required` och resulterar i en stjärna efter titeln samt att attributet `required` sätts på form elementet.

Detta görs i när du skapar formulärelementen.

```php
    $this->AddElement(new CFormElementText('name', array('label' => 'Name of contact person:', 'required' => true)))
         ->AddElement(new CFormElementText('email', array('required' => true)))
         ->AddElement(new CFormElementText('phone', array('required' => true)))
```

En bonus av detta är att attributet `required` sätts och om webbläsaren stödjer HTML5-attributet `required` så kan användaren inte posta ett tomt fält. Det blir en kontroll på klient-sidan av att fältet är ifyllt.



###Ett komplett exempel {#exempel-klart}

Så här ser det slutliga exemplet ut.

[FIGURE src=/img/snapshot/cform-example-part6.png caption="Formulärhantering med `CForm`."]

Om du lämnar alla fälten tomma och försöker posta formuläret så får du valideringsfel från webbläsaren som hindrar formuläret från att postas. Det är attributet `required` som gör detta. Men, var uppmärksam på att det ser olika ut i olika webbläsare. Men det bör inte vara något hinder.

Så här kan det se ut i vårt fall.

```html
<input id='form-element-name' type='text' name='name' required='required'/>
```

[Testa mitt exempel](kod-exempel/cform/test/test-part6.php).



Ett array-alternativ för att skapa formulär {#array} 
--------------------------------------------------------------------

Det vi nu sett är en variant där formuläret skapas på ett objektorienterat sätt med hjälp av en klass som ärver från `CForm`. Varje formulärlement är en instans av en klass, till exempel av klassen `CFormElementText` eller `CFormElementSubmit`.

Det finns ett alternativ sätt att skapa samma formulär med en array. Koden, för att skapa samma formulär som i exemplet ovan, skulle i så fall se ut så här.

Klassen `CFormContact` ersätts här av en array som skickas in till konstruktorn av `CForm`. Funktion och utseende i webbsidan är lika. Det är bara två olika varianter att skapa samma resultat.

```php
// -----------------------------------------------------------------------
//
// Use the form and check it status.
//
session_name('cform_example');
session_start();
$form = new CForm(array(), array(
    'name' => array(
      'type'        => 'text',
      'label'       => 'Name of contact person:',
      'required'    => true,
      'validation'  => array('not_empty'),
    ),        
    'email' => array(
      'type'        => 'text',
      'required'    => true,
      'validation'  => array('not_empty', 'email_adress'),
    ),        
    'phone' => array(
      'type'        => 'text',
      'required'    => true,
      'validation'  => array('not_empty', 'numeric'),
    ),        
    'submit' => array(
      'type'      => 'submit',
      'callback'  => function($form) {
        $form->AddOutput("<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>");
        $form->AddOutput("<p><b>Name: " . $form->Value('name') . "</b></p>");
        $form->AddOutput("<p><b>Email: " . $form->Value('email') . "</b></p>");
        $form->AddOutput("<p><b>Phone: " . $form->Value('phone') . "</b></p>");
        return true;
      }
    ),
    'submit-fail' => array(
      'type'      => 'submit',
      'callback'  => function($form) {
        $form->AddOutput("<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>");
        return false;
      }
    ),
  )
);


// Check the status of the form
$status = $form->Check();

// What to do if the form was submitted?
if($status === true) {
  $form->AddOUtput("<p><i>Form was submitted and the callback method returned true.</i></p>");
  header("Location: " . $_SERVER['PHP_SELF']);
}

// What to do when form could not be processed?
else if($status === false){
  $form->AddOutput("<p><i>Form was submitted and the Check() method returned false.</i></p>");
  header("Location: " . $_SERVER['PHP_SELF']);
}
```

Vilket tycker du är bäst? Klasser och objekt eller arrayer? Nu kan du använda det som du tycker bäst om. För min egen del så väljer jag array, jag tycker det blir enklare kod, mer översiktligt och enklare att kopiera kod som jag skrivit tidigare.

[Testa mitt exempel](kod-exempel/cform/test/test-as-array.php).



Checkbox {#checkbox}
--------------------------------------------------------------------

`CForm` har stöd för formulär-elementet **checkbox**.

```html
<input id='form-element-accept_mail' type='checkbox' name='accept_mail' />
```

Här är källkoden som visar hur du konfigurerar element av typen "checkbox".

```php
$form = new CForm(array(), array(
    'accept_mail' => array(
      'type'        => 'checkbox',
      'label'       => 'It´s great if you send me product information by mail.',
      'checked'     => false,
    ),        
    'accept_phone' => array(
      'type'        => 'checkbox',
      'label'       => 'You may call me to try and sell stuff.',
      'checked'     => true,
    ),        
    'accept_agreement' => array(
      'type'        => 'checkbox',
      'label'       => 'You must accept the <a href=http://opensource.org/licenses/GPL-3.0>license agreement</a>.',
      'required'    => true,
      'validation'  => array('must_accept'),
    ),        
  )
);
```

Så här kan det se ut.

[FIGURE src=/img/snapshot/cform-example-checkbox.png caption="Formulärhantering med checkboxar."]

Här kan du testa [ett exempel med checkboxar](kod-exempel/cform/test/test-checkbox.php).



Multipla checkboxar {#multipel-checkbox}
--------------------------------------------------------------------

En multipel checkbox är ett skräddarsytt formulärelement där en samling checkboxar är samlade i ett formulär-element.

Så här skapar du en multipel checkbox.

```php
$form = new CForm(array(), array(
    'items' => array(
      'type'        => 'checkbox-multiple',
      'values'      => array('tomato', 'potato', 'apple', 'pear', 'banana'),
      'checked'     => array('potato', 'pear'),
    ),        
);
```

I `CForm` betraktas alltså typen `checkbox-multiple` som en egen formulär-typ. Den konfigureras med två arrayer, en för `values` som är de värden som visas. En för `checked` där de finns med som skall vara checkade.

Så här kan det se ut.

[FIGURE src=/img/snapshot/cform-example-multiple-checkbox.png caption="Formulärhantering med multipla checkboxar."]

Här kan du testa [ett exempel med multipel checkboxar](kod-exempel/cform/test/test-multiple-checkbox.php).



Utskriftsfunktioner {#utskrift}
--------------------------------------------------------------------

Det finns ett par olika sätt att skriva ut innehållet i ett formulär. Det finns två standardlägen där formuläret skrivs ut i en eller i två kolumner.



###Standardläge {#standard}

Så här kan det se ut i standardläget.

[FIGURE src=/img/snapshot/cform-example-standard-layout.png caption="Standardläget är alltid att skriva ut i en kolumn."]



###Två kolumner {#tva-kolumner}

Så här kan det se ut i två-kolumns läget.

[FIGURE src=/img/snapshot/cform-example-two-column-layout.png caption="Två-kolumnsläge skriver ut formuläret i två kolumner."]

För att skriva ut till två kolumner så anropas utskriftsfunktionen på följande sätt.

```php
$form->GetHTML(array('columns' => 2));
```

Du behöver också lägga till stylesheet-kod för att bestämma hur breda kolumnerna skall vara. Följande används i exemplet.

```css
.cform-columns-2 .cform-column-1,
.cform-columns-2 .cform-column-2 { 
  float: left; width: 50%; 
}

.cform-columns-2 .cform-buttonbar { 
  clear: both; 
  background-color: #ccc; 
  padding: 1em; 
  border: 1px solid #aaa; 
}

.cform-columns-2 .cform-buttonbar p { 
  margin-bottom: 0; 
}
```

Här kan du testa [att variera mellan standardläge och två kolumner](kod-exempel/cform/test/test-creditcard-checkout.php?cols=2).



Valideringsregler {#valideringsregler}
--------------------------------------------------------------------

CForm har ett antal inbyggda valideringsregler. Ett par av dem är enkla och ett par mer komplexa där extra argument krävs eller till och med en egen valideringsfunktion som du kan skriva själv. 



###Enkla valideringar {#enkel-validering}

Enkla valideringeringar är av typen `not empty`, `numeric` och `email_adress`. 

Pröva hur det fungerar via mitt [testprogram för enkla valideringar](kod-exempel/cform/test/test-validation.php).

Så här ser det ut.

[FIGURE src=/img/snapshot/cform-example-validation.png caption="Skriv in ett värde och välj vilka valideringsregler som skall gälla."]



###Komplexa valideringsregler {#komplex-validering}

I exemplet med kreditkortet finns det med ett exempel på validering av kreditkortsnummer, den valideringen är gjord med en egen funktion kopplad till valideringsregeln `custom_test`. Så här ser konfigurationen ut för den.

```php
  'ccnumber' => array(
    'type' => 'text',
    'label' => 'Credit card number:',
    'validation' => array('custom_test' => array(
      'message' => 'Credit card number is not valid, try using 4408 0412 3456 7893 or 4417 1234 5678 9113 :-).', 
      'test' => 'isValidCCNumber')),
  ),
```

Argumentet `isValidCCNumber` är en funktion som jag själv har definierat (lånat) för att kontrollera kreditkortsnumret enligt en känd algoritm.



Summering {#summering}
--------------------------------------------------------------------

Man kan ha mycket nytta av att sköta formulärhanteringen på ett liknande sätt. När du väljer ett ramverk så bör du alltid titta på vilket inbyggt stöd det finns för formulärhantering. Det är en bra investering att använda en klass liknande `CForm` vid formulärhantering. Det är alltid en tröskel för att lära sig ett sådant här klassbibliotek, men det lönar sig i längden.

Du kan [diskutera denna artikel samt `CForm` i forumet](t/275).
