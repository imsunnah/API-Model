# Api Development Model

This project is a RESTful API development kit using **Laravel** to help with your api development process and manage**users**, **roles**, and **permissions** with secure authentication via **Laravel Passport**. It is designed with scalable architecture and the **Repository Pattern** for maintainable and testable code.

## Table of Contents
- [Technologies used](#technologies-used)
- [How to Run the Application Locally](#how-to-run-the-application-locally)
- [Application Process Flow](#application-process-flow)
- [API Endpoints](#api-endpoints)
- [Postman Collection](#postman-collection)

## Features
- PHP "^8.2"
- Laravel "^11.31"
- Laravel Passport "^12.0"
- Laravel Sanctum "^4.0"
- Laravel Telescope "^5.3" - [Laravel Telescope](https://laravel.com/docs/telescope)
- Laravel Predis "2.0"
- Laravel Api Toolkit (Package) "^2.1" [API Toolkit](https://laravelapitoolkit.com/)
- Laravel Scramble (Package) "^0.12.2" [Scramble Docs](https://scramble.dedoc.co/)
- MySQL

## How to Run the Application Locally

Follow the steps below to set up and run the application on your local machine.

### 1. Clone the Repository
First, clone the repository to your local machine:

### 2. Install Dependencies
Install the necessary PHP dependencies using Composer:

```
composer install
```

### 3. Set Up Environment
Copy the `.env.example` file to `.env`:

### 4. Configure Database
Open the `.env` file and configure your database connection settings:

```
[ Note: Use your database configuration. ]
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api_dev_model 
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrate Database
```
php artisan migrate
```

### 6. Seed the Database
[ Note: While seeding the database, you should change the admin credentials for the default admin user. You can find the credentials in the \database\seeders\DatabaseSeeder.php file. ]

```
php artisan db:seed
```

### 7. Generate Application Key
Generate the application key by running:

```
php artisan key:generate
```

### 8. Run the Redis Server Application
Run the redis-server command to start the Redis server:

```
redis-server
```

### 8. Generate passport key for Application

```
php artisan passport:client --personal
 What should we name the personal access client? [Laravel Personal Access Client]:
 > sunnah
 ```

### 9. Run the Application

```
php artisan serve
```


## Application Process Flow

The applications process flow can be defined as two parts. There is an admin panel in the backend to maintain user authentication and role permission. There are some great additional features that are added to the backend admin panel.

### Admin panel
To login to the admin panel. There is a default admin credentials given using which you can access the admin panel.

Credentials:
- Username: `admin@atilimited.net`
- Password: `admin123456`

[ Note: The admin panel is not secured. You can change the admin credentials before you seed the database. You can find the credentials in the \database\seeders\DatabaseSeeder.php file path. ]

### 1. User section
In the user section you can register a new user and edit the existing users.

### 2. Role section
In the role section you can create new roles and edit the existing roles.

### 3. Permission section
In the permission section you can create new permissions and edit the existing permissions.

### 4. Role and Permission assignment
In the role and permission assignment section you can assign roles and permissions to users.

### 5. Telescope
Telescope is a tool that provides a dashboard for monitoring and debugging your Laravel applications. It provides insights into the performance of your application, including database queries, cache hits, and more. You can access the Telescope dashboard by visiting the telescope section in your applications admin panel.


### User authentication and role permission management structure

### 1. User Authentication
- **User Registration**: A user can register by providing their name, email, and password.
- **Login**: After registering, the user can log in by providing their email and password. On successful login, the system will issue an API token for authentication via **Laravel Passport**.

### 2. Role Management
- **Create Roles**: Admins can create roles like "Admin", "Editor", etc.
- **Assign Roles**: Admins can assign multiple roles to a user.
- **Role-Based Access Control**: Permissions are defined based on roles. When users are assigned roles, they inherit the permissions associated with those roles.

### 3. Permission Management
- **Create Permissions**: Permissions like "view_posts", "edit_posts", etc., are created.
- **Assign Permissions**: Permissions can be assigned directly to users or inherited from roles.
- **Permission Checking**: Before accessing specific routes, the middleware checks whether the authenticated user has the required permissions, either directly or through roles.

### 4. Assigning Roles and Permissions
- **Assign Roles to Users**: Admin can assign roles to users to provide access to specific actions.
- **Assign Permissions to Roles**: Roles can have permissions assigned that define the actions users in that role can perform.
- **Direct Permission Assignment**: Permissions can be assigned directly to users, allowing fine-grained control.

### 5. Middleware for Authorization
- **Middleware**: A middleware verifies if the authenticated user has the required permissions to access protected routes. It ensures secure and restricted access to certain API endpoints.


## API Endpoints

### Authentication

#### Dummy Admin: `admin@atilimited.net`
#### Dummy Password: `admin123456`

#### Postman Process Flow

#### 1. Register User
- **Endpoint**: `POST /api/register`
- **Body**:

```
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```


#### 2. Login User
- **Endpoint**: `POST /api/login`
- **Body**:

```
{
  "email": "john@example.com",
  "password": "password"
}
```
### Role Management

#### 1. Create Role
- **Endpoint**: `POST /api/roles`
- **Headers**:
  - `Authorization`: `Bearer <your-access-token>`
- **Body**:

```
{
  "name": "Editor"
}
```
#### 2. List Roles
- **Endpoint**: `GET /api/roles`
- **Headers**:
  - `Authorization`: `Bearer <your-access-token>`

---

### Permission Management

#### 1. Create Permission
- **Endpoint**: `POST /api/permissions`
- **Headers**:
  - `Authorization`: `Bearer <your-access-token>`
- **Body**:

```
{
  "name": "edit_posts"
}
```

#### 2. List Permissions
- **Endpoint**: `GET /api/permissions`
- **Headers**:
  - `Authorization`: `Bearer <your-access-token>`


#### 3. Assign Role to User
- **Endpoint**: `POST /api/users/{user_id}/assign-role`
- **Headers**:
  - `Authorization`: `Bearer <your-access-token>`
- **Body**:
```
{
  "role": "Super Admin"
}
```

#### 4. Assign Permission to Role
- **Endpoint**: `POST /api/roles/{role_id}/assign-permission`
- **Body**:

```
{
  "permission": "edit_posts"
}
```

### Testing API's (Generated by api toolkit)
#### 1. Get all users (Paginated)
- **Endpoint**: `GET /api/customers`
- **Headers**:
  - `Accept`: `application/json`
  - `Authorization`: `Bearer <your-access-token>`

#### 2. Get Customer by ID
- **Endpoint**: `GET /api/customers/{id}`
- **Headers**:
  - `Accept`: `application/json`
  - `Authorization`: `Bearer <your-access-token>`

#### 3. Search Customers by Attributes
- **Endpoint**: `GET /api/customers`
- **Headers**:
  - `Accept`: `application/json`
  - `Authorization`: `Bearer <your-access-token>`
- **Perameters**:
```
{
  "name": "John Doe"
}
```

#### 4. Add Customer
- **Endpoint**: `POST /api/customers`
- **Headers**:
  - `Accept`: `application/json`
  - `Authorization`: `Bearer <your-access-token>`
- **body**:
```
{
  "name": "Test Customer",
  "age": 22,
  "gender": "male"
}
```

#### 5. Update Customer
- **Endpoint**: `PUT /api/customers/{id}`
- **Headers**:
  - `Accept`: `application/json`
  - `Authorization`: `Bearer <your-access-token>`
- **Perameters**:
```
{
  "name": "Test Customer",
  "age": 22,
  "gender": "male"
}
```

#### 5. Delete Customer
- **Endpoint**: `DELETE /api/customers/{id}`
- **Headers**:
  - `Accept`: `application/json`
  - `Authorization`: `Bearer <your-access-token>`

## Postman Collection

A Postman collection has been provided for testing the API. It includes requests for:

- **Authentication** (register, login).
- **Role and Permission management** (create, list).
- **Assigning roles and permissions to users**.
- **Testing api's for customer's**.
