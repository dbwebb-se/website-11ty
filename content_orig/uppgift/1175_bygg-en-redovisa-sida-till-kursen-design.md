---
author: mos
category:
    - kursen design
    - anax-flat
revision:
    "2018-11-07": "(C, mos) Tog bort dublett av kravet byline."
    "2018-11-05": "(B, mos) Förtydliga var du står när du skapar git-repot."
    "2018-10-29": "(A, mos) Första utgåvan för design v2, omarbetad version av artikeln 'Bygg en me-sida med Anax Flat'."
...
Bygg en redovisa-sida till kursen design
===================================

Du skall sätta samman en redovisa-sida, en me-sida, till kursen design. För att göra det skall du använda en förberedd kopia av ramverket Anax (Anax Flat) med innehåll som är anpassat till kursen design.

De behöver installera din redovisa-sida, fylla den med innehåll och sedan lägga till style med CSS.

Du skall skapa ett Git-repo av din redovisa-sida och ladda upp den på GitHub.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har en labbmiljö som motsvarar [labbmiljön för kursen design](kurser/design-v2/kmom01#labbmiljo).



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.

Du kan se hur jag jobbar igenom stegen i videoserien "[En redovisa-sida i kursen design](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-y0_ymHyufjEL42IBQjP3m)".

[YOUTUBE src="B-x_2D8yReI" list="PLKtP9l5q3ce-y0_ymHyufjEL42IBQjP3m" width=700 caption="Videoserie som ger dig en introduktion till de olika delarna i att lösa uppgiften."]



### Kopiera från example/redovisa {#kopiera}

Det finns en förberedd installation som är specifik för kursen design och dess redovisningssida. Kopiera den och installera det som behövs med composer.

```text
# Stå i rooten av kursrepot
rsync -av example/redovisa me
cd me/redovisa
composer install
```

När du är klar så kan du se vilka moduler som installerades av composer. Det är ren kuriosa och det är en lista av de PHP-moduler som används för att hantera din webbplats.

```text
composer show
```

Se till att alla underkataloger i cache-katalogen är skrivbara.

```text
chmod 777 cache/*
```

Nu kan du öppna en webbläsare och peka mot katalogen `redovisa/htdocs`. Får du problem eller felmeddelanden så går du vidare till nästa stycke och ser om det fungerar bättre.



### Publicera studentservern {#publicera}

Du kan nu publicera till studentservern.

Innan du gör det så behöver du ändra sökvägarna i `htdocs/.htaccess`, annars får du 404 på länkar och 500 på bilderna. Läs kommentaren överst i filen och gör som det står där.

Publicera till studentservern för att se att allt fungerar.

Första gången kan du publicera hela me-katalogen.

```text
dbwebb publishpure me
```

Sedan räcker det att enbart publicera redovisa-katalogen.

```text
dbwebb publishpure redovisa
```

I denna kursen är det enklast att publicera med `publishpure` eftersom vi inte bryr oss om valideringen eller minifieringen.



### Make {#make}

Dubbelkolla att du har Make installerat och att det fungerar.

Börja med att få en översikt över de kommandon du kan köra med make.

```text
make
```

Kommandot `make` jobbar utefter det regelverket som finns i filen `Makefile`. Där ligger ett antal bra-att-ha saker som ofta återkommer i ett utvecklingsprojekt. 

Du kommer i senare kmom att använda kommandot make för att bygga dina stylesheets utifrån en CSS preprocessor.



### Git {#git}

Gör ett git-repo av alla filer i katalogen.

```text
# Stå i me/redovisa
git init
git add .
```

Nu har du ett repo, ett _repository_ eller _source code repository_ och du har lagt till alla filerna i katalogen så att de är en del av repot.

Informationen om själva repot lagras i den dolda katalogen `.git`. Om du behöver starta om så kan du ta bort den katalogen. Det återskapas när du gör ovan kommandon för att initiera repot. 

```text
ls -la .git
```

Du kan kontrollera status på ditt nyskapade Git repo.

```text
git status
```

Kommandot visar dig status för ditt repo och berättar vilka filer som ändrats och inte _committats_. 

För att "skriva till repot", eller göra _commit_ på de ändringar som gjorts, så utför du en commit.

```text
git commit -m "First commit"
```

Eventuellt kommer Git be dig att ange din epost och namn för att kunna identifiera dig som den som gör committsen.

```text
git config user.email "mos@dbwebb.se"
git config user.name "Mikael Roos"
```

Nu är alla filerna tillagda till ditt repo.



### Git historik {#githist}

Git som versionshanteringssystem kommer ihåg den historik som du committat till repo. Den minns varje commit och vid behov kan man se exakt den kodversionen som gällde för en viss commit.

För att göra det enkelt att se sin egen commithistorik så lägger vi till två alias som visar en lista över alla commits, commit-meddelandet och tidpunkten.

Kör följande två kommandon i din terminal.

```text
git config --global alias.hist 'log --all --decorate --pretty=format:"%h %ad | %s%d [%an]" --graph --date=short'
git config --global alias.tree "log --graph --abbrev-commit --decorate --date=relative --format=format:'%C(bold blue)%h%C(reset) - %C(bold green)(%ar)%C(reset) %C(white)%s%C(reset) %C(dim white)- %an%C(reset)%C(auto)%d%C(reset)' --all"
```

Du har nu två alias som du kan använda för att visa din commit-historik.

```text
git hist
git tree
```

Du får fram en lista av dina commits, den senaste visas överst.



### GitHub {#github}

Gå till GitHub och skapa ett nytt repository dit du kan ladda upp git-repot.

Ladda upp ditt git-repo till GitHub (byt ut git@github.com:mosbth/designv2.git mot länken till ditt eget repo).

```text
git remote add origin git@github.com:mosbth/designv2.git
git push -u origin master
```

Använd SSH-nycklar för att identifiera dig, det blir så mycket enklare att slippa skriva lösenord varje gång man laddar upp repot.

Får du problem med SSH-nycklarna så pröva igen. Som plan B kan du använda http som metod att publicera på GitHub och försöka med SSH-nycklarna en annan dag.

Nu har du publicerat din me-sida på GitHub.



### Git tag {#gittag}

När du är klar med alla uppdateringar så kan du committa alla ändringar i ditt git repo. Du kan också lägga till en tagg för att markera nuvarande status i git repot som väl fungerande.

En samling taggar ger en historik av koden och gör det enklare att gå tillbaka till ett visst läge i koden.

Se till att du lagt till alla filer och committat alla ändringar innan du taggar.

Du taggar med kommandot `git tag`.

```text
git tag -a v1.0.0 -m "Ett meddelande för denna taggen"
```

När du är klar kan du ladda upp git repot och dess taggar till GitHub.

```text
git push
git push --tags
```



### Bekanta dig {#bekanta}

Bekanta dig med strukturen för din redovisa-katalog och se vad som där finns.

Du kan ta hjälp av videoserien för att till exempel kolla in följande.

* Modifiera en befintlig sida.
* Modifiera innehållet i ett block (aside).
* Lägga till ett nytt block (aside).
* Modifiera innehållet i ett footer-block.
* Redigera flash-bild för en specifik sida (flash).
* Lägg till ett nytt block till ett befintligt sida och styla den (byline).
* Var skriver jag redovisningstexten?
* Lägg till en ny sida och infoga i navbaren.
* Byt stil med styleväljaren.
* Lägg till en egen stylesheet.
* Aktivera en stylesheet som default style i `config/page.php`.



Krav {#krav}
-----------------------

1. Förstasidan `content/index.md` skall innehålla en hälsning/presentation av/om dig tillsammans med minst en bild som representerar dig.

1. Lägg till en byline (bild och text om dig) till förstasidan. Du kan ha samma byline på fler sidor om du vill.

1. På about-sidan lägger du in valfri text om kursen tillsammans med en godtycklig bild som du anser kompletterar sidans innehåll.

1. På din about-sida skall du lägga en länk till kursens GitHub-repo.

1. På din about-sida skall du lägga en länk till GitHub-repot för din me-sida.

1. Byt ut den bilden som nu finns med som *flash-bild* på alla sidorna. Lägg dit en egen bild som du tycker passar. Du kan ha olika bilder på olika sidor, om du vill och alla sidor behöver inte ha en flash-bild.

1. Fyll i *ett utkast* till din redovisningstext för detta kursmomentet på rätt plats i sidan för redovisningar. Skriv färdigt redovisningstexten när du är helt klar.

1. Skapa en testsida `content/test.md` för att leka runt med olika konstruktioner av Markdown så du kan testa och se hur Markdown samverkar med HTML när du skriver innehåll. Lägg sidan i din navbar så den är enkel att nå.

1. Lägg till style i filen `htdocs/css/kmom01.css` så att din webbplats blir användbar. Det räcker om du lägger till begränsat med style. Du får jobba vidare med stylen i nästa kmom.

1. Aktivera din `kmom01.css` som default stylesheet i styleväljaren.

1. Gör en `dbwebb publishpure redovisa` och kontroller att allt fungerar på studentservern.

1. Committa alla filer och lägg till en (ny) tagg (1.0.\*).

1. Pusha repot till GitHub, inklusive taggarna.



Tips från coachen {#tips}
-----------------------

Gör små commits och committa ofta, när du väl har din bas. Använd tydliga committ-meddelanden så att historiken ser bra ut.

Lycka till och hojta till i forumet om du behöver hjälp!
