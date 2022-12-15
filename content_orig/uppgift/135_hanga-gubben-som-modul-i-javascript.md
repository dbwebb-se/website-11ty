---
author: mos
category: webbprogrammering
revision:
  "2020-12-03": (D, lew) Genomgång inför ht20.
  "2015-08-27": (C, mos) Uppgraderad till dbwebb-cli version 2.
  "2014-11-19": (B, mos) Lagade länken till svg-bilden.
  "2014-10-27": (A, mos) Första utgåvan i samband med kursen javascript1.
updated: "2015-08-27 09:07:31"
created: "2014-06-26 09:01:48"
...
Hänga gubben som modul i JavaScript
==================================

Programmeringsövning i JavaScript där du skall bygga ett spel Hänga gubben. I uppgiften tränar du JavaScript-moduler, DOM, programmera logik med JavaScript och du får testa på att hantera SVG *inline* i en webbsida.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har läst igenom artikeln "[Funktioner, scope, closures och moduler med JavaScript](kunskap/funktioner-scope-closures-och-moduler-med-javascript)".

Du kan grunderna i JavaScript tillsammans med arrayer, objekt, eventhantering och du kan manipulera DOM.

Du vet vad en [sandbox](uppgift/skapa-din-egen-sandbox-for-javascript-testprogram) är för dina exempelprogram.



Introduktion {#intro}
-----------------------

[FIGURE src=/img/hangman/hangman-validates-inline.svg caption="En SVG-bild till hänga gubbe-spel."]

Hänga gubben, i detta sammanhanget, är ett gissningsspel där det slumpas fram ett ord (från en lista av ord) och sedan gissar spelaren vilka bokstäver som finns i ordet. Vid varje felaktig gissning ritas delar av en bild ut och när alla delarna är utritade så har spelaren förlorat. Om spelaren lyckas gissa alla bokstäver i ordet så vinner spelaren.

Det finns ett spel som du kan använda som förlaga, det visar hur spelet fungerar. Det är ett [Hangman-spel, byggt i PHP](kod-exempel/hangman/playhangman.php). Du kan alltid kika på källkoden om du tror du kan hämta ledtrådar till hur spelet ser ut.

Som hjälp till ditt spel så har du en bild och en grund till hur du döljer och visar delar av bilden. Hjälpen är strukturerad som en JavaScript-modul `Hangman` och det visar också hur tanken är att du bygger ditt spel -- som en modul i JavaScript.

* [Hjälp i form av bild och kod som visar hur du döljer/visar delar av bilden](kod-exempel/hangman-svg/hangman-inline-svg.html).



Krav {#krav}
-----------------------

1\. Ta en kopia av din sandbox (från kmom01) och spara den i din kurskatalog under `js/me/kmom06/hangman`.

```bash
# Gå till kurskatalogen
cd me
cp -r kmom01/sandbox/* kmom06/hangman/
```

2\. Kopiera hjälpkoden som visar hur du döljer och visar delar av bilden. Kopiera både HTML-koden (inklusive SVG-bilden som ligger i HTML-dokumentet) och koden för JavaScriptet. Filerna finns i din katalog `example/hangman`, du kan kopiera dem därifrån.

```bash
# Gå till kurskatalogen
cp example/hangman/hangman-inline-svg.html me/kmom06/hangman/index.html
cp example/hangman/hangman.js me/kmom06/hangman/js/hangman.js
```

Nu bör du ha ett fungerande exempel att utgå ifrån. Se till så du har rätt sökväg till filen main.js.

3\. Du skall skapa ett spel som fungerar likt PHP-exempel-spelet. Om du är osäker bör du hålla dig till det. Om du vill pröva mer avancerade saker så går det bra. Pröva på.

4\. Skapa bokstäverna som du kan klicka på, du kan bara klicka på en bokstav en gång. Då skall den ändra style och inte gå att klicka på.

5\. Skapa en ordlista (minst fem ord) som en del av din Hangman-modul. Skapa en funktion `Hangman.wordlist()` som kan anropas från consolen och skriver ut hela ordlistan i consolen.

6\. Skapa en funktion som slumpar fram ett ord från ordlistan. Detta blir det aktiva ordet. Skapa en funktion `Hangman.peek()` som du kan anropa från consolen, det skall skriva ut det aktiva ordet. Det ger en möjlighet för spelaren att fuska.

7\. När spelaren klickar på en bokstav så kontrollerar du om bokstaven finns i ordet. Om bokstaven inte finns så ritar du ut en del av bilden. Rita ut ordet med en kombination av `_` för icke gissade bokstäver och de gissade bokstäverna på sina rätta platser (precis som PHP-exempel-spelet gör).

8\. När (om) alla delar är utritade så visar du ett meddelande om "Game Over" på spelplanen, eller motsvarande. Det går nu inte att göra några fler gissningar.

9\. När (om) spelaren har gissat alla bokstäver i ordet så skriver du ut "You Won The Game!" på spelplanen, eller motsvarande. Det går nu inte att göra några fler gissningar.

10\. Ladda om sidan för att köra ett nytt spel.

11\. När du är klar skall du validera och publicera ditt resultat enligt följande:

```bash
# Ställ dig i kurskatalogen
dbwebb validate hangman
dbwebb publish hangman
```

Rätta de felen som dyker upp. Sen är du klar. Dubbelkolla att spelet fungerar på studentservern.



Extrauppgift {#extra}
-----------------------

Gör fler funktioner som du kan anropa från consolen. Det är bra både för felsökning och kanske kan du spela hela spelet från consolen, via funktionsanrop?  

Fundera över vilka medlemmar av modulen `Hangman` som skall vara *publika* och *privata*? Ta ett aktivt beslut och låt det återspeglas i din kod. Publika och privata i detta sammanhanget är skillnaden på om de exponeras som modulens API, det vill säga det som returneras från modulen när den skapas.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

**Lycka till och ställ frågor i forumet om du behöver hjälp!**
