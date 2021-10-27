<template>
    <div class="mt-4 md:mt-0 mb-0 md:mb-4 md:col-span-2">
        <form @submit.prevent="$emit('submitted')">
            <div class="px-4 py-5 bg-white sm:p-6 shadow"
                :class="hasActions ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md'">

                <BreezeCardTitle>
                    <template #title>
                        <slot name="title"></slot>
                    </template>
                    <template #description>
                        <slot name="description"></slot>
                    </template>
                </BreezeCardTitle>

                <hr class="my-2" />

                <div class="grid grid-cols-6 gap-2">
                    <slot name="form"></slot>
                </div>
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md" v-if="hasActions">
                <slot name="actions"></slot>
            </div>
        </form>
    </div>
</template>

<script>
    import BreezeCardTitle from '@/Components/CardTitle.vue'

    export default {
        emits: ['submitted'],

        components: {
            BreezeCardTitle,
        },

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
