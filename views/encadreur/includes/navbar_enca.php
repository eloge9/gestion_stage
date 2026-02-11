<!-- *************************
          START: Sidebar Wrapper
      *************************** -->
<!--START: Sidebar Popover-->
<template x-if="$store.app.sidebarType === 'popover' && $store.app.layout !== 'horizontal'">
    <aside x-twmerge="{
        ' fixed bottom-0 top-0  hidden  border-r bg-card xl:block z-50': true ,
        'w-[72px]':  $store.app.collapsed ,
        'w-[248px]':  !$store.app.collapsed ,
        'm-6 rounded-md':  $store.app.layout === 'semi-box'
    }">
        <div x-show="$store.app.sidebarBg !== 'none'"
            class="absolute left-0 top-0 z-[-1] h-full w-full bg-cover bg-center opacity-[0.07]"
            :style="{ backgroundImage: `url(${$store.app.sidebarBg})` }"></div>
        <div class="px-4 py-4">
            <div class="flex items-center">
                <a href="analytics.html">
                    <div class="flex flex-1 items-center gap-3" x-show="!$store.app.collapsed"
                        :class="{'block': !$store.app.collapsed, 'hidden':$store.app.collapsed}">
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
                        <div class="flex-1 text-xl font-semibold text-primary">DashTail</div>
                    </div>
                </a>
                <a href="analytics.html">
                    <div class="flex flex-1 items-center gap-3 ms-1"
                        :class="{'hidden': !$store.app.collapsed, 'block':$store.app.collapsed}">
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
                    </div>
                </a>
            </div>
        </div>
        <div class="relative flex h-[calc(100%-60px)] flex-col">
            <div class="sidebar-menu no-scrollbar relative h-[calc(100%-60px)] flex-1 overflow-y-auto">
                <ul class="h-full space-y-1" :class="{
         'px-4': !$store.app.collapsed, 
         'space-y-2 text-center': $store.app.collapsed
       }">
                    <template x-for="(item, index) in $store.app.menus" :key="index">
                        <li>
                            <!-- Header Menu -->
                            <template x-if="item.type === 'header' && !$store.app.collapsed">
                                <div class="mb-3 mt-4 text-xs font-bold uppercase text-default-900"
                                    x-text="item.label"></div>
                            </template>
                            <!-- Single Menu Item -->
                            <template x-if="item.type === 'item' && !item.submenu">
                                <div class="overflow-hidden">
                                    <a class="cursor-pointer" @click="
        $store.app.handleMenuClick(index, $event);
        $store.app.hasSubmenu = true;
      " :href="item.link || 'javascript:void(0)'" class="block">
                                        <span x-show="$store.app.collapsed"
                                            class="relative mx-auto inline-flex h-12 w-12 flex-col items-center justify-center rounded transition-all duration-300 hover:bg-primary/80 hover:text-primary-foreground ease-in-out"
                                            :class="{ 'bg-primary text-primary-foreground': $store.app.currentPage === item.link }">
                                            <span :class="item.icon"
                                                class="leading-0 relative top-0.5 size-5"></span>

                                            <div x-data="{
    menuTooltipHovered: false,
    menuTooltipDelay: 200,
    menuTooltipLeaveDelay: 150,
    menuTooltipTimeout: null,
    menuTooltipLeaveTimeout: null,
    menuTooltipPosition: { top: 0, left: 0 },
    menuTooltipEnter() {
      clearTimeout(this.menuTooltipLeaveTimeout);
      if (this.menuTooltipHovered) return;
      clearTimeout(this.menuTooltipTimeout);
      this.menuTooltipTimeout = setTimeout(() => {
        this.menuTooltipHovered = true;
        this.$nextTick(() => this.updatemenuTooltipPosition());
      }, this.menuTooltipDelay);
    },
    menuTooltipLeave() {
      clearTimeout(this.menuTooltipTimeout);
      if (!this.menuTooltipHovered) return;
      this.menuTooltipLeaveTimeout = setTimeout(() => {
        if (!this.isHoveringCard()) {
          this.menuTooltipHovered = false;
        }
      }, this.menuTooltipLeaveDelay);
    },
    updatemenuTooltipPosition() {
      const rect = this.$el.getBoundingClientRect();
      const menuTooltip = document.getElementById('menu-tooltip');
      const viewportHeight = window.innerHeight;
      const isRTL = this.$store.app.direction === 'rtl';

      let menuTooltipHeight = menuTooltip ? menuTooltip.offsetHeight : 200; 
      let top = rect.top + window.scrollY;

      // Adjust top to ensure it doesn't overflow viewport
      if (top + menuTooltipHeight > viewportHeight) {
        top = viewportHeight - menuTooltipHeight - 10; 
      }
      if (top < 0) {
        top = 10;
      }

      this.menuTooltipPosition = {
        top: top,
        [isRTL ? 'right' : 'left']: isRTL
          ? window.innerWidth - rect.left + window.scrollX + 10
          : rect.right + window.scrollX + 10,
      };
    },
    isHoveringCard() {
      const card = document.getElementById('menu-tooltip');
      return card && card.matches(':hover');
    },
  }" class="relative" @mouseover="menuTooltipEnter()" @mouseleave="menuTooltipLeave()">
                                                <span
                                                    class="relative mx-auto inline-flex h-12 w-12 cursor-pointer flex-col items-center justify-center rounded-md transition-all duration-200 hover:bg-primary hover:text-primary-foreground"
                                                    :class="{ 'bg-primary text-primary-foreground': $store.app.selected === index }">
                                                    <span :class="item.icon"
                                                        class="leading-0 relative top-0.5 size-5"></span>
                                                </span>
                                                <template x-if="menuTooltipHovered" x-teleport="body">
                                                    <div id="menu-tooltip" x-show="menuTooltipHovered"
                                                        class="absolute z-50 py-4" x-cloak :style="{
        top: menuTooltipPosition.top + 'px',
        [menuTooltipPosition.hasOwnProperty('left') ? 'left' : 'right']: (menuTooltipPosition.left || menuTooltipPosition.right) + 'px',
      }" @mouseover="menuTooltipEnter()" @mouseleave="menuTooltipLeave()">
                                                        <div x-text="item.label"
                                                            class="bg-primary text-primary-foreground py-1 px-2.5 rounded capitalize ms-2">
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>


                                        </span>

                                        <div x-show="!$store.app.collapsed"
                                            class="flex cursor-pointer items-center gap-3 rounded px-[10px] py-2  font-semibold capitalize text-default-700 hover:bg-primary/80 hover:text-primary-foreground duration-200 ease-in-out"
                                            :class="{ 'bg-primary/80 text-primary-foreground': $store.app.currentPage === item?.link }">
                                            <span class="flex-none">
                                                <span :class="item.icon"
                                                    class="leading-0 relative top-0.5 size-5"></span>
                                            </span>

                                            <div class="flex-1 truncate text-sm" x-text="item.label"></div>
                                        </div>

                                    </a>
                                </div>
                            </template>
                            <!-- Submenu Item -->
                            <template x-if="item.type === 'item' && item.submenu">
                                <div class="overflow-hidden">
                                    <div class="group relative">
                                        <!-- single menu when $store.app.collapsed -->
                                        <template x-if="$store.app.collapsed">
                                            <div x-data="{
    hoverCardHovered: false,
    hoverCardDelay: 300,
    hoverCardLeaveDelay: 400,
    hoverCardTimeout: null,
    hoverCardLeaveTimeout: null,
    hoverCardPosition: { top: 0, left: 0 },
    hoverCardEnter() {
      clearTimeout(this.hoverCardLeaveTimeout);
      if (this.hoverCardHovered) return;
      clearTimeout(this.hoverCardTimeout);
      this.hoverCardTimeout = setTimeout(() => {
        this.hoverCardHovered = true;
        this.$nextTick(() => this.updateHoverCardPosition());
      }, this.hoverCardDelay);
    },
    hoverCardLeave() {
      clearTimeout(this.hoverCardTimeout);
      if (!this.hoverCardHovered) return;
      this.hoverCardLeaveTimeout = setTimeout(() => {
        if (!this.isHoveringCard()) {
          this.hoverCardHovered = false;
        }
      }, this.hoverCardLeaveDelay);
    },
    updateHoverCardPosition() {
      const rect = this.$el.getBoundingClientRect();
      const hoverCard = document.getElementById('hover-card');
      const viewportHeight = window.innerHeight;
      const isRTL = this.$store.app.direction === 'rtl';

      let hoverCardHeight = hoverCard ? hoverCard.offsetHeight : 200; // Fallback if height isn't available
      let top = rect.top + window.scrollY;

      // Adjust top to ensure it doesn't overflow viewport
      if (top + hoverCardHeight > viewportHeight) {
        top = viewportHeight - hoverCardHeight - 10; // Add bottom padding
      }
      if (top < 0) {
        top = 10; // Add top padding
      }

      this.hoverCardPosition = {
        top: top,
        [isRTL ? 'right' : 'left']: isRTL
          ? window.innerWidth - rect.left + window.scrollX + 10
          : rect.right + window.scrollX + 10,
      };
    },
    isHoveringCard() {
      const card = document.getElementById('hover-card');
      return card && card.matches(':hover');
    },
  }" class="relative" @mouseover="hoverCardEnter()" @mouseleave="hoverCardLeave()">
                                                <span
                                                    class="relative mx-auto inline-flex h-12 w-12 cursor-pointer flex-col items-center justify-center rounded-md transition-all duration-300 hover:bg-primary hover:text-primary-foreground"
                                                    :class="{ 'bg-primary text-primary-foreground': $store.app.isChildMenuActive(item.submenu) || $store.app.isMenuActive(item)  }">
                                                    <span :class="item.icon"
                                                        class="leading-0 relative top-0.5 size-5"></span>
                                                </span>

                                                <template x-if="hoverCardHovered" x-teleport="body">
                                                    <div id="hover-card" x-show="hoverCardHovered"
                                                        class="absolute z-50 py-4" x-cloak :style="{
        top: hoverCardPosition.top + 'px',
        [hoverCardPosition.hasOwnProperty('left') ? 'left' : 'right']: (hoverCardPosition.left || hoverCardPosition.right) + 'px',
      }" @mouseover="hoverCardEnter()" @mouseleave="hoverCardLeave()">
                                                        <div x-show="hoverCardHovered"
                                                            class="max-h-[300px] min-w-[220px] overflow-y-auto rounded-md border bg-popover p-4 custom-scrollbar"
                                                            x-transition>
                                                            <div>
                                                                <ul
                                                                    class="relative space-y-2 before:absolute before:start-4 before:top-0 before:h-[calc(100%-5px)] before:w-[2px] before:rounded before:bg-primary/20">
                                                                    <li
                                                                        class="relative flex w-full flex-1 items-center gap-3 rounded bg-primary px-3 py-3 font-medium text-primary-foreground">
                                                                        <div :class="item.icon"
                                                                            class="h-4 w-4 flex-none"></div>
                                                                        <div x-text="item.label"></div>
                                                                    </li>
                                                                    <template
                                                                        x-for="(nest, index) in item.submenu"
                                                                        :key="index">

                                                                        <li class=" relative top-0 before:w-[2px] before:transition-all before:duration-200 first:pt-4  block ps-4 before:absolute before:top-0 before:h-full  first:before:top-4 first:before:h-[calc(100%-16px)]  last:before:h-[calc(100%-16px)] last:pb-4 text-default-500"
                                                                            :class="{ 'before:bg-primary data-[state=active]:text-primary': $store.app.currentPage === nest.link}">
                                                                            <div
                                                                                x-show="nest?.submenu?.length > 0">
                                                                                <div :data-state="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.currentPage === nest.link || $store.app.isChildMenuActive(nest.submenu) ? 'active' : ''"
                                                                                    class="flex items-center gap-3 rounded-md px-[10px] py-2 text-default-600 data-[state=active]:text-primary"
                                                                                    @click.prevent="$store.app.handleOpenModuleSubmenu(index)">
                                                                                    <div
                                                                                        class="flex flex-1 cursor-pointer gap-3 text-sm font-medium capitalize">
                                                                                        <span
                                                                                            class="inline-flex flex-grow-0 items-center">
                                                                                            <span
                                                                                                :class="nest.icon"
                                                                                                class="leading-0 relative top-0.5 text-base"></span></span>
                                                                                        <span
                                                                                            class="flex-grow truncate"
                                                                                            x-text="nest.label"></span>
                                                                                    </div>
                                                                                    <span
                                                                                        class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
                                                                                        :class="{  'rotate-90': $store.app.selectedSubMenu === index &&  !$store.app.isSubmenuActive(index) && !$store.app.isChildMenuActive(nest.submenu) }"></span>
                                                                                </div>
                                                                                <ul class="sub-menu relative space-y-3 before:absolute before:left-5"
                                                                                    x-show="$store.app.selectedSubMenu === index || $store.app.isSubmenuActive(index) ||$store.app.isChildMenuActive(nest.submenu)">
                                                                                    <template
                                                                                        x-for="(sub, index) in nest.submenu"
                                                                                        :key="index">
                                                                                        <li class="before: relative top-0 before:top-1.5 ms-[30px] block before:absolute before:-left-[5px] before:h-2 before:w-2 before:border before:border-default-500  before:transition-all before:duration-200 first:pt-4 first:before:top-4 last:pb-1 before:rounded-full"
                                                                                            :class="{'before:border-primary before:bg-primary before:ring-primary/30 before:ring-[4px]':$store.app.isSubmenuActive(sub) }">
                                                                                            <a :data-state="$store.app.isSubmenuActive(sub) ? 'active': ''"
                                                                                                :href="sub.link || 'javascript:void(0)'"
                                                                                                class="text-default-700 hover:text-primary data-[state=active]:text-primary"
                                                                                                :class="{
                        'text-primary ': $store.app.currentPage === sub.link,
                        'hover:text-primary ': sub.link,
                        'cursor-not-allowed !text-default-400 justify-between': sub.badge
                      }">
                                                                                                <span
                                                                                                    x-text="sub.label"
                                                                                                    class="pl-3 text-sm capitalize font-normal"></span>
                                                                                                <span
                                                                                                    x-show="sub.badge"
                                                                                                    x-text="sub.badge"
                                                                                                    class="bg-primary py-0.5 px-1.5 rounded-full text-xs text-primary-foreground capitalize"></span>
                                                                            </div>
                                                                            </a>
                                                                        </li>
                                                                    </template>
                                                                </ul>
                                                            </div>
                                                            <a :href="nest.link || 'javascript:void(0)'"
                                                                x-show="!nest?.submenu"
                                                                class="flex items-center gap-3 rounded text-sm font-normal capitalize ps-5  transition-all duration-150 text-default-600 data-[state=active]:text-primary"
                                                                :class="{
                      'cursor-not-allowed !text-default-400': nest.badge, 'hover:text-primary':nest.link,
                    }">
                                                                <span class="flex-1 truncate"
                                                                    x-text="nest.label"
                                                                    :class="{'text-primary':$store.app.currentPage === nest.link}"></span>
                                                                <span x-show="!nest.link && nest.badge">
                                                                    <span x-text='nest.badge'
                                                                        class="bg-primary py-0.5 px-2 rounded-full text-xs font-medium text-primary-foreground capitalize"></span>
                                                                </span>
                                                            </a>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
        </div>
