<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<!--
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p> -->

# Laravel Task Management App

This is a basic Laravel web application designed for task management. It provides a simple way to manage and organize tasks effectively.

## Features

- **Task Creation:** Create new tasks with a title, description, and due date.
- **Task Listing:** View a list of all tasks with their details.
- **Reorder tasks:** You can Reorder tasks with drag and drop.
- **Task Editing:** Edit existing tasks to update information.
- **Task Deletion:** Remove tasks that are no longer needed.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/dkbera01/task-management.git

2. Navigate to the project directory:
    ```bash
   cd task-management

3. Install dependencies using Composer:
    ```bash
   composer install

   npm install

4. Copy the .env.example file to .env and configure your database connection.

5. Run database migrations and seed the database:
    ```bash
   php artisan migrate --seed

6. Generate the application key:
    ```bash
   php artisan key:generate

7. Serve the Laravel application:
    ```bash
   php artisan serve

8. Serve the Vite:
    ```bash
   npm run dev
