<template>
	<BreezeAccordion>
		<template #trigger>
	        Подтверждающие
	    </template>

	    <template #content>
	    	<!--BreezeAvatarGroup :space="'space-x-2'">
                <BreezeAvatar :src="verifier.user.profile_photo_path" v-for="(verifier, i) in rating.verifiers"/>
            </BreezeAvatarGroup-->
            <ul role="list" class="divide-y divide-gray-200">
				<template v-for="(verifier, i) in rating.verifiers">
				<!-- Remove top/bottom padding when first/last child -->
				<li class="flex py-4 first:pt-0 last:pb-0">
					<breeze-avatar :src="verifier.user.profile_photo_path" :width="'8'"/>
					<div class="ml-3 overflow-hidden">
						<p class="text-sm font-medium text-gray-900">{{verifier.user.name}}</p>
						<p class="text-sm text-gray-500 truncate">{{verifier.user.email}}</p>
					</div>
				</li>
				</template>
			</ul>
	    </template>
	</BreezeAccordion>
</template>

<script>
	import BreezeAvatarGroup from '@/Components/AvatarGroup.vue'
	import BreezeAvatar from '@/Components/Avatar.vue'
	import BreezeAccordion from '@/Components/Accordion.vue'

    export default {
    	components: {
    		BreezeAvatarGroup,
    		BreezeAvatar,
    		BreezeAccordion
    	},

    	props: ['rating']
    }
</script>