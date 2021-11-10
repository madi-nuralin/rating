<template>
    <Head :title="$t('pages.dashboard.confirmations.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.dashboard.confirmations.header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <show-assignment-information :assignment="$page.props.confirmation.assignment" class="mt-10 sm:mt-0" />
                <breeze-section-border />

                <show-confirmation-information :confirmations="$page.props.confirmation.assignment.confirmations" class="mt-10 sm:mt-0" />
                <breeze-section-border />

                <update-form :confirmation="$page.props.confirmation" class="mt-10 sm:mt-0" />
                <breeze-section-border />

                <resource-list :assignment="$page.props.confirmation.assignment" :readonly="true" class="mt-10 sm:mt-0"/>
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
    import UpdateForm from '@/Pages/Dashboard/Confirmations/Partials/UpdateForm.vue'
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
            UpdateForm,
            Head,
        },
    }
</script>
