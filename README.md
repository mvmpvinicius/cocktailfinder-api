# COCKTAIL FINDER

## Installation

1. Git clone the project
2. Run "composer install" to install all its dependencies
3. Copy .env.example to a new file called .env and set the following: API_COCKTAIL_URL
4. Run "php artisan key:generate" in the console
5. Run the project "php artisan serve" in the root directory to run locally your project or use docker/laradock to spin up the project containers.

## Endpoints

### GET /api/cocktails
- Get cocktails by text
- Parameters:
> params : String to be searched for
- Examples:
```
> http://127.0.0.1:8000/api/cocktails
```

### GET /api/ingredients
- Get ingredients by text
- Parameters:
> params : String to be searched for
- Examples:
```
> http://127.0.0.1:8000/api/ingredients
```

## NOTES

1. This project must be ran alongside with cocktailfinder-frontend.
2. Certify the appliation can find API URL. It must be set in the frontend application config file.
