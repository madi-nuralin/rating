<template>
	<div>
		<div v-for="(target, i) in rating.targets">
	        <BreezeAccordion>
	            <template #trigger>
	                {{ target.name }}
	            </template>

	            <template #content>

	                <ul class="list-roman list-inside" v-if="Object.keys(target.parameters).length > 0">
	                    <li v-for="parameter in target.parameters">
	                        <span>    
	                            {{ parameter.name }}
	                        </span>

                        	<div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer" v-if="Object.keys(parameter.submissions).length > 0">
			                    <Link
			                    	type="button"
			                    	class="relative px-4 py-3 inline-block w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
			                        :class="{
			                        	'border-t border-gray-200 rounded-t-none': i > 0,
			                        	'rounded-b-none': i != Object.keys(parameter.submissions).length - 1
			                        }"
			                        :href="getRoute(submission)"
			                        v-for="(submission, i) in parameter.submissions">

			                        <div>

			                            <div class="flex items-center">
			                                <div class="text-sm text-gray-600 text-left" v-if="type == 'verification'">
			                                    <span>{{ translate('form.verificationStatus') }}</span>
			                                    <span :class="`text-${submission.verification.status.color}-600`" v-if="submission.verification.status">
			                                    	{{ submission.verification.status.name }}
			                                    </span>
			                                </div>

			                                <!--svg
			                                    class="ml-2 h-5 w-5 text-green-400"
			                                    fill="none"
			                                    stroke-linecap="round"
			                                    stroke-linejoin="round"
			                                    stroke-width="2"
			                                    stroke="currentColor"
			                                    viewBox="0 0 24 24">
			                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
			                                </svg-->
			                            </div>

			                            <!-- Description -->
			                            <div class="mt-2 text-sm text-gray-600 text-left">
			                            	<div class="grid grid-cols-2">
			                            		<p>{{ translate('form.updatedAt') }}</p>
			                                    <p>{{ new Date(submission.updated_at) }}</p>
			                            		<p>{{ translate('form.scoreLabel') }}</p>
			                                    <p>{{ translate('form.score', {'score': parseFloat(submission.score).toFixed(2) }) }}
			                                    </p>
			                                    <template v-for="status in submission.verification_statuses">
			                                    	<p :class="`text-${status.color}-600`">
		                                                {{ status.name }}
		                                            </p>
		                                            <p class="space-x-2">
		                                                <span class="underline" v-for="verification in status.verifications" v-if="Object.keys(status.verifications).length > 0">
		                                                    {{ verification.verifier.user.name }}
		                                                </span>
		                                                <span v-else>0</span>
		                                            </p>
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

	        <hr class="my-6" />
	    </div>
	</div>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeList from '@/Components/ListScoped.vue'
    import BreezeBadge from '@/Components/Badge.vue'
    import BreezeAccordion from '@/Components/Accordion.vue'
    
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeList,
            BreezeBadge,
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
