<template>
    <div class="relative" v-if="displayType == 'dropdown'">
        <div @click="open = ! disabled ? ! open : false" class="relative">

            <input :id="id" type="text" :value="displayValue" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full cursor-pointer pr-9 disabled:opacity-50 dark:bg-gray-800 dark:border-gray-500 dark:text-white" readonly="readonly" :disabled="disabled" :placeholder="placeholder" />

            <svg
                class="h-4 w-4 absolute top-1/2 transform -translate-y-1/2 right-3 dark:text-gray-100"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>

        <!-- Full Screen Dropdown Overlay -->
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false"></div>

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95">
            <div v-show="open"
                    class="absolute z-50 mt-0 rounded-md shadow-lg"
                    :class="[widthClass, alignmentClasses]"
                    style="display: none;"
                    @click="open = multiple ? true : false">

                <div class="rounded-md ring-1 ring-black ring-opacity-5 cursor-pointer max-h-60 overflow-auto dark:bg-gray-800" :class="contentClasses">
                    <div v-for="(option, i) in options" :key="i" class="flex items-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out dark:hover:bg-gray-700" @click="onSelect(option.value)" :class="{ 'opacity-50': ! isSelected(option.value), 'border-b': i != Object.keys(options).length - 1 }">

                        <div class="flex-grow">
                            <p class="text-sm dark:text-gray-100">{{ option.name }}</p>
                            <p class="text-xs text-gray-500">{{ option.description }}</p>
                        </div>

                        <svg 
                            class="flex-none ml-2 h-5 w-5" 
                            fill="none" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24" 
                            :class="isSelected(option.value) ? 'text-green-400':'text-gray-400'">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </transition>
    </div>

    <div v-else-if="displayType == 'modal'">
        <div @click="open = ! disabled ? ! open : false" class="relative">

            <input :id="id" type="text" :value="displayValue" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full cursor-pointer pr-9 disabled:opacity-50 dark:bg-gray-800 dark:border-gray-500 dark:text-white" readonly="readonly" :disabled="disabled" :placeholder="placeholder"/>

            <svg
                class="h-4 w-4 absolute top-1/2 transform -translate-y-1/2 right-3 dark:text-gray-100"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>

        <BreezeModalDialog :show="open" :content-class="'max-h-96 -mx-5'" @close="closeModal">
            <template #title>
                {{ multiple ? $t('components.select.multipleSelectTitle') : $t('components.select.selectTitle') }}
            </template>

            <template #content>
                <div class="relative z-0 mt-1 border border-gray-200 cursor-pointer dark:border-gray-600" >
                    <button 
                        type="button"
                        class="relative px-4 py-3 inline-flex w-full focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                        :class="{
                            'border-t border-gray-200 dark:border-gray-600': i > 0,
                        }"
                        @click="onSelect(option.value)"
                        v-for="(option, i) in options"
                        :key="option.value">

                        <div :class="{'opacity-50': option && !isSelected(option.value)}">
                            <!-- Name -->
                            <div class="flex items-center">
                                <div class="text-sm text-gray-600 text-left dark:border-gray-600 dark:text-gray-100"
                                    :class="{'font-semibold': isSelected(option.value)}">
                                    {{ option.name }}
                                </div>

                                <svg v-if="isSelected(option.value)"
                                    class="ml-2 h-5 w-5 text-green-400"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>

                            <!-- Description -->
                            <div class="mt-2 text-xs text-gray-600 text-left dark:text-gray-400">
                                {{ option.description }}
                            </div>
                        </div>
                    </button>
                </div>

            </template>

            <template #footer>
                <BreezeButtonSecondary type="button" @click="open = false">
                    {{ $t('components.select.closeButton') }}
                </BreezeButtonSecondary>
            </template>
        </BreezeModalDialog>
    </div>


    <div class="relative z-0 mt-1 border border-gray-300 shadow-sm rounded-lg cursor-pointer dark:border-gray-600" v-else-if="displayType == 'expanded'">
        <button 
            type="button"
            class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
            :class="{
                'border-t border-gray-300 rounded-t-none dark:border-gray-600': i > 0,
                'rounded-b-none': i != Object.keys(options).length - 1
            }"
            @click="onSelect(option.value)"
            v-for="(option, i) in options"
            :key="option.value">

            <div :class="{'opacity-50': option && !isSelected(option.value)}">
                <div class="flex items-center">
                    <div class="text-sm text-gray-600 text-left dark:border-gray-600 dark:text-gray-100"
                        :class="{'font-semibold': isSelected(option.value)}">
                        {{ option.name }}
                    </div>

                    <svg v-if="isSelected(option.value)"
                        class="ml-2 h-5 w-5 text-green-400"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <!-- Description -->
                <div class="mt-2 text-xs text-gray-600 text-left dark:text-gray-400">
                    {{ option.description }}
                </div>
            </div>
        </button>
    </div>
