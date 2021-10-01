Installation

1.Step
Run docker compose to up containers on main folder.
    docker-compose up -d

2.Step
Run composer to get dependencies on app folder.
    docker run --rm --interactive --tty --volume $PWD/src:/app composer install
