<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.partials.showDate.trigger') }}
	    </template>

	    <template #description>
            <ul class="list-inside text-normal text-gray-900 dark:text-gray-200">
                <li v-for="(item, i) in items">
                    <BreezeResponsiveNavLink :href="'.'" :active="currentTime > item.beginTime && currentTime < item.endTime" :class="currentTime > item.endTime ? 'border-l-4 border-indigo-400' : 'border-l-4 border-gray-200'">
                        <div class="grid grid-cols-3">
                            <div class="col-span-2">
                                <h4 class="font-medium" :class="{'text-gray-900 dark:text-gray-100': false}">
                                    Этап {{ i + 1 }}
                                </h4>
                                <p class="" :class="{'text-gray-500': false}">
                                    {{ item.title }}
                                </p>
                            </div>
                            <div>
                                <div>{{ $d(item.endTime, 'day') }}</div>
                                <div>{{ $d(item.endTime, 'hours') }}{{ timezone }}</div>
                            </div>
                        </div>

                    </BreezeResponsiveNavLink>
                </li>
            </ul>

            <!--ul role="list" class="divide-y divide-gray-200 dark:divide-gray-600" v-if="Object.keys(items).length > 0">
                <template v-for="(item, i) in items">
                    <li class="grid grid-cols-4 items-center py-4 first:pt-0 last:pb-0">
                        <div class="col-span-3">
                            <div>
                                Этап {{ i + 1 }}
                            </div>
                            <div>
                                {{ item.title }}
                            </div>
                        </div>
                        <div>
                            <div>{{ $d(item.endTime, 'day') }}</div>
                            <div>{{ $d(item.endTime, 'hours') }} {{ timezone }}</div>
                        </div>
                    </li>
                </template>
            </ul>

           -->
	    </template>
	</Show>
</template>

<script>
    import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
	import BreezeProgress from '@/Components/Progress.vue'
	import BreezeBadge from '@/Components/Badge.vue'
	import Show from './Show.vue'

    export default {
    	components: {
            BreezeResponsiveNavLink,
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

            time5() {
                return new Date(this.rating.time5)
            },

            time6() {
                return new Date(this.rating.time6)
            },

    		currentTime() {
    			return new Date()
    		},

            timezone() {
                var offset = -this.currentTime.getTimezoneOffset()/60;
                var lz = Math.abs(offset) < 10 ? "0" : "";

                return offset < 0 ? lz+offset : `+${lz}${offset}`;
            },

    		items() {
    			return [
    				{title: this.$t('pages.dashboard.partials.showDate.submission'), color: 'green', beginTime: this.time1, endTime: this.time2},
    				{title: this.$t('pages.dashboard.partials.showDate.approvement'), color: 'red', beginTime: this.time3, endTime: this.time4},
                    {title: this.$t('pages.dashboard.partials.showDate.verification'), color: 'red', beginTime: this.time5, endTime: this.time6}
    			]
    		}
    	}
    }
</script>