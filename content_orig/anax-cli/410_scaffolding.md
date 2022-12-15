Format vid scaffolding
==================================

När du använder `anax create` och scaffolding gäller att en mall kopieras från en extern eller lokal källa och därefter exekveras ett skript.



###Extern mall {#extern}

Den template som du använder hämtas externt från repot [`canax/scaffold`](https://github.com/canax/scaffold). Samtliga templates ligger paketerade i repots katalog [`scaffold/<template>`](https://github.com/canax/scaffold/tree/master/scaffold).

| Vad                      | Beskrivning |
|--------------------------|-------------|
| `<template>`             | Källkoden till templaten. |
| `<template>.tar.gz`      | Det arkiv som laddas ned till din dator och innehåller källkoden i tar-format och komprimerad. |
| `<template>.tar.gz.sha1` | Checksumma enligt SHA1 på tar-filen, kontrolleras vid nedladdningen så att själva nedladdningen inte har gjort filen korrupt. |



###Lokal mall {#lokal}

Innan den hämtar mallen från den externa källan så kontrolleras om du inte har en mall lokalt i din konfigkatalog `$HOME/.anax/scaffold/template`. Du kan alltså lägga din egna template lokalt. Du kan också skapa egna templates som du använder lokalt.

De lokala templates behöver bara käll-katalogen, det behövs inga arkiv eller checksummor.



###Postprocess {#post}

När mallen är hämtad så kan ett skript exekveras som utför vissa postprocessingåtgärder. Du kan se ett exempel på det i filen [`ramverk1-me/.scaffold/ramverk1-me`](https://github.com/canax/scaffold/blob/master/scaffold/ramverk1-me/.scaffold/ramverk1-me).

Postprocessingfilen skall ligga i din mall-katalog under katalogen `.scaffold` och döpas till `<template>` och den måste kunna exekveras, det vill säga ha rättigheter 755 eller motsvarande.
