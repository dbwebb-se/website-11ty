---
author: nik
category:
    - kurs/design-v3
    - grid
    - flex
revision:
    "2020-11-11": (A, nik) Skapad inför ht20
...
Bygg om din rapport-sida med CSS-Grid
===================================

Du skall bygga om rapport-sidan på din portfolio sida med hjälp utav CSS-Grid.

Du börjar med att strukturera upp din samlingssida (`portfolio/report/index.md`) för alla rapporter och följer sedan upp med att fixa din layout för dina individuella kursmoment (`portfolio/report/kmomXX.md`).

<!--more-->

Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom följande tre delar i "[Design med HTML5 och CSS3](guide/design-med-html5-och-css3)"

* [CSS Grid Layout](guide/design-med-html5-och-css3/css-grid-layout)
* [Flexbox - Parent Elements](guide/design-med-html5-och-css3/flexbox)
* [Flexbox - Child Elements](guide/design-med-html5-och-css3/flexbox-del2)

Och artikeln [Skapa en specifik layout i Pico](kunskap/skapa-en-specifik-layout-i-pico) som beskriver hur du kan skapa en layout för specifika sidor.

## Wireframe {#wireframe}

Som webbutvecklare är det inte sällan man får något som kallas en wireframe av en kund eller en designer. Fokuset på dessa wireframes brukar bland annat vara att visa vilken funktionalitet som ska vara med på sidan och hur saker ska placeras på sidan. Vill du läsa mer om just wireframes så kan du göra det [här](https://en.wikipedia.org/wiki/Website_wireframe).

Krav {#krav}
-----------------------

En alumni till programmet, Matilda, var snäll nog att göra fyra wireframes som ni ska efterlikna med hjälp utav CSS-Grid och/eller Flexbox. Själva designen på sidorna är er att välja, det är layout:en vi är ute efter. Om ni vill ha större bilder så kan ni trycka på bilderna för att få full storlek.

[INFO]
Mobilmenyn som visas i våra wireframes är den för hela portfolion. Ni behöver inte göra en till för era undersidor.
[/INFO]

## Landningssida {#landningssida}

* Din landningssida skall använda sig utav en egen layout, `report.twig`
* Din landningssida skall använda sig utav CSS-Grid.
* Din grid ska bestå utav tre kolumner.
* Titel för sidan och projektboxen ska vara en del av gridet och ta tre kolumner i bredd.
* Boxarna ska ha en länk till respektive kursmoment så man kan navigera vidare.
* Sidan och dess grid ska vara responsivt genom att:
    * Besöks sidan via en telefon ska gridet istället vara en kolumn bred.

Resten av designen är upp till er att bestämma.

[FIGURE src=image/design-v3/wireframes/frame_2.png?height=450 caption="Vår landningssida på desktop"]
[FIGURE src=image/design-v3/wireframes/frame_1.png?height=450 caption="Vår landningssida på en telefon"]

## Report {#report}

* Samtliga rapportsidor ska använda samma layout, `kmom.twig`
* Rapportsidorna ska använda sig av antingen CSS-Grid eller flexbox.
* Sidan ska ha två olika kolumner
    * En sidebar som ska innehålla länkar till samtliga kursmoment.
    * En content-del som ska skriva ut innehållet ifrån `report/kmomXX.md`.
* Sidan ska vara responsiv genom att:
    * Besöks sidan via en telefon ska sidebaren döljas.

Resten av designen är upp till er att bestämma.

[FIGURE src=image/design-v3/wireframes/frame_3.png?height=450 caption="Vår enskilda report-sida på desktop"]
[FIGURE src=image/design-v3/wireframes/frame_4.png?height=450 caption="Vår enskilda report-sida på mobil"]

## Övrigt {#ovrigt}

* Din SASS-filer ska validera enligt `npm run lint`.

Extrauppgifter {#extra}
-----------------------

* Implementera gärna flexbox eller grid på någon annan del av din sida om du får tid över.


Tips från coachen {#tips}
-----------------------

Testa gärna att göra olika layouts om du får tid över.

Lycka till och hojta till i Discord om du behöver hjälp!
