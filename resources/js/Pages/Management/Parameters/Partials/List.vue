<template>
    <BreezeFormSection>
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #form>
            <div class="col-span-6">
                <breeze-list :name="'parameter'" :items="items" />
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('parameter.create')">
                {{ translate('actions.createButton') }}
            </Link>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeList from '@/Components/List.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormSection,
            BreezeList,
            Link,
        },

        props: ['parameters', 'translate'],

        computed: {
            items() {
                return {
                    'data': this.parameters.data.map(function(parameter) {
                        return {
                            id: parameter.id,
                            name: parameter.name,
                            description: parameter.description
                        }
                    }),
                    'links': this.parameters.links
                };
            }
        },
    }
</script>