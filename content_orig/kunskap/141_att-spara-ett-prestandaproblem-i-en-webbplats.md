---
author: mos
category: php
revision:
  "2013-07-01": (A, mos) Första utgåvan
updated: "2013-07-01 14:30:39"
created: "2013-06-29 12:06:31"
...
Att spåra ett prestandaproblem i en webbplats
==================================

Ibland tar det lång tid att ladda en sida. Mer än nödvändigt. Men vad kan det bero på? Du kanske har hört någon säga "det är säkert databasen", men du som är en erfaren webbprogrammerare vet att skjuta från höften är inte tillräckligt bra. Du vill gå till botten med problemet och dessutom vill du åtgärda det. Du vill ha koll och undvika att göra samma fel igen. Det är en inställning hos en riktig webbprogrammerare, vi skjuter inte från höften. Vi löser problem.

<!--more-->

Så, på detta tema ska jag själv försöka analysera ett prestandaproblem jag har på denna webbplats. Häng på och se om jag lyckas leva upp till epitetet att vara en riktig webbprogrammerare som inte skjuter från höften och som löser problem.



Det upplevda problemet {#problemet}
-----------------------------------

På denna webbplatsen finns en bloggliknande sektion i dbwebb.se/kunskap som ger en lista över de senaste kunskapsartiklarna som uppdaterats. Över en längre tid har jag märkt att laddningstiderna har skiftat och droppen var häromdagen när jag öppnade första sidan till /kunskap och det tog 19 sekunder att öppna sidan. Något är *inte* som det ska och nu skall det rättas upp. 

**Laddningstid för /kunskap**

[FIGURE src=/image/snapshot/prestanda-19s.jpg&w=w1&q=70 caption="19 sekunder tog det att ladda sidan enligt Chromes utvecklingsverktyg."]

Jag har länge funderat på att införa cachning i Lydia, cachning av delar på en sida som gör att skapandet av sidan kan göras utan obehag för användaren. Programvaran för forumet, phpBB, använder sådan cachning, vilket är bra och delvis nödvändigt. Men i Lydia, som driver resten av webbplatsen, har jag ännu inte behövt implementera cachning. Kanske är det dags nu, men först måste jag ta reda på vad det är som tar 19 sekunder när det bara borde ta lite mindre än en sekund.



Bryt ned problemet i delar {#bryt}
-----------------------------------

Jag testar olika delar av /kunskap och märker snart att det enbart är vissa artiklar som tar lång tid att ladda. För att förenkla felsökningen så bryter jag ned problemet i delar och använder ett par sidor som har olika laddningstid.

| Test | Länk                                          | Tid   | Kommentar |
|------|-----------------------------------------------|------:|-----------|
| 1    | /kunskap/                                     | 19.0s | Första sidan med senast uppdaterade artiklar. |
| 2    | /kunskap/kategori/php                         |  8.9s | Listar alla artiklar i kategorin PHP vilket är en artikel. |
| 3    | /kunskap/kom-i-gang-med-php-pa-20-steg        |  5.0s | Visar den enda artikeln i kategori PHP. |
| 4    | /kunskap/kategori/labbmiljo                   |  0.7s | Listar alla artiklar i kategorin Labbmiljö vilket är fem artiklar. |
| 5    | /kunskap/bth-s-labmiljo-for-webbprogrammering |  0.5s | Visar en artikel i kategorin Labbmiljö. |


Så här ser mätningarna ut för respektive sida.

**1. /kunskap**

[FIGURE src=/image/snapshot/prestanda-19s.jpg&w=w1&q=70 caption="19 sekunder tog det att ladda sidan enligt Chromes utvecklingsverktyg."]

**2. /kunskap/kategori/php**

[FIGURE src=/image/snapshot/prestanda-kategori-php.jpg&w=w1&q=70 caption="Laddningstid för kategori PHP men endast en artikel i kategorin är 8.9s."]

**3. /kunskap/kom-i-gang-med-php-pa-20-steg**

[FIGURE src=/image/snapshot/prestanda-php-artikel.jpg&w=w1&q=70 caption="Laddningstid för den enda artikeln i kategorin PHP är 5.0s."]

**4. /kunskap/kategori/labbmiljo**

[FIGURE src=/image/snapshot/prestanda-kategori-labbmiljo.jpg&w=w1&q=70 caption="Laddningstid för kategori Labbmiljö med fem artiklar tar endast 0.7s."]

**5. /kunskap/bth-s-labmiljo-for-webbprogrammering**

[FIGURE src=/image/snapshot/prestanda-labbmiljoartikel.jpg&w=w1&q=70 caption="Laddningstid för en artikel i kategorin Labbmiljö är 0.5s."]



###Slutsats av testfallen {#bryt-slut}

Det tog mig lite tid att hitta "rätt" testfall och jag fick testa en hel del olika länkar för att se var problemet (problemen) låg. Men, om vi nu tittar i tabellen så ser vi att jag lyckats isolera två testfall (4, 5) som har fullt acceptabla laddningstider och två testfall (2, 3) som har riktigt usla laddningstider. Det är bra. Nu kan jag fokusera min felsökning på testfall 2 och 3. Eftersom testfall 4 och 5 är fullt acceptabla så är det något problem med just innehållet som laddas i testfall 2 och 3.

Innan jag dyker ned i koden så analyserar jag utfallet av laddningstiderna via Chromes utvecklingsverktyg. Jag ser direkt att jag kan utesluta problem med nätverket och laddningstider för andra resurser kopplade till sidan (bilder, stylesheets och javascript). Man kan se att det är en stor latency för testfall 2 och 3, själva laddningstiden av sidan över nätverket är försumlig. Det är latency-tiden som skiljer sig mellan testfallen, det är alltså den tiden som anropet spenderar på server-sidan innan den får svar.

En annan sak som jag noterar är att laddningstiden per testfall är konstant och skiftar inte för varje testfall. Det underlättar alltid när problemen återkommer på ett förutsägbart sätt.

Det känns som jag har hittat ett spår och nu är det dags att dyka ned i koden på serversidan och se var all tid tar vägen.



Analysera tidsåtgången i testfallen {#analys-testfall}
-----------------------------------

Vad jag behöver göra nu är att dyka ned i PHP-koden och se var allt tiden hamnar. Är det någon särskild klass eller metod som tar mycket tid? Till min hjälp har jag en loggningsklass [`CLog`](https://github.com/mosbth/lydia/blob/master/src/CLog/CLog.php) som jag använder för att sätta en tidsstämpel på olika ställen i koden. Med hjälp av dessa tidsstämplar kan jag sedan se var i koden som tiden spenderas. 

Jag slår på loggningen i Lydia och noterar utfallet för varje testfall.

**Testfall 1: /kunskap/**

| Domän       | Tid     | %    |
|-------------|--------:|-----:|
| CTextFilter |  17.888 | 99.7 |
| CLydia      |   0.041 |  0.2 |
| CDatabase   |   0.003 |    0 |


**Testfall 2: /kunskap/kategori/php**

| Domän       | Tid     | %    |
|-------------|--------:|-----:|
| CTextFilter |   8.387 | 99.6 |
| CLydia      |   0.035 |  0.4 |
| CMContent   |   0.001 |    0 |


**Testfall 3: /kunskap/kom-i-gang-med-php-pa-20-steg**

| Domän       | Tid     | %    |
|-------------|--------:|-----:|
| CTextFilter |   4.174 | 86.8 |
| CLydia      |   0.627 |   13 |
| CDatabase   |   0.002 |    0 |


**Testfall 4: /kunskap/kategori/labbmiljo**

| Domän       | Tid     | %    |
|-------------|--------:|-----:|
| CTextFilter |   0.427 | 91.6 |
| CLydia      |   0.033 |  7.1 |
| CMContent   |   0.001 |  0.2 |


**Testfall 5: /kunskap/bth-s-labmiljo-for-webbprogrammering**

| Domän       | Tid     | %    |
|-------------|--------:|-----:|
| CTextFilter |   0.051 | 52.7 |
| CLydia      |   0.041 | 42.3 |
| CDatabase   |   0.003 |  3.1 |


###Kommentar {#kommentar-testfall}

Tja, kommentarer är överflödiga. Det är helt klart att mitt största problem ligger i klassen [`CTextFilter`](https://github.com/mosbth/lydia/blob/master/src/CTextFilter/CTextFilter.php). Det är den klass som bearbetar artikelns innehåll och formaterar mitt markdown-dokument till HTML enligt ett antal formateringsregler. Då är det bara att fokusera felsökningen på klassen och se vilken eller vilka metoder som tar upp tiden.



Analysera klassen `CTextFilter` {#analys-klass}
-----------------------------------

Jag kör samma testfall igen och sätter tidsstämplarna i de olika metoder som finns i `CTextFilter`. För varje testfall noterar jag vilka metoder som tar upp störst del av tiden.

Så här blev utfallet.

**Testfall 1: /kunskap/**

| Domän                             | Tid     | %    |
|-----------------------------------|--------:|-----:|
| CTextFilter::SyntaxHighlightGeSHi |  15.247 | 85.7 |
| CTextFilter::Typographer          |   1.315 |  7.4 |
| CTextFilter::MarkdownExtra        |   1.183 |  6.7 |
| CLydia::Init                      |   0.027 |  0.2 |


**Testfall 2: /kunskap/kategori/php**

| Domän                             | Tid     | %    |
|-----------------------------------|--------:|-----:|
| CTextFilter::SyntaxHighlightGeSHi |   7.220 | 86.2 |
| CTextFilter::Typographer          |   0.589 |  7.0 |
| CTextFilter::MarkdownExtra        |   0.532 |  6.3 |
| CLydia::Init                      |   0.028 |  0.3 |


**Testfall 3: /kunskap/kom-i-gang-med-php-pa-20-steg**

| Domän                             | Tid     | %    |
|-----------------------------------|--------:|-----:|
| CTextFilter::SyntaxHighlightGeSHi |   3.683 | 77.2 |
| CTextFilter::ThemeEngineRender    |   0.577 | 12.1 |
| CTextFilter::MarkdownExtra        |   0.241 |  5.0 |
| CTextFilter::Typographer          |   0.236 |  4.9 |
| CLydia::Init                      |   0.028 |  0.6 |


**Testfall 4: /kunskap/kategori/labbmiljo**

| Domän                             | Tid     | %    |
|-----------------------------------|--------:|-----:|
| CTextFilter::Typographer          |   0.163 | 35.6 |
| CTextFilter::SyntaxHighlightGeSHi |   0.144 | 31.4 |
| CTextFilter::MarkdownExtra        |   0.115 | 25.1 |
| CLydia::Init                      |   0.027 |  5.9 |


**Testfall 5: /kunskap/bth-s-labmiljo-for-webbprogrammering**

| Domän                             | Tid     | %    |
|-----------------------------------|--------:|-----:|
| CLydia::Init                      |   0.036 | 35.1 |
| CTextFilter::Typographer          |   0.022 | 21.5 |
| CTextFilter::MarkdownExtra        |   0.019 | 18.5 |
| CTextFilter::SyntaxHighlightGeSHi |   0.010 |  9.8 |
| CLydia::ThemeEngineRender         |   0.008 |  7.8 |


###Kommentar {#kommentar-testfall}

Det är nu uppenbart att mina problem ligger i textformateringen. Det är framförallt metoden `CTextFilter::SyntaxHighlightGeSHi()` som tar tid. Men även om jag löser det problemet så har jag fortfarande problem med metoderna `CTextFilter::Typographer()` och `CTextFilter::MarkdownExtra`. Det verkar inte finnas en snabb fix på problemet. 

Formateringen görs alltid på hela artikeln. Det innebär att även när det är en sida som bara visar inledande text till artikeln så måste hela artikeln formateras. Det ger mig problem när jag listar många artiklar. Tidsåtgången ackumuleras och det som inte syns på en liten sidladdning blir till ett stort problem när jag listar en översikt av artiklarna. Problemet blir också uppenbart när jag har en större artikel som visar mycket källkod (använder `SyntaxHighlightGeSHi()`).

Det här kräver lite eftertanke.



Lösningen att cacha formateringen av sidan {#losning}
----------------------------------

Efter en hel del eftertanke så kom jag fram till att lösningen blev att cacha den färdigformaterade sidan. Jag cachar inte hela webbsidan utan bara det formaterade innehållet. Det fanns inget jag kunde göra för att snabba upp formateringen som utfördes av olika externa programvaror. Där är jag bunden till den prestandan som är av respektive formaterings-libb. Men jag behöver ju inte formatera sidan varje gång den visas. Lösningen blev en enkel filbaserad cache som serialiserar och lagrar på fil det objekt som innehåller den formaterade sidan. Koden finns i [`CCache`](https://github.com/mosbth/lydia/blob/master/src/CCache/CCache.php) och en sådan klass är alltid bra att ha för en webbprogrammerare, cachning av sidans delar vid behov.

För att avsluta så kör jag alla testfallen igen och noterar sidans totala laddningstid med Chromes utvecklingsverktyg. Nu är jag glad igen.

| Test | Länk                                          | Tid   | 
|------|-----------------------------------------------|------:|
| 1    | /kunskap/                                     |  0.7s |
| 2    | /kunskap/kategori/php                         |  0.7s |
| 3    | /kunskap/kom-i-gang-med-php-pa-20-steg        |  1.2s |
| 4    | /kunskap/kategori/labbmiljo                   |  0.6s |
| 5    | /kunskap/bth-s-labmiljo-for-webbprogrammering |  0.7s |


Det blev en rejäl förbättring i upplevd prestanda. Nu har jag en fungerande webbplats igen. Som laddningstiden är nu så är den klart godkänd. Som användare ser man inget problem och allt laddas som det ska. Ibland tar laddningstiden uppemot 1.5 sekunder för någon sida men då beror det på att sidans resurser (bilder, stylesheet, javascript) tar längre tid att laddas. Så, för tillfället får jag vara nöjd. 

Om jag återupprepar samma process så kan jag säkert hitta fler platser där cachning kan snabba upp sidans laddning. Men det får bli en annan dag. Dessutom är det onödigt att optimera något som inte behöver optimeras. 

Vill du diskutera denna artikel så kan du göra det i forumet, jag skapade en [egen tråd för denna artikeln](t/1354).





