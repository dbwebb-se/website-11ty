---
...
Boolska värden och `Boolean`
==================================

Det finns ett objekt [`Boolean`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Boolean) som automatiskt används vid typkonvertering av uttryck till `true` och `false`. Det kan vara bra att veta att det finns ett objekt i bakgrunden men normalt behöver man inte tänka på det utan kan använda `true` och `false` som vanliga literaler. 

Det finns ingen anledning att explicit använda objektet `Boolean` över huvudtaget. Det räcker bra med literalerna `true` och `false`. Eller som det står i MDN manualen:

> *"Do not use a Boolean object in place of a Boolean primitive."*

Följande värden är falska: `false`, 0, den tomma strängen (""), `NaN`, `null`, och `undefined`. Alla andra värden är sanna, `true`.

Ett sätt att omvandla godtyckligt värde till ett boolskt värde är att använda dubbla utropstecken.

```javascript
!42   // false
!!42  // true
```

Vill vi testa att ovanstående stämmer så kan vi skriva följande konstruktion i webbläsarens devtools.

```javascript
!42 === false  // true
!!42 === true  // true
typeof(!42) === "boolean" // true
```

Det är bra att använda devtools för att testa konstruktioner man är fundersam på. Det ger svar direkt.

Att använda två `==` jämför värdet, att använda tre `===` innebär jämförelse även mot datatypen. Det är bra att använda `===` för att undvika bekymmer vid automatisk konvertering av värden.
