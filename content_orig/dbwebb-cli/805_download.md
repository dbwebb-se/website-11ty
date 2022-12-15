---
author:
    - mos
revision:
    "2020-10-29": "(C, mos) Förtydligad för att ebskriva hur det fungerar och mer varningstexter."
    "2019-11-01": "(B, mos) Genomgången och uppdaterad med mer detaljer."
    "2015-03-23": "(A, mos) Arbetskopia för dbwebb-validate version 2."
...
Ladda ned från servern
==================================

Detta är en avancerad funktion och bör användas endast då man har full kontroll på hur kommandot fungerar. Annars riskerar du att skriva över och förstöra de filerna du redan har i din lokala katalog.

Du kan ladda ned ditt kursrepo, eller delar av det, från studentservern till ditt lokala kursrepo.



För säkerhets skull {#a}
----------------------------------

Innan du kör kommandot bör du ta en kopia av din lokala katalog. Det är för att undvika att något går fel och dina lokala filer skrivs över på ett felaktigt sätt.

Ett sätt är att clona ett nytt kursrepo, initiera dess me-mapp och sedan göra download till denna nya katalog. Därefter kan du jämföra de nedladdade filerna och de filerna du har lokalt.

När du använder download riskerar du att förstöra de filer du har lokalt. Du bör alltså alltid använda download med yttersta försiktighet.

Egentligen bör du använda det om du inte betraktar dig som en avancerad användare som kan hantera den risken som download innebär.



Upload laddar inte upp alla filer {#u}
----------------------------------

När du gör upload så laddas en delmängd av dina filer upp till studentservern. De filerna som inte är nödvändiga kommer inte att laddas upp. Vad som är nödvändigt och inte bestäms av konfigurationsfiler i varje kursrepo, se `.dbwebb/upload.{include,exclude}`.

Av denna anledningen kan du inte förvänta dig att hanteringen av ditt lokala kursrepo, laddas upp med upload, ladads ned med download, resulterar i att du har exakt samma filer i ditt lokala kursrepo. De filer som inte laddats upp kommer att saknas.



download {#d}
----------------------------------

Så här kör du en vanlig download. Den synkroniserar det som ligger på studentservern med ditt lokala repo. Den jämför innehåll och datumstämplar och laddar ned, från studentservern, de filer som är nyare än de som ligger lokalt. Inga filer raderas från din lokala användare.

```text
dbwebb download
dbwebb download me
dbwebb download kmom01
dbwebb download lab1
```

Hela kursrepot, eller den valda delen, laddas ned från studentservern.

Om du har redigerat en fil lokalt så skall den inte skrivas över då dess ändringsdatum är senare än det ändringsdatum som finns på studentservern.

Vid överföringen justeras rättigheterna för de kataloger och filer som förs över.

Du kan se detaljer för kommandot genom att lägga till switchen `-v` eller `--verbose` när du kör kommandot. Då kan du se exakt vilka villkor som används till kommandot `rsync` somutför själva arbetet.



download -f {#f}
----------------------------------

Du kan forcera en exakt kopia av studentserverns innehåll vid nedladdningen. Det innebär att samtliga filer laddas ned och dina egna filer skrivs över med innehållet från studentservern. De lokala filer som inte finns på studentservern kommer att raderas.

Du gör detta genom att lägga till switchen `-f` eller `-force`.

```text
dbwebb -f download lab1
dbwebb --force download lab1
```

Du kommer att få upp en säkerhetsfråga som du behöver svara "Ja" på, annars kommer switchen `f` att ignoreras och det blir en vanlig download.



Dela kursrepon {#dela}
----------------------------------

Använd inte download som en metod för att jobba på flera datorer.

Vill du ha möjligheten att dela ett kursrepo mellan flera datorer så skall du se på kursrepot som "ett orginal". Lägg detta orginal på ett usb eller en fildelningstjänst och på det sättet kan du använda samma kursrepo på flera olika datorer.

Ett annat alternativ är att placera ditt kursrepo, eller me-katalogen, på en Git-tjänst och använda Git för att jobba med synkroniserade kopior av ditt repo.



Vanlig användning {#anv}
----------------------------------

Lärarteamet använder download för att hämta dina filer och hjälpa dig med mer avancerad felsökning eller för att rätta dina inlämningar.
