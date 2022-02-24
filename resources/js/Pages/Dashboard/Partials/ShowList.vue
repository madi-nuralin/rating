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

	                        <ul class="list-decimal list-inside ml-4 text-gray-500" v-if="Object.keys(parameter.submissions).length > 0">
	                            <li v-for="(submission, i) in parameter.submissions">
	                                <Link class="underline hover:font-semibold" :href="route('verification.show', {'id': submission.verification.id})" v-if="submission.verification && submission.verification.id && type == 'verification'">
	                                    {{ $t('pages.dashboard.submission.list.form.responceLink') }}
	                                </Link>

	                                <Link class="underline hover:font-semibold" :href="route('submission.show', {'id': submission.id})" v-if="type == 'submission'">
	                                    {{ $t('pages.dashboard.submission.list.form.responceLink') }}
	                                </Link>

	                                <div class="ml-4 grid grid-cols-2 md:grid-cols-3">
	                                    <div class="md:col-span-1 font-semibold">
	                                        {{ $t('pages.dashboard.submission.list.form.scoreLink') }}
	                                    </div>
	                                    <div class="md:col-span-2">
	                                        {{ $t('pages.dashboard.submission.list.form.score', {'score': parseFloat(submission.score).toFixed(2) }) }}
	                                    </div>

	                                    <template v-for="status in submission.verification_statuses">
	                                        <template v-if="Object.keys(status.verifications).length > 0">
	                                            <div class="md:col-span-1 font-semibold" :class="`text-${status.color}-600`">
	                                                {{ status.name }}
	                                            </div>
	                                            <div class="md:col-span-2 space-x-2">
	                                                <span class="underline" v-for="verification in status.verifications">
	                                                    {{ verification.verifier.user.name }}
	                                                </span>
	                                            </div>
	                                        </template>
	                                    </template>
	                                </div>
	                            </li>
	                        </ul>
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
    }
</script>
