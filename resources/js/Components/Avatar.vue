<template>
	<img class="inline-block object-cover rounded-full ring-1 ring-gray-300 dark:ring-gray-600" :class="[widthClass, hoverClass]" :src="src" :alt="alt" v-if="! status">

	<div class="relative inline-block" v-else>
		<img class="inline-block object-cover rounded-full ring-1 ring-gray-300 dark:ring-gray-600" :class="[widthClass, hoverClass]" :src="src" :alt="alt">
		<span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white rounded-full" :class="[statusClass]" />
	</div>
</template>

<div class="relative inline-block">
  <img class="inline-block object-cover w-12 h-12 rounded-full" src="https://images.pexels.com/photos/2955305/pexels-photo-2955305.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Profile image"/>
  <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white rounded-full"></span>
</div>

<script>
export default {
	props: {
		width: {
            default: '8'
        },
		src: {},
		alt: {},
		status: {
			default: null
		}
	},

	computed: {
        widthClass() {
            return {
                '4': 'w-4 h-4',
            	'6': 'w-6 h-6',
                '8': 'w-8 h-8',
                '10': 'w-10 h-10',
                '12': 'w-12 h-12',
                '14': 'w-14 h-14',
                '16': 'w-16 h-16',
                '18': 'w-18 h-18',
                '20': 'w-20 h-20',
                '24': 'w-24 h-24',
                '36': 'w-36 h-36',
                '48': 'w-48 h-48',
                '72': 'w-72 h-72'
            }[this.width.toString()]
        },
        statusClass() {
        	return {
        		'online': 'bg-green-600',
        		'offline': 'bg-gray-600'
        	}[this.width.toString()]
        },
        hoverClass() {
        	return 'transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300'
        }
    }
}
</script>