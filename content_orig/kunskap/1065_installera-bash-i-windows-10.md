---
author:
    - mos
category: 
    - labbmiljo
    - windows
    - bash
revision:
    "2019-01-08": (C, mos) Notis om nyare artikel för v1803.
    "2017-09-09": (B, mos) Start Windows features by run.
    "2017-05-29": (A, mos) Första revisionen.
...
Installera Bash i Windows 10 (v 1703)
==================================

[FIGURE src=image/snapvt17/win10-bash-cowsay.png?w=c5&a=0,70,60,0 class="right"]

Så här gör du för att installera Bash i Windows 10 samt installera det som behövs för att komma igång med kurserna.

Installationsprocessen förutsätter att du har creators update (1703) installerad av Windows 10 64bitar system.

<!--more-->

[INFO]

**Uppdaterad instruktion finns per 2019**

Denna artikel skrevs 2017 och var då -- Windows 10, 64bitar och Creators update (1703) -- rätt sätt att installera bash på Windows.

Per januari 2019 finns en uppdaterad artikel "[Installera Bash i Windows 10 (v 1803)](kunskap/installera-bash-i-windows-10-v2)" som visar hur man gör samma installation med en uppdaterad version av Windows 10.

[/INFO]



Förutsättning {#pre}
-------------------------------

Du har minst en 64-bitars version av Windows 10 Creators Update installerad. 

Dubbelkolla att ditt versionsnummer startar på minst 1703 (Creators Update). Tryck `Windows key + R` och kör programmet `winver`. 

[FIGURE src=image/snapvt17/win10-winver.png caption="Version 1703 eller högre visat att Creators update är installerad."]



Installera Bash {#install}
-------------------------------

Bash finns med i din Windows installation men du behöver sätta på det på följande sätt.



###Sätt på "Developer Mode" {#devmode}

Öppna fönstret "Windows Settings" via `Windows key + I`. Välj "Update & security" samt "For developers". Klicka i "Developer mode".

[FIGURE src=image/snapvt17/windows10-developers-mode.png?w=w2 caption="Sätt på Developer mode som ett steg i att installera Bash på Windows."]



###Sätt på "Windows Subsystem for Linux (beta)" {#winsublin}

Kör kommandot `optionalfeatures` via sökfältet eller via `Windows key + R`. Klicka i rutan för "Windows subsystem for Linux (beta)".

[FIGURE src=image/snapvt17/win10-windows-features-on-off.png caption="Sätt på Windows Subsystem för Linux."]



<!--
###Aktivera "Windows Subsystem for Linux (beta)" {#aktivera}

Du kan nu aktivera bash för Windows genom att köra följande kommandorad i Power Shell som Administratör.

```text
Enable-WindowsOptionalFeature -Online -FeatureName Microsoft-Windows-Subsystem-Linux
```
-->



Starta Bash första gången {#start1}
-------------------------------

Kör kommandot `bash` via sökfältet eller via `Windows key + R`.

En Bash-terminal öppnar sig och Ubuntu laddas ned och installeras.

Du blir ombedd att skapa en nytt användarnamn och lösenord i Linux-terminalen.

[FIGURE src=image/snapvt17/win10-bash.png?w=w2 caption="Nu är Bash för Windows installerat och klart."]



Pakethantering {#paket}
------------------------------

Det finns med en pakethanterare som heter `apt-get`. Med den kan du installera paket, tjänster och programvaror i din Bash terminal.

De grundläggande paket som du behöver för kurserna finns redan installerade.

För att testa pakethanteraren kan du installera paketet `cowsay` som är ett litet skoj-paket.

```text
$ sudo apt-get install cowsay
$ cowsay "Hej alla webbprogrammerare!"
```

[FIGURE src=image/snapvt17/win10-bash-cowsay.png?w=w2 caption="Nu är du redo för Bash på Windows."]

Vill du vet mer om programmet så öppnar du dess manualsida.

```text
$ man cowsay
```



Bra att ha {#braattha}
------------------------------

Följande tips kan göra din bekantskap med Bash för Windows lite trevligare.



###Sudo utan lösenord {#sudo}

För att slippa skriva lösenord varje gång du skriver kommandot `sudo` så kan du lägga en fil i katalogen `/etc/sudoers.d/` och döpa filen till ditt användarnamn. Filen skall innehålla en rad likt denna (om min användare är "mos").

```text
mos ALL=NOPASSWD: ALL
```

Följande kommandorad skapar en sådan fil för din användare.

```bash
sudo bash -c "echo '$USER ALL=NOPASSWD: ALL' > /etc/sudoers.d/$USER && cat /etc/sudoers.d/$USER"
```

Här är en forumtråd som hanterar [sudo utan lösenord](t/4327).



###Kopiera i terminal {#copypaste}

När du är i terminalen kan du markera ett textstycke med musen och högerklicka. Sedan kan du göra paste genom att högerklicka igen. Detta fungerar även om du vill göra paste till ett fönster utanför Bash.

Vill du kopiera från ett annat fönster till Bash så markerar du texten och lägger den i copy-bufferten (via `ctrl-c` eller högerklickmenyn) och du gör paste i Bash via högerklick.



###Vilken version av Bash {#version}

Du kan kontrollera vilken version av Bash du har med kommandot `lsb_release`.

```
$ lsb_release -a
No LSB modules are available.
Distributor ID: Ubuntu
Description:    Ubuntu 16.04.2 LTS
Release:        16.04
Codename:       xenial
```



###Installera och uppdatera Bash {#update}

Det finns ett Windows kommando `lxrun` som du kan installera, avinstallera, uppdatera och uppgradera din installation av Bash.

[Kika i MSDN manualen](https://msdn.microsoft.com/en-us/commandline/wsl/reference) vad du kan göra.



Avslutningsvis {#avslutning}
------------------------------

Det finns en [forumtråd](t/6515) där du kan ställa frågor, eller ge tips och trix, om denna artikel. Kika där om du får problem. Tråden ligger i subforumet [Windows för Webbprogrammerare](forum/viewforum.php?f=55).

Vill du ställa specifika frågor om Unix/Linux och Bash så passar subforumet [Unix och Linux](forum/viewforum.php?f=49)
