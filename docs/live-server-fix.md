# Live Server Deployment Fix

## Current Issue

The domain `danirasdalmoth.com` is showing "HTTP ERROR 500" which indicates a server configuration problem.

## Required Steps to Fix Live Domain

### 1. **Check Document Root**

From cPanel, I can see the document root is set to:

```
/home/yourhost1/danirasdalmoth.com/public
```

This is correct for Laravel (should point to `public` folder).

### 2. **Upload Laravel Project**

You need to upload your local Laravel project to the server:

```
Local: /Users/sagarchhetri/Downloads/Coding/DanirasDalmot/
Server: /home/yourhost1/danirasdalmoth.com/
```

### 3. **Server Configuration Files Needed**

#### A. **.htaccess in public folder**

Create `/home/yourhost1/danirasdalmoth.com/public/.htaccess`:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

#### B. **Environment Configuration**

Create `/home/yourhost1/danirasdalmoth.com/.env`:

```env
APP_NAME="Danira's"
APP_ENV=production
APP_KEY=base64:vzop1xwAofyDZ4iwY8YCevGMt2ry+H+jYRHvVGyJzIo=
APP_DEBUG=false
APP_URL=https://danirasdalmoth.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_cpanel_database_name
DB_USERNAME=your_cpanel_database_user
DB_PASSWORD=your_cpanel_database_password

SESSION_DRIVER=file
SESSION_LIFETIME=120
CACHE_DRIVER=file
QUEUE_CONNECTION=database

# Disable reCAPTCHA for initial setup
NOCAPTCHA_SECRET=
NOCAPTCHA_SITEKEY=
```

### 4. **Database Setup**

1. Create MySQL database in cPanel
2. Import your local database or run migrations
3. Update `.env` with correct database credentials

### 5. **File Permissions**

Set correct permissions on server:

```bash
# Storage and cache folders need write permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### 6. **Dependencies Installation**

On server (if composer is available):

```bash
composer install --optimize-autoloader --no-dev
```

## Quick Test Commands

Once uploaded, test these URLs:

-   `https://danirasdalmoth.com` (homepage)
-   `https://danirasdalmoth.com/admin` (admin login)

## Common 500 Error Causes

1. **Missing .env file**
2. **Incorrect file permissions**
3. **Missing composer dependencies**
4. **Database connection issues**
5. **Missing APP_KEY in .env**
6. **PHP version compatibility**

## Recommended Immediate Action

**Use local development first:**

```
http://127.0.0.1:8001/admin/
Email: admin@danirasdalmoth.com
Password: password
```

Then prepare live deployment once local version is fully tested.
