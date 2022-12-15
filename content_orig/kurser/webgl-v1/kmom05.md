---
author:
  - mos
  - efo
revision:
  "2018-10-05": (B, efo) Uppdaterad och specificerad med bakgrund i feedback från VT17.
  "2015-12-08": (A, mos) Första versionen.
...
Kmom05: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-40h)

Totalt omfattar kursmomentet (04/05) ca 20+20 studietimmar.



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Projekt går ut på att programmera **3D [Metaballs](https://en.wikipedia.org/wiki/Metaballs)** i WebGL och visa upp resultatet i en webbläsare.

Tanken med projektet är att du som student ska visa upp din ingenjörsmässighet och lösa ett problem enligt _analysera, designa, implementera och utvärdera_.

För att uppfylla kravet **3D Metaballs** ska det vara möjligt att använda tangentbordet och/eller musen/touch-event för att navigera i scenen med hjälp av en kamera. Bollarna ska röra sig i alla riktningar och effekterna när bollarna går i varandra ska ha inslag av **3D effekt**.

*"Lös det".*

Fråga i forumet om du känner dig osäker.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om de generella [grunderna för bedömning och betygsättning](kurser/faq/bedomning-och-betygsattning-g-u).

Projektet och kursen som helhet betygssätts enligt betygsskalan U, Ux, G. Du kan få maximalt 60 (30 kmom01 - kmom03 + 30 projekt) poäng och du behöver minst 50 poäng för att klara G.



Specifikation {#spec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas information så får du själv välja väg. Dokumentera dina val i redovisningstexten.

Kraven är obligatoriska och måste lösas för att få godkänt på uppgiften.

Varje krav ger max 10 poäng, totalt 30 poäng.

<!-- Se över poängsättningen -->



###Kataloger för redovisning {#var}

Samla alla dina filer för projektet i ditt kursrepo under `me/kmom05/proj`.

Redovisningstexten skriver du som vanligt i `me/redovisa`.



###Krav 1: Förberedelser och implementation {#k1}

Svara på följande frågor i din redovisningstext.

* Beskriv hur du ingenjörsmässigt gick tillväga för att inledningsvis undersöka problemställningen.
* Vilka källor använde du? Värdera och specificera dina referenser och källor på ett akademiskt sätt.
* Beskriv hur din första ansats till att läsa problemet.
* Förändrades din ansats under projektets gång? Berätta.

<!-- Skall rubriken verkligen vara "implementation", överväg en variant av IMRAD, eller någon ingenjörsmässig rapport mall -->



###Krav 2: Teknisk lösning {#k2}

Beskriv din tekniska lösning så att en ingenjörskollega kan lösa problemet på samma sätt som du gjorde.

Kritisera din tekniska lösning och framhäv dess brister.

Övervägde du alternativa lösningar? Varför förkastades dessa?

Berätta om någon av de möjligheter som finns för att förbättra din lösning. Tänk att det finns begränsade resurser av tid, så förhåll dig till det och ta bara de möjligheter som kan utföras med begränsad insats av tid och/eller extra kunskap.



###Krav 3: Visuell presentation {#k3}

Beskriv hur du valde att leverera och visuellt presentera ditt projekt.

Berätta hur du tänkte inför frågan "hur skall jag nu på bästa sätt visuellt presentera min lösning"?

Fick du göra prioriteringar eller nådde du din fulla ambitionsnivå med den visuella presentationen? Berätta.



Redovisning {#redovisning}
--------------------------------------------------------------------

1. Förutom de texter du har skrivit för varje krav ovan skriv följande på din redovisningssida:

    <!-- 1. För varje krav du implementerat, dvs 1-3, skriver du ett textstycke där du beskriver vad du gjort, hur du tänkt och besvara samtliga frågor. Poängsättningen tar sin start i din text så se till att skriva väl för att undvika poängavdrag. Missar du att skriva/dokumentera din lösning så blir det 0 poäng. Du kan inte komplettera en inlämning för att få högre betyg. -->

    1. Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

    1. Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

1. Ta en kopia av texten på din redovisningssida och kopiera in den på Canvas. Glöm inte länka till din me-sida och projektet.

1. Se till att samtliga kursmoment validerar. Om något inte validerar, berätta om varför.

```bash
# Ställ dig i kurskatalogen
dbwebb publish me
```
