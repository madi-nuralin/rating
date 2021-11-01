<template>
    <Head :title="$t('pages.forms.fields.options.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.forms.fields.options.header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form :option="$page.props.option" />
                <breeze-section-border />

                <delete-form :option="$page.props.option" class="mt-10 sm:mt-0"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from '@/Pages/Forms/Fields/Options/Partials/UpdateForm.vue'
    import DeleteForm from '@/Pages/Forms/Fields/Options/Partials/DeleteForm.vue'
    import ResourceList from '@/Pages/Forms/Fields/Options/Partials/List.vue'
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
