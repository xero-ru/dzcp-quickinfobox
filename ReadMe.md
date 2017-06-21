# Quickinfo AddOn

Diese Mod beinhaltet eine Box, die mit Hilfe von [quickinfo] in dein Design intergriert werden kann. Der Inhalt kann über das Adminmenü festgelegt werden. Werden mehrere Inhalte hinterlegt, wird ein zufälliger Eintrag angezeigt. Verschiedene Inhalte können aktiviert oder deaktiviert werden. Die Rechtevergabe für diese Mod erfolgt ebenfalls über das Adminmenü. Inhalte können außerdem gelöscht und bearbeitet werden. Des weiteren ist eine deutsche Sprachdatei enthalten, die ggf an andere Sprachen angepasst werden kann.

## Haftungsausschluss

Wir übernehmen keinerlei Verantwortung, für Schäden die durch das einbinden der Mod/des Addons entstehen. Das einbinden und nutzen erfolgt demnach auf eigene Gefahr.

Vor den einbinden der Mod/des Addons sollte eine Datenbanksicherung durchgeführt werden. Des Weiteren empfehlen wir, von allen Dateien welche geändert werden müssen (unter „Benötigte Dateien“ aufgelistet), ebenfalls eine Sicherheitskopie anzufertigen.

## Benötigte Dateien
Folgende Datei werden für dieses Addon benötigt:
- _install/install.php
- admin/menu/quickinfo.php
- inc/additional-functions/quickinfo.php
- inc/additional-languages/deutsch/quickinfo.php
- admin/menu/quickinfo.gif
- inc/_templates_/TEMPLATE/admin/form_quickinfo.html
- inc/_templates_/TEMPLATE/admin/quickinfo.html
- inc/_templates_/TEMPLATE/admin/quickinfo_show.html
- inc/_templates_/TEMPLATE/menu/quickinfo.html

## Installation
Entpackt das Archiv in einen beliebigen Ordner. Wenn Ihr es entpackt habt, findet Ihr in den entpackten Ordner 3 weitere Ordner (_install, PHP und Template).

Damit es zu keinen Fehler kommt, müssen zuerst die Tabellen in der Datenbank angelegt werden. Hierfür haben wir einen kleinen Installer geschrieben, welchen sich im Ordner _install befindet. Ladet diesen Ordner in das Hauptverzeichnis eures deV!L'z Clanportals.

Ruft anschliesend eure Seite auf und fügt hinter die Adresse folgendes ein:

- /_install/install.php

Wenn die Installation erfolgreich verlief löscht zur Sicherheit den Installer-Ordner von euren Webspace.

Nun müssen die restlichen Dateien hochgeladen werden. Den Inhalt aus dem "PHP Ordner" müsst Ihr in das Hauptverzeichnis des deV!L'z Clanportal hochladen. Das Hauptverzeichnis ist das oberste Verzeichnis des deV!L'z Clanportals in welchen sich unter anderen die Dateien __readme.html, antispam.php, index.php, popup.html und die ganzen Ordner der einzelnen Bereiche befinden.

Den Inhalt des "Templates" Ordner müsst Ihr in das Verzeichnis eures Templates hochladen (Pfad: inc/_templates_/TEMPLATE).

Jetzt müsst ihr noch [quickinfo] an der gewünschten Stelle in euer Template einbauen. In inc/_templates_/TEMPLATE/index.html
