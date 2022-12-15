---
...
Installera Anax Flat som utvecklingsmiljö för skribent
==================================

Detta avsnitt är främst för den som vill producera innehåll till en webbplats baserad på Anax, till exempel webbplatsen dbwebb.se. Här visas hur du kan installera en egen version av Anax Flat för att ha en utvecklingsmiljö där su kan börja börja skriva dina artiklar.



Installation {#install}
-----------------------------------

Skapa en ny tom katalog och gå in i den.

```text
mkdir anax && cd anax
```

Kör installationsprogrammet som installerar en utvecklingsmiljö bestående av Anax Flat och relaterat.

```text
bash -c "$(wget -qO- https://raw.githubusercontent.com/canax/anax-flat/master/bin/install.bash)"
```

Öppna din webbläsare mot katalogen `htdocs`.

Du har nu en katalogstruktur som liknar den som finns på [repot för webbplatsen dbwebb.se](https://github.com/dbwebb-se/website).
