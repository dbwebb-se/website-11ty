---
author: mos
category: labbmiljo
revision:
  "2014-08-19": (E, mos) Uppdatering var hittar man optionsfönstret samt soft tabs
    och tabstorlek 4 spaces.
  "2014-08-17": (D, mos) Var hittar man optionsfönstret.
  "2014-08-08": (C, mos) Mindre justering om att man kan välja även andra editorer.
  "2013-01-23": (B, mos) Nytt stycke om hur man byter teckenkodning på befintlig fil.
  "2012-08-29": (A, mos) Första versionen, flyttad från annat dokument och uppdaterad.
updated: "2014-08-19 09:02:38"
created: "2012-08-29 21:26:20"
...
Installera en texteditor, jEdit
==================================

En bra texteditor, eller utvecklingsmiljö, är A och O och kan spara dig mycket tid och göra dig till en effektiv utvecklare. I dbwebb-kurserna har vi en referens-editor i jEdit.

<!--more-->

[WARNING]
**Äldre artikel**

Denna artikel är äldre och nyare information finns på [/labbmiljo](labbmiljo).

[/WARNING]

Vi har valt jEdit för att den finns till alla miljöer. Men du kan välja din egen editor, se i slutet av artikeln för andra förslag på editor. Är du osäker så börjar du med jEdit.



Installera en texteditor, jEdit {#installera}
--------------------------------------------------------------------

Vi behöver en texteditor och valet föll på den java-baserade jEdit. Den finns på alla plattformar och den har stöd för att editera filerna över ssh/sftp via en plugin.

* [Ladda ned och installera jEdit](http://www.jedit.org/index.php?page=download).

Om du inte har Java på din maskin så behöver du [ladda ned och installera Java Runtime Environment (JRE)](http://www.oracle.com/technetwork/java/javase/downloads).

Installera jEdit.

[FIGURE src=/image/kunskap/jedit.png?w=w1 caption="Editorn jEdit är installerad och uppstartad."]

Bekanta dig med editorn. Skapa och spara en fil. Kolla menyerna. Lek runt lite. Anpassa editorn som du vill ha den.



###Ställ in jEdit för Unix linefeed {#linefeed}

Dubbelkolla att editorn är inställd på att göra radbrytningar med Unix stil. Vi vill inte ha radbrytningar i Windows stil, det kan ge oss problem framöver.

Öppna fönstret för inställningar under "Utilities -> Options" alternativt "Utilities -> Global Options".

[FIGURE src=/image/kunskap/jedit_linefeed.jpg?w=w1 caption="Se till att du använder Unix stil på radbrytningar."]



###Ställ in jEdit för UTF-8 {#utf8}

Det går att göra många inställningar i jEdit. En av de viktigare för en webbutvecklare är inställningen så att teckenkodning alltid sker i UTF8 NO-BOM. Det gör så att svenska tecken visas korrekt i webbläsaren och du kommer undika en hel del felsökning som har sin botten i problem med teckenkodning.

[FIGURE src=/image/kunskap/jedit_utf8.jpg?w=w1 caption="Ställ in teckenkodning för UTF8."]

Stäng ned alla dokument och starta om texteditorn när du är klar med inställningarna.

När du åter öppnar editorn och laddar in en fil så ska det stå UTF8 längst ned i editorns fönster.

[FIGURE src=/image/kunskap/jedit_visa_teckenkodning.jpg?w=w1 caption="Nuvarande teckenkodning visas längst ned till höger."]

[INFO]
**Tips.**

Du kan ställa in teckenkodningen både i Global options och Buffer options. I buffer options kan du ändra kodningen för de filer du har öppna just nu i jEdit. I global options så ställer du in default inställningar för alla nya filer.
[/INFO]


[INFO]
**Tips.**

* [Läs mer om hur man gör inställningen till UTF8](http://db-o-webb.blogspot.com/2010/08/andra-teckenkodning-i-jedit.html).
[/INFO]

[INFO]
**Tips.**

[Läs om [UTF-8](http://en.wikipedia.org/wiki/UTF-8'>http://en.wikipedia.org/wiki/UTF-8) och [Byte Order Mark (BOM)](http://en.wikipedia.org/wiki/Byte_order_mark) på Wikipedia.

[/INFO]



###Byt teckenkodning på en befintlig fil {#byt}

Om du har en fil som redan har en teckenkodning så kan du byta dess teckenkodning i "Buffer options", precis som det står i stycket ovanför. Men ibland räcker det inte utan editorn måste tolka filen enligt en viss teckenkodning i samband med att du öppnar filen. Det kan du göra på följande sätt.

1. Öppna filen på nytt, gör inga ändringar i den.
2. Välj menyvalet "File" > "Reload with Encoding" > "UTF-8"
3. Klart.

Nu kan du spara filen, stäng den och öppna den igen och du ser att teckenkodningen är UTF-8 (visas i nedre högra hörnet av fönstret).



Inställningar på tabbar {#tab}
--------------------------------------------------------------------

Se till att du ställer in din editor på tabstorleken 4 och använd "soft tabs" vilket innebär att tabben ersätts med 4 mellanslag. Det är viktigt när du vill följa vissa kodstandarder som används i vissa av kurserna.

Du gör inställningen i "Utilities -> Global options -> Editing":

* *Tab width* sätter du till 4.
* *Soft (emulated with spaces) tabs* klickar du för.



Fler texteditorer som rekommenderas {#fler}
--------------------------------------------------------------------

Här finns ytterligare ett par texteditorer som kan rekommenderas:

* [Textwrangler (Mac)](http://www.barebones.com/products/textwrangler/download.html)

* [Notepad++ (Windows)](http://notepad-plus-plus.org/download/) tillsammans med [WinSCP](http://winscp.net/eng/download.php) för filöverföring.

Självklart kan du använda din favoriteditor också, men det är inte säkert att vi har en liknande och kan hjälpa dig om du får problem. Bortsett från det så är det fritt fram att pröva vilka editorer du vill. Se bara till att du ställer in teckenkodningen till UTF8 NO-BOM och använd Unix radbrytning.
