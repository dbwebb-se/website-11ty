---
author: mos
revision:
    "2017-09-27": (H, aar) Uppdaterade krav 6, tog bort curses.
    "2017-06-22": (G, aar) Minskade antalet rum till 5 och la till fusk kommando.
    "2016-10-13": (F, mos) Bort med gammalt stycke om curses och tillåt väderstreck.
    "2015-08-25": (E, mos) Uppgraderade till dbwebb v2.
    "2015-02-12": (D, mos, Sylvanas) Uppdaterade krav 6 och 5 (tog bort curses).
    "2015-01-08": (C, mos) Bort blå ruta med kursutveckling pågår.
    "2014-11-19": (B, mos) Tog bort `s` från kommandot se, det var duplicerat.
    "2014-11-12": (A, mos) Första versionen till python ht14.
...
Kmom10: Projekt och examination
==================================

Detta kursmoment avslutar och examinerar kursen.

Upplägget är enligt följande:

* Projektet och redovisning (20-80h)

Totalt omfattar kursmomentet (07/10) ca 20+20+20+20 studietimmar.



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

Du frilansar som python-utvecklare och har precis tackat ja till ett uppdrag att utveckla ett textbaserat äventyrsspel. Du tänker att "ja, ja - det här kan jag fixa, jag har mycket kod som går att återanvända".

Kunden låter dig välja spelidé - han vill testa dig. Men vissa gränser finns det som du måste hålla dig inom och vissa saker måste du uppfylla.

Spelet skall innehålla fem rum. Varje rum innehåller någon form av problem som skall lösas, när man löst problemet kommer man vidare till nästa rum. Klarar man sista rummet så har man klarat spelet.

Spelet behöver inte nödvändigtvis vara ett klassiskt "spel". Du kan tolka det annorlunda och välja att skapa motsvarande som kanske utbildar i Python, eller ett verktyg som tar dig igenom dagen genom att hämta och visa information från olika webbplatser. Kanske har du en idé om att skapa och utveckla din python-Tamagotchi. Fri tolkning alltså. Men håll dig inom kraven nedan. Om din spelidé kräver att du justerar kraven aningen så dokumenterar du vad du gör och varför. 

Har du svårt att komma på en idé? Välj något från ett spel, en film eller bok du läst och återskapa det.

Fråga i forumet om du känner dig osäker.



