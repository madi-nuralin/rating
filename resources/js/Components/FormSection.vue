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
            <div class="px-4 sm:px-0 w-full">
                <slot name="aside"></slot>
            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="$emit('submitted')">
                <div class="px-4 py-5 bg-white sm:p-6 shadow"
                    :class="hasActions ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md'">
                    <div class="grid grid-cols-6 gap-6">
                        <slot name="form"></slot>
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md" v-if="hasActions">
                    <slot name="actions"></slot>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import BreezeSectionTitle from '@/Components/SectionTitle.vue'

    export default {
        emits: ['submitted'],

        props: {
            hasTitle: {
                default: true
            }
        },

        components: {
            BreezeSectionTitle,
        },

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
