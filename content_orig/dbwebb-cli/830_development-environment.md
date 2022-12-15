---
author: mos
updated: "2016-05-16 09:00:00"
...
Lokal utvecklingsmiljö
==================================

Du kan installera en lokal test- och utvecklingsmiljö tillsammans med ett kursrepo. Det kan vara bra om du bidrar och utvecklar material till ett kursrepo. Eller så vill du bara ha tillgång till valideringsverktygen som en del av kursrepot.

Du behöver tillgång till verktyget `make` och processen som beskrivs här är endast testad på Linux.

När du kör med en lokal utvecklingsmiljö så bör du köra på ett testrepo och inte ett verkligt kursrepo med riktiga filer som du ändrat i. I ett testrepo kan man ta bort filer och skapa om dem från början. Det vill du *inte* göra i ditt riktiga kursrepo. Se till att du alltid har en kopia av din me katalog.

Så här gör du.



Installera och kör testerna {#test}
---------------------------------

Det finns en snabbväg för att installera alla verktyg och köra testerna.

```bash
$ make test
```

Om du är bekant med makefiler så vet du vad som händer. Alla verktygen installeras och samtliga tester körs.

Med detta enkla kommando kommer du långt. Vill du veta mer, och se hur delarna är uppbyggda, så läser du vidare.



Bekanta dig med Makefilen {#make}
---------------------------------

Det följer med en fil `Makefile` med kursrepot. Den innehåller ett antal *targets* eller kommandon, som du kan utföra.

Du kan se en översikt av dessa kommandon genom att skriva `make help` eller bara `make`.

```bash
$ make help
Displaying help for this Makefile.
Usage:
 make [target] ...
target:
 help          - Displays help.
 test          - Install test tools & run tests.
 build-prepare - Prepare the build directory.
 clean         - Remove all generated files.
 clean-me      - Remove me-directory.
 clean-all     - Remove all installed files.
 dbwebb-install          - Download and install dbwebb-cli.
 dbwebb-testrepo         - Test course repo.
 dbwebb-validate-install - Download and install dbwebb-validate.
 dbwebb-validate-check   - Check version and environment for dbwebb-validate.
 dbwebb-validate-run     - Run tests with dbwebb-validate.
 npm-install-dev - Install npm packages for development.
 npm-update-dev  - Update npm packages for development.
 composer-install-dev - Install composer packages for development.
 composer-update-dev  - Update composer packages for development.
 tools-install-dev - Install tools for development.
 tools-update-dev  - Update tools for development.
 automated-tests-prepare - Prepare for automated tests.
 automated-tests-check   - Check version and environment for automated tests.
 automated-tests-run     - Run all automated tests.
 dbwebb-validate     - Execute command with arg1=what.
```



Bra att veta {#bra}
---------------------------------

När du installerar en lokal miljö så skapas ett antal extra kataloger i ditt kursrepo.

| Katalog         | Varför?                                                  |
|-----------------|----------------------------------------------------------|
| `bin/`          | Samla körbara skript som `dbwebb-validate` och `dbwebb`. |
| `node_modules/` | Moduler som installeras av kommandot `npm` (JavaScript). |
| `vendor/`       | Moduler som installeras av kommandot `composer` (PHP).   |
| `build/`        | Filer som genereras vid varje testtillfälle.             |

Du kan radera ovanstående filer på följande sätt.

```bash
$ make clean     # Remove build/ and trash files
$ make clean-all # Remove all installed tools bin/, node_modules/, vendor/
```

När du kör testerna, till exempel via `make test` så används de lokalt installerade verktygen. Även om du har andra versioner installerade på din dator så krockar de inte med din lokala utvecklingsmiljö.
