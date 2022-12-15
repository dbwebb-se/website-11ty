---
author: mos
category: webbprogrammering
revision:
  "2016-04-08": (B, mos) Uppdaterad.
  "2014-06-16": (A, mos) Första utgåvan i samband javascript1-kursen.
updated: "2016-04-07 22:49:52"
created: "2014-06-12 08:03:40"
...
Kom i gång och installera Firebug som utvecklarverktyg
==================================

Kom i gång med de första delarna av utvecklarverktyget Firebug för att underlätta din utveckling av webbsidor med HTML, CSS och JavaScript.

<!--more-->

En webbläsare har ofta ett rätt avancerat inbyggt verktyg för utvecklare. Firefox har ett från början men jag brukar välja att installera Firebug istället. Så vi kör på det. Du hittar motsvarande verktyg även i andra webbläsare.

Öppna din webbläsare Firefox och [installera utvecklingsverktyget Firebug](http://getfirebug.com/downloads), det är en addon till Firefox som hjälper dig att utveckla, undersöka och felsöka din webbsidas komponenter av HTML, CSS och JavaScript-kod.

Låt oss testa, öppna en ny flik i Firefox och gå till [detta exempelprogram](javascript1/repo/example/sandbox).

Klicka på F12 för att öppna upp Firebug. Du kan också högerklicka på webbsidan och via menyvalet "Inspect Element with Firebug" öppna upp Firebug. 

Se hur jag gör.

[YOUTUBE src=NGipSFMZkWA width=630 caption="Mikael kommer i gång med Firebug."]

En sak som kompletterar Firebug är att studera webbsidans oförvanskade källkod. Sidans källkod är den som webbläsaren har laddat ned från webbservern (eller öppnat lokalt från disk). Den är omodifierad och inte förändrad av eventuell JavaScript-kod eller tolkad av webbläsaren. Ibland kan det vara bra att titta även på den, att gå till källan, så att säja.

Den källkoden du ser i Firebug kan vara förvanskad av både JavaScript och av webbläsaren själv. Webbläsaren tolkar alltid webbsidans källkod och om källkoden inte ser ut som webbläsaren förväntar sig så modifieras källkoden för att webbläsaren ändå skall försöka visa upp resultatet i webbläsaren. Därför är det bra att kunna jämföra den oförvanskade källan med den som visas i Firebug.

I Firefox kommer du åt källkoden genom att högerklicka och via meny välja "View page source".

Se hur jag gör.

[YOUTUBE src=eCkW2umaGDI width=630 caption="Mikael tittar på webbsidans källkod via 'högerklicka - view source'."]

Bra, nu kan du grunderna. 

Här kan du se en annan tutorial som visar hur du kommer i gång med Firebug. Det är en serie om två korta videor.

[YOUTUBE src=tdIk2PztcL0 width=630 caption="Brandon Jones tutorial om att komma i gång med Firebug."]

Om du hellre vill köra på Google Chrome så har de motsvarigheten och du får en introduktion i videoserien "[Google Chrome Developer Tools: Getting started](https://www.youtube.com/playlist?list=PLB9EC47A6AAE4540F)".

Det är bra att kunna flera webbläsare och dess utvecklarverktyg, som webbprogrammerare kommer du att behöva de som finns på marknaden. Så, lika bra att bekanta sig med dem redan nu.

Kika på första video i serien och se vad du tycker.

[YOUTUBE src=7cqh7MGLgaM width=630 caption="Kom i gång med Chrome Developer Tools, första videon i en serie."]

Firebug och Chrome Developer Tools innehåller i grunden samma saker, kan du den ena så är det lätt att använda den andra.

Är du mer intresserad av vad du kan göra för avancerade saker med specifikt Chrome Developer Tools så kan du kika på gurun Paul Irish som presenterar avancerade nyheter på Google I/O 2013 under namnet Chrome DevTools Revolutions 2013. Det är inget för en nybörjare men kan vara intressant ändå.

[YOUTUBE src=x6qe_kVaBpg width=630 caption="Paul Irish om Chrome DevTools Revolutions 2013."]

Det kan vara lite kul att se hur de avancerade sakerna fungerar, så man vet vart man är på väg.
