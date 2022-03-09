<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.dashboard.partials.showUser.trigger') }}
	    </template>

	    <template #content>
    		<div class="flex items-center py-4 first:pt-0 last:pb-0">
				<breeze-avatar :src="rating.user.profile_photo_path" :width="'8'"/>
				<div class="ml-3 overflow-hidden w-full">
					<p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ rating.user.name }}</p>
					<p class="text-sm text-gray-500 truncate">{{ rating.user.email }}</p>
				</div>
			</div>
	    	<!--p class="text-gray-600 text-sm">{{rating.name}}</p-->
	    </template>
	</BreezeAccordion>
</template>

<script>
	import BreezeAccordion from '@/Components/Accordion.vue'
	import BreezeAvatar from '@/Components/Avatar.vue'

    export default {
    	components: {
    		BreezeAccordion,
    		BreezeAvatar
    	},

    	props: ['rating']
    }
</script>