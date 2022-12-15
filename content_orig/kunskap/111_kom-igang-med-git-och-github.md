---
author: mos
category: artikel
revision:
  "2014-01-27": (G, mos) Lade till git status samt problem på windows med git 1.8.5
    med https interkativt, samt länk till ssh-nycklar.
  "2013-10-29": (F, mos) Bytte användare till GitHub test repository från dbwebb1
    till dbwebb.
  "2013-04-04": (E, mos) Blå ruta om git som översätter radbrytningar automatiskt.
  "2013-02-01": (D, mos) Skrivfel git tag -a.
  "2013-01-15": (C, mos) Helt omskriven från början, med screencasts.
  "2012-08-10": (B, mos) Flyttad från WP till Lydia.
  "2012-05-07": (A, rgi) Första utgåvan.
updated: "2014-01-27 08:44:27"
created: "2012-08-09 13:48:18"
...
Kom igång med Git och GitHub
==================================

Git och GitHub är två verktyg inom versionshantering som växer i populäritet bland webbutvecklare. Här får du hjälp att komma igång med grunderna till de två populära verktygen. Git är versionshanteringssystemet och GitHub är en webbplats som erbjuder utvecklare att "hosta" sina git-projekt. När de samverkar, eller när du får dem att samverka, skapar du en gedigen grund till din hantering av programvara, en grund som håller långt in i professionell programutveckling.

<!--more-->