</template>
</div>
</template>

<div @click.prevent="$store.app.handleMenuClick(index)" x-show="!$store.app.collapsed"
    class="flex cursor-pointer items-center gap-3 rounded px-[10px] py-2 text-sm font-bold capitalize text-default-600 duration-200 ease-in-out hover:bg-primary hover:text-primary-foreground"
    :class="{ 'bg-primary text-primary-foreground': $store.app.selected === index || $store.app.isSubmenuOpen(index) || $store.app.isMenuActive(item) ||
      $store.app.currentPage === item.link  }">
    <span class="flex-none">
        <span :class="item.icon" class="leading-0 relative top-0.5 size-5"></span>
    </span>
    <div class="flex flex-1 items-center justify-between">
        <div class="flex-1" x-text="item.label"></div>
        <span class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
            :class="{ 'rotate-90': $store.app.isSubmenuOpen(index)  || $store.app.selected === index}"></span>
    </div>
</div>
<!-- single menu when not $store.app.collapsed -->
<template
    x-if="$store.app.selected === index || $store.app.isSubmenuOpen(index) || $store.app.currentPage === item.link ||  $store.app.isSubmenu2Open(index)">
    <ul x-show="!$store.app.collapsed"
        class="sub-menu relative m-0 space-y-3 p-0 before:absolute before:-top-4 before:start-4 before:h-[calc(100%-5px)] before:w-[3px] before:rounded before:bg-primary/10">

        <template x-for="(nest, index) in item.submenu" :key="index">
            <li class="relative block ps-4 before:absolute before:top-0 before:h-full before:w-[3px] first:before:top-4 first:before:h-[calc(100%-16px)]  last:before:h-[calc(100%-16px)] last:pb-4 text-default-500"
                :class="{ 'before:bg-primary data-[state=active]:text-primary': $store.app.currentPage === nest.link}">
                <div x-show="nest?.submenu?.length > 0">
                    <div :data-state="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.currentPage === nest.link || $store.app.isChildMenuActive(nest.submenu)  ? 'active' : ''"
                        class="flex items-center gap-3 rounded-md px-[10px] py-2 text-default-600 data-[state=active]:text-primary"
                        @click.prevent="$store.app.handleOpenModuleSubmenu(index)">
                        <div class="flex flex-1 cursor-pointer gap-3 text-sm font-medium capitalize">
                            <span class="inline-flex flex-grow-0 items-center">
                                <span :class="nest.icon" class="leading-0 relative top-0.5 text-base"></span></span>
                            <span class="flex-grow truncate" x-text="nest.label"></span>
                        </div>
                        <span class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
                            x-twmerge="{
                           'rotate-90':  $store.app.selectedSubMenu === index &&  !$store.app.isSubmenuActive(index) && !$store.app.isChildMenuActive(nest.submenu),
                   
                           }"></span>
                    </div>
                    <template
                        x-if="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.isChildMenuActive(nest.submenu) || $store.app.currentPage === nest.link">
                        <ul class="sub-menu relative space-y-3 before:absolute before:left-5">
                            <template x-for="(sub, index) in nest.submenu" :key="index">
                                <li class="before: relative top-0 before:top-1.5 ms-[30px] block before:absolute before:-left-[5px] before:h-2 before:w-2 before:border before:border-default-500  before:transition-all before:duration-200 first:pt-4 first:before:top-4 last:pb-1 before:rounded-full"
                                    :class="{'before:border-primary before:bg-primary before:ring-primary/30 before:ring-[4px]':$store.app.isSubmenuActive(sub) }">
                                    <a :data-state="$store.app.isSubmenuActive(sub) ? 'active': ''"
                                        :href="sub.link || 'javascript:void(0)'"
                                        class="text-default-700 hover:text-primary data-[state=active]:text-primary"
                                        :class="{
                        'text-primary ': $store.app.currentPage === sub.link,
                        'hover:text-primary ': sub.link,
                        'cursor-not-allowed !text-default-400 justify-between': sub.badge
                      }">
                                        <span x-text="sub.label" class="pl-3 text-sm capitalize font-normal"></span>
                                        <span x-show="sub.badge" x-text="sub.badge"
                                            class="bg-primary py-0.5 px-1.5 rounded-full text-xs text-primary-foreground capitalize"></span>
                </div>
                </a>
            </li>
        </template>
    </ul>
