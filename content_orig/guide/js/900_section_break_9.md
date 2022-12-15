---
sectionHeader: true
linkable: true
...
Module pattern
=======================

Ett vanligt sätt är att använda closure är för att skapa moduler av JavaScript kod. Man lägger en hel modul i en funktion, där finns hela scopet, ett eget closure. I denna funktion definieras allt som behövs i modulen, variabler såsom funktioner. Till sist returneras en objekt-literal där man anger modulens publika interface.
