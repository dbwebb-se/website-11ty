---
author: mos
category:
    - kurs/design
    - tema
    - less
revision:
    "2017-11-10": (I, mos) Lade till att hgrid och vgrid skall fungera.
    "2017-11-03": (H, mos) Bort med krav om make update.
    "2016-11-14": (G, mos) Förenklade kraven och gjorde endast två delar.
    "2016-11-04": (F, mos) Tillbaka och förtydliga krav om dubbla kolumner.
    "2016-11-04": (E, mos) Bort med krav om dubbla kolumner.
    "2016-11-01": (D, mos) Bort med krav om makefile för typografiskt grid.
    "2016-10-31": (C, mos) Förtydligade hur man jobber med typografi och det hotrisontella gridet, kopiering kontra modifiering.
    "2016-10-26": (B, mos) Omarbetad efter feedback.
    "2016-06-22": (A, mos) Första utgåvan.
...
Bygg ut ditt tema med stöd för vertikalt och horisontellt grid
===================================

Du skall fortsätta utveckla ditt tema till Anax Flat. Du skall implementera stöd för ett vertikalt grid och för ett horisontellt grid. Du skall bygga ut ditt tema så att det blir responsivt och samtidigt fylla det med ett medvetet val av typografi.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artiklarna "[Använd ett vertikalt grid med Anax Flat](kunskap/anvand-vertikalt-grid-med-anax-flat)" och "[Skapa ett horisontellt grid för typografi](kunskap/skapa-ett-horisontellt-grid-for-typografi)".



Introduktion {#intro}
-----------------------

Du har en version av Anax Flat som ligger i katalogen `me/anax-flat`. Det är ett eget repo på GitHub som är taggat i minst version 2.\*.

Du har en version av temat som ligger i katalogen `me/anax-flat/theme`. Det är ett eget repo på GitHub som är taggat i minst version 2.\*.

En filosofi som kan komma till nytta här är [POGE - Principle of good enough](https://en.wikipedia.org/wiki/Principle_of_good_enough). Att försöka matcha gridet <abbr title="En sak eller uppfattning har drivits bortom vad som är rimligt.">in absurdum</abbr> kan vara kostsamt, beroende på ens förmåga, tålamod och envishet.



### Testa hur väl dbwbeb följer gridet {#dbwebbgrid}

Du kan utvärdera hur väl dbwebb följer det vertikala och det horisontella gridet. Lägg till `?vgrid` eller `?hgrid` till godtycklig länk, så här:

* https://dbwebb.se/?vgrid
* https://dbwebb.se/?hgrid

Du kan ställa frågor om hur detta fungerar i forumtråd om "[Visa gridet på godtycklig sida](t/5974)". Du skall göra samma sak själv i uppgiften nedan.



Krav {#krav}
-----------------------



###Del 1 Vertikalt grid {#vertikalt}

1. Kopiera de grid-filer som finns i exemplet under `example/grid/fluid/less/grid*`. Lägg till dem så att de finns med i ditt tema. Lägg till båda i din `modules.less`, men kommentera bort den ena så att du bara har ett grid aktivt.

1. Skapa en fil `modules/layout.less` där du stylar din Anax Flat enligt ditt valda grid. Förslagsvis använder du mellan 960px till 1200px som största storlek och du använder 12 eller 24 kolumner, eller välj efter eget huvud. Detta är nu basen i ditt aktiva tema. Kommentera bort din tidigare `modules/regions.less` så den inte används från `modules.less`.

1. Skapa en `modules/grid-helpers.less` och lägg en mixin som visualiserar gridet. Mixinen skall heta `.showGrid()` och ta ett argument som är gridets maximala storlek. De bilder du behöver lägger du enklast i `htdocs/img/grid`.

1. Skapa en ny sida `content/grid.md`. Lägg in den sidan i menyn. När man tittar på den sidan skall gridet visas i bakgrunden. Se till att sidan är fylld med innehåll. Sidan skall innehålla minst en [sidebar](t/5890) (sidebar-left eller sidebar-right) med innehåll.

1. Gör ditt tema responsivt med media queries och förberett för mindre skärmar.

1. Lägg till så att `?vgrid` fungerar på godtycklig sida likt [https://dbwebb.se/?vgrid](https://dbwebb.se/?vgrid).

<!--
1. Skapa ett target för `upgrade-grid` i din Makefile som hämtar hem senaste versionen av grid-filerna från [kursrepot på GitHub](https://github.com/dbwebb-se/design/tree/master/example/grid/fluid/less).
-->



###Del 2 Horisontellt grid (testa) {#horisontellt}

1. Aktivera det typografiska grider genom att kopiera de relevanta LESS-filer som finns i exemplet under `example/typography-grid/less/typography-*`. Lägg till dem så att de finns med i ditt tema.

1. Aktivera typografin och förändra den som du vill (gör medvetna val). Förslagsvis kan förändra typsnitt och storlekar på texten, uppdatera ditt typografiska grid om det krävs.

1. Skapa en sida `content/typography.md`. Lägg in sidan i menyn. Fyll sidan med text och typografiska element som visar hur du stylat dem. Ungefär som textmassan som fanns i [exemplet](repo/design/example/typography-grid/typography.html). När man tittar på sidan skall gridet visas i bakgrunden. De typografiska elementen skall *någorlunda väl* matcha gridet.

1. Gör så att alla regioner på sidan (till exempel flash, main och footer-regionerna) matchar det magiska numret och lutar mot det typografiska gridet. Använd `@magicNumber` där det finns möjlighet och jobba främst med `margin-bottom`. Gör det *tillräckligt bra*.

1. Lägg till så att `?hgrid` fungerar på godtycklig sida likt [https://dbwebb.se/?hgrid](https://dbwebb.se/?hgrid).



###Klar och taggad {#tag}

1. Se till att ditt tema passerar testerna som körs vid `make test`.

1. Kör `git status` och se till att alla filer, som skall vara en del av dina båda repon `me/anax-flat` och `me/anax-flat/theme`, verkligen är en del av repot.

1. Du committar och taggar de båda repona som version 3.0.0.

1. Pusha upp repona till GitHub, inklusive taggarna.

1. Om du behöver göra fler taggar så gör du enligt 3.0.1, 3.0.2 och så vidare. Om du får komplettering så skall du alltid tagga en ny version när du är klar med kompletteringen samt pusha upp till GitHub.

1. Gör en `dbwebb publish` för att kolla att allt fungerar.

```bash
$ dbwebb publish me
```



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgifter om du har tid och lust.

1. Istället för att använda källkoden för det vertikala gridet från kursrepot så installerar du npm-modulen `desinax-vertical-grid` och använder källkoden därifrån istället. Då får du bättre versionskoll och du kan enklare integrera installation (och update) av modulen i din makefile.

1. Gör motsvarande för det typografiska gridet via npm-modulen `desinax-typographic-grid`.



Tips från coachen {#tips}
-----------------------

Ta det lugnt och försök förstå hur LESS-koden fungerar. Lägg också tid på att försöka finna en god struktur i hur du fördelar koden i dina LESS-moduler. Dela upp det som är grunden och återanvändbart kontra det som är specifik anpassning av grunden.

Kom ihåg att om du förändrar innehåll i temat så kan du även behöva committa och tagga om din version av Anax Flat, eftersom temats filer kopieras dit. Tipset är att tagga i slutet, när du känner dig klar.

Lycka till och hojta till i forumet om du behöver hjälp!
