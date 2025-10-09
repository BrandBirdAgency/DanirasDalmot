# Database Seeding Documentation

## Overview

This document describes the database seeding process for the Danira's Dalmoth Laravel project. The seeding includes factories and seeders for all main entities.

## Database Statistics

After running `php artisan db:seed`, the following data was populated:

-   **Products**: 45 records (5 predefined + 40 factory-generated)
-   **Orders**: 28 records (3 predefined + 25 factory-generated)
-   **Teams**: 9 records (1 predefined + 8 factory-generated)
-   **Users**: 13 records (3 predefined + 10 factory-generated)
-   **About**: 1 record (company information)

## Factories Created

### 1. ProductFactory

-   **Location**: `database/factories/ProductFactory.php`
-   **Purpose**: Generate realistic product data for the food/snack business
-   **Fields**: name, photo, description, pricing, inventory, QR codes, barcodes

### 2. OrderFactory

-   **Location**: `database/factories/OrderFactory.php`
-   **Purpose**: Generate customer orders with realistic data
-   **Fields**: customer info, product association, quantities, pricing, delivery details

### 3. TeamFactory

-   **Location**: `database/factories/TeamFactory.php`
-   **Purpose**: Generate team member profiles
-   **Fields**: personal info, positions, contact details, social media

### 4. AboutFactory

-   **Location**: `database/factories/AboutFactory.php`
-   **Purpose**: Company information template
-   **Fields**: company details, leadership messages, contact information

## Seeders Created

### 1. ProductSeeder

-   **Location**: `database/seeders/ProductSeeder.php`
-   **Data**: 5 predefined Danira's products + 15 factory-generated products
-   **Products Include**:
    -   Daniras Special Mix (500g) - Featured
    -   Premium Dalmoth (1kg) - Featured
    -   Spicy Namkeen (250g)
    -   Sweet & Salty Mix (500g) - Featured
    -   Traditional Bhujia (250g) - Out of Stock

### 2. OrderSeeder

-   **Location**: `database/seeders/OrderSeeder.php`
-   **Data**: 3 predefined orders + 25 factory-generated orders
-   **Sample Orders**:
    -   Ram Bahadur (Processing)
    -   Sita Sharma (Shipped)
    -   Hari Poudel (Delivered)

### 3. TeamSeeder

-   **Location**: `database/seeders/TeamSeeder.php`
-   **Data**: 1 real team member (Sagar Chettri) + 8 factory-generated members
-   **Real Member**: Sagar Chettri - Sr. Programmer

### 4. UserSeeder

-   **Location**: `database/seeders/UserSeeder.php`
-   **Data**: 3 predefined users + 10 factory-generated users
-   **Predefined Users**:
    -   Sagar (slaure354@gmail.com) - Original from SQL dump
    -   Admin (admin@danirasdalmoth.com) - password: password
    -   Test User (test@example.com) - password: password

### 5. AboutSeeder

-   **Location**: `database/seeders/AboutSeeder.php`
-   **Data**: 1 company record with complete business information
-   **Includes**: Company details, CEO & Chairman messages, contact information

## Model Updates

All models were updated with proper `$fillable` attributes:

-   **Product**: All product-related fields
-   **Order**: Customer and order details, delivery information
-   **Team**: Member information and social media
-   **About**: Complete company information including logo

## Commands Used

```bash
# Run all seeders
php artisan db:seed

# Run specific seeder
php artisan db:seed --class=ProductSeeder

# Check database counts
php artisan tinker --execute="echo 'Products: ' . App\Models\Product::count();"
```

## Features

-   **Realistic Data**: Factories generate appropriate data for a Nepali food business
-   **Relationships**: Orders are properly linked to products
-   **Mixed Content**: Combines real business data with generated test data
-   **Flexible**: Can be run multiple times or individually per seeder

## Usage

1. Ensure database is migrated: `php artisan migrate`
2. Run seeders: `php artisan db:seed`
3. Verify data in your application or database

## Notes

-   All predefined data reflects the actual Danira's Dalmoth business
-   Factory data is realistic but randomly generated
-   Password for test accounts is "password"
-   Original admin user password hash is preserved from SQL dump
