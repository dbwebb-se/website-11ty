---
author: aar
revision:
    "2018-11-16": "(A, aar) Första versionen"
...
Objektorienterad terminologi
=======================

Här beskrivs vanliga koncept in OO, om du inte har gått igenom hela guiden än räcker det om du skannar sidan och får ett hum om vad det handlar om. Koncepten beskrivs mer djupgående i guiden och denna sidan är mer en referenslista som ni kan gå tillbaka till för att få en överblick av vad ett koncpet är.

* **Klass**: En användardefinierad prototyp för ett objekt som definierar en uppsättning attribut som karaktäriserar alla objekt av klassen. Attributen är klassattribut och instansattribut, som nås via "dot-notation".

* **Klassattribut**: En variabel som delas mellan alla instanser av klassen. Den definieras inuti klassen men utanför klass-metoderna. Ett klassattribut kallas även _statiskt attribut.

* **Instansattribut**: En variabel som är definierad inuti en klass. Den tillhör enbart den instansen av klassen.

* **Instans**: Ett individuellt (unikt) objekt av en klass.

* **Objekt**: En instans av en klass.

* **Metod**: En funktion som är definierad inuti en klass.

* **Statisk metod**: En metod i klassen som fungerar oberoende av klassen och _self_.

* **Klassmetod**: En metod i klassen som är kopplad till klassen istället för en instans.

* **Data inkapsling**: Att bundla data med metoderna som använder datan.

* **Operatoröverlagring**: När en klass har implementerat en metod för en operator. "Operator overloading" på engelska.

* **Överskugga**: När en subklass har en metod med samma namn och antal parametrar som en metod i basklassen. "Override" på engelska. 

* **Information hiding**: Att man gömmer intern data, så att den inte kan användas på fel sätt. Hittar ingen bra översättning till svenska.

* **Data abstraktion**: Om både data inkapsling och information hiding används är det data abstraktion. Data abstraction på engelska.

* **Arv**: _is-a_ relation mellan två klasser. En `Square` is a `Shape`, Square är en subklass till Shape och ärver metoder och attribut.

* **Aggregation**: _has-a_ relation mellan två klasser med svag koppling. Ett objekt från en klass äger ett objekt av en annan klass. En `Pond` has a  `Duck`. Ett Duck objekt kan existera utanför ett Pond objekt.

* **Komposition**: _has-a_ relation mellan två klasser med stark koppling, en typ av aggregation. Ett objekt från en klass äger ett objekt av en annan klass och styr livscykeln för det ägda objektet. Ett `House` has a  `Room`. Ett Room objekt kan inte existera utanför ett House objekt.



### Information hiding

| Implementation | Typ     | Syfte                                                                                 |
|----------------|---------|---------------------------------------------------------------------------------------|
| name           | publik  | Kan användas hur som helst, var som helst och av vem som helst.                       |
| _name          | skyddad | Använd inte om du inte vet vad du gör. Använd på egen risk                            |
| __name         | manglad | Hindra subklasser från att överskugga metoder och attribut.                           |
