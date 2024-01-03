# My project
> My project description !

## Requirements
- php 8.x
- Mysql 8.x
- Mysql PDO driver activated on your `php.ini`
- Apache server

## Getting started
You can found a [getting started here](./getting-started.md)

## Run project
Please refer to [getting started](./getting-started.md#run)

## References
> References of base core class

### Config
You can view an config example [here](./config.exemple.json)

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

### Add Not Found Page
For configure `Not Found` page.
On `Config/routes.json` you can add `notfound` field.
You must provide a valid path to your notfound without .php extension.
_Path start at View_.

### Serve a local file
For serve a local file into your view.
You can use `RessourceManager` core class.
It is available on all request even on _not found_ view.

### Get Request informations
You can refer to `Request` core class properties.

### Return a custom response
If you want return a reponse without render a view.
You can use `Response` core class for update your response content-type for example.
If you want additional informations you can read `Response` public method.

### Add route
To add a route, you must add `Route` core class as attribute on a controller method.

```php
// ...rest of your controller methods

#[Route("/", "GET")]
function myMethod(Request $request, Response $response) {
    // your code here
}
```