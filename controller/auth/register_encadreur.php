<?php

require_once '../model/Encadreur.class.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $encadreur = new Encadreur();
    $encadreur->setNom($_POST['nom']);
    $encadreur->setPrenom($_POST['prenom']);
    $encadreur->setDomaineActivite($_POST['domaine_activite']);
    $encadreur->setNomUniversite($_POST['nom_universite']);
    $encadreur->setDepartement($_POST['departement']);
    $encadreur->setPoste($_POST['poste']);
    $encadreur->setGrade($_POST['grade']);
    $encadreur->setStatut('actif');
    $encadreur->setEmail($_POST['email']);
    $encadreur->setMotDePasse($_POST['mot_de_passe']);
    $encadreur->setNumeroTelephone($_POST['numero_telephone']);
    $encadreur->setAdresse($_POST['addresse']);
    $encadreur->ajouter_encadreur();

    header("Location: ../../view/auth/login.php");
    exit();
}
