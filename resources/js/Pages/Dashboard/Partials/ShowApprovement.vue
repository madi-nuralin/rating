<template>
	<Show>
		<template #title>
			{{ $t('pages.dashboard.partials.showApprovement.trigger') }}
		</template>

		<template #description>
			{{ $t(`pages.dashboard.partials.showApprovement.status[${rating.is_approved ? 1:0}]`) }}
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