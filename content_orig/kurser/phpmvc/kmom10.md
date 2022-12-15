---
author: mos
revision:
  "2014-05-13": (A) Första utgåvan
...
Kmom07/10: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Under kursen har du byggt upp din egen utökade version av Anax MVC. Du har fyllt på med de klasser, paket, moduler, som du själv utvecklat eller lånat från andra. Nu skall du använda ditt ramverk för att bygga en webbplats som liknar webbplatsen [Stack Overflow](http://stackoverflow.com/) i sin uppbyggnad.

Du har en tänkt kund som heter WGTOTW (We Gonna Take Over The World) och kunden har en enorm kassa och är villig att spendera en hel del på dig.

Kunden vill ha en Stack Overflow-kopia och det tänkta fokuset är "Allt om att trimma en moppe". Kunden tror att marknadspotentialen är stor.

PS. Du kan (bör) byta temat från "Att trimma en moppe" till "Allt om att sköta minigrisar", "Allt du vill veta om bubbelbad", "Allt om tv-serien 2 1/2 män", "Allt om filmen XXX", "Allt om snowboard", "Allt om Kalle Anka". Ta vilket ämne du vill, försök att hitta på ett själv, det gör det hela lite roligare.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas info i specen så kan du själv välja väg, dokumentera dina val i redovisningstexten.

De tre första kraven är obligatoriska och måste lösas för att få godkänt på uppgiften. De tre sista kraven är optionella krav. Lös de optionella kraven för att samla poäng och därmed nå högre betyg.

För allra högsta betyg krävs en allmänt god webbplats. Den skall vara både snygg, tilltalande, lättanvänd och felfri.

Varje krav ger max 10 poäng, totalt är det 60 poäng.



###Krav 1, 2, 3: Grunden {#k1}

Webbsidan skall skyddas av inloggning. Det skall gå att skapa en ny användare.
Användaren skall ha en profil som kan uppdateras. Användarens bild skall vara en gravatar.

Webbplatsen skall ha en förstasida, en sida för frågor, en sida för taggar och en sida för användare. Precis som Stack Overflow har. Dessutom skall det finnas en About-sida med information om webbplatsen och dig själv.

En användare kan ställa frågor, eller besvara dem. Alla inlägg som en användare gör kan kopplas till denna. Klickar man på en användare så ser man vilka frågor som användaren ställt och vilka frågor som besvarats.

En fråga kan ha en eller flera taggar kopplade till sig. När man listar en tagg kan man se de frågor som har den taggen. Klicka på en tagg för att komma till de frågor som har taggen kopplat till sig.

En fråga kan ha många svar. Varje fråga och svar kan i sin tur ha kommentarer kopplade till sig. 

Alla frågor, svar och kommentarer skrivs i Markdown.

Förstasidan skall ge en översikt av senaste frågor tillsammans med de mest populära taggarna och de mest aktiva användarna.

Webbplatsen skall finnas på GitHub, tillsammans med en README som beskriver hur man checkar ut och installerar sin egen version.
 
Webbplatsen skall finnas i drift med innehåll på studentservern.



###Krav 4: Frågor (optionell) {#k4}

Ett svar kan märkas ut som ett accepterat svar.

Varje svar, fråga och kommentar kan röstas på av användare med +1 (up-vote) eller -1 (down-vote), summan av en fråga/svar/kommentars rank är ett betyg på hur "bra" den var.

Svaren på en fråga kan sorteras och visas antingen enligt datum, eller rank (antalet röster).

Översikten av frågorna visar hur många svar en fråga har samt vilken rank. 



###Krav 5: Användare (optionell) {#k5}

Inför ett poängsystem som baseras på användarens aktivitet. Följande ger poäng:

* Skriva fråga
* Skriva svar
* Skriva kommentar
* Ranken på skriven fråga, svar, kommentar.

Summera allt och sätt det till användarens rykte.

Visa en översikt på användarens sida om all aktivitet som användaren gjort, dvs frågor, svar, kommentarer, antalet röstningar gjorda samt vilket rykte användaren har.

Du kan efter eget tycke modifiera reglerna för hur användarens rykte beräknas.



###Krav 6: Valfritt (optionell) {#k6}

Förutsatt att du gjort krav 4 och 5 kan du använda detta krav som ett valfritt krav. Beskriv något som du gjort i uppgiften som du anser vara lite extra och berätta hur du löst det. Det kan vara en utseendemässig sak, eller en kodmässig sak. Den bör vara något som du lagt mer än 4-8h på.

Kanske har du kopplat ihop projektet på GitHub med Travis, Scrutinizer och använder PHPUnit? Kanske har du utvecklat en egen modul (utöver kmom05) som du publicerat på Packagist och som används i ditt projekt? Det finns mycket att tjäna poäng på när du nått ända hit.



Redovisning {#redovisning}
--------------------------------------------------------------------

1\. På din redovisningssida, skriv följande:

1.1. Länka till din projektsida för WGTOTW.

1.2. För varje krav du implementerat, dvs 1-6, skriver du ett textstycke om ca 5-10 meningar där du beskriver vad du gjort och hur du tänkt. Poängsättningen tar sin start i din text så se till att skriva väl för att undvika poängavdrag. Missar du att skriva/dokumentera din lösning så blir det 0 poäng. Du kan inte komplettera en inlämning för att få högre betyg.

1.3. Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

1.4. Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2\. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida och projektet. 

3\. Ta en kopia av texten från din redovisningssida och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc-v2) och berätta att du är klar.
