---
author: mos
revision:
    "2017-09-08": (F, mos) Bort blå text.
    "2017-06-22": (E, aar) Rensade SQLite och args/getopts.
    "2016-02-22": (D, mos) Lade till videoserien "Lär dig Python".
    "2015-04-08": (C, mos) Länk till screencast om beautifulsoup.
    "2015-01-08": (B, mos) Bort blå ruta med kursutveckling pågår.
    "2014-10-17": (A, mos) Första utgåvan för python kursen.
...
Kmom06: Externa moduler
==================================

Lär dig att installera och använda externa moduler i Python med `pip`. Momentet är inriktat på en samling av moduler som hjälper dig att koppla upp dig mot webbplatser och hämta information från dem. Det finns även inslag av JSON.

Så här kan det se ut när du testar exempelprogrammet för att hämta hem ett citat från en webbtjänst i JSON-format.

<!-- [ASCIINEMA src=12934] -->

[YOUTUBE src=Wq6cpkPJDaU width=630 caption="Andreas visar hur ett färdigt kmom06 kan se ut."]


<!--
[INFO]
**Hur ta dig an kursmomentet?**

Om detta är nya tekniker för dig så rekommenderar jag att du fokuserar på övningarna och uppgiften. Lös dem först. Studera läsanvisningarna i andra hand.

Övningen är handfast och rakt på sak och innehåller all kod och struktur som du behöver för att lösa uppgiften.

Läsanvisningarna ger dig bakgrunden. Men risken med att dyka ned i läsanvisningarna först -- är att du tappar bort dig.

Så, tipset från coachen är följande:

* Skumma snabbt läsanvisningarna så du ser vad de handlar om. 
* Jobba sedan igenom övningarna, i lugn och ro. Stressa inte. Kopiera exempelprogrammen, modifiera dem och gör dem till din egen kod.
* Lös sedan uppgiften, ta hjälp av det du gjorde i övningarna.
* Gå därefter tillbaka och kika igenom läsanvisningarna igen och välj att läsa de bitar som intresserar dig mest.

Målet med kursmomentet är att du lär dig hantera och använda interna och externa Python-moduler samt att ge dig en orientering i webb-relaterade användningsområden för Python. 

Målet är inte att du till fullo skall behärska de tekniker som modulerna hanterar. Se detta som ett smakprov på saker du kan lära dig mer om i kommande kurser.
[/INFO]
-->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Python for Everybody: Exploring data in Python3](kunskap/boken-python-for-everybody-exploring-data-using-python3) 
    * Ch12 Networked programs
    * Ch13 Using Web Services



###Artiklar {#artiklar}

Läs följande:

1. Läs kort och översiktligt om Python modulerna [`json`](https://docs.python.org/3/library/json.html).

2. Läs kort och översiktligt om den externa [Python-modulen `request`](http://docs.python-requests.org/en/latest/) på deras hemsida.

3. Läs kort och översiktligt om den externa [Python-modulen `BeautifulSoup`](http://www.crummy.com/software/BeautifulSoup/) på deras hemsida.



###Video  {#video}

Titta på följande:

1. Videoserien [Lär dig Python](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93pTlN_dnDpsTwGLCXJEpd) är tätt kopplat till kursmaterialet. Kika på de videor som börjar med 6.

2. De videor som följer med och kompletterar kurslitteraturen.

    * [Python for Informatics: Chapter 12 - Network Programming](https://www.youtube.com/watch?v=Zr8BQiPNaFI)
    * [12.4 HTML Scraping with BeautifulSoup](http://www-personal.umich.edu/~csev/books/py4inf/media/Py4Inf-ex-12-04.mp4) (ladda ned och spela upp)
    * Chapter 13 - Using Web Services [part 1](https://www.youtube.com/watch?v=6cwi1NcL0Zc&feature=youtu.be), [part 2](https://www.youtube.com/watch?v=4Rib_ybry2Y&feature=youtu.be), [part 3](https://www.youtube.com/watch?v=_tpyqAlCgoM&feature=youtu.be)

3. Video om JSON: "[Discovering JavaScript Object Notation with Douglas Crockford](https://www.youtube.com/watch?v=kc8BAR7SHJI)".



###Lästips {#lastips}

Följande är relevant extra läsning om du har tid och lust.

1. I boken [Dive Into Python 3](kunskap/boken-dive-into-python-3) handlar kapitel 14 om [HTTP Web Services](http://www.diveintopython3.net/http-web-services.html).



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*


###Övningar {#ovningar}

Genomför övningarna för att träna inför uppgifterna.

1. [Installera pakethantering med `pip3` för Python](kunskap/python-pakethantering-med-pip).

2. Jobba igenom övningen "[Använd externa moduler i Python för att hämta information på webben](kunskap/anvand-externa-moduler-i-python-for-att-hamta-information-pa-webben)". När det finns exempelprogram, kopiera dem och gör dem till dina egna. Kör dem. Ändra små saker i dem så du har koll på hur de fungerar. De exempelprogram du gör kan du spara i ditt kursrepo under `me/kmom06/external`.



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Analysera texter från webbsidor](uppgift/din-egen-chattbot-marvin-steg-5)". Spara alla filer under `me/kmom06/analyzer2`.



###Extra {#extra}

Det finns inga extra uppgifter.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Har du jobbat med liknande tekniker innan (JSON, HTTP, webbtjänster, scrapa från HTML-formatet), eller var detta helt nytt för dig?
* Känns det bra att jobba på kommandoraden, ser du ett användningsområde för den typen av Python-program?
* Hur gick det att utföra uppgifterna, vilken tog mest tid och vilken var mest lärorik?
* Gjorde du någon av extrauppgifterna? Berätta om det arbetet isåfall.
