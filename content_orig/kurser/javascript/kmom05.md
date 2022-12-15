---
author: mos
revision:
  "2013-12-10": (D, mos) Formaterade om inledningen.
  "2013-12-03": (C, mos) Läsanvisning om Object.create på MDN och Crockford om privata
    metoder.
  "2012-12-13": (B, mos) Lade till föreläsningsslides.
  "2012-12-06": (A, mos) Första utgåvan.
updated: "2013-12-10 15:20:59"
created: "2012-06-12 08:20:16"
...
Kmom05: HTML5 och Canvas
==================================

Du skall bygga ett enklare spel i HTML5 Canvas. Det låter både enkelt och svårt och som vanligt så väljer du en väg som passar din kunskapsnivå och ambitionsnivå.

Vi skall dels kika på hur HTML5 och Canvas fungerar och grunderna för att rita i en canvas. Vi titta på hur man gör animeringar i en canvas och hur man kan styra objekt, eller en spelare, med tangentbordet. Detta gör vi genom ett par övningar där vi skapar ett rymdskepp som vi styr.

Så fort ett projekt växer så är det viktigt med att organisera sin kod. Därför passar det bra att kika på objektmodellen i JavaScript och hur objektets prototyp fungerar.

Framfördig har du alltså en spelinfluerat övning i canvas med lite mer avancerad och organiserad programmering med JavaScript. Det är bra, men inte nödvändigt, om du fräschar upp dina gamla kunskaper i matematik med vektorberäkningar, sinus och cosinus samt känner till Newtons lagar om krafter. :-)

[FIGURE src=/image/kunskap/javascript/spaceship-in-canvas.jpg?w=w1&q=70 caption="Ett rymdskepp som går att styra runt och påverkas av universums krafter."] 

*(Momentet omfattar totalt ca: 20 studietimmar, inklusive läsning, arbete, problemlösning och eftertanke.)*



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Pro HTML5 Programming](kunskap/boken-pro-html5-programming)  
  * Ch 2 Using the HTML5 Canvas API
  * Ch 3 Working with HTML5 Audio and Video (om du vill använda ljud i ditt spel)

2. [JavaScript: The Good Parts](kunskap/boken-javascript-the-good-parts)
  * Ch 2 Objects (repetera) 
  * Ch 5 Inheritance 

Böckerna ger dig grunden till de övningar som du senare skall göra.


###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial användes i samband med campus-kursen höstterminen 2013. Det kan vara av intresse att skumma igen -- även för distansstudenten.

* [Översikt av kursmomentet](https://dl.dropboxusercontent.com/u/24315211/javascript/javascript-kmom05-ht13.pdf).



###Lästips {#lastips}

Här finns mer att läsa.

* Om prototypbaserad programmering på Wikipedia:  
  <a href='http://en.wikipedia.org/wiki/Prototype-based_programming'>http://en.wikipedia.org/wiki/Prototype-based_programming</a>

* Artikel om prototyper och arv i JavaScript (VIKTIG):  
  <a href='http://msdn.microsoft.com/en-us/magazine/ff852808.aspx'>http://msdn.microsoft.com/en-us/magazine/ff852808.aspx</a>

* Artikel om att skapa JavaScript objekt med ett annat objekt som mall:  
  <a href='http://javascript.crockford.com/prototypal.html'>http://javascript.crockford.com/prototypal.html</a>

* Artikel om publika, privata och privilegierade metoder i objekt:  
  <a href='http://javascript.crockford.com/private.html'>http://javascript.crockford.com/private.html</a>

* Läs på MDN om Object.create, att skapa ett nytt objekt utifrån ett annat objekt, och se ett exempel på klassiskt arv i JavaScript:  
  <a href='https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/create'>https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/create</a>

* Tutorials för att komma igång med HTML5 Canvas finns på MDN:  
  <a href='https://developer.mozilla.org/en-US/docs/Canvas_tutorial'>https://developer.mozilla.org/en-US/docs/Canvas_tutorial</a>

Här följer lite kuriosa om matematik, fysik och krafter, överkurs för den som vill ha fräscha upp sina gamla matte och fysik-kunskaper.  

* Newtons lag om rörelse:  
  <a href='http://en.wikipedia.org/wiki/Newton%27s_laws_of_motion'>http://en.wikipedia.org/wiki/Newton%27s_laws_of_motion</a>

* Krafter i form av acceleration och luftmotstånd,  
  <a href='http://en.wikipedia.org/wiki/Acceleration'>http://en.wikipedia.org/wiki/Acceleration</a>
  <a href='http://en.wikipedia.org/wiki/Drag_%28physics%29'>http://en.wikipedia.org/wiki/Drag_%28physics%29</a>

* Om Vektorer:  
  <a href='http://en.wikipedia.org/wiki/Vector_space'>http://en.wikipedia.org/wiki/Vector_space</a>



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 14-16 studietimmar)*


###Övningar {#ovningar}

Gör följande övningar, de behövs för att klara uppgifterna. 

* Häng med när Mikael försöker bygga grunderna till en klon av det [klassiska gamla spelet Asteroids](http://en.wikipedia.org/wiki/Asteroids_%28video_game%29).  
  [Ett spel i HTML5 Canvas med JavaScript och prototypbaserad programmering](kunskap/ett-spel-i-html5-canvas-med-javascript-och-prototypbaserad-programmering)
   
Jobba igenom övningen som innehåller kodningsövningar och en del läsanvisningar som du skall göra. Detta är kärnan i kursmomentet och ger dig grunden att stå på.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör ett enkelt spel i HTML5 Canvas. Du skall använda prototypbaserad programmering för att strukturera din kod. Ditt spel kan vara enkelt eller svårt. Hitta på någon egen enkel idé eller gör en klon av ett befintligt gammalt klassiskt spel. Planera så att du håller tiden för kursmomentet.

Har du ingen bra idé så kan du välja att göra en klon av [Atarix Lunar Lander](http://en.wikipedia.org/wiki/Lunar_Lander_%28arcade_game%29). Eller ett enkelt bilspel som styr runt på en bana i jakt på snabbare varvtider. Mer inspiration finner du på [Wikipedias kategori om Arcade-spel](http://en.wikipedia.org/wiki/Category:Arcade_games).



###Extra {#extra}

Lägg till ljud till spelet med HTML5 Audio.

Gör ett riktigt bra spel så kanske du till och med kan använda det som ett utgångspunkt för ett avslutningsprojekt i kursen.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Vilka möjligheter ser du med HTML5 Canvas?
  * Hur avancerat gjorde du din spelfysk (om du överhuvudtaget har någon i ditt spel)?
  * Beskriv och berätta om ditt spel. Förklara hur du använder objekt och prototyper.
  * Gjorde du något på extrauppgiften?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/javascript). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.
