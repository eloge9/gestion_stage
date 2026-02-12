<?php
$title = "Inscription Entreprise";
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

                <div class="relative z-10 backdrop-blur bg-primary-foreground/40 py-14 px-16
                           2xl:py-[84px] 2xl:pl-[50px] 2xl:pr-[136px] rounded max-w-[640px]">
                    <div>
                        <div class="text-4xl leading-[50px] 2xl:text-6xl 2xl:leading-[72px] font-semibold mt-2.5">
                            <span class="text-default-50">
                                Inscription <br /> Entreprise <br />
                            </span>
                            <span class="text-primary-100">
                                NanaStage
                            </span>
                        </div>
                        <div class="mt-5 2xl:mt-8 text-default-900 dark:text-default-200 text-2xl font-medium">
                            Trouvez et gérez <br />
                            vos stagiaires
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SECTION -->
            <div class="h-screen overflow-y-auto basis-full md:basis-1/2 w-full px-4 py-5
                       flex justify-center items-center">
                <div class="lg:w-[480px]">

                    <div class="w-full">
                        <a class="inline-block" href="../../index.php">
                            <span class="text-3xl font-bold text-primary">
                                <img src="../../assets/app/images/logo/logo.png" alt="logo" width="120" />
                            </span>
                        </a>

                        <div class="mt-6 text-2xl font-bold text-primary">
                            Bienvenue Entreprise
                        </div>
                        <div class="text-base text-default-600 mt-2">
                            Créez le compte de votre entreprise
                        </div>

                        <!-- FORM ENTREPRISE -->
                        <form action="../../controller/auth/register_entreprise.php" method="POST" enctype="multipart/form-data" class="mt-6 space-y-4">
                            <input type="hidden" name="type_utilisateur" value="entreprise" />

                            <!-- Informations du compte -->
                            <div class="text-base font-semibold text-default-900 mt-2">Informations du compte</div>
                            <div class="space-y-4 border border-default-200 rounded-xl p-4 bg-background">

                                <!-- E-mail & Téléphone -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="text-sm font-medium text-default-600 mb-2 block">E-mail professionnel</label>
                                        <input type="email" name="email" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3
                                               text-base text-default-500 focus:outline-none focus:border-primary"
                                            placeholder="contact@entreprise.com">
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-default-600 mb-2 block">Téléphone</label>
                                        <input type="tel" name="numero_telephone" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3
                                               text-base text-default-500 focus:outline-none focus:border-primary"
                                            placeholder="+229 00 00 00 00">
                                    </div>
                                </div>

                                <!-- Adresse -->
                                <div>
                                    <label class="text-sm font-medium text-default-600 mb-2 block">
                                        Adresse
                                    </label>
                                    <textarea name="adresse" class="w-full bg-background border border-default-300 rounded-lg min-h-24 px-3 py-3
                                           text-base text-default-500 focus:outline-none focus:border-primary"
                                        placeholder="Adresse de l’entreprise"></textarea>
                                </div>

                                <!-- Mot de passe -->
                                <div>
                                    <label class="text-sm font-medium text-default-600 mb-2 block">
                                        Mot de passe
                                    </label>
                                    <input type="password" name="mot_de_passe" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3
                                           text-base text-default-500 focus:outline-none focus:border-primary"
                                        placeholder="Mot de passe sécurisé">
                                </div>

                                <!-- Informations spécifiques à l’entreprise -->
                                <div class="text-base font-semibold text-default-900 mt-4">Informations spécifiques à l’entreprise</div>
                                <div class="space-y-4 border border-default-200 rounded-xl p-4 bg-background">

                                    <!-- Matricule & Nom entreprise -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-sm font-medium text-default-600 mb-2 block">Matricule de l’entreprise</label>
                                            <input type="text" name="matricule_entreprise" class="w-full bg-background border border-default-300 rounded-lg h-12 px-3
                                               text-base text-default-500 focus:outline-none focus:border-primary"
                                                placeholder="Matricule de l’entreprise">
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-default-600 mb-2 block">Nom de l’entreprise</label>
                                            <input type="text" name="nom_entreprise" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3
                                               text-base text-default-500 focus:outline-none focus:border-primary"
                                                placeholder="Nom de l’entreprise">
                                        </div>
                                    </div>

                                    <!-- Domaine & Site web -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-sm font-medium text-default-600 mb-2 block">Domaine d’activité</label>
                                            <select name="domaine_activite" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3
                                               text-base text-default-500 focus:outline-none focus:border-primary">
                                                <option value="">Sélectionnez un domaine</option>
                                                <option>Informatique</option>
                                                <option>BTP</option>
                                                <option>Finance</option>
                                                <option>Énergie</option>
                                                <option>Agroalimentaire</option>
                                                <option>Éducation</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-default-600 mb-2 block">Site web</label>
                                            <input type="url" name="site_web" class="w-full bg-background border border-default-300 rounded-lg h-12 px-3
                                               text-base text-default-500 focus:outline-none focus:border-primary"
                                                placeholder="https://entreprise.com">
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div>
                                        <label class="text-sm font-medium text-default-600 mb-2 block">
                                            Description
                                        </label>
                                        <textarea name="description" class="w-full bg-background border border-default-300 rounded-lg min-h-24 px-3 py-3
                                           text-base text-default-500 focus:outline-none focus:border-primary"
                                            placeholder="Présentation de l’entreprise"></textarea>
                                    </div>

                                    <!-- Logo -->
                                    <div>
                                        <label class="text-sm font-medium text-default-600 mb-2 block">
                                            Logo
                                        </label>
                                        <input type="file" name="logo" class="w-full bg-background border border-default-300 rounded-lg h-12 px-3
                                           text-base text-default-500 focus:outline-none focus:border-primary" />
                                    </div>

                                    <!-- Submit -->
                                    <button type="submit" class="inline-flex items-center justify-center font-semibold
                                       bg-primary text-primary-foreground hover:bg-primary/80
                                       h-11 rounded-md px-6 w-full">
                                        Inscrire l’entreprise
                                    </button>

                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/base.php';
