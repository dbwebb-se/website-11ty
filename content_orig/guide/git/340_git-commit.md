---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
git commit
==================================

Nu ska vi commit:a våra filer med hjälp utav `git commit`. När man commit:ar sina filer så ska man ge en beskrivning på vad man har gjort för ändring på filerna, t.ex "Fixed bug #1103". Utöver detta så säger man att man är nöjd med filerna. Det finns två sätt att lägga till beskrivningen, inline med hjälp utav `git commit -m <message>` eller via en editor, `git commit`.

[INFO]
Om ni kör `git commit` utan `-m` så öppnas VIM/VI, som är en terminalbaserad editor. De är inte särskilt nybörjarvänliga och om ni vill gå ur editorn utan att stänga terminalen kan ni kolla på [följande StackOverflow](https://stackoverflow.com/a/11828573) som beskriver flera olika sätt att stänga editorn.
[/INFO]

Jag lägger min commit med meddelandet "Initial release" nedan:

```bash
[Aurora](~/git/example) $ git commit -m "Initial release"
[master (root-commit) 745dddb] Initial release
 2 files changed, 0 insertions(+), 0 deletions(-)
 create mode 100644 README.md
 create mode 100644 github.txt
```

Gott, då ska vi koppla vårt lokala repo mot ett repo vi ska skapa på GitHub.
