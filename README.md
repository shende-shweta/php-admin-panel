# 📊 PHP Admin Panel

**PHP Admin Panel** is a lightweight, ready-to-extend **admin dashboard template** built with **PHP, Bootstrap 5, and AdminLTE 3**. It provides a data-driven sidebar menu, a breadcrumb-aware page header, stat cards, and a SweetAlert2-powered logout confirmation — a clean starting point for building your own admin backend on top of it.

<p align="left">
  <img src="https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge" alt="License">
</p>

![Banner](./src/images/banner.png)

## 📚 Table of Contents

- [Features](#-features)
- [Installation](#️-installation)
- [Adding Sidebar Menu Items](#-adding-sidebar-menu-items)
- [Project Structure](#-project-structure)
- [Technologies Used](#-technologies-used)
- [License](#-license)
- [Contributing](#-contributing)
- [Connect with Me](#-connect-with-me)

## ✨ Features

✅ **Data-Driven Sidebar** – Menu items and pages are defined in a single PHP array, no hardcoded HTML.
✅ **Automatic Breadcrumbs** – The current page's breadcrumb and active menu state are resolved automatically.
✅ **Dashboard Stat Cards** – Ready-made AdminLTE "small box" widgets for at-a-glance metrics.
✅ **Profile Page** – A dedicated `profile.php` page wired into the same layout.
✅ **Logout Confirmation** – SweetAlert2 confirmation dialog before logging out.
✅ **Shared Layout** – `header.php` and `footer.php` keep every page consistent with one include.

## ⚙️ Installation

### 1️⃣ Clone the repository
```bash
git clone https://github.com/Iqbolshoh/php-admin-panel.git
cd php-admin-panel
```

### 2️⃣ Serve the project
Use any PHP-compatible server (Apache, Nginx, XAMPP, WAMP, MAMP) and place the project files in the server's root directory (`htdocs`/`www`), or run PHP's built-in server:
```bash
php -S localhost:8000
```

### 3️⃣ Open it in your browser
```
http://localhost:8000
```

## 📌 Adding Sidebar Menu Items

The `$menuItems` array in `header.php` defines the sidebar. Each entry includes:

✅ **`menuTitle`** – The section name (e.g. `"Dashboard"`).
✅ **`icon`** – The section icon (e.g. `"fas fa-home"`).
✅ **`pages`** – Subpages, each with a `"title"` and a `"url"`.

```php
$menuItems = [
    [
        "menuTitle" => "Dashboard",
        "icon" => "fas fa-tachometer-alt",
        "pages" => [
            ["title" => "Home", "url" => "index.php"]
        ],
    ],
    [
        "menuTitle" => "Settings",
        "icon" => "fas fa-cog",
        "pages" => [
            ["title" => "Profile", "url" => "profile.php"]
        ],
    ]
];
```

The active menu item and breadcrumb trail are resolved automatically by matching the current page's filename against this array.

## 📂 Project Structure

```
php-admin-panel/
├── header.php    # <head>, navbar, sidebar, and $menuItems config
├── footer.php    # Closing markup + logout confirmation script
├── index.php     # Dashboard page (stat cards)
├── profile.php   # Profile page
└── src/images/   # Banner, logo, and profile picture assets
```

## 🖥 Technologies Used
![HTML](https://img.shields.io/badge/HTML-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-%23F7DF1C.svg?style=for-the-badge&logo=javascript&logoColor=black)
![jQuery](https://img.shields.io/badge/jQuery-%230e76a8.svg?style=for-the-badge&logo=jquery&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

## 📜 License
This project is open-source and available under the [MIT License](./LICENSE).

## 🤝 Contributing
🎯 Contributions are welcome! If you have suggestions or want to enhance the project, feel free to fork the repository and submit a pull request.

## 📬 Connect with Me
💬 I love meeting new people and discussing tech, business, and creative ideas. Let's connect! You can reach me on these platforms:

<div align="center">

[![Website](https://img.shields.io/badge/Website-4285F4?style=for-the-badge&logo=googlechrome&logoColor=white)](https://iqbolshoh.uz)
[![Gmail](https://img.shields.io/badge/Gmail-EA4335?style=for-the-badge&logo=gmail&logoColor=white)](mailto:iilhomjonov777@gmail.com)
[![GitHub](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/iqbolshoh)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/iqbolshoh/)
[![Telegram](https://img.shields.io/badge/Telegram-26A5E4?style=for-the-badge&logo=telegram&logoColor=white)](https://t.me/+998776030033)
[![WhatsApp](https://img.shields.io/badge/WhatsApp-25D366?style=for-the-badge&logo=whatsapp&logoColor=white)](https://wa.me/998776030033)
[![Instagram](https://img.shields.io/badge/Instagram-E4405F?style=for-the-badge&logo=instagram&logoColor=white)](https://instagram.com/iqbolshoh_777)
[![X](https://img.shields.io/badge/X-000000?style=for-the-badge&logo=x&logoColor=white)](https://x.com/iqbolshoh_777)
[![YouTube](https://img.shields.io/badge/YouTube-FF0000?style=for-the-badge&logo=youtube&logoColor=white)](https://www.youtube.com/@Iqbolshoh_777)

</div>
