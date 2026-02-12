<?php $title = "Admin – Dashboard"; $role = 'admin'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Tableau de bord</h1>
        <p>Statistiques globales du système de stages</p>
    </div>
    <div class="page-content">
        <section class="cards-grid">
            <div class="card">
                <h3>Utilisateurs</h3>
                <p>Nombre total, actifs/inactifs</p>
            </div>
            <div class="card">
                <h3>Offres</h3>
                <p>Offres publiées et en cours</p>
            </div>
            <div class="card">
                <h3>Stages</h3>
                <p>Stages en cours et terminés</p>
            </div>
            <div class="card">
                <h3>Candidatures</h3>
                <p>En attente, acceptées, refusées</p>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
