# projet motus

## Table des matières
1. Introduction
2. Installation
3. Utilisation

5. Contribution
6. Licence

## Introduction

Projet web qui est un site du jeu motus en php/js utilisant le framework laravel

## Installation

- Recuperer le zip du projet l'installer dans un dossier ou laravel est installer.
- Faire composer install, npm install
- cp .env.example .env
- php artisan key:generate


## Utilisation

Pour utiliser le site, voir le resultat il faut demarer xampp Apache et mysql
-il faut penser a generer la base de donnée et la remplir avec les seeders en utilisant :
-php artisan migrate , php artisan db:seed
-Maintenant on peut demarer le site avec php artisan serve et npm run dev
  

## Pages du site

### Page accueil du jeu motus 

Ici, vous pouvez décrire ce que les utilisateurs peuvent faire sur la page Shop, quels produits sont disponibles, comment ils peuvent filtrer.

### Page login/register

Connexion deconnexion/creaction du compte suppression du compte 
- Changement du mot de passe
