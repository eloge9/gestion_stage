<?php
require_once 'Utilisateur.php';

class Entreorise extends Utilisateur
{
    private $entrepriseId;
    private $matriculeEntreprise;
    private $nomEntreprise;
    private $domaineActivite;
    private $siteWeb;
    private $description;
    private $logo;

  public function __construct()
  {
    parent::__construct();
    $this->typeUtilisateur = 'entreprise';
  }

  // geetters et setters spécifique a entreprise

    public function getEntrepriseId() { return $this->entrepriseId; }
    public function getMatriculeEntreprise() { return $this->matriculeEntreprise; }
    public function setMatriculeEntreprise($matricule) { $this->matriculeEntreprise = $matricule; }

    public function getNomEntreprise() { return $this->nomEntreprise; }
    public function setNomEntreprise($nom) { $this->nomEntreprise = $nom; }

    public function getDomaineActivite() { return $this->domaineActivite; }
    public function setDomaineActivite($domaine) { $this->domaineActivite = $domaine; }

    public function getSiteWeb() { return $this->siteWeb; }
    public function setSiteWeb($site) { $this->siteWeb = $site; }

    public function getDescription() { return $this->description; }
    public function setDescription($desc) { $this->description = $desc; }

    public function getLogo() { return $this->logo; }
    public function setLogo($logo) { $this->logo = $logo; }

  // methode pour ajouter un entreuprise
  public function ajouter_entreprise()
    {
        try {
            $this->conn->beginTransaction();

            // Ajouter utilisateur
            $utilisateurId = $this->ajouter_utilisateur();

            // Générer un matricule si non défini
            if (!$this->matriculeEntreprise) {
                $this->matriculeEntreprise = uniqid('ENT_');
            }

            // Ajouter entreprise
            $stmt = $this->conn->prepare(
                "INSERT INTO entreprise 
                 (utilisateur_id, matricule_entreprise, nom_entreprise, domaine_activite, site_web, description, logo)
                 VALUES (:utilisateur_id, :matricule_entreprise, :nom_entreprise, :domaine_activite, :site_web, :description, :logo)"
            );
            $stmt->execute([
                ':utilisateur_id' => $utilisateurId,
                ':matricule_entreprise' => $this->matriculeEntreprise,
                ':nom_entreprise' => $this->nomEntreprise,
                ':domaine_activite' => $this->domaineActivite,
                ':site_web' => $this->siteWeb,
                ':description' => $this->description,
                ':logo' => $this->logo
            ]);

            $this->conn->commit();

            $this->entrepriseId = $this->conn->lastInsertId();
            return $this->entrepriseId;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur ajout entreprise: " . $e->getMessage());
            return false;
        }
    }

    // modifier une entreprise
    public function modifier_entreprise($id_utilisateur)
    {
        try {
            $this->conn->beginTransaction();

            // Modifier utilisateur
            $this->modifier_utilisateur($id_utilisateur);

            // Modifier entreprise
            $stmt = $this->conn->prepare(
                "UPDATE entreprise 
                 SET matricule_entreprise = :matricule_entreprise,
                     nom_entreprise = :nom_entreprise,
                     domaine_activite = :domaine_activite,
                     site_web = :site_web,
                     description = :description,
                     logo = :logo
                 WHERE utilisateur_id = :utilisateur_id"
            );
            $stmt->execute([
                ':matricule_entreprise' => $this->matriculeEntreprise,
                ':nom_entreprise' => $this->nomEntreprise,
                ':domaine_activite' => $this->domaineActivite,
                ':site_web' => $this->siteWeb,
                ':description' => $this->description,
                ':logo' => $this->logo,
                ':utilisateur_id' => $id_utilisateur
            ]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur modification entreprise: " . $e->getMessage());
            return false;
        }
    }

    // surpime un entreprise
    public function supprimer_entreprise()
    {
        try {
            $this->conn->beginTransaction();

            // supprime utilisateur
            $this->supprimer_utilisateur();

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erreur suppression entreprise: " . $e->getMessage());
            return false;
        }
    }

    // charger une entreuprise
    public function charger_entreprise($id_utilisateur)
    {
        try {
            $stmt = $this->conn->prepare(
                "SELECT u.*, e.* 
                 FROM utilisateur u
                 JOIN entreprise e ON e.utilisateur_id = u.id
                 WHERE u.id = :id"
            );
            $stmt->execute([':id' => $id_utilisateur]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
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

                // Entreprise
                $this->entrepriseId = $data['id'];
                $this->matriculeEntreprise = $data['matricule_entreprise'];
                $this->nomEntreprise = $data['nom_entreprise'];
                $this->domaineActivite = $data['domaine_activite'];
                $this->siteWeb = $data['site_web'];
                $this->description = $data['description'];
                $this->logo = $data['logo'];
            } else {
                throw new Exception("Entreprise non trouvée");
            }
        } catch (Exception $e) {
            error_log("Erreur chargement entreprise: " . $e->getMessage());
            return false;
        }
    }

    // liste entreuprise
    public function liste_entreprises()
    {
        try {
            $stmt = $this->conn->query(
                "SELECT u.*, e.* 
                 FROM utilisateur u
                 JOIN entreprise e ON e.utilisateur_id = u.id
                 WHERE u.type_utilisateur='entreprise'"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur liste entreprises: " . $e->getMessage());
            return [];
        }
    }

}