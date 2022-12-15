---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
git hist & git tree
==================================

Git som versionshanteringssystem kommer ihåg den historik som du committat till repo. Den minns varje commit och vid behov kan man se exakt den kodversionen som gällde för en viss commit.

För att göra det enkelt att se sin egen commithistorik så lägger vi till två alias som visar en lista över alla commits, commit-meddelandet och tidpunkten.

Kör följande två kommandon i din terminal.

```bash
git config --global alias.hist 'log --all --decorate --pretty=format:"%h %ad | %s%d [%an]" --graph --date=short'
git config --global alias.tree "log --graph --abbrev-commit --decorate --date=relative --format=format:'%C(bold blue)%h%C(reset) - %C(bold green)(%ar)%C(reset) %C(white)%s%C(reset) %C(dim white)- %an%C(reset)%C(auto)%d%C(reset)' --all"
```

```bash
[Aurora](~/git/example) $ git hist
* 37ae502 2021-08-12 | Added link to repo (HEAD -> main, origin/main) [Niklas Aurora Andersson]
* 7a6420f 2021-08-12 | Updated description [Niklas Aurora Andersson]
* 745dddb 2021-08-12 | Initial release [Niklas Aurora Andersson]
[Aurora](~/git/example) $ git tree
* 37ae502 - (16 minutes ago) Added link to repo - Niklas Aurora Andersson (HEAD -> main, origin/main)
* 7a6420f - (16 minutes ago) Updated description - Niklas Aurora Andersson
* 745dddb - (76 minutes ago) Initial release - Niklas Aurora Andersson
```
