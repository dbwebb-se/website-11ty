Installera steg för steg
==================================

Du kan installera `anax` för hand, steg för steg.

Först ladda ned skriptet och spara det som `anax` och sätt rättigheterna så att skriptet blir körbart.


```text
$ curl https://raw.githubusercontent.com/canax/anax-cli/master/src/anax.bash > anax
$ chmod 755 anax
```

Nu kan du köra skriptet.

```text
$ ./anax --version
```

Men, för att göra det enklare att köra skriptet så placerar vi det i en katalog som ligger i din sökväg, `/usr/local/bin`. Katalogstrukturen skapas om den inte redan finns, förutsatt att du har rättigheter.

```text
$ install -v -d /usr/local/bin
$ install -v anax /usr/local/bin
```

Du kan kontrollera vilket program, och dess sökväg, som körs när du nu skriver `anax`.

```text
$ which anax
```

Nu kan du köra skriptet utan att ange sökvägen.

```text
$ anax --version
```

Så här kan det se ut.

[ASCIINEMA src=132320]