</template>
</div>
<a :href="nest.link || 'javascript:void(0)'" x-show="!nest?.submenu"
    class="flex items-center gap-3 rounded text-sm font-normal capitalize ps-5  transition-all duration-150 text-default-600 data-[state=active]:text-primary"
    :class="{
                      'cursor-not-allowed !text-default-400': nest.badge, 'hover:text-primary':nest.link,
                    }">
    <span class="flex-1 truncate" x-text="nest.label"
        :class="{'text-primary':$store.app.currentPage === nest.link}"></span>
    <span x-show="!nest.link && nest.badge">
        <span x-text='nest.badge'
            class="bg-primary py-0.5 px-2 rounded-full text-xs font-medium text-primary-foreground capitalize"></span>
    </span>
</a>
</li>
</template>

</ul>
</template>
</div>
</div>
</template>
</li>
</template>
</ul>
</div>

<!-- end sidebar elements -->

<div class="mt-2" x-show="!$store.app.collapsed">
    <div class="m-3 hidden rounded bg-primary px-4 pb-4 pt-5 text-primary-foreground dark:bg-default-400 xl:block">
        <div class="text-base font-semibold text-primary-foreground">Storage capacity</div>
        <div class="text-sm text-primary-foreground">
            Out of your total storage on Premium Plan, you have used up 40%.
        </div>
        <div class="relative mt-4">
            <img alt="footer-thumbnail" loading="lazy" width="168" height="120" class="h-full w-full"
                src="../../assets/app/images/all-img/thumbnail.png" />
            <button
                class="absolute left-1/2 top-1/2 inline-flex h-10 w-10 -translate-x-1/2 -translate-y-1/2 items-center justify-center whitespace-nowrap rounded-full bg-secondary text-sm font-semibold text-muted-foreground opacity-40 ring-offset-background transition-colors hover:bg-secondary/80 focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50 dark:text-default-950"
                type="button">
                <span class="icon-[heroicons--play-16-solid] h-5 w-5"></span>
            </button>
        </div>
        <div class="mt-4 flex items-center gap-2 text-sm font-semibold text-primary-foreground">
            Upgrade Now <span class="icon-[heroicons--arrow-long-right] h-5 w-5"></span>
        </div>
    </div>
</div>
<div class="py-2 " x-show="$store.app.collapsed">
    <img alt="dashtail" loading="lazy" class="mx-auto size-9 cursor-pointer rounded-full"
        src="../../assets/app/images/avatar/avatar-1.jpg" />
</div>

<!-- end widget -->
</div>
</aside>
</template>
<!--END: Sidebar Popover-->

