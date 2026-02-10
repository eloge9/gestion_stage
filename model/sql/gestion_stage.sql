-- SCRIPT DE CRÉATION DES TABLES
-- PLATEFORME DE GESTION DE STAGES
-- GOMINA Eloge PHP

CREATE DATABASE IF NOT EXISTS gestion_stages;
USE gestion_stages;


-- TABLE: utilisateur


CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    numero_telephone VARCHAR(20),
    adresse TEXT,
    mot_de_passe VARCHAR(255) NOT NULL,
    type_utilisateur ENUM('etudiant', 'entreprise', 'encadreur', 'admin') NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    statut ENUM('actif', 'inactif', 'suspendu') DEFAULT 'actif',
    INDEX idx_email (email),
    INDEX idx_type (type_utilisateur)
);


-- TABLE: etudiant


CREATE TABLE etudiant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL UNIQUE,
    matricule VARCHAR(50) UNIQUE,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    filiere VARCHAR(100) NOT NULL,
    niveau_etude VARCHAR(50) NOT NULL,
    photo_profil VARCHAR(255),
    date_naissance DATE,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id) ON DELETE CASCADE,
    INDEX idx_filiere (filiere),
    INDEX idx_niveau (niveau_etude)
);


-- TABLE: entreprise


CREATE TABLE entreprise (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL UNIQUE,
    matricule_entreprise VARCHAR(50) UNIQUE,
    nom_entreprise VARCHAR(200) NOT NULL,
    domaine_activite VARCHAR(100) NOT NULL,
    site_web VARCHAR(255),
    description TEXT,
    logo VARCHAR(255),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id) ON DELETE CASCADE,
    INDEX idx_domaine (domaine_activite)
);


-- TABLE: encadreur


CREATE TABLE encadreur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL UNIQUE,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    domaine_activite VARCHAR(100) NOT NULL,
    nom_universite VARCHAR(200),
    departement VARCHAR(100),
    poste VARCHAR(100),
    grade VARCHAR(50),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id) ON DELETE CASCADE,
    INDEX idx_departement (departement)
);


-- TABLE: admin


CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL UNIQUE,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    role VARCHAR(50) DEFAULT 'administrateur',
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id) ON DELETE CASCADE
);


-- TABLE: offre


CREATE TABLE offre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    entreprise_id INT NOT NULL,
    titre VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    domaine VARCHAR(100) NOT NULL,
    pertinence VARCHAR(100),
    duree INT NOT NULL COMMENT 'Durée en mois',
    date_publication TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_expiration DATE,
    nombre_places INT DEFAULT 1,
    statut ENUM('active', 'expiree', 'pourvue', 'suspendue') DEFAULT 'active',
    FOREIGN KEY (entreprise_id) REFERENCES entreprise(id) ON DELETE CASCADE,
    INDEX idx_domaine (domaine),
    INDEX idx_statut (statut),
    INDEX idx_date_publication (date_publication)
);


-- TABLE: document


CREATE TABLE document (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    type ENUM('cv', 'lettre_motivation', 'piece_academique', 'rapport_stage', 'attestation', 'autre') NOT NULL,
    nom_fichier VARCHAR(255) NOT NULL,
    chemin_fichier VARCHAR(500) NOT NULL,
    format VARCHAR(10) NOT NULL,
    taille INT COMMENT 'Taille en Ko',
    date_generation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('en_attente', 'valide', 'rejete') DEFAULT 'en_attente',
    commentaire TEXT,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id) ON DELETE CASCADE,
    INDEX idx_type (type),
    INDEX idx_utilisateur (utilisateur_id)
);


-- TABLE: candidature


CREATE TABLE candidature (
    id INT AUTO_INCREMENT PRIMARY KEY,
    etudiant_id INT NOT NULL,
    offre_id INT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('en_attente', 'acceptee', 'refusee', 'retenue') DEFAULT 'en_attente',
    cv_id INT,
    lettre_motivation_id INT,
    commentaire_entreprise TEXT,
    FOREIGN KEY (etudiant_id) REFERENCES etudiant(id) ON DELETE CASCADE,
    FOREIGN KEY (offre_id) REFERENCES offre(id) ON DELETE CASCADE,
    FOREIGN KEY (cv_id) REFERENCES document(id) ON DELETE SET NULL,
    FOREIGN KEY (lettre_motivation_id) REFERENCES document(id) ON DELETE SET NULL,
    UNIQUE KEY unique_candidature (etudiant_id, offre_id),
    INDEX idx_statut (statut),
    INDEX idx_date (date)
);


-- TABLE: stage


CREATE TABLE stage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    etudiant_id INT NOT NULL,
    entreprise_id INT NOT NULL,
    encadreur_id INT,
    candidature_id INT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    statut ENUM('planifie', 'en_cours', 'termine', 'annule') DEFAULT 'planifie',
    note DECIMAL(5,2),
    appreciation TEXT,
    attestation_id INT,
    FOREIGN KEY (etudiant_id) REFERENCES etudiant(id) ON DELETE CASCADE,
    FOREIGN KEY (entreprise_id) REFERENCES entreprise(id) ON DELETE CASCADE,
    FOREIGN KEY (encadreur_id) REFERENCES encadreur(id) ON DELETE SET NULL,
    FOREIGN KEY (candidature_id) REFERENCES candidature(id) ON DELETE SET NULL,
    FOREIGN KEY (attestation_id) REFERENCES document(id) ON DELETE SET NULL,
    INDEX idx_statut (statut),
    INDEX idx_dates (date_debut, date_fin)
);


-- TABLE: carnet_note


CREATE TABLE carnet_note (
    id INT AUTO_INCREMENT PRIMARY KEY,
    stage_id INT NOT NULL,
    semaine INT NOT NULL,
    taches TEXT,
    progression TEXT,
    difficulte TEXT,
    remarque_etudiant TEXT,
    remarque_encadreur TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_validation TIMESTAMP NULL,
    statut ENUM('brouillon', 'soumis', 'valide', 'a_corriger') DEFAULT 'brouillon',
    FOREIGN KEY (stage_id) REFERENCES stage(id) ON DELETE CASCADE,
    UNIQUE KEY unique_semaine (stage_id, semaine),
    INDEX idx_stage (stage_id)
);


-- TABLE: message


CREATE TABLE message (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expediteur_id INT NOT NULL,
    destinataire_id INT NOT NULL,
    sujet VARCHAR(255),
    contenu TEXT NOT NULL,
    date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lu BOOLEAN DEFAULT FALSE,
    type ENUM('direct', 'notification', 'alerte') DEFAULT 'direct',
    FOREIGN KEY (expediteur_id) REFERENCES utilisateur(id) ON DELETE CASCADE,
    FOREIGN KEY (destinataire_id) REFERENCES utilisateur(id) ON DELETE CASCADE,
    INDEX idx_destinataire (destinataire_id, lu),
    INDEX idx_date (date_envoi)
);


-- INDEX SUPPLÉMENTAIRES


CREATE INDEX idx_candidature_etudiant_statut ON candidature(etudiant_id, statut);
CREATE INDEX idx_stage_etudiant_statut ON stage(etudiant_id, statut);
CREATE INDEX idx_document_utilisateur_type ON document(utilisateur_id, type);
CREATE INDEX idx_offre_entreprise_statut ON offre(entreprise_id, statut);
