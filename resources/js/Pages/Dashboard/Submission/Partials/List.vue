<template>
    <BreezeFormSection :has-title="false">
        <template #aside>
            <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ translate('title') }}
                </h3>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                    {{ translate('description') }}
                </p>
            </div>

            <div>
                <BreezeSectionBorder :display="'block'" />
                <show-name :rating="rating" />

                <BreezeSectionBorder :display="'block'" />
                <show-description :rating="rating" />

                <BreezeSectionBorder :display="'block'" />
                <show-verifiers :rating="rating" />

                <BreezeSectionBorder :display="'block'" />
                <show-date :rating="rating" />
            </div>
        </template>

        <template #form>
            <div class="col-span-6">
                <show-list :rating="rating" :type="'submission'"/>
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
    import ShowList from '../../Partials/ShowList.vue'
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
            ShowList,
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