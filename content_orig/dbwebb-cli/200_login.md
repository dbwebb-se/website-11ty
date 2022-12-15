Logga in på servern
==================================

Kommandot `dbwebb` jobbar mot en server. Det är på den servern, studentservern allmänt kallad, som det färdiga kursmaterialet laddas upp, valideras och publiceras.

Med hjälp av `dbwebb` kan du logga in på studentservern. Om du har installerat SSH-nycklar så behöver du _inte_ ange lösenord när du loggar in.

```text
$ dbwebb login
```

Skriv `exit` när du vill logga ut.

```text
$ exit
```

Studentservern är en Linux-server och du har ditt eget konto och hemmakatalog på servern.

Normalt är du inte inloggad på studentservern när du jobbar. Du jobbar alltid lokalt i din egen miljö och relevanta filer kommer att kopieras till studentservern. Att logga in på studentservern kan vara bra vid felsökning eller av ren kuriosa för att se vilka filer som finns där.

Så logga ut innan du fortsätter.

Så här kan det se ut.

[ASCIINEMA src=24618]
