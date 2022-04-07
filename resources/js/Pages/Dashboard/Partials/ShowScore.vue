<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.partials.showStatistics.score') }}
	    </template>

	    <template #description>
	    	{{ rating.statistics.score }}
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