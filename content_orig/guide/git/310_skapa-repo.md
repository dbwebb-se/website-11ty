---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
Skapa ett repo
==================================

För att kunna ladda upp till GitHub behöver vi skapa ett repository (repo) där koden ligger. Vi börjar jobba lokalt och laddar upp till GitHub sen.

När jag jobbar brukar jag skapa en `git`-mapp i min hemkatalog där jag lägger alla repon jag har.

```bash
[Aurora](~/git) $ tree -L 2 .
.
├── correct
│   ├── databas
│   ├── design
│   └── itsec
├── test.php
├── version.php
└── work
    ├── dbwebb-cli
    ├── dbwebb-prep
    ├── design-v3
    ├── itsec
    ├── lab
    ├── macos_setup
    ├── mr-civ
    ├── slides
    └── website
```

Det gör det lätt för mig att hålla koll på var jag har mina projekt. Vi skapar en mapp, `~/git/example` där vårt exempelprojekt kommer leva.

```bash
# Vi ställer oss i hem-mappen
cd
# Vi skapar mappen git och undermappen example
mkdir -p git/example
cd git/example
```

Vi har nu en tom mapp där vi ska påbörja vårt repo. Vi skapar ett lokalt repo med hjälp utav `git init` och kollar så allt gick bra:

```
[Aurora](~/git/example) $ ls -la
total 0
drwxr-xr-x   3 nik  staff   96 11 Aug 17:36 .
drwxr-xr-x  13 nik  staff  416 11 Aug 17:34 ..
drwxr-xr-x   9 nik  staff  288 11 Aug 17:37 .git
[Aurora](~/git/example) $ git status
On branch master

No commits yet

nothing to commit (create/copy files and use "git add" to track)
```

För mig står det `On branch master`. Det är namnet på er branch och vad den heter efter `git init` beror på vilken version av Git ni har.

`git status` visar statusen för repot. I nuläget har vi inte gjort något, så den säger inget just nu.
