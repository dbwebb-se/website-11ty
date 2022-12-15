---
author:
  - aar
  - efo
category: javascript
revision:
  "2017-03-20": (B, efo) Anpassad för webapp v3.
  "2017-03-20": (A, aar) Första utgåvan inför kursen webapp v2.
...
Lägg till en Splash screen och ändra ikon
==================================
Vi ska kolla på hur vi lägger till en splash screen och byter ikon i en app. En splash screen är "laddnings"-bilden som de flesta appar har när den startar.För splash screen och ikon ska vi använda "[cordovas plugin](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-splashscreen/index.html)".

Du kan hitta koden för detta exempel på [Github](https://github.com/dbwebb-se/webapp/tree/master/example/splashScreen/www) och i `example/splashScreen`.



<!--more-->



Introduktion {#introduktion}
--------------------------------------
Vi utgår ifrån att du har ett projekt eller att du skapar ett nytt som har plattformarna Browser och Android eller iOS. Vi börjar med att lägga till plugin:et `cordova-plugin-splashscreen`.

```bash
cordova plugin add cordova-plugin-splashscreen --save
```



Android {#android}
--------------------------------------
Nu behöver vi bilder, många bilder. Skapa en katalog `res/` i roten av ditt Cordova projekt. Sedan är en rekommendation att man delar upp denna `res/` katalog i ett antal underkataloger till exempel för de olika sorters bilder man har `icon` och `screen` för loggan och splashscreen. Sedan är en rekommendation att man har underkataloger för dessa med de olika plattformarna man vill bygga för till exempel `res/icon/ios/` eller `res/screen/android`.



### Bilder {#bilder}

För att skapa ikoner tar jag hjälp av [icons launcher](https://romannurik.github.io/AndroidAssetStudio/icons-launcher.html). Här kan du både ladda upp egna bilder och använda dig av Clipart's. När du bestämt dig för hur den ska se ut kan du ladda ner bilden med rätt storlekar. Om du väljer att ladda upp en egen bild bör den minst vara av storlek `1024x1024`. Jag har ingen bra bild i den storleken så jag väljer att använda dbwebb's favicon bild.

[FIGURE src=/image/kunskap/cordova/create_icon_splash.png?w=700&h=500]

När jag laddar ner filerna får jag en mapp-struktur. Jag lägger innehållet i `res/icon/android`, så strukturen ser ut på följande sätt:

```bash
$ tree res/icon/android/
res/icon/android/
├── mipmap-hdpi
│   └── ic_launcher.png
├── mipmap-mdpi
│   └── ic_launcher.png
├── mipmap-xhdpi
│   └── ic_launcher.png
├── mipmap-xxhdpi
│   └── ic_launcher.png
├── mipmap-xxxhdpi
│   └── ic_launcher.png
└── web_hi_res_512.png
```

För att skapa splashscreen bilderna användes [Abiro PhoneGap Image Generator](http://pgicons.abiro.com/), denna kan också användas för att skapa dina ikoner. Strukturen för dessa filer blir på följande sätt. Notera uppdelning i `land` och `port`, landskap och porträtt.

```bash
$ tree res/screen/android/
res/screen/android/
├── splash-land-hdpi.png
├── splash-land-ldpi.png
├── splash-land-mdpi.png
├── splash-land-xhdpi.png
├── splash-land-xxhdpi.png
├── splash-land-xxxhdpi.png
├── splash-port-hdpi.png
├── splash-port-ldpi.png
├── splash-port-mdpi.png
├── splash-port-xhdpi.png
├── splash-port-xxhdpi.png
└── splash-port-xxxhdpi.png
```



## Konfigurera appen {#config}
Då är det dags att bestämma när varje bild ska användas. Det gör vi genom att ändra i `config.xml`. Vi börjar med att fixa det för Android.

Om du inte har en platform-tag med android lägger du till det.

```xml
<platform name="android">
    <allow-intent href="market:*" />
</platform>
```



### Ikoner {#ikoner}

Vi börjar med ikonerna. Vi har sedan tidigare lagt ikonerna i katalogen `res/icon/android`.

```xml
<platform name="android">
    ...
    <icon density="hdpi" src="res/icon/android/mipmap-hdpi/ic_launcher.png" />
</platform>
```

När appen byggs med Cordova flyttas bilden, "www/res/mipmap-hdpi/ic_launcher.png", till "platforms/android/res/mipmap-hdpi/". Om appen sedan blir installerad på en enhet med "hdpi" skärm kommer vår app använda ikonen som ligger i `res/icon/android/mipmap-hdpi/`.

```xml
<platform name="android">
    ...
    <icon density="hdpi" src="res/icon/android/mipmap-hdpi/ic_launcher.png" />
    <icon density="mdpi" src="res/icon/android/mipmap-mdpi/ic_launcher.png" />
    <icon density="xhdpi" src="res/icon/android/mipmap-xhdpi/ic_launcher.png" />
    <icon density="xxhdpi" src="res/icon/android/mipmap-xxhdpi/ic_launcher.png" />
    <icon density="xxxhdpi" src="res/icon/android/mipmap-xxxhdpi/ic_launcher.png" />
</platform>
```

Då kollar vi hur det ser ut. Kör kommandot `cordova emulate android`. Navigera till dina appar genom att trycka på den lilla pilen ovanför apparna längst ner på skärmen. Här borde du se din app med din nya ikon och dina ikoner borde nu ha flyttats till `platforms/android/res/mipmap-xdpi`.

[FIGURE src=/image/kunskap/cordova/icon_on_phone.png?w=600&h=400]

Om du vill kan du testa använda bilder som ser olika ut och köra appen i emulatorer av olika storlekar för att se ikonen ändras.



### Splash screen {#splash_screen}
Vi ska göra likadant för splash screen som vi gjorde för ikoner. I `config.xml` inom android-taggen lägger vi till följande.

```xml
<platform name="android">
    ...
    <splash density="port-ldpi" src="res/screen/android/splash-port-ldpi.png" />
    <splash density="port-mdpi" src="res/screen/android/splash-port-mdpi.png" />
    <splash density="port-hdpi" src="res/screen/android/splash-port-hdpi.png" />
    <splash density="port-xhdpi" src="res/screen/android/splash-port-xhdpi.png" />
    <splash density="port-xxhdpi" src="res/screen/android/splash-port-xxhdpi.png" />
    <splash density="port-xxxhdpi" src="res/screen/android/splash-port-xxxhdpi.png" />

    <splash density="land-ldpi" src="res/screen/android/splash-land-ldpi.png" />
    <splash density="land-mdpi" src="res/screen/android/splash-land-mdpi.png" />
    <splash density="land-hdpi" src="res/screen/android/splash-land-hdpi.png" />
    <splash density="land-xhdpi" src="res/screen/android/splash-land-xhdpi.png" />
    <splash density="land-xxhdpi" src="res/screen/android/splash-land-xxhdpi.png" />
    <splash density="land-xxxhdpi" src="res/screen/android/splash-land-xxxhdpi.png" />
</platform>
```

Vi döper taggarna till "splash" iställer för "icon", när vi specificerar vilken skärm varje bild ska kopplas till behöver vi lägga till om skärmen ska vara i "portrait" eller "landscape" läge. Vi testar, starta upp din emulator och kör igång appen så borde din splash screeen visas i någon sekund innan du kommer vidare till appens startsida.

<figure style="overflow: auto">
[FIGURE src=/image/kunskap/cordova/splash_running.png?w=600&h=400 class=left caption="Splash screen portrait"]
[FIGURE src=/image/kunskap/cordova/splash_running_land.png?w=400&h=200 caption="Splash screen landscape"]
</figure>

Vad vackert det blev. Testa att köra din app i webbläsaren, det kan hända att du även har en splash screen där. Det är ovanligt att använda splash screen i webbläsaren, du kan få avgöra själv om du vill göra det. Vi går igenom hur du ändrar bilden och hur du kan stänga av den för webbläsaren. I webbläsaren är det alltid samma bild som visas så där behöver vi bara lägga till en bild.

Om du vill ha din splashscreen i kortare eller längre tid kan du använda följande tag.

```xml
<preference name="SplashScreenDelay" value="5000" />
```

Om du inte har en `<platform name="browser">` tag lägger du till det.
För att stänga av splash screen för webbläsaren lägger du till `<preference name="ShowSplashScreen" value="false"/>` innanför browser-taggen. Alternativt ändra `value` till `true` för att aktivera den.
För att ändra bilden lägger du till `<preference name="SplashScreen" value="www/res/web_hi_res_512.png"/>` innanför browser-taggen.

Det finns [inställningar för splash screen](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-splashscreen/index.html#preferences) där ni bl.a. kan ställe in hur länge den ska visas och vad den ska ha för bakgrundsfärg.



iOS {#ios}
--------------------------------------
På iOS räcker det med en enda bild för att täcka upp för det som i iOS världen heter en launch screen. Du skapar en stor bild 2732x2732 pixlar och sparar den som `res/screen/ios/Default@2x~universal~anyany.png` och lägger till följande i `config.xml`, under `platform-name='ios'`. Se till att lägga den viktiga delen av din splashscreen i mitten av bilden då den fysiska enheten själv skalar om bilden.

```xml
<platform name="ios">
    ...
    <splash src="res/screen/ios/Default@2x~universal~anyany.png" />
</platform>
```


Om du vill ha din splashscreen i kortare eller längre tid kan du använda följande tag.

```xml
<preference name="SplashScreenDelay" value="5000" />
```

För mer information om hur du skapar splashscreens på iOS titta i [Cordovas dokumentation](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-splashscreen/#ios-specific-information).



### Ikoner

För ikoner har vi även möjligheten att bara använda oss en bild. Vi fixar då till en ikon som är 120x120 pixlar stor. En möjlighet är att exportera en variant av splashscreen bilden som även den var kvadratisk. [Apple rekommenderar](https://developer.apple.com/library/content/qa/qa1686/_index.html) att man exporterar en hel hög med bilder. En stark rekommendation är att ha med även en 180x180 pixlar stor bild, då denna används för nyare iPhones och iPads. Vi importerar ikonen på ungefär samma sätt som för en splashscreeen i `config.xml`.

```xml
<platform name="ios">
    ...
    <splash src="res/screen/ios/Default@2x~universal~anyany.png" />
    <icon src="res/icon/ios/icon-60@2x.png" width="120" height="120" />
    <icon src="res/icon/ios/icon-60@3x.png" width="180" height="180" />
</platform>
```



Avslutningsvis {#avslutning}
--------------------------------------

Nu har vi fixat en ikon och en splash screen. Och våra apps andas direkt mer native applikation. Om du har frågor eller tips så finns det en särskild tråd i forumet om [denna artikeln](t/7413).
