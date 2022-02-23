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

                            <ul class="list-roman list-inside" v-if="Object.keys(target.parameters).length > 0">
                                <li v-for="parameter in target.parameters">
                                    <span>    
                                        {{ parameter.name }}
                                    </span>

                                    <ul class="list-decimal list-inside ml-4 text-gray-500" v-if="Object.keys(parameter.submissions).length > 0">
                                        <li v-for="(submission, i) in parameter.submissions">
                                            <Link class="underline hover:font-semibold" :href="route('submission.show', {'id': submission.id})">
                                                {{ translate('form.responceLink') }}
                                            </Link>

                                            <div class="ml-4 grid grid-cols-2 md:grid-cols-3">
                                                <div class="md:col-span-1 font-semibold">
                                                    {{ translate('form.scoreLink') }}
                                                </div>
                                                <div class="md:col-span-2">
                                                    {{ translate('form.score', {'score': parseFloat(submission.score).toFixed(2) }) }}
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

        <template #actions>
            <Link class="inline-flex submissions-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('submission.create', {'rating': rating.id})" v-if="isAllowed">
                {{ translate('actions.createButton') }}
            </Link>
            
            <template v-else>
                <breeze-button @click="open">
                    {{ translate('actions.createButton') }}
                </breeze-button>

                <!-- Confirmation Modal -->
                <breeze-modal-confirmation :show="opening" @close="opening = false">
                    <template #title>
                        {{ translate('actions.modal.title') }}
                    </template>

                    <template #content>
                        <template v-if="ratingTime(rating, 'submission', 'begin') > currentTime">
                            {{ translate('actions.modal.content[0]') }}
                        </template>
                        <template v-if="ratingTime(rating, 'submission', 'begin') < currentTime">
                            {{ translate('actions.modal.content[1]') }}
                        </template>
                    </template>

                    <template #footer>
                        <breeze-button-secondary @click="opening = false">
                            {{ translate('actions.modal.footer.closeButton') }}
                        </breeze-button-secondary>
                    </template>
                </breeze-modal-confirmation>
            </template>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeModalConfirmation from '@/Components/ModalConfirmation.vue'
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

    import MixinTime from "@/Mixins/Time";

    export default {
        components: {
            BreezeButton,
            BreezeButtonSecondary,
            BreezeModalConfirmation,
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

        mixins: [MixinTime],

        data() {
            return {
                opening: false,
            }
        },

        methods: {
            open() {
                this.opening = true
            },
        },

        computed: {
            isAllowed() {
                var 
                    b = this.ratingTime(this.rating, 'submission', 'begin'),
                    e = this.ratingTime(this.rating, 'submission', 'end');

                return b <= this.currentTime && e > this.currentTime;
            }
        }
    }
</script>