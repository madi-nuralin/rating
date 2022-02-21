<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.dashboard.verification.partials.showStatus.trigger') }}
	    </template>

	    <template #content>
			<breeze-badge :color="verification.verification_status.color">
				{{ verification.verification_status.name }}
			</breeze-badge>
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