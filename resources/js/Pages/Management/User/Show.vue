<template>
    <Head :title="$t('pages.management.user.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.management.user.header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <UpdateForm :user="$page.props.user" :employements="$page.props.employements" :roles="$page.props.roles"/>
                <BreezeSectionBorder />

                <LoginAsForm class="mt-10 sm:mt-0" :user="$page.props.user" />
                <BreezeSectionBorder />
                
                <DeleteForm class="mt-10 sm:mt-0" :user="$page.props.user"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import UpdateForm from './Partials/UpdateForm.vue'
import DeleteForm from './Partials/DeleteForm.vue'
import LoginAsForm from './Partials/LoginAsForm.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeSectionBorder,
        Head,
        DeleteForm,
        UpdateForm,
        LoginAsForm,
    },
}
</script>
