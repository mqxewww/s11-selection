# S11-Selection <img href="https://github.com/mqxewww/s11-selection" src="https://raw.githubusercontent.com/mqxewww/s11-selection/main/public/assets/images/icones8-favicon.png" width="80px" alt="Selection BTS logo" align="right">

*[French version](https://github.com/mqxewww/s11-selection/blob/main/docs/README-FR.md)*. :memo:

S11 Selection is a PHP web solution designed to automate the creation of a student's evaluation grid and then gather them to make a ranking. This application is an individual school project done during my first year.

## Setup :rocket:

> You need to have Composer and PHP8 installed on your system.

To set up your MySQL database, use the import-ready SQL file `./docs/selection.sql`. The three accounts `id/pass` are `admin/admin`, `teacher/teacher` and `secr/secr`.

For the PHP application, run the `setup.sh` script and follow the instructions.

## Features :sparkles:

- [x] Authentication portal
- [x] Evaluator's area :
  - [x] Filling in an evaluation grid
  - [x] Update a grid
  - [x] View the ranking
- [x] Secretary's area :
  - [x] View and download the ranking in CSV format
- [x] Administrator area :
  - [x] Create an account
  - [x] Update an account
  - [x] Delete an account

## More about S11-Selection :memo:

[![Release](https://img.shields.io/github/v/release/mqxewww/s11-selection?label=latest%20release&logo=git&logoColor=white&style=for-the-badge)](https://github.com/mqxewww/s11-selection/releases)
[![Top language](https://img.shields.io/github/languages/top/mqxewww/s11-selection?color=777BB4&logo=php&logoColor=white&style=for-the-badge)](https://github.com/mqxewww/s11-selection/search?l=php)
[![License](https://img.shields.io/github/license/mqxewww/s11-selection?style=for-the-badge)](https://github.com/mqxewww/s11-selection/blob/master/LICENSE)

:sparkles: You can find in the folder `./docs/README-PICTURES/` the application presentation.\
:computer: Object-oriented PHP under MVC architecture.\
:pencil2: Use of **[Bulma](https://bulma.io/documentation/overview/start/)** CSS framework.\
:arrow_forward: App icon from **[Icons8](https://icons8.com/icon/64044/grid)**.

~ mqxewww, 2021-2022
