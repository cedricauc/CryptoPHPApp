# Application de suivi des cours des cryptomonnaies

Ce projet permet à un utilisateur de pouvoir suivre facilement et rapidement l’évolution des cryptomonnaies. L’utilisateur pourra suivre cette évolution depuis un téléphone ou un ordinateur.

## Pré-requis

Pour l'application web :
- [PHP](https://www.php.net/) : back-end
- [MySQL](https://www.mysql.com/) : RDBMS
- [composer](https://getcomposer.org/) : Dependency Manager
- [Docker](https://www.docker.com) : deployment

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

## Déploiement

Saisir la commande pour déployer l'application dans un container docker
```
docker-compose up --build
```

Lancement de l'application en local.\
Ouvrir [http://127.0.0.1:8000](http://127.0.0.1:8000) pour afficher dans le navigateur

Lancement de la console phpmyadmin en local.\
Ouvir [http://127.0.0.1:8084](http://127.0.0.1:8084) pour afficher dans le navigateur
