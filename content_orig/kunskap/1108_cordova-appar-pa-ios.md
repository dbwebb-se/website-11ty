---
author: efo
category:
    - webbprogrammering
    - webapp
revision:
  "2018-02-15": (A, efo) Första utgåvan inför kursen webapp-v3.
...
Cordova appar på iOS
==================================

[FIGURE src=/image/webapp/ios_logo.png?w=c3 class="right"]

I denna artikel ska vi installera en utvecklingsmiljö för att kunna köra Cordova appar på Mac och iOS. Vi börjar med Apples IDE Xcode för att sedan koppla ihop Cordova med Xcode.


<!--more-->


Xcode {#xcode}
---------------------------------
Installera först Xcode från Mac App Store om du inte har gjort det tidigare.

Kör sedan kommandot `xcode-select --install` i terminalen för att installera 'command-line tools'.



Cordova {#cordova}
---------------------------------
För att kunna köra apparna i antigen en simulator eller på en mobil enhet installerar vi 'ios-deploy' med hjälp av kommandot.

```bash
npm install -g ios-deploy
```

Om du använder OS X 10.11 El Capitan eller senare kan du behöva köra kommandot som `sudo` och med två extra flaggor.

```bash
sudo npm install -g ios-deploy --unsafe-perm=true --allow-root 
```

För att lägga till iOS som plattform i Cordova projekt kör vi följande kommando. Jag kör det i HelloWorld exemplet i `me/kmom05/hello`.

```bash
# Stå i me/kmom05/hello
$ cordova platform add ios --save
```



Simulator {#simulator}
---------------------------------
Börja med att öppna workspace filen `HelloWorld.xcworkspace` genom att köra följande kommando i terminalen. Kommandot öppnar filen med Xcode, om detta inte händer öppna Xcode och öppna filen manuellt.

```bash
$ open ./platforms/ios/HelloWorld.xcworkspace/
```

Se till att du har valt HelloWorld projektet ute till vänster och att du har vald en Simulator längst upp i Xcode. För att köra appen trycker du på play-knappen längst uppe till vänster. Du kan få en fråga om du vill köra din Mac i Developer Mode, tillåt detta för att köra appen.

[FIGURE src=/image/webapp/screenshot-xcode.png caption="Xcode med HelloWorld exemplet"]



Fysisk Enhet {#device}
---------------------------------
Om du istället vill köra din Cordova App på en iOS enhet kräver det lite mer arbete. Börja med att koppla in din enhet och välj sedan din enhet längst upp i Xcode och tryck på Play-knappen.

[FIGURE src=/image/webapp/screenshot-xcode-device.png caption="Xcode med mobil enhet"]

När du kör appen nu får du förmodligen ett fel att du har inte signerat appen. För detta behöver du ett utvecklare konto.

[FIGURE src=/image/webapp/screenshot-xcode-team.png caption="Xcode välj utvecklingsteam"]

Tryck på knappen 'Add Account...' och logga in med ditt Apple-ID. Om du inte får upp inloggningsrutan direkt tryck på '+' längst ner till vänster och lägg till ditt Apple-ID. När du har loggat in läggs din användare som ett 'Personal Team' och under Role ser du att det är en gratis utvecklare roll du har fått. Du ska nu kunna köra ditt HelloWorld exempel genom att stänga rutan för att lägga till användare och trycka på Play-knappen.



Avslutningsvis {#avslutning}
--------------------------------------
Nu har du förhoppningsvis kommit igång med Cordova på iOS och har skapat HelloWorld exemplet och har kört exemplet i Simulatorn och eventuellt på din fysiska enhet.

Om du har frågor eller tips så finns det en särskild [tråd i forumet](t/7311) om denna artikeln.

Du kan även hittar mer info i [Cordovas egna Platform Guide](https://cordova.apache.org/docs/en/latest/guide/platforms/ios/index.html).
