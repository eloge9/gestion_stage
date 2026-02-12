<?php $title = "Admin – Gestion des stages"; $role = 'admin'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Gestion des stages</h1>
    </div>
    <div class="page-content">
        <section class="filters">
            <a class="btn" href="#">Stages en cours</a>
            <a class="btn" href="#">Stages terminés</a>
        </section>

        <section class="table">
            <div class="table-header">Liste des stages</div>
            <div class="table-body">
                <div class="table-row">
                    <div class="table-cell">Étudiant</div>
                    <div class="table-cell">Entreprise</div>
                    <div class="table-cell">Période</div>
                    <div class="table-cell">Statut</div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
