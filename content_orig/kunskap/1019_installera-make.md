---
author: mos
category:
    - labbmiljo
    - make
revision:
    "2018-10-25": "(B, mos) Genomgång, mindre justering."
    "2016-10-14": "(A, mos) Första utgåvan."
...
Installera Make
===================================

[FIGURE src=/image/snapvt16/make.png?w=c5&a=0,70,0,0 class="right"]

Vi skall installera verktyget Make.

Make är ett klassiskt utvecklarverktyg. För min egen del kom jag i kontakt med det när jag kompilerade C/C++ kod.

Men, Make är så mycket mer och det kan underlätta vardagen, för en webbprogrammerare, att ha ett *bygg-verktyg* likt Make, i sin verktygs-arsenal.


<!--more-->




Läs mer {#mer}
-------------------------------

Läs mer om Make på [webbplatsen om GNU Make](http://www.gnu.org/software/make/).



Förutsättning {#pre}
-------------------------------

Du har installerat de [grundverktyg](labbmiljo) som ligger till grund för samtliga kurser.



Installera på Windows Cygwin {#windows}
-------------------------------

Installera i Cygwin genom att installera make med pakethanteraren apt-cyg.

```text
apt-cyg install make
```

Testa att make fungerar.

```text
make --version
```

Det finns mer tester längre ned i artikeln.



Installera på Mac OS {#macos}
-------------------------------

Kommandot make är redan installerat på din Mac. 

Testa att make fungerar.

```text
make --version
```

Det finns mer tester längre ned i artikeln.



Installera på Linux och Windows 10 Bash {#linux}
-------------------------------

Installera med apt-get eller motsvarande pakethanterare.

```text
sudo apt-get install make
```

Testa att make fungerar.

```text
make --version
```

Det finns mer tester längre ned i artikeln.



Verifiera att Make fungerar {#test}
-------------------------------

Skapa en liten makefile. Kopera följande kod och spara en en fil som du döper till `Makefile`.

Se till att du använder riktiga tabbar i din makefil. Troligen är din texteditor redan inställd på att makefiler vill ha riktiga tabbar. Men när du kopierar in kod, som i detta fallet, så kanske det inte blir riktiga tabbar. Då får du fixa in det för hand. Annars får du ett felmeddelande i stil med detta.

> Makefile:8: *** missing separator.  Stop.

Då prövar vi. Spara följande som en ny fil `Makefile` i en tom katalog som du skapar enbart för detta syftet.

```text
#
# This is a comment
# Remember to use real tabs in the Makefile, no soft tabs (spaces).
#

# A make target
help:
    @echo "This is a sample makefile having two targets of help and hello."

# Another make target
hello:
    @echo "Hello World in a makefile using make."
```

Om du får problem så hittar du filen i kursrepot för design-kursen i [`example/Makefile`](https://github.com/dbwebb-se/design/blob/master/example/make/Makefile).

Nu kan du köra kommandot `make` i samma katalog som du sparade filen `Makefile`.

Pröva följande kommandon.

```text
make
make help
make hello
```

Kommandot make utför alltså de targets som finns i en makefil. Tanken är att använda makefilen för att samla upp de vanliga sekvenser av kod som vi vill göra. Det är så vi tänker använda make.



Avslutningsvis {#avslutning}
------------------------------

Ställ frågor, eller dela med dig av dina tips och trix, i forumtråden om [make och makefiler](t/5800).
