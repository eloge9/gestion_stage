<?php
$title = "Accueil";

ob_start();
?>


<?php
$content = ob_get_clean();

require __DIR__ . '/base.php';