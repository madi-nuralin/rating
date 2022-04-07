<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.submission.partials.showVerifications.trigger') }}
	    </template>

	    <template #description>
	    	<ul role="list" class="divide-y divide-gray-200" v-if="Object.keys(submission.verifications).length > 0">
				<template v-for="(verification, i) in submission.verifications">
				<!-- Remove top/bottom padding when first/last child -->
					<li class="flex items-center py-4 first:pt-0 last:pb-0">
						<div class="flex-none">
							<breeze-avatar :src="verification.verifier.user.profile_photo_path" :width="'8'"/>
						</div>
						<div class="ml-3 overflow-hidden w-full">
							<p class="text-sm font-medium text-gray-900 dark:text-gray-100">
								{{ verification.verifier.user.name }}
							</p>
							<p class="text-sm truncate">
								{{ verification.verifier.user.email }}
							</p>
						</div>
						<div class="flex-none">
							<button type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 dark:text-gray-400 dark:hover:text-gray-300" @click="open = true; activeVerification=verification">
								<svg xmlns="http://www.w3.org/2000/svg"
									class="w-5 h-5"
									viewBox="0 0 24 24"
									fill="none"
									stroke="currentColor"
									stroke-width="2"
									stroke-linecap="round"
									stroke-linejoin="round">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="12" y1="16" x2="12" y2="12"></line>
									<line x1="12" y1="8" x2="12.01" y2="8"></line>
								</svg>
							</button>
						</div>
					</li>
				</template>
			</ul>

			<div v-else>
				{{ $t('pages.dashboard.partials.empty') }}
			</div>

			<breeze-modal-dialog :show="open" @close="open = false">
				<template #title>
					Статус проверки
				</template>

				<template #content>
					<div class="flex items-center">
						<div class="flex-none">
							<breeze-avatar :src="activeVerification.verifier.user.profile_photo_path" :width="'8'"/>
						</div>
						<div class="ml-3 overflow-hidden w-full">
							<p class="text-sm font-medium text-gray-900 dark:text-gray-100">
								{{ activeVerification.verifier.user.name }}
							</p>
							<p class="text-sm truncate">
								{{ activeVerification.verifier.user.email }}
							</p>
						</div>

						<div class="flex-none">
			    			<breeze-badge :color="activeVerification.verification_status.color">
								{{ activeVerification.verification_status.name }}
							</breeze-badge>
						</div>
					</div>

					<div class="mt-5">
						<breeze-label for="message" :value="$t('pages.dashboard.verification.update.actions.modal.content.message')"/>
						<breeze-textarea id="message" class="w-full mt-1" :value="activeVerification.message" :disabled="true"/>
		    		</div>
				</template>

				<template #footer>
					<breeze-button-secondary type="button" @click="open = false">
	                    {{ $t('components.select.closeButton') }}
	                </breeze-button-secondary>
				</template>
			</breeze-modal-dialog>

	    </template>
	</Show>
</template>

<script>
	import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
	import BreezeModalDialog from '@/Components/ModalDialog.vue'
	import BreezeLabel from '@/Components/Label.vue'
	import BreezeTextarea from '@/Components/Textarea.vue'
	import BreezeAvatar from '@/Components/Avatar.vue'
	import BreezeBadge from '@/Components/Badge.vue'
	import Show from '../../Partials/Show.vue'

    export default {
    	components: {
    		BreezeButtonSecondary,
    		BreezeModalDialog,
    		BreezeLabel,
    		BreezeTextarea,
    		BreezeAvatar,
    		BreezeBadge,
    		Show
    	},

    	props: ['submission'],

    	data() {
    		return {
    			activeVerification: null,
    			open: false
    		}
    	}
    }
</script>