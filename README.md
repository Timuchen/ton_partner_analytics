

![Screenshot](screenshots/sc1.png)

## Installation

To install tonto.space, you'll want to clone or download this repo:

```
git clone https://github.com/Timuchen/ton_partner_analytics.git project_name
```

Next, we can install tonto.space with these **4 simple steps**:

### 1. Create a New Database

During the installation we need to use a MySQL database. You will need to create a new database and save the credentials for the next step.

### 2. Copy the `.env.example` file

We need to specify our Environment variables for our application. You will see a file named `.env.example`, you will need to duplicate that file and rename it to `.env`.

Then, open up the `.env` file and update your *DB_DATABASE*, *DB_USERNAME*, and *DB_PASSWORD* in the appropriate fields. You will also want to update the *APP_URL* to the URL of your application.

```bash
APP_URL=http://tonto.space.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tonto
DB_USERNAME=root
DB_PASSWORD=
```


### 3. Add Composer Dependencies

Next, we will need to install all our composer dependencies by running the following command:

```php
composer install
```
### 4. Run Migrations and Seeds

We need to migrate our database structure into our database, which we can do by running:

```php
php artisan migrate
```
<br>
Finally, we will need to seed our database with the following command:

```php
php artisan db:seed
```
<br>

🎉 And that's it! You will now be able to visit your URL and see your tonto.space application up and running.

<p align="center"><a href="https://tonto.space" target="_blank"><img src="https://tonto.space/storage/themes/July2021/N0DajUTtUzzhqXJzZwO1.png" width="140"></a>
<br>tonto.space
</p>