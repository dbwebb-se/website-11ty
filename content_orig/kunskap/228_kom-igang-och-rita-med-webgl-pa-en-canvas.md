---
author: mos
category: javascript
revision:
  "2015-10-15": (A, mos, lew) Första utgåvan inför webgl hösten 15.
updated: "2015-10-15 15:34:27"
created: "2015-10-15 13:35:49"
...
Kom igång och rita med WebGL på en Canvas
==================================

[FIGURE src=/image/snapht15/webgl-sandbox2-point-random-color.png?w=c5&a=0,30,60,0 class="right"]

Du har en sandbox för att testa dina JavaScript-program och du kan rita på en canvas. Låt oss nu introducera WebGL och uppgradera din sandbox-miljö för att jobba med WebGL och 3D.

<!--more-->

Så här kan en sandbox se ut när den är klar. Inte mycket till 3D kanske, men man måste börja någonstans. Det är iallafall WebGL och det är en bra start.

[FIGURE src=/image/snapht15/webgl-sandbox2-point-click.png?w=w2 caption="Så här kan det se ut när man ritar med WebGL."]



Förutsättning {#pre}
-------------------------------

Artikeln är en del av kursen webgl och förutsätter att du har jobbat igenom artikeln "[Kom i gång med HTML, CSS, JavaScript och Canvas](kunskap/kom-i-gang-med-html-css-javascript-och-canvas)".

Artikeln förutsätter också att du är bekant med de begrepp, och kodexempel, som tas upp i de två första kapitlen i boken [WebGL Programming Guide](kunskap/boken-webgl-programming-guide). Denna artikeln förklarar inte de koncept som visar hur man ritar med WebGL, det görs i boken.



En sandbox för exempelprogram {#sandbox}
-------------------------------

Du har sedan tidigare en sandbox där du kan rita i ett 2D kontext. Du kan utgå från det exemplet och kopiera till en ny katalog.

```text
# Gå till kursrepot
cd me/kmom01
cp -i sandbox/* sandbox2/
```

Då ska vi se vad som behövs för att rita i ett 3D kontext med WebGL.



Följ bokens exempelkod {#libs}
------------------------------

Det finns olika sätt att strukturera sin kod och eftersom vi kommer följa boken i denna kursen så börjar vi med att inkludera de libb som följer med boken. Efterhand kommer du märka att det kräver en hel del kodrader för att skriva WebGL och förr eller senare så väljer man att samla den koden i ett eget libb, eller så använder man något av de libben som är färdiga.

Men vi börjar från start och därför väljer vi att använda bokens libb som finns inkluderade i kursrepot under [`example/libs`](https://github.com/mosbth/webgl/tree/master/example/libs). Som du kan se så finns det många filer i denna katalogen. Till att börja med så kommer vi använda `webgl-utils.js`, `webgl-debug.js` och `cuon-utils.js`.

Du får en bra struktur på dina exempelprogram om du väljer att kopiera de filerna till katalogen `me/libs`. Så här gör du.

```text
# Gå till kursrepot
cp -i example/libs/{webgl-*,cuon-utils.js} me/libs/
```

Du får nu uppdatera din `sandbox2/index.html` så den inkluderar de tre libben. Det gör du i slutet av filen med följande kod.

```html
<script type="text/javascript" src="../../libs/webgl-utils.js"></script>
<script type="text/javascript" src="../../libs/webgl-debug.js"></script>
<script type="text/javascript" src="../../libs/cuon-utils.js"></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>
```

Fint, nu har du dessa *helpers* tillgängliga, nu kan vi börja testa de exempel som följer med boken.



Färglägg canvasen {#farg}
------------------------------

Ett av bokens första exempel handlar om att färglägga canvasen. Det exemplet finns i kursrepot under [`example/webgl/theBook/Chapter2/ex2`](https://github.com/mosbth/webgl/blob/master/example/webgl/theBook/Chapter2/ex2/main.js) och du kan själv [testa det](webgl/repo/example/webgl/theBook/Chapter2/ex2/).

Ta nu koden från exemplet och lägg in i din egen sandbox och testa om du kan få fram samma bakgrundsfärg som jag visar i följande bild.

[FIGURE src=/image/snapht15/webgl-sandbox2-background-color.png?w=w2 caption="Bakgrundsfärg på en canvas med WebGL kontext."]



Rita punkt med shaders {#punkt}
------------------------------

I bokens nästa exempel så införs shaders och man ritar en punkt. Det exemplet finns i kursrepot under [`example/webgl/theBook/Chapter2/ex3`](https://github.com/mosbth/webgl/blob/master/example/webgl/theBook/Chapter2/ex3/main.js) och du kan själv [testa det](webgl/repo/example/webgl/theBook/Chapter2/ex3/).

Ta nu koden från det exemplet och testa det i din egen sandbox så att det fungerar. Se om du kan justera färgerna, inte nödvändigtvis de färger som jag använder, men testa. Som du ser så har jag även ändrat storleken på punkten som ritas ut.

[FIGURE src=/image/snapht15/webgl-sandbox2-point.png?w=w2 caption="Nu en punkt i WebGL kontext."]



Skicka variabler till vertex shader {#var}
------------------------------

I bokens följande exempel så visar man hur man skickar variabler till vertex shader och man fortsätter rita sin punkt, men nu kan man ändra storlek och position på punkten via JavaScript. Exemplet finns i kursrepot under [`example/webgl/theBook/Chapter2/ex4`](https://github.com/mosbth/webgl/blob/master/example/webgl/theBook/Chapter2/ex4/main.js) och du kan själv [testa det](webgl/repo/example/webgl/theBook/Chapter2/ex4/).

Ta nu koden från det exemplet och testa det i din egen sandbox så att det fungerar. Försök nu justera JavaScript-koden så att punkten placeras ut på en annan position och med en annan storlek.

[FIGURE src=/image/snapht15/webgl-sandbox2-point-moved.png?w=w2 caption="Nu kan vi påverka punktens position och utseende via JavaScript-kod och variabler som skickas till vertex shader."]



Klicka och placera ut punkter {#klick}
------------------------------

Boken fortsätter på samma tema men nu lägger de till en eventhanterare i JavaScript som låter oss rita ut en ny punkt varje gång vi klickar med musen i canvasen. Exemplet finns i kursrepot under [`example/webgl/theBook/Chapter2/ex5`](https://github.com/mosbth/webgl/blob/master/example/webgl/theBook/Chapter2/ex5/main.js) och du kan själv [testa det](webgl/repo/example/webgl/theBook/Chapter2/ex5/).

Ta nu koden från det exemplet och testa det i din egen sandbox så att det fungerar. Försök nu justera JavaScript-koden så att punkten placeras ut med en annan storlek och en annan färg.

[FIGURE src=/image/snapht15/webgl-sandbox2-point-click.png?w=w2 caption="Klicka och placera ut punkter på canvasen."]

En leende gubbe, en bra start.



Klicka och placera ut punkter {#klick}
------------------------------

I det avslutande exemplet så lägger boken till logik i JavaScript-koden som ritar ut punkter med olika färger beroende av vad man klickar. Exemplet finns i kursrepot under [`example/webgl/theBook/Chapter2/ex6`](https://github.com/mosbth/webgl/blob/master/example/webgl/theBook/Chapter2/ex6/main.js) och du kan själv [testa det](webgl/repo/example/webgl/theBook/Chapter2/ex6/).

Pröva så du kan få det exemplet att fungera i din egen sandbox. Försök att justera JavaScript-koden så att punkten får en annan färg och storlek. Du kanske till och med kan lägga till fler ytor så det blir fler färger än fyra.

[FIGURE src=/image/snapht15/webgl-sandbox2-point-random-color.png?w=w2 caption="Klicka och placera ut punkter på canvasen i olika färger."]

Ren och skär konst med WebGL.



Avslutningsvis {#avslutning}
------------------------------

Detta var en genomgång av de exempelprogrammen som finns i kapitel 2 i boken och du har nu en grund att stå på för att skriva ditt egna första enkla program i WebGL där du kan klicka och rita ut punkter.

Om du stöter på problem så kan du alltid [fråga direkt i kursens forum](forum/utbildning/webgl).
