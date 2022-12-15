---
author: mos
revision:
    "2016-12-13": (B, mos) Använd cimage med snygga länkar via htaccess.
    "2016-12-12": (A, mos) Första utgåvan.
...
Kmom10: Projekt och examination
====================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.


<!--
* Vilka krav skall dokumenteras i projektredovisningen?
-->



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Du har blivit känd som en webbprogrammerare med känsla för design och kunderna står nu i kö. Du har ett antal uppdrag som dina kunder vill ha utförda och du har begränsad tid.

Välj bland de uppdrag du har nedan. De som är märkta optionella kan du välja om du vill göra, de andra är obligatoriska.

Utveckla och leverera enligt specifikation. Om information saknas så kan du själv tolka kravet, dokumentera hur du gör i redovisningstexten.

Fråga i forumet om du känner dig osäker.



Uppdrag analys {#analys}
--------------------------------------------------------------------

Följande uppdrag rör analyser och de kan göras i grupp.

Analyserna lägger du tillsammans med dina andra analyser på me-sidan.

För varje analys skriver du en kort introduktion om hur du gjorde urvalet och hur du gick tillväga när du utförde analysen (din metod).

Du skriver också ett avslutande stycke där du summerar dina iakttagelser från anaysen.



###Uppdrag 1: Analys usability (10p) {#k1}

**Herr Jakob Nilsson** har bett dig att göra en analys för att undersöka hur användarvänliga webbplatser är, baserat på de fem komponenter som anges i [Usability 101: Introduction to Usability](https://www.nngroup.com/articles/usability-101-introduction-to-usability/).

Du gör en sedvanlig analys och väljer ut 4 webbplatser som du känner till och själv ofta använder. Du poängsätter varje webbplats på respektive kritera och summerar totalen och sorterar sedan per totalen och utser en testvinnare.

Lägg resultatet i `analysis/701_usability.md`.



###Uppdrag 2: Analys skrivsätt (10p) (optionellt) {#k2}

**Språkherren Engan Horas från Dahlen** har kontaktat dig och bett dig göra en språkanalys av webben. Du funderar på kriterier för gott språkbruk och väljer att skapa ditt eget regelverk baserat på "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)".

Du börjar med att definiera ditt eget regelverk, du väljer 4-5 viktiga regler och skriver ned dem.

Du väljer ut fyra webbplatser som kännetecknas av text och artiklar. Du analyserar dessa webbplatser utifrån dina kriterier.

Lägg resultatet i `analysis/702_write.md`.



Uppdrag webbplats och tema {#webbplats}
--------------------------------------------------------------------

Följande uppdrag rör utveckling av webbplatser och teman och de skall göras individuellt.



###Kunder {#kund}

Du har tre potentiella kunder, du väljer att utveckla en webbplats, med tillhörande teman, till **en av dessa kunder**.



####Kund 1 {#kund1}

**Styrelseordförande Ludviga Af Solstråle** med kompanjoner, vill ha ett propert tema till deras *executive consulting high-end business company*. Det skall vara propert, gediget, andas slipsar, dyra kostymer, höga klackar och dyra klänningar. Du är inte 100% säker på vad de säljer, men dyrt verkar det vara, annars skulle de inte ha råd med sina dyra kostymer och klänningar.

Du kan själv välja om du vill att företagets verksamhet skall vara advokater/jurister, managementkonsulter, eller annat.



####Kund 2 {#kund2}

**Artisten Art Ist**, som är *new and upcoming* inom sitt gebit, vill ha en webbplats och du löser det. Det skall vara nytt och fräsht, tidsenligt och det skall skapa intresse.

Du kan själv välja om du vill att artisten skall vara ung/gammal, hålla på med trolleri eller musik och om det är fiol, harpa eller techno.



####Kund 3 {#kund3}

**Egenföretagaren Bew Gorp**, har startat upp en egen verksamhet där hen hyr ut sig själv som webbprogrammerare/webbutvecklare/webbdesigner. Bew behöver en webbplats för att marknadsföra sig själv och sina utomordentliga färdigheter inom området.

Du kan själv välja profil och inriktning på webbplatsen, men gör medvetna val som gynnar Bew's profil.



###Uppdrag 3: Webbplats (10p) {#k3}

Skapa en ny webbplats till din kund, spara i en helt ny katalog `me/proj` i kursrepot.

Använd Anax Flat som grund. Du kan använda din egen variant av Anax Flat, eller en helt ny installation av Anax Flat. Välj väg.

Beskriv i redovisningstexten hur du gör och varför du valde det sättet.

Webbplatsen skall bestå av en förstasida (minst två kolumner), en about-sida och en blogg med minst tre blogginlägg.

Varje sida skall ha en flash-region med en bild.

Headern skall ha en egen logo och en favicon.

Footern skall innehålla de standardsidor som följer med Anax Flat (license, cookies, contact), inklusive de tre footer-kolumnerna.

Menyn skall länka till about och bloggen.

Innehållet skall vara relevant, lagom mycket och bildrikt (använd cimage med snygga länkar via htaccess). Skriv text som gynnar företagets profil, kopiera gärna, men inte Lorem Ipsum.

Webbplatsen skall vara responsiv.

I about-sidan lägger du in information om kunden, så som du tolkat kundens önskemål, kundens verksamhet och hur kunden vill att webbplatsen skall se ut och användas. Det blir din egen formulering och tolkning av kundens krav.



###Uppdrag 4: Tema (10p) {#tema}

Använd ditt anax flat theme för att bygga temat.

Webbplatsen skall initialt ha ett bastema som är enkelt att anpassa.

Lägg till ett tema som är anpassat till kunden. Gör detta temat till standardtema.

Temaväljaren skall användas och visa båda temana.

Temat skall använda gridbaserat layout, vertikalt som horisontellt.

Testsidor för gridet skall fungera via `?vgrid` och `?hgrid`.

Temat skall fungera responsivt.

Skapa sidor som motsvarar länkarna `theme/base` och `theme/custom` där du beskriver dina två teman enligt följande.

* Beskriv färgprofilen, typografin, designprinciper och designelement som du använt.
* Bifoga en snapshot på temat.

Lös ovan sidor via samma content-struktur som du använder för din redovisningssida och dina analyser.

Länk till tema-sidan `theme/` skall finnas i navbaren. Glöm inte länka till tema-väljaren.



###Uppdrag 5: Tema alternativt (10p) (optionellt) {#tema}

Du gör ytterligare ett tema till kunden, ett alternativt tema.

I detta tema förändrar du färgprofilen, typografin, designprinciper och designelement.

Du använder också, till viss del, en annan layout än i tidigare tema, se till att de båda teman mixar regioner mellan 100% i bredd och en fast min-width. 

Beskriv detta alternativa tema i `theme/alternative`.



###Uppdrag 6: Förklara strukturen kring temat (10p) (optionellt) {#k6}

Lägg till en sida för länken `theme/architecture` och förklara strukturen bakom din teman.

1. Förklara struktur av LESS-koden. Berätta hur du valt att strukturera koden och förklara varför det är en god uppdelning.

1. Berätta vilka moduler du har och förklara kort vad de gör.

1. Du har valt att lägga extra kraft på minst två LESS modulerna. Välj två eller tre av dessa moduler och förklara vad du gjort och bifoga/länka till exempel som tydligt påvisar hur de används.



Redovisning {#redovisning}
--------------------------------------------------------------------

1\. På din redovisningssida, skriv följande:

1.1. För varje krav du implementerat, dvs 1-6, skriver du ett textstycke om ca 5-10 meningar där du beskriver vad du gjort och hur du tänkt. Poängsättningen tar sin start i din text så se till att skriva väl för att undvika poängavdrag. Missar du att skriva/dokumentera din lösning så blir det 0 poäng. Du kan inte komplettera en inlämning för att få högre betyg.

1.2. Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

1.3. Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2\. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida och projektet. 

3\. Ta en kopia av texten från din redovisningssida och gör ett inlägg i [kursforumet](forum/utbildning/design) och berätta att du är klar.

4\. Tagga repona i version 10.0 och se till att det validerar.

```bash
# Ställ dig i kurskatalogen
dbwebb publish me
```
