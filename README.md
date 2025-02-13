# Quiz Competition App 🎯

A web-based quiz competition platform built with Laravel. This application allows users to participate in quizzes, track scores, and compete in a fair and engaging environment.

## 🚀 Features

- User Authentication (Login/Register)
- Admin Dashboard for Managing Quizzes
- Create, Edit, and Delete Quiz Questions
- Timed Quizzes
- Score Calculation & Leaderboard
- Multi-Category Quizzes
- Responsive UI

## 🛠️ Installation

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/your-username/quiz-competition-app.git
cd quiz-competition-app
```

### 2️⃣ Install Dependencies
```bash
composer install
npm install
```

### 3️⃣ Set Up Environment
Copy `.env.example` to `.env` and configure your database settings:
```bash
cp .env.example .env
```

Generate the application key:
```bash
php artisan key:generate
```

### 4️⃣ Run Database Migrations & Seeding
```bash
php artisan migrate --seed
```

### 5️⃣ Serve the Application
```bash
php artisan serve
```
Now, visit `http://127.0.0.1:8000` in your browser.

## 📸 Screenshots
(Add some screenshots here if available)

## 🛡️ Security
If you discover any security vulnerabilities, please open an issue or contact the developer.

## 📜 License
This project is open-source and available under the MIT License.

