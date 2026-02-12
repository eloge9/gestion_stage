<?php
require_once "../../model/config/db.php";
require_once "../../model/Utilisateur.class.php";
require_once "../../model/Etudiant.class.php";
require_once "../../model/Admin.class.php";
require_once "../../model/Entreprise.class.php";
require_once "../../model/Encadreur.class.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $utilisateur = new Utilisateur();
    $utilisateur->setEmail($_POST['email']);
    $utilisateur->setMotPasse($_POST['password']);


    $user = $utilisateur->connection();

    if ($user['type_utilisateur'] == 'admin') {
        $admin = new Admin();
        $admin->connection_admin($user);
    } elseif ($user['type_utilisateur'] == 'etudiant') {
        $etudiant = new Etudiant();
        $etudiant->connection_etudiant($user);
    } elseif ($user['type_utilisateur'] == 'entreprise') {
        $entreprise = new Entreprise();
        $entreprise->connection_entreprise($user);
    } elseif ($user['type_utilisateur'] == 'encadreur') {
        $encadreur = new Encadreur();
        $encadreur->connection_encadreur($user);
    } else {
        echo "Type d'utilisateur inconnu.";
    }
}