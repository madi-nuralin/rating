<template>
	<BreezeAccordion>
		<template #trigger>
	        Название
	    </template>

	    <template #content>
	    	{{rating.name}}
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