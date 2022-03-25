<template>
    <Head :title="$t('pages.management.departments.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.management.departments.header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <UpdateForm
                    :department="$page.props.department"
                    :positions="$page.props.positions"
                    :departments="$page.props.departments"
                    :department-types="$page.props.department_types"/>
                <BreezeSectionBorder />

                <DeleteForm :department="$page.props.department" class="mt-10 sm:mt-0" />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from '@/Pages/Management/Departments/Partials/UpdateForm.vue'
    import DeleteForm from '@/Pages/Management/Departments/Partials/DeleteForm.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            DeleteForm,
            Head,
        },
    }
</script>
