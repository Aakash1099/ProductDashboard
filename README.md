## Product Management Dashboard (PHP & MySQL)

This project is a web-based Product Management Dashboard built using **PHP, MySQL (PDO), Bootstrap, and Chart.js**. It supports complete CRUD operations, bulk product import using CSV files, quantity-based inventory tracking, pagination to prevent scrolling, and dynamic category-wise data visualization through a bar chart.

---

## Features

* Add, edit, and delete products
* Bulk import using CSV
* Quantity-based inventory management
* Category-wise bar chart (Chart.js)
* Dynamic updates after CRUD and import
* Pagination for improved usability
* Secure database access using PDO

---

## Project Structure

```
assignment/
│
├── config/
│   └── db.php
│
├── api/
│   └── chart_data.php
│
├── uploads/
│   ├── products.sql     # Database schema file
│   └── test.csv         # Sample CSV for import testing
│
├── index.php
├── import.php
├── delete.php
└── README.md
```

---

## Database Setup

* Open **phpMyAdmin**
* Create a new database
* Go to the **Import** tab
* Import the SQL file located at:

```
uploads/products.sql
```

This will create the required database table.

---

## CSV Import

A sample CSV file is provided for testing purposes:

```
uploads/test.csv
```

### CSV format:

```csv
name,price,category,quantity
Laptop,55000,Electronics,20
Office Chair,3500,Office,30
Pen,10,Stationery,500
```

Upload this file from the dashboard to quickly populate the database.

---

## Installation Steps

* Install **XAMPP** and start **Apache** and **MySQL**
* Copy the project folder into `htdocs`
* Import the SQL file from the `uploads` folder
* Update database credentials in `config/db.php`
* Open the application in a browser:

```
http://localhost/project-folder-name
```

---

## Data Visualization

The application uses **Chart.js** to display a bar chart showing the **total quantity of products per category**. The chart automatically updates when products are added, edited, deleted, or imported via CSV.

---

## Author

**Aakash Girhe**
📧 [aakashgirhe289@gmail.com](mailto:aakashgirhe289@gmail.com)

---


