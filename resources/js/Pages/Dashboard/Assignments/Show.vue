<template>
    <Head :title="$t('pages.dashboard.assignments.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.dashboard.assignments.header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <show-assignment-information :assignment="$page.props.assignment" />
                <breeze-section-border />

                <show-confirmation-information :confirmations="$page.props.assignment.confirmations" class="mt-10 sm:mt-0" />
                <breeze-section-border />

                <resource-list :assignment="$page.props.assignment" class="mt-10 sm:mt-0" />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeInput from '@/Components/Input.vue'
    import ResourceList from '@/Pages/Dashboard/Activities/Partials/List.vue'
    import ShowAssignmentInformation from '@/Pages/Dashboard/Assignments/Partials/Information.vue'
    import ShowConfirmationInformation from '@/Pages/Dashboard/Confirmations/Partials/Information.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            BreezeButtonSecondary,
            BreezeLabel,
            BreezeInput,
            ResourceList,
            ShowAssignmentInformation,
            ShowConfirmationInformation,
            Head,
        },
    }
</script>
