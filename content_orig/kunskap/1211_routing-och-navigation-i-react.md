---
author: efo
category: javascript
revision:
  "2022-03-07": (A, efo) Första utgåvan inför kursen webapp-v4 VT22.
...
Routing och navigation i React
==================================

Vi ska i denna övning titta på ett sätt att skapa flera olika vyer så vår app kan göra mer än att vara en lagerförteckning.



<!--more-->

Du kan med fördel göra nedanstående ändringar och förbättringar i din Lager-App och koden kommer utgå från kmom01.



Navigation {#navigation}
--------------------------------------

React byggdes från början för att vara ett vy-bibliotek och kan i många sammanhang användas för att bara visa en vy. Vi vill dock ha en del olika vyer i vår applikation så vi väljer att använda [Expos rekommendation](https://docs.expo.dev/guides/routing-and-navigation/) för att hantera navigation.

Vi börjar därför med att installera ett antal olika paket för att hantera detta.

```shell
# stå i me/lager
$ npm install @react-navigation/native
```

För att det ska fungera tillsammans med Expo behöver vi dessutom sätta upp lite konfiguration med hjälp av nedanstående paket.

```shell
# stå i me/lager
$ expo install react-native-screens react-native-safe-area-context
```



Tab navigation {#tabs}
--------------------------------------

Vi vill i vår app använda oss av tab-navigation, dvs att navigationen hamnar längst ner på skärmen och består av små ikoner för de olika vyer. Det är fördelaktigt att på en mobil enhet ha navigationen längst ner då det är lätt och ergonomiskt att nå för användaren.

Vi behöver ett sista paket för att kunna skapa vår tab-navigation så vi installerar det och sen är det dags att titta på lite kod.

```shell
$ npm install @react-navigation/bottom-tabs
```

Vi börjar med att titta på hur strukturen för en tab-navigation ser ut och sen kommer vi anpassa vår applikation från kmom01. I kodexemplet nedan ser vi ett exempel på tab-navigation med två olika sidor, som är kopplat till var sin komponent.

```javascript
// me/lager/App.tsx
import { StatusBar } from 'expo-status-bar';
import { StyleSheet } from 'react-native';
import { SafeAreaView } from 'react-native-safe-area-context';
import Home from "./components/Home.tsx";
import Pick from "./components/Pick.tsx";
import { NavigationContainer } from '@react-navigation/native';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';


const Tab = createBottomTabNavigator();

export default function App() {
  return (
    <SafeAreaView style={styles.container}>
      <NavigationContainer>
        <Tab.Navigator>
          <Tab.Screen name="Lager" component={Home} />
          <Tab.Screen name="Plock" component={Pick} />
        </Tab.Navigator>
      </NavigationContainer>
      <StatusBar style="auto" />
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
});
```

I kodexemplet ovan importeras först två komponenter. I det här fallet en Home komponent som innehåller Lagerförteckningen från kmom01 och en plocklista komponent som vi ska skapa i ett senare skede i kmom02. Sedan importerar vi en `NavigationContainer`-komponent och en `createBottomTabNavigator`-funktion som vi i sin tur använder för att skapa en Tab-komponent.

Från komponenten `App.tsx` returnerar vi sedan Vår `SafeAreaView` och `StatusBar` som tidigare. Inne i `SafeAreaView` har vi lagt till först en `NavigationContainer`, sedan en `Tab.Navigator` och inne i den de enskilda sidor med `Tab.Screen`. För varje `Screen` anger vi ett namn och en komponent som vi vill ska visas upp.



Komponenter {#komponenter}
--------------------------------------

Vi skapar nu de två komponenter som behövs för detta exemplet och som man med fördel kan ta sig med vidare. I `Home.tsx` lägger vi innehållet vi tidigare hade i `App.tsx`. I komponenten `Pick.tsx` gör vi det enkelt för oss själva till en början. Vi lägger bara en `Text`-komponent för att se att allt med navigationen fungerar.

```javascript
// Pick.tsx
import { Text, View } from 'react-native';

export default function Pick() {
    return (
        <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
            <Text>Plocklista</Text>
        </View>
    );
}
```



Ikoner {#icons}
--------------------------------------

Om vi testar att ladda om i Expo appen ser vi nu att vi har fått till navigation nere i botten av appen och kan gå mellan de två olika vyerna. Dock är det inte så snyggt med ikonerna, om man inte gillar frågetecken förstås.

Expo har redan varit så snälla att [installera en hel del ikoner](https://docs.expo.dev/guides/icons/) för oss redan så vi kan gå direkt till att importera längst upp i `App.tsx`.

```javascript
import { Ionicons } from '@expo/vector-icons';
```

Vi ska nu titta på koden för att välja ut en ikon per screen i vår applikation. I nedanstående kodexempel använder vi oss av `props`, som är en viktigt beståndsdel i komponenter i React. Vi kommer i övningen [Komponenter och struktur i React](kunskap/komponenter-och-struktur-i-react) titta vidare på komponenter så nu ser vi bara `props` som ett sätt att skicka data ner i komponent-trädet.

`screenOptions` är ett exempel på `props` där vi skickar med data till de underliggande komponenterna. I detta fallet skickar vi med en ikon per route. Vi använder `route.name` för att sätta en ikon för varje route. Sedan returnerar vi en `Ionicons`-komponent för att lägga till i navigationen. Vi sätter även färgen för aktiva och inaktiva ikoner.

```javascript
<Tab.Navigator screenOptions={({ route }) => ({
    tabBarIcon: ({ focused, color, size }) => {
      let iconName;

      if (route.name === "Lager") {
          iconName = "home";
      } else if (route.name === "Plock")  {
          iconName = "list";
      } else {
          iconName = "alert";
      }

      return <Ionicons name={iconName} size={size} color={color} />;
    },
    tabBarActiveTintColor: 'tomato',
    tabBarInactiveTintColor: 'gray',
  })}
>
  <Tab.Screen name="Lager" component={Home} />
  <Tab.Screen name="Plock" component={Pick} />
</Tab.Navigator>
```

Testa att ladda om i Expo appen och nu ser vi att ikonerna är lite snyggare. Men vi kan göra detta ännu bättre och bättre förberedd för framtiden. Vi börjar med att definiera ett objekt med vår ikoner.

```javascript
const routeIcons = {
  "Lager": "home",
  "Plock": "list",
};
```

Och sen använder vi oss av detta objekt och `route.name` tillsammans för att tilldela värde till `iconName` variabeln. Vi använder oss av `||` för att tilldela ett värde om nyckeln inte finns i `routeIcons`-objektet. Nu kan vi lägga till nya ikoner genom att lägga till i objektet.

```javascript
<Tab.Navigator screenOptions={({ route }) => ({
    tabBarIcon: ({ focused, color, size }) => {
      let iconName = routeIcons[route.name] || "alert";

      return <Ionicons name={iconName} size={size} color={color} />;
    },
    tabBarActiveTintColor: 'blue',
    tabBarInactiveTintColor: 'gray',
  })}
>
  <Tab.Screen name="Lager" component={Home} />
  <Tab.Screen name="Plock" component={Pick} />
</Tab.Navigator>
```

Om du vill välja andra ikoner i detta kmom eller längre fram i kurser är denna [översikt över alla installerade ikoner](https://icons.expo.fyi/) ett bra ställe att börja. Se till att filtrera på Ionicons då det är de som redan importerats. Går att använda de andra ikoner också, men då måste du importera de biblioteken.



Avslutningsvis {#theend}
--------------------------------------

Vi har i denna övningen tittat på hur vi kan skapa tab-navigation med ikoner för vår applikation. Vi fortsätter i detta kmomet med att titta vidare på komponenter och hur vi kan använda de för att bygga vidare på vår Lager-App.
