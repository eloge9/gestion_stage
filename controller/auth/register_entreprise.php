<?php

require_once "../../model/Entreprise.class.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entreprise = new Entreorise();
    $entreprise->setNomEntreprise($_POST['nom']);
    $entreprise->setEmail($_POST['email']);
    $entreprise->setMotDePasse($_POST['password']);
    $entreprise->setNumeroTelephone($_POST['numero_telephone']);
    $entreprise->setAdresse($_POST['adresse']);
    $entreprise->setDomaineActivite($_POST['domaine_activite']);
    $entreprise->setSiteWeb($_POST['site_web']);
    $entreprise->setDescription($_POST['description']);
    $entreprise->setLogo($_FILES['logo']['name']);
    $entreprise->setStatut('actif');

    $entreprise->ajouter_entreprise();

    header("Location: ../../view/auth/login.php");
    exit();
}