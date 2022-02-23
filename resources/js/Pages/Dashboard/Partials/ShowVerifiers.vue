<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.dashboard.partials.showVerifiers.trigger') }}
	    </template>

	    <template #content>
            <ul role="list" class="divide-y divide-gray-200">
				<template v-for="(verifier, i) in rating.verifiers">
				<!-- Remove top/bottom padding when first/last child -->
				<li class="flex items-center py-4 first:pt-0 last:pb-0">
					<breeze-avatar :src="verifier.profile_photo_path" :width="'8'"/>
					<div class="ml-3 overflow-hidden w-full">
						<p class="text-sm font-medium text-gray-900">{{ verifier.name }}</p>
						<p class="text-sm text-gray-500 truncate">{{ verifier.email }}</p>
						<ul role="list" class="">
							<li v-for="target in verifier.parameter_targets">
								{{ target.name }}
							</li>
						</ul>
					</div>
				</li>
				</template>
			</ul>
	    </template>
	</BreezeAccordion>
</template>

<script>
	import BreezeAvatar from '@/Components/Avatar.vue'
	import BreezeAccordion from '@/Components/Accordion.vue'

    export default {
    	components: {
    		BreezeAvatar,
    		BreezeAccordion
    	},

    	props: ['rating']
    }
</script>