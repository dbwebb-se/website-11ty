---
author: mos
category: artikel
updated: "2013-08-30 07:40:01"
created: "2012-09-13 14:36:02"
...
Kom igång med CodeIgniter
==================================

Guiden tar dig genom installation av det PHP-baserade <abbr title='Model, View, Controller'>MVC</abbr>-ramverket CodeIgniter. Du får hjälp med de första stapplande stegen med modell, vy och kontroller som slutligen blir till en fungerande applikation i form av en gästbok med koppling till databasen MySQL.

CodeIgniter är ett PHP-ramverk för att enkelt och snabbt skapa kraftfulla webbapplikationer enligt MVC-strukturen (Model-View-Controller pattern).

<!--more-->



Ladda ned och installera CodeIgniter {#ladda-ned-installera}
--------------------------------------------------------------------

###Läs på om CodeIgniter {#las-pa}

Är du helt ny på CodeIgniter så vill du kanske bekanta dig med det först? [Hemsidan för CodeIgniter](http://codeigniter.com/) har allt du behöver. [Källkoden för CodeIgniter](https://github.com/EllisLab/CodeIgniter) finns tillgängligt på GitHub. 

När du är klar så sätter vi igång med installationen.



###Installera CodeIgniter från GitHub {#installera}

Det första vi gör är att ladda ned, installera och bekanta oss med ramverket. 

För att enkelt komma igång så skriver vi följande för att clona källkoden från GitHub:

```bash

git clone -b 2.1-stable https://github.com/EllisLab/CodeIgniter.git

```

Då är det bara att öppna webbläsaren och peka på katalogen där vi installerade CodeIgniter. Så här kan det se ut.

[FIGURE src=/image/snapshot/Welcome-to-CodeIgniter.png?w=w1 caption="CodeIgniter är installerad och visar en välkomstsida."]

Det vi får upp är en välkomstsida, en ”Welcome to CodeIgniter!”-sida, med information om vilken vy och kontroller som använts för att skapa välkomstmeddelandet. 

Så här ser [välkomstsidan](kod-exempel/codeigniter/) ut för mig.


###Konfigurera CodeIgniter till din server {#konfigurera}

Innan vi börjar med vår egen applikation så kikar vi lite på [installationsguiden i CodeIgniters manual](http://ellislab.com/codeigniter/user-guide/installation/index.html). Det är två konfigurationsfiler som omnämns i guiden:

* `application/config/config.php`
* `application/config/database.php`

Titta igenom konfigurationsfilen som du finner i `application/config/config.php`. Konfigurationsfilen innehåller bra dokumentation för varje inställning, så här kan det se ut.


```php
/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|       http://example.com/
|
| If this is not set then CodeIgniter will guess the protocol, domain and
| path to your installation.
|
*/
$config['base_url']     = '';

/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
|
| Typically this will be your index.php file, unless you've renamed it to
| something else. If you are using mod_rewrite to remove the page set this
| variable so that it is blank.
|
*/
$config['index_page'] = 'index.php';
```

För min del behövdes inga ändringar, det fungerade rakt av. 

Kika igenom konfigurationsfilen för databasen också, vi återkommer till den lite senare.



###Orientering bland katalogerna i CodeIgniter {#kataloger}

Vi tittar på de viktigaste filerna och katalogerna i CodeIgniter.

| Katalog/fil   | Beskrivning |
|---------------|-------------|
| `index.php`   | Index-filen för CodeIgniter som laddas för varje fråga. Startar upp, bootar upp, ramverket. |
| `system/`     | Ramverkets egen kod, CodeIgniters system-kod. Här finns bland annat katalogerna `core`, `database`, `fonts`, `helpers`, `language` och `libraries`. Läs gärna koden för att se vad som händer men normalt så ändrar du inte i koden som ligger här. |
| `application/` | Här skriver du din egen kod, din applikation. Katalogen har en struktur som bestämmer var du lagrar din kod. |
| `application/config` | Konfigurationsfiler för ramverket. |
| `application/controllers` | Här lägger du källkod till dina egna kontrollers. |
| `application/models`      | En katalog för dina modeller. |
| `application/view`        | Samla alla dina vyer här. |

Det finns fler kataloger i `application/`, till exempel `cache`, `core`, `helpers`, `hooks`, `language`, `libraries`, `third_party`. Dessa använder du för att skapa den struktur som CodeIgniter vill att du skall ha på din webbapplikation. För att lära dig mer om respektive katalog så behöver du läsa på i [manualen](http://ellislab.com/codeigniter/user-guide/index.html) under "General Topics", där förklaras de olika delarna och hur tanken är att de hänger ihop.

Men, för vår del så nöjer vi oss med kontroller, modeller och vyer. Det räcker för att vi skall få en uppfattning om hur man bygger webbplatser med CodeIgniter.



Hello World {#hello-world}
--------------------------------------------------------------------

Nu är vi redo att skapa vår första applikation, det får bli en *Hello World!* Vi bestämmer att vi endast behöver en vy och en kontroller. En metod i kontrollern anropas med en variabel som sedan skrivs ut i vyn.



###En kontroller {#hello-world-kontroller}

Så här blir vår kontroller.

**`application/controllers/helloworld.php:`**

```php
<?php

class HelloWorld extends CI_Controller {

  public function say($arg1 = "Hello World") {

    $data['arg1'] = $arg1;
    $this->load->view('hello_world', $data);
  }    

}
```

Varje klass som utökar klassen `CI_Controller` och ligger i underkatalogen `controllers` blir en controller. I detta fallet har vi  skapat en metod som heter `say()` med ett argument vid namn `arg1`. Vi tar emot argumentet och skickar med det till vyn med namnet `hello_world`. 

Läs snabbt och översiktligt i [manualen om CodeIgniter och kontrollers](http://codeigniter.com/user_guide/general/controllers.html).



###En vy {#hello-world-vy}

Så här ser vyn ut, det är ren HTML-kod tillsammans med utskrifter av PHP-variabler.

**`application/views/hello_world.php:`**

```php
<!doctype html>
<meta charset=utf-8>
<title>Hello World</title>
<?php echo htmlentities($arg1); ?>
```

En enkel vy vars enda uppgift är att skriva ut `arg1` som kommer från kontrollern. 

Läs snabbt och översiktligt i [manualen om CodeIgniter och vyer](http://codeigniter.com/user_guide/general/views.html).


###Testa vår Hello World applikation {#hello-world-test}

Anropar vi nu vår kontroller med rätt metod så bör den skriva ut Hello World. Anropar vi den med rätt metod samt ett argument så skriver den ut argumentet. Vi testar mot min installation:

* Först anropar vi metoden [`helloworld/say`](kod-exempel/codeigniter/index.php/helloworld/say) utan argument.
* Nu anropar vi metoden [`helloworld/say/Hello-MegaMic`](kod-exempel/codeigniter/index.php/helloworld/say/Hello-MegaMic) med ett argument.

Du bör se en text om "Hello World" i första exemplet och en text som visar "Hello-MegaMic" i andra exemplet.

Så, det var en kontroller och en vy, låt oss se hur exemplet kan se ut om vi inför en modell också.



Hello World 2 {#hello-world-2}
--------------------------------------------------------------------

En modell hanterar data och information. Så fort man tänker på data som kan lagras och hämtas så kan man tänka på en modell. Man kan göra en modell-klass för varje typ av data som man hanterar. Till exempel så kan man ha en modell för att hantera bloggposter i databasen, en modell för att hantera användare och ytterligare en modell för att hämta information från twitter. Vi är alltså inte begränsade till att datan måste lagras i databasen, den kan finnas var som helst, men en modell är vårt gränssnitt för att jobba mot datan, läsa, uppdatera eller radera.

Du kan läsa på om [CodeIgniter och modeller](http://codeigniter.com/user_guide/general/models.html) i manualen.


###En modell {#hw2-model}

Låt oss införa en modell i "Hello World"-exemplet. Följande krav skall uppfyllas.

1. En metod i kontrollern skall spara undan hemliga meddelanden i sessionen, med hjälp av en modell.
2. En metod i kontrollern hämtar hemliga meddelanden från samma modell.

Så här kan modellen se ut.

**`application/models/helloworld_model.php`**

```php
<?php
session_start();

class HelloWorld_Model extends CI_Model {

  function save($arg1) {
    $_SESSION['var1'] = $arg1;
  }
  
  function load() {
    return empty($_SESSION['var1']) ? 'default value' : $_SESSION['var1'];
  }

}
```

Min modell ärver från basklassen `CI_Model` och utökar med en metod `save()` som lagrar information i sessionen och en metod `load()` som hämtar informationen från sessionen. 



###En uppdaterad kontroller {#hw2-kontroller}

Vi skapar en ny kontroller som kan jobba mot modellen.

**`application/controllers/helloworld2.php`**

```php
<?php 

class HelloWorld2 extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('helloworld_model', 'model');
  }

  public function index() {
    $data['var1'] = $this->model->load();
    $this->load->view('hello_world2', $data);
  }

  public function save($var1) {
    $this->model->save($var1);
    $this->index();
  }

}
```

Vi utökar kontrollern med en konstruktor. Modellen laddas i konstruktorn så att den finns tillgänglig i alla metoder i kontrollern.

Vi passar även på att ladda en [url-helper](http://ellislab.com/codeigniter/user-guide/helpers/url_helper.html) för att kunna göra interna länkar i vyn. 

Index-metoden körs om ingen specifik metod anropas och det passar bra för en sida som endast visar data som hämtas från modellen. 

Till slut är det en metod `save()` för att spara data med hjälp av modellen och sedan skicka vidare till index-metoden som skriver ut det som finns i modellen.



###En uppdaterad vyn {#hw2-vy}

Vi uppdaterar vyn för att länka till de olika metoderna.

**`application/views/hello_world2.php`**

```php
<!doctype html>
<meta charset=utf-8>
<title>Hello World</title>
<p>Current value: <?php echo htmlentities($var1); ?>
<br>
<?php echo anchor('helloworld2/save/hello', 'Set Hello');?>
<br>
<?php echo anchor('helloworld2/save/world', 'Set World');?>
<br>
<?php echo anchor('helloworld2', 'Current value');?>
</p>
```

Vyn skriver ut innehållet i `$var1` som kommer från kontrollern, som i sin tur hämtar informationen från modellen. Jag lägger till så att det finns ett par exempel-länkar att använda och testa. 

Testa resultatet för övningen, [Hello World, nu med en modell](kod-exempel/codeigniter/index.php/helloworld2)



En gästbok i CodeIgniter {#gastbok}
--------------------------------------------------------------------

Nu har vi lärt oss grunderna. Låt oss då bygga en gästbok i CodeIgniter. En gästbok som sparar information i en MySQL-databas. 



###Inställningar för databasen {#installningar}

För att kunna använda databasen så får vi uppdatera filen `application/config/database.php`. Så här blev mina inställningar.

```php
$db['default'] = array(
        'dsn'   => '',
        'hostname' => 'localhost',        // Set this to your database host
        'username' => 'ci',               // Change this to your username
        'password' => 'secret-password',  // Change this to your password
        'database' => 'ci_guestbook',     // Set to your database name
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => TRUE,
        'db_debug' => TRUE,
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'autoinit' => TRUE,
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array()
);
```


###Skapa en tabell för inläggen {#installningar}

Vi skapar en tabell som kan lagra inläggen i gästboken.

```sql
create table posts(
 id int(11) not null auto_increment,
 text text not null,
 author varchar(128) not null,
 primary key(id)
);
```


###En modell för gästboken {#gast-modell}

När databasen är på plats kan vi skapa modellen, en klass som sparar ett nytt inlägg och hämtar samtliga inlägg från databasen.

**`application/models/guestbook_model.php`**

```php
<?php 

class Guestbook_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }
  
  public function get_posts() {
    $query = $this->db->get('posts');
    return $query->result_array();
  }
  
  public function set_posts() {
    $data = array(
      'text' => $this->input->post('text'),
      'author' => $this->input->post('author')
    );
    $data = $this->security->xss_clean($data);
 
   return $this->db->insert('posts', $data);
  }
  
}
```

CodeIgniter erbjuder en [databas-klass](http://ellislab.com/codeigniter/user-guide/database/index.html) för att förenkla arbetet med databasen. Jag laddar den i konstruktorn och den kopplar automatiskt upp sig mot databasen och ger mig variabeln `$this->db` tillsammans med metoder för att läsa och skriva till databasen. 

Jag använder en funktion `xss_clean()` från [security-klassen](http://codeigniter.com/user_guide/libraries/security.html) för att säkra upp koden och undvika XSS injektioner. 



###En kontroller för gästboken {#gast-kontroller}

Kontrollerna skall presentera ett formulär där besökaren kan skapa ett nytt inlägg i gästboken, samtidigt visas alla nuvarande inlägg.

**`application/controllers/guestbook.php`**

```php
<?php
class Guestbook extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('guestbook_model');
    $this->load->helper(array('form','url'));
    $this->load->library('form_validation');
  }

  public function index(){
    $data['posts'] = $this->guestbook_model->get_posts();
    $data['title'] = 'Guestbook';
    $data['form'] = form_open('guestbook/create').form_label('Write in our guestbook:', 'text').'<br>
      '.form_textarea('text', '').'<br>'.form_label('Author:','author').form_input('author',
      '').form_submit('submit', 'Submit').form_close();
    $this->load->view('guestbook/index', $data);
  }
 
  public function create(){
    $this->form_validation->set_rules('text', 'text', 'required');
    $this->form_validation->set_rules('author', 'author', 'required');
    if($this->form_validation->run() === TRUE){
      $this->guestbook_model->set_posts();
    }
    $this->index();
  }

}
```

Som du ser så laddar vi modellen för gästboken tillsammans med hjälpredor i form av [formulärhantering](http://codeigniter.com/user_guide/helpers/form_helper.html) och [url-hantering](http://codeigniter.com/user_guide/helpers/url_helper.html) samt ett bibliotek för [form-validering](http://codeigniter.com/user_guide/libraries/form_validation.html).

Dessa hjälpredor gör att vi snabbt kan skriva säker kod. Det är bra. Men man behöver kunskapen för att kunna använda klasserna på rätt sätt. Den kunskapen finner vi i manualen.



###En vy för gästboken {#gast-vy}

Då är det bara att skapa själva vyn. Alla posterna finns i en array som jag loopar igenom.

**`application/views/guestbook/index.php`**

```php
<!doctype html>
<meta charset=utf-8>
<title><?php echo $title; ?></title>
<style>
body{font-family:tahoma,sans-serif}
article{border:1px dotted gray;padding:0 1em;}
</style>
<a href="<?php echo site_url('guestbook'); ?>"><h1>Guestbook</h1></a>
<?php echo validation_errors(); ?>
<?php echo $form; ?>
<?php foreach($posts as $posts_item): ?>
<article>
<p><?php echo $posts_item['text']; ?></p>
<p>Author: <em><?php echo $posts_item['author']; ?></em></p>
</article>
<?php endforeach; ?>
<hr>
<strong>&copy; 2012 ake1</strong>
```



Avslutningsvis {#avslutning}
--------------------------------------------------------------------

Nu har du sett grunderna i det PHP-baserade MVC-ramverket CodeIgniter. Du har sett hur man implementerar modeller, kontrollers och vyer och du har sett exempel på ett par vanliga hjälp-klasser som finns tillgängliga.

Om du dessutom testade att skriva in koden själv så har du nu en fungerande gästbok.

Min egen gästbok sparar enbart i sessionen, jag ville inte fylla databasen med en massa spam... 

Du kan testa [min färdiga gästbok](kod-exempel/codeigniter/index.php/guestbook) här.

[FIGURE src=/image/snapshot/Codeigniter-guestbook.png?w=w1 caption="Så här blev den färdiga gästboken som sorterar inläggen i "fel" ordning!"]

Gästboken sorterar inläggen i fel ordning, men du kan ta det som en extra uppgift att försöka sortera dem så att senaste inlägget visas överst.

Lycka till och glöm inte bort [manualen](http://ellislab.com/codeigniter/user-guide/index.html) när det kör ihop sig.



Revisionshistoria {#revision}
------------------------------

<span class='revision-history'>
2013-08-30 (E, mos) Clona från stable branch istället för development branch, [problem med namngivning av controller](t/1430).  
2013-04-15 (D, mos) Större genomgång, senaste versionen av CodeIgniter, mer beskrivningar och mer förklarande text.  
2012-10-05 (C, mos) Rätta fel i första exempelprogrammet, Hello World.  
2012-09-13 (B, mos) Genomgången, testad och flyttad till dbwebb från WordPress.  
2012-03-23 (A, Rickard Gimerstedt) Första utgåvan.  
</span>
