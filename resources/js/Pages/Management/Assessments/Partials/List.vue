<template>
    <BreezeFormSection>
        <template #title>
            {{ $t('pages.management.assessments.list.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.assessments.list.description') }}
        </template>

        <template #form>
            <div class="col-span-6">
                <breeze-list :name="'assessment'" :items="items" />
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('assessment.create')">
                {{ $t('pages.management.assessments.list.actions.createButton') }}
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

        props: ['assessments'],

        computed: {
            items() {
                return {
                    'data': this.assessments.data.map(function(assessment) {
                        return {
                            id: assessment.id,
                            name: assessment.name,
                            description: assessment.description
                        }
                    }),
                    'links': this.assessments.links
                };
            }
        },
    }
</script>