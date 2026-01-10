Laravel 12 + Vue 3 Project
Simple to do list

📋 Prerequisites

PHP 8.2 or higher

Composer 2.5 or higher

Node.js 20.x or higher (with npm)

MySQL 8.0 or higher

⚡ Quick Installation

1. Clone the Repository
   git clone https://github.com/bekamustdie/my-to-do-list1
   cd my-to-do-list1
2. Install Backend Dependencies
   composer install
3. Install Frontend Dependencies
   npm install
4. Configure Environment
   cd my-to-do-list/
   cp .env.example .env
   php artisan key:generate
5. Configure Database
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
6. Run Migrations and Seeders
   php artisan migrate --seed
   php artisan serve
7. Build Frontend Assets
   For development:
   open new terminal window
   cd my-to-do-list1/my-to-do-list-frontend/
   npm install
   npm run dev
