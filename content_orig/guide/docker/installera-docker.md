---
author: lew, mos
revision:
    "2019-03-14": "(A, lew) Första versionen."
...
Tips vid installation
=======================

Nu har du förhoppningsvis installerat Docker CE. Det kan såklart krångla med installationen så här samlar vi lite tips och trix når något går snett.



Windows, VirtualBox och Hyper-V
---------------------------------

Att tänka på är att Docker till Windows använder *Hyper-V* för virtualiseringen, vilket inte VirtualBox gör så det går inte att ha båda teknikerna fungerande samtidigt. Hyper-V är Microsofts egna system för virtualisering av servrar. Antingen får du aktivera Hyper-V. Klicka på startmenyn och skriv "Hyper-v" så dyker det upp ett resultat "Turn Windows features on or off" (eller motsvarigheten på svenska). Däri finns möjligheten att aktivera/avaktivera Hyper-V. Det kräver en omstart.

Ett annat alternativ är att installera Docker i din VM från tidigare kursmoment. Du installerar då Docker för Linux. Om VirtualBox fungerar fint bör det inte vara några problem. Det kommer att kräva en port forward till i kommande kursmoment, men det ger sig nog.

I skrivande stund är Docker i VirtualBox testat på Windows 10 Pro med 8GB RAM. 



Windows, Docker och bcrypt {#dockerbcrypt}
--------------------------------------------------------------------

Ibland kan kombinationen av Windows, Docker och npm modulen bcrypt ställa till med stora problem. Ett tips hämtat från [installationsmanualen för bcrypt](https://github.com/kelektiv/node.bcrypt.js/wiki/Installation-Instructions#microsoft-windows) är att installara npm paketet `windows-build-tools` med kommandot nedan. Installera det i kommandotolken (cmd) eller Powershell så Windows har tillgång till det.

```bash
npm install --global --production windows-build-tools
```
