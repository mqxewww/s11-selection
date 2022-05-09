# [S11] SELECTION BTS

[![Application Version](https://img.shields.io/badge/version-1.0.1-9cf)](https://github.com/25thMaxouuu/s11-selection)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D%208.0.13-%37278AB)](https://www.php.net/)
[![Bulma Version](https://img.shields.io/badge/dynamic/json?color=%2300D1B2&label=Bulma&query=%24.version&url=https%3A%2F%2Fraw.githubusercontent.com%2Fjgthms%2Fbulma%2Fmaster%2Fpackage.json)](https://bulma.io/)

French version **[here](https://github.com/25thMaxouuu/s11-selection/blob/main/docs/README-FR.md)**.

## Description

S11 Selection is a PHP web solution designed to automate the creation of a student's evaluation grid and then gather them to make a ranking. This application is an individual school project done during my first year.

## Setup

> PHP 8 or higher is required !

A ready-to-import database template is available in `./docs/selection.sql`. The 3 accounts are `admin@admin` & `teacher@teacher` & `secr@secr`.\
Then create a file named `config.php` in `./config` and copy and paste the following code:

```php
<?php

define("DB_HOST", "");
define("DB_NAME", "");
define("DB_USER", "");
define("DB_PWD", "");

```

Fill in the values with your personal data. The file is added in `.gitignore`, your information will remain in local.
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

## Technical characteristics

:computer: Object-oriented PHP under MVC architecture.\
:pencil2: Use of **[Bulma](https://bulma.io/documentation/overview/start/)** CSS framework.\
:arrow_forward: App icon from **[Icons8](https://icons8.com/icon/64044/grid)**.

## About

Project carried out from early October 2020 to early December 2020. Project reworked from 9 December 2021 for my exams.

Created by **NOIZET Maxence** **<noizetmax08@orange.fr>**.\
Project under the **[MIT License](https://opensource.org/licenses/MIT)**.
