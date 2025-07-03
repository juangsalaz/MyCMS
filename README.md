# 🚀 MyCMS CMS

This is a **MyCMS CMS** project powered by:
- **Laravel 12**
- **Livewire 3** for reactive components
- **Laravel Sail** for local Docker environment
- **Spatie Permission** for roles & permissions
- **Tailwind CSS & Alpine.js** for modern UI

---

## Live Demo
http://157.245.201.122:8001/login

| Role  | Email              | Password |
|-------|--------------------|----------|
| Admin | admin@gmail.com  | password |
| Editor| editor@gmail.com | password |

## 🛠 Installation

### 📥 Clone the repository
```bash
git clone git@github.com:juangsalaz/MyCMS.git
cd MyCMS
```

### 🚀 Start with Laravel Sail
Make sure you have Docker installed.

Install PHP dependencies:

```bash
composer install
Copy .env and generate app key:
```
```bash
cp .env.example .env
php artisan key:generate
```

Install Node modules (for Tailwind):
```bash
npm install
npm run dev
```

### 🐳 Start Sail containers
```bash
./vendor/bin/sail up -d
```

(You can create a shell alias for easier use.)

```bash
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

So next commands become simpler:
```bash
sail up -d
```

### 🗄️ Run migrations and seeders
```bash
sail artisan migrate

sail artisan db:seed --class=RolesAndPermissionsSeeder
sail artisan db:seed --class=CreateAdminAndEditorSeeder
```

Link storage for uploads:
```bash
sail artisan storage:link
```

### ⚙️ Environment setup
Your .env should have:
```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

## 🔥 Running
Start everything:
```bash
sail up -d
```

Then visit:
```bash
http://localhost
```

## 👤 Users Access

By default, the database seeder will create these users:

| Role  | Email              | Password |
|-------|--------------------|----------|
| Admin | admin@gmail.com  | password |
| Editor| editor@gmail.com | password |

## ✨ Features

- [x] Role-based access control with **Spatie Laravel Permission**
- [x] Manage **Posts**, **Pages**, **Categories**, and **Media**
- [x] JSON API for frontend use (Next.js, Nuxt, React, etc), this is the api documentation link (https://documenter.getpostman.com/view/3460037/2sB34bL4BH)
- [x] UI multi-language ready (`resources/lang`)
- [x] Built with **TALL stack** (Tailwind, Alpine, Livewire, Laravel)


