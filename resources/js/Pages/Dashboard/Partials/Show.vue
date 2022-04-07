<template>
	<div>
		<h3 class="text-base font-medium text-gray-900 dark:text-gray-100">
            <slot name="title"></slot>
        </h3>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            <slot name="description"></slot>
        </p>
    </div>
</template>