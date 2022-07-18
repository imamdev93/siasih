<p align="center"><h2>SISTEM INFORMASI AKADEMIK SD SRI ASIH</h2></p>

## Cara Instalasi

- git clone `https://github.com/imamdev93/siasih.git` atau `git@github.com:imamdev93/siasih.git` (jika menggunakan ssh)
- masuk ke root direktori
- run `composer install`
- run `cp .env-example .env`
- open file `.env`
- konfigurasi database
    1. DB_HOST=127.0.0.1
    2. DB_PORT=3306
    3. DB_DATABASE=(sesuaikan dengan database di local)
    4. DB_USERNAME=(sesuaikan dengan username di local)
    5. DB_PASSWORD=(sesuaikan dengan password di local)
- run `php artisan generate:key`
- run `php artisan migrate --seed`
- run `php artisan serve`
- klik <a href='http://localhost:8000'>http://localhost:8000</a>