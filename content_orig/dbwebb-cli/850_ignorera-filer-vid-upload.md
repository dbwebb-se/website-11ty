Ignorera filer vid upload
==================================

Detta är för de som vill hjälpa till att förbättra och effektivisera hur dbwebb-cli hanterar kursrepon.



Filen `.dbwebb.exclude` {#filen}
----------------------------------

I varje kursrepo kan finnas en fil `.dbwebb.exclude`. Varje rad i filen är villkor som säger vilka filer som inte laddas upp till studentservern. Till studentservern vill vi bara ladda upp filer som behövs, därför är det bra att exkludera filer som inte behövs.

Du kan titta i kursrepot för [design](https://github.com/dbwebb-se/design/blob/master/.dbwebb.exclude) för att se ett exempel på hur filen kan se ut. Normalt ser filen lika ut i samtliga kursrepon.



Varför inte ladda upp allt? {#why}
----------------------------------

Varje fil som laddas upp tar plats i studentens filutrymme, dels under `$HOME/dbwebb-kurser` och dels under `$HOME/www/dbwebb-kurser`.

När ett kursrepo *inspekteras* så sparas ytterligare en kopia av kursrepot i ett arkiv.

Många filer är automatgenererade och behöver inte lagras undan.

Varje fil som ligger i det uppladdade kursrepot behöver hanteras vid *validate* och *publish*. Att minska antalet filer ökar exekveringshastigheten av dessa kommandon.



Något som inte borde laddas upp? {#tips}
----------------------------------

Om du har tips på filer/kataloger som inte borde laddas upp, säg då till via en forumtråd eller issue.  Kanske har din editor några filer eller kataloger som automatgenereras, eller så är det några filer vi har missat att exkludera.
