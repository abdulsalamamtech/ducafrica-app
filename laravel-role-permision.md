To implement the Laravel Permission package step by step, follow these instructions:

1. **Install the Package**: First, use Composer to install the `laravel-permission` package by running:
   ```
   composer require spatie/laravel-permission
   ```

2. **Publish the Configuration**: Next, publish the configuration file using the following command:
   ```
   php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
   ```

3. **Run Migrations**: Run the migrations that create the necessary tables for roles and permissions:
   ```
   php artisan migrate
   ```

4. **Set Up the Models**: Ensure your User model uses the `HasRoles` trait from the package:
   ```php
   use Spatie\Permission\Traits\HasRoles;

   class User extends Authenticatable
   {
       use HasRoles;
   }
   ```

5. **Define Roles and Permissions**: You can create roles and permissions in your database using:
   ```php
   use Spatie\Permission\Models\Role;
   use Spatie\Permission\Models\Permission;

   $role = Role::create(['name' => 'admin']);
   $permission = Permission::create(['name' => 'edit articles']);
   ```

6. **Assign Roles and Permissions**: Assign roles and permissions to users:
   ```php
   $user->assignRole('admin');
   $user->givePermissionTo('edit articles');
   ```

7. **Check for Roles and Permissions**: You can check if a user has a role or permission using:
   ```php
   if ($user->hasRole('admin')) {
       // User is an admin
   }
   if ($user->can('edit articles')) {
       // User can edit articles
   }
   ```

8. **Middleware**: Optionally, you can use middleware to restrict access based on roles or permissions in your routes:
   ```php
   Route::group(['middleware' => ['role:admin']], function () {
       // Admin routes
   });
   ```

Remember to double-check the official [Spatie Laravel-Permission documentation](https://spatie.be/docs/laravel-permission/v5/introduction) for the latest updates and additional features.