Git - ett versionshanteringsverktyg {#git}
--------------------------------------------------------------------


###Om Git {#om-git}

Git är ett versionshanteringssystem utvecklat av samma person som skapat Linux, Linus Torvalds. Linus var inte nöjd med det versionshanteringsverktyg de använde så han initierade att de skulle bygga ett eget [^1]. Sagt och gjort, Git föddes.


Git är alltså ett verktyg för att konfigurationshantera programvara. Det fungerar enklast att skriva git-kommandon i terminalfönstret. Även om det finns visst stöd via grafiska verktyg så har jag för egen del inte funnit en bra klient, ännu. Så, här handlar det om terminalfönster.

Webbplatsen för Git finns här:  
  [git-scm.com/](http://git-scm.com/)


På webbplatsen hittar vi dokumentation och vi hittar en trevlig liten interaktiv testapplikation som kan hjälpa oss att komma igång med Git.

* Lär dig Git med en interaktiv övning på 15 minuter.  
  [try.github.com/](http://try.github.com/)

Så långt så bra, låt oss börja med att installera Git på vår egen maskin.



###Installera Git {#install-git}

Börja med att [ladda ned och installera programvaran](http://git-scm.com/download) för Git.

Du kan följa med hur jag gör i följande video.

[YOUTUBE src=QvZXkGrHi-Y width=630 caption="Mikael installerar Git."]

Bra, Git är installerat och vi kan skapa vårt första repository.



###Mitt första repository {#repo-git}

Det allra första vi gör är att konfigurera vem du är som användare.

```bash
git config --global user.name "Mikael Roos"
git config --global user.email "mos@dbwebb.se"
git config --list
```

Ett Git repository är en katalog som hanteras av Git. Låt oss skapa ett litet testprojekt som vi initierar i Git. Följande kommandon hjälper oss med det.

```bash
mkdir hello
cd hello
git init
touch hello.php 
touch README.md
git add .
git status
git commit -m "Initial commit"
```

Du kan följa med hur jag gör i följande video.

[YOUTUBE src=08akJnBmrwo width=630 caption="Mikael skapar ett Git repository."]

Nästa steg får bli att koppla ihop repositoryt med webbtjänsten GitHub.

[INFO]
**"LF replaced with CRLF"**

Får du varningar om "LF replaced with CRLF"? Läs då i forumet om bakgrunden och hur du kan lösa så att [git INTE automatiskt översätter mellan Windows/Unix radbrytningar](t/1182).
[/INFO]



GitHub - webbtjänst för att publicera ditt repo {#github}
--------------------------------------------------------------------

GitHub är en webbtjänst som erbjuder möjligheten att lagra Git-repo på deras servrar. Det är ett trevligt webbgränssnitt och många stora öppna källkodsprojekt använder sig av GitHub.

Det vi skall göra nu är att skapa ett konto på GitHub och därefter länka samman vårt nyskapade lokala repo så att det hamnar på GitHub.

Du kan följa med hur jag gör i följande video.

[YOUTUBE src=f5vNcvG6z1Q width=613 caption="Mikael länkar det lokala repot till ett på GitHub."]

De magiska orden som länkar ihop ditt lokala repo med ett repo på GitHub är alltså:

```bash
git remote add origin https://github.com/dbwebb/hello
git push -u origin master
```

Nu har vi skapat ett repo som finns på GitHub. Bra, då kan vi börja jobba på riktigt.

[INFO]
**Bugg i Git Windows 1.8.5 [^3]**

När man pushar ett repo över https så fungerar inte interaktiv inloggning, man "promptas" inte för lösenord och användare. Använder man ssh-nycklar är det inget problem, annars behöver man [nedgradera till version 1.8.4](https://github.com/swcarpentry/bc/issues/234#issuecomment-33055444).

```bash
git --version
```

Skapa sedan om ditt repository från början.
[/INFO]




Jobba i det lokala repot och uppdatera GitHub {#push}
--------------------------------------------------------------------


###Committa och pusha {#commit}
Nu har du ditt lokala repo som du kan utveckla i. Så fort du gjort några ändringar så kan du göra `push` på dem till github enligt följande.

```bash
git commit -a -m "Explain what changes I did" 
git push
```

Du kan committa en specifik fil, `commit README.md`, eller alla filer som har ändringar i sig, `commit -a`. En commit görs till ditt lokala repository.

När du sedan gör en git push så laddas de ändrade filerna upp till GitHub.

Sedan är du i synk, dina ändringar i ditt lokala repo matchar repot på GitHub. Det är viktigt att hålla ordning så att GitHub är i synk med din lokala variant.

[INFO]
**Ny default-inställning för Git-push från och med version 2.0 [^2]**

Jag brukar alltid använda mig av `git push` och från och med version 2.0 av Git så kan det kräva att du behöver göra en default-inställning.

```bash
git config --global push.default simple
```

* Läs mer på manualsidan för [`git-config` (sök på push.default)](http://git-scm.com/docs/git-config).

[/INFO]



###Tagga {#tag}
När du har gjort en del ändringar så vill du troligen skapa en ny version av din kod, en version som du vid behov kan gå tillbaka till. Detta gör du genom att sätta en `tag` med Git.

Följande kommandon lägger till en tagg och pushar den till GitHub.

```bash
git tag -a v0.1 -m "Descriptive text about the tag" 
git push --tags
```

Du kan följa med hur jag gör i följande video.

[YOUTUBE src=8yulcmIfWD8 width=613 caption="Mikael jobbar med Git lokalt, gör en tagg och uppdaterar GitHub."]

Läs gärna mer i manualen om respektive kommando:

* [`git commit`](http://git-scm.com/docs/git-commit)
* [`git push`](http://git-scm.com/docs/git-push)
* [`git tag`](http://git-scm.com/docs/git-tag)
* [`git config`](http://git-scm.com/docs/git-config)



Clona repot till driftsservern {#clone}
--------------------------------------------------------------------

Nu när repot finns på GitHub så är det enkelt för en och var att ladda ned sin egen kopia av det. För min del så vill jag ladda ned det till en driftsserver. Det magiska ordet heter `clone`.

Vill man senare ladda ned den allra senaste varianten så görs det med `pull`.

```bash
git clone https://github.com/dbwebb/hello

git pull # hämta ned senaste ändringarna från repot på GitHub
```

Du kan följa med hur jag gör i följande video.

[YOUTUBE src=hCYgEqiKOjE width=613 caption="Mikael skapar konto på GitHub och länkar ihop det lokala repot med GitHub."]

Läs gärna mer i manualen om respektive kommando:

* [`git clone`](http://git-scm.com/docs/git-clone)
* [`git pull`](http://git-scm.com/docs/git-clone)



Sammanfattningsvis {#sammanfatta}
--------------------------------------------------------------------

Nu har du kommit igång med både Git och GitHub. Som du säkert förstår så är detta bara grunderna och det finns mycket att lära sig om både Git och GitHub. Men, nu har du iallafall en bas att jobbar vidare ifrån. 

Lycka till och kämpa på!

Dagens lästips är [manualen för Git](http://git-scm.com/book).

När du blir varm i kläderna så kommer du att vilja sätta upp ssh-nycklar så att du slipper skriva lösenordet varje gång. Läs om hur du [sätter upp ssh-nycklarna på GitHub](https://help.github.com/articles/generating-ssh-keys). Men det kan upplevas lite pilligt, när du gör det första gången.



Diskutera i forumet {#forum}
--------------------------------------------------------------------

Du kan diskutera denna artikel i forumet, eller ställa frågor kring Git och GitHub, [artikeln har en egen tråd](f/5514).



Referenser {#referenser}
------------------------

Följande är referenser som använts som fotnötter i texten.

[^1]: [Wikipedia: Hur Git kom till](http://en.wikipedia.org/wiki/Git_%28software%29#History).
[^2]: [Stack Overflow: Push default ändras i Git 2.0](http://stackoverflow.com/questions/13148066/warning-push-default-is-unset-its-implicit-value-is-changing-in-git-2-0).
[^3]: [Git error Windows 1.8.5, "could not read Username for https:"](https://github.com/swcarpentry/bc/issues/234).
