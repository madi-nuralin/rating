<template>
	<Show>
		<template #title>
			{{ $t('pages.dashboard.partials.showApprovement.trigger') }}
		</template>

		<template #description>
			<div class="flex justify-between">
				<div>
					<breeze-badge :color="isApproved ? 'green' : 'yellow'">
						{{ $t(`pages.dashboard.partials.showApprovement.status[${isApproved ? 1 : 0}]`) }}
					</breeze-badge>
				</div>
				<div class="flex-none">
					<button type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 dark:text-gray-400 dark:hover:text-gray-300" @click="open = true;">
						<svg xmlns="http://www.w3.org/2000/svg"
							class="w-5 h-5"
							viewBox="0 0 24 24"
							fill="none"
							stroke="currentColor"
							stroke-width="1"
							stroke-linecap="round"
							stroke-linejoin="round">
							<circle cx="12" cy="12" r="10"></circle>
							<line x1="12" y1="16" x2="12" y2="12"></line>
							<line x1="12" y1="8" x2="12.01" y2="8"></line>
						</svg>
					</button>

					<breeze-modal-dialog :show="open" @close="open = false">
						<template #title>
							Информация утверждающего
						</template>

						<template #content>
							<div class="flex items-center">
								<div class="flex-none">
									<breeze-avatar :src="user.profile_photo_path" :width="'8'"/>
								</div>
								<div class="ml-3 overflow-hidden w-full">
									<p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ user.name }}</p>
									<p class="text-sm truncate">{{ user.email }}</p>
								</div>
							</div>

							<div class="mt-4 text-sm" v-if="Object.keys(user.employements).length > 0">
								<span class="text-sm text-slate-500 mb-3 dark:text-slate-400">Занимаемые должности</span>
								<ul role="list" class="list-disc list-inside">
									<li v-for="employement in user.employements">
										{{ `${employement.position.name}, ${employement.department.name}` }}
									</li>
								</ul>
							</div>
						</template>

						<template #footer>
							<breeze-button-secondary type="button" @click="open = false">
			                    {{ $t('components.select.closeButton') }}
			                </breeze-button-secondary>
						</template>
					</breeze-modal-dialog>
				</div>
			</div>
		</template>
	</Show>
</template>

<script>
	import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
	import BreezeBadge from '@/Components/Badge.vue'
	import BreezeModalDialog from '@/Components/ModalDialog.vue'
	import BreezeAvatar from '@/Components/Avatar.vue'
	import Show from './Show.vue'

    export default {
    	components: {
    		BreezeButtonSecondary,
    		BreezeBadge,
    		BreezeModalDialog,
    		BreezeAvatar,
    		Show
    	},

    	props: ['rating'],

    	data() {
    		return {
    			open: false
    		}
    	},

    	computed: {
    		user() {
    			return this.rating.approver.user
    		},

    		isApproved() {
    			return this.rating.is_approved;
    		},

    		color() {
    			return this.isApproved ? 'green' : 'yellow';
    		}
    	}
    }
</script>