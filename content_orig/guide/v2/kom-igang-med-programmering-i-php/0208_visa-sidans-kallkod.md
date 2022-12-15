---
author: mos
revision:
    "2020-08-13": "(C, mos) Uppdelad i flera filer i v2."
    "2018-06-19": "(B, mos) Genomgången och uppdaterad."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Visa sidans källkod
=======================

Det underlättar om vi förstår flödet i hur en webbsida skapas och kan skilja på följande saker:

* Filens källkod på servern (källkod server)
* Visa källkoden som webbläsaren får (källkod webbläsare)
* Visa webbsidan efter att webbläsaren har tolkat källkoden (tolkad webbsida)

Låt oss se skillnaden på dessa.


---



Visa sidans källkod {#view-source}
-----------------------

Du har nu din fil `hello.html` som ligger på en plats där din webbserver når den.

När du refererar den filen, via en länk i din webbläsare, till exempel `http://localhost/hello.html`, så hämtas hela filen och läses in i webbläsaren som tolkar html-strukturen och bygger upp en sida som visas i webbläsaren.

Du kan se webbläsarens version av källkoden genom att föra muspekaren till webbläsaren och högerklicka och välja "View Page Source" (visa källkod). Då får du fram den källkod som webbläsaren har hämtat från webbservern.

[FIGURE src=image/snapht18/webpage-source.png?w=w3 caption="Källkoden till webbsidan, så som webbläsaren känner igen den."]

Det är detta som är källkoden ur webbläsarens perspektiv. När vi nu börjar jobba med php så måste vi skilja på hur källkoden ser ut på serversidan och hur den ser ut i webbläsaren. Det är två skilda saker och vid felsökning så har man nytta av båda varianterna.
