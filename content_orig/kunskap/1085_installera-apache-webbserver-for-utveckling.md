---
author:
    - mos
category:
    - labbmiljo
revision:
    "2017-10-09": (A, mos) Första versionen, flyttad från annat dokument och uppdaterad enbart för XAMPP (använder gamla bilder).
...
Installera Apache webbserver för utveckling
==================================

[FIGURE src=image/xampp/xampp-logo.png?w=c5 class="right"]

Se till att du har en egen lokal utvecklingsmiljö för dina webbsidor. I dbwebb-kurserna så använder vi alltid en driftsserver dit vi laddar upp resultatet när vi är klara. Men det underlättar om man har en egen utvecklingsmiljö så att man inte är beroende av driftservern. Det är skönt att kunna köra alla sina tester lokalt och ibland vill man testa sin kod på fler än en miljö.

<!--more-->



Apache och XAMPP {#xampp}
--------------------------------------------------------------------

Det finns flera sätt att installera webbservern Apache. I kurserna använder vi [XAMPP](https://www.apachefriends.org/index.html) på Windows och Mac OS. XAMPP är lätt att installera och komma igång med. Den har ett trevligt och enkelt gränssnitt. Dessutom finns den både till Windows, Mac OS och Linux.

Det kan finnas andra sätt att installera en webbserver på din maskin. De sätten kan också fungera med kursmaterialet. Men XAMPP får vara refeerensinstallationen och om du inte får det att fungera med din egna variant så kan du ta XAMPP. Det är troligen enklast att få hjälp med XAMPP.

På Linux går det generellt bra att använda godtycklig pakethanterare för att installera Apache.



Installera {#install}
--------------------------------------------------------------------

Installera Apache på XAMPP så här.

1) Gå till hemsidan för XAMPP och ladda ned det paketet du vill ha (Windows, Mac). På Mac väljer du säkrast det traditionella sättet och du väljer _inte_ det paket som [slutar på "-VM" för virtuell maskin](https://dbwebb.se/forum/viewtopic.php?t=6648#p53876).


2) Kör en ren installation, se till att du är Administratör på din Windows-maskin (för att undvika problem).


3) Ändra (valfritt) så att Apache kör på 8080 (för att undvika problem när någon annan redan kör på port 80, typ Skype eller befintlig webserver). I Mac klickar du på "Configure" och ändrar port i rutan som poppar upp. I Windows är det lite krångligare, men du gör så här. 

3.1) Öppna Apaches konfigfil `httpd.conf` genom att klicka på knappen "Config" och väljer sedan "Apache (httpd.conf)" i den menyn som kommer upp.

[FIGURE src=/image/xampp/xampp-config-port.png&w=w2 caption="Öppna konfigfilen till Apache."[/FIGURE]

3.2) En texteditor öppnar filen `httpd.conf`. Leta reda på raden som säger:

```text
Listen 80
```

Ändra den raden så att Apache lyssnar på port 8080 istället för port 80.

```text
Listen 8080
```

[FIGURE src=/image/xampp/xampp-config-port-httpd.png&w=w2 caption="Byt port som Apache kör på för att undvika krockar med andra program."[/FIGURE]


4) Klar. Starta Apache

[FIGURE src=/image/xampp/start-apache.png?w=w2 caption="Starta Apache webbserver."[/FIGURE]

Apache har startat.

[FIGURE src=/image/xampp/apache-started.png?w=w2 caption="Nu snurrar Apache webbserver på din lokala maskin."[/FIGURE]


5) Peka webbläsaren till `http://localhost:8080/` eller `http://127.0.0.1:8080` (kopiera in länkarna till din webbläsare). Så här kan det se ut när XAMPPs standard hemsida visas.

[FIGURE src=/image/xampp/xampp-home.png?w=w2 caption="XAMPPs hemsida på din lokala maskin visas."[/FIGURE]

Nu har du installerat Apache med XAMPP och du kan köra en lokal webbserver på din dator.



Testa en HTML-sida {#htmlsida}
--------------------------------------------------------------------

Xampp installeras i `C:\xampp` och webrooten ligger i `C:\xampp\htdocs` på Windows och i Mac OS gäller `/Applications/XAMPP/htdocs`.

Gör följande steg för att testa din installation genom att skapa en HTML-sida och visa i din webbläsare. 

1) Skapa en katalog `test` i din htdocs-katalog (din webroot). 

[FIGURE src=/image/xampp/htdocs-create-test-dir.png?w=w2 caption="Katalogen `test` skapas i filväljaren."]


2) Öppna samma katalog i din webbläsare. Länken dit är `http://localhost:8080/test` eller `http://127.0.0.1:8080/test`. Katalogen är tom för tillfället.

[FIGURE src=/image/xampp/firefox-test-empty.png?w=w2 caption="Katalogen `test` öppnad i webbläsaren via webbservern."]


3) Skapa en fil i katalogen och döp den till `test.html` (en HTML-sida).

