<?php
$title = "Accueil";

ob_start();
?>

<main x-twmerge="{
            'flex-1': true,
            'pb-6 pt-6 px-4 xl:px-6':  $store.app.layout !== 'vertical' ,
            'pb-6 pt-6':  $store.app.layout === 'vertical',
            'xl:px-0': $store.app.sidebarType === 'module'
            
        }">
    <div x-twmerge="{
            'xl:ms-[72px]':  $store.app.collapsed ,
            'xl:ms-[272px]':  !$store.app.collapsed ,
            ' xl:px-14': $store.app.layout !== 'horizontal',
            '!m-0': $store.app.layout === 'horizontal',
            'xl:ms-[248px]': $store.app.layout === 'vertical' && !$store.app.collapsed,
            'px-4 xl:px-6': $store.app.layout === 'vertical',
            'xl:ms-[300px]': $store.app.sidebarType === 'module' && !$store.app.collapsed,}"
        x-show="!$store.app.loading" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-5">
        <!--  START: Slot -->


        <div class="space-y-6">

            <div class="flex flex-wrap flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center">
                    <div class="text-2xl font-medium text-default-800 ">Analytics dashboard</div>
                </div>
                <div class="flex items-center gap-2">
                    <div>
                        <div x-data="{ 
    isOpen: false, 
    openedWithKeyboard: false,
    startDate: null,
    endDate: null,
    formatDate(date) {
      if (!date) return '';
      return new Date(date).toLocaleDateString('en-US', { 
        month: 'short', 
        day: 'numeric', 
        year: 'numeric' 
      });
    },
    getButtonText() {
      if (!this.startDate && !this.endDate) {
        return 'Pick a Date';
      }
      if (this.startDate && !this.endDate) {
        return this.formatDate(this.startDate);
      }
      return `${this.formatDate(this.startDate)} - ${this.formatDate(this.endDate)}`;
    }
  }" class="relative" @keydown.esc.window="isOpen = false, openedWithKeyboard = false" x-init="$watch('isOpen || openedWithKeyboard', value => { 
    document.body.style.overflow = value ? 'hidden' : 'auto';
  })">
                            <button type="button" @click="isOpen = !isOpen" aria-haspopup="true"
                                @keydown.space.prevent="openedWithKeyboard = true"
                                @keydown.enter.prevent="openedWithKeyboard = true"
                                @keydown.down.prevent="openedWithKeyboard = true"
                                :aria-expanded="isOpen || openedWithKeyboard"
                                class="inline-flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-card px-6 text-sm text-default-600 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-0 disabled:pointer-events-none disabled:opacity-50">
                                <span class="icon-[heroicons--calendar-days] size-4 me-1"></span>
                                <span x-text="getButtonText()"></span>
                            </button>
                            <div x-cloak x-show="isOpen || openedWithKeyboard;" x-transition x-trap="openedWithKeyboard"
                                @click.outside="isOpen = false, openedWithKeyboard = false"
                                @keydown.down.prevent="$focus.wrap().next()"
                                @keydown.up.prevent="$focus.wrap().previous()"
                                class="absolute  sm:!end-0 top-full z-[999] rounded-md border bg-popover p-1 text-start text-popover-foreground shadow-md w-[300px]">
                                <div x-data="{
        datePickerOpen: true,
        datePickerMonth: '',
        datePickerYear: '',
        datePickerDay: '',
        datePickerDaysInMonth: [],
        datePickerBlankDaysInMonth: [],
        datePickerMonthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datePickerDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        selectingEndDate: false,
        datePickerDayClicked(day) {
          let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
          if (!$data.startDate || this.selectingEndDate) {
            $data.startDate = selectedDate;
            $data.endDate = null;
            this.selectingEndDate = false;
          } else if (!$data.endDate && selectedDate >= $data.startDate) {
            $data.endDate = selectedDate;
            this.selectingEndDate = true;
          } else {
            $data.startDate = selectedDate;
            $data.endDate = null;
            this.selectingEndDate = false;
          }
        },
        dateInRange(day) {
          if (!$data.startDate || !$data.endDate) return false;
          let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
          return selectedDate >= $data.startDate && selectedDate <= $data.endDate;
        },
        isSelected(day) {
          let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
          return ($data.startDate && selectedDate.getTime() === $data.startDate.getTime()) ||
                 ($data.endDate && selectedDate.getTime() === $data.endDate.getTime());
        },
        datePickerPreviousMonth() {
          if (this.datePickerMonth == 0) { 
            this.datePickerYear--; 
            this.datePickerMonth = 11; 
          } else {
            this.datePickerMonth--;
          }
          this.datePickerCalculateDays();
        },
        datePickerNextMonth() {
          if (this.datePickerMonth == 11) { 
            this.datePickerMonth = 0; 
            this.datePickerYear++; 
          } else { 
            this.datePickerMonth++; 
          }
          this.datePickerCalculateDays();
        },
        datePickerIsToday(day) {
          const today = new Date();
          const d = new Date(this.datePickerYear, this.datePickerMonth, day);
          return today.toDateString() === d.toDateString();
        },
        datePickerCalculateDays() {
          let daysInMonth = new Date(this.datePickerYear, this.datePickerMonth + 1, 0).getDate();
          let dayOfWeek = new Date(this.datePickerYear, this.datePickerMonth).getDay();
          let blankdaysArray = [];
          for (var i = 1; i <= dayOfWeek; i++) {
            blankdaysArray.push(i);
          }
          let daysArray = [];
          for (var i = 1; i <= daysInMonth; i++) {
            daysArray.push(i);
          }
          this.datePickerBlankDaysInMonth = blankdaysArray;
          this.datePickerDaysInMonth = daysArray;
        }
      }" x-init="
        currentDate = new Date();
        datePickerMonth = currentDate.getMonth();
        datePickerYear = currentDate.getFullYear();
        datePickerCalculateDays();
      ">
                                    <div class="relative">
                                        <div class="w-full bg-card p-4">
                                            <div class="mb-2 flex items-center justify-between">
                                                <div>
                                                    <span x-text="datePickerMonthNames[datePickerMonth]"
                                                        class="text-lg font-bold text-default-800"></span>
                                                    <span x-text="datePickerYear"
                                                        class="ml-1 text-lg font-normal text-default-600"></span>
                                                </div>
                                                <div>
                                                    <button @click="datePickerPreviousMonth()" type="button"
                                                        class="focus:shadow-outline inline-flex cursor-pointer rounded-full p-1 transition duration-100 ease-in-out hover:bg-default-100 focus:outline-none">
                                                        <span class="icon-[heroicons--chevron-left] h-4 w-4"></span>
                                                    </button>
                                                    <button @click="datePickerNextMonth()" type="button"
                                                        class="focus:shadow-outline inline-flex cursor-pointer rounded-full p-1 transition duration-100 ease-in-out hover:bg-default-100 focus:outline-none">
                                                        <span class="icon-[heroicons--chevron-right] h-4 w-4"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mb-3 grid grid-cols-7">
                                                <template x-for="(day, index) in datePickerDays" :key="index">
                                                    <div class="px-0.5">
                                                        <div x-text="day"
                                                            class="text-center text-xs font-medium text-default-800">
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                            <div class="grid grid-cols-7">
                                                <template x-for="blankDay in datePickerBlankDaysInMonth">
                                                    <div class="border border-transparent p-1 text-center text-sm">
                                                    </div>
                                                </template>
                                                <template x-for="(day, dayIndex) in datePickerDaysInMonth"
                                                    :key="dayIndex">
                                                    <div class="mb-1 px-0.5">
                                                        <div x-text="day" @click="datePickerDayClicked(day)" :class="{
                                    'bg-primary text-primary-foreground ': isSelected(day), 
                                    'bg-primary  text-primary-foreground ': dateInRange(day), 
                                    'text-default-600 hover:bg-default-200': !dateInRange(day) && !isSelected(day),
                                    'bg-primary text-primary-foreground': datePickerIsToday(day)
                                }" class="flex h-7 w-7 cursor-pointer items-center justify-center !rounded-[2px] text-center text-sm leading-none">
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12  gap-6 ">
                <div class="col-span-12 lg:col-span-8">


                    <div x-twmerge="{
      'rounded-md bg-card text-card-foreground shadow-sm flex flex-col justify-center': true,
      'h-full': true }">

                        <div x-twmerge="{
      'p-6 pt-0  break-words h-full ': true,
      'p-6': true }">

                            <div x-data="{
  activeTab: 'all',
  tabsTrigger: [
   { value: 'all', text: 'all User', total: '10,234', color: 'primary' },
   { value: 'event', text: 'Event Count', total: '536', color: 'warning' },
   { value: 'conversation', text: 'Conversation', total: '21', color: 'success' },
   { value: 'newuser', text: 'New User', total: '3321', color: 'info' }
  ],
   tabsContentData: [
    { value: 'all', series: [90, 70,85,60,80,70,90,75,60,80], color: 'red' },
    { value: 'event', series: [90, 70,85,60,80,70,90,75,60,80], color: 'green' },
    { value: 'conversation', series: [90, 70,85,60,80,70,90,75,60,80], color: 'blue' },
    { value: 'newuser', series: [90, 70,85,60,80,70,90,75,60,80], color: 'pink' }
  ]
}">

                                <div class="flex flex-wrap items-center gap-3 mb-8">
                                    <div class="flex-1">
                                        <div class="text-xl font-semibold text-default-900 whitespace-nowrap">
                                            Reports Snapshot</div>
                                        <span class="text-xs text-default-600">Demographic properties of your
                                            customer</span>
                                    </div>
                                    <div class="flex-none">
                                        <div class="relative">
                                            <div x-data="{
         options: [
            {
                value: 'Jan 12',
                label: 'Jan 12',
            },
            {
                value: 'Jan 13',
                label: 'Jan 13',
            },
            {
                value: 'Jan 14',
                label: 'Jan 14',
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
    }" class="flex w-full  flex-col gap-1" x-on:keydown="highlightFirstMatchingOption($event.key)"
                                                x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false"
                                                x-init="$watch('isOpen || openedWithKeyboard', value => { 
    document.body.style.overflow = value ? 'hidden' : 'auto';
  })">
                                                <div class="relative">
                                                    <button type="button" role="combobox"
                                                        class="flex h-10 w-full min-w-[130px] items-center justify-between whitespace-nowrap rounded-lg border border-default-300 px-3 py-0 text-sm text-default-500 transition duration-300 placeholder:text-accent-foreground/50  [&>svg]:h-5 [&>svg]:w-5 [&>svg]:stroke-default-600"
                                                        aria-haspopup="listbox" aria-controls="industriesList"
                                                        x-on:click="isOpen = ! isOpen"
                                                        x-on:keydown.down.prevent="openedWithKeyboard = true"
                                                        x-on:keydown.enter.prevent="openedWithKeyboard = true"
                                                        x-on:keydown.space.prevent="openedWithKeyboard = true"
                                                        x-bind:aria-label="selectedOption ? selectedOption.value : 'Jan 12'"
                                                        x-bind:aria-expanded="isOpen || openedWithKeyboard">
                                                        <span class="text-sm font-normal"
                                                            x-text="selectedOption ? selectedOption.value : 'Select Date'"></span>
                                                        <span class="icon-[lucide--chevron-down] ms-1 h-4 w-4"></span>
                                                    </button>
                                                    <input id="industry" name="industry" type="text"
                                                        x-ref="hiddenTextField" hidden class="hidden" />
                                                    <ul x-cloak x-show="isOpen || openedWithKeyboard"
                                                        id="industriesList"
                                                        class="absolute left-0 top-11 z-20 flex max-h-44 w-full flex-col overflow-hidden overflow-y-auto rounded-md border border-default-300 bg-background p-1"
                                                        role="listbox" aria-label="industries list"
                                                        x-on:click.outside="isOpen = false, openedWithKeyboard = false"
                                                        x-on:keydown.down.prevent="$focus.wrap().next()"
                                                        x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition
                                                        x-trap="openedWithKeyboard">
                                                        <template x-for="(item, index) in options"
                                                            x-bind:key="item.value">
                                                            <li class="combobox-option inline-flex cursor-pointer justify-between gap-6  p-1 text-sm text-default-600 hover:bg-default-900/5 hover:text-default-900 rounded "
                                                                role="option" x-on:click="setSelectedOption(item)"
                                                                x-on:keydown.enter="setSelectedOption(item)"
                                                                x-bind:id="'option-' + index" tabindex="0">
                                                                <span
                                                                    x-bind:class="selectedOption == item ? 'font-bold' : null"
                                                                    x-text="item.label"></span>
                                                                <span class="sr-only"
                                                                    x-text="selectedOption == item ? 'selected' : null"></span>
                                                                <span class="icon-[heroicons--check] h-4 w-4"
                                                                    x-show="selectedOption == item"></span>
                                                            </li>
                                                        </template>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div
                                    class="grid h-full w-full grid-cols-2 justify-start gap-2 bg-transparent md:gap-6 lg:grid-cols-4">
                                    <template x-for="(item, index) in tabsTrigger" :key="index">
                                        <button :data-state="activeTab === item.value ? 'active' : 'inactive'"
                                            @click="activeTab = item.value"
                                            class="flex flex-col gap-1.5 p-4 overflow-hidden bg-primary/50 rounded-md  items-start  relative before:absolute before:left-1/2 before:-translate-x-1/2 before:bottom-1 before:h-[2px] before:w-9 before:bg-primary/50 dark:before:bg-primary-foreground before:hidden data-[state=active]:shadow-none data-[state=active]:before:block"
                                            x-twmerge="{
             'bg-primary/30 data-[state=active]:bg-primary/30 dark:bg-primary/70 before:bg-primary/50': item.color==='primary',
             'bg-orange-50 data-[state=active]:bg-orange-50 dark:bg-orange-500 before:bg-orange-500': item.color==='warning',
             'bg-green-50 data-[state=active]:bg-green-50 dark:bg-green-500 before:bg-green-500': item.color==='success',
             'bg-cyan-50 data-[state=active]:bg-cyan-50 dark:bg-cyan-500 before:bg-cyan-500': item.color==='info'
           }">
                                            <span
                                                class="h-10 w-10 rounded-full bg-primary/40 absolute -top-3 -right-3 ring-8 ring-primary/30"
                                                x-twmerge="{
             'bg-primary/50  ring-primary/20 dark:bg-primary dark:ring-primary/40': item.color==='primary',
             'bg-orange-200 ring-orange-100 dark:bg-orange-300 dark:ring-orange-400': item.color==='warning',
             'bg-green-200 ring-green-100 dark:bg-green-300 dark:ring-green-400': item.color==='success',
             'bg-cyan-200 ring-cyan-100 dark:bg-cyan-300 dark:ring-cyan-400': item.color==='info'
           }"></span>
                                            <span
                                                class="relative  text-sm font-bold capitalize text-default-800 dark:text-primary-foreground"
                                                x-text="item.text"></span>
                                            <span
                                                :class="`text-lg font-bold text-${item.color}/80 dark:text-primary-foreground`"
                                                x-text="item.total"></span>
                                        </button>
                                    </template>
                                </div>

                                <div class="mt-5">

                                    <div x-show="activeTab === 'all'">
                                        <div x-data="$store.app.useAreaChart('useReportSnapshotChart1')"
                                            x-init="initChart()" class="chart-container">
                                            <div id="useReportSnapshotChart1"></div>
                                        </div>
                                    </div>

                                    <div x-show="activeTab === 'event'">
                                        <div x-data="$store.app.useAreaChart('useReportSnapshotChart2','#f97415')"
                                            x-init="initChart()" class="chart-container">
                                            <div id="useReportSnapshotChart2"></div>
                                        </div>
                                    </div>

                                    <div x-show="activeTab === 'conversation'">
                                        <div x-data="$store.app.useAreaChart('useReportSnapshotChart3','#21c45d')"
                                            x-init="initChart()" class="chart-container">
                                            <div id="useReportSnapshotChart3"></div>
                                        </div>
                                    </div>

                                    <div x-show="activeTab === 'newuser'">
                                        <div x-data="$store.app.useAreaChart('useReportSnapshotChart4','#07b6d5')"
                                            x-init="initChart()" class="chart-container">
                                            <div id="useReportSnapshotChart4"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-span-12 lg:col-span-4">


                    <div x-twmerge="{
      'rounded-md bg-card text-card-foreground shadow-sm flex flex-col justify-center': true,
      'h-full': true }">

                        <div x-twmerge="{
      'flex flex-col space-y-1.5 px-6 py-4 mb-6': true,
      'mb-0': true }">


                            <div class="flex items-center gap-1">
                                <div class="flex-1">
                                    <div class="text-xl font-semibold text-default-900"> Users </div>
                                    <span class="text-xs text-default-600 ml-1">In Last 30 Minutes</span>
                                </div>
                                <div class="flex-none flex items-center gap-1">
                                    <span class="text-4xl font-semibold text-primary">63</span>
                                    <span
                                        class="icon-[heroicons--arrow-trending-up-16-solid] size-6 text-success"></span>
                                </div>
                            </div>

                        </div>

                        <div x-twmerge="{
      'p-6 pt-0  break-words h-full ': true,
      '': true }">

                            <div>
                                <p className="text-xs font-medium text-default-800">User Per Minutes</p>
                                <div>
                                    <div x-data="$store.app.useBarChart('userBarChart')" x-init="initChart()"
                                        class="chart-container">
                                        <div id="userBarChart"></div>
                                    </div>
                                </div>
                                <div class="overflow-x-auto custom-scrollbar">
                                    <table class="w-full caption-top text-sm border border-default-200">
                                        <thead class="[&amp;_tr]:border-b">
                                            <tr
                                                class="transition-colors data-[state=selected]:bg-muted border-b border-default-200">
                                                <th class="px-4 ltr:text-left rtl:text-right ltr:last:text-right rtl:last:text-left align-middle capitalize text-sm h-10
                            font-medium text-default-800">
                                                    Top Countries</th>
                                                <th class="px-4 ltr:text-left rtl:text-right ltr:last:text-right rtl:last:text-left align-middle capitalize text-sm h-10
                            font-medium text-default-800 text-right">
                                                    Users</th>
                                            </tr>
                                        </thead>
                                        <tbody class="[&amp;_tr:last-child]:border-0">
                                            <tr
                                                class="transition-colors data-[state=selected]:bg-muted border-b border-default-200">
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 py-2">
                                                    Bangladesh</td>
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 text-right pr-6 py-2">
                                                    05</td>
                                            </tr>
                                            <tr
                                                class="transition-colors data-[state=selected]:bg-muted border-b border-default-200">
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 py-2">
                                                    India</td>
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 text-right pr-6 py-2">
                                                    06</td>
                                            </tr>
                                            <tr
                                                class="transition-colors data-[state=selected]:bg-muted border-b border-default-200">
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 py-2">
                                                    Pakistan</td>
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 text-right pr-6 py-2">
                                                    06</td>
                                            </tr>
                                            <tr
                                                class="transition-colors data-[state=selected]:bg-muted border-b border-default-200">
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 py-2">
                                                    Australia</td>
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 text-right pr-6 py-2">
                                                    10</td>
                                            </tr>
                                            <tr
                                                class="transition-colors data-[state=selected]:bg-muted border-b border-default-200">
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 py-2">
                                                    America</td>
                                                <td
                                                    class="p-4 align-middle last:text-right rtl:last:text-left font-normal text-xs text-default-600 text-right pr-6 py-2">
                                                    08</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>



            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">



                <div x-data='{"reports": [{"id":1,"name":"Sessions","count":"6,132","rate":"150","isUp":true,"icon":"icon-[heroicons--chart-pie-solid]","color":"primary"},{"id":2,"name":"Page Views","count":"11,236","rate":"202","isUp":false,"icon":"icon-[heroicons--eye-16-solid]","color":"info"},{"id":3,"name":"Avg. Duration","count":"46s","rate":"22","isUp":true,"icon":"icon-[heroicons--document-chart-bar-20-solid]","color":"warning"},{"id":4,"name":"Bounce Rate","count":"46s","rate":"30","isUp":false,"icon":"icon-[heroicons--document-chart-bar-20-solid]","color":"destructive"}] }'
                    class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <template x-for="(item, index) in reports" :key="item.id">
                        <div class="bg-card border rounded-lg p-4">
                            <!-- Header -->
                            <div class="flex flex-col sm:flex-row sm:items-center gap-2 border-none pb-0 mb-0">
                                <span class="text-sm font-medium text-default-900 flex-1" x-text="item.name"></span>
                                <span
                                    class="flex-none h-9 w-9 flex justify-center items-center rounded-full font-semibold"
                                    :class="{
            'bg-primary/10 text-primary': item.color === 'primary',
            'bg-info/10 text-info': item.color === 'info',
            'bg-warning/10 text-warning': item.color === 'warning',
            'bg-destructive/10 text-destructive': item.color === 'destructive',
          }">
                                    <span :class="item.icon" class="size-4"></span>
                                </span>
                            </div>
                            <!-- Content -->
                            <div class="mt-2 sm:mt-0">
                                <div class="text-2xl font-semibold text-default-900 mb-2.5" x-text="item.count">
                                </div>
                                <div class="flex items-center font-semibold gap-1">
                                    <template x-if="item.isUp">
                                        <div class="flex items-center gap-1">
                                            <span class="text-success" x-text="item.rate + '%'"></span>
                                            <span
                                                class="icon-[heroicons--arrow-trending-up-16-solid] size-5 text-success"></span>
                                        </div>
                                    </template>
                                    <template x-if="!item.isUp">
                                        <div class="flex items-center gap-1">
                                            <span class="text-destructive" x-text="item.rate"></span>
                                            <span
                                                class="icon-[heroicons--arrow-trending-up-16-solid] size-5 text-destructive"></span>
                                        </div>
                                    </template>
                                </div>
                                <div class="mt-1 text-xs text-default-600">vs Previous 30 Days</div>
                            </div>
                        </div>
                    </template>
                </div>


                <div x-twmerge="{
      'rounded-md bg-card text-card-foreground shadow-sm flex flex-col justify-center': true,
      'h-full': true }">

                    <div x-twmerge="{
      'flex flex-col space-y-1.5 px-6 py-4 mb-6': true,
      'mb-0': true }">

                        <h2 class="card-title  text-default-900">New vs Returning Visitors</h2>

                    </div>

                    <div x-twmerge="{
      'p-6 pt-0  break-words h-full ': true,
      '': true }">

                        <div>
                            <div x-data="$store.app.useDonutChart('visitorsChart1')" x-init="initChart()"
                                class="chart-container">
                                <div id="visitorsChart1"></div>
                            </div>
                        </div>

                    </div>

                </div>


                <div x-twmerge="{
      'rounded-md bg-card text-card-foreground shadow-sm flex flex-col justify-center': true,
      'h-full': true }">

                    <div x-twmerge="{
      'flex flex-col space-y-1.5 px-6 py-4 mb-6': true,
      'mb-0': true }">

                        <h2 class="card-title  text-default-900">Device Breakdown</h2>

                    </div>

                    <div x-twmerge="{
      'p-6 pt-0  break-words h-full ': true,
      '': true }">

                        <div>
                            <div>
                                <div x-data="$store.app.useDonutChart('deviceChart1',250,[2200, 800, 1500],['Desktop','Tablet','Mobile'])"
                                    x-init="initChart()" class="chart-container">
                                    <div id="deviceChart1"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>




            <div x-twmerge="{
      'rounded-md bg-card text-card-foreground shadow-sm flex flex-col justify-center': true,
      '!px-4 md:px-6': true }">

                <div x-twmerge="{
      'flex flex-col space-y-1.5 px-6 py-4 mb-6': true,
      'mb-0 !px-0': true }">


                    <div class="flex flex-wrap">
                        <h2 class="card-title flex-1">User By Country</h2>
                        <div class="flex-none">
                            <div class="relative">
                                <div x-data="{
         options: [
            {
                value: 'Jan 12',
                label: 'Jan 12',
            },
            {
                value: 'Jan 13',
                label: 'Jan 13',
            },
            {
                value: 'Jan 14',
                label: 'Jan 14',
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
    }" class="flex w-full  flex-col gap-1" x-on:keydown="highlightFirstMatchingOption($event.key)"
                                    x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false" x-init="$watch('isOpen || openedWithKeyboard', value => { 
    document.body.style.overflow = value ? 'hidden' : 'auto';
  })">
                                    <div class="relative">
                                        <button type="button" role="combobox"
                                            class="flex h-10 w-full min-w-[130px] items-center justify-between whitespace-nowrap rounded-lg border border-default-300 px-3 py-0 text-sm text-default-500 transition duration-300 placeholder:text-accent-foreground/50  [&>svg]:h-5 [&>svg]:w-5 [&>svg]:stroke-default-600"
                                            aria-haspopup="listbox" aria-controls="industriesList"
                                            x-on:click="isOpen = ! isOpen"
                                            x-on:keydown.down.prevent="openedWithKeyboard = true"
                                            x-on:keydown.enter.prevent="openedWithKeyboard = true"
                                            x-on:keydown.space.prevent="openedWithKeyboard = true"
                                            x-bind:aria-label="selectedOption ? selectedOption.value : 'Jan 12'"
                                            x-bind:aria-expanded="isOpen || openedWithKeyboard">
                                            <span class="text-sm font-normal"
                                                x-text="selectedOption ? selectedOption.value : 'Select Date'"></span>
                                            <span class="icon-[lucide--chevron-down] ms-1 h-4 w-4"></span>
                                        </button>
                                        <input id="industry" name="industry" type="text" x-ref="hiddenTextField" hidden
                                            class="hidden" />
                                        <ul x-cloak x-show="isOpen || openedWithKeyboard" id="industriesList"
                                            class="absolute left-0 top-11 z-20 flex max-h-44 w-full flex-col overflow-hidden overflow-y-auto rounded-md border border-default-300 bg-background p-1"
                                            role="listbox" aria-label="industries list"
                                            x-on:click.outside="isOpen = false, openedWithKeyboard = false"
                                            x-on:keydown.down.prevent="$focus.wrap().next()"
                                            x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition
                                            x-trap="openedWithKeyboard">
                                            <template x-for="(item, index) in options" x-bind:key="item.value">
                                                <li class="combobox-option inline-flex cursor-pointer justify-between gap-6  p-1 text-sm text-default-600 hover:bg-default-900/5 hover:text-default-900 rounded "
                                                    role="option" x-on:click="setSelectedOption(item)"
                                                    x-on:keydown.enter="setSelectedOption(item)"
                                                    x-bind:id="'option-' + index" tabindex="0">
                                                    <span x-bind:class="selectedOption == item ? 'font-bold' : null"
                                                        x-text="item.label"></span>
                                                    <span class="sr-only"
                                                        x-text="selectedOption == item ? 'selected' : null"></span>
                                                    <span class="icon-[heroicons--check] h-4 w-4"
                                                        x-show="selectedOption == item"></span>
                                                </li>
                                            </template>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div x-twmerge="{
      'p-6 pt-0  break-words h-full ': true,
      '!p-0': true }">

                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 lg:col-span-8">
                                <div class="w-full h-full">
                                    <div x-data="$store.app.useVectorMap('vMap')" x-init="initMap()"
                                        class="vMapContainer">
                                        <div id="vMap" style="width: 100%; height: 350px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <!-- Nunjucks Template -->

                                <div
                                    x-data='{"topCountries": [{"name":"United State","image":"./assets/images/country/usa.png","user":32900},{"name":"France","image":"./assets/images/country/france.png","user":30456},{"name":"India","image":"./assets/images/country/india.png","user":29703},{"name":"Spain","image":"./assets/images/country/spain.png","user":27533},{"name":"Bangladesh","image":"./assets/images/country/bangladesh.png","user":27523},{"name":"Brazil","image":"./assets/images/country/brazil.png","user":23289}] }'>
                                    <div class="flex justify-between items-center border-b pb-2">
                                        <div class="text-base font-semibold text-default-900">
                                            Top Countries
                                        </div>
                                        <a href="#" class="text-xs font-medium text-primary hover:underline">
                                            See All
                                        </a>
                                    </div>
                                    <div class="mt-5">
                                        <template x-for="(item, i) in topCountries" :key="i">
                                            <div class="flex justify-between items-center flex-wrap pb-3.5">
                                                <div class="flex items-center gap-3">
                                                    <div class="rounded-full overflow-hidden w-9 h-9 inline-block">
                                                        <img :src="item.image" :alt="item.name"
                                                            class="w-full h-full object-cover" />
                                                    </div>
                                                    <span class="inline-block text-default-600 text-sm font-medium"
                                                        x-text="item.name"></span>
                                                </div>
                                                <!-- User Count -->
                                                <div class="text-sm text-default-600 bg-default-100 dark:bg-default-50 py-1.5 px-1.5 rounded"
                                                    x-text="item.user"></div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>





            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-12 lg:col-span-4">

                    <div x-twmerge="{
      'rounded-md bg-card text-card-foreground shadow-sm flex flex-col justify-center': true,
      'p-0': true }">

                        <div x-twmerge="{
      'flex flex-col space-y-1.5 px-6 py-4 mb-6': true,
      'px-4 mb-0': true }">


                            <div class="flex">
                                <h2 class="card-title flex-1">Top 10 Referrals</h2>
                                <div class="flex-none">
                                    <div class="hidden justify-center lg:flex relative"
                                        x-data="{ isOpen: false, openedWithKeyboard: false }" x-init="$watch('isOpen || openedWithKeyboard', value => { 
    document.body.style.overflow = value ? 'hidden' : 'auto';
  })" @keydown.esc.window="isOpen = false; openedWithKeyboard = false">
                                        <div class="relative">
                                            <!-- Button -->
                                            <button @click="isOpen = !isOpen"
                                                :aria-expanded="isOpen || openedWithKeyboard"
                                                @keydown.down.prevent="openedWithKeyboard = true"
                                                @keydown.enter.prevent="openedWithKeyboard = true"
                                                @keydown.space.prevent="openedWithKeyboard = true" aria-haspopup="true"
                                                type="button"
                                                class="inline-flex size-6 items-center justify-center  rounded-md   text-default-800 border border-default-200 hover:bg-default-50">
                                                <span
                                                    class="icon-[heroicons--ellipsis-horizontal-16-solid] size-4"></span>
                                            </button>

                                            <!-- Dropdown -->
                                            <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition
                                                x-trap="openedWithKeyboard"
                                                @click.outside="isOpen = false; openedWithKeyboard = false"
                                                @keydown.down.prevent="$focus.wrap().next()"
                                                @keydown.up.prevent="$focus.wrap().previous()" class="absolute end-0 top-full z-[999] w-[180px] rounded-md border bg-popover p-1 text-start text-popover-foreground
                shadow-md">
                                                <button @click="isOpen = false"
                                                    class="text-default block w-full rounded-md px-4 py-1 text-start hover:bg-default-100">
                                                    View All
                                                </button>
                                                <button @click="isOpen = false"
                                                    class="text-default block w-full rounded-md px-4 py-1 text-start hover:bg-default-100">
                                                    Download
                                                </button>
                                                <button @click="isOpen = false"
                                                    class="text-default block w-full rounded-md px-4 py-1 text-start hover:bg-default-100">
                                                    Refresh
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div x-twmerge="{
      'p-6 pt-0  break-words h-full ': true,
      'p-0': true }">



                            <div
                                x-data='{"socials": [{"id":1,"name":"facebook","link":"www.facebook.com","total":"4963","image":"./assets/images/social/facebook.png"},{"id":2,"name":"Instagram","link":"www.instagram.com","total":"2963","image":"./assets/images/social/instagram.png"},{"id":3,"name":"Dribble","link":"www.dribble.com","total":"1963","image":"./assets/images/social/dribble.png"},{"id":4,"name":"LinkedIn","link":"www.linkedin.com","total":"963","image":"./assets/images/social/linkedin.png"},{"id":5,"name":"GitHub","link":"www.github.com","total":"663","image":"./assets/images/social/github.png"},{"id":6,"name":"Behance","link":"www.behance.com","total":"363","image":"./assets/images/social/behance.png"},{"id":7,"name":"Twitter","link":"www.twitter.com","total":"333","image":"./assets/images/social/twitter.png"},{"id":8,"name":"Pinterest","link":"www.pinterest.com","total":"293","image":"./assets/images/social/pinterest.png"},{"id":9,"name":"WhatsApp","link":"www.whatsapp.com","total":"213","image":"./assets/images/social/whatsapp.png"},{"id":10,"name":"Reddit","link":"www.reddit.com","total":"113","image":"./assets/images/social/reddit.png"}] }'>
                                <template x-for="(item, index) in socials" :key="index">
                                    <div class="flex flex-wrap gap-2 hover:bg-default-50 py-2.5 px-4">
                                        <div class="flex-1 flex items-center gap-3">
                                            <div class="w-8 h-8 md:h-10 md:w-10">
                                                <img :src="item.image" :alt="item.name"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-default-600" x-text="item.name">
                                                </div>
                                                <div class="text-xs text-default-500" x-text="item.link"></div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <div class="text-base font-medium text-default-600" x-text="item.total">
                                            </div>
                                            <div
                                                class="h-5 w-5 rounded-full bg-primary bg-opacity-10 justify-center items-center hidden md:flex">
                                                <span class="icon-[heroicons--eye] w-2.5 h-2.5 text-primary"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-span-12 lg:col-span-8">

                    <div x-twmerge="{
      'rounded-md bg-card text-card-foreground shadow-sm flex flex-col justify-center': true,
      'p-0': true }">

                        <div x-twmerge="{
      'flex flex-col space-y-1.5 px-6 py-4 mb-6': true,
      'px-4 mb-0': true }">

                            <h2 class="card-title  text-default-900">Top Page/Post</h2>

                        </div>

                        <div x-twmerge="{
      'p-6 pt-0  break-words h-full ': true,
      'p-0 pb-5': true }">



                            <div x-data="{
    posts: [
      { id: '01', page: 'www.facebook.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '9,636', link: '/' },
      { id: '02', page: 'www.linkedin.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '7,636', link: '/' },
      { id: '03', page: 'www.twitter.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '04', page: 'www.twitter.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '05', page: 'www.pinterest.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '06', page: 'www.twitter.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '07', page: 'www.youtube.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '08', page: 'www.linkedin.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '09', page: 'www.twitter.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '10', page: 'www.github.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '11', page: 'www.facebook.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '9,636', link: '/' },
      { id: '12', page: 'www.linkedin.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '7,636', link: '/' },
      { id: '13', page: 'www.twitter.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '14', page: 'www.twitter.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '15', page: 'www.pinterest.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '16', page: 'www.twitter.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '17', page: 'www.youtube.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '18', page: 'www.linkedin.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '19', page: 'www.twitter.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '20', page: 'www.github.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '21', page: 'www.github.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '22', page: 'www.github.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
      { id: '23', page: 'www.github.com', post: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', count: '5,636', link: '/' },
    ],
    pageSize: 10,
    currentPage: 1,
    totalPages() {
        return Math.ceil(this.posts.length / this.pageSize);
    },
    visiblePages() {
        const total = this.totalPages();
        const left = Math.max(1, this.currentPage - 2); 
        const right = Math.min(total, this.currentPage + 2); 
        
        let pages = [];
        for (let i = left; i <= right; i++) {
            pages.push(i);
        }
        return pages;
    },
    paginatedPosts() {
        const start = (this.currentPage - 1) * this.pageSize;
        return this.posts.slice(start, start + this.pageSize);
    },
    changePage(newPage) {
        if (newPage >= 1 && newPage <= this.totalPages()) {
            this.currentPage = newPage;
        }
    },
    }">
                                <div class="w-full overflow-x-auto custom-scrollbar">
                                    <table class="min-w-full table-auto text-sm">
                                        <thead class="border-b bg-default-300">
                                            <tr>
                                                <th
                                                    class="px-4 text-start  align-middle capitalize  font-semibold text-default-600  h-12 ">
                                                    Page</th>
                                                <th
                                                    class="px-4 text-start  align-middle capitalize  font-semibold text-default-600  h-12 ">
                                                    Post</th>
                                                <th
                                                    class="px-4 text-start  align-middle capitalize  font-semibold text-default-600  h-12 ">
                                                    Count</th>
                                                <th
                                                    class="px-4  align-middle capitalize  font-semibold text-default-600  h-12 text-end last:pe-7">
                                                    Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <template x-for="post in  paginatedPosts()" :key="post.id">
                                                <tr
                                                    class="border-b border-default-300 transition-colors  hover:bg-default-50">
                                                    <td class="p-4 py-3.5 align-middle text-start font-normal  text-default-700 border-b border-default-100 dark:border-default-200 whitespace-nowrap "
                                                        x-text="post.id +' '+ post.page"></td>
                                                    <td
                                                        class="p-4 py-3.5 align-middle text-start font-normal  text-default-700 border-b border-default-100 dark:border-default-200">
                                                        <p class="truncate max-w-[200px]"> <span
                                                                x-text="post.post"></span></p>
                                                    </td>
                                                    <td class="p-4 py-3.5 align-middle text-start font-normal  text-default-700 border-b border-default-100 dark:border-default-200"
                                                        x-text="post.count"></td>
                                                    <td
                                                        class="p-4 py-3.5 align-middle text-end font-normal  text-default-700 border-b border-default-100 dark:border-default-200  pe-6">
                                                        <a :href="post.link"
                                                            class="text-primary hover:underline">Details</a>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                    <!-- Pagination Controls -->
                                    <div class="flex items-center justify-center gap-2 mt-4">
                                        <button @click="changePage(currentPage - 1)" :disabled="currentPage === 1"
                                            class="inline-flex items-center justify-center rounded-md text-sm font-semibold  whitespace-nowrap disabled:pointer-events-none  h-7 w-7 bg-default-100 text-default-600  hover:bg-primary hover:text-primary-foreground">
                                            <span class="icon-[heroicons--chevron-left-20-solid] size-5"></span>
                                        </button>

                                        <!-- Page number buttons -->
                                        <div class="flex gap-2">
                                            <template x-for="page in visiblePages()" :key="page">
                                                <button @click="changePage(page)"
                                                    :class="{ 'bg-primary text-primary-foreground': currentPage === page, 'bg-default-100 text-default-600': currentPage !== page }"
                                                    class="inline-flex items-center justify-center rounded-md text-sm font-semibold  whitespace-nowrap   h-7 w-7">
                                                    <span x-text="page"></span>
                                                </button>
                                            </template>
                                        </div>

                                        <button @click="changePage(currentPage + 1)"
                                            :disabled="currentPage === totalPages()"
                                            class="inline-flex items-center justify-center rounded-md text-sm font-semibold  whitespace-nowrap disabled:pointer-events-none  h-7 w-7 bg-default-100 text-default-600 hover:bg-primary hover:text-primary-foreground disabled:bg-default-200">
                                            <span class="icon-[heroicons--chevron-right-20-solid] size-5"></span>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--  END: Slot -->
        </div>
</main>

<?php
$content = ob_get_clean();

require __DIR__ . '/base_enca.php';