<?php $title = "Entreprise – Créer une offre";
$role = 'entreprise'; ?>
<?php include '../layout/header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <h1>Créer une offre</h1>
    </div>
    <div class="page-content">
        <form method="POST" action="../../controller/offre/ajouter_offre.php">
            <section class="form-section">
                <div class="form-row">
                    <label>Titre</label>
                    <input class="input" type="text" name="titre" placeholder="Titre de l’offre" required />
                </div>

                <div class="form-row">
                    <label>Domaine</label>
                    <input class="input" type="text" name="domaine" placeholder="Ex: Informatique, Marketing..." required />
                </div>

                <div class="form-row">
                    <label>Pertinence</label>
                    <input class="input" type="text" name="pertinence" placeholder="Ex: Stage de fin d’études" />
                </div>

                <div class="form-row">
                    <label>Durée (en mois)</label>
                    <input class="input" type="number" name="duree" placeholder="Ex: 3" required />
                </div>

                <div class="form-row">
                    <label>Date d'expiration</label>
                    <input class="input" type="date" name="date_expiration" required />
                </div>

                <div class="form-row">
                    <label>Nombre de places</label>
                    <input class="input" type="number" name="nombre_places" placeholder="Ex: 1" value="1" min="1" />
                </div>

                <div class="form-row">
                    <label>Description</label>
                    <textarea class="textarea" name="description" placeholder="Description détaillée de l’offre" required></textarea>
                </div>
            </section>

            <div class="actions">
                <button type="submit" class="btn">Publier</button>
            </div>
        </form>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
