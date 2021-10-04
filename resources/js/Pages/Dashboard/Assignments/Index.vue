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
                    <div class="md:col-span-1 flex flex-col">
                        <info :assessment="$page.props.assessment" :employement="$page.props.employement" />
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <!--resource-list2 :supervisors="$page.props.assessment.supervisors" />
                        <breeze-section-border /-->
                        <resource-list :assignments="$page.props.assignments" :assessment="$page.props.assessment" :employement="$page.props.employement"/>
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
    import ResourceList2 from '@/Pages/Dashboard/Assignments/Partials/List2.vue'
    import Info from '@/Pages/Dashboard/Assignments/Partials/Info.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            BreezeButtonSecondary,
            BreezeLabel,
            BreezeInput,
            ResourceList,
            ResourceList2,
            Info,
            Head,
        },
    }
</script>
