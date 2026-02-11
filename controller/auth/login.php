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
    header("Location: ../../view/admin/base_admin.php");
    if ($user['type_utilisateur'] == 'admin') {
        $admin = new Admin();
        $admin->connection_admin($user);
    } elseif ($user['type_utilisateur'] == 'etudiant') {
        $etudiant = new $etudiant();
        $etudiant->connection_etudiant($user);
    } elseif ($user['type_utilisateur'] == 'entreprise') {
        header("Location: ../../view/entreprise/dashboard.php");
        exit();
    } elseif ($user['type_utilisateur'] == 'encadreur') {
        header("Location: ../../view/entreprise/dashboard.php");
        exit();
    } else {
        echo "Type d'utilisateur inconnu.";
    }
}