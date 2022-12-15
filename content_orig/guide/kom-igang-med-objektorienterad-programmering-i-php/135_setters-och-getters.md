---
author: mos
revision:
    "2018-03-19": "(A, mos) Första versionen, uppdelad av större dokument."
...
Setters och Getters
==================================

Vi kan ge tillgång till att läsa klassens privata delar via getters och vi kan låta klassens användare sätta privata värden via setters.

Spara koden du skriver i denna övningen i `index_setters.php` och `src/Person3.php`.



Lägg till Setters i klassen {#setters}
----------------------------------

Vi tar en kopia av klassen `src/Person2.php` och sparar den som `src/Person3.php`.

Vi lägger till en metod `setAge()` där användaren kan sätta åldern på personen.

```php
/**
 * Set the age of the person.
 *
 * @param int $age The age of the person.
 *
 * @return void
 */
public function setAge(int $age)
{
    $this->age = $age;
}
```

Lägg själv till metoden `setName()`.

När man använder setters så kan man kontrollera vilka värden som sätts på medlemsvariabeln, det kan man inte göra om variabeln är publik.

Normalt lägger du bara till setters när de behövs, lägg inte till setter-metoder bara för att du kan.



Lägg till Getters i klassen {#getters}
----------------------------------

Vi kan sätta värdet på `age` och `name` men vi kan inte läsa det, förutom via metoden `details()`. Låt oss därför skapa getter-metoder som returnerar värdet på medlemsvariablerna.

Först visar jag hur `getAge()` kan se ut, sedan gör du själv `getName()`.

```php
/**
 * Get the age of the person.
 *
 * @return int as the age of the person.
 */
public function getAge()
{
    return $this->age;
}
```

Liksom setters så lägger man bara till getters när de behövs.



Testprogram för getters och setter {#test}
----------------------------------

Gör nu ett testprogram `index_setters.php` där du visar hur du både sätter och hämtar värden från objektet, via dina setters och getters.
