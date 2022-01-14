<template>
	<BreezeAccordion>
		<template #trigger>
	        Шаги выполнения
	    </template>

	    <template #content>
	    	<breeze-step :items="Array('Выбор направления деятельности','Выбор параметра', 'Заполнение формы')">
                <template #item="{item}">
                    {{item}}
                </template>
            </breeze-step>
	    </template>
	</BreezeAccordion>
</template>

<script>
	import BreezeAccordion from '@/Components/Accordion.vue'
	import BreezeStep from '@/Components/Step.vue'

    export default {
    	components: {
    		BreezeAccordion,
    		BreezeStep
    	},

    	props: ['rating']
    }
</script>