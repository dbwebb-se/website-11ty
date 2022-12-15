---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
Taggar
==================================

Att tagga sitt repo gör att enkelt att gå mellan olika versioner av ditt projekt. Dessa taggar kan man koppla emot "releases", men vi nöjer oss för tillfället med att bara tagga vårt projekt.

För att tagga så använder vi oss utav kommandot `git tag`. Vi lägger på två flaggor för att göra det vi vill, `-a` som specificerar versionen och `-m` som beskriver versionen.

```bash
[Aurora](~/git/example) $ git tag -a v1.0.0 -m "First version"
# Vi kan se så att allt gick bra genom att köra git tag utan flaggor
[Aurora](~/git/example) $ git tag
v1.0.0
```

Nu ska vi bara ladda upp taggen till GitHub genom att använda `git push` tillsammans med flaggan `--tags`:

```bash
[Aurora](~/git/example) $ git push --tags
Enumerating objects: 1, done.
Counting objects: 100% (1/1), done.
Writing objects: 100% (1/1), 177 bytes | 177.00 KiB/s, done.
Total 1 (delta 0), reused 0 (delta 0), pack-reused 0
To github.com:AuroraBTH/example-repo.git
 * [new tag]         v1.0.0 -> v1.0.0
```

Laddar vi om vår GitHub sida så kan vi se att det nu finns en tag för repot.

[FIGURE src=image/git-guide/git-tag.png]
