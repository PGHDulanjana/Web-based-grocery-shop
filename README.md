# Web-based-grocery-shop

A simple and responsive web application that allows users to browse, search, and purchase grocery items online. Built using PHP, MySQL, HTML, and CSS.

## 📌 Project Overview

This system enables:
- Customer registration and login
- Item listing and browsing
- Shopping cart functionality
- Order placement and history tracking

## 🚀 Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Tools**: XAMPP/WAMP/LAMP, phpMyAdmin

## 🔧 Features

- ✅ User Registration & Login
- ✅ Product Listing with Categories
- ✅ Search and Filter Functionality
- ✅ Add to Cart and Cart Management
- ✅ Order Checkout System
- ✅ Order History for Users
- ✅ Admin Features (optional for managing products)

## 🛠️ Installation Instructions

### Prerequisites

- XAMPP/WAMP or any local server
- MySQL installed and running
- Web browser (Chrome, Firefox, etc.)

### Steps

1. **Clone the repository**:
   ```bash
   git clone https://github.com/PGHDulanjana/Web-based-grocery-shop.git
   ```

2. **Import the SQL file**:
   - Open `phpMyAdmin`
   - Create a new database (e.g., `grocery_shop`)
   - Import the provided `.sql` file from the project folder

3. **Configure Database Connection**:
   - Open `dbconfig.php`
   - Update with your local database credentials:
     ```php
     $conn = mysqli_connect("localhost", "root", "", "grocery_shop");
     ```

4. **Run the App**:
   - Copy the project folder to your XAMPP `htdocs/` or WAMP `www/` directory
   - Start Apache and MySQL from your server control panel
   - Visit `http://localhost/Web-based-grocery-shop` in your browser

## 📁 Project Structure

```
Web-based-grocery-shop/
├── css/               → Stylesheets
├── img/               → Product and UI images
├── js/                → JavaScript (optional)
├── dbconfig.php       → Database connection config
├── index.php          → Homepage
├── login.php          → Login page
├── register.php       → Register page
├── shop.php           → Product listing
├── cart.php           → Cart management
├── checkout.php       → Checkout process
├── history.php        → Order history
└── ...
```


## 📅 Future Enhancements

- Admin dashboard for managing products and orders
- Product ratings and reviews
- Payment gateway integration
- Responsive design improvements

## 🙋 Author

👤 **Himansi Dulanjana**  
📧 [himansidulanjana635@gmail.com](mailto:himansidulanjana635@gmail.com)  
🔗 [LinkedIn](https://www.linkedin.com/in/himansi-dulanjana-345396250/)  
🔗 [GitHub](https://github.com/PGHDulanjana)

## 📃 License

This project is for educational purposes. Feel free to use and modify it.
