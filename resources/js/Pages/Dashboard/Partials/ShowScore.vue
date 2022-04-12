<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.partials.showStatistics.score') }}
	    </template>

	    <template #description>
	    	{{ parseFloat(rating.statistics.score).toFixed(2) }}
	    </template>
	</Show>
</template>

<script>
	import Show from './Show.vue'

    export default {
    	components: {
    		Show
    	},

    	props: ['rating']
    }
</script>