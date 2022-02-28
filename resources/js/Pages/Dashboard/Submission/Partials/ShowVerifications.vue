<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.dashboard.submission.partials.showVerifications.trigger') }}
	    </template>

	    <template #content>
	    	<ul role="list" class="divide-y divide-gray-200">
				<template v-for="(verification, i) in submission.verifications">
				<!-- Remove top/bottom padding when first/last child -->
				<li class="space-y-2 py-4 first:pt-0 last:pb-0">
					<div class="flex items-center">
						<breeze-avatar :src="verification.verifier.user.profile_photo_path" :width="'8'"/>
						<div class="ml-3 overflow-hidden w-full">
							<p class="text-sm font-medium text-gray-900">{{verification.verifier.user.name}}</p>
							<p class="text-sm text-gray-500 truncate">{{verification.verifier.user.email}}</p>
						</div>
					</div>
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
				</li>
				</template>
			</ul>
	    </template>
	</BreezeAccordion>
</template>

<script>
	import BreezeAccordion from '@/Components/Accordion.vue'
	import BreezeAvatar from '@/Components/Avatar.vue'
	import BreezeBadge from '@/Components/Badge.vue'

    export default {
    	components: {
    		BreezeAccordion,
    		BreezeAvatar,
    		BreezeBadge
    	},

    	props: ['submission']
    }
</script>