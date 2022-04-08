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
                    <div class="relative z-0 mx-4 border-l border-r border-gray-300 cursor-pointer dark:border-gray-700" v-if="Object.keys(parameter.submissions).length > 0">
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
	                                    <p>{{ new Date(submission.updated_at) }}</p>
	                                    <p>{{ translate('form.score', {'score': parseFloat(submission.score).toFixed(2) }) }}
	                                    </p>
	                                    <template v-for="status in submission.verification_statuses">
	                                    	<div class="flex space-x-2" v-if="Object.keys(status.verifications).length > 0">
	                                            <p class="space-x-2">
	                                                <span class="underline" v-for="verification in status.verifications">
	                                                    {{ verification.verifier.user.name }}
	                                                </span>
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

	<!--div>
		<div v-for="(target, i) in rating.targets">
	        <BreezeAccordion>
	            <template #trigger>
	                {{ target.name }}
	            </template>

	            <template #content>

	                <ul class="_list-roman list-inside space-y-4 dark:text-gray-100" v-if="Object.keys(target.parameters).length > 0">
	                    <li v-for="parameter in target.parameters">
	                        <span>    
	                            {{ parameter.name }}
	                        </span>

	                        <div class="relative z-0 mt-1 border border-gray-200 rounded cursor-pointer dark:border-gray-700" v-if="Object.keys(parameter.submissions).length > 0">
			                    <Link
			                    	type="button"
			                    	class="relative px-4 py-3 inline-block w-full rounded focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
			                        :class="{
			                        	'border-t border-gray-200 rounded-t-none dark:border-gray-700': i > 0,
			                        	'rounded-b-none': i != Object.keys(parameter.submissions).length - 1
			                        }"
			                        :href="getRoute(submission)"
			                        v-for="(submission, i) in parameter.submissions">
			                        <div class="grid gap-6 grid-cols-4 text-xs mt-1" >
			                        	<p>{{ new Date(submission.updated_at) }}</p>
			                        	<p>{{ translate('form.score', {'score': parseFloat(submission.score).toFixed(2) }) }}</p>
			                        	<p>Madi</p>
			                        	<p>
			                        		<div class="mt-3 ml-3 flex items-center font-semibold text-indigo-700"><div>Посмотреть ответ (45 баллов)</div><div class="ml-1 text-indigo-500"><svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></div></div>
			                        	</p>
		                        	</div>
			                    </Link>

			                </div>

                        	<div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer dark:border-gray-700" v-if="Object.keys(parameter.submissions).length > 0">
			                    <Link
			                    	type="button"
			                    	class="relative px-4 py-3 inline-block w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
			                        :class="{
			                        	'border-t border-gray-200 rounded-t-none dark:border-gray-700': i > 0,
			                        	'rounded-b-none': i != Object.keys(parameter.submissions).length - 1
			                        }"
			                        :href="getRoute(submission)"
			                        v-for="(submission, i) in parameter.submissions">

			                        <div>

			                            <div class="flex items-center">
			                                <div class="text-sm text-gray-600 text-left dark:text-gray-100" v-if="type == 'verification'">
			                                    <span>{{ translate('form.verificationStatus') }}</span>
			                                    <span>	
			                                    	<breeze-badge :color="submission.verification.status.color">
		                                                {{ submission.verification.status.name }}
		                                            </breeze-badge>
		                                        </span>
			                                </div>

			                            </div>

			                            <div class="mt-2 text-sm text-gray-600 text-left dark:text-gray-100">
			                            	<div class="grid grid-cols-2">
			                            		<p>{{ translate('form.updatedAt') }}</p>
			                                    <p>{{ new Date(submission.updated_at) }}</p>
			                            		<p>{{ translate('form.scoreLabel') }}</p>
			                                    <p>{{ translate('form.score', {'score': parseFloat(submission.score).toFixed(2) }) }}
			                                    </p>
			                                    <template v-for="status in submission.verification_statuses">
			                                    	<template v-if="Object.keys(status.verifications).length > 0">
					                                    <p>	
					                                    	<breeze-badge :color="status.color">
				                                                {{ status.name }}
				                                            </breeze-badge>
				                                        </p>
			                                            <p class="space-x-2">
			                                                <span class="underline" v-for="verification in status.verifications">
			                                                    {{ verification.verifier.user.name }}
			                                                </span>
			                                            </p>
			                                        </template>
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

	        <BreezeSectionBorder :display="'block'"/>
	    </div>
	</div-->
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeList from '@/Components/List.vue'
    import BreezeBadge from '@/Components/Badge.vue'
    import BreezeAccordion from '@/Components/Accordion.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeList,
            BreezeBadge,
            BreezeAccordion,
            BreezeSectionBorder,
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
