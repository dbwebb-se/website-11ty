---
sectionHeader: true
linkable: true
author: mos
revision:
    "2018-04-15": "(A, mos) Första versionen."
...
Trait och Interface
=======================

Vi skall titta på hur objekt kan samverka och sammanfogas med konstruktioner som trait och interface. Det är två tekniker som kompletterar arv och komposition.

En grundtanke när man utvecklar sitt system är att varje sak har sin plats och man vill återanvända koden samt hålla den inkapslad och öppen för interna uppdateringar i koden utan att förändra det publika API:et mellan klasserna.

Lyckas man så får man ett system som välkomnar förändringar men är motståndskraftigt mot att förändringar tar sönder, eller påverkar många delar av systemet.

Låt se hur trait och interface passar in i dessa tankar.
