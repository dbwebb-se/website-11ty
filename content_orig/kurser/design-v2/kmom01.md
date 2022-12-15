---
author:
  - mos
  - efo
# views:
#     flash:
#         region: flash
#         template: default/image
#         data:
#             src: "image/snapht18/design-kmom01-me.png?w=1100&h=360&a=12,10,40,2&f1=pixelate,8,2&cf&nc&f2=colorize,0,30,0,0"
revision:
    "2018-10-29": (E, mos) Nytt dokument inför uppdatering av kursen.
    "2018-10-19": (D, efo) Uppdatering med design guide.
    "2017-10-19": (C, mos) Genomläst, labbmiljön justerad.
    "2016-10-26": (B, mos) Omstrukturerad efter feedback.
    "2016-10-07": (A, mos) Första release.
...
Kmom01: Ramverk, innehåll, style
====================================

[FIGURE src=image/snapht18/design-kmom01-me.png?w=c8 class="right"]

Låt oss kika på några av de mjukare aspekterna inom webbprogrammering. Det handlar om webbdesign och användbarhet. Men det handlar också om snabba sidladdningar, sökmotoroptimering, att skriva för webben och hur vi väljer att organisera webbplatsens material. Även om vi tittar på de mjuka aspekterna så är tanken att vi lära oss "hårda" tekniker för att jobba med de mjuka. Låt se vad det kan innebära i praktiken.

Vi ställer oss frågan hur vi bygger våra webbplatser för att underlätta för design och användbarhet? Hur kan vi som programmerare rent tekniskt förbereda webbplatserna för design och användbarhet? Vi vill vara förberedda när det kommer en webbdesigner, eller designer inom användbarhet, och berättar hur webbplatsen skall se ut. Då vill vi med enkla (rimliga) medel uppfylla deras visioner.

<!--more-->

[FIGURE src=image/snapht18/design-kmom01-om.png?w=w3 caption="En omsida med en högerkolumn med två block."]

Denna kurs är främst en möjlighet att dyka in i CSS-kodande och att via  CSS-preprocessorer använda möjligheten att strukturera och optimera vår CSS-kod. Det är också en möjlighet att få insyn i vad som är grundstenarna för "god design". Genom kursen försöker vi finna tekniska sätt, för en programmerare, att jobba och implementera "god design" i en webbplats. Vi studerar också vissa aspekter av begreppet användbarhet som påverkar användarens upplevelse av webbplatsen.

För att komma igång snabbt så använder vi en befintlig webbplats som grund till vår me- och redovisa-sida. Webbplatsen bygger på ett PHP-ramverk som heter Anax. Den variant vi använder är en flat-file version där allt innehåll i webbplatsen skrivs i Markdown-filer.

[FIGURE src=image/snapht18/design-kmom01-redovisa.png?w=w3 caption="Du skriver dina redovisningstexter i Markdown i en färdig struktur."]

Öppna ditt sinne och låt oss börja. I detta första kmom inleder vi med att installera en labbmiljö, läsa lite litteratur samt att skapa redovisa-sidan och ge den style via CSS. Vi väljer att göra redovisa-sidan i ett Git-repo och lägga upp den på GitHub.

[FIGURE src=image/snapht18/design-kmom01-no-style.png?w=w3 caption="Din uppgift är att lägga till style kmom01.css till sidan så den blir användbar, det blir din första stylesheet i denna kursen."]

