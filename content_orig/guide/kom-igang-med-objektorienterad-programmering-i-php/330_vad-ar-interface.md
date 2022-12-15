---
author: mos
revision:
    "2018-04-15": "(A, mos) Första versionen."
...
Vad är Interface?
==================================

Vi tittar på konstruktionen Interface och ser hur den kan användas tillsammans med arv, komposition och trait. Det blir ytterligare en objektorienterad konstruktion som hjälper oss att strukturera upp vår kod i delar.

Vi skriver ännu ingen kod.

Vi börjar med att titta på grunden vad ett interface är.



Interface är ett kontrakt {#interface}
----------------------------------

Vi säger att ett interface är ett kontrakt där en klass lovar att erbjuda en viss uppsättning metoder.

En klass kan implementera ett interface, det innebär att klassen förbinder sig att erbjuda ett API som motsvaras av interfacet.

Ett interface innehåller ingen kod som en klass kan återanvända, det är bara ett löfte om att interfacets metoder skall återfinnas inuti klassen.

När man vet att en klass implementerar ett visst interface så vet man också vad man kan göra med den klassen. Man vet att klassen kan hanteras på ett visst sätt.



Att läsa från fil som kontrakt {#fromfile}
----------------------------------

Vi fortsätter med vårt exempel där klassen `ViewContainer` kan läsa från fil genom att använda ett trait `ConfigurationFromFileTrait` som gav den egenskapen.

Så här såg traitet ut.

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

Allt fungerar som tänkt. Men om vi låter klassen `ViewContainer` implementera ett givet interface `ConfigurationFromFileInterface` så anger detta tydligt att klassen verkligen erbjuder ett interface att det kan läsa sin konfiguration från fil.

Deklarationen av interfacet kan se ut så här. Det liknar en deklaration av klass eller trait, men nyckelordet är `interface` och de metoder som anges har ingen body. Det finns heller inga medlemsvariabler i ett interface. Et interface är ett löfte om vilket API en klass erbjuder.

```php
interface ConfigurationFromFileInterface
{
    /**
     * Read configuration from file.
     *
     * @param 
     *
     * @return array with the configuration items.
     */
    public function loadConfigurationFromFile($file);
}
```

När klassen `ViewContainer` väljer att implementera interfacet så berättar den inte hur den skall lösa metoderna, den säger bara att den kommer att lösa det.

```php
class ViewContainer implements ConfigurationFromFileInterface
{
    use ConfigurationFromFileTrait;
}
```

I detta fallet kan man anta att det är traitet som innehåller implementationen av interfacet. Men det finns ingen sådan hård koppling. Klassen kan själv välja att implementera metoderna som interfacet kräver.



Läs mer om interface {#mer}
----------------------------------

Du kan läsa kort om konstruktionen [Interface på Wikipedia](https://en.wikipedia.org/wiki/Protocol_(object-oriented_programming).

I [PHP-manualen finns ett stycke om Interface](http://php.net/manual/en/language.oop5.interfaces.php).
