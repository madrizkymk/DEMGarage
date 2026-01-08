# DEMGarage - Vehicle Service Management System

[![Laravel](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange.svg)](https://mysql.com)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.0+-cyan.svg)](https://tailwindcss.com)
[![Pest](https://img.shields.io/badge/Pest-3.0+-green.svg)](https://pestphp.com)

DEMGarage adalah sistem informasi manajemen bengkel berbasis web yang dirancang untuk mempermudah pengelolaan layanan kendaraan. Sistem ini memungkinkan pelanggan untuk memesan layanan servis kendaraan secara online dengan fitur-fitur modern dan user-friendly.

## ✨ Fitur Utama

### 👤 User Features

-   **Online Booking**: Pesan layanan servis kendaraan secara online
-   **Service Tracking**: Pantau status booking dan riwayat servis
-   **Profile Management**: Kelola informasi akun dan preferensi
-   **Real-time Notifications**: Notifikasi status booking via email

### 🔧 Admin Features

-   **Booking Management**: Kelola semua booking yang masuk
-   **Service Scheduling**: Atur jadwal servis dan teknisi
-   **Customer Management**: Kelola data pelanggan
-   **Reports & Analytics**: Laporan performa bengkel

### 🛡️ Security & Performance

-   **Rate Limiting**: Proteksi terhadap brute force attacks
-   **Email Verification**: Verifikasi email untuk keamanan akun
-   **Password Security**: Hashing dan validasi password yang kuat
-   **CSRF Protection**: Proteksi terhadap cross-site request forgery
-   **Input Validation**: Validasi menyeluruh untuk semua input

## 🚀 Tech Stack

-   **Backend**: Laravel 12 (PHP 8.2+)
-   **Database**: MySQL 8.0+
-   **Frontend**: Blade Templates + TailwindCSS 4.0
-   **Authentication**: Laravel Breeze
-   **Testing**: Pest PHP
-   **Caching**: Redis/File Cache
-   **Mail**: SMTP/Mailgun

## 📋 Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM
-   MySQL 8.0+
-   Git

## 🛠️ Installation

1. **Clone the repository**

    ```bash
    git clone https://github.com/your-username/demgarage.git
    cd demgarage
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node dependencies**

    ```bash
    npm install
    ```

4. **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Database Setup**

    ```bash
    # Configure your database in .env file
    php artisan migrate
    php artisan db:seed
    ```

6. **Build Assets**

    ```bash
    npm run build
    # or for development
    npm run dev
    ```

7. **Start the application**
    ```bash
    php artisan serve
    ```

## 🧪 Testing

Run the test suite:

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=AuthenticationTest

# Run with coverage
php artisan test --coverage
```

## 📁 Project Structure

```
demgarage/
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/
│   │   ├── User/
│   │   └── Admin/
│   ├── Models/
│   └── Requests/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── auth/
│   │   ├── user/
│   │   ├── admin/
│   │   └── layouts/
│   └── css/
├── routes/
│   ├── web.php
│   └── api.php
├── tests/
│   ├── Feature/
│   └── Unit/
└── public/
    └── asset/
```

## 🔒 Security Features

-   **Authentication**: Secure login/logout dengan rate limiting
-   **Authorization**: Role-based access control (User/Admin)
-   **Data Validation**: Comprehensive input validation
-   **CSRF Protection**: Cross-site request forgery protection
-   **XSS Prevention**: Output escaping dan sanitization
-   **SQL Injection**: Parameterized queries dengan Eloquent ORM

## 📱 Responsive Design

-   **Mobile-First**: Optimized for mobile devices
-   **Tablet Support**: Responsive design untuk tablet
-   **Desktop Ready**: Full desktop experience
-   **Accessibility**: WCAG compliant dengan screen reader support

## 🚀 Performance Optimizations

-   **Caching**: Redis/file caching untuk improved performance
-   **Asset Optimization**: Minified CSS/JS dengan versioning
-   **Database Indexing**: Optimized queries dengan proper indexing
-   **Lazy Loading**: Efficient loading of related models

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Support

For support, email support@demgarage.com or join our Discord community.

## 🙏 Acknowledgments

-   Laravel Framework
-   TailwindCSS
-   Pest PHP
-   Laravel Community

---

**Built with ❤️ for the automotive service industry**

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
