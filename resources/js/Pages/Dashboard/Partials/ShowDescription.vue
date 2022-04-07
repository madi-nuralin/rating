<template>
	<Show>
		<template #title>
			{{ $t('pages.dashboard.partials.showDescription.trigger') }}
		</template>

		<template #description>
			{{ rating.description }}
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