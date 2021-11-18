<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About SPA application

Staff Performance Assessment (SPA) application provides an employee to see his overall ratings(self as well as supervisor\'s). SPA allows system managers\' to create and manage staff assessment instances with configurable performance parameters.

## Installation

1. `git clone`
2. `cd`
3. `composer install`
4. `npm install`
5. `cp .env.example .env`
6. `php artisan migrate --seed`
7. `php artisan key:generate`
8. `php artisan app:user:role:add <role> <email>`, where <role> {confirmer, manager, admin}
9. `php artisan storage:link`
10. `php artisan serve`

## Contributing

Thank you for considering contributing to the SPA application!

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

