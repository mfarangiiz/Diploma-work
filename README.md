[//]: # (<h1 align="center">)

[//]: # (Docker practice project</h1>)

[//]: # ()
[//]: # ()
[//]: # (## start)

[//]: # ()
[//]: # (>requires  [PHP 8.1+]&#40;https://php.net/releases/&#41;)

[//]: # (> and [Composer]&#40;https://getcomposer.org/download/&#41;)

[//]: # ()
[//]: # (FIRST of all you can clone the project from here, [GitHub]&#40;https://github.com/&#41; :)

[//]: # ()
[//]: # (```)

[//]: # (https://github.com/YFayzulla/Docker-practice)

[//]: # (php ar)

[//]: # (```)

[//]: # (<hr>)

[//]: # ()
[//]: # (these code on bash)

[//]: # (...)

[//]: # (cd Docker-practice)

[//]: # (...)

[//]: # ()
[//]: # (```)

[//]: # (cp .env.example .env)

[//]: # (```)

[//]: # ()
[//]: # (<p> start containes </p>)

[//]: # ()
[//]: # (```)

[//]: # (docker compose up -d)

[//]: # (```)

[//]: # ()
[//]: # (<p> Migrations and Seed Database </p>)

[//]: # ()
[//]: # (```)

[//]: # (docker compose exec app php artisan migrate --seed)

[//]: # (```)

[//]: # ()
[//]: # (<p> Generate Application Key </p>)

[//]: # ()
[//]: # (```)

[//]: # (docker compose exec app php artisan key:generate)

[//]: # (```)

[//]: # (<p>Access the Application http://localhost </p>)

[//]: # ()
[//]: # (```)

[//]: # (docker compose logs -f)

[//]: # (```)
