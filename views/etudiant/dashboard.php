<?php $title = "Étudiant – Dashboard"; $role = 'etudiant'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Tableau de bord</h1>
        <p>Résumé du parcours de stage</p>
    </div>
    <div class="page-content">
        <section class="cards-grid">
            <div class="card">
                <h3>Offres disponibles</h3>
                <p>Consultez et postulez</p>
            </div>
            <div class="card">
                <h3>Candidatures</h3>
                <p>Suivez vos statuts</p>
            </div>
            <div class="card">
                <h3>Carnet</h3>
                <p>Renseignez vos activités</p>
            </div>
            <div class="card">
                <h3>Rapport</h3>
                <p>Préparez votre rapport</p>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
