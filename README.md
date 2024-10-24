# Task Management System API

This is a simple RESTful API built with Lumen for managing tasks. The API supports basic CRUD (Create, Read, Update, Delete) operations and additional features such as filtering, pagination, and searching tasks.

## Requirements

- PHP >= 7.3
- Composer
- PostgreSQL
- Lumen

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/MarcusAfolabi/task-management-api.git
cd task-management-api
```

### 2. Install dependencies

```bash
composer install
```

### 3. Environment setup
Copy the .env.example file to create a .env file:

```bash
cp .env.example .env
```

## Configure your .env file to match your PostgreSQL setup:

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate the application key
Lumen does not generate an application key by default like Laravel, but you can add a key to the .env file (optional for this project).

```bash
APP_KEY=base64:generated_app_key
```

### 5. Run the migrations

```bash
php artisan migrate
```

#This will create the necessary database tables (like tasks).

### 6. Start the Lumen server

```bash
php -S localhost:8000 -t public
```

# The API will be accessible at 

```bash
http://localhost:8000
```

## API Endpoints
Here is a list of the available API endpoints:

# 1. Create a Task
- URL:  */api/task/create*
- Method: POST
- Description: Create a new task.

Request Body Example:

```json
{
    "title": "Finish project report",
    "description": "Complete the report for the API project",
    "due_date": "2024-10-24"
}
```

### 2. Get All Tasks

- URL: */api/tasks*
- Method: GET
- Description: Get all tasks.

### 3. Get a Specific Task
- URL: /api/tasks/{id}
- Method: GET
- Description: Get a task by its ID.

### 4. Update a Task
- URL: */api/tasks/update/{id}*
- Method: PUT
- Description: Update a task's details.

Request Body Example:

```json
{
    "title": "Update the project report",
    "description": "Update the report for the API project",
    "due_date": "2024-11-05"
}
```

### 5. Delete a Task
- URL: /api/tasks/delete/{id}
- Method: DELETE
- Description: Delete a task by its ID.

Testing the API
You can use Postman or cURL to test the API endpoints.

Example cURL Request to Create a Task

```bash
curl -X POST http://localhost:8000/api/tasks \
    -H "Content-Type: application/json" \
    -d '{
        "title": "Complete project documentation",
        "description": "Write complete documentation for the project",
        "due_date": "2024-10-25"
    }'
```

## Example Postman Request
# Open Postman.
Set the method to POST and URL to http://localhost:8000/api/tasks.
Set the body type to JSON and provide the task data.
Send the request and you should receive a 201 Created response.

## License
This project is licensed under the MIT License.

```vbnet
This task is implemented by Abiodun Afolabi. Thank you for the opportunity. Looking forward to grow your project better.
```
