<?php $title = "Entreprise – Profil";
$role = 'entreprise'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Profil</h1>
    </div>
    <div class="page-content">
        <section class="form-section">
            <div class="form-row">
                <label>Nom de l’entreprise</label>
                <input class="input" type="text" name="nom_entreprise" placeholder="Nom de l’entreprise" />
            </div>
            <div class="form-row">
                <label>Adresse</label>
                <textarea class="textarea" name="adresse" placeholder="Adresse complète"></textarea>
            </div>
            <div class="form-row">
                <label>Contact</label>
                <input class="input" type="tel" name="contact" placeholder="Téléphone ou email" />
            </div>
            <div class="actions">
                <a class="btn" href="#">Enregistrer</a>
            </div>
        </section>
    </div>
</div>

<?php include '../layout/footer.php'; ?>