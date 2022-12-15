---
author:
    - nik
    - grm
category: itsec
revision:
    "2022-05-25": (C, grm) Removed OAuth2.
    "2019-11-24": (B, aurora) Improved structure, reworked assignments.
    "2019-11-22": (A, aurora) Initial release.
...

Lösenordshantering {#password}
==================================

Uppgiften går ut på att implementera säker lösenordshantering i en Express applikation.

<!--more-->

Förkunskaper {#forkunskaper}
-----------------------------

Du har deltagit i föreläsningen som tillhör kursmomentet.

Installation {#installation}
-----------------------------

Börja med att kopiera in mappen med applikationen till er me-katalog:

```bash
# Flytta till kurskatalogen
$ rsync -ravd example/password-app/ me/kmom03/password-app/
```

#### Docker

Starta applikationen med `docker-compose up -d`. Mer information finns i `README.md`

#### Utanför Docker

Följ installationsinstruktionerna i `README.md`

Säker lösenordshantering {#grundkrav}
-----------------------------

I applikationen (som ni kan nå via [localhost:3000](http://localhost:3000)) ska ni implementera säker lösenordshantering. Detta gäller vid följande funktionalitet:

* Skapandet av användare
* Uppdatering av användare
* Återställning av databas

### "Hur bra är lösenordet"

Många sidor visar hur starkt lösenordet är när man sätter ett nytt lösenord (baserat på vissa kriterier). Implementera en sådan lösning som visas när användaren sätter lösenordet vid:

* Skapandet av en ny användare
* Uppdatering av en existerande användare

I er redovisningstext, skriv vilka "krav" på lösenordet ni väljer att sätta.

### Krav

Utöver ovanstående krav gäller följande:

* Konfigurera så att det inte går att chansa på lösenord hur många gånger som helst (timeout etc)
<!--* Applikationen ska fungera i Docker

OAuth2 via GitHub (Optionellt) {#oauth}
-----------------------------

Implementera OAuth2 inloggning via Github. Om ni väljer att göra detta krav, gör en kopia på applikationen från föregående uppgift och lägg den i `kmom04/oauth` genom att köra följande:

```bash
# Flytta till kurskatalogen
$ rsync -ravd me/kmom04/app/ me/kmom04/oauth/
```

[Här](https://github.com/sohamkamani/node-oauth-example) finns en enkel applikation som visar hur ni kan sätta upp OAuth2 via GitHub.

### Krav

* Användare ska erbjudas möjligheten att logga in via GitHub utöver vanlig inloggning
* Nya användare som loggar in via GitHub ska tilldelas "User" rollen
* Permissions (Admin/User) ska gälla samtliga användare
* Visa användarna i två olika tabeller
    * Användare skapade via applikationen
    * Användare inloggade via GitHub
* Applikationen ska fungera i Docker



John the Ripper {#john}
-----------------------------

Fråga Kenneth


-->

Redovisa {#redovisa}
-----------------------

Skriv ihop hur du gjorde, vilka lösenordsregler du använde och hur du löste dem i koden. Gärna med kodexempel. Spara i en pdf och redovisa på Canvas. Om du vill ha feedback på din kod, så publicerar din kod:

```bash
# Flytta till kurskatalogen
$ dbwebb publish kmom03
```
