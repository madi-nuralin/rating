<template>
    <Head :title="translate[0]('head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ translate[0]('header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form 
                    :verifier="$page.props.verifier"
                    :targets="$page.props.targets"
                    :users="$page.props.users"
                    :translate="translate[1]" />
                <breeze-section-border />

                <delete-form :verifier="$page.props.verifier" :translate="translate[2]" class="mt-10 sm:mt-0" />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from './Partials/UpdateForm.vue'
    import DeleteForm from './Partials/DeleteForm.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            DeleteForm,
            Head,
        },

        computed: {
            translate() {
                var $t = this.$t;

                return [
                    function (path) {
                        return $t(`pages.management.verifier.${path}`);
                    },
                    function (path) {
                        return $t(`pages.management.verifier.update.${path}`);
                    },
                    function (path) {
                        return $t(`pages.management.verifier.delete.${path}`);
                    },
                ]
            }
        },
    }
</script>
