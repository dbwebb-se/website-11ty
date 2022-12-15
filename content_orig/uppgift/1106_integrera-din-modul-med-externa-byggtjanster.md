---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2018-11-26": "(C, mos) Genomgången inför ht18."
    "2017-10-02": "(B, mos) Välj Travis eller CircleCI."
    "2017-10-02": "(A, mos) Första utgåvan."
...
Integrera din modul med externa byggtjänster
===================================

Du skall använda dig av din modul som du publicerat på GitHub (och Packagist) och du skall integrera den med byggtjänster för automatiserad testning och kodkvalitet.

Du skall skapa ett flöde för automatiserade tester och början av det som kallas continuous integration och en CI-kedja.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har en modul att jobba med.

Du har troligen utfört uppgiften "[Bryt ut din kod till en modul och publicera på Packagist](uppgift/bryt-ut-din-kod-till-en-modul-och-publicera-pa-packagist)".

Du har jobbat igenom artikeln "[Integrera din packagist modul med verktyg för automatisk test och validering](kunskap/integrera-din-packagist-modul-med-verktyg-for-automatisk-test-och-validering)".



Introduktion {#intro}
-----------------------

Du skall använda dig av din modul från GitHub (och Packagist) för att integrera mot externa byggtjänster som automatiserar dina tester.




Krav {#krav}
-----------------------

1. Du jobbar i ditt repo för din modul som du publicerat på GitHub (och Packagist).

1. Fortsätt utveckla koden så som du anser behövs.

1. Försök nå 100% kodtäckning med dina enhetstester. Men 50% kan också vara okey. Även andra procenttal kan accepteras lite beroende på hur stor din modul är. Var tydlig i redovisningstexten hur långt du nådde.

1. Integrera din modul med Travis och/eller CircleCI. Placera motsvarande badge i din README.

1. Integrera din modul med Scrutinizer. Lägg tre badges i din README.

1. Analysera din egen kodkvalitet med Scrutinizer och se om du kan förbättra den.

1. När du är klar så taggar du din modul och uppdaterar din installation av `me/redovisa`. Modulen taggar du bäst du vill, men följ semantisk versionshantering. Dubbelkolla så att det är senaste versionen av din modul som används i redovisa.

1. Committa alla filer i redovisa och lägg till en tagg (4.0.\*) samt pusha till GitHub.



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter om du finner dem givande.

* Pröva gärna integrera med fler externa verktyg, om du hittar något som verkar spännande.

* Försök verkligen att nå 100% kodtäckning i dina enhetstester, bara för att visa att det går. Om det inte går, skriv då om det i redovisningstexten och berätta varför, eller berätta vilka kodändringar som behövs för att göra koden mer testbar.

* Försök nå hög kodkvalitet enligt valideringsverktygens syn på saken. Kan du slå kodkvaliteten på [anax/remserver](https://github.com/canax/remserver)?



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
