<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.wizards.submission.showSteps.trigger') }}
	    </template>

	    <template #content>
	    	<ul class="list-inside text-normal text-gray-900 dark:text-gray-200">
				<li v-for="(step, i) in this.$page.props.arcanist.wizard.steps">
					<BreezeResponsiveNavLink :href="step.url" :active="this.url == step.url || (i == 0 && step.url == null)" :class="step.isComplete ? 'border-l-4 border-indigo-400' : 'border-l-4 border-gray-200'">
						<div>
							<h4 class="font-medium" :class="{'text-gray-900': this.url != step.url}">
								{{ $t('pages.wizards.submission.showSteps.step', {'number': i + 1 }) }}
							</h4>
							<p class="" :class="{'text-gray-500': this.url != step.url}">
								{{ $t(step.title) }}
							</p>
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