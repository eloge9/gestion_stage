<?php
include_once "config/db.php";

class Offre
{
    private $id;
    private $entreprise_id;
    private $titre;
    private $description;
    private $domaine;
    private $pertinence;
    private $duree;
    private $date_publication;
    private $date_expiration;
    private $nombre_places;
    private $statut;

    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEntrepriseId()
    {
        return $this->entreprise_id;
    }

    public function setEntrepriseId($entreprise_id)
    {
        $this->entreprise_id = $entreprise_id;
    }


    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDomaine()
    {
        return $this->domaine;
    }

    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;
    }

    public function getPertinence()
    {
        return $this->pertinence;
    }

    public function setPertinence($pertinence)
    {
        $this->pertinence = $pertinence;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    public function getDatePublication()
    {
        return $this->date_publication;
    }

    public function setDatePublication($date_publication)
    {
        $this->date_publication = $date_publication;
    }

    public function getDateExpiration()
    {
        return $this->date_expiration;
    }

    public function setDateExpiration($date_expiration)
    {
        $this->date_expiration = $date_expiration;
    }

    public function getNombrePlaces()
    {
        return $this->nombre_places;
    }

    public function setNombrePlaces($nombre_places)
    {
        $this->nombre_places = $nombre_places;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    // les methodes

    // methode pour ajouter une offre
    public function ajouter()
    {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO offre 
                (entreprise_id, titre, description, domaine, pertinence, duree, date_expiration, nombre_places, statut)
                VALUES 
                (:entreprise_id, :titre, :description, :domaine, :pertinence, :duree, :date_expiration, :nombre_places, :statut)"
            );

            $stmt->execute([
                ':entreprise_id' => $this->entreprise_id,
                ':titre' => $this->titre,
                ':description' => $this->description,
                ':domaine' => $this->domaine,
                ':pertinence' => $this->pertinence,
                ':duree' => $this->duree,
                ':date_expiration' => $this->date_expiration,
                ':nombre_places' => $this->nombre_places ?? 1,
                ':statut' => $this->statut ?? 'active'
            ]);

            $this->id = $this->conn->lastInsertId();
            return $this->id;

        } catch (Exception $e) {
            error_log("Erreur ajout offre: " . $e->getMessage());
            throw new Exception("Impossible d'ajouter l'offre");
        }
    }

    public function supprimer()
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM offre WHERE id = :id");
            $stmt->execute([':id' => $this->id]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur suppression offre: " . $e->getMessage());
            throw new Exception("Impossible de supprimer l'offre");
        }
    }

    // methode pour modifier une offre
    public function modifier_offre($id)
    {
        try {
            $stmt = $this->conn->prepare(
                "UPDATE offre SET 
                    entreprise_id = :entreprise_id,
                    titre = :titre,
                    description = :description,
                    domaine = :domaine,
                    pertinence = :pertinence,
                    duree = :duree,
                    date_expiration = :date_expiration,
                    nombre_places = :nombre_places,
                    statut = :statut
                 WHERE id = :id"
            );

            $stmt->execute([
                ':entreprise_id' => $this->entreprise_id,
                ':titre' => $this->titre,
                ':description' => $this->description,
                ':domaine' => $this->domaine,
                ':pertinence' => $this->pertinence,
                ':duree' => $this->duree,
                ':date_expiration' => $this->date_expiration,
                ':nombre_places' => $this->nombre_places,
                ':statut' => $this->statut,
                ':id' => $this->id
            ]);

            return true;
        } catch (Exception $e) {
            error_log("Erreur modification offre: " . $e->getMessage());
            throw new Exception("Impossible de modifier l'offre");
        }
    }   

    // methode pour charger une offre
    public function charger()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM offre WHERE id = :id");
            $stmt->execute([':id' => $this->id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                $this->entreprise_id = $data['entreprise_id'];
                $this->titre = $data['titre'];
                $this->description = $data['description'];
                $this->domaine = $data['domaine'];
                $this->pertinence = $data['pertinence'];
                $this->duree = $data['duree'];
                $this->date_publication = $data['date_publication'];
                $this->date_expiration = $data['date_expiration'];
                $this->nombre_places = $data['nombre_places'];
                $this->statut = $data['statut'];
            } else {
                throw new Exception("Offre non trouvée");
            }
        } catch (Exception $e) {
            error_log("Erreur chargement offre: " . $e->getMessage());
            throw new Exception("Impossible de charger l'offre");
        }
    }

    // methode pour lister les offres
    public function liste()
    {
        try {
            $stmt = $this->conn->prepare(
                "SELECT * FROM offre 
                WHERE statut = 'active' 
                AND (date_expiration IS NULL OR date_expiration >= CURDATE())
                ORDER BY date_publication DESC"
            );
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur liste offres actives: " . $e->getMessage());
            throw new Exception("Impossible de récupérer la liste des offres actives");
        }
    }

    public function listeParEntreprise()
    {

        try {
            $stmt = $this->conn->prepare(
                "SELECT * FROM offre WHERE entreprise_id = :entreprise_id ORDER BY date_publication DESC"
            );
            $stmt->execute([':entreprise_id' => $this->entreprise_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur liste offres par entreprise: " . $e->getMessage());
            throw new Exception("Impossible de récupérer les offres pour cette entreprise");
        }
    }

    
}
