### For local dev

1) `php artisan key:generate --ansi` <br><br>

2) Make directory for docker: <br>
   `mkdir ./storage/docker` <br>

3) Copy .env.example <br>
   `cp .env.example .env` <br>

4) Add host user to .env <br>
   `echo UID=$(id -u) >> .env` <br>
   `echo GID=$(id -g) >> .env` <br>

5) Run services docker <br>
   `docker-compose up -d --build` <br>

6) Install breeze <br>
   `composer require laravel/breeze` <br>

7) Install vue <br>
   `docker exec php-app php artisan breeze:install vue` <br>

8) Install eslint, prettier <br>
   `npm install --save-dev @rushstack/eslint-patch` <br>
   `npm install --save-dev @vue/eslint-config-prettier` <br>
   `npm install --save-dev eslint` <br>
   `npm install --save-dev eslint-plugin-vue` <br>
   `npm install --save-dev prettier` <br>

9) `npm run lint` <br>

10) Install npm dependencies <br>
    `npm install` <br>
    `npm run dev` <br>

11) Migrate Laravel <br>
    `docker exec php-app php artisan migrate`<br>
    `docker exec php-app php artisan migrate:rollback`<br>
    `docker exec php-app php artisan migrate` <br>

12) Create Models, Migrations, Controllers, Factory <br>
    `docker exec php-app php artisan make:model Department -mcrf` <br>
    `docker exec php-app php artisan make:model Employee -mcrf` <br>

13) Install npm dependencies <br>
    `npm i @fortawesome/fontawesome-free sweetalert2 @ocrv/vue-tailwind-pagination vue-chartjs chart.js  datatables.net-vue3 datatables.net datatables.net-responsive-dt datatables.net-buttons jszip pdfmake` <br>

14) Migrate and Seed <br>
    `docker exec php-app php artisan migrate --seed` <br>
