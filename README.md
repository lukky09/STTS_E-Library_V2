# 📚 STTS E-Library V2

**STTS E-Library V2** is a Laravel-based web application designed to manage and access digital library resources efficiently. Built with modern PHP practices, it offers a structured and scalable solution for educational institutions or personal use.

## 🧰 Tech Stack

- **Framework**: Laravel
- **Languages**: PHP
- **Database**: MySQL
- **Frontend**: Bootstrap
- **Tools**: Composer

## 📁 Project Structure
<pre>
    STTS_E-Library_V2/ 
    ├── app/             # Core application logic 
    ├── bootstrap/       # Laravel bootstrapping files 
    ├── config/          # Configuration files 
    ├── database/        # Migrations and seeders 
    ├── public/          # Public assets and entry point 
    ├── resources/       # Views and frontend assets 
    ├── routes/          # Web and API routes 
    ├── storage/         # Logs and compiled views 
    ├── tests/           # Unit and feature tests 
    ├── .env.example     # Environment configuration sample 
    ├── composer.json    # PHP dependencies 
    ├── package.json     # JS dependencies 
    └── README.md        # Project documentation
</pre>

## 🚀 Getting Started

1. **Clone the repository**:
   ```bash
   git clone https://github.com/lukky09/STTS_E-Library_V2.git
   cd STTS_E-Library_V2
2. Install dependencies:
    ```bash 
    composer install
    npm install
3. Set up environment:
- Copy .env.example to .env
- Configure your database settings
4. Run migrations:
   ```bash
   php artisan migrate
6. Serve the application:
   ```bash
   php artisan serve

## 🧪 Testing
Run tests using PHPUnit:
```bash
php artisan test
