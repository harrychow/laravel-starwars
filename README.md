# Laravel Assessment

### Instructions
1. Create a new repository in your Github account using the provided application zip.
2. Establish an initial commit with the provided code.
3. Complete the functional requirements below & commit these changes to your repository. Open a PR with your changes so that they can be reviewed.
4. Share your repository with us.


### Setup

#### System Requirements

-   Docker Desktop
-   WSL2 (Windows only)

Install the dependencies.

```bash
docker run --rm -v "$(pwd)":/app -u 1000:1000 -e COMPOSER_HOME=/tmp --workdir /app bitnami/laravel composer install
docker run --rm -v "$(pwd)":/app -u 1000:1000 -e COMPOSER_HOME=/tmp --workdir /app bitnami/laravel npm install
```

Lastly create a `.env` file.

```bash
cp .env.example .env
```

### Running the application

Start the application using Docker Compose.

```bash
docker compose up
```

You should now be able to access the application at `http://localhost`.

You can stop the application with `Ctrl+C` and then run `docker compose down` to remove the containers.

### Artisan commands

All `artisan` commands can be run with `docker run --rm -v "$(pwd)":/app -u 1000:1000 -e COMPOSER_HOME=/tmp --workdir /app bitnami/laravel php artisan <command>`

### Requirements

The application should:

-   Seed a database with at least 5 actors and at least 3 movies per actor
-   Use Eloquent to define the relationship between actors and movies
-   Have a view that displays the list of actors and their associated movies
-   Also include one input that allows the list of actors to be filtered. This can either be done with just PHP or with JavaScript, whichever you prefer. We're just looking for the end result.
-   Have a view with one input that allows the user to search people via the Star Wars API (https://swapi.dev/documentation#people) and then displays the data.
    -   The API call should be done on the back end.
