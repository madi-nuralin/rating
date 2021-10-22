<template>
    <div class="mt-4 md:mt-0 mb-0 md:mb-4 md:col-span-2">
        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
            <h3 class="text-sm font-medium text-gray-900">
                <slot name="title"></slot>
            </h3>

            <p class="text-xs text-gray-600">
                <slot name="description"></slot>
            </p>

            <hr class="mt-3 mb-3" />

            <div class="mt-0">
                <slot name="content"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeButtonSecondary,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
        },

        props: ['assessment', 'employement'],
    }
</script>
