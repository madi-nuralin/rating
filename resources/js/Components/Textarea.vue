<template>
	<textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-white" style="min-height: 170px;" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
        <slot/>   
    </textarea>
</template>

<script>
    export default {
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>