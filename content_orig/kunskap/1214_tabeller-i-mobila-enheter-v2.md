---
author: efo
category: javascript
revision:
  "2018-02-07": (A, efo) Första utgåvan inför kursen webapp v3.
...
Tabeller i mobila enheter
==================================

[FIGURE src=/image/webapp/table.png?w=c5 class="right"]

Tabeller används i stor utsträckning i affärssystem och andra administrationsgränssnitt. Ofta är dessa applikationer för desktop användare, men med tanke på i hur stor utsträckning mobila enheter används är det bra om tabeller även designas för små enheter. Det stora problemet med tabeller är ofta att det är mycket data på liten yta, som blir än mindre på en mobil enhet. Vi ska i denna övning titta på två sätt för att designa tabeller för mobila enheter.

Vi kommer avsluta övningen med att titta på hur vi skapar tabeller i React Native precis som vi gjorde med formulären i övningen "[Ett mobilanpassad formulär](kunskap/ett-mobilanpassad-formular-v2)".



<!--more-->



En tabell att börja med {#tabell}
--------------------------------------

Vi börjar med nedanstående tabell och redan här i övningen ser vi problemet. Det finns inte tillräckligt mycket plats för att visa tabellen utan radbrytningar i cellerna.

<table>
<thead>
<tr><th>Artikelnr.</th><th>Namn</th><th>Beskrivning</th><th>Lagersaldo</th><th>Lagerplats</th></tr>
</thead>
<tbody>
<tr><td>14-RNT</td><td>Skruv M14</td><td>Skruv M14, värmförsinkad</td><td>12</td><td>A1B4</td></tr>
<tr><td>12-RNT</td><td>Skruv M12</td><td>Skruv M12, värmförsinkad</td><td>14</td><td>A1B5</td></tr>
<tr><td>10-RNT</td><td>Skruv M10</td><td>Skruv M10, värmförsinkad</td><td>20</td><td>A1B6</td></tr>
<tr><td>08-RNT</td><td>Skruv M8</td><td>Skruv M8, värmförsinkad</td><td>2</td><td>A1B7</td></tr>
<tr><td>06-RNT</td><td>Skruv M6</td><td>Skruv M6, värmförsinkad</td><td>6</td><td>A1B8</td></tr>
<tr><td>14-TNT</td><td>Mutter M14</td><td>Mutter M14, värmförsinkad, passar 1214-RNT</td><td>13</td><td>A1C4</td></tr>
<tr><td>12-TNT</td><td>Mutter M12</td><td>Mutter M12, värmförsinkad, passar 1212-RNT</td><td>23</td><td>A1C4</td></tr>
<tr><td>10-TNT</td><td>Mutter M10</td><td>Mutter M10, värmförsinkad, passar 1210-RNT</td><td>12</td><td>A1C4</td></tr>
<tr><td>08-TNT</td><td>Mutter M8</td><td>Mutter M8, värmförsinkad, passar 1208-RNT</td><td>4</td><td>A1C4</td></tr>
<tr><td>06-TNT</td><td>Mutter M6</td><td>Mutter M6, värmförsinkad, passar 1206-RNT</td><td>1</td><td>A1C4</td></tr>
</tbody>
</table>

Jag har gjort i ordning en enkel hemsida med en tabell och tittar vi på denna sida i mobilen ser vi ännu mindre av tabellen. Vi noterar även att det nu går att scrolla hela sidan i sidled något vi vill försöka undvika på mobiler då det försvårar navigation. Så målet för de två designs vi gör är **inga radbrytningar i celler** och **tabellen får inte vara bredare än skärmen på mobila enheter**.

[FIGURE src=/image/webapp/screenshot-table-no-style.png?w=c7 caption="Tabellen i en mobil enhet."]



Metod 1: Scroll i sidled för tabellen {#sidled}
--------------------------------------

Vi börjar med radbrytningarna då det är enkelt att åtgärda. Vi definierar klassen `.table` och använder oss av möjligheten för att skriva 'nested' SASS kod, se [dokumentationen](http://sass-lang.com/documentation/file.SASS_REFERENCE.html#nested_rules) för mer information. Vi använder attributet `white-space` med värdet `nowrap`, detta gör att vi inte får radbrytningar i `th` och `td` elementen.

```scss
.table {

    th,
    td {
        white-space: nowrap;
    }
}
```

Då all data inte får plats i sidled vill vi sätta max bredden till 100% och sen vill vi tillåta scroll, men enbart för tabellen. För att få till scrollningen måste vi även sätta `display: block;` så tabellerna blir ett block-element istället för ett table-element.

```scss
.table {
    box-sizing: border-box;
    max-width: 100%;
    display: block;
    overflow-x: auto;

    th,
    td {
        white-space: nowrap;
    }
}
```

Nu har vi klarat av våra två mål: Vi har inga radbrytningar och tabellen är max 100% bred. Än så länge är det dock ingen vidare snygg tabell och det är svårt att snabbt se vilken rad i tabellen som data tillhör. Så låt oss lägga till avgränsning mellan varje rad i tabellen, öka den inre marginalen och vänsterställa texten i header-raden.

```scss
.table {
    box-sizing: border-box;
    width: 100%;
    display: block;
    overflow-x: auto;
    border-collapse: collapse;

    th {
        text-align: left;
    }

    td {
        border-top: 1px solid #ccc;
    }

    th,
    td {
        white-space: nowrap;
        padding: 0.2rem 0.8rem;
    }

    .number-cell {
        text-align: right;
    }
}

.table-striped {
    tr:nth-of-type(2n) {
        background-color: #eee;
    }
}
```

Jag har i exemplet ovan lagt till två stycken hjälpklasser `.table-striped` och `.number-cell`. `.table-striped` lägger till färg på varannan rad med hjälp av pseudo-klassen `:nth-of-type`. `.number-cell` högerställer texten i cellen för kolumner med, kan vara bra att ha för celler med numeriska värden. Nedan visas tabellen med klasserna `table.table.table-striped`.

[FIGURE src=/image/webapp/screenshot-table-scroll.png?w=c7 caption="Tabell med scroll i sidled."]

För att förbereda för metod 2 bryter vi ut delen som har med scrollningen i sidled till klassen `.table-scroll`. Detta gör att vi kan återanvända den generella stylingen för tabellerna, men beroende på vilken klass vi ger förutom `.table` ge olika beteenden för små enheter.

```scss
.table-scroll {
    width: 100%;
    display: block;
    overflow-x: auto;
}
```

För att se vilken effekt 'nested' SASS kod kan ge är här nedan CSS filen som skapas med kommandot `sass base.css style.css --style expanded`, vilket är den stilen som är mest lik läsbar CSS kod.

```css
.table {
  box-sizing: border-box;
  border-collapse: collapse;
}
.table th {
  text-align: left;
}
.table td {
  border-top: 1px solid #ccc;
}
.table th,
.table td {
  white-space: nowrap;
  padding: 0.2rem 0.8rem;
}
.table .number-cell {
  text-align: right;
}

.table-scroll {
  width: 100%;
  display: block;
  overflow-x: auto;
}

.table-striped tr:nth-of-type(2n) {
  background-color: #eee;
}
```



Metod 2: Stack {#stack}
--------------------------------------
Ett annat sätt att visa all data är att vända på tabellen och att istället för att visa data i kolumner visa det som rader. Detta fungerar då vi har mycket plats neråt och kan stapla raderna på varandra. Vi definierar en ny klass `.table-stacked`, som får ta hand om att stapla tabellen för små enheter. Vi använder därför ett breakpoint och en media-query för att få till staplingen av rader.

Först sätter vi `display: block;` för `table`, `tr` och `td` elementen, vi vill inte att några av dessa element ska visas som tabell-element. Vi flyttar bort kolumnnamnen utanför skärmen med attributet `position: absolute;` och stora negativa värden. Vi använder inte `display: none;` ur ett tillgänglighetsperspektiv, vi vill fortfarande att personer med skärmläsare (screen readers) kan få uppläst kolumnnamnen.

```scss
@media only screen and (max-width: 668px) {
    .table-stacked {
        display: block;

        tr {
            display: block;
        }

        // We do not use display: none; for accessibility reasons
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tbody {
            display: block;
        }

        td {
            display: block;
        }
    }
}
```

Nästa steg blir att flytta alla `td`-element ut till höger och i och med vi har `display: block;` på dessa element hamnar de på var sin rad. Vi definierar även att vi vill ha radbrytningar i dessa element med attributet `white-space:normal;`, finns tyvärr inte plats för all data horisontellt.

```scss
@media only screen and (max-width: 668px) {
    .table-stacked {
        display: block;

        tr {
            display: block;
        }

        // We do not use display: none; for accessibility reasons
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        td {
            display: block;
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            white-space: normal;
            text-align:right;
        }
    }
}
```

Sista steget är att använda ett data-attribut för att visa kolumnnamnen vänster om värdena. Vi lägger till detta på alla `td`-element i tabellen enligt exemplet nedan. Kom ihåg att byta ut kolumnnamnen så det passar till värdena.

```html
<tr>
    <td data-title="Artikelnr">14-RNT</td>
    <td data-title="Namn">Skruv M14</td>
    <td data-title="Beskrivning">Skruv M14, värmförsinkad</td>
    <td data-title="Lagersaldo" class="number-cell">12</td>
    <td data-title="Lagerplats">A1B4</td>
</tr>
```

Vi använder `position: absolute;` för att placera ut kolumnnamnen och `content: attr(data-title);` för att sätta värdet med hjälp av `data-title`.

```scss
@media only screen and (max-width: 668px) {
    .table-stacked {
        display: block;

        tr {
            display: block;
        }

        // We do not use display: none; for accessibility reasons
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        td {
            display: block;
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            white-space: normal;
            text-align:right;
        }

        td:before {
            /* För att visa tabell rubrik */
            content: attr(data-title);
            /* Använder top och left för efterlikna padding */
            position: absolute;
            top: 0.33rem;
            left: 0.33rem;
            width: 45%;
            padding-right: 0.55rem;
            white-space: nowrap;
            text-align:left;
            font-weight: bold;
        }
    }
}
```

Tabellen `table.table.table-striped.table-stacked` ser nu ut som nedanstående tabell i 'Responsive Design Mode'.

[FIGURE src=/image/webapp/screenshot-table-stacked.png?w=c7 caption="Tabell med staplade kolumner."]



Mellanspel {#bonus}
--------------------------------------
Istället för att visa all data i tabellen kan du som utvecklare/designer göra ett medvetet val att bara visa en del av data. Att helt enkelt välja att fokusera på de kolumner som är viktiga för precis denna vy istället för att alltid bara göra en spegling av databasen.

Exempel på detta är de två listor vi har gjort i kursmoment 1 och 2. I lagersaldo listan visar vi bara namn och antal. I plocklistan bara namn, antal och plats. Så på med designar hatten (kanske en designer har keps? eller varför inte en '[Blue Beanie](http://bluebeanieday.tumblr.com)') och gör ett medvetet val om vad som behöver visas för att skapa en enkel och lätt användbar tabell.



En tabell i React Native {#rn}
--------------------------------------

I React Native gör vi våra tabeller på ett litet annat sätt än vad vi är vana vid från HTML och som vi har sett ovan. Vi kommer använda oss av ytterligare en komponent som vi installerar.

Vi kommer i detta fallet installera ett paket som kan lite mer än bara tabeller och det är fritt fram att längre fram i kursen använda sig av de andra delarna av detta paketet. Paketet heter [React Native Paper](https://callstack.github.io/react-native-paper/index.html) och använder sig av "[Material Design](https://material.io/design/introduction)" som är Googles design system.

```shell
expo install react-native-paper
```

Om vi tänker oss en komponent med en array med data som vill rita upp en tabell med den data kan vi då göra på följande sätt:

```javascript
import { DataTable } from "react-native-paper";

export default function AnimalsTable() {
    const animals = [
        { name: "elephant", legs: 4, color: "grey"},
        { name: "kangaroo", legs: 2, color: "brown"},
        { name: "spider", legs: 8, color: "black"},
    ];

    const table = animals.map((animal, index) => {
        return (
            <DataTable.Row key={index}>
              <DataTable.Cell>{animal.name}</DataTable.Cell>
              <DataTable.Cell numeric>{animal.legs}</DataTable.Cell>
              <DataTable.Cell> {animal.color}</DataTable.Cell>
            </DataTable.Row>
        );
    });

    return (
        <DataTable>
            <DataTable.Header>
                <DataTable.Title>Animal</DataTable.Title>
                <DataTable.Title numeric># of legs</DataTable.Title>
                <DataTable.Title>Color</DataTable.Title>
            </DataTable.Header>
            {table}
        </DataTable>
    );
}
```

Vi har alltså längst ut `DataTable` och i det vill vi först ha `DataTable.Header` vilket motsvarar `<thead></thead>` i en HTML tabell. I header har vi kolumn rubrikerna, som vi i detta fallet har skrivit in hårdkodat.

Vi skapar en rad i tabellen per djur i vår `animals` array. Vi gör det som vi gjort tidigare med hjälp av `map`. I detta fallet returnerar vi dock en `DataTable.Row` per djur, som i sin tur innehåller 3 stycken `DataTable.Cell` med data från djur arrayen.



Avslutningsvis {#avslutning}
--------------------------------------
Vi har i denna artikel tittat på två sätt (+ ett bonus sätt) att visa data i tabeller för mobila enheter. Att visa mycket data på liten yta är aldrig lätt, men ovan finns två sätt som underlättar när vi gör responsiv design för mobila enheter.

Vi har dessutom tittat på hur vi åstadkommer bra tabeller i React Native.
