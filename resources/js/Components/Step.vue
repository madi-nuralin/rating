<template>
	<ul class="grid" :class="[gapClass]">
		<li v-for="(item, index) in items" :class="[alignClass(index)]">
			<button type="button" class="text-left text-sm font-bold uppercase text-gray-300" @click="active = index; $emit('tab', index)" :class="{'text-indigo-500': active == index}">
				<slot name="item" :item="item" :index="index"></slot>
			</button>
		</li>
	</ul>
</template>

<script>

export default {
	emits: ['tab'],

	data() {
		return {
			active: 0
		}
	},

	props: {
		items: {
			type: Array,
			required: true
		},
		align: {
			default: 'horizontal'
		},
		gap: {
			default: 2
		}
	},

	methods: {
		alignClass(index) {
			var align = this.align
			var color = this.active == index ? 'border-indigo-500' : 'border-gray-200'

			return (
				align == 'horizontal'
				? 'border-t-2 py-4'
				: align == 'vertical'
				? 'border-l-2 px-4'
				: ''
				) + ' ' + color
		},
	},

	computed: {
		gapClass() {
			return `gap-${this.gap}`
		}
	}
}
</script>