# Laravel E-Commerce Platform

## About The Project
A full-stack e-commerce web application built to handle online product browsing, user authentication, and secure cart management. This project was developed to practice server-side rendering, relational database design, and routing logic using the Laravel PHP framework.

## Key Features
* **User Authentication:** Secure registration and login functionality for customers.
* **Product Catalog:** Dynamic rendering of product information and pricing from the database.
* **Shopping Cart:** Session-based cart management allowing users to add, review, and manage items before checkout.
* **Order Management:** Secure processing and storage of user orders and account histories.
* **Relational Database Schema:** Structured MySQL database handling interconnected tables for users, products, and orders.

## Tech Stack
* **Backend:** PHP, Laravel Framework
* **Database:** MySQL
* **Architecture:** MVC (Model-View-Controller)

## Local Installation
If you would like to run this project locally on your machine, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/awahabsagheer/e-commerce-web-store.git
   ```
2. Navigate into the project directory:
    ```bash
    cd e-commerce-web-store
    ```
3. Install PHP dependencies:
    ```bash
    composer install
    ```
4. Copy the environment file and configure your MySQL database credentials:
    ```bash
    cp .env.example .env
    ```
5. Generate a new application key:
    ```bash
    php artisan key:generate
    ```
6. Run the database migrations to build the tables:
    ```bash
    php artisan migrate
    ```
7. Start the local development server:
    ```bash
    php artisan serve
    ```
