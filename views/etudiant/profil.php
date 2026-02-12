<?php $title = "Étudiant – Profil";
$role = 'etudiant'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Profil</h1>
    </div>
    <div class="page-content">
        <section class="form-section">
            <div class="form-row">
                <label>Nom</label>
                <input class="input" type="text" name="nom" placeholder="Entrez votre nom" />
            </div>
            <div class="form-row">
                <label>Prénom</label>
                <input class="input" type="text" name="prenom" placeholder="Entrez votre prénom" />
            </div>
            <div class="form-row">
                <label>Filière</label>
                <input class="input" type="text" name="filiere" placeholder="Ex: Informatique" />
            </div>
            <div class="form-row">
                <label>Niveau</label>
                <select class="select" name="niveau">
                    <option value="">Sélectionnez votre niveau</option>
                    <option>Licence 1</option>
                    <option>Licence 2</option>
                    <option>Licence 3</option>
                    <option>Master 1</option>
                    <option>Master 2</option>
                </select>
            </div>
            <div class="actions">
                <a class="btn" href="#">Enregistrer</a>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>