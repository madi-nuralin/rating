<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.partials.showVerifiers.trigger') }}
	    </template>

	    <template #description>
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-600" v-if="Object.keys(rating.verifiers).length > 0">
				<template v-for="(verifier, i) in rating.verifiers">
					<!-- Remove top/bottom padding when first/last child -->
					<li class="flex items-center py-4 first:pt-0 last:pb-0">
						<div class="flex-none">
							<breeze-avatar :src="verifier.profile_photo_path" :width="'8'"/>
						</div>
						<div class="ml-3 overflow-hidden w-full">
							<p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ verifier.name }}</p>
							<p class="text-sm truncate">{{ verifier.email }}</p>
						</div>
						<div class="flex-none">
							<button type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 dark:text-gray-400 dark:hover:text-gray-300" @click="open = true; activeVerifier=verifier">
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
						</div>
					</li>
				</template>
			</ul>

			<div v-else>
				{{ $t('pages.dashboard.partials.empty') }}
			</div>

			<breeze-modal-dialog :show="open" @close="open = false">
				<template #title>
					Информация подтверждающего
				</template>
				<template #content>
					<div class="flex items-center">
						<div class="flex-none">
							<breeze-avatar :src="activeVerifier.profile_photo_path" :width="'8'"/>
						</div>
						<div class="ml-3 overflow-hidden w-full">
							<p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ activeVerifier.name }}</p>
							<p class="text-sm truncate">{{ activeVerifier.email }}</p>
						</div>
					</div>

					<div class="mt-4 text-sm" v-if="Object.keys(activeVerifier.employements).length > 0">
						<span class="text-sm text-slate-500 mb-3 dark:text-slate-400">Занимаемые должности</span>
						<ul role="list" class="list-disc list-inside">
							<li v-for="employement in activeVerifier.employements">
								{{ `${employement.position.name}, ${employement.department.name}` }}
							</li>
						</ul>
					</div>

					<div class="mt-4 text-sm" v-if="Object.keys(activeVerifier.parameter_targets).length > 0">
						<span class="text-sm text-slate-500 mb-3 dark:text-slate-400">Направление деятельности</span>
						<ul role="list" class="list-disc list-inside">
							<li v-for="target in activeVerifier.parameter_targets">
								{{ target.name }}
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
	    </template>
	</Show>
</template>

<script>
	import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
	import BreezeModalDialog from '@/Components/ModalDialog.vue'
	import BreezeAvatar from '@/Components/Avatar.vue'
	import Show from './Show.vue'

    export default {
    	components: {
    		BreezeButtonSecondary,
    		BreezeModalDialog,
    		BreezeAvatar,
    		Show
    	},

    	props: ['rating'],

    	data() {
    		return {
    			activeVerifier: null,
    			open: false
    		}
    	}
    }
</script>