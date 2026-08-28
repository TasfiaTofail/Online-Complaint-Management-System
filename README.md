# 📝 Online Complaint Management System

A web-based **Online Complaint Management System** developed using **HTML, CSS, JavaScript, AJAX, PHP, and MySQL**. The system allows students to submit and track complaints, staff members to manage assigned complaints, and administrators to manage the overall complaint system.

The project implements **role-based access control** with three types of users:

* 👨‍🎓 **User 1 — Student**
* 👨‍💼 **User 2 — Staff**
* 👨‍💻 **User 3 — Admin**

---

## 🚀 Features

### 🔐 Common Features

All registered users can:

* ✅ Login
* ✅ Logout
* ✅ Register an account
* ✅ View profile
* ✅ Edit profile information
* ✅ Delete account
* ✅ Change password
* ✅ Reset password
* ✅ Access a personalized dashboard

---

## 👨‍🎓 User 1 — Student

Students can:

* 📝 Submit complaints
* 📋 View their submitted complaints
* 🔎 Track complaint status
* 💬 View responses from staff/admin
* 👤 Manage their profile
* 🔑 Change or reset their password

### Complaint Information

Students can provide information such as:

* Complaint subject
* Complaint category
* Description
* Location

### Complaint Status

A complaint can move through different stages:

```text
Pending
   ↓
In Progress
   ↓
Resolved
```

---

## 👨‍💼 User 2 — Staff

Staff members can:

* 📋 View complaints assigned to them
* 🔎 Track assigned complaints
* 🔄 Update complaint status
* 💬 Add responses to complaints

Staff members only manage complaints assigned to them.

---

## 👨‍💻 User 3 — Admin

Administrators can:

* 📋 View all complaints
* 👀 Manage complaints
* 👨‍💼 Assign complaints to staff members
* 👥 Manage users
* 🗑️ Delete complaints
* 📊 Monitor the overall complaint system

---

## 🛠️ Technologies Used

| Technology       | Purpose                             |
| ---------------- | ----------------------------------- |
| **HTML5**        | Structure of web pages              |
| **CSS3**         | Styling and responsive interface    |
| **JavaScript**   | Client-side functionality           |
| **AJAX**         | Asynchronous communication          |
| **PHP**          | Server-side processing              |
| **MySQL**        | Database management                 |
| **phpMyAdmin**   | Database administration             |
| **XAMPP**        | Local development server            |
| **Git & GitHub** | Version control and project hosting |

---

## 🔄 System Workflow

### Student Complaint Flow

```text
Student Login
     ↓
Student Dashboard
     ↓
Submit Complaint
     ↓
AJAX Request
     ↓
PHP
     ↓
MySQL Database
     ↓
Admin Reviews Complaint
     ↓
Admin Assigns Staff
     ↓
Staff Handles Complaint
     ↓
Staff Updates Status
     ↓
Staff Adds Response
     ↓
Student Views Update
```

---

## 🔐 Authentication & Account Management

The system provides account management functionality for all users.

### Login

```text
Email/Username + Password
          ↓
       PHP
          ↓
      MySQL
          ↓
   Session Created
          ↓
   Role-Based Dashboard
```

### Change Password

A logged-in user can change their password by providing:

* Current password
* New password
* Confirm new password

The current password is verified using `password_verify()` and the new password is stored using `password_hash()`.

### Reset Password

Users who cannot remember their password can use the reset-password functionality with their registered email and reset verification code.

---

## 👤 Profile Management

Every user has access to a common profile section.

```text
My Profile
    │
    ├── View Profile
    │
    ├── Edit Profile
    │
    ├── Change Password
    │
    └── Delete Account
```

Users can update their personal information and manage their account.

---

## ⚡ AJAX Implementation

AJAX is used throughout the system to communicate between the frontend and backend without unnecessarily reloading the webpage.

Example workflow:

```text
HTML
 ↓
JavaScript
 ↓
AJAX Request
 ↓
PHP
 ↓
MySQL
 ↓
JSON Response
 ↓
JavaScript
 ↓
HTML
```

This makes the application more interactive and responsive.

---

## 🗄️ Database

The project uses **MySQL** as the database.

Main database:

```text
complaint_system
```

The database contains information related to:

* Users
* Complaints
* Complaint assignments
* Complaint responses
* Complaint status
* Password reset information

---

