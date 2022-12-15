---
author: mos
category: python
revision:
    "2017-06-28": (K, aar) Tog bort krav om exit-status.
    "2017-06-21": (J, aar) Omgjord inför AAA.
    "2016-09-29": (I, mos) Länkade till exempel för asciibild.
    "2015-08-25": (H, mos) Uppgraderade till dbwebb v2 samt la till extrauppgift om ascii-bild.
    "2015-04-22": (G, mos) Förtydligade att marvin4 inte skall stödjas.
    "2015-03-09": (F, mos) Ändrade länken till inspect.
    "2015-02-03": (E, mos) Gjorde SQLite som valbar.
    "2015-01-07": (D, mos) Förtydligade att seo i kombination med `--input` inte behöver url.
    "2014-12-16": (C, mos) Tog bort extrauppgiften eftersom den ofta löstes med extern modul som gjorde uppgiften svår att rättad.
    "2014-12-01": (B, mos) Förtydligade att title i kombination med `--input` inte behöver url.
    "2014-10-15": (A, mos) Första utgåvan i samband med kursen python.
...
Analysera texter från webbsidor
==================================

Här ska du utveckla nya moduler för att hämta texter från webbsidor och skriva data till fil. Texten ska analyseras med modulerna från kmom05. Möjligheten att spara resultatet i en JSON fil ska också finnas.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gjort [Analysera text och ord](uppgift/analysera-text-och-ord).

Du har jobbat igenom artikeln "[Använd externa moduler i Python för att hämta information på webben](kunskap/anvand-externa-moduler-i-python-for-att-hamta-information-pa-webben)".



Introduktion {#introduktion}
-----------------------

Så här kan det se ut när du kör ditt färdiga program.

```bash
# Generell användning av programemt
python3 main.py [options] command [arguments-to-the-command]

# Pinga en webbsida
python3 main.py ping http://dbwebb.se/humans.txt

# Hämta och skriv ut innehållet i en webbsida
python3 main.py get https://dbwebb.se/blogg/grillcon-2017-var-i-utokad-version

# Hämta och spara webbsidan på en fil
python3 main.py --output=humans.txt get https://dbwebb.se/blogg/grillcon-2017-var-i-utokad-version

# Visa upp dagens citat genom att hämta det från en webbtjänst
python3 main.py quote

# Hämta och visa titeln för en webbsida
python3 main.py title http://dbwebb.se
```



Krav {#krav}
-----------------------


1. Kopiera innehållet från katalogen `me/kmom05/analyzer` till `me/kmom06/analyzer2`.

```bash
# Stå i me-katalogen
cp -ri kmom05/analyzer/{*.py,*.txt} kmom06/analyzer2/
```

2. Följande options skall fungera.

* `-h, --help` skall visa en hjälptext som beskriver ditt program och hur det används.
* `-v, --version` skall visa versionen av programmet.
* `--verbose` skall innebära att mer text skrivs ut, kanske bra för debugging?
* `--silent` skall innebära att minimalt med utskrift sker, bra om man bara vill se svaret.



<!--
3. Om programmet exekverar på ett lyckat sätt så skall du använda exit-status 0. Blir det fel i parsningen av av options/argument så skall du använda exit-status 1. Blir det fel i exekveringen av ett kommando, till exempel att webbsidan inte svarar, då skall du ge exit-status 2.

Du kan dubbelkolla din exit-status genom att skriva:

```bash
python3 main.py --help; echo $?   # Borde ge 0
python3 main.py --moped; echo $?  # Borde ge 1
```
-->


3. Skapa tre nya moduler, en för att hantera funktionaliteten med `Request` (`requester.py`), en för `BeautifulSoup` (`html_parser.py`) och en för att skriva till fil (`output_to_file.py`).



4. Pinga en webbsida med följande kommando.

```bash
python3 main.py ping <url>
```

Programmet skall ange status-koden för HTTP-anropet tillsammans med länken som besöktes. Ange `--silent` för att enbart visa statuskoden. Lagra undan resultatet i en fil. Visa innehållet i filen genom att ange kommandot.

```bash
python3 main.py ping-history
```



5. Visa dagens citat genom att hämta det från en webbtjänst.

```bash
python3 main.py quote
```

Resultatet skall bli att citatet från webbtjänsten http://dbwebb.se/javascript/lekplats/get-marvin-quotes-using-ajax/quote.php skrivs ut.



6. Hämta och visa titeln från en vald webbsida. Titeln är det innehåll som ligger i elementet `<title></title>`.

```bash
python3 main.py title <url>
```



7. Ladda hem en webbsida med följande kommando.

```bash
python3 main.py get <url>
python3 main.py --output=<file> get <url>
```

Parsa hemsidan och hämta bara ut texten som finns i html-taggen `article`. Programmet kan bara användas på hemsidor där `<article>` finns.

Resultatet skall bli att webbsidans text från `<article>` skrivs ut på skärmen. Om man anger ett option `--output=<file>` så skall utskriften ske till en fil, istället för skärmen.



8. Det ska gå att analysera texten i filen, som föregående krav resulterar i, med samma kommandon som används i [kmom05, analysera text och ord](uppgift/analysera-text-och-ord). Resultatet från textanalysen, ska presenteras i JSON-format. Gäller samtliga kommandon för textanalys, inklusive `all`.

```text
$ python3 main.py --silent lines phil.txt
{
    "lines": 1133
}
```


9\. Validera analyzer2 genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb validate analyzer2
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar. 

Du kan också testköra ditt program och se om det går igenom rättningen.

```bash
# Ställ dig i kurskatalogen
dbwebb inspect kmom06
```



Extrauppgift {#extra}
-----------------------

<!--
1\. I uppgift 5 så kan du använda databasen SQLite, istället för att lagra på fil.

2\. Hämta hem en bild från webben och skriv ut den som en ASCII-bild enligt följande. Använd biblioteket [Pillow](http://pillow.readthedocs.org/) för att lösa bildhanteringen. Du kan se hur man kan göra i exemplet [`example/image`](https://github.com/dbwebb-se/python/tree/master/example/image).

```bash
python3 main.py ascii <url-to-image> 
```
-->

1. Lägg till ett option för att kunna hämta text från andra taggar än `<article>`.
```bash
# Hämtar text från alla `div` taggar istället för article
python3 main.py --tag=div get <url>
```


2. Lägg till ett option för att kunna hämta text från taggar med ett id.
```bash
# Hämtar text från alla taggar med id `text` istället för article
python3 main.py --id=text get <url>
```


3. Lägg till ett option för att kunna hämta text från taggar med en klass.
```bash
# Hämtar text från alla taggar med klass `text` istället för article
python3 main.py --class=text get <url>
```

Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Använd `--verbose` för att skriva ut massa debugg-utskrifter när du utvecklar och testar.

Lycka till och hojta till i forumet om du behöver hjälp!
