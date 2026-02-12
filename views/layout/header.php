<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Nanastage – Système de Gestion des Stages" />
    <meta name="keywords" content="stage, gestion, etudiant, entreprise, encadreur, admin" />
    <meta name="author" content="Nanastage" />
    <title><?php echo isset($title) ? $title : "Nanastage"; ?></title>
    <link rel="icon" href="/gestion_stage/assets/app/images/favicon.png" type="image/png" />
    <link rel="stylesheet" href="/gestion_stage/assets/app/css/app.css" />
    <link rel="stylesheet" href="/gestion_stage/assets/app/css/structure.css" />
    <?php
    $dashboardByRole = [
        'admin' => '/gestion_stage/views/admin/dashboard.php',
        'etudiant' => '/gestion_stage/views/etudiant/dashboard.php',
        'entreprise' => '/gestion_stage/views/entreprise/dashboard.php',
        'encadreur' => '/gestion_stage/views/encadreur/dashboard.php',
    ];
    $homeLink = '/gestion_stage/index.php';
    if (isset($role) && isset($dashboardByRole[$role])) {
        $homeLink = $dashboardByRole[$role];
    }
    $showLogout = isset($role);
    ?>
</head>

<body class="theme-dark">
    <header class="app-header">
        <div class="container">
            <a href="<?php echo $homeLink; ?>" class="brand">
                <img src="/gestion_stage/assets/app/images/logo/logo.png" alt="Nanastage" class="brand-logo" />
                <span class="brand-name">Nanastage</span>
            </a>
            <nav class="top-nav">
                <ul class="top-nav-list">
                    <li><a class="btn-outline" href="<?php echo $homeLink; ?>">Accueil</a></li>
                    <?php if ($showLogout) { ?>
                        <li><a class="btn" href="/gestion_stage/logout.php">Se déconnecter</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>
    <div class="app-shell">