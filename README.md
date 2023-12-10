# Laravel Task Management App

This is a basic Laravel web application designed for task management. It provides a simple way to manage and organize tasks effectively.

## Features

-   **Task Creation:** Create new tasks with a title, description, and due date.
-   **Task Listing:** View a list of all tasks with their details.
-   **Reorder tasks:** You can Reorder tasks with drag and drop.
-   **Task Editing:** Edit existing tasks to update information.
-   **Task Deletion:** Remove tasks that are no longer needed.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/dkbera01/task-management.git

    ```

2. Navigate to the project directory:

    ```bash
    cd task-management

    ```

3. Install dependencies using Composer:

    ```bash
    composer install

    npm install

    ```

4. Copy the .env.example file to .env and configure your database connection.

5. Run database migrations and seed the database:

    ```bash
    php artisan migrate --seed

    ```

6. Generate the application key:

    ```bash
    php artisan key:generate

    ```

7. Serve the Laravel application:

    ```bash
    php artisan serve

    ```

8. Serve the Vite:
    ```bash
    npm run dev
    ```

The application will be available at http://127.0.0.1:8000.

Usage
Open the application in your web browser.
Register a new account or log in with existing credentials.
Navigate to the task management section.
Create, edit, or delete tasks as needed.
