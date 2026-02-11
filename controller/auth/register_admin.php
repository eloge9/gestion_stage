<?php

require_once "../../model/Admin.class.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin = new Admin();

    $admin->setNom($_POST["nom"]);
    $admin->setPrenom($_POST["prenom"]);
    $admin->setEmail($_POST["email"]);
    $admin->setAdresse($_POST["addresse"]);
    $admin->setNumeroTelephone($_POST["numero_telephone"]);
    $admin->setMotDePasse($_POST["password"]);
    $admin->setRole($_POST["role"]);
    $admin->setStatut("Actif");


    $admin->ajouter_admin();

    header("Location: ../../views/admin/liste_admin.php");
    exit();
}
