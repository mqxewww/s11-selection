# S11-Selection <img href="https://github.com/mqxewww/s11-selection" src="https://raw.githubusercontent.com/mqxewww/s11-selection/main/public/assets/images/icones8-favicon.png" width="80px" alt="Selection BTS logo" align="right">

S11 Selection est une solution web PHP faite pour automatiser la création d'une grille d'évaluation d'un étudiant puis de les rassembler pour en faire un classement. Cette application est un projet d'école individuel fait lors de ma première année.

## Installation :rocket:

> Vous devez avoir Composer et PHP8 d'installés sur votre système.

Pour mettre en place la base de donnée mySQL, utilisez le fichier SQL prêt à importer `./docs/selection.sql`. Les trois comptes sont `admin/admin`, `teacher/teacher` et `secr/secr`.

Ensuite, exécutez les commandes suivantes :

```
composer install
composer dump-autoload
```

Enfin, créez un fichier `.env` à partir de `.env.template` puis complétez le.\
L'application est ensuite prête à être utilisée.

## Caractéristiques :sparkles:

- [x] Portail d'authentification
- [x] Espace évaluateur :
  - [x] Remplir une grille d'évaluation
  - [x] Modifier une grille
  - [x] Voir le classement
- [x] Espace secrétaire :
  - [x] Voir et télécharger le classement au format CSV
- [x] Espace administrateur :
  - [x] Créer un compte
  - [x] Modifier un compte
  - [x] Supprimer un compte

## Plus d'infos sur S11-Selection :memo:

[![Release](https://img.shields.io/github/v/release/mqxewww/s11-selection?label=latest%20release&logo=git&logoColor=white&style=for-the-badge)](https://github.com/mqxewww/s11-selection/releases)
[![Top language](https://img.shields.io/github/languages/top/mqxewww/s11-selection?color=777BB4&logo=php&logoColor=white&style=for-the-badge)](https://github.com/mqxewww/s11-selection/search?l=php)
[![License](https://img.shields.io/github/license/mqxewww/s11-selection?style=for-the-badge)](https://github.com/mqxewww/s11-selection/blob/master/LICENSE)

:sparkles: Vous pouvez trouver dans le dossier `./docs/README-PICTURES/` une présentation de l'application.\
:computer: PHP orienté objet sous architecture MVC.\
:pencil2: Utilisation du framework CSS **[Bulma](https://bulma.io/documentation/overview/start/)**.\
:arrow_forward: Icone de l'application venant de **[Icons8](https://icons8.com/icon/64044/grille)**.

~ mqxewww, 2021-2022
