<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.verification.partials.showStatus.trigger') }}
	    </template>

	    <template #description>
	    	<div class="flex justify-between items-center">
    			<div class="flex-none" @click="open = true;">
					Детали
				</div>

				<div class="flex-none">
					<button type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 dark:text-gray-400 dark:hover:text-gray-300" @click="open = true;">
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
			</div>

	    	<breeze-modal-dialog :show="open" @close="open = false">
				<template #title>
					Детали вашего ответа
				</template>

				<template #content>
					<div class="flex items-center">
						<div class="overflow-hidden w-full">
							{{ $t('pages.dashboard.verification.update.actions.modal.content.verification_status') }}
						</div>

						<div class="flex-none">
			    			<breeze-badge :color="verification.verification_status.color">
								{{ verification.verification_status.name }}
							</breeze-badge>
						</div>
					</div>

					<div class="mt-5">
						<breeze-label for="message" :value="$t('pages.dashboard.verification.update.actions.modal.content.message')"/>
						<breeze-textarea id="message" class="w-full mt-1" :value="verification.message" :disabled="true"/>
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
	import Show from '../../Partials/Show.vue'
	import BreezeBadge from '@/Components/Badge.vue'
	import BreezeModalDialog from '@/Components/ModalDialog.vue'
	import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
	import BreezeLabel from '@/Components/Label.vue'
	import BreezeTextarea from '@/Components/Textarea.vue'

    export default {
    	components: {
    		Show,
    		BreezeBadge,
    		BreezeModalDialog,
    		BreezeLabel,
    		BreezeTextarea,
    		BreezeButtonSecondary
    	},

    	props: ['verification'],

    	data() {
    		return {
    			open: false
    		};
    	}
    }
</script>