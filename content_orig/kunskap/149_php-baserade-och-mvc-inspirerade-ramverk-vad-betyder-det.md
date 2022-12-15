---
author: mos
category: webbprogrammering
updated: "2014-01-09 14:13:38"
created: "2013-10-24 15:17:26"
...
PHP-baserade och MVC-inspirerade ramverk, vad betyder det?
==================================

Kanske har du hört förkortningarna CMS, CMF, MVC, WAF, *frameworks*, eller bara helt enkelt 
*ramverk*. Förkortningarna handlar om varianter av ramverk för att bygga webbplatser och webbtjänster. I den delen av världen vi lever i så handlar det om PHP-baserade ramverk.

Det pratas mycket om PHP-baserade MVC-ramverk, eller MVC-inspirerade ramverk. Det är ramverk där arkitekturen Model, View, Controller (MVC) är en central del av ramverkets uppbyggnad. Men ett MVC-ramverk  innehåller också fler moduler/komponenter för att erbjuda ett "komplett" ramverk för webbplatser. Låt oss kika på innehållet i MVC-ramverk, vilka byggstenar kan vi förvänta oss i ett PHP-baserat och MVC-inspirerat ramverk?

<!--more--> 

Och hur fungerar det på en övergripande nivå?




Vad är MVC? {#mvc}
------------------------------



###Översikt {#over}

Model View Controller, **MVC** [^1], är ett sätt att dela upp sin kod, ett sätt att strukturera sin applikation. MVC blir samtidigt en terminologi som gör det enklare att tala om ett systems olika delar och det ger goda möjlighet att organisera ett kodnings-team kring applikationen, baserat på teamets kompetenser.

En enkel översikt av MVC kan se ut så här.

[FIGURE src=/image/phpmvc/mvc_start.png?sa=png caption="En översikt av byggstenarna i Model, View Controller."]

En förfrågan (från användare som klickar på en länk i webbläsaren), *request*, kommer in till kontrollern som använder modellen för att förbereda data till svaret. Datat skickas till vyn som skapar, *renderar*, svaret, *response*. I vår fall blir svaret normalt en webbsida.



###Ansvar per modell, vy och kontroller {#ansvar}

I MVC är det kontrollern som har ansvaret för att utföra uppgiften som användaren efterfrågar. I kontrollern finns det programmeringslogik för att utföra jobbet. Kontrollern tar hjälp av information som finns i modellerna. Modellerna hanterar information som lagras i databaser, filer eller ute i molnet. Kontrollerna använder sig av modellerna för att skaffa fram data för att besvara användarens uppgift. När resultatet skall presenteras för användaren, så skickar kontrollern informationen, datat, till en vy som är presentationslagret som visas upp för användaren.

MVC handlar alltså om en hantering av en användares fråga. Ansvaret för att svara på frågan delas upp i kontroller, modell och vy. På det viset är MVC en central byggsten i ett PHP-ramverk. Det specificerar ett sätt att hantera en förfrågan, en *request*, från användaren.



###MVC är ett design mönster {#design}

MVC är ett arkitekturellt designmönster [^2]. Det är ett designmönster för att utveckla applikationer utifrån ett användargränssnitt där användaren utför saker som hanteras av en kontroller som ta hjälp av modeller och vyer för att skapa svaret.

Designmönster är ett sätt att beskriva och lösa återkommande problem i programvaruutveckling. Ett problem som återkommer skall bara behöva lösas en gång, så är tanken, sedan kan man använda samma lösning igen. Designmönster ger alltså lösningar på ofta förekommande "programmeringsproblem". 



###MVC i olika varianter {#var}

MVC finns i många sammanhang och olika programspråk. Här förhåller vi oss till webbvärlden och PHP. Det som skiljer i olika implementationer av MVC kan till exempel vara hur kontroller, modeller och vyer kommunicerar med varandra. I webbvärlden har vi en webbläsare och http-protokollet som sätter vissa ramar för hur vi kan jobba. Tänk dig istället en traditionell desktop-applikation med ett grafiskt gränssnitt. Där finns det andra tekniska förutsättningar för att kommunicera mellan modulerna.

[FIGURE src=/image/phpmvc/mvc-process.png?sa=png caption="Kommunikationen mellan modulerna i MVC kan ske på olika sätt ([bild från Wikipedia](http://en.wikipedia.org/wiki/File:MVC-Process.svg))."]

I bilden visas flödet som att kontrollern tar emot förfrågan, kontrollern manipulerar modellen som i sin tur uppdaterar vyn så att användaren ser resultatet. Det är fortfarande MVC, men ett annat flöde mellan komponenterna.

Du bör ha det i åtanke, när du läser litteratur om MVC. Det finns inte ett definierat och sant sätt att applicera det på, det finns olika varianter. Dessutom kommer du att få höra ord som tjocka eller tunna kontroller och/eller modeller, vilket innebär olika strategier för var man placerar sin kod. Tjock och tunn innebär mycket respektive lite kod. 



Flödet i en MVC applikation {#flode}
------------------------------

Låt se hur MVC kan se ut när vi applicerar det på en webbplats.

Säg att vi har en gästbok och den är gjord enligt MVC. När användaren klickar för att visa alla inläggen kan en skiss över hanteringen se ut så här.

[FIGURE src=img/phpmvc/mvc-guestbook-flow.svg caption="Sekvensdiagram för användaren som sitter i en webbläsare och klickar för att se alla inläggen i gästboken."]

Användare klickar på länken *guestbook/view* och förfrågan landar i frontcontrollern *index.php*. Frontcontrollern mappar länken till en kontroller, i detta fallet kontrollern *CCGuestbook* och dess metod *View()*.

Kontrollern använder sig av modellen, *CMGuestbook*, för att hämta alla inläggen. Modellen använder sig i sin tur av databasen, för att hämta ut informationen som returneras tillbaka till kontrollern.

Nu kan kontrollern skicka vidare information till vyn, *guestbook.tpl.php*, som skapar den slutliga HTML-koden som visas i webbläsaren för användaren.

Frågan har fått sitt svar, på ett MVC-aktigt sätt.  

I detta exemplet kommunicerar kontrollern med modellen för att sammanställa all data som behövs för att visa gästboken. Sedan överlämnar kontrollern till vyn att rendera resultatet i form av webbsidan. Vill man vara lite petig så kanske det är vyn som levererar resultatet till användaren, eller kontrollern, eller kanske till och med frontkontrollern som skall ha pilen tillbaka till användaren? Tja, det beror på hur vi skriver vår kod och hur vi vill att flödet i applikationen skall vara, MVC är det i vilket fall som helst.



Modulärt tänkande förenklar arbetsfördelningen {#mod}
------------------------------

Med MVC får man en modulär arkitektur på sin webbapplikation. Ett modulärt tänkande underlättar när man lägger till, tar bort och byter ut enskilda moduler. Det gör också att det blir enkelt att fördela arbetet.

Med MVC kan man fördela arbetet per kompetens. 

| Vyer | Kontroller | Modeller |
|------|------------|----------|
| **frontend**, väldigt lite programmering eller scriptning, användargränssnitt, HTML, CSS, JavaScript, bygga formulär, template filer, få informationen av kontroller | **middleware**, programmering, integration, PHP, HTML, formulär validering, template filer, använda API:er | **backend**, avancerad programmering, PHP, SQL, databaser, skapa API:er, jobba mot andra API:er | 

Utvecklare med olika kompetens jobbar i olika delar av programvaran med klara gränssnitt mellan delarna. Så vill man ha det så fort projekten blir lite större.

MVC-ramverket stödjer en arbetsprocess där team delas in efter kompetenser och kan jobba på sin avgränsade del. Du får ordning och reda och ett vokabulär och arbetssätt som utvecklare känner igen.

Nu är det inte MVC-tänkandet som har patent på dessa fördelar. Du kan uppnå liknande fördelar med andra tekniker. Men MVC-strukturen är en av de tekniker som kan ge dig organisatoriska fördelar.



Ett PHP-ramverk är mer än MVC {#mer}
------------------------------

När du studerar flödet i sekvensdiagrammet i gästboks-exemplet ovan, så ser du att MVC står för delar av hanteringen av frågan, *guestbook/view*. Men frontkontrollern är inte en del av MVC-konceptet, inte heller databas-delen. Det som är själva MVC-biten representeras av strukturen på kontroller, modell och vy. Det handlar om att separera koden så att rätt sak görs på rätt plats. MVC ger oss ett flöde i koden som minskar komplexiteten i applikationen och gör det enklare att förklara, utveckla och underhålla koden.

MVC är alltså en central del av ett ramverk. Det säger hur saker och ting hänger ihop. Men för att det skall bli ett mer komplett ramverk så krävs mer hantering runt omkring.

Det behövs en frontkontroller som översätter frågan till en kontroller och metod. Frontcontrollern behöver hjälp för att tolka länken. Ofta ser vi klasser som tar hand om *Request* och *Response*. Request-klassen tolkar inkommande länk och Response-klassen hjälper till att formulera svaret.

Databasen och andra lagringsalternativ är inte en del av MVC, det är vanliga traditionella klasser som hjälper till i byggandet av ramverket. Ofta innehåller ramverket mer kod i dessa runtomkring-klasser än i kärnklasserna kring MVC-konceptet.

Här följer en lista på delar som är vanliga i PHP-baserade MVC-ramverk.

| Vad | Funktion | 
|-----|----------|
| index.php | Alla frågor skickas till index.php som startar upp ramverket. |
| bootstrap.php | En fil med funktioner som laddas in som de första nödvändiga funktionerna för att ramverket skall fungera. |
| Kernel | De flesta ramverk har en kärna, en kärnklass som samlar alla klasser kring sig, en spindel som gör att allt fungerar. |
| Frontcontroller | Översätter länken till en kontroller och metod som anropas. |
| Request | En klass som hanterar inkommande förfrågan. |
| Response | En klass som hjälper till att samla all information till själva svaret. |
| URL | En klass som hjälper till tolka och skapa länkar. |
| Routing | Mer möjligheter till flexibel routing från en länk till en kontroller. |
| Controller | Kontroller-klasser, en mall för hur kontroller skall se ut och fungera. Ofta finns basklass som kan utökas. |
| Model | Modell-klasser, mall för hur en model skall se ut och fungera. Ofta finns basklass som kan utökas. |
| View | En hantering av vyer och vy-filer. Flera ramverk använder PHP i vyerna, men det finns ramverk som använder templatespråk som lägger ett lager ovan PHP och används för att koda vyerna. |
| Database | Databasklass för att hantera databaskoden. | 
| Database ORM | Hantering för att mappa objekt till relationsdatabasen, Object relational mapping. |
| Database Active Record | Stöd för att förenkla CRUD-lagring i databasen. |
| Forms | Hjälpklasser för formulärhantering. |
| Validation | Stöd för validering i formulär eller inkommande parametrar. |
| Cache | Stöd för att cacha sidor och delar av sidor. |
| Session | Hantering av sessionen och sessionsdata inklusive flash-minne som lever mellan ett sidanrop. |
| Internationalization i18n | Stöd för språkanpassning. |
| Localization L10n | Stöd för att visa tid, datum, valutor och liknande enligt det lokala språkets formattering. |
| Scaffolding | Automatgenerera kod, ofta CRUD-relaterad kod till formulär, kontroller, modell, vyer och databas. |
| Authentication | Hantering av användare, inloggning, access-kontroll till resurser i webbplatsen. |
| ACL, RBAC| Acces control list och Role-based access control. Olika sätt att hantera behörighet till resurser i ramverket. |
| Theme | Temahantering för att enkelt byta utseende på hela webbplatsen. |


Som du ser, när vi prata om MVC-ramverk så är MVC en central bit, men ramverket är uppbyggt av så mycket mer funktioner som inte berörs av själva designmönstret MVC. Det är viktigt att ha koll på det, så att man separerar vad som är vad.



MVC jämfört med CMS och CMF {#jamfor}
------------------------------

När vi säger MVC-ramverk så menar vi alltså att ramverket bygger på designmönstret MVC. Annars, när vi pratar webbaserade ramverk för att bygga webbplatser, så nämns ofta termen CMS, Content Management Systems [^5].

De tre mest populära PHP-baserade CMS-verktygen är [WordPress](http://wordpress.org/), [Drupal](https://drupal.org/) och [Joomla](http://www.joomla.org/). De är alla tre kompletta verktyg för att bygga mer eller mindre avancerade webbplatser. De innehåller verktyg och gränssnitt för slutanvändaren så att det är enkelt att skapa innehåll på en webbplats. De innehåller också plugins och addons som enkelt går att integrera med grundsystemet. Dessa CMS har också en väl utbyggd temahantering som gör det enkelt att styla och anpassa webbplatsens utseende och stil. Ett CMS är ett komplett verktyg för att bygga webbplats och låta användare hantera webbplatsens innehåll via ett admingränssnitt.

Av dessa tre verktyg är det endast [Joomla som använder sig av MVC arktitekturen](http://docs.joomla.org/Model-View-Controller). Strukturen i WordPress är inte MVC [^4] och Drupal använder sig av en struktur [^3] som kallas [PAC, Presentation - Abstraction - Control](http://www.garfieldtech.com/blog/mvc-vs-pac). PAC-strukturen är ett designmönster som är närbesläktat med MVC.

Vill man åt mer renodlade MVC-ramverk så letar man bland namn som [FuelPHP](http://fuelphp.com/) (en spinoff från [CodeIgniter](http://ellislab.com/codeigniter)), [Phalcon](http://phalconphp.com/en/), [Laravel](http://laravel.com/), [Symphony](http://www.getsymphony.com/), [Yii](http://www.yiiframework.com/) eller kanske [CakePHP](http://cakephp.org/). Listan är lång över ramverk för den som bygger anpassade webbplatser och inte vill vara begränsade av ett CMS. Väljer man denna vägen måste man också ha tiden att skapa delar av koden från grunden. Det finns många moduler som kan läggas till dessa ramverk. Men ramverken som sådana ger verktyget för att bygga webbplatsen, de är sällan kompletta från start, de behöver anpassas och integreras. Dessa ramverk är för PHP-kodaren och för anpassade lösningar.

Ett blandning av CMS och ett ramverk där man bygger allt från grunden är ramverk som kategoriserar sig som CMF, Content Management Framework [^6]. Det är ramverk som inte innehåller kompletta gränssnitt för slutanvändaren (som ett CMS gör) och det är ramverk som innehållar grundfunktionalitet för att hantera användare, inloggning tillsammans innehåll på webbplatsen. Ett CMF är ett ramverk, med eller utan MVC, som innehåller den grundläggande funktionerna för att bygga en webbapplikation eller webbplats, men det innehåller inte nödvändigtvis ett färdigt gränssnitt till slutanvändaren. 

Det är inte alltid lätt med klassificeringen av webbaserade ramverk. Det finns olika varianter av webbaserade ramverk, eller [web application framworks](http://en.wikipedia.org/wiki/Web_application_framework). Vi har ju begränsat oss till PHP-baserade ramverk och kikar vi på en [översikt och jämförelse mellan ramverk](http://en.wikipedia.org/wiki/Comparison_of_web_application_frameworks) så ser vi att de innehåller en hel del olika delar. MVC-delen är endast en mindre arkitekturell lösning. Det är en central lösning, men kom ihåg att det endast är en mindre del av ramverket som löper under MVC-principen. Det finns fler moduler som behövs för att det skall bli ett "komplett" ramverk som hjälper oss att skapa en webbplats, eller webbtjänst.



Avslutningsvis {#avslutning}
------------------------------

Så, artikeln försöker ge dig en bild av vad MVC är och hur det förhåller sig till webbaserade ramverk. Nästa steg vore att försöka bygga den där gästboken som visas i sekvensdiagrammet. Det vore ett bra sätt att få lite mer grepp om vad MVC handlar om.

Ställ dina frågor och kommentarer i forumet.



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2014-01-09 (A, mos) Första utgåvan som en del av version 2 av kursen [phpmvc](phpmvc).  
</span>



Referenser {#referenser}
------------------------

Följande referenser har använts som fotnötter i texten.

[^1]: [Wikipedia om MVC pattern](http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller).

[^2]: [Wikipedia om designmönster](http://en.wikipedia.org/wiki/Software_design_pattern).

[^3]: [Drupal är inte MVC](http://stackoverflow.com/questions/4418552/does-drupal-comply-with-the-mvc-paradigm).

[^4]: [Wordpress är inte MVC](http://stackoverflow.com/questions/2857143/is-wordpress-mvc-compliant).

[^5]: [Wikipedia om Content management systems](http://en.wikipedia.org/wiki/Content_management_system).

[^6]: [Wikipedia om Content management frameworks](http://en.wikipedia.org/wiki/Content_Management_Framework).
