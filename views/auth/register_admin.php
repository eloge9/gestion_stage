<?php
$title = "Inscription Admin";
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
                            <span class="text-default-600 dark:text-default-300">
                                Créer un <br /> Administrateur <br />
                            </span>
                            <span class="text-default-900 dark:text-default-50">
                                NanaStage
                            </span>
                        </div>
                        <div class="mt-5 2xl:mt-8 text-default-900 dark:text-default-200 text-2xl font-medium">
                            Espace réservé <br />
                            aux administrateurs
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
                            </span> </a>

                        <div class="mt-6 text-2xl font-bold text-default-900">
                            Création Admin
                        </div>
                        <div class="text-base text-default-600 mt-2">
                            Formulaire réservé aux administrateurs
                        </div>

                        <!-- FORM ADMIN -->
                        <form action="#" method="POST" class="mt-6 space-y-4">

                            <!-- Nom -->
                            <div>
                                <label class="text-sm font-medium text-default-600 mb-2 block">
                                    Nom
                                </label>
                                <input type="text" name="nom" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3 
                                           text-base text-default-500 focus:outline-none focus:border-primary"
                                    placeholder="Nom de l'administrateur">
                            </div>

                            <!-- Prénom -->
                            <div>
                                <label class="text-sm font-medium text-default-600 mb-2 block">
                                    Prénom
                                </label>
                                <input type="text" name="prenom" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3 
                                           text-base text-default-500 focus:outline-none focus:border-primary"
                                    placeholder="Prénom de l'administrateur">
                            </div>

                            <!-- addresse -->
                            <div>
                                <label class="text-sm font-medium text-default-600 mb-2 block">
                                    Addresse
                                </label>
                                <input type="text" name="addresse" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3 
                                           text-base text-default-500 focus:outline-none focus:border-primary"
                                    placeholder="Addresse de l'administrateur">
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="text-sm font-medium text-default-600 mb-2 block">
                                    E-mail
                                </label>
                                <input type="email" name="email" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3 
                                           text-base text-default-500 focus:outline-none focus:border-primary"
                                    placeholder="admin@nana-stage.com">
                            </div>

                            <!-- Téléphone -->
                            <div>
                                <label class="text-sm font-medium text-default-600 mb-2 block">
                                    Téléphone
                                </label>
                                <input type="tel" name="numero_telephone" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3 
                                           text-base text-default-500 focus:outline-none focus:border-primary"
                                    placeholder="+229 00 00 00 00">
                            </div>

                            <!-- Mot de passe -->
                            <div>
                                <label class="text-sm font-medium text-default-600 mb-2 block">
                                    Mot de passe
                                </label>
                                <input type="password" name="password" required class="w-full bg-background border border-default-300 rounded-lg h-12 px-3 
                                           text-base text-default-500 focus:outline-none focus:border-primary"
                                    placeholder="Mot de passe sécurisé">
                            </div>

                            <!-- Rôle -->
                            <div>
                                <label class="text-sm font-medium text-default-600 mb-2 block">
                                    Rôle
                                </label>
                                <select name="role" class="w-full bg-background border border-default-300 rounded-lg h-12 px-3 
                                           text-base text-default-500 focus:outline-none focus:border-primary">
                                    <option value="administrateur">Administrateur</option>
                                    <option value="super_admin">Super administrateur</option>
                                </select>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="inline-flex items-center justify-center font-semibold 
                                       bg-primary text-primary-foreground hover:bg-primary/80 
                                       h-11 rounded-md px-6 w-full">
                                Créer l’administrateur
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