Under kursens gång så kommer du att introduceras till ett par tekniker som är bra att ha för en webbprogrammerare. En av de är versionshantering med Git och GitHub.



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Introduktion {#intro}
-----------------------

I videoserien "[Kursen design (v2)](https://www.youtube.com/playlist?list=PLKtP9l5q3ce9mDpkLxSwyWh5sUPfq-Hip)" kan du kika på de videor som börjar på 0* och 1*. De ger dig en kort intro till kursen och kmom01.

[YOUTUBE src="OIbV-0OPJxM" list="PLKtP9l5q3ce9mDpkLxSwyWh5sUPfq-Hip" width=700 caption="Säg hej till kursen design."]



Labbmiljön  {#labbmiljo}
---------------------------------

*(ca: 2-4 studietimmar)*

Det finns en [längre beskrivning om kursens labbmiljö](./../installera-labbmiljo). Läs den om du är osäker på vad som skall göras, eller om detta är din första dbwebb-kurs.

Den korta varianten är att du behöver [installera labbmiljön](./../labbmiljo), uppdatera [dbwebb-cli](dbwebb-cli) samt klona och initiera kursrepot.

```text
# Gå till din katalog för dbwebb-kurser
dbwebb selfupdate
dbwebb clone design
cd design
dbwebb init
```



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*



### Kurslitteratur  {#kurslitteratur}

Bläddra lite i kursboken "[The principles of Beautiful Web Design](kunskap/boken-the-principles-of-beautiful-web-design)". Bara för att bekanta dig med den, vi börjar läsa i samband med nästa kmom, men det skadar inte att ligga ett kapitel före.



### Design med HTML5 och CSS3  {#guide}

1. Läs igenom följande sektion i guiden "[Design med HTML5 och CSS3](guide/design-med-html5-och-css3)".
    * [Grunderna](guide/design-med-html5-och-css3/grunderna)

I guiden tittar vi på hur vi kan använda CSS tillsammans med HTML för att implementera designprinciper. I sektionen [Grunderna](guide/design-med-html5-och-css3/grunderna) tittar vi på grundläggande struktur för HTML och på vilka sätt vi kan applicera styling med CSS.



### Markdown {#markdown}

Läs följande för att lära dig grunderna i textformatet Markdown. Markdown är ett populärt format för att låta användaren skriva text som är läsbar för ögat men ändå enkel att konvertera till HTML med en parser. I kursen kommer du att skriva dina webbsidor med Markdown.

1. Kika på vad Markdown innebär genom att läsa [John Grubers introduktion till Markdown](https://daringfireball.net/projects/markdown/basics). För att testa själv så öppnar du en [Gist](https://gist.github.com/) och skriver i Markdown, det gör att du kan testa olika konstruktioner under tiden som du läser om dem.

1. I kursen använder vi en Markdown-parser som heter [PHP Markdown](https://packagist.org/packages/michelf/php-markdown). Du kan läsa om dess extra bidrag till Markdown-syntaxen i [referensdokumentationen](https://michelf.ca/projects/php-markdown/reference/).
    * [The Syntax: Concepts](https://michelf.ca/projects/php-markdown/concepts/)
    * [The Syntax: PHP Markdown Extra](https://michelf.ca/projects/php-markdown/extra/)



### Git & GitHub {#git}

I kursen introduceras Git och GitHub. Git är ett versionshanteringssystem för kod och GitHub är en webbplats där man kan ladda upp sitt Git-repo och använda extra tjänster.

1. Bekanta dig kort med [dokumentation på Gits hemsida](https://git-scm.com/doc). Där finner du referensinformation, en onlinebok om Git och ett antal korta videor som ger dig grunderna till vad Git och versionshantering handlar om.

1. Skaffa dig ett konto på [GitHub](https://github.com/). Du behöver det för att ladda upp och publicera ditt Git-repo. Det är gratis med konto och att ladda upp publika repon.

1. Ägna en stund åt att bekanta dig med webbplatser för GitHub. Du kan även kort och översiktligt kika på de guider och videor som finns för GitHub. Notera att de täcker så mycket mer än vad vi kommer jobba med i kursen så det kan räcka att du endast noterar att det existerar [guider för hur man jobbar med GitHub](https://guides.github.com/).



### CSS {#css}

I detta kursmomentet jobbar vi med CSS. Läs följande.

1. I online boken "[SMACSS Scalable and Modular Architecture for CSS](https://smacss.com/book/)" läser du följande korta kapitel för inspiration av en variant till hur man kan tänka när man skriver CSS i större sammanhang.
    * Introduction
    * Categorizing CSS Rules
    * Base Rules
    * Layout Rules



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



### Uppgifter {#uppgifter}

Följande uppgift skall utföras och redovisas.

1. Lös uppgiften "[Bygg en redovisa-sida till kursen design](uppgift/bygg-en-redovisa-sida-till-kursen-design)". Du skall bygga en redovisa-sida som du taggar och publicerar på GitHub. Spara allt under `me/redovisa`.

1. Försäkra dig om att du har gjort `dbwebb publish redovisa` och taggat din inlämning med version 1.0.0 (eller högre) samt pushat repot inklusive taggarna till GitHub.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Är du sedan tidigare van att jobba i ramverk för att bygga webbplatser?
* Det blev en del nya verktyg och tekniker i labbmiljön och för att jobba med redovisa sidan, är du bekant med några av dem sedan tidigare?
* Har du några förutfattade meningar, eller kanske en etablerad övertygelse, inom design och användbarhet för webben?
* Hur kändes det att styla webbplatsen med CSS? Gick det bra?
* Vilken är din TIL för detta kmom?

TIL är en akronym för "Today I Learned" vilket leksamt anspelar på att det finns alltid nya saker att lära sig, varje dag. Man brukar lyfta upp saker man lärt sig och där man kanske hajade till lite extra över dess nyttighet eller enkelhet, eller så var det bara en ny lärdom för dagen som man vill notera.




<!--
### Webbdesign och användbarhet {#webbdesign}

Läs följande artiklar.

1. Läs artikeln "[Top 10 Mistakes in Web Design](https://www.nngroup.com/articles/top-10-mistakes-web-design/)" skriven av Jakob Nielsen.

1. Läs artikeln som ger en kort introduktion till användbarhet, "[Usability 101: Introduction to Usability](https://www.nngroup.com/articles/usability-101-introduction-to-usability/)" skriven av Jakob Nielsen.

-->
<!-- Eventuellt skriva artikel om usability, kanske i projektet? -->



<!--
### Video  {#video}

Titta på följande:

1. Till kursen finns en videoserie, "[Teknisk webbdesign och användbarhet](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)", kika på de videor som börjar på 0 och 1. Videorna som börjar på 110* är kopplade till en av de artiklar du skall jobba igenom under övningarna nedan. Titta på dem samtidigt som du jobbar igenom artikeln.

-->


<!--

### Lästips {#lastips}

Kika på följande om du är intresserad och finner det värt tiden.

1. I övningarna introduceras du till Git och GitHub. Om du vill jobba igenom en separat övning med Git och GitHub så finns artikeln "[Kom igång med Git och GitHub](kunskap/kom-igang-med-git-och-github)".

1. Ramverket du använder i kursen är Anax. Bekanta dig gärna med [Anax dokumentationen](anax).

1. Anax Flat, en variant av Anax som vi kommer använda i denna kursen, kan sägas vara ett flat-file framework. Bekanta dig kort med ett annat sådant ramverk som heter [Grav](https://getgrav.org/) och är byggt med PHP. Du kan kika på vilka features det har och kika översiktligt på dess dokumentation.

-->


<!--
Filosofi dry, yagni, kiss


Artiklar att läsa:

http://lesscss.org/ olika delar beroende av läget.

https://abookapart.com/

http://simplebits.com/   ?

https://addyosmani.com/first/

https://www.berndtgroup.net/thinking/blog/development/modularizing-your-front-end-code-for-long-term-maintainability-and-sanity

https://blog.usejournal.com/should-you-build-a-reusable-component-library-4e7df72413d7

https://glenmaddern.com/articles/css-modules

https://medium.com/front-end-developers/css-modules-solving-the-challenges-of-css-at-scale-85789980b04f

https://css-tricks.com/methods-organize-css/

http://www.developerdrive.com/2017/11/6-ways-to-organize-your-css/

https://medium.com/@Intelygenz/how-to-organize-your-css-with-oocss-bem-smacss-a2317fa083a7

https://medium.com/openmindonline/how-i-organize-css-in-large-projects-using-ufocss-part-1-9d04417f39f3

https://www.keycdn.com/blog/oocss

https://github.com/stubbornella/oocss/wiki

http://oocss.org/

https://smacss.com/

https://en.bem.info/

https://medium.com/@afrench53198/reusable-maintainable-and-modular-css-b0ffedf1c208


-->

<!--
### Tekniker för att skriva för webben {#skriva}

1. Det är viktigt att ha koll på hur vi skall tänka när vi skriver för webben. Under kursen skall vi läsa igenom guiden "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)". Du kan börja kort med följande kapitel, bara för att bekanta dig med materialet.

    * 1. Innehållsförteckning
    * 2. Förord
-->
