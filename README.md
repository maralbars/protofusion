# My test task

## How to run project?

### Requirements
* You have to install Docker

### Commands
```
# Copy .env file
cp .env.example .env

# Build docker containers
docker-compose up -d --build

# Launch command line
docker exec -it protofusion-app bash

# Install all composer and npm dependencies
composer i && npm i

# Compile styles and javascript code
npm run prod

# Create required tables
php artisan migrate

# Add 10 new contacts by default
php artisan make:contacts

# Or choose the number of contacts you need, 100, for instance
php artisan make:contacts 100

```

Open page http://localhost:8080

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).