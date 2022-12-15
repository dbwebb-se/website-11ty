---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
git add
==================================

I föregående del skapade vi två filer, en `README.md` och en `github.txt`. Nu ska vi lägga till filerna så de spåras av Git med hjälp utav kommandot `git add`.

Det finns flera sätt att lägga till filer, t.ex `git add .` för att lägga till samtliga filer i mappen du står i, `git add <file>` för att lägga till en fil eller `git add <folder>` för att lägga till en mapp och dess underliggande filer/mappar.

## Lägg till filer {#add}

Vi lägger till båda våra tomma filer med hjälp utav följande kommando:

```bash
[Aurora](~/git/example) $ git add .
[Aurora](~/git/example) $ git status
On branch master

No commits yet

Changes to be committed:
  (use "git rm --cached <file>..." to unstage)
	new file:   README.md
	new file:   github.txt
```

Nu lyser de grönt istället och är redo för att commit:as.

## Mer info {#mer}

Om man vill veta mer om `git add` så kan man köra `git add --help` för att öppna manualen för kommandot.
