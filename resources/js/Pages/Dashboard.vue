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
                <view1 :elements="$page.props.user_years" :translate="translate[1]"/>
                <breeze-section-border />

                <template v-if="content('verifier')">
                    <view2 :elements="$page.props.verifier_years" :translate="translate[2]" class="mt-10 sm:mt-0" />
                    <breeze-section-border />
                </template>

                <template v-if="content('approver')">
                    <view3 :translate="translate[3]" class="mt-10 sm:mt-0" />
                </template>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import View1 from './Dashboard/Partials/View1.vue'
import View2 from './Dashboard/Partials/View2.vue'
import View3 from './Dashboard/Partials/View3.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeSectionBorder,
        View1,
        View2,
        View3,
        Head,
    },

    methods: {
        content(context) {
            var roles = this.$page.props.auth.user.roles;
            if (roles) {
                for (var i=0; i < roles.length; ++i) {
                    if (roles[i].context == context) {
                        return true;
                    }
                }
            }
            return false;
        }
    },

    computed: {
        translate() {
            var $t = this.$t;

            return [
                function (path) { // [0]
                    return $t(`pages.dashboard.${path}`);
                },
                function (path) { // [1]
                    return $t(`pages.dashboard.partials.view1.${path}`);
                },
                function (path) { // [2]
                    return $t(`pages.dashboard.partials.view2.${path}`);
                },
                function (path) { // [3]
                    return $t(`pages.dashboard.partials.view3.${path}`);
                },
            ]
        }
    },
}
</script>