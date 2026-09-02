<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);

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

$active_pageInfo = null;
foreach ($menuItems as $menuItem) {
    foreach ($menuItem['pages'] as $page) {
        if ($currentPage === $page['url']) {
            $active_pageInfo = [
                "breadcrumb_Items" => [
                    ["title" => "Home", "url" => "index.php"],
                    ["title" => $menuItem['menuTitle'], "url" => "#"],
                    ["title" => $page['title'], "url" => $page['url']]
                ],
                "page_title" => $page['title'],
                "active_menu" => $menuItem,
                "active_page" => $page
            ];
            break 2;
        }
    }
}

$breadcrumb_Items = $active_pageInfo['breadcrumb_Items'] ?? [["title" => "Home", "url" => "index.php"]];
$page_title = $active_pageInfo['page_title'] ?? 'Dashboard';
$active_menu = $active_pageInfo['active_menu'] ?? null;
$active_page = $active_pageInfo['active_page'] ?? null;

// Mock user data - replace with actual session data
$user_name = isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Ilhomjonov Iqbolshoh';
$user_email = isset($_SESSION['user_email']) ? htmlspecialchars($_SESSION['user_email']) : 'user@example.com';
$user_profile_picture = isset($_SESSION['user_profile_picture']) ? htmlspecialchars($_SESSION['user_profile_picture']) : './src/images/profile_picture/default.png';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Professional Admin Dashboard">
    <meta name="author" content="Admin Panel Team">
    <title><?= htmlspecialchars($page_title . ' - Admin Panel') ?></title>
    <link rel="icon" href="./favicon.ico" type="image/x-icon">

    <!-- Third-party CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./src/css/layout.css" rel="stylesheet">
    <link href="./src/css/menu.css" rel="stylesheet">
    <link href="./src/css/breadcrumb.css" rel="stylesheet">
    <link href="./src/css/navbar.css" rel="stylesheet">
    <link href="./src/css/dashboard.css" rel="stylesheet">

    <!-- Third-party Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Body started -->
    <div class="wrapper">
        <!-- Wrapper started -->

        <!-- Main Header / Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" role="button" title="Toggle sidebar">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="./index.php" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Search form -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" name="search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit" title="Search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown -->
                <li class="nav-item dropdown d-none d-md-inline-block">
                    <a class="nav-link" href="#" data-toggle="dropdown" title="Messages">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">2</span>
                    </a>
                </li>

                <!-- Notifications Dropdown -->
                <li class="nav-item dropdown d-none d-md-inline-block">
                    <a class="nav-link" href="#" data-toggle="dropdown" title="Notifications">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">5</span>
                    </a>
                </li>

                <!-- User Account Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" role="button" aria-expanded="false" title="User menu">
                        <img src="<?= $user_profile_picture ?>" alt="User" class="img-circle elevation-2" style="width: 32px; height: 32px; object-fit: cover;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User Info Header -->
                        <div class="user-dropdown-header">
                            <div class="user-image">
                                <img src="<?= $user_profile_picture ?>" alt="User" class="img-circle">
                            </div>
                            <div class="user-info">
                                <span class="user-name"><?= $user_name ?></span>
                                <span class="user-email"><?= $user_email ?></span>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>
                        <a href="./profile.php" class="dropdown-item">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0);" class="dropdown-item logout-btn" id="logout-btn" role="button" tabindex="0">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Page Title & Breadcrumbs -->
        <div class="main-header" style="padding: 10px; background-color: #f4f6f9; border-bottom: 1px solid #dee2e6;">
            <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?= htmlspecialchars($page_title) ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <?php foreach ($breadcrumb_Items as $index => $item):
                                $isLast = ($index === count($breadcrumb_Items) - 1);
                            ?>
                                <li class="breadcrumb-item <?= $isLast ? 'active' : '' ?>">
                                    <?php if (!$isLast): ?>
                                        <a href="<?= htmlspecialchars($item['url']) ?>"><?= htmlspecialchars($item['title']) ?></a>
                                    <?php else: ?>
                                        <?= htmlspecialchars($item['title']) ?>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand/Logo -->
            <a href="./index.php" class="brand-link">
                <img src="./src/images/logo.svg" alt="Logo" class="brand-image img-circle bg-white">
                <span class="brand-text font-weight-light">Admin Panel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3">
                    <a href="./profile.php" class="d-flex">
                        <div class="image">
                            <img src="<?= $user_profile_picture ?>" class="img-circle elevation-2 bg-white" alt="User Image" style="width: 40px; height: 40px; object-fit: cover;">
                        </div>
                        <div class="info">
                            <?= htmlspecialchars($user_name) ?>
                        </div>
                    </a>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <?php foreach ($menuItems as $menuItem): ?>
                            <li class="nav-item has-treeview <?= ($menuItem === $active_menu) ? 'menu-open' : '' ?>">
                                <a class="nav-link <?= ($menuItem === $active_menu) ? 'active' : '' ?>" href="#" role="button">
                                    <i class="nav-icon <?= htmlspecialchars($menuItem['icon']) ?>"></i>
                                    <p>
                                        <?= htmlspecialchars($menuItem['menuTitle']) ?>
                                        <?= !empty($menuItem['pages']) ? '<i class="right fas fa-angle-left"></i>' : '' ?>
                                    </p>
                                </a>
                                <?php if (!empty($menuItem['pages'])): ?>
                                    <ul class="nav nav-treeview">
                                        <?php foreach ($menuItem['pages'] as $page): ?>
                                            <li class="nav-item">
                                                <a href="<?= htmlspecialchars($page['url']) ?>" class="nav-link <?= ($page === $active_page) ? 'active' : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p><?= htmlspecialchars($page['title']) ?></p>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content section -->
            <section class="content">
                <div class="container-fluid">