# Task Manager

A simple project and task management system built with Laravel.

## Features

- Project CRUD (Create, Read, Update, Delete)
- Task CRUD with due dates, priority, and status
- Priority badges (High, Medium, Low)
- Status tracking (Todo, Pending, Done)
- Overdue tasks section
- Dashboard with stats

## Tech Stack

- Laravel 11
- Laravel Breeze (authentication)
- Tailwind CSS
- MySQL

## Setup Instructions

```bash
git clone https://github.com/Iliyakarimi020304/laravel-project-manager.git
cd your-repo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
