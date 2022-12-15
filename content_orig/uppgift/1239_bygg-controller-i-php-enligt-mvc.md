---
author: mos
category:
    - kurs mvc
revision:
    "2021-04-01": "(A, mos) Första utgåvan i mvc-v1."
...
Bygg Controller i PHP enligt MVC
===================================

Du skall jobba vidare på dina klasser från föregående uppgift och bygga ett Yatsy-spel i din webbklient.

Eftersom det kan vara lite klurigt att tänka fram hur ett Yatzy-spel skall fungera i din webbklient, speciellt kanske om du vill att din datorspelare skall kunna spela det, så använder vi oss av hjälpmedel för strukturerad problemlösning med pseuodokod och flödesschema.

Vi bygger ut vår kodbas, i vårt eget lilla ramverk, med externa moduler för request, response och router.

I samband med detta kommer du få uppdatera din kod så att den använder sig av konceptet C, Controllers, i designmönstret MVC.

Kanske behöver du göra _refactoring_ av din kod så den passar in, det beror lite av vilken kodstruktur du hade i förra uppgfiften. Att bli bra på att göra refactoring, att skriva om sin kod efter andra förutsättningar, är en bra träning att ha koll på heheten av sin kod.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har löst den föregående uppgiften "[Objektorientering med klasser i PHP](uppgift/objektorientering-med-klasser-i-php)".

