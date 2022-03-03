<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.dashboard.partials.showDescription.trigger') }}
	    </template>

	    <template #content>
	    	<p class="text-sm">{{rating.description}}</p>
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