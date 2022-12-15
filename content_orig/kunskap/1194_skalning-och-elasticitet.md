---
author: efo
revision:
    "2021-12-17": (A, efo) Skapad inför VT2022.
...
Skalning och elasticitet
==================================

Vi ska i nedanstående artikel kolla på några fördelar med molnet och börjar med några definitioner. Vi avslutar med att gå igenom ett praktisk exempel.



<!--more-->



## Definitioner {#definitioner}

**Skalbarhet** är ett systems förmåga att hantera ökad last genom att lägga till resurser.

Man brukar tala om att skala upp/ner och ut/in, ett annat sätt att benämna det är också att skala horisontellt och vertikalt.

**Skala upp/ner** - Vertikal skalning, är när man behåller antalet instanser, men ökar eller minskar resursernas kraft. För en App Service Plan innebär det ökad eller minskad CPU, minne mm.

**Skala ut/in** - Horisontell skalning, är när man ökar eller minskar antalet instanser av en resurs.

**Elasticitet** är förmågan att anpassa systemets resurser utefter de belastningar och behov som existerar för tillfället. Anpassning görs genom skalning.


### Hur skalas en WebApp {#webapp}

En specifik Azure App Service går inte att skala, istället är det dess App Service Plan som man skalar.

Det innebär att när man har skalat en App Service Plan så påverkar det alla App Services som är knutna till den specifika App Service Planen.

Under en viss nivå i App Service Plans går det bara att skala manuellt, men över S1 så går det även att automatisera skalning beroende på last.


## Labb - Hur påverkas en Web App av en skalning {#lab}

Det finns ett litet sätt att laborera och observera en WebApps påverkan av skalning, och vi ska nu genomföra en liten labb runt det.

Vi ska utföra laborationen genom att manuellt skala upp och ut, och se hur det påverkar en enkelt applikation.

Vi kommer inte att undersöka skalningens inverkan i kraft och performance, istället kommer vi observera hur appens process påverkas av skalning.



### Skapa en Python Flask app {#flask}

Vi skapar en minimal Flask app med en default route med en view function som använder en global variabel till att hålla ett värde för hur många gånger en request har skickats till routen.

```python
from flask import Flask # Importera klassen Flask från flaskpaketet
app = Flask(__name__) # Anropa flask-konstruktorn som skapar ett globalt flask app-objekt med aktuella modulens namn

visits = 0 # Initiera en global variabel

@app.route("/") # Sätt en route decorator med default route
def home(): # En funktionsdefinition med decorator benämns som en View function
    global visits # Definiera att den globala variabeln åsyftas
    visits +=1 # Öka på antalet med +1
    return "<H1>" + str(visits) + "</H1>" # Returnera antalet
```

Det är allt. Kör den lokalt för att verifiera att den funkar. För varje gång du laddar om sidan kommer nu räknaren att öka med 1.

![mini app](image/moln/mini_scale_app.png)

![mini browser](image/moln/mini_scale_browser.png)



### Sätt App Service Plan till Free

Gå till [https://portal.azure.com](https://portal.azure.com) och hitta din App Service Plan.

I vänstra menyn väljer du Scale Up.

Verifiera att du kör på Dev/Test F1 och ändra om så inte är fallet. (Apply)

![mini set free](image/moln/mini_set_to_free.png)



### Publicera appen till Azure

Vi publicerar vår nya app till vår Azure App Service på samma sätt som vi gjorde i förra labben.



### Testa appen

Testa att gå till din nypublicerade app och refresha websidan några gånger. Notera att räknaren stegar upp som förväntat.



### Test - Skala upp från Free till B1

Gå tillbaka till https://portal.azure.com (Länkar till en externa sida.) och fliken Scale Up.

Denna gången väljer du Dev/Test storleken B1. (Apply)



### Testa appen

Testa igen att gå till din app och refresha websidan.

Under en tidsperiod kommer räknaren att fortsätta räkna upp, men när App Service Planen har skalat upp fullständigt så kommer räknaren att börja om på 1 igen.

Det som hände var att du har bytt förutsättningar för App Service Planen och python-processen har därför startat om under de nya förutsättningarna.



### Test - Skala ut från 1 till 3 instanser

Gå tillbaka till [https://portal.azure.com](https://portal.azure.com) och välj fliken Scale out.

Öka Instance Count till 3 och klicka på Save.

![mini scale out](image/moln/mini_scale_out.png)



### Testa appen

Testa igen att gå till din app och refresha websidan.

Under en tidsperiod kommer räknaren att fortsätta räkna upp, men i takt med att App Service Planen skalar ut så kommer du att få olika räknare.

Den räknare som du hade ursprungligen har dock inte startat om på noll, utan har fortfarande det värde den hade från ditt förra test.

Det som hände var att Azure behöll din första instans levande, och började efter hand provisionera ut fler instanser. Varje ny instans för App Service Planen innebär att du får en ny instans av din app (och alla andra appar som du knutit till App Service Planen).



### Vad innebär detta?

Många saker kan hända i Azure som påverkar dina resurser. Exempelvis kan hårdvaran i den server som din app körs i gå sönder så den tilldelas en ny server, eller app service planen skalas upp/ned/ut/in manuellt eller automatiskt, uppdatering av mjuk eller hårdvara gör att din app flyttas till annan instans, mm.

Oavsett vad som triggar förändringen, så kan din app startas om utan din kontroll. Det märks troligtvis inte ens för överflyttningen sker kontrollerat för att din app inte ska ha någon nedtid. Men - du kan inte förvänta dig att information kan hållas i minnet i processen över tid.

Vill du veta [mer](https://docs.microsoft.com/en-gb/azure/app-service/manage-scale-up)?
