<?php
session_start();
include_once "../../model/Offre.class.php";

$offre = new Offre();
try {
    $liste_offres = $offre->liste();
} catch (Exception $e) {
    $error = $e->getMessage();
}

$title = "Liste des offres";
$role = 'etudiant';

include '../layout/header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="page-header">
        <h1>Liste des offres</h1>
    </div>

    <div class="page-content">

        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if(empty($liste_offres)): ?>
            <div class="alert alert-info" style="text-align:center;">
                Aucune offre disponible pour le moment.
            </div>
        <?php else: ?>
            <section class="list" style="display:flex; flex-wrap:wrap; gap:20px;">
                <?php foreach($liste_offres as $o): ?>
                    <article class="list-item" style="flex:1 1 300px; border:1px solid #ddd; border-radius:8px; padding:15px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                        <h3 style="margin-bottom:10px; color:#333;"><?= htmlspecialchars($o['titre']) ?></h3>
                        <p style="margin-bottom:10px; color:#666;">
                            <?= htmlspecialchars($o['domaine']) ?> • Durée: <?= htmlspecialchars($o['duree']) ?> mois
                        </p>
                        <p style="margin-bottom:15px; color:#666;">
                            Places disponibles: <?= htmlspecialchars($o['nombre_places']) ?><br>
                            Expiration: <?= htmlspecialchars($o['date_expiration']) ?>
                        </p>
                        <a class="btn btn-info" href="detail_offre.php?id=<?= $o['id'] ?>" style="display:inline-block;">Voir le détail</a>
                    </article>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

    </div>
</div>

<?php include '../layout/footer.php'; ?>
