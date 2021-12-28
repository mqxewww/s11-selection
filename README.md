# [S11] SELECTION BTS

![](https://img.shields.io/badge/php-built%20on%207.4.1-%237278AB)
![](https://img.shields.io/badge/version-0.1.1-9cf)

## FR

### Description

S11 Selection est une solution web PHP faite pour automatiser la création d'une grille d'évaluation d'un étudiant puis de les rassembler pour en faire un classement. Cette application est un projet d'école individuel fait lors de ma première année.

### Installation

Un template de la base de donnée prêt à importer est disponible dans `./database/selection.sql`. Les 3 comptes sont `admin@admin`, `teacher@teacher` & `secr@secr`.\
Modifiez ensuite les variables dans `./config/config.php` pour pouvoir vous connecter à votre serveur MySQL.\
L'application est ensuite prête à être utilisée.

### Caractéristiques :page_facing_up:

1. Portail d'authentification
2. Espace évaluateur
   1. Remplir une grille d'évaluation
   2. Modifier une grille
   3. Voir le classement
3. Espace secrétaire
   1. Voir et télécharger le classement au format CSV
4. Espace administrateur
   1. Créer un compte
   2. Modifier un compte
   3. Supprimer un compte 

### Caractéristiques techniques

:computer: PHP orienté objet sous architecture MVC.

### À propos :information_source:

Projet réalisé de début Octobre 2020 à début Décembre 2020. Projet retravaillé à partir du 9 décembre 2021 pour mes examens.

Créé par **NOIZET Maxence** <noizetmax08@orange.fr>\
Licence : [Licence MIT](https://opensource.org/licenses/MIT)

## EN

### Description

S11 Selection is a PHP web solution designed to automate the creation of a student's evaluation grid and then gather them to make a ranking. This application is an individual school project done during my first year.

### Setup

A ready-to-import database template is available in `./database/selection.sql`. The 3 accounts are `admin@admin` & `teacher@teacher` & `secr@secr`.\
Then modify the variables in `./config/config.php` so that you can connect to your MySQL server.\
The application is then ready to use.

### Features :page_facing_up:

1. Authentication portal
2. Evaluator's area
   1. Filling in an evaluation grid
   2. Update a grid
   3. View the ranking
3. Secretary's area
   1. View and download the ranking in CSV format
4. Administrator area
   1. Create an account
   2. Update an account
   3. Delete an account

### Technical characteristics

:computer: Object-oriented PHP under MVC architecture.

### About :information_source:

Project carried out from early October 2020 to early December 2020. Project reworked from 9 December 2021 for my exams.

Created by **NOIZET Maxence** <noizetmax08@orange.fr>\
Lisense : [MIT License](https://opensource.org/licenses/MIT)
