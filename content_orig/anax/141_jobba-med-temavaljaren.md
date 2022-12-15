---
...
Jobba med temaväljaren
==================================

I Anax Flat finns en temaväljare som låter dig välja vilket tema du vill visa. Det kan vara ett bra utvecklingsverktyg när du sitter och jobbar med utvecklingen av flera olika teman.



Temaväljaren {#tema}
-----------------------------------

Du når temaväljaren via routen `index.php/theme-selector`. Du kan testa och se hur [den ser ut på studentservern](http://www.student.bth.se/~mosstud/kod-exempel/anax-flat/htdocs/index.php/theme-selector).

När temaväljaren är inaktivt, när man *inte* gjort ett val, så används de inställningar som är gjorda i konfigfilen `config/theme.php`. Det är alltså ditt standardtema.

Men när man väljer ett tema i temaväljaren så börjar den att ta bort de inställningar som är gjorda i `config/theme.php`. Den nollställer utgångsläget. Sedan aktiverar den temats inställningar som kan bestå av både stylesheets och klasser på `<html>` elementet.

Man får helt nya förutsättningar för varje tema och man kan låta temat bestå av noll, en eller flera stylesheets och noll, en eller flera klasser på `<html>` elementet. 



Filer i temaväljaren {#filer}
-----------------------------------

Följande filer är de som bygger upp temaväljaren.

| Fil | Beskrivning |
|-----|-------------|
| [`view/theme-selector/index.tpl.php`](https://github.com/canax/anax-flat/blob/master/view/theme-selector/index.tpl.php) | Templatefilen som renderar temaväljarens sido-innehåll. |
| [`config/routes/custom.php`](https://github.com/canax/anax-flat/blob/master/config/routes/custom.php) | Implementerar den route som visar temaväljaren samt aktiverar inställningarna utifrån valt tema. |
| [`config/theme-selector.php`](https://github.com/canax/anax-flat/blob/master/config/theme-selector.php) | Konfigurationsfil där du editerar förutsättningarna för respektive tema. |

Den filen du skall redigera, för att skapa dina egna förutsättningar för temat, är alltså `config/theme-selector.php`.

Ställ dina frågor om hur du kan jobba med detta i [forumtråden om temaväljaren](t/5923).



Anax Flat Theme och Makefilen {#make}
-----------------------------------

I det repo vi använder för att skapa stylesheetsen så stödjs att Makefilen genererar olika stylesheet-filer. Men du behöver berätta för Makefilen att du vill generera en viss fil. Normalt skapas endast en stylesheet utifrån `style.less`.

Men om du går in och redigerar Makefilen i detta stycket:

```text
# LESS and CSS
LESS 		 	= style.less #style1.less #style2.less
```

Ovan ser du att den bara brys sig om `style.less`. Men ta bort kommentarerna, och skapa filerna `style1.less` och `style2.less`.

```text
# LESS and CSS
LESS 		 	= style.less style1.less style2.less
```

Nästa gång du kompilerar dina stylesheets så kommer tre olika målfiler att genereras.

Det finns en forumtråd där du kan ställa frågor om [hur du löser detta i Makefilen i Anax Flat Theme](t/5922).
