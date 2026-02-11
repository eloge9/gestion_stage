<!--  START: Footer Copyright  -->
<template x-if="$store.app.sidebarType !== 'module'">
    <div x-twmerge="{
        ' mx-4 mb-6 xl:mx-20': $store.app.layout !== 'horizontal',
        ' mx-0 xl:mx-0 mb-0': $store.app.layout === 'vertical',
         'sticky bottom-0': $store.app.footerType  === 'sticky',
        'static': $store.app.footerType  === 'static',
        'hidden': $store.app.footerType  === 'hidden',
      }">
        <footer x-twmerge="{
        ' border bg-card px-6 py-4  relative z-50': true ,
          'xl:ms-[72px]':  $store.app.collapsed ,
        'xl:ms-[272px]':  !$store.app.collapsed ,
        'rounded-md': $store.app.layout !== 'horizontal' && $store.app.layout !== 'vertical',
        'xl:ms-0 ms-0': $store.app.layout === 'horizontal',
        'xl:ms-0 ms-0': $store.app.layout === 'horizontal',
        'xl:ms-[248px]': $store.app.layout === 'vertical' && !$store.app.collapsed,
        'xl:ms-[300px]': $store.app.sidebarType === 'module' && !$store.app.collapsed
        
    }">
            <div class="block text-muted-foreground md:flex md:justify-between">
                <p class="text-xs sm:mb-0 md:text-sm">COPYRIGHT © 2025 Codeshaper rights Reserved</p>
                <p class="mb-0 text-xs md:text-sm">
                    Hand-crafted &amp; Made by
                    <a class="text-primary" target="__blank" href="https://codeshaper.net/">Codeshaper </a>
                </p>
            </div>
        </footer>
    </div>
</template>
<!--  END: Footer Copyright  -->

