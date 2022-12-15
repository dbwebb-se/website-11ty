---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Installera Anax CLI
==================================

Anax CLI är ett bash-skript som används för att _scaffolda_ fram webbplatser med olika innehåll baserat på Anax moduler. Du kan se projektet på [GitHub anax/anax-cli](https://github.com/canax/anax-cli).

Enklast att komma igång med Anax är att installera Anax CLI.

Du kan installera Anax CLI via din terminal via följande kommando.

```text
bash -c "$(curl https://raw.githubusercontent.com/canax/anax-cli/master/src/install.bash)"
```

Är du på Mac eller Linux kan du behöva använda `sudo` vid installationen.

När du är klar kan du pröva att verktyget fungerar.

```text
anax --version
anax --help
```
