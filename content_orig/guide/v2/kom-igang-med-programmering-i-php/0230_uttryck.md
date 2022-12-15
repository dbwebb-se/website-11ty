---
author: mos
revision:
    "2020-08-13": "(C, mos) Uppdelad i flera dokument i v2."
    "2018-06-20": "(B, mos) Bort med kommentarer och lade till uttryck."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Uttryck
=======================

Om uttryck.

---

Låt oss titta på byggstenarna i språket och hur de hänger ihop. Vi kan kalla det en del av språkets syntax, det regelverk som säger hur man kan skriva koden.



Uttryck (expression) {#uttryck}
-----------------------

I php kan vi sammanfatta ett uttryck som "allt som har ett värde". Uttryck kan till exempel vara en tilldelning av en variabel, en addition av två tal eller en jämförelse.

Låt oss titta på ett par exempel av uttryck.



### Tilldelning av tal {#tilldela}

Här är ett exempel på där uttryck används.

```php
// Tilldelning av ett tal till en variabel
$a = 7;
```

I exemplet ovan är `7` ett uttryck i sin enklaste form. Resultatet av det uttrycket tilldelas variabeln `$a`. Efter tilldelningen så innehåller variabeln värdet 7.

I exemplet är också `$ = 7` ett uttryck i sig självt, det lämnar kvar resten av uttrycket som i detta fallet är 7. Man kan testa det genom att skriva ut värdet från uttrycket.

```php
// Ett udda sätt att inspektera och skriva ut resultatet av en tilldelning
echo ($a = 7);
```



### Anrop av funktion som ger ett värde {#func}

En konstruktion som också är ett uttryck är anropet av en funktion.

```php
// En funktion definieras
function theAnswer()
{
    return 42;
}

// Funktionen anropas och efterlämnar ett resultat som tilldelas variabeln
$a = theAnswer();
```

I exemplet ovan definieras en funktion som returnerar talet 42. När funktionen anropas via `theAnswer()` så är det ett uttryck som ger ett resultat som tilldelas variabeln `$a`.



### Jämförelse {#jamfor}

En annan konstruktion som är ett uttryck och ger ett värde är en jämförelse mellan två tal, eller två strängar.

```php
// Jämför två tal efterlämnar ett värde
echo ( 42 > 7 );
```

Ovan skriver vi ut resultatet av en jämförelse. Själva jämförelsen `42 > 7` efterlämnar ett resultat som är sant `true` om jämförelsen är uppfylld, annars efterlämnar den ett falskt `false` värde.

Denna typen av jämförelser använder vi ofta i konstruktioner som villkorssatser och loopar.

Men i dess enkelhet är det här ett exempel på ett uttryck, ett expression.
