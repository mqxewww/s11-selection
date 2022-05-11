# [S11] SELECTION BTS

<p align="center"><a href="https://github.com/25thMaxouuu/s11-selection" target="_blank" rel="noopener noreferrer"><img width="100" src="./public/assets/images/icones8-favicon.png"></a></p>

<p align="center">
   <a href="https://github.com/25thMaxouuu/s11-selection"><img src="https://img.shields.io/badge/version-1.1.0-9cf" alt="Application Version" /><a>
   <a href="https://php.net/"><img src="https://img.shields.io/badge/php-%3E%3D%208.0.13-%37278AB" alt="PHP Version" /><a>
   <a href="https://bulma.io/"><img src="https://img.shields.io/badge/dynamic/json?color=%2300D1B2&label=Bulma&query=%24.version&url=https%3A%2F%2Fraw.githubusercontent.com%2Fjgthms%2Fbulma%2Fmaster%2Fpackage.json" alt="Bulma Version" /><a>
</p>

French version **[here](https://github.com/25thMaxouuu/s11-selection/blob/main/docs/README-FR.md)**.

## Description

S11 Selection is a PHP web solution designed to automate the creation of a student's evaluation grid and then gather them to make a ranking. This application is an individual school project done during my first year.

## Setup

> PHP 8 or higher is required !

A ready-to-import database template is available in `./docs/selection.sql`. The 3 accounts are `admin@admin` & `teacher@teacher` & `secr@secr`.\
Then duplicate the file named `.env.template` and rename it `.env`. Then fill in the values with your personal data.

The application is then ready to use.

## Features

1. Authentication portal ;
2. Evaluator's area :
   1. Filling in an evaluation grid,
   2. Update a grid,
   3. View the ranking,
3. Secretary's area :
   1. View and download the ranking in CSV format,
4. Administrator area :
   1. Create an account,
   2. Update an account,
   3. Delete an account.

## Pictures

### Authentication page

<p align="center">
   <img alt="Authentication page" width="700" src="./docs/README-PICTURES/auth-home.jpg">
</p>

### Home page example

<p align="center">
   <img alt="Home page example" width="700" src="./docs/README-PICTURES/home-example.jpg">
</p>

### Form example

<p align="center">
   <img alt="Form example" width="700" src="./docs/README-PICTURES/form-example.jpg">
</p>

## Technical characteristics

:computer: Object-oriented PHP under MVC architecture.\
:pencil2: Use of **[Bulma](https://bulma.io/documentation/overview/start/)** CSS framework.\
:arrow_forward: App icon from **[Icons8](https://icons8.com/icon/64044/grid)**.

## About

Project carried out from early October 2020 to early December 2020. Project reworked from 9 December 2021 for my exams.

Created by **NOIZET Maxence** **<noizetmaxencepro@gmail.com>**.\
Project under the **[MIT License](https://opensource.org/licenses/MIT)**.
