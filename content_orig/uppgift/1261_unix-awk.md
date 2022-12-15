---
author: lew
category:
    - bash
    - unix
    - regex
    - lab
revision:
    "2021-06-29": (A, lew) Ny inför HT21.
...
awk script
==================================

An exercise to practice the basics of awk. To your aid, you have an [awk guide](guide/kom-igang-med-awk) as well as the article about [regex](kunskap/regex).

<!--more-->



Prerequisites {#pre}
-----------------------

You have installed the environment for the course.

You have access to the command `dbwebb` and you have cloned the courserepo.



Get the file {#get}
-----------------------

You have a textfile to start from. You can find it in the example folder.

Go to your course folder in the terminal and run the following command.

```bash
# Move to the course folder
cp example/awk/awk_names.csv me/kmom03/awk/
```

The file contains a lot of lines with fictitious personal information.
[INFO]
All data in the file is automatically generated and is not real people. If it could be mapped to a real person, it is by pure chance. The data comes from public lists with "most popular names" and "list of places in Sweden". The numbers are also automatically generated.
[/INFO]



### Exercise {#ex}

You will create a set of awk scripts. Keep in mind that the first line is often a form of headline. All prints should have the same formatting as in the example. One tip is to use printf () in some answers.

All scripts must present correct results with the command:

`$ awk -f <script> awk_names.csv` where &lt;script&gt; is replaced with the current exercise.


Requirements {#req}
-----------------------

1. Create the script `1.awk`. Print the first name and last name of all persons.

Below are the first three:
```
Salma Helin
Sanna Wahlgren
Anni Örn
...
```

2. Create the script `2.awk`. Get the first 100 persons.

Below are the first three:
```
Salma Helin, Hällaryd
Sanna Wahlgren, Torhamn
Anni Örn, Resarö
...
```

3. Create the script `3.awk`. Get the persons from the 507th to and including the 515th.

Below are the first three:
```
Charlotta Forsström, Norra Ingaröstrand
Emin Wik, Krokom
Adriana Rosell, Näsåker
...
```

4. Create the script `4.awk`. Add a header and a footer. Print all rows with the fields separated by TAB.

Below are the first three:
```
Firstname       Lastname         Phonenumber
---------------------------------------------
Salma           Helin            555674792
Sanna           Wahlgren         555493393
Anni            Örn              555408537
...
--------------------------------------
```

5. Create the script `5.awk`. Print all rows where the city ends with `berg`. Note the right alignment.

Below are the first three:
```
Firstname       Lastname                        City
----------------------------------------------------
Indra           Sörensson                  Killeberg
Ester           Haglund                   Falkenberg
Eva             Lindfors                     Varberg
...
```

6. Create the script `6.awk`. Print all rows where the city has the substring `stad` and the person is born in January or October (tip: split()).

Below are the first three:
```
Firstname       Lastname                        City
----------------------------------------------------
Savannah        Sjölin              Västra Ingelstad
Betty           Östberg                  Fridlevstad
Kian            Bohlin                      Lyrestad
...
```

7. Create the script `7.awk`. Work through the rows and calculate how many that are born each year.

Below are the first three:
```
Year   Amount
-------------
1990       38
1991       56
1992       50
...
```

8. Create the script `8.awk`. Print all rows where the day of birth can be found in the phone number. For example can the number `08` be found in the first row (tip: match()).

Below are the first three:
```
Anni Örn, 1994-07-08, 555408537
Teo Stenström, 1994-04-29, 555229873
Stina Örn, 2010-05-25, 555622513
...
```

9. Create the script `9.awk`. Reuse the result from the previous script. Add a line at the end that shows how many were born before the year 2000.

Below are the last three rows:
```
...
Vilja Nordstrand, 1991-02-30, 555305309
---------------------------------
<int> are born before the year 2000.
```

Replace `<int>` with the result.



Extra assignment {#extra}
-----------------------

1. Create the script `10.awk`. Print all lines where the email address contains more than 40 characters. Then create a function that reformats the date of birth. Also remove "leading zero" on the day.

Below are the first three:
```
Joseph 2/nov-1997
Maximiliam 3/jun-2001
Vilhelm 23/mar-2002
...
```



### Hand in {#hand-in}

Validate and publish the assignment by running the following commands in the terminal.

```bash
# Move to the course folder
dbwebb validate awk
dbwebb publish awk
```

Correct any errors and publish again. You are done when all is green.



General tip {#tip}
-----------------------

Good luck and use the chat if you get stuck!
