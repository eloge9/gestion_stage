<?php

require_once 'Utilisateur.class.php';

class Encadreur extends Utilisateur
{
    private $encadreurId;
    private $nom;
    private $prenom;
    private $domaineActivite;
    private $nomUniversite;
    private $departement;
    private $poste;
    private $grade;

    public function __construct()
    {
        parent::__construct();
        $this->typeUtilisateur = 'encadreur';
    }

    // les geeteur et setters
    public function getEncadreurId()
    {
        return $this->encadreurId;
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

    public function getDomaineActivite()
    {
        return $this->domaineActivite;
    }
    public function setDomaineActivite($domaine)
    {
        $this->domaineActivite = $domaine;
    }

    public function getNomUniversite()
    {
        return $this->nomUniversite;
    }
    public function setNomUniversite($universite)
    {
        $this->nomUniversite = $universite;
    }

    public function getDepartement()
    {
        return $this->departement;
    }
    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }

    public function getPoste()
    {
        return $this->poste;
    }
    public function setPoste($poste)
    {
        $this->poste = $poste;
    }

    public function getGrade()
    {
        return $this->grade;
    }
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    // methode pour ajouter un encadreure
    public function ajouter_encadreur()
    {
        try {
            $this->conn->beginTransaction();

            // ajout de l' utilisateur
            $utilisateurId = $this->ajouter_utilisateur();

            // ajouter  encadreur
            $stmt = $this->conn->prepare(
                "INSERT INTO encadreur
                 (utilisateur_id, nom, prenom, domaine_activite, nom_universite, departement, poste, grade)
                 VALUES
                 (:utilisateur_id, :nom, :prenom, :domaine_activite, :nom_universite, :departement, :poste, :grade)"
            );

            $stmt->execute([
                ':utilisateur_id' => $utilisateurId,
                ':nom' => $this->nom,
                ':prenom' => $this->prenom,
                ':domaine_activite' => $this->domaineActivite,
                ':nom_universite' => $this->nomUniversite,
                ':departement' => $this->departement,
                ':poste' => $this->poste,
                ':grade' => $this->grade
            ]);

            $this->conn->commit();
            $this->encadreurId = $this->conn->lastInsertId();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur ajout encadreur: " . $e->getMessage());
            return false;
        }
    }

    // methode pour modifier un encadreure
    public function modifier_encadreur($id_utilisateur)
    {
        try {
            $this->conn->beginTransaction();

            // modifier l'utilisateur
            $this->modifier_utilisateur($id_utilisateur);

            // modifier l"ncadreur
            $stmt = $this->conn->prepare(
                "UPDATE encadreur SET
                    nom = :nom,
                    prenom = :prenom,
                    domaine_activite = :domaine_activite,
                    nom_universite = :nom_universite,
                    departement = :departement,
                    poste = :poste,
                    grade = :grade
                 WHERE utilisateur_id = :utilisateur_id"
            );

            $stmt->execute([
                ':nom' => $this->nom,
                ':prenom' => $this->prenom,
                ':domaine_activite' => $this->domaineActivite,
                ':nom_universite' => $this->nomUniversite,
                ':departement' => $this->departement,
                ':poste' => $this->poste,
                ':grade' => $this->grade,
                ':utilisateur_id' => $id_utilisateur
            ]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur modification encadreur: " . $e->getMessage());
            return false;
        }
    }

    // supprimer un encadreur
    public function supprimer_encadreur()
    {
        try {
            $this->conn->beginTransaction();

            // supprimer utilisateur
            $this->supprimer_utilisateur();

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur suppression encadreur: " . $e->getMessage());
            return false;
        }
    }

    // charger juste un encadreure 
    public function charger_encadreur($id_utilisateur)
    {
        try {
            $stmt = $this->conn->prepare(
                "SELECT u.*, e.*
                 FROM utilisateur u
                 JOIN encadreur e ON e.utilisateur_id = u.id
                 WHERE u.id = :id"
            );
            $stmt->execute([':id' => $id_utilisateur]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$data) {
                throw new Exception("Encadreur non trouvé");
            }

            // Utilisateur
            $this->id = $data['id'];
            $this->email = $data['email'];
            $this->numeroTelephone = $data['numero_telephone'];
            $this->adresse = $data['adresse'];
            $this->motDePasse = $data['mot_de_passe'];
            $this->typeUtilisateur = $data['type_utilisateur'];
            $this->dateCreation = $data['date_creation'];
            $this->dateModification = $data['date_modification'];
            $this->statut = $data['statut'];

            // Encadreur
            $this->encadreurId = $data['id'];
            $this->nom = $data['nom'];
            $this->prenom = $data['prenom'];
            $this->domaineActivite = $data['domaine_activite'];
            $this->nomUniversite = $data['nom_universite'];
            $this->departement = $data['departement'];
            $this->poste = $data['poste'];
            $this->grade = $data['grade'];

            return true;
        } catch (Exception $e) {
            error_log("Erreur chargement encadreur: " . $e->getMessage());
            return false;
        }
    }

    // liste de tous les encadreurs
    public function liste_encadreurs()
    {
        try {
            $stmt = $this->conn->query(
                "SELECT u.*, e.*
                 FROM utilisateur u
                 JOIN encadreur e ON e.utilisateur_id = u.id
                 WHERE u.type_utilisateur = 'encadreur'"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur liste encadreurs: " . $e->getMessage());
            return [];
        }
    }

    public function connection_entreprise($user)
    {
        try {

            $stmt = $this->conn->prepare("SELECT * FROM encadreur WHERE utilisateur_id = :utilisateur_id");
            $stmt->execute([':utilisateur_id' => $user['id']]);
            $encadreur = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['utilisateur'] = [
                'id' => $encadreur['id'],
                'email' => $encadreur['email'],
                'type' => $encadreur['type_utilisateur'],
                'nom' => $encadreur['nom'],
                'prenom' => $encadreur['prenom']
            ];
            header("Location: ../../views/encadreur/index.php");
            exit();
        } catch (Exception $e) {
            error_log("Erreur connection admin: " . $e->getMessage());
            throw new Exception("Impossible de se connecter en tant qu'administrateur");
        }
    }
}