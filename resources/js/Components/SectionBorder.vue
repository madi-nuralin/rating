<template>
    <div class="sm:block" :class="displayClass">
        <div class="py-8">
            <div class="border-t border-gray-200 dark:border-gray-700"></div>
        </div>
    </div>
</template>

<script>
	export default {
		props: {
			display: {
				default: 'hidden'
			}
		},

		computed: {
            displayClass() {
                return {
                    'hidden': 'hidden',
                    'block': 'block',
                    'flex': 'flex',
                    'inline-block': 'inline-block',
                    'inline-flex': 'inline-flex',
                }[this.display]
            }
        }
	}
</script>