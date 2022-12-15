---
author:
    - mos
revision:
    "2020-12-07": "(C, mos) Stycke om video."
    "2018-12-12": "(B, mos) Genomgången inför ramverk1 v2."
    "2018-06-08": "(A1, mos) Nytt dokument inför uppdatering av kursen."
    "2017-10-09": "(A, mos) Första utgåvan."
...
Kmom07/10: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Använd det du lärt dig under kursen för att bygga en kopia av webbplatsen Stack Overflow (eller motsvarande webbplats).

Du har fått en kund som heter WGTOTW (We Gonna Take Over The World) och kunden har en enorm kassa och är villig att spendera den på dig.

Kunden vill ha en Stack Overflow-kopia och det tänkta fokuset är "Allt om att trimma en moppe". Kunden tror att marknadspotentialen är stor.

PS. Du kan (bör) byta temat från "Att trimma en moppe" till "Allt om att sköta minigrisar", "Allt du vill veta om bubbelbad", "Allt om tv-serien 2 1/2 män", "Allt om filmen XXX", "Allt om snowboard", "Allt om Kalle Anka". Ta vilket ämne du vill, försök att hitta på ett själv, det gör det hela lite roligare.

PS. Du kan ge kunden något den inte beställt men som du anser passa kunden. Du kan själv välja fokus och inrikta din lösning till att lösa ett forum, twitter-kopia, reddit-kopia, Disqus-klon eller någon liknande tjänst som är tungt beroende av ett kommentarssystem liknande det som Stack Overflow har för frågor, svar och kommentarer. Fråga om du är osäker.

Om du gör ditt eget upplägg kan du behöva formulera egna motsvarande krav för de optionella kraven. Fråga i forumet om du behöver stöd.



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas info i specen så kan du själv välja väg, dokumentera dina val i redovisningstexten.

De tre första kraven är obligatoriska och måste lösas för att få godkänt på uppgiften. De tre sista kraven är optionella krav. Lös optionella kraven för att samla poäng och nå högre betyg.

För allra högsta betyg krävs en allmänt god webbplats. Den skall vara både snygg, tilltalande, lättanvänd och felfri.

Varje krav ger max 10 poäng, totalt är det 60 poäng.



### Krav 1, 2, 3: Grunden {#k1}

Skapa ett nytt git-repo för projektet, spara i `me/kmom10`.

Webbsidan skall skyddas av inloggning. Det skall gå att skapa en ny användare.
Användaren skall ha en profil som kan uppdateras. Användarens bild skall vara en gravatar.

Webbplatsen skall ha en förstasida, en sida för frågor, en sida för taggar och en sida för användare. Det skall finnas en About-sida med information om webbplatsen, dess GitHub-repo och dig själv.

En användare kan ställa frågor (fråga) och besvara frågor (svar). En användare kan också kommentera en fråga/svar.

Alla inlägg som en användare gör kan kopplas till denna. Klickar man på en användare så ser man vilka frågor som användaren ställt och vilka frågor som besvarats.

En fråga kan ha en eller flera taggar kopplade till sig. När man listar en tagg kan man se de frågor som har den taggen. Klicka på en tagg för att komma till de frågor som har taggen kopplat till sig.

En fråga kan ha många svar. Varje fråga och svar kan i sin tur ha kommentarer kopplade till sig.

Alla frågor, svar och kommentarer skrivs i Markdown.

Förstasidan skall ge en översikt av senaste frågor tillsammans med de mest populära taggarna och de mest aktiva användarna.

Webbplatsen skall finnas på GitHub, tillsammans med en README som beskriver hur man checkar ut och installerar sin egen version.

Webbplatsen skall finnas i drift med innehåll på studentservern.

Kommandot `make test` skall passera för källkoden.

Repot på GitHub skall vara länkat till en byggtjänst likt Travis/CircleCI och till en tjänst för kodkvalitet likt Scrutinizer/CodeClimate. README-filen på GitHub innehåller motsvarande badges.



### Krav 4: Frågor (optionell) {#k4}

Ett svar kan märkas ut som ett accepterat svar.

Varje svar, fråga och kommentar kan röstas på av användare med +1 (up-vote) eller -1 (down-vote), summan av en fråga/svar/kommentars rank är ett betyg på hur "bra" den var.

Svaren på en fråga kan sorteras och visas antingen enligt datum, eller rank (antalet röster).

Översikten av frågorna visar hur många svar en fråga har, samt vilken rank frågan har.



### Krav 5: Användare (optionell) {#k5}

Inför ett poängsystem som baseras på användarens aktivitet. Följande kan ge poäng:

* Skriva fråga
* Skriva svar
* Skriva kommentar
* Ranken på skriven fråga, svar, kommentar.

Summera allt och sätt det till användarens rykte.

Visa en översikt på användarens sida om all aktivitet som användaren gjort, dvs frågor, svar, kommentarer, antalet röstningar gjorda samt vilket rykte användaren har.

Du kan efter eget tycke modifiera reglerna för hur användarens rykte beräknas.



### Krav 6: Valfritt (optionell) {#k6}

Förutsatt att du gjort krav 4 och 5 kan du använda detta krav som ett valfritt krav. Beskriv något som du gjort i uppgiften som du anser vara lite extra utöver det vanliga och berätta hur du löst det. Det kan vara en utseendemässig sak, eller en kodmässig sak. Den bör vara något som du lagt mer än 4-8h på och något som höjer sig lite extra i svårighet eller problemlösning, något som i storleksordningen kan jämföras med krav 4 eller krav 5.



Redovisning {#redovisning}
--------------------------------------------------------------------

1. På din [redovisningssida](./../redovisa), skriv följande:

    1.1 För varje krav du implementerat, dvs 1-6, skriver du ett textstycke om ca 5-10 meningar där du beskriver vad du gjort och hur du tänkt. Poängsättningen tar sin start i din text så se till att skriva väl för att undvika poängavdrag. Missar du att skriva/dokumentera din lösning så blir det 0 poäng. Du kan inte komplettera en inlämning för att få högre betyg.

    1.2 Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

    1.3 Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

1. Tagga din me/redovisa i v10.0.0 och publicera på GitHub.

1. Ta en kopia av texten på din redovisningssida och kopiera in den på läroplattformen i redovisningen. Glöm inte länka till din me-sida och projektet samt till GitHub repot.

1. Spela in en redovisningsvideo och lägg länken till videon i en kommentar på din inlämning i Canvas. Detta kan du göra dagen efter projektets deadline. Läs mer om hur du kan [spela in en redovisningsvideo](kurser/faq/slutpresentation).

1. Publicera på studentservern.

```bash
# Ställ dig i kursrepot
dbwebb publish me
```
