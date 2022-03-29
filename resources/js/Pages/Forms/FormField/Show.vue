<template>
    <Head :title="$t('pages.forms.formField.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.forms.formField.header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form :field="$page.props.field"/>
                <breeze-section-border />

                <template v-if="Array('select', 'multiselect').includes($page.props.field.type)">
                    <form-field-option-list :field="$page.props.field" class="mt-10 sm:mt-0" />
                    <breeze-section-border />
                </template>

                <delete-form :field="$page.props.field" class="mt-10 sm:mt-0" />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from './Partials/UpdateForm.vue'
    import DeleteForm from './Partials/DeleteForm.vue'
    import FormFieldOptionList from '../FormFieldOption/Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            DeleteForm,
            FormFieldOptionList,
            Head,
        },
    }
</script>
