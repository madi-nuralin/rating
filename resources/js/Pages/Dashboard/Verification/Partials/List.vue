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
                <BreezeSectionBorder class="block" />
                <show-user :rating="rating" />

                <BreezeSectionBorder class="block" />
                <show-name :rating="rating" />

                <BreezeSectionBorder class="block" />
                <show-description :rating="rating" />

                <BreezeSectionBorder class="block" />
                <show-verifiers :rating="rating" />

                <BreezeSectionBorder class="block" />
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
    import BreezeList from '@/Components/ListScoped.vue'
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
            ShowUser,
            ShowName,
            ShowDescription,
            ShowVerifiers,
            ShowList,
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