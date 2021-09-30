<template>
    <div class="relative">
        <div @click="open = ! disabled ? ! open : false" class="relative">

            <input :id="id" type="text" :value="displayValue" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full cursor-pointer pr-9 disabled:opacity-50" readonly="readonly" :disabled="disabled" />

            <svg
                class="h-4 w-4 absolute top-1/2 transform -translate-y-1/2 right-3"
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

                <div class="rounded-md ring-1 ring-black ring-opacity-5 cursor-pointer max-h-60 overflow-auto" :class="contentClasses">
                    <div v-for="(option, i) in options" :key="i" class="flex items-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" @click="onClick(option.value)" :class="{ 'opacity-50': ! isClicked(option.value), 'border-b': i != Object.keys(options).length - 1 }">

                        <div class="flex-grow">
                            <p class="text-sm">{{ option.name }}</p>
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
                            :class="isClicked(option.value) ? 'text-green-400':'text-gray-400'">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import { onMounted, onUnmounted, ref } from 'vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'

export default {

    emits: ['input'],

    components: {
        BreezeCheckbox,        
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
    },

    methods:  {
        onClick(value) {
            if (this.multiple) {
                if (this.modelValue && this.modelValue.includes(value)) {
                    for (var i = 0; i < this.modelValue.length; i++) {
                        if (this.modelValue[i] == value) {
                            this.modelValue.splice(i, 1);
                        }
                    }
                } else {
                    if (!this.modelValue)
                        this.modelValue = Array();
                    this.modelValue.push(value);
                }

                this.displayValue = "";
                for (var i = 0; i < this.options.length; i++) {
                    if (this.modelValue.includes(this.options[i].value)) {
                        this.displayValue += (this.options[i].name + "; ");
                    }
                }
            } else {
                this.modelValue = value;

                for (var i = 0; i < this.options.length; i++) {
                    if (this.options[i].value == value) {
                        this.displayValue = this.options[i].name;
                        break;
                    }
                }
            }

            this.$emit('input', this.modelValue);
        },
        isClicked(value) {
            return this.multiple
                ? this.modelValue && this.modelValue.includes(value)
                : this.modelValue && this.modelValue == value;
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
