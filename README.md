# Aplikasi Klinik

Aplikasi Klinik ini dikembangkan untuk keperluan Mata Kuliah Bimbingan karir|| Universitas Dian Nuswantoro. 

Aplikasi ini memiliki 3 role:

1. **admin**
    - Bisa mengakses semua fitur
2. **operator**
    - Hanya Fitur administrasi
3. **dokter**
    - Operator dapat melakukan input administrasi.
    - Dokter dapat menginput data hasil diagnosa pasien.

## Cara Penggunaan

1. **Clone atau Download Repository:**

    ```bash
    git clone https://github.com/yaasin36/BK-WD.git
    ```

2. **Buka Project dengan VSCode lalu Rename File `.env.example` menjadi `.env` (jika dilinux):**

    ```bash
    mv .env.example .env
    ```

3. **Konfigurasi Database:**

    - Buka file `.env` dan konfigurasi nama database sesuai kebutuhan:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nama_database
        DB_USERNAME=nama_pengguna_database
        DB_PASSWORD=kata_sandi_database
        ```

4. **Install Dependencies:**

    ```bash
    composer install
    ```

5. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```


6. **Run Database Migrations:**

    ```bash
    php artisan migrate
    ```

7. **Seed Database:**

    ```bash
    php artisan db:seed
    ```

8. **Run Artisan Serve:**

    ```bash
    php artisan serve
    ```

10. **Buat akun Admin melalui database(PhpMyAdmin):**

