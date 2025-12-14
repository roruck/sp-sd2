# SD1 – Conference registration system (Laravel)

This ZIP contains **ready-made SD1 files** (routes, controllers, views, translations, assets).
Because the framework itself is large, you should first create a normal Laravel project, then copy these files into it.

## 1) Create a fresh Laravel project
On your computer:

```bash
# requires PHP + Composer
composer create-project laravel/laravel conference-system
cd conference-system
```

## 2) Copy files from this ZIP into your project root
Take everything inside **COPY_TO_LARAVEL_ROOT/** and copy it into your Laravel project folder.
Allow overwrite when asked (it will replace web.php, app.js, app.css, etc.).

## 3) Install NPM dependencies (Bootstrap + SweetAlert2)
```bash
npm install
npm install bootstrap sweetalert2
npm run dev
```

## 4) Run the project
```bash
php artisan serve
```

Open:
- Home: http://127.0.0.1:8000
- Client: http://127.0.0.1:8000/client/conferences
- Employee: http://127.0.0.1:8000/employee/conferences
- Admin: http://127.0.0.1:8000/admin

## 5) Change student info
Edit: **config/student.php**

## Notes (SD1)
- No database is used (data stored in session).
- All UI texts are in `resources/lang/*/app.php`.
- Bootstrap is used for design; SweetAlert2 is used for delete confirmation.


## Optional: set Lithuanian language
In your `.env` set:

```bash
APP_LOCALE=lt
```
