## Cara Clone Project

1. `git clone https://github.com/muhammadalifh/laravel_dashboard2022`

2. `composer install`

3. `cp .env.example .env` (Jangan lupa untuk mengganti nama database di file .env)

4. `php artisan key:generate`

5. `php artisan migrate`


command Singkatnya :

    php artisan db:seed --class=DatabaseSeeder

***note : Jika sudah menjalankan command ini tidak perlu menjalankan command di bawahnya***


untuk menjalankan data seeder lakukan command berikut :

    php artisan db:seed --class=CreateUserSeeder

    php artisan db:seed --class=CreatePegawaiSeeder

    php artisan db:seed --class=CreateJenisSeeder

    php artisan db:seed --class=CreateStatusSeeder

    php artisan db:seed --class=CreateKlienSeeder

    php artisan db:seed --class=CreateTeknologiSeeder

    php artisan db:seed --class=CreatePortofolioSeeder

| Role | Keterangan |
| ----------- | ----------- |
| 0 | Owner |
| 1  | Admin |
| 2  | Super Admin |
