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
                <update-form :field="$page.props.field" :translate="translate[1]"/>
                <breeze-section-border />

                <template v-if="Array('select', 'multiselect').includes($page.props.field.type)">
                    <form-field-option-list :field="$page.props.field" class="mt-10 sm:mt-0" :translate="translate[3]" />
                    <breeze-section-border />
                </template>

                <delete-form :field="$page.props.field" :translate="translate[2]" class="mt-10 sm:mt-0" />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import UpdateForm from './Partials/UpdateForm.vue'
    import DeleteForm from './Partials/DeleteForm.vue'
    import FormFieldOptionList from '../FormFieldOption/Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            UpdateForm,
            DeleteForm,
            FormFieldOptionList,
            Head,
        },

        computed: {
            translate() {
                var $t = this.$t;

                return [
                    function (path) {
                        return $t(`pages.forms.formField.${path}`);
                    },
                    function (path) {
                        return $t(`pages.forms.formField.update.${path}`);
                    },
                    function (path) {
                        return $t(`pages.forms.formField.delete.${path}`);
                    },
                    function (path) {
                        return $t(`pages.forms.formFieldOption.list.${path}`);
                    },
                ]
            }
        },
    }
</script>
