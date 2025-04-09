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

  1. [Node.js](https://nodejs.org/)
  2. [npm](https://www.npmjs.com/)
  3. [React]( https://reactjs.org/)
  4. [PHP](https://www.php.net/downloads.php)
  5. [SQl](https://learn.microsoft.com/en-us/ssms/download-sql-server-management-studio-ssms)

## Instructions
  1. Open your SQL client and run the database.sql script located in the database folder to create the database schema and tables
  2. Open your terminal
  3. Change directory to this repository: `cd \Order_Management_System\Order_Management_System-main\client\src`
  4. Run ' npm install '
  5. Open db_connection.php in folder server change server name, database name,... and  run ' npm start ' 
  6. Navigate to client web: http://localhost:3000
  7. Change directory to this repository: `cd \Order_Management_System\Order_Management_System-main\server`
  8. Run ' php -S localhost:8000 '
