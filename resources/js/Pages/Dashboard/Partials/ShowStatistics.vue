<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.dashboard.partials.showStatistics.trigger') }}
	    </template>

	    <template #content>
	    	<div class="grid gap-2 grid-cols-2 text-sm">
	    		<div>
		    		{{ $t('pages.dashboard.partials.showStatistics.total') }}
		    	</div>
		    	<div>
		    		{{ rating.statistics.total }}
		    	</div>
		    	<div>
		    		{{ $t('pages.dashboard.partials.showStatistics.score') }}
		    	</div>
		    	<div>
		    		{{ parseFloat(rating.statistics.score).toFixed(2) }}
		    	</div>
		    </div>
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