# CHANGELOG

## 1.0.0 (2021-12-29 to 2022-01-02)

> First full version of the application. Many changes like the switch to PHP8, the database connection, optimization and security, and others... Indications have been updated in `./README.md`.

#### Updated

- PHP Version 7.4.1 to 8.0.13 or higher ;
- `./config` :
  - `./connect.php` has no more global variables,
  - Global variables should be in `./config.php`, file you have to create when you clone the repository,
- `./database` is now `./docs` ;
- `./index.php` now has more explanation about the controller selection. The folder tree has been updated to match ;
- Errors are now handled one by one to get an appropriate message. They no longer go through $_GET but through $_SESSION.


## 0.2.0 (2021-12-28 to 2021-12-29)

> Second unofficial version where I modified the views with the Bulma CDN and Material Design Icons. The first full release will be 1.0.0 and should have some optimizations for setting global variables in `./config/config.php` & others.

#### Added

- CSS stylesheet at `./src/assets/css/style.css` ;
- Common Footer file at `./src/views/footer.php`.

#### Updated

- Complete CSS for the whole application (`./src/views`) ;
- `./src/views/header.php` :
  - CSS file,
  - Material Design Icon,
  - Questrial Google Font,
  - First common ```<div>``` tags.

#### Removed

- `./src/views/navbar.php`.

## 0.1.0 (2021-12-26)

> First unofficial version where I added the whole existing project in separate commits. The application works but has no CSS and lacks finishing touches.

### Added

- Application added to the repository.