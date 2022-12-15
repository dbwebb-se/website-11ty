---
author:
    - mos
category:
    - texteditor
revision:
    "2019-02-01": "(A, mos) Första versionen"
...
Visa dolda tecken i texteditorn Atom
==================================

I textfiler kan det finnas dolda tecken som inte kan skrivas ut då de inte representeras av ett traditionellt synligt tecken.

Det kan vara tecken som är tabbar `\t`, olika typer av radbrytningar som `\n`, `\r\n` eller `\r` eller _non breaking spaces_, hårda mellanslag. Dessa representeras normalt av mellanslag eller visas inte alls i din texteditor.

Alla dessa syns normalt inte i texteditor, men de kan ha olika effekt när vår text visas eller våra program körs.

<!--more-->



Sätt på visning av osynliga tecken {#pa}
-----------------------------------

Man vill alltid ha full koll på innehållet i sin fil, så det är säkrast att sätta på den option som säger till texteditorn att visa dolda tecken.

I Atom är det `ctrl ,` och välj "Editor", skrolla ned till "Show invisibles" och klicka för den.

[FIGURE src=image/snapvt19/atom-show-invisibles.png?w=w3 caption="Klicka i rutan för att visa osynliga tecken."]

Öppna nu en ny fil och du kan se de osynliga tecknen, svagt representerade av symbolar, aningen utgråade, men du kan se dem och ibland är det väldigt viktigt att ha koll på dem.

Denna ordning och reda är lite en förutsättning för att du skall kunna följa en kodstandard och det kan spara dig en hel del tid i felsökning.

Har du frågor eller funderingar, eller vill bidra med tips, så finns en [forumtråd för detta tips](t/8270).
