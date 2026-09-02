<?php
/**
 * Dashboard Page
 * Main landing page with stat cards and overview
 */

include './header.php';

// Mock dashboard statistics - replace with actual data
$stats = [
    [
        "value" => "1,234",
        "label" => "Total Users",
        "icon" => "fas fa-users",
        "color" => "bg-primary",
        "url" => "#"
    ],
    [
        "value" => "$45,678",
        "label" => "Total Revenue",
        "icon" => "fas fa-dollar-sign",
        "color" => "bg-success",
        "url" => "#"
    ],
    [
        "value" => "567",
        "label" => "New Orders",
        "icon" => "fas fa-shopping-cart",
        "color" => "bg-warning",
        "url" => "#"
    ],
    [
        "value" => "89",
        "label" => "Unique Visitors",
        "icon" => "fas fa-chart-pie",
        "color" => "bg-danger",
        "url" => "#"
    ]
];
?>

<!-- Dashboard Statistics -->
<div class="row dashboard-row">
    <?php foreach ($stats as $stat): ?>
        <div class="col-lg-3 col-6">
            <div class="small-box <?= htmlspecialchars($stat['color']) ?>">
                <div class="inner">
                    <h3><?= htmlspecialchars($stat['value']) ?></h3>
                    <p><?= htmlspecialchars($stat['label']) ?></p>
                </div>
                <div class="icon">
                    <i class="<?= htmlspecialchars($stat['icon']) ?>"></i>
                </div>
                <a href="<?= htmlspecialchars($stat['url']) ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Additional Dashboard Sections -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dashboard Overview</h3>
            </div>
            <div class="card-body">
                <p>Welcome to the Admin Panel. This is your main dashboard where you can view key metrics and access various admin functions.</p>
                <p>Use the sidebar menu to navigate to different sections of the admin panel.</p>
                <div class="alert alert-info">
                    <strong>Note:</strong> This is a template. Replace mock data with real data from your database.
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
