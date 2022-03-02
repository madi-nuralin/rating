<template>
    <Head :title="translate[0]('head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            {{ translate[0]('header') }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section class="px-0 _md:px-6 _py-6">

                   <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <breeze-info-card>
                      <template #title>
                        {{ translate[0]('content.statistics.total') }}
                      </template>
                      <template #description>
                        {{ $page.props.statistics.total }}
                      </template>
                      <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none" aria-hidden="true" class="float-right ml-2">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M4 13C4 11.3431 5.34315 10 7 10H14C14.5523 10 15 10.4477 15 11C15 11.5523 14.5523 12 14 12H7C6.44772 12 6 12.4477 6 13V47C6 47.5523 6.44771 48 7 48H14C14.5523 48 15 48.4477 15 49C15 49.5523 14.5523 50 14 50H7C5.34315 50 4 48.6569 4 47V13Z" fill="#79B8FF"></path>
                          <path d="M23 36C22.4477 36 22 36.4477 22 37C22 37.5523 22.4477 38 23 38H46C46.5523 38 47 37.5523 47 37C47 36.4477 46.5523 36 46 36H23Z" fill="#2188FF"></path>
                          <path d="M22 31C22 30.4477 22.4477 30 23 30H46C46.5523 30 47 30.4477 47 31C47 31.5523 46.5523 32 46 32H23C22.4477 32 22 31.5523 22 31Z" fill="#2188FF"></path>
                          <path d="M23 24C22.4477 24 22 24.4477 22 25C22 25.5523 22.4477 26 23 26H46C46.5523 26 47 25.5523 47 25C47 24.4477 46.5523 24 46 24H23Z" fill="#2188FF"></path>
                          <path d="M22 19C22 18.4477 22.4477 18 23 18H36C36.5523 18 37 18.4477 37 19C37 19.5523 36.5523 20 36 20H23C22.4477 20 22 19.5523 22 19Z" fill="#2188FF"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M20 6C18.3431 6 17 7.34315 17 9V47C17 48.6569 18.3431 50 20 50H49C50.6569 50 52 48.6569 52 47V9C52 7.34315 50.6569 6 49 6H20ZM19 9C19 8.44772 19.4477 8 20 8H49C49.5523 8 50 8.44772 50 9V47C50 47.5523 49.5523 48 49 48H20C19.4477 48 19 47.5523 19 47V9Z" fill="#2188FF"></path>
                          <path d="M10 36C9.44772 36 9 36.4477 9 37C9 37.5523 9.44772 38 10 38H14C14.5523 38 15 37.5523 15 37C15 36.4477 14.5523 36 14 36H10Z" fill="#2188FF"></path>
                          <path d="M9 31C9 30.4477 9.44772 30 10 30H14C14.5523 30 15 30.4477 15 31C15 31.5523 14.5523 32 14 32H10C9.44772 32 9 31.5523 9 31Z" fill="#2188FF"></path>
                          <path d="M10 24C9.44772 24 9 24.4477 9 25C9 25.5523 9.44772 26 10 26H14C14.5523 26 15 25.5523 15 25C15 24.4477 14.5523 24 14 24H10Z" fill="#2188FF"></path>
                        </svg>
                      </template>
                    </breeze-info-card>

                    <breeze-info-card>
                      <template #title>
                        {{ translate[0]('content.statistics.submitting') }}
                      </template>
                      <template #description>
                        {{ $page.props.statistics.submitting }}
                      </template>
                      <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.9 56" aria-hidden="true" class="float-right ml-2" height="56" width="56"><path d="m31.9 27.99a1 1 0 0 1 -1-1v-4.1a1 1 0 1 1 2 0v4.1a1 1 0 0 1 -1 1z" fill="#2088ff"></path><path d="m37.6 41.99h-29.1a1 1 0 0 1 0-2h29.1a1 1 0 0 1 0 2zm-14.44 6.1h-14.66a1 1 0 0 1 0-2h14.66a1 1 0 0 1 0 2zm28.74-2.9h-2.3a1 1 0 0 1 -1-1v-2.1a1 1 0 0 1 2 0v1.1h1.3a1 1 0 0 1 0 2z" fill="#79b8ff"></path><path d="m49.7 50.79a6.6 6.6 0 1 1 6.6-6.6 6.61 6.61 0 0 1 -6.6 6.6zm0-11.2a4.6 4.6 0 1 0 4.6 4.6 4.61 4.61 0 0 0 -4.6-4.6z" fill="#79b8ff"></path><path d="m60.9 23.79h-58.9a2.08 2.08 0 0 1 -2-2v-19.8a1.93 1.93 0 0 1 1.86-2h59a1.93 1.93 0 0 1 2 1.86v19.94a1.93 1.93 0 0 1 -1.87 2zm-58.9-2.06 58.9.06v-19.8h-58.9z" fill="#2088ff"></path><path d="m60.9 55.99h-58.9a2.08 2.08 0 0 1 -2-2v-19.8a1.93 1.93 0 0 1 1.86-2h59a1.93 1.93 0 0 1 2 1.86v19.94a1.93 1.93 0 0 1 -1.86 2zm-58.9-2.06 58.9.06v-19.8h-58.9z" fill="#79b8ff"></path><g fill="#2088ff"><path d="m37.6 9.79h-29.1a1 1 0 0 1 0-2h29.1a1 1 0 0 1 0 2zm-14.44 6h-14.66a1 1 0 0 1 0-2h14.66a1 1 0 0 1 0 2zm28.74-2.9h-2.3a1 1 0 0 1 -1-1v-2.1a1 1 0 0 1 2 0v1.1h1.3a1 1 0 0 1 0 2z"></path><path d="m49.7 18.49a6.6 6.6 0 1 1 6.6-6.6 6.61 6.61 0 0 1 -6.6 6.6zm0-11.2a4.6 4.6 0 1 0 4.6 4.6 4.61 4.61 0 0 0 -4.6-4.6z"></path></g></svg>
                      </template>
                    </breeze-info-card>

                    <breeze-info-card>
                      <template #title>
                        {{ translate[0]('content.statistics.verifying') }}
                      </template>
                      <template #description>
                        {{ $page.props.statistics.verifying }}
                      </template>
                      <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" height="56" viewBox="0 0 56 56" width="56"><g fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-width="2" transform="translate(3 5)"><path d="m17.643758 3.93029336-3.3686774.08473051c-1.0519166.02645829-1.9034233.86348177-1.9479219 1.91478966l-1.509832 35.67077867c-.0328933.777125-.6552158 1.3997194-1.43232646 1.432952-.78057067.0333805-1.45986217-.5291548-1.57255847-1.3022683l-4.16643056-28.5823345c-.15598343-1.0700696.56683761-2.0703261 1.63178766-2.2581055l3.08741405-.5443944" stroke="#79b8ff" stroke-linejoin="round" transform="matrix(.98480775 -.17364818 .17364818 .98480775 -3.923102 2.181342)"/><g stroke="#2088ff"><path d="m33.7995605 43h-13.7995605c-1.1045695 0-2-.8954305-2-2v-39c0-1.1045695.8954305-2 2-2h26c1.1045695 0 2 .8954305 2 2v32.7661133"/><path d="m26 15.9550781-3.3989592 3.3989593c-.3319457.3319456-.3319457.8701358 0 1.2020815l3.3989592 3.3989592" stroke-linejoin="round"/><path d="m43.6618345 15.9550781-3.3989592 3.3989593c-.3319457.3319456-.3319457.8701358 0 1.2020815l3.3989592 3.3989592" stroke-linejoin="round" transform="matrix(-1 0 0 1 83.67575 0)"/><path d="m35.5264893 13-5.0538331 14.0158691"/><path d="m41 31c4.4182609 0 8 3.5817391 8 8s-3.5817391 8-8 8-8-3.5817391-8-8 3.5817391-8 8-8z" stroke-linejoin="round"/><path d="m40.0676217 35.7485767 3.8459059 2.3959271c.4687614.2920295.6120308.9087724.3200013 1.3775337-.0820761.1317474-.193695.2425794-.3260198.3237213l-3.845906 2.3583203c-.4708158.2887055-1.0865295.141076-1.3752351-.3297398-.0964582-.1573024-.1475125-.3382261-.1475125-.5227477v-4.7542474c0-.5522848.4477152-1 1-1 .1869258 0 .3701096.0523924.5287662.1512325z" fill-rule="nonzero" stroke-linejoin="round"/></g></g></svg>
                      </template>
                    </breeze-info-card>
                   </div>

                   <BreezeSectionBorder v-if="Object.keys($page.props.ratings).length > 0"/>

                   <div class="mt-8 md:mt-0 p-6 sm:p-0 space-y-4" v-if="Object.keys($page.props.ratings).length > 0">
                    <div class="space-y-4" v-for="rating in $page.props.ratings">
                      <div class=" _px-4 pb-4 _sm:p-6 _sm:pb-4">
                        <div class="sm:flex sm:items-start">
                          <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full _bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!--svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-6 w-6 text-red-600"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round">
                              <line x1="4" y1="9" x2="20" y2="9"></line>
                              <line x1="4" y1="15" x2="20" y2="15"></line>
                              <line x1="10" y1="3" x2="8" y2="21"></line>
                              <line x1="16" y1="3" x2="14" y2="21"></line>
                            </svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" height="56" viewBox="0 0 56 56" width="56">
                                <g fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-width="2" transform="translate(3 5)">
                                    <path d="m17.643758 3.93029336-3.3686774.08473051c-1.0519166.02645829-1.9034233.86348177-1.9479219 1.91478966l-1.509832 35.67077867c-.0328933.777125-.6552158 1.3997194-1.43232646 1.432952-.78057067.0333805-1.45986217-.5291548-1.57255847-1.3022683l-4.16643056-28.5823345c-.15598343-1.0700696.56683761-2.0703261 1.63178766-2.2581055l3.08741405-.5443944" stroke="#79b8ff" stroke-linejoin="round" transform="matrix(.98480775 -.17364818 .17364818 .98480775 -3.923102 2.181342)"/>
                                    <g stroke="#2088ff">
                                        <path d="m33.7995605 43h-13.7995605c-1.1045695 0-2-.8954305-2-2v-39c0-1.1045695.8954305-2 2-2h26c1.1045695 0 2 .8954305 2 2v32.7661133"/>
                                        <path d="m26 15.9550781-3.3989592 3.3989593c-.3319457.3319456-.3319457.8701358 0 1.2020815l3.3989592 3.3989592" stroke-linejoin="round"/>
                                        <path d="m43.6618345 15.9550781-3.3989592 3.3989593c-.3319457.3319456-.3319457.8701358 0 1.2020815l3.3989592 3.3989592" stroke-linejoin="round" transform="matrix(-1 0 0 1 83.67575 0)"/><path d="m35.5264893 13-5.0538331 14.0158691"/>
                                        <path d="m41 31c4.4182609 0 8 3.5817391 8 8s-3.5817391 8-8 8-8-3.5817391-8-8 3.5817391-8 8-8z" stroke-linejoin="round"/>
                                        <path d="m40.0676217 35.7485767 3.8459059 2.3959271c.4687614.2920295.6120308.9087724.3200013 1.3775337-.0820761.1317474-.193695.2425794-.3260198.3237213l-3.845906 2.3583203c-.4708158.2887055-1.0865295.141076-1.3752351-.3297398-.0964582-.1573024-.1475125-.3382261-.1475125-.5227477v-4.7542474c0-.5522848.4477152-1 1-1 .1869258 0 .3701096.0523924.5287662.1512325z" fill-rule="nonzero" stroke-linejoin="round"/>
                                    </g>
                                </g>
                            </svg>
                          </div>
                          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <Link class="hover:underline dark:text-white" :href="route('submission.index', {'rating': rating.id})"  >
                              <h3 class="text-lg">
                                {{ rating.name}}
                              </h3>
                            </Link>
                            <div class="mt-2 text-gray-400">
                              {{ rating.description }}
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </section>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeFormSection from '@/Components/FormSection.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
import BreezeAvatar from '@/Components/Avatar.vue'
import BreezeBadge from '@/Components/Badge.vue'
import BreezeInfoCard from '@/Components/InfoCard.vue'
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeFormSection,
        BreezeSectionBorder,
        BreezeButtonSecondary,
        BreezeAvatar,
        BreezeBadge,
        BreezeInfoCard,
        Link,
        Head,
    },

    methods: {
        getStatus(rating) {
          var 
            sbt = new Date(rating.submission_begin_time_at),
            set = new Date(rating.submission_end_time_at),
            vbt = new Date(rating.verification_begin_time_at),
            vet = new Date(rating.verification_end_time_at);

          var 
            currentTime = this.currentTime;

          return (sbt <= currentTime && set > currentTime) ? "submission" : (vbt <= currentTime && vet > currentTime) ? "verification" : "completed";
        },
        getColor(rating) {
          var status = this.getStatus(rating);

          return status == 'submission' ? "green" : status == 'verification' ? "orange" : "gray";
        },
    },

    computed: {
        translate() {
            var $t = this.$t;

            return [
                function (path) { // [0]
                    return $t(`pages.dashboard.user.${path}`);
                },
            ]
        },
        currentTime() {
          return new Date();
        }
    },
}
</script>