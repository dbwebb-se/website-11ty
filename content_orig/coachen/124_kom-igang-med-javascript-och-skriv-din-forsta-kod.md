---
author: mos
category: webbprogrammering
revision:
  "2015-08-26": (C, mos) Bort med länk till Codeacademy video.
  "2014-06-18": (B, mos) Kompletterade med forumtråd och externa videoserier.
  "2014-06-16": (A, mos) Första utgåvan i samband javascript1-kursen.
updated: "2015-08-26 15:33:47"
created: "2014-06-13 08:40:51"
...
Kom igång med JavaScript och skriv din första kod
==================================

Kom i gång och skapa din första JavaScript-sida som en del av din webbsida med HTML och CSS. Hur kopplar du in din JavaScipt-kod och hur kan du kolla att den är rätt?

<!--more-->

Låt oss börja med ett ful-exempel på HTML, CSS och JavaScript-kod.

```javascript
<!doctype html>
<meta charset=utf-8>
<title>Hello World in JavaScript</title>
<style>
h1 {
    color: green;
}
</style>

<h1>Hello World in JavaScript</h1>

<p><a href="#" onclick='alert("This is a message in a popup saying Hello World");'>Show an alert popup.</a></p>

<p><button onclick='confirm("Press F12 to open the developer tools for your browser, select the console. Then reload the page and see the message in the console.");'>Show a confirm popup.</button></p>

<script>
document.write("<h3>This is a template!</h3>")

console.log("Hello in the consol.");
console.log("Here you can write inline code of JavaScript and debug your programs.");
console.log("Try writing 1+1 (at the bottom of the developer tool) and see what happens.");
console.log("Try writing: console.log('Hi')");

var value = 42;
console.log("Try writing: value");

</script>
```

[INFO]
Nedan hänvisas det till "Firebug". Firebug används inte längre, utan vi använder det inbyggda developer tools.

Det kan skilja lite i utseende, men det viktiga är att du år fliken "console".
[/INFO]

Ta en texteditor och spara koden i en fil som du döper till `hello-js.html` och öppna den i din webbläsare. Det ser ut så här.

[FIGURE src=/image/snap/js1-hello-world.png?w=w2 caption="Så här ser sidan ut för mig när Firebug är öppnat via F12."]

Öppna Firebug genom att klicka F12 och välj fliken *Console*. Ladda om webbsidan med ctrl-r (cmd-r på Mac) och utskriften av funktionen `console.log()` bör synas.

Du har nu ett fungerande program som kör JavaScript i en HTML-sida och använder CSS för style. Det är inte snyggt. Men det fungerar. Öppna det i Firefox och se vad som händer.

Nu ska jag ta och rensa upp sidan och flytta över JavaScript-koden till en egen fil, `hello.js`. I exemplet så har jag redan den struktur som man får efter att ha jobbat igenom tipsen om [HTML](coachen/gor-din-forsta-sida-med-html5) och [CSS](coachen/styla-din-sida-med-css-och-en-extern-stylesheet). Jag skall alltså komplettera med JavaScript-koden och flytta ut den till en egen fil.

Se hur jag gör i [tio-talet steg på youtube](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_11l3iKwIKRM4DFuhtBeNE).

Här är första video i serien.

[YOUTUBE src=jJnfs0DI_o0 width=630 caption=Mikael kommer i gång med JavaScript i webbläsaren.]

Du kan själv testa att göra likadant, skapa din egen fin-kod utifrån ovan exempel. Om du är osäker på om du gjort rätt så kan du [dubbelkolla mot min variant](javascript1/repo/example/hello-world).

Vår vän Bucky på The New Boston har även gjort en [serie om JavaScript](https://www.youtube.com/playlist?list=PL46F0A159EC02DF82). Här ser du första videon i serien.

[YOUTUBE src=yQaAGmHNn9s width=630 caption=Första delen i serien "Beginner JavaScript Tutorial - 1 - Introduction to JavaScript".]

Det var allt som behövs för att du skall få grunderna i JavaScript.

Ställ dina frågor och ge tips i [tipsets forumtråd](t/2458).
