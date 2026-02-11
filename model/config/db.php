<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
class Database
{
  public static function getConnection()
  {
    try {
      $db = new PDO(
        "mysql:host=localhost;dbname=gestion_stages;charset=utf8mb4",
        "root",
        "eloge16king2"
      );
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      return $db;
    } catch (PDOException $e) {
      echo "Erreur de connection " . $e->getMessage();
      return null;
    }
  }
}