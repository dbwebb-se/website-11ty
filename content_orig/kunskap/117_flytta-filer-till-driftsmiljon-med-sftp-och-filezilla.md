---
author: mos
category: labbmiljo
revision:
  "2014-09-23": (C, mos) Skrev om stycket för att göra en webbsida lokalt.
  "2014-09-11": (B, mos) Notis om att SourceForges installationsprogram innehåller
    extra oönskade program.
  "2012-08-29": (A, mos) Första versionen, flyttad från annat dokument och uppdaterad.
updated: "2014-09-22 23:43:20"
created: "2012-08-29 22:05:27"
...
Flytta filer till driftsmiljön med sftp och Filezilla
==================================

För att flytta filer, eller hela din webbplats, till BTH's driftsserver så använder du dig av filöverföringsklienten FileZilla och sftp.

<!--more-->



Installera sftp-klienten FileZilla {#installera}
--------------------------------------------------------------------

Vi behöver en sftp-klient för att flytta filerna från utvecklingsmiljön till driftsmiljön. 

* [Hämta hem och installera FileZilla](http://FileZilla-project.org/download.php?show_all=1), [undvik installationsprogrammet från SourceForge](t/2676).

Testa att logga in på `sftp.student.bth.se` alternativt `ssh.student.bth.se` (port 22) med ditt studentkonto (studentid och lösenord). Så här kan det se ut.

[FIGURE src=/image/kunskap/filezilla.jpg?w=w1 caption="Inloggad på mitt studentkonto med FileZilla."]

Bra, då är vi redo att kopiera våra lokala webbsidorna till driftsmiljön.



Gör en webbsida lokalt {#lokalt}
--------------------------------------------------------------------

Om du inte redan har gjort en lokal webbsida så kan du jobba igenom guiden ["Installera en egen webbserver för utveckling"](kunskap/installera-en-egen-webbserver-for-utveckling). Där får du hjälp att installera en lokal webbserver och hjälp att skapa din första webbsida.



Driftsmiljön {#drift}
--------------------------------------------------------------------

Driftsmiljön är skolans webbserver för studenter. Alla filer som du lägger i din katalog `www` kommer att synas via webbservern (om de har rättigheter att synas).

Testa genom att peka webbläsaren till följande adress.

* [http://www.student.bth.se/~mosstud](http://www.student.bth.se/~mosstud)

Byt ut `mosstud` till din egen studentakronym och testa igen. Det kan se ut så här när du lyckas.

[FIGURE src=/image/kunskap/www_student.jpg?w=w1 caption="Din egen webbplats som student på BTH."]

Då är du redo att ladda upp dina egna webbsidor till driftsmiljön.



Flytta filer till driftsmiljön {#flytta}
--------------------------------------------------------------------

Gör så här för att flytta filer till driftsmiljön.

Använd FileZilla för att koppla upp dig mot `sftp.student.bth.se`. Du använder din studentakronym och lösen för att logga in. Det är samma akronym och användare som du använder för att logga in på studentportalen eller läroplattformen ITs.

Gå in i katalogen `www` och skapa en underkatalog, döp den till `htmlphp` (eller din kurs smeknamn).

Kopiera över dina testfiler du gjort lokalt och lägg dem under din nyskapade `htmlphp`-katalog.

Testa att det fungerade (byt ut `mosstud` till din egen akronym).

* [http://www.student.bth.se/~mosstud/htmlphp/](http://www.student.bth.se/~mosstud/htmlphp/)


**Problem med rättigheter?**

Driftsmiljön är en Unix/Linux maskin. Det krävs att kataloger och filer har vissa rättigheter för att de skall presenteras via webbservern. Dubbelkolla att katalogrättigheterna är 755 och filrättigheterna är 644. Detta gör du med hjälp av FileZilla. Högerklicka på katalog eller fil och välj "Filrättigheter".

Enklast är att markera katalogen `htmlphp`, högerklicka och välja "Filrättigheter", fyll sedan i 755 och klicka för checkboxen för att ändra rättigheter rekursivt i katalogstrukturen. 

[FIGURE src=/image/kunskap/filrattigheter.jpg caption="Högerklicka på katalog och filrättigheter för att få upp denna rutan."]

Så här blev det hos mig till slut.

[FIGURE src=/image/kunskap/www_student_me.jpg?w=w1 caption="Katalogen me kopierad över till driftsmiljön och presenteras."]

Bra, då har vi kontroll på både den lokala miljön och driftsmiljön.
