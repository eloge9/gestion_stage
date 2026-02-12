<?php $title = "Étudiant – Rapport de stage"; $role = 'etudiant'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Rapport de stage</h1>
    </div>
    <div class="page-content">
        <section class="form-section">
            <div class="form-row">
                <label>Titre du rapport</label>
                <input class="input" type="text" name="titre" placeholder="Titre du rapport" />
            </div>
            <div class="form-row">
                <label>Résumé</label>
                <textarea class="textarea" name="resume" placeholder="Résumé du rapport"></textarea>
            </div>
            <div class="form-row">
                <label>Contenu</label>
                <textarea class="textarea" name="contenu" placeholder="Contenu principal"></textarea>
            </div>
            <div class="actions">
                <a class="btn" href="#">Enregistrer</a>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
