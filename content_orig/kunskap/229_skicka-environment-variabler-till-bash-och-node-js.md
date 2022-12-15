---
author: mos
category: webbprogrammering
revision:
  "2015-10-16": (A, mos) Första utgåvan i kursen linux.
updated: "2015-10-16 09:00:21"
created: "2015-10-16 09:00:19"
...
Skicka environment variabler till Bash och Node.js 
==================================

[FIGURE src=/image/snapht15/bash-env.png?w=c5&a=7,80,60,0 class="right"]

I linux-kursen skapar vi servrar i Node.js och klienter i både Node.js och Bash. Ofta skall dessa prata med varandra och när man testar dem så använder man ofta olika värden på ip-adresser, hostnamn och eller portnamn.

Låt oss se hur vi kan använda environment-variabler, miljö-variabler, för att sätta namnet på servern och värdet på porten och låta en klient i Bash och en server i Node.js ta del av samma värde.

<!--more-->



Att läsa och sätta en environment-variabel {#set}
--------------------------------------

I bash-terminalen kan du se alla de variabler som redan finns. Du kan tänka på dessa som globala variabler och de är tillgängliga för alla program och skript som du kör på din dator.

De är dock kopplade till den terminal-sessionen du är i. Så du kan öppna två terminaler och lägga till en variabel i den ena terminalen, men den kommer inte synas i den andra.

Så här kan du se de som är definierade. Skriv följande i terminalen.

```bash
$ env
...
PWD=/home/mos     
EDITOR=vim        
LANG=C.UTF-8      
TMUX_PANE=%11     
XDG_SEAT=seat0    
SHLVL=3           
PYENV_SHELL=bash  
HOME=/home/mos    
LANGUAGE=en_US:en 
LOGNAME=mos       
LC_CTYPE=C.UTF-8  
...
```

Du kan se värdet på variabeln `EDITOR`. Det bestämmer vilken som är min standard editor. Program kan välja att avläsa den variabeln för att bestämma vilken editor en skall öppnas i.

Variablerna sätts bland annat i de startup-filer som finns och körs när du loggar in i systemet eller när du öppnar en ny terminal. För min del så är det filer som `$HOME/.bashrc` som jag framförallt använder när jag sätter variabler som skall vara globala.

Vill man läsa av värdet på en variabel så gör man så här.

```bash
$ echo $EDITOR
vim
```

Vill jag ändra värde på den så gör jag en tilldelning.

```bash
$ EDITOR="nano"
$ echo $EDITOR
nano
$ env | grep EDITOR
EDITOR=nano
```

Jag kan nu skapa ett bash-skript `variable.bash` som läser av värdet på två variabler.

```bash
#!/bin/env bash
echo $EDITOR   
echo $EDITOR1  
```

Kör jag det programmet får jag fram följande utskrift.

```bash
$ bash variable.bash
nano

```

Låt mig nu försöka sätta värdet på den andra variabeln `EDITOR1`, jag prövar först så här.

```bash
$ EDITOR1=vim
$ bash variable.bash  
nano

```

Nehepp, det fungerade inte. Jag gör ett nytt försök med `export`.

```bash
$ export EDITOR1=vim
$ bash variable.bash  
nano
vim
```

Minsann, det gick bättre. Nyckelordet `export` gör alltså att även den nya 
variabeln blir synlig för de program som startas från terminal-sessionen.

Man kan sätta variabeln till ett tomt värde.

```bash
$ EDITOR1=
$ bash variable.bash  
nano

```

Som du ser så behöver jag inte göra `export` på variabeln nu. Den finns redan och det räcker att jag ändrar dess värde.

Man kan göra `unset` på en variabel om man inte vill att den skall finnas kvar.

```bash
$ unset EDITOR1
$ bash variable.bash  
nano

```



###Skillnad på en tom och en icke-definierad variabel {#tom}

Kan man då se skillnad på om en variabel är definierad, eller om den bara är tom? Låt oss göra ett nytt testprogram.

```bash
#!/bin/env bash
echo $EDITOR
if [[ $EDITOR1 ]]; then
    echo "EDITOR1='$EDITOR1'"
else
    echo "EDITOR1 is not set."
fi
```

Du är med på hur `[[ $EDITOR1 ]]` bör fungera? Om variabel har ett värde så blir det sant, annats falskt. 

Här är ett exempel som visar resultatet lite tydligare.

```bash
$ [[ $EDITOR ]] ; echo $?     
0
$ [[ $EDITOR_NONO ]] ; echo $?
1
```

Det är smidigt att kunna testköra kommandon direkt i terminalen. Det kan förnkla när man utvecklar och debuggar.

Låt oss nu testa detta i skriptet.

```bash
$ bash variable2.bash  
nano
EDITOR1 is not set.
```

Rimligt eftersom vi gjorde `unset` nyss. Då sätter vi ett värde på variabeln igen.

```bash
$ EDITOR1="vim"
$ bash variable2.bash  
nano
EDITOR1 is not set.
```

Likaså rimligt eftersom vi inte använde `export`. Då använder vi `export` istället.

```bash
$ export EDITOR1="vim"
$ bash variable2.bash  
nano
EDITOR1='vim'
```

Nu syns variabeln för skriptet och vi kan påverka den.

Låt oss nu sätta variabeln till ett tomt värde.

```bash
$ EDITOR1=
$ bash variable2.bash  
nano
EDITOR1 is not set.
$ env | grep EDITOR1
EDITOR1=
```

Hmmm, variabel är satt, men tom, men min if-sats kan inte se skillnaden på om variabeln är tom eller icke definierad. Ibland är det precis som man vill ha det, men ibland vill man se skillnaden på på tom och en icke existerade variabel.

Jag gör ett nytt skript `variable3.bash` för att testa hur det fungerar.

```bash
#!/bin/env bash
echo $EDITOR

#[[ -z $var ]]  # True if zero length
if [[ -z $EDITOR1 ]]; then
    echo "EDITOR1='$EDITOR1'"
else
    echo "EDITOR1 is not set."
fi
```

Då kör vi och ser om det blir någon skillnad.

```bash
$ bash variable3.bash  
nano
EDITOR1=''
```

Japp, nu syns variabeln som en tom variabel. Klarar den också av att känna skillnaden på en icke-existerande variabel?

```bash
$ unset EDITOR1  
$ bash variable3.bash  
nano
EDITOR1=''
$ env | grep EDITOR1
$
```

Hmm, nehepp. Här anser programmet att variabeln har ett värde, även om variabeln inte finns. Nåja, det är ju bra i vissa fall. Men om jag *verkligen* vill kolla om variabeln är definierad, eller bara tom, hur fixar jag då det?

Nytt testprogram, `variable4.bash`.

```bash
#!/bin/env bash
echo $EDITOR

# ${var+x} is a parameter expansion which evaluates to null 
# if var is unset and substitutes the string "x" otherwise
if [[ ${EDITOR1+x} ]]; then
    echo "EDITOR1='$EDITOR1'"
else
    echo "EDITOR1 is not set."
fi
```

Som du ser så använder jag mig av dubbla `[[ ]]` istället för enkla `[ ]` och du kan läsa om [skillnaden mellan dessa i detta StackOverflow-inlägg](http://stackoverflow.com/questions/3427872/whats-the-difference-between-and-in-bash).

Då är det bara att testa om det verkligen fungerar och känner skillnaden på en tom variabel och en som icke är definierad.

```bash
$ unset EDITOR1  
$ bash variable4.bash  
nano
EDITOR1 is not set. 
```

Perfekt.

```bash
$ EDITOR1="vim"  
$ bash variable4.bash  
nano
EDITOR1 is not set. 
```

Japp, som jag vill.

```bash
$ export EDITOR1="vim"  
$ bash variable4.bash  
nano
EDITOR1='vim'
```

Stabilt.

```bash
$ EDITOR1=  
$ bash variable4.bash  
nano
EDITOR1=''
```

Ja, vad kan man säga. Nu fungerar det och du har lärt dig en del om environment variabler och hur de kan avläsas i ett skript.



Avläsa variabler i Node.js {#node}
--------------------------------------

Hur läser man då av en sådan här variabel i JavaScript med Node.js? Du kan göra det genom att använda [process.env](https://nodejs.org/api/process.html#process_process_env).

Du kan testa det direkt i terminalen.

```bash
$ node -e "console.log(process.env.EDITOR)"
nano
```

Det handlar alltså att läsa av variabel. Låt mig visa hur ett skript hade kunnat se ut som gör samma sak.

```javascript
#!/bin/env node

console.log(process.env.EDITOR);


if ('EDITOR1' in process.env) {
    console.log("EDITOR1='" + process.env.EDITOR1 + "'");    
}
else {
    console.log("EDITOR1 is not set.");    
}
```

Du får ta mitt ord på att det fungerar. Annars testar du själv.

Du kan naturligtvis inte lita på mig, så du måste testa själv. Om programmet går igenom dina tester så har du ett program i Bash och ett i JavaScript/Node.js som kan använda sig av environment-variabler som en variant av argument.



Avslutningsvis {#avslutning}
--------------------------------------

Du hittar mina exempelprogram i kursrepot under [`example/environment-variables`](https://github.com/mosbth/linux/tree/master/example/environment-variables).

Nu har du lärt dig hur du kan använda environment-variabler och hur de kan läsas av av externa program. Det blir som ett sätt att *skicka* parametrar till ett program.

Har du frågor så vänder du dig till [linux-forumet](forum/viewforum.php?f=49).




