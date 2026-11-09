# Barangay Bulletin - Purok Pilapil

An online announcement board for Barangay Matina Crossing in Davao City built with Laravel 12, Eloquent ORM, SQLite, and Tailwind CSS.

## Project Details & Personalization

- **Site Title:** Barangay Bulletin - Purok Pilapil
- **Posts Per Page:** 7 
- **Custom Category:** Youth & Sports
- **Pinned Post Title & Date:** Purok Pilapil Clean-up Drive (September 23, 2026)
- **Hand-crafted Author:** Kagawad Benz Pilapil (`kagawad.pilapil@bulletin.test`)

## Setup & Running Instructions

Follow these steps to clone, configure, and run the project locally.

### 1. Prerequisites
Ensure you have the following installed on your machine:
- PHP >= 8.2
- Composer
- Node.js & npm

### 2. Installation Steps

Clone the repository and navigate into the directory:
```bash
git clone https://github.com/brdpilapil/LabActivity10-Pilapil.git
cd LabActivity10-Pilapil
```

Install PHP dependencies:
```bash
composer install
```

Install Node dependencies:
```bash
npm install
```

Set up your environment configuration file:
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Setup & Seeding

Create the SQLite database file if it does not already exist:
```bash
# On macOS / Linux / Git Bash:
touch database/database.sqlite

# On Windows PowerShell:
New-Item database/database.sqlite
```

Run database migrations and seeders:
```bash
php artisan migrate:fresh --seed
```

### 4. Running the Application

Start the Vite development server (Terminal 1):
```bash
npm run dev
```

Start the Laravel local development server (Terminal 2):
```bash
php artisan serve
```

Open your browser and navigate to `http://127.0.0.1:8000/posts` to access the bulletin board.

## Verification & Screenshots

- Screenshot of Eloquent `find()` and `save()` operations executed in Laravel Tinker is saved in `docs/tinker.png`.

To test inside Tinker:
```bash
php artisan tinker
```
```php
$post = App\Models\Post::find(1);
$post->title = 'Purok Pilapil: Clean-up Drive Updated';
$post->save();
App\Models\Post::find(1)->title;
```
