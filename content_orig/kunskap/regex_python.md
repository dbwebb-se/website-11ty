---
author: aar
revision:
    "2017-01-27": (A, aar) Första utgåva.
category:
    - oopython
...
Introduktion till regex
===================================

[FIGURE src=/image/oopython/kmom04/regex.png class="right"]

Regex är en förkortning av Regular Expression som är ett välkänt språk för att matcha textmönster. Det används oftast till att extrahera information från kod, loggfiler och andra texter.  
I regex definieras ett mönster av karaktärer som regex sedan försöker hitta/matcha i en sträng eller text.  
I python används modulen [_re_](https://docs.python.org/2/library/re.html) för att använda regex på strängar.

Om ni har svårt att förstå ett regex mönster eller ni vill testa mönstret på en text, snabbt och lätt, rekommenderar jag sidan <https://regex101.com/#python>. Om man skriva in ett mönster och en text där förklarar de alla olika delar i mönstret och visar på ett bra sätt vad som matchas.

<!--more-->



Förutsättning {#pre}
-------------------------------

Det finns inga förkunskaper.



Använda modulen re {#anvanda_modulen_re}
------------------------------


Vi ska använda oss av re's funktion [_findall_](https://docs.python.org/2/library/re.html#re.findall) för att matcha mönster.  
Det går även använda re's [_match_](https://docs.python.org/2/library/re.html#re.match) och [_search_](https://docs.python.org/2/library/re.html#re.search).  
re.match() kommer alltid att försöka matcha strängen från position noll och frammåt och re.search() letar efter mönstret i hela strängen och returnerar första förekomsten den hittar. re.findall() som vi ska använda oss utav hittar alla förekomster av mönstret och returnerar de som en lista.  
Nedan är ett exempel på skillnaden mellan match, search och findall.

```python
import re
line = "2bcab"
matchMatch = re.match("b", line)
print(matchMatch)
None

matchSearch = re.search("b", line)
print(matchSearch)
<_sre.SRE_Match object; span=(1, 2), match='b'>

print(matchSearch.group())
b

matchFindall = re.findall("b", line)
print(matchFindall)
['b', 'b']
```

match(), search() och findall() returnerar _None_ om de inte hittar mönstret, det är därför None skrivs ut när vi skriver ut matchMatch.
Med re.search() kan vi se att den bara hittar första förekomsten av **b** om vi kollar i _span=(1,2)_, den hittar karaktären **b** som har index 1. Alltså hittar den inte det sista **b:et**.  
re.findall() hittar båda **b**.

Sist i artikeln kommer vi går igenom [_re.sub_](https://docs.python.org/3/library/re.html#re.sub), en funktion för att ersätta text med hjälp av regex.



### Special karaktärer {#special_karakterer}

I regex är har vissa karaktärer en speciell betydelse, det är detta som gör att vi kan matcha mönster dynamiskt och inte enbart fasta strängar.

[INFO]Ibland behöver man använda raw string notation (r"text") när man jobbar med regex, om man inte har det kan man behöva använda två `\` istället för ett när man skriver t.ex. **\w, \1 och \S**.  
I denna artikeln kommer bara raw string notation användas när vi behöver referera till grupper, **\1**. Vissa kan behöva använda det även när de skriver **\w eller \\[** m.m.[/INFO]

* **.**(punkt): Matchar vilken karaktär som helst utom newline(\\n). Kallas även wildcard.

* **^**: Matchar början av en sträng.

* **$**: Matchar slutet av en sträng.

* **?**: Matchar noll eller en gång.

* **+**: Matchar en eller flera gångar.

* **\***: Matchar noll eller flera gångar.

* **|**: Funkar som en "OR" operator.

* **\{ \}**: Matchar en intervall.

* **[ ]**: Matchar en av karaktärerna som har skrivits inom hakparenteserna.

* **[^ ]**: Matchar en karaktär som inte har skrivits inom hakparenteserna.

* **\w**(litet w): Matchar en alfanumerisk karaktär, alla bokstäver(stora och små), siffror och \_(understreck). Kan även skrivas som [a-zA-z0-9_]

* **\W**(stort W): Matchar en icke alfanumerisk karaktär, alltså en karaktär som inte matchas av **\w**. Kan även skrivas som [^a-zA-Z0-9_].

* **\d**: Matchar en siffra. Kan även skrivas som [0-9].

* **\D**: Matchar en karaktär som inte är en siffra. Kan även skrivas som [^0-9].

* **\s**(litet s): Matchar en blank(whitespace) karaktär. Kan även skrivas som [ \\t\\n\\r\\f\\v].

* **\S**(stort S): Matchar en icke-blank(whitespace) karaktär. Kan även skrivas som [^ \\t\\n\\r\\f\\v].

* **( )**: Grupperar karaktärer i en matchad sträng. Det går att plocka ut grupper ur matchade strängar och det går även att refererar tillbaka till grupper i mönstren

* **\\**: Används för att göra en specialkaraktär till en vanlig karaktär, t.ex. **\\.** matchar en punkt istället för att fungera som ett wildcard, **\\\*** matchar en asterisk istället för att fungera som en repeterare och **\\(** matchar en parentes istället för att starta en grupp.
Det används även för att referera till en grupp, **\1** refererar till grupp 1 och **\2** till grupp 2. Grupper börjar på 1 och uppåt.



###Grundläggande regex {#grundleggande_regex}

För att komma åt namnet _Kim_ i en mening kan vi gå tillväga på ett antal sätt, så vi går igenom några:

```python
line = "Kim gillar chips."
match = re.findall("Kim", line)
print(match)
['Kim']
```

Vi skriver "Kim" för att vi vet att vi letar specifikt efter det namnet.  
Men om vi endast vet att vi letar efter ett namn som börjar på "K" och kommer efterföljas av två bokstäver kan vi skriva:

```python
line = "Kim gillar chips."
match = re.findall("K..", line)
print(match)
['Kim']
```

Vi använder "**.**" för att matcha vilken karaktär som helst efter "K".  
Vi kan även använda oss utav "**\w**" istället för "**.**".

```python
line = "Kim gillar chips."
match = re.findall("K\w\w", line)
print(match)
['Kim']
```


```python
line = "3.14 != 3134 and 3445 != 3.15"
match = re.findall("\d\.\d\d", line)
print(match)
['3.14', '3.15']
```

Ovanför matchar vi decimaltal med två decimaler. Vi använder oss av "**\d**" för att matcha siffror och "**\\.**" för att matcha en punkt. Hade vi skrivit "**.**" istället för "**\\.**" hade vi matchat alla talen och inte bara decimaltalen.

För att bara matcha det första decimaltalet, 3.14, kan vi använda oss utav "**^**" för att markera början av strängen:

```python
line = "3.14 != 3134 and 3445 != 3.15"
match = re.findall("^\d\.\d\d", line)
print(match)
['3.14']
```

Vårt mönster försöker matcha en sträng som börjar med en siffra, en punkt och två siffror till.

Om vi däremot bara vill matcha talet som kommer före slutet på strängen använder vi oss utav "**$**" för att markera slutet:

```python
line = "3.14 != 3134 and 3445 != 3.15"
match = re.findall("\d\.\d\d$", line)
print(match)
['3.15']
```

Ovanför använder vi mönstret, matcha en siffra, en punkt, två siffror till och sen är slutar strängen.



```python
line = """a b\tc
d.e"""

match = re.findall("a\sb", line)
print(match)
['a b']

match = re.findall("b\sc", line)
print(match)
['b\tc']

match = re.findall("c\sd", line)
print(match)
['c\nd']

match = re.findall("d\Se", line)
print(match)
['d.e']
```

Ovanför använder vi oss utav "**\s**" för att hitta olika blank(whitespace) karaktärer och "**\S**" för att hitta en icke-blank karaktär. "**\s**" matchar " " (mellanslag), "\t" (tab) och "\n" (ny rad) m.m.

Om vi skriver **A|B** matchar det "A" eller "B". Om vi använder det mönster på strängen "ABC" får vi tillbaka ['A', 'B']. Vi testar ett exempel.

```python
line = "apa, kaka, klaga, bada"
match = re.findall("kaka|bada", line)
print(match)
['kaka', 'bada']
```

Vi matchar orden "kaka" eller "bada", nu hade vi med båda så båda blev hittade. Det har större användning när man gör mer avancerade mönster och använder sig av gruppering, vi kommer använda oss av det mer längre ner.



###En uppsättning karaktärer, [] {#en_uppsettning_karakterer}

Hakparenteser, [ ], används för att skapa en uppsättninga karaktärer som kan användas för att matcha, **[abc]** matchar "a", "b" eller "c". Vi tittar på några exempel:

```python
line = "apa, kaka, bada, klaga"
match = re.findall(".a[pkd]a", line)
print(match)
['kaka', 'bada']
```

Med **[pkd]** kan vi matcha karaktärerna "p", "k" eller "d". Om "apa" inte hade varit det första ordet, om vi hade haft strängen "kaka, apa, bada, klaga" istället, hade även " apa" blivit matchat då **.** matchar vilken karaktär som helst, uton ny rad(\\n).

Det går att matcha ett intervall av karaktärer med hjälp av "**-**". **[a-z]** Representerar alla små bokstäver mella "a" och "z" i alfabetet. **[0-9]** Representerar siffrorna "0" till "9".

```python
line = "B4G5, C2B-, f3P0, E4bR, G1Ha"
match = re.findall("[A-H][2-6][B-i][A-z0-9]", line)
print(match)
['B4G5', 'E4bR']
```

Låt oss gå igenom mönstret vi försöker matcha. **[A-H]** Matchar stora bokstäver i alfabetet som kommer mellan(inklusive) "A" och "H". **[2-6]** Matchar siffrorna "2" till "6". **[B-i]** Matchar stora och små bokstäver mellan "B" och "i". **[A-z0-9]** Matchar stora och små bokstäver mellan "A" och "Z" och siffrorna "0" till "9".

Det går även att använda sig utav **\w, \d och \s** inom hakparanteserna.

```python
line = "-a2.-b b-cb.-a2a-1\n2-"
match = re.findall("\w[\da-c\s][b.]", line)
print(match)
['a2.', 'b b', 'cb.']
```

**[\da-c\s]** Matchar alla siffror, bokstäverna "a" till "c" och alla whitespace karaktärer. **[b.]** Matchar bokstaven "b" och ".", då om man har en punkt i en hakparentes förlorar den sin speciella innebörd och matchar endast en punkt.



###Exludera karaktärer {#exuldera_karakterer}

Med **[^]** kan vi skapa ett mönster som matchar karaktärer som inte finns inom hakparenteser.

```python
line = "apa, kaka, bada, klaga, a2a, a a"
match = re.findall("a[^kg]a", line)
print(match)
['apa', 'ada', 'a2a', 'a a']
```

**[^kg]** Matchar alla karaktärer utom "k" och "g".


###Upprepning {#upprepning}

För att underlätta skapandet av mönster kan man använda specialkaraktärer för att markera att samma karaktär/er ska upprepas. Vi kikar på några exempel:

```python
line = "203 3001 20002 22 212"
match = re.findall("[23]0+\d", line)
print(match)
['203', '3001', '20002']
```

**+** Betyder att föregående ska finnas med minst en gång. I vårt mönster ovan ska en "2:a" eller en "3:a" efterföljas av minst en "0:a" som sedan ska ha en valfri siffra efter sig.

```python
line = "I have 1 dog, you have 10 dogs and he has no dogs?"
match = re.findall("\d+ dogs?", line)
print(match)
['1 dog', '10 dogs']
```

**?** Används för att en karaktär ska vara valfri. I vårt mönster så letar vi efter minst en siffra efter följt av ordet "dog" som _kan_ efterföljas av ett "s".

```python
line = """
-32.44
1
.23
+342
5.3
"""
match = re.findall("[-+]?[0-9]*\.?[0-9]+", line)
print(match)
['-32.44', '1', '.23', '+342', '5.3']
```

**\*** Representerar noll eller flera karaktärer som den efterföljer.  
Låt oss gå igenom mönstret. **[-+]?** Representerar ett "-" eller ett "+" noll eller en gång. **[0-9]\*** Representerar siffrorna noll till nio, noll eller flera gånger. **\\.?** Matchar en punkt eller ingen punkt. **[0-9]+** Matchar siffrorna noll till nio en gång eller flera.

```python
line = """
0455-16142
0709-374955
0768475863
"""
match = re.findall("\d{4}-?\d{5,6}", line)
print(match)
['0455-16142', '0709-374955', '0768475863']
```

Ovanför använder vi oss av **{}** för att matcha ett specifikt antal karaktärer och ett intervall av karaktärer.  
**\d{4}** Letar efter exakt fyra siffror efter varandra och **\d{5,6}** letar efter fem till sex siffror efter varandra.



###Gruppering {#gruppering}

Gruppering, **()**, används för att kapsla in eller plocka ut en grupp karaktärer ur en matchade strängen. Det går att återanvända gruppen i mönstret genom att referera till den fångade gruppen.  
Om mönstret innehåller minst två stycken grupper när man använde re.findall(), returneras en lista med tuples istället för en lista med strängar. Varje tuple är en matchning av mönstret och tuple[0] är första gruppen och tuple[1] är grupp nummer två osv.

```python
line = """
someones name is Andreas and is called zeldah and has the email Zeldah@outlook.com.
another one is named Kenneth and is called lew and has the email Lew@gmail.com.
"""
match = re.findall(".*\s([A-Z][a-z]*).*\s([A-Z]\w*@\w*\.[a-z]{3}).*\n", line)
print(match)

[('Andreas', 'Zeldah@outlook.com'), ('Kenneth', 'Lew@gmail.com')]

print(match[0][0] + " har mailadressen " + match[0][1])
Andreas har mailadressen Zeldah@outlook.com
```

Här har vi ett lite längre mönster där vi använder gruppering för att få ut namn och mailadress för två personer.
Med **([A-Z][a-z]\*)** matchar vi en samling bokstäver som börjar med en stor bokstav och gör en grupp av det med paranteser. **([A-Z]\w\*@\w\*\.[a-z]{3})** Används för att plocka ut e-mailadressen.  
I vårt fall består en e-mailadress av en stor bokstav(**[A-Z]**) följt av ett antal alfanumeriska karaktärer(**\w\***), ett snabel-a, fler alfanumeriska karaktärer(**\w\***), en punkt(**\.**) och tre små bokstäver(**[a-z]{3}**).

Det går även att skapa grupper i grupper. De läses från vänster till höger, det betyder att den inre grupper kommer efter den yttre.

```python
line = """
Zeldah@outlook.com.
Lew@gmail.com.
"""
match = re.findall("(([A-Z]\w*)@\w*\.[a-z]{3}).*\n", line)
print(match)
[('Zeldah@outlook.com', 'Zeldah'), ('Lew@gmail.com', 'Lew')]
```

Ovanför har vi skapat en till grupp inuti gruppen som hämtar ut mailadressen. Den nya gruppen hämtar ut namnet på användaren ur mailadressen.

```python
line = """
Washington, 1789-1797
Adams, 1797-1801
Geer, 1876-1880
Posse, 1880-1883
"""
match = re.findall("(Geer|Posse), (\d{4}-\d{4})", line)
print(match)
[('Geer', '1876-1880'), ('Posse', '1880-1883')]
```

För att få ut de två första statsministrarna från sverige och deras mandatperioder och inte de två första presidenterna från USA använder vi "**|**"(OR operatorn). I den första gruppen matchar vi "Geer" eller "Posse" och i den andra gruppen matchar vi årtalen för deras mandatperioder.

Nu ska vi gå igenom hur man refererar till en grupp. Vi kommer att använda oss av raw string notation för mönstret (r"mönster"), då kan vi skriva **\1** istället för **\\\1**.  


```python
line = """
Polar Bears eat Polar Bears
Dogs eat stuff
Rabbits eat Rabbits
Pigs eat Pigs
"""
match = re.findall(r'([\w ]+) eat \1\n', line)
print(match)
['Polar Bears', 'Rabbits', 'Pigs']
```

Vi använder regex för att plocka ut vilka djur som är kannibaler. Vi börjar med att matcha en djurart och gör en grupp av den, **([\w ]+)**, sen kommer "eat" och om djurarten kommer igen **\1** är den kannibal och då är vårat mönster matchat.



###Sök och ersätt {#sok_och_ersett}

[_re.sub()_](https://docs.python.org/3/library/re.html#re.sub) söker igenom en sträng och byter ut alla stycken som matchar mönstret. re.sub tar parametrarna mönster, sträng att ersätta med och strängen.  
re.sub är jättebra när man behöver ändra samma sak flera gånger i en text. T.ex. byta från windows-radbrytning till unix-radbrytning eller byta namn på en person som förekommer ofta i en text.

I exemplet nedan kommer vi använda oss av sub för att få varje mening på en egen rad.

```python
line = """Lorem ipsum dolor sit amet. Proin fringilla nibh fringilla ipsum eleifend. Aenean lacus erat. Suspendisse hendrerit."""
match = re.sub(r'\. ', r'.\n', line)
print(match)
Lorem ipsum dolor sit amet.
Proin fringilla nibh fringilla ipsum eleifend.
Aenean lacus erat.
Suspendisse hendrerit.
```

Mönstret matchar alla punkter som efterföljs av ett space och ersätter det med en punkt och en ny rad.

I nästa exempel kommer vi gå igenom hur man kan använda sig av grupper för att ersätta med text från texten. Vi använder raw string notation igen då vi ska referera till grupper.

```python
line = """someones name is Andreas and is called zeldah and has the email Zeldah@outlook.com.
another one is named Kenneth and is called lew and has the email Lew@gmail.com.
"""
match = re.sub(r'([A-Z][a-z]+)(.*)[A-Z][\w]+', r'\1\2\1', line)
print(match)
someones name is Andreas and is called zeldah and has the email Andreas@outlook.com.
another one is named Kenneth and is called lew and has the email Kenneth@gmail.com.
```

I exemplet ovan använder vi sub funktionen för att ändra personernas mailadresser från att använda smeknamn som användarnamn till att använda riktiga namn.
Vi vill bara ändra ett ord i texten men för att ändra användarnamnet behöver vi även matcha namnet som vi vill byta till. Detta gör att vi behöver matcha mer än det vi vill byta ut. Sub funktionen byter ut all som matchas med mönstret vilket leder till att vi behöver göra grupper av allt vi vill ha kvar i strängen som vi har matchat. I detta fallet är det **(.\*)**, som vi gör en grupp av endast så vi kan ersätta det med sig självt. Det samma gäller för när vi hämtar ut det riktiga namnet.  
Den första gruppen matchar namnet vi ska byta till ("Andreas"), **([A-Z][a-z]+)**, den andra gruppen fångar upp allt mellan namnet och mailadressen (" and is called zeldah and has the email "), **(.\*)** och det sista i mönstret matchar det vi vill byta ut ("Zeldah"), **[A-Z][\w]+**. Hela denna texten kommer ersättas men egentligen vill vi bara byta ut "Zeldah". Vi ersätter texten med grupp 1, grupp 2 och grupp 1 vilket blir "Andreas", " and is called zeldah and has the email " och "Andreas".



Avslutningsvis {#avslutning}
------------------------------

Det här blev en lång artikel om regex, men nu förstår ni förhoppningsvis tillräckligt för att klara labben.

Vill tipsa igen om <https://regex101.com/#python>. Bra om man vill få en förklaring av ett mönster eller om man bara vill testa ett mönster.

Det finns bra sidor online där man kan öva sig på regex: <http://regexone.com/>, <https://regexcrossword.com/> och <http://regex.alf.nu/>.

Dokumentation för re modulen: <https://docs.python.org/3/library/re.html#>.

Pythons egna regex guide: <https://docs.python.org/3/howto/regex.html>
