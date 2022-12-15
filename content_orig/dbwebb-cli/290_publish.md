Publicera kursrepot
==================================

Du kan publicera kursrepots filer. publicering innebär att filerna kopieras över till en katalog där de kan nås via en webbserver. Samtidigt så minifieras filerna. Om det blir felmeddelande i processen så är det något du behöver rätta till.

```text
$ dbwebb publish
$ dbwebb publish me
$ dbwebb publish kmom01
$ dbwebb publish lab2
```

Du anger vad som skall publiceras, om du inte anger något så valideras hela ditt kursrepo.

Om du är intresserad av vad som sker bakom kommandot `dbwebb publish` så kan du läsa mer om det i [artikeln för kommandot `dbwebb-validate`](dbwebb-validate).



Snabbare publish med `publishfast` {#publishfast}
--------------------------------------

Man kan göra en snabbare publish som hoppar över valideringsfasen.

```text
$ dbwebb publishfast kmom01
```

Att publicera snabbt kan var bra om man sitter och testar små ändringar och vill se om de fungerar.



Felsök publiserad kod med `publishpure` {#publishpure}
--------------------------------------

Man kan göra en snabb publish som även hoppar över minifieringsfasen. Det är bra om du vill felsöka via de radnummer som anges i den publiserade koden. Minifieringsfasen ändrar radnumreringen i din källkod och det kan ibland vara enklare att felsöka på ominifierad kod.

Publicera din kod oförvanskad och icke minifierad.

```text
$ dbwebb publishpure kmom01
```

Bra för felsökning kopplad till radnummer.
