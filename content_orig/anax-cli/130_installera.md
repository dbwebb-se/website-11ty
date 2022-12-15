Installera
==================================

Installera `anax` genom att köra följande kommando i din terminal.

```text
bash -c "$(curl -s https://raw.githubusercontent.com/canax/anax-cli/master/src/install.bash)"
```

Kommandosekvensen laddar först ned en installationsfil som exekveras. Installationsfilen laddar ned programmet anax som en temporär fil. Därefter kopieras den till katalogen `/usr/local/bin`, alternativt `/usr/bin`. Den kopieringen kan kräva att du kör skriptet som root, eller med sudo, (gäller Mac OS eller Linux) så här.

```text
sudo bash -c "$(curl -s https://raw.githubusercontent.com/canax/anax-cli/master/src/install.bash)"
```

Du kommer att se felmeddelande om det inte går bra att installera. Om du får problem så kan du [installera steg för steg](installera-steg-for-steg) istället.

När installationen är klar så kan du pröva om det gick bra genom att kolla vilken version du har.

```text
anax --version
```

Om du är intresserad så kan du dubbelkolla vad installationsskriptet gör, genom att [studera det på GitHub](https://github.com/canax/anax-cli/blob/master/src/install.bash).

Så här kan det se ut.

[ASCIINEMA src=132319]
