---
author: efo
revision:
    "2018-10-11": "(A, efo) Första versionen."
...
Design för worst-case
=======================

Om vi drar alla programmerare över en kam så är vi lata allihopa. Vi försöker med alla medel att försöka göra så lite som möjligt, vilket i många sammanhang kan vara en bra sak. Men ibland tar vi det lite för långt till exempel i den exempel data vi använder när vi designar gränssnitt. Låt oss titta på ett exempel där vi designar ett virtuellt visitkort.

I många fall använder vi lite för enkel exempel data, ett bra exempel syns nedan där en designar har använt namnet John Doe som exempel data och titlar och företag som inte stickar ut.

I de andra exempel tar vi runt på en resa hos våra nordiska grannar i Finland, Norge och Island. Vi ser hur designen i alla fallen går sönder och främst vår finska vän Petteri Jääskeläinen lär vara missnöjd med visitkortet.

[CODEPEN src=xQYxqo user="dbwebb" tab="result" caption="Design för worst-case"]

Med tanke på dessa fall och fallerande design ser vi till att nästa gång vi designar ett gränssnitt använder vi lite mer ovanliga testdata.
