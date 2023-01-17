# Application de suivi des cours des cryptomonnaies

Ce projet permet à un utilisateur de pouvoir suivre facilement et rapidement l’évolution des cryptomonnaies. L’utilisateur pourra suivre cette évolution depuis un téléphone ou un ordinateur.

## Pré-requis

Pour l'application web :
- [PHP](https://www.php.net/) : back-end
- [MySQL](https://www.mysql.com/) : RDBMS
- [composer](https://getcomposer.org/) : Dependency Manager

## Installation 

Saisir la commande pour lire son entrée à partir du fichier source.sql
```
mysql studi_cryptoevol < source
```

Saisir la commande pour installer les dépendances du projet
```
php composer.phar update
```

## Tests de l'application

- [PHPUnit](https://phpunit.readthedocs.io/) : back-end

Saisir la commande pour lancer les tests de l'application
```
php vendor/bin/phpunit --configuration tests/phpunit.xml tests/
```

