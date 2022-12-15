---
author: mos
revision:
    "2018-04-15": "(A, mos) Första versionen."
...
Vad är Trait?
==================================

Vi tittar på konstruktionen trait och vad den innebär och hur den samverkar med en klass.

Du skriver inledningsvis ingen kod.



Trait jämfört med multipelt arv {#mult}
----------------------------------

Multipelt arv är en konstruktion i objektorienterade språk där en klass kan ärva från flera basklasser. PHP har inte stöd för multipelt arv men istället finns Trait. Du kan återfinna konstruktionen Trait i andra programmeringsspråk, ibland delvis som ett sätt att hantera, eller ersätta, behovet av multipelt arv. 

Trait består av metoder och medlemsvariabler vilka kan användas för att utöka funktionaliteten av en klass. Det låter väldigt likt arv, men det är alltså en annan konstruktion.



Klass använder Trait {#uses}
----------------------------------

Man säger att en klass använder, _uses_, ett trait. En klass kan använda flera traits. När klassen använder ett trait så blir dess kod som en del av klassen. Man kan tänka sig att traitets kod _kopieras_ in i klassen, det är en mental bild som fungerar.

Man kan tänka på trait som kodmoduler som är återanvändbara i flera klasser. Ett trait kan lösa funktioner som många olika klasser skulle kunna ha nytta av. Ett trait kan ofta återanvändas av olika typer av klasser.

Låt oss ta ett exempel.

Säg att vi har flera klasser som är konfigurerbara i ett ramverk. De har alla egenskapen att läsa sin egen konfiguration från en fil. Den koden som löser egenskapen "läsa sin egen konfiguration från fil" finns alltså i alla klasser som har den egenskapen.

Låter man ett trait implementera den funktionen så finns den på en plats och alla klasserna kan använda traitet och dela implementationen. Vill man uppdatera och förändra koden i traitet så är det endast en plats man behöver ändra i, trots att ändringen påverkar ett större antal klasser.

Så här kan ett trait definieras.

```php
trait ConfigurationFromFileTrait
{
    // Here comes ordinary declarations as within any class. 
}
```

Så här ser det ut när en klass använder ett trait.

```php
class ViewContainer
{
    use ConfigurationFromFileTrait;
}
```

Här är alltså en klass `ViewContainer` som via traitet `ConfigurationFromFileTrait` skaffar sig en egenskap om att läsa sin konfiguration från en fil.

Vi skall snart se mer om hur ett trait och en klass samverkar.



Läs mer om trait {#mer}
----------------------------------

Du kan läsa kort om konstruktionen [Trait på Wikipedia](https://en.wikipedia.org/wiki/Trait_(computer_programming)).

I [PHP-manualen finns ett stycke om Traits](http://php.net/manual/en/language.oop5.traits.php).
