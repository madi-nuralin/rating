<template>
	<BreezeAccordion>
		<template #trigger>
	        Шаги выполнения
	    </template>

	    <template #content>
	    	<ul class="list-inside text-normal text-gray-900 dark:text-gray-200">
				<li v-for="(step, i) in this.$page.props.arcanist.wizard.steps">
					<BreezeResponsiveNavLink :href="step.url" :active="this.url == step.url || (i == 0 && step.url == null)" :class="step.isComplete ? 'border-l-4 border-indigo-400' : 'border-l-4 border-gray-200'">
						<div>
							<h4 class="text-sm font-medium" :class="{'text-gray-900': this.url != step.url}">Шаг {{ i + 1}}</h4>
							<p class="text-sm" :class="{'text-gray-500': this.url != step.url}">{{ step.title }}</p>
						</div>
					</BreezeResponsiveNavLink>
				</li>
			</ul>
	    </template>
	</BreezeAccordion>
</template>

<script>
	import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
	import BreezeAccordion from '@/Components/Accordion.vue'
	import Wizard from "@/Mixins/Wizard";

    export default {
    	components: {
    		BreezeResponsiveNavLink,
    		BreezeAccordion,
    	},

    	mixins: [Wizard]
    }
</script>