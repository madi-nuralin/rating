<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.verification.partials.showStatus.trigger') }}
	    </template>

	    <template #description>
	    	<div class="grid gap-2 grid-cols-2 text-sm text-gray-500">
	    		<p>{{ $t('pages.dashboard.verification.update.actions.modal.content.verification_status') }}</p>
	    		<p>
		    		<breeze-badge :color="verification.verification_status.color">
						{{ verification.verification_status.name }}
					</breeze-badge>
				</p>
				<p>{{ $t('pages.dashboard.verification.update.actions.modal.content.message') }}</p>
				<p>{{ verification.message }}</p>
	    	</div>
		</template>
	</Show>
</template>

<script>
	import Show from '../../Partials/Show.vue'
	import BreezeBadge from '@/Components/Badge.vue'

    export default {
    	components: {
    		Show,
    		BreezeBadge
    	},

    	props: ['verification']
    }
</script>