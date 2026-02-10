<?php

require_once 'Utilisateur.php';

class Etudiant extends Utilisateur
{
  private $etudiantId;
  private $matricule;
  private $nom;
  private $prenom;
  private $filiere;
  private $niveauEtude;
  private $photoProfil;
  private $dateNaissance;

  public function __construct()
  {
    parent::__construct();
    $this->typeUtilisateur = 'etudiant';
  }

  // Getters et setters spécifique a etuudiant

  public function getEtudiantId() { return $this->etudiantId; }
  public function getMatricule() { return $this->matricule; }
  public function setMatricule($matricule) { $this->matricule = $matricule; }
  public function getNom() { return $this->nom; }
  public function setNom($nom) { $this->nom = $nom; }
  public function getPrenom() { return $this->prenom; }
  public function setPrenom($prenom) { $this->prenom = $prenom; }
  public function getFiliere() { return $this->filiere; }
  public function setFiliere($filiere) { $this->filiere = $filiere; }
  public function getNiveauEtude() { return $this->niveauEtude; }
  public function setNiveauEtude($niveauEtude) { $this->niveauEtude = $niveauEtude; }
  public function getPhotoProfil() { return $this->photoProfil; }
  public function setPhotoProfil($photoProfil) { $this->photoProfil = $photoProfil; }
  public function getDateNaissance() { return $this->dateNaissance; }
  public function setDateNaissance($date) { $this->dateNaissance = $date; }

 // methode pour ajouter un etudiant
  public function ajouter_etudiant()
    {
        try {
            $this->conn->beginTransaction();

            $utilisateurId = $this->ajouter_utilisateur();

            $stmt = $this->conn->prepare(
                "INSERT INTO etudiant (utilisateur_id, matricule, nom, prenom, filiere, niveau_etude, photo_profil, date_naissance)
                 VALUES (:utilisateur_id, :matricule, :nom, :prenom, :filiere, :niveau_etude, :photo_profil, :date_naissance)"
            );
            $stmt->execute([
                ':utilisateur_id' => $utilisateurId,
                ':matricule' => $this->matricule,
                ':nom' => $this->nom,
                ':prenom' => $this->prenom,
                ':filiere' => $this->filiere,
                ':niveau_etude' => $this->niveauEtude,
                ':photo_profil' => $this->photoProfil,
                ':date_naissance' => $this->dateNaissance
            ]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur ajout étudiant: " . $e->getMessage());
            throw new Exception("Impossible d'ajouter l'étudiant");
        }
    }

  // methode pour supprimer un etudiant
  public function supprimer_etudiant()
    {
        try {
            $this->conn->beginTransaction();

            // Supprimer l'étudiant
            $stmt = $this->conn->prepare("DELETE FROM etudiant WHERE id=:id");
            $stmt->execute([':id' => $this->etudiantId]);

            // Supprimer l'utilisateur
            $this->supprimer_utilisateur();

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur suppression étudiant: " . $e->getMessage());
            throw new Exception("Impossible de supprimer l'étudiant");
        }
    }

 // methode pour modifier un etudiant en fonction de son id utilisateur
  public function modifier_etudiant($id_utilisateur)
    {
        try {
            $this->conn->beginTransaction();

            $this->modifier_utilisateur($id_utilisateur);

            $stmt = $this->conn->prepare(
                "UPDATE etudiant 
                 SET matricule=:matricule, nom=:nom, prenom=:prenom, filiere=:filiere, niveau_etude=:niveau_etude, photo_profil=:photo_profil, date_naissance=:date_naissance
                 WHERE utilisateur_id=:utilisateur_id"
            );
            $stmt->execute([
                ':matricule' => $this->matricule,
                ':nom' => $this->nom,
                
                ':prenom' => $this->prenom,
                ':filiere' => $this->filiere,
                ':niveau_etude' => $this->niveauEtude,
                ':photo_profil' => $this->photoProfil,
                ':date_naissance' => $this->dateNaissance,
                ':utilisateur_id' => $id_utilisateur
            ]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur modification étudiant: " . $e->getMessage());
            throw new Exception("Impossible de modifier l'étudiant");
        }
    }

  // methode pour charger les données d'un etudiant avec les donner utilisateur

  public function charger_etudiant($id_utilisateur)
    {
        try {
            $stmt = $this->conn->prepare(
                "SELECT u.*, e.* 
                 FROM utilisateur u
                 JOIN etudiant e ON e.utilisateur_id = u.id
                 WHERE u.id = :id"
            );
            $stmt->execute([':id' => $id_utilisateur]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                // utilisateur
                $this->id = $data['id'];
                $this->email = $data['email'];
                $this->numeroTelephone = $data['numero_telephone'];
                $this->adresse = $data['adresse'];
                $this->motDePasse = $data['mot_de_passe'];
                $this->typeUtilisateur = $data['type_utilisateur'];
                $this->dateCreation = $data['date_creation'];
                $this->dateModification = $data['date_modification'];
                $this->statut = $data['statut'];

                // ertudiat
                $this->etudiantId = $data['id']; // id de la table etudiant
                $this->matricule = $data['matricule'];
                $this->nom = $data['nom'];
                $this->prenom = $data['prenom'];
                $this->filiere = $data['filiere'];
                $this->niveauEtude = $data['niveau_etude'];
                $this->photoProfil = $data['photo_profil'];
                $this->dateNaissance = $data['date_naissance'];
            } else {
                throw new Exception("Étudiant non trouvé");
            }
        } catch (Exception $e) {
            error_log("Erreur chargement étudiant: " . $e->getMessage());
            throw new Exception("Impossible de charger l'étudiant");
        }
    }

  // methode pour lister tout les etudiants avec leur donner utilisateur
  public function liste_etudiants()
    {
        try {
            $stmt = $this->conn->query(
                "SELECT u.*, e.* 
                 FROM utilisateur u
                 JOIN etudiant e ON e.utilisateur_id = u.id
                 WHERE u.type_utilisateur='etudiant'"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur liste étudiants: " . $e->getMessage());
            throw new Exception("Impossible de récupérer la liste des étudiants");
        }
    }
}
