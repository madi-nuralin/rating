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
                <BreezeList :items="rating.parameters">
                    <template #item="{item}">
                        <div class="flex justify-between">
                            <div>
                                <div>{{ item.name }}</div>
                                <div class="flex flex-col text-sm text-gray-400">
                                    <p class="line-clamp-3">
                                        {{ item.parameter_target.name }}
                                    </p>
                                </div>
                            </div>
                            <Link class="ml-2 text-sm text-gray-400 underline" :href="route('rating.parameter.show', {'parameter': item.id, 'rating': rating.id})">
                                Update
                            </Link>
                        </div>
                    </template>
                </BreezeList>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('rating.parameter.create', {'rating': rating.id})">
                {{ translate('actions.createButton') }}
            </Link>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeList from '@/Components/ListScoped.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormSection,
            BreezeList,
            Link,
        },

        props: ['rating', 'translate'],
    }
</script>