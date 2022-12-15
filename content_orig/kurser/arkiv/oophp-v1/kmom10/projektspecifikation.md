---
author: mos
revision:
  "2012-09-20": (J, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-09-22": (F) Grupperat de optionella kraven för enklare betygsättning.
  "2011-03-21": (E) Merge av examination & projektarbete
  "2010-04-01": (D) Gick igenom och justerade inför kursomgång vt2010.
  "2010-01-12": (C) Lade till att man måste gissa rätt på hangman-ordet.
  "2009-12-09": (B) Mindre korrektionern efter feedback av Rickard.
  "2009-12-08": (A) Första utgåvan
published: "2012-09-20"
updated: "2013-08-13 10:34:25"
created: "2012-09-20 21:44:04"
...
Projektspecifikation Äventyrsspel 2.0
==================================

Du är en egenföretagare och har fått i uppdrag av kunden LARRY att utveckla ett äventyrsspel.




Introduktion {#start}
--------------------------------------------------------------------

Du är egenföretagare och Webb/PHP/MySQL-konsult. Du har fått ett uppdrag av kunden LARRY (Ludicrous Acronym Ravage Reader's Yogurt). LARRY vill massproducera en webbaserad serie med äventyrsspel och har bett dig om ett testspel. LARRY vill testa din förmåga.

Du har accepterat uppdraget och du ser direkt att du kan återanvända det mesta du hittills producerat. Några få nya funktioner och sen snygga till det. Sen blir nog kunden nöjd.

Du tror dig kunna genomföra projektet på max 40 timmar men har tagit höjd för diverse strul i upp till 60 timmar.


Grundläggande krav {#grund}
--------------------------------------------------------------------

###Välkomstsida {#valkommen}

Spelet skall ha en välkomstsida där spelets idé kortfattat presenteras för spelaren. Det skall klart framgå vem som skapat spelet. Ge en länk till din me-sida.

Det skall finnas en länk till att spela spelet. Om det krävs sessioner så skall detta fungera utan att spelaren behöver bry sig om det.


###Rummen {#rummen}

Spelet skall bestå av 8-10 rum, exklusive utmaningarna. Det är ingen bonus att göra många rum.


###Alla rummen-sida {#alla}

Det skall finnas en översiktssida som visar samtliga rum. Där skall det finnas en direktlänk till respektive rum. På detta sätt går det att nå samtliga rum utan att "spela spelet".


###Lösningssida {#losning}

Det skall finnas en sida med instruktioner (text) som steg för steg visar snabbaste sättet att gå igenom spelet. Förklara vad som skall göras i rummet och i vilken riktning som spelaren skall gå.

I de fall som det krävs lösningar för utmaningarna så skall de presenteras i lösningssidan. Det skall finnas en möjlighet att fuska sig förbi en utmaning.

Allt för att det skall vara enkelt för kunden att testa spelet. Kunden använder extern testpersonal så se till att beskrivningen är korrekt och lätt att följa. Detta är en viktig del av ditt projekt.


###Dokumentation {#dokumentation}

Samtlig dokumentation skall vara tillgänglig från välkomstsidan. 

Rita en översikt av hur rummen och utmaningarna hänger ihop (liknande en sådan bild som visas i kmom07). Visa bilden på välkomstsidan som en del av förklaringen till spelet.

Rita ett ER-diagram över databasen (liknande en sådan bild som visas i kmom07). Visa ER-diagrammet på välkomstsidan som en del av förklaringen till spelet.

Källkoden skall vara lätt tillgänglig.


###Drift, test och målmiljö {#drift}

Äventyrsspelet skall vara installerat och i drift på www.student.bth.se.

Äventyrsspelet skall fungera utan problem på Firefox webbläsare.


###Layout, färg och form {#layout}

Ett snyggt spel är alltid trevligare att spela. Gör så bra du kan och hinner. 


Utmaningar (grundläggande krav) {#utmaning}
--------------------------------------------------------------------

Följande är utmaningar i form av småspel som måste genomföras för att kunna gå vidare i äventyrsspelet. Samtliga utmaningar skall vara väl integrerade i spelets stilmall/utseende.


###Kortspelet (High Low Card) {#high}

Kortspelet High Low Card skall användas som en utmaning i äventyrsspelet. Utmaningen måste klaras av för att kunna gå vidare.

Korten skall visa klart och tydligt vilken valör de har. Detta gäller även för essen och jokrarna.


###Tärningsspel (Kasta gris) {#gris}

Tärningsspelet skall användas som en utmaning i spelet. Utmaningen måste klaras av för att gå vidare. Utmaningen kan innebära att du skall kasta tärningarna och uppnå 10 poäng innan du får gå vidare. Kastar du en etta så nollställs din summa och du får börja om.

Om du gjorde Yatzy, slotmaskin eller en annan variant så inkluderar du en enkel variant av den. Alternativ skriver du ett enklare spel, liknande kasta gris.


###Gissa ordet (Hangman) {#hangman}

Använd en variant av Gissa ordet (Hangman) som en utmaning i spelet. Ange ett ord som spelaren måste gissa (och klara) för att kunna gå vidare. Använd bara ett ord hela tiden. Glöm inte att ange rätt ord i lösningssidan.


Optionella Krav {#opt}
--------------------------------------------------------------------

Följande krav implementeras om du vill ha möjlighet att uppnå ett högre betyg på kursen.


###Optionellt Krav 1 {#opt1}

**Hälsomätaren**

Hälsomätaren skall uppgraderas så att spelaren kan hämta hälsa/energi genom att äta frukt (tex äpple). Frukten skall finnas tillgänglig i ett par rum.

**Den ruttna frukten**

Om spelaren tar upp och äter av den ruttna frukten så går hälsomätaren ned till 0. Välj ett par av rummen och placera ut den ruttna frukten där.


###Optionellt Krav 2 {#opt2}

**Ryggsäck**

Skapa en ryggsäck där spelaren kan plocka upp, spara och bära med sig föremål (kortlek, tärning, bokstäver) som han hittar längs spelet. Dessa föremål kan sedan behövas för att klara utmaningarna (använd kortlek (kortspel), använd tärning (kasta gris), använd bokstäver (hangman)).


###Optionellt Krav 3 {#opt3}

**Transferering till slumpmässigt rum**

Larry vill att det skall finnas lite slumpmässighet i spelet. Oklart varför. Larry vill att det skall finnas en transfererings-funktion som för spelaren till ett slumpmässigt rum, oavsett var spelaren befinner sig.

Transfereringsmöjligheten skall vara möjlig i alla rum till alla rum. Har man riktig tur så kan man transferera sig från första rummet till sista.

**Ett rum för mental återhämtning**

Ibland vill spelaren bara ta en paus och hämta kraft. Då skall det finnas ett nytt rum dit spelaren kan gå och vila. Om spelaren stannar i rummet längre än 10 sekunder så fylls hälsomätaren till max. Om spelaren stannar mindre än 10 sekunder så minskas hälsomätaren på sedvanligt sätt.

Rummet för mental återhämtning skall vara tillgängligt från alla rum.


Övrigt {#ovrigt}
--------------------------------------------------------------------

Om oklarheter uppstår, fråga i forumet eller gör ett antagande och dokumentera det.



