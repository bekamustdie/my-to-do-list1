📝 Laravel 12 + Vue 3 - Todo List Application
Simple to do list

✨ Features
✅ Create, read, update, and delete tasks
📱 Fully responsive design
⚡ Real-time updates with Vue 3
🎨 Clean and modern UI
🔄 RESTful API backend
📊 Task filtering and sorting

📋 Prerequisites
🛠️ Required Software
PHP 8.2 or higher

Composer 2.5 or higher

Node.js 20.x or higher (with npm)

MySQL 8.0 or higher

🔍 Verification Commands
bash
php --version # Should show PHP 8.2+
composer --version # Should show Composer 2.5+
node --version # Should show Node 20.x+
mysql --version # Should show MySQL 8.0+
⚡ Quick Installation
1️⃣ Clone the Repository
bash
git clone https://github.com/bekamustdie/my-to-do-list1
cd my-to-do-list1
2️⃣ Install Backend Dependencies
bash
composer install
3️⃣ Install Frontend Dependencies
bash
npm install
4️⃣ Configure Environment
bash
cd my-to-do-list/
cp .env.example .env
php artisan key:generate
5️⃣ Configure Database
Edit the .env file and update database credentials:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=root
DB_PASSWORD=your_password_here
6️⃣ Run Migrations and Start Backend
bash
php artisan migrate --seed
php artisan serve
7️⃣ Start Frontend Development Server
📌 Open a new terminal window and run:

bash
cd my-to-do-list1/my-to-do-list-frontend/
npm install
npm run dev
🌐 Access the Application
🔧 Backend (Laravel API)
URL: http://localhost:8000
Port: 8000
Type: API Server

🎨 Frontend (Vue Interface)
URL: http://localhost:5173
Port: 5173
Type: Web Interface

🏗️ Project Structure
text
my-to-do-list1/
├── 📁 my-to-do-list/ # Laravel Backend
│ ├── 📁 app/ # Application logic
│ ├── 📁 database/ # Migrations & seeders
│ ├── 📁 routes/ # API routes
│ └── 📄 .env # Configuration
│
└── 📁 my-to-do-list-frontend/ # Vue 3 Frontend
├── 📁 src/ # Source code
├── 📁 public/ # Static files
└── 📄 package.json # Dependencies
🛠️ Available Commands
⚙️ Backend (Laravel)
bash
php artisan migrate # Run migrations
php artisan migrate:rollback # Rollback migrations
php artisan db:seed # Seed database
php artisan cache:clear # Clear cache
php artisan route:list # List all routes
🎨 Frontend (Vue)
bash
npm run dev # Start development server
npm run build # Build for production
npm run preview # Preview production build
npm run lint # Lint code
🔧 Common Configuration Issues
🔐 Database Connection
If you get database errors:

bash

# Create database manually

mysql -u root -p
CREATE DATABASE todo_app;
exit

# Then run migrations

php artisan migrate
🚫 Port Already in Use
If port 8000 or 5173 is busy:

bash

# For Laravel (different port)

php artisan serve --port=8001

# For Vue (update vite.config.js)

# Change server.port to 5174

📱 Testing the Application
🧪 Test API Endpoints
bash

# Get all tasks

curl http://localhost:8000/api/tasks

# Create new task

curl -X POST http://localhost:8000/api/tasks \
 -H "Content-Type: application/json" \
 -d '{"title":"Buy groceries","description":"Milk, Eggs, Bread"}'
🖥️ Open in Browser
Frontend: Open http://localhost:5173

Backend API: Open http://localhost:8000/api/tasks

🚨 Troubleshooting
Problem Solution
Composer errors Run composer clear-cache then composer install
npm install fails Run npm cache clean --force then npm install
Database connection Check MySQL is running and credentials in .env
Port conflicts Change ports in .env and vite.config.js
🤝 Contributing
🍴 Fork the repository

🌿 Create feature branch: git checkout -b feature/AmazingFeature

💾 Commit changes: git commit -m 'Add AmazingFeature'

📤 Push to branch: git push origin feature/AmazingFeature

🔄 Open Pull Request

📄 License
📝 MIT License - see LICENSE file for details

👤 Author
@bekamustdie
🔗 GitHub: https://github.com/bekamustdie
🚀 Project: My Todo List

🙏 Acknowledgments
🎨 Laravel Team - For the amazing PHP framework

⚡ Vue.js Team - For the progressive JavaScript framework

🔧 Vite - For the next-gen frontend tooling

<div align="center">
🎯 Ready to Start?
bash
# One-line setup (if all prerequisites are installed)
git clone https://github.com/bekamustdie/my-to-do-list1 && cd my-to-do-list1 && composer install && npm install && cd my-to-do-list && cp .env.example .env && php artisan key:generate
✨ Happy Coding! May your todos always be completed! ✨

</div>
📅 Last Updated: January 2024
🏷️ Version: 1.0.0
🔧 Status: Active Development
