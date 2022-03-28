<template>
    <BreezeFormSection>
        <template #title>
            {{ $t('pages.management.user.list.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.user.list.description') }}
        </template>

        <template #form>
            <div class="col-span-6">
                <BreezeList :items="users">
                    <template #item="{item}">
                        <div class="flex space-x-2">
                            <img class="w-8 h-8 rounded-full" :src="item.profile_photo_path" :alt="item.name">
                            <div>
                                <Link class="hover:underline" :href="route('user.show', {'id': item.id})">
                                    {{ item.name }}
                                </Link>
                                <div class="text-sm text-gray-400">
                                    <p class="line-clamp-1">
                                        {{ item.email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </template>
                </BreezeList>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('user.create')">
                {{ $t('pages.management.user.list.actions.createButton') }}
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

        props: ['users']
    }
</script>