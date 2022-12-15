---
author:
    - mos
revision:
    "2018-12-10": "(C, mos) Uppdaterad inför ramverk1 v2."
    "2017-09-11": "(B, mos) Första releasen med allt klart."
    "2017-09-05": "(A, mos) Första utgåvan."
...
Kmom06: Databasdrivna modeller
==================================

[WARNING]

**Arbete pågår**.

[/WARNING]

<!--stop-->

Vi skall titta på klasser i modelllagret och utöka vår ramverksstruktur med formulärhantering via klasser och metoder samt databasdrivna modellklasser där vi använder oss av designmönstret Active Record.

Vi skall använda en extern modul för htmlformulär och vi skall använda en extern modul för databashanteringen.

I arbetet skapar vi basklasser i modellagret som underlättar då vi implementerar applikationsspecifik kod. Vi kan se det som vi bygger upp modellklasser som kan scaffoldas fram. Det blir en form av strukturerad återanvändning och ett försök att effektivisera vårt kodande.

I vårt arbete kommer vi i kontakt med designmönstret Active Record och en implementation av databasen, en query builder som erbjuder metoder för att programmatiskt skapa SQL-koden.

<!--more-->

Det blir ett klassiskt exempel med användare, men koden ser annorlunda ut, mot våra tidigare konstruktioner.

[FIGURE src=image/snapht17/create-user-4.png?w=w3 caption="Förbereder mig att skapa en ny användare."]

Men, utsidan, användargränssnittet ser ut som tidigare.

[FIGURE src=image/snapht17/login-user-1.png?w=w3 caption="Första försöket, redo att logga in med rätt akronym och rätt lösenord."]

Vi avslutar med att automatisk generera kod för ett helt CRUD-exempel, det är kraften i scaffolding och rätt använt kan det snabba upp vissa delar i vårt dagliga kodande.

