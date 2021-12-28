<template>
    <Head :title="$t('pages.management.parameters.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.management.parameters.header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form :parameter="$page.props.parameter" :parameter-targets="$page.props.targets"/>
                <breeze-section-border />

                <resource-list :form="$page.props.parameter.form"/>
                <breeze-section-border />

                <delete-form :parameter="$page.props.parameter" class="mt-10 sm:mt-0"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from '@/Pages/Management/Parameters/Partials/UpdateForm.vue'
    import DeleteForm from '@/Pages/Management/Parameters/Partials/DeleteForm.vue'
    import ResourceList from '@/Pages/Forms/Fields/Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            DeleteForm,
            ResourceList,
            Head,
        },
    }
</script>
