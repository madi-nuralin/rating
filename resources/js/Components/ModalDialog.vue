<template>
    <BreezeModal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4">
            <div class="text-lg">
                <slot name="title">
                </slot>
            </div>

            <div class="mt-4 overflow-y-auto" :class="contentClass">
                <slot name="content">
                </slot>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 text-right dark:bg-gray-700">
            <slot name="footer">
            </slot>
        </div>
    </BreezeModal>
</template>

<script>
    import BreezeModal from '@/Components/Modal.vue'

    export default {
        emits: ['close'],

        components: {
            BreezeModal,
        },

        props: {
            show: {
                default: false
            },
            maxWidth: {
                default: '2xl'
            },
            contentClass: {
                type: String
            },
            closeable: {
                default: true
            },
        },

        methods: {
            close() {
                this.$emit('close')
            },
        },
    }
</script>
