---
...
Strängar och `String`
==================================

Strängar omsluts med enkelfnutt `'` eller dubbelfnutt `"`, speciella tecken kan escapas med backslash `\` på samma sätt som i andra programmeringsspråk. En tom sträng är `''` eller `""`. Strängar kan även innehålla unicode tecken enligt `\uXXXX` där `XXXX` är fyra hexadecimala siffror. 

Strängkonkatenering sker med operatorn `+` eller `+=`.

Det finns en samling med sträng-funktioner som är samlade i objektet [`String`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/String).

###Typkonvertering {#typkonv}

JavaScript konverterar automatiskt mellan nummer och strängar vid behov. Se följande som ett exempel på hur värden av olika typer kan läggas ihop via automatiks typkonvertering.

```javascript
> 1 + 1
2
> "1" + 1
'11'
> 1 + "1"
'11'
> 1 + true
2
> "1" + true
'1true'
> true + 1
2
> true + 1 + NaN
NaN
```

Försök undvika att värden av olika typer beräknas på detta atuomatiska sätt, det kan bli en potentiell felkälla i din kod.



###Kontrollerad typkonvertering {#typkonv-kontr}

Vill du ha mer kontroll på hur konvertering sker kan du använda funktionerna [`parseInt()`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/parseInt) och [`parseFloat()`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/parseFloat) för att konvertera strängar till nummer och [`toString()`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Number/toString) för att konvertera nummer till strängar. 

Notera att `toString` anropas som en metod på ett objekt, medan `parseInt` och `parseFloat` kan anropas som en funktion.

```javascript
> a = 42
42
> a.toString()
'42'
> parseInt("42 mopeder")
42
```

Vid sidan av alla objekt finns även en uppsättning av [globala funktioner](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects), där `parseInt` och `parseFloat` är två av dem.



###Övning strängar {#uppgift-3}

Skriv ett program som utför följande hantering av strängar.

[FIGURE src=/image/snapht15/js-strings.png caption="Lite strängbearbetning för att förstå hur de fungerar."]

Så här gjorde jag mitt exempel.

Förste delen.

* Skapa och skriv ut strängen: `"Copyright © by XXX"`.
* Konkatenera strängen med strängen `" Mumintrollet "`.
* Konkatenera strängen med siffran `1942`.
* Lägg till en punkt i slutet av strängen.
* Skapa en ny sträng och ta bort `"XXX"` genom att plocka ut de två substrängar som inte innehåller `"XXX"` och slå samman dem till en ny sträng.

I andra delen ville jag se hur JavaScript automatiskt konverterar mellan strängar och nummer. Så jag gjorde fyra exempel som gjorde en tilldelning enligt följande och jag kontrollerade den resulterande typen.

```javascript
"19" + "42"
"19" + 42
19 + 42
19 + "42"
```

Så här blev mitt [testprogam för strängar](javascript/core/datatypes-and-values-using-strings/).
