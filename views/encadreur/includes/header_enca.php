<div class="flex min-h-svh w-full flex-col bg-[#EEF1F9] dark:bg-background" x-cloak x-show="!$store.app.loading">

    <!-- *************************
          START: Header Wrapper 
      *************************** -->
    <!--  START: Header -->
    <template x-if="$store.app.headerType !== 'floating'">
        <header x-twmerge="{
        'z-50 ': true ,
        'xl:ms-[72px]':  $store.app.collapsed ,
        'xl:ms-[272px]':  !$store.app.collapsed,
        'top-6 has-sticky-header rounded-md sticky': $store.app.layout !== 'horizontal',
        'top-0 has-sticky-header rounded-md sticky':  $store.app.layout === 'horizontal',
        'top-6 mt-6 has-sticky-header rounded-md sticky': $store.app.layout === 'semi-box',
        'top-0 rounded-none': $store.app.layout === 'vertical',
        'xl:ms-0 ms-0': $store.app.layout === 'horizontal',
        'xl:ms-[248px]': $store.app.layout === 'vertical' && !$store.app.collapsed,
        'xl:ms-[300px]': $store.app.sidebarType === 'module' && !$store.app.collapsed,
        'sticky': $store.app.headerType  === 'sticky',
        'static': $store.app.headerType  === 'static',
        'hidden': $store.app.headerType  === 'hidden'
        
        
    }">
            <!--  START: Header Top -->
            <div x-twmerge="{
        ' mx-4 xl:mx-20 ': $store.app.layout !== 'horizontal',
        ' mx-0 xl:mx-0': $store.app.layout === 'vertical'
      }">
                <div class="w-full border-b bg-card/90 px-[15px] py-3 backdrop-blur-lg md:px-6 relative z-10"
                    x-twmerge="{
        ' rounded-md': $store.app.layout !== 'horizontal',
        'rounded-none': $store.app.layout === 'vertical',
        
      }">

                    <div class="flex h-full items-center justify-between re">
                        <div class="flex items-center gap-3 md:gap-6">
                            <a href="analytics.html" class=" items-center gap-2" :class="{'hidden': $store.app.mediaQueries.isDesktop   && $store.app.layout !== 'horizontal',
      'inline-flex': $store.app.mediaQueries.isDesktop && $store.app.layout === 'horizontal'}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32"
                                    class="h-8 w-8 text-primary">
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
                            </a>
                            <button x-show="$store.app.mediaQueries.isDesktop && $store.app.layout !== 'horizontal'"
                                class="group relative opacity-50 disabled:cursor-not-allowed"
                                @click="$store.app.toggleSidebar()">
                                <div>
                                    <div class="flex h-[16px] w-[20px] origin-center transform flex-col justify-between overflow-hidden transition-all duration-300"
                                        :class="{'-translate-x-1.5 rotate-180': $store.app.collapsed}">
                                        <div class="h-[2px] origin-left transform bg-card-foreground transition-all delay-150 duration-300"
                                            :class="{'rotate-[42deg] w-[11px]': $store.app.collapsed, 'w-7': !$store.app.collapsed}">
                                        </div>
                                        <div class="h-[2px] w-7 transform rounded bg-card-foreground transition-all duration-300"
                                            :class="{'translate-x-10': $store.app.collapsed}"></div>
                                        <div class="h-[2px] origin-left transform bg-card-foreground transition-all delay-150 duration-300"
                                            :class="{'-rotate-[43deg] w-[11px]': $store.app.collapsed, 'w-7': !$store.app.collapsed}">
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <!-- end $store.app.collapsed button -->

                            <!-- end $store.app.mobile button -->
                            <div x-twmerge="{
        'hidden md:block': $store.app.sidebarType==='module',}">
                                <div x-data="{searchOpenModal: false}">
                                    <button @click="searchOpenModal = true; document.body.style.overflow = 'hidden'"
                                        class="inline-flex h-6 w-6 items-center justify-center whitespace-nowrap rounded-full text-sm">
                                        <span
                                            class="icon-[heroicons--magnifying-glass] h-5 w-5 text-default-500"></span>
                                    </button>

                                    <template x-teleport="body">
                                        <div x-cloak x-show="searchOpenModal" x-transition.opacity.duration.200ms
                                            x-trap.inert.noscroll="searchOpenModal"
                                            @keydown.esc.window="searchOpenModal = false"
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
                                                        <div
                                                            class="flex items-center justify-around gap-2 border-b px-3">
                                                            <div class="flex items-center flex-1">
                                                                <span
                                                                    class="icon-[heroicons--magnifying-glass] me-2 h-4 w-4 shrink-0 opacity-50"></span>
                                                                <input
                                                                    class="flex h-11 w-full rounded-md bg-transparent py-3 text-sm outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed             disabled:opacity-50 capitalize"
                                                                    placeholder="Search options..."
                                                                    autocomplete="off" x-model="searchQuery" />
                                                            </div>
                                                            <button class="flex-none"
                                                                @click="searchOpenModal = false"
                                                                aria-label="close modal">
                                                                <span
                                                                    class="icon-[heroicons--x-mark] h-4 w-4"></span>
                                                            </button>
                                                        </div>
                                                        <template x-for="group in filteredOptions()"
                                                            x-bind:key="group.area">
                                                            <div class="mb-2">
                                                                <!-- Group Label -->
                                                                <div class="text-xs font-bold text-default-500 uppercase p-2"
                                                                    x-text="group.area"></div>
                                                                <template x-for="item in group.items"
                                                                    x-bind:key="item.label">
                                                                    <a :href="item.link"
                                                                        class="flex items-center px-2 py-1.5 text-sm rounded-md cursor-pointer hover:bg-default-200 ">
                                                                        <span :class="item.icon"
                                                                            class="text-base"></span>
                                                                        <span class="ml-2"
                                                                            x-text="item.label"></span>
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
                            <!-- end search -->
                        </div>
                        <!-- end left -->
                        <div class="nav-tools flex items-center gap-4">
                            <div class="relative lg:block  hidden">
                                <div x-data="{
            options: [
            {
            value: 'eng',
            label: 'English',
            src: './assets/images/country/usa.png',
            },
            {
            value: 'spanish',
            label: 'Spanish',
            src: './assets/images/country/spain.png',
            },
            ],
            isOpen: false,
            openedWithKeyboard: false,
            selectedOption: null,
            setSelectedOption(option) {
            this.selectedOption = option
            this.isOpen = false
            this.openedWithKeyboard = false
            this.$refs.hiddenTextField.value = option.value
            },
            highlightFirstMatchingOption(pressedKey) {
            const option = this.options.find((item) =>
            item.label.toLowerCase().startsWith(pressedKey.toLowerCase()),
            )
            if (option) {
            const index = this.options.indexOf(option)
            const allOptions = document.querySelectorAll('.combobox-option')
            if (allOptions[index]) {
            allOptions[index].focus()
            }
            }
            },
            }" class="flex w-full max-w-xs flex-col gap-1" x-on:keydown="highlightFirstMatchingOption($event.key)"
                                    x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
                                    <div class="relative">
                                        <!-- trigger button  -->
                                        <button type="button" role="combobox"
                                            class="flex h-10 w-full items-center justify-between whitespace-nowrap rounded-lg text-sm text-default-500 transition duration-300 placeholder:text-accent-foreground/50 read-only:bg-card focus:border-default-500/50 focus:outline-none disabled:cursor-not-allowed disabled:bg-default-200 disabled:opacity-50 [&>svg]:h-5 [&>svg]:w-5 [&>svg]:stroke-default-600"
                                            aria-haspopup="listbox" aria-controls="industriesList"
                                            x-on:click="isOpen = ! isOpen"
                                            x-on:keydown.down.prevent="openedWithKeyboard = true"
                                            x-on:keydown.enter.prevent="openedWithKeyboard = true"
                                            x-on:keydown.space.prevent="openedWithKeyboard = true"
                                            x-bind:aria-label="selectedOption ? selectedOption.value : 'All Task'"
                                            x-bind:aria-expanded="isOpen || openedWithKeyboard">

                                            <span class="w-6 h-6 rounded-full me-1.5">
                                                <img :src=" selectedOption ? selectedOption.src : './assets/images/country/usa.png'"
                                                    alt="" class="w-full h-full object-cover rounded-full" />
                                            </span>
                                            <span class="text-sm text-default-600 capitalize"
                                                x-text="selectedOption ? selectedOption.value : 'eng'"></span>
                                            <!-- Chevron  -->
                                            <span class="icon-[lucide--chevron-down] ms-1 h-4 w-4"></span>
                                        </button>
                                        <!-- hidden input to grab the selected value  -->
                                        <input id="industry" name="industry" type="text" x-ref="hiddenTextField"
                                            hidden class="hidden" />
                                        <ul x-cloak x-show="isOpen || openedWithKeyboard" id="industriesList"
                                            class="absolute left-0 top-11 z-10 flex max-h-44 w-fit flex-col overflow-hidden overflow-y-auto  border bg-popover shadow-sm p-0.5 rounded-md"
                                            role="listbox" aria-label="industries list"
                                            x-on:click.outside="isOpen = false, openedWithKeyboard = false"
                                            x-on:keydown.down.prevent="$focus.wrap().next()"
                                            x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition
                                            x-trap="openedWithKeyboard">
                                            <template x-for="(item, index) in options" x-bind:key="item.value">
                                                <li class="combobox-option inline-flex cursor-pointer min-w-[120px] justify-between gap-6 px-4 py-2  hover:bg-default-100 "
                                                    role="option" x-on:click="setSelectedOption(item)"
                                                    x-on:keydown.enter="setSelectedOption(item)"
                                                    x-bind:id="'option-' + index" tabindex="0">
                                                    <div class="flex-1 flex gap-2">
                                                        <span class="w-4 h-4 rounded-full block ">
                                                            <img :src="item.src" alt=""
                                                                class="w-full h-full object-cover rounded-full" />
                                                        </span>
                                                        <!-- Label  -->
                                                        <span
                                                            x-bind:class="selectedOption == item ? 'font-bold' : null"
                                                            x-text="item.label"></span>
                                                    </div>

                                                    <!-- Checkmark  -->
                                                    <span class="icon-[heroicons--check] h-4 w-4"
                                                        x-show="selectedOption == item"></span>
                                                </li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:flex justify-center hidden" x-init="$store.app.init()">
                                <button @click="$store.app.toggleDarkMode()" type="button"
                                    class="relative inline-flex h-8 w-8 items-center justify-center whitespace-nowrap rounded-md bg-transparent text-sm font-bold text-default-500 ring-offset-background transition-colors hover:bg-default-100 hover:text-primary focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50 data-[state=open]:bg-default-100 dark:text-default-800 dark:hover:bg-default-200 dark:data-[state=open]:bg-default-200 md:h-9 md:w-9">
                                    <span class="icon-[lucide--sun] h-5 w-5" x-show="!$store.app.isDark"></span>
                                    <span class="icon-[lucide--moon] h-5 w-5" x-show="$store.app.isDark"></span>
                                </button>
                            </div>
                            <div class="flex justify-center">
                                <div x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                    x-id="['dropdown-button']" class="relative">
                                    <!-- Button -->
                                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                        :aria-controls="$id('dropdown-button')" type="button"
                                        class="relative inline-flex h-8 w-8 items-center justify-center whitespace-nowrap rounded-md bg-transparent text-sm font-bold text-default-500 ring-offset-background transition-colors hover:bg-default-100 hover:text-primary focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50 data-[state=open]:bg-default-100 dark:text-default-800 dark:hover:bg-default-200 dark:data-[state=open]:bg-default-200 md:h-9 md:w-9">
                                        <span class="icon-[lucide--mails] h-5 w-5"></span>
                                        <span
                                            class="absolute bottom-[calc(100%-16px)] left-[calc(100%-18px)] inline-flex h-4 w-4 items-center justify-center rounded-md border border-transparent bg-primary p-0 text-xs font-medium text-primary-foreground ring-2 ring-primary-foreground transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2">
                                            5
                                        </span>
                                    </button>

                                    <!-- Panel -->
                                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                        style="display: none"
                                        class="absolute -end-32 md:end-0 top-full  z-[999] mx-4 w-[312px] lg:w-[412px] p-0  border bg-popover rounded-md text-popover-foreground shadow-md overflow-hidden ">
                                        <div>
                                            <div class="relative">
                                                <div class="w-full h-full bg-cover bg-no-repeat p-4 flex items-center rounded-t-md"
                                                    style="background-image: url('../../assets/app/images/all-img/short-image-2.png');">
                                                    <span
                                                        class="text-base font-semibold text-primary-foreground flex-1">
                                                        Message</span>
                                                    <span
                                                        class="text-xs font-medium text-primary-foreground flex-0 cursor-pointer hover:underline hover:decoration-default-100 dark:hover:decoration-default-900">
                                                        View All
                                                    </span>
                                                </div>

                                                <div
                                                    class="h-[300px] xl:h-[350px] custom-scrollbar overflow-y-auto">
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-7.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-8.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-9.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>

                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-1.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-7.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-2.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-3.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end mail -->
                            <div class="flex justify-center">
                                <div x-data="{
      open: false,
      toggle() {
      if (this.open) {
      return this.close()
      }
      this.$refs.button.focus()
      this.open = true
      },
      close(focusAfter) {
      if (! this.open) return
      this.open = false
      focusAfter && focusAfter.focus()
      }
      }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                    x-id="['dropdown-button']" class="relative">
                                    <!-- Button -->
                                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                        :aria-controls="$id('dropdown-button')" type="button"
                                        class="relative inline-flex h-8 w-8 items-center justify-center whitespace-nowrap rounded-md bg-transparent text-sm font-bold text-default-500 ring-offset-background transition-colors hover:bg-default-100 hover:text-primary focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50 data-[state=open]:bg-default-100 dark:text-default-800 dark:hover:bg-default-200 dark:data-[state=open]:bg-default-200 md:h-9 md:w-9">
                                        <span class="icon-[lucide--bell-dot] h-5 w-5"></span>
                                        <span
                                            class="absolute bottom-[calc(100%-16px)] left-[calc(100%-18px)] inline-flex h-4 w-4 items-center justify-center rounded-md border border-transparent bg-primary p-0 text-xs font-medium text-primary-foreground ring-2 ring-primary-foreground transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2">
                                            5
                                        </span>
                                    </button>
                                    <!-- Panel -->
                                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                        style="display: none"
                                        class="absolute -end-20 md:end-0 top-full  z-[999] mx-4 w-[312px] lg:w-[412px] p-0 rounded-md border bg-popover text-popover-foreground shadow-md overflow-hidden">
                                        <div class="relative">

                                            <div class="w-full h-full bg-cover bg-no-repeat p-4 flex items-center rounded-t-md"
                                                style="background-image: url('../../assets/app/images/all-img/short-image-2.png');">
                                                <span
                                                    class="text-base font-semibold text-primary-foreground flex-1">
                                                    Notification</span>
                                                <span
                                                    class="text-xs font-medium text-primary-foreground flex-0 cursor-pointer hover:underline hover:decoration-default-100 dark:hover:decoration-default-900">
                                                    Mark all as read
                                                </span>
                                            </div>
                                            <div class="h-[300px] xl:h-[350px] custom-scrollbar overflow-y-auto">
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-7.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-8.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-9.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>

                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-1.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-7.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-2.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-3.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>

                                            </div>
                                            <div
                                                class="relative items-center rounded-b-md text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-3 px-4 cursor-pointer  border border-t">
                                                <a href="javascript:void(0)" @click="toggle()"
                                                    class="text-sm font-bold bg-primary text-primary-foreground text-center p-3 w-full rounded">
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end notification -->
                            <div class="flex justify-center">

                                <div x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                    x-id="['dropdown-button']" class="relative">
                                    <!-- Button -->
                                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                        :aria-controls="$id('dropdown-button')" type="button"
                                        class="h-9 w-9 cursor-pointer rounded-full">
                                        <img src="../../assets/app/images/avatar/avatar-1.jpg" alt=""
                                            class="h-full w-full rounded-full object-cover object-center" />
                                    </button>

                                    <!-- Panel -->
                                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                        style="display: none"
                                        class="absolute end-0 top-full w-56 rounded-md border bg-popover text-popover-foreground shadow-md z-[999] overflow-hidden">
                                        <div>
                                            <div class="flex gap-2 items-center mb-1 px-3 py-3">
                                                <img src='assets/images/avatar/avatar-1.jpg'
                                                    class="rounded-full h-9 w-9 " />
                                                <div>
                                                    <div class="text-sm font-medium text-default-800 capitalize ">
                                                        Mcc Callem
                                                    </div>
                                                    <a href="#" class="text-xs text-default-600 hover:text-primary">
                                                        @uxuidesigner
                                                    </a>
                                                </div>
                                            </div>
                                            <div x-data="{profiles: [
                {
                  name: 'profile',
                  icon: 'icon-[heroicons--user]',
                  link:'/'
                },
                {
                  name: 'Billing',
                  icon: 'icon-[heroicons--megaphone]',
                  link:'/'
                },
                {
                  name: 'Settings',
                  icon: 'icon-[heroicons--paper-airplane]',
                  link:'/'
                },
                {
                  name: 'Keyboard shortcuts',
                  icon: 'icon-[heroicons--language]',
                  link:'/'
                },
                {
                  name: 'Team',
                  icon: 'icon-[heroicons--user]',
                  link:'/user-profile.html'
                },
                {
                  name: 'Invite',
                  icon: 'icon-[heroicons--megaphone]',
                  link:'/'
                },
                {
                  name: 'Github',
                  icon: 'icon-[heroicons--paper-airplane]',
                  link:'/'
                },
                {
                  name: 'Support',
                  icon: 'icon-[heroicons--language]',
                  link:'/'
                },
                ]}">
                                                <template x-for="profile in profiles">

                                                    <a class="cursor-pointer">
                                                        <div
                                                            class="flex items-center gap-2 text-sm font-medium text-default-600 capitalize px-3 py-1.5 cursor-pointer hover:bg-default-200 duration-200 transition-all ease-in-out">
                                                            <span :class="profile.icon" class="h-4 w-4"></span>
                                                            <p x-text="profile.name"></p>
                                                        </div>
                                                    </a>
                                                </template>
                                                <a href="#"
                                                    class="flex items-center gap-2 text-sm font-medium text-default-600 capitalize px-3 py-1.5 cursor-pointer hover:bg-default-200 duration-200 transition-all ease-in-out">
                                                    <span class="icon-[heroicons--power] w-4 h-4"></span>
                                                    <p>Logout</p>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button x-show="!$store.app.mediaQueries.isDesktop"
                                class="group relative opacity-50 disabled:cursor-not-allowed"
                                @click="$store.app.toggleMobileMenu()">
                                <div>
                                    <div class="flex h-[16px] w-[20px] origin-center transform flex-col justify-between overflow-hidden transition-all duration-300"
                                        :class="{'-translate-x-1.5 rotate-180': $store.app.mobileMenuOpen}">
                                        <div class="h-[2px] origin-left transform bg-card-foreground transition-all delay-150 duration-300"
                                            :class="{'rotate-[42deg] w-[11px]': $store.app.mobileMenuOpen, 'w-7': !$store.app.mobileMenuOpen}">
                                        </div>
                                        <div class="h-[2px] w-7 transform rounded bg-card-foreground transition-all duration-300"
                                            :class="{'translate-x-10': $store.app.mobileMenuOpen}"></div>
                                        <div class="h-[2px] origin-left transform bg-card-foreground transition-all delay-150 duration-300"
                                            :class="{'-rotate-[43deg] w-[11px]': $store.app.mobileMenuOpen, 'w-7': !$store.app.mobileMenuOpen}">
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <!-- end user -->
                        </div>
                    </div>
                </div>
            </div>
            <!--  END: Header Top -->

            <!--  START: Header Menu -->
            <div x-show="$store.app.mediaQueries.isDesktop && $store.app.layout === 'horizontal'" x-twmerge="{
        'w-full bg-card bg-card/90 px-4 py-2 shadow-md backdrop-blur-lg relative':true,
        'rounded-b-md': $store.app.headerType  === 'floating'
       }">
                <nav x-data="{ openIndex: null }">
                    <ul class="group gap-1 flex flex-wrap items-center justify-start list-none p-0">
                        <template x-for="(item, index) in $store.app.horizontalMenus" key="index">
                            <li class="group relative" @mouseenter="openIndex = index"
                                @mouseleave="openIndex = null">
                                <template x-if="item.type === 'item' && !item.submenu">
                                    <a :href="item.link || 'javascript:void(0)'"
                                        class=" flex cursor-pointer items-center  h-9 rounded-md px-3  text-default-700 hover:text-primary-foreground hover:bg-primary"
                                        x-twmerge="{
                            'text-primary': $store.app.currentPage === item.link 
                    }">
                                        <span :class="item.icon" class="leading-0 relative me-1 size-4"></span>
                                        <span x-text="item.label" class="text-sm font-medium"></span>
                                    </a>
                                </template>
                                <template x-if="item.type === 'item' && item.submenu">
                                    <a :href="item.link"
                                        class="flex cursor-pointer items-center  h-9 rounded-md px-3  text-default-700 hover:text-primary-foreground hover:bg-primary"
                                        x-twmerge="{
                            'bg-primary text-primary-foreground':  $store.app.isSubmenuActive(item) 
                         }">
                                        <span :class="item.icon" class="leading-0 relative me-1 size-4"></span>
                                        <span x-text="item.label" class="text-sm font-medium"></span>
                                        <span class="icon-[heroicons--chevron-down]   h-4 w-4 ms-2"></span>

                                    </a>
                                </template>

                                <ul x-show="openIndex === index && item.submenu"
                                    class="absolute start-0 top-full z-50 w-[160px] border bg-card ps-2.5 pe-1.5 py-2 rounded-md space-y-1.5 max-h-96 overflow-y-auto custom-scrollbar "
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform translate-y-4"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform translate-y-4">
                                    <template x-for="subitem in item.submenu">
                                        <li class="relative block">
                                            <a :href="subitem.link || 'javascript:void(0)'"
                                                class="flex items-center text-default-600 rounded text-sm font-normal capitalize  transition-all duration-150 truncate whitespace-nowrap"
                                                :class="{
                        'text-primary ': $store.app.currentPage === subitem.link,
                        'hover:text-primary ': subitem.link,
                        'cursor-not-allowed !text-default-400 justify-between': subitem.badge
                      }">
                                                <span x-text="subitem.label"></span>
                                                <span x-show="!subitem.link && subitem.badge" x-text="subitem.badge"
                                                    class="bg-primary py-0.5 px-1.5 rounded-full text-xs text-primary-foreground capitalize"></span>
                                            </a>
                                        </li>
                                    </template>
                                </ul>
                        </template>
                        </li>

                    </ul>
                </nav>
            </div>
            <!--  END: Header Menu -->

        </header>
    </template>
    <!--  END: Header -->

    <!--  START: Floating Header -->
    <template x-if="$store.app.headerType === 'floating'">
        <header x-twmerge="{
        'z-50 mb-6 top-6 has-sticky-header rounded-md sticky': true ,
         'xl:ms-[72px]':  $store.app.collapsed ,
        'xl:ms-[250px]':  !$store.app.collapsed,
         'top-6 rounded-none': $store.app.layout === 'vertical',
        'xl:ms-0 ms-0': $store.app.layout === 'horizontal',
        'xl:ms-[248px]': $store.app.layout === 'vertical' && !$store.app.collapsed,
        'xl:ms-[300px]': $store.app.sidebarType === 'module' && !$store.app.collapsed,
        'sticky': $store.app.headerType  === 'sticky',
        'static': $store.app.headerType  === 'static',
        'hidden': $store.app.headerType  === 'hidden'
    
        
        
    }">
            <div x-twmerge="{ 'mx-4': true ,
                'md:mx-6': $store.app.layout === 'horizontal', 
        'md:mx-6': $store.app.layout === 'vertical',
      }">

                <!--  START: Floating Header top -->
                <div x-twmerge="{
        'w-full rounded-md border-b bg-card/90 px-[15px] py-3 backdrop-blur-lg md:px-6 relative z-10':true,
        'rounded-b-none': $store.app.headerType  === 'floating'
       }">

                    <div class="flex h-full items-center justify-between re">
                        <div class="flex items-center gap-3 md:gap-6">
                            <a href="analytics.html" class=" items-center gap-2" :class="{'hidden': $store.app.mediaQueries.isDesktop   && $store.app.layout !== 'horizontal',
      'inline-flex': $store.app.mediaQueries.isDesktop && $store.app.layout === 'horizontal'}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32"
                                    class="h-8 w-8 text-primary">
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
                            </a>
                            <button x-show="$store.app.mediaQueries.isDesktop && $store.app.layout !== 'horizontal'"
                                class="group relative opacity-50 disabled:cursor-not-allowed"
                                @click="$store.app.toggleSidebar()">
                                <div>
                                    <div class="flex h-[16px] w-[20px] origin-center transform flex-col justify-between overflow-hidden transition-all duration-300"
                                        :class="{'-translate-x-1.5 rotate-180': $store.app.collapsed}">
                                        <div class="h-[2px] origin-left transform bg-card-foreground transition-all delay-150 duration-300"
                                            :class="{'rotate-[42deg] w-[11px]': $store.app.collapsed, 'w-7': !$store.app.collapsed}">
                                        </div>
                                        <div class="h-[2px] w-7 transform rounded bg-card-foreground transition-all duration-300"
                                            :class="{'translate-x-10': $store.app.collapsed}"></div>
                                        <div class="h-[2px] origin-left transform bg-card-foreground transition-all delay-150 duration-300"
                                            :class="{'-rotate-[43deg] w-[11px]': $store.app.collapsed, 'w-7': !$store.app.collapsed}">
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <!-- end $store.app.collapsed button -->

                            <!-- end $store.app.mobile button -->
                            <div x-twmerge="{
        'hidden md:block': $store.app.sidebarType==='module',}">
                                <div x-data="{searchOpenModal: false}">
                                    <button @click="searchOpenModal = true; document.body.style.overflow = 'hidden'"
                                        class="inline-flex h-6 w-6 items-center justify-center whitespace-nowrap rounded-full text-sm">
                                        <span
                                            class="icon-[heroicons--magnifying-glass] h-5 w-5 text-default-500"></span>
                                    </button>

                                    <template x-teleport="body">
                                        <div x-cloak x-show="searchOpenModal" x-transition.opacity.duration.200ms
                                            x-trap.inert.noscroll="searchOpenModal"
                                            @keydown.esc.window="searchOpenModal = false"
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
                                                        <div
                                                            class="flex items-center justify-around gap-2 border-b px-3">
                                                            <div class="flex items-center flex-1">
                                                                <span
                                                                    class="icon-[heroicons--magnifying-glass] me-2 h-4 w-4 shrink-0 opacity-50"></span>
                                                                <input
                                                                    class="flex h-11 w-full rounded-md bg-transparent py-3 text-sm outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed             disabled:opacity-50 capitalize"
                                                                    placeholder="Search options..."
                                                                    autocomplete="off" x-model="searchQuery" />
                                                            </div>
                                                            <button class="flex-none"
                                                                @click="searchOpenModal = false"
                                                                aria-label="close modal">
                                                                <span
                                                                    class="icon-[heroicons--x-mark] h-4 w-4"></span>
                                                            </button>
                                                        </div>
                                                        <template x-for="group in filteredOptions()"
                                                            x-bind:key="group.area">
                                                            <div class="mb-2">
                                                                <!-- Group Label -->
                                                                <div class="text-xs font-bold text-default-500 uppercase p-2"
                                                                    x-text="group.area"></div>
                                                                <template x-for="item in group.items"
                                                                    x-bind:key="item.label">
                                                                    <a :href="item.link"
                                                                        class="flex items-center px-2 py-1.5 text-sm rounded-md cursor-pointer hover:bg-default-200 ">
                                                                        <span :class="item.icon"
                                                                            class="text-base"></span>
                                                                        <span class="ml-2"
                                                                            x-text="item.label"></span>
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
                            <!-- end search -->
                        </div>
                        <!-- end left -->
                        <div class="nav-tools flex items-center gap-4">
                            <div class="relative lg:block  hidden">
                                <div x-data="{
            options: [
            {
            value: 'eng',
            label: 'English',
            src: './assets/images/country/usa.png',
            },
            {
            value: 'spanish',
            label: 'Spanish',
            src: './assets/images/country/spain.png',
            },
            ],
            isOpen: false,
            openedWithKeyboard: false,
            selectedOption: null,
            setSelectedOption(option) {
            this.selectedOption = option
            this.isOpen = false
            this.openedWithKeyboard = false
            this.$refs.hiddenTextField.value = option.value
            },
            highlightFirstMatchingOption(pressedKey) {
            const option = this.options.find((item) =>
            item.label.toLowerCase().startsWith(pressedKey.toLowerCase()),
            )
            if (option) {
            const index = this.options.indexOf(option)
            const allOptions = document.querySelectorAll('.combobox-option')
            if (allOptions[index]) {
            allOptions[index].focus()
            }
            }
            },
            }" class="flex w-full max-w-xs flex-col gap-1" x-on:keydown="highlightFirstMatchingOption($event.key)"
                                    x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
                                    <div class="relative">
                                        <!-- trigger button  -->
                                        <button type="button" role="combobox"
                                            class="flex h-10 w-full items-center justify-between whitespace-nowrap rounded-lg text-sm text-default-500 transition duration-300 placeholder:text-accent-foreground/50 read-only:bg-card focus:border-default-500/50 focus:outline-none disabled:cursor-not-allowed disabled:bg-default-200 disabled:opacity-50 [&>svg]:h-5 [&>svg]:w-5 [&>svg]:stroke-default-600"
                                            aria-haspopup="listbox" aria-controls="industriesList"
                                            x-on:click="isOpen = ! isOpen"
                                            x-on:keydown.down.prevent="openedWithKeyboard = true"
                                            x-on:keydown.enter.prevent="openedWithKeyboard = true"
                                            x-on:keydown.space.prevent="openedWithKeyboard = true"
                                            x-bind:aria-label="selectedOption ? selectedOption.value : 'All Task'"
                                            x-bind:aria-expanded="isOpen || openedWithKeyboard">

                                            <span class="w-6 h-6 rounded-full me-1.5">
                                                <img :src=" selectedOption ? selectedOption.src : './assets/images/country/usa.png'"
                                                    alt="" class="w-full h-full object-cover rounded-full" />
                                            </span>
                                            <span class="text-sm text-default-600 capitalize"
                                                x-text="selectedOption ? selectedOption.value : 'eng'"></span>
                                            <!-- Chevron  -->
                                            <span class="icon-[lucide--chevron-down] ms-1 h-4 w-4"></span>
                                        </button>
                                        <!-- hidden input to grab the selected value  -->
                                        <input id="industry" name="industry" type="text" x-ref="hiddenTextField"
                                            hidden class="hidden" />
                                        <ul x-cloak x-show="isOpen || openedWithKeyboard" id="industriesList"
                                            class="absolute left-0 top-11 z-10 flex max-h-44 w-fit flex-col overflow-hidden overflow-y-auto  border bg-popover shadow-sm p-0.5 rounded-md"
                                            role="listbox" aria-label="industries list"
                                            x-on:click.outside="isOpen = false, openedWithKeyboard = false"
                                            x-on:keydown.down.prevent="$focus.wrap().next()"
                                            x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition
                                            x-trap="openedWithKeyboard">
                                            <template x-for="(item, index) in options" x-bind:key="item.value">
                                                <li class="combobox-option inline-flex cursor-pointer min-w-[120px] justify-between gap-6 px-4 py-2  hover:bg-default-100 "
                                                    role="option" x-on:click="setSelectedOption(item)"
                                                    x-on:keydown.enter="setSelectedOption(item)"
                                                    x-bind:id="'option-' + index" tabindex="0">
                                                    <div class="flex-1 flex gap-2">
                                                        <span class="w-4 h-4 rounded-full block ">
                                                            <img :src="item.src" alt=""
                                                                class="w-full h-full object-cover rounded-full" />
                                                        </span>
                                                        <!-- Label  -->
                                                        <span
                                                            x-bind:class="selectedOption == item ? 'font-bold' : null"
                                                            x-text="item.label"></span>
                                                    </div>

                                                    <!-- Checkmark  -->
                                                    <span class="icon-[heroicons--check] h-4 w-4"
                                                        x-show="selectedOption == item"></span>
                                                </li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:flex justify-center hidden" x-init="$store.app.init()">
                                <button @click="$store.app.toggleDarkMode()" type="button"
                                    class="relative inline-flex h-8 w-8 items-center justify-center whitespace-nowrap rounded-md bg-transparent text-sm font-bold text-default-500 ring-offset-background transition-colors hover:bg-default-100 hover:text-primary focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50 data-[state=open]:bg-default-100 dark:text-default-800 dark:hover:bg-default-200 dark:data-[state=open]:bg-default-200 md:h-9 md:w-9">
                                    <span class="icon-[lucide--sun] h-5 w-5" x-show="!$store.app.isDark"></span>
                                    <span class="icon-[lucide--moon] h-5 w-5" x-show="$store.app.isDark"></span>
                                </button>
                            </div>
                            <div class="flex justify-center">
                                <div x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                    x-id="['dropdown-button']" class="relative">
                                    <!-- Button -->
                                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                        :aria-controls="$id('dropdown-button')" type="button"
                                        class="relative inline-flex h-8 w-8 items-center justify-center whitespace-nowrap rounded-md bg-transparent text-sm font-bold text-default-500 ring-offset-background transition-colors hover:bg-default-100 hover:text-primary focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50 data-[state=open]:bg-default-100 dark:text-default-800 dark:hover:bg-default-200 dark:data-[state=open]:bg-default-200 md:h-9 md:w-9">
                                        <span class="icon-[lucide--mails] h-5 w-5"></span>
                                        <span
                                            class="absolute bottom-[calc(100%-16px)] left-[calc(100%-18px)] inline-flex h-4 w-4 items-center justify-center rounded-md border border-transparent bg-primary p-0 text-xs font-medium text-primary-foreground ring-2 ring-primary-foreground transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2">
                                            5
                                        </span>
                                    </button>

                                    <!-- Panel -->
                                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                        style="display: none"
                                        class="absolute -end-32 md:end-0 top-full  z-[999] mx-4 w-[312px] lg:w-[412px] p-0  border bg-popover rounded-md text-popover-foreground shadow-md overflow-hidden ">
                                        <div>
                                            <div class="relative">
                                                <div class="w-full h-full bg-cover bg-no-repeat p-4 flex items-center rounded-t-md"
                                                    style="background-image: url('../../assets/app/images/all-img/short-image-2.png');">
                                                    <span
                                                        class="text-base font-semibold text-primary-foreground flex-1">
                                                        Message</span>
                                                    <span
                                                        class="text-xs font-medium text-primary-foreground flex-0 cursor-pointer hover:underline hover:decoration-default-100 dark:hover:decoration-default-900">
                                                        View All
                                                    </span>
                                                </div>

                                                <div
                                                    class="h-[300px] xl:h-[350px] custom-scrollbar overflow-y-auto">
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-7.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-8.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-9.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>

                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-1.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-7.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-2.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-3.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                    <div
                                                        class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                        <div class="flex-1 flex items-center gap-2">
                                                            <span
                                                                class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                    class="aspect-square h-full w-full rounded-full"
                                                                    src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                            <div>
                                                                <div
                                                                    class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                    Felecia Rower</div>
                                                                <div
                                                                    class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                    Cake pie jelly jelly beans. Marzipan lemon drops
                                                                    halvah cake. Pudding cookie lemon drops icing
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium whitespace-nowrap text-default-600">
                                                            10 am</div>
                                                        <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end mail -->
                            <div class="flex justify-center">
                                <div x-data="{
      open: false,
      toggle() {
      if (this.open) {
      return this.close()
      }
      this.$refs.button.focus()
      this.open = true
      },
      close(focusAfter) {
      if (! this.open) return
      this.open = false
      focusAfter && focusAfter.focus()
      }
      }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                    x-id="['dropdown-button']" class="relative">
                                    <!-- Button -->
                                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                        :aria-controls="$id('dropdown-button')" type="button"
                                        class="relative inline-flex h-8 w-8 items-center justify-center whitespace-nowrap rounded-md bg-transparent text-sm font-bold text-default-500 ring-offset-background transition-colors hover:bg-default-100 hover:text-primary focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50 data-[state=open]:bg-default-100 dark:text-default-800 dark:hover:bg-default-200 dark:data-[state=open]:bg-default-200 md:h-9 md:w-9">
                                        <span class="icon-[lucide--bell-dot] h-5 w-5"></span>
                                        <span
                                            class="absolute bottom-[calc(100%-16px)] left-[calc(100%-18px)] inline-flex h-4 w-4 items-center justify-center rounded-md border border-transparent bg-primary p-0 text-xs font-medium text-primary-foreground ring-2 ring-primary-foreground transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2">
                                            5
                                        </span>
                                    </button>
                                    <!-- Panel -->
                                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                        style="display: none"
                                        class="absolute -end-20 md:end-0 top-full  z-[999] mx-4 w-[312px] lg:w-[412px] p-0 rounded-md border bg-popover text-popover-foreground shadow-md overflow-hidden">
                                        <div class="relative">

                                            <div class="w-full h-full bg-cover bg-no-repeat p-4 flex items-center rounded-t-md"
                                                style="background-image: url('../../assets/app/images/all-img/short-image-2.png');">
                                                <span
                                                    class="text-base font-semibold text-primary-foreground flex-1">
                                                    Notification</span>
                                                <span
                                                    class="text-xs font-medium text-primary-foreground flex-0 cursor-pointer hover:underline hover:decoration-default-100 dark:hover:decoration-default-900">
                                                    Mark all as read
                                                </span>
                                            </div>
                                            <div class="h-[300px] xl:h-[350px] custom-scrollbar overflow-y-auto">
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-7.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-8.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-9.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>

                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-1.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-7.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-2.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-3.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-transparent"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>
                                                <div
                                                    class="relative hover:bg-default-200 items-center rounded-sm text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-2 px-4 cursor-pointer ">
                                                    <div class="flex-1 flex items-center gap-2">
                                                        <span
                                                            class="relative flex shrink-0 overflow-hidden h-10 w-10 rounded"><img
                                                                class="aspect-square h-full w-full rounded-full"
                                                                src="../../assets/app/images/avatar/avatar-5.jpg" /></span>
                                                        <div>
                                                            <div
                                                                class="text-sm font-medium text-default-900 mb-[2px] whitespace-nowrap">
                                                                Felecia Rower</div>
                                                            <div
                                                                class="text-xs text-default-900 truncate max-w-[100px] lg:max-w-[185px]">
                                                                Cake pie jelly jelly beans. Marzipan lemon drops
                                                                halvah cake. Pudding cookie lemon drops icing</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xs font-medium whitespace-nowrap text-default-600">
                                                        10 am</div>
                                                    <div class="w-2 h-2 rounded-full me-2 bg-primary"></div>
                                                </div>

                                            </div>
                                            <div
                                                class="relative items-center rounded-b-md text-sm outline-none transition-colors focus:bg-default-200 focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 flex gap-9 py-3 px-4 cursor-pointer  border border-t">
                                                <a href="javascript:void(0)" @click="toggle()"
                                                    class="text-sm font-bold bg-primary text-primary-foreground text-center p-3 w-full rounded">
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end notification -->
                            <div class="flex justify-center">

                                <div x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                    x-id="['dropdown-button']" class="relative">
                                    <!-- Button -->
                                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                        :aria-controls="$id('dropdown-button')" type="button"
                                        class="h-9 w-9 cursor-pointer rounded-full">
                                        <img src="../../assets/app/images/avatar/avatar-1.jpg" alt=""
                                            class="h-full w-full rounded-full object-cover object-center" />
                                    </button>

                                    <!-- Panel -->
                                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                        style="display: none"
                                        class="absolute end-0 top-full w-56 rounded-md border bg-popover text-popover-foreground shadow-md z-[999] overflow-hidden">
                                        <div>
                                            <div class="flex gap-2 items-center mb-1 px-3 py-3">
                                                <img src='assets/images/avatar/avatar-1.jpg'
                                                    class="rounded-full h-9 w-9 " />
                                                <div>
                                                    <div class="text-sm font-medium text-default-800 capitalize ">
                                                        Mcc Callem
                                                    </div>
                                                    <a href="#" class="text-xs text-default-600 hover:text-primary">
                                                        @uxuidesigner
                                                    </a>
                                                </div>
                                            </div>
                                            <div x-data="{profiles: [
                {
                  name: 'profile',
                  icon: 'icon-[heroicons--user]',
                  link:'/'
                },
                {
                  name: 'Billing',
                  icon: 'icon-[heroicons--megaphone]',
                  link:'/'
                },
                {
                  name: 'Settings',
                  icon: 'icon-[heroicons--paper-airplane]',
                  link:'/'
                },
                {
                  name: 'Keyboard shortcuts',
                  icon: 'icon-[heroicons--language]',
                  link:'/'
                },
                {
                  name: 'Team',
                  icon: 'icon-[heroicons--user]',
                  link:'/user-profile.html'
                },
                {
                  name: 'Invite',
                  icon: 'icon-[heroicons--megaphone]',
                  link:'/'
                },
                {
                  name: 'Github',
                  icon: 'icon-[heroicons--paper-airplane]',
                  link:'/'
                },
                {
                  name: 'Support',
                  icon: 'icon-[heroicons--language]',
                  link:'/'
                },
                ]}">
                                                <template x-for="profile in profiles">

                                                    <a class="cursor-pointer">
                                                        <div
                                                            class="flex items-center gap-2 text-sm font-medium text-default-600 capitalize px-3 py-1.5 cursor-pointer hover:bg-default-200 duration-200 transition-all ease-in-out">
                                                            <span :class="profile.icon" class="h-4 w-4"></span>
                                                            <p x-text="profile.name"></p>
                                                        </div>
                                                    </a>
                                                </template>
                                                <a href="#"
                                                    class="flex items-center gap-2 text-sm font-medium text-default-600 capitalize px-3 py-1.5 cursor-pointer hover:bg-default-200 duration-200 transition-all ease-in-out">
                                                    <span class="icon-[heroicons--power] w-4 h-4"></span>
                                                    <p>Logout</p>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button x-show="!$store.app.mediaQueries.isDesktop"
                                class="group relative opacity-50 disabled:cursor-not-allowed"
                                @click="$store.app.toggleMobileMenu()">
                                <div>
                                    <div class="flex h-[16px] w-[20px] origin-center transform flex-col justify-between overflow-hidden transition-all duration-300"
                                        :class="{'-translate-x-1.5 rotate-180': $store.app.mobileMenuOpen}">
                                        <div class="h-[2px] origin-left transform bg-card-foreground transition-all delay-150 duration-300"
                                            :class="{'rotate-[42deg] w-[11px]': $store.app.mobileMenuOpen, 'w-7': !$store.app.mobileMenuOpen}">
                                        </div>
                                        <div class="h-[2px] w-7 transform rounded bg-card-foreground transition-all duration-300"
                                            :class="{'translate-x-10': $store.app.mobileMenuOpen}"></div>
                                        <div class="h-[2px] origin-left transform bg-card-foreground transition-all delay-150 duration-300"
                                            :class="{'-rotate-[43deg] w-[11px]': $store.app.mobileMenuOpen, 'w-7': !$store.app.mobileMenuOpen}">
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <!-- end user -->
                        </div>
                    </div>
                </div>
                <!--  END: Floating Header top -->

                <!--  START: Floating Header Menu -->
                <div x-show="$store.app.mediaQueries.isDesktop && $store.app.layout === 'horizontal'" x-twmerge="{
        'w-full bg-card bg-card/90 px-4 py-2 shadow-md backdrop-blur-lg relative':true,
        'rounded-b-md': $store.app.headerType  === 'floating'
       }">
                    <nav x-data="{ openIndex: null }">
                        <ul class="group gap-1 flex flex-wrap items-center justify-start list-none p-0">
                            <template x-for="(item, index) in $store.app.horizontalMenus" key="index">
                                <li class="group relative" @mouseenter="openIndex = index"
                                    @mouseleave="openIndex = null">
                                    <template x-if="item.type === 'item' && !item.submenu">
                                        <a :href="item.link || 'javascript:void(0)'"
                                            class=" flex cursor-pointer items-center  h-9 rounded-md px-3  text-default-700 hover:text-primary-foreground hover:bg-primary"
                                            x-twmerge="{
                            'text-primary': $store.app.currentPage === item.link 
                    }">
                                            <span :class="item.icon" class="leading-0 relative me-1 size-4"></span>
                                            <span x-text="item.label" class="text-sm font-medium"></span>
                                        </a>
                                    </template>
                                    <template x-if="item.type === 'item' && item.submenu">
                                        <a :href="item.link"
                                            class="flex cursor-pointer items-center  h-9 rounded-md px-3  text-default-700 hover:text-primary-foreground hover:bg-primary"
                                            x-twmerge="{
                            'bg-primary text-primary-foreground':  $store.app.isSubmenuActive(item) 
                         }">
                                            <span :class="item.icon" class="leading-0 relative me-1 size-4"></span>
                                            <span x-text="item.label" class="text-sm font-medium"></span>
                                            <span class="icon-[heroicons--chevron-down]   h-4 w-4 ms-2"></span>

                                        </a>
                                    </template>

                                    <ul x-show="openIndex === index && item.submenu"
                                        class="absolute start-0 top-full z-50 w-[160px] border bg-card ps-2.5 pe-1.5 py-2 rounded-md space-y-1.5 max-h-96 overflow-y-auto custom-scrollbar "
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 transform translate-y-4"
                                        x-transition:enter-end="opacity-100 transform translate-y-0"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100 transform translate-y-0"
                                        x-transition:leave-end="opacity-0 transform translate-y-4">
                                        <template x-for="subitem in item.submenu">
                                            <li class="relative block">
                                                <a :href="subitem.link || 'javascript:void(0)'"
                                                    class="flex items-center text-default-600 rounded text-sm font-normal capitalize  transition-all duration-150 truncate whitespace-nowrap"
                                                    :class="{
                        'text-primary ': $store.app.currentPage === subitem.link,
                        'hover:text-primary ': subitem.link,
                        'cursor-not-allowed !text-default-400 justify-between': subitem.badge
                      }">
                                                    <span x-text="subitem.label"></span>
                                                    <span x-show="!subitem.link && subitem.badge"
                                                        x-text="subitem.badge"
                                                        class="bg-primary py-0.5 px-1.5 rounded-full text-xs text-primary-foreground capitalize"></span>
                                                </a>
                                            </li>
                                        </template>
                                    </ul>
                            </template>
                            </li>

                        </ul>
                    </nav>
                </div>
                <!--  END: Floating Header Menu -->
            </div>
        </header>
    </template>