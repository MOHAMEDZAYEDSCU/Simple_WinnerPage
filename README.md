###  User Registration & Random Winner System

A dynamic web application that allows user registration with database storage and randomly selects winners from registered users. Built with PHP, MariaDB, and vanilla JavaScript.

#### Features

- **User Registration Form**  
    Collects first name, last name, and email with validation
    
- **Database Storage**  
    Securely stores user information in MariaDB
    
- **Random Winner Selection**  
    "Test Ur Luck" button selects a random user
    
- **Responsive Design**  
    Works on all devices (It is a joke !)

#### Directory Structure

```
Simple_WinnerPage/
├── Backend/
│   ├── crud_project.sql    # Database schema
│   ├── db.php              # Database connection and operations
│   └── get_random_user.php # API endpoint for random user
├── Frontend/
│   ├── testing.js           # Interactive functionality
│   └── style.css           # Styling and animations
├── main.php                # Main application entry point
└── README.md               # Project documentation
```
