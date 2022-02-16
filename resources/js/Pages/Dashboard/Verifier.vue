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
            	<!-- This example requires Tailwind CSS v2.0+ -->
				<div class="flex flex-col">
				  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
				    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
				      <div class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

				      	<div class="flex">
					      	<div class="ml-3 relative" >
	                            <BreezeDropdown align="left" width="96" :contentClasses="['py-1','bg-white','max-h-60']">
	                                <template #trigger>
	                                    <span class="inline-flex rounded-md border border-gray-200 my-2">
	                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
	                                            Выберите рейтинг

	                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
	                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
	                                            </svg>
	                                        </button>
	                                    </span>
	                                </template>

	                                <template #content>
	                                    <div class="block px-4 py-2 text-xs text-gray-400">
	                                        Список рейтингов подтверждения
	                                    </div>
	                                    
	                                    <BreezeDropdownLink :href="route('position.index')" v-for="rating in $page.props.ratings">
	                                        {{ rating.name }}
	                                    </BreezeDropdownLink>
	                                </template>
	                            </BreezeDropdown>
	                        </div>
	                    </div>

				        <table class="min-w-full divide-y divide-gray-200">
				          <thead class="bg-gray-50">
				            <tr>
				              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
				              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
				              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
				              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
				              <th scope="col" class="relative px-6 py-3">
				                <span class="sr-only">Edit</span>
				              </th>
				            </tr>
				          </thead>
				          <tbody class="bg-white divide-y divide-gray-200">
				            <tr v-for="user in $page.props.rating.users.data">
				              <td class="px-6 py-4 whitespace-nowrap">
				                <div class="flex items-center">
				                  <div class="flex-shrink-0 h-10 w-10">
				                    <img class="h-10 w-10 rounded-full" :src="user.profile_photo_path" alt="">
				                  </div>
				                  <div class="ml-4">
				                    <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>
				                    <div class="text-sm text-gray-500">{{ user.email }}</div>
				                  </div>
				                </div>
				              </td>
				              <td class="px-6 py-4 whitespace-nowrap">
				                <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
				                <div class="text-sm text-gray-500">Optimization</div>
				              </td>
				              <td class="px-6 py-4 whitespace-nowrap">
				                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
				              </td>
				              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
				              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
				                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
				              </td>
				            </tr>

				            <!-- More people... -->
				          </tbody>
				        </table>

				        <div class="flex justify-center items-center my-2">
				            <BreezePagination :links="$page.props.rating.users.links" />
				        </div>
				      </div>
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
import BreezeAvatar from '@/Components/Avatar.vue'
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';

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
        Link,
        Head,
    },

    computed: {
        translate() {
            var $t = this.$t;

            return [
                function (path) { // [0]
                    return $t(`pages.dashboard.verifier.${path}`);
                },
            ]
        }
    },
}
</script>