---
...
Nummer och `Number`
==================================

JavaScript hanterar heltal, flyttal och hexadecimala tal som literaler. Vissa implementationer stödjer även oktala tal men det stödjs ej i standarden så vi undviker dem som literaler.

```javascript
2              // Integer
42             // Integer
4.2            // Float
3.14159265     // Float
7.01e11        // Float 701000000000
1.4297E-14     // Float 0.000000000000014297
0xff           // Hexadecimal
0x1a0f         // Hexadecimal
037            // Octal or not? Avoid octal numbers like this. 
               // Never start integer with 0

Math.sqrt(-1)       // Fails and returns NaN, Not a Number, special case.
parseInt('no way')  // Fails and returns NaN.
toInteger('no way') // Succeeds and returns 0.
```

När en matematisk funktion eller en parsning av ett number misslyckas så returneras värdet `NaN` som betyder "Not a number". [Läs mer om Nan](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/NaN). Om man har en större beräkning och en del ger Nan så kommer hela uttrycket att bli Nan. Det kan göra det lite svårt att felsöka en komplex beräkning som ger Nan, men dela upp beräkningen i delar så blir det enklare att felsöka.

När vi jobbar med nummer så stöds de vanliga [aritmetiska operatorer](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Operators) som vi känner igen från andra programmeringsspråk. 

Det finns en samling matematiska funktioner som är samlade i objektet [`Math`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Math). Med dessa kan du utföra vanliga matematiska beräkningar.

```javascript
Math.PI           // Constant value for PI
Math.random()     // Return a random number
Math.tan(2)       // Return tangent of 2
```

Det är objektet [`Number`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Number) som används när du jobbar med nummer. Konvertering av värden sker automatiskt mellan literal och objekt, ofta spelar det ingen roll men det är bra att veta om man vill ha lite extra koll. Kika på objektet Number för att se vilka standardfunktioner som det erbjuder.

Var uppmärksam på Nan och Infinity i dina beräkningar. Se följande exempel.

```javascript
> 1/0
Infinity
> 0/0
NaN
> 0/1
0

> NaN > Infinity
false
> Infinity > NaN
false
> Infinity < (Infinity + 1)
false
> Infinity + 1
Infinity
```


###Övning nummer {#uppgift-2}

Försök skapa ett exempelprogram som återskapar följande bild.

[FIGURE src=/image/snapht15/js-values-number.png caption="Olika varianter att visa upp nummer."]

Så här blev [mitt resultat](javascript/core/datatypes-and-values-using-numbers/).
