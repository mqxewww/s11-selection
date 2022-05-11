# [S11] SELECTION BTS

<p align="center"><a href="https://github.com/25thMaxouuu/s11-selection" target="_blank" rel="noopener noreferrer"><img width="100" src="../public/assets/images/icones8-favicon.png"></a></p>

<p align="center">
   <a href="https://github.com/25thMaxouuu/s11-selection"><img src="https://img.shields.io/badge/version-1.1.0-9cf" alt="Application Version" /><a>
   <a href="https://php.net/"><img src="https://img.shields.io/badge/php-%3E%3D%208.0.13-%37278AB" alt="PHP Version" /><a>
   <a href="https://bulma.io/"><img src="https://img.shields.io/badge/dynamic/json?color=%2300D1B2&label=Bulma&query=%24.version&url=https%3A%2F%2Fraw.githubusercontent.com%2Fjgthms%2Fbulma%2Fmaster%2Fpackage.json" alt="Bulma Version" /><a>
</p>

## Description

S11 Selection est une solution web PHP faite pour automatiser la création d'une grille d'évaluation d'un étudiant puis de les rassembler pour en faire un classement. Cette application est un projet d'école individuel fait lors de ma première année.

## Installation

> PHP 8 ou + est requis !

Un template de la base de donnée prêt à importer est disponible dans `./docs/selection.sql`. Les 3 comptes sont `admin@admin`, `teacher@teacher` & `secr@secr`.\
Dupliquez ensuite le fichier nommé `.env.template` et renommez le `.env`. Complétez ensuite les valeurs avec vos données personnelles.

L'application est ensuite prête à être utilisée.

## Caractéristiques

1. Portail d'authentification ;
2. Espace évaluateur :
   1. Remplir une grille d'évaluation,
   2. Modifier une grille,
   3. Voir le classement,
3. Espace secrétaire :
   1. Voir et télécharger le classement au format CSV,
4. Espace administrateur :
   1. Créer un compte,
   2. Modifier un compte,
   3. Supprimer un compte.

## Images

### Page d'authentification

<p align="center">
   <img alt="Authentication page" width="700" src="./README-PICTURES/auth-home.jpg">
</p>

### Exemple d'une page d'accueil

<p align="center">
   <img alt="Home page example" width="700" src="./README-PICTURES/home-example.jpg">
</p>

### Exemple d'un formulaire

<p align="center">
   <img alt="Form example" width="700" src="./README-PICTURES/form-example.jpg">
</p>

## Caractéristiques techniques

:computer: PHP orienté objet sous architecture MVC.\
:pencil2: Utilisation du framework CSS **[Bulma](https://bulma.io/documentation/overview/start/)**.\
:arrow_forward: Icone de l'application venant de **[Icons8](https://icons8.com/icon/64044/grille)**.

## À propos

Projet réalisé de début Octobre 2020 à début Décembre 2020. Projet retravaillé à partir du 9 décembre 2021 pour mes examens.

Créé par **NOIZET Maxence** **<noizetmaxencepro@gmail.com>**.\
Projet sous **[Licence MIT](https://opensource.org/licenses/MIT)**.
