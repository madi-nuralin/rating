<template>
    <Head :title="t('head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ t('header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form :option="$page.props.option" :rule="$page.props.rule"/>
                <breeze-section-border />

                <delete-form :option="$page.props.option" :rule="$page.props.rule" class="mt-10 sm:mt-0"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from '@/Pages/Management/Parameters/Rules/Options/Partials/UpdateForm.vue'
    import DeleteForm from '@/Pages/Management/Parameters/Rules/Options/Partials/DeleteForm.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            DeleteForm,
            Head,
        },

        methods: {
            t(p) {
                return this.$t('pages.management.parameters.rules.options.' + p);
            }
        }
    }
</script>