<!--START: Sidebar Classic-->
<template x-if="$store.app.sidebarType === 'classic' && $store.app.layout !== 'horizontal'">
    <aside x-twmerge="{
        ' fixed bottom-0 top-0  hidden  border-r bg-card xl:block z-50': true ,
        'w-[72px]':  $store.app.collapsed ,
        'w-[248px]':  !$store.app.collapsed ,
        'm-6 rounded-md':  $store.app.layout === 'semi-box',
    }">
        <div x-show="$store.app.sidebarBg !== 'none'"
            class="absolute left-0 top-0 z-[-1] h-full w-full bg-cover bg-center opacity-[0.07]"
            :style="{ backgroundImage: `url(${$store.app.sidebarBg})` }"></div>
        <div class="px-4 py-4">
            <div class="flex items-center ">
                <a href="analytics.html">
                    <div class="flex flex-1 items-center gap-3" x-show="!$store.app.collapsed"
                        :class="{'block': !$store.app.collapsed, 'hidden':$store.app.collapsed}">
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
                        <div class="flex-1 text-xl font-semibold text-primary">DashTail</div>
                    </div>
                </a>
                <a href="analytics.html">
                    <div class="flex flex-1 items-center justify-center gap-3 ms-1"
                        :class="{'hidden': !$store.app.collapsed, 'block':$store.app.collapsed}">
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
                    </div>
                </a>
            </div>
        </div>
        <div class="relative flex h-[calc(100%-60px)] flex-col">
            <div class="sidebar-menu no-scrollbar relative h-[calc(100%-60px)] flex-1 overflow-y-auto">
                <ul class="h-full space-y-1" :class="{
          'px-4': !$store.app.collapsed, 
          'space-y-2 text-center': $store.app.collapsed
        }">
                    <template x-for="(item, index) in $store.app.menus" :key="index">
                        <li>
                            <!-- Header Menu -->
                            <template x-if="item.type === 'header' && !$store.app.collapsed">
                                <div class="mb-3 mt-4 text-xs font-bold uppercase text-default-900"
                                    x-text="item.label"></div>
                            </template>
                            <!-- Single Menu Item -->
                            <template x-if="item.type === 'item' && !item.submenu">
                                <div class="overflow-hidden">
                                    <a class="cursor-pointer" @click="
        $store.app.handleMenuClick(index, $event);
        $store.app.hasSubmenu = true;
      " :href="item.link || 'javascript:void(0)'" class="block">
                                        <span x-show="$store.app.collapsed"
                                            class="relative mx-auto inline-flex h-12 w-12 flex-col items-center justify-center rounded transition-all duration-300 hover:bg-primary/80 hover:text-primary-foreground ease-in-out"
                                            :class="{ 'bg-primary text-primary-foreground': $store.app.currentPage === item.link }">
                                            <span :class="item.icon"
                                                class="leading-0 relative top-0.5 size-5"></span>

                                            <div x-data="{
    menuTooltipHovered: false,
    menuTooltipDelay: 200,
    menuTooltipLeaveDelay: 150,
    menuTooltipTimeout: null,
    menuTooltipLeaveTimeout: null,
    menuTooltipPosition: { top: 0, left: 0 },
    menuTooltipEnter() {
      clearTimeout(this.menuTooltipLeaveTimeout);
      if (this.menuTooltipHovered) return;
      clearTimeout(this.menuTooltipTimeout);
      this.menuTooltipTimeout = setTimeout(() => {
        this.menuTooltipHovered = true;
        this.$nextTick(() => this.updatemenuTooltipPosition());
      }, this.menuTooltipDelay);
    },
    menuTooltipLeave() {
      clearTimeout(this.menuTooltipTimeout);
      if (!this.menuTooltipHovered) return;
      this.menuTooltipLeaveTimeout = setTimeout(() => {
        if (!this.isHoveringCard()) {
          this.menuTooltipHovered = false;
        }
      }, this.menuTooltipLeaveDelay);
    },
    updatemenuTooltipPosition() {
      const rect = this.$el.getBoundingClientRect();
      const menuTooltip = document.getElementById('menu-tooltip');
      const viewportHeight = window.innerHeight;
      const isRTL = this.$store.app.direction === 'rtl';

      let menuTooltipHeight = menuTooltip ? menuTooltip.offsetHeight : 200; 
      let top = rect.top + window.scrollY;

      // Adjust top to ensure it doesn't overflow viewport
      if (top + menuTooltipHeight > viewportHeight) {
        top = viewportHeight - menuTooltipHeight - 10; 
      }
      if (top < 0) {
        top = 10;
      }

      this.menuTooltipPosition = {
        top: top,
        [isRTL ? 'right' : 'left']: isRTL
          ? window.innerWidth - rect.left + window.scrollX + 10
          : rect.right + window.scrollX + 10,
      };
    },
    isHoveringCard() {
      const card = document.getElementById('menu-tooltip');
      return card && card.matches(':hover');
    },
  }" class="relative" @mouseover="menuTooltipEnter()" @mouseleave="menuTooltipLeave()">
                                                <span
                                                    class="relative mx-auto inline-flex h-12 w-12 cursor-pointer flex-col items-center justify-center rounded-md transition-all duration-200 hover:bg-primary hover:text-primary-foreground"
                                                    :class="{ 'bg-primary text-primary-foreground': $store.app.selected === index }">
                                                    <span :class="item.icon"
                                                        class="leading-0 relative top-0.5 size-5"></span>
                                                </span>
                                                <template x-if="menuTooltipHovered" x-teleport="body">
                                                    <div id="menu-tooltip" x-show="menuTooltipHovered"
                                                        class="absolute z-50 py-4" x-cloak :style="{
        top: menuTooltipPosition.top + 'px',
        [menuTooltipPosition.hasOwnProperty('left') ? 'left' : 'right']: (menuTooltipPosition.left || menuTooltipPosition.right) + 'px',
      }" @mouseover="menuTooltipEnter()" @mouseleave="menuTooltipLeave()">
                                                        <div x-text="item.label"
                                                            class="bg-primary text-primary-foreground py-1 px-2.5 rounded capitalize ms-2">
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>


                                        </span>

                                        <div x-show="!$store.app.collapsed"
                                            class="flex cursor-pointer items-center gap-3 rounded px-[10px] py-2  font-semibold capitalize text-default-700 hover:bg-primary/80 hover:text-primary-foreground duration-200 ease-in-out"
                                            :class="{ 'bg-primary/80 text-primary-foreground': $store.app.currentPage === item?.link }">
                                            <span class="flex-none">
                                                <span :class="item.icon"
                                                    class="leading-0 relative top-0.5 size-5"></span>
                                            </span>

                                            <div class="flex-1 truncate text-sm" x-text="item.label"></div>
                                        </div>

                                    </a>
                                </div>
                            </template>
                            <!-- Submenu Item -->
                            <template x-if="item.type === 'item' && item.submenu">
                                <div class="overflow-hidden">
                                    <div class="group relative">
                                        <!-- single menu when $store.app.collapsed -->
                                        <template x-if="$store.app.collapsed">
                                            <div x-data="{
    hoverCardHovered: false,
    hoverCardDelay: 300,
    hoverCardLeaveDelay: 400,
    hoverCardTimeout: null,
    hoverCardLeaveTimeout: null,
    hoverCardPosition: { top: 0, left: 0 },
    hoverCardEnter() {
      clearTimeout(this.hoverCardLeaveTimeout);
      if (this.hoverCardHovered) return;
      clearTimeout(this.hoverCardTimeout);
      this.hoverCardTimeout = setTimeout(() => {
        this.hoverCardHovered = true;
        this.$nextTick(() => this.updateHoverCardPosition());
      }, this.hoverCardDelay);
    },
    hoverCardLeave() {
      clearTimeout(this.hoverCardTimeout);
      if (!this.hoverCardHovered) return;
      this.hoverCardLeaveTimeout = setTimeout(() => {
        if (!this.isHoveringCard()) {
          this.hoverCardHovered = false;
        }
      }, this.hoverCardLeaveDelay);
    },
    updateHoverCardPosition() {
      const rect = this.$el.getBoundingClientRect();
      const hoverCard = document.getElementById('hover-card');
      const viewportHeight = window.innerHeight;
      const isRTL = this.$store.app.direction === 'rtl';

      let hoverCardHeight = hoverCard ? hoverCard.offsetHeight : 200; // Fallback if height isn't available
      let top = rect.top + window.scrollY;

      // Adjust top to ensure it doesn't overflow viewport
      if (top + hoverCardHeight > viewportHeight) {
        top = viewportHeight - hoverCardHeight - 10; // Add bottom padding
      }
      if (top < 0) {
        top = 10; // Add top padding
      }

      this.hoverCardPosition = {
        top: top,
        [isRTL ? 'right' : 'left']: isRTL
          ? window.innerWidth - rect.left + window.scrollX + 10
          : rect.right + window.scrollX + 10,
      };
    },
    isHoveringCard() {
      const card = document.getElementById('hover-card');
      return card && card.matches(':hover');
    },
  }" class="relative" @mouseover="hoverCardEnter()" @mouseleave="hoverCardLeave()">
                                                <span
                                                    class="relative mx-auto inline-flex h-12 w-12 cursor-pointer flex-col items-center justify-center rounded-md transition-all duration-300 hover:bg-primary hover:text-primary-foreground"
                                                    :class="{ 'bg-primary text-primary-foreground': $store.app.isChildMenuActive(item.submenu) || $store.app.isMenuActive(item)  }">
                                                    <span :class="item.icon"
                                                        class="leading-0 relative top-0.5 size-5"></span>
                                                </span>

                                                <template x-if="hoverCardHovered" x-teleport="body">
                                                    <div id="hover-card" x-show="hoverCardHovered"
                                                        class="absolute z-50 py-4" x-cloak :style="{
        top: hoverCardPosition.top + 'px',
        [hoverCardPosition.hasOwnProperty('left') ? 'left' : 'right']: (hoverCardPosition.left || hoverCardPosition.right) + 'px',
      }" @mouseover="hoverCardEnter()" @mouseleave="hoverCardLeave()">
                                                        <div x-show="hoverCardHovered"
                                                            class="max-h-[300px] min-w-[220px] overflow-y-auto rounded-md border bg-popover p-4 custom-scrollbar"
                                                            x-transition>
                                                            <div>
                                                                <ul
                                                                    class="relative space-y-2 before:absolute before:start-4 before:top-0 before:h-[calc(100%-5px)] before:w-[2px] before:rounded before:bg-primary/20">
                                                                    <li
                                                                        class="relative flex w-full flex-1 items-center gap-3 rounded bg-primary px-3 py-3 font-medium text-primary-foreground">
                                                                        <div :class="item.icon"
                                                                            class="h-4 w-4 flex-none"></div>
                                                                        <div x-text="item.label"></div>
                                                                    </li>
                                                                    <template x-for="(nest, index) in item.submenu"
                                                                        :key="index">

                                                                        <li class=" relative top-0 before:w-[2px] before:transition-all before:duration-200 first:pt-4  block ps-4 before:absolute before:top-0 before:h-full  first:before:top-4 first:before:h-[calc(100%-16px)]  last:before:h-[calc(100%-16px)] last:pb-4 text-default-500"
                                                                            :class="{ 'before:bg-primary data-[state=active]:text-primary': $store.app.currentPage === nest.link}">
                                                                            <div x-show="nest?.submenu?.length > 0">
                                                                                <div :data-state="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.currentPage === nest.link || $store.app.isChildMenuActive(nest.submenu) ? 'active' : ''"
                                                                                    class="flex items-center gap-3 rounded-md px-[10px] py-2 text-default-600 data-[state=active]:text-primary"
                                                                                    @click.prevent="$store.app.handleOpenModuleSubmenu(index)">
                                                                                    <div
                                                                                        class="flex flex-1 cursor-pointer gap-3 text-sm font-medium capitalize">
                                                                                        <span
                                                                                            class="inline-flex flex-grow-0 items-center">
                                                                                            <span :class="nest.icon"
                                                                                                class="leading-0 relative top-0.5 text-base"></span></span>
                                                                                        <span
                                                                                            class="flex-grow truncate"
                                                                                            x-text="nest.label"></span>
                                                                                    </div>
                                                                                    <span
                                                                                        class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
                                                                                        :class="{  'rotate-90': $store.app.selectedSubMenu === index &&  !$store.app.isSubmenuActive(index) && !$store.app.isChildMenuActive(nest.submenu) }"></span>
                                                                                </div>
                                                                                <ul class="sub-menu relative space-y-3 before:absolute before:left-5"
                                                                                    x-show="$store.app.selectedSubMenu === index || $store.app.isSubmenuActive(index) ||$store.app.isChildMenuActive(nest.submenu)">
                                                                                    <template
                                                                                        x-for="(sub, index) in nest.submenu"
                                                                                        :key="index">
                                                                                        <li class="before: relative top-0 before:top-1.5 ms-[30px] block before:absolute before:-left-[5px] before:h-2 before:w-2 before:border before:border-default-500  before:transition-all before:duration-200 first:pt-4 first:before:top-4 last:pb-1 before:rounded-full"
                                                                                            :class="{'before:border-primary before:bg-primary before:ring-primary/30 before:ring-[4px]':$store.app.isSubmenuActive(sub) }">
                                                                                            <a :data-state="$store.app.isSubmenuActive(sub) ? 'active': ''"
                                                                                                :href="sub.link || 'javascript:void(0)'"
                                                                                                class="text-default-700 hover:text-primary data-[state=active]:text-primary"
                                                                                                :class="{
                        'text-primary ': $store.app.currentPage === sub.link,
                        'hover:text-primary ': sub.link,
                        'cursor-not-allowed !text-default-400 justify-between': sub.badge
                      }">
                                                                                                <span
                                                                                                    x-text="sub.label"
                                                                                                    class="pl-3 text-sm capitalize font-normal"></span>
                                                                                                <span
                                                                                                    x-show="sub.badge"
                                                                                                    x-text="sub.badge"
                                                                                                    class="bg-primary py-0.5 px-1.5 rounded-full text-xs text-primary-foreground capitalize"></span>
                                                                            </div>
                                                                            </a>
                                                                        </li>
                                                                    </template>
                                                                </ul>
                                                            </div>
                                                            <a :href="nest.link || 'javascript:void(0)'"
                                                                x-show="!nest?.submenu"
                                                                class="flex items-center gap-3 rounded text-sm font-normal capitalize ps-5  transition-all duration-150 text-default-600 data-[state=active]:text-primary"
                                                                :class="{
                      'cursor-not-allowed !text-default-400': nest.badge, 'hover:text-primary':nest.link,
                    }">
                                                                <span class="flex-1 truncate" x-text="nest.label"
                                                                    :class="{'text-primary':$store.app.currentPage === nest.link}"></span>
                                                                <span x-show="!nest.link && nest.badge">
                                                                    <span x-text='nest.badge'
                                                                        class="bg-primary py-0.5 px-2 rounded-full text-xs font-medium text-primary-foreground capitalize"></span>
                                                                </span>
                                                            </a>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
        </div>
