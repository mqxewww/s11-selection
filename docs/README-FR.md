# s11-selection <img href="https://github.com/mqxewww/s11-selection" src="https://raw.githubusercontent.com/mqxewww/s11-selection/main/public/assets/images/icones8-favicon.png" width="80px" alt="selection BTS logo" align="right">

## Avertissement :warning:

**Ce projet a été développé pendant ma scolarité. Il n'est pas destiné a être utilisé en production, et n'est pas maintenu. Ce projet est public dans l'unique contexte de montrer mes compétences.**

## Description :pencil2:

s11-selection est une solution web PHP faite pour automatiser la création d'une grille d'évaluation d'un étudiant puis de les rassembler pour en faire un classement.

## Installation :rocket:

> Vous devez avoir Composer et PHP8 d'installés sur votre système.

Pour mettre en place la base de donnée mySQL, utilisez le fichier SQL prêt à importer `./docs/selection.sql`. Les trois comptes `id/pass` sont `admin/admin`, `teacher/teacher` et `secr/secr`.

Pour l'application PHP, éxecutez le fichier `setup.sh` et suivez les instructions.

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

## Plus d'infos sur s11-selection :memo:

[![Release](https://img.shields.io/github/v/release/mqxewww/s11-selection?label=latest%20release&logo=git&logoColor=white&style=for-the-badge)](https://github.com/mqxewww/s11-selection/releases)
[![Top language](https://img.shields.io/github/languages/top/mqxewww/s11-selection?color=777BB4&logo=php&logoColor=white&style=for-the-badge)](https://github.com/mqxewww/s11-selection/search?l=php)
[![License](https://img.shields.io/github/license/mqxewww/s11-selection?style=for-the-badge)](https://github.com/mqxewww/s11-selection/blob/master/LICENSE)

:sparkles: Vous pouvez trouver dans le dossier `./docs/README-PICTURES/` une présentation de l'application.\
:computer: PHP orienté objet sous architecture MVC.\
:pencil2: Utilisation du framework CSS **[Bulma](https://bulma.io/documentation/overview/start/)**.\
:arrow_forward: Icone de l'application venant de **[Icons8](https://icons8.com/icon/64044/grille)**.

~ mqxewww, 2021-2023
