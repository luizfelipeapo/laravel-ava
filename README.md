# laravel-ava
Registration system for classes and students

Requirements
------------
- PHP >= 7.0.0
- Laravel >= 5.5.0
- Fileinfo PHP Extension

It is possible to install this system using the composer. To do this, install Laravel and before running the composer install, place the repository in the composer.json

    "repositories": {
        "laravel-ava": {
            "type": "vcs",
            "url": "https://github.com/luizfelipeapo/laravel-ava.git"
        }
    },

And then you can do the require:

    "require-dev": {
        "luizfelipeapo/laravel-ava": "^1.0.0"
    },

Then run these commands to publish assets and config：

    php artisan vendor:publish --provider="LApolinario\Ava\AvaServiceProvider"

After run command you can find config file in config/admin.php, in this file you can change the install directory,db connection or table names.

At last run following command to finish install.

    php artisan admin:install

Open `http://localhost/admin/` in browser,use username `admin` and password `admin` to login.

This project have a base developed by AINV technology and laravel-ava for which it was used for the frontend of the elements, grid, widgets and etc.