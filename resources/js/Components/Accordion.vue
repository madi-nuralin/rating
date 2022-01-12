<template>
	<div class="relative">
		<button class="inline-flex w-full items-center justify-between py-2 font-semibold text-xs text-gray-700 uppercase tracking-widest hover:text-gray-500 focus:outline-none active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" @click="collapse = ! collapse; $emit('collapsed', collapse)">
			<h3 class="text-gray-900 text-left">
		        <slot name="trigger"></slot>
		    </h3>

		    <button class="rounded-full inline-flex items-center justify-center border border-gray-300 rounded-md font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" :class="{'transform rotate-180 transition duration-500 ease-in-out': collapse}">
		    	<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" >
                    <path d="M6 9l6 6 6-6"/>
                </svg>
		    </button>
		</button>

		<div class="mt-1" :class="{'hidden': !collapse}">
	    	<slot name="content"></slot>
	    </div>
	</div>
</template>

<script>

export default {
	emits: ['collapse'],

	props: {
		collapse: {
			default: true
		}
	}
}
</script>