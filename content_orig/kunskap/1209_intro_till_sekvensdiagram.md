---
author: aar
revision:
    "2022-01-26": (A, aar) Första versionen, kopierad från "intro_till_uml".
category:
    - oopython
...
Introduktion till sekvensdiagram
===================================

[FIGURE src=/image/oopython/kmom02/bookRegisterSeq.png?w=c5 class="right"]

Sekvensdiagram är ett beteendediagram som visar en mer dynamisk vy av ett system.

<!--more-->


Beteendediagram {#beteende_diagram}
-------------------------------

beteendediagram visar det dynamiska beteendet ett system har och beskriver systemets funktionalitet.


###Sekvensdiagram {#sekvens_diagram}


[FIGURE src=/image/oopython/kmom02/diagrams/restaurant.png caption="Simpelt sekvensdiagram som visar flödet i en restaurang"]

Sekvensdiagram visar hur olika processer kommunicerar med varandra inom en tidssekvens och i vilken ordning. Med process syftar man oftast på objekt som kommunicerar via metoder.
Det är viktigt med ordningen av kommunikationen mellan objekten och när det händer på tidslinjen.

Med sekvensdiagram kan vi visa vilka klasser som finns/behövs i ett system och vilka metoder de använder för att kommunicera med varandra för att uppfylla ett scenario.

Om vi tittar på bilden ovanför, sekvensdiagrammet med restaurangen. Den visar vilka människor(klasser/objekt) som behövs och hur de kommunicerar för att en kund ska kunna äta mat hos dem. I den gröna rutan kan vi se vilken person/klass varje linje syftar på och vad personen/klassen gör. Kunden Fred beställer mat av kyparen Bob som för vidare den till kocken Hank. Under tiden som Hank lagar maten så serverar Bob vin till Fred. När Hank är klar med maten förs den vidare till Bob som till slut ger maten till kunden. När Fred har ätit klart går han till kassören Renee och betalar. Sen är scenariot slut.


####Lifeline {#lifeline}

[FIGURE src=/image/oopython/kmom02/diagrams/lifeLines.png caption="Actor lifeline och Objekt lifeline"]

Ovanför ser vi två stycken **lifelines** en som representerar en Actor och en som representerar ett anonymt objekt av klassen Object. En Actor är en användare till systemet, någon som startar ett händelseförlopp.  
Objekt lifelines består av en rektangel i toppen som innehåller klassens namn, med ":" framför, och en vertikal linje. Linjen representerar objektets livstid.  
För att specificera vilken instans av en klass som ska användas lägger man till instansens namn framför ":", t.ex. "Andreas:Person". Det visar att objektet Person med namnet Andreas ska användas specifikt.



####Funktionsanrop {#funktionsanrop}

[FIGURE src=/image/oopython/kmom02/diagrams/syncCall.png caption="Ett funktionsanrop"]

Så här ser ett **funktionsanrop** ut. Den svarta ifyllda pilen motsvarar ett synkront funktionsanrop, t.ex. ett objekt av klass X anropar klass Y's metod doA.
Tiden det tar för Y att exekvera doA representeras av den vertikala stången. När doA är klar returnerar den ett resultat tillbaka till X, det representeras med den streckade pilen.


Nedanför visas kod, för att registrera en bok på ett bibliotek, och sen hur det ser ut som ett sekvensdiagram.

```python
class Library:
    def __init__(self):
        self.book_register = BookRegister()

    def register_book(self, isbn):
        self.book_register.register_book(isbn)

class BookRegister:
    def __init__(self):
        self.books = []

    def register_book(self, isbn):
        return self.books.append(isbn)
```

[FIGURE src=/image/oopython/kmom02/diagrams/bookRegisterSeq.png caption="Sekvensdiagram av bok registrering"]

Vi har en systemanvändare, Librarian, som lägger till en ny bok i bibliotekets system. Librarian gör något i GUI:et så att metoden register_book() anropas i klassen Library som i sin tur anropar BookRegister's metod register_book(). register_book() tar ett ISBN nummer som argument, lägger till boken i systemet och returnerar en boolean, om den lyckas eller inte. Vi behöver inte visa upp anrop till funktioner som inte vi skapat, t.ex. `.append()` på en lista.


####Loop {#loop}


[FIGURE src=/image/oopython/kmom02/diagrams/loopImg.png caption="Sekvensdiagram med loop"]

Diagrammet ovan visar händelseförloppet när en kassörska använder ett säljsystem för att behandla en ny kund.  
Actor:n **Cashier** gör något med systemet så att metoden start_new_sale() anropas i **System**. Där i skapar ett nytt objekt av klassen **Sale** och tilldelas till attributet `current_sale`, vi kan se det överst i lifeline rutan för klassen, `current_sale:Sale`.  
Sen sker en **loop** för varje item (produkt) Cashier slår in i systemet. Varje item läggs till i current_sale och total summan för current_sale, upp till den tidpunkten, returneras till System och den returnerar vidare till Cashier (skriver ut på någon display). När loopen är klar anropar Cashier make_payment(amount). I make_payment anropas metoden end_sale() i System, ett självanrop, som i sin tur anropas set_paid() i Sale. make_payment() returnerar success, vi utgår ifrån att hela summan har betalats. I nästa del lägger vi till en if-sats som kollar om hela summan inte betalas.

Det som händer inuti **loop** rutan kommer upprepas X antal gånger. Om man vill specificera att det ska upprepas t.ex. 10 gånger ersätter man "loop" uppe i vänstra hörnet med "loop(10)".

####Alt {#alt}


[FIGURE src=/image/oopython/kmom02/diagrams/if_self_img_seq.png caption="Sekvensdiagram med if-sats"]

Vi har lagt till en if-sats som kollar att kunden har tillräckligt med pengar för att köpa alla produkter. Översta delen av diagrammet är oförändrad. I make_payment() i System har vi lagt till en if-sats som kollar om `amount==totalSum`. Om det är sant sker händelserna som finns i den övre halvan av "alt"-rutan, annars sker det som finns i den nedre halvan. Om det var sant sker saker som i förra diagrammet och success returneras. Om det var falskt avbryts köpet med metoden cancel_sale() och fail returneras.

Om vi hade haft en if-elseif-else sats, t.ex. att amount är med än totalSum, hade vi bara lagt till en tredje ruta i "alt" mellan de två vi har. I den nya rutan visar vi flödet för det fallet och lägger till `[amount > totalSum]` överst för visa vilket villkor den gäller.

###Use case diagram {#use_case}

Use case diagram är en annan typ av beteendediagram och visar vilka användarna är som ska använda applikationen och vad de ska kunna göra i applikationen, t.ex. besökare på vår webbsida ska kunna söka efter en artikel. Läs lite om vad [Use case diagram](https://www.lucidchart.com/pages/uml-use-case-diagram?a=1) är, ni behöver inte veta hur man skapa egna men det bra om ni vet vad det är och vad det har för syfte.



Avslutningsvis {#avslutning}
------------------------------

Det finns bra verktyg online för att rita uml diagram, kolla in [draw.io](https://www.draw.io) och [websequencediagrams](https://www.websequencediagrams.com/).

För att läsa mer om sekvensdiagram och vad man mer kan göra med dem kolla här: [sequence diagrams](http://www.uml-diagrams.org/sequence-diagrams.html).