</template>
</div>
</template>

<div @click.prevent="$store.app.handleMenuClick(index)" x-show="!$store.app.collapsed"
    class="flex cursor-pointer items-center gap-3 rounded px-[10px] py-2 text-sm font-bold capitalize text-default-600 duration-200 ease-in-out hover:bg-primary hover:text-primary-foreground"
    :class="{ 'bg-primary text-primary-foreground': $store.app.selected === index || $store.app.isSubmenuOpen(index) || $store.app.isMenuActive(item) ||
      $store.app.currentPage === item.link  }">
    <span class="flex-none">
        <span :class="item.icon" class="leading-0 relative top-0.5 size-5"></span>
    </span>
    <div class="flex flex-1 items-center justify-between">
        <div class="flex-1" x-text="item.label"></div>
        <span class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
            :class="{ 'rotate-90': $store.app.isSubmenuOpen(index)  || $store.app.selected === index}"></span>
    </div>
</div>
<!-- single menu when not $store.app.collapsed -->
<template
    x-if="$store.app.selected === index || $store.app.isSubmenuOpen(index) || $store.app.currentPage === item.link ||  $store.app.isSubmenu2Open(index)">
    <ul x-show="!$store.app.collapsed"
        class="sub-menu relative m-0 space-y-3 p-0 before:absolute before:-top-4 before:start-4 before:h-[calc(100%-5px)] before:w-[3px] before:rounded before:bg-primary/10">

        <template x-for="(nest, index) in item.submenu" :key="index">
            <li class="relative block ps-4 before:absolute before:top-0 before:h-full before:w-[3px] first:before:top-4 first:before:h-[calc(100%-16px)]  last:before:h-[calc(100%-16px)] last:pb-4 text-default-500"
                :class="{ 'before:bg-primary data-[state=active]:text-primary': $store.app.currentPage === nest.link}">
                <div x-show="nest?.submenu?.length > 0">
                    <div :data-state="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.currentPage === nest.link || $store.app.isChildMenuActive(nest.submenu)  ? 'active' : ''"
                        class="flex items-center gap-3 rounded-md px-[10px] py-2 text-default-600 data-[state=active]:text-primary"
                        @click.prevent="$store.app.handleOpenModuleSubmenu(index)">
                        <div class="flex flex-1 cursor-pointer gap-3 text-sm font-medium capitalize">
                            <span class="inline-flex flex-grow-0 items-center">
                                <span :class="nest.icon" class="leading-0 relative top-0.5 text-base"></span></span>
                            <span class="flex-grow truncate" x-text="nest.label"></span>
                        </div>
                        <span class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
                            x-twmerge="{
                           'rotate-90':  $store.app.selectedSubMenu === index &&  !$store.app.isSubmenuActive(index) && !$store.app.isChildMenuActive(nest.submenu),
                   
                           }"></span>
                    </div>
                    <template
                        x-if="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.isChildMenuActive(nest.submenu) || $store.app.currentPage === nest.link">
                        <ul class="sub-menu relative space-y-3 before:absolute before:left-5">
                            <template x-for="(sub, index) in nest.submenu" :key="index">
                                <li class="before: relative top-0 before:top-1.5 ms-[30px] block before:absolute before:-left-[5px] before:h-2 before:w-2 before:border before:border-default-500  before:transition-all before:duration-200 first:pt-4 first:before:top-4 last:pb-1 before:rounded-full"
                                    :class="{'before:border-primary before:bg-primary before:ring-primary/30 before:ring-[4px]':$store.app.isSubmenuActive(sub) }">
                                    <a :data-state="$store.app.isSubmenuActive(sub) ? 'active': ''"
                                        :href="sub.link || 'javascript:void(0)'"
                                        class="text-default-700 hover:text-primary data-[state=active]:text-primary"
                                        :class="{
                        'text-primary ': $store.app.currentPage === sub.link,
                        'hover:text-primary ': sub.link,
                        'cursor-not-allowed !text-default-400 justify-between': sub.badge
                      }">
                                        <span x-text="sub.label" class="pl-3 text-sm capitalize font-normal"></span>
                                        <span x-show="sub.badge" x-text="sub.badge"
                                            class="bg-primary py-0.5 px-1.5 rounded-full text-xs text-primary-foreground capitalize"></span>
                </div>
                </a>
            </li>
        </template>
    </ul>
</template>
</div>
<a :href="nest.link || 'javascript:void(0)'" x-show="!nest?.submenu"
    class="flex items-center gap-3 rounded text-sm font-normal capitalize ps-5  transition-all duration-150 text-default-600 data-[state=active]:text-primary"
    :class="{
                      'cursor-not-allowed !text-default-400': nest.badge, 'hover:text-primary':nest.link,
                    }">
    <span class="flex-1 truncate" x-text="nest.label"
        :class="{'text-primary':$store.app.currentPage === nest.link}"></span>
    <span x-show="!nest.link && nest.badge">
        <span x-text='nest.badge'
            class="bg-primary py-0.5 px-2 rounded-full text-xs font-medium text-primary-foreground capitalize"></span>
    </span>
</a>
</li>
</template>

</ul>
</template>
</div>
</div>
</template>
</li>
</template>
</ul>

</div>

<!-- end sidebar elements -->

<div class="mt-2" x-show="!$store.app.collapsed">
    <div class="m-3 hidden rounded bg-primary px-4 pb-4 pt-5 text-primary-foreground dark:bg-default-400 xl:block">
        <div class="text-base font-semibold text-primary-foreground">Storage capacity</div>
        <div class="text-sm text-primary-foreground">
            Out of your total storage on Premium Plan, you have used up 40%.
        </div>
        <div class="relative mt-4">
            <img alt="footer-thumbnail" loading="lazy" width="168" height="120" class="h-full w-full"
                src="../../assets/app/images/all-img/thumbnail.png" />
            <button
                class="absolute left-1/2 top-1/2 inline-flex h-10 w-10 -translate-x-1/2 -translate-y-1/2 items-center justify-center whitespace-nowrap rounded-full bg-secondary text-sm font-semibold text-muted-foreground opacity-40 ring-offset-background transition-colors hover:bg-secondary/80 focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50 dark:text-default-950"
                type="button">
                <span class="icon-[heroicons--play-16-solid] h-5 w-5"></span>
            </button>
        </div>
        <div class="mt-4 flex items-center gap-2 text-sm font-semibold text-primary-foreground">
            Upgrade Now <span class="icon-[heroicons--arrow-long-right] h-5 w-5"></span>
        </div>
    </div>
</div>
<div class="py-2 " x-show="$store.app.collapsed">
    <img alt="dashtail" loading="lazy" class="mx-auto size-9 cursor-pointer rounded-full"
        src="../../assets/app/images/avatar/avatar-1.jpg" />
</div>

<!-- end widget -->
</div>
</aside>
</template>

