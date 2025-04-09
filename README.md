# Motorcycle-Accessories-Website

This project develops a B2C e-commerce platform for motorcycle accessories in Vietnam,
targeting the country's high demand (45M+ motorcycles) with features like real-time tracking and secure
transactions. It optimizes performance through data indexing, visualization, and database security while
enhancing user experience and business efficiency.

## Technology Stack
- Front-end: HTML/CSS.
- Back-end: JavaScript, PHP
- Database: MySQL, Xampp.

## Architecture
Frontend: 


The customer-facing interface is designed to be user-friendly and intuitive, allowing users to:
+ Browse and search for products

+ View detailed product information and pricing

+ Add items to the shopping cart

+ Place orders and track order status in real time

The admin interface is tailored for store employees to manage the system efficiently. Features include:
+ Adding, editing, and deleting products

+ Managing orders (confirming, updating status, canceling orders)

+ Managing product categories and customer information

+ Viewing statistics on revenue, order volume, and top-selling products

The HTML forms send data to the server using HTTP methods such as POST, GET, or DELETE, depending on the specific action.

Backend: PHP scripts or APIs receive requests from the frontend, process the business logic, validate data, and interact with the database accordingly—whether to retrieve, insert, update, or delete records.

Database: MySQL serves as the database management system, storing all relevant data including product information, customer details, and order records. It executes SQL queries based on the operations requested by the backend.

Frontend: After processing, the backend sends a response (success or error) back to the frontend. The user interface is then updated accordingly—for example, displaying newly added orders, showing updated information, or alerting the user of any errors.

## Prerequisites

  1. [Xampp](https://www.apachefriends.org/download.html)
  2. [PHP](https://www.php.net/downloads.php)


## Instructions
  1. Install XAMPP
  2. Place source code in the folder: C:\xampp\htdocs\project
  3. Start Apache and MySQL from the XAMPP Control Panel
  4. Open web browser and enter: http://localhost/ADMIN_SIDE/login.php (for admin)
                                 http://localhost/CLIENT_SIDE/login.php(for client)
  