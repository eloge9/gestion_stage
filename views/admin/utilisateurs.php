<?php $title = "Admin – Gestion des utilisateurs"; $role = 'admin'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Gestion des utilisateurs</h1>
    </div>
    <div class="page-content">
        <section class="toolbar">
            <a class="btn" href="#">Créer un utilisateur</a>
            <a class="btn" href="#">Exporter</a>
        </section>

        <section class="table">
            <div class="table-header">
                <span>Liste des utilisateurs</span>
            </div>
            <div class="table-body">
                <!-- tableau prêt pour backend -->
                <div class="table-row">
                    <div class="table-cell">Nom</div>
                    <div class="table-cell">Email</div>
                    <div class="table-cell">Rôle</div>
                    <div class="table-cell">Statut</div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
