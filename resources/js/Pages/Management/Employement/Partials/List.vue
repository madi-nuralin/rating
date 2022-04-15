<template>
    <BreezeFormSection>
        <template #title>
            {{ $t('pages.management.employement.list.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.employement.list.description') }}
        </template>

        <template #form>
            <div class="col-span-6">
                <BreezeList :items="employements">
                    <template #item="{item}">
                        <div class="flex justify-between">
                            <div>
                                <div>{{ `${item.user.name} - ${item.position.name}` }}</div>
                                <div class="flex flex-col text-sm text-gray-400">
                                    <p class="line-clamp-3">
                                        {{ item.department.name }}
                                    </p>
                                </div>
                            </div>
                            <Link class="ml-2 text-sm text-gray-400 underline" :href="route('employement.show', {'id': item.id})">
                                {{ $t('generic.updateButton') }}
                            </Link>
                        </div>
                    </template>
                </BreezeList>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('employement.create')">
                {{ $t('pages.management.employement.list.actions.createButton') }}
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

        props: ['employements'],
    }
</script>