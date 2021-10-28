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
                <UpdateForm :confirmation="$page.props.confirmation" />
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <resource-list :assignment="$page.props.confirmation.assignment" :disabled="true"/>
                    </div>
                    <div class="md:col-span-1 flex flex-col">
                        <AssignmentInformation :assignment="$page.props.confirmation.assignment" />
                        <ConfirmationInformation :confirmations="$page.props.confirmation.assignment.confirmations" />
                    </div>
                </div>
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
    import ResourceList from '@/Pages/Dashboard/Confirmations/Partials/List.vue'
    import AssignmentInformation from '@/Pages/Dashboard/Confirmations/Partials/AssignmentInformation.vue'
    import ConfirmationInformation from '@/Pages/Dashboard/Assignments/Partials/ConfirmationInformation.vue'
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
            AssignmentInformation,
            ConfirmationInformation,
            UpdateForm,
            Head,
        },
    }
</script>
