# Prise en main de Symfony 4

## Pré-requis
- Composer
- Symfony sur sa machine
- Un système de base de données (mysql, postgrsql, etc...)

## Installation
- Vérifier que tout est ok niveau machine: 
```shell
symfony check:requirements
```
- Composer Install:
```shell
composer install
```
- Lancer les fixtures
```shell
php bin/console doctrine:fixtures:load
```