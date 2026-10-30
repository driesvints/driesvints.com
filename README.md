# driesvints.com

<a href="https://github.com/driesvints/driesvints.com/actions?query=workflow%3ATests">
    <img src="https://github.com/driesvints/driesvints.com/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://github.com/driesvints/driesvints.com/actions/workflows/coding-standards.yml">
    <img src="https://github.com/driesvints/driesvints.com/actions/workflows/coding-standards.yml/badge.svg" alt="Coding Standards" />
</a>

The source code for my personal website.

Visit it at [https://driesvints.com](https://driesvints.com)

## Requirements

The following tools are required in order to start the installation.

- PHP 8.4
- [Composer](https://getcomposer.org/download/)
- [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)

## Installation

1. Clone this repository locally with `git clone git@github.com:driesvints/driesvints.com.git driesvints.com`
2. Setup a local database called `driesvints`
3. Copy the `.env.example` file to `.env` and fill in the database credentials
4. Install the PHP dependencies with `composer install` 
5. Generate a new app key with `php artisan key:generate`
6. Prepare the database by running `php artisan migrate --seed` 
7. Install and compile the front-end dependencies with `npm install && npm run dev`
8. Serve the website locally by running `php artisan serve`

You can now visit the app in your browser by visiting [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Amp Orbs

Amp runs `.agents/setup` when preparing an orb snapshot. It installs PHP 8.4,
Composer, Node 22.23.4, and the locked PHP and JavaScript dependencies, then builds
production assets. New orbs reuse the prepared snapshot instead of repeating setup.

Setup creates `.env` only when missing and generates an app key only when empty.
The default orb environment uses a local SQLite database with sample users and
posts; rerunning setup preserves existing data. Tests use a separate in-memory
SQLite database. No external credentials, MySQL, or Redis are required.

`.agents/resume` does not reinstall dependencies or start services: SQLite,
file-based sessions/cache, and synchronous queues require no background daemons.
Use `php artisan test` to run the tests. To preview the site in an orb, start
`php artisan serve --host=0.0.0.0 --port=8000` with `amp orb service start` and
its `--portal` option.

## Commands

Command | Description
--- | ---
**`php artisan test`** | Run the tests
`php artisan migrate:fresh --seed` | Reset the database
`npm run watch` | Watch for changes in CSS and JS files
