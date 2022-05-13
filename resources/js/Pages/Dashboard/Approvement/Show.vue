<template>
    <Head :title="$t('pages.dashboard.submission.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.dashboard.submission.header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form :submission="$page.props.submission"/>
                <breeze-section-border />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from './Partials/UpdateForm.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            Head,
        },
    }
</script>
