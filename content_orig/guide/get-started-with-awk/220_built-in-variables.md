---
author: lew
revision:
    "2021-06-29": "(A, lew) Translated to english."
...
Built-in variables
=======================

There are plenty of built-in variables in awk. We take a look at some of them.



### Field separator {#fs}

The file used is [example/phones.txt](https://raw.githubusercontent.com/dbwebb-se/unix/master/example/awk/phones.txt). It is a small file with the following content:

```text
Brand,Model,Price,Units
Apple,iPhone X,8000,3
Apple,iPhone 11,10000,14
Samsung,Galaxy S20,9500,8
Samsung,Galaxy S21+,11500,13
Samsung,Galaxy Note20,8000,4
```

Think of the file as a small warehouse. There are, for example, 8 Samsung Galaxy S20 and they cost SEK 9,500 each.

If we start by dumping the entire file with awk, the command might look like this:

```
$ awk '{print $0}' phones.txt
Brand,Model,Price,Units
Apple,iPhone X,8000,3
Apple,iPhone 11,10000,14
Samsung,Galaxy S20,9500,8
Samsung,Galaxy S21+,11500,13
Samsung,Galaxy Note20,8000,4
```

**$0** contains the whole row separated by RS (`\n`). We will then print all rows in the file. Most of the time, you do not want to change RS.

Note that we do not need BEGIN here, because we do not execute anything before the file is loaded.

All the parts that are divided by FS (spaces) will end up in `$1`, `$2` etc.

Test to print only the first field:

```
$ awk '{print $1}' phones.txt
Brand,Model,Price,Units
Apple,iPhone
Apple,iPhone
Samsung,Galaxy
Samsung,Galaxy
Samsung,Galaxy
```

Now the different fields are separated by `,` so then we have to change FS:

```
$ awk '{FS=","; print $1}' phones.txt
Brand,Model,Price,Units
Apple
Apple
Samsung
Samsung
Samsung
```

Note that the first row has not been separated with `,`. The reason is that the row is read before **FS=","** kicks in. Here we need BEGIN:

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

With the help of OFS, we can alter the prints. By default OFS is a space.

We continue with our file. Let's say we want to print in the format: model = manufacturer. First we look at what happens if we do not change it:

```
$ awk 'BEGIN {FS=","} {print $2,$1}' phones.txt
Model Brand
iPhone X Apple
iPhone 11 Apple
Galaxy S20 Samsung
Galaxy S21+ Samsung
Galaxy Note20 Samsung
```

Good. It prints as planned. Now we change OFS:

```
$ awk 'BEGIN {FS=","; NR>1; OFS="="} {print $2,$1}' phones.txt
Model=Brand
iPhone X=Apple
iPhone 11=Apple
Galaxy S20=Samsung
Galaxy S21+=Samsung
Galaxy Note20=Samsung
```

OFS supports `\t`, `\n` etc. You can also have a long row like:  
`OFS="\n\tlite text"`.



### Other built-in variables {#other}

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