<!--START: Sidebar Module-->
<template x-if="$store.app.sidebarType === 'module' && $store.app.layout !== 'horizontal'">
    <div class="main-sidebar pointer-events-none fixed start-0 top-0  hidden h-full xl:flex print:hidden z-50">
        <div x-twmerge="{
        ' border-default-200  dark:border-default-300 pointer-events-auto relative z-20 flex h-full w-[72px] flex-col border-r border-dashed   bg-card transition-all duration-300': true ,
        'ltr:-translate-x-full rtl:translate-x-full ltr:xl:translate-x-0  rtl:xl:translate-x-0':  !$store.app.collapsed ,
        'translate-x-0':  $store.app.collapsed }">
            <div class="pt-4 pb-2">
                <a href="analytics.html">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32"
                        class="mx-auto h-8 w-8 text-primary">
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
            </div>

            <div class="grow pt-2">
                <div class="mb-3 last:mb-0">
                    <template x-for="(item, index) in $store.app.moduleMenu" :key="index">
                        <div>
                            <div>
                                <template x-if="item.submenu">
                                    <div class="group relative flex flex-col gap-4 py-2">
                                        <!-- Main Button -->
                                        <button
                                            :data-state="$store.app.isModuleSubmenuOpen(index) || $store.app.isModuleSubmenu2Open(index) ? 'open' : 'close'"
                                            @click="
        $store.app.handleModuleMenuClick(index, $event);
        $store.app.hasSubmenu = true;
        $store.app.collapsed = false;
      " class="relative mx-auto flex h-12 w-12 cursor-pointer flex-col items-center justify-center rounded-md text-default-500 transition-all duration-300 hover:bg-primary/10 hover:text-primary dark:text-default-400 data-[state='open']:bg-primary/10 data-[state='open']:text-primary"
                                            :class="{
        'cursor-not-allowed': !$store.app.hasSubmenu,
        'group-hover:bg-primary/10': !$store.app.collapsed
      }">
                                            <span :class="item.icon" class="h-6 w-6"></span>
                                        </button>

                                        <!-- Tooltip -->
                                        <div class="bg-primary absolute start-full ms-1 top-1/2 z-20 -translate-y-1/2 whitespace-nowrap rounded-[5px] py-1.5 px-3.5 text-sm text-primary-foreground invisible group-hover:visible"
                                            x-text="item.label">
                                            <span
                                                class="bg-primary absolute start-[-3px] top-1/2 -z-10 h-2 w-2 -translate-y-1/2 rotate-45"></span>
                                        </div>
                                    </div>
                                </template>
                                <template x-if="!item.submenu">
                                    <div class="group relative flex flex-col gap-4 py-2">
                                        <!-- Main Button -->
                                        <button
                                            class=" mx-auto flex h-12 w-12 cursor-pointer flex-col items-center justify-center rounded-md text-default-500 transition-all duration-300 hover:bg-primary/10 hover:text-primary dark:text-default-400"
                                            :class="{
        '!cursor-not-allowed hover:bg-transparent': !item.submenu,
      }">
                                            <span :class="item.icon" class="h-6 w-6"></span>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <div class="py-2 ">
                <img alt="dashtail" loading="lazy" class="mx-auto size-9 cursor-pointer rounded-full"
                    src="../../assets/app/images/avatar/avatar-1.jpg" />
            </div>
        </div>

        <div x-twmerge="{
        ' border-default-200 pointer-events-auto relative z-10 flex flex-col h-full w-[228px] border-r  bg-card   transition-all duration-300': true ,
        'rtl:translate-x-[calc(100%_+_72px)] translate-x-[calc(-100%_-_72px)]': $store.app.collapsed ,}">
            <div x-show="$store.app.sidebarBg !== 'none'"
                class="absolute left-0 top-0 z-[-1] h-full w-full bg-cover bg-center opacity-[0.07]"
                :style="{ backgroundImage: `url(${$store.app.sidebarBg})` }"></div>
            <h2
                class="sticky top-0 z-50 flex items-center gap-4 bg-transparent px-4 py-4 text-lg font-semibold capitalize text-default-700">
                <span class="block" x-text="$store.app.subMenuLabel"></span>
            </h2>
            <div class="no-scrollbar h-[calc(100%-40px)] grow overflow-y-auto">
                <div class="px-4">
                    <ul class="">
                        <template x-for="(nest, index) in $store.app.currentSubMenu">
                            <li class="mb-1.5 last:mb-0">
                                <div x-show="nest?.submenu?.length > 0">
                                    <div :data-state="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.currentPage === nest.link ? 'active' : ''"
                                        class="flex items-center gap-3 rounded-md px-[10px] py-2 text-default-600 data-[state=active]:bg-primary/80 data-[state=active]:text-primary-foreground"
                                        @click.prevent="$store.app.handleOpenModuleSubmenu(index)">
                                        <div
                                            class="flex flex-1 cursor-pointer gap-3 text-sm font-medium capitalize">
                                            <span class="inline-flex flex-grow-0 items-center">
                                                <span :class="nest.icon"
                                                    class="leading-0 relative top-0.5 text-base"></span></span>
                                            <span class="flex-grow truncate" x-text="nest.label"></span>
                                        </div>
                                        <span
                                            class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
                                            :class="{ 'rotate-90': $store.app.isModuleSubmenu2Active(index)  || $store.app.selectedSubMenu === index}"></span>
                                    </div>
                                    <template
                                        x-if="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.currentPage === nest.link">
                                        <ul
                                            class="sub-menu relative space-y-3 before:absolute before:left-4 before:top-0 before:h-[calc(100%-5px)] before:w-[2px] before:rounded before:bg-primary/10 dark:before:bg-primary/20">
                                            <template x-for="sub in nest.submenu">
                                                <li class="before: relative top-0 ms-[30px] block before:absolute before:-left-[14px] before:h-0 before:w-[2px] before:transition-all before:duration-200 first:pt-4 first:before:top-4 last:pb-1"
                                                    :class="{'before:bg-primary before:h-full':$store.app.isSubmenuActive(sub) }">
                                                    <a :data-state="$store.app.isSubmenuActive(sub) ? 'active': ''"
                                                        :href="sub.link || 'javascript:void(0)'"
                                                        class="text-default-700 hover:text-primary data-[state=active]:text-primary"
                                                        :class="{
                        'text-primary ': $store.app.currentPage === sub.link,
                        'hover:text-primary ': sub.link,
                        'cursor-not-allowed !text-default-400 justify-between': sub.badge
                      }">
                                                        <span x-text="sub.label "
                                                            class="pl-3 text-sm capitalize font-normal"></span>
                                                        <span x-show="!sub.link && sub.badge" x-text="sub.badge"
                                                            class="bg-primary py-0.5 px-1.5 rounded-full text-xs text-primary-foreground capitalize"></span>
                                </div>
                                </a>
                            </li>
                        </template>
                    </ul>
</template>
</div>
<a x-show="!nest?.submenu" :href="nest.link || 'javascript:void(0)'" class="block">
    <div class="flex items-center gap-3 rounded-md px-[10px] py-2 text-default-600 hover:bg-primary/80 hover:text-primary-foreground"
        :class="{ ' bg-primary/80 text-primary-foreground': $store.app.currentPage === nest.link , '!cursor-not-allowed hover:bg-transparent text-default-700':nest.badge}">
        <span class="flex-none" :class="{' text-default-700 !cursor-not-allowed': nest.badge}">
            <span :class="nest.icon" class="leading-0 relative top-0.5 size-5"></span>
        </span>

        <div class="flex-1 flex">
            <span class="flex-1 truncate" :class="{ ' text-default-400 !cursor-not-allowed':nest.badge}"
                x-text="nest.label"></span>
            <span x-show="!nest.link && nest.badge">
                <span x-text='nest.badge'
                    class="bg-primary py-0.5 px-2 rounded-full text-xs font-medium text-primary-foreground capitalize"></span>
            </span>
        </div>
    </div>
</a>
</li>
</template>
</ul>
</div>
</div>
</div>
</div>
</template>
<!--END: Sidebar Module-->
<!-- *************************
          END: Sidebar Wrapper
      *************************** -->


<!-- *************************
          START: Mobile Menu
      *************************** -->
<template x-teleport="body">
    <div class="fixed inset-0 z-50 bg-default-900/80 h-full w-full "
        x-show="!$store.app.mediaQueries.isDesktop && $store.app.mobileMenuOpen"></div>
</template>

