# Getting Started

## Using cli
To easily start and setup config.
```bash
php start.php
```

## Setup config manualy
You must have a `config.json` for store database credidentials and other configs.
You can use `config.exemple.json` file.\
**You must replace with your own credidential**
```json
{
    "database": {
        "name": "dbname", // database name
        "host": "127.0.0.1", // database host
        "port": 3306, // database post
        "user": "root", // database user
        "password": "" // database password
    }
}
```

## Run manualy
For run project **you must use the same hostname for serve a file and project**.
```bash
cd public/
php -S localhost:3000
```