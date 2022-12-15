---
author: mos
category: unix
revision:
    "2019-04-08": (B, lew) Uppdatering inför HT19.
    "2015-08-04": (A, mos) Första utgåvan för linux kursen.
updated: "2019-04-08 10:10:10"
created: "2015-08-04 10:00:44"
...
Skapa Bash-skript med options, command och arguments
==================================

[FIGURE src=/image/snapht15/bash-cli.png?w=c5&a=0,50,50,0 class="right" caption="Bash-skript med options."]

För att effektivisera sitt arbetsflöde som programmerare, i en server eller Linux-miljö, så är det bra att kunna de kommandon som finns tillgängliga. När man vill göra flera kommandon på rad så samlar man dem i ett skript.  

För att gå ytterligare ett steg längre så kan man bygga upp skriptet som ett program som kan ta *options*, kommandon (*commands*) och argument till dessa kommandon.

<!--more-->

I denna artikel tittar vi på hur vi bygger upp ett skript så det liknar ett vanligt program som kan ta *options*, *commands* och *arguments*.



Ett kommandoradsprogram i Bash {#intro}
--------------------------------------



###Ladda ned {#down}

I [GitHub-repot för vlinux-kursen](https://github.com/dbwebb-se/vlinux/) finns ett exempelprogram som heter [`bash-cli`](https://github.com/dbwebb-se/vlinux/blob/master/example/bash/cli-with-options/bash-cli.bash). Programmet visar en grundläggande struktur som kan användas för att skapa kommandoradsprogram med Bash.

Om du redan har klonat kursrepot så finner du exempelprogrammet i följande katalog.

```bash
$ cd vlinux/example/bash/cli-with-options/
```



###Testkör {#test}

Låt oss se hur skriptet fungerar och hur dess kod ser ut. Vi börjar med ett visuellt exempel när vi provkör kommandot.

<!-- [ASCIINEMA src="24463"] -->
[ASCIINEMA src="239519"]



###Att använda programmet {#anvand}

I filmen ovan testkörde jag programmet på följande sätt.

| option, command, argument | Beskrivning |
|---------------------------|-------------|
| *Inget*                   | Programmet visar en text om hur man kan få hjälp till att använda det. |
| `--help` eller `-h`       | Visa en hjälptext om hur programmet kan användas och dess olika alternativ. |
| `--version` eller `-v`    | Visa programmets version. |
| `command1`                | Simulerar ett kommando genom att visa en enkel utskrift. |
| `command2` och `command2 med argument` | Simulerar ett kommando som kan ta ett valfritt antal argument. |
| `calendar` och `calendar events` | Ett kommando som visar en calender tillsammans med händelser som hänt på dagens datum. |

Det var allt som programmet klarade av, låt oss nu ser hur koden bakom ser ut.



En mall för ett kommandoradsprogram {#mall}
--------------------------------------

Vi kikar på koden i `bash-cli.bash`, uppifrån och ned.

De första raderna är en [*shebang*](https://en.wikipedia.org/wiki/Shebang_(Unix)) följt av några kommentarer som berättar vad skriptet handlar om.

```bash
#!/usr/bin/env bash
#
# A template for creating command line scripts taking options, commands
# and arguments.
#
# Exit values:
#  0 on success
#  1 on failure
#
```

Därefter följer ett par *globala* variabler om själva skriptet. Jag väljer att namnge dessa variabler med stora bokstäver för att skilja på globala och lokala variabler.

```bash
# Name of the script
SCRIPT=$( basename "$0" )

# Current version
VERSION="1.0.0"
```

Dels är det namnet på skriptet och dels dess version.

Härefter följer ett par funktioner som används för att skriva ut hjälptext och information om versionen.

Först funktionen som skriver ut hjälptexten.

```bash
#
# Message to display for usage and help.
#
function usage
{
    local txt=(
"Utility $SCRIPT for doing stuff."
"Usage: $SCRIPT [options] <command> [arguments]"
""
"Command:"
"  command1             Demo of command."
"  command2 [anything]  Demo of command using arguments."
"  calendar [events]    Print out current calendar with(out) events."
""
"Options:"
"  --help, -h     Print help."
"  --version, -v  Print version."
    )

    printf "%s\n" "${txt[@]}"
}
```

Det är en lokal variabel som är en array av strängar, på det viset kan man skriva texten så att den blir enkel att formattera.

Det finns en liknande funktion `badUsage` som används om användaren använder skriptet på felaktigt sätt.

```bash
#
# Message to display when bad usage.
#
function badUsage
{
    local message="$1"
    local txt=(
"For an overview of the command, execute:"
"$SCRIPT --help"
    )

    [[ $message ]] && printf "$message\n"

    printf "%s\n" "${txt[@]}"
}
```

Funktionen `badUsage` kan ta ett argument, eller inte. Om det skickas med ett argument till funktionen så skrivs det ut som ett meddelande.

Så här kan man anropa en funktion i Bash, med eller utan argument.

```bash
badUsage "Option/command not recognized."
badUsage
```

Sedan finns funktionen för att skriva ut programmets version.

```bash
#
# Message to display for version.
#
function version
{
    local txt=(
"$SCRIPT version $VERSION"
    )

    printf "%s\n" "${txt[@]}"
}
```

Här kan det tyckas vara lite överkurs med en array för texten som bara är en rad lång. Det blev så för att göra denna funktionen på samma sätt som de andra funktionerna.

Funktionens body hade kunnats skrivas enklare, ungefär så här.

```bash
# With printf
printf "%s version %s\n" "$SCRIPT" "$VERSION"

# or with echo
echo "$SCRIPT version $VERSION"
```

När vi nu fortsätter så hoppar vi till sista delen av programmet.



Kontrollera alla argument {#argument}
--------------------------------------

Sista delen av koden är en while-loop och en case-sats som går igenom alla argument som skickas till programmet. Här kallar jag det bara argument, på denna nivån är allt som skickas till programmet *argument*.

Låt oss först förenkla koden.

```bash
#
# Process options
#
while (( $# ))
do
    case "$1" in

        --help | -h)
            usage
            exit 0
        ;;

        --version | -v)
            version
            exit 0
        ;;

# more code...

    esac
done
```

Den inbyggda variabeln `$#` berättar antalet argument och i varje loop testas det första argumentet `$1` i listan av argument.

I case-satsen kollas om argumentet är känt. I första delen kontrolleras om argumentet till mitt skript är ett *option* som matchar `--help`, `-h`, `--version` eller `-v`.

Det är alltså mitt skript så tar in argumenten. Sedan tolkas de argumenten och skriptet bestämmer om de är `options`, `commands` eller `arguments`. De som börjar med ett minus-tecken kallar jag options. (Du kan läsa kort om [varför det finns två typer av options](http://superuser.com/questions/174564/why-are-there-short-and-long-alternatives-for-command-line-options), med ett eller två minus-tecken.)

Om det blir en träff så anropas en funktion som antingen skriver ut versionnumret eller hjälptexten, sedan avbryts programmet med en positiv exit-kod som är 0.

Om man skickar in ett argument som inte känns igen så skrivs ett felmeddelande ut med hjälp av funktionen `badUsage` och exit-koden blir 1 som i Bash-sammanhang betraktas som en felkod.

```bash
#
# Process options
#
while (( $# ))
do
    case "$1" in

# more code...

        *)
            badUsage "Option/command not recognized."
            exit 1
        ;;

    esac
done

badUsage
exit 1
```

Det var allt runtomkring. Låt oss nu kika på det som jag kallar *commands* och möjligheten att skicka *arguments* till ett *command*. Vi återgår till case-satsen.

```bash
#
# Process options
#
while (( $# ))
do
    case "$1" in

# more code...

        command1         \
        | command2       \
        | calendar)
            command=$1
            shift
            app-$command $*
            exit 0
        ;;

# more code...

    esac
done
```

Här väljer jag en variant att tolka alla möjliga kommandon på en del av case-satsen. Om det är en träff, till exempel på kommandot `calendar`, så anropas funktionen `app-calendar` och eventuella kvarvarande argument `$*` bifogas till den funktionen.

Jag har valt detta sättet att namnge funktionen, med ett prefix av `app-`, för att göra min egen kod tydlig och organisera den.

För varje kommando skriver jag alltså en funktion som anropas och hanterar varje kommando. Så här ser funktionen `app-calendar` ut.

```bash
#
# Function for taking care of specific command. Name the function as the
# command is named.
#
function app-calendar
{
    local events="$1"

    echo "This is output from command3, showing the current calender."
    cal

    if [ "$events" = "events" ]; then
        echo
        calendar
    fi
}
```

Funktionen skriver ut calendern via det externa kommandot `cal` och en lista på händelser via det externa kommandot `calendar`, förutsatt att man skickat in argumentet `"calendar events"`.



Stöd för fler kommandon {#fler}
--------------------------------------

Allteftersom skriptet blir större och större så blir det enkelt att fylla på med nya kommandon. Det som behövs är en funktion `app-commandx` samt en rad i case-satsen som motsvarar `commandx`.

Sen får man inte glömma uppdatera funktionen `usage` också, så kommandot dokumenteras. Det ör alltid lätt att glömma bort vad man gjort så lika bra att dokumentera vad man gjort och hur man tänkte att det skulle användas.



Avslutningsvis {#avslutning}
--------------------------------------

Sammantaget blir skriptet `bash-cli` en mall och struktur för kommandoradsprogram som kan ta *options*, *commands* och *arguments* till ett *command*.

Ibland är det kanske inte uppenbart vad som bör vara just *options*, *commands* och *arguments*. Men låt logiken styra och pröva dig fram. Lär dig hur andra program är uppbyggda så kommer du att se en struktur som är vanligt använd bland liknande program. Det är bra att följa en liknande struktur, då känner användaren igen sig.

Har du frågor kring skriptet så finns det en särskild [forumtråd kopplad till denna artikeln](t/4349).
