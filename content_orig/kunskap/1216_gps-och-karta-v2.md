---
author: efo
category: javascript
revision:
  "2018-03-02": (A, efo) Första utgåvan inför kursen webapp v3.
...
GPS och karta
==================================

[FIGURE src=/image/webapp/gps.png?w=c5 class="right"]

I denna övning tar vi först en titt på hur vi kan använda oss av den inbyggda kartan på telefonen. Sen lägger vi till en markör för både orderns leveransadress och användarens nuvarande position.



<!--more-->



En start {#start}
--------------------------------------

I uppgiften i kmom05 ska vi skapa en lista med ordrar som är redo att levereras. Jag utgår i detta exemplet från att vi har skapat en list-vy precis som tidigare i kursen och att vi har tillgång en order som en del av `route.params` via en `Stack.Navigator`. Jag kommer alltså utgå från följande komponent och sedan bygga vidare på under övningen.

```javascript
import { Text, View, StyleSheet } from "react-native";
import { Base, Typography } from "../../styles";

export default function ShipOrder({ route }) {
    const {order} = route.params;

    return (
        <View style={Base.base}>
            <Text style={Typography.header2}>Skicka order</Text>
        </View>
    );
};
```



Kartkomponenten {#mapcomponent}
--------------------------------------

Vi kommer i denna övning använda modulen `react-native-maps` för att visa upp en karta i vår mobila enhet och för att rita ut markörer på denna karta. Vi installerar komponenten med kommandot `expo install react-native-maps`. Innan vi fortsätter kan det vara bra att titta på [modulens dokumentation](https://docs.expo.dev/versions/latest/sdk/map-view/).

Vi kan nu importera `MapView` och rita ut en karta. Vi definierar först en `MapView` och till den komponenten skickar vi med ett objekt med breddgrader och längdgrader. Vi använder ett inbyggt `style` attribut fra `StyleSheet` som heter `...StyleSheet.absoluteFillObject`. Det gör att vi fyller upp hela den tillgängliga ytan med kartan.

```javascript
import { Text, View, StyleSheet } from "react-native";
import { Base, Typography } from "../../styles";

import MapView from 'react-native-maps';

export default function ShipOrder({ route }) {
    const {order} = route.params;

    return (
        <View style={Base.base}>
            <Text style={Typography.header2}>Skicka order</Text>
            <View style={styles.container}>
                <MapView
                    style={styles.map}
                    initialRegion={{
                        latitude: 56.1612,
                        longitude: 15.5869,
                        latitudeDelta: 0.1,
                        longitudeDelta: 0.1,
                    }} />
            </View>
        </View>
    );
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
        justifyContent: "flex-end",
        alignItems: "center",
    },
    map: {
        ...StyleSheet.absoluteFillObject,
    },
});
```



En markör {#markers}
--------------------------------------

För att vi ska kunna rita ut vart ordern ska levereras vill vi använda oss av en markör (`Marker`). Vi importerar först `Marker` komponenten och lägger sedan till den som en barn komponent till `MapView`.

```javascript
<MapView
    style={styles.map}
    initialRegion={{
        latitude: 56.1612,
        longitude: 15.5869,
        latitudeDelta: 0.1,
        longitudeDelta: 0.1,
    }}>
    <Marker
        coordinate={{ latitude: 56.17, longitude: 15.59 }}
        title="Min första markör"
    />
</MapView>
```

Nu är ett bra läge att testa så allt fungerar innan vi går vidare.



Koordinater från adress {#geocoding}
--------------------------------------

Nu har vi inte koordinater tillgängliga för att alla ordrar så vi behöver ett sätt att översätta addresser till koordinater. Som tur är finns tjänsten [nominatim](https://nominatim.openstreetmap.org/ui/search.html) som även tillhandahåller ett API. Jag har valt att skapa en modell `models/nominatim.ts` som exporterar funktionen `getCoordinates`. Funktionen tar en sträng som parameter och returnerar sedan en array med result.

```javascript
// models/nominatim.ts
export default async function getCoordinates(address: string) {
    const urlEncodedAddress = encodeURIComponent(address);
    const url = "https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=";
    const response = await fetch(`${url}${urlEncodedAddress}`);
    const result = await response.json();

    return result;
};
```

Vi kan i vår komponent sedan importera modellen och använda den för att skapa en markör. Jag väljer att lägga `marker` som en del av state och använder sedan `useEffect` för att hämta koordinaterna från en adress.

[INFO]
För att få ut rätt i nästa steg är det viktigt att adresser från API:t existerar på riktigt. De adresser som finns på de kopierade ordrarna är hitte-på adresser.
[/INFO]

```javascript
import { useEffect, useState } from "react";
import { Text, View, StyleSheet } from "react-native";
import { Base, Typography } from "../../styles";

import MapView from 'react-native-maps';
import { Marker } from "react-native-maps";

import getCoordinates from "../../models/nominatim";

export default function ShipOrder({ route }) {
    const {order} = route.params;
    const [marker, setMarker] = useState(null);

    useEffect(() => {
        (async () => {
            const results = await getCoordinates(`${order.address}, ${order.city}`);

            setMarker(<Marker
                coordinate={{ latitude: parseFloat(results[0].lat), longitude: parseFloat(results[0].lon) }}
                title={results[0].display_name}
            />);
        })();
    }, []);

    return (
        <View style={Base.base}>
            <Text style={Typography.header2}>Skicka order</Text>
            <View style={styles.container}>
                <MapView
                    style={styles.map}
                    initialRegion={{
                        latitude: 56.1612,
                        longitude: 15.5869,
                        latitudeDelta: 0.1,
                        longitudeDelta: 0.1,
                    }}>
                    {marker}
                </MapView>
            </View>
        </View>
    );
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
        justifyContent: "flex-end",
        alignItems: "center",
    },
    map: {
        ...StyleSheet.absoluteFillObject,
    },
});
```

Notera att vi använder `parseFloat(results[0].lat)` då Nominatim tjänsten returnerar strängar för latitude och longitude. Samt att vi ritar ut `marker` som ett barn till `MapView`.



Användarens position {#position}
--------------------------------------

Sista delen av denna övningen går ut på att rita ut användarens position som en markör på kartan. Vi använder ungefär samma tillvägagångssätt som innan. Först installerar vi [modulen `Location`](https://docs.expo.dev/versions/latest/sdk/location/) med hjälp av `expo install expo-location` och importerar med `import * as Location from 'expo-location';`. Vi    initierar sedan `locationMarker` och `errorMessage` som en del av state.

Sedan använder vi `useEffect` igen för att hämta användarens position från den inbyggda GPS'n i mobilen. Vi ser nedan att vi först frågar användaren om vi kan få använda GPS i telefonen. Se till att svara "Tillåt" på detta under utveckling för att det ska fungera. Sedan hämtar vi nuvarande position och utifrån den skapar och sätter vi sedan `state` variabeln `locationMarker`.

```javascript
const [locationMarker, setLocationMarker] = useState(null);
const [errorMessage, setErrorMessage] = useState(null);

useEffect(() => {
    (async () => {
        const { status } = await Location.requestForegroundPermissionsAsync();

        if (status !== 'granted') {
            setErrorMessage('Permission to access location was denied');
            return;
        }

        const currentLocation = await Location.getCurrentPositionAsync({});

        setLocationMarker(<Marker
            coordinate={{
                latitude: currentLocation.coords.latitude,
                longitude: currentLocation.coords.longitude
            }}
            title="Min plats"
            pinColor="blue"
        />);
    })();
}, []);
```

Vi kan sedan i `return` delen av komponenten rita ut `locationMarker` på samma sätt som med `marker`.

```javascript
<MapView
    style={styles.map}
    initialRegion={{
        latitude: 56.1612,
        longitude: 15.5869,
        latitudeDelta: 0.1,
        longitudeDelta: 0.1,
    }}>
    {marker}
    {locationMarker}
</MapView>
```



Avslutningsvis {#avslutning}
--------------------------------------

Vi har i denna artikel använd oss av kartor och att placera ut markörer på en karta på specifika platser. Vi har använt telefonens inbyggda GPS för att rita ut vår egen plats på kartan.
