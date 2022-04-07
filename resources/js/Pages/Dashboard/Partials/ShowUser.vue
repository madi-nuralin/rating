<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.partials.showUser.trigger') }}
	    </template>

	    <template #description>
    		<div class="flex items-center pt-4 first:pt-0 last:pb-0">
    			<div class="flex-none">
					<breeze-avatar :src="rating.user.profile_photo_path" :width="'8'"/>
				</div>
				<div class="ml-3 overflow-hidden w-full">
					<p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ rating.user.name }}</p>
					<p class="text-sm text-gray-500 truncate">{{ rating.user.email }}</p>
				</div>
			</div>
	    </template>
	</Show>
</template>

<script>
	import BreezeAvatar from '@/Components/Avatar.vue'
	import Show from './Show.vue'

    export default {
    	components: {
    		BreezeAvatar,
    		Show,
    	},

    	props: ['rating']
    }
</script>