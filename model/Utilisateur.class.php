  <?php

class Utilisateur
{
  protected $id;
  protected $email;
  protected $numeroTelephone;
  protected $adresse;
  protected $motDePasse;
  protected $typeUtilisateur;
  protected $dateCreation;
  protected $dateModification;
  protected $statut;
  protected $conn;

  public function __construct()
  {
    $this->conn = Database::getConnection();
  }

   public function setId($id)
  {
    $this->id = $id;
  }

  // Getters et setterss
  public function getId()
  {
    return $this->id;
  }

  public function getEmail()
  {
    return $this->email;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }


  public function getNumeroTelephone()
  {
    return $this->numeroTelephone;
  }
  
  public function setNumeroTelephone($numeroTelephone)
  {
    $this->numeroTelephone = $numeroTelephone;
  }


  public function getAdresse()
  {
    return $this->adresse;
  }

  public function setAdresse($adresse)
  {
    $this->adresse = $adresse;
  }

  public function getTypeUtilisateur()
  {
    return $this->typeUtilisateur;
  }

  public function setTypeUtilisateur($typeUtilisateur)
  {
    $this->typeUtilisateur = $typeUtilisateur;
  }

  public function getDateCreation()
  {
    return $this->dateCreation;
  }

  public function getDateModification()
  {
    return $this->dateModification;
  }

  public function getStatut()
  {
    return $this->statut;
  }

  public function setStatut($statut)
  {
    $this->statut = $statut;
  }
  
  public function getMotDePasse()
  {
    return $this->motDePasse;
  }

  public function setMotDePasse($motDePasse)
  {
    $this->motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
  }

  // methode pour ajouter un utilisateur er renvoie l'id
  public function ajouter_utilisateur()
    {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO utilisateur (email, numero_telephone, adresse, mot_de_passe, type_utilisateur) 
                 VALUES (:email, :numero_telephone, :adresse, :mot_de_passe, :type_utilisateur)"
            );
            $stmt->execute([
                ':email' => $this->email,
                ':numero_telephone' => $this->numeroTelephone,
                ':adresse' => $this->adresse,
                ':mot_de_passe' => $this->motDePasse,
                ':type_utilisateur' => $this->typeUtilisateur
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            error_log("Erreur ajout utilisateur: " . $e->getMessage());
            throw new Exception("Impossible d'ajouter l'utilisateur");
        }
    }

  // methode pour supprimer un utilisateur
  public function supprimer_utilisateur()
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM utilisateur WHERE id = :id");
            $stmt->execute([':id' => $this->id]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur suppression utilisateur: " . $e->getMessage());
            throw new Exception("Impossible de supprimer l'utilisateur");
        }
    }

  // methode pour modifier un utilisateur
  public function modifier_utilisateur($id_utilisateur)
    {
        try {
            $stmt = $this->conn->prepare(
                "UPDATE utilisateur 
                 SET email = :email, numero_telephone = :numero_telephone, adresse = :adresse, mot_de_passe = :mot_de_passe, type_utilisateur = :type_utilisateur, statut = :statut
                 WHERE id = :id"
            );
            $stmt->execute([
                ':email' => $this->email,
                ':numero_telephone' => $this->numeroTelephone,
                ':adresse' => $this->adresse,
                ':mot_de_passe' => $this->motDePasse,
                ':type_utilisateur' => $this->typeUtilisateur,
                ':statut' => $this->statut,
                ':id' => $id_utilisateur
            ]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur modification utilisateur: " . $e->getMessage());
            throw new Exception("Impossible de modifier l'utilisateur");
        }
    }

  // methode pour charger un utilisateur
  public function charger_utilisateur($id_utilisateur)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE id = :id");
            $stmt->execute([':id' => $id_utilisateur]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                $this->id = $data['id'];
                $this->email = $data['email'];
                $this->numeroTelephone = $data['numero_telephone'];
                $this->adresse = $data['adresse'];
                $this->motDePasse = $data['mot_de_passe'];
                $this->typeUtilisateur = $data['type_utilisateur'];
                $this->dateCreation = $data['date_creation'];
                $this->dateModification = $data['date_modification'];
                $this->statut = $data['statut'];
            } else {
                throw new Exception("Utilisateur non trouvé");
            }
        } catch (Exception $e) {
            error_log("Erreur chargement utilisateur: " . $e->getMessage());
            throw new Exception("Impossible de charger l'utilisateur");
        }
    }

  // methode pour lister les utilisateurs
  public function liste_utilisateurs()
    {
        try {
            $stmt = $this->conn->query("SELECT * FROM utilisateur");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur liste utilisateurs: " . $e->getMessage());
            throw new Exception("Impossible de récupérer la liste des utilisateurs");
        }
    }
}
