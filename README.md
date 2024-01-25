# Laravel jegyzet

A laravel keretrendszer hivatalos oldala: [https://laravel.com/](https://laravel.com/)

## Előfeltételek

- Telepített PHP (8.2 vagy újabb)
- Telepített [composer](https://getcomposer.org/)
  - Csomagok telepítéséhez [7zip](https://www.7-zip.org/) vagy php.ini-ben engedélyezni a "zip" bővítményt
- Php exe útvonalának felvétele a PATH környezeti változóba (composer telepítésekor elvégezhető)

## MVC Keretrendszer

- Model - Model

  - Adattábla leírása, adatbázis műveletek végrehajtása
- View - Nézet

  - Felhasználói felület megjelenítése
  - Felhasználói interakció
- Controller - Vezérlő

  - Vezérli az alkalmazást
  - Felhasználói által megadott adatokat továbbítja a model számára
  - Kiválasztja, hogy melyik nézet jelenjen meg és betölti rá az adatokat
    [https://media.geeksforgeeks.org/wp-content/uploads/20230927120218/mvc.png](https://media.geeksforgeeks.org/wp-content/uploads/20230927120218/mvc.png)
- CRUD

  - Create, Read, Update, Delete

## Telepítése és használata

- Új projekt létrehozása

  ```sh
  composer create-project laravel/laravel [projekt-neve]
  ```
  
- Meglévő projekt klónozása után

  ```sh
  composer install
  cp .env.example .env
  php artisan key:generate --ansi
  ```

- Fejlesztői szerver indítása

  ```sh
  php artisan serve
  ```

## Model

- Model osztály létrehozása

```sh
php artisan make:model [Model-neve] --all
```

Migráció futtatása (adattáblák létrehozása):

```sh
php artisan migrate
```

API controller létrehozása:

```sh
php artisan make:controller API/[controller-neve] --api
```

Seeder futtatása (adattáblák feltöltése teszt adatokkal):

```sh
php artisan db:seed
```

Vagy migráció utáni futtatás:

```sh
php artisan migrate --seed
```

Összes tábla törlése és a migrációk futtatása (azokat a táblákat is törli amik nem migrációval lettek létrehozva):

```sh
php artisan migrate:fresh
```
