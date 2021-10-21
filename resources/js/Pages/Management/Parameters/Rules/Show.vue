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
                <update-form :rule="$page.props.rule"/>
                <breeze-section-border />

                <template v-if="$page.props.rule.input_type == 'select' || $page.props.rule.type == 'formula'">
                    <options-resource-list :rule="$page.props.rule" class="mt-10 sm:mt-0" />
                    <breeze-section-border />
                </template>

                <delete-form :rule="$page.props.rule" class="mt-10 sm:mt-0"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from '@/Pages/Management/Parameters/Rules/Partials/UpdateForm.vue'
    import DeleteForm from '@/Pages/Management/Parameters/Rules/Partials/DeleteForm.vue'
    import OptionsResourceList from '@/Pages/Management/Parameters/Rules/Options/Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            OptionsResourceList,
            UpdateForm,
            DeleteForm,
            Head,
        },

        methods: {
            t(path) {
                return this.$t('pages.management.parameters.rules.' + path);
            }
        }
    }
</script>
