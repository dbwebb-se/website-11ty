---
author: aar
revision:
    "2022-01-14": "(A, aar) Första versionen."
...
Strukturera filer som paket
==================================

När vi jobbar objektorienterat eller bara med lite större projekt blir det snabbt många filer, då är det bra att kunna dela upp dem i olika mappar. I python kallas filer moduler och en mapp med flera moduler (filer) kallas ett [paket](https://docs.python.org/3/tutorial/modules.html#packages). När vi jobbar med filerna som paket påverkar det hur vi importerar dem. Så vi ska lära oss hur vi skapar ett paket och hur vi kan importera från ett paket.

### Skapa ett paket {#create}

Det räcker inte med att vi har flera python filer i en mapp för att det ska bli ett paket. Det **måste** finnas en fil som heter `__init__.py` i mappen för att Python ska tolka mappen som ett paket. Filen kan vara tom, den behöver bara finnas. Det går att göra en hel del i filen, bl.a. för att påverka hur saker importeras men det ligger utanför gränsen för denna guiden.

Om ni har jobbat med i guiden än så länge borde ni ha kod för följande filer `car.py` och `racetrack.py`. Skapa en ny mapp som kan heta `src`, lägga filerna i den mappen.

[FIGURE src=/image/oopython/guide/package-not.png? class="right" caption="Filer"]


I `racetrack.py` importera vi ett Car objekt med `from car import Car`. Detta funkar så länge vårt program exekveras från samma mapp filerna ligger. Men när vi börjar dela upp vår kod i flera mappar och importerar saker då funkar inte det längre. Då behöver vi göra om mapparna till paket för att kunna importera via paket strukturen.

Skapa en tom fil med namnet `__init__.py` i `src` mappen.

[FIGURE src=/image/oopython/guide/package-package.png? class="right" caption="Filer"]

Det gamla importeringen funkar fortfarande men nu kan vi ändra den till `from src.car import Car`. Om ni kör `python3 racetrack.py` nu kommer ni få felet:

```
  File "racetrack.py", line 6, in <module>
    from src.car import Car
ModuleNotFoundError: No module named 'src'
```

Det är för att vi står inne i paketet och då har inte Python koll på vad mappen heter som vi står i utan Python letar efter en mapp som heter src i mappen vi står i.



### Använda paket {#use}

Strukturen vi har nu funkar bara att importera från annan kod. Vi behöver skapa en ny ingångspunkt till vårt program, vi kan göra det genom att skapa en ny fil bredvid `src` mappen. Skapa filen `main.py` och i den kan vi skriva följande kod:

[FIGURE src=/image/oopython/guide/package-use.png? class="right" caption="Filer"]

```python
from src.racetrack import RaceTrack

rt = RaceTrack(50, 0.2)
rt.race()
```

Då kan vi köra programmet med `python3 main.py` om vi står i samma mapp som `src` ligger. Vårt paket kan bara importeras och exekveras från utanför paketet, än så länge.



### Exekvera paket {#exe}

För att kunna exekvera paketet i sig köra man `python3 -m src`, om man står i samma mapp som `src` ligger. Om ni testar det nu får ni felet `No module named src.__main__; 'src' is a package and cannot be directly executed`. Python letar efter filen `__main__.py` i `src` mappen. I den filen kan vi bestämma vad som ska ske när man exekverar paketet.

Skapa `__main__.py` i `src` mappen och i den skriva:

[FIGURE src=/image/oopython/guide/package-execute.png? class="right" caption="Filer"]

```python
from src.racetrack import RaceTrack


if __name__ == "__main__":
    rt = RaceTrack(50, 0.2)
    rt.race()
```

Nu kan ni exekvera paketet med `python3 -m src`.
