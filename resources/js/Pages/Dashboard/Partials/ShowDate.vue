<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.partials.showDate.trigger') }}
	    </template>

	    <template #description>
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-600 -pt-4">
                <template v-for="(item, i) in items">
                <!-- Remove top/bottom padding when first/last child -->
                    <li class="flex items-center py-4 first:pt-0 last:pb-0">
                        <div class="overflow-hidden w-full">
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ item.title }}</p>
                            <p class="text-sm truncate">{{ calculateTime(item.beginTime, item.endTime) }}</p>
                            <p class="text-sm w-full mt-1">
                                <breeze-progress :color="'indigo'" :rounded="false" :percentage="percentage(currentTime - item.beginTime, item.endTime - item.beginTime)"/>
                            </p>
                        </div>
                    </li>
                </template>
            </ul>
	    </template>
	</Show>
</template>

<script>
	import BreezeProgress from '@/Components/Progress.vue'
	import BreezeBadge from '@/Components/Badge.vue'
	import Show from './Show.vue'

    export default {
    	components: {
    		BreezeProgress,
    		BreezeBadge,
    		Show
    	},

    	props: ['rating'],

    	methods: {
    		deltaTime(ms) {
    			var seconds = Number(ms/1000);
				var d = Math.floor(seconds / (3600*24));
				var h = Math.floor(seconds % (3600*24) / 3600);
				var m = Math.floor(seconds % 3600 / 60);
				var s = Math.floor(seconds % 60);

				var dDisplay = d > 0 ? d + (d == 1 ? " day, " : " days, ") : "";
				var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
				var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
				var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
				return dDisplay + hDisplay + mDisplay + sDisplay;
    		},

    		percentage(m, n) {
    			var p = parseInt(m/n * 100)
    			return p < 0 ? 0 : p
    		},

    		calculateTime(b, e) {
                var currentTime = this.currentTime
                var $d = this.$d, $t = this.$t;

                return b > currentTime
                    ? $t('pages.dashboard.partials.showDate.begins') + $d(b, 'long')
                    : e < currentTime
                    ? $t('pages.dashboard.partials.showDate.finished') + $d(e, 'long')
                    : b <= currentTime && e >= currentTime
                    ? $t('pages.dashboard.partials.showDate.finishes') + $d(e, 'long')
                    : '';

    			/*var currentTime = this.currentTime
    			var deltaTime = this.deltaTime

    			return e > currentTime && b < currentTime 
    				? deltaTime( e - currentTime ) + ' до завершения'
    				: b > currentTime
    				? deltaTime( b - currentTime ) + ' до начала'
    				: e < currentTime
    				? deltaTime( currentTime - e ) + ' прошло'
    				: ''*/

    		}
    	},

    	computed: {
    		time1() {
    			return new Date(this.rating.time1)
    		},

    		time2() {
    			return new Date(this.rating.time2)
    		},

    		time3() {
    			return new Date(this.rating.time3)
    		},

    		time4() {
    			return new Date(this.rating.time4)
    		},

    		currentTime() {
    			return new Date()
    		},

    		items() {
    			return [
    				{title: this.$t('pages.dashboard.partials.showDate.submission'), color: 'green', beginTime: this.time1, endTime: this.time2},
    				{title: this.$t('pages.dashboard.partials.showDate.verification'), color: 'red', beginTime: this.time3, endTime: this.time4}
    			]
    		}
    	}
    }
</script>