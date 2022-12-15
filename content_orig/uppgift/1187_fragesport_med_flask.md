---
author: aar
revision:
    "2020-01-24": (B, aar) Uppdaterad inför VT20.
    "2018-11-29": (A, aar) First version.
category:
    - oopython
...
Frågesport med Flask
===================================

[FIGURE src=/image/oopython/kmom02/fragesport.png?w=c5 class="right"]

Uppgiften går ut på att med hjälp av klasser, Flask, jinja2 och CSS, skapa en webbsida med tre olika typer av frågor.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gått introduktionskursen i Python.  
Du har läst artikeln "[GET, POST i Flask](kunskap/flask-get-post)".  
Du har läst guiden "[Klass relationer](guide/kom-igang-med-objektorienterad-programmering-i-python)".  



Introduktion {#intro}
-----------------------    

Du jobbar vid sidan om dina studier och din kund vill att du gör klart en webbsida som redan är påbörjad. Gränssnittet och routes för sidan är redan klart, du ska skapa klasserna för backend:en till webbsidan. I och med att frontend redan är klar och innehåller anrop till koden du ska skapa behöver dina klasser uppfylla abstraktionskraven som det medför. Med det menas att i dina klasser behöver det finnas vissa metoder och attribut med rätt namn, annars kommer inte frontend fungera med din backend. I klassdiagrammet nedanför kan du se vilket gränssnitt din klasser måste uppfylla. Med gränssnitt menas existerande publika metoder.

[YOUTUBE src=PCGwx_wpzME width=630 caption="Så här kan det se ut när det är färdigt."]

Du ska implementera klasserna för de tre frågetyperna och handlern som app.py jobbar mot som i sin tur använder fråge-klasserna. Samma struktur som i övningen.

[FIGURE src=/image/oopython/kmom02/fragesport_uml.png caption="Klassdiagram för uppgiften."]

Attributen och metoderna som är **bold**-markerad används av den färdiga koden ni får och måste därför implementeras av er med de namnen. Övriga är bara exempel på vad man kan ha med.

<!-- [YOUTUBE src=AuUrQW9mNeY width=630 caption="Andreas förklarar klassdiagrammet och koden som ska skrivas."] -->

[YOUTUBE src=GBmyT_TntXA width=630 caption="Andreas förklarar klassdiagrammet och koden som ska skrivas."]

I session behöver vi spara den dynamiska data, som applikationen inte kommer ihåg mellan request:en, vilket är hur många poäng spelaren har och vilken fråga spelaren är på. I write_session skriv den datan till session och i read_session hämta den datan från session. Tips att när du börjar utveckla en ny metod som anropas från den färdiga koden, använd dig av `print()` i metoden du skapar och kolla klassdiagrammet för att ta reda på vad som skickas som argument till din metod.

[YOUTUBE src=rqfqn29glIo width=630 caption="Hur ska man börja med frågesport uppgiften?"]


Krav {#krav}
-----------------------

Börja med att kopiera frontend koden till ditt uppgift.

```bash
# Ställ dig i kurskatalogen
# börja med att uppdatera mappen med senaste exempelkoden
dbwebb update
cp -ri example/flask/questions me/kmom02/
cd me/kmom02/questions
```

1. Kolla på youtube-klippen ovanför för att få en översyn av vad du ska göra.

1. Bekanta dig med koden, kolla igeom app.py för att se vilka routes som finns och vilka html filer som används till vad. Leta efter alla anrop som görs till klasserna du ska skapa så att du får en bild av vilka metod som behövs och vad de används till.

1. Implementera klasserna som behövs i filerna `handler.py` och `questions.py`, en handler klass som heter `QuestionManager` och tre klasser för frågorna. Typerna av frågor är fritext (text) svar, flervalsfrågor med flera rätt (checkbox) och flervalsfrågor med ett rätt svar (radiobutton). I mappen `templates/answer_types` finns en html template för varje frågetyp (du ska inte behöva ändra i dem).

1. Frågeklasserna behöver innehålla en fråga, svaret och svarslternativen, om det finns några. De behöver ha metoder för att hämta värdena och en metod för att kolla om användarens svar är rätt. För checkboxes, räkna varje rätt alternativ som ett poäng, t.ex. om frågan har tre rätta svar får man 1 poäng för varje rätt gissning. 

1. Handlern ska äga alla tillgängliga frågor, hålla reda på hur många poäng spelaren har, vilken fråga man är på och vad max poängen är. Det ska finnas metoder för att hämta antalet poäng, max poäng, kolla om det finns fler frågor, hämta nästa fråga, läsa från session, skriva till session, återställa spelet och kolla om användarens input är rätt svar på nuvarande frågan.


1. Session ska användas för att hålla kolla på hur många poäng spelaren har och vilken fråga spelaren är på. Ni behöver inte spara fråge objekten i session.

1. Du ska inte behöva ändra i några av de andra filerna, förutom style.css, men om du känner att du vill/behöver det skriv varför i din redovisningstext.

1. Hårdkoda minst tre frågor för varje Question klass. Tips att skapa dessa i `QuestionManager`.

```bash
# Ställ dig i kurskatalogen
dbwebb validate questions
dbwebb publish questions
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

1. På score screen visa också de rätta svaren.

1. På score screen visa också de rätta svaren och vad användaren svarade.



Tips från coachen {#tips}
-----------------------

För att hämta ut checkbox svaren från formuläret kan ni använda [getlist](https://www.youtube.com/watch?v=_sgVt16Q4O4).

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
