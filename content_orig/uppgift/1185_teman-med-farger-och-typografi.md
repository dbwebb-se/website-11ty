---
author: mos
category:
    - kurs/design
    - tema
    - less
revision:
    "2018-11-19": (A, mos) Kopierade från 'Bygg en bas och en familj av teman' samt omskriven för design v2.
...
Teman med färger och typografi
===================================

Du skall nu skapa en knapp handfull teman och varje tema skall anpassas med ett par "variabler" utifrån ett grundtema. Börja med att tänka det minimalistiska temat för dbwebb.se som ett exempel. Du skall göra ett minimalistiskt tema, ett enkelt tema. Tänk sedan att du (kraftigt) färglägger samma tema och slutligen inverterar du färgerna och gör ett tema med svart/mörk bakgrund och ljust typsnitt.

Innan du börjar uppgiften som kan du behöva fundera igenom vilken typ av grundtema som du kan göra så att alla de andra, de "riktiga" temana (minimalistic, colorful, dark) kan återanvända bastemat och anpassa det via variabler.

Förutom färgerna så jobbar du med typografin och gör medvetna val om typografin som kan matcha dina teman.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom uppgiften "[Bygg ut ditt tema med stöd för vertikalt och horisontellt grid](uppgift/bygg-ett-tema-med-vertikalt-och-horisontellt-grid)".

Du har en grundlayout som följer ett vertikalt grid.

Du har ett typografiskt grid som du kan anpassa.

Du har läst kurslitteraturen och skaffat dig kunskaper om grundläggande färgteori.



Introduktion och förberedelse {#intro}
-----------------------

Jobba igenom följande stycken för att förbereda dig inför uppgiften.



### Gör ett nytt tema kmom04.less {#nytema}

Det första du kan göra är att börja med ett nytt tema. Förslagsvis kopierar du ditt gamla tema `kmom03.less` och döper det till `kmom04.less`. I varje nytt steg finns alltid möjligheter till att "skriva om" äldre kod för att göra den enklare att underhålla och vidareutveckla.

Det är inget absolut krav att du gör `kmom04.less`, men det är troligen ett bra tillvägagångssätt i uppgiften.

Uppgiften handlar om att göra tre teman, "minimalistic", "colorful", "dark". Tanken är att man kan lösa dessa teman genom att utgå från ett gemensamt bastema. Du kan bygga ditt bastema i `kmom04.less`.



### Minimalistic, colorful, dark {#tema}

Du väljer själv hur du vill tolka temana för "minimalistic", "colorful" och "dark". Fundera igenom hur du vill tolka teman, innan du börjar koda dem.

Typsnitt väljer du något som du tycker passar ihop med temat och uppfyller din tanke bakom respektive tema.

När du gör temat "minimalistisk" så håller du det enkelt. Använd få effekter. Kanske räcker det med ett akromatiskt färgschema (vitt/svart och nyanser av grått). Kanske tillsammans med en accentfärg. Eller kanske välja en basfärg och göra ett monokromatiskt färgshema? 

När det kommer till det fägglada temat "colorful" så väljer du förslagsvis ett färgschema som har tre eller fler färger. Välj hur mycket som varje färg får delta, färgerna behöver inte delta på lika villkor.

Ett tema "dark" handlar om en mörk bakgrund och ljusa texter. Ett sådant tema kan vara vilsamt för ögonen på kvällen när allt annat är mörkt omkring en. Kanske behöver fonten inte vara vit, kanske fungerar en tydlig färg som gör texten läsbar mot den mörka bakgrunden.

Våga utmana, det behöver inte bli "rätt", man lära sig av att medvetet försöka bryta gränserna.



### Länka till tema {#lanka}

När du skriver redovisningstexten så kan det vara bra att veta om att du kan skapa en länk som byter ut temat direkt via länken. Det är snabbt och smidigt för att visa upp hur olika teman ser ut.

Du kan se hur det fungerar i din redovisa sida under "verktyg/".



Krav {#krav}
-----------------------

Förtydligande av vissa krav kan utläsas i ovanstående introduktion och förberedeleser.

1. Gör ett medvetet val om att jobba med ett bastema, eller inte.

1. Skapa ett minimalistiskt tema, döp det till `04_minimalistic.less`.

1. Skapa ett färgglatt tema, döp det till `04_colorful.less`.

1. Skapa ett ljust-på-mörkt tema, döp det till `04_dark.less`.

1. Gör ett medvetet val av typografi i samtliga teman. Något tema kanske har mer inslag av typografisk styling, andra teman har kanske mindre. Välj väg.

1. Välj ett av dina teman som ditt standard tema. Eller skapa ett eget personligt tema som du använder som standard tema.

1. Gör en `dbwebb publishpure redovisa` och kontrollera att allt fungerar på studentservern.

1. Committa alla filer, inklusive temats filer och lägg till en (ny) tagg (4.0.\*).

1. Pusha repot till GitHub, inklusive taggarna.



Extrauppgift {#extra}
-----------------------

1. Jobba med ett extravagant tema som du döper till `04_fun`. Lek och gör ett riktigt udda tema. Här är ett exempel på [inspiration för udda teman](t/7444). Gör eventeullt en sida `content/fun` och lägg i menyn. Där kan du skapa innehåll som passar in i detta temat.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
