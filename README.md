# OS Laravel E-commerce

A robust e-commerce application built with Laravel 7, featuring a customer-facing storefront and a comprehensive admin dashboard for management.

## Features

### Frontend (Customer)
-   **Product Browsing**: Browse items by Brand and Category.
-   **Product Details**: View detailed information about products.
-   **Shopping Cart**: Manage items in the cart.
-   **Authentication**: User registration and login functionality.
-   **Promotions**: View current promotions.

### Backend (Admin)
-   **Dashboard**: Overview of system status.
-   **Resource Management**: CRUD (Create, Read, Update, Delete) operations for:
    -   Items
    -   Brands
    -   Categories
    -   Subcategories
-   **Role-Based Access Control**: Secure admin area protected by roles (using `spatie/laravel-permission`).

## Tech Stack

-   **Framework**: Laravel 7.x
-   **Language**: PHP >= 7.2.5
-   **Database**: MySQL
-   **Frontend**: Bootstrap 4, jQuery, Sass, Laravel Mix
-   **Permissions**: Spatie Laravel Permission

## Prerequisites

Ensure you have the following installed on your machine:
-   [PHP](https://www.php.net/) >= 7.2.5
-   [Composer](https://getcomposer.org/)
-   [Node.js & NPM](https://nodejs.org/)
-   [MySQL](https://www.mysql.com/)

## Installation

1.  **Clone the repository**
    ```bash
    git clone <repository-url>
    cd os_laravel
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Install Frontend dependencies**
    ```bash
    npm install
    npm run dev
    ```

4.  **Environment Configuration**
    Copy the example environment file and configure your database settings.
    ```bash
    cp .env.example .env
    ```
    Open `.env` and update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` to match your local MySQL setup.

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Run Migrations**
    Create the database tables.
    ```bash
    php artisan migrate
    ```

7.  **Seed the Database**
    It is recommended to seed the database with initial roles and data.
    
    *Note: You may need to uncomment the call to `RoleTableSeeder::class` in `database/seeds/DatabaseSeeder.php` or run it specifically:*
    
    ```bash
    php artisan db:seed --class=RoleTableSeeder
    ```
    
    To run all seeders (ensure they are uncommented in `DatabaseSeeder.php`):
    ```bash
    php artisan db:seed
    ```

## Usage

1.  **Start the development server**
    ```bash
    php artisan serve
    ```

2.  **Access the application**
    Open your browser and visit `http://127.0.0.1:8000`.

### Creating an Admin User

After registering a new user via the "Register" page, you can assign the **Admin** role to access the backend.

1.  Run Laravel Tinker:
    ```bash
    php artisan tinker
    ```

2.  Find your user (e.g., user with ID 1) and assign the role:
    ```php
    $user = App\User::find(1);
    $user->assignRole('Admin');
    exit
    ```

3.  You can now access the admin dashboard at `http://127.0.0.1:8000/dashboard`.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
