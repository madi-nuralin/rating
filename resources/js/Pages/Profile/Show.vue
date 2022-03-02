<template>

    <Head :title="$t('pages.profile.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ $t('pages.profile.header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-profile-information-form :user="$page.props.user" />
                <breeze-section-border />

                <update-password-form class="mt-10 sm:mt-0"/>
                <breeze-section-border />

                <!--logout-other-browser-sessions-form :sessions="$page.props.sessions" class="mt-10 sm:mt-0" />
                <breeze-section-border /-->

                <delete-form class="mt-10 sm:mt-0" :user="$page.props.user"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue'
import DeleteForm from '@/Pages/Profile/Partials/DeleteForm.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeSectionBorder,
        Head,
        UpdateProfileInformationForm,
        UpdatePasswordForm,
        LogoutOtherBrowserSessionsForm,
        DeleteForm,
    },
}
</script>
