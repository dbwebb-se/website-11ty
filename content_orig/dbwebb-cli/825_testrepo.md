Testa ett kursrepo
==================================

Detta är för de som utvecklar och testar kursrepon.

I varje kursrepo kan finnas en fil `.dbwebb.tests`. Varje rad i filen är ett kommando som exekveras som en del i en testsuite. Kommandot måste returnera exit status 0 för att betraktas om en lyckad assertion.

```text
$ dbwebb testrepo
$ dbwebb --force testrepo
$ dbwebb --force --silent testrepo
$ dbwebb --force --silent --verbose testrepo
$ dbwebb --force --silent --verbose --local testrepo
```

Optionen `--force` gör att du kan köra om testsuiten utan att först radera `me` katalogen.

Optionen `--silent` minimerar utskrifter från kommandone, i princip skickas all utskrift till `&> /dev/null` och man får en renare vy av testerna.

Optionen `--verbose` är bra vid felsökning. Det visar testfallet tillsammans med en rad som visar det modifierade kommandot som körs vid testfallet. Ett kommando kan modifieras för att hantera utskrifter eller för att hantera om kommandot körs lokalt eller mot servern.

Optionen `--local` innebär att testerna körs mot den lokala utvecklingsmiljön. Det innebär att kommandon som `dbwebb validate lab1` skrivs om till `make dbwebb-validate arg1=lab1` och använder den lokala utveckligsmiljön som följer med varje kursrepo.



Syntaxen i en testsuite {#syntax}
---------------------------------

Så här kan en fil `.dbwebb.tests` se ut.

```bash
# Init
dbwebb init-me

# Kmom01 lab1
dbwebb recreate lab1
cd me/kmom01/lab1 && ./answer.py; [[ $? = 42 ]]
```

Varje rad innehåller ett kommando som kan exekveras av dbwebb-cli via ett subshell som `bash -c`. En sådan rad kallas för en *assertion*. En assertion måste leverera ett exitvärde av 0 för att betraktas som lyckad.

En rad kan också vara tom eller börja med en `#` för kommentarsrader.

Du kan se exempel på testfiler i kursrepo för [oopython](https://github.com/dbwebb-se/oopython/blob/master/.dbwebb.tests) och [htmlphp](https://github.com/dbwebb-se/htmlphp/blob/master/.dbwebb.tests).
