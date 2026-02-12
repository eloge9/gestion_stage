<?php

include_once "../../model/Etudiant.class.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $etudiant = new Etudiant();
    $etudiant->setNom($_POST['nom']);
    $etudiant->setPrenom($_POST['prenom']);
    $etudiant->setEmail($_POST['email']);
    $etudiant->setMotDePasse($_POST['mot_de_passe']);
    $etudiant->setNumeroTelephone($_POST['numero_telephone']);
    $etudiant->setAdresse($_POST['adresse']);
    $etudiant->setStatut("actif");
    $etudiant->setFiliere($_POST['filiere']);
    $etudiant->setNiveauEtude($_POST['niveau_etude']);
    $etudiant->setPhotoProfil(isset($_FILES['photo_profil']['name']) ? $_FILES['photo_profil']['name'] : null);
    $etudiant->setDateNaissance($_POST['date_naissance']);
    $etudiant->ajouter_etudiant();

    header("Location: ../../view/auth/login.php");
    exit();
}

