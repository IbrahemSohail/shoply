# Shoply - E-Commerce Platform

Shoply is a modern, full-featured e-commerce application built with **Laravel 11**. It provides a seamless shopping experience for customers and a powerful dashboard for administrators to manage products, categories, orders, and taxes.

## 🚀 Features

### For Customers

- **Browse Products**: View products with details, images, and prices.
- **Live Search**: Real-time product search functionality.
- **Categories**: Filter products by categories.
- **Shopping Cart**: Add items to cart, update quantities, and remove items.
- **Checkout**: Secure checkout process to place orders.
- **User Accounts**: Register, login, and manage profile.

### For Administrators

- **Dashboard**: Overview of system status.
- **Product Management**: Create, read, update, and delete (CRUD) products.
- **Category Management**: Manage product categories.
- **Order Management**: View and manage customer orders.
- **Tax Management**: Configure tax rates and types.
- **Secure Access**: Role-based authentication (Admin/User).

## 🛠️ Tech Stack

- **Backend**: [Laravel 11](https://laravel.com)
- **Frontend**: [Blade Templates](https://laravel.com/docs/blade), [Tailwind CSS](https://tailwindcss.com), [Alpine.js](https://alpinejs.dev)
- **Database**: MySQL
- **Build Tool**: Vite

## 📦 Installation

Follow these steps to set up the project locally:

1.  **Clone the Repository**

    ```bash
    git clone https://github.com/IbrahemSohail/shoply.git
    cd shoply
    ```

2.  **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**
    Copy the example environment file and configure your database credentials:

    ```bash
    cp .env.example .env
    ```

    _Edit `.env` file and set `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`._

4.  **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5.  **Run Migrations**
    Set up the database tables:

    ```bash
    php artisan migrate
    ```

6.  **Build Frontend Assets**
    ```bash
    npm run build
    ```

## 🚀 Running the Application

1.  **Start the Local Server**

    ```bash
    php artisan serve
    ```

2.  **Start Vite (for development)**

    ```bash
    npm run dev
    ```

3.  **Access the App**
    Open your browser and visit: `http://127.0.0.1:8000`

## 👤 Authors

- **Ibrahem Sohail** - _Initial Work_

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