## 📁 Project Structure

```text
OnlineComplaintSystem/
│
├── index.html
├── login.html
├── register.html
├── profile.html
├── change-password.html
├── reset-password.html
│
├── admin/
│   └── ...
│
├── staff/
│   └── ...
│
├── student/
│   └── ...
│
├── css/
│   └── style.css
│
├── js/
│   ├── profile.js
│   ├── change-password.js
│   ├── reset-password.js
│   └── ...
│
├── php/
│   ├── db.php
│   ├── profile.php
│   ├── update-profile.php
│   ├── delete-account.php
│   ├── change-password.php
│   ├── reset-password.php
│   └── ...
│
└── database/
    └── complaint_system.sql
```

> The exact files and folders may vary depending on the final project structure.

---

## 💻 Installation & Setup

### 1. Install XAMPP

Install and open **XAMPP**.

Start:

```text
Apache
MySQL
```

---

### 2. Clone the Repository

Open Git Bash and run:

```bash
git clone YOUR_GITHUB_REPOSITORY_URL
```

Then move into the project:

```bash
cd OnlineComplaintSystem
```

---

### 3. Move Project to XAMPP

Copy the project folder into:

```text
C:\xampp\htdocs\
```

The final location should be:

```text
C:\xampp\htdocs\OnlineComplaintSystem
```

---

### 4. Create the Database

Open:

```text
http://localhost/phpmyadmin
```

Create a database named:

```text
complaint_system
```

---

### 5. Import the SQL Database

In phpMyAdmin:

```text
complaint_system
      ↓
Import
      ↓
Choose complaint_system.sql
      ↓
Go
```

This will create the required database tables.

---

### 6. Check Database Connection

The project uses:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "complaint_system";
```

The connection is handled through:

```text
php/db.php
```

If your MySQL username, password, or database name is different, update `db.php`.

---

### 7. Run the Project

Open your browser and visit:

```text
http://localhost/OnlineComplaintSystem/
```

---

## 🔑 User Roles

The system contains three user roles:

| Assignment | System Role | Main Responsibility         |
| ---------- | ----------- | --------------------------- |
| **User 1** | Student     | Submit and track complaints |
| **User 2** | Staff       | Handle assigned complaints  |
| **User 3** | Admin       | Manage complaints and users |

---

## 🔒 Security Features

The project includes several basic security practices:

* 🔐 Session-based authentication
* 🔑 Password hashing using `password_hash()`
* ✅ Password verification using `password_verify()`
* 🛡️ Prepared SQL statements
* 🚫 Users can only manage their own profiles
* 🔒 Role-based access control
* 🔄 One-time reset codes

---

## 📋 Requirement Coverage

| Requirement                | Status |
| -------------------------- | ------ |
| Login                      | ✅      |
| Logout                     | ✅      |
| Registration               | ✅      |
| Change Password            | ✅      |
| Reset Password             | ✅      |
| View Profile               | ✅      |
| Edit Profile               | ✅      |
| Delete Account             | ✅      |
| Personalized Dashboard     | ✅      |
| Submit Complaint           | ✅      |
| Track Complaints           | ✅      |
| View Complaint Status      | ✅      |
| View Assigned Complaints   | ✅      |
| Update Complaint Status    | ✅      |
| Add Complaint Response     | ✅      |
| View All Complaints        | ✅      |
| Assign Complaints to Staff | ✅      |
| Manage Users               | ✅      |
| Delete Complaints          | ✅      |

---

## 🎯 Project Objectives

The main objectives of this project are:

1. To provide an online platform for submitting complaints.
2. To reduce manual complaint management.
3. To allow students to track complaint progress.
4. To help staff manage assigned complaints efficiently.
5. To allow administrators to monitor and manage the complete system.
6. To implement role-based access control.
7. To demonstrate the use of HTML, CSS, JavaScript, AJAX, PHP, and MySQL in a complete web application.

---


## ⭐ Future Improvements

Possible future improvements include:

* 📧 Email-based password reset
* 🔔 Email notifications for complaint updates
* 📱 Improved mobile responsiveness
* 📊 Admin analytics and charts
* 🔍 Advanced complaint search and filtering
* 📎 Complaint attachment/file upload
* 🕒 Complaint history and activity logs
* 🔐 Stronger security and validation
* ☁️ Online deployment

---


This project was created for educational and academic purposes.
