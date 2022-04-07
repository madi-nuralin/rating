<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200 dark:bg-gray-700 dark:bg-gray-800 dark:text-gray-100">
            <div class="flex space-x-6">    
                <div>
                    <img class="flex-none object-cover h-12 w-12 rounded-full" :src="$page.props.auth.user.profile_photo_path"/>
                </div>

                <div>
                    <h3 class="text-lg">{{ $page.props.auth.user.name }}</h3>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="-mt-px w-5 h-5 text-gray-400">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>

                        <a :href="''" class="ml-1 underline">
                            {{ $page.props.auth.user.email }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-2xl">
                {{ $t('pages.dashboard.feed.content.gettingStarted') }}
            </div>

            <div class="mt-6 text-gray-500">
                <div>
                    {{ $t('pages.welcome.userManual.description') }}
                </div>

                <Link href="">
                    <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>{{ $t('pages.welcome.userManual.title') }}</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                </Link>
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25">
            <div class="p-6">
                <!--div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500 dark:text-gray-200"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold dark:text-gray-200">
                        List of my ratings
                    </div>
                </div-->
                <div class="sm:ml-12">
                    <div class="grid gap-6 grid-cols-12 w-full">
                        <div class="col-span-12 sm:col-span-6">
                            <form @submit.prevent="$emit('submitted')">
                                <jet-select id="rating" class="mt-1 block w-full" :value="form.rating" @input="submit" :options="options.rating" :multiple="false" :placeholder="$t('pages.dashboard.feed.content.placeholderMyRatings')"/>
                            </form>
                        </div>
                        <div class="col-span-12 sm:col-span-2">
                            <p class="text-sm text-gray-800 dark:text-gray-400">
                                {{ $t('pages.dashboard.feed.content.statistics.total') }}
                            </p>
                            <h3 class="text-lg dark:text-gray-100">
                                {{ $page.props.statistics.total }}
                            </h3>
                        </div>
                        <div class="col-span-12 sm:col-span-2">
                            <p class="text-sm text-gray-800 dark:text-gray-400">
                                {{ $t('pages.dashboard.feed.content.statistics.submitting') }}
                            </p>
                            <h3 class="text-lg dark:text-gray-100">
                                {{ $page.props.statistics.submitting }}
                            </h3>
                        </div>
                        <div class="col-span-12 sm:col-span-2">
                            <p class="text-sm text-gray-800 dark:text-gray-400">
                                {{ $t('pages.dashboard.feed.content.statistics.verifying') }}
                            </p>
                            <h3 class="text-lg dark:text-gray-100">
                                {{ $page.props.statistics.verifying }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Components/ApplicationLogo.vue'
    import JetSelect from '@/Components/Select.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            JetApplicationLogo,
            JetSelect,
            Link
        },
        props: ['ratings'],
        data() {
            return {
                form: this.$inertia.form({
                    rating: null,
                }),
                rating: null,
            };
        },
        methods: {
            submit(event) {
                this.form.rating = event;

                for (const rating of this.ratings) {
                    if (this.form.rating == rating.id) {
                        this.rating = rating;
                        break;
                    }
                }

                this.form.get(route('submission.index', {'rating': rating.id} ), {
                    errorBag: 'submit',
                    preserveScroll: true
                });
            }
        },
        computed: {
            options() {
                return {
                    'rating': this.ratings ? this.ratings.map(function(rating) {
                        return {
                            'value': rating.id,
                            'name': rating.name,
                            'description': rating.description,
                        }
                    }) : null
                };
            }
        }
    })
</script>
