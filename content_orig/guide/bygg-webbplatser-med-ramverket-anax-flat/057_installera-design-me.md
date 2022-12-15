---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Installera Anax Flat
==================================

Med verktyget `anax` kan du nu scaffolda fram en webbplats.

Först tittar vi vilka möjligheter som anax erbjuder.

```text
anax list
```

Du får fram en lista med möjliga val att scaffolda, det är två som är intressanta i vårt sammanhang.

```text
anax-flat-site                 Create a site using Anax Flat.
design-me                      Create a me-site for the design-course.
```

Vi kan kolla mer detaljer om de båda varianterna.

```text
anax list anax-flat-site
anax list design-me
```

Förbered dig att scaffolda fram de båda varianterna genom att gå till en katalog där du vill jobba och där din webbserver kommer åt filerna. Kör sedan följande kommandon.

```text
anax create a anax-flat-site
```

Du har nu en katalog som heter `a/`, öppna din webbläsare mot `a/htdocs` och du ser en installation av Anax Flat.

Gör sedan om det en gång till med följande kommando.

```text
anax create b design-me
```

Du har nu en katalog som heter `b/`, öppna din webbläsare mot `b/htdocs` och du ser en installation av me-sidan för design-kursen. Installationen baseras på Anax Flat med lite anpassningar.
