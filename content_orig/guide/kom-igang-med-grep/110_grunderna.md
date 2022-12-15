---
author: lew
revision:
    "2021-04-12": "(A, lew) Första versionen."
...
Grunderna
=======================

Grep är inte ett avancerat kommando, inte på den nivån vi ska använda det i alla fall.

Vi behöver ett utgångsläge och vi kan använda [presidents.txt](https://github.com/dbwebb-se/vlinux/blob/master/example/grep/presidents.txt) i exempelmappen. Som vanligt tittar vi även i manualen om vi behöver: `$ man grep`.



### Hur använder vi grep? {#how}

Vi tittar på hur vi enklast kör grep.

```
$ cat presidents.txt | grep "alk"
George Herbert Walker Bush, 1989-1993
George Walker Bush, 2001-2009
```

Vi kan se att vi enbart får se dem som har substrängen "alk" i raden. Grep jobbar med andra ord rad för rad och ger tillbaka det som matchar ditt så kallade *pattern*.



### Före/Efter {#before-after}

Med ett enkelt option kan vi styra vad vi får för resultat. Vi använder **-B**efore eller **-A**fter. Låt säga att vi vill veta vem som var president innan Harry S. Truman:

```
$ cat presidents.txt | grep "Harry S. Truman" -B 1
Franklin Delano Roosevelt, 1933-1945
Harry S. Truman, 1945-1953
```

Här ser vi att vi med `-B [NUM]` kan få vårt resultat och [NUM] rader före det. På samma sätt kan vi få reda på vem som till exempel vilka Thomas Jefferson's tre efterföljare var:

```
$ grep "Thomas Jefferson" -A 3 presidents.txt
Thomas Jefferson, 1801-1809
James Madison, 1809-1817
James Monroe, 1817-1825
John Quincy Adams, 1825-1829
```



### Invertering {#invert}

Ibland vet man vad man inte vill ha med. Vi kan då invertera matchningen med `-v`. Vi vet att vi inte vill ha med presidenter som har bokstäverna `u,s,a` i namnet:

```
$ grep -v "[usa]" presidents.txt
John Tyler, 1841-1845
Joe Biden, 2021-
```

Där fick vi se lite regex och en så kallad "character class" `[]`. Uttrycket säger att matchningen ska gälla alla bokstäverna inne i hakparentesen.

Grep är mycket mer än vad vi sett men vi stannar här i denna kursen. Det fungerar utmärkt att filtrera kommandon som till exempel `ls` eller `top`. Vi kan som vi såg även blanda in mer reguljära uttryck i vårt PATTERN. Men det får vara till en annan gång.
