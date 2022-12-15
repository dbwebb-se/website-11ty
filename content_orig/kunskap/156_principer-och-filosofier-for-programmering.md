---
author: mos
category: webbprogrammering
updated: "2014-03-04 10:10:43"
created: "2014-03-04 09:36:32"
...
Principer och filosofier för programmering
==================================

Programmeringsfilosofier, eller programmeringsprinciper, är viktiga när man bygger större system och när man behöver värderingar, tips och trix, som hjälper en att ta beslut om hur man skall skriva sin kod. 

Man behöver helt enkelt lite råd, något att hålla sig i, något som ger vägledning i vad som är rätt eller fel. 

<!--more-->

Duktiga programmerare vet att navigera bland principerna för utveckling av kod. Duktiga programmerare har sin egen programmeringsfilosofi, sina egna utvalda principer.



Livslångt lärande {#langt}
------------------------------

Att studera programmeringsfilosofier är ett livslångt lärande. Innan man börjar behöver man ha koll på grunderna i programmering. Sedan handlar det om att läsa, praktisera och skaffa sig en egen bild av vad som fungerar och inte.

Att göra fel är ett jobbigt, men utmärkt sätt, att lära sig vad som funkar bra och mindre bra. Vad som fungerar beror ofta på sammanhanget, man behöver övning i att förstå hur sammanhanget bör påverka vägvalen.

Är du ny på detta sättet att tänka? Börja då med att läsa igenom artikeln "[Seven Principles of Software Development](http://c2.com/cgi/wiki?SevenPrinciplesOfSoftwareDevelopment)". Den visar vad det handlar om. Läs också om kommentarerna till en del av principerna, diskussionen visar hur man kan ha olika syn på saker. Mycket lärorikt.



Några snabba principer att ha koll på {#koll}
------------------------------

Låt oss prata om några av de mer vanligt förekommande principerna.

Bygger man många webbsidor vill man skriva så lite kod som möjligt, man använder sig av *code reuse* [^3]. Det handlar också om att strukturera koden, var del har sin plats, *separation of concerns* [^7]. Du vill heller inte upprepa din kod, *DRY, Don't repeat yourself* [^2], en sak skall bara finnas på en plats.

Krånglar du till det ibland? Kanske skall du följa principe *Keep it simple, stupid* [^4]? Kodar du mycket bra-att-ha features så bör du kolla in vad *YAGNI, You aren't gonna need it* [^6] innebär. 

Blir du aldrig klar med ditt projekt? Kika på vad *POGE, Principle of good enough* [^5] berättar för dig.

Överväger du en snabbfix eller en mer krävande lösning? Inför du *technical debt* [^8] i din kod-bas? Kanske är det okey, kanske inte. Det beror på läget och omständigheterna.

Bygger du mer avancerad objektorienterad kod, kanske ramverk? Då kikar du på *SOLID* [^10], det är en samling av fem viktiga principer som är ofta använda i ramverks-sammanhang.

Kika gärna på Wikipedias [översikt av programmeringsfilosofier](http://en.wikipedia.org/wiki/List_of_software_development_philosophies).



Avslutningsvis {#avslut}
------------------------------

Det finns många programmeringsfilosofier, principer, vägledning vid kodandet. Börja studera dem så får du stöd i ditt kodande och tankearbete. Du får en terminologi att föra diskussioner med likasinnade. 

Det är inte svart eller vitt, det är en stor grå massa och det finns sällan några rätt eller fel, det mesta "beror på" omständigheterna och vad som är viktigt vid varje tillfälle. Man gör en värdering av läget, man prioriterar.

Börja studera programmeringsfilosofier och anamma några som dina egna principer. 

Diskutera och föreslå principer i forumets tråd om [Programmeringsfilosofier](t/1938).



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2014-03-04 (A, mos) Behövde en artikel om programmeringsprinciper till kursen [phpmvc](phpmvc).  
</span>



Referenser {#referenser}
------------------------

Följande är referenser som använts som fotnötter i texten.

[^1]: [Seven Principles Of Software Development](http://c2.com/cgi/wiki?SevenPrinciplesOfSoftwareDevelopment).
[^2]: [DRY, Don't repeat yourself](http://en.wikipedia.org/wiki/Don%27t_repeat_yourself).
[^3]: [Code reuse](http://en.wikipedia.org/wiki/Code_reuse).
[^4]: [KISS, Keep it simple, stupid](http://en.wikipedia.org/wiki/KISS_principle).
[^5]: [POGE, Principle of good enough](http://en.wikipedia.org/wiki/Principle_of_good_enough).
[^6]: [YAGNI, You aren't gonna need it](http://en.wikipedia.org/wiki/You_aren%27t_gonna_need_it).
[^7]: [Separation of concerns](http://en.wikipedia.org/wiki/Separation_of_concerns).
[^8]: [Technical debt](http://martinfowler.com/bliki/TechnicalDebt.html).
[^9]: [List of software development philosophies](http://en.wikipedia.org/wiki/List_of_software_development_philosophies).
[^10]: [SOLID](http://en.wikipedia.org/wiki/SOLID_(object-oriented_design)).

