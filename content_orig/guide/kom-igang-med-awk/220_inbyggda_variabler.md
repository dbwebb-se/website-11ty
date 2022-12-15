---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...
Inbyggda variabler
=======================

Det finns gott om inbyggda variabler i awk. Vi tar en titt på några av dem.



### Field separator {#fs}

Filen som används är [example/phones.txt](https://raw.githubusercontent.com/dbwebb-se/vlinux/master/example/awk/phones.txt). Det är en liten fil med följande innehåll:

```text
Brand,Model,Price,Units
Apple,iPhone X,8000,3
Apple,iPhone 11,10000,14
Samsung,Galaxy S20,9500,8
Samsung,Galaxy S21+,11500,13
Samsung,Galaxy Note20,8000,4
```

Tänk filen som ett litet lager. Det finns tex 8st Samsung Galaxy S20 och de kostar 9500kr styck.

Om vi börjar med att dumpa ut hela filen med awk kan kommandot se ut såhär:

```
$ awk '{print $0}' phones.txt
Brand,Model,Price,Units
Apple,iPhone X,8000,3
Apple,iPhone 11,10000,14
Samsung,Galaxy S20,9500,8
Samsung,Galaxy S21+,11500,13
Samsung,Galaxy Note20,8000,4
```

**$0** innehåller hela raden separerad med RS (`\n`). Vi kommer då skriva ut alla rader i filen. Oftast vill man inte ändra på RS.

Notera att vi inte behöver BEGIN här, då vi inte exekverar något innan filen läses in.

Alla delarna som blir uppdelade med FS (mellanslag) kommer hamna i `$1`, `$2` etc.

Testar att enbart skriva ut det första fältet:

```
$ awk '{print $1}' phones.txt
Brand,Model,Price,Units
Apple,iPhone
Apple,iPhone
Samsung,Galaxy
Samsung,Galaxy
Samsung,Galaxy
```

Nu är de olika fälten separerade med `,` så då får vi byta FS:

```
$ awk '{FS=","; print $1}' phones.txt
Brand,Model,Price,Units
Apple
Apple
Samsung
Samsung
Samsung
```

Notera att första raden inte har separerats med `,`. Anledningen är att raden läses in innan **FS=","** börjar gälla. Här måste vi använda BEGIN:

```
$ awk 'BEGIN {FS=","} {print $1}' phones.txt
Brand
Apple
Apple
Samsung
Samsung
Samsung
```



### Output Field Separator (OFS) {#ofs}

Vi kan med hjälp av OFS göra om utskrifterna. Om vi inte styr om den själva är OFS ett mellanslag.

Vi kör vidare med vår fil. Låt säga att vi vill skriva ut i formatet: modell=tillverkare. Först tittar vi på hur det blir om vi inte ändrar den:

```
$ awk 'BEGIN {FS=","} {print $2,$1}' phones.txt
Model Brand
iPhone X Apple
iPhone 11 Apple
Galaxy S20 Samsung
Galaxy S21+ Samsung
Galaxy Note20 Samsung
```

Bra. Det blir ju som planerat. Nu byter vi OFS:

```
$ awk 'BEGIN {FS=","; NR>1; OFS="="} {print $2,$1}' phones.txt
Model=Brand
iPhone X=Apple
iPhone 11=Apple
Galaxy S20=Samsung
Galaxy S21+=Samsung
Galaxy Note20=Samsung
```

OFS stöder även `\t`, `\n` m.m. Det går även att ha en lång rad tex:  
`OFS="\n\tlite text"`.



### Övriga inbyggda variabler {#ovriga}

Det finns fler inbyggda variabler att ha lite koll på.

* NR - Number of Records. Den ökar automatiskt till den nuvarande radens nummer.
* NF - Number of Fields (in a record)
* FILENAME - namnet på filen som läses in
* FNR - Number of Records i relation till inputfilen. Vi kan läsa in fler filer samtidigt och FNR ger då radnumret för den aktuella filen och inte totalen.


Vi kan använda `NR` på följande sätt för att ta bort den första raden i utskriften:

```
$ awk 'BEGIN {FS=","; OFS="="} NR>1 {print $2,$1}' phones.txt
iPhone X=Apple
iPhone 11=Apple
Galaxy S20=Samsung
Galaxy S21+=Samsung
Galaxy Note20=Samsung
```

Stiligt! Med `NR>1` talar vi om att vi vill jobba med raderna vars nummer är större än 1. Vi skriver ut två fält av alla rader, utom första.


Nu går vi över till att ha scriptet i en fil.
