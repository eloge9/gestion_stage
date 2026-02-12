<?php
session_start();
include_once "../../model/Offre.class.php";

$offreId = $_GET['id'];

$offre = new Offre();
$offre->setId($offreId);
try {
    $offre->charger();
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

$title = "Étudiant – Détail de l’offre";
$role = 'etudiant';
include '../layout/header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="page-header" style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Détail de l’offre</h1>
        <a class="btn btn-secondary" href="liste_offres.php">Retour</a>
    </div>

    <div class="page-content">
        <article class="offer-detail" style="max-width:800px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
            
            <!-- Titre -->
            <h2 style="margin-bottom:10px; color:#333;"><?php echo htmlspecialchars($offre->getTitre()); ?></h2>
            
            <!-- Infos principales -->
            <p style="color:#555; margin-bottom:20px;">
                <strong>Domaine :</strong> <?php echo htmlspecialchars($offre->getDomaine()); ?> <br>
                <strong>Durée :</strong> <?php echo htmlspecialchars($offre->getDuree()); ?> mois <br>
                <strong>Pertinence :</strong> <?php echo htmlspecialchars($offre->getPertinence()); ?> <br>
                <strong>Date publication :</strong> <?php echo htmlspecialchars($offre->getDatePublication()); ?> <br>
                <strong>Date expiration :</strong> <?php echo htmlspecialchars($offre->getDateExpiration()); ?> <br>
                <strong>Places disponibles :</strong> <?php echo htmlspecialchars($offre->getNombrePlaces()); ?>
            </p>

            <!-- Description -->
            <h3>Description</h3>
            <p style="line-height:1.6; color:#555;"><?php echo nl2br(htmlspecialchars($offre->getDescription())); ?></p>

            <!-- Actions -->
            <div class="actions" style="margin-top:25px; display:flex; gap:10px; justify-content:center;">
                <a class="btn btn-success" href="postuler_offre.php?id=<?php echo $offre->getId(); ?>">Postuler</a>
                <a class="btn btn-secondary" href="liste_offres.php">Retour à la liste</a>
            </div>
        </article>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
