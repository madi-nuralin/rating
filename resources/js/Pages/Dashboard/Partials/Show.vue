<template>
	<div>
		<button class="inline-flex w-full items-center justify-between py-2 font-semibold text-xs text-gray-700 uppercase tracking-widest hover:text-gray-500 focus:outline-none active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" @click="open = ! open">
			<h3 class="text-gray-900">
		        <slot name="title"></slot>
		    </h3>

			    <button class="rounded-full inline-flex items-center justify-center border border-gray-300 rounded-md font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" :class="{'transform rotate-180 transition duration-500 ease-in-out': open}">
			    	<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" >
	                    <path d="M6 9l6 6 6-6"/>
	                </svg>
			    </button>
		</button>

	    <p class="mt-1 text-sm text-gray-600" :class="{'hidden': !open}">
	    	<slot name="description"></slot>
	    </p>

	    <div class="mt-1">
            <slot name="aside"></slot>
        </div>
	</div>
</template>

<script>
	export default {
		props: {
			open: {
				default: true
			}
		}
	}
</script>