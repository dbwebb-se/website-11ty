---
author: mos
revision:
    "2019-03-25": "(B, mos) Genomgången inför vt19."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Objekt
==================================

Vi inleder med att se hur vi kan använda ett objekt i PHP, _utan_ att ha en klass som mall för objektet.

Spara koden du skriver i denna övningen i `index_stdclass.php`.



Standardobjekt {#stdobj}
----------------------------------

I PHP finns en fördefinierad klass som heter [`stdClass`](http://php.net/manual/en/reserved.classes.php). Med hjälp av den kan vi skapa ett tomt objekt via operatorn `new`.

```php
$object = new stdClass();
var_dump($object);
```

Vi säger att vi skapar ett nytt `new` objekt, eller instans, av klassen `stdClass`.



Mutable objekt {#mutable}
----------------------------------

Objekten vi skapar är _mutable_ och kan förändra sin struktur över sin levnadstid. Ett objekt som är _immutable_ är motsatsen och där kan man inte lägga till eller ta bort attribut från objektet. Immutable objekt följer en fast mall som klassen erbjuder. Mutable objekt kan förändras och medlemmar kan läggas till eller tas bort.

Vår instans av `stdClass` är mutable och vi kan lägga till två properties.

```php
$object = new stdClass();
$object->age = 42;
$object->details = function() {
    echo "Hi, I'm an object!";
};

echo ($object->details)() . " " . $object->age;
var_dump($object);
```

I koden lägger jag till en property `age` till objektet. Jag lägger även till en _closure_ som kan anropas som en funktion via propertyn `details`.

Konstruktionen `($object->details)()` är lite speciell i sammanhanget, men låt det bara vara så, det är inget vi fördjupar oss i just nu.

Så här kan det se ut när koden körs.

[FIGURE src=image/snapvt18/oophp20-stdobject.png?w=w3 caption="Detaljer om det mutable objektet skrivs ut."]

Eftersom du troligen känner till andra programmeringsspråk så ville jag visa hur PHP fungerar med dessa klasslösa objekt. Man kan se på detta objektet som en variant av datastrukturer där ett alternativ är att använda arrayer.



Piloperatorn `->` {#pil}
----------------------------------

När man accessar ett objekts properties (eller medlemmar) så använder man piloperatorn `->`. Du kunde se hur jag gjorde det i föregående exempel.



Allt publikt {#publikt}
----------------------------------

Så som mitt `$object` fungerar så är all information publik och nåbar för den som använder objektet.

När vi pratar objektorientering brukar vi prata om inkapsling och att användaren av objektet bara har tillgång till viss information, men till det behövs en mer anpassad klass.

Låt oss då gå över till klasser.
