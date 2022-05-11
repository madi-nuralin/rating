<template>
    <Head :title="translate[0]('head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ translate[0]('header') }}
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <resource-list :rating="$page.props.rating" :translate="translate[1]"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import ResourceList from './Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            ResourceList,
            Head,
        },

        computed: {
            translate() {
                var $t = this.$t;

                return [
                    function (path) { // [0]
                        return $t(`pages.dashboard.verification.${path}`);
                    },
                    function (path, ...args) { // [1]
                        return $t(`pages.dashboard.verification.list.${path}`, ...args);
                    },
                ]
            }
        },
    }
</script>
