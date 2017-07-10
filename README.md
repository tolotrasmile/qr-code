# qr-code
## Step 1
Install the composer dependencies

```
composer install
```

## Step 2
Add the database Mysql database with default configuration named "qr_prime".

## Step 3
Run the following command line to migrate database.

```
./vendor/bin/phinx migrate
```

If you want to add fake users, launch the seeder with

```
./vendor/bin/phinx seed:run
```