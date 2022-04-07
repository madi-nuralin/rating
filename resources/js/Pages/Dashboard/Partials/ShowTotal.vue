<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.partials.showStatistics.total') }}
	    </template>

	    <template #description>
	    	{{ rating.statistics.total }}
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