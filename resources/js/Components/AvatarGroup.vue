<template>
	<div class="flex flex-wrap" :class="[spaceClass]">
		<slot></slot>
	</div>
</template>

<script>
export default {
	props: {
		space: {
			default: '-space-x-2'
		}
	},

	computed: {
		spaceClass() {
			return this.space
		}
	}
}
</script>