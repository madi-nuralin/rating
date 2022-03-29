<template>
    <Head :title="$t('pages.management.parameter.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.management.parameter.header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ResourceList :parameters="$page.props.parameters"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import ResourceList from './Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            ResourceList,
            Head,
        },
    }
</script>
