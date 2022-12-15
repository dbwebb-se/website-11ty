---
...
Snygga länkar
==================================

I utgångsläget kommer man åt en viss länk genom att lägga till `index.php/` framför den sidan (route) man vill nå.

Vill man ha snyggare länkar, utan `index.php/` så behöver man göra två saker, dels konfigurera Anax att använda snygga länkar och man behöver skapa en `.htaccess`-fil som pekar ut skriptet som leder till Anax.

Så här gör du.



Alla länkar leder till `index.php` {#htaccess}
-----------------------------------



###Det generella sättet {#general}

I din Anax Flat finns en färdig fil i `htdocs/.htaccess_anax`. Du kan kopiera den till `.htdocs/.htaccess`.

Här kommer den längre beskrivningen.

Skapa en fil `htdocs/.htaccess` med följande innehåll.

```text
RewriteEngine on

# Rewrite to Anax frontcontroller
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule (.*) index.php/$1 [NC,L]
```

Reglerna säger att alla länkar som inte leder till en katalog eller till en fil skall skrivas om till `index.php`.

Du kan testa om din konstruktion fungerar genom att försöka accessa en sida utan att använda `index.php/`. Först på det vanliga sättet och sedan på sättet med snygga länkar.

```text
index.php/about
about
```

Om det fungerar så vet du att din fil `htaccess` gör som den ska.



###Fungera både lokalt och på studentservern {#student}

I din Anax Flat finns en färdig fil i `htdocs/.htaccess_wwwstudent`. Du kan kopiera den till `htdocs/.htaccess`.

Det är en anpassad variant som fungerar både lokalt på din utvecklingsmiljö och på studentservern med dess speciella inställningar.

Du behöver dock redigera filen och lägga in din studentakronym på de platser där det nu står `~mosstud`.



Konfigurera snygga länkar i Anax {#config-url}
-----------------------------------

I filen `config/url.php` berättar du för Anax att skapa snygga länkar.

```php
return [
    "urlType"       => self::URL_CLEAN,
];
```

Nu skapar Anax snygga länkar till alla sidor, utan att lägga till skriptets namn.

Ladda om sidan och se att länkarna nu inte innehåller ett `index.php/`.

Nu har du snygga länkar.
