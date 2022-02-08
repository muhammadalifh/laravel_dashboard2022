## Cara Clone Project

1. `git clone https://github.com/muhammadalifh/laravel_dashboard2022`

2. `composer install`

3. `cp .env.example .env` (Jangan lupa untuk mengganti nama database di file .env)

4. `php artisan key:generate`

5. `php artisan migrate`

untuk menjalankan data seeder lakukan command berikut :

    php artisan db:seed --class=CreateUserSeeder

    php artisan db:seed --class=CreatePegawaiSeeder

| Role | Keterangan |
| ----------- | ----------- |
| 0 | Owner |
| 1  | Admin |
| 2  | Super Admin |
