---
author: mos
category:
    - kurs webtec
revision:
    "2021-09-10": "(B, mos) Byt rsync till cp -ri."
    "2021-06-15": "(A, mos) Första utgåvan."
...
Skapa en rapportsida till webtec-kursen
===================================

Du skall skapa mallen till din rapport-sida som följer dig genom kursen. I rapportsidan skriver du redovisningstexter för de uppgifter och kursmoment som du utför.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har en installerat en labbmiljö för kursen webtec.



<!--
Genomgång {#genom}
------------------------

Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.



### Kopiera exempelkoden {#kopiera}

I kursrepot finns en mall för rapportsidan i `example/report`. Du kan utgå från den. Börja med att kopiera den till `me/report`.

```text
# Gå till roten av kursrepot
cp -ri example/report/ me/
```

Kommandot `cp` tar en kopia av katalogen `example/report` och sparar som `me/report`.



Validera och publicera {#validate}
-----------------------

Koden som du skriver skall laddas upp på studentservern med kommandot `dbwebb`. Det gör du på följande sätt.

```text
# Gå till roten av kursrepot
dbwebb validate report
dbwebb publish report
```

Kommandot `dbwebb validate` kör igenom ett antal valideringsverktyg som kontrollerar hur din kod ser ut. Om valideringsverktygen anser att du skriver felaktig kod så får du varningar som du behöver rätta till.

Om du inte förstår varningarna så försöker du hitta svar till dem. Eller så frågar du. Denna typen av verktyg som gör statisk kodvalidering är viktiga verktyg för en professionell utvecklare.

Kommandot `dbwebb publish` gör samma sak som `dbwebb validate` samt att det dessutom publicerar din webbplats på studentservern. När din webbplats publiceras så minifieras också dess innehåll. Minifiering innebär att koden komprimeras och onödiga delar som kommentarer tas bort.

Kör dessa kommandon ofta, så slipper du få en lång lista med varningar, precis när du trodde du var klar.

Nu kan du köra igång med själva uppgiften. Du hittar kraven nedan.



Krav {#krav}
-----------------------

Utför följande krav.

1. Se till att du har en rapportsida som minst innehåller den struktur som fanns i `example/report`.

1. Uppdatera rapport-sidan så att din Om-sida innehåller detaljer om dig själv (det är okey att hitta på saker om du hellre vill det).

1. Uppdatera sidans stylesheet, om du vill.

1. Besvara följande frågor i din redovisningstext.

    * Hur gick det bra att installera kursens labbmiljö, flöt det på bra eller krånglade något?
    * Berätta om din utvecklingsmiljö - vilken datormiljö, operativsystem, editor, terminal och webbserver använder du?
    * Berätta om upplevelse av terminalen, är du bekant med terminalen och Unix-kommandon sedan tidigare?



Publicera {#publicera}
-----------------------

Avsluta uppgiften så här.

1. När du är klar kan du publicera resultatet med `dbwebb publish report`.

1. Testa ditt resultat så att det passerar de automatiska testerna med `dbwebb test report`.
