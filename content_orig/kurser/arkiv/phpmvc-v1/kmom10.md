---
author: mos
revision:
  "2014-08-08": (O, mos) Arkiverade kursmomentet som är ersatt av phpmvc-v2.
  "2013-02-27": (N, mos) Förtydligade krav k2 om vad som minst behövs vara med.
  "2012-12-10": (M, mos) Förtydligade krav k3 om alla instruktioner i README-filen.
  "2012-12-06": (K, mos) Justerad med projektspec för phpmvc för hösten 2012.
  "2012-07-02": (J, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-09-22": (I) Förtydligade krav på inlämning, nytt stycke om betygssättning.
  "2011-03-16": (H) Slog ihop projekt och examination till ett.
  "2010-12-04": (G) Tog bort dubblerad och felaktig mening som syftade på spel.
  "2010-08-26": (F) Tog bort stycke om att betygsättning ej sker på projektet.
  "2010-04-30": (E) Nu samma dokument för htmlphp, oophp och för dbwebb/dbwebb2. Redaktionella
    ändringar.
  "2010-01-07": (D) Uppdaterade med info om redovisning och examination, hur inlämning
    sker.
  "2009-12-09": (C) Flyttade text mellan examinationsdokumentet och detta. Förtydligade
    inlämningen.
  "2009-12-08": (B) Smärre justeringar inför oohph hösten 2009.
  "2009-09-07": (A) Första utgåvan
updated: "2014-08-08 07:10:24"
created: "2012-08-30 09:21:28"
...
Kmom08/10: Projekt och examination
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.

[INFO]
Denna kursen är ARKIVERAD.

[Läs mer...](phpmvc-v1)
[/INFO]



Projekt och examination {#proj-och-ex}
--------------------------------------------------------------------

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-60h)

Totalt omfattar kursmomentet (08/10) ca 20+20+20 studietimmar.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

Du skall implementera ett projekt enligt en specifikation som omfattar tre obligatoriska krav och tre optionella krav.

Varje krav motsvarar ett antal poäng. En perfekt implementation av kravet ger full pott, en bristfällig implementation ger avdrag, ända ned till 0 poäng.

De obligatoriska kraven måste du göra för att få godkänt. 

De optionella kraven gör du för möjligheten att nå ett högre betyg än godkänt, G.

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Följande dokument beskriver grunderna för bedömning och betygsättning.

* <a href='http://dbwebb.se/kurser/bedomning-och-betygsattning'>http://dbwebb.se/kurser/bedomning-och-betygsattning</a>




Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. De optionella kraven är markerade med *optionellt*, de andra kraven är obligatoriska.



###Krav k1: Installera från GitHub {#k1}

Ditt ramverk skall finnas på GitHub. Man skall kunna clona det från GitHub och installera det, på studentservern, genom att följa instruktionerna som finns i README-filen.

Det skall gå lätt och smidigt att installera ramverket, med så få steg som möjligt. Om det inte går att installera ramverket enligt instruktionerna så blir omdömet "gör om - gör rätt" och rättningen av projektet avbryts.

På denna del kan du maximalt få 10 poäng.



###Krav k2: Den berömda 5-minuters installationen (optionellt) {#k2}

Gör installationsfasen via ett webbgränssnitt. Instruktionen i README-filen skall se ut ungefär så här:

1. Clona ramverket.
2. Peka din webbläsare på min.server/där-jag-installerade/ och följ anvisningarna.

Resten av installationen sker via webbgränssnittet, jämför gärna med installationen av WordPress eller Drupal (om du är bekant med dem). Inställningar för datababasen skall skrivas in via webbgränssnittet.

I installationsfasen skall du kontrollera att servern du installerar på har alla förutsättningar för att köra ditt ramverk, resultatet från det testet skall du visa för användaren. Om något saknas skall du berätta vad som behövs göras. Du skall minst kontrollera följande:

* Versionen på PHP.
* Finns rätt databas installerad.

På denna del kan du maximalt få 10 poäng.



###Krav k3: Ett anpassningsbart ramverk {#k3}

Det skall finnas ett standardtema som skiljer sig från Lydias tema, minst avseende val av fonter och färger. Detta tema skall kunna anpassas av den som installerar ramverket. 

Man skall kunna anpassa logotyp, titel på sidan, navigeringsmenyn och texten på footern.

Man skall kunna använda din webbplats för att skapa en blogg och vanliga statiska sidor.

Den som testar ditt ramverk kommer att testa följande saker genom att bygga en webbplats.

1. Ändra logo, webbplatsens titel, footer och navigeringsmeny. 
2. Skapa en blogg.
3. Skapa en sida.

Din README måste innehålla instruktioner till hur man gör detta. Den som testar kommer blint att följa instruktionerna. Om instruktionerna inte fungerar så avbryts rättningen av projektet.

Alla instruktioner skall finnas i README-filen.

På denna del kan du maximalt få 10 poäng.



###Krav k4: Ett administrativt gränssnitt (optionellt) {#k4}

Gör ett administrativt gränssnitt där en administratör kan logga in och administrera användare, grupper och innehåll. Man skall kunna följande:

1. Lägga till, uppdatera och ta bort användare.
2. Lägga till, uppdatera och ta bort grupper.
3. Att koppla användare till en eller flera grupper.
4. Styra vem som kan se ett visst innehåll (sida eller blogginlägg), alla eller bara medlemmar av en viss grupp.

På denna del kan du maximalt få 10 poäng.



###Krav k5: Valfri (optionellt) {#k5}

Du väljer själv en förbättring av ditt ramverk och implementerar den. Dess omfattning bör vara i storleksordningen med kraven k2 och k4.

Var tydlig när du förklarar vad du gjort så att vi kan göra en rimlig bedömning av din insats.

På denna del kan du maximalt få 10 poäng.



###Krav k6: Projektdokumentation och Referensinstallation {#k6}

Börja med att ge länken till ramverket på GitHub.

Gör en referensinstallation som du länkar till. Denna referensinstallation skall visa de krav du implementerat. På det sättet blir denna installation ditt eget test av att dina krav fungerar. Ge tillräcklig information så vi kan logga in och testa din referensinstallation.

För varje krav du implementerat, dvs k1-k5, skriver du ett textstycke om ca 15 meningar där du beskriver vad och hur du gjort och tänkt. 

Dessutom skriver du ytterligare ett stycke, ca 30 meningar, där du sammanfattar tankarna om ditt ramverk. Var tydlig när du skriver om du följt Lydia eller om du gjort egna variationer. Beskriv dina egna variationer och skriv om du ser fördelar och nackdelar med resultatet av ditt ramverk. Hur bedömer du kvaliteten på ditt ramverk? Går det bygga vidare på eller borde du slänga det och börja om? Ge din egna analys. Skriv så att jag förstår att du har koll på det som kursen omfattar.

Denna text blir din projektdokumentation som skall finns på din me-sida. Du behöver inte kopiera in denna texten på forumet eller på ITs, den blir för lång. 

På denna del kan du maximalt få 10 poäng.



Redovisning {#redovisning}
--------------------------------------------------------------------

1. På din redovisningssida, skriv följande:

> 1.1. Länka till din projektdokumentation, se krav k6.

> 1.2. Ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

> 1.3. Avsluta med ett nytt stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2\. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida och projektet. 

3\. Ta en kopia av texten från din redovisningssida och gör ett inlägg i forumet och berätta att du är klar.




