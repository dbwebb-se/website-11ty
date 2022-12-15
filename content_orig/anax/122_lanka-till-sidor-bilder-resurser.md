---
...
Länka till sidor, bilder och resurser
==================================

De länkar vi skriver i Markdown eller med HTML-kod, kommer att processa av `mos/ctextfilter` och `mos/anax` för att göra det enkelt att länka.

Nedan beskriver hur du gör för att länka till andra sidor, så kallade routes, till bilder och andra resurser.



Länka mellan dokumenten {#links}
-----------------------------------

En länk i Markdown kan skapas med `[länktext](some/route)`. När länken är relativ så läggs webbplatsens basurl automatiskt till. Det gör att oavsett i vilket dokument du är i, inom katalogen `content`, så kan du alltid använda länkar som är relativa rooten.

Detta gäller även för relativa länkar som är skapade med ren HTML-kod.



Länka till bilder {#img}
-----------------------------------

När du jobbar i katalogen `content` så kan du alltid länka till bilder i katalogen `htdocs/img` genom att skriva relativa bildlänkar såsom `![text om bilden](img/dbwebbisar.jpg)`.

Webbplatsens basurl kommer alltid att läggas till en sådan relativ bildlänk. Det gör att du kan använda samma sätt att länka till bilder oavsett i vilken underkatalog till `content` du befinner dig i.

Här är två exempel på hur du kan länka till en bild.

```text
![alt text](img/dbwebbisar.jpg)
<img src="img/dbwebbisar.jpg" alt="alt text">
```
 Så här ser det ut.

![alt text](img/dbwebbisar.jpg)

<img src="img/dbwebbisar.jpg" alt="alt text">

Så, alla bildlänkar blir relativa htdocs-katalogen.



Att direktlänka till resurser {#asset}
---------------------------------

Men om du vill skapa en länk till en bild, ett pdf-dokument eller en annan php-sida?

Två svar.

1. Använd [snygga länkar](anax/snygga-lankar) och fortsätt att använda relativa länkar. Webbplatsens basurl läggs till länken enligt tidigare, men nu utan skriptnamnet `index.php/`.

1. Berätta för Anax att länken är en länk till en resurs och inte till en sida i Anax. Du gör detta genom att lägga till en `!` i början av länken. Alla sådana länkar betraktas som en länk till en resurs och inte till en sida via Anax.

Här är ett exempel hur du kan skapa en länk till en bild.

```text
[Visa hela bilden](!img/dbwebbisar.jpg)
<a href="!img/dbwebbisar.jpg">
    <img src="img/dbwebbisar.jpg" alt="alt text">
</a>
```

[Visa hela bilden](!img/dbwebbisar.jpg)
<a href="!img/dbwebbisar.jpg">
    <img src="img/dbwebbisar.jpg" alt="alt text">
</a>
