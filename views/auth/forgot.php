<?php
$title = "Mot de passe oublié";

ob_start();
?>
<div class="flex min-h-svh w-full flex-col bg-[#EEF1F9] dark:bg-background">

    <!--  START: Slot -->






    <div class="min-h-screen bg-background flex items-center overflow-hidden w-full">
        <div class="min-h-screen basis-full flex flex-wrap w-full justify-center overflow-y-auto">

            <div class="basis-1/2 bg-primary w-full relative hidden xl:flex justify-center items-center bg-gradient-to-br
        from-primary-600 via-primary-400 to-primary-600">
                <img src="../../assets/app/images/auth/line.png" alt="image" class="absolute top-0 left-0 w-full h-full" />
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

                        <div class="w-full">
                            <a class="inline-block" href="../../index.php">
                                <span class="text-3xl font-bold text-primary">
                                    <img src="../../assets/app/images/logo/logo.png" alt="logo" width="120"/>
                                </span>
                            </a>
                            <div class="2xl:mt-8 mt-6 2xl:text-3xl text-2xl font-bold text-default-900">
                                Mot de passe oublié ?
                            </div>
                            <div class="2xl:text-lg text-base text-default-600 mt-2 leading-6">
                                Entrez votre e-mail et les instructions vous seront envoyées !
                            </div>
                            <form class="mt-5 xl:mt-7">
                                <div>
                                    <label
                                        class="text-sm leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block mb-2 font-medium text-default-600"
                                        for="email">E-mail
                                    </label>
                                    <div class="flex-1 w-full"><input type="email"
                                            class="w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default-500 focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 border rounded-lg h-12 text-base read-only:leading-[48px]"
                                            id="email" name="email" placeholder="Entrez votre e-mail" /></div>
                                </div>
                                <button
                                    class="inline-flex items-center justify-center font-semibold ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-0 disabled:opacity-50 whitespace-nowrap disabled:pointer-events-none bg-primary text-primary-foreground hover:bg-primary/80 h-11 rounded-md px-[18px] py-[10px] text-base w-full mt-6">
                                    Envoyer l'e-mail de récupération
                                </button>
                            </form>
                            <div class="mt-5 2xl:mt-8 text-center text-base text-default-600">
                                Retour à la 
                                <a class="text-primary" href="login.php">connexion</a>
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