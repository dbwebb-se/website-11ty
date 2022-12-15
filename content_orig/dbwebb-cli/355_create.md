Skapa labbar
==================================

Vissa kursmoment innehåller laborationer som du behöver skapa. Det gör du på följande vis.

```text
$ dbwebb create lab1
```

Du anger vilken labb det gäller och sedan skapas alla filer som labben består av.

När du väl har skapat labben kan du inte skapa en till. Om du av någon anledning vill skapa om labben så kan du radera alla filerna i labb-katalogen och sedan skapa om labben igen. Men var försiktig så att du inte raderar någon fil du redan skrivit lösningar i.



Skapa om en labb {#recreate}
----------------------------------

Ibland vill man skapa om labbmiljö, det vill säga alla filer som skapas runt labben, men utan att ändra den filen där man skrivit alla labbsvaren.

Det kan du göra med följande kommando, som bevarar de lösningar till labben du redan skrivit.

```text
$ dbwebb recreate lab1
```

Detta kommando används främts för att testa labbverktyget.
