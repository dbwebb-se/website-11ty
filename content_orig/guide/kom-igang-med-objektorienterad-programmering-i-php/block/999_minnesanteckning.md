---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Minnesanteckning
==================================

Mina egna minnesanteckningar för saker som kan ingå (mer) i guiden. Eller inte. Tankar om att utveckla guiden.

* Autoloader using composer
* Exceptions
* Magic methods


Kasta tärningsserie
Histogram
Game 21, blackjack
Yatsy

Länka/föreslå verktyg för UML

Länk till UML-filen.
https://drive.google.com/file/d/1qyCqGJYWFAbEWrTdOPaFGyo4B2jQB6CN/view?usp=sharing

###PHP stödjer inte multipelt arv {#arv-mult}

PHP är ett språk som har stöd för ett arv, en klass kan ärva från en annan klass. I vissa objektorienterade programmeringsspråk, till exempel C++, finns stöd för multipelt arv. Där kan en klass ärva från flera andra klasser. Är man van vid programmeringsspråk som stödjer multipelt arv kan man vid första anblicken känna avsaknaden av det. Men, det handlar om strukturering av koden och i programmeringsspråk som PHP, och andra som inte har valt att implementera multipelt arv, får man ta till andra lösningar för att strukturera sin kod. I PHP heter dessa *[interface](#interface)* och *[trait](#traits)*.

Men, vi pratar mer om trait och interface lite senare.
