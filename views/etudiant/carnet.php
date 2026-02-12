<?php $title = "Étudiant – Carnet de stage";
$role = 'etudiant'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Carnet de stage</h1>
    </div>
    <div class="page-content">
        <section class="form-section">
            <div class="form-row">
                <label>Semaine</label>
                <input class="input" type="week" name="semaine" />
            </div>
            <div class="form-row">
                <label>Activités réalisées</label>
                <textarea class="textarea" name="activites" placeholder="Décrivez les activités réalisées"></textarea>
            </div>
            <div class="form-row">
                <label>Compétences développées</label>
                <textarea class="textarea" name="competences" placeholder="Décrivez les compétences développées"></textarea>
            </div>
            <div class="actions">
                <a class="btn" href="#">Enregistrer</a>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>