SD2 manual step you MUST do (1 minute):

A) Register middleware alias "role"
- If you have app/Http/Kernel.php -> add:
    'role' => \App\Http\Middleware\RoleMiddleware::class,
  into $middlewareAliases

- If you do NOT have Kernel.php (Laravel 11/12) -> open bootstrap/app.php and add:
    $middleware->alias(['role' => \App\Http\Middleware\RoleMiddleware::class]);

B) When you can run the project locally:
    php artisan migrate
    php artisan db:seed

Seeded demo users:
- admin@example.com / password
- employee@example.com / password

Registration page creates "client" automatically.
