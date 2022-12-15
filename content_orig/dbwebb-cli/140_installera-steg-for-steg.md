Installera steg för steg
==================================

Du kan också installera `dbwebb` för hand, steg för steg.

Först ladda ned skriptet och spara det som `dbwebb` och sätt rättigheterna så att skriptet blir körbart.

_($-tecknet representerar prompten och är inte en del av kommandot)_

```text
$ wget -O dbwebb https://raw.githubusercontent.com/mosbth/dbwebb-cli/master/dbwebb2
$ chmod 755 dbwebb
```

Nu kan du köra skriptet.

```text
$ ./dbwebb --version
```

Men, för att göra det enklare att köra skriptet så placerar vi det i en katalog som ligger i din sökväg, `/usr/local/bin`. Katalogstrukturen skapas om den inte redan finns. 

```text
$ install -v -d /usr/local/bin
$ install -v dbwebb /usr/local/bin
```

Du kan kontrollera vilket program, och dess sökväg, som körs när du nu skriver `dbwebb`.

```text
$ which dbwebb
```

Nu kan du köra skriptet utan att ange sökvägen.

```text
$ dbwebb --version
```

Så här kan det se ut.

[ASCIINEMA src=24611]
