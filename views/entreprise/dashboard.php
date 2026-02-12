<?php $title = "Entreprise – Dashboard"; $role = 'entreprise'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Tableau de bord</h1>
        <p>Vue d’ensemble des offres et candidatures</p>
    </div>
    <div class="page-content">
        <section class="cards-grid">
            <div class="card">
                <h3>Offres publiées</h3>
                <p>Total et statut</p>
            </div>
            <div class="card">
                <h3>Candidatures reçues</h3>
                <p>En attente, acceptées, refusées</p>
            </div>
            <div class="card">
                <h3>Stagiaires</h3>
                <p>En cours et terminés</p>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
