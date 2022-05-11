<template>
	<Show>
		<template #title>
	        {{ $t('pages.dashboard.partials.showDate.trigger') }}
	    </template>

	    <template #description>
            <!--ul role="list" class="divide-y divide-gray-200 dark:divide-gray-600 -pt-4">
                <template v-for="(item, i) in items">
               
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
            </ul-->
            <div class="rc-AssignmentSection flex-5">
                <table class="assignments" style="width: 100%;">
                    <!--caption class="screenreader-only" style="position: static;">Week 2: MODULE 2: FUNCTION TYPES</caption-->
                    <!--thead>
                        <tr role="row">
                            <th scope="col" role="columnheader">
                                <span class="cds-137 css-5uorye cds-139">Required</span>
                            </th>
                            <th scope="col" role="columnheader">
                                <span class="cds-137 css-5uorye cds-139">Grade</span>
                            </th>
                            <th scope="col" role="columnheader">
                                <span class="cds-137 css-5uorye cds-139">Due</span>
                            </th>
                        </tr>
                    </thead-->
                    <tbody>
                        <tr class="rc-AssignmentRow" role="row">
                            <td role="cell" class="rc-AssignmentName">
                                <a class="nostyle assignment-link">
                                    <div class="flex">
                                        <div>
                                            <div class="rc-ItemIcon horizontal-box">
                                                <svg aria-hidden="false" class="_ufjrdd" viewBox="0 0 48 48" role="img" aria-labelledby="Quiza54af531-712c-49b9-8a2f-799d2f06a435 Quiza54af531-712c-49b9-8a2f-799d2f06a435Desc" xmlns="http://www.w3.org/2000/svg" style="fill: rgb(116, 122, 135); height: 24px; width: 24px; margin-right: 8px;">
                                                    <title id="Quiza54af531-712c-49b9-8a2f-799d2f06a435">Quiz</title>
                                                    <path d="M24 47C11.3 47 1 36.7 1 24S11.3 1 24 1s23 10.3 23 23-10.3 23-23 23zm0-1.84c11.7 0 21.16-9.47 21.16-21.16C45.16 12.3 35.7 2.84 24 2.84 12.3 2.84 2.84 12.3 2.84 24c0 11.7 9.47 21.16 21.16 21.16zM21 17h10v2H21v-2zm0 6h10v2H21v-2zm0 6h10v2H21v-2zm-3-10c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm0 6c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm0 6c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-5-21h22v28H13V10zm2 2v24h18V12H15z" role="presentation"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="cds-137 css-9habuu cds-139">
                                                {{ this.$t('pages.dashboard.partials.showDate.submission') }}
                                            </p>
                                            <div class="cds-137 css-15ovfzm cds-139">Step 1</div>
                                            <!--div class="horizontal-box align-items-vertical-center">
                                                <p class="cds-137 css-9habuu cds-139">14 min</p>
                                            </div-->
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="rc-AssignmentGrade" role="cell">
                                
                            </td>
                            <td class="rc-AssignmentDueDate" role="cell">
                                <p class="cds-137 css-mpxffp cds-139">{{ $d(time2, 'day') }}</p>
                                <div class="_14m20gya">{{ $d(time2, 'hours') }} {{ timezone }}</div>
                                <!--div><breeze-progress :color="'indigo'" :rounded="false" :percentage="percentage(currentTime - items[0].beginTime, items[0].endTime - items[0].beginTime)"/></div-->
                            </td>
                        </tr>

                        <tr class="rc-AssignmentRow" role="row">
                            <td role="cell" class="rc-AssignmentName">
                                <a data-click-key="open_course_home.home_page.click.week_card_assignment_name" data-click-value="{&quot;href&quot;:&quot;/learn/golang-functions-methods/peer/qKrnv/module-2-activity&quot;,&quot;namespace&quot;:{&quot;action&quot;:&quot;click&quot;,&quot;app&quot;:&quot;open_course_home&quot;,&quot;component&quot;:&quot;week_card_assignment_name&quot;,&quot;page&quot;:&quot;home_page&quot;},&quot;open_course_slug&quot;:&quot;golang-functions-methods&quot;,&quot;schema_type&quot;:&quot;FRONTEND&quot;}" data-track="true" data-track-app="open_course_home" data-track-page="home_page" data-track-action="click" data-track-component="week_card_assignment_name" data-track-href="/learn/golang-functions-methods/peer/qKrnv/module-2-activity" href="/learn/golang-functions-methods/peer/qKrnv/module-2-activity" class="nostyle assignment-link">
                                    <div class="vertical-line vertical-line-bottom"></div>
                                    <div class="flex">
                                        <div>
                                            <div class="rc-ItemIcon horizontal-box">
                                                <svg aria-hidden="false" class="_ufjrdd" viewBox="0 0 48 48" role="img" aria-labelledby="GradedAssignment97a350fb-d056-490f-91e4-bd2e6bc4eae3 GradedAssignment97a350fb-d056-490f-91e4-bd2e6bc4eae3Desc" xmlns="http://www.w3.org/2000/svg" style="fill: rgb(116, 122, 135); height: 24px; width: 24px; margin-right: 8px;">
                                                    <title id="GradedAssignment97a350fb-d056-490f-91e4-bd2e6bc4eae3">Graded Assignment</title>
                                                    <path d="M24 47C11.3 47 1 36.7 1 24S11.3 1 24 1s23 10.3 23 23-10.3 23-23 23zm0-1.84c11.7 0 21.16-9.47 21.16-21.16C45.16 12.3 35.7 2.84 24 2.84 12.3 2.84 2.84 12.3 2.84 24c0 11.7 9.47 21.16 21.16 21.16z" role="presentation"></path>
                                                    <path d="M36 19h-8v-8H18v4h-2V9h14.4l7.6 7.6V37h-6v-2h4V19zm-.4-2L30 11.4V17h5.6z" role="presentation"></path>
                                                    <path d="M21 30c-2.16 0-3.6-1.17-4.35-3.13-.5-1.3-.65-2.74-.65-4.6 0-2.9 2.22-5.27 5-5.27s5 2.37 5 5.26c0 1.87-.16 3.3-.65 4.6C24.6 28.84 23.15 30 21 30zm0-2c2.24 0 3-2 3-5.74 0-1.8-1.36-3.26-3-3.26s-3 1.45-3 3.26C18 26 18.76 28 21 28z" role="presentation"></path>
                                                    <path d="M14 37h14v-2.03c0-.32-.4-.74-1.53-1.16-1.36-.5-3.33-.8-5.47-.8-2.12 0-4.1.3-5.47.83-1.12.43-1.53.85-1.53 1.14V37zm-2-2.03c0-2.73 4.5-3.97 9-3.97s9 1.18 9 3.97V39H12v-4.03z" role="presentation"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="cds-137 css-9habuu cds-139">
                                                {{ this.$t('pages.dashboard.partials.showDate.approvement') }}
                                            </p>
                                            <div class="cds-137 css-15ovfzm cds-139">Step 2</div>
                                            <!--div class="horizontal-box align-items-vertical-center">
                                                <p class="cds-137 css-9habuu cds-139">1h</p>
                                            </div-->
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="rc-AssignmentGrade" role="cell"></td>
                            <td class="rc-AssignmentDueDate" role="cell">
                                <p class="cds-137 css-mpxffp cds-139">{{ $d(time2, 'day') }}</p>
                                <div class="_14m20gya">{{ $d(time2, 'hours') }} {{ timezone }}</div>
                                <!--div><breeze-progress :color="'indigo'" :rounded="false" :percentage="percentage(currentTime - items[1].beginTime, items[1].endTime - items[1].beginTime)"/></div-->
                            </td>
                        </tr>

                        <tr class="rc-AssignmentRow" role="row">
                            <td role="cell" class="rc-AssignmentName">
                                <a data-click-key="open_course_home.home_page.click.week_card_assignment_name" data-click-value="{&quot;href&quot;:&quot;/learn/golang-functions-methods/peer/qKrnv/module-2-activity&quot;,&quot;namespace&quot;:{&quot;action&quot;:&quot;click&quot;,&quot;app&quot;:&quot;open_course_home&quot;,&quot;component&quot;:&quot;week_card_assignment_name&quot;,&quot;page&quot;:&quot;home_page&quot;},&quot;open_course_slug&quot;:&quot;golang-functions-methods&quot;,&quot;schema_type&quot;:&quot;FRONTEND&quot;}" data-track="true" data-track-app="open_course_home" data-track-page="home_page" data-track-action="click" data-track-component="week_card_assignment_name" data-track-href="/learn/golang-functions-methods/peer/qKrnv/module-2-activity" href="/learn/golang-functions-methods/peer/qKrnv/module-2-activity" class="nostyle assignment-link">
                                    <div class="vertical-line vertical-line-top">
                                        
                                    </div>
                                    <div class="flex">
                                        <div>
                                            <div class="rc-ItemIcon horizontal-box">
                                                <svg aria-hidden="false" class="_ufjrdd" viewBox="0 0 48 48" role="img" aria-labelledby="ReviewYourPeers3a33264c-108d-45dc-874b-75ff308bcc95 ReviewYourPeers3a33264c-108d-45dc-874b-75ff308bcc95Desc" xmlns="http://www.w3.org/2000/svg" style="fill: rgb(116, 122, 135); height: 24px; width: 24px; margin-right: 8px;">
                                                    <title id="ReviewYourPeers3a33264c-108d-45dc-874b-75ff308bcc95">Review Your Peers</title>
                                                    <path d="M21 21c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm8 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-8.12 3.42c-.23-.34-.14-.8.2-1.04.34-.23.8-.14 1.04.2.52.77 1.45 1.17 2.88 1.17.94 0 1.68-.24 2.27-.62.33-.23.53-.44.6-.55.24-.34.7-.43 1.05-.2.34.23.43.7.2 1.04-.18.26-.5.6-1.02.95-.83.55-1.86.88-3.1.88-1.9 0-3.3-.6-4.12-1.83zm.1 4.55h9.8c2.42 0 4.37-1.9 4.37-4.25V19.1c0-2.34-1.95-4.25-4.37-4.25H19.22c-2.42 0-4.37 1.9-4.37 4.24v15L21 28.97zM13 38.05V19.1c0-3.37 2.8-6.1 6.22-6.1h11.56C34.2 13 37 15.73 37 19.1v5.62c0 3.37-2.8 6.1-6.22 6.1h-9.12L13 38.04zM24 47C11.3 47 1 36.7 1 24S11.3 1 24 1s23 10.3 23 23-10.3 23-23 23zm0-1.84c11.7 0 21.16-9.47 21.16-21.16C45.16 12.3 35.7 2.84 24 2.84 12.3 2.84 2.84 12.3 2.84 24c0 11.7 9.47 21.16 21.16 21.16z" role="presentation"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="cds-137 css-9habuu cds-139">
                                                {{ this.$t('pages.dashboard.partials.showDate.verification') }}
                                            </p>
                                            <div class="cds-137 css-15ovfzm cds-139">Step 3</div>
                                            <!--div class="horizontal-box align-items-vertical-center"></div-->
                                        </div>
                                    </div>
                                </a>
                            </td>

                            <td class="rc-AssignmentGrade" role="cell"></td>
                            <td class="rc-AssignmentDueDate" role="cell">
                                <p class="cds-137 css-mpxffp cds-139">{{ $d(time3, 'day') }}</p>
                                <div class="_14m20gya">{{ $d(time3, 'hours') }} {{ timezone }}</div>
                                <!--div><breeze-progress :color="'indigo'" :rounded="false" :percentage="percentage(currentTime - items[1].beginTime, items[1].endTime - items[1].beginTime)"/></div-->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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

            timezone() {
                var offset = -this.currentTime.getTimezoneOffset()/60;
                var lz = Math.abs(offset) < 10 ? "0" : "";

                return offset < 0 ? lz+offset : `+${lz}${offset}`;
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