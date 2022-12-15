---
author: efo
category: javascript
revision:
  "2017-03-15": (A, efo) Första utgåvan inför kursen webapp v2.
...
Ett mobilanpassad formulär
==================================

[FIGURE src="/image/webapp/form.jpeg?w=c5" class="right"]

Vi ska i denna övning titta på hur vi med hjälp av HTML5 input gör våra mobila appar mer användarvänliga och säkra. I slutet av övningen tittar vi på hur vi skapar ett formulär i React Native.



<!--more-->



HTML5 input typer {#html5}
--------------------------------------

I och med introduktionen av HTML5 introducerades även ett antal nya [input typer](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input). Dessa typer specificerar vilken sorts data som inputfältet kan ta som indata. Detta gör det möjligt att hindra användaren från att fylla i fel sorts data, men även att anpassa användargränssnittet till det data som användaren skall fylla i. Nedan finns en listning av 6 input typer och hur den mobila enheten anpassas för input typen. Inputfälten visas i Android emulatorns webbläsare.

Det helt vanliga text input fältet ger ett vanligt tangentbord och ingen klient validering av vilka värden som fylls i.

```html
<input type="text">
```

[FIGURE src="/image/webapp/input-screenshot/input-text.png?w=200" caption="Text input"]



Om man har ett fält där användaren bara ska ange siffror kan man använda sig av `number`. Detta gör att tangentbordet på mobila enheter bytts ut mot ett numerisk och att det inte går att fylla i annat än karaktärer relaterade till siffror.

```html
<input type="number">
```

[FIGURE src="/image/webapp/input-screenshot/input-number.png?w=200" caption="Number input"]



Om användaren skall fylla i sin e-postadress kan det vara bra med et input av typen `email`. Det underlättar för användaren när man skall använda @.

```html
<input type="email">
```

[FIGURE src="/image/webapp/input-screenshot/input-email.png?w=200" caption="Email input"]



Vid ifyllning av telefonnummer kan det vara fördelaktigt att använda input av typen `tel`. Där får användaren upp ett numerisk tangentbord, som ser ut som det man använder när man skall ringa från en telefon.

```html
<input type="tel">
```

[FIGURE src="/image/webapp/input-screenshot/input-tel.png?w=200" caption="Telephone input"]



När vi har datumfält finns input av typen `date`. Med `date` får användaren av en mobil enhet upp en datum väljare. På desktop skiljer det mellan de olika webbläsare, men Chrome och Firefox ger användaren möjlighet för att välja datum formaterat enligt användarens inställningar. Det värde som skickas med när vi skickar formuläret är alltid formaterat enligt 'YYYY-MM-DD'.

```html
<input type="date">
```

[FIGURE src="/image/webapp/input-screenshot/input-date.png?w=200" caption="Date input"]



För fält där vi vill skriva in lösenord använder vi naturligtvis `password`.

```html
<input type="password">
```

[FIGURE src="/image/webapp/input-screenshot/input-password.png?w=200" caption="Password input"]



HTML5 validering av innehåll {#validering}
--------------------------------------

En viktig del av att designa ett formulär är att ge återkoppling till användaren om hen har fyllt i ett värde som är korrekt för detta fältet. Vi såg ovan att input-typen kan ta oss en bit på vägen, men vad om vi vill validera användarens innehåll ytterligare? "HTML5 to the rescue". Som alltid har MDN en bra artikel om dessa möjligheter: [Client-side form validation](https://developer.mozilla.org/en-US/docs/Learn/Forms/Form_validation).

I HTML5 finns fyra olika attribut vi kan använda på våra formulärfält för att validera innehållet.



### required

Om vi vill att ett specifikt fält måste vara ifyllt kan vi använda `required` på följande sätt. Om fältet är tomt när vi skickar formuläret, får vi upp en varning om detta.

```html
<input type="text" required="required">
```



### minlength & maxlength

Som vi nästan kan räkna ut baserad på attributen kan vi här bestämma minimums och maximums längd för vårt innehåll. Om du använder dessa se till att det inte hindrar någon i att fylla data. Till exempel om man sätter får hårda krav på ett namn eller liknande.

```html
<input type="text" minlength="3" maxlength="8">
```


### min, max & step

Kan användas tillsammans med numeriska input-fält (number, date, time, range) för att begränsa värdena. Step anger vilket steg användaren kan ta mellan olika värden.

```html
<input type="number" min="0" max="1" step="0.1">
```


### pattern

Om man vill ta det ett steg längre kan man använda så kallade reguljära uttryck för att validera fältens innehåll. Till exempel om vi vill validera ett personnummer kan vi göra följande.

```html
<input type="text" pattern="[0-9]{6}-[0-9]{4}" placeholder="YYMMDD-XXXX" >
```



### CSS-pseudoklasser

Ytterligare en fördel med form valideringen är att om fältet validerar får fältet pseudoklassen `:valid`. Om fältet inte validerar har det pseudoklassen `:invalid`. Vi kan sedan använda dessa pseudoklasser för att styla våra input fält. I nästa del av artikeln använder vi denna möjlighet.



Styling av formulär {#styling}
--------------------------------------

När vi designar formulärfält vill vi att de olika fälten ser likadana ut. Vi ska i denna del av övningen titta på hur vi kan designa formulärfält som är enhetligt designade i olika webbläsare. Hur vi ligger till genomtänkta förifyllda värden och hur vi tydligt visar för användaren vilket fält som är i fokus.

Vi börjar med den enhetliga stylingen. Vi börjar med att definiera klassen `.input` då kan vi använda klassen när vi vill ge styling till element. Vi vill som för knapparna ha ett mjukt utseende och rundar därför hörnen på samma sätt som för knapparna. Vi vill ha samma tunna ram runt knappen och vi vill ha samma typsnitt i formulärfälten som på resten av sidan. Vi vill även ha samma bredd på alla formulärfält trots de olika typer och vi specificerar bredden i `rem`. Vi ökar den inre marginalen (padding) så att fälten blir lättare att klicka på. Vi vill även ha ett avstånd mellan formulärfältet och sätter det som `margin-bottom`.

```scss
.input {
    font-size: $body-font-size;
    line-height: $line-height;
    font-family: $font-body;
    display: block;
    border: 1px solid #ccc;
    border-radius: 0.2rem;
    padding: 0.6rem 0.6rem;
    box-sizing: border-box;
    width: 32rem;
    margin-bottom: 1.4rem;
}
```

För att använda oss av `:valid` och `:invalid` pseudoklasserna kan vi göra följande. Här sätter vi ramen runt fältet till grön om det validerar och röd om det inte validerar.

```css
.input:valid {
    border: 1px solid green;
}

.input:invalid {
    border: 1px solid red;
}
```

För små mobila enheter vill vi inte att fälten har en fast bredd utan då ska de fylla ut hela bredden på skärmen. Då vi i grunddefinitionen har satt `box-sizing: border-box;`. Gör vi detta enkelt med nedanstående kod.

```scss
@media (max-width: 667px) {
    .input {
        width: 100%;
    }
}
```

En viktig del av formulärfälten är texten vi har som beskriver fälten med (label). Vi vill designa våra label och formulärfältet så det är tydligt vilka som hänger ihop. Igen börjar vi med att skapa en klass `.input-label` och ger bara style till den. Det enda vi gör är att använda `display: block;` och sätta typsnittet att det ska vara `bold`. Vi ökar upp marginal ovanför våra element för att klumpa ihop `label` och `input`.

```scss
.input-label {
    font-weight: bold;
    margin: 2rem 0 0 0;
    display: block;
}
```

Om man vill ha lite mindre marginal på första elementet med klassen `.input-label` kan man använda pseudoklassen `:first-of-type` enligt nedan.

```scss
.input-label:first-of-type {
    margin: 1rem 0 0 0;
}
```

Om man alltid vill ha ett kolon (:) efter `.input-label` kan man använda pseudo-elementet `::after`.

```scss
.input-label::after {
    content: ":";
}
```

Ett annat bra sätt att förtydliga för användaren vad som ska fyllas i är att använda sig av `placeholder` attributet. Detta görs i HTML på detta sättet `<input type="text" placeholder="Fyll i text">`. I mithril exemplet nedan finns exempel på hur man använder en placeholder i mithril.

Våra formulärfält ser nu ut enligt nedan och vi har nu samma styling trots olika webbläsare och olika typer av formulärfält.

[FIGURE src="/image/webapp/screenshot-inputs-chrome.png?w=c7" class="right" caption="Formulärfält i Chrome med ifylld data."]
[FIGURE src="/image/webapp/screenshot-inputs-firefox.png?w=c7" caption="Formulärfält i Firefox med placeholders."]



Ett formulär i React Native {#rn}
--------------------------------------

När vi bygger ett formulär i React Native är det tre saker vi vill få på plats. Formulärfält för att fylla i data, ett objekt som en del av `state` som håller koll på data i fälten och en funktion som tar hand om att skicka data till vårt API. Så låt oss börja med formulärfälten.

[INFO]
Koden som skrivs i denna övning är inte fullständig och vissa delar behövs fyllas i av er som studenter i uppgiften "[Lager appen del 3](uppgift/lager-appen-del-3-v2)".
[/INFO]

Som en del av React Natives Core Components finns [TextInput](https://reactnative.dev/docs/textinput). Vi kommer använda den för text och siffror och sedan kommer vi installera två olika sorters pickers för att ta hand om en dropdown och en datum väljare.

Precis som för Plocklista-vyn i kmom02 vill vi lägga till en ny vy i vår Tab-navigation. Denna nya vy innehåller i sin tur en StackNavigation precis som i kmom02.

```javascript
// components/Deliveries.tsx

import { createNativeStackNavigator } from '@react-navigation/native-stack';

import DeliveriesList from './DeliveriesList';
import DeliveryForm from './DeliveryForm';

const Stack = createNativeStackNavigator();

export default function Deliveries() {
    return (
        <Stack.Navigator initialRouteName="List">
            <Stack.Screen name="List" component={DeliveriesList} />
            <Stack.Screen name="Form" component={DeliveryForm} />
        </Stack.Navigator>
    );
};
```

I Deliveries-komponenten vill lista alla tidigare inleveranser ungefär som vi gjort tidigare, med den skillnaden att vi inte behöver kunna gå till en detalj-vy och se mer om inleveranser. Däremot vill vi ha en knapp som tar oss till inleverans-formuläret.

```javascript
// del av components/DeliveriesList.tsx

return (
    <View style={Base.base}>
        <Text style={Typography.header2}>Inleveranser</Text>
        {listOfDeliveries}
        <Button
            title="Skapa ny inleverans"
            onPress={() => {
                navigation.navigate('Form');
            }}
        />
    </View>
);
```



### Formulär-komponent {#form-component}

Vi skapar nu vår formulär komponent `DeliveryForm`. Vi börjar ganska enkelt med bara ett fält för att kunna fylla i kommentaren.

Nedan importerar vi först de olika hooks, Core Components, style och ett interface som behövs. Vi skapar sedan det objekt vi ska använda för att hålla den inleverans vi håller på att skapa i formuläret i `state`. Vi använder oss av möjligheten för att använda [Partial](https://www.typescriptlang.org/docs/handbook/utility-types.html#partialtype), det gör att vi inte behöver ett fullständigt objekt av typen `Delivery`. Det gör att vi i detta fallet kan fylla på objektet med data under tiden som användare fyller i.

```javascript
// components/DeliveryForm.tsx
import { useState } from 'react';
import { ScrollView, Text, TextInput, Button } from "react-native";
import { Base, Typography, Forms } from '../styles';

import Delivery from '../interfaces/delivery';

export default function DeliveryForm({ navigation }) {
    const [delivery, setDelivery] = useState<Partial<Delivery>>({});

    return (
        <ScrollView style={{ ...Base.base }}>
            <Text style={{ ...Typography.header2 }}>Ny inleverans</Text>

            <Text style={{ ...Typography.label }}>Kommentar</Text>
            <TextInput
                style={{ ...Forms.input }}
                onChangeText={(content: string) => {
                    setDelivery({ ...delivery, comment: content })
                }}
                value={delivery?.comment}
            />

            <Button
                title="Gör inleverans"
                onPress={() => {
                    addDelivery();
                }}
            />
        </ScrollView>
    );
};
```

Vi tar nu en titt på formulärfältet för kommentaren. Vi sätter värdet på formulär fältet till att spegla värdet som finns i `state`. Vi använder [Optional Chaining operatorn ?.](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Optional_chaining) för att kolla om `delivery` är definierat innan vi efterfrågar `comment` attributet. Detta gör att vi inte får problem med `undefined`. Varje gång vi ändrar texten anropas `onChangeText`-eventhanteraren. Den funktionen får argumentet `content`, som är innehållet av formulärfältet.

Vi vill nu ändra i `delivery.comment`, men för att `setDelivery` förväntar sig hela objektet använder vi spread operatorn `...` och skriver sedan över `comment` attributet genom att lägga till den i slutet av objektet.

```javascript
<TextInput
    style={{ ...Forms.input }}
    onChangeText={(content: string) => {
        setDelivery({ ...delivery, comment: content})
    }}
    value={delivery?.comment}
/>
```

Vi använder oss av [Spread Operator](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Spread_syntax) i kodexemplet ovan `{ ...delivery, comment: content }`. Spread Operator kan användas på både arrayer och objekt. För arrayer delas varje element ut som argument som en funktion, så `...[1, 2, 3] => 1, 2, 3`. För ett objekt spridas nyckel-värde paren ut på följande sätt:

```javascript
let person = {
    name: "Emil",
    age: 35,
};

let concatenatedPerson = {...person, lastName: "Folino"};

// secondPerson: {name: "Emil", age: 35, lastName: "Folino"}
```

Stilen vi vill ha på fältet har jag definierat i en ny stil-fil, kallat `Forms` som innehåller nedanstående. Kom ihåg att importera och exportera `Forms` i `style/index.js`.

```javascript
export const input = {
    fontSize: 20,
    marginBottom: 28,
    borderWidth: 1,
    padding: 10,
    borderColor: "#ccc",
    borderRadius: 3,
};
```



### Numerisk data {#numeric}

Vi fortsätter med formulärfältet för att lägga in antal av varorna som vi gör en inleverans på. Den stora skillnaden på textfältet ovan är vi sätter `keyboardType="numeric`, detta motsvarar det vi gjorde ovan när vi satte `<input type="number">`. Sedan sätter vi återigen värdet på fältet genom att spegla `delivery`-objektet. Här använder vi funktionen `toString()` (som finns på alla objekt i JavaScript) för att göra om siffran till en sträng för att kunna visa upp den i fältet. I `onChangeText` gör vi sedan tvärtom att vi förvandlar strängen vi får in till en siffra med `parseInt(content)`.

```javascript
<Text style={{ ...Typography.label }}>Antal</Text>
<TextInput
    style={{ ...Forms.input }}
    onChangeText={(content: string) => {
        setDelivery({ ...delivery, amount: parseInt(content) })
    }}
    value={delivery?.amount?.toString()}
    keyboardType="numeric"
/>
```


### Dropdown {#dropdown}

För att underlätta för våra användare att välja en produkt använder vi oss av en dropdown där vi visar upp produkternas namn. Vi kommer använda oss ett paket för att hantera detta och den installeras på följande sätt.

```shell
expo install @react-native-picker/picker
```

Jag har valt att kapsla in dropdownen/pickern i en egen fristående komponent då det skapar lite bättre struktur och vi kan hålla pickerns state för sig själv. Jag har valt att döpa den till `ProductDropDown`. Jag har i nedanstående kodexempel lagt komponenten`ProductDropDown` i `components/DeliveryForm.tsx`, men går lika bra att lägga `ProductDropDown` i en egen fil. Då behövs dock några moduler importeras.

Vi skickar med tre attribut (`props`) med till komponenten då vi vill kunna påverka `delivery` objektet. `setCurrentProduct` är en `useState` funktion som jag definierar som `const [currentProduct, setCurrentProduct] = useState<Partial<Product>>({});` i min `DeliveryForm`-komponent. Vi använder den för att sätta produkten som väljs, så att när vi gör inleveransen sätter vi även en hel produkt som `currentProduct` för att underlätta när vi vid ett senare tillfälle ska öka produktens lagersaldo.

```javascript
<Text style={{ ...Typography.label }}>Produkt</Text>
<ProductDropDown
    delivery={delivery}
    setDelivery={setDelivery}
    setCurrentProduct={setCurrentProduct}
/>
```

Låt oss nu ta en titt på `ProductDropDown`-komponenten.

```javascript
// del av components/DeliveryForm.tsx

import { Picker } from '@react-native-picker/picker';
import productModel from "../models/products";

function ProductDropDown(props) {
    const [products, setProducts] = useState<Product[]>([]);
    let productsHash: any = {};

    useEffect(async () => {
        setProducts(await productModel.getProducts());
    }, []);

    const itemsList = products.map((prod, index) => {
        productsHash[prod.id] = prod;
        return <Picker.Item key={index} label={prod.name} value={prod.id} />;
    });

    return (
        <Picker
            selectedValue={props.delivery?.product_id}
            onValueChange={(itemValue) => {
                props.setDelivery({ ...props.delivery, product_id: itemValue });
                props.setCurrentProduct(productsHash[itemValue]);
            }}>
            {itemsList}
        </Picker>
    );
}
```

I ovanstående kodexempel importerar vi först `Picker`-komponenten och Produkt-modellen. Vi hämtar sedan alla produkter från Lagret. Vi skapar en `itemsList` som innehåller de val vi vill ha i dropdownen och ett `productsHash` objekt som innehåller alla produkter där index är produkt-id. Vi kommer använda `productsHash`-objektet tillsammans med `setCurrentProduct` funktionen vi skickade med som en `props` till komponenten.

I nedanstående kod sätter vi först värdet på dropdownen med `product_id` från `props`. Varje gång vi ändrar värde i dropdownen vill vi att två saker ska hända. Först sätter vi `product_id` attributet på samma sätt som för de andra fälten och vi utnyttjar sedan `props.setCurrentProduct` för att tilldela hela produkt objektet till `currentProduct` i `DeliveryForm`-komponenten. Slutligen skriver vi ut alla valen med hjälp av `itemsList`-variabeln.

```javascript
    <Picker
        selectedValue={props.delivery?.product_id}
        onValueChange={(itemValue) => {
            props.setDelivery({ ...props.delivery, product_id: itemValue });
            props.setCurrentProduct(productsHash[itemValue]);
        }}>
        {itemsList}
    </Picker>
```



### Datum-väljare {#date-picker}

På samma sätt som för `Picker` installerar vi en väljare för datum med följande kommando:

```shell
expo install @react-native-community/datetimepicker
```

Sedan skapar vi på samma sätt som tidigare en egen komponent för att kapsla in `state`. Även denna komponenten har jag i `components/DeliveryForm.tsx`, men går lika bra att ha den i en egen fil.

`datatimepicker` fungerar tyvärr inte likadant på iOS och på Android vilket beror på de underliggande "native"-komponenter vi använder. Så därför kommer vi använda oss av en konstant som finns som en del av React Native [Platform.OS](https://docs.expo.dev/versions/v43.0.0/react-native/platform/#os). Vi importerar den från React Native precis som vi har gjort med våra Core Components tidigare. Vi kommer använda `DateTimePicker` komponenten som den är för iOS och sedan gör vi bara ändringen om vi är på en Android telefon.

```javascript
// Del av components/DeliveryForm.tsx
import DateTimePicker from '@react-native-community/datetimepicker';
import { Platform, ScrollView, Text, TextInput, Button, View } from "react-native";

function DateDropDown(props) {
    const [dropDownDate, setDropDownDate] = useState<Date>(new Date());
    const [show, setShow] = useState<Boolean>(false);

    const showDatePicker = () => {
        setShow(true);
    };

    return (
        <View>
            {Platform.OS === "android" && (
                <Button onPress={showDatePicker} title="Visa datumväljare" />
            )}
            {(show || Platform.OS === "ios") && (
                <DateTimePicker
                    onChange={(event, date) => {
                        setDropDownDate(date);

                        props.setDelivery({
                            ...props.delivery,
                            delivery_date: date.toLocaleDateString('se-SV'),
                        });

                        setShow(false);
                    }}
                    value={dropDownDate}
                />
            )}
        </View>
    );
}
```

Vi skapar först en variabel som vi har som en del av `state`, vi gör detta då Lager-API vill ha datum som en sträng på formatet "YYYY-MM-DD", men `DateTimePicker` vill ha ett JavaScript `Date` objekt. Varje gång vi ändrar i vår Picker sätter vi både vår `state`-variabel och ändrar i vårt `props.delivery` objekt.

Vi skapar dessutom en `state`-variabel `show` för att hålla koll på om datumväljaren syns. Vi använder en knapp för att visa upp datumväljaren och den anropar funktionen `showDatePicker` som i sin tur sätter `true` som värde för `show` `state` variabeln.

För att knappen för att visa datumväljaren bara ska visas på Android telefoner använder vi oss `Platform.OS === "android"` och om det evalueras till sant visas knapp-komponenten.

För att datumväljare-komponenten alltid ska visas på iOS och bara när `show` är satt till sant använder vi oss av `(show || Platform.OS === "ios")`.

I `onChange` använder vi `date.toLocaleDateString('se-SV')` för att få ut en sträng på rätt format för att sedan kunna spara i API:t. Det sista vi gör där är att stänga datumväljaren genom att sätta `show` till falskt.



### Att göra en inleverans {#function}

Som jag nämnde ovan är det tre saker vi behöver ha på plats för vårt formulär: Formulärfält för att fylla i data, ett objekt som en del av `state` som håller koll på data i fälten och en funktion som tar hand om att skicka data till vårt API.

Den sista delen av övningen är den funktion som gör själva inleveransen när vi trycker på knappen för inleverans.

```javascript
    async function addDelivery() {
        await deliveryModel.addDelivery(delivery);

        const updatedProduct = {
            ...currentProduct,
            stock: (currentProduct.stock || 0) + (delivery.amount || 0)
        };

        await productModel.updateProduct(updatedProduct);

        navigation.navigate("List", { reload: true });
    }
```

I funktionen utnyttjar vi vår struktur från tidigare kmom och använder våra modeller i frontend. Vi utnyttjar återigen spread-operatorn `...` och skapar ett objekt med rätt uppdaterad lagersaldo. Sedan navigerar vi tillbaka till "List" vyn.



Avslutningsvis {#avslutning}
--------------------------------------
Detta var en genomgång av ett antal olika input typer i HTML5, som ger bättre användbarhet speciellt på mobila enheter. Genom att tala om vilken sorts data, som varje formulärfält är gjort för, kan den mobila enhet anpassa tangentbord och användargränssnitt för den specifika användningen.

Vi har även tittat på formulärhantering i React Native både själva formuläret i en vy och hur den bakomliggande modellen för att hämta och spara data ser ut.
