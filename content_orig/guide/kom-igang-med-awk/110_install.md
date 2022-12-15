---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...
Installera awk (gawk)
=======================

awk kommer installerat i nästan alla distributioner av Linux/Unix. För att se vilken version du använder kör du kommandot:

```
$ awk --version
GNU Awk 5.0.1, API: 2.0 (GNU MPFR 4.0.2, GNU MP 6.2.0)
Copyright (C) 1989, 1991-2019 Free Software Foundation.
...
```

Om det inte skulle stå `GNU Awk` så behöver du uppdatera versionen:

```
$ sudo apt install -y gawk
```

Du bör sedan ha rätt version. Testa med kommandot ovan och dubbelkolla så det stämmer innan du går vidare.

Bra! Verktyget på plats, då kör vi igång.