Bedömning och betygsättning {#bedomning}
--------------------------------------------------------------------

När du lämnat in projektet bedöms det tillsammans med dina tidigare redovisade kursmoment och du får ett slutbetyg på kursen. Läs om [grunderna för bedömning och betygsättning](kurser/bedomning-och-betygsattning).



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas info i specen så kan du själv välja väg, dokumentera dina val i redovisningstexten.

De tre första kraven är obligatoriska och måste lösas för att få godkänt på uppgiften. De tre sista kraven är optionella krav. Lös de optionella kraven för att samla poäng och därmed nå högre betyg.

Varje krav ger max 10 poäng, totalt är det 60 poäng.



###Krav 1, 2, 3: Grunden {#k1}

Placera din kod i katalogen `me/kmom10/adventure`. Programmet som startar spelet skall heta `adventure.py`.

Det skall gå att skicka in en parameter till `adventure.py`, enligt följande.

| Kommando          |  Vad händer     |
|-------------------|-----------------|
| `-h`, `--help`    | Skriver ut en beskrivning av programmet och vilka parameterar som fungerar. |
| `-i`, `--info`    | Skriver ut en beskrivning av spelet och spelets idé. |
| `-v`, `--version` | Skriver ut versionen av spelet. |
| `-a`, `--about`   | Skriver ut en kort beskrivning av dig själv, du som gjort spelet. |
| `-c`, `--cheat`   | Skriver ut minsta möjliga väg för att klara spelet.|

Spelet startar med att en text visas om spelets handling. Därefter flyttas spelaren in till den första rummet.

Spelet har fem rum. Varje rum har en beskrivning i text som visas när man kommer in i rummet. Varje rum har en textbaserad grafisk representation -- en bild av själva rummet.

I rummet har du sällskap av en spelledare, din egen coach -- Marvin (eller motsvarande). Se det som att din spelledare hjälper dig att utföra kommandona. Det är med spelledaren du kommunicerar.

Väl i rummet kan du skriva vad du vill göra, det är kommandon som du kan ge till din spelledare. Följande kommandon skall fungera.

| Kommando       |  Vad händer     |
|----------------|-----------------|
| `i`, `info`    | Skriver ut beskrivningen av rummet, samma som visas när man kommer in i rummet. |
| `h`, `hjälp`   | Skriver ut en lista av de kommandon som du kan göra. |
| `fr`, `fram`   | Gå framåt till nästa rum, om det är upplåst. |
| `ba`, `bak`    | Gå bakåt till föregående rum. |
| `se`           | Titta dig runt omkring - spelet svarar med om det finns något särskilt att se i rummet. |
| `l`, `ledtråd` | Ge en ledtråd, eller fler om det finns, en ledtråd för varje gång man skriver kommandot. |
| `c`, `cheat` | Utför automatiskt alla handlingar som krävs för att klara rummet användaren står i. |

Du kan ersätta `fram` och `bak` med väderstreck, om du så önskar, dvs `norr`, `söder`, `väst`, `öst`.

I ett rum finns det objekt. Ett objekt har en beskrivning. Ett objekt kan du göra något med, du kan interagera med det. När du interagerar med ett objekt så kan det ändra form. En stängd garderob kan öppnas. En stol kan flyttas. En vas kan tas sönder. När något händer med ett objekt så kan det leda till att ytterligare ett objekt kommer in i rummet. 

För att ta ett exempel. Du har objektet *"Det är en vit garderob från Ikea, den ser väl använd ut. Dörren är stängd."*. Du gör kommandot `öppna garderob`, objektet ändrar form till att vara en öppen garderob (dess beskrivning ändras). Beskrivningen är nu *"Det är en öppen garderob, i garderoben finns en kristallkula."*. Objektet `kristallkula` tillkom när du öppnade garderoben. 

Följande skall du kunna göra med ett objekt.

| Kommando                        |  Vad händer     |
|---------------------------------|-----------------|
| `o`, `objekt`                   | Skriver ut vilka objekt som finns i rummet. |
| `t [objekt]`, `titta [objekt]`  | Skriver ut beskrivningen av objektet. |
| `ö [objekt]`, `öppna [objekt]`  | Öppna objektet om det går att öppna. |
| `s [objekt]`, `sparka [objekt]` | Sparka på objektet så det går sönder, om det kan gå sönder. |
| `f [objekt]`, `flytta [objekt]` | Flytta på objektet så det hamnar på en annan plats, om det går att flytta. |

Se till att du måste utföra en, eller en serie av händelser, i rummet -- innan du kan gå vidare till nästa rum.

När du kommit till sista rummet, och utfört det som är nödvändigt, så har du klarat spelet. Då skall ett meddelande skrivas ut.

Se till att din kod validerar.

```bash
# Ställ dig i kurskatalogen
dbwebb publish kmom10
```

Förklara i redovisningstexten hur du tänkt när du strukturerat ditt program, vilka filer du har och vad de fyller för funktion.



###Krav 4: Ryggsäck och inventarier (optionell) {#k4}

I rummen kan det finnas objekt som du kan ta upp och lägga i din ryggsäck. När du har plockat upp ett objekt så kan du använda det. När du använder ett objekt så kan något hända -- du kan få ett annat objekt att ändra sig. Fundera på följande sekvens.

> *Det ligger en nyckel på golvet.*  
> \>\>> ta nyckel  
> *Du tog upp en nyckel.*  
> \>\>> inv  
> *I din ryggsäck ligger: nyckel*  

Nu går du till ett annat rum.

> *Det står en skattkista på golvet. Den är låst.*  
> \>\>> använd nyckel  
> *Du låste upp skattkistan.*  

Följande kommandon skall fungera.

| Kommando                        |  Vad händer     |
|---------------------------------|-----------------|
| `inv`, `inventarier`            | Skriver ut vilka objekt som finns i ryggsäcken. |
| `ta [objekt]`                   | Ta ett objekt, om det går, och lägg i ryggsäcken. |
| `sl [objekt]`, `släpp [objekt]` | Släpp ett objekt som ligger i din rycksäck. |
| `a [objekt]`, `använd [objekt]` | Använd ett objekt. |



###Krav 5: Spara eller *Scrapa* (optionell) {#k5}

Du skall återanvända kunskaper från kursmoment 06, du har två möjligheter, välj en av dem.

1. Erbjud en möjlighet att spara spelets status till fil och läsa spelet status från fil. Använd JSON som filformat. Låt spelaren ange filnamn. Hela spelets status skall sparas. Bifoga en fil som kan läsa upp status som innebär att spelaren står i sista rummet, har utfört alla uppgifter och tagit upp alla inventarier i sin ryggsäck (om ryggsäcken är implementerad). Skriv i cheat om hur man läser upp denna special-filen.

2. Hämta informationen till rummen från en extern webbplats (endast dbwebb.se eller github.com kommer att fungera eftersom utgående trafik till andra webbplatser är spärrad från studentservern). Till exempel, "Det finns en löpsedel på väggen". När spelare väljer att läsa löpsedeln så skall du hämta informationen från vald webbplats, scrapa om det behövs, och visa upp informationen i spelet. Implementera detta i minst 4 rum.



###Krav 6: Spel i spelet (optionell) {#k6}

Dedikera ett av rummen till ett spel-rum, eller lös-en-uppgift-rum.

Du har två möjligheter, välj en.

1. Gör ett TicTacToe som man måste vinna för att komma vidare från rummet (se extrauppgiften i kmom05).

2. Gör ett "spel" av ditt Ceasar-krypto där du konstruerar ett krypterat meddelande som du visar upp och sedan kan spelaren be om hjälp med att få meddelandet krypterat och då hjälper du användaren att automatiskt försöka avkryptera meddelandet enligt "den hårda vägen" (se extrauppgiften i kmom05).



Redovisning {#redovisning}
--------------------------------------------------------------------

1. På din [redovisningssida](python/redovisa), skriv följande:

    1. För varje krav du implementerat, dvs 1-6, skriver du ett textstycke om ca 5-10 meningar där du beskriver vad du gjort och hur du tänkt. Poängsättningen tar sin start i din text så se till att skriva väl för att undvika poängavdrag. Missar du att skriva/dokumentera din lösning så blir det 0 poäng. Du kan inte komplettera en inlämning för att få högre betyg.

    2. Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?

    3. Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?

2\. Ta en kopia av texten på din redovisningssida och kopiera in den på Its/redovisningen. Glöm inte länka till din me-sida och projektet. 

3\. Ta en kopia av texten från din redovisningssida och gör ett inlägg i [kursforumet](forum/utbildning/python) och berätta att du är klar.

4\. Se till att samtliga kursmoment validerar.

```bash
# Ställ dig i kurskatalogen
dbwebb publish me
```
