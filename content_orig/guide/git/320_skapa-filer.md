---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
Skapa filer
==================================

Vi skapar några filer som vi ska lägga till i vårt repo.

```bash
[Aurora](~/git/example) $ touch github.txt README.md
[Aurora](~/git/example) $ ls -l
total 0
-rw-r--r--  1 nik  staff  0 11 Aug 17:42 README.md
-rw-r--r--  1 nik  staff  0 11 Aug 17:42 github.txt
```

Ett repo bör alltid ha en `README.md` som innehåller en beskrivning av repot. Nedan kan du se på ett par exempel över hur de kan se ut:

* [dbwebb-se](https://github.com/dbwebb-se/website)
* [Vue.js](https://github.com/vuejs/vue)
* [Atom](https://github.com/atom/atom)

Kör vi en ny `git status` så får vi följande output:

```bash
[Aurora](~/git/example) $ git status
On branch master

No commits yet

Untracked files:
  (use "git add <file>..." to include in what will be committed)
	README.md
	github.txt

nothing added to commit but untracked files present (use "git add" to track)
```

Vi har nu ett par **untracked files** som lyser rött, filer vi inte är en del av vårt repo än. I nästa del så lägger vi till filerna och "commit:ar" dom.
