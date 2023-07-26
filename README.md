# Laravel Basic CRUD API for Users

This is a simple CRUD (Create, Read, Update, Delete) API built using Laravel to manage user data.

## Setup

1. Clone the repository.
2. Install dependencies using Composer: `composer install`.
3. Migrate the database: `php artisan migrate`.
4. Seed the database with sample data (optional): `php artisan db:seed`.
5. Run the development server: `php artisan serve`.

## Endpoints

    ## Get the 3 most used domains in user emails

    This API endpoint returns the three most frequently used domains in user emails, along with the count of each domain, in descending order.

    - **URL**: `http://127.0.0.1:8000/api/mostUsedDomains`

    - **HTTP Method**: GET

    - **Input Parameters**: None

    - **Response**:

    ```json
    [
        {
            "domain": "gmail.com",
            "count": 15
        },
        {
            "domain": "yahoo.com",
            "count": 10
        },
        {
            "domain": "hotmail.com",
            "count": 8
        }
    ]


### List Users

Get a list of all users.

GET http://127.0.0.1:8000/api/users

### Get a Single User

Get a single user by ID.

GET http://127.0.0.1:8000/api/users/{id}

### Create a User

Create a new user.

POST http://127.0.0.1:8000/api/users

Request Body:
{
    "name": "Oscar Buitrago",
    "email": "oscar@gmail.com",
    "password": "123456"
}

### Update a User

Update an existing user by ID.

PUT http://127.0.0.1:8000/api/users/{id}

Request Body:
{
    "name": "Hector Buitrago",
    "email": "hector@gmail.com",
    "password": "123456"
}

### Delete a User

Delete an existing user by ID.

DELETE http://127.0.0.1:8000/api/users/{id}

## Testing API Requests

You can test the API requests using tools like Postman:

1. Open Postman and create a new request.
2. Set the HTTP method and URL according to the desired API endpoint (e.g., `GET http://127.0.0.1:8000/api/users`).
3. If required, add request headers (e.g., API token for authentication).
4. For POST and PUT requests, add the request body in JSON format.
5. Click on "Send" to make the request and see the response.

## Contributing

Feel free to contribute to this project by creating issues or submitting pull requests. All feedback and contributions are welcome!


