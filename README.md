## Requirements

PHP 7.2 or later  
MySQL 5.7 or later

## Installation

Run

```bash
git clone git@github.com:vegatheantler/abry-app-tenten.git
```

CD into the directory

```bash
cd abry-app-tenten
```

Install dependencies

```bash
composer install
```

Install NPM dependencies

```bash
npm i
```

Copy default configuration file

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Generate JWT key

```bash
php artisan jwt:secret
```

Give appropriate write permissions to `storage` directory:

```bash
sudo chgrp -R www-data storage
sudo chmod -R ug+rwx storage
```

Build assets

```bash
npm run watch #for dev
npm run prod #for production
```

Run migrations

```bash
php artisan migrate
```

Run seeder

```bash
php artisan db:seed #note, db:seed is truncating all tables and should only be run once in production.
```

### Known bugs

- Updating an existing rich message removes its previous images.

### Todo

- Duplicate message template
- Video Messages
- Refactoring
- Auth
