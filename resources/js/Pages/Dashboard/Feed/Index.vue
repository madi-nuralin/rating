<template>
    <Head :title="$t('pages.dashboard.feed.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.dashboard.feed.header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg dark:bg-gray-800">
                    <Welcome :ratings="$page.props.ratings"/>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import Welcome from './Partials/Welcome.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeSectionBorder,
        Welcome,
        Head
    },
}
</script>