<!--  START: Mobile Footer  -->
<template x-if="$store.app.sidebarType === 'module'">
    <div>
        <div x-twmerge="{
          'md:block hidden': true,
        ' mx-6 mb-6 xl:mx-20': $store.app.layout !== 'horizontal',
        ' mx-0 xl:mx-0 mb-0': $store.app.layout === 'vertical',
        'sticky bottom-0': $store.app.footerType  === 'sticky',
        'static': $store.app.footerType  === 'static',
        'hidden': $store.app.footerType  === 'hidden',
      }">
            <footer x-twmerge="{
        ' border bg-card px-6 py-4  relative ': true ,
        'xl:ms-[72px]':  $store.app.collapsed ,
        'xl:ms-[272px]':  !$store.app.collapsed ,
        'rounded-md': $store.app.layout !== 'horizontal' && $store.app.layout !== 'vertical',
        'xl:ms-0 ms-0': $store.app.layout === 'horizontal',
        'xl:ms-0 ms-0': $store.app.layout === 'horizontal',
        'xl:ms-[248px]': $store.app.layout === 'vertical' && !$store.app.collapsed,
        'xl:ms-[300px]': $store.app.sidebarType === 'module' && !$store.app.collapsed
        
    }">
                <div class="block text-muted-foreground md:flex md:justify-between">
                    <p class="text-xs sm:mb-0 md:text-sm">COPYRIGHT © 2025 Codeshaper rights Reserved</p>
                    <p class="mb-0 text-xs md:text-sm">
                        Hand-crafted &amp; Made by
                        <a class="text-primary" target="__blank" href="https://codeshaper.net/">Codeshaper </a>
                    </p>
                </div>
            </footer>
        </div>

        <footer
            class="footer-bg fixed bottom-0 left-0 z-50 flex w-full items-center justify-around border-t bg-card bg-no-repeat px-4 py-[12px] shadow-[0_-4px_29px_#9595952b] backdrop-blur-[40px] backdrop-filter dark:border-none dark:shadow-[0_-4px_29px_#000000cc] md:hidden">
            <div class="flex flex-col items-center justify-center">
                <div x-data="{searchOpenModal: false}">
                    <button class="bg-transparent block md:hidden"
                        @click="searchOpenModal = true;document.body.style.overflow = 'hidden'">
                        <span class="icon-[heroicons--magnifying-glass] h-6 w-6 text-default-500"></span>
                        <p class="mb-0 mt-1.5 text-xs text-default-600">Search</p>
                    </button>

                    <template x-teleport="body">
                        <div x-cloak x-show="searchOpenModal" x-transition.opacity.duration.200ms
                            x-trap.inert.noscroll="searchOpenModal" @keydown.esc.window="searchOpenModal = false"
                            @click.self="searchOpenModal = false"
                            class="fixed inset-0 z-[99] flex justify-center items-center bg-default-900/80 p-4 pb-8 backdrop-blur-sm sm:items-center lg:p-8"
                            role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                            <!-- Modal Dialog -->
                            <div x-data="{
              options: [
            {
                area: 'suggestion',
                items: [
                    { link: '/calendar.html', icon: 'icon-[lucide--calendar]', label: 'Calendar' },
                    { link: '/chat.html', icon: 'icon-[lucide--message-circle]', label: 'Chat' },
                    { link: '/email.html', icon: 'icon-[lucide--mail]', label: 'Email' }
                ]
            },
            {
                area: 'settings',
                items: [
                    { icon: 'icon-[lucide--user-round]', label: 'Profile', shortcut: '⌘P' },
                    { icon: 'icon-[lucide--credit-card]', label: 'Billing', shortcut: '⌘B' },
                    { icon: 'icon-[lucide--settings]', label: 'Settings', shortcut: '⌘S' }
                        ]
                    }
                ],
                isOpen: false,
                searchQuery: '',
                filteredOptions() {
                    // Filter options based on the search query
                    if (!this.searchQuery) return this.options;
                    return this.options.map((group) => ({
                        ...group,
                        items: group.items.filter((item) =>
                            item.label.toLowerCase().includes(this.searchQuery.toLowerCase())
                        )
                    })).filter((group) => group.items.length > 0);
                }
            }" class="flex w-full max-w-3xl flex-col gap-1" x-show="searchOpenModal"
                                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                                x-transition:enter-start="opacity-0 scale-50"
                                x-transition:enter-end="opacity-100 scale-100"
                                class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-md  bg-default-50 text-default-800   p-4">
                                <!-- Search Box -->
                                <div class="relative">
                                    <!-- Dropdown Options -->
                                    <div x-show="true" x-cloak
                                        class="overflow-hidden p-1 text-foreground bg-default-100 shadow-md border rounded-md w-full">
                                        <div class="flex items-center justify-around gap-2 border-b px-3">
                                            <div class="flex items-center flex-1">
                                                <span
                                                    class="icon-[heroicons--magnifying-glass] me-2 h-4 w-4 shrink-0 opacity-50"></span>
                                                <input
                                                    class="flex h-11 w-full rounded-md bg-transparent py-3 text-sm outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed             disabled:opacity-50 capitalize"
                                                    placeholder="Search options..." autocomplete="off"
                                                    x-model="searchQuery" />
                                            </div>
                                            <button class="flex-none" @click="searchOpenModal = false"
                                                aria-label="close modal">
                                                <span class="icon-[heroicons--x-mark] h-4 w-4"></span>
                                            </button>
                                        </div>
                                        <template x-for="group in filteredOptions()" x-bind:key="group.area">
                                            <div class="mb-2">
                                                <!-- Group Label -->
                                                <div class="text-xs font-bold text-default-500 uppercase p-2"
                                                    x-text="group.area"></div>
                                                <template x-for="item in group.items" x-bind:key="item.label">
                                                    <a :href="item.link"
                                                        class="flex items-center px-2 py-1.5 text-sm rounded-md cursor-pointer hover:bg-default-200 ">
                                                        <span :class="item.icon" class="text-base"></span>
                                                        <span class="ml-2" x-text="item.label"></span>
                                                        <span
                                                            class="ms-auto  text-xs tracking-widest text-muted-foreground"
                                                            x-text="item.shortcut"></span>
                                                    </a>
                                                </template>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>
            </div>
            <div
                class="footer-bg relative z-[-1] -mt-[40px] flex h-[70px] w-[70px] items-center justify-center rounded-full border-t bg-card bg-no-repeat shadow-[0_-4px_10px_#9595952b] backdrop-blur-[40px] backdrop-filter dark:border-none dark:shadow-[0_-4px_10px_#0000004d]">
                <div
                    class="custom-dropshadow relative left-0 top-0 flex h-[60px] w-[60px] items-center justify-center rounded-full bg-primary p-3 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32"
                        class="h-8 w-8 text-primary-foreground">
                        <g fill="currentColor" clip-path="url(#logo_svg__a)">
                            <path
                                d="M0 18.383c0-1.505 1.194-2.724 2.667-2.724H18v2.043c0 1.504-1.194 2.723-2.667 2.723H0zM9.333 32c-1.472 0-2.666-1.22-2.666-2.723v-8.17h2c1.472 0 2.666 1.219 2.666 2.723V32zM0 0h18.667C26.03 0 32 6.097 32 13.617H0zM16 32c2.101 0 4.182-.423 6.123-1.244a16 16 0 0 0 5.19-3.542 16.4 16.4 0 0 0 3.47-5.302A16.6 16.6 0 0 0 32 15.66h-9.159c0 .918-.177 1.826-.52 2.674a7 7 0 0 1-1.484 2.267 6.8 6.8 0 0 1-2.219 1.514c-.83.351-1.72.532-2.618.532z">
                            </path>
                        </g>
                        <defs>
                            <clipPath id="logo_svg__a">
                                <path fill="#fff" d="M0 0h32v32H0z"></path>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center">
                <div x-data="{openCustomizer: false}">
                    <template x-if="$store.app.sidebarType !== 'module'">
                        <div class="fixed bottom-14 end-8 z-50">
                            <button @click="openCustomizer = true;document.body.style.overflow = 'hidden'" class="relative inline-flex h-12 w-12 items-center justify-center whitespace-nowrap rounded-full bg-primary text-sm
          font-semibold text-primary-foreground ring-offset-background transition-colors hover:bg-primary/80
          focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50">
                                <span class="icon-[heroicons--cog-8-tooth] h-7 w-7 animate-spin"></span>
                            </button>
                        </div>
                    </template>
                    <template x-if="$store.app.sidebarType === 'module'">
                        <div>
                            <button class="bg-transparent block md:hidden"
                                @click="openCustomizer = true;document.body.style.overflow = 'hidden'">
                                <span class="icon-[heroicons--cog-6-tooth-solid] h-6 w-6 text-default-600"></span>
                                <p class="mb-0 mt-1.5 text-xs text-default-600">Settings</p>
                            </button>
                            <div class="fixed bottom-14 end-8 z-50 hidden md:block">
                                <button @click="openCustomizer = true;document.body.style.overflow = 'hidden'"
                                    class="relative inline-flex h-12 w-12 items-center justify-center whitespace-nowrap rounded-full bg-primary text-sm
            font-semibold text-primary-foreground ring-offset-background transition-colors hover:bg-primary/80
            focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50">
                                    <span class="icon-[heroicons--cog-8-tooth] h-7 w-7 animate-spin"></span>
                                </button>
                            </div>
                        </div>
                    </template>
                    <template x-teleport="body">
                        <div :data-state="openCustomizer === true ? 'open' : 'closed'" x-show="openCustomizer"
                            class="backdrop-transparent fixed inset-0 z-[999] bg-background/10 data-[state=open]:animate-in
        data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0">
                            <div :data-state="openCustomizer === true ? 'open' : 'closed'"
                                @click.outside="openCustomizer = false;document.body.style.overflow = ''" class="fixed inset-y-0 end-0 z-[999] h-full w-3/4 max-w-sm gap-4 border-l bg-card px-0 shadow-lg transition ease-in-out
          data-[state=closed]:duration-300 data-[state=open]:duration-500 data-[state=open]:animate-in
          data-[state=closed]:animate-out data-[state=closed]:slide-out-to-end data-[state=open]:slide-in-from-end">
                                <div
                                    class="flex items-center justify-between space-y-2 border-b px-6 pb-2 pt-2 text-start">
                                    <div class="flex-1 text-base font-medium text-foreground">Theme Customizer</div>
                                    <button @click="openCustomizer = false;document.body.style.overflow = ''"
                                        class="flex-none">
                                        <span class="icon-[heroicons--x-mark] h-5 w-5"></span>
                                    </button>
                                </div>
                                <div class="h-full">
                                    <div class="no-scrollbar h-[calc(100vh-130px)] overflow-y-auto">
                                        <div class="mt-3 space-y-8 px-6">
                                            <div>
                                                <div
                                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary before:absolute before:left-0
                    before:top-0 before:z-[-1] before:h-full before:w-full before:rounded before:bg-primary before:opacity-10">
                                                    Layout
                                                </div>
                                                <div class="mb-4 text-xs font-normal text-muted-foreground">Choose
                                                    your layout</div>
                                                <div class="grid  grid-cols-2 sm:grid-cols-3 gap-3">
                                                    <div>
                                                        <button
                                                            @click="$store.app.setLayout('vertical'), openCustomizer = false;document.body.style.overflow = ''"
                                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center"
                                                            :class="{'border-primary text-primary': $store.app.layout === 'vertical'}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 112 72"
                                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                                <path
                                                                    d="M0 4a4 4 0 0 1 4-4h5v72H4a4 4 0 0 1-4-4zM11 0h17v72H11z">
                                                                </path>
                                                                <rect width="75" height="8" x="32" y="4" rx="1">
                                                                </rect>
                                                                <rect width="24" height="17" x="32" y="16" rx="1">
                                                                </rect>
                                                                <rect width="48" height="17" x="59" y="16" rx="1">
                                                                </rect>
                                                                <rect width="75" height="23" x="32" y="37" rx="1">
                                                                </rect>
                                                                <rect width="75" height="4" x="32" y="64" rx="1">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="6" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="6" rx="1.5">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="18" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="12" rx="1.5">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="26" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="18" rx="1.5">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="34" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="24" rx="1.5">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="42" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="30" rx="1.5">
                                                                </rect>
                                                                <circle cx="38" cy="8" r="2"></circle>
                                                                <circle cx="89" cy="8" r="2"></circle>
                                                                <circle cx="95" cy="8" r="2"></circle>
                                                                <circle cx="101" cy="8" r="2"></circle>
                                                            </svg>
                                                            <span
                                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                                x-show="$store.app.layout === 'vertical'"></span>
                                                        </button>
                                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            Vertical</label>
                                                    </div>
                                                    <!-- end -->
                                                    <div>
                                                        <button
                                                            @click="$store.app.setLayout('horizontal'), openCustomizer = false;document.body.style.overflow = ''"
                                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center"
                                                            :class="{'border-primary text-primary': $store.app.layout === 'horizontal'}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 112 72"
                                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                                <rect width="102" height="8" x="5" y="4"
                                                                    class="horizontal_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="39" height="17" x="5" y="16"
                                                                    class="horizontal_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="59" height="17" x="48" y="16"
                                                                    class="horizontal_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="102" height="23" x="5" y="37"
                                                                    class="horizontal_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="102" height="4" x="5" y="64"
                                                                    class="horizontal_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <circle cx="11" cy="8" r="2"
                                                                    class="horizontal_svg__svg-slate-300"></circle>
                                                                <circle cx="89" cy="8" r="2"
                                                                    class="horizontal_svg__svg-slate-300"></circle>
                                                                <circle cx="95" cy="8" r="2"
                                                                    class="horizontal_svg__svg-slate-300"></circle>
                                                                <circle cx="101" cy="8" r="2"
                                                                    class="horizontal_svg__svg-slate-300"></circle>
                                                            </svg>
                                                            <span
                                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                                x-show="$store.app.layout === 'horizontal'"></span>
                                                        </button>
                                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            Horizontal</label>
                                                    </div>
                                                    <!-- end -->
                                                    <div>
                                                        <button
                                                            @click="$store.app.setLayout('semi-box'), openCustomizer = false;document.body.style.overflow = ''"
                                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center"
                                                            :class="{'border-primary text-primary': $store.app.layout === 'semi-box'}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 112 72"
                                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                                <path d="M4 8a4 4 0 0 1 4-4h18v64H8a4 4 0 0 1-4-4z"
                                                                    class="semibox_svg__svg-slate-200"></path>
                                                                <rect width="77" height="8" x="30" y="4"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="25" height="17" x="30" y="16"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="48" height="17" x="59" y="16"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="77" height="23" x="30" y="37"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="77" height="4" x="30" y="64"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="10" height="9" x="10" y="10"
                                                                    class="semibox_svg__svg-slate-300" rx="2">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="28"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="36"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="44"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="52"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <circle cx="36" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                                <circle cx="89" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                                <circle cx="95" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                                <circle cx="101" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                            </svg>
                                                            <span
                                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                                x-show="$store.app.layout === 'semi-box'"></span>
                                                        </button>
                                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            Semibox
                                                        </label>
                                                    </div>
                                                    <!-- end -->
                                                </div>
                                            </div>
                                            <!-- end single -->
                                            <div>
                                                <div
                                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary before:absolute before:left-0
                    before:top-0 before:z-[-1] before:h-full before:w-full before:rounded before:bg-primary before:opacity-10">
                                                    Color Scheme
                                                </div>
                                                <div class="mb-4 text-xs font-normal text-muted-foreground">
                                                    Choose Light or Dark Scheme.
                                                </div>
                                                <div class="flex gap-3">
                                                    <div class="flex-1 w-full">
                                                        <button
                                                            @click="$store.app.setTheme('light'), openCustomizer = false;document.body.style.overflow = ''"
                                                            class="relative flex w-full items-center justify-center rounded border px-10 py-3 text-center"
                                                            :class="{'border-primary text-primary': $store.app.isDark === false}">
                                                            <span
                                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                                x-show="$store.app.isDark === false"></span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img"
                                                                class=" h-5 w-5 iconify iconify--heroicons"
                                                                width="1em" height="1em" viewBox="0 0 24 24">
                                                                <path fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1.5" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25
                            12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0a3.75 3.75 0 0 1 7.5 0"></path>
                                                            </svg>
                                                        </button>
                                                        <label
                                                            class="text-sm leading-none text-muted-foreground font-normal block mt-2">Light</label>
                                                    </div>
                                                    <div class="flex-1 w-full">
                                                        <button
                                                            @click="$store.app.setTheme('dark'), openCustomizer = false;document.body.style.overflow = ''"
                                                            class="relative flex w-full items-center justify-center rounded border px-10 py-3 text-center"
                                                            :class="{'border-primary text-primary': $store.app.isDark === true}">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img"
                                                                class=" h-5 w-5 iconify iconify--heroicons"
                                                                width="1em" height="1em" viewBox="0 0 24 24">
                                                                <path fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1.5" d="M21.752 15.002A9.7 9.7 0 0 1 18 15.75A9.75 9.75 0 0 1 8.25 6c0-1.33.266-2.597.748-3.752A9.75 9.75 0 0 0 3 11.25A9.75
                            9.75 0 0 0 12.75 21a9.75 9.75 0 0 0 9.002-5.998"></path>
                                                            </svg>
                                                            <span
                                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                                x-show="$store.app.isDark === true"></span>
                                                        </button>
                                                        <label
                                                            class="text-sm leading-none text-muted-foreground font-normal block mt-2">Dark</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end single -->
                                            <div>
                                                <div
                                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary before:absolute before:left-0
                    before:top-0 before:z-[-1] before:h-full before:w-full before:rounded before:bg-primary before:opacity-10">
                                                    Direction
                                                </div>
                                                <div class="mb-4 text-xs font-normal text-muted-foreground">
                                                    Choose your direction
                                                </div>
                                                <div class="grid grid-cols-2 gap-3">
                                                    <button
                                                        @click="$store.app.setDir('ltr'), openCustomizer = false;document.body.style.overflow = ''"
                                                        class="relative flex w-full items-center justify-center rounded border px-10 py-[14px] text-center"
                                                        :class="{'border-primary text-primary': $store.app.direction === 'ltr'}">
                                                        Ltr
                                                        <span
                                                            class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                            x-show="$store.app.direction === 'ltr'"></span>
                                                    </button>
                                                    <button
                                                        @click="$store.app.setDir('rtl'), openCustomizer = false;document.body.style.overflow = ''"
                                                        class="relative flex w-full items-center justify-center rounded border px-10 py-3 text-center"
                                                        :class="{'border-primary text-primary': $store.app.direction === 'rtl'}">
                                                        Rtl
                                                        <span
                                                            class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                            x-show="$store.app.direction === 'rtl'"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- end single -->
                                            <!-- end single -->
                                            <div>
                                                <div
                                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary bg-primary/10">
                                                    Theme
                                                </div>
                                                <div class="mb-4 text-xs font-normal text-muted-foreground">
                                                    Choose a Theme
                                                </div>
                                                <div class="flex flex-wrap" x-data='{ themes: [ "zinc", "slate", "stone", "gray", "neutral", "red", "rose", "orange", "blue", "yellow", "violet", ]
                  }'>
                                                    <template x-for="theme in themes" :key="theme">

                                                        <button @click="$store.app.setColorTheme(theme)"
                                                            class="flex-none flex h-9 w-9 items-center justify-center rounded-full text-xs"
                                                            :class="{ 'border-2 border-[--theme-primary] ': $store.app.theme === theme }">
                                                            <span
                                                                class="flex h-6 w-6 items-center justify-center rounded-full bg-[--theme-primary] text-primary-foreground"
                                                                :style="{ backgroundColor: `hsl(${ $store.app.themes.find(t => t.name === theme).activeColor[$store.app.isDark ? 'dark' :
                          'light'] })` }">
                                                                <span x-show="$store.app.theme === theme">
                                                                    <span
                                                                        class="icon-[heroicons--check] h-4 w-4"></span>
                                                                </span>
                                                            </span>
                                                        </button>

                                                    </template>
                                                </div>
                                            </div>
                                            <!-- end single -->
                                            <div>
                                                <div
                                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary before:absolute before:left-0
                    before:top-0 before:z-[-1] before:h-full before:w-full before:rounded before:bg-primary before:opacity-10">
                                                    Sidebar Layout
                                                </div>
                                                <div class="mb-4 text-xs font-normal text-muted-foreground">Choose
                                                    your layout</div>
                                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                                    <div>
                                                        <button
                                                            :disabled="$store.app.layout === 'semi-box' || $store.app.layout === 'horizontal'"
                                                            @click="$store.app.setSidebarType('module'), openCustomizer = false;document.body.style.overflow = ''"
                                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center disabled:cursor-not-allowed"
                                                            :class="{'border-primary text-primary': $store.app.sidebarType === 'module'}">
                                                            <span
                                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                                x-show="$store.app.sidebarType === 'module'"></span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 112 72"
                                                                class="h-full w-full [&>rect]:fill-default-300 [&>circle]:fill-default-400 [&>path]:fill-default-400">
                                                                <path
                                                                    d="M0 4a4 4 0 0 1 4-4h5v72H4a4 4 0 0 1-4-4zM11 0h17v72H11z">
                                                                </path>
                                                                <rect width="75" height="8" x="32" y="4" rx="1">
                                                                </rect>
                                                                <rect width="24" height="17" x="32" y="16" rx="1">
                                                                </rect>
                                                                <rect width="48" height="17" x="59" y="16" rx="1">
                                                                </rect>
                                                                <rect width="75" height="23" x="32" y="37" rx="1">
                                                                </rect>
                                                                <rect width="75" height="4" x="32" y="64" rx="1">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="6" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="6" rx="1.5">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="18" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="12" rx="1.5">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="26" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="18" rx="1.5">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="34" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="24" rx="1.5">
                                                                </rect>
                                                                <rect width="4" height="4" x="3" y="42" rx="2">
                                                                </rect>
                                                                <rect width="13" height="3" x="13" y="30" rx="1.5">
                                                                </rect>
                                                                <circle cx="38" cy="8" r="2"></circle>
                                                                <circle cx="89" cy="8" r="2"></circle>
                                                                <circle cx="95" cy="8" r="2"></circle>
                                                                <circle cx="101" cy="8" r="2"></circle>
                                                            </svg>
                                                        </button>
                                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            module</label>
                                                    </div>
                                                    <!-- end -->
                                                    <div>
                                                        <button :disabled="$store.app.layout === 'semi-box'" s="s"
                                                            @click="$store.app.setSidebarType('classic'), openCustomizer = false;document.body.style.overflow = ''"
                                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center disabled:cursor-not-allowed"
                                                            :class="{'border-primary text-primary': $store.app.sidebarType === 'classic'}">
                                                            <span
                                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                                x-show="$store.app.sidebarType === 'classic'"></span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 112 72"
                                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                                <path d="M4 8a4 4 0 0 1 4-4h18v64H8a4 4 0 0 1-4-4z"
                                                                    class="semibox_svg__svg-slate-200"></path>
                                                                <rect width="77" height="8" x="30" y="4"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="25" height="17" x="30" y="16"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="48" height="17" x="59" y="16"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="77" height="23" x="30" y="37"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="77" height="4" x="30" y="64"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="10" height="9" x="10" y="10"
                                                                    class="semibox_svg__svg-slate-300" rx="2">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="28"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="36"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="44"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="52"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <circle cx="36" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                                <circle cx="89" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                                <circle cx="95" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                                <circle cx="101" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                            </svg>
                                                        </button>
                                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            classic</label>
                                                    </div>
                                                    <!-- end -->
                                                    <div>
                                                        <button :disabled="$store.app.layout === 'horizontal'"
                                                            @click="$store.app.setSidebarType('popover'), openCustomizer;document.body.style.overflow = ''"
                                                            class=":disabled:cursor-not-allowed relative flex h-[72px] w-full items-center justify-center rounded border text-center"
                                                            :class="{'border-primary text-primary': $store.app.sidebarType === 'popover'}">
                                                            <span
                                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                                x-show="$store.app.sidebarType === 'popover'"></span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 112 72"
                                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                                <path d="M4 8a4 4 0 0 1 4-4h18v64H8a4 4 0 0 1-4-4z"
                                                                    class="semibox_svg__svg-slate-200"></path>
                                                                <rect width="77" height="8" x="30" y="4"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="25" height="17" x="30" y="16"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="48" height="17" x="59" y="16"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="77" height="23" x="30" y="37"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="77" height="4" x="30" y="64"
                                                                    class="semibox_svg__svg-slate-200" rx="1">
                                                                </rect>
                                                                <rect width="10" height="9" x="10" y="10"
                                                                    class="semibox_svg__svg-slate-300" rx="2">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="28"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="36"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="44"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <rect width="18" height="4" x="6" y="52"
                                                                    class="semibox_svg__svg-slate-300" rx="1">
                                                                </rect>
                                                                <circle cx="36" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                                <circle cx="89" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                                <circle cx="95" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                                <circle cx="101" cy="8" r="2"
                                                                    class="semibox_svg__svg-slate-300"></circle>
                                                            </svg>
                                                        </button>
                                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            popover
                                                        </label>
                                                    </div>
                                                    <!-- end -->
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary bg-primary/10">
                                                    Sidebar Image
                                                </div>
                                                <div class="mb-4 text-xs font-normal text-muted-foreground">Choose
                                                    an image for the Sidebar.</div>
                                                <div class="grid grid-cols-2 md:grid-cols-7 gap-3">
                                                    <!-- Clear Background Button -->
                                                    <button @click="$store.app.clearSidebarBg()"
                                                        class="flex h-[72px] items-center justify-center rounded border border-border text-default-400">
                                                        <template x-if="$store.app.sidebarBg === 'none'">
                                                            <span>
                                                                <span
                                                                    class="icon-[heroicons--check] text-default-600 size-5"></span>
                                                            </span>
                                                        </template>
                                                        <template x-if="$store.app.sidebarBg !== 'none'">
                                                            <span>
                                                                <span
                                                                    class="icon-[heroicons--x-mark-solid] text-default-600 size-5"></span>
                                                            </span>
                                                        </template>
                                                    </button>
                                                    <!-- Selected Images -->
                                                    <template x-for="(file, index) in $store.app.selectedFiles"
                                                        :key="index">
                                                        <button @click="$store.app.setSidebarBg(file)"
                                                            :class="{'bg-default-900/60': $store.app.sidebarBg === file, '': $store.app.sidebarBg !== file}"
                                                            class="relative h-[72px] rounded bg-cover bg-no-repeat bg-blend-multiply"
                                                            :style="{ backgroundImage: `url(${file})`  }">
                                                            <template x-if="$store.app.sidebarBg === file">
                                                                <span
                                                                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 transform text-primary-foreground">
                                                                    <span
                                                                        class="icon-[heroicons--check] size-5"></span>
                                                                </span>
                                                            </template>
                                                        </button>
                                                    </template>
                                                    <!-- File Upload -->
                                                    <label class="flex h-[72px] items-center justify-center rounded border border-border bg-border text-muted-foreground
            cursor-pointer">
                                                        <input type="file" class="hidden"
                                                            @change="$store.app.handleFileChange($event)" />
                                                        <span
                                                            class="icon-[heroicons--cloud-arrow-up] size-5 text-default-700"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="relative mb-3 inline-block rounded bg-primary/10 px-3 py-[3px] text-xs font-medium text-primary">
                                                    Rounded
                                                </div>

                                                <div class="grid grid-cols-2 md:grid-cols-5 gap-2">
                                                    <template x-for="value in ['0', '0.3', '0.5', '0.75', '1.0']"
                                                        :key="value">
                                                        <button @click="$store.app.setRadius(parseFloat(value))"
                                                            :class="{
          'border-2 border-primary bg-primary text-primary-foreground': $store.app.radius === parseFloat(value),
          'border border-default-300': $store.app.radius !== parseFloat(value)
        }" class="rounded px-3 h-10">
                                                            <span x-text="value"></span>
                                                        </button>
                                                    </template>
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="relative  inline-block rounded bg-primary/10 px-3 py-[3px] mb-3 text-xs font-medium text-primary">
                                                    Navbar Type
                                                </div>
                                                <div class="flex flex-wrap gap-3">
                                                    <div class="flex items-center gap-1"
                                                        @click="$store.app.setHeaderType('static')">
                                                        <button
                                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                                            :class="{'border-primary text-primary': $store.app.headerType === 'static'}">
                                                            <span class="icon-[heroicons--check-circle-solid]"
                                                                x-show="$store.app.headerType === 'static'"></span>
                                                        </button>
                                                        <label
                                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            Static</label>
                                                    </div>
                                                    <!-- end single -->
                                                    <div class="flex items-center gap-1"
                                                        @click="$store.app.setHeaderType('sticky')">
                                                        <button
                                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                                            :class="{'border-primary text-primary': $store.app.headerType === 'sticky'}">
                                                            <span class="icon-[heroicons--check-circle-solid]"
                                                                x-show="$store.app.headerType === 'sticky'"></span>
                                                        </button>
                                                        <label
                                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            sticky</label>
                                                    </div>
                                                    <!-- end single -->
                                                    <div class="flex items-center gap-1"
                                                        @click="$store.app.setHeaderType('floating')"
                                                        x-show="$store.app.layout !== 'semi-box'">
                                                        <button
                                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                                            :class="{'border-primary text-primary': $store.app.headerType === 'floating'}">
                                                            <span class="icon-[heroicons--check-circle-20-solid]"
                                                                x-show="$store.app.headerType === 'floating'"></span>
                                                        </button>
                                                        <label
                                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            Floating</label>
                                                    </div>
                                                    <!-- end single -->
                                                    <div class="flex items-center gap-1"
                                                        @click="$store.app.setHeaderType('hidden')">
                                                        <button
                                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                                            :class="{'border-primary text-primary': $store.app.headerType === 'hidden'}">
                                                            <span class="icon-[heroicons--check-circle-20-solid]"
                                                                x-show="$store.app.headerType === 'hidden'"></span>
                                                        </button>
                                                        <label
                                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            hidden</label>
                                                    </div>
                                                    <!-- end single -->
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="relative  inline-block rounded bg-primary/10 px-3 py-[3px] mb-3 text-xs font-medium text-primary">
                                                    Footer Type
                                                </div>
                                                <div class="flex flex-wrap gap-3">
                                                    <div class="flex items-center gap-2"
                                                        @click="$store.app.setFooterType('static')">
                                                        <button
                                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                                            :class="{'border-primary text-primary': $store.app.footerType === 'static'}">
                                                            <span class="icon-[heroicons--check-circle-20-solid]"
                                                                x-show="$store.app.footerType === 'static'"></span>
                                                        </button>
                                                        <label
                                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            Static</label>
                                                    </div>
                                                    <!-- end single -->
                                                    <div class="flex items-center gap-2"
                                                        @click="$store.app.setFooterType('sticky')">
                                                        <button
                                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                                            :class="{'border-primary text-primary': $store.app.footerType === 'sticky'}">
                                                            <span class="icon-[heroicons--check-circle-solid]"
                                                                x-show="$store.app.footerType === 'sticky'"></span>
                                                        </button>
                                                        <label
                                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            sticky</label>
                                                    </div>

                                                    <!-- end single -->
                                                    <div class="flex items-center gap-2"
                                                        @click="$store.app.setFooterType('hidden')">
                                                        <button
                                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                                            :class="{'border-primary text-primary': $store.app.footerType === 'hidden'}">
                                                            <span class="icon-[heroicons--check-circle-20-solid]"
                                                                x-show="$store.app.footerType === 'hidden'"></span>
                                                        </button>
                                                        <label
                                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                                            hidden</label>
                                                    </div>
                                                    <!-- end single -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex p-4 gap-4">
                                        <a class="flex-1 inline-flex items-center justify-center rounded-md text-sm font-semibold ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-0 disabled:opacity-50 whitespace-nowrap disabled:pointer-events-none bg-primary text-primary-foreground hover:bg-primary/80 h-10 px-4 py-2.5 w-full"
                                            href="#">Buy Now</a>
                                        <a class="flex-1 inline-flex items-center justify-center rounded-md text-sm font-semibold ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-0 disabled:opacity-50 whitespace-nowrap disabled:pointer-events-none bg-primary text-primary-foreground hover:bg-primary/80 h-10 px-4 py-2.5 w-full"
                                            href="https://themeforest.net/user/codeshaperbd/portfolio">
                                            Our Portfolio
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>
            </div>

        </footer>
    </div>
</template>
<!--  END: Mobile Footer  -->
<!-- *************************
            END: Footer Wrapper
      *************************** -->
</div>

<!--  START: Customizer -->
<div x-data="{openCustomizer: false}">
    <template x-if="$store.app.sidebarType !== 'module'">
        <div class="fixed bottom-14 end-8 z-50">
            <button @click="openCustomizer = true;document.body.style.overflow = 'hidden'" class="relative inline-flex h-12 w-12 items-center justify-center whitespace-nowrap rounded-full bg-primary text-sm
          font-semibold text-primary-foreground ring-offset-background transition-colors hover:bg-primary/80
          focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50">
                <span class="icon-[heroicons--cog-8-tooth] h-7 w-7 animate-spin"></span>
            </button>
        </div>
    </template>
    <template x-if="$store.app.sidebarType === 'module'">
        <div>
            <button class="bg-transparent block md:hidden"
                @click="openCustomizer = true;document.body.style.overflow = 'hidden'">
                <span class="icon-[heroicons--cog-6-tooth-solid] h-6 w-6 text-default-600"></span>
                <p class="mb-0 mt-1.5 text-xs text-default-600">Settings</p>
            </button>
            <div class="fixed bottom-14 end-8 z-50 hidden md:block">
                <button @click="openCustomizer = true;document.body.style.overflow = 'hidden'" class="relative inline-flex h-12 w-12 items-center justify-center whitespace-nowrap rounded-full bg-primary text-sm
            font-semibold text-primary-foreground ring-offset-background transition-colors hover:bg-primary/80
            focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50">
                    <span class="icon-[heroicons--cog-8-tooth] h-7 w-7 animate-spin"></span>
                </button>
            </div>
        </div>
    </template>
    <template x-teleport="body">
        <div :data-state="openCustomizer === true ? 'open' : 'closed'" x-show="openCustomizer" class="backdrop-transparent fixed inset-0 z-[999] bg-background/10 data-[state=open]:animate-in
        data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0">
            <div :data-state="openCustomizer === true ? 'open' : 'closed'"
                @click.outside="openCustomizer = false;document.body.style.overflow = ''" class="fixed inset-y-0 end-0 z-[999] h-full w-3/4 max-w-sm gap-4 border-l bg-card px-0 shadow-lg transition ease-in-out
          data-[state=closed]:duration-300 data-[state=open]:duration-500 data-[state=open]:animate-in
          data-[state=closed]:animate-out data-[state=closed]:slide-out-to-end data-[state=open]:slide-in-from-end">
                <div class="flex items-center justify-between space-y-2 border-b px-6 pb-2 pt-2 text-start">
                    <div class="flex-1 text-base font-medium text-foreground">Theme Customizer</div>
                    <button @click="openCustomizer = false;document.body.style.overflow = ''" class="flex-none">
                        <span class="icon-[heroicons--x-mark] h-5 w-5"></span>
                    </button>
                </div>
                <div class="h-full">
                    <div class="no-scrollbar h-[calc(100vh-130px)] overflow-y-auto">
                        <div class="mt-3 space-y-8 px-6">
                            <div>
                                <div
                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary before:absolute before:left-0
                    before:top-0 before:z-[-1] before:h-full before:w-full before:rounded before:bg-primary before:opacity-10">
                                    Layout
                                </div>
                                <div class="mb-4 text-xs font-normal text-muted-foreground">Choose your layout</div>
                                <div class="grid  grid-cols-2 sm:grid-cols-3 gap-3">
                                    <div>
                                        <button
                                            @click="$store.app.setLayout('vertical'), openCustomizer = false;document.body.style.overflow = ''"
                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center"
                                            :class="{'border-primary text-primary': $store.app.layout === 'vertical'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 112 72"
                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                <path d="M0 4a4 4 0 0 1 4-4h5v72H4a4 4 0 0 1-4-4zM11 0h17v72H11z">
                                                </path>
                                                <rect width="75" height="8" x="32" y="4" rx="1"></rect>
                                                <rect width="24" height="17" x="32" y="16" rx="1"></rect>
                                                <rect width="48" height="17" x="59" y="16" rx="1"></rect>
                                                <rect width="75" height="23" x="32" y="37" rx="1"></rect>
                                                <rect width="75" height="4" x="32" y="64" rx="1"></rect>
                                                <rect width="4" height="4" x="3" y="6" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="6" rx="1.5"></rect>
                                                <rect width="4" height="4" x="3" y="18" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="12" rx="1.5"></rect>
                                                <rect width="4" height="4" x="3" y="26" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="18" rx="1.5"></rect>
                                                <rect width="4" height="4" x="3" y="34" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="24" rx="1.5"></rect>
                                                <rect width="4" height="4" x="3" y="42" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="30" rx="1.5"></rect>
                                                <circle cx="38" cy="8" r="2"></circle>
                                                <circle cx="89" cy="8" r="2"></circle>
                                                <circle cx="95" cy="8" r="2"></circle>
                                                <circle cx="101" cy="8" r="2"></circle>
                                            </svg>
                                            <span
                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                x-show="$store.app.layout === 'vertical'"></span>
                                        </button>
                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                            Vertical</label>
                                    </div>
                                    <!-- end -->
                                    <div>
                                        <button
                                            @click="$store.app.setLayout('horizontal'), openCustomizer = false;document.body.style.overflow = ''"
                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center"
                                            :class="{'border-primary text-primary': $store.app.layout === 'horizontal'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 112 72"
                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                <rect width="102" height="8" x="5" y="4"
                                                    class="horizontal_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="39" height="17" x="5" y="16"
                                                    class="horizontal_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="59" height="17" x="48" y="16"
                                                    class="horizontal_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="102" height="23" x="5" y="37"
                                                    class="horizontal_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="102" height="4" x="5" y="64"
                                                    class="horizontal_svg__svg-slate-200" rx="1"></rect>
                                                <circle cx="11" cy="8" r="2" class="horizontal_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="89" cy="8" r="2" class="horizontal_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="95" cy="8" r="2" class="horizontal_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="101" cy="8" r="2" class="horizontal_svg__svg-slate-300">
                                                </circle>
                                            </svg>
                                            <span
                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                x-show="$store.app.layout === 'horizontal'"></span>
                                        </button>
                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                            Horizontal</label>
                                    </div>
                                    <!-- end -->
                                    <div>
                                        <button
                                            @click="$store.app.setLayout('semi-box'), openCustomizer = false;document.body.style.overflow = ''"
                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center"
                                            :class="{'border-primary text-primary': $store.app.layout === 'semi-box'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 112 72"
                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                <path d="M4 8a4 4 0 0 1 4-4h18v64H8a4 4 0 0 1-4-4z"
                                                    class="semibox_svg__svg-slate-200"></path>
                                                <rect width="77" height="8" x="30" y="4"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="25" height="17" x="30" y="16"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="48" height="17" x="59" y="16"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="77" height="23" x="30" y="37"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="77" height="4" x="30" y="64"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="10" height="9" x="10" y="10"
                                                    class="semibox_svg__svg-slate-300" rx="2"></rect>
                                                <rect width="18" height="4" x="6" y="28"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <rect width="18" height="4" x="6" y="36"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <rect width="18" height="4" x="6" y="44"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <rect width="18" height="4" x="6" y="52"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <circle cx="36" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="89" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="95" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="101" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                            </svg>
                                            <span
                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                x-show="$store.app.layout === 'semi-box'"></span>
                                        </button>
                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                            Semibox
                                        </label>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div>
                            <!-- end single -->
                            <div>
                                <div
                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary before:absolute before:left-0
                    before:top-0 before:z-[-1] before:h-full before:w-full before:rounded before:bg-primary before:opacity-10">
                                    Color Scheme
                                </div>
                                <div class="mb-4 text-xs font-normal text-muted-foreground">
                                    Choose Light or Dark Scheme.
                                </div>
                                <div class="flex gap-3">
                                    <div class="flex-1 w-full">
                                        <button
                                            @click="$store.app.setTheme('light'), openCustomizer = false;document.body.style.overflow = ''"
                                            class="relative flex w-full items-center justify-center rounded border px-10 py-3 text-center"
                                            :class="{'border-primary text-primary': $store.app.isDark === false}">
                                            <span
                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                x-show="$store.app.isDark === false"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                role="img" class=" h-5 w-5 iconify iconify--heroicons" width="1em"
                                                height="1em" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25
                            12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0a3.75 3.75 0 0 1 7.5 0"></path>
                                            </svg>
                                        </button>
                                        <label
                                            class="text-sm leading-none text-muted-foreground font-normal block mt-2">Light</label>
                                    </div>
                                    <div class="flex-1 w-full">
                                        <button
                                            @click="$store.app.setTheme('dark'), openCustomizer = false;document.body.style.overflow = ''"
                                            class="relative flex w-full items-center justify-center rounded border px-10 py-3 text-center"
                                            :class="{'border-primary text-primary': $store.app.isDark === true}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                role="img" class=" h-5 w-5 iconify iconify--heroicons" width="1em"
                                                height="1em" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" d="M21.752 15.002A9.7 9.7 0 0 1 18 15.75A9.75 9.75 0 0 1 8.25 6c0-1.33.266-2.597.748-3.752A9.75 9.75 0 0 0 3 11.25A9.75
                            9.75 0 0 0 12.75 21a9.75 9.75 0 0 0 9.002-5.998"></path>
                                            </svg>
                                            <span
                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                x-show="$store.app.isDark === true"></span>
                                        </button>
                                        <label
                                            class="text-sm leading-none text-muted-foreground font-normal block mt-2">Dark</label>
                                    </div>
                                </div>
                            </div>
                            <!-- end single -->
                            <div>
                                <div
                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary before:absolute before:left-0
                    before:top-0 before:z-[-1] before:h-full before:w-full before:rounded before:bg-primary before:opacity-10">
                                    Direction
                                </div>
                                <div class="mb-4 text-xs font-normal text-muted-foreground">
                                    Choose your direction
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <button
                                        @click="$store.app.setDir('ltr'), openCustomizer = false;document.body.style.overflow = ''"
                                        class="relative flex w-full items-center justify-center rounded border px-10 py-[14px] text-center"
                                        :class="{'border-primary text-primary': $store.app.direction === 'ltr'}">
                                        Ltr
                                        <span class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                            x-show="$store.app.direction === 'ltr'"></span>
                                    </button>
                                    <button
                                        @click="$store.app.setDir('rtl'), openCustomizer = false;document.body.style.overflow = ''"
                                        class="relative flex w-full items-center justify-center rounded border px-10 py-3 text-center"
                                        :class="{'border-primary text-primary': $store.app.direction === 'rtl'}">
                                        Rtl
                                        <span class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                            x-show="$store.app.direction === 'rtl'"></span>
                                    </button>
                                </div>
                            </div>
                            <!-- end single -->
                            <!-- end single -->
                            <div>
                                <div
                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary bg-primary/10">
                                    Theme
                                </div>
                                <div class="mb-4 text-xs font-normal text-muted-foreground">
                                    Choose a Theme
                                </div>
                                <div class="flex flex-wrap" x-data='{ themes: [ "zinc", "slate", "stone", "gray", "neutral", "red", "rose", "orange", "blue", "yellow", "violet", ]
                  }'>
                                    <template x-for="theme in themes" :key="theme">

                                        <button @click="$store.app.setColorTheme(theme)"
                                            class="flex-none flex h-9 w-9 items-center justify-center rounded-full text-xs"
                                            :class="{ 'border-2 border-[--theme-primary] ': $store.app.theme === theme }">
                                            <span
                                                class="flex h-6 w-6 items-center justify-center rounded-full bg-[--theme-primary] text-primary-foreground"
                                                :style="{ backgroundColor: `hsl(${ $store.app.themes.find(t => t.name === theme).activeColor[$store.app.isDark ? 'dark' :
                          'light'] })` }">
                                                <span x-show="$store.app.theme === theme">
                                                    <span class="icon-[heroicons--check] h-4 w-4"></span>
                                                </span>
                                            </span>
                                        </button>

                                    </template>
                                </div>
                            </div>
                            <!-- end single -->
                            <div>
                                <div
                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary before:absolute before:left-0
                    before:top-0 before:z-[-1] before:h-full before:w-full before:rounded before:bg-primary before:opacity-10">
                                    Sidebar Layout
                                </div>
                                <div class="mb-4 text-xs font-normal text-muted-foreground">Choose your layout</div>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                    <div>
                                        <button
                                            :disabled="$store.app.layout === 'semi-box' || $store.app.layout === 'horizontal'"
                                            @click="$store.app.setSidebarType('module'), openCustomizer = false;document.body.style.overflow = ''"
                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center disabled:cursor-not-allowed"
                                            :class="{'border-primary text-primary': $store.app.sidebarType === 'module'}">
                                            <span
                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                x-show="$store.app.sidebarType === 'module'"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 112 72"
                                                class="h-full w-full [&>rect]:fill-default-300 [&>circle]:fill-default-400 [&>path]:fill-default-400">
                                                <path d="M0 4a4 4 0 0 1 4-4h5v72H4a4 4 0 0 1-4-4zM11 0h17v72H11z">
                                                </path>
                                                <rect width="75" height="8" x="32" y="4" rx="1"></rect>
                                                <rect width="24" height="17" x="32" y="16" rx="1"></rect>
                                                <rect width="48" height="17" x="59" y="16" rx="1"></rect>
                                                <rect width="75" height="23" x="32" y="37" rx="1"></rect>
                                                <rect width="75" height="4" x="32" y="64" rx="1"></rect>
                                                <rect width="4" height="4" x="3" y="6" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="6" rx="1.5"></rect>
                                                <rect width="4" height="4" x="3" y="18" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="12" rx="1.5"></rect>
                                                <rect width="4" height="4" x="3" y="26" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="18" rx="1.5"></rect>
                                                <rect width="4" height="4" x="3" y="34" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="24" rx="1.5"></rect>
                                                <rect width="4" height="4" x="3" y="42" rx="2"></rect>
                                                <rect width="13" height="3" x="13" y="30" rx="1.5"></rect>
                                                <circle cx="38" cy="8" r="2"></circle>
                                                <circle cx="89" cy="8" r="2"></circle>
                                                <circle cx="95" cy="8" r="2"></circle>
                                                <circle cx="101" cy="8" r="2"></circle>
                                            </svg>
                                        </button>
                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                            module</label>
                                    </div>
                                    <!-- end -->
                                    <div>
                                        <button :disabled="$store.app.layout === 'semi-box'" s="s"
                                            @click="$store.app.setSidebarType('classic'), openCustomizer = false;document.body.style.overflow = ''"
                                            class="relative flex h-[72px] w-full items-center justify-center rounded border text-center disabled:cursor-not-allowed"
                                            :class="{'border-primary text-primary': $store.app.sidebarType === 'classic'}">
                                            <span
                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                x-show="$store.app.sidebarType === 'classic'"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 112 72"
                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                <path d="M4 8a4 4 0 0 1 4-4h18v64H8a4 4 0 0 1-4-4z"
                                                    class="semibox_svg__svg-slate-200"></path>
                                                <rect width="77" height="8" x="30" y="4"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="25" height="17" x="30" y="16"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="48" height="17" x="59" y="16"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="77" height="23" x="30" y="37"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="77" height="4" x="30" y="64"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="10" height="9" x="10" y="10"
                                                    class="semibox_svg__svg-slate-300" rx="2"></rect>
                                                <rect width="18" height="4" x="6" y="28"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <rect width="18" height="4" x="6" y="36"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <rect width="18" height="4" x="6" y="44"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <rect width="18" height="4" x="6" y="52"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <circle cx="36" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="89" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="95" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="101" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                            </svg>
                                        </button>
                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                            classic</label>
                                    </div>
                                    <!-- end -->
                                    <div>
                                        <button :disabled="$store.app.layout === 'horizontal'"
                                            @click="$store.app.setSidebarType('popover'), openCustomizer;document.body.style.overflow = ''"
                                            class=":disabled:cursor-not-allowed relative flex h-[72px] w-full items-center justify-center rounded border text-center"
                                            :class="{'border-primary text-primary': $store.app.sidebarType === 'popover'}">
                                            <span
                                                class="icon-[heroicons--check-circle-20-solid] absolute end-1 top-1"
                                                x-show="$store.app.sidebarType === 'popover'"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 112 72"
                                                class="w-full h-full [&amp;>rect]:fill-default-300 [&amp;>circle]:fill-default-400 [&amp;>path]:fill-default-400">
                                                <path d="M4 8a4 4 0 0 1 4-4h18v64H8a4 4 0 0 1-4-4z"
                                                    class="semibox_svg__svg-slate-200"></path>
                                                <rect width="77" height="8" x="30" y="4"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="25" height="17" x="30" y="16"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="48" height="17" x="59" y="16"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="77" height="23" x="30" y="37"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="77" height="4" x="30" y="64"
                                                    class="semibox_svg__svg-slate-200" rx="1"></rect>
                                                <rect width="10" height="9" x="10" y="10"
                                                    class="semibox_svg__svg-slate-300" rx="2"></rect>
                                                <rect width="18" height="4" x="6" y="28"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <rect width="18" height="4" x="6" y="36"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <rect width="18" height="4" x="6" y="44"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <rect width="18" height="4" x="6" y="52"
                                                    class="semibox_svg__svg-slate-300" rx="1"></rect>
                                                <circle cx="36" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="89" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="95" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                                <circle cx="101" cy="8" r="2" class="semibox_svg__svg-slate-300">
                                                </circle>
                                            </svg>
                                        </button>
                                        <label class="mt-2 block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed
                        peer-disabled:opacity-50 capitalize cursor-pointer">
                                            popover
                                        </label>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div>
                            <div>
                                <div
                                    class="relative mb-2 inline-block rounded-md px-3 py-[3px] text-xs font-medium text-primary bg-primary/10">
                                    Sidebar Image
                                </div>
                                <div class="mb-4 text-xs font-normal text-muted-foreground">Choose an image for the
                                    Sidebar.</div>
                                <div class="grid grid-cols-2 md:grid-cols-7 gap-3">
                                    <!-- Clear Background Button -->
                                    <button @click="$store.app.clearSidebarBg()"
                                        class="flex h-[72px] items-center justify-center rounded border border-border text-default-400">
                                        <template x-if="$store.app.sidebarBg === 'none'">
                                            <span>
                                                <span
                                                    class="icon-[heroicons--check] text-default-600 size-5"></span>
                                            </span>
                                        </template>
                                        <template x-if="$store.app.sidebarBg !== 'none'">
                                            <span>
                                                <span
                                                    class="icon-[heroicons--x-mark-solid] text-default-600 size-5"></span>
                                            </span>
                                        </template>
                                    </button>
                                    <!-- Selected Images -->
                                    <template x-for="(file, index) in $store.app.selectedFiles" :key="index">
                                        <button @click="$store.app.setSidebarBg(file)"
                                            :class="{'bg-default-900/60': $store.app.sidebarBg === file, '': $store.app.sidebarBg !== file}"
                                            class="relative h-[72px] rounded bg-cover bg-no-repeat bg-blend-multiply"
                                            :style="{ backgroundImage: `url(${file})`  }">
                                            <template x-if="$store.app.sidebarBg === file">
                                                <span
                                                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 transform text-primary-foreground">
                                                    <span class="icon-[heroicons--check] size-5"></span>
                                                </span>
                                            </template>
                                        </button>
                                    </template>
                                    <!-- File Upload -->
                                    <label class="flex h-[72px] items-center justify-center rounded border border-border bg-border text-muted-foreground
            cursor-pointer">
                                        <input type="file" class="hidden"
                                            @change="$store.app.handleFileChange($event)" />
                                        <span
                                            class="icon-[heroicons--cloud-arrow-up] size-5 text-default-700"></span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="relative mb-3 inline-block rounded bg-primary/10 px-3 py-[3px] text-xs font-medium text-primary">
                                    Rounded
                                </div>

                                <div class="grid grid-cols-2 md:grid-cols-5 gap-2">
                                    <template x-for="value in ['0', '0.3', '0.5', '0.75', '1.0']" :key="value">
                                        <button @click="$store.app.setRadius(parseFloat(value))" :class="{
          'border-2 border-primary bg-primary text-primary-foreground': $store.app.radius === parseFloat(value),
          'border border-default-300': $store.app.radius !== parseFloat(value)
        }" class="rounded px-3 h-10">
                                            <span x-text="value"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="relative  inline-block rounded bg-primary/10 px-3 py-[3px] mb-3 text-xs font-medium text-primary">
                                    Navbar Type
                                </div>
                                <div class="flex flex-wrap gap-3">
                                    <div class="flex items-center gap-1"
                                        @click="$store.app.setHeaderType('static')">
                                        <button
                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                            :class="{'border-primary text-primary': $store.app.headerType === 'static'}">
                                            <span class="icon-[heroicons--check-circle-solid]"
                                                x-show="$store.app.headerType === 'static'"></span>
                                        </button>
                                        <label
                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                            Static</label>
                                    </div>
                                    <!-- end single -->
                                    <div class="flex items-center gap-1"
                                        @click="$store.app.setHeaderType('sticky')">
                                        <button
                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                            :class="{'border-primary text-primary': $store.app.headerType === 'sticky'}">
                                            <span class="icon-[heroicons--check-circle-solid]"
                                                x-show="$store.app.headerType === 'sticky'"></span>
                                        </button>
                                        <label
                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                            sticky</label>
                                    </div>
                                    <!-- end single -->
                                    <div class="flex items-center gap-1"
                                        @click="$store.app.setHeaderType('floating')"
                                        x-show="$store.app.layout !== 'semi-box'">
                                        <button
                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                            :class="{'border-primary text-primary': $store.app.headerType === 'floating'}">
                                            <span class="icon-[heroicons--check-circle-20-solid]"
                                                x-show="$store.app.headerType === 'floating'"></span>
                                        </button>
                                        <label
                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                            Floating</label>
                                    </div>
                                    <!-- end single -->
                                    <div class="flex items-center gap-1"
                                        @click="$store.app.setHeaderType('hidden')">
                                        <button
                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                            :class="{'border-primary text-primary': $store.app.headerType === 'hidden'}">
                                            <span class="icon-[heroicons--check-circle-20-solid]"
                                                x-show="$store.app.headerType === 'hidden'"></span>
                                        </button>
                                        <label
                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                            hidden</label>
                                    </div>
                                    <!-- end single -->
                                </div>
                            </div>
                            <div>
                                <div
                                    class="relative  inline-block rounded bg-primary/10 px-3 py-[3px] mb-3 text-xs font-medium text-primary">
                                    Footer Type
                                </div>
                                <div class="flex flex-wrap gap-3">
                                    <div class="flex items-center gap-2"
                                        @click="$store.app.setFooterType('static')">
                                        <button
                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                            :class="{'border-primary text-primary': $store.app.footerType === 'static'}">
                                            <span class="icon-[heroicons--check-circle-20-solid]"
                                                x-show="$store.app.footerType === 'static'"></span>
                                        </button>
                                        <label
                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                            Static</label>
                                    </div>
                                    <!-- end single -->
                                    <div class="flex items-center gap-2"
                                        @click="$store.app.setFooterType('sticky')">
                                        <button
                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                            :class="{'border-primary text-primary': $store.app.footerType === 'sticky'}">
                                            <span class="icon-[heroicons--check-circle-solid]"
                                                x-show="$store.app.footerType === 'sticky'"></span>
                                        </button>
                                        <label
                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                            sticky</label>
                                    </div>

                                    <!-- end single -->
                                    <div class="flex items-center gap-2"
                                        @click="$store.app.setFooterType('hidden')">
                                        <button
                                            class="relative flex size-4 items-center justify-center rounded-full border"
                                            :class="{'border-primary text-primary': $store.app.footerType === 'hidden'}">
                                            <span class="icon-[heroicons--check-circle-20-solid]"
                                                x-show="$store.app.footerType === 'hidden'"></span>
                                        </button>
                                        <label
                                            class="block text-sm font-normal leading-none text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-50 capitalize cursor-pointer">
                                            hidden</label>
                                    </div>
                                    <!-- end single -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex p-4 gap-4">
                        <a class="flex-1 inline-flex items-center justify-center rounded-md text-sm font-semibold ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-0 disabled:opacity-50 whitespace-nowrap disabled:pointer-events-none bg-primary text-primary-foreground hover:bg-primary/80 h-10 px-4 py-2.5 w-full"
                            href="#">Buy Now</a>
                        <a class="flex-1 inline-flex items-center justify-center rounded-md text-sm font-semibold ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-0 disabled:opacity-50 whitespace-nowrap disabled:pointer-events-none bg-primary text-primary-foreground hover:bg-primary/80 h-10 px-4 py-2.5 w-full"
                            href="https://themeforest.net/user/codeshaperbd/portfolio">
                            Our Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </template>

</div>