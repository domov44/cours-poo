Commencer un nouveau model :
```php
php artisan make:model Article
```

Commencer une migration d'une table :
```php
php artisan make:migration articles
```

Ecrire un nouveau seeder
```php
php artisan make:seeder ArticlesSeeder   
```

Excuter un seeder : 
```php
php artisan db:seed --class=ArticlesSeeder
```

Envoyer la nouvelle migration sans écraser les tables
```php
php artisan migrate
```

Envoyer la nouvelle migration et écraser les tables
```php
php artisan migrate:fresh
```