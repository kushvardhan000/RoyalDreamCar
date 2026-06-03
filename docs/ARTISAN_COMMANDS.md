# Royal Dream Car - Artisan Commands

- Run migrations:

```bash
php artisan migrate
```

- Run seeders (after migrations):

```bash
php artisan db:seed
```

- To refresh and seed:

```bash
php artisan migrate:fresh --seed
```

- To create a new model + migration + factory quickly (example):

```bash
php artisan make:model Car -m -f -s
```

- To create controller:

```bash
php artisan make:controller Admin/DashboardController
```

- Note: Admin routes use `auth:admin` guard. Ensure `config/auth.php` contains the `admin` guard.
