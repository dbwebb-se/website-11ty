---
author: aar
revision:
    "2021-06-01": (A, aar) Första versionen.
...
Hur ber man om hjälp med kod i chatten?
==================================

Det händer ofta att koden vi skriver inte fungerar och vi kan inte komma på varför själva. Då är det bra att det finns ett community där vi kan be om hjälp, där kommer våra chatter in i bilden där lärare och andra studenter kan hjälpa oss. Här ska vi lära oss hur vi kan utforma vår fråga så att vi får svar så snabbt som möjligt.

<!--more-->

Jag rekommenderar att först läsa [Lärarstöd och handledning](kurser/faq/lararstod-och-handledning), där lär ni hur ni kan tänka om att ställa frågor. Här lär vi oss hur vi ställer dem.



## Att göra före ni ställer er fråga {#before}

Innan ni frågar om hjälp är det bra att ta reda på följande saker:

- hur ni kan återskapa felet.
- avgränsa vart felet uppstår. Antingen i vilken fil, funktion, konstruktion, eller på vilken rad felet uppstår? Ju mer exakt desto bättre.
- vad du vill/förväntar dig att koden som går fel ska göra.
- vad det är koden gör istället för det du förväntar dig.
- använd debugger för att felsöka och förstå varför det blir fel.

När ni ber om hjälp formulera en fråga istället för att skriva "Hej min kod funkar inte". Då vet vi inte hur vi ska hjälpa dig och måste be dig skicka med de sakerna som det står om här. För tips om hur ni formulerar frågan, kolla in när [Mikael pratar med sin gummi anka](https://dbwebb.se/kurser/faq/lararstod-och-handledning#anka).

Oroa dig inte om att verka dum eller dålig. De lättaste felen är ofta svårast att hitta. Till säkert 30% av frågorna vi får är svaret "ni saknar en avslutande parentes". Det händer alla programmerare och är inte något man behöver skämmas för. 



## Vilken information bör en frågan innehålla? {#content}

**Inkludera er kod**, men ta inte med **all** fungerande kod. Majoriteten av koden är oftast inte intressant för frågan. Försök avgränsa mängden kod ni visar till bara det som är relevant till felet. Oftast borde det inte vara mycket mer än 5 rader. Det är också en bra övning för er om ni kan avgränsa felet till specifika rader. 

**Inkludera resultatet/utskriften** av ditt program när det går fel. Det går oftast att utläsa från utskriften vad som gått fel och då underlättar det om det redan är med i frågan. Vi kan också förklara hur ni ska tolka resultatet för att förstå vad som gick fel.

**Inkludera radnummer i koden**. Det är lättare att prata om kod om vi kan säga "på rad 38...", istället för "på raden som börjar börjar med if something_is_true".

**Inkludera uppgiften ni försöker lösa**. Vi har många uppgifter i kursen och vi kommer inte alltid ihåg exakt vad som ska göras (speciellt i labbuppgifterna). Det underlättar om vi kan läsa er kod i samband med vad den ska uppnå.



### Exempel {#example}

I frågan försöker jag vara tydlig med vad jag gör och vad jag vill ha hjälp med. Jag skickar också med bilden nedanför så att de kan se min kod, felet och exakt vad som är uppgiften.

> Jag försöker lösa uppgift 1.2 i lab1 men mitt program kraschar när jag kör det. Jag försöker addera 100 med variabeln från uppgift 1.1 men programmet kraschar när jag kör det och jag förstår inte felmeddelandet jag får i terminalen, kan någon hjälpa mig förstå felmeddelandet?


[FIGURE src=image/hjalp.png caption="Exempel på skärmdump med ett fel."]

Notera att jag också har strukit under det viktiga i terminalen för att jag hade gjort irrelevanta saker tidigare i terminalen som den som hjälper mig inte behöver titta på.

På den frågan hade svaret kunnat se ut på följande sätt.

> Felet säger att du inte kan addera ett heltal med en sträng. I uppgiften står det att du ska använda heltalet 100. Men på rad 78 tilldelar du 100 som en sträng.



## Hjälpmedel {#aid}

Här har vi tips på olika verktyg som är bra när man jobbar med kod och vill dela med sig eller fråga om hjälp.

### Formatera text som kod i chatten {#format}

Att skicka kod som text i chatten är ofta jobbigt för den som läser. Som tur är stödjer Discord att formatera text som kod. Det gör Discord med hjälp av [Markdown](https://guides.github.com/features/mastering-markdown/), med det kan vi stila texten på olika sätt. Vi kan t.ex. använda **\`\`\`** för att omsluta delar i en text för att det ska formateras som kod.

Exempel, överst i bilden ser vi koden som vanlig text. I nedre halvan har jag omslutit koden med **\`\`\`** före och efter. Ni kan göra det mitt i en text så är det bara det innanför som blir formaterat som kod.

[FIGURE src=image/formatering.png caption="Exempel formaterad text i discord."]

Använd det när ni delar kod i chatten och inte använder er av skärmdumpar.

Här kan ni också se när Mikael visar upp det. **Notera** att han använder vår gamla Gitter chat, men det fungerar likadant i Discord som vi använder nu.

[YOUTUBE src=9zbIwjGhWuk caption="Mikael formaterar kod i chatten"]



### Dela större mängd kod {#share}

Ibland finns det behov av att dela mer än bara några rader kod eller till och med flera filer. För att slippa skicka all kod rätt upp och ner i en chatt finns det verktyg online för att dela med sig av kod. I videon nedanför kan ni se när Kenneth visar upp verktygen [Gist](https://gist.github.com/) och [CodeShare](https://codeshare.io/).

[YOUTUBE src=lrVtvqlhWjY caption="Kenneth visar hur man delar med sig av kod med codeshare och github."]

#### CodeShare {#codeshare}

[codeshare](https://codeshare.io/) är ett verktyg för att dela med sig och samarbeta med kod. Flera personer kan editera och kolla på koden i realtid. Är bra om man behöver visa en större mängd kod när man om hjälp.

#### Gist {#gist}

[Gist](https://gist.github.com/), påminner om codeshare fast inte lika interaktivt. Gist funkar bättre för att visa upp färdig kod. Men det funkar också för kod man behöver hjälp med.



### Skärmdumpar

Att ta kunna ta skärmdumpar och dela med sig av är ett lätt sätt för att förmedla information till andra. Hitta ett program som är lätt att använda för att ta skärmdumpar och lär er använda det. Det är pluspoäng om ni också kan rita på skärmdumpen efter att ni har tagit den.

Windows har bra inbyggt med `windowsknapp+shift+s`. Eller programmet snippingtool. På Mac kan ni använda `Shift+Command+4` för deras inbyggda.

[YOUTUBE src=v9NEXsRC5s0 caption="Mikael visar hur man tar skärmdumpar och delar med chatten."]
