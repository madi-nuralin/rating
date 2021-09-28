<template>
    <Head :title="$t('pages.management.users.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.management.users.header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <UpdateForm :user="$page.props.user"/>
                <BreezeSectionBorder />
                
                <DeleteForm class="mt-10 sm:mt-0" :user="$page.props.user"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import UpdateForm from '@/Pages/Management/Users/Partials/UpdateForm.vue'
import DeleteForm from '@/Pages/Management/Users/Partials/DeleteForm.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeSectionBorder,
        Head,
        DeleteForm,
        UpdateForm,
    },
}
</script>
