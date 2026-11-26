<h1 align="center">Twiclonee</h1>
<p align="center">
  <b>Twitter-like social web application</b><br/>
  Post tweets, reply, like and follow profiles in a dark-mode interface built with Laravel and Tailwind CSS.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Blade-templates-F05340?style=flat-square" />
  <img src="https://img.shields.io/badge/Tailwind-CSS-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-database-4479A1?style=flat-square&logo=mysql&logoColor=white" />
</p>

---

## Features

- Registration and authentication
- Post tweets
- Replies and likes
- User profiles
- Dark mode interface
- Automated lint and test workflows (GitHub Actions)

## Tech stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12 (MVC), PHP 8.2 |
| Frontend | Blade, Tailwind CSS, Vite |
| Database | MySQL |
| CI | GitHub Actions (`lint.yml`, `tests.yml`) |

## Getting started

```bash
git clone https://github.com/oiseaubleuc/twiclonee.git
cd twiclonee
composer install
npm install && npm run build
cp .env.example .env          # set database credentials
php artisan key:generate
php artisan migrate
php artisan serve             # http://localhost:8000
```

---

<p align="center">Built by <a href="https://github.com/oiseaubleuc">Hoho</a> · Belgium</p>
