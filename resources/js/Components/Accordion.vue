<template>
	<div class="relative">

		<button class="inline-flex w-full items-center justify-between py-2 font-semibold text-xs text-gray-700 uppercase tracking-widest hover:text-gray-500 focus:outline-none active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" @click="collapse = ! collapse; $emit('collapsed', collapse)" :class="[triggerClass]">
			<h3 class="text-gray-900 text-left dark:text-gray-200">
		        <slot name="trigger"></slot>
		    </h3>

		     <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" :class="{'transform rotate-180 transition duration-500 ease-in-out': collapse}"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>

		<div class="mt-1 text-gray-600 dark:text-gray-500" :class="{'hidden': !collapse}">
	    	<slot name="content"></slot>
	    </div>
	</div>
</template>

<script>
import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'

export default {
	components: {
		BreezeButtonSecondary
	},

	emits: ['collapse'],

	props: {
		collapse: {
			default: true
		},
		triggerClass: {
			type: String
		}
	}
}
</script>