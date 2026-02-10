<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="NanaStage – Plateforme de gestion de stages" />
    <meta name="keywords" content="stage, gestion, etudiant, entreprise, encadreur, nanastage" />
    <meta name="author" content="NanaStage" />

    <title><?php echo $title ?? "NanaStage - Gestion de Stage"; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../../assets/app/images/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <style>
    [x-cloak] {
        display: none !important;
    }
    </style>

    <!-- App CSS -->
    <link rel="stylesheet" href="../../assets/app/css/app.css" />

    <!-- Alpine JS -->
    <script defer src="../../assets/app/js/alpine.js"></script>

    <!-- App JS -->
    <script src="../../assets/app/js/app.js"></script>
</head>

<body class="font-inter dash-tail-app" x-data :dir="$store.app.direction" x-bind:class="{
    'dark': $store.app.isDark, 
    ['theme-' + $store.app.theme]: true 
}">
    <?php echo $content; ?>
</body>
</html>
