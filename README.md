 📇 Contact Management Web App (PHP + MySQL)

A simple contact management web application built using **PHP** and **MySQL**. It allows users to submit contact forms and provides functionality to **view**, **edit**, and **delete** the data.

## 🧾 Features

- Submit contact data (Name, Email, Message)
- View all contact entries
- Edit contact information
- Delete unwanted entries
- Basic styling and modular PHP structure

---

## 🗃️ Files Overview

| File Name             | Description                                 |
|----------------------|---------------------------------------------|
| `index.php`          | Homepage or landing page                    |
| `contact_page.php`   | Contact form page (frontend)                |
| `contact-submit.php` | Handles form submissions and DB insertions  |
| `view-data.php`      | Displays all contact records                |
| `edit.php`           | Form to edit existing contact info          |
| `delete.php`         | Deletes a selected contact record           |

---

## 🛠️ Technologies Used

- PHP (Core backend)
- MySQL (Database)
- HTML5, CSS3 (Frontend)
- Bootstrap (optional)
- Apache server (via XAMPP/WAMP)

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/Govid-jadhav/php-contact-crud.git
2. Set Up the Environment
Install XAMPP or WAMP.

Copy the project folder into the htdocs directory (XAMPP) or www directory (WAMP).

3. Create the Database
Open phpMyAdmin and run the following SQL to create the database and table:

sql
Copy
Edit
CREATE DATABASE contact_db;

USE contact_db;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
4. Configure Database Connection
In contact-submit.php, edit.php, and other PHP files that access the database, ensure your connection code uses:

php
Copy
Edit
$host = "localhost";
$user = "root";
$password = "";
$dbname = "contact_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
🌐 Usage
Visit http://localhost/php-contact-crud/contact_page.php

Submit the contact form

Go to view-data.php to view all records

Use edit.php?id=1 or the edit button to update any record

Use delete.php?id=1 or the delete button to remove entries

📌 Best Practices
Always validate and sanitize inputs.

Use prepared statements to avoid SQL injection.

Consider separating DB logic into a db.php for modular code.

📃 License
This project is open-source and free to use.

🙋‍♂️ Author
Govind Jadhav
🔗 GitHub: Govid-jadhav
