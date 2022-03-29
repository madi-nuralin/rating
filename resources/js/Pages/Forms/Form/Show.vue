<template>
    <Head :title="$t('pages.forms.form.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.forms.form.header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form :form="$page.props.form" class="mt-10 sm:mt-0"/>
                <breeze-section-border />

                <form-field-list :form="$page.props.form" class="mt-10 sm:mt-0"/>
                <breeze-section-border />

                <update-scoring-form :form="$page.props.form" class="mt-10 sm:mt-0"/>
                <breeze-section-border />

                <delete-form :form="$page.props.form" class="mt-10 sm:mt-0"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateScoringForm from './Partials/UpdateScoringForm.vue'
    import UpdateForm from './Partials/UpdateForm.vue'
    import DeleteForm from './Partials/DeleteForm.vue'
    import FormFieldList from '../FormField/Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateScoringForm,
            UpdateForm,
            DeleteForm,
            FormFieldList,
            Head,
        },
    }
</script>
