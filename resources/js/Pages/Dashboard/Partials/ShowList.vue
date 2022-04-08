<template>
	<BreezeAccordion :items="rating.targets">
		<template #trigger="{item}">
			{{ item.name }}
		</template>

		<template #content="{item}">
			<ul class="list-inside dark:text-gray-100 border-l border-r border-gray-300 dark:border-gray-600 -my-3"
				v-if="Object.keys(item.parameters).length > 0">
                <li v-for="(parameter, k) in item.parameters">
                	<div class="border-b border-gray-300 dark:border-gray-600" :class="{'border-t': k > 0}">
	                    <div class="ml-4">    
	                        {{ parameter.name }}
	                    </div>
	                </div>
                    <div class="relative z-0 _mx-4 _border-l _border-r border-gray-300 cursor-pointer dark:border-gray-700" v-if="Object.keys(parameter.submissions).length > 0">
	                    <Link
	                    	type="button"
	                    	class="relative px-4 py-2 inline-block w-full _rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
	                        :class="{
	                        	'border-t border-gray-300 rounded-t-none dark:border-gray-700': i > 0,
	                        	'rounded-b-none': i != Object.keys(parameter.submissions).length - 1
	                        }"
	                        :href="getRoute(submission)"
	                        v-for="(submission, i) in parameter.submissions">

	                        <div>
	                            <div class="flex items-center" v-if="type == 'verification'">
	                                <div class="text-sm text-gray-600 text-left dark:text-gray-100">
	                                    <span>{{ translate('form.verificationStatus') }}</span>
	                                    <span>	
	                                    	<breeze-badge :color="submission.verification.status.color">
                                                {{ submission.verification.status.name }}
                                            </breeze-badge>
                                        </span>
	                                </div>
	                            </div>

	                            <div class="text-sm text-gray-600 text-left dark:text-gray-100">
	                            	<div class="grid grid-cols-1">
	                            		<div>
	                            			<span>{{ translate('form.updatedAt') }}: </span>
	                                    	<span>{{ new Date(submission.updated_at) }}</span>
	                                	</div>
	                                	<div>
		                                	<span>{{ translate('form.scoreLabel') }}: </span>
		                                    <span>{{ translate('form.score', {'score': parseFloat(submission.score).toFixed(2) }) }}
		                                    </span>
		                                </div>
	                                    <template v-for="status in submission.verification_statuses">
	                                    	<div class="flex space-x-2" v-if="Object.keys(status.verifications).length > 0">
	                                            <p class="space-x-2">
	                                                <span class="underline" v-for="verification in status.verifications">
	                                                    {{ verification.verifier.user.name }}
	                                                </span>
	                                                <!--breeze-avatar :src="verification.verifier.user.profile_photo_path" :width="'4'" v-for="verification in status.verifications"/-->
	                                            </p>
	                                            <p>	
			                                    	<breeze-badge :color="status.color">
		                                                {{ status.name }}
		                                            </breeze-badge>
		                                        </p>
	                                        </div>
	                                    </template>
	                            	</div>
	                            </div>
	                        </div>
	                    </Link>
	                </div>
                </li>
            </ul>
		</template>
	</BreezeAccordion>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeList from '@/Components/List.vue'
    import BreezeBadge from '@/Components/Badge.vue'
    import BreezeAccordion from '@/Components/Accordion.vue'
    import BreezeAvatar from '@/Components/Avatar.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeList,
            BreezeBadge,
            BreezeAccordion,
            BreezeSectionBorder,
            BreezeAvatar,
            BreezeAccordion,
            Link,
        },

        props: {
        	rating: {
        		required: true
        	},
        	type: {
        		required: true
        	}
        },

        methods: {
        	getRoute(submission) {
        		if (this.type == 'submission') {
        			return route('submission.show', {'id': submission.id});
        		} else if (this.type == 'verification') {
        			if (submission.verification && submission.verification.id) {
        				return route('verification.show', {'id': submission.verification.id});
        			}
        		}

        		return null;
        	},

        	translate(path, ...args) {
        		return this.$t(`pages.dashboard.submission.list.${path}`, ...args);
        	}
        },
    }
</script>
