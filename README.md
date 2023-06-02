# BookRater

Простой сайт на Bootstrap для оценивания книг.

Чтобы запустить сайт, необходимо сделать следующее:

- стянуть репозиторий
- зайти в папку проекта
- `composer install`
  - на бою `composer install --no-dev`
- `cp .env.example .env`
- `php artisan key:generate`
- внести изменения в .env:
  - `APP_DEBUG=true`
  - при необходимости поменять `APP_URL`
  - настроить ключи для БД
- `php artisan migrate --seed`
  - это только при разработке, на бою без `--seed`
- `npm install && npm run dev`
  - на бою `npm run build`
- открыть сайт в браузере

Чтобы запустить тесты:
`php artisan test`
