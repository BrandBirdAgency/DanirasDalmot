# 🚀 Quick Start Guide - Admin Panel Access

**Danira's Dalmoth Admin Panel**

---

## 📍 Admin Panel URL

**Development:** `http://127.0.0.1:8000/admin/login`  
**Production:** `https://yourdomain.com/admin/login`  
**Alternative:** `https://yourdomain.com/login`

---

## 🔐 Login Credentials

### Primary Admin Account
- **Email:** `slaure354@gmail.com`
- **Password:** [Contact developer - encrypted in database]
- **Name:** Sagar

### Test Admin Account (For Development/Testing Only - DELETE IN PRODUCTION)
- **Email:** `admin@danirasdalmoth.com`
- **Password:** `password`
- **Name:** Admin
- ⚠️ **WARNING:** Remove this account before going live!

---

## 🎯 Admin Panel Features

After logging in, you can access:

### 1️⃣ **Dashboard** (`/admin/dashboard`)
   - Quick access to all admin functions
   - Overview cards for Profile, Orders, Teams, Products

### 2️⃣ **Company Profile** (`/admin/profile`)
   - Update company information
   - Upload company logo
   - Edit contact details (email, phone, address, website)
   - Update social media links (Facebook, Instagram, Twitter)
   - Add/edit CEO message and photo
   - Add/edit Chairman message and photo

### 3️⃣ **Product Management** (`/admin/product-index`)
   - View all products (9 per page)
   - Add new products with images
   - Edit existing products
   - Delete products
   - Toggle stock availability
   - Toggle homepage display
   - Automatic QR code generation
   - Automatic barcode generation
   - Download QR codes & barcodes

### 4️⃣ **Order Management** (`/admin/orders`)
   - View customer orders (5 per page)
   - See order details (customer info, product, quantity, price)
   - Update order status (pending/completed)
   - Filter and manage orders

### 5️⃣ **Team Management** (`/admin/teams`)
   - Add team members with photos
   - Edit team member information
   - Delete team members
   - Add social media links for team members
   - Organize by team categories

---

## 🛠️ How to Use Admin Features

### Adding a New Product
1. Go to Dashboard → Click "Products"
2. Click "Add Product" button
3. Fill in product details:
   - Product Name
   - Description
   - Upload Photo
   - Retail Price
   - Discount
   - Final Price (calculated automatically)
   - Category
   - Brand Name
   - Size
   - Optional: Upload custom QR code
   - Optional: Upload custom Barcode
4. Click "Submit"
5. QR code & Barcode generated automatically if not uploaded

### Managing Orders
1. Go to Dashboard → Click "Orders"
2. View all customer orders in the table
3. Click the status toggle to mark orders as complete
4. Orders show: Customer name, email, phone, product, quantity, total price

### Managing Team Members
1. Go to Dashboard → Click "Teams"
2. Click "Add Member" button
3. Fill in details:
   - Name
   - Position
   - Phone
   - Address
   - Upload Photo
   - Facebook link (optional)
   - Instagram link (optional)
   - Select Team (Management/Staff)
4. Click "Submit"

### Updating Company Profile
1. Go to Dashboard → Click "Profile"
2. Update company information
3. Upload new logo (old one will be replaced)
4. Update social media links
5. Click "Save Changes"

---

## 🔒 Security Features

✅ **Login Protection**
- Password encrypted with bcrypt
- Rate limiting on login attempts
- Session-based authentication
- CSRF protection on all forms
- Auto logout after 120 minutes of inactivity

✅ **Access Control**
- All admin pages require login
- Automatic redirect to login if not authenticated
- Logout button in header when logged in

✅ **Data Protection**
- Input validation on all forms
- File upload security (type & size checks)
- SQL injection prevention (Laravel ORM)
- XSS protection (Blade templating)

---

## 📱 Navigation

### Header Menu (When Logged In)
- Home | Products | Team | About | Contact
- **Logout** button (click to sign out)
- **Profile Icon** (click to go to dashboard)

### Admin Dashboard Menu
- Profile Card → Company settings
- Orders Card → Manage orders
- Teams Card → Manage team members
- Products Card → Manage products

---

## ⚠️ Important Notes

### Before Going Live:
1. ✅ Change `APP_ENV=production` in `.env` file
2. ✅ Change `APP_DEBUG=false` in `.env` file
3. ✅ Delete test admin accounts (keep only primary admin)
4. ✅ Enable reCAPTCHA on login page
5. ✅ Set up SSL certificate (HTTPS)
6. ✅ Configure email settings for order notifications
7. ✅ Backup database regularly

### Password Reset:
If you forget your password, contact your developer to reset it in the database.

### Session Timeout:
You will be automatically logged out after 120 minutes (2 hours) of inactivity. Just log in again to continue.

### File Uploads:
- **Product Images:** Max 5MB, JPG/PNG format
- **Team Photos:** Max 10MB, JPG/JPEG/PNG/BMP format
- **Logo:** JPG/JPEG/PNG format
- **CEO/Chairman Photos:** JPG/JPEG/PNG format

---

## 🆘 Troubleshooting

### Can't Login?
- Check email is correct (case-sensitive)
- Check password (case-sensitive)
- Clear browser cache and cookies
- Try different browser
- Contact developer if still having issues

### Page Not Loading?
- Check internet connection
- Clear browser cache
- Check if server is running
- Contact developer

### Image Not Uploading?
- Check file size (max 5-10MB)
- Check file format (JPG/PNG only)
- Try smaller image
- Try different image format

### Changes Not Saving?
- Check all required fields are filled
- Look for error messages in red
- Check file size limits
- Try again or refresh page

---

## 📞 Support

For technical support or questions:
- Contact your developer
- Refer to the detailed audit report: `docs/admin-security-audit-2025.md`
- Check Laravel documentation: https://laravel.com/docs/8.x

---

**Last Updated:** October 28, 2025  
**Version:** 1.0  
**Status:** ✅ Ready for Production
