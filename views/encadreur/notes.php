<?php $title = "Encadreur – Notes"; $role = 'encadreur'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Notes</h1>
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
                <label>Note technique</label>
                <input class="input" type="number" name="note_technique" min="0" max="20" step="0.5" placeholder="0 à 20" />
            </div>
            <div class="form-row">
                <label>Note comportement</label>
                <input class="input" type="number" name="note_comportement" min="0" max="20" step="0.5" placeholder="0 à 20" />
            </div>
            <div class="form-row">
                <label>Note finale</label>
                <input class="input" type="number" name="note_finale" min="0" max="20" step="0.5" placeholder="0 à 20" />
            </div>
            <div class="actions">
                <a class="btn" href="#">Enregistrer</a>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
