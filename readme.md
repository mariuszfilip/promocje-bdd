# Instalacja

## Composer

```
composer install
```

Jeśli nie posiadasz globalnie zainstalowanego composera:

```
cd /tmp/

php -r "readfile('https://getcomposer.org/installer');" | php

cd _project_directory_

php -f /tmp/composer.phar install
```

## Behat

W PhpStorm trzeba:

1) Ustawiamy interpreter PHP:

Settings > Languages & Frameworks > PHP

Dodajemy Interpreter

2) Settings > Languages & Frameworks > PHP > Behat

Konfigurujemy scieżkę do behata, np:

/home/x/bdd/vendor/behat/behat/bin/behat

Oraz ścieżkę do katalogu konfiguracyjnego, np:

/home/x/bdd/behat.yml

# Uruchomienie

## Behat

Najłatwiejszy sposób to uruchomienie w PhpStormie:

### Cały katalog:
Po wskazaniu katalogu:

Run (z ikonką behata) lub Debug (z ikonką behata)

### Jeden feature:
Po wskazaniu pliku:

Run '...' lub Debug '...'

### Jeden scenariusz:
Po wskazaniu scenariusza w pliku:

Run '...' lub Debug '...'

## PhpSpec

Ponieważ PhpStorm nie wspiera, unieruchamiamy w konsoli

```
bin/phpspec run
```

```
bin/phpspec describe Nazwa_Klasy
```
