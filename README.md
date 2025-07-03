# 🚀 Laravel Livewire CMS

This is a **Laravel CMS** project powered by:
- **Laravel 12**
- **Livewire 3** for reactive components
- **Laravel Sail** for local Docker environment
- **Spatie Permission** for roles & permissions
- **Tailwind CSS & Alpine.js** for modern UI

---

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

### 🔥 Running
Start everything:
```bash
sail up -d
```

Then visit:
```bash
http://localhost
```

### 👤 Admin Access

By default, the database seeder will create these users:

| Role  | Email              | Password |
|-------|--------------------|----------|
| Admin | admin@gmail.com  | password |
| Editor| editor@gmail.com | password |

### ✨ Features

- [x] Role-based access control with **Spatie Laravel Permission**
- [x] Manage **Posts**, **Pages**, **Categories**, and **Media**
- [x] JSON API for frontend use (Next.js, Nuxt, React, etc)
- [x] UI multi-language ready (`resources/lang`)
- [x] Reusable content blocks (Text, Image, Quote, etc)
- [x] Built with **TALL stack** (Tailwind, Alpine, Livewire, Laravel)


