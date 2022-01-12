<template>
	<BreezeAccordion>
		<template #trigger>
	        Название
	    </template>

	    <template #content>
	    	<p class="text-gray-600 text-sm">{{rating.name}}</p>
	    </template>
	</BreezeAccordion>
</template>

<script>
	import BreezeAccordion from '@/Components/Accordion.vue'

    export default {
    	components: {
    		BreezeAccordion
    	},

    	props: ['rating']
    }
</script>