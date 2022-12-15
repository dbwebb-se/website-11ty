Inspektera kursrepot
==================================

Du kan inspektera ett kursmoment och dess delar. Det är tester som körs på ett kursmoment och de uppgifter som kursmomentet innehåller.

När lärarna rättar ditt kursmoment så är det så här de kör testerna. Du kan alltså provrätta din inlämning på egen hand och se samma resultat som lärarna ser.

```text
$ dbwebb inspect kmom01
```

Du anger vilket kmom som skall inspekteras.

Du kan också inspektera godtyckligt kursmoment i godtycklig kurs, oavsett var du står i filsystemet. Det gör den enkelt att köra inspect, utan att behöva stå i rätt kursrepo, eller ens ha tillgång till kursrepot på den lokala maskinen.

```text
$ dbwebb inspect python kmom01
```
