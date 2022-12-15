---
author:
  - lew
  - efo
category: javascript
revision:
  "2018-10-05": (B, efo) Ändrade så libs filer inte skrivs över.
  "2015-10-13": (A, lew, mos) Första utgåvan i samband med kursen webgl.
...
Rita trianglar med WebGL och animera dem
==================================

Fortsätt jobba med WebGL genom att förbättra din sandbox för testprogram samt göra ett testprogram som ritar och animerar trianglar.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

<!--
Du har jobbat igenom artikeln "[WebGL med animering i fullskärmsläge](kunskap/webgl-med-animering-i-fullskarmslage)".
-->

Du har läst igenom kapitel 3 och 4 i boken "[WebGL Programming Guide](kunskap/boken-webgl-programming-guide)".

Du har studerat [exempelprogrammen i kursrepot](webgl/repo/example) som heter `example/sandboxWebGL3*/` samt `example/sandboxWebGL4*/`.



Introduktion {#intro}
-----------------------

Börja med att ta en kopia av din befintliga sandbox.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -i kmom01/sandbox2/* kmom02/sandbox3/
```

Nu har du grunden för att göra din uppdaterade sandbox.


Krav {#krav}
-----------------------



###Del 1 En bättre sandbox3 {#sandbox3}

1. Fundera över din kodstruktur i ditt exempelprogram.

1. Studera koden i de exempelprogram som heter `example/sandboxWebGL3*/` samt `example/sandboxWebGL4*/`. Observera att exempel filerna använder `example/lib/webgl-utils.js`, så kopiera den filen till din katalog.

Kopiera dessa till `me/lib/` katalogen med kommandot.

```bash
cp -i example/lib/webgl-utils.js me/lib/
```

Du kan nu inkludera filen `webgl-utils.js` med följande rad HTML.

```html
<script type="text/javascript" src="../../lib/webgl-utils.js"></script>
```

3. Gå igenom din egen kodstruktur och uppdatera den så du blir nöjd.

4. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate sandbox3
dbwebb publish sandbox3
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



###Del 2 Rita trianglar och animera dem {#tri}

1. Kopiera alla filerna i din uppdaterade sandbox3 och lägg dem i katalogen `me/kmom02/tri`. Du kan göra det med kommandot.

```bash
# stå i kursrepot
cp -ri me/kmom02/sandbox3/* me/kmom02/tri/
```

2. Utgå ifrån exemplen i boken kapitel 4 samt exempelprogrammen `example/sandboxWebGL3*/` och `example/sandboxWebGL4*/`. Observera att exempel filerna använder `example/lib/webgl-utils.js`, så kopiera den filen till din katalog.

3. Gör en kontrollpanel med knappar som kan lägga till godtyckligt antal trianglar.

4. Animationen skall kunna startas och stoppas samt ändras hastigheten.

5. De trianglar som läggs till skall hanteras individuellt med färg, hastighet, rotering, skala och translate.

6. Lägg till en FPS-mätare. [Titta på exemplet](https://github.com/mosbth/webgl/blob/master/tutorial/fps.md) och/eller i bokens appendix.

7. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate tri
dbwebb publish tri
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



###Del 3 Integrera i din portfölj {#portfolio}

1. Integrera din canvas med animerade triangler från denna uppgiften i din portfölj.



Extrauppgift {#extra}
-----------------------

1. Bygg ut din kontrollpanel så man kan lägga till ett valfritt antal trianglar som slumpas ut i färg och form.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
