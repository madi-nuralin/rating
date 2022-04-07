<template>
	<Show>
		<template #title>
			{{ $t('pages.dashboard.partials.showName.trigger') }}
		</template>

		<template #description>
			{{ rating.name }}
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