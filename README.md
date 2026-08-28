# Online Complaint Management System

A web-based complaint management system developed as a Web Technologies project.

## 👥 User Roles

### Student

* Register and login
* Submit complaints
* Track complaint status
* View staff responses

### Staff

* Login securely
* View assigned complaints
* Update complaint status
* Add responses

### Admin

* Login
* View all complaints
* Assign complaints to staff
* Delete complaints
* Manage users
* Monitor complaint statistics

## 🛠️ Technologies Used

* HTML
* CSS
* JavaScript
* AJAX
* PHP
* MySQL
* JSON
* PHP Sessions

## 📂 Project Structure

```text
OnlineComplaintSystem/
├── admin/
├── staff/
├── student/
├── css/
├── js/
├── php/
├── database/
├── index.html
├── login.html
├── register.html
└── README.md
```

## ⚙️ How to Run

1. Install XAMPP.
2. Start Apache and MySQL.
3. Copy the project into:

```text
C:\xampp\htdocs\
```

4. Open phpMyAdmin.
5. Create a database named:

```text
complaint_system
```

6. Import:

```text
database/complaint_system.sql
```

7. Check the database credentials in:

```text
php/db.php
```

8. Open:

```text
http://localhost/OnlineComplaintSystem/
```

## 🔄 System Workflow

```text
Student
   ↓
Submit Complaint
   ↓
Admin
   ↓
Assign Staff
   ↓
Staff
   ↓
Update Status + Response
   ↓
Student
```


