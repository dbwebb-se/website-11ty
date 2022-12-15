---
author: efo
revision:
    "2021-12-07": (A, efo) Skapad inför VT2022.
...
Introduktion till molnet
==================================

Vi ska i denna artikel ta en titt på molnet generellt och lite mer specifikt Azure Cloud.


<!--more-->



Grundläggande om molnet {#grundlaggade}
--------------------------------------

Det är ingen tvekan om att molntjänster snabbt har gått från noll till att numera vara en del av vårt dagliga liv.

Datacenter byggs i hög takt, Amazon öppnade upp sin svenska [datacenterregion](https://computersweden.idg.se/2.2683/1.711887/amazon-web-services-svenska-serverhallar) i Eskilstuna, Västerås och Katrineholm 2018 och Microsoft kommer bygga sin svenska [datacenterregion](https://news.microsoft.com/sv-se/2020/11/24/microsoft-presenterar-investeringar-for-att-driva-pa-digitaliseringen-i-sverige-och-oppnandet-av-den-svenska-datacenterregionen-2021/) i år i Gävle, Sandviken och Staffanstorp.

Kurslitteraturen ger en beskrivning och definition av Cloud, och även om vi kanske inte tänker på att vi använder någon av de större molnoperatörerna för att lagra vår data eller köra våra appar så konsumerar vi säkert redan många andra molntjänster än de cases som beskrivs i Bill Laberis litteratur.

Det kan vara kul att reflektera över vilka tjänster man använder och hur tjänsterna hanteras. Privat är jag (Oscar) en konsument av Netflix som började [molnresan](https://about.netflix.com/en/news/completing-the-netflix-cloud-migration) till AWS 2008, Spotify som lade sin tjänst i [Google Cloud](https://www.computerworld.com/article/3427799/how-spotify-migrated-everything-from-on-premise-to-google-cloud-platform.html) 2016, och Call of Duty Mobile där Activision verkar använda både AWS och Google Cloud. Många andra tjänster som jag använder hostas sannolikt också av mindre cloud service providers.

Blekinge Tekniska Högskola använder tjänster från flera [cloud service providers](https://azure.microsoft.com/en-us/overview/what-is-a-cloud-provider/) för utbildning, forskning och administration.

Mest använder vi [Microsoft Azure](https://docs.microsoft.com/en-us/learn/modules/intro-to-azure-fundamentals/what-is-microsoft-azure), bland annat för mycket av högskolans behov för infrastruktur, utveckling/test/labbmiljö, samt driftsmiljö för många av våra system och tjänster. Beroende på behov använder vi olika [cloud service models](https://azure.microsoft.com/en-us/overview/types-of-cloud-computing/), till exempel virtuella maskiner i IaaS, app services och databaser i PaaS, eller Microsoft Office 365 som SaaS.

Titta på [detta](https://docs.microsoft.com/en-us/learn/modules/intro-to-azure-fundamentals/tour-of-azure-services) för att få en överblick av de tjänster som ingår i Azure.

I stort sett motsvarande utbud av tjänster finns från alla större cloud providers, t.ex. [AWS](https://aws.amazon.com/products/), [Google Cloud](https://cloud.google.com/products), [Alibaba Cloud](https://www.alibabacloud.com/product) mm.

I denna kursen kommer vi att arbeta hands-on med ett fåtal av alla de många möjligheter som finns i molnet, till exempel för att skapa, testa och exekvera applikationer.

[Läs igenom denna definitionen](https://docs.microsoft.com/en-us/learn/modules/intro-to-azure-fundamentals/what-is-cloud-computing) av vad cloud computing är och vilka fördelar som finns.

Vi kommer att få många tillfällen att diskutera fördelar och nackdelar med molnet framöver under kursens gång.



Grundläggande om Azure {#azure}
--------------------------------------

Det kan vara nyttigt att förstå grunden i hur Azure är strukturerat när det kommer till avtal och resurser.

Det finns olika former till prenumerationer som Microsoft erbjuder kunder.

Allt från en Pay-As-You-Go, där man matar in sin betalkortsinformation till ett enterpriseavtal som är vanligaste formen för företag och myndigheter.

Ett enterprise avtal kan delas upp i olika Departments/avdelningar.

Varje department har accounts/konton som som har rättighet att skapa subscriptions/prenumerationer

Genom subscriptions/prenumerationer får man förutsättningar för att kunna skapa kostnadsdrivande resurser.

BTH har ett [enterpriseavtal](https://docs.microsoft.com/sv-se/azure/cost-management-billing/manage/understand-ea-roles#azure-enterprise-portal-hierarchy) och för din del så kommer du i kontakt med Azure genom en subscription som skapats upp för dig under tiden för denna kurs.

I din subscription har du möjlighet att skapa upp resource groups/resursgrupper, som fungerar som en sammanhållande folder för resurser som har samma livscykel. Om du till exempel har några resurser som samverkar tillsammans för ett syfte, ofta behöver uppdateras samtidigt och troligtvis slutligen kommer att tas bort samtidigt, så är det lämpligt att lägga dessa i samma resursgrupp.

![Azure Struktur](image/moln/azure_struktur.png)



### Coolt, är det fritt fram att börja testa runt nu då? {#free}

**Nej**, det är det tyvärr inte. :)

Cloud service providers har en konsumtionsbaserad betalningsmodell, och beroende på hur många och hur kraftfulla resurser som skapas så driver det en kostnad.

Det innebär att dina möjligheter att skapa allting som finns i Azure är begränsade genom [Policies](https://cloudskills.io/blog/azure-policy). Dessa policies kommer förändras, vilket kommer ge dig nya möjligheter under kursens gång beroende på de resurser som behövs vid tillfället.


### Ok, men får jag skapa hur många resurser jag vill? {#resources}

**Nej**, det får du tyvärr inte.

Du har möjlighet att skapa fler än en resurs av de resurstyper som är tillåtna, men fler resurser innebär en ökad kostnad. För att begränsa kostnaden finns en [budget](https://www.youtube.com/watch?v=UrkHiUx19Po) lagd på din subscription. Budgeten innebär att din användning av Azureresurser är begränsad till {xxx} kronor i månaden, och att du därför behöver hushålla med detta för att det ska räcka under hela månaden.

För att stötta dig finns automatiska mail som kommer att skickas till dig vid händelsen att du når x% och y% av budgeten. Vid z% kommer dina tjänster att stoppas, och om du startar dem igen kommer de eventuellt automatiskt att raderas. Det är därför viktigt att hålla koll på kostnader.



### Så hur håller jag koll på kostnaderna för min subscription? {#subscription}

Azure har en tjänst som heter [Azure Cost Management](https://www.youtube.com/watch?v=mfxysF-kTFA). Den ger möjlighet att se vilka kostnader som finns på subscription- eller resursgruppsnivå.

Tjänsten är mycket bra för att få en förståelse för på vilket sätt kostnader genereras i en molnmiljö.

![Cost Control](image/moln/cost-control-subscription.png)



### Vilka möjligheter har jag om jag vill testa mer fritt?

Microsoft, Amazon och Google har alla erbjudanden om kostnadsfria testkonton som du kan använda.

Utöver detta erbjuder Microsoft genom Ignite möjlighet för dig att skapa ett studentkonto vilket ger möjligheter att testa Azure i egen regi.


## Kostnader moln vs egen drift {#kostnader}

Cloud computing har en konsumtionsbaserad betalningsmodell vilket innebär att man betalar för det man använder. Beroende på hur mycket resurser som konsumeras så blir kostnaden högre, och när användningen minskar så gör också kostnaden det.

Kostnader benämns ofta som Capital Expenditure (CapEx) dvs investering i anläggningstillgångar och Operational Expenditures (OpEx) dvs löpande utgifter.

En transition till molnet i jämförelse med egen drift innebär eventuellt att investering i anläggningstillgångar minskar och löpande utgifter ökar.

Om man googlar på **Azure/Google/AWS/{din cloud provider här} pricing calculator** så får man oftast tydliga och exakta kostnadsuppgifter vad tjänster kostar per gigabyte, timme, storlekar på SKU's, antal transaktioner mm.

Ofta innebär en lokal infrastruktur som erbjuder samma nivå av tjänst en avsevärd investering.

Det finns även många exempel på tjänster som har en funktionalitet där en lokal drift knappt ens är möjlig, eller inte går att motivera kostnadsmässigt.

Läs mer om CapEx/OpEx samt fördelar med molntjänster [här](https://docs.microsoft.com/en-us/learn/modules/fundamental-azure-concepts/benefits-of-cloud-computing).

Cloud providers har ofta en kalkylator (t.ex [Microsofts](https://azure.microsoft.com/sv-se/pricing/tco/calculator/)) för att hjälpa till att beräkna dessa kostnader, men de är inte helt enkla att använda såvida man inte redan har ett datacenter och en ganska klar bild av vilka kostnader och behov som man har. Men det kan tjäna som hjälp för att få en insikt i vilka kostnader som kan finnas.

Men så vad landar detta? Är molnet billigare och bättre än egen drift? Svaret är inte lätt att ge för det beror på.

För BTH's del så har satsningen på molnet varit mycket lyckat, men kostnader har inte varit den enda framgångsfaktorn.

Vi kan som litet lärosäte erbjuda kraftfulla tjänster som hade varit mycket kostsamma om de hade krävt en investering i ett lokalt datacenter.

Om det har blivit billigare är rätt svårt att svara på eftersom möjligheterna har ökat och därför användning av tjänster likaså.

Dessutom innebär en lokal drift många "gömda" kostnader som inte är helt lätta att fördela ut på driftskostnaden av en app.

![Cost of ownership](image/moln/cost-of-ownership.jpg)
