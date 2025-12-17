## Product Management Dashboard (PHP & MySQL)

This project is a web-based Product Management Dashboard developed using **PHP, MySQL (PDO), Bootstrap, and Chart.js**. It allows users to perform CRUD operations on products, import bulk data using CSV files, manage product quantities, and visualize category-wise inventory distribution through a dynamic bar chart. Pagination is implemented to improve usability by preventing long scrolling, and all visualizations update automatically after data changes.

---

## Features

* Add, edit, and delete products
* Bulk product import using CSV
* Quantity-based inventory management
* Category-wise bar chart using Chart.js
* Automatic chart updates after CRUD and import
* Pagination for better data viewing
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
│   └── products.sql      # Database SQL file
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

This will automatically create the required `products` table.

---

## CSV Import Format

```csv
name,price,category,quantity
Laptop,55000,Electronics,20
Office Chair,3500,Office,30
Pen,10,Stationery,500
```

* First row must be a header
* Column order must be maintained

---

## Installation Steps

* Install **XAMPP** and start **Apache** and **MySQL**
* Place the project folder inside `htdocs`
* Import the SQL file from the `uploads` folder
* Update database credentials in `config/db.php`
* Open the application in the browser:

```
http://localhost/project-folder-name
```

---

## Data Visualization

The dashboard includes a bar chart created using **Chart.js** that displays the **total quantity of products per category**. The chart dynamically updates whenever products are added, edited, deleted, or imported via CSV.

---

## Author

**Aakash Girhe**
📧 [aakashgirhe289@gmail.com](mailto:aakashgirhe289@gmail.com)

* Create a **short GitHub README**
* Add **badges (PHP, MySQL, Chart.js)**
* Write a **project description for resume**

Just tell me 👍
