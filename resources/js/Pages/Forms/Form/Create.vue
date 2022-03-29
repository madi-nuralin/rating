<template>
    <Head :title="$t('pages.forms.form.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.forms.form.header') }}
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <create-form/>
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
