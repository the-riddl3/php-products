## Product CRUD

requirements:
- at least PHP-7.4 with pdo-mysql extension
- Composer
- MySQL

How to run it:
- copy .env.example to .env and change the appropriate variables to represent your MySQL instance
- run `php database/migrationcs/migrate.php` or manually create the necessary tables
- run the application server:
  - either using PHP's built-in web server `cd public_html && php -S index.php`
  - or Apache/Nginx with an appropriate configuration to route all requests to `public_html/index.php`