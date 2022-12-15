---
author: mos
category: php
updated: "2013-07-03 09:04:54"
created: "2013-07-03 08:55:59"
...
Att komprimera webbsidan med gzip eller ej, det är frågan
==================================

Borde jag gzippa min HTML-sida eller ej, det är frågan. Det pratas en hel del om att man skall vårda resurserna och inte använda mer bandbredd än man behöver, att skicka mindre data över nätet. Tanken är i grund och botten att användarens upplevelse skall vara god, skickar man mindre data går det snabbare och användaren blir glad. Att komprimera mina webbsidor gör att mindre data skickas och tar mindre plats på nätet. Det är säkert bra för en mobil användare som har begränsningar i datatrafik och hastighet. Men gzip måste komprimeras och komprimeras upp, det kräver processorkraft. Fördelar och nackdelar, vilket är bäst? 

Låt oss testa.

<!--more-->


Testa både en stor och en liten sida {#testfall}
---------------------------------------

För att få lite bakgrund till problemställningen så går det bra att läsa in sig på Googles sida för att [snabba upp webben](https://developers.google.com/speed/pagespeed/insights).

Jag väljer ut en stor och en liten sida att testa på. Jag vill se hur komprimeringen påverkar både stora och små sidor.

1. [Stor sida](http://dbwebb.se/v2/kunskap/kom-i-gang-med-php-pa-20-steg), innehåll 165 KB
2. [Liten sida](http://dbwebb.se/v2/kunskap/bth-s-labmiljo-for-webbprogrammering), innehåll 23.2 KB

Sidans storlek (innehåll) är antal KB i den färdiggenererade sidan [^1]. Jag använder Google Chrome och deras utvecklarverktyg för att mäta sidans storlek och laddningstid och jag använder en egen loggningsfunktion för att mäta processingtiden på serversidan i min PHP-kod.



Testa okomprimerad, buffrad och gzippad {#tester}
---------------------------------------

Jag gör ett test där jag laddar sidan och mäter sidans laddningstid, den primära resursens laddningstid och latency-tid (via Chrome utvecklarverktyg) samt hur lång tid som spenderas på serversidan i fasen (ThemeEngineRender) där sidans innehåll genereras.

Jag gör testet för en okomprimerad och obuffrad sida, fem gånger. Sedan upprepar jag samma procedur men slår på buffring [^2] och komprimering med gzip och slutligen upprepar jag testet igen med enbart buffring påslagen.

För att buffra sidan använder jag PHP funktionen [`ob_start()`](http://php.net/function.ob-start.php) och för att gzippa använder jag output buffering med en gzip-handler, [`ob_start("ob_gzhandler")`](http://php.net/function.ob-gzhandler.php).


Så här kunde det se ut när datan samlades in.

[FIGURE src=http://dbwebb.se/img/snapshot/gzip-snabba-upp-sidladdning.png caption="Mätpunkter för varje test"]

All data samlades i ett Google Doc [så du kan se utfallet](http://goo.gl/CHL7b).

Hur analyserar jag då utfallet?



Utfall stor sida {#storsida}
---------------------------------------

Sidan storlek är 165KB och 33KB komprimerad, det är en minskning med 80%.

Den totala laddningstiden är i stort sett konstant, oavsett komprimering och output buffering. Det som jag vinner på minskad storlek försvinner nästan i mängden av övrig data som laddas i sidan. Så visst kan man fundera på vinsten. Den genomsnittliga laddningstiden sjunker från 1.35s till 1.27s (komprimerad), och 1.24s (endast buffrad). Det är inte så stor skillnad så att jag bryr mig.

Men, kikar vi i detalj på huvudresursen så framgår skillnaden mer markant. Laddningstiden för den primära sidan är i utgångsläget 0.73s och minskar till 0.34s (komprimerad) och 0.67s (buffrad). Laddningstiden för primärresursen går alltså att minska till cirka hälften när komprimering görs.

> *Laddningstiden för primärresursen går att minska till cirka hälften när komprimering görs.*

Studerar man utfallet på serversidan där PHP-koden jobbar så får man en stor skillnad i beteende. I utgångsläget tar fasen för att rendera utskriften (ThemeEngineRender) i snitt 0.54s vilket är 93% av processingtiden. När output bufferings slås på så minskas denna tiden till 0.007s och blir till 15% av tiden på serversidan. Samma utfall gäller oavsett om komprimering används eller ej.

Märk väl att jag inte mäter hur lång tid det tar att flusha den buffrade sidan, eller komprimera den. Detta borde jag mäta, framförallt tiden det tar att flusha den buffrade sidan. Men just nu vill jag bara se hur outputbuffering och gzip påverkar användarens upplevelse så jag nöjer mig med de mätpunkter jag har.



Utfall liten sida {#litensida}
---------------------------------------

Sidans storlek är 23.2KB och 6.3KB komprimerad, det är en minskning med 71%.

Den totala laddningstiden för sidan är i stort sett samma, oavsett komprimering och output buffering, det rör sig om 0.83 -- 0.87s.

Det går inte heller att se några skillnader i laddningstid för den primära resursen eller hur lång tid som serversidan tar på sig. Det är samma tider oavsett output buffering eller komprimering.



Slutsatser {#slutsats}
---------------------------------------

Så, vilka slutsatser gör jag? 

För min webbplats, som är lågt belastad och serverresurser som minne och processorkraft är inget problem, så säger jag följande.

> *"Output buffering och komprimering med gzip är att föredra. Skillnaden i storlek och laddningstid på en liten sida är ej mätbar men på en större sida så minskar sidans storleken med 70 -- 80% och laddningstiden av den primära resursen minskar med hälften. Vinsten av komprimering överstiger kostnaden och är därför att föredra, även om slutanvändarens upplevelse i stort sett är opåverkad."*

Jag väljer att använda mindre av nätets resurser och slår på komprimering för mina sidor. Det känns bättre att skicka mindre data över nätet, även om det innebär att processingen ökar både på serversidan och på klienten när komprimeringen skall hanteras. 

Dessutom får jag bättre poäng i Googles PageSpeed analyserare och den påpekar inte för mig att jag borde gzippa min webbsida. Google verkar föredra komprimering [^3] så jag får köpa läget.

Så här ser min kod ut numer, precis innan allt skrivs ut så slår jag på output buffering och komprimering. Det sker i slutet av metoden [`CLydia::ThemeEngineRender()`](https://github.com/mosbth/lydia/blob/master/src/CLydia/CLydia.php).

```php
    // Buffer and compress output if set
    if($this->config['themerender_gzip']) {
      ob_start("ob_gzhandler");
    } else if($this->config['themerender_buffer']) {
      ob_start();
    }
```

Håller du med om mina slutsatser? Titta själv i resultatet och se om du gör samma slutsats. Fråga, kommentera och föreslå förbättringar i [forumtråden för denna artikel](t/1356).



Referenser {#refernser}
------------------------------------

[^1]: [StackOverflow: Chrome Dev Tools - “Size” vs “Content”](http://stackoverflow.com/questions/8072921/chrome-dev-tools-size-vs-content)

[^2]: [StackOverflow: What is Output Buffering?”](http://stackoverflow.com/questions/2832010/what-is-output-buffering)

[^3]: [Google Developers: Make the web faster, Minimize payload size, Enable commpression?”](https://developers.google.com/speed/docs/best-practices/payload#GzipCompression)



