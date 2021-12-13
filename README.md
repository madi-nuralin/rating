## Installation

1. `git clone https://github.com/madi-nuralin/rating.git`
2. `cd rating`
3. `composer install`
4. `npm install`
5. `npm run dev`
6. `cp .env.example .env`
6. `php artisan migrate --seed`
8. `php artisan key:generate`
9. `php artisan app:user:role:add <role> <email>`, (where roles: confirmer, manager, admin)
10. `php artisan storage:link`
11. `php artisan serve`
