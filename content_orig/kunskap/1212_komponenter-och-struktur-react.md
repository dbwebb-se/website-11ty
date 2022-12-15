---
author: efo
category: javascript
revision:
  "2022-03-07": (A, efo) Första utgåvan inför kursen webapp-v4 VT22.
...
Komponenter och struktur i React
==================================

Vi ska i denna övning titta på hur vi kan använda komponenter för att bygga ut vår applikation. I slutet av övningen tittar vi på strukturen för vår app och specifikt hur vi kan förbättra kommunikationen med Lager-API:t.

Vi tar även en titt på TypeScript och hur vi kan använde det för att skapa en typad app.



<!--more-->


[INFO]
Koden som skrivs i denna övning är inte fullständig och vissa delar behövs fyllas i av er som studenter i uppgiften "[Lager appen del 2](uppgift/lager-appen-del-2-v2)".
[/INFO]



Förkunskaper {#prereqs}
--------------------------------------

Du har gjort uppgiften "[Lager appen del 1](uppgift/lager-appen-del-1-v2)" och övningen "[Routing och navigation i React](kunskap/routing-och-navigation-i-react)".



List-Details {#listdetails}
--------------------------------------

I många sammanhang vill vi kunna gå från en lista med till exempel ordrar till den enskilda ordern och eventuellt tillbaka igen. För att vi ska kunna göra detta i React Native vi behöver en `StackNavigator`. Så vi börjar med att installera den:

```shell
npm install @react-navigation/native-stack
```

Vi lägger den i vår `Pick`-komponent, som blir som nedanstående.

```javascript
import { createNativeStackNavigator } from '@react-navigation/native-stack';

import OrderList from './OrderList.tsx';
import PickList from './PickList.tsx';

const Stack = createNativeStackNavigator();

export default function Pick() {
    return (
        <Stack.Navigator initialRouteName="List">
            <Stack.Screen name="List" component={OrderList} />
            <Stack.Screen name="Details" component={PickList} />
        </Stack.Navigator>
    );
}
```

Precis som när vi skapade vår Tab-navigation skapar vi i ovanstående kodexempel en `StackNavigator` som har två olika komponenter en `OrderList` och en `PickList`. Låt oss ta en titt på `OrderList`-komponenten först.



List-vyn {#list}
--------------------------------------

I vår `OrderList`-vy vill vi skriva ut alla ordrar och sedan ha möjligheten för att gå till en plocklista för specifika ordrar, som vi sedan vill kunna packa.

Vi vill börja med att rita ut en rubrik och sedan en lista med alla ordrar som har den specifika statusen "Ny". Vi behöver alltså hämta alla ordrar från lagret och filtrera ut de med rätt status. Från kmom01 vet vi hur vi hämtar och sparar en lista med data som en del av `state` i vår app. Så vi utnyttjar den kunskapen för att göra likadant med ordrar.

```javascript
// OrderList.tsx
import { useState, useEffect } from 'react';
import { View, Text, Button } from "react-native";
import config from "./../config/config.json";

export default function OrderList({ navigation }) {
    const [allOrders, setAllOrders] = useState([]);

    useEffect(() => {
        fetch(`${config.base_url}/orders?api_key=${config.api_key}`)
          .then(response => response.json())
          .then(result => setAllOrders(result.data));
    }, []);

    const listOfOrders = allOrders
        .filter(order => order.status === "Ny")
        .map((order, index) => {
            return <Button
                title={order.name}
                key={index}
                onPress={() => {
                    navigation.navigate('Details', {
                        order: order
                    });
                }}
            />
        });

    return (
        <View>
            <Text>Ordrar redo att plockas</Text>
            {listOfOrders}
        </View>
    );
}
```

Återigen importerar vi `useState` och `useEffect`. Vi hämtar alla ordrar från Lager-API:t och sparar de som en del av `state` i `allOrders` arrayen. Sedan använder vi ytterligare en av `Array.prototype` funktionerna `filter`. `filter` itererar över alla element i en array och returneras `true` från funktionen läggs elementet i den resulterande array annars läggs den inte till. Vi filtrerar på `order.status` i detta fallet och vill bara ha med de som har status "Ny". Sedan gör vi på samma sätt som tidigare att vi använder `map` för att iterera över alla ordrar med status "Ny". För varje order ritar vi ut en knapp `Button`-komponent.

```javascript
return <Button
    title={order.name}
    key={index}
    onPress={() => {
        navigation.navigate('Details', {
            order: order
        });
    }}
/>
```

Här ser vi att vi skapar en knapp samt ger den ett värde som visas upp (title) och en nyckel (key). Sen använder vi oss av `onPress`-callbacken för att navigera till vår `Details` vy som vi definierade i `StackNavigator`. `navigation` objektet har vi med sen anropet till vår `OrderList`-komponent. Vi skickar med den specifika ordern som parameter till vyn och vi kommer i kommande stycke se hur vi kan hämta in den parametern.



Detalj-vyn {#details}
--------------------------------------

I plocklista-vyn vill vi visa upp information om ordern och sedan vilka produkter som ingår i ordern. Vi kan från `route` objektet som per automatik skickas med som parameter till vår komponent när komponenten är en del av en navigationen hämta ut `order`. Vi ritar sedan ut information om ordern och de orderrader som finns för ordern. Sista delen av komponenten är att rita ut knappen för att plocka ordern. Vi skapar sedan en funktion i vår komponent som vi vill ska anropas när vi trycker på knappen. Vi lägger funktionen i komponenten för att vi vill att funktionen ska göra mer än en sak.

I nästa stycke ska vi titta på hur vi kan flytta logiken för att kommunicera med Lager-API:t till en egen fil - en modell i frontend. Det är det som gör att vi kan göra `await orderModel.pickOrder(order);`. Efter att vi har kommunicerat klart med API:t navigerar vi sedan tillbaka till `List`-vyn.

```javascript
import { View, Text, Button } from "react-native";
import orderModel from "../models/orders.ts";

export default function PickList({ route, navigation }) {
    const { order } = route.params;

    async function pick() {
        await orderModel.pickOrder(order);
        navigation.navigate("List");
    }

    const orderItemsList = order.order_items.map((item, index) => {
        return <Text
                key={index}
                >
                    {item.name} - {item.amount} - {item.location}
            </Text>;
    });

    return (
        <View>
            <Text>{order.name}</Text>
            <Text>{order.address}</Text>
            <Text>{order.zip} {order.city}</Text>

            <Text>Produkter:</Text>

            {orderItemsList}

            <Button title="Plocka order" onPress={pick} />
        </View>
    )
};
```



En modell i frontend {#modell}
--------------------------------------

För att separera koden som kommunicerar med Lager-API:t och vår kod som ritar upp de olika komponenterna vill vi ska modeller i frontend. Vi använder oss av att vi har satt upp vår app som ett TypeScript projekt. Vi kan då skapa en fil `lager/models/orders.ts` som tar hand om kommunikationen med Lager-API:t och mer specifikt då order delen av API:t.

```javascript
import config from "../config/config.json";

const orders = {
    getOrders: async function getOrders() {
        const response = await fetch(`${config.base_url}/orders?api_key=${config.api_key}`);
        const result = await response.json();

        return result.data;
    },
    pickOrder: async function pickOrder() {
        // TODO: Minska lagersaldo för de
        // orderrader som finns i ordern

        // TODO: Ändra status för ordern till packad
    }
};

export default orders;
```

Vi har nu möjlighet för att på ett enkelt sätt hämta alla ordrar med hjälp av anropet `const orders = await orderModel.getOrders();` eller `await orderModel.pickOrder()` i de filer där vi har importerat modellen.

En rekommendation är att utnyttja denna möjligheten och hålla all kommunikation med API:t i modeller. Dessutom kan det vara fördelaktigt att skapa modeller för alla de olika delarna av API:t, så att det hålls uppdelat på ett bra sätt.



TypeScript {#typescript}
--------------------------------------

[TypeScript](https://www.typescriptlang.org) är en utökning av JavaScript syntaxen och en infrastruktur runt språket som gör att vi kan skriva typat JavaScript. Det som TypeScript gör är att ge oss ett stöd under utvecklingsprocessen, men det som produceras i slutändan är helt vanlig JavaScript som webbläsaren kan förstå och exekvera.

Anledningarna till att vi använder TypeScript i denna kursen är främst för att det underlättar vid utveckling och refaktorering, samt att det skapar en säkrare applikation genom att vi upptäcker problem under utveckling. Samtidigt är det en teknik i stark växt och vi vill ge er möjligheten att få bekanta er med en teknik som våra alumni från kurspaketen och programmen rekommenderar starkt.

Vi kommer använda TypeScript på ett "opt-in"-sätt, så vi kommer långsamt men säkert bekanta oss med möjligheterna i TypeScript under kursens gång.



### Typade variabler {#typed-variables}

I vanliga fall när vi skapar en variabel i JavaScript skapas den med nyckelorder `let` (eller `var` om gamla vaner hänger i).

```javascript
let myVariable = "elephant";
```

Har vi TypeScript som en del av vår utvecklingsmiljö kommer TypeScript automatiskt förstå att denna variabeln är av typen sträng. Men för att förtydliga både för datorn men i minst lika hög grad för oss själva eller andra utvecklare kan vi ange explicit vilken typ vi vill att en variabel ska ha. Vi gör det genom att skriva typen efter variabel namnet så i vårt exempel:

```javascript
let myVariable: string = "elephant";
```



### Typade parametrar {#parameters}

Ett annat användningsområde är för funktioner där vi vill ta emot argument och vi vill ha kontroll på datatypen för argumenten som funktionen anropas med. Vi kan då ange typen för argumenten i funktionsdefinitionen och TypeScript kommer lyfta ett fel i vår utvecklingsmiljö om vi skickar in fel typade argument.

```javascript
function birthdayGreeter(name: string, day: Date) {
    return `${name} has birthday on ${day.toDateString()}`;
}
```

Vi kan förbättra detta ytterligare genom att också definiera vilken datatyp vi vill att funktionen har som returvärde på följande sätt.

```javascript
function birthdayGreeter(name: string, day: Date): string {
    return `${name} has birthday on ${day.toDateString()}`;
}
```



### Interfaces {#interfaces}

Den sista saken vi ska titta på i denna övningen är [Interfaces](https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#interfaces). Ett interface är ett sätt för oss att definiera egna typer och de underliggande datatyper för objektens attribut ska definieras. Låt oss utgå från ett exempel med ordrar i Lager-API:t och skapa en order-datatyp i TypeScript. Vi definierar det som ett interface och sedan listar vi de ingående attribut för ordrarna. Nedanstående kodexempel utgår ifrån att vi har definierat ett `OrderItem` interface med som vi har importerat in i filen där vi definierar `Order`.

```javascript
interface Order {
    id: number,
    name: string,
    address: string,
    zip: number,
    city: string,
    country: string,
    status: string,
    status_id: number,
    order_items: Array<OrderItem>,
}
```

Vi kan nu när vi hämtar ordrar från Lager-API:t eller skickar med en order som argument till en funktion specificera att data ska uppfylla vårt interface. Ibland vill vi bara skicka med en del av ett objekt/interface och det kan vi göra med nyckelorder `Partial<Order>`. Då sätts alla attribut till optional och vi kan till exempel bara skicka med namn, id och status.

```javascript
async function pickOrder(order: Partial<Order>) {

}
```

Det kan vara bra att skapa lite ytterligare struktur i våra projekt genom att till exempel skapa en katalog interfaces och där spara alla interfaces, så kan vi på ett lätt sätt komma åt de i de olika modeller vi skapar under kursens gång.



Struktur för vår styling {#styling}
--------------------------------------

Den sista delen i denna övningen är att strukturera upp styling. Just nu är det spritt ut över hela applikation och vi har säkert redan skrivit samma styling kod ett flera antal gånger. Vi kommer utnyttja möjligheten för att importera och exportera JavaScript filer till en `index.js`.

Först skapa en katalog `styles` och i den ligger du en fil `index.js` som du fyller med nedanstående innehåll.

```javascript
import * as Base from './base';
import * as Typography from './typography';

export { Base, Typography };
```

Vi kan nu i våra komponenter importera all stil med `import { Base, Typography } from '../styles';` sedan kan vi använda både `Base` och `Typography` i våra komponenter på följande sätt.

```javascript
<Text style={Typography.header2}>Lagerförteckning</Text>
```

I ovanstående kodexempel använder vi en rubrik på nivå 2 ungefär som ett `<h2>`-element som vi är vana vid från HTML.

I `styles/typography.js` har vi definierat de olika stilarna vi vill ha för vår applikation. Det förväntas att ni skapar `styles/base.js` själva, ett förslag är att använda attributen från kmom01.

```javascript
export const header1 = {
    fontSize: 42,
    marginBottom: 28,
};

export const header2 = {
    fontSize: 34,
    marginBottom: 28,
};

export const header3 = {
    fontSize: 28,
    marginBottom: 28,
};

export const normal = {
    fontSize: 20,
    marginBottom: 28,
};
```



Struktur överblick {#overview}
--------------------------------------

För att få en överblick över strukturen som den kan se ut syns min katalog-struktur nedan:

```shell
BTHMAC0169:lager efo$ tree -L 2 .
.
├── App.tsx
├── app.json
├── assets
│   ├── adaptive-icon.png
│   ├── favicon.png
│   ├── icon.png
│   ├── splash.png
│   └── warehouse.jpg
├── babel.config.js
├── components
│   ├── Home.tsx
│   ├── OrderList.tsx
│   ├── Pick.tsx
│   ├── PickList.tsx
│   └── Stock.tsx
├── config
│   └── config.json
├── interfaces
│   ├── order.ts
│   └── order_item.ts
├── models
│   ├── orders.ts
│   └── products.ts
├── node_modules
├── package-lock.json
├── package.json
├── styles
│   ├── base.js
│   ├── index.js
│   └── typography.js
├── tsconfig.json
└── yarn.lock
```



Uppdatering av state i andra komponenter {#state}
--------------------------------------

Vi har vid det här laget förstått att React komponenter uppdateras när `state` ändras i vyn. Det är det som har gjort React till ett så populärt ramverk, men kan också vara lite väl auto-**magiskt** ibland. Det som däremot inte händer är att ny eller uppdaterad data hämtas från servern eller att `state` i andra komponenter uppdateras per automatik.

Vi ska i följande stycken titta på två sätt att få en komponent att uppdatera en annan komponent. Först tittar vi på hur vi kan använda inbyggda sättet i navigations-komponenten och sedan tittar vi på konceptet "Lifting state up".



### Navigations-attribut {#navigation-attribute}

I funktionen `pick` som vi använder oss av när vi vill plocka en order använder vi oss av `navigation.navigate` för att navigera tillbaka till listan med ordrar.

```javascript
async function pick() {
    await orderModel.pickOrder(order);
    navigation.navigate("List", { reload: true });
}
```

Vi kan i denna funktionen skicka med ett andra argument som är parameter till den vyn vi kommer till. I det här fallet skickar vi med `reload: true`. I List-vyn kan vi sen fånga upp denna parameter och använda den för att hämta ordrarna från API:t på nytt enligt nedan.

```javascript
export default function OrderList({ route, navigation }) {
    const { reload } = route.params || false;
    const [allOrders, setAllOrders] = useState([]);

    if (reload) {
        reloadOrders();
    }

    async function reloadOrders() {
        setAllOrders(await orderModel.getOrders());
    }

    useEffect(() => {
        reloadOrders();
    }, []);

    // resten av komponenten
}
```



### Lifting State Up {#lifting-state-up}

I exemplet ovan går vi från en vy till en annan och vill uppdatera `state` i den vyn vi kommer till. Ibland vill vi dock uppdatera `state` i en komponent som finns någon annanstans i appen. I React kan vi enbart skicka `props` (till exempel attribut och funktioner) neråt i komponent trädet.

Konceptet vi kommer använda oss heter i React sammanhang "[Lifting state up](https://reactjs.org/docs/lifting-state-up.html)". Konceptet handlar om att istället för att `state` placeras i komponenten där vi vill använda oss av den specifika data flyttar vi upp `state` till första gemensamma förälder komponent.

I exemplet med plocklistan från ovan vill vi uppdatera lagersaldot i `Home`-komponenten när vi har plockat en order i `PickList`. Den närmaste gemensamma föräldern för `Home`-komponenten och `PickList`-komponenten är `App`-komponenten.

Vi tar och flyttar upp `const [products, setProducts] = useState([]);` från `StockList` till `App.tsx`. Sedan skickar vi med `products` och `setProducts` som `props` ner igenom komponent-trädet. Vi börjar i `App.tsx` där vi tidigare har haft `<Tab.Screen name="Lager" component={Home} />`. För att vi ska kunna skicka med egna props till komponenten använder vi oss av [`children`-callbacken](https://reactnavigation.org/docs/screen/#children).

```javascript
<Tab.Screen name="Lager">
    {() => <Home products={products} setProducts={setProducts} />}
</Tab.Screen>
```

Vi kan nu i `Home`-komponenten komma åt `products` och `setProducts` med hjälp av `props`.

```javascript
export default function Home({products, setProducts}) {
    return (
        <ScrollView style={styles.base}>
            <Text style={styles.header}>Lager-Appen</Text>
            <Image source={warehouse} style={{ width: 320, height: 240, marginBottom: 28 }} />
            <Stock products={products} setProducts={setProducts} />
        </ScrollView>
    );
}
```

Vi vidarebefordrar sen `products` och `setProducts` ner i komponent trädet två gånger först till `Stock` och sedan till `StockList`. I `StockList` tar vi emot `props` på samma sätt som i `Home` och kan använda de precis som vi gjort tidigare i komponenten.

```javascript
function StockList({products, setProducts}) {
  useEffect(async () => {
    setProducts(await productModel.getProducts());
  }, []);

  const list = products.map((product, index) => {
    return <Text
            key={index}
            style={{ ...Typography.normal }}
            >
              { product.name } - { product.stock }
            </Text>
  });
  // resten av komponenten.
}
```

Om vi gör samma sak ner i komponentträdet men istället till komponenten `PickList` kan vi uppdatera vår `pick`-funktion till följande.

```javascript
export default function PickList({ route, navigation, setProducts }) {
    const { order } = route.params;
    const [productsList, setProductsList] = useState([]);

    useEffect(async () => {
        setProductsList(await productModel.getProducts());
    }, []);

    async function pick() {
        await orderModel.pickOrder(order);
        setProducts(await productModel.getProducts());
        navigation.navigate("List", { reload: true });
    }
    // resten av komponenten
}
```

`setProducts` uppdaterar då `products` i `App.tsx` och med det ritas `StockList` om med nya data.

För att det ska fungera med `route` och `navigation` som tidigare skickades med automatisk till komponenten `PickList` behöver vi explicit skicka med de till `PickList`. I `Pick`-komponenten lägger vi följande.

```javascript
export default function Pick(props) {
    return (
        <Stack.Navigator initialRouteName="List">
            <Stack.Screen name="List" component={OrderList} />
            <Stack.Screen name="Details">
                {(screenProps) => <PickList {...screenProps} setProducts={props.setProducts} />}
            </Stack.Screen>
        </Stack.Navigator>
    );
}
```

Till `children`-callbacken fångar vi upp argumentet `screenProps` som innehåller `route` och `navigation` och med hjälp av `...`-spread operatorn lägger vi till `props` till `PickList` komponent.



Avslutningsvis {#theend}
--------------------------------------

Vi har i denna övning förbättrat strukturen i vår kod med hjälp av olika konstruktioner. Vi tar med oss modeller i frontend, TypeScript och Strukturen för styling som de viktigaste lärdomarna.
