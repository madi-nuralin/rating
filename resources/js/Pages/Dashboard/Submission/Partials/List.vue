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
                <show-statistics :rating="rating" />

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
            <Link class="inline-flex submissions-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('submission.create', {'rating': rating.id})">
                {{ translate('actions.createButton') }}
            </Link>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeModalConfirmation from '@/Components/ModalConfirmation.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeBadge from '@/Components/Badge.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import BreezeSectionTitle from '@/Components/SectionTitle.vue'
    import BreezeAccordion from '@/Components/Accordion.vue'

    import ShowName from '../../Partials/ShowName.vue'
    import ShowDescription from '../../Partials/ShowDescription.vue'
    import ShowVerifiers from '../../Partials/ShowVerifiers.vue'
    import ShowList from '../../Partials/ShowList.vue'
    import ShowDate from '../../Partials/ShowDate.vue'
    import ShowStatistics from '../../Partials/ShowStatistics.vue'
    
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeButtonSecondary,
            BreezeFormSection,
            BreezeBadge,
            BreezeSectionBorder,
            BreezeSectionTitle,
            BreezeAccordion,
            ShowName,
            ShowDescription,
            ShowVerifiers,
            ShowList,
            ShowDate,
            ShowStatistics,
            Link,
        },

        props: ['rating', 'translate'],

        data() {
            return {
                opening: false,
            }
        },
    }
</script>