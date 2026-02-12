<?php $title = "Encadreur – Suivi de stage";
$role = 'encadreur'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Suivi de stage</h1>
    </div>
    <div class="page-content">
        <section class="form-section">
            <div class="form-row">
                <label>Étudiant</label>
                <select class="select" name="etudiant">
                    <option value="">Sélectionnez un étudiant</option>
                    <option>Étudiant A</option>
                    <option>Étudiant B</option>
                </select>
            </div>
            <div class="form-row">
                <label>Observation</label>
                <textarea class="textarea" name="observation" placeholder="Observations du suivi"></textarea>
            </div>
            <div class="form-row">
                <label>Recommandations</label>
                <textarea class="textarea" name="recommandations" placeholder="Recommandations pour l’étudiant"></textarea>
            </div>
            <div class="actions">
                <a class="btn" href="#">Enregistrer</a>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>