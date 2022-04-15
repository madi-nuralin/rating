<template>
    <BreezeFormSection>
        <template #title>
            {{ $t('pages.management.department.list.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.department.list.description') }}
        </template>

        <template #form>
            <div class="col-span-6">
                <BreezeList :items="departments">
                    <template #item="{item}">
                        <div class="flex justify-between">
                            <div>
                                <div>{{ item.name }}</div>
                                <div class="grid grid-cols-3 text-sm text-gray-400">
                                    <p class="line-clamp-1">{{ item.department_type.name }}</p>
                                    <p class="line-clamp-1">{{ item.abbreviation }}</p>
                                    <p class="line-clamp-1">{{ item.description }}</p>
                                </div>
                            </div>
                            <Link class="ml-2 text-sm text-gray-400 underline" :href="route('department.show', {'id': item.id})">
                                {{ $t('generic.updateButton') }}
                            </Link>
                        </div>
                    </template>
                </BreezeList>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('department.create')">
                {{ $t('pages.management.department.list.actions.createButton') }}
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

        props: ['departments'],
    }
</script>