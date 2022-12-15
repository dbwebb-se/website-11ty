---
author: aar
revision:
    "2021-01-29": (C, aar) Skrev om artikeln så den förklarar tänket bakom enhetstester och la till mockning.
    "2019-01-12": (B, aar) Uppdaterade koden för phone och testerna.
    "2017-12-12": (A, lew) Updated for v2.
category:
    - oopython
...
Att skriva enhetstester
===================================

[FIGURE src=/image/oopython/kmom02/test_top.png class="right"]

Enhetstester, eller *unittester*, används för att testa att enskilda metoder eller funktioner gör vad vi förväntar oss. Till exempel om en metod ska returnera bool-värdet `True`, så ska den aldrig kunna returnera `False`.  

Vi ska titta lite närmare på de olika delarna av pythons inbyggda testramverk *unittest*. Vi hoppar inte i den djupa delen av bassängen, utan vi håller oss vid det grundläggande delarna.
Vill du läsa mer kan du kika på [docs.python.org](https://docs.python.org/3/library/unittest.html).

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i Python och du vet vad variabler, typer och funktioner innebär.



Varför ska man skriva enhetstester? {#varfor-ska-man-skriva-enhetstester}
------------------------------

Enhetstester skrivs som sagt av anledningen att minimera risken för "trasig" kod och för att validera funktionaliteten. I många lägen handlar det inte enbart om att du ska förstå koden, utan det kan finnas andra utvecklare som tar över ditt projekt eller bara ska hjälpa till. Då är det bra om det är testat ordentligt. Om man har svårt att förstå vad en funktion gör enbart av att läsa koden hjälper det ofta om det finns tester man kan köra och kolla vad olika inputs får för output.

Du vill även skriva tester för din egna skull, att ha bra tester på plats gör att när du skriver om kod eller lägger till ny kan du försäkra dig om att den gamla koden fortfarande gör vad vi förväntar oss. Det är också ett bra sätt att ha koll på buggar, varje gång du hittar en bugg i din kod skapar du ett testfall so kollar att buggen inte introduceras på nytt.



Vad är ett enhetstest? {#vad-ar-enhetstest}
------------------------------

Man kan säga att ett enhetstest är en metod som testar en liten del av en applikation för att verifiera delens beteende oberoende från andra delar av applikationen. Ett enhetstest har oftast tre delar:

* **Arrange** - Initiera en del av applikation till ett eftersökt tillståndet, t.ex. skapa variabler eller initiera objekt. För enklare tester behöver man inte denna delen.

* **Act** - Utför handlingen som vi vill testa, t.ex. anropar en metod.

* **Assert** - Sist kontrollerar vi att handlingen vi utförde genomfördes som vi förväntade oss. Oftast genom att göra en "assert" på en funktions returvärde eller kolla värdet på ett objekts attribut.

Om det observerade genomförandet är vad vi förväntade oss passerar testet, annars fallerar det. Om det fallerade indikerar det att något är fel i koden.


###Pythons testramverk {#pythons-testramverk}

Python kommer med en inbygg modul, ett ramverk kallat "unittest". Inspirationskällan till det kommer från Javans [JUnit](http://junit.org/junit4/). Vi ska framför allt titta på basklassen *TestCase* som tar hand om enskilda tester på bland annat metoder.



###Kom igång med ett enhetstest {#kom-igang-med-ett-enhetstest}

Då så. Vi tittar på grundstrukturen, skapa en fil som heter `test.py` och lägg till följande kod.

```python
#!/usr/bin/env python3
""" Module for unittests """

import unittest

class TestPhone(unittest.TestCase):
    """ Submodule for unittests, derives from unittest.TestCase """
    pass

if __name__ == '__main__':
    unittest.main()
```

Vi importerar modulen och skapar en subklass av _unittest.TestCase_. Blocket med _unittest.main()_ kör igång ett interface för testskriptet och producerar en bra utskrift.

För att skapa ett faktiskt test lägger vi till en metod vars namn börjar med `test_`. Docstrings som används i metoderna kommer skrivas ut när testfilen körs. Ett enkelt test på den inbyggda funktionen *.upper()* på strängar kan se ut så här:

```python
#!/usr/bin/env python3
""" Module for unittests """


import unittest

class Testcase(unittest.TestCase):
    """ Submodule for unittests, derives from unittest.TestCase """

    def test_upper(self):
        """ Test builtin uppercase """
        result = 'programmering'.upper()# Act
        self.assertEqual(result, 'PROGRAMMERING')# Assert

if __name__ == '__main__':
    unittest.main()
```

Vi använder metoden _assertEqual_ för att jämföra om två värden är lika. Följande tabell är hämtad från [docs.python.org](https://docs.python.org/3/library/unittest.html) och visar överskådligt de vanligaste typerna av assert som finns för att säkerställa olika värden. De metoderna finns in basklassen, `TestCase`.


| Method                    |        Checks that   |
|---------------------------|:---------------------|
| assertEqual(a, b)	        | a == b	           |
| assertNotEqual(a, b)	    | a != b	           |
| assertTrue(x)	            | bool(x) is True	   |
| assertFalse(x)	        | bool(x) is False	   |
| assertIs(a, b)	        | a is b               |
| assertIsNot(a, b)	        | a is not b           |
| assertIsNone(x)	        | x is None            |
| assertIsNotNone(x)	    | x is not None        |
| assertIn(a, b)	        | a in b               |
| assertNotIn(a, b)	        | a not in b           |
| assertIsInstance(a, b)	| isinstance(a, b)     |
| assertNotIsInstance(a, b)	| not isinstance(a, b) |

Om vi nu kör testet får vi utskriften:

```text
python3 test.py
.
----------------------------------------------------
Ran 1 test in 0.000s

OK


>>> python3 test.py -v

test_upper (__main__.Testcase)
Test builtin uppercase ... ok

----------------------------------------------------------------------
Ran 1 test in 0.000s

OK
```

Med flaggan `-v` ser vi att vi får en tydligare utskrift, där testerna skrivs ut med. Vi ser att docstringen blir utskriven. Det är trevligt med fina utskrifter så vi kör vidare på det.

Vi kollar också hur det ser ut om testet blir fel.

```python
def test_upper(self):
    """ Test builtin uppercase """
    result = 'programmering'.upper()# Act
    self.assertEqual(result, 'Programmering')# Assert
```

Istället för att alla bokstäver ska bli stora tänker vi att bara första bokstaven ska bli stor. Med andra ord, vi får ett annat resultat än vad vi förväntar oss.

```bash
>>> python3 test.py -v

test_upper (__main__.Testcase)
Test builtin uppercase ... FAIL

======================================================================
FAIL: test_upper (__main__.Testcase)
Test builtin uppercase
----------------------------------------------------------------------
Traceback (most recent call last):
  File "test.py", line 13, in test_upper
    self.assertEqual(result, 'Programmering')# Assert
AssertionError: 'PROGRAMMERING' != 'Programmering'
- PROGRAMMERING
+ Programmering


----------------------------------------------------------------------
Ran 1 test in 0.003s

FAILED (failures=1)
```

Vi kan tydligs se de två olika värdena som jämförs och att de inte är lika med varandra.



###Enhetstesta objekt {#enhetstesta-objekt}

Artiklen utgår från filerna som vi hittar i [exempelmappen](https://github.com/dbwebb-se/oopython/tree/master/example/unittest/phone). Där hittar vi klassen _Phone_ i `phone.py`.

Nu är det dags att titta på hur vi skriver några enhetstester för vår klass, _Phone_. Klassen ligger i filen `phone.py`.

Kopiera `phone.py` och skapa `test.py`, lägg till `#pylint: disable=protected-access` i början av filen, då vi kommer använda privata attribut utanför instansen.

En viktig del av att skriva enhetstester är att olika tester inte ska vara beroende av varandra. Med vetskapen att testerna exekverar i bokstavsordning vill vi *inte* döpa tester till specifika namn för att få dem att exekveras i en viss ordning. T.ex. att i ett test lägga till en kontakt och i nästa test testa en annan metod som har ett beroende på kontakten från förra testet. Då är testerna inte oberoende av varandra, vilket vi vill att de ska vara. Om vi vill att något ska ha skett innan ett test ska vi använda "arrange" fasen för att skapa rätt förutsättningar för testet. I exemplet med Phone klassen behöver vi t.ex. alltid ha ett Phone objekt skapat innan vi kan testa dess metoder. Istället för att skapa ett Phone objekt överst i test filen och låta alla tester använda det objektet ska vi skapa ett nytt Phone objekt till varje testfall.

När det finns gemensamma steg för alla testfall kan vi använda en `setUp()` metod som körs före varje testmetod exekveras. I den kan vi utföra de steg som alla har gemensamt, i vårt fall skapa ett Phone objekt. Sen kan vi använda metoden `tearDwon()`, som exekveras efter varje testmetod, för att städa upp efter varje test så det inte finns något kvar från ett tidigare test som kan påverka nästa.

Vi förbereder för att skriva tester i `test.py`. Importera moduler, skapa test klass och en setUp och tearDown metod.

```python
import unittest
from phone import Phone

class TestPhone(unittest.TestCase):
    """Submodule for unittests, derives from unittest.TestCase"""

    def setUp(self):
        """ Create object for all tests """
        # Arrange
        self.phone = Phone("Samsung", "Galaxy S8", "Android")

    def tearDown(self):
        """ Remove dependencies after test """
        self.phone = None
```

### Första testet {#first}

Då ska vi skriva vårt första test. Vi behöver något att test, något i koden som vi förutsätter ska funka på ett specifikt sätt. T.ex. kan vi verifiera att attributet `owner` har värdet "No owner yet" i ett ny skapat objekt. I testet vill vi jämföra två strängar, då passar det att använda `assertEqual`.

```python
    def test_default_owner(self):
        """Test that default value if correct for owner"""
        # Assert
        self.assertEqual(self.phone.owner, "No owner yet")
```

Om vi vill vara riktigt säkra på att inget är fel i konstruktorn kan vi skapa en test metod som verifierar alla attribut i ett ny skapat objekt. Döp om metoden till `test_init` och i den verifiera att alla attributen i Phone klassen har förväntat värde i `self.phone` objektet. Det går att ha flera assert anrop i en metod. Försök själv innan du kollar på koden nedanför.

```python
    def test_init(self):
        """Test that init works as expected"""
        # Assert
        self.assertEqual(self.phone.owner, "No owner yet")
        self.assertEqual(self.phone.manufacturer, "Samsung")
        self.assertEqual(self.phone.model, "Galaxy S8")
        self.assertEqual(self.phone.os, "Android")
        self.assertEqual(self.phone._phonebook, [])

>>> python3 test.py
.
----------------------------------------------------------------------
Ran 1 test in 0.010s

OK
```

Det var inte så svårt. Vi kollar bara om attributen har rätt värde. När vi går vidare till att testa metoder kan det bli mycket jobbigare.



### Testa metoder {#methods}

Vi börjar smått och kollar på `has_contacts` metoden. När vi ska skriva tester för en metod vill vi hitta alla "edge cases" eller olika saker metoden kan resultera i. I detta fallet returnerar metoden True eller False. Då vill vi ha tester som testar båda dessa fallen. Metoden returnerar False när `phonebook` listan är tom och True när den innehåller minst ett värde. Skriv en test metod som testar att `has_contacts` returnerar False och använd assert metoden `assertFalse` för att verifiera värdet.

```python
    def test_empty_phonebook(self):
        """Test that has_contacts return False when phonebook is empty"""
        self.assertFalse(self.phone.has_contacts()) # Assert
```

Nu vill vi testa metoden när den returnerar True, men då blir det lite jobbigare för att vi blir beroende på andra metoder. För att metoden ska returnera True behöver vi ha ett telefonnummer i listan och de ska egentligen valideras innan de ska läggas till i listan. Så då är `has_contacts` beroende av två andra metoder, `add_contact` och `validate_number`, som behöver köras först. Men då blir testet mer ett test av de andra två metoderna också. Jag väljer att inte använda `add_contact` för att lägga till en kontakt utan lägger ett nummer direkt i listan. Jag väljer det för att ta bort beroendet på de andra metoderna. Man kan också ignorera det och använda `add_contact` metoden. Man får avgöra själv hur separerad man vill att testerna ska vara, det finns inget helt rätt eller fel svar. Men oftast vill man bli av med beroenden.

```python
    def test_has_contact_true(self):
        """Test that has_contacts return True when phonebook is has a contact"""
        self.phone._phonebook.append("070-354 78 00") # Arrange
        self.assertTrue(self.phone.has_contacts()) # Assert


>>> python3 test.py  -v
test_empty_phonebook (__main__.TestPhone)
Test that has_contacts return False when phonebook is empty ... ok
test_has_contact_true (__main__.TestPhone)
Test that has_contacts return True when phonebook is has a contact ... ok
test_init (__main__.TestPhone)
Test that init works as expected ... ok

----------------------------------------------------------------------
Ran 3 tests in 0.002s

OK
```



### Metoder med if-satser och for-loopar {#if-for}

Vi går vidare till en lite större och svårare metod, `validate_number`. Den innehåller 2,5 if-satser (första if-satsen har ett `and` vilket jag räknar som en halv) och en for-loop. Här kommer vi in på [edge cases](https://en.wikipedia.org/wiki/Edge_case), t.ex. om listan som itereras över i for-loopen är tom, verifiera vad som händer då. Eller om ett av villkoren i if-satser med `and` blir True, vad händer om båda är False och vad händer när båda är True. Det blir snabbt många olika vägar som koden kan ta och där vi vill säkerställa att koden gör som vi förväntar oss.

Vi börjar enkelt och testar med ett nummer som ska validera, "070-354 78 00". Det är giltigt om det är 13 karaktärer långt och har bindestreck och spaces på tre ställen.

```python
    def test_validate_valid_number(self):
        """Test validating valid number"""
        self.assertTrue(self.phone.validate_number("070-354 78 00"))
```

Nu till det jobbiga, alla fall som kan ge false. T.ex. om det finns en bokstav, saknar ett space eller bindestreck. Vi börjar med en metod som testar där numret innehåller en bokstav.

```python
    def test_validate_number_with_letter(self):
        """Test validating number with a letter init"""
        self.assertFalse(self.phone.validate_number("070-35b 78 00"))
```

Vi lägger också in ett test där vi kollar att yttersta if-satsen blir False.

```python
    def test_valid_number_with_missing_space(self):
        """Test validating number with a space missing"""
        self.assertFalse(self.phone.validate_number("070-354 7800"))

>>> python3 test.py
......
----------------------------------------------------------------------
Ran 6 tests in 0.017s

OK
```

OK, vi nöjer oss med tester för den metoden. Det finns givetvis flera fall som våra tester inte täcker men jag tänker att ni kan komma dem själva.



### Testa exceptions {#exception}

Hur gör vi med metoder som lyfter exceptions? De behöver vi också verifiera att de lyfts. Självklart finns det en assert metod för det `assertRaises()`. I `get_contact()` lyfts ett `ValueError` om ett namn inte finns i telefonboken. Vi kan börja med ett test som försöker hämta en kontakt om listan är tom.

```python
    def test_get_contact_empty(self):
        """
        Test that error is raised when list is empty
        """
        with self.assertRaises(ValueError) as _:
            self.phone.get_contact("Missing")

```

Vi använder `with` för att skapa en [context manager](https://www.geeksforgeeks.org/context-manager-in-python/) som fångar undantaget. Om koden som ligger inom blocket inte lyfter ett exception så kommer testet fallera och säga att inte exception har lyfts. Ni kan testa det genom att kommentera ut `get_contact` anropet och skriva `pass` istället och sen köra koden. Då ser det ut som följande.

```bash
  File "test.py", line 79, in test_get_contact_fail
    self.phone.get_contact("Zeldah")
AssertionError: ValueError not raised
```

Vi skapar också ett test som misslyckas när det finns andra kontakter.


```python
    def test_get_contact_fail(self):
        """
        Test that correct value is returned
        when getting contact that does not exist or is empty
        """
        self.phone.add_contact("Andreas", "079-244 07 80")
        with self.assertRaises(ValueError) as _:
            self.phone.get_contact("Zeldah")
```

Vi lägger till ett test som lyckas också.

```python
    def test_get_contact(self):
        """Test that can get added contact"""
        self.phone.add_contact("Andreas", "079-244 07 80")
        self.assertEqual(self.phone.get_contact("Andreas"),
                         ("Andreas", "079-244 07 80"))

```



### Testa metoder som anropar andra metoder eller övriga beroenden {#dependencies}

Än så länge har vi inte haft några direkta beroenden i metoderna vi testar. När metoder börjar använda installerade moduler eller saker som beror på externa saker som vilket OS programmet körs på eller koppling mot en databas för att få tillbaka ett värde, då blir det genast jobbigare. Då behöver vi bli av med det beroendet när vi kör testerna, så metoderna kan testas i en miljö som inte är hela produktions miljön. Det är poäng med enhetstester, de ska gå snabbt att köra dem och man ska kunna köra dem i sin utvecklings miljö utan databaser och andra dependencies.

Vi går lite överkurs och kollar på [mockning/fakes/stubs](https://en.wikipedia.org/wiki/Mock_object), ni behöver inte använda detta i kursen. Jag kommer visa några exempel här på Pythons kraftfulla verktyg [Mock](https://docs.python.org/3.8/library/unittest.mock.html), om ni vill lära er mer om det kan jag rekommendera artikeln [An Introduction to Mocking in Python](https://www.toptal.com/python/an-introduction-to-mocking-in-python).

I `add_contact` är vi beroende av vad metoden `validate_number` returnerar, den blir vårt yttre beroende som vi inte vill testa när vi skriver tester för `add_contact`. Vi vill bara testa det som händer i `add_contact` och den bryr sig bara om ifall `validate_number` returnerar True eller False.

Vi kan skapa ett Mock objekt som ersätter `validate_number` metoden. Vi kan då bestämma att metoden ska returnera ett specifikt värde oberoende av vad man skicka in som argument. Det går dessutom att verifiera vilka argument som skickas in till metoden. Vi kollar på ett test där vi lyckas lägga in en användare.

```python
    def test_add_contact_success(self):
        """
        Test we can add contat. Mock validation method.
        """
        # Arrange
        contact = ("Andreas", "079-244 07 80")
        with mock.patch.object(self.phone, 'validate_number') as validate_mock:
            validate_mock.return_value = True

            # Act
            result = self.phone.add_contact(*contact)

            # Assert
            validate_mock.assert_called_once_with(contact[1])
            self.assertTrue(result)
            self.assertEqual(len(self.phone._phonebook), 1)
            self.assertEqual(self.phone._phonebook[0], contact)
```

Vi börjar med att "patcha" metoden `validate_number` i objektet `self.phone` i en context manager. Så för all kod som exekverar i det scopet är metoden ersätt med mock objektet. Efter det bestämmer vi vad som ska returneras när metoden anropas, i detta fallet True.

I act fasen anropar vi vår metod och använder list unpacking för att dela upp tuplen `contact` så varje element skickas in som separat argument.

När metoden är klar ska vi verifiera att allt skett som vi vill. Vi kollar att den mocka metoden anropas exakt en gång med telefonnumret som argument. Sen kollar vi att det bara finns ett element i phonebook och att det är vår kontakt.

Oftast använder man inte Mock på såna här enkla metoder utan det är mer på externa beroenden, men det visar upp exempel på hur det används. Mock är extremt kraftfullt och enkelt att använda så fort man greppar konceptet.

Testa lägg till ett test där `validate_number` returnerar False istället.

Om vi kör test filen borde ni minst få denna utskriften:

```bash
>>> python3 test.py -v
test_add_contact_success (__main__.TestPhone)
Test we can add contat. Mock validation method. ... ok
test_empty_phonebook (__main__.TestPhone)
Test that has_contacts return False when phonebook is empty ... ok
test_get_contact (__main__.TestPhone)
Test that can get added contact ... ok
test_get_contact_empty (__main__.TestPhone)
Test that error is raised when list is empty ... ok
test_get_contact_fail (__main__.TestPhone)
Test that correct value is returned ... ok
test_has_contact_true (__main__.TestPhone)
Test that has_contacts return True when phonebook is has a contact ... ok
test_init (__main__.TestPhone)
Test that init works as expected ... ok
test_valid_number_with_missing_space (__main__.TestPhone)
Test validating number with a space missing ... ok
test_validate_number_with_letter (__main__.TestPhone)
Test validating number with a letter init ... ok
test_validate_valid_number (__main__.TestPhone)
Test validating valid number ... ok

----------------------------------------------------------------------
Ran 10 tests in 0.017s

OK
```



Avslutningsvis {#avslutning}
------------------------------

Vi vill bara skriva värdefulla tester. Metoder som bara returnerar ett attribut, där det egentligen inte utförs någon logik och vi kan inte påverka vad som sker i metoden på något sätt finns det inget jätte stort värde i att ha ett test för. Phone innehåller tre metoder av större värde att testa, det är `add_contact()`, `validate_number()` och `get_contact()`. Det är i dem vi har kod som faktiskt utför något.

Många tycker att det är tråkigt och mycket tid. Jag känner ofta likadant när jag sitter med olika projekt, man vill ju bara skriva kod för ny funktionalitet, inte testa koden man redan har skrivit. Men nedanför hittar ni några tankar kring hur man ska prioritera sin teste. Om man verkligen ska testa all kod, då tar det längre tid att skriva testerna än själva koden.

- Testa vanliga fall i koden. De testerna visar dig om din kod går sönder efter att du har ändrat något.

- Testa edge cases i några av de med avancerade funktionerna som troligen innehåller fel.

- När du hittar en bugg, skriv först ett test som kollar det innan du fixar koden så buggen inte finns kvar.

- Lägg till edge case tester för mindre kritisk kod när du har tid att döda.


Det här var lite om enhetstester och hur man kan gå tillväga för att testa sin kod. De flesta testerna är relativt självförklarande och kommer inte gås in djupare på. Läs gärna mer om enhetstester:  

* [docs.python.org](https://docs.python.org/3.5/library/unittest.html)  

* [docs.python-guide.org](http://docs.python-guide.org/en/latest/writing/tests/)
