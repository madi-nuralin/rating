<template>
    <Head :title="$t('pages.dashboard.assignments.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.dashboard.assignments.header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <ResourceList :assignment="$page.props.assignment" />
                    </div>
                    <div class="md:col-span-1 flex flex-col">
                        <InformationCard01 :assignment="$page.props.assignment" />
                        <InformationCard02 :confirmations="$page.props.assignment.confirmations" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeInput from '@/Components/Input.vue'
    import ResourceList from '@/Pages/Dashboard/Assignments/Partials/List.vue'
    import InformationCard01 from '@/Pages/Dashboard/Assignments/Partials/InformationCard01.vue'
    import InformationCard02 from '@/Pages/Dashboard/Assignments/Partials/InformationCard02.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            BreezeButtonSecondary,
            BreezeLabel,
            BreezeInput,
            ResourceList,
            InformationCard01,
            InformationCard02,
            Head,
        },
    }
</script>
