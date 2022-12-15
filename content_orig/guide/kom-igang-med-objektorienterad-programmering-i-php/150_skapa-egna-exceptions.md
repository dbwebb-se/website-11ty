---
author: mos
revision:
    "2019-03-25": "(B, mos) Genomgången inför vt19."
    "2018-03-23": "(B, mos) Wrong filename for Exception in second paragraph."
    "2018-03-19": "(A, mos) Första versionen, uppdelad av större dokument."
...
Skapa egna exceptions
==================================

Du kan skapa egna exceptions med klasser. Det kan göra din felhantering tydligare.

Spara koden du skriver i denna övningen i `index_exception_own.php`, `src/Person5.php` och i `src/PersonAgeException.php`.



Fördefinierade exception i PHP {#stdexcept}
----------------------------------

I PHP finns ett antal [fördefinierade exceptions](http://php.net/manual/en/reserved.exceptions.php) man kan använda. Det finns även [exceptions definierade i SPL](http://php.net/manual/en/spl.exceptions.php). SPL står för "Standard PHP Library".

Men kan man skapa sin egna typ av Exception?



Ett anpassat exception PersonAgeException {#personex}
----------------------------------

Säg vi vill ha ett specifikt exception för klassen Person, säg `PersonAgeException` som kastas när personen har en icke giltig ålder av negativa integer.

Vi kan utöka basklassen för alla exception, och skapa vårt eget exception, så här.

```php
/**
 * Exception class for PersonAgeException.
 */
class PersonAgeException extends Exception
{
}
```

Spara ovan kod i filen `src/PersonAgeException.php`.

Vi säger att vårt exception utökar, _extends_, typen `Exception` som är bastypen för alla exceptions.

I objektorientering kallas detta för arv, eller sublassing, eller specialisering. Men det pratar vi mer om lite senare.



Kasta exception PersonAgeException {#personex}
----------------------------------

Vi tar en kopia av klassen `src/Person4.php` och sparar den som `src/Person5.php`.

Vi låter nu klassen kasta ett exception av typen `PersonAgeException` när någon försöker sätta åldern till ett negativt tal, antingen via konstruktorn eller via settern.

Så här kan det se ut i settern.

```php
/**
 * Set the age of the person.
 *
 * @throws PersonAgeException when age is negative.
 *
 * @param int $age The age of the person.
 *
 * @return void
 */
public function setAge(int $age)
{
    if (!(is_int($age) && $age >= 0)) {
        throw new PersonAgeException("Age is only allowed to be a positive integer.");
    }
    $this->age = $age;
}
```

Uppdatera konstruktorn så att den innehåller liknande kod som kastar exception när någon försöker instansiera ett objekt med en negativ ålder.



Testa och fånga ett anpassat exception {#test}
----------------------------------

Vi bygger ett testprogram `index_exception_own.php` för att testa hur det ser ut när vårt exception kastas.

```php
$person = new Person5("MegaMic");
$person->setAge(-42);

$person = new Person5("MegaMic", -42);
```

Resultatet blir så här.

[FIGURE src=image/snapvt18/oophp-exception-own.png?w=w3 caption="Ett exception av typen PersonAgeException är kastat."]

I stacktracet som visas så ser vi raden som anropar koden som kastar exception.

Om vi utökar vårt testprogram och fångar det första exceptionen så kan vi även testa att konstruktorn kastar ett exception.

```php
try {
    $person = new Person5("MegaMic");
    $person->setAge(-42);
} catch (PersonAgeException $e) {
    echo "Got exception: " . get_class($e) . "<hr>";
} 

$person = new Person5("MegaMic", -42);
```

Resultatet kan se ut så här.

[FIGURE src=image/snapvt18/oophp-exception-own2.png?w=w3 caption="Nu kastas två exception, men det första fångas."]



Fördel med egna exception {#fordel}
----------------------------------

När man utvecklar moduler som andra skall återanvända, eller större programvara som består av ett större antal moduler, så kan det vara fördelaktigt att använda modulespecifika exceptions. Det kan ge tydlighet och läsbarhet vid felhanteringen.

Men glöm inte bort att det finns ett gäng inbyggda exceptions, de går också bra att använda.



Om exception i PHP {#omexception}
---------------------------------

Du kan läsa på i manualen om hur [PHP hanterar exceptions](https://www.php.net/manual/en/language.exceptions.php), det handlar om grundkonstruktioner som `try`, `catch` och `throw`.
