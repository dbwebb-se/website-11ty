---
...
Lokal utvecklingsmiljö
==================================

När du jobbar i ett repo så är det smidigt att ha lokala versioner av de utvecklingsverktyg som behövs. Du vill alltså allra helst installera en lokal utvecklingsmiljö per repo. Det ger dig möjligheten att ha olika versioner och konfigurationer av utvecklingsmiljön, beroende på vilket repo du jobbar i.

För att lyckas med detta krävs viss hantering och konfiguration.

Så här gör du för att installera en lokal utvecklingsmiljö till ett kursrepo.



Konfigurera för lokal miljö {#config}
----------------------------------

Du behöver redigera din miljövariabel `PATH` så att din lokala utvecklingsmiljö används framför den globala.



###Vilken startupfil gäller för mig? {#startup}

Miljövariabeln `PATH` sätts i ditt shells startupfil. Vilken startupfil som används kan skilja mellan olika operativsystem.

Normalt gäller följande filer för respektive operativsystem.

* `.bash_profile` i Mac OS
* `.bashrc` i Linux och Cygwin

Filerna finns i din hemmakatalog och du kan se dem via `ls -al`.

```bash
cd $HOME
ls -al .bash*
```

Dubbelkolla innehållet i startupfilerna innan du går vidare. Öppna dem i din texteditor eller använd kommandona `more`, `less` eller editorn `vi`. Kika kort och översiktligt vad filen innehåller.



###Kontrollera vad `PATH` innehåller {#innehall}

Kontrollera vad `PATH` innehåller, skriv följande i din terminal.

```bash
echo $PATH
```

Det är din sökväg. När du skriver ett kommando i terminalen så används sökvägen för att hitta och välja ut den exekverbara. Om den exekverbara finns på flera platser så används den som hittas först.

Kommandon som `which` och `whereis` hjälper dig att förstå vilka kommandon som används via sökvägen.

```bash
which node
whereis node
```

Nu har du verktyg som behövs för att modifiera och felsöka din `PATH`.



###Redigera `PATH` {#edit}

Då kan vi redigera innehållet i `PATH` genom att ändra i startupfilen.

Lägg till följande konstruktion i den startupfil som gäller för ditt operativsystem.

Lägg konstruktionen sist i filen, efter att `PATH` har fått sitt fulla innehåll.

```text
export PATH="vendor/bin:node_modules/.bin/:$PATH"
```

Spara filen och läs om den, *sourca* den.

```bash
source $HOME/.bashrc       # Linux and Cygwin
source $HOME/.bash_profile # MacOS
```

Dubbelkolla att sökvägen till vendor-bin och node_modules-bin nu ligger först i din `PATH`.

```bash
echo $PATH
```

Du berhöver source startupfilen i varje terminal du har öppen, men nästa gång du öppnar en ny terminal så kommer det att vara rätt sökväg från början.



Installera verktyg via make {#make}
----------------------------------

Ditt kursrepo innehåller en makefile, testa vilka targets den innehåller.

```bash
make
```

Du kan nu installera en lokal utvecklingsmiljö.

```bash
make install
```

Du kan kontrollera vilka verktyg som installerats och vilka versioner de har.

```bash
make check
```

Det som kontrolleras är en större mängd verktyg. Det är inte säkert att ditt kursrepo behöver samtliga verktyg som kollas i check. Men listan från `make check` ger dig en översikt över de vertyg du har, och vilka som används baserat på var de finns.



Avslutningsvis {#avslutning}
----------------------------------

Fråga i forumet, eller bidra med tips och trix. Det finns en [tråd kopplad till lokal utvecklingsmiljö](t/6052).
