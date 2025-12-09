# OxgnFashion Store (Laravel E-Commerce)

A production-style e-commerce web application built with Laravel, featuring a visually rich OxgnFashion-inspired design with bold typography, advanced animations, full admin/user features, payment integration in sandbox mode, and clean architecture.

## Features

- **Landing Page**: Pixel-perfect OxgnFashion-inspired design with GSAP and AOS animations
- **User Management**: Registration, login, profile management with avatar upload
- **Role-Based Access**: Admin authentication with role-based access control
- **Product Management**: Admin dashboard for CRUD operations with image uploads
- **Shopping Cart**: Add/remove/update quantity with cart summary
- **Order Processing**: Order system with status tracking (Pending, Processing, Completed, Cancelled)
- **Payment Integration**: Stripe payment gateway in sandbox mode
- **Search & Filtering**: Product search and filtering by category, price range, and sorting
- **Responsive Design**: Mobile-first responsive layout with Tailwind CSS

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- XAMPP (recommended for local development)

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   cd myproject
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Copy and configure the environment file:
   ```
   cp .env.example .env
   ```
   
   Update the database settings in `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=key_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Generate application key:
   ```
   php artisan key:generate
   ```

5. Create the database:
   Using phpMyAdmin or MySQL command line:
   ```sql
   CREATE DATABASE key_db;
   ```

6. Run database migrations and seeders:
   ```
   php artisan migrate --seed
   ```

7. Install frontend dependencies:
   ```
   npm install
   npm run dev
   ```

8. Start the development server:
   ```
   php artisan serve
   ```

## Stripe Configuration

To enable Stripe payments, update the following values in your `.env` file:

```
STRIPE_KEY=your_stripe_publishable_key_here
STRIPE_SECRET=your_stripe_secret_key_here
```

For sandbox testing, use Stripe's test keys which can be obtained from your Stripe Dashboard.

## Admin Access

After seeding, you can log in as admin with:
- Email: admin@example.com
- Password: password

## Database Schema (ERD)

```
Users
- id (PK)
- name
- email (unique)
- email_verified_at
- password
- avatar
- remember_token
- timestamps

Roles
- id (PK)
- name
- guard_name
- timestamps

Permissions
- id (PK)
- name
- guard_name
- timestamps

Model_has_roles
- role_id (FK)
- model_type
- model_id

Model_has_permissions
- permission_id (FK)
- model_type
- model_id

Categories
- id (PK)
- name
- slug (unique)
- description
- timestamps

Products
- id (PK)
- name
- slug (unique)
- description
- category_id (FK)
- price
- stock
- cover_image
- timestamps

Carts
- id (PK)
- user_id (FK, nullable)
- session_id (nullable)
- timestamps

Cart_items
- id (PK)
- cart_id (FK)
- product_id (FK)
- quantity
- timestamps

Orders
- id (PK)
- user_id (FK)
- status (pending, processing, completed, cancelled)
- total_amount
- shipping_address
- billing_address
- payment_status (pending, paid, failed)
- payment_method
- timestamps

Order_items
- id (PK)
- order_id (FK)
- product_id (FK)
- quantity
- price
- timestamps
```

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   └── Auth/
│   └── Requests/
├── Models/
├── Services/
└── Providers/

database/
├── migrations/
└── seeders/

resources/
├── views/
│   ├── admin/
│   ├── auth/
│   ├── cart/
│   ├── checkout/
│   ├── components/
│   ├── layouts/
│   ├── payment/
│   ├── products/
│   ├── profile/
│   └── vendor/
└── js/
    └── components/

routes/
└── web.php

tests/
├── Feature/
└── Unit/
```

## Key Components

### Models
- User: Handles user authentication and profiles
- Product: Product information with categories
- Category: Product categorization
- Cart/CartItem: Shopping cart functionality
- Order/OrderItem: Order processing and tracking

### Services
- CartService: Manages shopping cart operations
- OrderService: Handles order creation and management
- PaymentService: Processes payments through Stripe

### Controllers
- ProductController: Public product listings with search/filter
- CartController: Shopping cart operations
- CheckoutController: Checkout process
- PaymentController: Payment processing
- ProfileController: User profile management
- Admin/*: Administrative functionality

## Testing

Run the test suite with:
```
php artisan test
```

## Deployment

For production deployment:
1. Update `.env` with production database credentials
2. Set `APP_ENV=production` and `APP_DEBUG=false`
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Run `php artisan view:cache`
6. Configure your web server to point to the `public/` directory

## Render Deployment

This Laravel application can be deployed to Render using the PHP environment. Render doesn't have a specific "Laravel" environment, but it supports PHP applications which Laravel is built on.

The `render.yaml` file in this repository contains the configuration needed for Render deployment:

1. Go to [Render Dashboard](https://dashboard.render.com/)
2. Click "New" and select "Web Service"
3. Connect your GitHub account if you haven't already
4. Select your repository (`crazy836/angelica`)
5. Render will automatically detect the `render.yaml` file and use its configuration
6. Click "Create Web Service"
7. Render will begin building and deploying your application

The deployment process will:
- Clone your repository
- Run the build commands specified in `render.yaml`
- Start your application using the start command
- Make your application available at a Render URL

## License

This project is open-sourced software licensed under the MIT license.

iycf tdaw sfbm byfc