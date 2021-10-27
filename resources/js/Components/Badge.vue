<template>
	<span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs text-white font-thin leading-none rounded-full"
		:class="{'bg-yellow-600': isWarning, 'bg-red-600': isDanger, 'bg-green-600': isSuccess}">
		<slot />
	</span>
</template>

<script>
	export default {
		props: {
			isWarning: {
				default: false
			},

			isDanger: {
				default: false
			},

			isSuccess: {
				default: false
			}
		},
	}
</script>