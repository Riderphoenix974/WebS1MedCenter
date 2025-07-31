# MedCenter

This project is a small PHP application that demonstrates a lightweight MVC framework.  It allows members to sign up, log in and manage a personal profile.

## Requirements

- PHP 5.4 or newer (required for the PHP built in web server)
- `mysqli` extension enabled for database access
- A MySQL server with a database called `MedCenter`

## Database configuration

Database credentials are defined in `model/config.php`:

```php
<?php
define('DSN', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'MedCenter');

$bdd = mysqli_connect('localhost','root','root','MedCenter');
```

Update these values to match your local setup.  The database must contain at least a `member` table as referenced by the application.  Create the `MedCenter` database and required tables before running the site.

## Running the application

From the repository root start the PHP built in server:

```bash
php -S localhost:8000
```

Then open `http://localhost:8000/` in your browser.

## Login and signup

A login form is displayed in the header of every page and posts to `/Members/signIn`:

```html
<form action="/Members/signIn"  method="post" id="login-form">
```

A signup form is available at `/members/signup` and posts to `/Members/signUp`:

```html
<form action="/Members/signUp" method="post">
```

After signing in you are redirected to your profile at `/members/`.
