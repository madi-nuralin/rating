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
                <show-user :rating="rating" />

                <BreezeSectionBorder :display="'block'" />
                <show-name :rating="rating" />

                <BreezeSectionBorder :display="'block'" />
                <show-description :rating="rating" />

                <BreezeSectionBorder :display="'block'" />
                <show-total :rating="rating" />

                <BreezeSectionBorder :display="'block'" />
                <show-score :rating="rating" />

                <BreezeSectionBorder :display="'block'" />
                <show-verifiers :rating="rating" />

                <BreezeSectionBorder :display="'block'" />
                <show-date :rating="rating" />
            </div>
        </template>

        <template #form>
            <div class="col-span-6">
                <show-list :rating="rating" :type="'verification'"/>
            </div>
        </template>

        <template #actions>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeBadge from '@/Components/Badge.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import BreezeSectionTitle from '@/Components/SectionTitle.vue'
    import BreezeAccordion from '@/Components/Accordion.vue'

    import ShowUser from '../../Partials/ShowUser.vue'
    import ShowName from '../../Partials/ShowName.vue'
    import ShowDescription from '../../Partials/ShowDescription.vue'
    import ShowVerifiers from '../../Partials/ShowVerifiers.vue'
    import ShowList from '../../Partials/ShowList.vue'
    import ShowDate from '../../Partials/ShowDate.vue'
    import ShowTotal from '../../Partials/ShowTotal.vue'
    import ShowScore from '../../Partials/ShowScore.vue'
    
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormSection,
            BreezeBadge,
            BreezeSectionBorder,
            BreezeSectionTitle,
            BreezeAccordion,
            ShowUser,
            ShowName,
            ShowDescription,
            ShowVerifiers,
            ShowList,
            ShowDate,
            ShowTotal,
            ShowScore,
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