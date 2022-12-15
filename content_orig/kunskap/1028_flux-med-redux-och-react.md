---
author: ceruza
revision:
    2016-12-19: (A, ceruza) Första Versionen
category:
    - react
    - javascript
    - JSX
    - flux
    - redux
...


Flux med Redux och React
==================================

[FIGURE src=image/snapht16/flux.png?w=c5&a=0,0,0,0 class="right"]

I den här artikeln behandlas arkitekturen Flux och dess skillnader gentemot arkitekturen MVC identifieras och diskuteras. Vi tittar på ett case som beskriver varför Flux skapades och använder det som grund för att förklara vilka användningsområden den arkitekturen är mest lämpad för.

Artikeln börjar med en återkoppling till MVC och dess styrkor, därefter fortsätter den med att behandla Flux, en ny arkitektur. Därefter rundas den teoretiska delen av med en genomgång av en implementation av Flux med biblioteken Redux och React.

<!--more-->

Avslutningsvis bygger vi upp en utvecklingsmiljö med Webpack och skriver ett enkelt program som visar på hur arkitekturen fungerar.



Förutsättning {#pre}
-------------------------------

Du har arbetat dig igenom följande artiklar, och har en mer än grundläggande förståelse för JavaScript som inkluderar callbacks, objekthantering, objektorientering samt grundläggande kunskap om MVC. Du har en fungerande installation av Webpack.

* [Labbmiljön Webpack](kunskap/installera-webpack)
* [Programmering med grunderna i JavaScript](kunskap/programmering-med-grunderna-i-javascript)
* [Kom igång med ramverket Mithril för JavaScript SPA](kunskap/kom-igang-med-ramverket-mithril-for-javascript-spa)



Model-View-Controller (MVC) {#mvc}
-------------------------------

Arkitekturen MVC brukar kallas "The King of Compound Patterns", och har varit en draghäst i webbutvecklingssammanhang länge. Med hjälp av MVC kan vi skapa lösa kopplingar mellan vår data (model), vår logik (controller) och vårat gränssnitt (view). Detta hjälper oss att resonera kring vår kod genom att dela upp den i olika ansvarsområden, och gör det lättare för andra utvecklare att sätta sig in i ett existerande projekt.

**Dataflödet i den klassiska MVC-arkitekturen**

[FIGURE src=image/snapht16/mvc.png caption="Den teoretiska MVC-modellen"]

MVC fungerar olika om det är en Single-Page-Application (SPA) eller om det är en Multi-Page-Application (MPA). I klassisk MVC lagrar vi data i modellen, som implementeras enligt Observer-mönstret. I Observer-mönstret är det en klass (Ett Objekt) som ansvarar för att hålla rätt på data. Andra objekt kan prenumrera på uppdateringar på denna data om de behöver tillgång till den. En model ansvarar oftast för en typ av data, exempelvis email, användare eller sökresultat.

I en MPA, d.v.s. en webbplats där din HTML och data renderas på servern och sedan skickas till klienten varje gång en användare klickar på en länk, är data transient, och modellens ansvar blir att hämta data från en databas och sedan skicka denna till en annan klass som genererar vyn som skickas till användaren.

I en SPA är det fördelaktigt att lagra data som hämtats från en server i klienten för att göra klienten snabbare när användaren klickar runt - datan behöver bara hämtas i sin helhet en gång. Denna data varierar ofta över tid allt eftersom klienten hämtar uppdateringar från olika servrar. Ett exempel på detta kan vara en emailklient, där de första tio mail som visas hämtas direkt, och nya mail hämtas från servern allteftersom tiden går.



Flux, en arkitektur för webben {#flux}
-------------------------------

Flux är en arkitektur för enkelriktat dataflöde, precis som MVC är en arkitektur som (ofta) tillåter flerriktat dataflöde. Varken Flux eller MVC har standardimplementationer, utan bibliotek och ramverk implementerar dem olika.

#### Dispatcher
En Dispatcher är den centrala delen av en Fluxapp, och dess huvudsakliga jobb är att distribuera de Actions som sker till alla Stores. En Store kan registrera sig hos Dispatchern med en callback, och när en Action sker kommer Dispatchern att skicka den vidare till samtliga Stores via den callback de har registrerat sig med. En DIspatcher kan också beskrivas som en event-hanterare med fler regler.

Dispatchern kan utföra dessa callbacks i en förbestämd ordning - detta kan vara bra om en Store är beroende av innehållet i en annan Store, vilket ofta oundvikligt om man har en större applikation där du inte vill ha duplicerad data.

#### Store
Stores innehåller applikationens tillstånd (State) och även dess logik. En Store kan liknas vid en modell i MVC, men lagrar data för en hel avdelning inom applikationen istället för att varje instans av modellen representerar ett resultat från en sökning, vilket ofta är fallet med en Object-Relational-Mapper. Den liknar alltså Subjekt-objektet från Observer-mönstret från den klassiska MVC-implementationen.

En Store registrerar sig själv hos applikationens Dispatcher, och har internt en switch-sats som tolkar hur en mottagen Action ska hanteras, och knyter ihop den med den interna logik som finns i din Store. På detta sätt leder en Action till att tillståndet i en Store uppdateras. När detta sker sänder Storen även ut ett event som säger att dess data har förändrats, för att låta de vyer som beror på den uppdatera sig.

Pseudokod för en Store i Flux:

```javascript
var Store = {
    data: [],
    functionForThisData: function () {
        console.log(data);
    }
}
```

#### Actions
En Dispatcher låter oss utlösa ett utskick till de Stores som är registrerade. Vi skickar ett Action-objekt som består av en type och en payload. En Actions type används för att avgöra hur den ska hanteras. Actions kan komma från flera olika ställen, två vanliga källor är applikationens Vy och de Webbtjänster som serverar data för applikationen.

Pseudokod på en ActionCreator i Flux:

```javascript
function actionCreatorExample(blogPost) {
    return {
      type: "CREATE_BLOGPOST",
      blogPost: blogPost
    };
}
```

#### View
Vyer i Flux fyller samma funktion som de gör i MVC - de är vad användaren ser och kan interagera med. I Flux är Actions knutna till vykomponenter, och Vyer ska renderas om eller uppdateras varje gång applikationens tillstånd förändras. Detta sker dock bara i en riktning, en Vy är inte medveten om en Store, utan "pratar" bara med en Dispatcher, och låter sig sedan uppdateras.

#### Controller-View
Komponenterna i en Flux-Vy är organiserade som ett vanligt domträd - och roten i Vyns domträd är en controller-view. Denna komponent har ansvaret för att hämta data från Stores och distribuera den nedåt till sina barn i trädet. På detta sätt ser man till att varje komponent bara har tillgång till den data som den själv eller dess barn behöver. Varje "logisk enhet" på en hemsida kan ha sin egen controller-view. Exempel på logiska enheter kan vara chattfunktionalitet och en kundvagn.

**Interaktionerna mellan komponenterna i Flux kan representeras grafiskt på det här sättet:**  

[FIGURE src=image/snapht16/flux.png caption="Flux arkitekturen"]

**Vi kan också representera dem via ett fiktivt samtal:**

**Vykomponent:** Öj, Action, någon klickade på Skapa Todo knappen!  
**Action:** Okej Vykomponenten, jag registrerade en Action hos Dispatchern, den kommer ta hand om att vidarebefodra den här informationen till alla Stores som är intresserade av den.  
**Dispatcher:** Hmmm... Har jag någon som bryr sig om en ny Todo? Ja, en Store har registrerat en callback hos mig! Jag meddelar den.  
**Store:** Okej Dispatcher, tack för uppdateringen! Jag uppdaterar min data och signalerar ett event för Vykomponenterna!  
**Vykomponent:** Nej men titta, en Store jag är intresserad av har ny data! Dags att uppdatera gränssnittet med den nya datan!  



Skillnaden mellan Flux och MVC {#fluxmvc}
-------------------------------

Den största skillnaden är att Flux har ett enkelriktat dataflöde, och MVC stödjer oftast ett flervägsdataflöde. Många duktiga ingenjörer hävdar dock att korrekta implementationer av MVC har ett enkeltriktat dataflöde, och att de som inte har det bör samlas under MVW-kategorin istället, där W står för "Whatever". I verkligheten skiljer sig MVC-implementationer från varandra och fungerar olika. Flux väljer att röra sig bort från MV*-termen helt, och representerar en arkitektur som inte stödjer tvåvägsbindningar, oavsett man vill det eller inte. All data flödar enkelriktat, och alla förändringar går via Dispatchern.

**Enligt skaparna av Flux ser en typisk implementation av MVC på klientsidan av en webbapplikation ut ungefär såhär:**

[FIGURE src=image/snapht16/mvc2.png caption="Verklighetstrogen implementation av MVC"]

Svårt att läsa på en bild, mycket svårare att läsa i kod. Problemet med den här typen av arkitektur är att det är svårt att felsöka, det är svårt att resonera kring det, och det är svårt att utveckla nya funktioner i din applikation, oavsett om använder samma data eller inte, utan att introducera oförutsägbara och svårlösta buggar. Detta för att ett flervägsdataflöde kan leda till cirkulära databeroenden som kan skapa kaskadeffekter i din applikation.

**Ett case från Facebook, den odödliga chattbuggen**

Facebook hade en långlivad bugg i sitt chattsystem som skapade spöknotifikationer - ikonen visade att man hade ett meddelande men när man klickade på den fanns det inget där. Detta problem fortsatte finnas kvar på Facebooks hemsida trots att det "lösts" flera gånger om - och den återkom ofta när nya saker lagts till eller när kod hade förändrats. Detta berodde på att den underliggande strukturen inte var skriven med en kontinuerligt växande applikation i åtanke. När de började vilja använda samma data i flera olika vyer och var tvungna att försöka synka den mellan olika platser föddes problem som detta.  
När de ändrade den underliggande arkitekturen till Flux löste de slutligen denna bugg, och den har inte återkommit sedan dess. Detta demonstrerar typexemplet på en applikation som kan dra nytta av Flux, en webapp som har data som varierar över tid som samtidigt är en applikation som kontinuerligt växer och förändras.



Redux + React en populär implementation av Flux {#reduxreact}
-------------------------------



#### Redux (Store, Reducer, Actions)

Redux skapades av Dan Abramov, och implementerar Flux. Likt de flesta implementationer av arkitekturer har Redux valt att till viss del gå sin egen väg. Redux har tre grundprinciper:  
**Single Source of Truth:** I Redux har man bara ett state-objekt, d.v.s. **en** Store för hela applikationen.  
**State is Read-Only:** Redux's Store är oföränderlig i den datavetenskapliga bemärkelsen att State-objektet inte kan förändras.  
**Changes are made with Pure Functions:** När du behöver uppdatera ditt state använder du dig av Reducers. Reducers är vad som kallas "Pure Functions" eller deterministiska funktioner - det betyder att given samma input, kommer funktionen alltid att producera samma output. Istället för att skicka din Action till en dedikerad Dispatcher har Redux's Store-implementation en dispatch-funktion. Denna tillsammans med en reducer skapar motsvarande funktionalitet.  
En Reducer tar en Action och State-objektet som argument och returnerar ett nytt State-objekt som innehåller den nya datan. Internt använder en Reducer en switch-sats för att mappa olika Actions mot olika beteenden i applikationen.

**Flux implementerat med Redux och React**:

[FIGURE src="image/snapht16/redux.png" caption="Flux med Redux och React"]



#### React (View)

React skapades av Jordan Walke, och är inspirerat av XHP, ett php-bibliotek som utvecklats på Facebook. XHP och React med JSX är inte fullfjädrade ramverk i sig själva, utan mer en abstraktion mellan språket och DOM-trädet som vi vill manipulera.

React representerar en TOTAL abstraktion från webbläsarens domträd - den enda gången du rör det är när du väljer i vilket element du vill att din React-app ska renderas. Därefter sköter React all interaktion med domträdet, och du arbetar i något som kallas en "Virtual DOM".

Den huvudsaklig anledningen till att React och dess Virtuella DOM existerar är för att snabba upp förändringen av domträdet när din applikations data förändras. När datan förändras gör React en diff mellan det virtuella trädet och webbläsarens träd, och utför minsta möjliga operationer för att göra webbläsarens träd likvärdigt med det virtuella trädet. Detta är ett snabbt sätt att uppdatera en sida, eftersom att alla komplicerade operationer sker i ren javascript, utan att man måste läsa till eller från domträdet.

Relationen mellan applikationen, det virtuella trädet och webbläsarens träd ser ut såhär:

[FIGURE src=image/snapht16/virtualdom.png caption="React and it's virtual DOM"]

En vinst utöver snabbheten när man abstraherar bort DOMträdet är att du inte behöver tänka HTML/JS/CSS längre, utan det räcker att tänka JavaScript och komponenter - att komponenterna sedan kan återanvändas är också en vinst. Exakt hur man ska styla sin React-app är ett väldigt omdebatterat område - vissa anser att man bör förlita sig helt på inline styling, och andra föredrar separata CSS-filer. Båda alternativ fungerar, och har för och nackdelar.



#### JSX, HTML-element i JavaScript

JSX är ett markupspråk som kan användas tillsammans med React, det låter dig skriva dina komponenter med ett HTML-likt syntax istället för att använda React.createElement. Detta kräver dock att du använder babel med ett react-preset för att kompilera din kod - något vi kommer gå igenom i nästkommande artikel.

Vi behöver inte täcka JSX mycket mer i denna artikel - vinsten med det kommer visa sig när vi utvecklar med det. Här är ett exempel hur hur samma sak ser ut i React och JSX:

Denna JSX-kod:
```javascript
<LoginButton color="cyan">
  Logga in!
</LoginButton>
```

Motsvarar denna React-kod:

```javascript
React.createElement(
  LoginButton,
  {color: 'cyan'},
  'Logga in!'
)
```

JSX är lättare att läsa och arbeta med, eller vad säger du? Det är inte ett krav att använda JSX med React, men det är något jag starkt rekommenderar.



Babel och ES2015 med Webpack {#babeles2015}
-------------------------------

I exempel-programmet nedan används ES2015 och JSX syntax. För att denna kod ska kunna köras i webbläsaren måste vi transpilera den med hjälp av ett verktyg som heter Babel. Transpilering betyder att du kompilerar källkod från ett språk till källkod i ett annat språk. För att korta ner utvecklingstiden, vill vi gärna transpilera varje gång förändringar sker i vår kod. Den processen kan vi automatisera med hjälp av ett verktyg som heter Webpack.

Min personliga motivation för att använda ES2015 är väldigt simpel - class-syntaxet och nyckelordet "let" gör att JavaScript blir mer likt andra språk jag utvecklar i. Jag ser mig som en programmerare, inte en "valfritt-språk-här" programmerare, och uppskattar därmed att kunna undvika språk-specifika saker i den mån det är rimligt. Utöver det måste man alltid hänga med i utvecklingen av de verktyg och språk man använder, annars riskerar man att bli irrelevant på arbetsmarknaden.

Vi börjar med att installera Babel och de presets Babel behöver för att transpilera ES2015 och JSX.  
Skapa en ny mapp, och kör följande två kommandon i din terminal/cmd - init används för att skapa ett NPM-projekt, och vi använder sedan NPM för att ladda hem de senaste versionerna av de bibliotek vi behöver.

```sh
npm init
npm install --save babel-core babel-loader babel-preset-es2015 babel-preset-react
```
Webpack behöver konfigureras för projektet för att den ska kunna göra det vi vill när koden förändras. Skapa en fil som heter webpack.config.js och fyll den med nedanstående kod:

```javascript
// Här används ES5 Syntax för att webpack inte stödjer ES2015
module.exports = {
    // Webpack behöver veta var den ska börja, och det blir din applikations "main"-fil. 
    //Den kollar på dina import-statements och samlar in allt som applikationen behöver för att köras...
    entry: "./app.js",
    output: {
        // ... och stoppar det I en output-fil, som vi definierar här.
        filename: "bundle.js"
    },
    module: {
        loaders: [{
            // Detta är ett reguljärt uttryck som identifierar alla dina .js-filer
            test: /\.js?$/,
            // Vi vill inte kolla i node_modules, så vi exkluderar den mappen.
            exclude: /node_modules/,
            // Vi lägger till vår babel-loader...
            loader: "babel",
            // ... och berättar för den vilka presets vi vill använda.
            query: {
                presets: ['react', 'es2015']
            }
        }]
    }
};
```

Nu har du en grundläggande konfigurationsfil som låter dig använda Webpack för att transpilera med hjälp av Babel. När du utvecklar kan du välja mellan att skriva "webpack" i din terminal/cmd varje gång du vill transpilera, eller så kan du skriva "webpack --watch". Med --watch kommer webpack att transpilera din kod varje gång den upptäcker att en förändring har skett i mappen där du skriver kommandot.



Exempel-program med React och Flux {#helloworld}
-------------------------------

Nu är det dags att skriva ett exempel-program med React och Redux! Det är en enkel applikation där vi har ett inputfält, två knappar och en lista. Den ena knappen lägger till text-strängar till applikationens state, den andra rensar hela listan. Varje gång en förändring sker i applikationens state vill vi att React-vyn ska uppdateras.  

Exempelprogrammet finns i sin helhet på github, och du kan komma åt det [här](https://github.com/ceruzaa/react-redux-101).

Vi fortsätter i samma mapp som ovan och installerar de fyra bibliotek vi behöver för att komma igång med Redux och React med hjälp av NPM.

```sh
npm install --save redux react-redux react-dom react
```



#### Implementera en Flux-Vy med React

Skapa en fil som heter index.html, som har ett div-element med id "app". Det är här vi ska ankra vår React-app. Vi inkluderar också en bundle.js-fil dit babel kommer exportera den transpilerade koden.
```html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Hello world med Redux och React! </title>
    </head>
    <body>
        <div id="app"></div>
        <script src="bundle.js"></script>
    </body>
</html>

```

Vi börjar med att definiera en App-komponent med JSX i en fil som heter app.js, och vi renderar sedan den på sidan. Vi vill använda "Component" och "render", som är specifika funktioner/klasser från biblioteken vi har installerade, men vi måste också inkludera "React" för att vår transpilator ska kunna ta med den kod som programmet beror på. "import" och "class" är exempel på ES2015-syntax.
```javascript
import React, { Component } from 'react';
import { render } from 'react-dom';

class App extends Component {
    render() {
        return <p> Hello World! </p>;
    }
}
```

Och fortsätter med att ankra komponenten i vår app-div. Observera att render() från react-dom inte är samma som render() som definieras i App-Komponenten. render() från react-dom översätter dina react-komponenter till webbläsarens domträd, och render() i din React-komponent är platsen där du skapar själva komponenten - vilket du kan göra med JSX.

```javascript
render (
  <App />,
  document.getElementById("app")
);
```

Om du nu kör "webpack" borde det transpileras till bundle.js, och om du öppnar index.html borde du se "Hello World!".



#### En klass som Action Creator

Vi behöver en samling med Action-Creators, detta kan åstakommas genom att skapa en klass som har medlems-funktioner som returnerar Action-Objekt.

```javascript
class ActionCreator {
  addListItem(text) {
    return {
      type: 'ADD_LIST_ITEM',
      text: text,
    };
  }

  clearList() {
    return {
      type: 'CLEAR_LIST',
    };
  }
}
```

Nu har vi möjligheter att skapa Actions både för att rensa listan, och för att skapa en ny textsträng i applikationens lista. Uppmärksamma att vi inte behöver någon payload när vi ska rensa listan, applikationens reducer vet vad den ska göra baserat på dess type.



#### Komponentens state

Nästa steg blir att skapa en konstruktor för App-komponenten. Denna konstruktor används för att initialisera state för din komponent. Vi kommer behöva ett attribut för textfältet, därför skapar vi det här.

```javascript
constructor(props, context) {
  super(props, context);
  this.state = {
    inputText: '',
  };
}
```

Vi behöver en event-hanterare som uppdaterar komponentens state varje gång du skriver i inputfältet. Vi skriver den precis som en vanlig event-hanterare för domträdet, och använder event-objektet för att komma åt värdet i textfältet och uppdaterar vår komponents state. Det är viktigt att skilja på komponentens state och applikationens state. Vi skriver inga förändringar till applikationens Store.

```javascript
updateTextField(evt) {
  this.setState({
    inputText: evt.target.value,
  });
}
```

Med lite underliggande funktionalitet kan vi nu lägga till ett input-element. Vi kan returnera flera element i App-Komponentens render-funktion om vi följer två regler - det måste finnas ett rot-element, och det måste vara inom paranteser. Render-funktionen ska nu se ut som följande:

För att kunna se vad vi skriver i fältet, måste vi sätta dess värde till att vara bundet till komponentens state. Detta resulterar till att det uppdateras varje gång vi trycker på en tangent och det virtuella trädet uppdateras. Vi lägger till eventhanteraren som definierats ovan - och vi använder .bind() för att knyta detta värde till den egna komponenten. Om detta inte görs kommer komponenten inte ha tillgång till updateTextField() och du kommer errormeddelandet att "updateTextField() is not a function".

```javascript
render () {
  return (
    <div>
      <h4> Hello World från dbwebb! </h4>
      <input
       type="text"
       value={this.state.inputText}
       onChange={this.updateTextField.bind(this)}
      />
    </div>
  );
}
```

Om webpack transpilerar koden utan errormeddelande, och du kan skriva i ditt inputfält har du gjort allt rätt hittils!



#### Implementera en reducer

Vi går vidare genom att skapa vår Reducer! En reducer implementeras som en funktion, och den interna delen består oftast av en switch-sats. Du ser här att våra case's i switch-satsen matchar de Actions som finns i vår ActionCreator-klass.  
Vi modifierar aldrig state-objektet, utan skapar ett nytt med hjälp av Objekt.assign(), som tar ett godtyckligt antal objekt och skapar ett nytt genom att kopiera state in i ett tomt objekt, och sedan använder du det tredje objektet för att skriva över det nya state-objektet som sedan returneras. Det kan även vara värt att prata lite om ...state.lines. Det kallas för en spread operator, och betyder i det här sammanhanget att vi har en array lines, som har en sträng "Action.text", samt alla strängar i arrayen state.lines.

```javascript
const reducer = function (state, action) {
  switch (action.type) {
    case 'ADD_LIST_ITEM':
      return Object.assign({}, state, {
        lines: [action.text, ...state.lines],
      });

    case 'CLEAR_LIST':
      return Object.assign({}, state, {
        lines: [],
      });

    default:
      return state;
  }
};
```



#### Implementera en Store med Redux

Innan vi kan gå vidare och koda knappar för att lägga till och rensa listan måste vi inkludera redux, och ett bibliotek som heter react-redux. Detta är ett bibliotek som gör det enklare för react och redux att integrera. Vi börjar med att importera det vi behöver från biblioteken.

```javascript
import { createStore } from 'redux';
import { connect, Provider } from 'react-redux';
```

Nu måste vi skapa en Store med hjälp av redux's createStore(), som tar en reducer och ett state-objekt som argument. Vi inkluderar en sträng med Hello World för sakens skull.

```javascript
const store = createStore(reducer, {
  lines: ['Hello World'],
});
```

Nästa steg är att skapa en React-komponent som har Store-objektet tillgängligt till sig, genom att använda connect()() från react-redux. Vi behöver en mapStateToProps-hjälpfunktion för att göra detta.

```javascript
function mapStateToProps(state) {
  return state;
}

let ConnectedApp = connect(mapStateToProps)(App);
```

Och nu vill vi även byta ut App mot ConnectedApp i vår render() från react-dom, och vi inkluderar även Provider-komponenten från react-redux som hjälper med integrationen. Här skickar vi applikationens Store som en prop till vår Provider-komponent, och vi kommer därför ha tillgång till den inuti App-Komponenten.

```javascript
render(
    <Provider store={store}>
      <ConnectedApp />
    </Provider>,
    document.getElementById('app'),
);
```

För att bekräfta att allt fungerar vill vi nu prova skriva ut lines-arrayen som finns lagrad i applikationens Store som en lista. Varje element som returneras när du använder map för att skriva JSX måste ha en key för att React ska kunna hålla koll på dem internt. I nedanstående exempel användes strängens index i arrayen, då det är garanterat unikt.

```javascript
<ul>
  {
    this.props.lines.map(function (line, index) {
      return <li key={index}> {index} : {line}</li>;
    })
  }
</ul>
```



#### Skicka Actions till Redux's Store's Dispatcher

Det enda vi har kvar att göra nu är att lägga till knappar och funktioner för att lägga till och rensa i listan i App-Komponenten.

Vi lägger till elementen i render-funktionen, med de tillhörande funktionerna bundna till det egna objektet...

```javascript
<button onClick={this.add.bind(this)}> Lägg till </button>
<button onClick={this.clear.bind(this)}> Rensa listan </button>
```

... och funktionerna själva i klassens kropp - här använder vi Redux's Store's .dispatch()-funktion för att meddela applikationen att en Action har skett, och vår ActionCreator för att skapa dessa Actions. Vi har tillgång till funktioner i applikationens Store som .dispatch() för att det skickats som prop till komponenten ConnectedApp.

```javascript
add() {
  this.props.dispatch(new ActionCreator().addListItem(this.state.inputText));
}

clear() {
  this.props.dispatch(new ActionCreator().clearList());
}
```



Sammanfattning {#sammanfattning}
-------------------------------

Flux är en arkitektur som löser en del problem MVC har när det gäller att vidareutveckla din applikation. Genom att implementera ett enkelriktat dataflöde är det lätt att resonera kring din kod. En vanlig implementation av Flux är med hjälp av biblioteken Redux + React. Flux passar bäst när du har en applikation vars data varierar över tid, men även om du behöver lägga till funktionalitet i en kontinuerligt växande applikation. Ett bra sätt att utveckla med React + Redux är Webpack och Babel.

Det finns en forumtråd där du kan [ställa frågor och ge tips och tricks](t/6049) om denna artikel.
