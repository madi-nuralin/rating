<template>
    <Head :title="translate[0]('head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ translate[0]('header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section class="px-0 _md:px-6 _py-6">

                   <section class="px-6 sm:px-0 mb-6 flex items-center justify-between">
                      <div class="flex items-center justify-start">
                         <h1 class="text-2xl">{{ translate[0]('content.title') }}</h1>
                      </div>
                      <button class="inline-flex cursor-pointer justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border rounded ring-blue-700 p-1 bg-white text-black border-gray-300 hover:bg-gray-50" type="button">
                         <span class="inline-flex justify-center items-center w-6 h-6">
                            <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                               <path fill="currentColor" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"></path>
                            </svg>
                         </span>
                         <!---->
                      </button>
                   </section>

                   <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
                      <div class="shadow md:rounded-lg border-gray-100 dark:bg-gray-900/70 bg-white border dark:border-gray-800">
                         <!---->
                         <div class="p-6">
                            <div class="justify-between items-center flex">
                               <div class="flex shrink-0 grow-0 items-center justify-center">
                                  <div>
                                     <h3 class="text-lg leading-tight text-gray-500 dark:text-gray-400">{{ translate[0]('content.statistics.total') }}</h3>
                                     <h1 class="text-3xl leading-tight font-semibold">
                                        <div>{{ $page.props.statistics.total }}</div>
                                     </h1>
                                  </div>
                               </div>
                               <div class="flex shrink-0 grow-0 items-center justify-center">
                                  <span class="inline-flex justify-center items-center  h-16 text-emerald-500">
                                     <svg viewBox="0 0 24 24" width="48" height="48" class="inline-block">
                                        <path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path>
                                     </svg>
                                  </span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="shadow md:rounded-lg border-gray-100 dark:bg-gray-900/70 bg-white border dark:border-gray-800">
                         <!---->
                         <div class="p-6">
                            <div class="justify-between items-center flex">
                               <div class="flex shrink-0 grow-0 items-center justify-center">
                                  <div>
                                     <h3 class="text-lg leading-tight text-gray-500 dark:text-gray-400">{{ translate[0]('content.statistics.submitting') }}</h3>
                                     <h1 class="text-3xl leading-tight font-semibold">
                                        <div>{{ $page.props.statistics.submitting }}</div>
                                     </h1>
                                  </div>
                               </div>
                               <div class="flex shrink-0 grow-0 items-center justify-center">
                                  <span class="inline-flex justify-center items-center  h-16 text-blue-500">
                                     <svg viewBox="0 0 24 24" width="48" height="48" class="inline-block">
                                        <path fill="currentColor" d="M17,18A2,2 0 0,1 19,20A2,2 0 0,1 17,22C15.89,22 15,21.1 15,20C15,18.89 15.89,18 17,18M1,2H4.27L5.21,4H20A1,1 0 0,1 21,5C21,5.17 20.95,5.34 20.88,5.5L17.3,11.97C16.96,12.58 16.3,13 15.55,13H8.1L7.2,14.63L7.17,14.75A0.25,0.25 0 0,0 7.42,15H19V17H7C5.89,17 5,16.1 5,15C5,14.65 5.09,14.32 5.24,14.04L6.6,11.59L3,4H1V2M7,18A2,2 0 0,1 9,20A2,2 0 0,1 7,22C5.89,22 5,21.1 5,20C5,18.89 5.89,18 7,18M16,11L18.78,6H6.14L8.5,11H16Z"></path>
                                     </svg>
                                  </span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="shadow md:rounded-lg border-gray-100 dark:bg-gray-900/70 bg-white border dark:border-gray-800">
                         <!---->
                         <div class="p-6">
                            <div class="justify-between items-center flex">
                               <div class="flex shrink-0 grow-0 items-center justify-center">
                                  <div>
                                     <h3 class="text-lg leading-tight text-gray-500 dark:text-gray-400">{{ translate[0]('content.statistics.verifying') }}</h3>
                                     <h1 class="text-3xl leading-tight font-semibold">
                                        <div>{{ $page.props.statistics.verifying }}</div>
                                     </h1>
                                  </div>
                               </div>
                               <div class="flex shrink-0 grow-0 items-center justify-center">
                                  <span class="inline-flex justify-center items-center  h-16 text-red-500">
                                     <svg viewBox="0 0 24 24" width="48" height="48" class="inline-block">
                                        <path fill="currentColor" d="M3,14L3.5,14.07L8.07,9.5C7.89,8.85 8.06,8.11 8.59,7.59C9.37,6.8 10.63,6.8 11.41,7.59C11.94,8.11 12.11,8.85 11.93,9.5L14.5,12.07L15,12C15.18,12 15.35,12 15.5,12.07L19.07,8.5C19,8.35 19,8.18 19,8A2,2 0 0,1 21,6A2,2 0 0,1 23,8A2,2 0 0,1 21,10C20.82,10 20.65,10 20.5,9.93L16.93,13.5C17,13.65 17,13.82 17,14A2,2 0 0,1 15,16A2,2 0 0,1 13,14L13.07,13.5L10.5,10.93C10.18,11 9.82,11 9.5,10.93L4.93,15.5L5,16A2,2 0 0,1 3,18A2,2 0 0,1 1,16A2,2 0 0,1 3,14Z"></path>
                                     </svg>
                                  </span>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>

                   <div class="grid grid-cols-1 gap-2 mb-6">

                         <div class="md:rounded dark:bg-gray-900/70 hover:shadow-lg transition-shadow duration-500 bg-white mb-6 last:mb-0" v-for="rating in $page.props.ratings">
                            <!---->
                            <div class="p-6">
                               <div class="justify-between items-center block md:flex">
                                  <div class="flex shrink-0 grow-0 items-center justify-center mb-6 md:mb-0">
                                     <div class="justify-start items-center block md:flex">
                                        <div class="flex shrink-0 grow-0 items-center justify-center mb-6 md:mb-0">
                                           <span class="inline-flex justify-center items-center w-12 h-12 rounded-full text-emerald-600 bg-gray-100 dark:bg-gray-800 md:mr-6">
                                              <svg viewBox="0 0 24 24" width="24" height="24" class="inline-block">
                                                 <path fill="currentColor" d="M15 15V17H18V20H20V17H23V15H20V12H18V15M14.97 11.61C14.85 10.28 13.59 8.97 12 9C10.3 9.03 9 10.3 9 12C9 13.7 10.3 14.94 12 15C12.38 15 12.77 14.92 13.14 14.77C13.41 13.67 13.86 12.63 14.97 11.61M13 16H7C7 14.9 6.11 14 5 14V10C6.11 10 7 9.11 7 8H17C17 9.11 17.9 10 19 10V10.06C19.67 10.06 20.34 10.18 21 10.4V6H3V18H13.32C13.1 17.33 13 16.66 13 16Z"></path>
                                              </svg>
                                           </span>
                                        </div>
                                        <div class="flex shrink-0 grow-0 items-center justify-center">
                                           <div class="text-center space-y-1 md:text-left md:mr-6">
                                              <Link :href="route('submission.index', {'rating': rating.id})" class="text-xl hover:underline"> {{ rating.name }}</Link>
                                              <p class="text-gray-500 dark:text-gray-400"> {{ rating.description }}</p>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="flex shrink-0 grow-0 items-center justify-center">
                                     <div class="text-center md:text-right space-y-1">
                                        <div>
                                           <div class="inline-flex items-center last:mr-0 capitalize border py-0.5 px-2 text-xs rounded-lg mr-1.5 bg-blue-600 text-white border-blue-700">
                                              <!----><span>45721474</span>
                                           </div>
                                           <div class="inline-flex items-center last:mr-0 capitalize border py-0.5 px-2 text-xs rounded-lg mr-1.5 bg-emerald-600 text-white border-emerald-700">
                                              <!----><span>deposit</span>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="flex space-x-2 mt-2 overflow-hidden">
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" :src="verifier.user.profile_photo_path" alt="" v-for="verifier in rating.verifiers" v-if="Object.keys(rating.verifiers).length > 0">
                                    <p class="text-gray-600 text-sm" v-else>Нет участников</p>
                                </div>
                               <div class="mt-4 flex justify-between text-gray-600 text-sm">
                                    <div>10 items</div>
                                    <div>Finishes at Mon, 12, 2022</div>    
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
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeFormSection,
        BreezeSectionBorder,
        BreezeButtonSecondary,
        BreezeAvatar,
        Link,
        Head,
    },

    methods: {
        content(context) {
            var roles = this.$page.props.auth.user.roles;
            if (roles) {
                for (var i=0; i < roles.length; ++i) {
                    if (roles[i].context == context) {
                        return true;
                    }
                }
            }
            return false;
        }
    },

    computed: {
        translate() {
            var $t = this.$t;

            return [
                function (path) { // [0]
                    return $t(`pages.dashboard.user.${path}`);
                },
            ]
        }
    },
}
</script>