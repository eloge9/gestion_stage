<?php
$title = "Accueil";

ob_start();
?>
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content text-center">
                        <p class="text-uppercase">
                            Plateforme centralisée de gestion des stages
                        </p>
                        <h2 class="text-uppercase mt-4 mb-4">
                            Connecter Étudiants, Entreprises et Encadreurs
                        </h2>
                        <p class="mb-5">
                            Recherchez un stage, publiez des offres et suivez l'avancement des stagiaires
                            dans un seul et même système.
                        </p>
                        <div>
                            <a href="#etudiants" class="primary-btn2 mb-3 mb-sm-0">Je suis étudiant</a>
                            <a href="#entreprises" class="primary-btn ml-sm-3 ml-0">Je suis une entreprise</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature_area section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="main_title">
                    <h2 class="mb-3">Pourquoi ce système de gestion des stages&nbsp;?</h2>
                    <p>
                        Remplacez les lettres papier, les fichiers Excel et les échanges dispersés
                        par une plateforme unique, claire et structurée pour tous les acteurs du stage.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_feature" id="etudiants">
                    <div class="icon"><span class="flaticon-student"></span></div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">Espace Étudiant</h4>
                        <p>
                            Création de compte, dépôt de CV et lettres, recherche et postulation
                            rapide aux offres, suivi de l'état des candidatures et carnet de bord numérique.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_feature" id="entreprises">
                    <div class="icon"><span class="flaticon-earth"></span></div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">Espace Entreprise</h4>
                        <p>
                            Publication d'offres de stage, consultation des profils, téléchargement des
                            documents des candidats et gestion du statut des candidatures (accepté, refusé, en cours).
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_feature" id="encadreurs">
                    <div class="icon"><span class="flaticon-book"></span></div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">Espace Encadreur</h4>
                        <p>
                            Suivi des étudiants en stage, consultation des carnets hebdomadaires,
                            validation des activités et génération assistée de la note de stage.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="popular_courses">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="main_title">
                    <h2 class="mb-3">Un parcours de stage simplifié</h2>
                    <p>
                        De la recherche d’offre à la génération du rapport et de la note finale,
                        le système accompagne chaque étape du stage.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_course">
                    <div class="course_content">
                        <span class="tag mb-3 d-inline-block">Étudiant</span>
                        <h4 class="mb-3">
                            Créer son profil et déposer ses documents
                        </h4>
                        <p>
                            L’étudiant crée son compte, renseigne sa filière, son niveau, son établissement
                            et ajoute son CV ainsi que ses lettres de motivation prêtes à être utilisées.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_course">
                    <div class="course_content">
                        <span class="tag mb-3 d-inline-block">Entreprise</span>
                        <h4 class="mb-3">
                            Publier des offres et sélectionner des stagiaires
                        </h4>
                        <p>
                            Les entreprises décrivent leurs besoins (durée, compétences, localisation)
                            et gèrent les candidatures reçues directement depuis la plateforme.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_course">
                    <div class="course_content">
                        <span class="tag mb-3 d-inline-block">Encadreur</span>
                        <h4 class="mb-3">
                            Suivre l’avancement et évaluer le stage
                        </h4>
                        <p>
                            L’encadreur consulte le carnet de bord, valide les tâches réalisées
                            et finalise la note de stage générée à partir des informations du système.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="registration_area section_gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="mb-3">Centraliser toutes les informations de stage</h1>
                        <p>
                            Fini les documents perdus, les suivis par mails éparpillés et les
                            tableaux Excel compliqués. La plateforme offre une vue globale sur
                            les stages en cours, les candidatures et les évaluations.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="register_form">
                    <h3>Commencer dès maintenant</h3>
                    <p>Choisissez votre profil pour accéder à l’application.</p>
                    <div class="row">
                        <div class="col-lg-12 form_group text-center">
                            <a href="views/auth/login.php" class="primary-btn d-block mb-3">Se connecter</a>
                            <a href="views/auth/register.php" class="primary-btn2 d-block">Créer un compte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();

require __DIR__ . '/base.php';
