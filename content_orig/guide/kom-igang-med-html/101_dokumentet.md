---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Dokumentet {#dokumentet}
=======================
HTML-dokument skapas vanligast med ändelsen `.html`, men man kan även skriva HTML-kod i t.ex ett php-dokument som då slutar med `.php`. I den här guiden jobbar vi endast med HTML, så ett vanligt dokument räcker.

Börja alltså med att skapa en tom fil som heter `index.html`.

[INFO]
En anledning till att man oftast döper dokumentet till just `index` är för att de flesta servrar som man sedan lägger upp sin sida på kommer att alltid anta att just `index.html` eller `index.php` är startdokumenten. Därför behöver du inte ens ange själva filnamnet när du ska länka till det.

T.ex anta att du på din lokala server har en katalog som heter `me/` i `www`-katalogen (eller motsvarande som hänvisar till *localhost*) och du däri skapar dokumentet `index.html`. Då kommer just den sidan att laddas in om du anger detta:

```text
<a href='http://localhost/me/'>http://localhost/me/</a>
```

Notera alltså att man inte behöver ange `index.html` på länken - det sker automatiskt.
[/INFO]
