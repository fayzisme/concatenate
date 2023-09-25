# Cek Ongkir

Cek ongkir dengan Laravel 8.x dan API Rajaongkir

## Cara Install
Aplikasi ini dapat dipasang dalam server lokal (PC/Laptop) dan server online, dengan spesifikasi berikut :

#### Spesifikasi minimum server
1. PHP >= 7.3 (dan memenuhi [server requirement Laravel 8.x](https://laravel.com/docs/8.x/deployment#server-requirements)),

#### Tahap Install
1. `$ composer install`
2. `$ cp .env.example .env`
3. `$ php artisan key:generate`
4. `$ php artisan migrate:fresh --seed`
5. `$ php artisan serve`
