<?php
$title = "Choisir Type d'Utilisateur";
ob_start();
?>

<div class="flex min-h-svh w-full flex-col bg-[#EEF1F9] dark:bg-background">

    <div class="min-h-screen bg-background flex items-center overflow-hidden w-full">
        <div class="min-h-screen basis-full flex flex-wrap w-full justify-center overflow-y-auto">

            <!-- LEFT SECTION -->
            <div class="basis-1/2 w-full relative hidden xl:flex justify-center items-center
                        bg-gradient-to-br from-primary-600 via-primary-400 to-primary-600">
                <img src="../../assets/app/images/auth/line.png" alt="image"
                     class="absolute top-0 left-0 w-full h-full" />

                <div
                    class="relative z-10 backdrop-blur bg-primary-foreground/40 py-14 px-16
                           2xl:py-[84px] 2xl:pl-[50px] 2xl:pr-[136px] rounded max-w-[640px]">
                    <div>
                        <div class="text-4xl leading-[50px] 2xl:text-6xl 2xl:leading-[72px] font-semibold mt-2.5">
                            <span class="text-default-600 dark:text-default-300">
                                Créez <br /> votre compte <br />
                            </span>
                            <span class="text-default-900 dark:text-default-50">
                                NanaStage
                            </span>
                        </div>
                        <div class="mt-5 2xl:mt-8 text-default-900 dark:text-default-200 text-2xl font-medium">
                            Sélectionnez votre type d’utilisateur
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SECTION -->
            <div
                class="h-screen overflow-y-auto basis-full md:basis-1/2 w-full px-4 py-5
                       flex justify-center items-center">
                <div class="lg:w-[480px]">

                    <div class="w-full">
                        <a class="inline-block" href="../../index.php">
                            <span class="text-3xl font-bold text-primary">
                                    <img src="../../assets/app/images/logo/logo.png" alt="logo" width="120"/>
                                </span>
                        </a>

                        <div class="mt-6 text-2xl font-bold text-default-900">
                            Bienvenue !
                        </div>
                        <div class="text-base text-default-600 mt-2 mb-6">
                            Sélectionnez votre type d’utilisateur pour continuer
                        </div>

                        <!-- TYPES UTILISATEURS -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <a href="register_etudiant.php"
                               class="block p-6 bg-background border border-default-300 rounded-lg shadow hover:border-primary transition transform hover:-translate-y-1 hover:scale-105 text-default-900 dark:text-default-50">
                                <div class="text-xl font-semibold mb-1">Étudiant(e)</div>
                                <p class="text-default-600 text-sm">Créer un compte étudiant pour gérer vos stages.</p>
                            </a>

                            <a href="register_entreprise.php"
                               class="block p-6 bg-background border border-default-300 rounded-lg shadow hover:border-primary transition transform hover:-translate-y-1 hover:scale-105 text-default-900 dark:text-default-50">
                                <div class="text-xl font-semibold mb-1">Entreprise</div>
                                <p class="text-default-600 text-sm">Créer un compte entreprise pour publier des stages.</p>
                            </a>

                            <a href="register_encadreur.php"
                               class="block p-6 bg-background border border-default-300 rounded-lg shadow hover:border-primary transition transform hover:-translate-y-1 hover:scale-105 text-default-900 dark:text-default-50">
                                <div class="text-xl font-semibold mb-1">Encadreur</div>
                                <p class="text-default-600 text-sm">Créer un compte encadreur pour superviser les étudiants.</p>
                            </a>

                            <a href="register_admin.php"
                               class="block p-6 bg-background border border-default-300 rounded-lg shadow hover:border-primary transition transform hover:-translate-y-1 hover:scale-105 text-default-900 dark:text-default-50">
                                <div class="text-xl font-semibold mb-1">Administrateur</div>
                                <p class="text-default-600 text-sm">Créer un compte administrateur pour gérer la plateforme.</p>
                            </a>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/base.php';
?>
