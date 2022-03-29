<template>
    <Head :title="$t('pages.forms.formField.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.forms.formField.header') }}
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreateForm :form="$page.props.form"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import CreateForm from './Partials/CreateForm.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            CreateForm,
            Head,
        },
    }
</script>
