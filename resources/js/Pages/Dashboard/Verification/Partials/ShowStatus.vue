<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.dashboard.verification.partials.showStatus.trigger') }}
	    </template>

	    <template #content>
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
	</BreezeAccordion>
</template>

<script>
	import BreezeAccordion from '@/Components/Accordion.vue'
	import BreezeBadge from '@/Components/Badge.vue'

    export default {
    	components: {
    		BreezeAccordion,
    		BreezeBadge
    	},

    	props: ['verification']
    }
</script>