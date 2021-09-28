<template>
    <Head :title="$t('pages.profile.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.profile.header')}}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <UpdateForm :user="$page.props.user" />
                <BreezeSectionBorder />

                <UpdatePasswordForm class="mt-10 sm:mt-0"/>
                <BreezeSectionBorder />

                <!--employement-information-form :user="$page.props.user" class="mt-10 sm:mt-0" />
                <breeze-section-border /-->

                <DeleteForm class="mt-10 sm:mt-0" :user="$page.props.user"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import UpdateForm from '@/Pages/Management/Users/Partials/UpdateForm.vue'
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
//import EmployementInformationForm from '@/Pages/Profile/Employement/Partials/List.vue'
import DeleteForm from '@/Pages/Profile/Partials/DeleteForm.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeSectionBorder,
        Head,
        UpdatePasswordForm,
        UpdateForm,
        //EmployementInformationForm,
        DeleteForm,
    },
}
</script>
