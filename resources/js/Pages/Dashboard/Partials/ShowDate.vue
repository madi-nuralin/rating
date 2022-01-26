<template>
	<BreezeAccordion>
		<template #trigger>
	        {{ $t('pages.dashboard.partials.showDate.trigger') }}
	    </template>

	    <template #content>
	    	<div class="grid gap-3" >
	    		<div v-for="(item, i) in items">
		    		<div>
						<p class="text-sm font-medium text-gray-900">{{ item.title }}</p>
                        <p class="text-sm text-gray-500 truncate">{{ calculateTime(item.beginTime, item.endTime) }}</p>
					</div>

					<div class="my-1">
		  				<breeze-progress :color="'indigo'" :rounded="false" :percentage="percentage(currentTime - item.beginTime, item.endTime - item.beginTime)" />
		  			</div>
		  		</div>
	  		</div>
	    </template>
	</BreezeAccordion>
</template>

<script>
	import BreezeProgress from '@/Components/Progress.vue'
	import BreezeBadge from '@/Components/Badge.vue'
	import BreezeAccordion from '@/Components/Accordion.vue'

    export default {
    	components: {
    		BreezeProgress,
    		BreezeBadge,
    		BreezeAccordion
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
    		submissionBeginTime() {
    			return new Date(this.rating.submission_begin_time_at)
    		},

    		submissionEndTime() {
    			return new Date(this.rating.submission_end_time_at)
    		},

    		verificationBeginTime() {
    			return new Date(this.rating.verification_begin_time_at)
    		},

    		verificationEndTime() {
    			return new Date(this.rating.verification_end_time_at)
    		},

    		currentTime() {
    			return new Date()
    		},

    		items() {
    			return [
    				{title: 'Заполнение листа оценки', color: 'green', beginTime: this.submissionBeginTime, endTime: this.submissionEndTime},
    				{title: 'Подтверждение листа оценки', color: 'red', beginTime: this.verificationBeginTime, endTime: this.verificationEndTime}
    			]
    		}
    	}
    }
</script>