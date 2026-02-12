<?php $title = "Admin – Gestion des offres"; $role = 'admin'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Gestion des offres</h1>
    </div>
    <div class="page-content">
        <section class="toolbar">
            <a class="btn" href="#">Publier une offre</a>
            <a class="btn" href="#">Importer</a>
        </section>

        <section class="list">
            <div class="list-header">Offres publiées</div>
            <div class="list-body">
                <!-- liste prête pour backend -->
                <article class="list-item">
                    <h3>Titre de l’offre</h3>
                    <p>Entreprise • Statut</p>
                </article>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
