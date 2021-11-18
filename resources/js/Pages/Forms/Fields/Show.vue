<template>
    <Head :title="$t('pages.forms.fields.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.forms.fields.header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form :field="$page.props.field" />
                <breeze-section-border />

                <template v-if="Array('select', 'multiselect').includes($page.props.field.type)">
                    <options :field="$page.props.field"/>
                    <breeze-section-border />
                </template>

                <delete-form :field="$page.props.field" class="mt-10 sm:mt-0"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from '@/Pages/Forms/Fields/Partials/UpdateForm.vue'
    import DeleteForm from '@/Pages/Forms/Fields/Partials/DeleteForm.vue'
    import Options from '@/Pages/Forms/Fields/Options/Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            DeleteForm,
            Options,
            Head,
        },
    }
</script>
