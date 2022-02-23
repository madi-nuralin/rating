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
                                  <span class="inline-flex justify-center items-center text-blue-500">
                                     <div class="flex shrink-0 grow-0 items-center justify-center">
                                         <div class="flex items-center justify-center w-6 h-6 rounded-full bg-gray-200">
                                          <div class="w-4 h-4 rounded-full bg-gray-400"></div>
                                        </div>
                                      </div>
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
                                  <span class="inline-flex justify-center items-center text-blue-500">
                                     <div class="flex shrink-0 grow-0 items-center justify-center">
                                         <div class="flex items-center justify-center w-6 h-6 rounded-full bg-green-200">
                                          <div class="w-4 h-4 rounded-full bg-green-400"></div>
                                        </div>
                                      </div>
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
                                  <span class="inline-flex justify-center items-center text-blue-500">
                                     <div class="flex shrink-0 grow-0 items-center justify-center">
                                         <div class="flex items-center justify-center w-6 h-6 rounded-full bg-orange-200">
                                          <div class="w-4 h-4 rounded-full bg-orange-400"></div>
                                        </div>
                                      </div>
                                  </span>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>


                   <div class="grid grid-cols-1 gap-6 mb-6">
                          <div class="p-6 bg-white md:rounded-md shadow" v-for="rating in $page.props.ratings">
                            <div class="">
                               <div class="justify-between items-center block md:flex">
                                  <div class="flex shrink-0 grow-0 items-center justify-center mb-6 md:mb-0">
                                     <div class="justify-start items-center block md:flex">
                                        <div class="flex shrink-0 grow-0 items-center justify-center">
                                           <div class="text-center space-y-1 md:text-left md:mr-6">
                                              <Link :href="route('submission.index', {'rating': rating.id})" class="text-lg hover:underline"> {{ rating.name }}</Link>
                                              <p class="text-gray-500 dark:text-gray-400"> {{ rating.description }}</p>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="flex shrink-0 grow-0 items-center justify-center">
                                     <div class="text-center md:text-right space-y-1">
                                        <!--div>
                                           <div class="inline-flex items-center last:mr-0 capitalize border py-0.5 px-2 text-xs rounded-lg mr-1.5 bg-blue-600 text-white border-blue-700">
                                              <span>45721474</span>
                                           </div>
                                           <div class="inline-flex items-center last:mr-0 capitalize border py-0.5 px-2 text-xs rounded-lg mr-1.5 bg-emerald-600 text-white border-emerald-700">
                                              <span>deposit</span>
                                           </div>
                                        </div-->

                                        <div class="flex shrink-0 grow-0 items-center justify-center mb-6 md:mb-0">
                                           <div class="flex items-center justify-center w-4 h-4 rounded-full md:mr-6" :class="[`bg-${colorClass(rating)}-200`]">
                                            <div class="w-2 h-2 rounded-full" :class="[`bg-${colorClass(rating)}-400`]"></div>
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
                                    <div>{{ rating.statistics.submissions}} items</div>
                                    <div>{{ calculateTime(rating) }}</div>    
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
        colorClass(rating) {
          var 
            sbt = new Date(rating.submission_begin_time_at),
            set = new Date(rating.submission_end_time_at),
            vbt = new Date(rating.verification_begin_time_at),
            vet = new Date(rating.verification_end_time_at);

          var 
            currentTime = this.currentTime;

          return (sbt <= currentTime && set > currentTime) ? "green" : (vbt <= currentTime && vet > currentTime) ? "orange" : "gray";
        },
        calculateTime(rating) {
          var currentTime = this.currentTime
          var $d = this.$d, $t = this.$t;

          var 
            sbt = new Date(rating.submission_begin_time_at),
            set = new Date(rating.submission_end_time_at),
            vbt = new Date(rating.verification_begin_time_at),
            vet = new Date(rating.verification_end_time_at);

          return sbt > currentTime
              ? $t('pages.dashboard.partials.showDate.begins') + $d(sbt, 'long')
              : set < currentTime
              ? $t('pages.dashboard.partials.showDate.finished') + $d(set, 'long')
              : sbt <= currentTime && set >= currentTime
              ? $t('pages.dashboard.partials.showDate.finishes') + $d(set, 'long')
              : '';

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
        },
        currentTime() {
          return new Date();
        }
    },
}
</script>