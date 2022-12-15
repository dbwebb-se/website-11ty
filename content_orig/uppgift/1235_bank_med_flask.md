---
author: moc
revision:
    "2021-01-28": (B, aar) Bytte namn på json filen så det är samma namn i exempel koden.
    "2021-01-13": (A, moc) Skapad inför VT21.
category:
    - oopython
...
Bygg en bank med flask - Del 1
===================================

[FIGURE src=/image/oopython/kmom02/bank_1.png?w=c5 class="right"]

Uppgiften går ut på att med hjälp av klasser, Flask, jinja2 och CSS, skapa en webbsida där man kan flytta pengar och räkna på räntor.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gått introduktionskursen i Python.  
Du har läst artikeln "[GET, POST i Flask](kunskap/flask-get-post)".  
Du har läst guiden "[Klass relationer](guide/kom-igang-med-objektorienterad-programmering-i-python)".  



Introduktion {#intro}
-----------------------    

Du jobbar vid sidan om dina studier och din kund vill att du gör klart en webbsida som redan är påbörjad. Gränssnittet och routes för sidan är redan klart, du ska skapa klasserna för backend:en till webbsidan. I och med att frontend redan är klar och innehåller anrop till koden du ska skapa behöver dina klasser uppfylla abstraktionskraven som det medför. Med det menas att i dina klasser behöver det finnas vissa metoder och attribut med rätt namn, annars kommer inte frontend fungera med din backend. I klassdiagrammet nedanför kan du se vilket gränssnitt din klasser måste uppfylla. Med gränssnitt menas existerande publika metoder.

[YOUTUBE src=-4bddxGr0X0 width=630 caption="Så här ser det ut när uppgiften är klar."]

Du ska implementera klasserna för de två kontotyperna och kontohanteraren som app.py jobbar mot.

[FIGURE src=/image/oopython/kmom02/bank_uml_1.png?w=100% caption="Klassdiagram för uppgiften."]

- Attribut och metoder som är markerade med `<<get>>` eller `<<set>>` används för att markera metoder med properties och setters decorator.  

- Attribut och metoder som är <u>understrukna</u> är statiska.  

- Attributen och metoderna som är **bold**-markerad används av den färdiga koden ni får och måste därför implementeras av er med de namnen.  
Övriga är bara exempel på vad man kan ha med.

<!-- [YOUTUBE src=GBmyT_TntXA width=630 caption="Andreas förklarar klassdiagrammet och koden som ska skrivas."] -->

Appen följer överlag samma struktur som i övningen, vi använder oss av en json-fil för att spara den dynamiska data som applikationen inte kommer ihåg mellan request:en. Ett tips, när du börjar utveckla en ny metod som anropas från den färdiga koden, använd dig av `print()` i metoden du skapar och kolla klassdiagrammet för att ta reda på vad som skickas som argument till din metod.

<!-- [YOUTUBE src=rqfqn29glIo width=630 caption="Hur ska man börja med bank uppgiften?"] -->

Krav {#krav}
-----------------------

Börja med att kopiera frontend koden till ditt uppgift.

```bash
# Ställ dig i kurskatalogen
# börja med att uppdatera mappen med senaste exempelkoden
dbwebb update
cp -ri example/flask/bank me/kmom02/
cd me/kmom02/bank
```

1. Bekanta dig med koden, kolla igenom app.py för att se vilka routes som finns och vilka html filer som används till vad. Leta efter alla anrop som görs till klasserna du ska skapa så att du får en bild av vilka metoder som behövs och vad de används till.

1. Skapa filen `static/data/accounts.json` där du sparar den data man behöver för att återskapa alla existerande konto-objekt. Ändras något (t.ex kontots balans) skall det sparas till samma fil. Uppdatera innehållet så det innehåller 3 konton av varje klass.   
Filen skall läsas in ifrån AccountManagers konstruktor.  
Det finns ett exempel i samma katalog du kan utgå ifrån. **Glöm inte** också att ge `accounts.json` läs och skrivrättigheter:

```bash
chmod 777 static/data/accounts.json
```

3. Implementera klasserna som behövs i filerna `account_manager.py` och `accounts.py`. Totalt skall det minst finnas tre konton av varje typ.

1. Ett konto skall ha metoder som hämtar sitt id, balans och typen (namnet på klassen).  
Den skall även kunna ändra på sin balans, innehålla en klass metod som returnerar en ny instans från en dictionary och beräkna en överföringskostnad.  
Den skall få sitt *id* tilldelad från det statiska attributet `Account.account_number` (den skall ej skickas med i konstruktorn).  
`Account.transaction_fee` säger procenten som skall dras av det överförda beloppet. Överför man exempelvis 100kr med en avgift på 1%, skall 100kr dras från kontot men mottagaren ska endast få 99kr insatta.

1. `SavingsAccount` ärver `Account`. Den skall ha en extra funktionalitet som räknar ut kontots dagliga ränta beroende på `SavingsAccount.interest_rate` som representerar den årliga räntan i %. Den skall också ha en högre `transaction_fee`.

1. `AccountManager` ska äga alla tillgängliga konton, kunna överföra pengar mellan två konton samt, räkna på hur mycket pengar ett sparkonto kommer till att få av sin ränta mellan dagens datum till den som användaren väljer från en datepicker.  
Det ska finnas metoder för att hämta alla konton, hämta ett specifikt konto, lägga till ett nytt konto (använd när du skapar konton från sjon filen) samt hantera json-filen.


1. Du ska inte behöva ändra i några av de andra filerna, förutom kanske style.css, men om du känner att du vill/behöver det skriv varför i din redovisningstext.


```bash
# Ställ dig i kurskatalogen
dbwebb validate bank
dbwebb publish bank
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i discord om du behöver hjälp!