[FIGURE src=/image/xampp/htdocs-create-test-files.png?w=w2 caption="Test filen ligger i aktalogen."]

Kontrollera att du ser filen i din webbläsare genom att ladda om sidan (`ctrl-r` eller `F5`).

[FIGURE src=/image/xampp/firefox-test-files-empty.png?w=w2 caption="De nyskapade filerna är synliga via webbservern."]


4) Öppna filen i din texteditor och lägg in följande kod.

Kod till HTML-sidan `test.html`.

```html
<!doctype html>
<meta charset="utf-8">
<title>My test page</title>
<h1>My nice test page for HTML</h1>
```

[FIGURE src=/image/xampp/jedit-test-html.png?w=w2 caption="Filen `test.html` skapas i texteditorn."[/FIGURE]


5) Öppna filen i din webbläsare för att se hur den ser ut.

* `http://127.0.0.1:8080/test`

[FIGURE src=/image/xampp/firefox-test.png?w=w2 caption="Filen ligger i katalogen och är synlig via webbläsaren."[/FIGURE]


* `http://127.0.0.1:8080/test/test.html`

[FIGURE src=/image/xampp/firefox-test-html.png?w=w2 caption="Visa filen `test.html` i webbläsaren."[/FIGURE]

Nu fungerar din installation av XAMPP tillsammans med HTML-sidor.



Länka från webbkatalogen till andra kataloger {#link}
--------------------------------------------------------------------

För att förenkla att jobba med filerna som visas via webbservern så skall vi skapa en symbolisk länk till din hemmakatalog. På detta viset kan du enkelt jobba med alla webbfiler och nå dem (skapa, redigera, radera) via din hemmakatalog.

Säg att du har en katalog `dbwebb-kurser` i din hemmakatalog och du vill öppna den via webblänken `http://localhost/dbwebb-kurser/` (eller `http://localhost:8080/dbwebb-kurser/` om du har valt en annan port). Du behöver då en länk `dbwebb-kurser`, som ligger i webbkatalogen och som pekar på katalogen `dbwebb-kurser` som ligger i din hemmakatalog.

Följ nedan instruktioner för att skapa länken på Windows eller på Mac OS.



###Skapa länk på Windows {#linkwin}

I Windows ligger din webbkatalog ofta under `c:\xampp\htdocs`. Du kan länka till en katalog med kommandot `mklink` i kommandoprompten. Öppna "Command Prompt" *som administratör* och kör följande kommando. 

```text
mklink /D c:\xampp\htdocs\dbwebb-kurser %USERPROFILE%\dbwebb-kurser
```

Konstruktionen `%USERPROFILE%` motsvarar din hemmakatalog. Du kan även ange hela sökvägen till din hemmakatalog. I mitt fall hade det varit följande.

```text
mklink /D c:\xampp\htdocs\dbwebb-kurser c:\Users\Mikael\dbwebb-kurser
```

Nu är länken skapad.

För att få hjälp med kommandot skriver du följande.

```text
mklink /?
```



###Skapa länk på Mac OS {#linkmac}

I Mac OS heter kommandot `ln` och en vanlig plats för webbkatalogen är `/Applications/XAMPP/htdocs`. Öppna din terminal och skapa länken på följande sätt.

```text
cd /Applications/XAMPP/htdocs
ln -s $HOME/dbwebb-kurser
ls -l dbwebb-kurser
```

Så kan du skapa länken och testa att den skapades.



Avslutningvis {#avslutning}
--------------------------------------------------------------------

Du har gått igenom stegen för att installera webbservern Apache via XAMPP. Syften är att ha en lokal utvecklingsmiljö.

Det finns en [forumtråd kopplad till denna artikeln](t/6921). Där kan du ställa frågor eller bidra med tips och trix.
