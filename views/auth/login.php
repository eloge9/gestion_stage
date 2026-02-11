<?php
$title = "Connexion";

ob_start();
?>
<div class="flex min-h-svh w-full flex-col bg-[#EEF1F9] dark:bg-background">
    <!--  START: Slot -->

    <div class="min-h-screen bg-background flex items-center overflow-hidden w-full">
        <div class="min-h-screen basis-full flex flex-wrap w-full justify-center overflow-y-auto">
            <div
                class="basis-1/2 bg-primary w-full relative hidden xl:flex justify-center items-center bg-gradient-to-br from-primary-600 via-primary-400 to-primary-600">
                <img src="../../assets/app/images/auth/line.png" alt="image"
                    class="absolute top-0 left-0 w-full h-full" />
                <div
                    class="relative z-10 backdrop-blur bg-primary-foreground/40 py-14 px-16 2xl:py-[84px] 2xl:pl-[50px] 2xl:pr-[136px] rounded max-w-[640px]">
                    <div>
                        <button class="bg-transparent hover:bg-transparent h-fit w-fit p-0">
                            <span
                                class="icon-[heroicons--play-solid] text-primary-foreground h-[78px] w-[78px] -ms-2"></span>
                        </button>
                        <div class="text-4xl leading-[50px] 2xl:text-6xl 2xl:leading-[72px] font-semibold mt-2.5">
                            <span class="text-default-600 dark:text-default-300">
                                Gérez vos stages <br />
                                avec aisance <br />
                            </span>
                            <span class="text-default-900 dark:text-default-50">
                                sur NanaStage
                            </span>
                        </div>
                        <div class="mt-5 2xl:mt-8 text-default-900 dark:text-default-200 text-2xl font-medium">
                            Une plateforme unique pour <br />
                            étudiants, entreprises et encadreurs.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div
                class="h-screen overflow-y-auto basis-full md:basis-1/2 w-full px-4 py-5 flex justify-center items-center">
                <div class="lg:w-[480px]">
                    <div x-twmerge="{'': true}">
                        <div class="w-full py-10">
                            <a class="inline-block" href="../../index.php">
                                <span class="text-3xl font-bold text-primary">
                                    <img src="../../assets/app/images/logo/logo.png" alt="logo" width="120" />
                                </span> </a>
                            <div class="2xl:mt-8 mt-6 2xl:text-3xl text-2xl font-bold text-default-900">
                                Bienvenue sur NanaStage
                            </div>
                            <div class="2xl:text-lg text-base text-default-600 2xl:mt-2 leading-6">
                                Connectez-vous pour accéder à votre espace de gestion.
                            </div>
                            <form action="../../controller/auth/login.php" method="POST" class="mt-5 2xl:mt-7">
                                <div>
                                    <label class="text-sm leading-none inline-block mb-2 font-medium text-default-600"
                                        for="email">E-mail</label>
                                    <div class="flex-1 w-full">
                                        <input type="email" id="email" name="email" required
                                            class="w-full bg-background border border-default-300 rounded-lg h-12 px-3 text-base text-default-500 focus:outline-none focus:border-primary"
                                            placeholder="Entrez votre e-mail" />
                                    </div>
                                </div>
                                <div class="mt-3.5">
                                    <label class="text-sm leading-none inline-block mb-2 font-medium text-default-600"
                                        for="password">Mot de passe</label>
                                    <div class="relative">
                                        <input type="password" id="password" name="password" required
                                            class="w-full bg-background border border-default-300 rounded-lg h-12 px-3 text-base text-default-500 focus:outline-none focus:border-primary"
                                            placeholder="Entrez votre mot de passe" />
                                    </div>
                                </div>
                                <div class="mt-5 flex justify-between flex-wrap gap-2">
                                    <label for="remember"
                                        class="flex cursor-pointer items-center gap-2 text-sm font-medium text-default-600 [&:has(input:checked)]:text-default-900 [&:has(input:disabled)]:cursor-not-allowed [&:has(input:disabled)]:opacity-75">
                                        <div class="relative flex items-center">
                                            <input id="remember" name="remember"
                                                class="before:content[''] peer relative size-4 cursor-pointer appearance-none overflow-hidden rounded border border-default-300 bg-transparent before:absolute before:inset-0 checked:border-default-500 checked:before:bg-primary disabled:cursor-not-allowed"
                                                type="checkbox" />
                                            <span
                                                class="pointer-events-none invisible absolute start-0.5 text-default-100 peer-checked:visible">
                                                <span
                                                    class="icon-[heroicons--check] w-3 h-3 text-primary-foreground"></span>
                                            </span>
                                        </div>
                                        <span>Se souvenir de moi</span>
                                    </label>
                                    <a class="text-sm text-primary" href="forgot.php">Mot de passe oublié ?</a>
                                </div>

                                <button type="submit"
                                    class="inline-flex items-center justify-center font-semibold bg-primary text-primary-foreground hover:bg-primary/80 h-11 rounded-md px-[18px] py-[10px] text-base w-full mt-5">
                                    <span>Se connecter</span>
                                </button>
                            </form>
                            <div class="mt-6 xl:mt-8 flex flex-wrap justify-center gap-4">
                                <!-- Social login buttons removed for clarity as they are not functional yet -->
                            </div>
                            <div class="mt-5 2xl:mt-8 text-center text-base text-default-600">
                                Vous n'avez pas de compte ?
                                <a class="text-primary" href="register.php">
                                    S'inscrire
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Dialog -->
    </div>

    <!--  END: Slot -->
</div>
<?php
$content = ob_get_clean();

require __DIR__ . '/base.php';