</template>

<script>
import { onMounted, onUnmounted, ref } from 'vue'
import BreezeModalDialog from '@/Components/ModalDialog'
import BreezeButtonSecondary from '@/Components/ButtonSecondary'

export default {

    emits: ['input'],

    components: {
        BreezeModalDialog,
        BreezeButtonSecondary
    },

    props: {
        id: {
            //
        },
        align: {
            default: 'top'
        },
        width: {
            default: 'full'
        },
        contentClasses: {
            default: () => ['py-1', 'bg-white']
        },
        inputType: {
            type: String,
            required: false,
            default: 'hidden',
        },
        multiple: {
            type: Boolean,
            required: false,
            default: true,
        },
        options: {
            type: [Array, Object, Function],
            required: false,
            default: () => ([])
        },
        value: {
            //type: [Array, Object, Function, String, Boolean, Number],
            required: false,
            default: () => ([])
        },
        disabled: {
            type: Boolean,
            required: false,
            default: false
        },
        type: {
            type: String,
            default: 'modal'
            // ['dropdown', 'modal', 'expanded']
        },
        placeholder: {
            type: String,
            default: ''
        }
    },

    setup() {
        let open = ref(false)

        const closeOnEscape = (e) => {
            if (open.value && e.keyCode === 27) {
                open.value = false
            }
        }

        onMounted(() => document.addEventListener('keydown', closeOnEscape))
        onUnmounted(() => document.removeEventListener('keydown', closeOnEscape))

        return {
            open,
        }
    },

    data () {
        return {
            displayValue: ! this.options ? '' : 
                this.multiple
                ?
                    this.options.map(
                        function (option) {
                            return !this.modelValue ? '': this.modelValue.includes(option.value) 
                                ? option.name + '; ' : '';
                        }, {modelValue: this.value}
                    ).join('') 
                :
                    this.options.map(
                        function (option) {
                            return this.modelValue == option.value
                                ? option.name + ' ' : '';
                        }, {modelValue: this.value}
                    ).join(''),
            modelValue: this.value,
        };
    },

    computed: {

        widthClass() {
            return {
                '48': 'w-48',
                '96': 'w-96',
                'auto': 'w-auto',
                'full': 'w-full',
            }[this.width.toString()]
        },

        alignmentClasses() {
            if (this.align === 'left') {
                return 'origin-top-left left-0'
            } else if (this.align === 'right') {
                return 'origin-top-right right-0'
            } else {
                return 'origin-top'
            }
        },

        displayType() {
            //Breakpoint prefix   Minimum width   CSS
            //sm  640px   @media (min-width: 640px) { ... }
            //md  768px   @media (min-width: 768px) { ... }
            //lg  1024px  @media (min-width: 1024px) { ... }
            //xl  1280px  @media (min-width: 1280px) { ... }
            //2xl 1536px  @media (min-width: 1536px) { ... }

            if (window.innerWidth > 640) {
                return this.type
            } else {
                if (this.type != 'expanded') {
                    return 'modal'
                } else {
                    return 'expanded'
                }
            }
        }
    },

    methods:  {
        closeModal() {
            this.open = false;
        },
        onSelect(newValue) {
            if (this.multiple) {
                var modelValue = this.value ? this.value.slice() : null;
                if (modelValue && modelValue.includes(newValue)) {
                    for (var i = 0; i < modelValue.length; i++) {
                        if (modelValue[i] == newValue) {
                            modelValue.splice(i, 1);
                        }
                    }
                } else {
                    if (!modelValue)
                        modelValue = Array();
                    modelValue.push(newValue);
                }

                this.displayValue = "";
                for (var i = 0; i < this.options.length; i++) {
                    if (modelValue.includes(this.options[i].value)) {
                        this.displayValue += (this.options[i].name + "; ");
                    }
                }
                this.$emit('input', modelValue);
            } else {
                this.modelValue = newValue;

                for (var i = 0; i < this.options.length; i++) {
                    if (this.options[i].value == newValue) {
                        this.displayValue = this.options[i].name;
                        break;
                    }
                }
                this.$emit('input', this.modelValue);
            }
        },
        isSelected(newValue) {
            return this.multiple
                ? this.value && this.value.includes(newValue)
                : this.modelValue && this.modelValue == newValue;
        }
    },
};
</script>

<!--style>
    ::-webkit-scrollbar {
        width: 0;  /* Remove scrollbar space */
        background: transparent;  /* Optional: just make scrollbar invisible */
    }
</style-->
