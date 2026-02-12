<?php

require_once "../../model/Entreprise.class.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entreprise = new Entreprise();
    $entreprise->setNomEntreprise($_POST['nom_entreprise']);
    $entreprise->setEmail($_POST['email']);
    $entreprise->setMotDePasse($_POST['mot_de_passe']);
    $entreprise->setNumeroTelephone($_POST['numero_telephone']);
    $entreprise->setAdresse($_POST['adresse']);
    $entreprise->setDomaineActivite($_POST['domaine_activite']);
    $entreprise->setSiteWeb($_POST['site_web']);
    $entreprise->setDescription($_POST['description']);
    $entreprise->setLogo(isset($_FILES['logo']['name']) ? $_FILES['logo']['name'] : null);
    $entreprise->setStatut('actif');

    $entreprise->ajouter_entreprise();

    header("Location: ../../view/auth/login.php");
    exit();
}
