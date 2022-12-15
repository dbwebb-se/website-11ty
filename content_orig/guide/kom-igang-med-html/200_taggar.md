---
sectionHeader: true
linkable: true
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Taggar {#taggar}
---------------------------------------------------

HTML handlar om att bygga en struktur för sidan där man senare lägger på utseendet för strukturen med CSS. HTML fokuserar alltså på själva grunden, och struntar i färger, former och storlekar (för det mesta).

Strukturen byggs med hjälp av det som kallas **taggar**. Taggar består ofta utav ett *par* eller *självavslutande* taggar. Här är exempel på ett *par*:

```html
<p></p>
```

Här är ett exempel på en *självavslutande* tagg som man kan skriva på olika sätt. Det första är *strikt*, dvs man anger att den avslutar sig själv:

```html
<hr />
```

Man måste inte ange avslutet (`/`) för en självavslutande tagg, utan när koden visas på sidan så kommer det att ske av sig själv. Därför kan man om man vill skriva såhär istället:

```html
<hr>
```

Vilket man väljer är en smaksak. Man kanske gillar att skriva tydligare och striktare kod, eller så gillar man när det är snabbt och enkelt. Vilket som går bra, men tänk på att vara konsekvent och alltid följa samma sätt.

Nu har vi koll på vad taggar är, så nu kan vi börja sätta ihop vårat HTML-dokument. Vi börjar lugnt och bygger upp sturkturen, och i andra halvan så trappar vi upp stegen lite och tar upp flera element per steg och jobbar med kategorier istället för att fylla på med innehåll.
