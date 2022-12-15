---
author: lew
revision:
    "2020-03-11": "(A, lew) Första versionen."
...
Kopiera med rsync
=======================

Vi kan som sagt använda rsync för att kopiera filer och mappar. Som dess namn antyder så synkroniserar även rsync filerna så det är enbart de som har ändrats som kommer kopieras.


### Lokal kopiering

Vi börjar med att gå igenom hur vi kopierar lokalt. En "standardkopiering" har strukturen `rsync <options> <source> <target>`.

[ASCIINEMA src=309211]

**-avz** är kommandots "options".  
*-a* står för "archive" och gör i sin tur en hel del:

* Kopierar rekursivt filer och mappar (-r)
* Kopierar symlänkar (-l)
* Behåller rättigheter (-p)
* och mer...

*-v* betyder att utskrifterna är "verbosa", vi får se mer text.  
*-z* betyder att datan komprimeras under flytten.

När vi använder ett `/` på slutet talar vi om att det är innehållet vi vill jobba med.



### "Remote" kopiering

Hur gör vi då om vi vill kopiera något från en klient till en server? Det vi behöver göra då är att ange att vi vill använda SSH som shell/skal vid kopieringen. Man måste även ha installerat rsync på både klienten och servern. För remote kopiering används oftast strukturen `rsync <options> <source> username@hostname:<target>`. Vill vi kopiera åt andra hållet vänder vi på kommandot: `rsync <options> username@hostname:<source> <target>`

[ASCIINEMA src=309236]

Här såg vi ett nytt option, *-e*. Det talar om att vi vill använda ett "remote shell", i detta fallet SSH. Här använde jag inte ett `/` i slutet av mappens namn för jag ville skicka iväg hela mappen och inte bara innehållet. Hade jag velat kopiera från studentservern till min lokala maskin hade då sett ut som följer:
`rsync -avz -e "ssh" klwstud@ssh.student.bth.se:www/dbwebb-kurser/demo1 .`.
