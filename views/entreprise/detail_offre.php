<?php
session_start();
include_once "../../model/Offre.class.php";


$offre_id = (int)$_GET['id'];

$offre = new Offre();

try {
    $offre->setId($offre_id);
    $offre->charger();
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

$title = "Détails de l'offre";

include '../layout/header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="page-header">
        <h1>Détails de l'offre</h1>
        <a class="btn btn-secondary" href="liste_offres.php">Retour</a>
    </div>

    <div class="page-content">
        <div class="card" style="padding: 20px; max-width: 800px; margin: auto; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 8px;">
            <h2 style="margin-bottom: 20px; text-align:center; color:#333;"><?= htmlspecialchars($offre->getTitre()) ?></h2>
            
            <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                <div style="flex: 1 1 45%;"><strong>Domaine:</strong> <?php echo htmlspecialchars($offre->getDomaine()) ?></div>
                <div style="flex: 1 1 45%;"><strong>Pertinence:</strong> <?php echo htmlspecialchars($offre->getPertinence()) ?></div>
                <div style="flex: 1 1 45%;"><strong>Durée:</strong> <?php echo htmlspecialchars($offre->getDuree()) ?> mois</div>
                <div style="flex: 1 1 45%;"><strong>Nombre de places:</strong> <?php echo htmlspecialchars($offre->getNombrePlaces()) ?></div>
                <div style="flex: 1 1 45%;"><strong>Date publication:</strong> <?php echo htmlspecialchars($offre->getDatePublication()) ?></div>
                <div style="flex: 1 1 45%;"><strong>Date expiration:</strong> <?php echo htmlspecialchars($offre->getDateExpiration()) ?></div>
                <div style="flex: 1 1 45%;"><strong>Statut:</strong> <?php echo htmlspecialchars($offre->getStatut()) ?></div>
            </div>

            <div style="margin-top: 20px;">
                <h3>Description</h3>
                <p style="line-height: 1.6; color:#555;"><?php echo nl2br(htmlspecialchars($offre->getDescription())) ?></p>
            </div>

            <div class="actions" style="margin-top: 25px; display: flex; gap: 10px;">
                <a class="btn btn-primary" href="modifier_offre.php?id=<?= $offre->getId() ?>">Modifier</a>
                <a class="btn btn-danger" href="supprimer_offre.php?id=<?= $offre->getId() ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette offre ?')">Supprimer</a>
            </div>
        </div>
    </div>
</div>


<?php include '../layout/footer.php'; ?>
