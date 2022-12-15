---
author: aar
revision:
    "2016-06-03": (A, aar) Första versionen.
category:
    - oopython
...
Skapa ett klassdiagram
===================================


Öva på att skapa UML-diagram, mer specifikt klassdiagram, manuellt.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har läst artikeln "[Vad är UML?](kunskap/vad-ar-uml)".
Du har gjort uppgiften "[Skapa objekt efter UML](uppgift/skapa-objekt-efter-uml)".


Uppgiftens struktur {#uppgiftens-struktur}
-----------------------    

Du ska skapa ett klassdiagram över ett program som hanterar kunder, produkter, ordrar och lager.

Du ska ha med klasserna: 

* **Customer** som har variablerna customerId, customerName, address och orders. Den har metoderna editCustomer, placeOrder som har orderId som parameter och editOrder som tar orderId som parameter.

* **Order** har komposition med Customer. Order kan tillhöra en Customer medan Customer kan ha noll till många Order.
Order har variablerna orderId, customerId, productIds och orderDate. Den har metoderna addProduct som tar productId som parameter, removeProduct som tar productId som parameter och calculatePrice.

* **Product** har aggregation med Order, en Product kan finnas i noll till många Order och en Order har en till många Product.  
Product har variablerna productId, price, productType och description. Den har metoden modifyProduct.

* **Stock** har komposition med Product, Product kan tillhör en Stock och en Stock har noll till många Product.  
Stock ha variablerna productId och quantity. Den har metoderna increaseQuantity med parametern amount och decreaseQuantity med parametern amount.
 

Krav {#krav}
-----------------------

Skapa en .png fil av klassdiagrammet och lägg filen i mappen kmom02/uml.  

Klassdiagrammet ska innehålla:

1. Alla fyra klasser.

2. Klassernas variabler.  

3. Klassernas metoder.

4. Sambanden mellan alla klasser.  

```bash
# Ställ dig i kurskatalogen
dbwebb validate uml
dbwebb publish uml
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Tips från coachen {#tips}
-----------------------

Använd "[Draw.io](https://www.draw.io/)" för att skapa diagrammer.

Lycka till och hojta till i forumet om du behöver hjälp!
