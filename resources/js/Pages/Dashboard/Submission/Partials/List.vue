<template>
    <BreezeFormSection :has-title="false">
        <template #aside>
            <div>
                <h3 class="text-lg font-medium text-gray-900">
                    {{ translate('title') }}
                </h3>

                <p class="mt-1 text-sm text-gray-600">
                    {{ translate('description') }}
                </p>
            </div>

            <div>
                <hr class="my-6" />
                <show-name :rating="rating" />

                <hr class="my-6" />
                <show-description :rating="rating" />

                <hr class="my-6" />
                <show-verifiers :rating="rating" />

                <hr class="my-6" />
                <show-date :rating="rating" />
            </div>
        </template>

        <template #form>
            <div class="col-span-6">
                <div v-for="(target, i) in rating.targets">
                    <BreezeAccordion>
                        <template #trigger>
                            {{ target.name }}
                        </template>

                        <template #content>
                            <div class="flex flex-between mt-4" 
                                v-for="submission in target.submissions"
                                v-if="Object.keys(target.submissions).length > 0">
                                <div>
                                    <h3>{{submission.parameter.name}}</h3>
                                    <div class="flex flex-col text-sm text-gray-400">
                                        <p class="line-clamp-3">
                                            {{submission.parameter.description}}
                                        </p>

                                        <div class="grid grid-cols-6 gap-2 mt-2">
                                            <template v-for="status in submission.verification_statuses"> 
                                                <template v-if="Object.keys(status.verifications).length > 0">
                                                    <div class="col-span-3 sm:col-span-4 space-x-2">
                                                        <span class="underline" v-for="verification in status.verifications">
                                                            {{ verification.verifier.user.name }}
                                                        </span>
                                                    </div>
                                                    <div class="col-span-3 sm:col-span-2">
                                                        <breeze-badge :color="status.color" :class="''">
                                                            {{ status.name }}
                                                        </breeze-badge>
                                                    </div>
                                                </template>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <Link class="ml-2 text-sm text-gray-400 underline" :href="route('submission.show', {'id': submission.id})">
                                        Update
                                    </Link>
                                    <p class="ml-2 text-sm">
                                        {{ translate('form.score', {'score': parseFloat(submission.score).toFixed(2) }) }}
                                    </p>
                                </div>
                            </div>
                        </template>
                    </BreezeAccordion>

                    <hr class="my-6" />
                </div>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex submissions-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('submission.create', {'rating': rating.id})">
                {{ $t('pages.management.rating.list.actions.createButton') }}
            </Link>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeList from '@/Components/ListScoped.vue'
    import BreezeBadge from '@/Components/Badge.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import BreezeSectionTitle from '@/Components/SectionTitle.vue'
    import BreezeAccordion from '@/Components/Accordion.vue'

    import ShowName from '../../Partials/ShowName.vue'
    import ShowDescription from '../../Partials/ShowDescription.vue'
    import ShowVerifiers from '../../Partials/ShowVerifiers.vue'
    import ShowDate from '../../Partials/ShowDate.vue'
    
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormSection,
            BreezeList,
            BreezeBadge,
            BreezeSectionBorder,
            BreezeSectionTitle,
            BreezeAccordion,
            ShowName,
            ShowDescription,
            ShowVerifiers,
            ShowDate,
            Link,
        },

        props: ['rating', 'translate'],

        data() {
            return {
                //
            }
        },

        methods: {
            //
        },
    }
</script>