Du kan en del allmänt om problemlösning och programmering och vet grunderna i hur du tar reda på svar. Glöm inte att formulera din fråga, svaret är då lättare att finna. [Fråga ankan](kurser/faq/lararstod-och-handledning#anka), det kan hjälpa.



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.



### Spara filerna i me {#me}

Du jobbar vidare i git-repot du har under `me/game/`.

Försäkra dig om att du har taggat din kod, innan du jobbar vidare i denna uppgfift. Det är alltid bra att ha en möjlighet att gå tillbaka till ett fungerande läge, att ha en stabil bas att utgå ifrån om något går fel.



### Git workflow {#workflow}

När du inleder arbetet med denna uppgift kan du välja att skapa din kod i en ny branch och låta din main/master-branch vara orörd. Att brancha när man inför nya features i sin kod kan vara ett bra sätt att jobba enligt.

Då kan man jobba ostörd i sin branch utan att påverka den koden som används i master/main branchen. När man sedan är klar kan man merga sin featurebranch med sin mainbranch och släppa en ny release med uppdaterad kod.



### Webbapplikation med router {#router}

Låt oss uppgradera vår kodbas och använda externa moduler för router, request och response.

Det finns ett fungerade kodeexempel under [`example/game/router/`](https://github.com/dbwebb-se/mvc/tree/main/example/game/router) som du kan testköra så här.

```text
# Stå i roten av kursrepot

# Börja kopiera kodbasen
rsync -av example/game/router/ me/router/

# Installera en autoloader via composer
cd me/router
composer install --no-dev
```

Nu kan du öppna din webbläsare till katalogen `me/router/htdocs` och du bör se en enklare webbsida.

Här följer översiktligt de steg som är skillnaden mellan din kodbas i förra uppgiften och i denna uppgiften. Nedan visar stegen för hur du kan uppgradera din egen kod i `me/game`.



#### Externa ramverksmoduler {#extmod}

Vi skall använda moduler som ger ett klassiskt ramverksflöde av en request, en response och en router. Vi börjar med att installera dem (och spara dem i vår `composer.json`).

```text
composer require nikic/fast-route nyholm/psr7 laminas/laminas-httphandlerrunner
```

Nu ligger modulerna på sin plats och är redo att börja användas.



### Uppdatera frontkontroller {#frontc}

Nu behöver du uppdatera din frontkontroller `htdocs/index.php` så att den använder sig av de nya modulerna.

```text
# Stå i rooten av kursreport

# Byt ut din htdocs/index.php
mv me/game/htdocs/index.php me/game/htdocs/index_v1.php
cp example/game/router/htdocs/index.php me/game/htdocs/index.php
```

Den uppdaterade koden är i inledningen och i slutet av filen. Jämför gärna med den ursprungliga versionen av koden. Fundera kort över hur man kan orgnisera denna typen av kod, vilka möjligheter har vi?



### Konfigurera routern {#router}

Routern har en konfigurationsfil som ligger i `config/router.php`. Där läggs alla routes till. Du bbehöver kopiera den.

```text
# Stå i rooten av kursreport

cp example/game/router/config/router.php me/game/config
```

När routern startas i `index.php` så läser den in sin konfiguration som ett av de första stegen.



### Lägg till controllers {#kontroller}

I denna uppdaterade kodbas används controllers för att generera sidorna. En controller är en klass som kan innehålla en eller flera actions, eller handlers. Du kan kopiera dessa.

```text
# Stå i rooten av kursreport

cp -r example/game/router/src/Controller me/game/src
```

Du kan titta i controller-klasserna och jämföra med koden från föregående kodbas.



### Svaret skickas {#send_resp}

Det uppdaterade flödet är nu enligt följande:

1. Request kommer till frontcontroller.
1. Routern initierar sig.
1. Data om metod och path hämtas från requesten.
1. Routern dispatchar requesten och ser om det finns en callback som matchar.
1. Frontcontrollern anropar callbacken (eller genererar en error kod).
1. Callbacken returnerar ett Response-objekt.
1. Frontcontrollern skickar svaret enligt Response-objektet.

Försök följa koden i din frontcontroller enligt ovan och studera koden för de olika stegen.



Krav {#krav}
-----------------------

Kraven är uppdelade i sektioner.



### Refactoring med controller och router {#refact}

1. Skapa controller-klasser för de routes du utvecklade i föregående uppggift.

1. Lägg till dessa controllers till den nya routerna.

1. När du är klar har du gjort refactoring på din kod från kmom01 och anpassat den till den nya strukturen i kmom02.



### Spel {#spel}

1. Skapa klasser för att skapa en webbsida där man kan spela Yatzy.

1. Implementera en (eller flera) controller för att spela spelet i ramverket.

1. Skapa ett flödesschema som representerar hur du tänker lösa (del av) spelet. Spara som `doc/yatzy/flowchart.{txt,md,pdf,png}` och gör till en del av ditt repo.

1. Skapa psudokod som visar hur du tänker lösa (del av) spelet. Spara som `doc/yatzy/psuedocode.{txt,md,pdf,png}` och gör till en del av ditt repo.

1. Man skall rulla sina tärningar, välja vilka man sparar, och slå om. Man har tre slag och fem tärningar. En vanlig Yatzy-omgång helt enkelt.

1. I första versionen av ditt spel räcker det om man kan spela själv, som en träningsrunda. Som överkurs kan man spela flera spelare och där datorn kan vara en av spelarna.

1. Det räcker om man kan spela den första delen av Yatzy med ettor till sexor, summa och bonus. Den andra delen som inleds med ett-par, två-par och så vidare är överkurs.

1. Det räcker om man är tvingad att spela spelet uppifrån och ned i ordning. Som överkurs kan du implementera att man själv kan välja var man vill spara sina poäng.

1. Se till att man når ditt spel via en länk "Yatzy" i navbaren för din webbsida.



### Publicera {#publicera}

1. När du är klar, kör `make test` för att köra alla testerna mot ditt repo. När man kör `make test` så bör det passera utan allvarliga felmeddelanden.

1. Dubbelkolla att webbplatsen fungerar på studentservern genom att göra en `dbwebb publishpure me` och testköra den.

1. Committa alla filer till ditt repo och lägg till en ny tagg (2.0.\*). Öka versionnumret om du lägger till ändringar (2.0.1, 2.0.2 och så vidare). Rättaren kommer normalt sett att använda din senaste tagg som är >= 2.0.0 och < 3.0.0.

1. Pusha upp repot till GitHub/GitLab, inklusive taggarna.



<!--
Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

-->



Tips från coachen {#tips}
-----------------------

Pröva gärna att använda ett Git workflow som inkluderar feature branches.

När det står:

> Spara som `doc/yatzy/flowchart.{md,pdf,png}`

Så innebär det att du kan välja mellan tre olika filformat, antingen markdown, pdf eller png.

Lycka till och hojta till i chatt och forum om du behöver hjälp!
