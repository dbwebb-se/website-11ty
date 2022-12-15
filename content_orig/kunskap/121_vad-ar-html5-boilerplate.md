---
author: mos
category: artikel
updated: "2013-04-01 11:33:44"
created: "2012-08-31 08:03:16"
...
Vad är HTML5 Boilerplate?
==================================

**HTML5 Boilerplate** är en samling filer som kan vara en utgångspunkt när du skapar nya webbplatser. I koden kring HTML5Boilerplate så finns det samlat en **stor kunskap om hur man bygger webbplatser**, hur koden och strukturen kan se ut, lösningar på ofta förekommande frågor med mycket mera. Koden och lösningarna kring HTML5Boilerplate erbjuder en enkel väg in till "best-practice" om hur en webbplats kan se ut.

<!--more-->

En sådan här kodsamling, som går att återanvända om och om igen, utan att modifiera dess bas, brukar i kodningssammanhang kallas för "boilerplate" eller "[boilerplate kod](http://en.wikipedia.org/wiki/Boilerplate_code)". Hela tanken är att samla bra kod och kodningslösningar och göra det enkelt att återanvända dem. Varför skriva om något som man redan gjort tidigare? 



Idéen med HTML5Boilerplate {#intro}
--------------------------------------------------------------------

[FIGURE src=/img/snapshot/html5boilerplate-logo.png alt="Logo för HTML5 Boilerplate" class="right"]

[HTML5 Boilerplate](http://html5boilerplate.com/) är ett projekt med målet att leverera en **bas med HTML, CSS och JavaScript** som hjälper dig bygga snabba, robusta och anpassningsbara webbplatser. Koden är skriven för att ge dig en stabil grund att stå på. Innehållet i HTML5 Boilerplate är inte bara HTML, CSS och JavaScript utan där finns även saker och ting runt omkring som gör att din sida ska fungera optimalt som till exempel grunden för en fil [`.htaccess`](http://en.wikipedia.org/wiki/Htaccess) med inställningar för apache och grunden för filer såsom [`robots.txt`](http://www.robotstxt.org/), [`humans.txt`](http://humanstxt.org/) och [`sitemap.xml`](http://en.wikipedia.org/wiki/Site_map).

Bästa sättet att bekanta sig med HTML5 Boilerplate är helt enkelt att bygga en webbplats med det. Källkoden finns på GitHub så du kan studera den innan du laddar ned den. Eller varför inte bara clona den?

> `git clone git://github.com/h5bp/html5-boilerplate.git`

Tillsammans med källkoden finns också dokumentation. Se till att studera den och kika lite extra, det är trots allt en samling av "best-practice" från några av de internationellt mest erkända webbutvecklarna. Kika var de placerar sina JavaScript, vilka element finns i HTML `<head>`, hur är stylesheeten strukturerad och hur normaliserar de style mellan olika webbläsare? Hur fungerar faviconer på iPhone? Det finns mycket spännande och oerhört nyttiga saker att lära sig genom att studera koden bakom HTML5 Boilerplate.

Källan till kunskapen bakom HTML5 Boilerplate är manualer, specifikationer och år av beprövad erfarenhet. Här finns mycket kunnande att inhämta med jämförelsevis en liten insats.



Nackdelar med HTML5Boilerplate (?) {#nackdel}
--------------------------------------------------------------------

Det finns inga direkta nackdelar, möjligen skulle det vara att det finns lite väl mycket kod som en nybörjare inte behöver eller förstår. Det är kod för proffs. Men om vi ännu inte är fullblodiga proffs så erbjuds här en ypperlig möjlighet att lära av proffsen. Så var inte rädd för att kasta dig in i koden. Det går alltid ta bort eller kommentera bort de delarna man inte förstår vid första anblicken.

Boilerplaten är inte förberedd för PHP eller databas, det är helt enkelt inget som omfattas av projektet. Så för oss PHP-kodare så blir det till att finna ett bra sätt att konvertera, eller integrera, boilerplaten till en PHP-baserad webbplats. För egen del så försöker jag låta bli att ändra i de filer som finns så jag tar hellre en kopia av `index.html` och döper till `index.php`. Svårare än så behöver det inte vara.

Jag gjorde en [enkel webbplats baserad på HTML5 Boilerplate](phpmvc/me/kmom01/) i samband med [phpmvc-kursen](phpmvc). Jag valde en liten annan struktur på hanteringen av grundsidan och stylen. Jag samlade dessa i en egen katalog [`theme`](phpmvc/me/kmom01/viewsource.php?dir=theme). Där finns filerna [`template.php`](phpmvc/me/kmom01/viewsource.php?dir=theme&file=template.php) och [`default.tpl.php`](phpmvc/me/kmom01/viewsource.php?dir=theme&file=default.tpl.php) som blev min grundsida, eller kanske mer som ett grundtema. Därefter skapade jag varje sida som till [`index.php`](phpmvc/me/kmom01/viewsource.php?dir=&file=index.php) eller [`redovisning.php`](phpmvc/me/kmom01/viewsource.php?dir=&file=redovisning.php). Mitt upplägg gör att det blir enkelt att uppdatera boilerplaten, utan att förstöra min egen webbplats.

Men, man kan göra på olika sätt, välj din egen strategi för hur du integrerar din egen kod med HTML5 Boilerplate.



Läs mer {#mer}
--------------------------------------------------------------------

[Läs mer på hemsidan för HTML5Boilerplate](http://html5boilerplate.com/) eller lyssna på Paul Irish när han pratar om HTML5 Boilerplate i nedan timslånga video.

[YOUTUBE src=qyM37XKkmKQ width=613 caption="Paul Irish pratar om HTML5 Boilerplate."]



HTML5 Boilerplate på studentservern {#stud}
--------------------------------------------------------------------


[INFO]
För att HTML5 Boilerplate ska fungera på studentservern krävs det att du ändrar i filen `.htaccess`. Du behöver kommentera bort följande rader.

```html
<IfModule mod_rewrite.c>
  RewriteCond %{HTTPS} !=on
  RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
  RewriteRule ^ http://%1%{REQUEST_URI} [R=301,L]
</IfModule>
```

skall vara 

```html
#<IfModule mod_rewrite.c>
#  RewriteCond %{HTTPS} !=on
#  RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
#  RewriteRule ^ http://%1%{REQUEST_URI} [R=301,L]
#</IfModule>
```

Om du inte gör detta så kommer du hela tiden bli länkad till webbplatsen **student.bth.se** (som inte finns) istället för webbplatsen **www.student.bth.se**. Det är det som rewrite-regeln säger.

[/INFO]



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2013-03-28 (C, mos) Uppdaterad i samband med vårterminen 2013 och campuskursen för phpmvc.  
2012-08-31 (B, mos) Flyttad från WordPress till Lydia.  
2012-03-14 (A, rgi) Skriven för phpmvc-kursen. Rickard Gimersted skrev första versionen av detta dokument.  
</span>
