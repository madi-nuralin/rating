<template>
    <Head title="Отчет о рейтинге" />

    <BreezeAuthenticatedLayout>
        <template #header>
            Отчет о рейтинге
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-800">

                        <div class="grid gap-6 grid-cols-8 pb-6">
                            <div class="col-span-8 sm:col-span-2">
                                <p class="text-sm text-gray-800 dark:text-gray-400">{{ translate[0]('table.header.allParticipants') }}</p>
                                <h3 class="text-lg dark:text-gray-100">{{ $page.props.statistics.total }}</h3>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="-mx-6 overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                              <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr class="flex flex-col md:table-row">
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-100">{{ translate[0]('table.thead.user') }}</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-100">{{ translate[0]('table.thead.position') }}</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-100">Статус утверждения</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-100">{{ translate[0]('table.thead.progress') }}</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-100">Загрузить отчет</th>
                                  <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                                <tr class="flex flex-col md:table-row" v-for="user in $page.props.rating.users.data" v-if="$page.props.rating && $page.props.rating.users">
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                      <div class="flex-shrink-0 h-10 w-10">
                                        <img class="object-cover h-10 w-10 rounded-full" :src="user.profile_photo_path" alt="">
                                      </div>
                                      <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ user.name }}</div>
                                        <div class="text-sm text-gray-500">{{ user.email }}</div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div v-for="employement in user.employements" v-if="Object.keys(user.employements).length > 0">
                                        <div class="text-sm text-gray-900 dark:text-gray-100 truncate">{{ employement.position.name }}</div>
                                        <div class="text-sm text-gray-500 truncate">{{ employement.department.name }}</div>
                                    </div>
                                    <div class="text-sm text-gray-500 italic" v-else>
                                        <div class="truncate">{{ translate[0]('table.employementInfoNotFound') }}</div>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-start text-xs">
                                      <breeze-badge :color="user.is_approved ? 'green' : 'yellow'">
                                        {{ $t(`pages.dashboard.partials.showApprovement.status[${user.is_approved ? 1 : 0}]`) }}
                                      </breeze-badge>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="grid grid-cols-2 gap-2" v-for="verifier in user.verifiers">
                                            <div class="flex items-center space-x-2">
                                                <breeze-progress :color="'indigo'" :rounded="false" :percentage="verifier.statistics.completed/verifier.statistics.total * 100" />
                                                <p class="text-sm text-gray-500">{{ verifier.statistics.completed}} / {{verifier.statistics.total }}</p>
                                            </div>
                                            <div>
                                                <breeze-avatar :src="verifier.user.profile_photo_path" :width="'4'"/>
                                                <span class="ml-2 dark:text-gray-100 text-sm">{{ verifier.user.name }}</span>
                                            </div>
                                        </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <Link :href="route('rating.overview.downloadReport', {'rating': $page.props.verifier.rating.id, 'user': user.id})" class="text-gray-400 hover:text-blue-500 underline hover:scale-110">Загрузить отчет</Link>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <!--Link :href="route('verification.index', {'verifier': $page.props.verifier.id, 'rating': $page.props.verifier.rating.id, 'user': user.id})" class="text-gray-400 hover:text-blue-500 underline hover:scale-110">
                                        {{ translate[0]('table.view') }}
                                    </Link-->
                                  </td>
                                </tr>

                                <!-- More people... -->
                              </tbody>
                            </table>

                            <div class="flex justify-center items-center my-2">
                                <breeze-pagination :links="$page.props.rating.users.links" v-if = "$page.props.rating && $page.props.rating.users"/>
                            </div>
                            <!-- /Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeFormSection from '@/Components/FormSection.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
import BreezePagination from '@/Components/Pagination'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeSelect from '@/Components/Select.vue'
import BreezeAvatar from '@/Components/Avatar.vue'
import BreezeProgress from '@/Components/Progress.vue'
import BreezeBadge from '@/Components/Badge.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeFormSection,
        BreezeSectionBorder,
        BreezeButtonSecondary,
        BreezePagination,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeAvatar,
        BreezeLabel,
        BreezeSelect,
        BreezeProgress,
        BreezeBadge,
        Link,
        Head,
    },

    data() {
        return {
            form: this.$inertia.form({
            })
        };
    },

    methods: {
    },

    computed: {
        translate() {
            var $t = this.$t;

            return [
                function (path) { // [0]
                    return $t(`pages.dashboard.verifier.${path}`);
                },
            ]
        },
        options() {
            return {
                'verifier': this.$page.props.verifiers ? this.$page.props.verifiers.map(function(verifier) {
                    return {
                        'value': verifier.id,
                        'name': verifier.rating.name,
                        'description': verifier.parameter_target.name
                    };
                }) : Array()
            };
        }
    },
}
</script>