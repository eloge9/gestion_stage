<?php
session_start();
include_once "../../model/Offre.class.php";
include_once "../../model/config/db.php";

$offre = new Offre();

$offre->setEntrepriseId($_SESSION['id']); 

try {
    $liste_offres = $offre->listeParEntreprise(); 
} catch (Exception $e) {
    $error = $e->getMessage();
}

$title = "Mes offres";
$role = 'entreprise';
include '../layout/header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="page-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h1>Mes offres</h1>
        <a class="btn btn-primary" href="creer_offre.php">Créer offre</a>
    </div>

    <div class="page-content">
        <?php if(empty($liste_offres)): ?>
            <div class="alert alert-info" style="max-width:600px; margin:auto; text-align:center;">
                Aucune offre trouvée.
            </div>
        <?php else: ?>
            <div class="card" style="padding:20px; box-shadow:0 2px 8px rgba(0,0,0,0.1); border-radius:8px; overflow-x:auto;">
                <table class="table" style="width:100%; border-collapse: collapse;">
                    <thead >
                        <tr>
                            <th style="padding:10px; text-align:left;">Titre</th>
                            <th style="padding:10px; text-align:left;">Domaine</th>
                            <th style="padding:10px;">Durée (mois)</th>
                            <th style="padding:10px;">Places</th>
                            <th style="padding:10px;">Date expiration</th>
                            <th style="padding:10px;">Statut</th>
                            <th style="padding:10px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($liste_offres as $o): ?>
                            <tr style="border-bottom:1px solid #ddd;">
                                <td style="padding:10px;"><?= htmlspecialchars($o['titre']) ?></td>
                                <td style="padding:10px;"><?= htmlspecialchars($o['domaine']) ?></td>
                                <td style="padding:10px; text-align:center;"><?= htmlspecialchars($o['duree']) ?></td>
                                <td style="padding:10px; text-align:center;"><?= htmlspecialchars($o['nombre_places']) ?></td>
                                <td style="padding:10px; text-align:center;"><?= htmlspecialchars($o['date_expiration']) ?></td>
                                <td style="padding:10px; text-align:center;">
                                    <?php 
                                        $color = match($o['statut']){
                                            'active' => 'green',
                                            'pourvue' => 'blue',
                                            'expiree' => 'red',
                                            'suspendue' => 'orange',
                                            default => 'grey'
                                        };
                                    ?>
                                    <span style="color:white; background-color:<?= $color ?>; padding:3px 8px; border-radius:5px; font-weight:bold; font-size:0.9em;">
                                        <?= htmlspecialchars($o['statut']) ?>
                                    </span>
                                </td>
                                    <td style="padding:10px; text-align:center;">
                                    <a class="btn btn-info" href="detail_offre.php?id=<?= $o['id'] ?>" style="margin: 2px;">Voir</a>
                                    <a class="btn btn-warning" href="modifier_offre.php?id=<?= $o['id'] ?>" style="margin: 2px;">Modifier</a>
                                    <a class="btn btn-danger" href="supprimer_offre.php?id=<?= $o['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette offre ?')" style="margin: 2px;">Supprimer</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>


<?php include '../layout/footer.php'; ?>
