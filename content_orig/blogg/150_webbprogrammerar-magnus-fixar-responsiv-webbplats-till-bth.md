---
author: mos
category: utbildning
published: "2014-02-24 08:34:59"
created: "2014-02-24 08:34:59"
...
Webbprogrammerar-Magnus fixar responsiv webbplats till BTH
==================================

Magnus - också känd som Bella - går tredje året på programmet Webbprogrammering, fick i höstas ett uppdrag att utveckla BTH's kampanjsite till en responsiv webbplats, nu kan vi se resultatet av det arbetet.

<!--more-->

[FIGURE src=/image/person/magnus-bellstrand-2.jpg?w=c8 caption="En glad Magnus efter slutfört projekt." class="right"]

Att bygga responsiva webbplatser blir mer och mer vanligt. Det är webbplatser där layouten skiftar beroende skärmens storlek. Grundinnehållet som visas är detsamma, även om visst innehåll döljs ju mindre skärmen är.

Responsiva webbplatser är en teknik för att skräddarsy innehåll till olika skärmar, andra liknande tekniker är att bygga separata webbplatser för mobila enheter eller att skapa app-liknande webbplatser som lämpar sig för mindre enheter som mobiler.

Att bygga en responsiv webbplats är egentligen inte så svårt, det handlar om att använda *media queries* och ställa in dem så att webbplatsen får rätt style vid olika bredder.

Här är ett exempel som väljer att inte visa en sidebar när webbläsarens bredd är mindre än 600 pixlar.

```css
@media (max-width: 600px) {
  .sidebar {
    display: none;
  }
}
```

Det bästa sättet att bygga en responsiv webbplats är att tänka till från början, man måste se till att de olika elementen är förberedda för att kunna hanteras på ett responsivt sätt.

Men, Magnus hade utmaningen att göra en icke-förberedd webbplats till en responsiv webbplats. Det är inte lika enkelt. 

BTH's drivkraft bakom projektet var ett ökat antal besökare på mobiler och läsplattor.

> *"Då vi ser att alltfler besökare använder mobiler och surfplattor har vi inför kommande rekryteringsarbete uppdaterat vår kampanjsite, www.bth.se/dinframtid till att vara responsiv."*

Webbplatsen är byggd med WordPress, baserat på ett icke-responsivt tema. Magnus hade först tankarna på att byta ut temat men eftersom webbplatsen var relativt komplex så var det inte en hållbar väg, istället blev det till att handkoda stylesheeten till att bli responsiv. En lagom utmaning till Magnus som han rodde hem.

Magnus kommenterar sitt arbete:

> *"Det var inte så mycket justeringar i HTML-strukturen, det handlade mest om ändringar i stylesheeten, och det var rejält pilligt på grund av den strukturen som CSS-koden hade. Det en hel del hantering av olika id:n och CSS-klasser, det räckte inte bara att ändra på en plats..."*

> *"Det fanns ett par flash-pluginer på orginalsidan, och de var luriga att hantera responsivt och det slutade med att några av dem plockades bort."*

> *"...sen borde man (om man har möjlighet) bygga den responsiva designen med tanke på mobile i första hand, det är mycket bättre att ha lite saker på sidorna och lite fler sidor -- än att klämma in för mycket innehåll på samma sida så de blir rörigt och man blir tvingad att plocka bort saker på mobil varianterna."*

Så här ser [webbplatsen](http://kampanj.bth.se/utbildningar/webbprogrammering-180hp/) ut när den visas sitt bredaste format i en desktop-dator.

[FIGURE src=/image/snap/bth-responsiv-kampanj-2014-bella-orginal.png?w=w2&sa=jpg caption="Webbplatsen i sitt bredaste format."]

Så här blev resultatet i en läsplatta (iPad portätt-format):

[FIGURE src=/image/snap/bth-responsiv-kampanj-2014-bella-ipad.png?w=c12&sa=jpg caption="Webbplatsen på en iPad i porträtt-format."]

Så här blev resultatet i en mobil (iPhone portätt-format):

[FIGURE src=/image/snap/bth-responsiv-kampanj-2014-bella-iphone.png?w=c8&sa=jpg caption="Webbplatsen på en iPhone i porträtt-format"]

Det är små justeringar som kan göra webbplatsen till en behagligare upplevelse för användaren, beroende på vilken terminal som används.

Bra jobbat Magnus!


