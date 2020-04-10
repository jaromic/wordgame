# Aufsetzen der Entwicklungsumgebung

Dieses Dokument enthält exakte Anweisungen, um die Entwicklungsumgebung einheitlich aufzusetzen. Diese Anweisungen sollte jeder Entwickler pro Rechner einmalig ausführen.

## Voraussetzungen

* Composer muss installiert und im Pfad sein, sodass er von der Kommandozeile als `composer` aufgerufen werden kann.
* Node.js muss installiert und im Pfad sein, sodass `npm` von der Kommandozeile aufgerufen werden kann. Falls nicht, von https://nodejs.org/dist/v12.13.0/node-v12.13.0-x64.msi  herunterladen und installieren.
* Xampp muss installiert sein (zB unter `C:\xampp`)

## Hosts-File

Folgende Zeile zu `c:\windows\system32\drivers\etc\hosts` hinzufügen:

```
127.0.0.1 dev.wordgame
```

## IDE

Als IDE wird PHPStorm verwendet.

* PHPStorm starten
* Falls ein Projekt geöffnet ist: `File/Close Project`
* `Check out from Version Control/Git` wählen
* `https://github.com/jaromic/wordgame.git` in ein passendes Zielverzeichnis auschecken
* Im Project-Baum auf der linken Seite den Projektnamen `wordgame` mit Rechts anklicken und `Copy path` wählen
* Frage `Open Directory?` mit `Yes` beantworten, falls sie angezeigt wird.

## VHost-Konfiguration
Die VHost-Konfiguration unter `C:\xampp\apache\conf\extra\httpd-vhosts.conf` bearbeiten:
* den folgenden VHost hinzufügen
    * dabei `MY_GIT_WORKING_COPY` durch den Pfad aus der Zwichenablage, siehe Punkt `IDE`ersetzen
    * kontrollieren, ob der Port `8011` nicht schon anderswo in `http-vhosts.conf` konfiguriert ist (in dem Fall einen anderen wählen)
    * Anschließend den Web-Server neu starten.

```apacheconfig
Listen 8012
<VirtualHost dev.wordgame:8012>
  ServerName dev.wordgame
  DocumentRoot "MY_GIT_WORKING_COPY/public"

  SSLEngine on
  SSLCertificateFile "conf/ssl.crt/server.crt"
  SSLCertificateKeyFile "conf/ssl.key/server.key"

  <Directory "MY_GIT_WORKING_COPY/public">
      AllowOverride All
      Require all granted
      Options Indexes FollowSymLinks
  </Directory>

  ErrorLog "logs/dev.wordgame.log"
  CustomLog "logs/dev.wordgame.log" common
</VirtualHost>
```

## Webserver und DB starten

 * Webserver und DB über Xampp-Control-Panel starten.
 * **Falls Webserver schon läuft, diesen neu starten.**

## Datenbank

```shell script
.jarosoft/scripts/createdb.sh
```

## Copy development environment file

```shell script
cp -v environment.example environment
```

## Composer ausführen

```shell script
composer install
```

## NPM-Abhängigkeiten installieren

```shell script
npm install
```

