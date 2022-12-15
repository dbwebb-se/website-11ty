---
author:
    - mos
category:
    - labbmiljö
    - texteditor
revision:
    "2017-05-30": (F, mos) Genomgång inför ht17.
    "2016-08-29": (E, mos) Mer info om att fixa LF.
    "2016-08-24": (D, mos) Bort blå ruta om LF.
    "2015-10-05": (C, mos) Not om externa beroenden för paket.
    "2015-08-24": (B, mos) Not om Windows och Unix-stil på radslut.
    "2015-03-31": (A, mos) Första utgåvan.
...
Installera texteditorn Atom
==================================

[FIGURE src=/image/atom/atom-icon.png?w=c3 class="right"]

Texteditorn Atom är en editor som du kan använda som utvecklingsverktyg när du programmerar och redigerar textfiler. Här är en kort guide till hur du installerar Atom och hur du konfigurerar de vanligaste inställningarna.

<!--more-->

Atom finns till flera operativsystem, går under en fri licens och utvecklas som [öppen källkod på GitHub](https://github.com/atom).



Installera {#installera}
--------------------------------------

[Gå till Atom.io](https://atom.io), ladda hem och installera den varianten som passar för din miljö.

[Kika snabbt på manualen](https://atom.io/docs) för att orientera dig.

Starta Atom.

[FIGURE src=/image/atom/atom-welcome.png?w=w2 caption="Atom hälsar dig välkommen."]



Testa din editor {#testa}
--------------------------------------

För att testa hur din editor fungerar, så kan du göra följande exempel.

Ta koden nedan och kopiera in till din editor och spara som `hello.html` i din hemmakatalog.

```text
<!doctype html>
<meta charset="UTF-8"/>
<title>Hello World</title>

<h1>Hello World</h1>
<p>Just trying out Atom.</p>

</html>
```

Så här kan det se ut.

[FIGURE src=/image/atom/atom-filetype.png?w=w2 caption="Editerar filen hello.html på Windows."]

Titta nere i högra hörnet av Atom, så ser du att editorn håller koll på vilken typ av fil som du editerar och färgkodar din kod enligt det språk du använder.

Öppna din filebrowser och leta reda på vad du sparade filen, dubbelklicka på filen och öppna den i en webbläsare. Det kan se ut så här.

[FIGURE src=/image/atom/atom-ie.png?w=w2 caption="öppnar filen och visar i en webbläsare på Windows."]

Nu har du koll på grunderna.



Grundinställningar {#grund}
--------------------------------------

Atom har inställningar som kan ändras, öppna dem via `ctrl ,` eller `cmd ,` (Mac). Du kan också öppna fönstret för inställningar via menyvalet `File -> Settings`.

[FIGURE src=/image/atom/atom-settings.png?w=w2 caption="Fönstret för inställningar för Atom."]

Du behöver nu dubbelkolla att Atom har ett antal nödvändiga inställningar.

* UTF-8 NOBOM
* Soft tabs, tab längd 4 mellanslag
* Radslut Unix style



### Använd UTF-8 NOBOM {#utf8}

Kika under "Core" och leta reda på "File Encoding".

Standardinställningen är att filerna sparas i formatet UTF-8 utan byte order mark (NOBOM). Låt det vara på det viset. Det handlar om hur filen sparas på disken och vilket format de olika tecknen får. Vi vill använda UTF-8.

[FIGURE src=/image/atom/atom-settings-fileencoding.png caption="Encoding skall vara UTF-8 NOBOM"]



### Använd soft tabs, tab-längd 4 {#softtabs}

Leta under fliken "Editor" och finn "Soft Tabs". Standardinställningen är att *soft tabs* används. Låt det vara på det viset.

[FIGURE src=/image/atom/atom-soft-tabs.png caption="Använd soft tabs."]

Soft tabs betyder att en tab ersätts med ett motsvarande antal mellanslag. Det gör att det blir enklare att flytta filer mellan olika editorer och användare som kan ha olika inställningar.

Leta efter "Tab Length" och ställ in *tab length* till 4 mellanslag.
 
[FIGURE src=/image/atom/atom-tab-length.png caption="Använd 4 mellanslag för att ersätta en tab."]

Olika kodstandarder kan ha olika rekommendationer om storleken på en soft tab. De vanliga inställningarna är 2 eller 4 mellanslag. I kurserna använder vi 4.



### Radslut enligt Unix-style {#lineending}

Vi vill använda radslut enligt Unix-style (`\n`), också kallad LF. Det blir enklast så, för en webbprogrammerare.

Du kan se vilket radslut som används, genom att titta nere till höger. Öppna en ny fil (`ctrl-n`) och kika.

[FIGURE src=/image/snapht16/atom-crlf-to-lf.png caption="På Windows är radbrytning CRLF standard."]

För att ändra filens radslut så klicka på (i detta fallet) CRLF och byt till LF samt spara filen. Det skall se ut så här.

[FIGURE src=/image/snapht16/atom-lf.png caption="Använd alltid Unix style radbrytning LF."]

Förutom Windows style radbrytning LF + CR (`\n\r`) så kan du även komma i kontakt med äldre Mac style CR (`\r`).

Vi kör alltid på LF för att undvika problem när vi flyttar filer mellan olika datorer. I vissa fall kan det bli problem när man använder andra typer av radslut. 



### Radslut nya filer enligt LF {#linendstd}

För att underlätta att alla nya filer du skapar verkligen har LF som radslut så kan du konfigurera ett förinstallerat paket till Atom som heter "line-ending-selector".

I "Settings" gå till fliken "Packages" och sök efter "line-ending". Du bör få upp paketet "line-ending-selector" och du klickar på "Settings" för det paketet.

Du får upp en flik där du kan sätta "Default line ending" till LF.

[FIGURE src=image/snapvt17/atom-default-lineending.png?w=w2 caption="Alltid default radslut till LF."]



<!--
Det finns en [forumtråd som visar hur du byter default radbrytning till LF](f/45202).

[INFO]
**Windows och Unix-stil på radslut**

Om du sitter på Windows så behöver du installera en plugin för att få Unix-stil på dina radslut. Läs följande inlägg i forumet om hur du gör det, "[Unix line-endings i Atom för Windows](t/4438)".
[/INFO]
-->



Installera addons som paket {#paket}
--------------------------------------

Atom har en hel del addons, eller paket som det kallas. Det är små program som gör bygger ut editorn och gör den till ett mer kraftfullt verktyg. 

Du kan söka efter paketen under *packages*.

[FIGURE src=/image/atom/atom-packages.png?w=w2 caption="Sök och installera paket för att utöka editorns funktioner."]

Atom har också ett kommandorads-interface till pakethanteringen. Det är trevligt om du är en lite mer avancerad användare som jobbar på många datorer där du vill ha ett enkelt sätt att installera dina paket.

[FIGURE src=/image/atom/atom-apm.png?w=w2 caption="Använd kommandoraden för att hantera dina paket för Atom."]

Allt eftersom du blir varm i kläderna så är det en bra idé att se vilka paket som finns som kan underlätta din vardag som programmerare. Men till att börja med så nöjer vi oss med att konstatera att det finns möjligheter att anpassa sin editor.

<!--
Så här installerar jag mina paket från kommandoraden. 

*Notera att varje paket kan vara beroende av att ditt system har relaterade programvaror installerade. Du bör därför installera varje paket för sig så att du har koll på eventuella externa beroenden.*

Det är inte nödvändigt att du installerar paketen nu, du kan ta det som det kommer, lite senare.

```bash
$ apm install linter linter-less linter-pylint linter-jscs linter-phpcs block-travel linter-jshint linter-phpmd linter-csslint linter-pep8 linter-shellcheck linter-htmlhint linter-php linter-xmllint
```
-->



Konfigurationsfiler {#config}
--------------------------------------

Atom sparar sina konfigurationsfiler i din hemmakatalog under katalogen `.atom`, kika där om du vill lära dig mer om konfiguration av Atom.

[FIGURE src=/image/atom/atom-config.png?w=w2 caption="Alla konfigurationsfiler sparas i din hemmakatalog, under `.atom`."]

När man vill anpassa sin editor så är konfigurationsfilerna en variant. Men vi låter det vara, tills vidare, en mer avancerad användning av texteditorn.

<!--
Så här har jag uppdaterat min `.atom/keymap.cson` för att den skall passa hur jag vill navigera bland flikar och i texteditorn.

```text
'atom-text-editor':
    'alt-right': 'editor:move-to-end-of-line'
    'shift-alt-right': 'editor:select-to-end-of-line'
    'alt-left': 'editor:move-to-beginning-of-line'
    'shift-alt-left': 'editor:select-to-beginning-of-line'

'body':
  'ctrl-tab': 'pane:show-next-item'
  'ctrl-shift-tab': 'pane:show-previous-item'
```
-->


Öppna Atom via Utforskaren (Windows) {#utforskaren}
--------------------------------------

I början kan det vara lite mycket att lära sig. Då är det bra att även kunna öppna Atom smidigt via Utforskaren, genom att högerklicka och välja "Öppna med Atom..."

Under fliken "System" hittar du två inställningar, "Show in file context menus" och "Show in folder context menus".

[FIGURE src=/image/atom/atom-file-folder-context.png?w=500 caption="Bocka i båda så kan man öppna både filer och mappar ifrån Utforskaren."]

När de är aktiverade så får du möjligheten att högerklicka i valfri mapp eller på valfri fil och välja "Open with Atom".

[FIGURE src=/image/atom/atom-open-with-atom.png?w=250 caption="Så här kan det se ut när du nu högerklickar i Utforskaren."]

Alternativ till Atom {#alternativ}
--------------------------------------

Här är ett par alternativ till texteditorn Atom.

* Visual Studio Code (flera plattformar)
* TextWrangler (Mac OS)
* Notepad++ (Windows)
* SublimeText, jEdit (flera plattformar)

Självklart kan du använda din egen favoriteditor, men det är inte säkert att vi har en liknande och kan hjälpa dig om du får problem. Bortsett från det så är det fritt fram att pröva vilka editorer du vill. Se bara till att du har samma [grundinställningar som vi har i Atom](#grund).



Avslutningsvis {#avslutning}
--------------------------------------

En editor är ett oerhört viktigt arbetsverktyg för en webbprogrammerare. Oavsett vilken du väljer så finns det alltid olika sätt att anpassa editorn till ditt behov. Om du investerar tid i att lära dig din editor så kan du spara en hel del tid i ditt utvecklingsarbete.

Har du tips, [förslag eller frågor om Atom](t/4054) så finns det en specifik forumtråd för det.
 
