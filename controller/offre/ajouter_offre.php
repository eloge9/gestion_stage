<?php
session_start();
include_once "../../model/Offre.class.php";
include_once "../../model/config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {

        $offre = new Offre();


        $offre->setEntrepriseId($_SESSION['id']); 

        $offre->setTitre($_POST['titre']);
        $offre->setDomaine($_POST['domaine']);
        $offre->setPertinence($_POST['pertinence'] ?? null);
        $offre->setDuree((int)$_POST['duree']);
        $offre->setDateExpiration($_POST['date_expiration']);
        $offre->setNombrePlaces((int)($_POST['nombre_places'] ?? 1));
        $offre->setDescription($_POST['description']);
        $offre->setStatut('active');

        $id = $offre->ajouter();

        $_SESSION['success'] = "Offre publiée avec succès (ID: $id)";
        
        header("Location: ../../views/entreprise/liste_offres.php");
        exit();

    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../../views/entreprise/creer_offre.php");
        exit();
    }
} else {
    header("Location: ../../views/entreprise/creer_offre.php");
    exit();
}
