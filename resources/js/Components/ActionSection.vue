<template>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <BreezeSectionTitle v-if="hasTitle">
            <template #title>
                <slot name="title"></slot>
            </template>
            <template #description>
                <slot name="description"></slot>
            </template>
        </BreezeSectionTitle>

        <div class="md:col-span-1 flex justify-between" v-else>
            <div class="px-4 sm:px-0 w-full text-gray-600 dark:text-gray-500">
                <slot name="aside"></slot>
            </div>
        </div>
        
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                <slot name="content"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import BreezeSectionTitle from '@/Components/SectionTitle.vue'

    export default {
        components: {
            BreezeSectionTitle,
        },

        props: {
            hasTitle: {
                default: true
            }
        }
    }
</script>
