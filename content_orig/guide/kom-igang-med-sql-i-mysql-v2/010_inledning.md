---
author: mos
revision:
    "2021-01-14": "(B, mos) Mindre justering av text."
    "2019-01-10": "(A, mos) Första versionen."
...
Inledning
==================================

Under våren 2022 skrivs denna guiden om i en version 2 för att i första hand stödja MariaDB.

Arbetet görs för att förenkla guiden då det finns en del saker som är inkompatibla mellan MariaDB och MySQL. Dessa inkompabiliteter är ofta små och kan utläsas i manualerna. Problemet är om man hela tiden måste förklara dem och beskriva hur de fungerar så ökar komplexiteten av denna guide och det vill vi nu undvika.



Version 1 av guiden {#v1}
----------------------

[Version 1 av guiden](guide/kom-igang-med-sql-i-mysql) stödde både MySQL och MariaDB.

Guiden skrevs ursprungligen för MySQL v5.7 och under våren 2019 uppdaterades guiden för att stödja MySQL v8.0.4 och senare. Samtidigt dubbelkollades SQL-koden så att den är kompatibel i MariaDB 10.3 och senare. När det finns kompabilitetproblem mellan MySQL och MariaDB så anges det i respektive artikel i guiden.



Tidigare version {#tidigare}
----------------------------------

Denna guide bygger på, och vidarutvecklar, dokumentet "[Kom igång med SQL](uppgift/kom-igang-med-sql)" som kom ut första gången 2008.

I samband med att denna guide skapades (årsskiftet 2017/2018) så gicks dokumentet igenom och testades och alla bilder byttes ut mot utskrifter från terminalkommandot och kompletterades med asciinemas. Det lades till en del administrativa kommandon för att inspektera databasens schema.



<!--
Forumtråd kopplad till guiden {#forum}
----------------------------------

Det finns en [tråd i forumet](t/7233) som är kopplad till denna guide. Där kan du se större uppdateringar som är gjorda. Du kan även ställa frågor eller bidra med tips och trix.
-->
