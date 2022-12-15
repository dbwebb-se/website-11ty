---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...

Skriva till fil
=======================

Många gånger räcker det inte med att skriva ut resultatet i terminalen, utan vi vill spara undan det till fil. Det är faktiskt inte svårare än att göra en redirect:

```
$ awk -f regex.awk phones.txt > filename.txt
```



### Skapa en JSON struktur - alla rader {#json-all}

Vi kikar på hur vi kan bygga en JSON fil, det kan vara bara att ha koll på. Vi vill att resultatet ska vara valid JSON och det gör att vi behöver fixa lite mer med scriptet. Bland annat kan vi behöva skicka in argument. Vi kan böja med att utgå från att all data ska skrivas till JSON.

Vi uppdaterar scriptet och fångar alla rader utom första. Vi jobbar lite med våra prints och bygger upp en JSON struktur:

```
#!/usr/bin/env awk

BEGIN {
    FS=","
    print "["
}

NR==1 { next }

{
    print "\t{"
    print "\t\t\"brand\":\t\""$1"\","
    print "\t\t\"model\":\t\""$2"\","
    print "\t\t\"price\":\t\""$3"\","
    print "\t\t\"units\":\t\""$4"\""
    print "\t},"
}

END {
    print "]"
}
```

Vi styr formatteringen med tabbar, `\t`. Varje `print` hamnar på en ny rad. Om vi kör scriptet ovan är vi nästan i mål:

```
$ awk -f phones.awk phones.txt
...
{
        "brand":        "Samsung",
        "model":        "Galaxy S21+",
        "price":        "11500",
        "units":        "13"
},
{
        "brand":        "Samsung",
        "model":        "Galaxy Note20",
        "price":        "8000",
        "units":        "4"
},
]
```
Resultatet blir en JSON array med ett objekt för varje vara i lagret. Den kommer dock inte validera då vi har ett kommatecken för mycket i slutet. Detta kan man lösa på fler sätt, mer eller mindre krångliga. Vi kan dock inte få reda på hur många rader det är totalt vid rätt tillfälle inuti scriptet men vi kan få reda på det innan exekvering. Nu vet vi att vi vill ha hela filen utom första raden. Vi börjar med att uppdatera scripet:

```
...

    print "\t{"
    print "\t\t\"brand\":\t\""$1"\","
    print "\t\t\"model\":\t\""$2"\","
    print "\t\t\"price\":\t\""$3"\","
    print "\t\t\"units\":\t\""$4"\""

    if (NR == (lines)) {
        print "\t}"
    } else {
        print "\t},"
    }
}
```

Vi kollar om variabeln `lines` är samma som det nuvarande radnumret och skrivet ut kommatecknet baserat på det. Var kommer den variabeln ifrån då? Jo, vi skickar med den när vi exekverar scripet:

```
$ awk -v lines=$(wc -l < phones.txt) -f phones.awk phones.txt
...
{
                "brand":        "Samsung",
                "model":        "Galaxy S21+",
                "price":        "11500",
                "units":        "13"
        },
        {
                "brand":        "Samsung",
                "model":        "Galaxy Note20",
                "price":        "8000",
                "units":        "4"
        }
]
```

Det är ju såklart delen `-v lines=$(wc -l < phones.txt)`. Flaggan **-v** talar om att vi vill skicka med en variabel. Även om vi hoppar över första inuti scriptet kommer sista radnumret vara samma. Hur gör man då om man inte vet vilka radnummer som kommer vara med i resultatet?



### Skapa en JSON struktur - utvalda rader {#json-some}

Vi uppdaterar scriptet och fångar alla rader där telefonens modell hette något med `S` följt av två siffror. Vi bryter ned det efteråt:

```awk
#!/usr/bin/env awk

function printToJSON(brand, model, price, units) {
    print "\t\t\"brand\":\""brand"\","
    print "\t\t\"model\":\""model"\","
    print "\t\t\"price\":\""price"\","
    print "\t\t\"units\":\""units"\""
}

BEGIN {
    FS=","
    print "["
    counter = 0
}
{
    ans = match($2, /S[0-9]{2}/)

    if (ans) {
        items[counter++]=$0
    }
}

END {
    for (item in items) {
        print "\t{"

        split(items[item], temp, ",")
        printToJSON(temp[1],temp[2],temp[3],temp[4])

        if (item < length(items)-1) {
            print "\t},"
        } else {
            print "\t}"
        }
    }
    print "]"
}
```

Ojoj, här händer grejjer. Funktionen är inga konstigheter, utskriften är bara uppflyttad. Vi tittar på de andra nya delarna:

```awk
...
if (ans) {
    items[counter++]=$0
}
...
```

Om raden matchar det reguljära uttrycket lägger vi till den till en array. Variabeln *counter* är definierad i BEGIN blocket.

```awk
...
for (item in items) {
    print "\t{"

    split(items[item], temp, ",")
    printToJSON(temp[1],temp[2],temp[3],temp[4])

    if (item < length(items)-1) {
        print "\t},"
    } else {
        print "\t}"
    }
}
```

Vi loopar igenom vår array och för varje `item` i arrayen kör vi följande:

**split(items[item], temp, ",")** Vi använder en inbyggd funktion som konverterar en sträng till en array. Syntaxen för funktionen är `split(SOURCE, DESTINATION, DELIMITER)`. Som en bonus returneras antalet element.  
**printToJSON(temp[1],temp[2],temp[3],temp[4])** Vi skickar in de olika delarna till printfunktionen.  
**if (item < length(items)-1) { ...** Vi gör vår kontroll på det sista värdet och hoppar över kommatecknet.

Resultatet blir JSON som validerar. Avslutningsvis skriver vi det till en fil: `$ akw -f phones.awk phones.txt > phones.json`.

Som ett sista alternativ kan vi sätta en variabel i BEGIN blocket, tex `filename = "phones.json"`. Vi kan sedan lägga till `> filename` till alla prints i scriptet. I END blocket måste vi då stänga strömmen till filen med `close(filename)`. Då kan vi exekvera scriptet utan redirect: `$ akw -f phones.awk phones.txt`.
