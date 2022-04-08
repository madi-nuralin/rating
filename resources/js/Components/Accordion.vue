<template>
    <div class="relative z-0 mt-1 border border-gray-300 shadow-sm rounded-lg cursor-pointer dark:border-gray-600">
        <div v-for="(item, i) in items">
            <button 
            type="button"
            class="relative px-4 py-3 inline-flex justify-between items-center w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
            :class="{
                'border-t border-gray-300 rounded-t-none dark:border-gray-600': i > 0,
                'rounded-b-none': i != Object.keys(items).length - 1 || collapse[i],
                'border-b border-gray-300 dark:border-gray-600':  collapse[i]
            }"
            @click="collapse[i] = ! collapse[i];">

                <h3 class="text-gray-900 text-left dark:text-gray-200">
                    <slot name="trigger" :item="item"></slot>
                </h3>

                 <svg class="flex-none ml-2 -mr-0.5 h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    :class="{'transform rotate-180': collapse[i]}">
                    <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd">
                    </path>
                 </svg>
            </button>

        	<div class="px-4 py-3" v-if="collapse[i]">
                <slot name="content" :item="item"></slot>  
            </div>
        </div>
    </div>
</template>

<script>

	export default {
		components: {
            //
        },

        data() {
            return {
                collapse: this.items ? this.items.map(function(item) {
                    return true;
                }) : null
            };
        },

        props: {
            items: {
                type: Array,
                required: true
            }
        }
	}
</script>