<aside @click.outside="$store.app.toggleMobileMenu()"
    class="fixed start-0  top-0 z-[999] border-r bg-card h-full w-[248px] "
    x-show="!$store.app.mediaQueries.isDesktop && $store.app.mobileMenuOpen">
    <div class="px-4 py-4">
        <div class="flex justify-between items-center">

            <a href="analytics.html">
                <div class="flex flex-1 items-center gap-3" x-show="!$store.app.collapsed"
                    :class="{'px-4 block': !$store.app.collapsed, 'hidden':$store.app.collapsed}">
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
                    <div class="flex-1 text-xl font-semibold text-primary">DashTail</div>
                </div>
            </a>
            <button @click="$store.app.toggleMobileMenu()" class="h-6 w-6">
                <span class="icon-[heroicons--x-mark] h-5 w-5 text-default-500"></span>
            </button>
        </div>
    </div>
    <div class="flex flex-col h-[calc(100%-60px)]">

        <div class="sidebar-menu relative  grow my-4 h-[calc(100%-60px)] overflow-y-auto no-scrollbar">
            <ul class="h-full space-y-1"
                :class="{'px-4': !$store.app.collapsed, 'space-y-2 text-center':$store.app.collapsed}">
                <template x-for="(item, index) in $store.app.menus" key="index">
                    <li>
                        <template x-if="item.type === 'header'">
                            <div class="mb-3 my-4 text-xs font-bold uppercase text-default-900" x-text="item.label">
                            </div>
                        </template>
                        <template x-if="item.type === 'item' && !item.submenu">
                            <a class="cursor-pointer" @click="
        $store.app.handleMenuClick(index, $event);
        $store.app.hasSubmenu = true;
      " :href="item.link || 'javascript:void(0)'" class="block">
                                <span x-show="$store.app.collapsed"
                                    class="relative mx-auto inline-flex h-12 w-12 flex-col items-center justify-center rounded transition-all duration-300 hover:bg-primary/80 hover:text-primary-foreground ease-in-out"
                                    :class="{ 'bg-primary text-primary-foreground': $store.app.currentPage === item.link }">
                                    <span :class="item.icon" class="leading-0 relative top-0.5 size-5"></span>

                                    <div x-data="{
    menuTooltipHovered: false,
    menuTooltipDelay: 200,
    menuTooltipLeaveDelay: 150,
    menuTooltipTimeout: null,
    menuTooltipLeaveTimeout: null,
    menuTooltipPosition: { top: 0, left: 0 },
    menuTooltipEnter() {
      clearTimeout(this.menuTooltipLeaveTimeout);
      if (this.menuTooltipHovered) return;
      clearTimeout(this.menuTooltipTimeout);
      this.menuTooltipTimeout = setTimeout(() => {
        this.menuTooltipHovered = true;
        this.$nextTick(() => this.updatemenuTooltipPosition());
      }, this.menuTooltipDelay);
    },
    menuTooltipLeave() {
      clearTimeout(this.menuTooltipTimeout);
      if (!this.menuTooltipHovered) return;
      this.menuTooltipLeaveTimeout = setTimeout(() => {
        if (!this.isHoveringCard()) {
          this.menuTooltipHovered = false;
        }
      }, this.menuTooltipLeaveDelay);
    },
    updatemenuTooltipPosition() {
      const rect = this.$el.getBoundingClientRect();
      const menuTooltip = document.getElementById('menu-tooltip');
      const viewportHeight = window.innerHeight;
      const isRTL = this.$store.app.direction === 'rtl';

      let menuTooltipHeight = menuTooltip ? menuTooltip.offsetHeight : 200; 
      let top = rect.top + window.scrollY;

      // Adjust top to ensure it doesn't overflow viewport
      if (top + menuTooltipHeight > viewportHeight) {
        top = viewportHeight - menuTooltipHeight - 10; 
      }
      if (top < 0) {
        top = 10;
      }

      this.menuTooltipPosition = {
        top: top,
        [isRTL ? 'right' : 'left']: isRTL
          ? window.innerWidth - rect.left + window.scrollX + 10
          : rect.right + window.scrollX + 10,
      };
    },
    isHoveringCard() {
      const card = document.getElementById('menu-tooltip');
      return card && card.matches(':hover');
    },
  }" class="relative" @mouseover="menuTooltipEnter()" @mouseleave="menuTooltipLeave()">
                                        <span
                                            class="relative mx-auto inline-flex h-12 w-12 cursor-pointer flex-col items-center justify-center rounded-md transition-all duration-200 hover:bg-primary hover:text-primary-foreground"
                                            :class="{ 'bg-primary text-primary-foreground': $store.app.selected === index }">
                                            <span :class="item.icon"
                                                class="leading-0 relative top-0.5 size-5"></span>
                                        </span>
                                        <template x-if="menuTooltipHovered" x-teleport="body">
                                            <div id="menu-tooltip" x-show="menuTooltipHovered"
                                                class="absolute z-50 py-4" x-cloak :style="{
        top: menuTooltipPosition.top + 'px',
        [menuTooltipPosition.hasOwnProperty('left') ? 'left' : 'right']: (menuTooltipPosition.left || menuTooltipPosition.right) + 'px',
      }" @mouseover="menuTooltipEnter()" @mouseleave="menuTooltipLeave()">
                                                <div x-text="item.label"
                                                    class="bg-primary text-primary-foreground py-1 px-2.5 rounded capitalize ms-2">
                                                </div>
                                            </div>
                                        </template>
                                    </div>


                                </span>

                                <div x-show="!$store.app.collapsed"
                                    class="flex cursor-pointer items-center gap-3 rounded px-[10px] py-2  font-semibold capitalize text-default-700 hover:bg-primary/80 hover:text-primary-foreground duration-200 ease-in-out"
                                    :class="{ 'bg-primary/80 text-primary-foreground': $store.app.currentPage === item?.link }">
                                    <span class="flex-none">
                                        <span :class="item.icon" class="leading-0 relative top-0.5 size-5"></span>
                                    </span>

                                    <div class="flex-1 truncate text-sm" x-text="item.label"></div>
                                </div>

                            </a>
                        </template>
                        <template x-if="item.type === 'item' && item.submenu">
                            <div class="group relative">
                                <!-- single menu when $store.app.collapsed -->
                                <template x-if="$store.app.collapsed">
                                    <div x-data="{
    hoverCardHovered: false,
    hoverCardDelay: 300,
    hoverCardLeaveDelay: 400,
    hoverCardTimeout: null,
    hoverCardLeaveTimeout: null,
    hoverCardPosition: { top: 0, left: 0 },
    hoverCardEnter() {
      clearTimeout(this.hoverCardLeaveTimeout);
      if (this.hoverCardHovered) return;
      clearTimeout(this.hoverCardTimeout);
      this.hoverCardTimeout = setTimeout(() => {
        this.hoverCardHovered = true;
        this.$nextTick(() => this.updateHoverCardPosition());
      }, this.hoverCardDelay);
    },
    hoverCardLeave() {
      clearTimeout(this.hoverCardTimeout);
      if (!this.hoverCardHovered) return;
      this.hoverCardLeaveTimeout = setTimeout(() => {
        if (!this.isHoveringCard()) {
          this.hoverCardHovered = false;
        }
      }, this.hoverCardLeaveDelay);
    },
    updateHoverCardPosition() {
      const rect = this.$el.getBoundingClientRect();
      const hoverCard = document.getElementById('hover-card');
      const viewportHeight = window.innerHeight;
      const isRTL = this.$store.app.direction === 'rtl';

      let hoverCardHeight = hoverCard ? hoverCard.offsetHeight : 200; // Fallback if height isn't available
      let top = rect.top + window.scrollY;

      // Adjust top to ensure it doesn't overflow viewport
      if (top + hoverCardHeight > viewportHeight) {
        top = viewportHeight - hoverCardHeight - 10; // Add bottom padding
      }
      if (top < 0) {
        top = 10; // Add top padding
      }

      this.hoverCardPosition = {
        top: top,
        [isRTL ? 'right' : 'left']: isRTL
          ? window.innerWidth - rect.left + window.scrollX + 10
          : rect.right + window.scrollX + 10,
      };
    },
    isHoveringCard() {
      const card = document.getElementById('hover-card');
      return card && card.matches(':hover');
    },
  }" class="relative" @mouseover="hoverCardEnter()" @mouseleave="hoverCardLeave()">
                                        <span
                                            class="relative mx-auto inline-flex h-12 w-12 cursor-pointer flex-col items-center justify-center rounded-md transition-all duration-300 hover:bg-primary hover:text-primary-foreground"
                                            :class="{ 'bg-primary text-primary-foreground': $store.app.isChildMenuActive(item.submenu) || $store.app.isMenuActive(item)  }">
                                            <span :class="item.icon"
                                                class="leading-0 relative top-0.5 size-5"></span>
                                        </span>

                                        <template x-if="hoverCardHovered" x-teleport="body">
                                            <div id="hover-card" x-show="hoverCardHovered"
                                                class="absolute z-50 py-4" x-cloak :style="{
        top: hoverCardPosition.top + 'px',
        [hoverCardPosition.hasOwnProperty('left') ? 'left' : 'right']: (hoverCardPosition.left || hoverCardPosition.right) + 'px',
      }" @mouseover="hoverCardEnter()" @mouseleave="hoverCardLeave()">
                                                <div x-show="hoverCardHovered"
                                                    class="max-h-[300px] min-w-[220px] overflow-y-auto rounded-md border bg-popover p-4 custom-scrollbar"
                                                    x-transition>
                                                    <div>
                                                        <ul
                                                            class="relative space-y-2 before:absolute before:start-4 before:top-0 before:h-[calc(100%-5px)] before:w-[2px] before:rounded before:bg-primary/20">
                                                            <li
                                                                class="relative flex w-full flex-1 items-center gap-3 rounded bg-primary px-3 py-3 font-medium text-primary-foreground">
                                                                <div :class="item.icon" class="h-4 w-4 flex-none">
                                                                </div>
                                                                <div x-text="item.label"></div>
                                                            </li>
                                                            <template x-for="(nest, index) in item.submenu"
                                                                :key="index">

                                                                <li class=" relative top-0 before:w-[2px] before:transition-all before:duration-200 first:pt-4  block ps-4 before:absolute before:top-0 before:h-full  first:before:top-4 first:before:h-[calc(100%-16px)]  last:before:h-[calc(100%-16px)] last:pb-4 text-default-500"
                                                                    :class="{ 'before:bg-primary data-[state=active]:text-primary': $store.app.currentPage === nest.link}">
                                                                    <div x-show="nest?.submenu?.length > 0">
                                                                        <div :data-state="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.currentPage === nest.link || $store.app.isChildMenuActive(nest.submenu) ? 'active' : ''"
                                                                            class="flex items-center gap-3 rounded-md px-[10px] py-2 text-default-600 data-[state=active]:text-primary"
                                                                            @click.prevent="$store.app.handleOpenModuleSubmenu(index)">
                                                                            <div
                                                                                class="flex flex-1 cursor-pointer gap-3 text-sm font-medium capitalize">
                                                                                <span
                                                                                    class="inline-flex flex-grow-0 items-center">
                                                                                    <span :class="nest.icon"
                                                                                        class="leading-0 relative top-0.5 text-base"></span></span>
                                                                                <span class="flex-grow truncate"
                                                                                    x-text="nest.label"></span>
                                                                            </div>
                                                                            <span
                                                                                class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
                                                                                :class="{  'rotate-90': $store.app.selectedSubMenu === index &&  !$store.app.isSubmenuActive(index) && !$store.app.isChildMenuActive(nest.submenu) }"></span>
                                                                        </div>
                                                                        <ul class="sub-menu relative space-y-3 before:absolute before:left-5"
                                                                            x-show="$store.app.selectedSubMenu === index || $store.app.isSubmenuActive(index) ||$store.app.isChildMenuActive(nest.submenu)">
                                                                            <template
                                                                                x-for="(sub, index) in nest.submenu"
                                                                                :key="index">
                                                                                <li class="before: relative top-0 before:top-1.5 ms-[30px] block before:absolute before:-left-[5px] before:h-2 before:w-2 before:border before:border-default-500  before:transition-all before:duration-200 first:pt-4 first:before:top-4 last:pb-1 before:rounded-full"
                                                                                    :class="{'before:border-primary before:bg-primary before:ring-primary/30 before:ring-[4px]':$store.app.isSubmenuActive(sub) }">
                                                                                    <a :data-state="$store.app.isSubmenuActive(sub) ? 'active': ''"
                                                                                        :href="sub.link || 'javascript:void(0)'"
                                                                                        class="text-default-700 hover:text-primary data-[state=active]:text-primary"
                                                                                        :class="{
                        'text-primary ': $store.app.currentPage === sub.link,
                        'hover:text-primary ': sub.link,
                        'cursor-not-allowed !text-default-400 justify-between': sub.badge
                      }">
                                                                                        <span x-text="sub.label"
                                                                                            class="pl-3 text-sm capitalize font-normal"></span>
                                                                                        <span x-show="sub.badge"
                                                                                            x-text="sub.badge"
                                                                                            class="bg-primary py-0.5 px-1.5 rounded-full text-xs text-primary-foreground capitalize"></span>
                                                                    </div>
                                                                    </a>
                                                                </li>
                                                            </template>
                                                        </ul>
                                                    </div>
                                                    <a :href="nest.link || 'javascript:void(0)'"
                                                        x-show="!nest?.submenu"
                                                        class="flex items-center gap-3 rounded text-sm font-normal capitalize ps-5  transition-all duration-150 text-default-600 data-[state=active]:text-primary"
                                                        :class="{
                      'cursor-not-allowed !text-default-400': nest.badge, 'hover:text-primary':nest.link,
                    }">
                                                        <span class="flex-1 truncate" x-text="nest.label"
                                                            :class="{'text-primary':$store.app.currentPage === nest.link}"></span>
                                                        <span x-show="!nest.link && nest.badge">
                                                            <span x-text='nest.badge'
                                                                class="bg-primary py-0.5 px-2 rounded-full text-xs font-medium text-primary-foreground capitalize"></span>
                                                        </span>
                                                    </a>
                    </li>
                </template>
            </ul>
        </div>
    </div>
    </div>
    </template>
    </div>
    </template>

    <div @click.prevent="$store.app.handleMenuClick(index)" x-show="!$store.app.collapsed"
        class="flex cursor-pointer items-center gap-3 rounded px-[10px] py-2 text-sm font-bold capitalize text-default-600 duration-200 ease-in-out hover:bg-primary hover:text-primary-foreground"
        :class="{ 'bg-primary text-primary-foreground': $store.app.selected === index || $store.app.isSubmenuOpen(index) || $store.app.isMenuActive(item) ||
      $store.app.currentPage === item.link  }">
        <span class="flex-none">
            <span :class="item.icon" class="leading-0 relative top-0.5 size-5"></span>
        </span>
        <div class="flex flex-1 items-center justify-between">
            <div class="flex-1" x-text="item.label"></div>
            <span class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
                :class="{ 'rotate-90': $store.app.isSubmenuOpen(index)  || $store.app.selected === index}"></span>
        </div>
    </div>
    <!-- single menu when not $store.app.collapsed -->
    <template
        x-if="$store.app.selected === index || $store.app.isSubmenuOpen(index) || $store.app.currentPage === item.link ||  $store.app.isSubmenu2Open(index)">
        <ul x-show="!$store.app.collapsed"
            class="sub-menu relative m-0 space-y-3 p-0 before:absolute before:-top-4 before:start-4 before:h-[calc(100%-5px)] before:w-[3px] before:rounded before:bg-primary/10">

            <template x-for="(nest, index) in item.submenu" :key="index">
                <li class="relative block ps-4 before:absolute before:top-0 before:h-full before:w-[3px] first:before:top-4 first:before:h-[calc(100%-16px)]  last:before:h-[calc(100%-16px)] last:pb-4 text-default-500"
                    :class="{ 'before:bg-primary data-[state=active]:text-primary': $store.app.currentPage === nest.link}">
                    <div x-show="nest?.submenu?.length > 0">
                        <div :data-state="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.currentPage === nest.link || $store.app.isChildMenuActive(nest.submenu)  ? 'active' : ''"
                            class="flex items-center gap-3 rounded-md px-[10px] py-2 text-default-600 data-[state=active]:text-primary"
                            @click.prevent="$store.app.handleOpenModuleSubmenu(index)">
                            <div class="flex flex-1 cursor-pointer gap-3 text-sm font-medium capitalize">
                                <span class="inline-flex flex-grow-0 items-center">
                                    <span :class="nest.icon"
                                        class="leading-0 relative top-0.5 text-base"></span></span>
                                <span class="flex-grow truncate" x-text="nest.label"></span>
                            </div>
                            <span class="icon-[lucide--chevron-right] h-4 w-4 transition-all duration-300 flex-none"
                                x-twmerge="{
                           'rotate-90':  $store.app.selectedSubMenu === index &&  !$store.app.isSubmenuActive(index) && !$store.app.isChildMenuActive(nest.submenu),
                   
                           }"></span>
                        </div>
                        <template
                            x-if="$store.app.selectedSubMenu === index || $store.app.isModuleSubmenu2Active(index) || $store.app.isChildMenuActive(nest.submenu) || $store.app.currentPage === nest.link">
                            <ul class="sub-menu relative space-y-3 before:absolute before:left-5">
                                <template x-for="(sub, index) in nest.submenu" :key="index">
                                    <li class="before: relative top-0 before:top-1.5 ms-[30px] block before:absolute before:-left-[5px] before:h-2 before:w-2 before:border before:border-default-500  before:transition-all before:duration-200 first:pt-4 first:before:top-4 last:pb-1 before:rounded-full"
                                        :class="{'before:border-primary before:bg-primary before:ring-primary/30 before:ring-[4px]':$store.app.isSubmenuActive(sub) }">
                                        <a :data-state="$store.app.isSubmenuActive(sub) ? 'active': ''"
                                            :href="sub.link || 'javascript:void(0)'"
                                            class="text-default-700 hover:text-primary data-[state=active]:text-primary"
                                            :class="{
                        'text-primary ': $store.app.currentPage === sub.link,
                        'hover:text-primary ': sub.link,
                        'cursor-not-allowed !text-default-400 justify-between': sub.badge
                      }">
                                            <span x-text="sub.label"
                                                class="pl-3 text-sm capitalize font-normal"></span>
                                            <span x-show="sub.badge" x-text="sub.badge"
                                                class="bg-primary py-0.5 px-1.5 rounded-full text-xs text-primary-foreground capitalize"></span>
                    </div>
                    </a>
                </li>
            </template>
        </ul>
    </template>
    </div>
    <a :href="nest.link || 'javascript:void(0)'" x-show="!nest?.submenu"
        class="flex items-center gap-3 rounded text-sm font-normal capitalize ps-5  transition-all duration-150 text-default-600 data-[state=active]:text-primary"
        :class="{
                      'cursor-not-allowed !text-default-400': nest.badge, 'hover:text-primary':nest.link,
                    }">
        <span class="flex-1 truncate" x-text="nest.label"
            :class="{'text-primary':$store.app.currentPage === nest.link}"></span>
        <span x-show="!nest.link && nest.badge">
            <span x-text='nest.badge'
                class="bg-primary py-0.5 px-2 rounded-full text-xs font-medium text-primary-foreground capitalize"></span>
        </span>
    </a>
    </li>
    </template>

    </ul>
    </template>
    </div>
    </template>
    </li>
    </template>

    </ul>

    </div>
    <!-- end sidebar elements -->

    <div class="   " x-show="!$store.app.collapsed">
        <div class=" bg-primary-400  w-full ">
            <div class="flex gap-2 items-center mb-1 p-3">
                <div class="rounded-full h-9 w-9 overflow-hidden">
                    <img src='assets/images/avatar/avatar-1.jpg' class="w-full h-full" />
                </div>
                <div class="flex-1">
                    <div class="text-sm font-medium text-primary-foreground capitalize ">
                        Mcc Callem
                    </div>
                    <a href="analytics.html" class="text-xs text-primary-foreground">
                        @uxuidesigner
                    </a>
                </div>
                <div class="flex-none">
                    <button
                        class="inline-flex h-9 w-9 items-center justify-center rounded-sm bg-primary-500 text-sm font-bold p-2 text-primary-foreground ring-offset-background transition-colors hover:bg-primary/80 border">
                        <span class="icon-[heroicons--arrow-right-on-rectangle-solid] h-5 w-5"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end widget -->
    </div>
    <div class="rounded-full h-9 w-9  mx-auto " x-show="$store.app.collapsed">
        <img src='assets/images/avatar/avatar-1.jpg' class="w-full h-full rounded-none" />
    </div>
</aside>