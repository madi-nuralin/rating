<template>
	<BreezeAccordion>
		<template #trigger>
	        Описание
	    </template>

	    <template #content>
	    	{{rating.description}}
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