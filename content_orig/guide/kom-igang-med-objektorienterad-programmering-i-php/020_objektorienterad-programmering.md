---
author: mos
revision:
    "2019-03-25": "(B, mos) Genomgången inför vt19."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Objektorienterad programmering
==================================

Objektorienterad programmering är *en* av många programmeringsparadigmer. Ett programmeringsspråk sorteras vanligen in i en programmeringsparadigm för att beskriva hur man kan koda i det. Många språk stödjer flera programmeringsparadigmer, man kan alltså välja hur man skriver sin kod, enligt en eller flera paradigmer. Ett vanligt sätt att lära sig programmera är "[procedural programmering](https://en.wikipedia.org/wiki/Procedural_programming)". Det är det sättet du använder i guiden "[Kom igång med programmering i PHP](kunskap/kom-i-gang-med-php-pa-20-steg)". Men nu handlar det alltså om den [objektorienterade programmeringsparadigmen](https://en.wikipedia.org/wiki/Object-oriented_programming).



Objekt {#objekt}
----------------------------------

I objektorientering finns objekt. Ett objekt har medlemsvariabler (properties) och metoder (funktioner kopplade till ett objekt).

Medlemsvariablerna används för att lagra ett *state* av ett objekt, ett visst läge som definieras av värdet på dess medlemsvariabler. När man vill ändra ett läge för objektet, eller bara använda objektet för att utföra en uppgift, då använder man dess metoder. Metoderna är en förteckning över vad objektet kan göra. Vi kan kalla det objektets API.

Ett objekt har all sin förmåga samlad i metoder och properties. Allt som objektet behöver lagra finns i dess medlemsvariabler och allt man kan göra med objektet exponeras via dess metoder.

Exakt hur objektet verkställer saker och ting är objektets ansvar. Man kan säga att objektet *kapslar in* detaljerna för implementation och erbjuder endast ett publikt API (gränssnitt) i form av metoderna. Själva implementationen av metoderna är en sak för objektet själv. 



Klass {#klass}
----------------------------------

Ett objekt skapas utifrån en klass. En klass är en mall utifrån vilken man kan skapa nya objekt.

När man skapat ett objekt kallas det en "instans av klassen". Att skapa ett objekt kallas även att [instansiera](http://en.wikipedia.org/wiki/Instance_(computer_science)) klassen till ett objekt, eller att instansiera ett objekt av klassen.

PHP stödjer objektorientering via klasser, objekt och vanliga objektorienterade konstruktionerna som normalt förekommer i objektorienterade programmeringsspråk.

Objektmodellen i PHP kom i version 5 av språket, i tidigare versioner fanns en förenklad implementation av objektorientering. 



Objekt utan klasser? {#objekt-ej-klass}
----------------------------------

I flera språk kan man skapa ett objekt som en datastruktur, utan att utgå från en klass. Det kan man även göra i PHP. I ett sådant fall använder man objektet mer som en lagringsstruktur, att jämföra med till exempel datastrukturen array.

Men, när vi nu fortsätter att prata om objektorientering så är det främst objekt och klasser vi kommer att prata om, och de konstruktioner som där passar in.



Manualen {#manualen}
----------------------------------

Vår bästa vän är som vanligt manualen som har beskrivningar över datatypen ["object"](http://php.net/manual/en/language.types.object.php) och en översikt över det som hör till [objekt och klasser](http://php.net/manual/en/language.oop5.php) i övrigt.

> *Referensmanualen är din bästa vän.*

Låt oss skriva en klass.
