---
author: efo
category: javascript
revision:
  "2022-04-21": (A, efo) Första utgåvan inför kursen webapp v4.
...
Meddelanden i React Native
==================================

[FIGURE src=/image/webapp/v4/message.jpg?w=c5 class="right"]

I denna övning tar vi en titt på hur vi kan lägga till meddelanden i våra appar. Både för när saker går som de ska och när saker blir fel.



<!--more-->



Som vanligt en modul {#modul}
--------------------------------------

Vid det här läget i kursen börjar vi bli vana vid att installera moduler i Expo. Vi behöver i detta sammanhang en komponent som kan visa upp meddelanden. Vi väljer komponenten [react-native-flash-message](https://www.npmjs.com/package/react-native-flash-message) då den uppfyller de krav vi har på en sån komponent.

```shell
$ expo install react-native-flash-message
```



Global komponent {#global}
--------------------------------------

Vi börjar med att installera komponenten med hjälp av kommandot `expo install react-native-flash-message`.

Sedan lägger vi `FlashMessage`-komponenten längst ner i `App.tsx` för att den ska få möjligheten för att visas i hela komponentträdet. Den JSX jag returnerar från `App` ser ut på följande sätt.

```javascript
return (
    <SafeAreaView style={styles.container}>
      <NavigationContainer>
        <Tab.Navigator screenOptions={({ route }) => ({
            tabBarIcon: ({ focused, color, size }) => {
              let iconName = routeIcons[route.name] || "alert";

              return <Ionicons name={iconName} size={size} color={color} />;
            },
            tabBarActiveTintColor: 'blue',
            tabBarInactiveTintColor: 'gray',
            headerShown: false
          })}
        >
          <Tab.Screen name="Lager">
            {() => <Home products={products} setProducts={setProducts} />}
          </Tab.Screen>
          <Tab.Screen name="Plock">
            {() => <Pick setProducts={setProducts} />}
          </Tab.Screen>
          <Tab.Screen name="Inleverans">
            {() => <Deliveries setProducts={setProducts} />}
          </Tab.Screen>
          {isLoggedIn ?
            <Tab.Screen name="Faktura">
              {() => <Invoices setIsLoggedIn={setIsLoggedIn} />}
            </Tab.Screen> :
            <Tab.Screen name="Logga in">
              {() => <Auth setIsLoggedIn={setIsLoggedIn} />}
            </Tab.Screen>
          }
          <Tab.Screen name="Leverans" component={Shipping} />
        </Tab.Navigator>
      </NavigationContainer>
      <StatusBar style="auto" />
      <FlashMessage position="top" />
    </SafeAreaView>
);
```



Vårt första meddelande {#message}
--------------------------------------

Låt oss börja med att lägga till några meddelanden i vår applikation. Vi börjar med att lägga till ett meddelanden om e-post och/eller lösenord saknas när vi försöker logga in.

Vi importerar `showMessage` funktionen från `react-native-flash-message` i de komponenter där vi vill kunna visa upp ett meddelande med raden `import { showMessage } from "react-native-flash-message";`. Sedan använder vi funktionen varje gång vi vill visa ett meddelande.

Så till exempel i `doLogin()` funktionen i `Login` komponenten kan vi använda den på detta sättet. Först kollar vi om både e-post och lösenord är ifyllda. Är de inte det skickar vi ett meddelande till användaren att nått av de saknas.

```javascript
// Del av components/auth/Login.tsx
async function doLogin() {
    if (auth.email && auth.password) {
        const result = await AuthModel.login(auth.email, auth.password);
    } else {
        showMessage({
            message: "Saknas",
            description: "E-post eller lösenord saknas",
            type: "warning",
        });
    }
}
```

Typen för de olika meddelanden vi kan skicka är följande "success" (grön), "warning" (orange), "danger" (röd), "info" (blå) och "default" (grå). Det enda som skiljer sig åt är färgen.



Ett meddelande från API:t {#api-message}
--------------------------------------

Ofta vill vi "vidarebefordra" meddelanden från API:t både när det blir rätt och när det blir fel. Vi fortsätter med att titta på Login exemplet. I `models/auth.ts` behöver vi fånga upp både när vi lyckas med en inloggning, men även när vi inte lyckas.

Min `login` funktion ser just nu ut på följande sätt.

```javascript
// Del av models/auth.ts

login: async function login(email: string, password: string) {
    const data = {
        api_key: config.api_key,
        email: email,
        password: password,
    };
    const response = await fetch(`${config.base_url}/auth/login`, {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            'content-type': 'application/json'
        },
    });
    const result = await response.json();

    await storage.storeToken(result.data.token);
},
```

`result` variabeln innehåller alltså just nu antigen en lyckat autentisering och en token eller så innehåller den ett felmeddelande i form av ett `errors`-objekt. Jag väljer då att returnera grunderna till ett `FlashMessage` från denna funktionen. Jag kollar först om `result`-objektet innehåller ett `errors`-attribut och gör det det returnerar vi grunderna till ett felmeddelande annars returnerar vi ett glatt meddelande om att vi lyckats logga in.

```javascript
// Del av login-funktionen i models/auth.ts

const result = await response.json();

if (Object.prototype.hasOwnProperty.call(result, 'errors')) {
    return {
        title: result.errors.title,
        message: result.errors.detail,
        type: "danger",
    };
}

await storage.storeToken(result.data.token);

return {
    title: "Inloggning",
    message: result.data.message,
    type: "success",
};
```

Vi behöver sedan ta hand om detta returvärde i `Login`-komponenten där vi vill visa upp meddelandet. I komponenten kollar vi typen på det returnerade värdet först, är det av typen "success" väljer vi att logga in användaren och oavsett visar vi sedan upp meddelandet.

```javascript
// Del av components/auth/Login.tsx
async function doLogin() {
    if (auth.email && auth.password) {
        const result = await AuthModel.login(auth.email, auth.password);

        if (result.type === "success") {
            setIsLoggedIn(true);
        }

        showMessage({
            message: result.title,
            description: result.message,
            type: result.type,
        });
    } else {
        showMessage({
            message: "Saknas",
            description: "E-post eller lösenord saknas",
            type: "warning",
        });
    }
}
```



Avslutningsvis {#avslutning}
--------------------------------------

Vi har i denna artikel tittat på hur vi kan använda meddelanden för att förbättra användbarheten av vår app. Meddelanden visar tydligt upp för användaren både när det gått bra och när det är nått som går fel.
