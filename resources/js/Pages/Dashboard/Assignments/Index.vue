<template>
    <Head :title="$t('pages.dashboard.assignments.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.dashboard.assignments.header') }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <resource-list :assignments="$page.props.assignments" :assessment="$page.props.assessment" :employement="$page.props.employement"/>
                    </div>
                    <div class="md:col-span-1 flex flex-col">
                        <card1 :assessment="$page.props.assessment" :employement="$page.props.employement" />
                        <card2 :confirmers="$page.props.assessment.confirmers" />
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
    import Card1 from '@/Pages/Dashboard/Assignments/Partials/Card1.vue'
    import Card2 from '@/Pages/Dashboard/Assignments/Partials/Card2.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            BreezeButtonSecondary,
            BreezeLabel,
            BreezeInput,
            ResourceList,
            Card1,
            Card2,
            Head,
        },
    }
</script>
