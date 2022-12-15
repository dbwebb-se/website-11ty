---
author: lew
revision:
    "2020-03-11": "(A, lew) Första versionen."
...

Jobba med panes och windows {#panes}
-------------------------------------------

När du startar tmux så får du upp en svart skärm, det är ett fönster, ett *window*. Du kan nu dela in detta fönster i olika delar, *panes*. Du navigerar mellan dessa panes med prefix följt av piltangenterna för upp, ned, höger, vänster.

[FIGURE src=/image/snapht15/tmux-ny-session.png caption="Ny session med ett fönster som innehåller en pane."]

Följande kommando är till för att jobba med panes.

| Kommando    | Vad  |
|-------------|------|
| `prefix %`  | Dela upp nuvarande pane i två delar, splitta vertikalt. |
| `prefix "`  | Dela upp nuvarande pane i två delar, splitta horisontellt. |
| `prefix x`  | Ta bort den pane du står i. |

[FIGURE src=/image/snapht15/tmux-split-panes.png caption="Dela upp panes och hoppa mellan dem via piltangenter."]

Du kan förstora och förminska en pane genom att trycka prefix + `ctrl <piltangent>`.



Jobba med windows {#windows}
-------------------------------------------

Du kan skapa nya fönster, *windows*, och hoppa mellan dem. Följande kommando hjälper dig att jobba med fönster.

| Kommando      | Vad  |
|---------------|------|
| `prefix c`    | Skapa ett nytt fönster som får ett id som visas i statuspanelen i botten. |
| `prefix ,`    | Byt namn på fönstret, namnet visas i statuspanelen. |
| `prefix <id>` | Flytta till ett visst fönster som har ett id, prefix + `1` flyttar till det fönster som har id 1. |
| `prefix &`    | Ta bort det fönster du står i. |

[FIGURE src=/image/snapht15/tmux-create-windows.png caption="Skapa flera fönster och namnge dem. Här finns fyra fönster som heter su, irc, dbwebb och linux."]
