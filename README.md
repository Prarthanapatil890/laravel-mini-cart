# Laravel Mini-Cart Project

This is a simple Laravel-based mini shopping cart system that allows users to add, update, and remove products from a session-based cart.

##  Features

- 3 hardcoded products with ID, Name, Price  
- Add to cart functionality  
- View cart with product name, quantity, price, subtotal  
- Grand total at bottom  
- Increase/decrease quantity  
- Remove individual item  
- Clear entire cart  
- Flash messages for each action  
- Bootstrap styling for clean UI

---

##  Project Structure

```
laravel-mini-cart/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── CartController.php
├── resources/
│   └── views/
│       ├── cart.blade.php
│       ├── products.blade.php
│       └── welcome.blade.php
├── routes/
│   └── web.php
├── public/
│   └── (Bootstrap & assets)
├── .env
├── composer.json
├── package.json
├── README.md
```

---

##  How to Run Locally

### 1. Clone the Repository
```
git clone https://github.com/Prarthanapatil890/laravel-mini-cart.git
cd laravel-mini-cart
```

### 2. Install Dependencies
```
composer install
```

### 3. Create `.env` File
```
cp .env.example .env
```

### 4. Generate App Key
```
php artisan key:generate
```

### 5. Start Local Server
```
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) to view the project in your browser.

---

