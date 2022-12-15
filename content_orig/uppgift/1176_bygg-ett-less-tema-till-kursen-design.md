---
author: mos
category:
    - kursen design
    - anax flat
    - less
revision:
    "2018-10-30": "(B, mos) Publicerad för design v2."
    "2018-10-15": "(A, mos) Kopia från 'Bygg en ut ditt Anax Flat med eget LESS tema' och omskriven."
...
Bygg ett LESS-tema till kursen design
===================================

Du skall bygga ett tema till din redovisa-sida och du bygger temats stylesheet med hjälp av LESS.

Du börjar strukturera din tema-kod i separata filer som vi kallar less-moduler.

Du lägger till externa moduler och du bygger in responsivitet i ditt tema.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har sedan tidigare en version av din redovisa-sida som är ett eget repo på GitHub och det är taggat i minst version 1.0.0.

Du har en labbmiljö som motsvarar [labbmiljön för kursen design och kmom02](kurser/design-v2/kmom02#labbmiljo).



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.

Du kan se hur jag jobbar igenom stegen i videoserien "[Bygg ett LESS-tema till kursen design](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-HCkrXAcedUGv14A68Sv57)".

[YOUTUBE src="8S2K7qAeD5Q" list="PLKtP9l5q3ce-HCkrXAcedUGv14A68Sv57" width=700 caption="Videoserie som ger dig en introduktion till de olika delarna i att lösa uppgiften."]



### Kopiera från example/redovisa {#kopiera}

Det finns en katalog som är förberedd för att jobba med ett LESS-tema till din redovisa-sida i design-kursen. Kopiera den och installera sedan det som behövs.

```text
# Stå i rooten av kursrepot
rsync -av example/theme/ me/redovisa/theme/
cd me/redovisa
```

Du har nu en katalog `redovisa/theme` som innehåller en utvecklingsmiljö för LESS-teman kopplade till din redovisa-sida. Kolla snabbt runt i den för att se vad den innehåller.

För att komma igång och börja bygga dina egna LESS-teman så behöver du installera en utvecklingsmiljö in din nya katalog `redovisa/theme`.

```text
# Stå i me/redovisa/theme
make install
make modules-install
```

Kommandot make ser till att installera det som behövs i form av utvecklingsmiljö för LESS och de LESS-moduler som du kan komma att använda under kursens gång.



### Grunden till ditt första LESS-tema {#makeless}

Du har sedan tidigare ett tema `kmom01.css`. Ta nu en kopia av det och placera som en LESS-modul. Följande kommando hjälper dig.

```text
# Stå i me/redovisa.
cp htdocs/css/kmom01.css theme/src/module/kmom01.less
```

Du har nu en LESS-modul, som består av hela ditt tema (stylesheet) från kmom01, i filen `theme/src/module/kmom01.less`.

Dina teman ligger i `theme/src/*.less` och de kommer att kompileras till stylesheets med samma namn. Vi kan kalla dessa för teman, de är den huvudsakliga stylsheeten som kommer att inkludera de LESS-moduler du nu väljer.

Öppna temat i filen `src/kmom01_v2.less` och ta bort kommentaren framför den raden som importerar din modul `src/module/kmom01.less`.

```less
/**
 * Internal self contained modules, save in directory module/.
 */
//@import "module/kmom01.less";
```

Bort med kommentaren. Du kan nu pröva att kompilera dit tema `kmom01_v2`.

<!--
```text
# Stå i me/redovisa/theme
make build
```

Make kommer att kompilera, eller bygga, ditt tema och utgå från instruktionerna i tema-filen. I katalogen `build` sparas temporära byggfiler och när bygget lyckas så uppdateras temat (stylesheetfilen) i katalogen `htdocs/css`.
-->


### Bygg temat direkt i me/redovisa {meredovisa}

För att göra det enkelt att bygga och uppdatera tema-filerna i din `me/redovisa` så kan du bygga filerna direkt i den katalogen via `make theme`. När bygget lyckas så kommer alla teman (stylesheets) att kopieras till `me/redovisa/htdocs/css`.

```text
# Stå i me/redovisa
make theme
```

Du kan nu öppna din stilväljare och välja den nya stilen `kmom01_v2` som nu är byggd med LESS-moduler. Det är inte så många moduler ännu, men det är en start.



### Fördela style i "base" och "layout" {baselayout}

Om du tittar i filen `src/kmom01_v2.less` så inkluderar den ett antal LESS moduler som heter något i stil med `*_default.less`.

Ta nu en kopia av varje default-fil och spara den med samma namn, utan ändelsen `_default`. När du är klar har du följande filer.

| Filnamn                  | Innehåll |
|--------------------------|----------|
| `base/base.less`         | Generell bas style för html-element. |
| `layout/layout.less`     | Style för bredd och generell layout på dina regioner. |
| `layout/responsive.less` | Style för responsivitet (kan även läggas på andra platser). |

När du har skapat filerna så kan du göra en första ansats att fördela din kod från `kmom01.less` och flytta till "base" och "layout". Flytta de delarna som du anser vara generella och kan återanvändas nu när du snart skall göra temat `kmom02.less`.



### Skapa temat kmom02.less {#kmom02.less}

Då skapar vi ett nytt tema som vi döper till "kmom02" i filen `theme/src/kmom02.less`.

Börja med att kopiera innehållet från temat `kmom01_v2` så har du något att utgå ifrån.

Din bas är ungefär så här nu.

```less
/*!
 * Stylesheet for design kmom02.
 *
 * This stylesheet is for the design course and kmom02 where we use LESS.
 */

/**
 * Internal self contained modules, save in directory module/.
 */
@import "module/kmom01.less";

/**
 * Base style to affect HTML elements on a general scale.
 */
@import "base/base.less";

/**
 * Layout style for general structure of header, navbar, main, footer
 * and other regions of the page including route specific styles.
 */
@import "layout/layout.less";
@import "layout/responsive.less";
@import "layout/regions.less";     // To add style for ?regions

/**
 * My own settings, not currently in their own module.
 */
```

Då är vi redo att börja style med hjälp av LESS och bygga det nya temat.

Provbygg temat och välj det i stylesheetväljaren.

```text
# Stå i me/redovisa
make theme
```

Du kan nu öppna din stilväljare och välja den nya stilen `kmom02`.



### Nollställ stylen med Normalize {#normalize}

I tema-katalogen finns modulen [Normalize](https://necolas.github.io/normalize.css/) installerad under `src/normalize.css/`. Det är style som försöker likställa stylen, eller normalisera, oavsett vilken webbläsare man har.

Vi skall använda modulen i vårt tema och det är den allra första modulen som skall importeras. Lägg alltså följande kod överst i ditt tema.

```less
/**
 * Normalize and reset the style.
 */
@import "normalize.css/normalize.less";
```

Pröva att kompilera om din stylesheet och se om du ser någon visuell skillnad. Det kan vara små saker som skiljer sedan tidigare.

Vill du börja från början så kan du testa att kommentera ut dina andra moduler i temat, tills vidare.



### Lägg till Font Awesome {#fontawesome}

För att få tillgång till en samling ikoner (och för att träna på externa moduler) så väljer vi att inkludera Font Awesome som en LESS-modul. Modulen finns redan installerad i temat under `src/@fortawesome` och de webbfonter som krävs ligger redan i `redovisa/htdocs/webfonts`. Det som kvarstår av installationen är att importera LESS-modulerna, sedan kan vi använda de ikoner som finns.

Så här lägger du till Font Awesome i ditt tema.

```less
/**
 * Font Awesome.
 */
@import "@fortawesome/fontawesome-free/less/fontawesome.less";
@import "@fortawesome/fontawesome-free/less/solid.less";
@import "@fortawesome/fontawesome-free/less/brands.less";
```

Prova att kompilera om ditt tema, bara så du inte får några felmeddelanden. Att importera dessa bör inte göra någon skillnad alls på ditt tema.



### Responsiv meny {#respmeny}

När man jobbar med responsiva webbplatser kan man behöva alternativa menyar, navigeringsmöjligheter. Små enheter lämpar sig för menyer som man kan öppna och stänga medans större enheter kan ha traditionella navbars, med eller utan kompletterande öppen/stäng menyalternativ.

Låt oss lägga till stöd för en responsiv meny. Modulen `@desinax/responsive-menu` ligger redan i tema-katalogen under `src/@desinax/responsive-menu`.

Du inkluderar stylen i ditt tema med följande konstruktioner.

```less
/**
 * A responsive menu.
 */
@import "@desinax/responsive-menu/less/responsive-menu.less";
@import "@desinax/responsive-menu/less/media-queries.less";
```

Bygg ditt tema och välj det i styleväljaren så kan du se hur den responsiva menyn nu syns på din webbplats.



### Bekanta dig {#bekanta}

Du kan ta hjälp av videoserien för att kolla in hur man gör ovanstående och hur det kan se ut.

* Hur gör man en bild responsiv?
* Hur kan man styla navbaren och/eller headern på ett responsivt sätt?
* Hur kan man styla innehållskolumnerna för 1, 2 eller 3-kolumners layout?



Krav {#krav}
-----------------------

1. Lägg till en stylesheet `kmom01_v2` och låt den vara en omstrukturerad kopia från kmom01. Börja fördela din kod i moduler för "base" och "layout". Du väljer själv hur mycket du lägger i "base" och "layout".

1. Lägg till en stylesheet `theme/src/kmom02.less` (tema för kmom02) som använder sig av den "base" och "layout" du har skapat.

1. I temat för kmom02, använda modulen Normalize.

1. I temat för kmom02, använda modulen Font Awesome.

1. I temat för kmom02, använda modulen `@desinax/responsive-menu`.

1. Fortsätt att jobba med att fördela din stylesheet-kod i "base", "layout" och övriga moduler du själv väljer att skapa. När du är klar så skall du inte inkludera någon kod från filen `module/kmom01.less`, allt skall vara utflyttat i moduler eller i tema-filen. Du kan skapa nya filer för "base" och "layout" så att du inte "förstör" din style i temat `kmom01_v2`.

1. Jobba vidare med ditt tema. Du behöver inte styla jättemycket, det kommer fler möjligheter under kursen. Men, det måste vara ett hyffsat gott grundtema så att webbplatsen går att använda.

1. Header-delen skall vara stylad och se helt okey ut.

1. Footer-delen skall vara stylad och se helt okey ut.

1. Menyn/navbaren skall vara väl fungerande och hyffsat responsiv. Använd de två menyer som finns med och växla mellan dem som du anser rimligt.

1. Innehållsdelen och eventuella sidokolumner skall se bra ut i en, två och tre kolumners layout samt fungera hyffsat responsivt.

1. Aktivera din style `kmom02` som default stylesheet i styleväljaren.

1. Gör en `dbwebb publishpure redovisa` och kontrollera att allt fungerar på studentservern.

1. Committa alla filer, inklusive temats filer och lägg till en (ny) tagg (2.0.\*).

1. Pusha repot till GitHub, inklusive taggarna.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
