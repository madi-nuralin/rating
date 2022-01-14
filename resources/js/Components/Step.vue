<template>
	<ul class="list-decimal list-inside text-normal text-gray-900 dark:text-gray-200">
		<li class="list-decimal" v-for="(item, i) in items">
			<button 
				type="button"
				:class="{'':true}">
				<slot name="item" :item="item" :index="i"/>
			</button>
		</li>
	</ul>
</template>

<script>

export default {
	props: {
		items: {
			type: Array,
			required: true
		}
	}
}
</script>