[FIGURE src=image/snapht17/book-all.png?w=w3 caption="En lista av böcker i ett exempel med CRUD."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*



### Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Bekanta dig med begreppet [Active record](https://en.wikipedia.org/wiki/Active_record_pattern) genom att översiktligt titta på Wikipedias information. Se referenserna till implementationer i PHP och välj ut några av dem och titta översiktligt på dem. Du vill skaffa dig en känsla för hur olika ramverk jobbar mot databaser.

1. Bekanta dig översiktligt med begreppet "[Object-relational mapping](https://en.wikipedia.org/wiki/Object-relational_mapping)" via Wikipedia.

1. Artikeln PHP The Right Way innehåller ett kort stycke om "[Abstraction Layers (Databases)](http://www.phptherightway.com/#databases_abstraction_layers)", läs igenom det som en introduktion och kika på de länkar som leder till olika ramverks implementationer av databas-moduler.



### Videor {#videor}

Kika på följande videor.

1. Jag försökte finna en video som visade innebörden av Active Record och fann "[Easy PHP Database Handling With PHP ActiveRecord](https://www.youtube.com/watch?v=9Oau7fLiq7Y)", kika på den som ett komplement till artiklarna nedan.



### Designmönster {#designpattern}

Kika kort på följande designmönster som hanterar varianter av hur man kan mappa objekt mot databasen.

* [Active Record](https://www.martinfowler.com/eaaCatalog/activeRecord.html)
* [Data Mapper](https://martinfowler.com/eaaCatalog/dataMapper.html)
* [Repository](https://martinfowler.com/eaaCatalog/repository.html)
* [Table Data Gateway](https://martinfowler.com/eaaCatalog/tableDataGateway.html)
* [Row Data Gateway](https://martinfowler.com/eaaCatalog/rowDataGateway.html)
* [Query Object](https://martinfowler.com/eaaCatalog/queryObject.html)

Du hittar fler designmönster i "[Catalog of Patterns of Enterprise Application Architecture](https://martinfowler.com/eaaCatalog/index.html)". Att studera olika designmönster är ett sätt att bli en bättre programmerare.



### Ramverk referenser {#referenser}

Undersök hur (minst) ett av ramverken jobbar med den hantering som kursmomentet omfattar. Kanske vill du spara detta till sist då du vet mer om begrepp som scaffolding, formulärhantering och designmönstret Active Record. Det kommer frågor du skall besvara under stycket Resultat & Redovisning.

* [Dokumentationen för Symfony](https://symfony.com/doc/current/).
* [Dokumentationen för Laravel](https://laravel.com/docs/5.7).
* [Dokumentationen för Phalcon](https://docs.phalconphp.com/en/).
* [Dokumentationen för Yii](https://www.yiiframework.com/doc/guide/2.0/en).



### Anax moduler {#anax-moduler}

I detta kursmoment används främst följande moduler.

* [anax/htmlform](https://github.com/canax/htmlform)
* [anax/database](https://github.com/canax/database)
* [anax/database-query-builder](https://github.com/canax/database-query-builder)
* [anax/database-active-record](https://github.com/canax/database-active-record)

Modulernas README _kan_ i vissa delar innehålla värdefull information för den som vill fördjupa sig i hur man jobbar med modulerna.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*



### Övningar {#ovningar}

Gör följande övningar, de behövs för att klara uppgifterna som bygger på övningarna.

1. Jobba igenom artikeln "[Anax och formulärhantering-v2](kunskap/anax-och-formularhantering-v2)" som visar hur du använder en extern modul för formulärhatering och hur du integrerar den i Anax. Du sparar koden i en underkatalog under `me/kmom06`.

1. Jobba igenom artikeln "[Anax och databasdrivna modeller (v2)](kunskap/anax-och-databasdrivna-modeller-v2)" som visar hur du använder en extern modul för databashantering för att använda dig av designmönstret Active Record för att jobba med formulär och databaser. Du jobbar vidare med samma kodbas som i artikeln ovan.

1. Fortsätt fördjupa dig i databasdrivna modeller med ett exempel genom att jobba igenom artikeln "[Anax med databasdrivna modeller enligt Active Record, ett exempel (v2)](kunskap/anax-med-databasdrivna-modeller-enligt-active-record-ett-exempel-v2)". Du får jobba igenom ett exempel med CRUD som länkar samman formulär med active records. Du får en basstruktur för databasdrivna modellklasser som bygger på formulär. Du jobbar vidare med samma kodbas som i artikeln ovan.



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Integrera Bok-exemplet i din me-sida](uppgift/integrera-bok-exempel-i-din-me-sida)". Uppgiften bygger på de övningsartiklar du jobbat igenom. Ändringar gör du under `me/redovisa`.

1. Pusha och tagga din redovisa, allt eftersom och sätt en avslutande tagg (6.0.\*) när du är klar med kursmomentet.

<!--
1. Gör uppgiften "[Kommentarssystem med användare](uppgift/kommentarssystem-med-anvandare)". Bygg vidare på ditt kommentarssystem och se till att integrera med användare. Spara koden under `me/anax`.
-->

<!--
1. Skriv gruppvis en artikel om ["Active record"](uppgift/skriv-artikel-om-active-record) (eller ORM, bra eller dåligt). Spara artikeln i din me-sida.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 2-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i momentet då redovisningstexten är aningen mer omfattande än normalt.

* Hur är din syn på modulen `anax/htmlform` och det koncept som modulen försöker lösa?
* Kan du hitta liknande lösningar när du tittar på andra ramverk?
* Berätta om din syn på Active record och liknande upplägg, ser du fördelar och nackdelar?
* När du undersökte andra ramverk, fann du motsvarigheter till Active Record och hur såg de ut?
* Vad tror du om begreppet scaffolding, ser du för- och nackdelar med konceptet?
* Hittade du motsvarighet till scaffolding i andra ramverk du tittade på?
* Hur kan man jobba med enhetstestning när man scaffoldat fram en CRUD likt Book, vill du utvecklar några tankar kring det?
* Vilken är din TIL för detta kmom?

Har du frågor eller funderingar som du vill ha besvarade så ställer du dem i GitHub issues.
