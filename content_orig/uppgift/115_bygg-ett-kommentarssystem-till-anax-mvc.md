---
author: mos
category: php
revision:
  "2014-09-24": (B, mos) Formulerade om krav 5 & 6 -> krav 5 samt gav tips på lösning.
  "2014-04-02": (A, mos) Första utgåvan inför version 2 av phpmvc-kursen.
updated: "2014-09-24 14:45:00"
created: "2014-04-02 21:06:12"
...
Bygg ett kommentarssystem till Anax MVC
==================================

Du skapar ett enklare kommentarssystem till Anax MVC som skall gå att integrera med en godtycklig webbsida. 

Du får kodbasen från ett befintligt kodexempel som du vidareutvecklar med nya funktioner. Kommentarerna sparas i sessionen och det är fokus på att jobba med kontroller och modeller i Anax MVC.

<!--more-->

Så här ser grunden ut.

[FIGURE src=/image/snap/anax-mvc-comments.png?w=w2 caption="Grunden till kommentarssystemet."]

Så här kan det se ut när du är klar, eller något åt detta hållet...

[FIGURE src=/image/snap/bth-kampanj-disqus.png?w=w2 caption="Disqus används på BTHs kampanjsite för att sköta kommentarsflödet."]

Hämta inspiration från Disqus eller Stackoverflow, när du löser kommentarsfunktionen.



Förkunskaper {#forkunskaper}
-----------------------

I guiden ["Utöka Anax MVC med kommentarer och pröva pakethantering med PHP"](kunskap/utoka-anax-mvc-med-kommentarer-och-prova-pakethantering-med-php) så visas hur du gör i detalj. Gå igenom den guiden från början till slut så har du grunden för uppgiften klar.



Allmänt {#allman}
-----------------------

Syftet med uppgiften är främst att du ska dyka in mer i Anax MVC och öva din förståelse i hur ramverket är uppbyggt och vilka delar det består av.

Det är en enkel kommentarsfunktion, det behöver inte finnas stöd för att svara på en kommentar, rösta på bra kommentarer eller andra mer avancerade funktioner. 



Krav {#krav}
-----------------------

1. Bygg vidare på det kommentarssystem du fick i guiden ovan. 

2. En godtycklig kommentar kan editeras genom att klicka på dess id.

3. En enskild kommentar skall kunna raderas.

4. Styla kommentarerna så att de ser lite mer ut som i Disqus (eller Stackoverflow).

5. Visa att ditt kommentarsystem fungerar på två separata sidor, där varje sida har sitt eget kommentarsflöde.



Extrauppgift {#extra}
-----------------------

1. Lägg till en bild på användaren. Använd mailadressen och hämta bilden från [Gravatar](t/262).

1. Visa bara formuläret, som skapar nya kommentarer, när man klickar på en länk (eller liknande). Formuläret är dolt från början.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis.

Kika i detta foruminlägget för att [få tips till lösningen på sista kravet](t/2239).

Använd tiden för att studera ramverkets uppbyggnad, skapa förståelse för dess struktur. Var nyfiken.

**Lycka till och hojta till i forumet om du behöver hjälp!**




