---
author: mos
category: om-dbwebb-se
published: "2012-09-13 07:29:33"
updated: "2012-09-13 07:31:13"
created: "2012-09-13 07:29:33"
...
Sökmotoroptimering av dbwebb - att ha koll på läget
==================================

Att synas i sökmotorer har inte varit en prioriterad fråga för webbplatsen dbwebb.se. Tvärtom, eftersom en hel del av kursmaterialet har varit "hemligt", såsom me-sidor och visa källkod med `source.php` så vill man helst inte att det kommer med i sökmotorer. Dessutom, om man har sju me-sidor med nästan likadant material så hämmar det placeringen i sökmotorerna mer än vad det gynnar den, webbplatsen uppfattas som en spam-liknande webbplats. 

Men, nu när webbplatsen har blivit till en helhet så kan det vara av intresse att ha lite koll på hur sökmotorerna uppfattar dbwebb.se. Efterhand läggs kursmaterial ut, kursrelaterad information, artiklar i kunskapsbanken och från den publika delen i forumet. Det blir en hel del välskrivet (!) redaktionellt material tillsammans med svar på vanliga förekommande frågor. Det är ofrånkomligt att den typen av material kommer att stiga hos sökmotorerna. 

Så, låt oss därför starta ett litet akademiskt projekt och se hur en webbplats kan gå från noll och stiga i rankingen hos sökmotorerna. Under vägens gång så kan vi kanske se några av de delar som är viktiga att hantera för den som vill hamna i gunst hos sökleverantörerna.

<!--more-->


###Steg 1: Skaffa koll på hur du uppfattas

Bästa sättet att börja får bli att skaffa koll på hur webbplatsen uppfattas av sökmotorerna. Jag väljer verktyget [Google Webbansvarig](<a href='http://www.google.com/webmasters/'>http://www.google.com/webmasters/</a>) till detta. Gratis är gott, så länge det nu varar.

Mitt allra första steg blir att ge lite ledtrådar till sökmotorerna hur jag vill att de skall titta på webbplatsen. Det gör jag med två filer.

* [robots.txt](robots.txt)
* [sitemap.xml](sitemap.xml)  

Med dessa filer kan jag styra vilka delar jag vill skall synas och inte. Filerna är en rekommendation till sökmotorernas spindlar som letar igenom webbplatsen, de behöver inte följa dem om de inte vill. Det finns inga garantier.

Om vi tar en titt på hur webbplatsen uppfattas i dagsläget så ser det inte så bra ut...

[FIGURE src=/img/blog/google-webmaster-manga-fel-blir-det.jpg caption="Många fel blir det. Inte så bra."]  

Google har alltså närmare tusen sidor som den tror skall finnas här, men tji fick de. Det är ju inte så bra. Den stora anledningen till detta är att jag flyttat runt filer på webbplatsen nu under augusti och jag har inte brytt mig om att vara bakåtkompatibel med länkningarna. Ett betydande brott, men jag vill starta på ny kula med allt som finns på dbwebb så jag tar straffet. Troligen hamnar dbwebb långt ner i statistiken över trovärdiga webbplatser... Nåja, då vet vi att vi startar från noll.

Det viktigaste är att ha koll och nu vet jag hur webbplatsen uppfattas. Med hjälp av Google Webbansvarig kan jag nu gå igenom och hantera alla felen så att de tas bort ur sökmotorns index, eller så kan jag omdirigera trafiken med 301:or via apaches redirect.

Operation sökmotor startat, första steget att ha koll är klart. Som alla projekt inom sökmotoroptimering så bör man ha gott om kalendertid till förfogande, det har jag. Låt starta med att sikta på närmaste halvåret och se vad som händer fram tills dess. Det kan ta en hel del tid innan sökmotorerna uppdaterar sina index. 

Nu blir det uppstädning i indexet och borttagning av all de felaktiga länkarna.

* [Diskutera denna artikel i forumet](forum/viewtopic.php?f=23&t=522)
 
