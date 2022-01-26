<template>
	<div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-md" :class="[`bg-${color}-200`]">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10" :class="[`bg-${color}-100`]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " :class="[`text-${color}-600`]" fill="none" viewBox="0 0 24 24">
                    <path fill="none" d="M12,2H4A2.006,2.006,0,0,0,2,4V16a2.006,2.006,0,0,0,2,2V8A4,4,0,0,1,8,4h6A2,2,0,0,0,12,2Z"/>
                    <path fill="currentColor" d="M23.953,13.942a1.314,1.314,0,0,0-.664-.84,1.37,1.37,0,0,0-.393-1,1.333,1.333,0,0,0-1-.392,1.343,1.343,0,0,0-1.9-.5,1.343,1.343,0,0,0-1.9.5,1.337,1.337,0,0,0-1,.392,1.373,1.373,0,0,0-.392,1,1.343,1.343,0,0,0-.5,1.9,1.343,1.343,0,0,0,.5,1.9,1.37,1.37,0,0,0,.392,1,1.3,1.3,0,0,0,1,.393,1.112,1.112,0,0,0,.3.368v5.119a.213.213,0,0,0,.056.152A.174.174,0,0,0,18.6,24a.188.188,0,0,0,.136-.056l.008-.008L20,22.8l1.264,1.145A.189.189,0,0,0,21.4,24a.174.174,0,0,0,.144-.072.213.213,0,0,0,.056-.152V18.657a1.112,1.112,0,0,0,.3-.368,1.3,1.3,0,0,0,1-.393,1.367,1.367,0,0,0,.393-1,1.343,1.343,0,0,0,.5-1.9A1.313,1.313,0,0,0,23.953,13.942ZM20,16.6A1.6,1.6,0,1,1,21.6,15,1.6,1.6,0,0,1,20,16.6Z"/>
                    <path fill="currentColor" d="M15.556,9H8.443a.5.5,0,0,0,0,1h7.114a.5.5,0,0,0,0-1Z"/>
                    <path fill="currentColor" d="M13.557,15H8.443a.5.5,0,0,0,0,1h5.114a.5.5,0,0,0,0-1Z"/>
                    <path fill="currentColor" d="M13.557,12H8.443a.5.5,0,0,0,0,1h5.114a.5.5,0,0,0,0-1Z"/>
                    <path fill="currentColor" d="M15.557,18H8.531a.5.5,0,1,0,0,1h7.026a.5.5,0,0,0,0-1Z"/>
                    <path fill="currentColor" d="M16,4a4,4,0,0,0-4-4H4A4,4,0,0,0,0,4V16a4,4,0,0,0,4,4,4,4,0,0,0,4,4h7a1,1,0,0,0,0-2,.127.127,0,0,0-.06.01V22H8a2.006,2.006,0,0,1-2-2V8A2.006,2.006,0,0,1,8,6h8a2.015,2.015,0,0,1,2,2,1,1,0,0,0,2,0A4,4,0,0,0,16,4ZM8,4A4,4,0,0,0,4,8V18a2.006,2.006,0,0,1-2-2V4A2.006,2.006,0,0,1,4,2h8a2.006,2.006,0,0,1,2,2Z"/>
                </svg>
            </div>

            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg">
                    Оценка
                </h3>

                <div class="mt-2 text-left">
                	<p v-if="status == 'cancelled'">
                		Вам отказано присвоение баллов за данный ответ
                	</p>
                    <p v-else-if="form.scoring == 'disabled'">
                        К этой форме не было задано функция оценивания
                    </p>
                    <p v-else-if="form.scoring == 'by_score'">
                        Вам начислено <span class="bg-white rounded-md px-1">{{score}} баллов</span> по заранее заданному значению формы
                    </p>
                    <p v-else-if="form.scoring == 'by_math_expression'">
                        Вам начислено <span class="bg-white rounded-md px-1">{{score}} баллов</span> по формуле <span class="bg-white rounded-md px-1">{{ form.math_expression }}</span>, где:
                        <ul class="list-disc list-inside mt-2">
                            <li v-for="field in form.fields">
                                {{ field.label }} - {{ field.variable }}
                                 <ul class="ml-5 list-disc list-inside" v-if="field.type == 'select'">
                                    <li v-for="option in field.options">
                                        {{ option.name }} - {{ option.score }}
                                    </li>
                                 </ul>
                            </li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		props: {
			form: {
				//
			},
			status: {
				type: String,
				default: 'undefined'
			},
            score: {
                default: 0
            }
		},

		computed: {
			color() {
				return 'red';/*this.status == 'undefined'
					? 'orange'
					: this.status == 'cancelled'
					? 'red'
					: this.status == 'scored'
					? 'emerald'
					: 'orange';*/
			}
		}
	}
</script>