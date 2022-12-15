---
author: mos
revision:
  "2015-12-22": (A, mos) Första versionen till webapp.
...
Kmom10: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Du är engagerad student och funderar på hur du kan nå ut och bidra till en förändring av omvärlden och säkra framtiden. Du känner en pulserande ådra av entreprenörsskap i dig. Du bestämmer dig för att "bygga en webapp" som bidrar till förändring. 

Du kan dock inte bestämma dig för vad du skall göra. Dina alternativ är:

1. Delta i tävlingen ["Hack for Sweden"](http://hackforsweden.se/) med ett eget bidrag.
1. Du väljer att inte direkt delta i tävligen, men du använder [en eller flera datakällor som publiceras via tävlingen](http://hackforsweden.se/data/) som källa till din webapp.
1. Du väljer att bygga på [Arbetsförmedlingens API](http://www.arbetsformedlingen.se/psidata) och skapa en webapp som fokuserar på alla jobb inom webb-branschen.

Du funderar och väljer en ansats för din webapp.

Fråga i forumet om du känner dig osäker.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas information så kan du själv välja väg, dokumentera dina val i redovisningstexten.

De tre första kraven är obligatoriska och måste lösas för att få godkänt på uppgiften. De tre sista kraven är optionella krav. Lös de optionella kraven för att samla poäng och därmed nå högre betyg.

Varje krav ger max 10 poäng, totalt är det 60 poäng.



###Kataloger för redovisning {#var}

Samla alla dina filer för projektet i ditt kursrepo under `me/kmom10/proj`.

Redovisningstexten skriver du i din senaste meapp i `me/kmom06/me6`.



###Krav 1: Specifikation och datakällor {#k1}

Skapa en egen kortfattad specifikation för din webapp genom att beskriva din tänkta webapp i ett textstycke.

Välj ut de datakällor du skall använda och vilken data du behöver ur varje datakälla. Berätta om ditt val.

Skapa ett bash-skript `update-sources.bash` som hämtar hem senaste informationen från datakällorna och sparar en lokal kopia av dem. Skriptet skall skriva ut vilka filer som uppdateras och om det gick bra.

Din webapp skall jobba mot lokala (cachade) datakällor och behöver inte vara beroende av en direktuppkoppling mot tjänsten.



###Krav 2: Arkitektur, dokumentation och manual {#k2}

Beskriv arkitekturen för din lösning. Valde du jQuery Mobile, Mithril eller annan struktur? Berätta varför du valde som du gjorde.

Berätta hur du organiserade din kod och filer, så att en annan teknisk person snabbt kan sätta sig in i din webapp.

Skapa en fil `README.md` som kort berättar om webappen, hur man startar den och vilka olika "features" den innehåller.



###Krav 3: En webapp {#k3}

Bygg en så gott som felfri webapp, i enlighet med din spec.

Fick du göra prioriteringar under arbetets gång eller nådde du din fulla ambitionsnivå med din webapp? Berätta.

Kritisera din webapp och framhäv dess brister.

Berätta om någon av de möjligheter som finns för att förbättra din lösning. Tänk att det finns begränsade resurser av tid, så förhåll dig till det och ta bara de möjligheter som kan utföras med begränsad insats av tid och/eller extra kunskap.



###Krav 4, 5, 6: Valbart krav (optionellt) {#k4}

Om du anser att din insats är värd ett högre betyg så måste du visa det. Det innebär att du formulerar de optionella kraven på egen hand, i samspråk med läraren om det behövs.

Det handlar främst om den nivå du har på din produkt och att vissa "features" kan betraktas omfatta ett eller flera optionella krav.

Vill du vara säker så måste du ha en dialog med läraren. Fråga i forumet så får du svar där, sedan har du det på svart-och-vitt vad som gäller, så gott det går.

Tänk på att även ett *enklare* projekt kan ha features som kan lyftas upp som valbara krav. Lyft upp det som är speciellt med din lösning. Vilka delar tog längst tid? Lyft upp dem.

Här är en icke komplett lista på saker som till exempel kan vara värda att lyfta upp.

* Att göra appen i Cordova.
* Att stödja flera plattformar i Cordova.
* Att använda API:er i Cordova och integrera med en hårdvara.
* Design, layout, användbarhet.
* En svår/tuff/tidskrävande teknisk implementation
* Egna widgetar och användande av Mithril.
* Webapp som kan installeras på hemmaskärmen.
* En komplex och omfattande webapp med flera features.
* Kombinera datakällor från flera leverantörer.
* Integration med tjänster för social media.
* Större användning av externa bibliotek likt handlebar.

Alltså, lyft upp det som du anser borde lyftas upp. Beskriv vad du gjort, varför, hur och hur mycket tid det tog. Var tydlig -- bedömning utgår från din beskrivning och därefter tittar vi på din lösning. 

På denna del kan du få totalt 30 poäng (10 + 10 + 10).



Redovisning {#redovisning}
--------------------------------------------------------------------

1. På din [redovisningssida](linux/redovisa), skriv följande:

    1. För varje krav du implementerat, dvs 1-6, skriver du ett textstycke som uppfyller kravet. Poängsättningen tar sin start i din text så se till att skriva väl för att undvika poängavdrag. Missar du att skriva/dokumentera din lösning så blir det 0 poäng. Du kan inte komplettera en inlämning för att få högre betyg.

    1. Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

    1. Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida och projektet. 

3. Ta en kopia av texten från din redovisningssida och gör ett inlägg i [kursforumet](forum/utbildning/linux) och berätta att du är klar.

4. Se till att samtliga kursmoment validerar.

```bash
# Ställ dig i kursrepot
dbwebb publish me
```
