---
author: mos
revision:
  "2014-08-08": (D, mos) Arkiverade kursmomentet som är ersatt av phpmvc-v2.
  "2013-04-22": (C, mos) Genomgången och uppstädad inför campus vt13. Gjorde läsanvisningar
    om formulär optionella, nya lästips.
  "2012-10-05": (B, mos) Flyttad till dbwebb.se och Lydia, genomgången inför ht12
    distans.
  "2012-02-01": (A, mos) Första utgåvan, campuskurs vt12.
updated: "2014-08-08 07:09:37"
created: "2012-08-30 09:19:09"
...
Kmom04: Modeller för login, användare och grupper
==================================

Bygg ut ditt ramverk med hantering av användare, grupper och behörighet. Du bygger modeller, kontrollers och vyer för att hantera inloggning, skapa nya användare och uppdatera en användares profil. 

[INFO]
Denna kursen är ARKIVERAD.

[Läs mer...](phpmvc-v1)
[/INFO]

Du försöker finna ett effektivt sätt att jobba med formulär och formulärhantering.

[FIGURE src=/img/phpmvc/kmom04/create-new-user.jpg?w=w1&q=70 caption="Så här kan resultatet från detta kursmoment se ut."]

*(Kursmomentet omfattar cirka 20 studietimmar fördelat på läsanvisningar, uppgifter och övningar samt resultat, redovisning och eftertanke.)*



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Pro PHP: Patterns, Frameworks, Testing and More](kunskap/boken-pro-php-patterns-frameworks-testing-and-more) 
  * Ch 6 Documentation and Coding Conventions



###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial finns tillgängliga för campus-kursen. Presentationerna kan vara av intresse även för distansstudenter så skumma gärna igenom dem lite snabbt.

* [CForm och formulärhantering](phpmvc/lydia-cform-vt13.pdf)
* [Lydia och användarhantering](phpmvc/lydia-user-vt13.pdf)



###Lästips {#lastips}

Här finns lästips om formulär och formulärhantering, för den som vill fördjupa sig.

1. [PFBC](http://code.google.com/p/php-form-builder-class/) (PHP Form Builder Class), en fristående PHP-klass för att skapa formulär. Se även deras hemsida med [dokumentation och exempel](http://www.imavex.com/pfbc3.x-php5/).  

2. Läs om ["Säker hantering av formulär"](http://phpsec.org/projects/guide/2.html).


3. Studera formulärhantering hos kända ramverk, läs så du får en känsla för hur de bygger upp formulärhanteringen.  
  * [Formulärhantering i python med django](https://docs.djangoproject.com/en/dev/topics/forms/)
  * [Zend framework's egen form-klass](http://framework.zend.com/manual/2.1/en/user-guide/forms-and-actions.html)
  * [Ramverkets Symphony's formulärhantering](http://symfony.com/doc/current/cookbook/form/index.html)
  * CodeIgniter's [form_helper](http://codeigniter.com/user_guide/helpers/form_helper.html) och [form_validation](http://codeigniter.com/user_guide/libraries/form_validation.html)
  * [Drupal formulärhantering](http://drupal.org/node/37775)


Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-14 studietimmar)*


###Övningar {#ovningar}

Gör följande övningar.

1. [Tutorial med Lydias CForm-klass](kunskap/cform-en-php-klass-for-att-skapa-presentera-och-validera-html-formular).  
  Använd Lydias `CForm` klass för att jobba med formulär. 

2. [Tutorial Lydia: Bygg ett PHP-baserat MVC-inspirerat CMF](lydia/tutorial)  
  **"Lydia: Skapa modell och hantering av användare, grupper, profil och login"**. Jobba genom de övningar som finns i **tredje** delen om Lydia.
  


###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Bygg ut ditt ramverk med hantering av användare. Länka till ditt ramverk från din me-sida och beskriv hur man kan testa de olika delarna.



###Extra {#extra}

Det finns inga extra övningar kopplade till detta kursmoment.



Resultat & Redovisning  {#redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Hur kändes det att jobba med CForm-klassen (den du valde)?
  * Har du några tankar kring hur man sparar lösenord?
  * Hur känns det att jobba i ramverket när det byggs ut efter hand?
  * Något som var extra utmanande med detta avsnitt av tutorialen?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.
