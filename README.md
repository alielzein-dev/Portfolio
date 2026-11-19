# Ali El Zein — Portfolio

My personal portfolio: a one-page site built with Laravel, Blade, Tailwind CSS and plain JavaScript.

It shows the services I offer, a short about section, two projects I built (LiftOps, a bus fleet and operations system, and Solartion, a service platform for a solar company) and how to contact me.

## Run it locally

Requires PHP 8.3+, Composer and Node.js.

```sh
composer install
cp .env.example .env
php artisan key:generate
npm install
composer run dev
```

Then open http://127.0.0.1:8000.

## Editing the content

All text, links and projects live in `config/portfolio.php`, so the page can be updated without touching the templates. Images go in `public/images/`.

## Tests

```sh
php artisan test
```
