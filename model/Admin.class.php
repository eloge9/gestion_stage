<?php

require_once 'Utilisateur.class.php';

class Admin extends Utilisateur
{
    private $adminId;
    private $nom;
    private $prenom;
    private $role;

    public function __construct()
    {
        parent::__construct();
        $this->typeUtilisateur = 'admin';
    }

    // methode qui veirfi si c'est un damin
    private function verifierAdmin()
    {
        if (
            !isset($_SESSION['utilisateur']) ||
            $_SESSION['utilisateur']['type'] !== 'admin'
        ) {
            throw new Exception("pas d'accès, vous devez être connecté en tant qu'administrateur");
        }
    }

    // getteur et seet
    public function getAdminId()
    {
        return $this->adminId;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    // methode pour ajouter un admmin
    public function ajouter_admin()
    {
        try {
            $this->verifierAdmin();

            $this->conn->beginTransaction();

            // creation de l'utiliateur
            $utilisateurId = $this->ajouter_utilisateur();

            // ajout de 'l'admin
            $stmt = $this->conn->prepare(
                "INSERT INTO admin (utilisateur_id, nom, prenom, role)
                 VALUES (:utilisateur_id, :nom, :prenom, :role)"
            );

            $stmt->execute([
                ':utilisateur_id' => $utilisateurId,
                ':nom' => $this->nom,
                ':prenom' => $this->prenom,
                ':role' => $this->role ?? 'administrateur'
            ]);

            $this->conn->commit();
            $this->adminId = $this->conn->lastInsertId();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur ajout admin: " . $e->getMessage());
            return false;
        }
    }

    // methode pour modifierun admin
    public function modifier_admin($id_utilisateur)
    {
        try {
            $this->verifierAdmin();

            $this->conn->beginTransaction();

            // modifier utilisateur
            $this->modifier_utilisateur($id_utilisateur);

            // modifier admin
            $stmt = $this->conn->prepare(
                "UPDATE admin SET nom=:nom, prenom=:prenom, role=:role
                 WHERE utilisateur_id=:utilisateur_id"
            );

            $stmt->execute([
                ':nom' => $this->nom,
                ':prenom' => $this->prenom,
                ':role' => $this->role,
                ':utilisateur_id' => $id_utilisateur
            ]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur modification admin: " . $e->getMessage());
            return false;
        }
    }

    // methode pour supprimer un admin
    public function supprimer_admin($id_utilisateur)
    {
        try {
            $this->verifierAdmin();

            // ne ps que l'admin se suprimme lui meme
            if ($_SESSION['utilisateur']['id'] == $id_utilisateur) {
                throw new Exception("Un admin ne peut pas se supprimer lui-même");
            }

            $this->conn->beginTransaction();

            // suprimer l'admin
            $this->supprimer_utilisateur();

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur suppression  de l'admin: " . $e->getMessage());
            return false;
        }
    }

    // methode pour charger un admin
    public function charger_admin($id_utilisateur)
    {
        try {
            $stmt = $this->conn->prepare(
                "SELECT u.*, a.*
                 FROM utilisateur u
                 JOIN admin a ON a.utilisateur_id = u.id
                 WHERE u.id = :id"
            );
            $stmt->execute([':id' => $id_utilisateur]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$data) {
                throw new Exception("Admin non trouvé");
            }

            // utilisateur
            $this->id = $data['id'];
            $this->email = $data['email'];
            $this->numeroTelephone = $data['numero_telephone'];
            $this->adresse = $data['adresse'];
            $this->typeUtilisateur = $data['type_utilisateur'];
            $this->statut = $data['statut'];

            // admin
            $this->adminId = $data['id'];
            $this->nom = $data['nom'];
            $this->prenom = $data['prenom'];
            $this->role = $data['role'];

            return true;
        } catch (Exception $e) {
            error_log("Erreur chargement admin: " . $e->getMessage());
            return false;
        }
    }

    //  listes des admin
    public function liste_admins()
    {
        try {
            $this->verifierAdmin();

            $stmt = $this->conn->query(
                "SELECT u.*, a.*
                 FROM utilisateur u
                 JOIN admin a ON a.utilisateur_id = u.id"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur liste admins: " . $e->getMessage());
            return [];
        }
    }

    public function connection_admin($user)
    {
        try {

            $stmt = $this->conn->prepare("SELECT * FROM admin WHERE utilisateur_id = :utilisateur_id");
            $stmt->execute([':utilisateur_id' => $user['id']]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] =  $admin['id'];
            $_SESSION['nom'] =  $admin['nom'];
            $_SESSION['prenom'] =  $admin['prenom'];
            $_SESSION['role'] =  $admin['role'];
            $_SESSION['type'] =  $admin['type_utilisateur'];
            $_SESSION['statut'] =  $admin['statut'];
            header("Location: ../../views/admin/index.php");
            exit();
        } catch (Exception $e) {
            error_log("Erreur connection admin: " . $e->getMessage());
            throw new Exception("Impossible de se connecter en tant qu'administrateur");
        }
    }
}
