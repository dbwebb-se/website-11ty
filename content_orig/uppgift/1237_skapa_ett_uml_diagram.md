---
author: moc
revision:
    "2020-01-20": (A, moc) Skapad inför VT21.
category:
    - oopython
...
Skapa ett UML Diagram
===================================

Uppgiften går ut på att skapa ett klassdiagram för kortspelet war. Koden är färdig och ligger i [example/war](https://github.com/dbwebb-se/oopython/tree/master/example/war).

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har läst artikeln "[Introduktion Till UML](/kunskap/intro_till_uml)".  

Du har läst guiden "[Klass relationer](guide/kom-igang-med-objektorienterad-programmering-i-python)".  



Krav {#krav}
-----------------------

Börja med att kopiera koden till uppgiften.

```bash
# Ställ dig i kurskatalogen
# börja med att uppdatera mappen med senaste exempelkoden
dbwebb update
cp -ri example/war me/kmom03/
cd me/kmom03/war
```

1. Bekanta dig med koden, kolla igenom applikationens flöde och provkör den så att du är säker på hur den fungerar.

1. Skapa ett klassdiagram med relationer över alla klasser. Gör det till en bild och döp filen till `uml.png` och lägg den i `war` mappen.


```bash
# När du är klar
# Ställ dig i kurskatalogen
dbwebb publish war
```


Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.


Tips från coachen {#tips}
-----------------------

Det finns bra verktyg online för att rita uml diagram, kolla in [draw.io](https://www.draw.io), [websequencediagrams](https://www.websequencediagrams.com/) och [lucidchart](https://www.lucidchart.com/pages/sv). Man kan också hitta ett flertal tillägg till VScode och Atom för bland annat draw.io om man föredrar att göra det lokalt i sin text editor.
