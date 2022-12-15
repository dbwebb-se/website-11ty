---
author: mos
revision:
    "2019-01-28": "(B, mos) Genomgången inför vt19."
    "2018-01-02": "(A, mos) Första versionen, uppdelad av större dokument."
...
Entity Relationship (ER) modell
==================================

Låt oss använda MySQL Workbench för att rita ett ER-diagram över de tabeller vi har hittills. Det kan hjälpa oss att få en mental överblick av vilka delar som finns i vår databas.

Entity motsvarar tabellerna och Relationship motsvara de kopplingar som finns mellan tabellerna.



Databasmodellering {#modellering}
----------------------------------

När man modellerar en databas brukar man använda någon typ av "entity-relationship" diagram (ER-diagram). Man brukar börja med att utgå från en text som beskriver databasen, dess entiteter och deras relationer.

> "På skolan jobbar **lärare**. Skolan erbjuder **kurser** vid olika **kurstillfällen** under läsåret. Läsåret är indelat i läsperioder. Varje kurs har en lärare som agerar kursansvarig."

Ungefär så gäller för vår databas skolan så här långt.



Reverse engineering {#reverse}
----------------------------------

Termen _reverse engineering_ kan här innebära att skapa en ER-modell utifrån en befintlig databas. I verktyget MySQL WorkBench möjligheten att rita upp ett ER-diagram på det viset.

Vi prövar med databasen skolan och letar reda på menyvalet "Database -> Reverse Engineer...". Vi klickar oss fram i de rutor som kommer upp och slutligen får vi fram en modell över databasen. Modellen innehåller alla tabeller och vyer som vi skapat.

Man kan behöva flytta runt tabellerna så man får en överskådlig struktur. Så här blir det för mig när jag fokuserar på de tre huvudtabellerna.

[FIGURE src=image/snapvt18/er-skolan.png?w=w3 caption="Reversed ER-diagram över databasen skolan med de centrala delarna."]

Ur diagrammet ovan kan vi utläsa att "kurser har ett eller flera kurstillfällen" och att "lärare kan vara ansvariga för ett eller flera kurstillfällen". Båda dessa modelleras enligt kardinalitet `1..N`. Kardinalitet ger ett extra värde på relationen och anger hur många instanser som är berörda.

Rent strikt är det så att en kurs kan ha 0 eller flera kurstillfällen `0..N` och en lärare kan vara kursansvarig för 0 eller flera kurstillfällen `0..N`. En kurs behöver inte ha kurstillfällen och det finns lärare som inte är kursansvariga. Sådant kategoriserar vi som nyanser i en ER-modell och vi är nöjda med de stora begreppen, den större bilden som ger oss en översikt av tabellerna och dess kopplingar.

Att [modellera och rita ER-diagram från början](kunskap/kokbok-for-databasmodellering), är en egen historia i sig. För tillfället nöjer vi oss med att konstatera att det finns denna typen av diagram och framförallt ser vi att det går bra att skapa diagrammen från en befintlig databas. 



Olika sätt att rita {#rita}
----------------------------------

Det finns olika notationer att använda när man ritar ett ER-diagram. Vilken notation man väljer behöver inte spela någon större roll. Välj en som passar i den arbetsgruppen du är medlem i.

Här är några exempel på vanliga notationer.

[FIGURE src=image/snapvt18/er-notation.png?w=w3 caption="Olika notationer att använda när du ritar ER-diagram."]
