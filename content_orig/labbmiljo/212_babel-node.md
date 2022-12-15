---
...
Babel och Babel-node
==================================

Babel är en transpiler som kan transpilera kod från till exempel ES6 till ES5.

Vi ska använda en variant av Babel som heter `babel-node`. Det är en wrapper som dels transpilerar från ECMA6 och dels kör den transpilerade koden i Node.js. Vi behöver alltså bara ett kommando för att köra ett skript i ES6.

Du kan [läsa mer om babel-cli (babel-node)](https://babeljs.io/docs/usage/cli/) på deras dokumentationssida.



Förutsättning {#forut}
-----------------------------------

Du har [installerat node och npm](labbmiljo/node-och-npm).



Installera babel-node {#babel}
-----------------------------------

Du installerar  babel-cli som innehåller babel-node, med npm på följande sätt. Vi väljer att göra en global installation för att hålla det enkelt.

```text
npm install -g babel-cli
```

Du kan nu köra babel-node. Du kan behöva sudo på Linux och Mac OS.

```text
npm install -g babel-cli
which babel-node
babel-node --version
```

Så här kan det se ut.

[ASCIINEMA src=101656]

Nu är babel-node installerat. Du kan använda det på samma sätt som node, men med den transpilerande fördelen.



Installera babel preset {#preset}
-----------------------------------

Babel har ett antal [presets där es2015 (ES6)](https://babeljs.io/docs/plugins/preset-es2015/) är en av dem. Dessa presets bestämmer hur koden transpileras och vilka konstruktioner som stöds.



###Installera preset es2015 {#es2015}

Man behöver installera de presets man använder.

Låt oss ta ett exempel tillsammans med kursen linux (eller dbjs). Där använder vi es2015.

Dels finns i kursrepot en konfigurationsfil `.babelrc` som säger vilka presets vi använder.

```json
{
    "presets": ["es2015"]
}
```

Vi behöver installera en babel-modul som stödjer den preseten vi vill använda.

Det gör vi i rooten av kursrepot, i samma katalog där `.babelrc` ligger.

```text
# Gå till roten av kursrepot
npm install babel-preset-es2015
```

Bra, nu kan vi köra `babel-node` i alla underkataloger till kursrepot och dra nytta av konfigfilen och dess preset.



###Testa preset 2015 {#testes2015}

Pröva att gå till kursrepot och in till exempelprogrammet `example/nodejs/simpleServer` och starta den med babel-node. Om det går bra så har du en korrekt miljö.

Så här kan det se ut när du kör exempelprogrammet.

[ASCIINEMA src=102101]

Du startar alltså servern med följande kommando.

```text
babel-node index.js
```

För att skicka en request till servern så gör du en vanlig access till den, precis som en webbsida. Antingen med din webbläsare eller via kommandoraden (i en nytt terminalfönster).

```text
curl http://localhost:1337/hej
```



Avslutningsvis {#avslutning}
--------------------------------------

Ställ gärna frågor om [Babel, babel-node och preset i forumet](t/6182).
