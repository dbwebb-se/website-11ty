---
author: aar
category: webbprogrammering
revision:
  "2017-03-07": (A, aar) Första utgåvan inför uppdatering av kursen webapp.
created: "2017-03-07 14:48:59"
...
Installera Apache Cordova
==================================

[FIGURE src=/image/kunskap/cordova_logo.png?w=500&h=300]

Denna guide visar dig hur du installerar Apache Cordova.

Apache Cordova är ett open source [cross-plattform tool](https://en.wikipedia.org/wiki/Cross-platform) som används för att utveckla [hybrida mobilappar](https://ymedialabs.com/hybrid-vs-native-mobile-apps-the-answer-is-clear/) till flera operativsystem, bl.a. Android och iOS.
Apparna utvecklas i HTML, CSS och JavaScript, Cordova kan sen paketerar om dem till mobilappar som funkar på alla operativsystem Cordova stödjer.

<!--more-->



Läs mer {#mer}
-------------------------------

Du kan läsa mer om [Cordova på webbplatsen](https://cordova.apache.org).



Förutsättning {#pre}
-------------------------------

För att installera Cordova behöver du [npm](kunskap/installera-node-och-npm) installerat.

<!-- Vi kommer använda Cordova för att skapa Android appar och därför behöver du ha [Android SDK och emulator](kunskap/installera-en-emulator-for-android) installerat. Det innefattar även att du har systemvariabeln `ANDROID_HOME` och underliggande mappar `tools` och `platform-tools` i din `PATH`.
Du behöver även [Java JDK version 7 eller senare](http://www.oracle.com/technetwork/java/javase/downloads/index.html). -->


Installera Cordova {#cordova}
--------------------------------------

Kör följande kommando.

```bash
$ npm install -g cordova
$ cordova --version
```

Du kan behöva köra `npm install` kommandot som administratör/sudo.



Kolla förutsättningarna är på plats {#check}
--------------------------------------
Först behöver du skapa ett nytt Cordova projekt, jag skapar det i katalogen `me/kmom05/hello` med följande kommando

```bash
# Stå i me/kmom05/hello
$ cordova create . com.example.hello HelloWorld
```

Nu har du skapat ett hello world exempel. Du kan gå in i `www` mappen och kolla på koden. För att testa appen måste vi lägga till plattformar. Vi börjar med att lägga till plattformen `browser` för att testa att Cordova fungerar.

```bash
$ cordova platform add browser --save
```

Vi kan nu starta appen i webbläsaren genom att köra kommandot.

```bash
cordova run browser
```



Avslutningsvis {#avslutning}
--------------------------------------
Nu har du förhoppningsvis kommit igång med Cordova och har skapat HelloWorld exemplet och har kört exemplet i webbläsaren.

Om du har frågor eller tips så finns det en särskild tråd i forumet [för Mac](t/4903) och [för windows](t/4899) om denna artikeln.

Du kan även hittar med info på [Cordovas egna hemsida](https://cordova.apache.org/docs/en/latest/guide/cli/index.html).
