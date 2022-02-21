<template>
    <div class="px-3 h-6 rounded-md text-xs font-thin inline-flex items-center font-medium text-sm text-slate-500 font-mono dark:text-slate-400 border-2"
    :class="`bg-${color}-100 text-${color}-700 border-${color}-400`">
        <span class="w-2 h-2 rounded-full mr-1" :class="`bg-${color}-400`"></span>
        <span>
            <slot></slot>
        </span>
    </div>
</template>

<script>
export default {
    props: {
        color: {
                type: String,
                default: "teal"
            }
        }
    };
</script>