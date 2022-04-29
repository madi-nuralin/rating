<template>
    <Head :title="translate[0]('head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ translate[0]('header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-form :rating="$page.props.rating" :users="$page.props.users" :translate="translate[1]"/>
                <breeze-section-border />

                <parameter-list :rating="$page.props.rating" :translate="translate[3]" class="mt-10 sm:mt-0" />
                <breeze-section-border />

                <verifier-list :rating="$page.props.rating" :translate="translate[4]" class="mt-10 sm:mt-0" />
                <breeze-section-border />

                <approver-list :rating="$page.props.rating" :translate="translate[4]" class="mt-10 sm:mt-0" />
                <breeze-section-border />

                <delete-form :rating="$page.props.rating" :translate="translate[2]" class="mt-10 sm:mt-0" />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from './Partials/UpdateForm.vue'
    import DeleteForm from './Partials/DeleteForm.vue'
    import ParameterList from './Partials/Parameter/Partials/List.vue'
    import VerifierList from './Partials/Verifier/Partials/List.vue'
    import ApproverList from './Partials/Approver/Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            DeleteForm,
            ParameterList,
            VerifierList,
            ApproverList,
            Head,
        },

        computed: {
            translate() {
                var $t = this.$t;

                return [
                    function (path) {
                        return $t(`pages.management.rating.${path}`);
                    },
                    function (path) {
                        return $t(`pages.management.rating.update.${path}`);
                    },
                    function (path) {
                        return $t(`pages.management.rating.delete.${path}`);
                    },
                    function (path) {
                        return $t(`pages.management.rating.parameter.list.${path}`);
                    },
                    function (path) {
                        return $t(`pages.management.verifier.list.${path}`);
                    },
                ]
            }
        },
    }
</script>
