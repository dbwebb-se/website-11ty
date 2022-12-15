---
author: lew
revision:
    "2016-04-12": (A, lew) Första versionen.
category:
    - oopython
...
Att skriva unittester
===================================

[FIGURE src=/image/oopython/kmom02/test_top.png class="right"]

Unittester, eller "enhetstester", används för att testa så enskilda metoder eller funktioner gör det de ska. Till exempel om en metod ska returnera bool-värdet `True`, så ska den aldrig kunna returnera `False`.  

Det var det enklaste fallet av ett unittest, men poängen går nog fram.

Vi ska titta lite närmare på de olika delarna av pythons inbyggda testramverk "unittest". Vi hoppar inte i den djupa delen av bassängen, utan vi håller oss vid det grundläggande delarna.
Vill du läsa mer kan du kika på [docs.python.org](https://docs.python.org/3/library/unittest.html).

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i Python och du vet vad variabler, typer och funktioner innebär.



Varför ska man skriva unittester? {#varfor-ska-man-skriva-unittester}
------------------------------

Unittester skrivs som sagt av anledningen att minimera risken för "trasig" kod och för att validera funktionaliteten. I många lägen handlar det inte bara om att enbart du ska förstå koden, utan det kan finnas andra utvecklare som tar över ditt projekt eller bara ska hjälpa till. Då är det bra om det är testat ordentligt. Har man bra tester som går igenom så har man bra kod.



###Pythons testramverk {#pythons-testramverk}

Python kommer med en inbygg modul, ett ramverk kallat "unittest". Inspirationskällan till det kommer från Javans [JUnit](http://junit.org/junit4/). Vi ska framför allt titta på basklassen "TestCase" som tar hand om enskilda tester på metoder och funktioner.



###Kom igång med ett unittest {#kom-igang-med-ett-unittest}

Vi utgår ifrån klassen _Car_ som vi skapade i artikeln "[Kom igång med objekt](kunskap/kom-igang-med-objekt)". I samma mapp skapar vi en fil som vi döper till **testfile.py**. Det är den filen vi skriver våra unittester i. Testerna kör man med:

 ```python
 >>> python3 testfile.py
 ```

Då så. Vi tittar på grundstrukturen i _testfile.py_:

```python
#!/usr/bin/env python3
""" Module for unittests """

import unittest

class Testcase(unittest.TestCase):
    """ Submodule for unittests, derives from unittest.TestCase """


if __name__ == '__main__':
    unittest.main()
```

Vi importerar modulen och skapar en subklass av _unittest.TestCase_. Blocket med _unittest.main()_ kör igång ett interface för testskriptet och producerar en bra utskrift. Notera att vi har med docstrings nu. Docstrings som används i metoderna kommer skrivas ut när testfilen körs.

Ett enkelt test på den inbyggda funktionen **.upper()** kan se ut så här:

```python
#!/usr/bin/env python3
""" Module for unittests """


import unittest

class Testcase(unittest.TestCase):
    """ Submodule for unittests, derives from unittest.TestCase """

    def test_upper(self):
        """ Test builtin uppercase """
        self.assertEqual('programmering'.upper(), 'PROGRAMMERING')

if __name__ == '__main__':
    unittest.main()
```

Vi använder metoden _assertEqual_ för att jämföra om två värden är lika. Följande tabell är hämtad från [docs.python.org](https://docs.python.org/3/library/unittest.html) och visar överskådligt de vanligaste typerna av unittester.


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

Om vi nu kör test-filen får vi utskriften:

```python
>>> python3 testfile.py
.
----------------------------------------------------
Ran 1 test in 0.000s

OK


>>> python3 testfile.py -v
test_upper (__main__.Testcase)
Test builtin uppercase ... ok

----------------------------------------------------------------------
Ran 1 test in 0.000s

OK
```

Med flaggan **-v** ser vi att vi får en tydligare utskrift, där testerna skrivs ut med. Det fungerar bara om man döper testmetoderna med "test_" i början. Vi ser även docstringen utskriven. Det är trevligt med fina utskrifter så vi kör vidare på det.



###Unittesta objekt {#unittesta-objekt}

Nu är det dags att titta på hur vi skriver några unittester för vår klass, **Car**. Klassen ligger i filen `car.py`.

Vi öppnar `testfile.py` och fyller på med lite kod. Med hjälp av _doc-strings_ får vi ännu bättre utskrifter:

```python
#!/usr/bin/env python3
""" Module for unittests """

import unittest
from car import Car

class Testcase(unittest.TestCase):
    """ Submodule for unittests, derives from unittest.TestCase """

    bmw = Car("BMW", 100000)
    volvo = Car("Volvo", 150000)

    def test_if_objects_are_same(self):
        """ Returns True if instances are not same """
        self.assertIsNot(self.bmw, self.volvo)

    def test_attribute(self):
        """ Returns True attribute matches expected """
        self.assertIs(self.bmw.model, "BMW")
        self.assertIs(self.volvo.model, "Volvo")

    def test_sum_instances(self):
        """ Returns True if __add__ is correct """
        self.assertEqual(self.volvo + self.bmw, 250000)

    def test_equipment(self):
        """ Returns True if Airbag exists in equipment """

        self.bmw.addEquipment("Bluetooth")
        self.bmw.addEquipment("Airbag")
        self.bmw.addEquipment("AC")

        self.assertIn("Airbag", self.bmw.equipment)

if __name__ == '__main__':
    unittest.main()
```

Kör vi följande test får vi resultatet:

```python
>>> python3 testfile.py -v

test_attribute (__main__.Testcase)
Returns True attribute matches expected ... ok
test_equipment (__main__.Testcase)
Returns True if Airbag exists in equipment ... ok
test_if_objects_are_same (__main__.Testcase)
Returns True if instances are not same ... ok
test_sum_instances (__main__.Testcase)
Returns True if __add__ is correct ... ok

----------------------------------------------------------------------
Ran 4 tests in 0.000s

OK
```

Om ett test inte går igenom visas en tydlig utskrift på vad och var felet gäller. Vi kan titta på hur det kan se ut:

```python
#!/usr/bin/env python3
""" Module for unittests """

import unittest
from car import Car

class Testcase(unittest.TestCase):
    """ Submodule for unittests, derives from unittest.TestCase """

    bmw = Car("BMW", 100000)
    
    # this yields an error
    def test_error(self):
        """ Returns True if model-attribute matches """
        self.assertIs(self.bmw.model, "Honda")

if __name__ == '__main__':
    unittest.main()
```

Nu kan vi läsa av felmeddelandet när vi kör filen:

```python
>>> python3 testfile.py -v

test_error (__main__.Testcase)
Returns True if model-attribute matches ... FAIL

======================================================================
FAIL: test_error (__main__.Testcase)
Returns True if model-attribute matches
----------------------------------------------------------------------
Traceback (most recent call last):
  File "testfile.py", line 35, in test_error
    self.assertIs(self.bmw.model, "Honda")
AssertionError: 'BMW' is not 'Honda'

----------------------------------------------------------------------
Ran 1 test in 0.000s

FAILED (failures=1)
```



Avslutningsvis {#avslutning}
------------------------------

Det här var lite om unittest och hur man kan gå tillväga för att testa sin kod. De flesta testerna är relativt självförklarande och kommer inte gås in djupare på. Läs gärna mer om unittest:  

* [docs.python.org](https://docs.python.org/3.5/library/unittest.html)  

* [docs.python-guide.org](http://docs.python-guide.org/en/latest/writing/tests/)
