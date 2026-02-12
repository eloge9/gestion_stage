<?php $title = "Encadreur – Dashboard"; $role = 'encadreur'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Tableau de bord</h1>
        <p>Vue d’ensemble de votre suivi</p>
    </div>
    <div class="page-content">
        <section class="cards-grid">
            <div class="card">
                <h3>Étudiants suivis</h3>
                <p>Total et progression</p>
            </div>
            <div class="card">
                <h3>Carnets à valider</h3>
                <p>Semaine en cours</p>
            </div>
            <div class="card">
                <h3>Notes</h3>
                <p>Évaluations en attente</p>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
