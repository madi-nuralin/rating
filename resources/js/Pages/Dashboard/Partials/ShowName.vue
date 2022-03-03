<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.dashboard.partials.showName.trigger') }}
	    </template>

	    <template #content>
	    	<p class="text-sm">{{rating.name}}</p>
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