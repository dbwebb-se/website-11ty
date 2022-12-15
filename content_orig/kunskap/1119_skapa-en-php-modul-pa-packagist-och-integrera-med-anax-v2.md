---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1
revision:
    "2018-11-22": "(A, mos) Ny utgåva av artikeln till ramverk1 v2."
...
Skapa en PHP-modul på Packagist och integrera med Anax (v2)
==================================

[FIGURE src=image/snapht17/packagist-submitted.png?w=c5&cf&a=10,50,50,0 class="right"]

Vi skall se hur vi kan lyfta ut en kodbas som är integrerad i en Anax installation. Vi tar den kodbasen och lägger i ett eget Git-repo som vi publicerar på GitHub. Vi gör en modul av repot och publicerar det på Packagist.

Därefter kan vi åter installera samma kodbas, nu med verktyget composer, in i en installation av Anax.

För att ha en kodbas att jobba på så använder jag mig av remservern och visar hur man skapar en fristående modul som blir enkel att integrera i en godtycklig Anax installation.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har en väl fungerande kodbas i din sida `me/redovisa`. Kodbasen omfattas av enhetstester.



Förberedelse {#forbered}
--------------------------------------

Du kommer att röra runt en del i koden i `me/redovisa`. Det är bra om du gör en tagg innan du påbörjar arbetet, då har du alltid en möjlighet att backa tillbaka till en stabil nivå av koden.



Exempel på modul {#exempel}
--------------------------------------

När du läser igenom detta dokumentet så kan du använda modulen remserver som en exempelmodul som har den struktur du vill sätta på din egen modul.

Du kan se hur remserver ligger på [GitHub](https://github.com/canax/remserver) och på [Packagist](https://packagist.org/packages/anax/remserver).

Förslagsvis så tar du och installerar remserver-modulen in i din egen installation `me/redovisa`, så får du en övning i hur din egen modul skall fungera installationsmässigt, när den är klar.

Läs remserver-modulens README, så får du instruktioner i hur du gör installationen.



Eget repo för modulen {#repo}
--------------------------------------

Första steget i arbetet med att skapa modulen är att lyfta ut kodbasen till ett eget repo som publiceras på GitHub. Kodbasen är de kodstycken som är specifika för modulen. Det kan till exempel innebära delar av koden i `src/`, `view/` och `config/`.

När det är klart så lägger du till de byggfiler som är relaterade till repots utvecklingsmiljö. Det är konfigurationsfiler som är relaterad till `make install` och `make test`.

Du behöver också skapa en egen `composer.json` för din modul. Det är den filen som composer kommer använda för att installera din modul.
 
När du är klar så har du ett eget repo med modulens kod på GitHub och du har plockat bort modulens kod från din `me/redovisa`.



Scaffold {#scaffold}
--------------------------------------

För att lyckas med detta stycket så behöver du ha installerat [skriptet `anax-cli`](https://github.com/canax/anax-cli). Gör det.

Nu vill vi integrera och testa att modulen fungerar i en tänkt installation. Modulen är svår att utveckla i sin ensamhet, man behöver testa att den fungerar tillsammans med en godtycklig installation av Anax.

Så, vi tar och scaffoldar fram en version av Anax som motsvarar den installationen vi redan har av `me/redovisa`.

```text
# Stå (förslagsvis) i din moduls katalog
anax create a ramverk1-me-v2
```

Du har nu en katalog `a/` som innehåller en fungerande installation som motsvarar din `me/redovisa`. Pröva att öppna din webbläsare mot `a/htdocs`.

Då försöker vi att integrera din modul in i Anax installationen `a/`.



Hämta källan från dev-master {#dev-master}
--------------------------------------

Vi uppdaterar `composer.json` så att den installerar din modul. Modul är ännu inte publicerad på pakettjänsten Packagist, så vi hämtar källkoden direkt från GitHub genom att sätta [VCS som källa i composer.json](https://getcomposer.org/doc/05-repositories.md#vcs).

När jag jobbar med remservern som exempel så uppdaterar jag compser.json med följande.

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/canax/remserver"
    }
],
"require": {
    "anax/anax-ramverk1-me": "^1.0.0",
    "anax/remserver": "dev-master"
},
```

Därefter kan jag installera modulen med `composer update` och resultatet kan se ut så här, när jag dubbelkollar om modulen är installerad.

```text
$ composer show | grep anax/remserver
anax/remserver   dev-master c631b6f Anax remserver module.
```

Nu har jag en direktkoppling mellan min installation i `a/` och modulen `anax/remserver` på GitHub. Jag behöver alltså inte publicera modulen till Packagist för att jobba mot den. På detta viset har man viss flexibilitet att byta ut ett paket mot ett annat, vilket är bra vid utveckling eller när man vill göra buggfixar eller smärre justeringar av vissa paket.



Installera modulen {#postinstall}
--------------------------------------

När modulen ligger på plats så behöver den kopplas in i din installation `a/` så att den används. Det kan handla om att lägga till en route och konfigurationsfiler och kanske lägga till den som en di-tjänst. Det är de sakerna som kopplar modulen, som gör att modulen används.

Det kan också handla om att lägga till innehåll i `content/` och kanske även i `views/`.

Instruktioner för det som krävs, bör finnas att läsa överst i modulens `README.md`. För att installera remserver så handlar det om att utföra följande kommandon.

```text
# Copy the configuration files
rsync -av vendor/anax/remserver/config ./

# Copy the documentation
rsync -av vendor/anax/remserver/content/index.md ./content/remserver-api.md
```

Titta en extra gång på vilka filer som verkligen kopieras när du utför ovan kommandon. Då får du en inblick i vilka filer som modulen behöver knyta till Anax installationen.



Skript för installation {#postprocessing}
--------------------------------------

När man jobbar med utveckling av moduler och när man vill underlätta installation och scaffolding, så lägger man installationskommandona i en egen fil. Då blir det enklelt att köra dem om och om igen.

I Anax finns en generell hantering av scaffolding och dessa filer ligger under katalogstrukturen `.anax/scaffolding`.

I fallet med remservern så ligger filen enligt nedan och att köra den filen ger en standard installation av modulen.

```text
bash vendor/anax/remserver/.anax/scaffold/postprocess.d/700_remserver.bash
```

När man scaffoldar ihop en Anax installation, likt `ramverk1-redovisa-v2` som nu finns i `a/`, så är det modulernas postprocessingskript som utför delar av installationen.



Symlänk till lokalt repo {#symlink}
--------------------------------------

När man jobbar mot en modul och utför många ändringar, så kommer man i ett läge där man inte vill pusha varje ändring till GitHub. Jag väljer därför att göra en symbolisk länk till en lokal installation av modulens repo. Det ger mig en lokal utvecklingsmiljö, utan externa beroenden.

Här följer de steg jag gör.

```text
# Jag står i installationen a/
$ cd vendor/anax/
$ rm -rf remserver/
$ ln -s ~/git/canax/remserver
```

Så, principen är att ersätta modulens installation i `vendor/anax/remserver` med en lokal kopia av repot där jag kan utföra ändringar, utan behovet av att pusha dessa ändringar till GitHub. Att använda en symbolisk länk är ett sätt att göra detta på.

Nu har jag en lokal utvecklingsmiljö och kan kontinuerligt testa och göra små ändringar i mon moduls kod.

Om jag även har ett postprocessingskript så blir det enkelt att köra det och vid behov kopiera över ny konfiguration till min installation i `a/`.

Man vill att ens utvecklingsmiljö skall vara smidig. Det skall vara enkelt att jobba.



Publicera repot på Packagist {#publicera}
--------------------------------------

När du känner dig helt klar med din modul så committar du, taggar och pushar till GitHub.

Logga in på Packagist och lägg till din modul.

[FIGURE src=image/snapht17/packagist-submit.png?w=w3 caption="Submitta ett paket till Packagist genom att ange dess url till GitHub."]

När paketet är submittat kan det se ut så här.

[FIGURE src=image/snapht17/packagist-submitted.png?w=w3 caption="Nu är paketet på plats på Packagist."]

Du kan se att Packagist ser att paketet är i version v1.0.0 (eller hur du nu valt att sätta versionen). Kom ihåg att Packagist normalt alltid ger dig senaste taggade versionen när du installerar via composer.

Se till att Packagist uppdateras per automatik, varje gång du gör en ny commit till GitHub.

När du gör en uppdatering till GitHub, aom automatiskt uppdateras på Packagist, kan det ta ett par minuter innan hela flödet är uppdaterat. Vill du testa att använda den senaste taggen från Packagist så kan det vara läge att ta en kopp kaffe medans du väntar.



Composer.json gå mot Packagist {#compospack}
--------------------------------------

Då kan jag uppdatera min `composer.json` i min Anax installation `a/` så att den hämtar paketet `anax/remserver` från Packagist istället för GitHub repot. 

Jag tar bort delen med repositories.

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/canax/remserver"
    }
],
```

Sedan uppdaterar jag så att rätt version hämtas, istället för `dev-master`. Den senaste aktuella versionen är `^2.0.0`.

```json
"require": {
    "anax/anax-ramverk1-me": "^1.0.0",
    "anax/remserver": "^2.0.0"
},
```

Sedan gör jag en `composer update`.

Jag bör se att den nya versionen hämtas hem och ersätter min dev-master.

Vi är klara och har modulariserat remservern som nu har en struktur som gör den enkel att vidareutveckla och underhålla samt samexistera med en installation av Anax.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har gått igenom hur man skapar en fristående modul, hur man kan jobba med den och hur man kan publicera den på GitHub och Packagist och hur den kan hanteras med composer.

Denna artikel har en [egen forumtråd](t/6840) som du kan ställa frågor i, eller bidra med tips och trix.
