<template>
    <Head :title="$t('pages.management.parameter.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.management.parameter.header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form :parameter="$page.props.parameter" :parameter-targets="$page.props.parameter_targets" />
                <breeze-section-border />

                <form-list :forms="$page.props.parameter.forms"
                    :parameter="$page.props.parameter" class="mt-10 sm:mt-0"/>
                <breeze-section-border />

                <delete-form :parameter="$page.props.parameter" class="mt-10 sm:mt-0"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from './Partials/UpdateForm.vue'
    import DeleteForm from './Partials/DeleteForm.vue'
    import FormList from './Form/Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            DeleteForm,
            FormList,
            Head,
        },
    }
</script>
