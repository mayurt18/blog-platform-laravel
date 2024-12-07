# Blog Platform (CMS)

A scalable blog platform built with **Laravel** that mimics key features of a **Content Management System (CMS)**. This project includes **user authentication**, **role-based access control**, **post and comment management**, and **notifications**.

The platform is designed to be extendable, allowing for easy scalability as a **Content Management System** (CMS) or even as the base for more complex systems such as **CRM** or **ERP**.

## Features

- **Content Management System (CMS)**: Create, update, and delete posts. Manage comments on posts.
- **User Authentication**: User registration, login, and password reset with role-based access.
- **Role-Based Access Control**: Admins have full control over posts and comments; regular users can create and comment on posts.
- **Scalable Architecture**: Designed with scalability in mind. Features include tagging, categorization, and an API for content management.
- **Notifications**: Notify users when comments are added to their posts.
- **Admin Dashboard**: Full-featured admin panel to manage content, users, and posts.
- **Security**: Includes OAuth login, role-based permissions, and two-factor authentication.

## Requirements

- PHP 8.3+
- Composer
- MySQL
- Node.js (for compiling assets)
- Laravel 10

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/blog-platform-laravel.git
cd blog-platform-laravel


2. Install Dependencies
composer install
npm install && npm run dev


3. Set Up Environment
Copy .env.example to .env:
cp .env.example .env
Update .env with your database credentials and any other necessary configuration.


4. Run Migrations
php artisan migrate


5. Seed an Admin User (Optional)
php artisan tinker
DB::table('users')->insert([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'role' => 'admin',
]);


6. Start the Application
php artisan serve
You can now access the application at http://localhost:8000.


Improvements for Scalability
Database Indexing: Optimized for scalability with proper indexing on posts and comments.

REST API: Exposed a RESTful API for posts and comments that can be extended to integrate with other applications.

Role-Based Access: Admin roles can manage users, posts, and comments; regular users can only manage their own content.
